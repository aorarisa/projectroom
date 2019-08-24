<?php  
    ob_start();
    session_start();
	include 'config.php';
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>ระบบจองห้องพัก</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.7 -->
		<link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
		<!-- AdminLTE Skins. Choose a skin from the css/skins
		folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">
		<!-- Morris chart -->
		<link rel="stylesheet" href="../../bower_components/morris.js/morris.css">
		<!-- jvectormap -->
		<link rel="stylesheet" href="../../bower_components/jvectormap/jquery-jvectormap.css">
		<!-- Date Picker -->
		<link rel="stylesheet" href="../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
		<!-- Daterange picker -->
		<link rel="stylesheet" href="../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
		<!-- bootstrap wysihtml5 - text editor -->
		<link rel="stylesheet" href="../../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
		<link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
		<!-- DataTables -->
		<link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
		<!-- select -->
		<link rel="stylesheet" href="../../bower_components/bootstrap-select/css/bootstrap-select.css">
		<!-- bootstrap datetimepicker -->
		<link rel="stylesheet" href="../../bower_components/bootstrap-datetimepicker/css/jquery.datetimepicker.css">
		
		
		
	</head>
	<body class="skin-yellow sidebar-mini">
		<div class="wrapper">
			
			<header class="main-header">
				<!-- Logo -->
				<a href="index2.html" class="logo">
					<!-- mini logo for sidebar mini 50x50 pixels -->
					<span class="logo-mini"><b>A</b>LT</span>
					<!-- logo for regular state and mobile devices -->
					<span class="logo-lg"><b>Admin</b>LTE</span>
				</a>
				<!-- Header Navbar: style can be found in header.less -->
				<nav class="navbar navbar-static-top">
					<!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
						<span class="sr-only">Toggle navigation</span>
					</a>
					
					<div class="navbar-custom-menu">
						<ul class="nav navbar-nav">
							<!-- Notifications: style can be found in dropdown.less -->
							<li class="dropdown notifications-menu">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-bell-o"></i>
									<span class="label label-warning"><?php echo $rec_countbooking + $rec_countbookingdate;?></span>
								</a>
								<ul class="dropdown-menu">
									<li class="header">คุณมี <?php echo $rec_countbooking + $rec_countbookingdate;?> ข้อความแจ้งเตือน</li>
									<li>
										<!-- inner menu: contains the actual data -->
										<ul class="menu">
											<li>
												<a href="#">
													<i class="fa fa-users text-aqua"></i> <?php echo  $rec_countbookingdate;?> ห้องที่ข้อมูลพักวันนี้
												</a>
											</li>
											<li>
												<a href="#">
													<i class="fa fa-users text-red"></i> <?php echo $rec_countbooking;?> ห้องที่ยังไม่จ่ายเงิน
												</a>
											</li>
											
										</ul>
									</li>
									
								</ul>
							</li>
							
							<!-- User Account: style can be found in dropdown.less -->
							<li class="dropdown user user-menu active">
								<a href="#" class="dropdown-toggle " data-toggle="dropdown">
									<span class="hidden-xs"><?php if(count($_SESSION)>0){
									echo $_SESSION['SES_FULLNAME'];}?></span>
								</a>
								<li class="user user-menu active">
									<a  href="javascript:void(0);" class="btn-active" onclick="chk_logout();">ออกจากระบบ</a>
								</li>
								
								
							</li>
						</ul>
					</div>
				</nav>
			</header>
			
			<?php 
				
				$CHK  = explode("/",$_SERVER['SCRIPT_NAME']);
				
				if($CHK[5] == "manage_buidling.php"){
					$TYPE ="manage_buidling";
					}else if($CHK[5]  =="manage_class.php"){
					$TYPE ="manage_class";
					}else if($CHK[5]  =="manage_news.php"){
					$TYPE ="manage_news";
					}else if($CHK[5]  =="manage_typeroom.php"){
					$TYPE ="manage_typeroom";
					}else if($CHK[5]  =="manage_room.php"){
					$TYPE ="manage_room";
					}else if($CHK[5]  =="manage_member.php"){
					$TYPE ="manage_member";
					}else if($CHK[5]  =="manage_booking.php"){
					$TYPE ="manage_booking";
					}else if($CHK[5]  =="manage_satisfaction.php"){
					$TYPE ="manage_satisfaction";
					}else if($CHK[5]  =="manage_location.php"){
					$TYPE ="manage_location";
				}
				$CHK_TYPE = $CHK[5];
				
			?>	
			
			
				