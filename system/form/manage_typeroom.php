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
								<h4><i class="fa fa-fw fa-building-o"></i> ประเภทห้อง</h4>
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
															<th style="text-align:center; width:10%;">ชื่อประเภทห้อง</th>
															<th style="text-align:center; width:10%;">ประเภทห้อง</th>
															<th style="text-align:center; width:10%;">ราคาห้อง</th>
															<th style="text-align:center; width:10%;">จำนวนห้องพัก</th>
															<th style="text-align:center; width:10%;">จำนวนรูปภาพ</th>
															<th style="text-align:center; width:10%;">สถานะ</th>
															<th style="text-align:center; width:15%;">แก้ไข|ลบ</th>
														</tr>
													</thead>	
													<tbody>
														<?php
															$p=1;
															$rows = mysqli_query($con,"SELECT a.*,(SELECT COUNT(TYPEROOM_ID) FROM mannage_roomimage b WHERE a.TYPEROOM_ID = b.TYPEROOM_ID) AS COUNT_NUM,(SELECT COUNT(TYPEROOM_ID) FROM manage_room c WHERE a.TYPEROOM_ID = c.TYPEROOM_ID) AS COUNT_ROOM  FROM manage_typeroom  A ORDER BY A.TYPEROOM_NAME DESC");
															
															while($rec = mysqli_fetch_array($rows)){
																
																$COUNT_NUM = $rec['COUNT_NUM'] > 0 ?'<a href="javascript:void(0);" onclick="view('.$rec['TYPEROOM_ID'].');" class="btn btn-xs">'.number_format($rec['COUNT_NUM']).'</a>':number_format($rec['COUNT_NUM']);
																
															?>
															<tr class="" >
																<td style="text-align:center;" class=""><?php echo $p;?></td>
																<td style="text-align:left;"><?php echo $rec['TYPEROOM_NAME'];?></td>
																<td style="text-align:left;"><?php echo roomtypestatus($rec['TYPEROOM_SATUS']);?></td>
																<td style="text-align:right;"><?php echo number_format($rec['TYPEROOM_AMOUNT'],2);?></td>
																<td style="text-align:right;"><?php echo  number_format($rec['COUNT_ROOM']);?></td>
																<td style="text-align:right;"><?php echo $COUNT_NUM;?></td>
																
																<td style="text-align:center;"><?php echo $arr_statusroom[$rec['TYPEROOM_TSATUS']];?></td>
																
																<td style="text-align:center;">
																	<a href="javascript:void(0);" onclick="edit('<?php echo $rec['TYPEROOM_ID'];?>','<?php echo $rec['TYPEROOM_NAME'];?>','<?php echo $rec['TYPEROOM_SATUS'];?>','<?php echo $rec['TYPEROOM_DETAIL'];?>','<?php echo $rec['TYPEROOM_AREA'];?>','<?php echo $rec['TYPEROOM_SIZE'];?>','<?php echo $rec['TYPEROOM_AMOUNT'];?>','<?php echo $rec['COUNT_NUM'];?>','<?php echo $rec['TYPEROOM_TSATUS'];?>');" class="btn btn-info btn-xs">
																	<i class="glyphicon btn-glyphicon glyphicon-pencil fa-xs img-circle text-info"></i></a>
																	
																	<a href="javascript:void(0);" onclick="del('<?php echo $rec['TYPEROOM_ID'];?>','<?php echo $rec['TYPEROOM_NAME'];?>','<?php echo $rec['TYPEROOM_SATUS'];?>','<?php echo $rec['TYPEROOM_AMOUNT'];?>','<?php echo $rec['TYPEROOM_TSATUS'];?>');"  class="btn btn-danger btn-xs">
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
			
		});
		function edit(id,value,satus,detail,area,size,amont,count_num,tsatus){
			$.ajax({
				url: 'modal.php',
				type: 'POST',
				dataType: 'html',
				data: {chk_data:'typeroom',type:'1', id:id,val:value,satus:satus,detail:detail,area:area,size:size,amont:amont,count_num:count_num,tsatus:tsatus,TYPE:'<?php echo $TYPE;?>',CHK_TYPE:'<?php echo $CHK_TYPE;?>'},
				success: function(data) {
					$('#edit').html(data);
					$('#edit'+id).modal('toggle');
				}
			});
			
			
		}
		function view(id){
			$.ajax({
				url: 'modal.php',
				type: 'POST',
				dataType: 'html',
				data: {chk_data:'typeroom',type:'3', id:id,TYPE:'<?php echo $TYPE;?>',CHK_TYPE:'<?php echo $CHK_TYPE;?>'},
				success: function(data) {
					$('#view').html(data);
					$('#view'+id).modal('toggle');
					$('.carousel').carousel({
						interval: 1000
					});
				}
			});
			
			
		}		
		
		function del(id,value){
			$.ajax({
				url: 'modal.php',
				type: 'POST',
				dataType: 'html',
				data: {chk_data:'typeroom',type:'2', id:id,val:value,TYPE:'<?php echo $TYPE;?>',CHK_TYPE:'<?php echo $CHK_TYPE;?>'},
				success: function(data) {
					$('#del').html(data);
					$('#del'+id).modal('toggle');
				}
			});
			
			
		}
	</script>																																														