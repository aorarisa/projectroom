<?php
	if($_POST['chk_data'] == 'buiding'){
		include '../connect/config.php'; 
		if($_POST['type'] =='1'){
		?>	   
		<div class="modal fade bs-example-modal-lg" id="edit<?php echo $_POST['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $_POST['id'];?>">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close" onClick="window.location.reload()"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel<?php echo $_POST['id'];?>">แก้ไขข้อมูล</h4>
					</div>
					<form method="post"  id="form" name="form"  action="../save/manage_proc.php">
						<div class="modal-body">
							<input type="hidden" name="proc"  id="proc" value="edit"> 
							<input type="hidden" class="form-control" name="TYPE" id="TYPE" value="<?php echo $_POST['TYPE'];?>" required >
							<input type="hidden" class="form-control" name="LINK" id="LINK" value="<?php echo $_POST['CHK_TYPE'];?>" required >
							<input type="hidden" name="BUILDING_ID" value="<?php echo $_POST['id'];?>">
							<div class="row">
								<div class="col-md-2" style="text-align:right;">ชื่อตึก :&nbsp;</div>
								<div class="col-md-10"  ><input type="text" class="form-control"  name="BUILDING_NAME" id="BUILDING_NAME<?php echo $_POST['id'];?>" value="<?php echo $_POST['val'];?>" placeholder="ชื่อ"  required   style="width: 100%;"onblur="chk_date(this.id,this.value);"><br>
								</div>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" id="close" class="btn btn-danger" data-dismiss="modal" onClick="window.location.reload()">ยกเลิก</button>
							<button type="submit" class="btn btn-success">แก้ไข</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		<?php }else if($_POST['type'] =='2'){ ?>
		<!-- Modal faculty del-->
		<div class="modal fade bs-example-modal-lg" id="del<?php echo $_POST['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $_POST['id'];?>">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close"onClick="window.location.reload()"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel<?php echo $_POST['id'];?>">ลบข้อมูล</h4>
					</div>
					<form method="post"  id="form" name="form"  action="../save/manage_proc.php">
						<div class="modal-body">
							<input type="hidden" class="form-control" name="TYPE" id="TYPE" value="<?php echo $_POST['TYPE'];?>" required >
							<input type="hidden" class="form-control" name="LINK" id="LINK" value="<?php echo $_POST['CHK_TYPE'];?>" required >
							<input type="hidden" name="proc"  id="proc" value="del"> 
							<input type="hidden" name="BUILDING_ID" value="<?php echo $_POST['id'];?>">        
							<input type="hidden"  class="form-control"  name="BUILDING_NAME" id="BUILDING_NAME<?php echo $_POST['id'];?>" value="" readonly>
							<diV style="text-align:left;"><?php echo 'คุณต้องการลบชื่อ';?> <?php echo $_POST['val'];?>  <?php echo 'ใช่หรือไม่';?> </div>
							<br>
						</div>
						<div class="modal-footer">
							<button type="button" id="close" class="btn btn-danger" data-dismiss="modal" onClick="window.location.reload()">ยกเลิก</button>
							<button type="submit" class="btn btn-success">ลบ</button>
						</div>
					</div>
				</div>
			</form>
		</div>
		<?php
		}
		exit;
		}else if($_POST['chk_data'] == 'class'){
		include '../connect/config.php'; 
		
		
	?>
	
	<div class="modal fade bs-example-modal-lg" id="edit<?php echo $_POST['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display:none;">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" id="close"  class="close" data-dismiss="modal" aria-label="Close"onClick="window.location.reload()"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">แก้ไขข้อมูล</h4>
				</div>
				<form method="post"  id="form" name="form"  action="../save/manage_proc.php">
					<div class="modal-body">
						<input type="hidden" name="proc"  id="proc" value="edit"> 
						<input type="hidden" class="form-control" name="TYPE" id="TYPE" value="<?php echo $_POST['TYPE'];?>" required >
						<input type="hidden" class="form-control" name="LINK" id="LINK" value="<?php echo $_POST['CHK_TYPE'];?>" required >
						<input type="hidden" name="CLASS_ID" id="CLASS_ID" value="<?php echo $_POST['id'];?>">
						
						<div class="row">
							<div class="col-md-2" style="text-align:right;">ชื่อตึก :&nbsp;</div>
							<div class="col-md-10">
								
								<select name="BUILDING_ID" id="BUILDING_ID<?php echo $_POST['id'];?>"  class="selectpicker form-control" data-live-search="true"  onChange="chk_date();" >
									<option value="">--ทั้งหมด --</option>
									<?php foreach($arr_building as $val => $label){?>
										<option value="<?php echo $val;?>"<?php echo $val == $_POST['buiding']?"selected":""; ?>>
										<?php echo $label;?></option>
									<?php } ?>
								</select>&nbsp;
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-2" style="text-align:right;">ชื่อชั้น :&nbsp;</div>
							<div class="col-md-10"><input type="text" class="form-control" style="width: 100%;" name="CLASS_NAME" id="CLASS_NAME<?php echo $_POST['id'];?>" value="<?php echo $_POST['val'];?>" placeholder="ชื่อ"  onblur="chk_date(this.id,this.value);" required ></div>
						</div>
						
					</div>
					<div class="modal-footer">
						<button type="button" id="close" class="btn btn-danger" data-dismiss="modal" onClick="window.location.reload()">ยกเลิก</button>
						<button type="submit" class="btn btn-success">แก้ไข</button>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>

<!-- Modal class del-->
<div class="modal fade bs-example-modal-lg" id="del<?php echo $_POST['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $_POST['id'];?>">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close" onClick="window.location.reload()"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel<?php echo $_POST['id'];?>">ลบข้อมูล</h4>
			</div>
			<form method="post"  id="form" name="form"  action="../save/manage_proc.php">
				<div class="modal-body">
					<input type="hidden" name="proc"  id="proc" value="del"> 
					<input type="hidden" class="form-control" name="TYPE" id="TYPE" value="<?php echo $_POST['TYPE'];?>" required >
					<input type="hidden" class="form-control" name="LINK" id="LINK" value="<?php echo $_POST['CHK_TYPE'];?>" required >
					<input type="hidden" name="CLASS_ID" id="CLASS_ID" value="<?php echo $_POST['id'];?>">       
					<input type="hidden"  class="form-control"  name="CLASS_NAME" id="CLASS_NAME<?php echo $_POST['id'];?>" value="" readonly>
					<diV style="text-align:left;"><?php echo 'คุณต้องการลบชื่อ';?> <?php echo $_POST['val'];?>  <?php echo 'ใช่หรือไม่';?> </div>
					<br>
				</div>
				<div class="modal-footer">
					<button type="button" id="close" class="btn btn-danger" data-dismiss="modal" onClick="window.location.reload()">ยกเลิก</button>
					<button type="submit" class="btn btn-success">ลบ</button>
				</div>
			</div>
		</div>
	</form>
</div>
<?php
	exit;
	}else if($_POST['chk_data'] == 'news'){
	include '../connect/config.php'; 
?>	
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
</script>			
<div class="modal fade bs-example-modal-lg" id="edit<?php echo $_POST['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display:none;">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close" onClick="window.location.reload()"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">แก้ไขข้อมูล</h4>
			</div>
			<form method="post"  id="form" name="form"  action="../save/manage_proc.php">
				<div class="modal-body">
					<input type="hidden" name="proc"  id="proc" value="edit"> 
					<input type="hidden" class="form-control" name="TYPE" id="TYPE" value="<?php echo $_POST['TYPE'];?>"required >
					<input type="hidden" class="form-control" name="LINK" id="LINK" value="<?php echo $_POST['CHK_TYPE'];?>"required >
					<input type="hidden" name="NEWS_ID" id="NEWS_ID" value="<?php echo $_POST['id'];?>">    
					<div class="row">
						<div class="col-md-3" style="text-align:right;">วันที่ :&nbsp;</div>
						<div class="col-md-9">	
							<div class="form-group input-group ">
								<input type="text" name="NEWS_DATE" id="NEWS_DATE" class="form-control datepicker" value="<?php echo  $_POST['date'];?>" readonly  >
								<span class="input-group-addon "><span class="glyphicon glyphicon-calendar "></span> </span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3" style="text-align:right;">ชื่อเรื่อง :&nbsp;</div>
						<div class="col-md-9"><input type="text" class="form-control" name="NEWS_SUB" id="NEWS_SUB" value="<?php echo  $_POST['sub'];?>" placeholder="ชื่อเรื่อง" onblur="chk_date(this.id,this.value);" required ><br> 
						</div>
					</div>
					<div class="row">
						<div class="col-md-3" style="text-align:right;">รายละเอียด :</div>
						<div class="col-md-9"><textarea type="text" class="form-control" rows="4" name="NEWS_DETAIL" id="NEWS_DETAIL" placeholder="รายละเอียด" required ><?php echo  $_POST['detail'];?></textarea><br> 
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-3" style="text-align:right;">สถานะ :&nbsp;</div>
						<div class="col-md-9"style="text-align:left;">
							<?php foreach($arr_status as $key => $value){ ?>
								<label class="radio-inline">
									<input type="radio" class="radio" name="NEWS_STATUS" id="NEWS_STATUS" placeholder="สถานะ" value="<?php echo $key?>" required   <?php echo  $_POST['status'] == $key ?'checked':""; ?>><?php echo $value;?>
								</label>
							<?php } ?>
						</div>
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" id="close" class="btn btn-danger" data-dismiss="modal" onClick="window.location.reload()">ยกเลิก</button>
					<button type="submit" class="btn btn-success">แก้ไข</button>
				</div>
			</div>
		</div>
	</form>
</div>
</div>

<!-- Modal class del-->
<div class="modal fade bs-example-modal-lg" id="del<?php echo $_POST['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $_POST['id'];?>">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close" onClick="window.location.reload()"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel<?php echo $_POST['id'];?>">ลบข้อมูล</h4>
			</div>
			<form method="post"  id="form" name="form"  action="../save/manage_proc.php">
				<div class="modal-body">
					<input type="hidden" name="proc"  id="proc" value="del"> 
					<input type="hidden" class="form-control" name="TYPE" id="TYPE" value="<?php echo $_POST['TYPE'];?>" required >
					<input type="hidden" class="form-control" name="LINK" id="LINK" value="<?php echo $_POST['CHK_TYPE'];?>" required >
					<input type="hidden" name="NEWS_ID" id="NEWS_ID" value="<?php echo $_POST['id'];?>">      
					<input type="hidden"  class="form-control"  name="NEWS_SUB" id="NEWS_SUB<?php echo $_POST['id'];?>" value="" readonly>
					<diV style="text-align:left;"><?php echo 'คุณต้องการลบชื่อ';?> <?php echo $_POST['sub'];?>  <?php echo 'ใช่หรือไม่';?> </div>
					<br>
				</div>
				<div class="modal-footer">
					<button type="button" id="close" class="btn btn-danger" data-dismiss="modal">ยกเลิก</button>
					<button type="submit" class="btn btn-success">ลบ</button>
				</div>
			</div>
		</div>
	</form>
</div>
<?php
	exit;
	}else if($_POST['chk_data'] == 'typeroom'){
	include '../connect/config.php'; 	
?>
<div class="modal fade bs-example-modal-lg" id="edit<?php echo $_POST['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display:none;">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close" onClick="window.location.reload()" ><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">แก้ไขข้อมูล</h4>
			</div>
			<form method="post"  id="form" name="form"  action="../save/manage_proc.php" enctype="multipart/form-data">
				<div class="modal-body">
					<input type="hidden" name="proc"  id="proc" value="edit"> 
					<input type="hidden" class="form-control" name="TYPE" id="TYPE" value="<?php echo $_POST['TYPE'];?>" required >
					<input type="hidden" class="form-control" name="LINK" id="LINK" value="<?php echo $_POST['CHK_TYPE'];?>" required >
					<input type="hidden" name="TYPEROOM_ID" id="TYPEROOM_ID" value="<?php echo $_POST['id'];?>">
					
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-3" style="text-align:right;">ชื่อประเภทห้อง :&nbsp;</div>
							<div class="col-md-9"><input type="text" class="form-control" style="width: 100%;" name="TYPEROOM_NAME" id="TYPEROOM_NAME<?php echo $_POST['id'];?>" value="<?php echo $_POST['val'];?>" placeholder="ชื่อ"  onblur="chk_date(this.id,this.value);" required ></div>
						</div>
						
						<div class="col-md-12">
							<br> 
							<div class="col-md-3" style="text-align:right;">ประเภทห้อง :&nbsp;</div>
							<div class="col-md-9" style="text-align:left;"><?php foreach($arr_roomtypestatus as $key => $value){ ?>
								<label class="radio-inline">
									<input type="radio" class="radio" name="TYPEROOM_SATUS" id="TYPEROOM_SATUS" placeholder="สถานะ" value="<?php echo $key?>"<?php echo $key == $_POST['satus']?"checked":""; ?>  required ><?php echo $value;?>
								</label>
							<?php } ?>
							</div>
						</div>
						
						<div class="col-md-12">
							<br> 
							<div class="col-md-3" style="text-align:right;">รายละเอียด :&nbsp;</div>
							<div class="col-md-9" style="text-align:left;"><textarea type="text" class="form-control" name="TYPEROOM_DETAIL" id="TYPEROOM_DETAIL" placeholder="รายละเอียด" onblur="" rows="3" required ><?php echo $_POST['detail'];?></textarea>
							</div>
						</div>
						
						<div class="col-md-12">
							<br> 
							<div class="col-md-3" style="text-align:right;">พื้นที่ห้อง :&nbsp;</div>
							<div class="col-md-9" style="text-align:left;"><input type="text" class="form-control" name="TYPEROOM_AREA" id="TYPEROOM_AREA" placeholder="พื้นที่ห้อง" value="<?php echo $_POST['area'];?>" required >
							</div>
						</div>
						
						<div class="col-md-12">
							<br> 
							<div class="col-md-3" style="text-align:right;">ขนาดเตียง :&nbsp;</div>
							<div class="col-md-9" style="text-align:left;"><input type="text" class="form-control" name="TYPEROOM_SIZE" id="TYPEROOM_SIZE" placeholder="ขนาดเตียง" value="<?php echo $_POST['size'];?>" required >
							</div>
						</div>
						
						<div class="col-md-12">
							<br> 
							<div class="col-md-3" style="text-align:right;">จำนวนเงิน :&nbsp;</div>
							<div class="col-md-9" style="text-align:left;"><input type="text" class="form-control" name="TYPEROOM_AMOUNT" id="TYPEROOM_AMOUNT" placeholder="จำนวนเงิน" value="<?php echo $_POST['amont'];?>" required >
							</div>
						</div>
						
						<div class="col-md-12">
							<br>
							<div class="col-md-3" style="text-align:right;">สถานะ :&nbsp;</div>
							<div class="col-md-9"style="text-align:left;">
								<?php foreach($arr_status as $key => $value){ ?>
									<label class="radio-inline">
										<input type="radio" class="radio" name="TYPEROOM_TSATUS" id="TYPEROOM_TSATUS" placeholder="สถานะ" value="<?php echo $key?>"<?php echo $key == $_POST['tsatus']?"checked":""; ?>  required ><?php echo $value;?>
									</label>
								<?php } ?>
							</div>
						</div>
						<div class="col-md-12">
							<br> 
							<div class="col-md-3" style="text-align:right;">รูปภาพห้อง :&nbsp;</div>
							<div class="col-md-9" style="text-align:left;">
								<td colspan="3" id="FILE_NAME_AREA">
									<a onclick="edit_file();" style="cursor:pointer">เพิ่มรูปภาพห้อง : <i class="fa fa-fw fa-file-image-o"></i></a>
									<div id="showedit_file">
										
									</div>
									<input type="hidden" name="num" id="num" class="form-control" value="<?php echo  $_POST['count_num'];?>" >
								</td>
								<br> 
							</div>
						</div>
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" id="close" class="btn btn-danger" data-dismiss="modal" onClick="window.location.reload()">ยกเลิก</button>
					<button type="submit" class="btn btn-success" onClick="window.location.reload()">แก้ไข</button>
				</div>
			</div>
		</div>
	</form>
</div>
</div>

<div class="modal fade " id="view<?php echo $_POST['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="box box-solid">
				<div class="box-header with-border">
					<h3 class="box-title">รูปภาพห้อง</h3>
					<button type="button"  id="close" class="close" data-dismiss="modal" aria-label="Close"onClick="window.location.reload()" ><span aria-hidden="true">&times;</span></button>
				</div>
				<!-- /.box-header -->
				<div class="box-body">
					<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<?php 
								$i = 1;
								$rows_roomimage = mysqli_query($con,"SELECT * FROM mannage_roomimage 
								WHERE TYPEROOM_ID ='".$_POST['id']."' ORDER BY IMAGE_ID ASC ");
								$num_rows = mysqli_num_rows($rows_roomimage);
								while($rec = mysqli_fetch_array($rows_roomimage)){ ?>
								<li data-target="#carousel-example-generic" data-slide-to="<?php echo $i;?>" class="<?php  echo $i =='1'?'active':''?>"></li>
								<?php 
									$i++;
								} ?>
						</ol>
						<div class="carousel-inner">
							<?php 
								$in = 1;
								$rows = mysqli_query($con,"SELECT * FROM mannage_roomimage 
								WHERE TYPEROOM_ID ='".$_POST['id']."' ORDER BY IMAGE_ID ASC ");
								$num = mysqli_num_rows($rows);
								while($rec_roomimage = mysqli_fetch_array($rows)){ ?>
								<div class="item <?php echo $in =='1'?'active':'';?>">
									<img src="../attach/<?php echo $rec_roomimage['IMAGE_NAME'];?>"  alt="" width="100%">
									<div class="carousel-caption">
									</div>
								</div>
								<?php 
									$in++;
								} ?>
						</div>
						<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
							<span class="fa fa-angle-left"></span>
						</a>
						<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
							<span class="fa fa-angle-right"></span>
						</a>
					</div>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</div>
</div>

<!-- Modal class del-->
<div class="modal fade bs-example-modal-lg" id="del<?php echo $_POST['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $_POST['id'];?>">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button"  id="close" class="close" data-dismiss="modal" aria-label="Close"onClick="window.location.reload()" ><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel<?php echo $_POST['id'];?>">ลบข้อมูล</h4>
			</div>
			<form method="post"  id="form" name="form"  action="../save/manage_proc.php">
				<div class="modal-body">
					<input type="hidden" name="proc"  id="proc" value="del"> 
					<input type="hidden" class="form-control" name="TYPE" id="TYPE" value="<?php echo $_POST['TYPE'];?>" required >
					<input type="hidden" class="form-control" name="LINK" id="LINK" value="<?php echo $_POST['CHK_TYPE'];?>" required >
					<input type="hidden" name="TYPEROOM_ID" id="TYPEROOM_ID" value="<?php echo $_POST['id'];?>">       
					<input type="hidden"  class="form-control"  name="TYPEROOM_NAME" id="TYPEROOM_NAME<?php echo $_POST['id'];?>" value="" readonly>
					<diV style="text-align:left;"><?php echo 'คุณต้องการลบชื่อ';?> <?php echo $_POST['val'];?>  <?php echo 'ใช่หรือไม่';?> </div>
					<br>
				</div>
				<div class="modal-footer">
					<button type="button" id="close" class="btn btn-danger" data-dismiss="modal"onClick="window.location.reload()">ยกเลิก</button>
					<button type="submit" class="btn btn-success">ลบ</button>
				</div>
			</div>
		</div>
	</form>
</div>
<script type="text/javascript" >
	$(document).ready(function() {
		$.ajax({
			url: 'chk_data.php',
			type: 'POST',
			dataType: 'html',
			data: {chk_data:'file',type:'', id:'<?php echo $_POST['id'];?>'},
			success: function(data) {
				$('#showedit_file').html(data);
			}
		});
		
	});
	function edit_file(){
		var id = parseInt($('#num').val());
		id++;
		$("#showedit_file").append('<div id="shw_file_'+id+'" class="form-group input-group "><input type="file" name="ROOMTYPE_FILE['+id+']" id="ROOMTYPE_FILE_'+id+'" value="" class="form-control" /><div class="input-group-addon btn btn-danger"><i class="fa fa-fw fa-trash " id="remove" onClick="editdel_file('+id+')" ></i></div></div>');
		$("#num").val(id);
	}
	function editdel_file(id){	
		if(confirm("คุณต้องการลบไฟล์นี้ใช่ไหม")){
			$("#shw_file_"+id).remove();
			$("#file_"+id).remove(); 	
			var i = parseInt($('#num').val());
			i-- ;
			$('#num').val(i);
			delete_flie($("#IMAGE_ID_"+id).val(),$("#ROOMTYPE_FILE_OLD_"+id).val());
		}
	}
	function delete_flie (id_image,image){
		idimage = typeof id_image !== 'undefined' ? id_image : '0';
		if(idimage != 0){
			$.ajax({
				url: 'chk_data.php',
				type: 'POST',
				dataType: 'html',
				data: {chk_data:'file',type:'del',id_image:id_image,image:image, id:'<?php echo $_POST['id'];?>'},
				success: function(data) {
					$('#showedit_file').html(data);
					
				}
			});
		}
	}
</script>
<?php
	exit;
	}else if($_POST['chk_data'] == 'room'){
	include '../connect/config.php'; 	
	$arr_building = array();
	$rows = mysqli_query($con,"SELECT * FROM manage_building  ORDER BY BUILDING_NAME DESC");			
	while($rec = mysqli_fetch_array($rows)){
		$arr_building[$rec['BUILDING_ID']] = $rec['BUILDING_NAME'];
		
	}
?>
<div class="modal fade bs-example-modal-lg" id="edit<?php echo $_POST['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display:none;">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close" onClick="window.location.reload()"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">แก้ไขข้อมูล</h4>
			</div>
			<form method="post"  id="form" name="form"  action="../save/manage_proc.php">
				<div class="modal-body">
					<input type="hidden" name="proc"  id="proc" value="edit"> 
					<input type="hidden" class="form-control" name="TYPE" id="TYPE" value="<?php echo $_POST['TYPE'];?>" required >
					<input type="hidden" class="form-control" name="LINK" id="LINK" value="<?php echo $_POST['CHK_TYPE'];?>" required >
					<input type="hidden" name="ROOM_ID" id="ROOM_ID" value="<?php echo $_POST['id'];?>">
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-2" style="text-align:right;">ชื่อตึก :</div>
							<div class="col-md-4" style="text-align:left;">
								<div id="BUILDING">
									<select name="BUILDING_ID" id="BUILDING_ID" class="selectpicker form-control"  data-live-search="true"   onChange="chk_date(); chk_list('CLASS',this.value);" >
										<option value="">--เลือก--</option>
										<?php foreach($arr_building as $val => $label){?>
											<option value="<?php echo $val;?>"<?php echo $val == $_POST['buiding']?"selected":""; ?>><?php echo $label;?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-2" style="text-align:right;">ชื่อชั้น :</div>
							<div class="col-md-4" style="text-align:left;">
								<div id="EDITCLASS">
									<select name="CLASS_ID" id="CLASS_ID" class="selectpicker form-control"  data-live-search="true"   onChange="chk_date();" >
										<option value="">--เลือก--</option>
										
									</select>
								</div>
							</div>
						</div>
						&nbsp;
						<div class="col-md-12">
							<div class="col-md-2" style="text-align:right;">ปรเภทห้องพัก :</div>
							<div class="col-md-4" style="text-align:left;">
								<div id="EDITYPEROOM">
									<select name="TYPEROOM_ID" id="TYPEROOM_ID" class="selectpicker form-control"  data-live-search="true"  onChange="chk_date();" >
										<option value="">--เลือก--</option>
									</select>
								</div>
							</div>
							<div class="col-md-2" style="text-align:right;">ชื่อห้อง :</div>
							<div class="col-md-4" style="text-align:left;">
								<input type="text" class="form-control" name="ROOM_NAME" id="ROOM_NAME" value="<?php echo $_POST['val']?>" required >
							</div>
						&nbsp;</div>
						&nbsp;
						<div class="col-md-12">
							<div class="col-md-2" style="text-align:right;">สถานะ :</div>
							<div class="col-md-4" style="text-align:left;"><?php foreach($arr_roomstatus as $key => $value){ ?>
								<label class="radio-inline">
									<input type="radio" class="radio" name="ROOM_STATUS" id="ROOM_STATUS" placeholder="สถานะ" value="<?php echo $key?>" required <?php echo $key == $_POST['status']?"checked":""; ?> ><?php echo $value;?>
								</label>
							<?php } ?>
							</div>
						</div>
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" id="close" class="btn btn-danger" data-dismiss="modal" onClick="window.location.reload()">ยกเลิก</button>
					<button type="submit" class="btn btn-success">แก้ไข</button>
				</div>
			</div>
		</div>
	</form>
</div>
</div>

<!-- Modal class del-->
<div class="modal fade bs-example-modal-lg" id="del<?php echo $_POST['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $_POST['id'];?>">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close"onClick="window.location.reload()"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel<?php echo $_POST['id'];?>">ลบข้อมูล</h4>
			</div>
			<form method="post"  id="form" name="form"  action="../save/manage_proc.php">
				<div class="modal-body">
					<input type="hidden" name="proc"  id="proc" value="del"> 
					<input type="hidden" class="form-control" name="TYPE" id="TYPE" value="<?php echo $_POST['TYPE'];?>" required >
					<input type="hidden" class="form-control" name="LINK" id="LINK" value="<?php echo $_POST['CHK_TYPE'];?>" required >
					<input type="hidden" name="ROOM_ID" id="ROOM_ID" value="<?php echo $_POST['id'];?>">       
					<input type="hidden"  class="form-control"  name="ROOM_NAME" id="ROOM_NAME<?php echo $_POST['id'];?>" value="" readonly>
					<diV style="text-align:left;"><?php echo 'คุณต้องการลบชื่อ';?> <?php echo $_POST['val'];?>  <?php echo 'ใช่หรือไม่';?> </div>
					<br>
				</div>
				<div class="modal-footer">
					<button type="button" id="close" class="btn btn-danger" data-dismiss="modal"onClick="window.location.reload()">ยกเลิก</button>
					<button type="submit" class="btn btn-success">ลบ</button>
				</div>
			</div>
		</div>
	</form>
</div>
<script type="text/javascript" >
	$(document).ready(function() {
		chk_list_class();
		chk_list_typeroom();
	});
	function chk_list_class(){
		$.ajax({
			url: 'chk_data.php',
			type: 'POST',
			dataType: 'html',
			data: {chk_data:'CLASS', data:'<?php echo  $_POST['buiding'];?>',selected:'<?php echo  $_POST['class_id'];?>'},
			success: function(data) {
				$('#EDITCLASS').html(data);
				$('.selectpicker').selectpicker();
				
			}
		});
	}	
	function chk_list_typeroom(){
		
		$.ajax({
			url: 'chk_data.php',
			type: 'POST',
			dataType: 'html',
			data: {chk_data:'TYPEROOM', data:'',selected:'<?php echo  $_POST['typeroom'];?>'},
			success: function(data) {
				$('#EDITYPEROOM').html(data);
				$('.selectpicker').selectpicker();
				
			}
		});
	}
</script>
<?php
	exit;
	}else if($_POST['chk_data'] == 'member'){
	include '../connect/config.php'; 	
?>
<div class="modal fade bs-example-modal-lg" id="edit<?php echo $_POST['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display:none;">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close" onClick="window.location.reload()"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">แก้ไขข้อมูล</h4>
			</div>
			<form method="post"  id="form" name="form"  action="../save/manage_proc.php">
				<div class="modal-body">
					<input type="hidden" name="proc"  id="proc" value="edit"> 
					<input type="hidden" class="form-control" name="TYPE" id="TYPE" value="<?php echo $_POST['TYPE'];?>" required >
					<input type="hidden" class="form-control" name="LINK" id="LINK" value="<?php echo $_POST['CHK_TYPE'];?>" required >
					<input type="hidden" name="MEMBER_ID" id="MEMBER_ID" value="<?php echo $_POST['id'];?>">
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-3" style="text-align:right;">ชื่อผู้ใช้งาน :&nbsp;</div>
							<div class="col-md-9"><input type="text" class="form-control" name="USERNAME" id="USERNAME" placeholder="ชื่อผู้ใช้งาน" value="<?php echo $_POST['user'];?>" onblur="chk_date(this.id,this.value);" required ><br> 
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3" style="text-align:right;">รหัสผู้ใช้งาน :&nbsp;</div>
							<div class="col-md-9"><input type="password" class="form-control PASSWORDEDIT" name="PASSWORD" id="PASSWORD" placeholder="รหัสผู้ใช้งาน" value="<?php echo $_POST['pass'];?>" onblur="chk_date(this.id,this.value);" required ><br> 
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3" style="text-align:right;">ยืนยันรหัสผู้ใช้งาน :&nbsp;</div>
							<div class="col-md-9"><input type="password" class="form-control PASSWORD2EDIT" name="PASSWORD2" id="PASSWORD2" placeholder="ยืนยันรหัสผู้ใช้งาน" value="<?php echo $_POST['pass'];?>" onblur="chk_date(this.id,this.value);  re_password('EDIT',this.value);" required ><br> 
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3" style="text-align:right;">ประเภทผู้ใช้งาน :&nbsp;</div>
							<div class="col-md-9"style="text-align:left;">
								<?php foreach($arr_member as $key => $value){ ?>
									<label class="radio-inline">
										<input type="radio" class="radio" name="MEMBER_TYPE" id="MEMBER_TYPE" placeholder="ประเภท" value="<?php echo $key?>" <?php echo $key == $_POST['type']?"checked":""; ?> required ><?php echo $value;?>
									</label>
								<?php } ?>
							</div>
							<br><br>
						</div>
						
						<div class="col-md-12">
							<div class="col-md-3" style="text-align:right;">ชื่อ :&nbsp;</div>
							<div class="col-md-9"><input type="text" class="form-control" name="FULLNAME" id="FULLNAME" placeholder="ชื่อ" value="<?php echo $_POST['name'];?>" onblur="chk_date(this.id,this.value);" required ><br> 
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3" style="text-align:right;">นามสกุล :&nbsp;</div>
							<div class="col-md-9"><input type="text" class="form-control" name="LASTNAME" id="LASTNAME" placeholder="นามสกุล" value="<?php echo $_POST['last'];?>" onblur="chk_date(this.id,this.value);" required ><br> 
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3" style="text-align:right;">ที่อยู่ :&nbsp;</div>
							<div class="col-md-9"><textarea type="text" class="form-control" name="ADDRESS" id="ADDRESS" placeholder="ที่อยู่" value="" onblur="chk_date(this.id,this.value);" required ><?php echo $_POST['address'];?></textarea><br> 
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3" style="text-align:right;">เบอร์โทร :&nbsp;</div>
							<div class="col-md-9"><input type="tel" class="form-control" name="TEL" id="TEL" placeholder="เบอร์โทร" value="<?php echo $_POST['tel'];?>" onblur="chk_date(this.id,this.value);" required ><br> 
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3" style="text-align:right;">อีเมลล์ :&nbsp;</div>
							<div class="col-md-9"><input type="email" class="form-control" name="EMAIL" id="EMAIL" placeholder="อีเมลล์" value="<?php echo $_POST['email'];?>" onblur="chk_date(this.id,this.value);" required ><br> 
							</div>
						</div>
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" id="close" class="btn btn-danger" data-dismiss="modal" onClick="window.location.reload()">ยกเลิก</button>
					<button type="submit" class="btn btn-success">แก้ไข</button>
				</div>
			</div>
		</div>
	</form>
</div>
</div>

<!-- Modal class del-->
<div class="modal fade bs-example-modal-lg" id="del<?php echo $_POST['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $_POST['id'];?>">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close"onClick="window.location.reload()"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel<?php echo $_POST['id'];?>">ลบข้อมูล</h4>
			</div>
			<form method="post"  id="form" name="form"  action="../save/manage_proc.php">
				<div class="modal-body">
					<input type="hidden" name="proc"  id="proc" value="del"> 
					<input type="hidden" class="form-control" name="TYPE" id="TYPE" value="<?php echo $_POST['TYPE'];?>" required >
					<input type="hidden" class="form-control" name="LINK" id="LINK" value="<?php echo $_POST['CHK_TYPE'];?>" required >
					<input type="hidden" name="MEMBER_ID" id="MEMBER_ID" value="<?php echo $_POST['id'];?>">       
					<input type="hidden"  class="form-control"  name="USERNAME" id="USERNAME<?php echo $_POST['id'];?>" value="" readonly>
					<diV style="text-align:left;"><?php echo 'คุณต้องการลบชื่อ';?> <?php echo $_POST['val'];?>  <?php echo 'ใช่หรือไม่';?> </div>
					<br>
				</div>
				<div class="modal-footer">
					<button type="button" id="close" class="btn btn-danger" data-dismiss="modal"onClick="window.location.reload()">ยกเลิก</button>
					<button type="submit" class="btn btn-success">ลบ</button>
				</div>
			</div>
		</div>
	</form>
</div>
<?php 
	exit; 
	}else if($_POST['chk_data'] == 'booking'){
	include '../connect/config.php'; 	
	
?>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {	
		$(".BOOKING_DATE").datetimepicker({
			timepicker:false,
			format:'d/m/Y',  // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000            
			lang:'th',  // แสดงภาษาไทย               
			yearOffset:543,  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
			closeOnDateSelect:true,
			onShow:function( ct ){
				this.setOptions({
					formatDate:'d/m/Y',
					maxDate:$('.DATE_STAY').val()?$('.DATE_STAY').val():false
				})
			},
		});
		$(".PAY_DATE").datetimepicker({
			timepicker:false,
			format:'d/m/Y',  // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000            
			lang:'th',  // แสดงภาษาไทย               
			yearOffset:543,  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
			closeOnDateSelect:true,
			onShow:function( ct ){
				this.setOptions({
					formatDate:'d/m/Y',
					minDate:$('.BOOKING_DATE').val()?$('.BOOKING_DATE').val():false,
					maxDate:$('.DATE_STAY').val()?$('.DATE_STAY').val():false
				})
			},
		}); 	
		
		$(".DATE_STAY").datetimepicker({
			timepicker:false,
			format:'d/m/Y',  // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000            
			lang:'th',  // แสดงภาษาไทย               
			yearOffset:543,  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
			closeOnDateSelect:true,
			onShow:function( ct ){
				this.setOptions({
					formatDate:'d/m/Y',
					minDate:$('.BOOKING_DATE').val()?$('.BOOKING_DATE').val():false,
					maxDate:$('.DATE_END').val()?$('.DATE_END').val():false
				})
			},
		}); 	
		
		$('.DATE_END').datetimepicker({
			timepicker:false,
			format:'d/m/Y',  // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000            
			lang:'th',  // แสดงภาษาไทย               
			yearOffset:543,  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
			closeOnDateSelect:true,
			onShow:function( ct ){
				this.setOptions({
					formatDate:'d/m/Y',
					minDate:$('.DATE_STAY').val()?$('.DATE_STAY').val():false
				})
			},
		});
		$("[id^=TYPEROOM_ID]").trigger('change');
		
	});	 
</script>
<div class="modal fade bs-example-modal-lg" id="edit<?php echo $_POST['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display:none;">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close" onClick="window.location.reload()"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">แก้ไขข้อมูล</h4>
			</div>
			<form method="post"  id="form" name="form"  action="../save/manage_proc.php">
				<div class="modal-body">
					<input type="hidden" name="proc"  id="proc" value="edit"> 
					<input type="hidden" class="form-control" name="TYPE" id="TYPE" value="<?php echo $_POST['TYPE'];?>" required >
					<input type="hidden" class="form-control" name="LINK" id="LINK" value="<?php echo $_POST['CHK_TYPE'];?>" required >
					<input type="hidden" name="BOOKING_ID" id="BOOKING_ID" value="<?php echo $_POST['id'];?>">
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-2" style="text-align:right;">วันที่จอง :&nbsp;</div>
							<div class="col-md-4">	
								<div class="form-group input-group ">
									<input type="text" name="BOOKING_DATE" id="BOOKING_DATE" class="form-control BOOKING_DATE" value="<?php echo date_to_db($_POST['booking_date']);?>" readonly  >
									<span class="input-group-addon "><span class="glyphicon glyphicon-calendar "></span> </span>
								</div>
							</div>
							<div class="col-md-2" style="text-align:right;">วันที่จ่ายเงิน :&nbsp;</div>
							<div class="col-md-4">	
								<div class="form-group input-group ">
									<input type="text" name="PAY_DATE" id="PAY_DATE" class="form-control PAY_DATE" value="<?php echo $_POST['pay_date']=='0000-00-00'?'':date_to_db($_POST['pay_date']);?>" readonly>
									<span class="input-group-addon "><span class="glyphicon glyphicon-calendar "></span> </span>
								</div>
							</div>
						</div>
						<br/><br/>
						<div class="col-md-12">
							<div class="col-md-2" style="text-align:right;">วันที่เข้าพัก :&nbsp;</div>
							<div class="col-md-4">	
								<div class="form-group input-group ">
									<input type="text" name="DATE_STAY" id="DATE_STAY" class="form-control DATE_STAY" 
									value="<?php echo date_to_db($_POST['date_stay']);?>" readonly>
									<span class="input-group-addon "><span class="glyphicon glyphicon-calendar "></span> </span>
								</div>
							</div>
							
							<div class="col-md-2" style="text-align:right;">ถึงวันที่:&nbsp;</div>
							<div class="col-md-4">	
								<div class="form-group input-group ">
									<input type="text" name="DATE_END" id="DATE_END" class="form-control DATE_END" 
									value="<?php echo date_to_db($_POST['date_end']);?>" readonly  >
									<span class="input-group-addon "><span class="glyphicon glyphicon-calendar "></span> </span>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-2" style="text-align:right;">ชื่อผู้จอง :</div>
							<div class="col-md-4" style="text-align:left;">
								<select name="MEMBER_ID" id="MEMBER_ID" class="selectpicker form-control"  data-live-search="true"   onChange="chk_date();" required>
									<option value="">--เลือก--</option>
									<?php foreach($arr_membername as $val => $label){?>
										<option value="<?php echo $val;?>"<?php echo $val == $_POST['val']?"selected":""; ?> required ><?php echo $label;?></option>
									<?php } ?>
								</select>
							</div>
							
							<div class="col-md-2" style="text-align:right;">ปรเภทห้องพัก :</div>
							<div class="col-md-4" style="text-align:left;">
								<select name="TYPEROOM_ID" id="TYPEROOM_ID" class="selectpicker form-control"  data-live-search="true"   onChange="chk_date(); tableroom(this.id,this.value,'<?php echo $_POST['id'];?>','EDIT');" required >
									<option value="">--เลือก--</option>
									<?php foreach($arr_typeroom as $val => $label){?>
										<option value="<?php echo $val;?>"<?php echo $val == $_POST['typeroom']?"selected":""; ?> ><?php echo $label;?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<br/><br/>
						<div class="col-md-12">
							<br/>
							<div class="col-md-2" style="text-align:right;">ห้องพัก :</div>
							<div class="col-md-10" style="text-align:left;">
								<div id="TABLEROOMEDIT">
								</div>
							</div>
						</div>
						
						<div class="col-md-12">
							<br/>
							<div class="col-md-2" style="text-align:right;">จำนวนเงิน :&nbsp;</div>
							<div class="col-md-4">	
								<div class="form-group input-group ">
									<input type="text" name="SUM_AMOUNT" id="SUM_AMOUNT" class="i-number2 form-control" value="<?php echo number_format($_POST['sum_amount'],2);?>" style="text-align:right;" >
								</div>
							</div>
							<div class="col-md-2" style="text-align:right;">สถานะ :</div>
							<div class="col-md-4" style="text-align:left;">
								<?php foreach($arr_statusbooking as $key => $value){ ?>
									<label class="radio-inline">
										<input type="radio" class="radio" name="BOOKING_STATUS" id="BOOKING_STATUS" placeholder="สถานะ" value="<?php echo $key?>" <?php echo $key==$_POST['satus']?'checked':'';?> required ><?php echo $value;?>
									</label>
								<?php } ?>
							</div>
						</div>
						<br/><br/>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="close" class="btn btn-danger" data-dismiss="modal" onClick="window.location.reload()">ยกเลิก</button>
					<button type="submit" class="btn btn-success">แก้ไข</button>
				</div>
			</div>
		</div>
	</form>
</div>
</div>

<!-- Modal class del-->
<div class="modal fade bs-example-modal-lg" id="del<?php echo $_POST['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $_POST['id'];?>">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close"onClick="window.location.reload()"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel<?php echo $_POST['id'];?>">ลบข้อมูล</h4>
			</div>
			<form method="post"  id="form" name="form"  action="../save/manage_proc.php">
				<div class="modal-body">
					<input type="hidden" name="proc"  id="proc" value="del"> 
					<input type="hidden" class="form-control" name="TYPE" id="TYPE" value="<?php echo $_POST['TYPE'];?>" required >
					<input type="hidden" class="form-control" name="LINK" id="LINK" value="<?php echo $_POST['CHK_TYPE'];?>" required >
					<input type="hidden" name="BOOKING_ID" id="BOOKING_ID" value="<?php echo $_POST['id'];?>">
					<diV style="text-align:left;"><?php echo 'คุณต้องการลบใช่หรือไม่';?> </div>
					<br>
				</div>
				<div class="modal-footer">
					<button type="button" id="close" class="btn btn-danger" data-dismiss="modal"onClick="window.location.reload()">ยกเลิก</button>
					<button type="submit" class="btn btn-success">ลบ</button>
				</div>
			</div>
		</div>
	</form>
</div>
<div class="modal fade bs-example-modal-lg" id="view<?php echo $_POST['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $_POST['id'];?>">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close"onClick="window.location.reload()"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel<?php echo $_POST['id'];?>">ดูข้อมูล</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" name="proc"  id="proc" value="view"> 
				<input type="hidden" class="form-control" name="TYPE" id="TYPE" value="<?php echo $_POST['TYPE'];?>" required >
				<input type="hidden" class="form-control" name="LINK" id="LINK" value="<?php echo $_POST['CHK_TYPE'];?>" required >
				<div class="table-responsive">
					<table id="example1" class="table table-bordered table-hover table-striped dataTable" >
						<thead>
							<tr class="bg-navy-active color-palette">
								<th style="text-align:center; width:10%;">ลำดับ</th>
								<th style="text-align:center; width:85%;">ชื่อห้อง</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$i =1;
								$rows_room = mysqli_query($con,"SELECT ROOM_NAME 
								FROM manage_bookingdetail B INNER JOIN manage_room A ON A.ROOM_ID = B.ROOM_ID
								WHERE B.BOOKING_ID ='".$_POST['id']."' 
								ORDER BY B.BOOKING_ID ASC ");
								$num_rows = mysqli_num_rows($rows_room);
								while($rec = mysqli_fetch_array($rows_room)){ 
									
									
								?>
								<tr class="" >
									<td style="text-align:center;" class=""><?php echo $i;?></td>
									<td style="text-align:left;"><?php echo $rec['ROOM_NAME'];?></td>
								</tr>	
								<?php
									$i++;
								}
							?>
						</tbody>
					</table>
				</div>
				<br>
			</div>
			<div class="modal-footer">
				<button type="button" id="close" class="btn btn-danger" data-dismiss="modal"onClick="window.location.reload()">ยกเลิก</button>
			</div>
		</div>
	</div>
</div>

<?php 
	exit; 
	}else if($_POST['chk_data'] == 'satisfac'){
	include '../connect/config.php'; 	
	
?>

<div class="modal fade bs-example-modal-lg" id="edit<?php echo $_POST['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display:none;">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close" onClick="window.location.reload()"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">แก้ไขข้อมูล</h4>
			</div>
			<form method="post"  id="form" name="form"  action="../save/manage_proc.php">
				<div class="modal-body">
					<input type="hidden" name="proc"  id="proc" value="edit"> 
					<input type="hidden" class="form-control" name="TYPE" id="TYPE" value="<?php echo $_POST['TYPE'];?>" required >
					<input type="hidden" class="form-control" name="LINK" id="LINK" value="<?php echo $_POST['CHK_TYPE'];?>" required >
					<input type="hidden" name="SATIS_ID" id="SATIS_ID" value="<?php echo $_POST['id'];?>">
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-2" style="text-align:right;">ชื่อผู้จอง :</div>
							<div class="col-md-4" style="text-align:left;">
								<div id="MEMBER">
									<select name="MEMBER_ID" id="MEMBER_IDEDIT" class="selectpicker form-control"  data-live-search="true"   onChange="chk_date();member(this.value,'EDIT');" required>
										<option value="">--เลือก--</option>
										<?php foreach($arr_rec_satis as $val => $label){?>
											<option value="<?php echo $val;?>" <?php echo $val==$_POST['val']?'selected':'';?> ><?php echo $label;?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-2" style="text-align:right;">ปรเภทห้องพัก :</div>
							<div class="col-md-4" style="text-align:left;">
								<div id="TYPEROOMSATISFACEDIT">
									<select name="TYPEROOM_ID" id="TYPEROOM_ID" class="selectpicker form-control"  data-live-search="true" >
										<option value="">--เลือก--</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<h3 align="center">แบบสอบถามความพึงพอใจต่อการใช้บริการห้องพัก</h3>
							<br/>
							<div class="table-responsive">
								<table width="100%" border="1" align="center" >
									<tr>
										<td width="75%" rowspan="2" align="center"><strong>รายการ</strong></td>
										<td colspan="5" align="center"><strong>ระดับความคิดเห็น</strong></td>
									</tr>
									<tr>
										<?php for($i=5; $i>=1;$i--){ ?>
											<td width="5%" align="center"><strong><?php echo $i;?></strong></td>
										<?php } ?>
									</tr>
									<?php foreach($arr_satisfaction_head as $key1 => $value){?>
										<tr style="text-align:left;">
											<td height="30" colspan="6" bgcolor="#F4F4F4"><strong> &nbsp;<?php echo $value;?></strong></td>
										</tr>
										<?php foreach($arr_satisfaction_body[$key1] as $key => $value){?>
											<tr style="text-align:left;">
												<td height="30">&nbsp; <?php echo $key.'.'.$value;?></td>
												<?php for($i=5; $i>=1;$i--){ ?>
													<td height="30" align="center">
													<input type="radio" id="SATIS<?php echo $key1.'_'.$key;?>" name="SATIS[<?php echo $key1.'_'.$key;?>]"  <?php echo $i ==$_POST['SATIS'][$key1.'_'.$key]?'checked':'';?> value="<?php echo $i;?>" required="required" /></td>
												<?php } ?>
											</tr>
											<?php }
										} ?>
								</table>
							</div>
						</div>
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" id="close" class="btn btn-danger" data-dismiss="modal" onClick="window.location.reload()">ยกเลิก</button>
					<button type="submit" class="btn btn-success">แก้ไข</button>
				</div>
			</div>
		</div>
	</form>
</div>
</div>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {	
		$("#MEMBER_IDEDIT").trigger('change');	
	});	 
</script>
<!-- Modal class del-->
<div class="modal fade bs-example-modal-lg" id="del<?php echo $_POST['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $_POST['id'];?>">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close"onClick="window.location.reload()"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel<?php echo $_POST['id'];?>">ลบข้อมูล</h4>
			</div>
			<form method="post"  id="form" name="form"  action="../save/manage_proc.php">
				<div class="modal-body">
					<input type="hidden" name="proc"  id="proc" value="del"> 
					<input type="hidden" class="form-control" name="TYPE" id="TYPE" value="<?php echo $_POST['TYPE'];?>" required >
					<input type="hidden" class="form-control" name="LINK" id="LINK" value="<?php echo $_POST['CHK_TYPE'];?>" required >
					<input type="hidden" name="SATIS_ID" id="SATIS_ID" value="<?php echo $_POST['id'];?>">       
					<input type="hidden"  class="form-control"  name="MEMBER_ID" id="MEMBER_ID<?php echo $_POST['val'];?>" value="" readonly>
					<diV style="text-align:left;"><?php echo 'คุณต้องการลบข้อมูลนี้ใช่หรือไม่';?> </div>
					<br>
				</div>
				<div class="modal-footer">
					<button type="button" id="close" class="btn btn-danger" data-dismiss="modal"onClick="window.location.reload()">ยกเลิก</button>
					<button type="submit" class="btn btn-success">ลบ</button>
				</div>
			</div>
		</div>
	</form>
</div>
<?php 
	exit; 
	}else if($_POST['chk_data'] == 'login'){
	include '../connect/config.php'; 
?>
<!-- Modal class login-->
<div class="modal fade bs-example-modal-lg" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close"onClick="window.location.reload()"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">เข้าสู่ระบบ</h4>
			</div>
			<form method="post"  id="form2" name="form2">
				<div class="modal-body">
					<div class="row">
						<div class="col-md-1">
						<button class=" btn btn-primary btn-xs "><i class="glyphicon btn-glyphicon  glyphicon-user fa-xs img-circle text-primary"></i></button></div>
						<div class="col-md-11">
						<input type="text" class="form-control" name="username" placeholder="Username" id="username"   maxlength="" required autofocus></div></div><br>
						<div class="row">
							<div class="col-md-1">
								<button class="btn btn-primary btn-xs">
								<i class="glyphicon btn-glyphicon glyphicon-lock fa-xs img-circle text-primary" for="key" class="sr-only" ></i></button></div>
								<div class="col-md-11">
								<input type="password" class="form-control" name="password"  id="password" placeholder="Password" maxlength="" required> </div></div>
								<div class="form-group has-success">
									<br>
									<div class="col-md-0"></div><div class="col-md-5">                        
										<label class="checkbox-inline">
											<input type="checkbox" id="inlineCheckbox1" value="option1" onclick="showPassword()">โชว์รหัสผ่าน
										</label></div>
								</div>
								
								<div class="form-group">
									<button class="btn btn-primary btn-lg btn-block" type="button" onClick="chk_login();"><span class="glyphicon btn-glyphicon glyphicon-log-in fa-lg img-circle text-primary"></span> เข้าสู่ระบบ</button>
									<span class="pull-left"><a href="" data-toggle="modal" data-target="#repassword">
									ลืมรหัสผ่าน</a></span>
									<span class="pull-right"><a href="" data-toggle="modal" data-target="#register">
									สมัครสมาชิก</a></span>
								</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="close" class="btn btn-danger" data-dismiss="modal"onClick="window.location.reload()">ยกเลิก</button>
				</div>
			</div>
		</div>
	</form>

	<link href="css/font-awesome-login.css" rel="stylesheet"><!-- Font-awesome-CSS --> 
<link href="css/style-login.css" rel='stylesheet' type='text/css'/><!-- style.css --> 
<link href="//fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Basic Login Form Responsive Widget,Login form widgets, Sign up Web forms , Login signup Responsive web form,Flat Pricing table,Flat Drop downs,Registration Forms,News letter Forms,Elements" />
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<script src="js/jquery.min.js"></script>
		<script>$(document).ready(function(c) {
		$('.alert-close').on('click', function(c){
			$('.main-agile').fadeOut('slow', function(c){
				$('.main-agile').remove();
			});
		});	  
	});
	</script>
</head>
<body>
	<h1>BR Homestay : Account</h1>
	<div class="main-agile">
		<div class="alert-close"> </div>
		<div class="content-wthree">
		<div class="circle-w3layouts"></div>
			<h2>เข้าสู่ระบบ</h2>
			<form action="#" method="post">
								<div class="inputs-w3ls">
									<i class="fa fa-user" aria-hidden="true"></i>
									<input type="text" name="username" placeholder="Username" required=""/>
								</div>
								<div class="inputs-w3ls">
									<i class="fa fa-key" aria-hidden="true"></i>
									<input type="password" name="password" placeholder="Password" required=""/>
								</div>
									<input type="submit" onClick="chk_login();" value="เข้าสู่ระบบ"> 
									<div class="wthree-text"> 
										<ul> 
											<li>
												<a href="">ลืมรหัสผ่าน</a> 
												<li>
													<a href="register.php">สมัครสมาชิก</a>
												</li> 
											</li>
											
										</ul>
									</div>  
								</form>
		</div>
	</div>	



</div>
<script type="text/javascript">
	$(document).ready(function(){
		$(".toggle-password").click(function() {
			
			$(this).toggleClass("fa-eye fa-eye-slash");
			var input = $($(this).attr("toggle"));
			if (input.attr("type") == "password") {
				input.attr("type", "text");
				} else {
				input.attr("type", "password");
			}
		});
		
		
	});
	function showPassword() {
		
		var key_attr = $('#password').attr('type');
		
		if(key_attr != 'text') {
			
			$('.checkbox').addClass('show');
			$('#password').attr('type', 'text');
			
			} else {
			
			$('.checkbox').removeClass('show');
			$('#password').attr('type', 'password');
			
		}
		
	}
	function chk_login(){
		
		var username = $('#username').val();
		var password =  $('#password').val();
		$.ajax({
			url: '../system/form/chk_data.php',
			type: 'POST',
			dataType: 'html',
			data: {chk_data:'chk_login',username:username.trim(),password:password.trim()},
			success: function(data) {
				var txt =  data.split("#");
				if(txt[1] == 1){
					if(txt[0] == 1){
						window.location.href = '../system/form/index.php';
						}else{
						window.location.href = '../system/<?php echo $_POST['CHK_TYPE'];?>';
					}
					}else{
					alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง!');
					return false;
				}
			}
		});
	}	
	function password(chk){
		
		$.ajax({
			url: '../system/form/chk_data.php',
			type: 'POST',
			dataType: 'html',
			data: {chk_data:'password',username:chk.trim()},
			success: function(data) {
				alert(data.trim());
			}
		});
	}
	function member_password (id,value) {
		// alert(id);
		var password = $('.PASSWORDMEMBER').val();
		if ($('.PASSWORDMEMBER').val() == ''){
			alert('กรุณาระบุรหัสผู้ใช้งานก่อน');
			$('.PASSWORDMEMBER').focus();
			$('.PASSWORDMEMBER2').val('');
			return false;
		} 
		if(value != password){
			alert('ยืนยันรหัสผู้ใช้งานไม่ถูกต้อง');
			$('.PASSWORDMEMBER2').val('');
			return false;
		}
	}
</script>
<style type="text/css">
	.field-icon {
	float: right;
	margin-left: -25px;
	margin-top: -25px;
	position: relative;
	z-index: 2;
	}
</style>
<div class="modal fade bs-example-modal-lg" id="register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display:none;">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close" onClick="window.location.reload()"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">แก้ไขข้อมูล</h4>
			</div>
			<form method="post"  id="form" name="form"  action="../system/save/manage_proc.php">
				<div class="modal-body">
					<input type="hidden" name="proc"  id="proc" value="<?php echo $_POST['proc'];?>"> 
					<input type="hidden" class="form-control" name="TYPE" id="TYPE" value="<?php echo $_POST['TYPE'];?>" required >
					<input type="hidden" class="form-control" name="LINK" id="LINK" value="<?php echo $_POST['CHK_TYPE'];?>" required >
					<input type="hidden" name="MEMBER_ID" id="MEMBER_ID" value="<?php echo $_POST['id']?>">
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-3" style="text-align:right;">ชื่อผู้ใช้งาน :&nbsp;</div>
							<div class="col-md-9"><input type="text" class="form-control" name="USERNAME" id="USERNAME" placeholder="ชื่อผู้ใช้งาน" value="<?php echo $_POST['user']?>" onblur="chk_date(this.id,this.value);" required ><br> 
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3" style="text-align:right;">รหัสผู้ใช้งาน :&nbsp;</div>
							<div class="col-md-9"><div class="form-group"><input type="password" class="form-control PASSWORDMEMBER" name="PASSWORD" id="PASSWORD" placeholder="รหัสผู้ใช้งาน" value="<?php echo $_POST['pass']?>" onblur="chk_date(this.id,this.value);" required ><span toggle="#PASSWORD" class="fa fa-fw fa-eye field-icon toggle-password"></span><br> 
							</div></div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3" style="text-align:right;">ยืนยันรหัสผู้ใช้งาน :&nbsp;</div>
							<div class="col-md-9"><input type="password" class="form-control PASSWORDMEMBER2" name="PASSWORD2" id="PASSWORD2" placeholder="ยืนยันรหัสผู้ใช้งาน" value="<?php echo $_POST['pass']?>" onblur="chk_date(this.id,this.value);  member_password('PASSWORDMEMBER',this.value);" required ><span toggle="#PASSWORD2" class="fa fa-fw fa-eye field-icon toggle-password"></span><br> 
							</div>
						</div>
						<div class="col-md-12" style="display:none;">
							<div class="col-md-3" style="text-align:right;">ประเภทผู้ใช้งาน :&nbsp;</div>
							<div class="col-md-9"style="text-align:left;">
								<input type="text" class="form-control" name="MEMBER_TYPE" id="MEMBER_TYPE" placeholder="ประเภท" value="2" onblur="chk_date(this.id,this.value);" required >
							</div>
							<br><br>
						</div>
						
						<div class="col-md-12">
							<div class="col-md-3" style="text-align:right;">ชื่อ :&nbsp;</div>
							<div class="col-md-9"><input type="text" class="form-control" name="FULLNAME" id="FULLNAME" placeholder="ชื่อ" value="<?php echo $_POST['name']?>" onblur="chk_date(this.id,this.value);" required ><br> 
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3" style="text-align:right;">นามสกุล :&nbsp;</div>
							<div class="col-md-9"><input type="text" class="form-control" name="LASTNAME" id="LASTNAME" placeholder="นามสกุล" value="<?php echo $_POST['last']?>" onblur="chk_date(this.id,this.value);" required ><br> 
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3" style="text-align:right;">ที่อยู่ :&nbsp;</div>
							<div class="col-md-9"><textarea type="text" class="form-control" name="ADDRESS" id="ADDRESS" placeholder="ที่อยู่" value="" onblur="chk_date(this.id,this.value);" required ><?php echo $_POST['address']?></textarea><br> 
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3" style="text-align:right;">เบอร์โทร :&nbsp;</div>
							<div class="col-md-9"><input type="tel" class="form-control" name="TEL" id="TEL" placeholder="เบอร์โทร" value="<?php echo $_POST['tel']?>" onblur="chk_date(this.id,this.value);" required ><br> 
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3" style="text-align:right;">อีเมลล์ :&nbsp;</div>
							<div class="col-md-9"><input type="email" class="form-control" name="EMAIL" id="EMAIL" placeholder="อีเมลล์" value="<?php echo $_POST['email']?>" onblur="chk_date(this.id,this.value);" required ><br> 
							</div>
						</div>
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" id="close" class="btn btn-danger" data-dismiss="modal" onClick="window.location.reload()">ยกเลิก</button>
					<button type="submit" class="btn btn-success">แก้ไข</button>
				</div>
			</div>
		</div>
	</form>
</div>
</div>
<div class="modal fade" id="repassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"onClick="window.location.reload()"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">กรุณาใส่ข้อมูล</h4>
			</div>
			<div class="modal-body">
				
				<input type="text" class="form-control" name="Tusername" id="Tusername"  placeholder="ชื่อผู้ใช้งาน" onblur="password(this.value);" required autofocus><br>
			</div>
			<div class="modal-footer">
				<button type="button" id="close" class="btn btn-danger" data-dismiss="modal" onClick="window.location.reload()">ยกเลิก</button>
			</div>
		</div>
	</div>
</div>

<?php 
	exit; 
	}else if($_POST['chk_data'] == 'memberbooking'){
	include '../connect/config.php'; 	
	
?>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {	
		$(".BOOKING_DATE").datetimepicker({
			timepicker:false,
			format:'d/m/Y',  // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000            
			lang:'th',  // แสดงภาษาไทย               
			yearOffset:543,  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
			closeOnDateSelect:true,
			onShow:function( ct ){
				this.setOptions({
					formatDate:'d/m/Y',
					maxDate:$('.DATE_STAY').val()?$('.DATE_STAY').val():false
				})
			},
		});
		$(".PAY_DATE").datetimepicker({
			timepicker:false,
			format:'d/m/Y',  // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000            
			lang:'th',  // แสดงภาษาไทย               
			yearOffset:543,  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
			closeOnDateSelect:true,
			onShow:function( ct ){
				this.setOptions({
					formatDate:'d/m/Y',
					minDate:$('.BOOKING_DATE').val()?$('.BOOKING_DATE').val():false,
					maxDate:$('.DATE_STAY').val()?$('.DATE_STAY').val():false
				})
			},
		}); 	
		
		$(".DATE_STAY").datetimepicker({
			timepicker:false,
			format:'d/m/Y',  // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000            
			lang:'th',  // แสดงภาษาไทย               
			yearOffset:543,  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
			closeOnDateSelect:true,
			onShow:function( ct ){
				this.setOptions({
					formatDate:'d/m/Y',
					minDate:$('.BOOKING_DATE').val()?$('.BOOKING_DATE').val():false,
					maxDate:$('.DATE_END').val()?$('.DATE_END').val():false
				})
			},
		}); 	
		
		$('.DATE_END').datetimepicker({
			timepicker:false,
			format:'d/m/Y',  // กำหนดรูปแบบวันที่ ที่ใช้ เป็น 00-00-0000            
			lang:'th',  // แสดงภาษาไทย               
			yearOffset:543,  // ใช้ปี พ.ศ. บวก 543 เพิ่มเข้าไปในปี ค.ศ
			closeOnDateSelect:true,
			onShow:function( ct ){
				this.setOptions({
					formatDate:'d/m/Y',
					minDate:$('.DATE_STAY').val()?$('.DATE_STAY').val():false
				})
			},
		});
		$("[id^=TYPEROOM_ID]").trigger('change');
		
	});	
	
</script>
<div class="modal fade bs-example-modal-lg" id="myModalbooking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display:none;">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close" onClick="window.location.reload()"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">กรุณาใส่ข้อมูล</h4>
			</div>
			<form method="post"  id="form" name="form"  action="../system/save/manage_proc.php">
				<div class="modal-body">
					<input type="hidden" name="proc"  id="proc" value="<?php echo $_POST['proc']?>"> 
					<input type="hidden" class="form-control" name="TYPE" id="TYPE" value="<?php echo $_POST['TYPE'];?>" required >
					<input type="hidden" class="form-control" name="LINK" id="LINK" value="<?php echo $_POST['CHK_TYPE'];?>" required >
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-2" style="text-align:right;">วันที่จอง :&nbsp;</div>
							<div class="col-md-4">	
								<div class="form-group input-group ">
									<input type="text" name="BOOKING_DATE" id="BOOKING_DATE" class="form-control BOOKING_DATE" value="<?php echo  date('d/m/').(date('Y')+543);?>" readonly  >
									<span class="input-group-addon "><span class="glyphicon glyphicon-calendar "></span> </span>
								</div>
							</div>
							<div class="col-md-2" style="text-align:right;">วันที่จ่ายเงิน :&nbsp;</div>
							<div class="col-md-4">	
								<div class="form-group input-group ">
									<input type="text" name="PAY_DATE" id="PAY_DATE" class="form-control PAY_DATE" value="" readonly>
									<span class="input-group-addon "><span class="glyphicon glyphicon-calendar "></span> </span>
								</div>
							</div>
						</div>
						<br/><br/>
						<div class="col-md-12">
							<div class="col-md-2" style="text-align:right;">วันที่เข้าพัก :&nbsp;</div>
							<div class="col-md-4">	
								<div class="form-group input-group ">
									<input type="text" name="DATE_STAY" id="DATE_STAY" class="form-control DATE_STAY" 
									value="<?php echo  date('d/m/').(date('Y')+543);?>" readonly>
									<span class="input-group-addon "><span class="glyphicon glyphicon-calendar "></span> </span>
								</div>
							</div>
							
							<div class="col-md-2" style="text-align:right;">ถึงวันที่:&nbsp;</div>
							<div class="col-md-4">	
								<div class="form-group input-group ">
									<input type="text" name="DATE_END" id="DATE_END" class="form-control DATE_END" 
									value="<?php echo  date('d/m/').(date('Y')+543);?>" readonly  >
									<span class="input-group-addon "><span class="glyphicon glyphicon-calendar "></span> </span>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-2" style="text-align:right;">ชื่อผู้จอง :</div>
							<div class="col-md-4" style="text-align:left;">
							    <?php echo $arr_membername[$_POST['val']];?>
								<select name="MEMBER_ID" id="MEMBER_ID" class="selectpicker form-control"  data-live-search="true"   onChange="chk_date();" >
									<option value="">--เลือก--</option>
									<?php foreach($arr_membername as $val => $label){?>
										<option value="<?php echo $val;?>"<?php echo $val == $_POST['val']?"selected":""; ?>><?php echo $label;?></option>
									<?php } ?>
								</select>
							</div>
							
							<div class="col-md-2" style="text-align:right;">ปรเภทห้องพัก :</div>
							<div class="col-md-4" style="text-align:left;">
								<?php echo $arr_typeroom[$_POST['typeroom']];?>
								<select name="TYPEROOM_ID" id="TYPEROOM_ID" class="selectpicker form-control"  data-live-search="true"   onChange="chk_date(); tableroom(this.id,this.value,'','SAVE');" required >
									<option value="">--เลือก--</option>
									<?php foreach($arr_typeroom as $val => $label){?>
										<option value="<?php echo $val;?>"<?php echo $val == $_POST['typeroom']?"selected":""; ?> ><?php echo $label;?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<br/><br/>
						<div class="col-md-12">
							<br/>
							<div class="col-md-2" style="text-align:right;">ห้องพัก :</div>
							<div class="col-md-10" style="text-align:left;">
								<div id="TABLEROOMSAVE">
								</div>
							</div>
						</div>
						
						<div class="col-md-12">
							<br/>
							<div class="col-md-2" style="text-align:right;">จำนวนเงิน :&nbsp;</div>
							<div class="col-md-4">	
								<div class="form-group input-group ">
									<input type="text" name="SUM_AMOUNT" id="SUM_AMOUNT" class="i-number2 form-control" value="<?php echo number_format($_POST['sum_amount'],2);?>" style="text-align:right;" readonly >
								</div>
							</div>
							<div class="col-md-2" style="text-align:right;display:none;">สถานะ :</div>
							<div class="col-md-4" style="text-align:left;display:none;">
								<?php foreach($arr_statusbooking as $key => $value){ ?>
									<label class="radio-inline">
										<input type="radio" class="radio" name="BOOKING_STATUS" id="BOOKING_STATUS" placeholder="สถานะ" value="<?php echo $key?>" <?php echo $key==$_POST['satus']?'checked':'';?> required ><?php echo $value;?>
									</label>
								<?php } ?>
							</div>
						</div>
						<br/><br/>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="close" class="btn btn-danger" data-dismiss="modal" onClick="window.location.reload()">ยกเลิก</button>
					<button type="submit" class="btn btn-success">แก้ไข</button>
				</div>
			</div>
		</div>
	</form>
</div>
</div>

<div class="modal fade bs-example-modal-lg" id="view<?php echo $_POST['id'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel<?php echo $_POST['id'];?>">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close"onClick="window.location.reload()"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel<?php echo $_POST['id'];?>">ดูข้อมูล</h4>
			</div>
			<div class="modal-body">
				<input type="hidden" name="proc"  id="proc" value="view"> 
				<input type="hidden" class="form-control" name="TYPE" id="TYPE" value="<?php echo $_POST['TYPE'];?>" required >
				<input type="hidden" class="form-control" name="LINK" id="LINK" value="<?php echo $_POST['CHK_TYPE'];?>" required >
				<div class="table-responsive">
					<table id="example1" class="table table-bordered table-hover table-striped dataTable" >
						<thead>
							<tr class="bg-navy-active color-palette">
								<th style="text-align:center; width:10%;">ลำดับ</th>
								<th style="text-align:center; width:85%;">ชื่อห้อง</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$i =1;
								$rows_room = mysqli_query($con,"SELECT ROOM_NAME 
								FROM manage_bookingdetail B INNER JOIN manage_room A ON A.ROOM_ID = B.ROOM_ID
								WHERE B.BOOKING_ID ='".$_POST['id']."' 
								ORDER BY B.BOOKING_ID ASC ");
								$num_rows = mysqli_num_rows($rows_room);
								while($rec = mysqli_fetch_array($rows_room)){ 
									
									
								?>
								<tr class="" >
									<td style="text-align:center;" class=""><?php echo $i;?></td>
									<td style="text-align:left;"><?php echo $rec['ROOM_NAME'];?></td>
								</tr>	
								<?php
									$i++;
								}
							?>
						</tbody>
					</table>
				</div>
				<br>
			</div>
			<div class="modal-footer">
				<button type="button" id="close" class="btn btn-danger" data-dismiss="modal"onClick="window.location.reload()">ยกเลิก</button>
			</div>
		</div>
	</div>
</div>

<?php 
	exit; 
	}else if($_POST['chk_data'] == 'member_satisfac'){
	include '../connect/config.php'; 	
?>
<div class="modal fade bs-example-modal-lg" id="satisfac<?php echo $_POST['proc'];?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display:none;">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close" onClick="window.location.reload()"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"><?php echo $_POST['proc_id']?>ข้อมูล</h4>
			</div>
			<form method="post"  id="form" name="form"  action="../system/save/manage_proc.php">
				<div class="modal-body">
					<input type="hidden" name="proc"  id="proc" value="<?php echo $_POST['proc']?>"> 
					<input type="hidden" class="form-control" name="TYPE" id="TYPE" value="<?php echo $_POST['TYPE'];?>" required >
					<input type="hidden" class="form-control" name="LINK" id="LINK" value="<?php echo $_POST['CHK_TYPE'];?>" required >
					<input type="hidden" name="SATIS_ID" id="SATIS_ID" value="<?php echo $_POST['id'];?>">
					<div class="row">
						<div class="col-md-12" style="display:none;">
							<div class="col-md-2" style="text-align:right;">ชื่อผู้จอง :</div>
							<div class="col-md-4" style="text-align:left;">
								<div id="MEMBER">
									<select name="MEMBER_ID" id="MEMBER_IDEDIT" class="selectpicker form-control"  data-live-search="true"   onChange="chk_date();member(this.value,'<?php echo $_POST['proc']?>');" required>
										<option value="">--เลือก--</option>
										<?php foreach($arr_rec_satis as $val => $label){?>
											<option value="<?php echo $val;?>" <?php echo $val==$_POST['val']?'selected':'';?> ><?php echo $label;?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-2" style="text-align:right;">ปรเภทห้องพัก :</div>
							<div class="col-md-4" style="text-align:left;">
								<div id="TYPEROOMSATISFAC<?php echo $_POST['proc']?>">
									<select name="TYPEROOM_ID" id="TYPEROOM_ID" class="selectpicker form-control"  data-live-search="true" >
										<option value="">--เลือก--</option>
									</select>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<h3 align="center">แบบสอบถามความพึงพอใจต่อการใช้บริการห้องพัก</h3>
							<br/>
							<div class="table-responsive">
								<table width="100%" border="1" align="center" >
									<tr>
										<td width="75%" rowspan="2" align="center"><strong>รายการ</strong></td>
										<td colspan="5" align="center"><strong>ระดับความคิดเห็น</strong></td>
									</tr>
									<tr>
										<?php for($i=5; $i>=1;$i--){ ?>
											<td width="5%" align="center"><strong><?php echo $i;?></strong></td>
										<?php } ?>
									</tr>
									<?php foreach($arr_satisfaction_head as $key1 => $value){?>
										<tr style="text-align:left;">
											<td height="30" colspan="6" bgcolor="#F4F4F4"><strong> &nbsp;<?php echo $value;?></strong></td>
										</tr>
										<?php foreach($arr_satisfaction_body[$key1] as $key => $value){?>
											<tr style="text-align:left;">
												<td height="30">&nbsp; <?php echo $key.'.'.$value;?></td>
												<?php for($i=5; $i>=1;$i--){ ?>
													<td height="30" align="center">
													<input type="radio" id="SATIS<?php echo $key1.'_'.$key;?>" name="SATIS[<?php echo $key1.'_'.$key;?>]"  <?php echo $i ==$_POST['SATIS'][$key1.'_'.$key]?'checked':'';?> value="<?php echo $i;?>" required="required" /></td>
												<?php } ?>
											</tr>
											<?php }
										} ?>
								</table>
							</div>
						</div>
					</div>
					
				</div>
				<div class="modal-footer">
					<button type="button" id="close" class="btn btn-danger" data-dismiss="modal" onClick="window.location.reload()">ยกเลิก</button>
					<button type="submit" class="btn btn-success">แก้ไข</button>
				</div>
			</div>
		</div>
	</form>
</div>
<script type="text/javascript" charset="utf-8">
	$(document).ready(function() {	
		$("#MEMBER_IDEDIT").trigger('change');	
	});	 
</script>
<?php 
	exit; 
}
?>
<script type="text/javascript" >
	$(document).ready(function() {
	});
	function chk_list(id,value){
		$.ajax({
			url: 'chk_data.php',
			type: 'POST',
			dataType: 'html',
			data: {chk_data:id, data:value},
			success: function(data) {
				$('#EDIT'+id).html(data);
				$('.selectpicker').selectpicker();
				
			}
		});
	}
	<?php if($_POST['TYPE'] =="manage_room"){?>
		
	<?php } ?>
	
	</script>																	