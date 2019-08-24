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
					<div class="box box-default color-palette-box">
						<div class="callout callout-success">
						<h4><i class="fa fa-fw fa-user-plus"></i> ผู้ใช้งาน</h4>
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
														<th style="text-align:center; width:%;">ชื่อผู้ใช้งาน</th>
														<th style="text-align:center; width:%;">ประเภท</th>
														<th style="text-align:center; width:%;">ชื่อ</th>
														<th style="text-align:center; width:%;">นามสกุล</th>
														<th style="text-align:center; width:%;">ที่อยู่</th>
														<th style="text-align:center; width:%;">เบอร์โทร</th>
														<th style="text-align:center; width:%;">อีเมลล์</th>
														<th style="text-align:center; width:15%;">แก้ไข|ลบ</th>
													</tr>
													</thead>	
													<tbody>
														<?php
															$p=1;
															$rows = mysqli_query($con,"SELECT * FROM member  ORDER BY FULLNAME DESC");
															
															while($rec = mysqli_fetch_array($rows)){
															?>
															<tr class="" >
																<td style="text-align:center;" class=""><?php echo $p;?></td>
																<td style="text-align:left;"><?php echo $rec['USERNAME'];?></td>
																<td style="text-align:left;"><?php echo $arr_member[$rec['MEMBER_TYPE']];?></td>
																<td style="text-align:left;"><?php echo $rec['FULLNAME'];?></td>
																<td style="text-align:left;"><?php echo $rec['LASTNAME'];?></td>
																<td style="text-align:left;"><?php echo $rec['ADDRESS'];?></td>
																<td style="text-align:left;"><?php echo $rec['TEL'];?></td>
																<td style="text-align:left;"><?php echo $rec['EMAIL'];?></td>

																<td style="text-align:center;">
																	<a href="javascript:void(0);" onclick="edit('<?php echo $rec['MEMBER_ID'];?>','<?php echo $rec['USERNAME'];?>','<?php echo $rec['PASSWORD'];?>','<?php echo $rec['MEMBER_TYPE'];?>','<?php echo $rec['FULLNAME'];?>','<?php echo $rec['LASTNAME'];?>','<?php echo $rec['ADDRESS'];?>','<?php echo $rec['TEL'];?>','<?php echo $rec['EMAIL'];?>');" class="btn btn-info btn-xs">
																	<i class="glyphicon btn-glyphicon glyphicon-pencil fa-xs img-circle text-info"></i></a>
																	
																	<a href="javascript:void(0);" onclick="del('<?php echo $rec['MEMBER_ID'];?>','<?php echo $rec['USERNAME'];?>','<?php echo $rec['MEMBER_TYPE'];?>');"  class="btn btn-danger btn-xs">
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
	
			});
			function edit(id,user,pass,type,name,last,address,tel,email){
				$.ajax({
					url: 'modal.php',
					type: 'POST',
					dataType: 'html',
					data: {chk_data:'member',type:'1', id:id,user:user,pass:pass, type:type,name:name,last:last,address:address,tel:tel,email:email,TYPE:'<?php echo $TYPE;?>',CHK_TYPE:'<?php echo $CHK_TYPE;?>'},
					success: function(data) {
						$('#edit').html(data);
						$('#edit'+id).modal('toggle');
					}
				});
				
				
			}	
			
			function del(id,value,type){
				$.ajax({
					url: 'modal.php',
					type: 'POST',
					dataType: 'html',
					data: {chk_data:'member',type:'2', id:id,val:value,type:type,TYPE:'<?php echo $TYPE;?>',CHK_TYPE:'<?php echo $CHK_TYPE;?>'},
					success: function(data) {
						$('#del').html(data);
						$('#del'+id).modal('toggle');
					}
				});
				
				
			}
		</script>

																																															