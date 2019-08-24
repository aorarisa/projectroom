<?php 
	include 'connect/config.php';
	session_start();
    ob_start();
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
		<link rel="stylesheet" href="./../bower_components/bootstrap/dist/css/bootstrap.min.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="./../bower_components/font-awesome/css/font-awesome.min.css">
		<!-- Ionicons -->
		<link rel="stylesheet" href="./../bower_components/Ionicons/css/ionicons.min.css">
		<!-- Theme style -->
		<link rel="stylesheet" href="./../dist/css/AdminLTE.min.css">
		<!-- AdminLTE Skins. Choose a skin from the css/skins
		folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="./../dist/css/skins/_all-skins.min.css">
		<!-- Morris chart -->
		<link rel="stylesheet" href="./../bower_components/morris.js/morris.css">
		<!-- jvectormap -->
		<link rel="stylesheet" href="./../bower_components/jvectormap/jquery-jvectormap.css">
		<!-- Date Picker -->
		<link rel="stylesheet" href="./../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
		<!-- Daterange picker -->
		<link rel="stylesheet" href="./../bower_components/bootstrap-daterangepicker/daterangepicker.css">
		<!-- bootstrap wysihtml5 - text editor -->
		<link rel="stylesheet" href="./../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
		<link rel="stylesheet" href="./../bower_components/Ionicons/css/ionicons.min.css">
		<!-- DataTables -->
		<link rel="stylesheet" href="./../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
		<!-- select -->
		<link rel="stylesheet" href="./../bower_components/bootstrap-select/css/bootstrap-select.css">
		<!-- bootstrap datetimepicker -->
		<link rel="stylesheet" href="./../bower_components/bootstrap-datetimepicker/css/jquery.datetimepicker.css">
		
	</head>
	<body class="hold-transition skin-yellow layout-top-nav">
		<div class="content-wrapper">
			<header class="main-header">
				<nav class="navbar navbar-static-top">
					<div class="container">
						<div class="navbar-header">
							<div class="navbar-header">
								<a href="index.php" class="navbar-brand"><b>ระบบจองห้องพัก</b></a>
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
									<i class="fa fa-bars"></i>
								</button>
							</div>
						</div>
						
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
							<ul class="nav navbar-nav">
								<li class="header"></li>
								<?php if(count($_SESSION)>0){?>
									<li class="user user-menu active" id="index">
										<a href="index.php" class="btn-active"><b><i class="fa fa-fw fa-university"></i> จองห้อง</b></a>
									</li>
									<li class="user user-menu " id="index_history">
										<a href="index_history.php" class="btn-active"><b><i class="glyphicon glyphicon-home"></i> ประวัติการจอง</b></a>
									</li>
								<?php }?>
								<li class="user user-menu" id="index_location">
									<a href="index_location.php" class="btn-active"><b><i class="glyphicon glyphicon-map-marker"></i> ข้อมูลห้องพัก</b></a>
								</li>
							</ul>
						</div>
						<!-- /.navbar-collapse -->
						<!-- Navbar Right Menu -->
						<div class="navbar-custom-menu">
							<ul class="nav navbar-nav">
								<!-- User Account Menu -->
								<?php if(count($_SESSION)>0){?>
									<li class="dropdown active">
										<a href="javascript:void(0);" class="btn-active" onclick="chk_edit('<?php echo $_SESSION['MEMBER_ID'];?>','<?php echo $_SESSION['USERNAME'];?>','<?php echo $_SESSION['PASSWORD'];?>','<?php echo $_SESSION['MEMBER_TYPE'];?>','<?php echo $_SESSION['FULLNAME'];?>','<?php echo $_SESSION['LASTNAME'];?>','<?php echo $_SESSION['ADDRESS'];?>','<?php echo $_SESSION['TEL'];?>','<?php echo $_SESSION['EMAIL'];?>',);" ><i class="glyphicon glyphicon-user"></i> <?php echo $_SESSION['SES_FULLNAME'];?>
										</a>
									</li>
									<li class="user user-menu active">
										<a  href="javascript:void(0);" class="btn-active" onclick="chk_logout();"><i class="fa fa-fw fa-sign-out"></i> ออกจากระบบ</a>
									</li>
									<?php }else { ?>
									<li class="dropdown user user-menu">
										
										<a href="javascript:void(0);"onclick="login();" class="btn-active"><b><i class="fa fa-fw fa-sign-in"></i> เข้าสู่ระบบ</b></a>
										
									</li>
								<?php } ?>
							</ul>
						</div>
						<!-- /.navbar-custom-menu -->
					</div>
					<!-- /.container-fluid -->
				</nav>
			</header>
			
			<?php 
				
				$CHK  = explode("/",$_SERVER['SCRIPT_NAME']);
				
				if($CHK[4] == "index.php"){
					$TYPE ="manage_member";
				}
				if($CHK[4] == "index_history.php"){
					$TYPE ="manage_member";
				}
				$CHK_TYPE = $CHK[4];
				
			?>
			<!-- Main content -->
			<section class="content">
				<div class="row">
					<div class="col-xs-1"></div>
					<div class="col-xs-10">
						<div class="box">
							<div class="box">
								<div class="box box-default color-palette-box">
									<div class="callout callout-default">
										<h4><i class="fa fa-fw fa-university"></i> ห้องพัก</h4>
									</div>
									<hr/>
									<div class="panel-body">
										<div class="col-md-4"></div>
										<div class="col-md-6"></div>
										<div class="col-md-2" style="text-align:right;"></div>
										<div class="row">
											<div class="col-md-12" class="container">
												
												<div class="col-md-12">
													<div class="box box-solid">
														<div class="box-header with-border">
															<i class="fa fa-fw fa-university"></i>
															
															<h3 class="box-title">ประเภทห้องพัก</h3>
														</div>
														<!-- /.box-header -->
														<div class="box-body">
															<!-- Project One -->
															<?php foreach($arr_typeroom as $key => $value){
																
															?>
															<div class="row" id="<?php echo $key;?>">
																<div class="col-md-0"></div>
																<div class="col-md-6">
																	<div id="carousel-example-generic<?php echo $key;?>" class="carousel slide" data-ride="carousel">
																		<ol class="carousel-indicators">
																			<?php 
																				$i = 1;
																				$rows_roomimage = mysqli_query($con,"SELECT * FROM mannage_roomimage 
																				WHERE TYPEROOM_ID ='".$key."' ORDER BY IMAGE_ID ASC ");
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
																				WHERE TYPEROOM_ID ='".$key."' ORDER BY IMAGE_ID ASC ");
																				$num = mysqli_num_rows($rows);
																				while($rec_roomimage = mysqli_fetch_array($rows)){ ?>
																				<div class="item <?php echo $in =='1'?'active':'';?>">
																					<img src="attach/<?php echo $rec_roomimage['IMAGE_NAME'];?>"  alt="" width="700" height="300">
																					<div class="carousel-caption">
																					</div>
																				</div>
																				<?php 
																					$in++;
																				} ?>
																		</div>
																		<a class="left carousel-control" href="#carousel-example-generic<?php echo $key;?>" data-slide="prev">
																			<span class="fa fa-angle-left"></span>
																		</a>
																		<a class="right carousel-control" href="#carousel-example-generic<?php echo $key;?>" data-slide="next">
																			<span class="fa fa-angle-right"></span>
																		</a>
																	</div>
																</div>
																<div class="col-md-6">
																	<h3><?php echo $value?></h3>
																	<p><?php echo $arr_typeroom_detail[$key]?></p>
																	<div class="row">
																		<div class="col-md-6">ประเภทห้อง  :</div>
																		<div class="col-md-6"><?php echo $arr_typeroom_type[$key]?></div>  
																		</div><div class="row">
																		<div class="col-md-6">พื้นที่  :</div>
																		<div class="col-md-6"><?php echo $arr_typeroom_area[$key]?></div>  
																	</div>  
																	<div class="row">
																		<div class="col-md-6">ขนาดเตียง :</div>
																		<div class="col-md-6"><?php echo $arr_typeroom_size[$key]?></div>  
																	</div>
																	<div class="row" style="display:none;">
																		<div class="col-md-6">สิ่งอำนวยความสะดวก :</div>
																		<div class="col-md-6"></div>  
																	</div>
																	<div class="row">
																		<div class="col-md-6">จำนวนห้องทั้งหมด :</div>
																		<div class="col-md-6"><?php echo $arr_typeroom_countroom[$key]?></div>  
																	</div>   
																	<div class="row">
																		<div class="col-md-6">จำนวนห้องว่าง :</div>
																		<div class="col-md-6"><?php echo $arr_typeroom_countroomnull[$key]?></div>  
																	</div>
																	<div class="row">
																		<div class="col-md-6">ราคา :</div>
																		<div class="col-md-6"><?php echo number_format($arr_typeroom_amount[$key],2)?>&nbsp;บาท</div>  
																	</div>
																	<hr/>
																	<div class="row">
																		<div class="col-md-7" style="text-align:right;" ></div>
																		
																		<div class="col-md-5">
																			<?php if($arr_typeroom_countroomnull[$key] > 0  &&  count($_SESSION)>0){?>
																				<a class="btn btn-success"  href="javascript:void(0);"onclick="chk_booking('1','<?php echo $_SESSION['MEMBER_ID'];?>','<?php echo $key;?>');" readonly >จองห้อง</a>
																			<?php }?>
																		</div>  
																	</div>
																	
																</div>
																<div class="col-md-0"></div>
															</div>
															<hr>
															<?php  } ?>
														</div>
														<!-- /.box-body -->
													</div>
													<!-- /.box -->
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
				<div class="col-md-1"><div id="addlogin"></div>
					<div id="editlogin"></div>
					<div id="booking"></div>
				</div>
			</div>
			<!-- Bootstrap core JavaScript -->
			
			<!-- jQuery 3 -->
			<script src="./../bower_components/jquery/dist/jquery.min.js"></script>
			
			<!-- Bootstrap 3.3.7 -->
			<script src="./../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
			<!-- FastClick -->
			<script src="./../bower_components/fastclick/lib/fastclick.js"></script>
			<!-- Select2 -->
			<script src="./../bower_components/bootstrap-select/js/bootstrap-select.js"></script> 
			<!-- DataTables --> 
			<script src="./../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
			<script src="./../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
			<!-- SlimScroll -->
			<script src="./../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
			<!-- AdminLTE App -->
			<script src="./../dist/js/adminlte.min.js"></script>
			<!-- AdminLTE for demo purposes -->
			<script src="./../dist/js/demo.js"></script>
			<!-- bootstrap datetimepicker -->
			<script src="./../bower_components/bootstrap-datetimepicker/js/jquery.datetimepicker.full.js"></script>
			<script src="./../bower_components/jquery-ui/ui/datepicker.js"></script> 
			
		</body>
		<script type="text/javascript" charset="utf-8">
			$(document).ready(function() {
				$('.carousel').carousel({
					interval: 1000
				});
				
			});
			function addCommas(nStr)
			{
				nStr += '';
				x = nStr.split('.');
				x1 = x[0];
				x2 = x.length > 1 ? '.' + x[1] : '';
				var rgx = /(\d+)(\d{3})/;
				while (rgx.test(x1)) {
					x1 = x1.replace(rgx, '$1' + ',' + '$2');
				}
				return x1 + x2;
			}
			function login(){
				$.ajax({
					url: 'form/modal.php',
					type: 'POST',
					dataType: 'html',
					data: {chk_data:'login',type:'1',proc:'save',id:'',user:'',pass:'', type:'',name:'',last:'',address:'',tel:'',email:'', TYPE:'<?php echo $TYPE;?>',CHK_TYPE:'<?php echo $CHK_TYPE;?>'},
					success: function(data) {
						//alert(data);
						$('#addlogin').html(data);
						$('#login').modal('toggle');
					}
				});
			}
			function chk_date(){
			}
			function re_password (value) {
				var password = $('#PASSWORD').val();
				if ($('#PASSWORD').val() == ''){
					alert('กรุณาระบุรหัสผู้ใช้งานก่อน');
					$('#PASSWORD').focus();
					$('#REPASSWORD').val('');
					return false;
				} 
				if(value != password){
					alert('ยืนยันรหัสผู้ใช้งานไม่ถูกต้อง');
					$('#REPASSWORD').val('');
					return false;
				}
			}
			function chk_logout(){
				$.ajax({
					url: 'form/chk_data.php',
					type: 'POST',
					dataType: 'html',
					data: {chk_data:'chk_logout'},
					success: function(data) {
						if(data.trim() == '1'){
							window.location.href = '../system/index.php';
						}	
					}
				});
			}
			function chk_edit(id,user,pass,type,name,last,address,tel,email){
				$.ajax({
					url: 'form/modal.php',
					type: 'POST',
					dataType: 'html',
					data: {chk_data:'login',type:'2',proc:'edit', id:id,user:user,pass:pass, type:type,name:name,last:last,address:address,tel:tel,email:email,TYPE:'<?php echo $TYPE;?>',CHK_TYPE:'<?php echo $CHK_TYPE;?>'},
					success: function(data) {
						$('#editlogin').html(data);
						$('#register').modal('toggle');
					}
				});
			}	
			function chk_booking(id,value,typeroom){
				$.ajax({
					url: 'form/modal.php',
					type: 'POST',
					dataType: 'html',
					data: {chk_data:'memberbooking',proc:'save', id:id,val:value,typeroom:typeroom,booking_date:'<?php echo  date('d/m/').(date('Y')+543);?>',pay_date:'',date_stay:'<?php echo  date('d/m/').(date('Y')+543);?>',date_end:'<?php echo  date('d/m/').(date('Y')+543);?>',sum_amount:'0',satus:'N',TYPE:'manage_booking',CHK_TYPE:'<?php echo $CHK_TYPE;?>'},
					success: function(data) {
						$('#booking').html(data);
						$('#myModalbooking').modal('toggle');
						//$('.selectpicker').selectpicker();
					}
				});
				
			}
			function tableroom(id,value,booking_id,TYPE){	
				$.ajax({
					url: 'form/chk_data.php',
					type: 'POST',
					dataType: 'html',
					data: {chk_data:'tableroom', data:value,booking_id:booking_id},
					success: function(data) {
						$('#TABLEROOM'+TYPE).html(data);
						//$('.selectpicker').selectpicker();
					}
				});
			}
			function amount(){
				var len = $('[id^=ROOM_ID_]:checked').length;
				var sumAmount = 0;
				
				$('[id^=ROOM_ID_]:checked').each(function(){
					sumAmount += +$('#FUND_AMOUNT_'+this.value).val();
				});
				$('[id^=SUM_AMOUNT]').val(addCommas(parseFloat(sumAmount).toFixed(2)));
			}
		</script>
	</html>
