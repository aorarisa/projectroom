<?php 
	include '../connect/headadmin.php';
	include 'list-group.php';
	
?>
<div class="content-wrapper">
	<!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box">
						<div class="box box-default color-palette-box">
							<div class="callout callout-success">
								<h4><i class="fa fa-fw fa-building-o"></i> จองห้องพัก</h4>
							</div>
							<div class="panel-body">
								<div class="col-md-4"></div>
								<div class="col-md-6"></div>
								<div class="col-md-2" style="text-align:right;"><?php include ('regis.php'); ?></div>
								<div class="row">
									<div class="col-md-12" class="container">
										<div class="col-md-12">
											<br>
											<div class="table-responsive">
												<table id="example" class="table table-bordered table-hover table-striped dataTable" >
													<thead>
														<tr class="" >
															<th style="text-align:center; width:5%;">ลำดับ</th>
															<th style="text-align:center; width:15%;">ชื่อผู้จอง</th>
															<th style="text-align:center; width:10%;">ประเภทห้อง</th>
															<th style="text-align:center; width:10%;">วันที่จอง</th>
															<th style="text-align:center; width:10%;">วันที่เข้าพัก</th>
															<th style="text-align:center; width:10%;">ถึงวันที่</th>
															<th style="text-align:center; width:5%;">จำนวนห้อง</th>
															<th style="text-align:center; width:10%;">จำนวนเงิน</th>
															<th style="text-align:center; width:10%;">สถานะ</th>
															<th style="text-align:center; width:15%;">แก้ไข|ลบ</th>
														</tr>
													</thead>	
													<tbody>
														<?php
															$p=1;
															$rows = mysqli_query($con,"SELECT A.*,(SELECT COUNT(*) FROM manage_bookingdetail B 
															WHERE A.BOOKING_ID = B.BOOKING_ID) AS COUNT_NUM
															FROM manage_booking  A ORDER BY A.BOOKING_ID DESC");
															
															while($rec = mysqli_fetch_array($rows)){
																$class= $rec['BOOKING_STATUS'] =="N" || $rec['BOOKING_STATUS'] =="C"?'text-danger':'text-success';
																$PAY_DATE= $rec['PAY_DATE'] =="0000-00-00"?'':show_convert_date($rec['PAY_DATE']);
																
																$TYPEROOM_ID = "'TYPEROOM_ID'";
																$TYPEROOM =   "'".$rec['TYPEROOM_ID']."'";
																$BOOKING_ID = "'".$rec['BOOKING_ID']."'";
																$VIEW = "'VIEW'";
																$COUNT_NUM = $rec['COUNT_NUM'] > 0 ?'<a href="javascript:void(0);" onclick="VIEW('.$BOOKING_ID.','.$TYPEROOM_ID.','.$TYPEROOM.','.$VIEW.');" class="btn btn-xs">'.number_format($rec['COUNT_NUM']).'</a>':number_format($rec['COUNT_NUM']); ?>
																
																<tr class="" >
																	<td style="text-align:center;" class=""><?php echo $p;?></td>
																	<td style="text-align:left;"><?php echo $arr_membername[$rec['MEMBER_ID']];?></td>
																	<td style="text-align:left;"><?php echo $arr_typeroom[$rec['TYPEROOM_ID']];?></td>
																	<td style="text-align:right;"><?php echo show_convert_date($rec['BOOKING_DATE']);?></td>
																	<td style="text-align:right;"><?php echo show_convert_date($rec['DATE_STAY']);?></td>
																	<td style="text-align:right;"><?php echo show_convert_date($rec['DATE_END']);?></td>
																	<td style="text-align:right;"><?php echo  $COUNT_NUM;?></td>
																	<td style="text-align:right;"><?php echo  number_format($rec['SUM_AMOUNT'],2);?></td>
																	<td class="<?php echo  $class;?>" style="text-align:center;"><?php echo $arr_statusbooking[$rec['BOOKING_STATUS']].'<br>'.$PAY_DATE;?>
																	</td>
																	
																	<td style="text-align:center;">
																		<a href="javascript:void(0);" onclick="edit('<?php echo $rec['BOOKING_ID'];?>','<?php echo $rec['MEMBER_ID'];?>','<?php echo $rec['TYPEROOM_ID'];?>','<?php echo $rec['BOOKING_DATE'];?>','<?php echo $rec['PAY_DATE'];?>','<?php echo $rec['DATE_STAY'];?>','<?php echo $rec['DATE_END'];?>','<?php echo $rec['SUM_AMOUNT'];?>','<?php echo $rec['BOOKING_STATUS'];?>');" class="btn btn-info btn-xs">
																		<i class="glyphicon btn-glyphicon glyphicon-pencil fa-xs img-circle text-info"></i></a>
																		
																		<a href="javascript:void(0);" onclick="del('<?php echo $rec['BOOKING_ID'];?>','<?php echo $rec['DATE_STAY'];?>','<?php echo $rec['DATE_END'];?>','<?php echo $rec['SUM_AMOUNT'];?>','<?php echo $rec['COUNT_NUM'];?>','<?php echo $rec['BOOKING_STATUS'];?>');"  class="btn btn-danger btn-xs">
																		<i class="glyphicon  btn-glyphicon glyphicon-trash fa-xs img-circle text-danger"></i></a>
																		
																		
																		
																		
																	</td>
																</tr>
																<?php
																	$p++;
																}
																mysqli_close($con);	
														?>
													</tbody>
												</table>
											</div>
											
										</div>	
									</div>
									
								</div>
							</div>
							
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</section>
		<!-- /.content -->
	</div>
	<?php include '../connect/footer.php'?>	
	<div id="edit"></div>
	<div id="view"></div>
	<div id="del"></div>
	
	<script type="text/javascript" charset="utf-8">
		$(document).ready(function() {	
			$("#BOOKING_DATE").datetimepicker({
				timepicker:false,
				format:'d/m/Y',  // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000            
				lang:'th',  // แสดงภาษาไทย               
				yearOffset:543,  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
				closeOnDateSelect:true,
				onShow:function( ct ){
					this.setOptions({
						formatDate:'d/m/Y',
						maxDate:$('#DATE_STAY').val()?$('#DATE_STAY').val():false
					})
				},
			});
			$("#PAY_DATE").datetimepicker({
				timepicker:false,
				format:'d/m/Y',  // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000            
				lang:'th',  // แสดงภาษาไทย               
				yearOffset:543,  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
				closeOnDateSelect:true,
				onShow:function( ct ){
					this.setOptions({
						formatDate:'d/m/Y',
						minDate:$('#BOOKING_DATE').val()?$('#BOOKING_DATE').val():false,
						maxDate:$('#DATE_STAY').val()?$('#DATE_STAY').val():false
					})
				},
			}); 	
			
			$("#DATE_STAY").datetimepicker({
				timepicker:false,
				format:'d/m/Y',  // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000            
				lang:'th',  // แสดงภาษาไทย               
				yearOffset:543,  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
				closeOnDateSelect:true,
				onShow:function( ct ){
					this.setOptions({
						formatDate:'d/m/Y',
						minDate:$('.BOOKING_DATE').val()?$('.BOOKING_DATE').val():false,
						maxDate:$('#DATE_END').val()?$('#DATE_END').val():false
					})
				},
			}); 	
			
			$('#DATE_END').datetimepicker({
				timepicker:false,
				format:'d/m/Y',  // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000            
				lang:'th',  // แสดงภาษาไทย               
				yearOffset:543,  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
				closeOnDateSelect:true,
				onShow:function( ct ){
					this.setOptions({
						formatDate:'d/m/Y',
						minDate:$('#DATE_STAY').val()?$('#DATE_STAY').val():false
					})
				},
			});
		});
		
		function amount(){
			var len = $('[id^=ROOM_ID_]:checked').length;
			var sumAmount = 0;
			
			$('[id^=ROOM_ID_]:checked').each(function(){
				sumAmount += +$('#FUND_AMOUNT_'+this.value).val();
			});
			$('[id^=SUM_AMOUNT]').val(addCommas(parseFloat(sumAmount).toFixed(2)));
		}
		function tableroom(id,value,booking_id,TYPE){	
			$.ajax({
				url: 'chk_data.php',
				type: 'POST',
				dataType: 'html',
				data: {chk_data:'tableroom', data:value,booking_id:booking_id},
				success: function(data) {
					$('#TABLEROOM'+TYPE).html(data);
					//$('.selectpicker').selectpicker();
				}
			});
		}	
		function VIEW(id,value,booking_id,TYPE){	
			$.ajax({
				url: 'modal.php',
				type: 'POST',
				dataType: 'html',
				data: {chk_data:'booking',type:'3',id:id,val:value,booking_id:booking_id},
				success: function(data) {
					$('#view').html(data);
					$('#view'+id).modal('toggle');
					//$('.selectpicker').selectpicker();
				}
			});
		}
		
		function edit(id,value,typeroom,booking_date,pay_date,date_stay,date_end,sum_amount,satus){
			$.ajax({
				url: 'modal.php',
				type: 'POST',
				dataType: 'html',
				data: {chk_data:'booking',type:'1',proc:'edit', id:id,val:value,typeroom:typeroom,booking_date:booking_date,pay_date:pay_date,date_stay:date_stay,date_end:date_end,sum_amount:sum_amount,satus:satus,TYPE:'<?php echo $TYPE;?>',CHK_TYPE:'<?php echo $CHK_TYPE;?>'},
				success: function(data) {
					$('#edit').html(data);
					$('#edit'+id).modal('toggle');
					$('.selectpicker').selectpicker();
				}
			});
			
			
		}	
	

		function del(id,value){
			$.ajax({
				url: 'modal.php',
				type: 'POST',
				dataType: 'html',
				data: {chk_data:'booking',type:'2', id:id,val:value,TYPE:'<?php echo $TYPE;?>',CHK_TYPE:'<?php echo $CHK_TYPE;?>'},
				success: function(data) {
					$('#del').html(data);
					$('#del'+id).modal('toggle');
				}
			});
			
			
		}
	</script>																																																																		