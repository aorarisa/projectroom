<?php 
	include '../connect/headadmin.php';
	include 'list-group.php';
	
	$arr_building = array();
	$rows = mysqli_query($con,"SELECT * FROM manage_building  ORDER BY BUILDING_NAME DESC");			
	while($rec = mysqli_fetch_array($rows)){
		$arr_building[$rec['BUILDING_ID']] = $rec['BUILDING_NAME'];
		
	}
	$arr_class = array();
	$rows_class = mysqli_query($con,"SELECT * FROM manage_class  ORDER BY CLASS_NAME DESC");			
	while($rec_class = mysqli_fetch_array($rows_class)){
		$arr_class[$rec_class['CLASS_ID']] = $rec_class['CLASS_NAME'];
		
	}	
	
	
?>
<div class="content-wrapper">
	<!-- Main content -->
    <section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box box-default color-palette-box">
						<div class="callout callout-success">
						<h4><i class="fa fa-fw fa-building-o"></i> ห้องพัก</h4>
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
													<th style="text-align:center; width:10%;">ชื่อตึก</th>
													<th style="text-align:center; width:10%;">ชื่อชั้น</th>
													<th style="text-align:center; width:10%;">ประเภทห้องพัก</th>
													<th style="text-align:center; width:10%;">ชื่อห้องพัก</th>
													<th style="text-align:center; width:10%;">สถานะ</th>
													<th style="text-align:center; width:15%;">แก้ไข|ลบ</th>
												</tr>
											</thead>	
											<tbody>
												<?php
													$p=1;
													$rows = mysqli_query($con,"SELECT * FROM manage_room  ORDER BY ROOM_NAME DESC");
													
													while($rec = mysqli_fetch_array($rows)){
													?>
													<tr class="" >
														<td style="text-align:center;" class=""><?php echo $p;?></td>
														<td style="text-align:left;"><?php echo $arr_building[$rec['BUILDING_ID']];?></td>
														<td style="text-align:left;"><?php echo $arr_class[$rec['CLASS_ID']];?></td>
														<td style="text-align:left;"><?php echo $arr_typeroom[$rec['TYPEROOM_ID']];?></td>
														<td style="text-align:left;"><?php echo $rec['ROOM_NAME'];?></td>
														<td style="text-align:center;"><?php echo $arr_statusroom[$rec['ROOM_STATUS']];?></td>
														<td style="text-align:center;">
															<a href="javascript:void(0);" onclick="edit('<?php echo $rec['ROOM_ID'];?>','<?php echo $rec['ROOM_NAME'];?>','<?php echo $rec['BUILDING_ID'];?>','<?php echo $rec['CLASS_ID'];?>','<?php echo $rec['TYPEROOM_ID'];?>','<?php echo $rec['ROOM_STATUS'];?>');" class="btn btn-info btn-xs">
															<i class="glyphicon btn-glyphicon glyphicon-pencil fa-xs img-circle text-info"></i></a>
															
															<a href="javascript:void(0);" onclick="del('<?php echo $rec['ROOM_ID'];?>','<?php echo $rec['ROOM_NAME'];?>','<?php echo $rec['BUILDING_ID'];?>','<?php echo $rec['CLASS_ID'];?>','<?php echo $rec['TYPEROOM_ID'];?>','<?php echo $rec['ROOM_STATUS'];?>');"  class="btn btn-danger btn-xs">
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
	
	function edit(id,value,buiding,class_id,typeroom,status){
		$.ajax({
			url: 'modal.php',
			type: 'POST',
			dataType: 'html',
			data: {chk_data:'room',type:'1', id:id,val:value,buiding:buiding,class_id:class_id,typeroom:typeroom,status:status,TYPE:'<?php echo $TYPE;?>',CHK_TYPE:'<?php echo $CHK_TYPE;?>'},
			success: function(data) {
				$('#edit').html(data);
				$('#edit'+id).modal('toggle');
				$('.selectpicker').selectpicker();
			}
		});
		
		
	}	
	
	function del(id,value,buiding){
		$.ajax({
			url: 'modal.php',
			type: 'POST',
			dataType: 'html',
			data: {chk_data:'room',type:'2', id:id,val:value,buiding:buiding,TYPE:'<?php echo $TYPE;?>',CHK_TYPE:'<?php echo $CHK_TYPE;?>'},
			success: function(data) {
				$('#del').html(data);
				$('#del'+id).modal('toggle');
			}
		});
		
		
	}
</script>																																													