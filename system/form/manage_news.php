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
						<h4><i class="fa fa-fw fa-newspaper-o"></i> ข่าวสาร</h4>
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
												<th style="text-align:center; ">วันที่</th>
												<th style="text-align:center;">ชื่อเรื่อง</th>
												<th style="text-align:center;">รายละเอียด</th>
												<th style="text-align:center; ">สถานะ</th>
												<th style="text-align:center; width:15%;">แก้ไข|ลบ</th>
											</tr>
													</thead>	
													<tbody>
											<?php
												$p=1;
												$rows = mysqli_query($con,"SELECT * FROM manage_news ORDER BY NEWS_DATE DESC");
												while($rec = mysqli_fetch_array($rows)){
												?>
												<tr class="" >
													<td style="text-align:center;" class=""><?php echo $p;?>
													<input type="hidden" id="NEWS_ID" name="NEWS_ID" value="<?php echo $rec['NEWS_ID'];?>"></td>
													<td style="text-align:left;"><?php echo show_convert_date($rec['NEWS_DATE']);?></td>
													<td style="text-align:left;"><?php echo $rec['NEWS_SUB'];?></td>
													<td style="text-align:left;"><?php echo $rec['NEWS_DETAIL'];?></td>
													<td style="text-align:left;"><?php echo status($rec['NEWS_STATUS']);?></td>
													<td style="text-align:center;">
														<a href="javascript:void(0);" onclick="edit('<?php echo $rec['NEWS_ID'];?>','<?php echo date_to_db($rec['NEWS_DATE']);?>','<?php echo $rec['NEWS_SUB'];?>','<?php echo $rec['NEWS_DETAIL'];?>','<?php echo $rec['NEWS_STATUS'];?>');" class="btn btn-info btn-xs">
														<i class="glyphicon btn-glyphicon glyphicon-pencil fa-xs img-circle text-info"></i></a>
														
														<a href="javascript:void(0);" onclick="del('<?php echo $rec['NEWS_ID'];?>','<?php echo date_to_db($rec['NEWS_DATE']);?>','<?php echo $rec['NEWS_SUB'];?>','<?php echo $rec['NEWS_DETAIL'];?>','<?php echo $rec['NEWS_STATUS'];?>');"  class="btn btn-danger btn-xs">
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
		
			<div id="edit"></div>
			<div id="del"></div>
		<?php include '../connect/footer.php'?>
			<script type="text/javascript" charset="utf-8">
				$(document).ready(function() {	
				 $(".datepicker").datetimepicker({
						timepicker:false,
						format:'d/m/Y',  // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000            
						lang:'th',  // แสดงภาษาไทย               
						yearOffset:543,  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
						closeOnDateSelect:true,
					}); 
				   
				});
				
				function edit(id,date,sub,detail,status){
					$.ajax({
						url: 'modal.php',
						type: 'POST',
						dataType: 'html',
						data: {chk_data:'news',type:'1', id:id,date:date,sub:sub,detail:detail,status:status,TYPE:'<?php echo $TYPE;?>',CHK_TYPE:'<?php echo $CHK_TYPE;?>'},
						success: function(data) {
							$('#edit').html(data);
							$('#edit'+id).modal('toggle');
							$('.selectpicker').selectpicker();
						}
					});
					
					
				}	
				
				function del(id,date,sub,detail,status){
					$.ajax({
						url: 'modal.php',
						type: 'POST',
						dataType: 'html',
						data: {chk_data:'news',type:'2',  id:id,date:date,sub:sub,detail:detail,status:status,TYPE:'<?php echo $TYPE;?>',CHK_TYPE:'<?php echo $CHK_TYPE;?>'},
						success: function(data) {
							$('#del').html(data);
							$('#del'+id).modal('toggle');
						}
					});
					
					
				}
				
			</script>   																																																		