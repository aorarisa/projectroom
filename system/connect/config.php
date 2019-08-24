<?php
	$con = mysqli_connect("localhost","root","1234","db_room"); //ไม่ได้เปลี่ยนชื่อตาม database ที่เราตั้งไง
	
	// Check connection
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	if (!$con->set_charset("utf8")) {
		printf("Error loading character set utf8: %s\n", $con->error);
		exit();
		} else {
		$con->character_set_name();
	}
	function c_date_db($input){ //แปลงค่าวันที่ ลง DB
		$date=trim($input)?(substr($input,6,4)-543)."-".substr($input,3,2)."-".substr($input,0,2):'NULL';
		return $date;
	}
	
	function date_to_db($date){
		if(trim($date) != ""){
			$d = explode("-", $date);
			$day = $d[2]."/".$d[1]."/".($d[0] + 543);
			return $day;
		}
	}
	
	//show in calendar
	function show_convert_date($date) // 01/02/2560
	{
		$mont_th_short = array( '01'=>"ม.ค.",
		'02'=>"ก.พ.",
		'03'=>"มี.ค.",
		'04'=>"เม.ย.",
		'05'=>"พ.ค.",
		'06'=>"มิ.ย.",
		'07'=>"ก.ค.",
		'08'=>"ส.ค.",
		'09'=> "ก.ย.",
		'10'=>"ต.ค.",
		'11'=>"พ.ย.",
		'12'=> "ธ.ค."
		);
		if($date != "")
		{
			$d = explode("-", $date);
			$day = $d[2]." ".$mont_th_short[$d[1]]." ".($d[0] + 543);
			
			return $day;
		}
	}
	
	function print_pre($val){
		echo '<pre>';
		print_r($val);
		echo  '</pre>';
		return ;
	}
	function status ($val){
		$arr_status = array("Y"=>"เปิดการใช้งาน" , "N"=>"ปิดการใช้งาน");
		$status =  $arr_status[$val];
		return $status;
	}
	$arr_status = array('Y'=>'เปิดการใช้งาน','N'=>'ปิดการใช้งาน');
	
	$arr_roomstatus = array('Y'=>'ว่าง','N'=>'ไม่ว่าง');
	
	$arr_roomtypestatus = array('1'=>'ห้องแอร์','2'=>'พัดลม'); 
	
	$arr_statusbooking = array("Y"=>"จ่ายเงินแล้ว" , "N"=>"รอจ่ายเงิน",'C'=>'ยกเลิก');
	
	$arr_member = array("1"=>"ผู้ดูแลระบบ" , "2"=>"ผู้ใช้งาน");
	
	$arr_statusroom = array('Y'=>'<span class="glyphicon glyphicon-ok text-success"></span>','N'=>'<span class="glyphicon glyphicon-remove  text-danger"></span>');
	
	function member_type ($val){
		$arr_member = array("1"=>"ผู้ดูแลระบบ" , "2"=>"ผู้ใช้งาน");
		$member =  $arr_member[$val];
		return $member;
	}	
	
	function roomtypestatus ($val){
		$arr_roomtypestatus = array('1'=>'ห้องแอร์','2'=>'พัดลม');
		$typestatus =  $arr_roomtypestatus[$val];
		return $typestatus;
	}
	
	$arr_building = array();
	$rows = mysqli_query($con,"SELECT * FROM manage_building  ORDER BY BUILDING_NAME DESC");			
	while($rec = mysqli_fetch_array($rows)){
		$arr_building[$rec['BUILDING_ID']] = $rec['BUILDING_NAME'];
		
	}
	$arr_typeroom = array();
	$arr_typeroom_detail = array();
	$arr_typeroom_type = array();
	$arr_typeroom_area = array();
	$arr_typeroom_size = array();
	$arr_typeroom_amount = array();
	$arr_typeroom_countroom = array();
	$arr_typeroom_countroomnull = array();
	$rows_typeroom = mysqli_query($con,"SELECT a.*,(SELECT COUNT(TYPEROOM_ID) FROM manage_room c WHERE a.TYPEROOM_ID = c.TYPEROOM_ID) AS COUNT_ROOM,(SELECT COUNT(TYPEROOM_ID) FROM manage_room c WHERE a.TYPEROOM_ID = c.TYPEROOM_ID AND ROOM_STATUS ='Y') AS COUNT_ROOMNULL FROM manage_typeroom a  ORDER BY TYPEROOM_NAME DESC");			
	while($rec_typeroom = mysqli_fetch_array($rows_typeroom)){
		$arr_typeroom[$rec_typeroom['TYPEROOM_ID']] = $rec_typeroom['TYPEROOM_NAME'];
		$arr_typeroom_detail[$rec_typeroom['TYPEROOM_ID']] = $rec_typeroom['TYPEROOM_DETAIL'];
		$arr_typeroom_area[$rec_typeroom['TYPEROOM_ID']] = $rec_typeroom['TYPEROOM_AREA'];
		$arr_typeroom_size[$rec_typeroom['TYPEROOM_ID']] = $rec_typeroom['TYPEROOM_SIZE'];
		$arr_typeroom_type[$rec_typeroom['TYPEROOM_ID']] = roomtypestatus($rec_typeroom['TYPEROOM_SATUS']);
		$arr_typeroom_amount[$rec_typeroom['TYPEROOM_ID']] = $rec_typeroom['TYPEROOM_AMOUNT'];$arr_typeroom_countroom[$rec_typeroom['TYPEROOM_ID']] = $rec_typeroom['COUNT_ROOM'];$arr_typeroom_countroomnull[$rec_typeroom['TYPEROOM_ID']] = $rec_typeroom['COUNT_ROOMNULL'];
		
		
	}
	$rows_room = mysqli_query($con,"SELECT * FROM manage_room WHERE ROOM_STATUS ='Y' ");			
	$rec_countroom = mysqli_num_rows($rows_room);
	
	$rows_booking = mysqli_query($con,"SELECT * FROM manage_booking WHERE BOOKING_STATUS ='N' ");			
	$rec_countbooking = mysqli_num_rows($rows_booking);
	
	$rows_bookingdate  = mysqli_query($con,"SELECT * FROM manage_booking WHERE DATE_STAY ='".c_date_db(date('d/m/').(date('Y')+543))."' ");			
	$rec_countbookingdate = mysqli_num_rows($rows_bookingdate);
	
	$rows_member = mysqli_query($con,"SELECT * FROM member WHERE MEMBER_TYPE ='2' ");			
	$rec_countmember = mysqli_num_rows($rows_member);
	
	$arr_membername = array();
	$rows = mysqli_query($con,"SELECT MEMBER_ID,CONCAT(FULLNAME,'&nbsp;','&nbsp;',LASTNAME) AS TFULLNAME FROM member  ORDER BY TFULLNAME DESC");
	while($rec = mysqli_fetch_array($rows)){
		$arr_membername[$rec['MEMBER_ID']] = $rec['TFULLNAME'];
	}
	
	$rows_satis = mysqli_query($con,"SELECT MEMBER_ID,TYPEROOM_ID
	FROM manage_booking  WHERE BOOKING_STATUS ='Y' 
	GROUP BY MEMBER_ID,TYPEROOM_ID
	ORDER BY BOOKING_ID ASC");
	while($rec_satis = mysqli_fetch_array($rows_satis)){
		$arr_rec_satis[$rec_satis['MEMBER_ID']] = $arr_membername[$rec_satis['MEMBER_ID']];
	}
	
	$rows_percen = mysqli_query($con,"SELECT SUM(((SUM_AMOUNT/COUNT_AMOUNT)*100)/5) AS TOTAL_AMOUNT FROM(SELECT SUM(FACILITIES+CLEAN+DESIGN+SIZE+ROOM_RATES+SERVICE_FEE+FINESS_ROOM+FOOD_PRICE)/8 AS SUM_AMOUNT,COUNT(SATIS_ID) AS COUNT_AMOUNT FROM manage_satisfaction ORDER BY SATIS_ID ASC)AA");
	$rec_percen = mysqli_fetch_array($rows_percen);
	$percen = round($rec_percen['TOTAL_AMOUNT']);
	
	$arr_satisfaction_head = array(1=>'ความพึงพอใจด้านลักษณะห้องพัก',2=>'ความพึงพอใจด้านราคา'); 
	$arr_satisfaction_body = array(
	1=> array(1=>'ความพึงพอใจต่อสิ่งอํานวยความสะดวกในห้องพัก',2=>'ความพึงพอใจต่อความสะอาดในห้องพัก ',3=>'ความพึงพอใจต่อการออกแบบและการตกแต่งห้องพัก',4=>'ความพึงพอใจต่อขนาดของห้องพัก '),
	2=> array(1=>'ความเหมาะสมของราคาห้องพัก ',2=>'ความเหมาะสมของราคาค่าใช้บริการอินเทอร์เน็ต',3=>'ความเหมาะสมของราคาห้องฟิตเนส',4=>'ความเหมาะสมของราคาค่าอาหาร '));
	

	
?>	

