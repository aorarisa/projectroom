<?php
	include '../connect/config.php';
	if($_POST['TYPE'] =='manage_building'){//ตึก
		if($_POST['proc'] =='save'){
			$strSQL = "INSERT INTO manage_building (BUILDING_NAME) VALUES ('".$_POST["BUILDING_NAME"]."')";
			}else if($_POST['proc'] =='edit'){
			$strSQL = "UPDATE  manage_building  SET BUILDING_NAME = '".$_POST["BUILDING_NAME"]."'
			WHERE   BUILDING_ID ='".$_POST["BUILDING_ID"]."' ";
			}else if($_POST['proc'] =='del'){
			$strSQL = "DELETE FROM manage_building WHERE   BUILDING_ID ='".$_POST["BUILDING_ID"]."'";
		}
		$rows = mysqli_query($con,$strSQL);
		}else if($_POST['TYPE'] =='manage_class'){//ชั้น
		if($_POST['proc'] =='save'){
			$strSQL = "INSERT INTO manage_class (CLASS_NAME,BUILDING_ID) VALUES ('".$_POST["CLASS_NAME"]."','".$_POST["BUILDING_ID"]."')";
			}else if($_POST['proc'] =='edit'){
			$strSQL = "UPDATE  manage_class  SET BUILDING_ID = '".$_POST["BUILDING_ID"]."',CLASS_NAME = '".$_POST["CLASS_NAME"]."'
			WHERE   CLASS_ID ='".$_POST["CLASS_ID"]."' ";
			}else if($_POST['proc'] =='del'){
			$strSQL = "DELETE FROM manage_class WHERE   CLASS_ID ='".$_POST["CLASS_ID"]."'";
		}
		$rows = mysqli_query($con,$strSQL);
		}else if($_POST['TYPE'] =='manage_news'){//ข่าว
		if($_POST['proc'] =='save'){
			$strSQL = "INSERT INTO manage_news (NEWS_SUB,NEWS_DETAIL,NEWS_STATUS,NEWS_DATE) 
			VALUES ('".$_POST["NEWS_SUB"]."','".$_POST["NEWS_DETAIL"]."','".$_POST["NEWS_STATUS"]."','".c_date_db($_POST["NEWS_DATE"])."')";
			}else if($_POST['proc'] =='edit'){
			$strSQL = "UPDATE  manage_news  SET NEWS_SUB = '".$_POST["NEWS_SUB"]."',NEWS_DETAIL = '".$_POST["NEWS_DETAIL"]."' ,NEWS_STATUS = '".$_POST["NEWS_STATUS"]."',NEWS_DATE = '".c_date_db($_POST["NEWS_DATE"])."' 
			WHERE   NEWS_ID ='".$_POST["NEWS_ID"]."' ";
			}else if($_POST['proc'] =='del'){
			$strSQL = "DELETE FROM manage_news WHERE   NEWS_ID ='".$_POST["NEWS_ID"]."'";	
		}
		$rows = mysqli_query($con,$strSQL);
		}else if($_POST['TYPE'] =='manage_typeroom'){//ประเภทห้อง
		if($_POST['proc'] =='save'){
			$strSQL = "INSERT INTO manage_typeroom (TYPEROOM_NAME,TYPEROOM_SATUS,TYPEROOM_AMOUNT,TYPEROOM_DETAIL,TYPEROOM_AREA,TYPEROOM_SIZE,TYPEROOM_TSATUS) VALUES ('".$_POST["TYPEROOM_NAME"]."','".$_POST["TYPEROOM_SATUS"]."','".$_POST["TYPEROOM_AMOUNT"]."','".$_POST["TYPEROOM_DETAIL"]."','".$_POST["TYPEROOM_AREA"]."','".$_POST["TYPEROOM_SIZE"]."','".$_POST["TYPEROOM_TSATUS"]."')";
			$rows = mysqli_query($con,$strSQL);
			
			$reqimage = mysqli_query($con,"SELECT MAX(TYPEROOM_ID) AS MAX_ID FROM  manage_typeroom ");
			$rec = mysqli_fetch_array($reqimage);
			
			for($KEY=1; $KEY <= $_POST["countnum"]; $KEY++){ // แนบไฟล์
				
				if($_FILES["ROOMTYPE_FILE"]['name'][$KEY] != ''){
					$arr_file = explode(".",$_FILES["ROOMTYPE_FILE"]['name'][$KEY]);
					$number   = count($arr_file);
					$file_name = 'image'.$KEY.'_'.date('Ymdhis').'_'.rand(10000,99999).".".$arr_file[$number-1];
					move_uploaded_file($_FILES["ROOMTYPE_FILE"]["tmp_name"][$KEY],"../attach/".$file_name);
					$strimage = "INSERT INTO  mannage_roomimage (TYPEROOM_ID,IMAGE_NAME) VALUES ('".$rec["MAX_ID"]."','".$file_name."')";
			        $image = mysqli_query($con,$strimage);
				}
				
				
			}
			}else if($_POST['proc'] =='edit'){
			$strSQL = "UPDATE  manage_typeroom  SET TYPEROOM_NAME = '".$_POST["TYPEROOM_NAME"]."',TYPEROOM_SATUS = '".$_POST["TYPEROOM_SATUS"]."',TYPEROOM_AMOUNT = '".$_POST["TYPEROOM_AMOUNT"]."',TYPEROOM_DETAIL = '".$_POST["TYPEROOM_DETAIL"]."',TYPEROOM_AREA = '".$_POST["TYPEROOM_AREA"]."',TYPEROOM_SIZE = '".$_POST["TYPEROOM_SIZE"]."',TYPEROOM_TSATUS = '".$_POST["TYPEROOM_TSATUS"]."' WHERE  TYPEROOM_ID ='".$_POST["TYPEROOM_ID"]."'";
			
			$rows = mysqli_query($con,$strSQL);
			
			// print_pre($_FILES);
			// print_pre($_POST);
			
			for($KEY=1; $KEY <= $_POST["num"]; $KEY++){ // แนบไฟล์
				if($_FILES["ROOMTYPE_FILE"]['name'][$KEY] != '' && $_POST["ROOMTYPE_FILE_OLD"][$KEY] != ''){
					@unlink("../attach/".$_POST["ROOMTYPE_FILE_OLD"][$KEY]);
					$arr_file = explode(".",$_FILES["ROOMTYPE_FILE"]['name'][$KEY]);
					$number   = count($arr_file);
					$file_name = 'image_'.$KEY.'_'.date('Ymdhis').'_'.rand(10000,99999).".".$arr_file[$number-1];
					move_uploaded_file($_FILES["ROOMTYPE_FILE"]["tmp_name"][$KEY],"../attach/".$file_name);
					$fields['ROOMTYPE_FILE'] 	= $file_name;	
					$strSQL = "UPDATE  mannage_roomimage  SET TYPEROOM_ID = '".$_POST["TYPEROOM_ID"]."',IMAGE_NAME = '".$file_name."'  WHERE  IMAGE_ID ='".$_POST["IMAGE_ID"][$KEY]."'";
					$rows = mysqli_query($con,$strSQL);
					
					}else if($_FILES["ROOMTYPE_FILE"]['name'][$KEY] != ''&& $_POST["ROOMTYPE_FILE_OLD"][$KEY] == ''){
					$arr_file = explode(".",$_FILES["ROOMTYPE_FILE"]['name'][$KEY]);
					$number   = count($arr_file);
					$file_name             = 'image_'.$KEY.'_'.date('Ymdhis').'_'.rand(10000,99999).".".$arr_file[$number-1];
					move_uploaded_file($_FILES["ROOMTYPE_FILE"]["tmp_name"][$KEY],"../attach/".$file_name);
					
					$strimage = "INSERT INTO  mannage_roomimage (TYPEROOM_ID,IMAGE_NAME) VALUES ('".$_POST["TYPEROOM_ID"]."','".$file_name."')";
					$image = mysqli_query($con,$strimage);
				}
			}
			
			}else if($_POST['proc'] =='del'){
			$strSQL = "DELETE FROM manage_typeroom WHERE   TYPEROOM_ID ='".$_POST["TYPEROOM_ID"]."'";
			$rows = mysqli_query($con,$strSQL);
			$strimage = "DELETE FROM mannage_roomimage WHERE   TYPEROOM_ID ='".$_POST["TYPEROOM_ID"]."'";
			$image = mysqli_query($con,$strimage);
		}
		
		}else if($_POST['TYPE'] =='manage_room'){//ห้องพัก
		if($_POST['proc'] =='save'){
			$strSQL = "INSERT INTO manage_room (ROOM_NAME,BUILDING_ID,CLASS_ID,TYPEROOM_ID,ROOM_STATUS) VALUES ('".$_POST["ROOM_NAME"]."','".$_POST["BUILDING_ID"]."','".$_POST["CLASS_ID"]."','".$_POST["TYPEROOM_ID"]."','".$_POST["ROOM_STATUS"]."')";
			
			}else if($_POST['proc'] =='edit'){
			$strSQL = "UPDATE  manage_room  SET 
			ROOM_NAME 			= '".$_POST["ROOM_NAME"]."',
			BUILDING_ID 		= '".$_POST["BUILDING_ID"]."',
			CLASS_ID 			= '".$_POST["CLASS_ID"]."',
			TYPEROOM_ID 		= '".$_POST["TYPEROOM_ID"]."',
			ROOM_STATUS 		= '".$_POST["ROOM_STATUS"]."'
			WHERE  ROOM_ID  	='".$_POST["ROOM_ID"]."'";
			}else if($_POST['proc'] =='del'){
			$strSQL = "DELETE FROM manage_room WHERE   ROOM_ID ='".$_POST["ROOM_ID"]."'";	
		}
		$rows = mysqli_query($con,$strSQL);
		}else if($_POST['TYPE'] =='manage_member'){//ผู้ใช้งาน
		if($_POST['proc'] =='save'){
			$strSQL = "INSERT INTO member (USERNAME,PASSWORD,MEMBER_TYPE,FULLNAME,LASTNAME,ADDRESS,TEL,EMAIL) VALUES ('".$_POST["USERNAME"]."','".$_POST["PASSWORD"]."','".$_POST["MEMBER_TYPE"]."','".$_POST["FULLNAME"]."','".$_POST["LASTNAME"]."','".$_POST["ADDRESS"]."','".$_POST["TEL"]."','".$_POST["EMAIL"]."')";
			}else if($_POST['proc'] =='edit'){
			$strSQL = "UPDATE  member  SET 
			USERNAME 			= '".$_POST["USERNAME"]."',
			PASSWORD 			= '".$_POST["PASSWORD"]."',
			MEMBER_TYPE 		= '".$_POST["MEMBER_TYPE"]."',
			FULLNAME 			= '".$_POST["FULLNAME"]."',
			LASTNAME 			= '".$_POST["LASTNAME"]."',
			ADDRESS 			= '".$_POST["ADDRESS"]."',
			TEL 				= '".$_POST["TEL"]."',
			EMAIL 				= '".$_POST["EMAIL"]."'
			WHERE  MEMBER_ID  	='".$_POST["MEMBER_ID"]."'";
			if($_POST['LINK'] =='index.php' || $_POST['LINK'] =='index_history.php'){
			ob_start();
			session_destroy();
			session_start();
			$_SESSION["MEMBER_ID"]      = $_POST["MEMBER_ID"];
			$_SESSION["USERNAME"] 	    = $_POST["USERNAME"];
			$_SESSION["PASSWORD"]       = $_POST["PASSWORD"];
			$_SESSION["MEMBER_TYPE"]    = $_POST["MEMBER_TYPE"];
			$_SESSION["FULLNAME"] 	    = $_POST["FULLNAME"];
			$_SESSION["LASTNAME"]       = $_POST["LASTNAME"];
			$_SESSION["ADDRESS"]        = $_POST["ADDRESS"];
			$_SESSION["TEL"] 	   		= $_POST["TEL"];
			$_SESSION["EMAIL"]      	= $_POST["EMAIL"];
			}
			}else if($_POST['proc'] =='del'){
			$strSQL = "DELETE FROM member WHERE   MEMBER_ID ='".$_POST["MEMBER_ID"]."'";	
		}	
		$rows = mysqli_query($con,$strSQL);
		}else  if($_POST['TYPE'] =='manage_booking'){//จองห้อง
		if($_POST['proc'] =='save'){
			
			$strSQL = "INSERT INTO manage_booking (MEMBER_ID,TYPEROOM_ID,BOOKING_DATE,PAY_DATE,DATE_STAY,DATE_END,SUM_AMOUNT,BOOKING_STATUS) VALUES ('".$_POST["MEMBER_ID"]."','".$_POST["TYPEROOM_ID"]."','".c_date_db($_POST["BOOKING_DATE"])."','".c_date_db($_POST["PAY_DATE"])."','".c_date_db($_POST["DATE_STAY"])."','".c_date_db($_POST["DATE_END"])."','".str_replace(',','',$_POST["SUM_AMOUNT"])."','".$_POST["BOOKING_STATUS"]."')";
			$rows = mysqli_query($con,$strSQL);
			$reqbooking = mysqli_query($con,"SELECT MAX(BOOKING_ID) AS MAX_ID FROM  manage_booking ");
			$rec = mysqli_fetch_array($reqbooking);
			
			foreach($_POST['ROOM_ID'] AS $KEY => $VALUES){
				$strbook = "INSERT INTO manage_bookingdetail (BOOKING_ID,ROOM_ID) 
				VALUES ('".$rec["MAX_ID"]."','".$VALUES."')"; 
				$rowsbook = mysqli_query($con,$strbook);
				
				$strroom = "UPDATE  manage_room  SET 
				ROOM_STATUS 		= 'N'
				WHERE  ROOM_ID  	='".$VALUES."'";
				$rowsroom = mysqli_query($con,$strroom);
			}
			
			}else if($_POST['proc'] =='edit'){
			$strSQL = "UPDATE  manage_booking  SET 
			MEMBER_ID 			= '".$_POST["MEMBER_ID"]."',
			TYPEROOM_ID 		= '".$_POST["TYPEROOM_ID"]."',
			BOOKING_DATE 		= '".c_date_db($_POST["BOOKING_DATE"])."',
			DATE_STAY 			= '".c_date_db($_POST["DATE_STAY"])."',
			PAY_DATE 			= '".c_date_db($_POST["PAY_DATE"])."',
			DATE_END 			= '".c_date_db($_POST["DATE_END"])."',
			SUM_AMOUNT 			= '".str_replace(',','',$_POST["SUM_AMOUNT"])."',
			BOOKING_STATUS 		= '".$_POST["BOOKING_STATUS"]."'
			WHERE  BOOKING_ID  	='".$_POST["BOOKING_ID"]."'";
			$rows = mysqli_query($con,$strSQL);
			$STATUS  = $_POST["BOOKING_STATUS"]=='Y'||$_POST["BOOKING_STATUS"]=='N'?'N':'Y';
			$strSQLdetail = "DELETE FROM manage_bookingdetail WHERE   BOOKING_ID ='".$_POST["BOOKING_ID"]."'";	
			$rowsdetail = mysqli_query($con,$strSQLdetail);
			foreach($_POST['ROOM_ID'] AS $KEY => $VALUES){
				$strbook = "INSERT INTO manage_bookingdetail (BOOKING_ID,ROOM_ID) 
				VALUES ('".$_POST["BOOKING_ID"]."','".$VALUES."')"; 
				$rowsbook = mysqli_query($con,$strbook);
				$strroom = "UPDATE  manage_room  SET 
				ROOM_STATUS 		= '".$STATUS."'
				WHERE  ROOM_ID  	='".$VALUES."'";
				$rowsroom = mysqli_query($con,$strroom);
			}
			}else if($_POST['proc'] =='del'){
			
			$str  = mysqli_query($con,"SELECT ROOM_ID FROM manage_bookingdetail 
			WHERE  BOOKING_ID ='".$_POST["BOOKING_ID"]."'");	
			while($room = mysqli_fetch_array($str)){
				$strroom = "UPDATE  manage_room  SET 
				ROOM_STATUS 		= 'Y'
				WHERE  ROOM_ID  	='".$room['ROOM_ID']."'";
				$rowsroom = mysqli_query($con,$strroom);
			}
			$strSQL = "DELETE FROM manage_booking WHERE   BOOKING_ID ='".$_POST["BOOKING_ID"]."'";	
			$rows = mysqli_query($con,$strSQL);
			$strSQLdetail = "DELETE FROM manage_bookingdetail WHERE   BOOKING_ID ='".$_POST["BOOKING_ID"]."'";	
			$rowsdetail = mysqli_query($con,$strSQLdetail);
			
		}	
		//$rows = mysqli_query($con,$strSQL);
		//exit;
		}else if($_POST['TYPE'] =='manage_satisfaction'){//ความพึงพอใจ
		if($_POST['proc'] =='save'){
			$strSQL = "INSERT INTO manage_satisfaction (MEMBER_ID,TYPEROOM_ID,FACILITIES,CLEAN,DESIGN,SIZE,ROOM_RATES,SERVICE_FEE,FINESS_ROOM,FOOD_PRICE) VALUES ('".$_POST["MEMBER_ID"]."','".$_POST["TYPEROOM_ID"]."','".$_POST["SATIS"]['1_1']."','".$_POST["SATIS"]["1_2"]."','".$_POST["SATIS"]["1_3"]."','".$_POST["SATIS"]["1_4"]."','".$_POST["SATIS"]["2_1"]."','".$_POST["SATIS"]["2_2"]."','".$_POST["SATIS"]["2_3"]."','".$_POST["SATIS"]["2_4"]."')";
			}else if($_POST['proc'] =='edit'){
			$strSQL = "UPDATE  manage_satisfaction  SET 
			MEMBER_ID 			= '".$_POST["MEMBER_ID"]."',
			TYPEROOM_ID 		= '".$_POST["TYPEROOM_ID"]."',
			FACILITIES 			= '".$_POST["SATIS"]['1_1']."',
			CLEAN 				= '".$_POST["SATIS"]['1_2']."',
			DESIGN 				= '".$_POST["SATIS"]['1_3']."',
			SIZE 				= '".$_POST["SATIS"]['1_4']."',
			ROOM_RATES 			= '".$_POST["SATIS"]['1_1']."',
			SERVICE_FEE 		= '".$_POST["SATIS"]['1_2']."',
			FINESS_ROOM 		= '".$_POST["SATIS"]['1_3']."',
			FOOD_PRICE 			= '".$_POST["SATIS"]['1_4']."'
			WHERE  SATIS_ID  	='".$_POST["SATIS_ID"]."'";
			}else if($_POST['proc'] =='del'){
			$strSQL = "DELETE FROM manage_satisfaction WHERE   SATIS_ID ='".$_POST["SATIS_ID"]."'";	
		}
		$rows = mysqli_query($con,$strSQL);
	}
	//exit;
	if($_POST['LINK'] =='index.php'|| $_POST['LINK'] =='index_history.php'){
		header("location:../".$_POST['LINK']."");
		}else{	
		header("location:../form/".$_POST['LINK']."");
	}
	mysqli_close($con);	
	exit();
?>		