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
												<thead >
													<tr class="">
														<th style="text-align:center; width:3%;"rowspan="2">ลำ<br/>ดับ</th>
														<th style="text-align:center; width:15%;" rowspan="2">ชื่อผู้จอง</th>
														<th style="text-align:center; width:15%;" rowspan="2">ประเภทห้องพัก</th>
														<th style="text-align:center; width:30%;" colspan="4"> ความพึงพอใจด้านลักษณะห้องพัก</th>
														<th style="text-align:center; width:30%;"colspan="4"> ความพึงพอใจด้านราคา</th>
														<th style="text-align:center; width:7%;"rowspan="2">แก้ไข|ลบ</th>
													</tr>
													<tr class="" >
														<?php foreach($arr_satisfaction_body[1] as $key => $value){?>
															<th style="text-align:left; width:7.5%;"><?php echo $key.'.'.$value;?></th>
															<?php } 
														?>
														<?php foreach($arr_satisfaction_body[2] as $key => $value){?>
															<th style="text-align:left; width:7.5%;"><?php echo $key.'.'.$value;?></th>
															<?php } 
														?>
													</tr>
												</thead>	
												<tbody>
													<?php
														$p=1;
														$rows = mysqli_query($con,"SELECT * FROM manage_satisfaction  ORDER BY SATIS_ID DESC");
														
														while($rec = mysqli_fetch_array($rows)){
														?>
														<tr class="" >
															<td style="text-align:center; width:3%;" class=""><?php echo $p;?></td>
															<td style="text-align:left; width:15%;"><?php echo $arr_membername[$rec['MEMBER_ID']];?></td>
															<td style="text-align:left; width:15%;"><?php echo $arr_typeroom[$rec['TYPEROOM_ID']];?></td>
															<td style="text-align:right; width:7.5%;"><?php echo $rec['FACILITIES'];?></td>
															<td style="text-align:right; width:7.5%;"><?php echo $rec['CLEAN'];?></td>
															<td style="text-align:right; width:7.5%;"><?php echo $rec['DESIGN'];?></td>
															<td style="text-align:right; width:7.5%;"><?php echo $rec['SIZE'];?></td>
															<td style="text-align:right; width:7.5%;"><?php echo $rec['ROOM_RATES'];?></td>
															<td style="text-align:right; width:7.5%;"><?php echo $rec['SERVICE_FEE'];?></td>
															<td style="text-align:right; width:7.5%;"><?php echo $rec['FINESS_ROOM'];?></td>
															<td style="text-align:right; width:7.5%;"><?php echo $rec['FOOD_PRICE'];?></td>
															<td style="text-align:center; width:7%;">
																<a href="javascript:void(0);" onclick="edit('<?php echo $rec['SATIS_ID'];?>','<?php echo $rec['MEMBER_ID'];?>','<?php echo $rec['TYPEROOM_ID'];?>','<?php echo $rec['FACILITIES'];?>','<?php echo $rec['CLEAN'];?>','<?php echo $rec['DESIGN'];?>','<?php echo $rec['SIZE'];?>','<?php echo $rec['ROOM_RATES'];?>','<?php echo $rec['SERVICE_FEE'];?>','<?php echo $rec['FINESS_ROOM'];?>','<?php echo $rec['FOOD_PRICE'];?>');" class="btn btn-info btn-xs">
																<i class="glyphicon btn-glyphicon glyphicon-pencil fa-xs img-circle text-info"></i></a>
																
																<a href="javascript:void(0);" onclick="del('<?php echo $rec['SATIS_ID'];?>','<?php echo $rec['MEMBER_ID'];?>');"  class="btn btn-danger btn-xs">
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
	
	function edit(id,value,typeroom,FACILITIES,CLEAN,DESIGN,SIZE,ROOM_RATES,SERVICE_FEE,FINESS_ROOM,FOOD_PRICE){
			var SATIS = {'1_1':FACILITIES,'1_2':CLEAN,'1_3':DESIGN,'1_4':SIZE,'2_1':ROOM_RATES,'2_2':SERVICE_FEE,'2_3':FINESS_ROOM,'2_4':FOOD_PRICE};
		$.ajax({
			url: 'modal.php',
			type: 'POST',
			dataType: 'html',
			data: {chk_data:'satisfac',type:'1', id:id,val:value,typeroom:typeroom,SATIS:SATIS,TYPE:'<?php echo $TYPE;?>',CHK_TYPE:'<?php echo $CHK_TYPE;?>'},
			success: function(data) {
				$('#edit').html(data);
				$('#edit'+id).modal('toggle'); 
				$('.selectpicker').selectpicker();
			}
		});
	}
	function member(value,TYPE){
		$.ajax({
			url: 'chk_data.php',
			type: 'POST',
			dataType: 'html',
			data: {chk_data:'SATISFAC',val:value,selected:'0'},
			success: function(data) {
				$('#TYPEROOMSATISFAC'+TYPE).html(data);
				$('.selectpicker').selectpicker();
			}
		});
		
		
	}	
	
	function del(id,value){
		$.ajax({
			url: 'modal.php',
			type: 'POST',
			dataType: 'html',
			data: {chk_data:'satisfac',type:'2', id:id,val:value,TYPE:'<?php echo $TYPE;?>',CHK_TYPE:'<?php echo $CHK_TYPE;?>'},
			success: function(data) {
				$('#del').html(data);
				$('#del'+id).modal('toggle');
			}
		});
		
		
	}
</script>																																													