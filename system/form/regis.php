
<!-- Button trigger modal -->
<button type="button" class="btn btn-small btn-success" name="1" data-toggle="modal" data-target="#myModal<?php echo $TYPE;?>"> เพิ่มข้อมูล
</button> 

<!--------------------------------------------------------------------------------------------------- ตึก ------------------------------------------------------------------------------------->
<div class="modal fade" id="myModalmanage_buidling" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close"onClick="window.location.reload()"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"  style="text-align:left;">กรุณาใส่ข้อมูล</h4>
			</div>
			<div class="modal-body">
				
				<form method="post" name="form" id="form" action="../save/manage_proc.php"  enctype="multipart/form-data">
					<input type="hidden" class="form-control" name="proc" id="proc" value="save" required ><br> 
					<input type="hidden" class="form-control" name="TYPE" id="TYPE" value="<?php echo $TYPE;?>" required >
					<input type="hidden" class="form-control" name="LINK" id="LINK" value="<?php echo $CHK_TYPE;?>" required >
					<div class="row">
						<div class="col-md-2" style="text-align:right;">ชื่อตึก :&nbsp;</div>
						<div class="col-md-10"><input type="text" class="form-control" name="BUILDING_NAME" id="BUILDING_NAME" placeholder="ชื่อตึก" onblur="chk_date(this.id,this.value);"  value ="" required ><br> 
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="close" class="btn btn-danger " data-dismiss="modal"onClick="window.location.reload()">ยกเลิก</button>
					<button type="submit" class="btn btn-success">บันทึก</button>
				</div>
			</div>
		</div>
	</form>
</div>

<!--------------------------------------------------------------------------------------------------- ชั้น  ---------------------------------------------------------------------------------------->
<div class="modal fade" id="myModalmanage_class" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close" onClick="window.location.reload()"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"  style="text-align:left;">กรุณาใส่ข้อมูล</h4>
			</div>
			<div class="modal-body">
				
				<form method="post" name="form" id="form" action="../save/manage_proc.php"  enctype="multipart/form-data">
					<input type="hidden" class="form-control" name="proc" id="proc" value="save"><br> 
					<input type="hidden" class="form-control" name="TYPE" id="TYPE" value="<?php echo $TYPE;?>" required >
					<input type="hidden" class="form-control" name="LINK" id="LINK" value="<?php echo $CHK_TYPE;?>" required >
					<div class="row">
						<div class="col-md-2" style="text-align:right;">ชื่อตึก :&nbsp;</div>
						<div class="col-md-10"><select name="BUILDING_ID" id="BUILDING_ID" class="selectpicker form-control"  data-live-search="true"    onChange="chk_date();" >
							<option value="">--เลือก--</option>
							<?php foreach($arr_building as $val => $label){?>
								<option value="<?php echo $val;?>"><?php echo $label;?></option>
							<?php } ?>
						</select>
						&nbsp;</div>
					</div>
					<div class="row">
						<div class="col-md-2" style="text-align:right;">ชื่อชั้น :&nbsp;</div>
						<div class="col-md-10"><input type="text" class="form-control" name="CLASS_NAME" id="CLASS_NAME" placeholder="ชื่อชั้น" onblur="chk_date(this.id,this.value);" required ><br> 
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="close" class="btn btn-danger" data-dismiss="modal" onClick="window.location.reload()">ยกเลิก</button>
					<button type="submit" class="btn btn-success">บันทึก</button>
				</div>
			</div>
		</div>
	</form>
</div>
<!--------------------------------------------------------------------------------------------------- ข่าวสาร ------------------------------------------------------------------------------------------->
<div class="modal fade" id="myModalmanage_news" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close" onClick="window.location.reload()"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"  style="text-align:left;">กรุณาใส่ข้อมูล</h4>
			</div>
			<form method="post" name="form" id="form" action="../save/manage_proc.php"  enctype="multipart/form-data">
				<div class="modal-body">
					<input type="hidden" class="form-control" name="proc" id="proc" value="save"><br> 
					<input type="hidden" class="form-control" name="TYPE" id="TYPE" value="<?php echo $TYPE;?>" required >
					<input type="hidden" class="form-control" name="LINK" id="LINK" value="<?php echo $CHK_TYPE;?>" required >
					<div class="row">
						<div class="col-md-3" style="text-align:right;">วันที่ :&nbsp;</div>
						<div class="col-md-9">	
							<div class="form-group input-group ">
								<input type="text" name="NEWS_DATE" id="NEWS_DATE" class="form-control datepicker" value="<?php echo  date('d/m/').(date('Y')+543);?>" readonly  >
								<span class="input-group-addon "><span class="glyphicon glyphicon-calendar "></span> </span>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3" style="text-align:right;">ชื่อเรื่อง :&nbsp;</div>
						<div class="col-md-9"><input type="text" class="form-control" name="NEWS_SUB" id="NEWS_SUB" placeholder="ชื่อเรื่อง" onblur="chk_date(this.id,this.value);" required ><br> 
						</div>
					</div>
					<div class="row">
						<div class="col-md-3" style="text-align:right;">รายละเอียด :</div>
						<div class="col-md-9"><textarea type="text" class="form-control" rows="4" name="NEWS_DETAIL" id="NEWS_DETAIL" placeholder="รายละเอียด" required ></textarea><br> 
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-3" style="text-align:right;">สถานะ :&nbsp;</div>
						<div class="col-md-9"style="text-align:left;">
							<?php foreach($arr_status as $key => $value){ ?>
								<label class="radio-inline">
									<input type="radio" class="radio" name="NEWS_STATUS" id="NEWS_STATUS" placeholder="สถานะ" value="<?php echo $key?>" required ><?php echo $value;?>
								</label>
							<?php } ?>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="close" class="btn btn-danger" data-dismiss="modal"onClick="window.location.reload()">ยกเลิก</button>
					<button type="submit" class="btn btn-success">บันทึก</button>
				</div>
			</div>
		</div>
	</form>
</div>
<!--------------------------------------------------------------------------------------------------- ประเภทห้อง ------------------------------------------------------------------------------------->
<div class="modal fade" id="myModalmanage_typeroom" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close" onClick="window.location.reload()"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"  style="text-align:left;">กรุณาใส่ข้อมูล</h4>
			</div>
			<form method="post" name="form" id="form" action="../save/manage_proc.php"  enctype="multipart/form-data">
				<div class="modal-body">
					<input type="hidden" class="form-control" name="proc" id="proc" value="save"><br> 
					<input type="hidden" class="form-control" name="TYPE" id="TYPE" value="<?php echo $TYPE;?>" required >
					<input type="hidden" class="form-control" name="LINK" id="LINK" value="<?php echo $CHK_TYPE;?>" required >
					
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-3" style="text-align:right;">ชื่อประเภทห้อง :&nbsp;</div>
							<div class="col-md-9" style="text-align:left;"><input type="text" class="form-control" name="TYPEROOM_NAME" id="TYPEROOM_NAME" placeholder="ชื่อประเภทห้อง" onblur="chk_date(this.id,this.value);" required ><br> 
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3" style="text-align:right;">ประเภทห้อง :&nbsp;</div>
							<div class="col-md-9" style="text-align:left;"><?php foreach($arr_roomtypestatus as $key => $value){ ?>
								<label class="radio-inline">
									<input type="radio" class="radio" name="TYPEROOM_SATUS" id="TYPEROOM_SATUS" placeholder="สถานะ" value="<?php echo $key?>" required ><?php echo $value;?>
								</label>
							<?php } ?>
							</div>
						</div>
						
						<div class="col-md-12">
						<br> 
							<div class="col-md-3" style="text-align:right;">รายละเอียด :&nbsp;</div>
							<div class="col-md-9" style="text-align:left;"><textarea type="text" class="form-control" name="TYPEROOM_DETAIL" id="TYPEROOM_DETAIL" placeholder="รายละเอียด" onblur="" required rows="3" ></textarea>
							</div>
							</div>
						
						<div class="col-md-12">
						<br> 
							<div class="col-md-3" style="text-align:right;">พื้นที่ห้อง :&nbsp;</div>
							<div class="col-md-9" style="text-align:left;"><input type="text" class="form-control" name="TYPEROOM_DETAIL" id="TYPEROOM_AREA" placeholder="พื้นที่ห้อง" onblur="" required >
							</div>
						</div>
						<div class="col-md-12">
						<br> 
							<div class="col-md-3" style="text-align:right;">ขนาดเตียง :&nbsp;</div>
							<div class="col-md-9" style="text-align:left;"><input type="text" class="form-control" name="TYPEROOM_DETAIL" id="TYPEROOM_SIZE" placeholder="ขนาดเตียง" onblur="" required >
							</div>
						</div>
						
						<div class="col-md-12">
							<br> 
							<div class="col-md-3" style="text-align:right;">จำนวนเงิน :&nbsp;</div>
							<div class="col-md-9" style="text-align:left;"><input type="text" class="form-control" name="TYPEROOM_AMOUNT" id="TYPEROOM_AMOUNT" placeholder="จำนวนเงิน" value="" required >
							</div>
						</div>
						<div class="col-md-12">
							<br>
							<div class="col-md-3" style="text-align:right;">สถานะ :&nbsp;</div>
							<div class="col-md-9"style="text-align:left;">
								<?php foreach($arr_status as $key => $value){ ?>
									<label class="radio-inline">
										<input type="radio" class="radio" name="TYPEROOM_TSATUS" id="TYPEROOM_TSATUS" placeholder="สถานะ" value="<?php echo $key?>" required ><?php echo $value;?>
									</label>
								<?php } ?>
							</div>
						</div>
						<div class="col-md-12">
							<br> 
							<div class="col-md-3" style="text-align:right;">รูปภาพห้อง :&nbsp;</div>
							<div class="col-md-9" style="text-align:left;">
								<td colspan="3" id="FILE_NAME_AREA">
									<a onclick="add_file();" style="cursor:pointer">เพิ่มรูปภาพห้อง : <i class="fa fa-fw fa-file-image-o"></i></a>
									<div id="shw_file">
										
									<input type="hidden" name="countnum" id="countnum" value="" class="form-control"></div>
									<script type="text/javascript">
										function add_file(){
											var id = +$("#countnum").val()+1;
											$("#shw_file").append('<div id="shw_file_'+id+'" class="form-group input-group "><input type="file" name="ROOMTYPE_FILE['+id+']" id="ROOMTYPE_FILE_'+id+'" value="" class="form-control" /><div class="input-group-addon btn btn-danger"><i class="fa fa-fw fa-trash " id="remove" onClick="del_file('+id+')" ></i></div></div>');
											$("#countnum").val(id)
										}
										function del_file(id){
											
											$("#shw_file_"+id).remove(); 	
											var i = parseInt($('#countnum').val());
											i-- ;
											$('#countnum').val(i);
										}
										
									</script>
								</td>
								<br> 
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="close" class="btn btn-danger" data-dismiss="modal" onClick="window.location.reload()">ยกเลิก</button>
					<button type="submit" class="btn btn-success">บันทึก</button>
				</div>
			</div>
		</div>
	</form>
</div>
<!-----------------------------------------------------------------------------------ห้องพัก--------------------------------------------------------------------------------------------------------->
<div class="modal fade  bs-example-modal-lg" id="myModalmanage_room" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close" onClick="window.location.reload()"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"  style="text-align:left;">กรุณาใส่ข้อมูล</h4>
			</div>
			<form method="post" name="form" id="form" action="../save/manage_proc.php"  enctype="multipart/form-data">
				<div class="modal-body">
					<input type="hidden" class="form-control" name="proc" id="proc" value="save"><br> 
					<input type="hidden" class="form-control" name="TYPE" id="TYPE" value="<?php echo $TYPE;?>" required >
					<input type="hidden" class="form-control" name="LINK" id="LINK" value="<?php echo $CHK_TYPE;?>" required >
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-2" style="text-align:right;">ชื่อตึก :</div>
							<div class="col-md-4" style="text-align:left;">
								<div id="BUILDING">
									<select name="BUILDING_ID" id="BUILDING_ID" class="selectpicker form-control"  data-live-search="true"   onChange="chk_date(); chk_list('CLASS',this.value);" >
										<option value="">--เลือก--</option>
										<?php foreach($arr_building as $val => $label){?>
											<option value="<?php echo $val;?>"><?php echo $label;?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-2" style="text-align:right;">ชื่อชั้น :</div>
							<div class="col-md-4" style="text-align:left;">
								<div id="TABLECLASS">
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
								<div id="TABLETYPEROOM">
									<select name="TYPEROOM_ID" id="TYPEROOM_ID" class="selectpicker form-control"  data-live-search="true"  onChange="chk_date();" >
										<option value="">--เลือก--</option>
									</select>
								</div>
							</div>
							<div class="col-md-2" style="text-align:right;">ชื่อห้อง :</div>
							<div class="col-md-4" style="text-align:left;">
								<input type="text" class="form-control" name="ROOM_NAME" id="ROOM_NAME" value="" required >
							</div>
						&nbsp;</div>
						&nbsp;
						<div class="col-md-12">
							<div class="col-md-2" style="text-align:right;">สถานะ :</div>
							<div class="col-md-4" style="text-align:left;"><?php foreach($arr_roomstatus as $key => $value){ ?>
								<label class="radio-inline">
									<input type="radio" class="radio" name="ROOM_STATUS" id="ROOM_STATUS" placeholder="สถานะ" value="<?php echo $key?>" required ><?php echo $value;?>
								</label>
							<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="close" class="btn btn-danger" data-dismiss="modal"onClick="window.location.reload()">ยกเลิก</button>
					<button type="submit" class="btn btn-success">บันทึก</button>
				</div>
			</div>
		</div>
	</form>
</div>
<!--------------------------------------------------------------------------------------------------- ผู้ใช้งาน ------------------------------------------------------------------------------------->
<div class="modal fade  bs-example-modal-lg" id="myModalmanage_member" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close" onClick="window.location.reload()"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"  style="text-align:left;">กรุณาใส่ข้อมูล</h4>
			</div>
			<form method="post" name="form" id="form" action="../save/manage_proc.php"  enctype="multipart/form-data">
				<div class="modal-body">
					<input type="hidden" class="form-control" name="proc" id="proc" value="save"><br> 
					<input type="hidden" class="form-control" name="TYPE" id="TYPE" value="<?php echo $TYPE;?>" required >
					<input type="hidden" class="form-control" name="LINK" id="LINK" value="<?php echo $CHK_TYPE;?>" required >
					
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-3" style="text-align:right;">ชื่อผู้ใช้งาน :&nbsp;</div>
							<div class="col-md-9"><input type="text" class="form-control" name="USERNAME" id="USERNAME" placeholder="ชื่อผู้ใช้งาน" onblur="chk_date(this.id,this.value);" required ><br> 
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3" style="text-align:right;">รหัสผู้ใช้งาน :&nbsp;</div>
							<div class="col-md-9">
								<input  class="form-control PASSWORD" type="password"  name="PASSWORD" id="PASSWORDSAVE"   placeholder="รหัสผู้ใช้งาน" onblur="chk_date(this.id,this.value);" required ><br> 
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3" style="text-align:right;">ยืนยันรหัสผู้ใช้งาน :&nbsp;</div>
							<div class="col-md-9"><input type="password" class="form-control PASSWORD2SAVE" name="REPASSWORD" id="REPASSWORD" placeholder="ยืนยันรหัสผู้ใช้งาน" onblur="chk_date(this.id,this.value); re_password('SAVE',this.value);" required ><br> 
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3" style="text-align:right;">ประเภทผู้ใช้งาน :&nbsp;</div>
							<div class="col-md-9"style="text-align:left;">
								<?php foreach($arr_member as $key => $value){ ?>
									<label class="radio-inline">
										<input type="radio" class="radio" name="MEMBER_TYPE" id="MEMBER_TYPE" placeholder="ประเภท" value="<?php echo $key?>" required ><?php echo $value;?>
									</label>
								<?php } ?>
							</div>
							<br><br>
						</div>
						
						<div class="col-md-12">
							<div class="col-md-3" style="text-align:right;">ชื่อ :&nbsp;</div>
							<div class="col-md-9"><input type="text" class="form-control" name="FULLNAME" id="FULLNAME" placeholder="ชื่อ" onblur="chk_date(this.id,this.value);" required ><br> 
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3" style="text-align:right;">นามสกุล :&nbsp;</div>
							<div class="col-md-9"><input type="text" class="form-control" name="LASTNAME" id="LASTNAME" placeholder="นามสกุล" onblur="chk_date(this.id,this.value);" required ><br> 
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3" style="text-align:right;">ที่อยู่ :&nbsp;</div>
							<div class="col-md-9"><textarea type="text" class="form-control" name="ADDRESS" id="ADDRESS" placeholder="ที่อยู่" onblur="chk_date(this.id,this.value);" required ></textarea><br> 
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3" style="text-align:right;">เบอร์โทร :&nbsp;</div>
							<div class="col-md-9"><input type="tel" class="form-control" name="TEL" id="TEL" placeholder="เบอร์โทร" onblur="chk_date(this.id,this.value);" required ><br> 
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-3" style="text-align:right;">อีเมลล์ :&nbsp;</div>
							<div class="col-md-9"><input type="email" class="form-control" name="EMAIL" id="EMAIL" placeholder="อีเมลล์" onblur="chk_date(this.id,this.value);" required ><br> 
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="close" class="btn btn-danger" data-dismiss="modal" onClick="window.location.reload()">ยกเลิก</button>
					<button type="submit" class="btn btn-success">บันทึก</button>
				</div>
			</div>
		</div>
	</form>
</div>
<!--------------------------------------------------------------------------------------------------- จองห้อง ------------------------------------------------------------------------------------->
<div class="modal fade  bs-example-modal-lg" id="myModalmanage_booking" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close" onClick="window.location.reload()"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"  style="text-align:left;">กรุณาใส่ข้อมูล</h4>
			</div>
			<form method="post" name="form" id="form" action="../save/manage_proc.php"  enctype="multipart/form-data">
				<div class="modal-body">
					<input type="hidden" class="form-control" name="proc" id="proc" value="save"><br> 
					<input type="hidden" class="form-control" name="TYPE" id="TYPE" value="<?php echo $TYPE;?>" required >
					<input type="hidden" class="form-control" name="LINK" id="LINK" value="<?php echo $CHK_TYPE;?>" required >
					
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-2" style="text-align:right;">วันที่จอง :&nbsp;</div>
							<div class="col-md-4">	
								<div class="form-group input-group ">
									<input type="text" name="BOOKING_DATE" id="BOOKING_DATE" class="form-control datepicker" value="<?php echo  date('d/m/').(date('Y')+543);?>" readonly  >
									<span class="input-group-addon "><span class="glyphicon glyphicon-calendar "></span> </span>
								</div>
							</div>
							<div class="col-md-2" style="text-align:right;">วันที่จ่ายเงิน :&nbsp;</div>
							<div class="col-md-4">	
								<div class="form-group input-group ">
									<input type="text" name="PAY_DATE" id="PAY_DATE" class="form-control datepicker" value="" readonly>
									<span class="input-group-addon "><span class="glyphicon glyphicon-calendar "></span> </span>
								</div>
							</div>
						</div>
						<br/><br/>
						<div class="col-md-12">
							<div class="col-md-2" style="text-align:right;">วันที่เข้าพัก :&nbsp;</div>
							<div class="col-md-4">	
								<div class="form-group input-group ">
									<input type="text" name="DATE_STAY" id="DATE_STAY" class="form-control datepicker" 
									value="<?php echo  date('d/m/').(date('Y')+543);?>" readonly>
									<span class="input-group-addon "><span class="glyphicon glyphicon-calendar "></span> </span>
								</div>
							</div>
							<div class="col-md-2" style="text-align:right;">ถึงวันที่:&nbsp;</div>
							<div class="col-md-4">	
								<div class="form-group input-group ">
									<input type="text" name="DATE_END" id="DATE_END" class="form-control datepicker" 
									value="<?php echo  date('d/m/').(date('Y')+543);?>" readonly  >
									<span class="input-group-addon "><span class="glyphicon glyphicon-calendar "></span> </span>
								</div>
							</div>
						</div>
						<div class="col-md-12">
							<div class="col-md-2" style="text-align:right;">ชื่อผู้จอง :</div>
							<div class="col-md-4" style="text-align:left;">
								<div id="MEMBER">
									<select name="MEMBER_ID" id="MEMBER_ID" class="selectpicker form-control"  data-live-search="true"   onChange="chk_date();" required>
										<option value="">--เลือก--</option>
										<?php foreach($arr_membername as $val => $label){?>
											<option value="<?php echo $val;?>"><?php echo $label;?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-2" style="text-align:right;">ปรเภทห้องพัก :</div>
							<div class="col-md-4" style="text-align:left;">
								<div id="TYPEROOM">
									<select name="TYPEROOM_ID" id="TYPEROOM_ID" class="selectpicker form-control"  data-live-search="true"   onChange="chk_date(); tableroom(this.id,this.value,'','SAVE');" required>
										<option value="">--เลือก--</option>
										<?php foreach($arr_typeroom as $val => $label){?>
											<option value="<?php echo $val;?>"><?php echo $label;?></option>
										<?php } ?>
									</select>
								</div>
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
									<input type="text" name="SUM_AMOUNT" id="SUM_AMOUNT" class="i-number2 form-control" value="" style="text-align:right;"required >
								</div>
							</div>
							<div class="col-md-2" style="text-align:right;">สถานะ :</div>
							<div class="col-md-4" style="text-align:left;">
								<?php foreach($arr_statusbooking as $key => $value){ ?>
									<label class="radio-inline">
										<input type="radio" class="radio" name="BOOKING_STATUS" id="BOOKING_STATUS" placeholder="สถานะ" value="<?php echo $key?>" <?php echo $key=='N'?'checked':'';?> required ><?php echo $value;?>
									</label>
								<?php } ?>
							</div>
						</div>
						
						
						<br/><br/>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" id="close" class="btn btn-danger" data-dismiss="modal" onClick="window.location.reload()">ยกเลิก</button>
					<button type="submit" class="btn btn-success">บันทึก</button>
				</div>
			</div>
		</div>
	</form>
</div>
<!--------------------------------------------------------------------------------------------------- ความพึ่งพอใจ ------------------------------------------------------------------------------------->
<div class="modal fade  bs-example-modal-lg" id="myModalmanage_satisfaction" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" id="close" class="close" data-dismiss="modal" aria-label="Close" onClick="window.location.reload()"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel"  style="text-align:left;">กรุณาใส่ข้อมูล</h4>
			</div>
			<form method="post" name="form" id="form" action="../save/manage_proc.php"  enctype="multipart/form-data">
				<div class="modal-body">
					<input type="hidden" class="form-control" name="proc" id="proc" value="save"><br> 
					<input type="hidden" class="form-control" name="TYPE" id="TYPE" value="<?php echo $TYPE;?>" required >
					<input type="hidden" class="form-control" name="LINK" id="LINK" value="<?php echo $CHK_TYPE;?>" required >
					<div class="row">
						<div class="col-md-12">
							<div class="col-md-2" style="text-align:right;">ชื่อผู้จอง :</div>
							<div class="col-md-4" style="text-align:left;">
								<div id="MEMBER">
									<select name="MEMBER_ID" id="MEMBER_ID" class="selectpicker form-control"  data-live-search="true"   onChange="chk_date();member(this.value,'SAVE');" required>
										<option value="">--เลือก--</option>
										<?php foreach($arr_rec_satis as $val => $label){?>
											<option value="<?php echo $val;?>"><?php echo $label;?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="col-md-2" style="text-align:right;">ปรเภทห้องพัก :</div>
							<div class="col-md-4" style="text-align:left;">
								<div id="TYPEROOMSATISFACSAVE">
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
													<input type="radio" id="SATIS<?php echo $key1.'_'.$key;?>" name="SATIS[<?php echo $key1.'_'.$key;?>]"  value="<?php echo $i;?>" required="required" /></td>
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
					<button type="submit" class="btn btn-success">บันทึก</button>
				</div>
			</div>
		</div>
	</form>
</div>
<script type="text/javascript" >
	
	function re_password (type,value) {
		var password = $('.PASSWORD'+type).val();
		if ($('.PASSWORD'+type).val() == ''){
			alert('กรุณาระบุรหัสผู้ใช้งานก่อน');
			$('.PASSWORD'+type).focus();
			$('.PASSWORD2'+type).val('');
			return false;
		} 
		if(value != password){
			alert('ยืนยันรหัสผู้ใช้งานไม่ถูกต้อง');
			$('.PASSWORD2'+type).val('');
			return false;
		}
	}
	
	
	function chk_list(id,value){	
		$.ajax({
			url: 'chk_data.php',
			type: 'POST',
			dataType: 'html',
			data: {chk_data:id, data:value,selected:'0'},
			success: function(data) {
				$('#TABLE'+id).html(data);
				$('.selectpicker').selectpicker();
			}
		});
	}
	function chk_date(id,value){
		var value = value;
		var id = id;
		var TYPE  = $("#TYPE").val();
		var proc  = $("#proc").val();
		if(TYPE == 'manage_class' && proc =="edit"){
			var CLASS_ID  = $("#CLASS_ID").val().trim();
			var BUILDING_ID  = $("#BUILDING_ID"+CLASS_ID).val();
			}else{
			var BUILDING_ID  = $("#BUILDING_ID").val();
		}
		
		var  chk_data  = 'chk_data'+TYPE;
		
		if(value){
			$.ajax({
				url: 'chk_data.php',
				type: 'POST',
				dataType: 'html',
				data: {chk_data:chk_data, data:value,TYPE:TYPE,BUILDING_ID:BUILDING_ID},
				success: function(data) {
					if(data.trim() == "1"){
						alert('ข้อมูลมีซ้ำอยู่แล้วในฐานข้อมูล');
						$('#'+id).val('');
					}
				}
			});
		}
	}	
	
</script>	
