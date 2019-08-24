<?php
	if($_POST['chk_data'] == 'chk_login'){
		include '../connect/config.php';
		ob_start();
		session_start();
		$rows = mysqli_query($con,"SELECT * FROM member 
		WHERE USERNAME = '".trim($_POST['username'])."'AND PASSWORD = '".trim($_POST['password'])."'");
		$num = mysqli_num_rows($rows);
		$rec_member = mysqli_fetch_array($rows);
		$_SESSION["MEMBER_ID"]      = $rec_member["MEMBER_ID"];
		$_SESSION["USERNAME"] 	    = $rec_member["USERNAME"];
		$_SESSION["PASSWORD"]       = $rec_member["PASSWORD"];
		$_SESSION["MEMBER_TYPE"]    = $rec_member["MEMBER_TYPE"];
		$_SESSION["FULLNAME"] 	    = $rec_member["FULLNAME"];
		$_SESSION["LASTNAME"]       = $rec_member["LASTNAME"];
		$_SESSION["ADDRESS"]        = $rec_member["ADDRESS"];
		$_SESSION["TEL"] 	   		= $rec_member["TEL"];
		$_SESSION["EMAIL"]      	= $rec_member["EMAIL"];
		$_SESSION["SES_FULLNAME"]   = $rec_member["FULLNAME"].'  '.$rec_member["LASTNAME"];
		$data  = $rec_member['MEMBER_TYPE'];
		$data .= '#'.$num;
		echo $data;
		exit;
		}else if($_POST['chk_data'] == 'chk_logout'){
		include '../connect/config.php';
		ob_start();
		session_start();
		session_destroy();
		echo '1';
		exit;
		}else if($_POST['chk_data'] == 'password'){
		include '../connect/config.php';
		$rows = mysqli_query($con,"SELECT PASSWORD  
		FROM member WHERE USERNAME = '".trim($_POST['username'])."'");
		$rec_member = mysqli_fetch_array($rows);
		 echo 'รหัสผ่านของคุณคือ'.$rec_member["PASSWORD"];
		exit;
		}else if($_POST['chk_data'] == 'chk_datamanage_buidling'){
		include '../connect/config.php';
		$rows = mysqli_query($con,"SELECT * FROM manage_building WHERE BUILDING_NAME = '".$_POST['data']."'");
		$num = mysqli_num_rows($rows);
		
		echo $num;
		exit;
		}else if($_POST['chk_data'] == 'chk_datamanage_class'){
		include '../connect/config.php';
		if($_POST['BUILDING_ID'] !="" && $_POST['data'] !="" ){
			$row = mysqli_query($con,"SELECT * FROM manage_class 
			WHERE BUILDING_ID = '".$_POST['BUILDING_ID']."' AND CLASS_NAME = '".$_POST['data']."'");
			$num = mysqli_num_rows($row);
		}
		echo $num;
		exit;
		}else if($_POST['chk_data'] == 'chk_datamanage_typeroom'){
		include '../connect/config.php';
		if($_POST['data'] !="" ){
			$row = mysqli_query($con,"SELECT * FROM manage_typeroom 
			WHERE  TYPEROOM_NAME = '".$_POST['data']."'");
			$num = mysqli_num_rows($row);
		}
		echo $num;
		exit;
		}else if($_POST['chk_data'] == 'CLASS'){
		include '../connect/config.php';
		
		if($_POST['selected'] =="0"){
			$selected =0;
			}else{
			$selected = $_POST['selected'];
		}
	?>
	<select name="CLASS_ID" id="CLASS_ID" class="selectpicker form-control"  data-live-search="true"   onChange="chk_list('TYPEROOM',this.value);" >
		<option value="">--เลือก--</option>
		<?php $rows_class = mysqli_query($con,"SELECT * FROM manage_class WHERE BUILDING_ID ='".$_POST['data']."' ORDER BY CLASS_NAME DESC");
			while($rec_class = mysqli_fetch_array($rows_class)){ ?>
			<option value="<?php echo $rec_class['CLASS_ID']; ?>"<?php echo  $selected == $rec_class['CLASS_ID']?'selected':''; ?>><?php echo $rec_class['CLASS_NAME'];?></option>
			<?php
				
			}
		?>
	</select>
	<?php 
		exit;
		}else if($_POST['chk_data'] == 'TYPEROOM'){
		include '../connect/config.php';
		if($_POST['selected'] =="0"){
			$selected =0;
			}else{
			$selected = $_POST['selected'];
		}?>
		<select name="TYPEROOM_ID" id="TYPEROOM_ID" class="selectpicker form-control"  data-live-search="true"   onChange="chk_date();" >
			<option value="">--เลือก--</option>
			<?php $rows_class = mysqli_query($con,"SELECT * FROM manage_typeroom  ORDER BY TYPEROOM_NAME DESC");
				while($rec_class = mysqli_fetch_array($rows_class)){ ?>
				<option value="<?php echo $rec_class['TYPEROOM_ID'];?>"<?php echo  $selected == $rec_class['TYPEROOM_ID']?"selected":""; ?>><?php echo $rec_class['TYPEROOM_NAME'].'/'.roomtypestatus($rec_class['TYPEROOM_SATUS']);?></option>
				<?php
					
				}
			?>
		</select>
		<?php 
			exit;
			}else if($_POST['chk_data'] == 'file'){
			include '../connect/config.php';
			
			if($_POST['type'] =='del'){
				@unlink("../attach/".$_POST["image"]);
				$strimage = "DELETE FROM mannage_roomimage WHERE   IMAGE_ID ='".$_POST["id_image"]."'";
				$image = mysqli_query($con,$strimage);
			}
			$i =1;
			$rows_roomimage = mysqli_query($con,"SELECT * FROM mannage_roomimage WHERE TYPEROOM_ID ='".$_POST['id']."' ORDER BY IMAGE_ID ASC ");
			$num_rows = mysqli_num_rows($rows_roomimage);
			while($rec = mysqli_fetch_array($rows_roomimage)){ 
				
				$ATT = "<a target=\"_blank\" href=\"../attach/".$rec['IMAGE_NAME']."\" title=\"โหลดไฟล์\">".$rec['IMAGE_NAME']."</a> ";
				$ROOMTYPE_FILE			= 	$rec['IMAGE_NAME']; //แนบไฟล์ 
			?>
			<div id="shw_file_<?php echo $i;?>" class="form-group input-group ">
				<input type="file" name="ROOMTYPE_FILE[<?php echo $i;?>]" id="ROOMTYPE_FILE_<?php echo $i;?>" value="" class="form-control" />
				<div class="input-group-addon btn btn-danger"><i class="fa fa-fw fa-trash " id="remove" onClick="editdel_file(<?php echo $i;?>)" ></i>
				</div>
			</div>
			<div id="file_<?php echo $rec['IMAGE_ID'];?>"><?php echo $ATT;?></div>
			<input type="hidden" id="IMAGE_ID_<?php echo $i;?>" name="IMAGE_ID[<?php echo $i;?>]" value="<?php echo $rec['IMAGE_ID'];?>"/>
			<input type="hidden" id="ROOMTYPE_FILE_OLD_<?php echo $i;?>" name="ROOMTYPE_FILE_OLD[<?php echo $i;?>]" value="<?php echo $ROOMTYPE_FILE;?>"/>
			<br/>
			
			<?php
				$i++;
			}
			exit;
			}else if($_POST['chk_data'] == 'tableroom'){ 
		include '../connect/config.php'; ?>
		
		<script language="JavaScript">
			
			// $('#example1').DataTable({
			// "oLanguage": {
			// "sEmptyTable":     "ไม่มีข้อมูลในตาราง",
			// "sInfo":           "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
			// "sInfoEmpty":      "แสดง 0 ถึง 0 จาก 0 แถว",
			// "sInfoFiltered":   "(กรองข้อมูล _MAX_ ทุกแถว)",
			// "sInfoPostFix":    "",
			// "sInfoThousands":  ",",
			// "sLengthMenu":     "แสดง _MENU_ แถว",
			// "sLoadingRecords": "กำลังโหลดข้อมูล...",
			// "sProcessing":     "กำลังดำเนินการ...",
			// "sSearch":         "ค้นหา: ",
			// "sZeroRecords":    "ไม่พบข้อมูล",
			// "oPaginate": {
			// "sFirst":    "หน้าแรก",
			// "sPrevious": "ก่อนหน้า",
			// "sNext":     "ถัดไป",
			// "sLast":     "หน้าสุดท้าย"
			// },
			// "oAria": {
			// "sSortAscending":  ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
			// "sSortDescending": ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย"
			// }
			// }
			// });
			function cheAll(id){
				if($("#ALL").prop("checked") == true){
					$(":checkbox").prop("checked",true);
					}else{
					$(":checkbox").prop("checked",false);
				}
				amount();
			}
			
		</script>
		<div class="table-responsive">
			<table id="example1" class="table table-bordered table-hover table-striped dataTable" >
				<thead>
					<tr class="bg-navy-active color-palette">
						<th style="text-align:center; width:5%;">ทั้งหมด <br>
						<input type="checkbox" id="ALL"  onClick="cheAll(this.id);"></th>
						<th style="text-align:center; width:10%;">ลำดับ</th>
						<th style="text-align:center; width:42.5%;">ชื่อห้อง</th>
						<th style="text-align:center; width:42.5%;">ราคาค่าห้อง</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$i =1;
						$rows_room = mysqli_query($con,"SELECT ROOM_ID ,ROOM_NAME ,ROOM_STATUS,(SELECT SUM(TYPEROOM_AMOUNT) FROM manage_typeroom  A 
						WHERE A.TYPEROOM_ID = B.TYPEROOM_ID ) AS SUM_AMOUNT
						FROM manage_room B
						WHERE B.TYPEROOM_ID ='".$_POST['data']."' 
						
						ORDER BY B.ROOM_NAME ASC ");
						$num_rows = mysqli_num_rows($rows_room);
						while($rec = mysqli_fetch_array($rows_room)){ 
							
							if($_POST['booking_id'] !="null"){
								$rows_booking = mysqli_query($con,"SELECT ROOM_ID 
								FROM  manage_bookingdetail B
								WHERE B.BOOKING_ID ='".$_POST['booking_id']."'  AND B.ROOM_ID ='".$rec['ROOM_ID']."' 
								ORDER BY B.BOOKINGDETAIL_ID ASC ");
								$rec_booking = mysqli_fetch_array($rows_booking);
								$ROOM_ID = $rec_booking['ROOM_ID'] == $rec['ROOM_ID']?"checked":"";
							}
							if($rec['ROOM_STATUS'] == 'N' && $rec_booking['ROOM_ID'] ==''){
								continue;
							}
							
						?>
						<tr class="" >
							<td style="text-align:center;" class="">
								<input type="checkbox" name="ROOM_ID[<?php echo $i;?>]" id="ROOM_ID_<?php echo $i;?>" value="<?php echo $rec['ROOM_ID'];?>" <?php echo $ROOM_ID; ?>  onClick='amount();'>	
							<input type="hidden" name="FUND_AMOUNT[<?php echo $rec['ROOM_ID'];?>]" id="FUND_AMOUNT_<?php echo $rec['ROOM_ID'];?>" value="<?php echo $rec['SUM_AMOUNT'];?>" ></td>
							<td style="text-align:center;" class=""><?php echo $i;?></td>
							<td style="text-align:left;"><?php echo $rec['ROOM_NAME'];?></td>
							<td style="text-align:right;"><?php echo number_format($rec['SUM_AMOUNT'],2);?></td>
						</tr>	
						<?php
							$i++;
						}
					?>
				</tbody>
			</table>
		</div>
		<?php
			exit;
			}else if($_POST['chk_data'] == 'SATISFAC'){
			include '../connect/config.php';
			if($_POST['selected'] =="0"){
				$selected =0;
				}else{
				$selected = $_POST['typeroom'];
			}?>
			<select name="TYPEROOM_ID" id="TYPEROOM_ID" class="selectpicker form-control"  data-live-search="true" >
				<?php $rows_typeroom = mysqli_query($con,"SELECT TYPEROOM_ID
					FROM manage_booking  WHERE BOOKING_STATUS ='Y' 
					AND MEMBER_ID ='".$_POST['val']."'
					ORDER BY BOOKING_ID ASC  ");
					while($rec_typeroom = mysqli_fetch_array($rows_typeroom)){ ?>
					<option value="<?php echo $rec_typeroom['TYPEROOM_ID'];?>"<?php echo  $selected == $rec_typeroom['TYPEROOM_ID']?"selected":""; ?>><?php echo $arr_typeroom[$rec_typeroom['TYPEROOM_ID']];?></option>
					<?php
						
					}
				?>
			</select>
			<?php 
				exit;
				}else if($_POST['chk_data'] == 'save_localtion'){
				include '../connect/config.php';
				$strdel = "DELETE FROM manage_location";	
				$rowsdel = mysqli_query($con,$strdel);
				
				$strint = "INSERT INTO manage_location (location_name,location,location_google,location_tel) VALUES ('".$_POST["location_name"]."','".$_POST["location"]."','".$_POST["location_google"]."','".$_POST["location_tel"]."')";
				$rowsint = mysqli_query($con,$strint);
				
				$strcount =  mysqli_query($con,"SELECT COUNT(*) FROM manage_location");	
				$rowscount = mysqli_num_rows($strcount);
				echo $rowscount;	
				exit;
				}else if($_POST['chk_data'] == 'update_booking'){
				include '../connect/config.php';
				
			$strSQL = "UPDATE  manage_booking  SET 
			BOOKING_STATUS 		= 'C'
			WHERE  BOOKING_ID  	='".$_POST["BOOKING_ID"]."'";
			$rows = mysqli_query($con,$strSQL);
			
				$strSQLdetail = "SELECT ROOM_ID FROM manage_bookingdetail 
				WHERE   BOOKING_ID ='".$_POST["BOOKING_ID"]."'";	
				$rowsdetail = mysqli_query($con,$strSQLdetail);
				while($rec_detail = mysqli_fetch_array($rowsdetail)){
					$strroom = "UPDATE  manage_room  SET 
					ROOM_STATUS 		= 'Y'
					WHERE  ROOM_ID  	='".$rec_detail['ROOM_ID']."'";
					$rowsroom = mysqli_query($con,$strroom);
				}
				echo '1';	
				exit;
			}
?>			