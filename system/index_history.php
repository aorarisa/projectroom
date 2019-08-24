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
									<li class="user user-menu " id="index">
										<a href="index.php" class="btn-active"><b><i class="fa fa-fw fa-university"></i> จองห้อง</b></a>
									</li>
									<li class="user user-menu active" id="index_history">
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
										<a  href="javascript:void(0);" class="btn-active" onclick="chk_logout();"> <i class="fa fa-fw fa-sign-out"></i> ออกจากระบบ</a>
									</li>
									<?php }else { ?>
									<li class="dropdown user user-menu">
										
										<a  href="javascript:void(0);"onclick="login();" class="btn-active"><b><i class="fa fa-fw fa-sign-in"></i> เข้าสู่ระบบ</b></a>
										
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
			<section class="content-wrapper">
				<div class="row">
					<div class="col-xs-1"></div>
					<div class="col-xs-10">
						<div class="box">
							<div class="box box-default color-palette-box">
								<div class="callout callout-default">
									<h4><i class="glyphicon glyphicon-home"></i>  ประวัติการจอง</h4>
								</div>
								<hr/>
								<div class="panel-body">
									<div class="col-md-4"></div>
									<div class="col-md-6"></div>
									<div class="col-md-2" style="text-align:right;"></div>
									<div class="row">
										<div class="col-md-12" class="container">
											<div class="col-md-12">
												<br>
												<div class="table-responsive">
													<table id="example" class="table table-bordered table-hover table-striped dataTable" >
														<thead>
															<tr class="" >
																<th style="text-align:center; width:5%;">ลำดับ</th>
																<th style="text-align:center; width:10%;">ประเภทห้อง</th>
																<th style="text-align:center; width:10%;">วันที่จอง</th>
																<th style="text-align:center; width:10%;">วันที่เข้าพัก</th>
																<th style="text-align:center; width:10%;">ถึงวันที่</th>
																<th style="text-align:center; width:5%;">จำนวนห้อง</th>
																<th style="text-align:center; width:10%;">จำนวนเงิน</th>
																<th style="text-align:center; width:10%;">สถานะ</th>
																<th style="text-align:center; width:15%;">การจัดการ</th>
															</tr>
														</thead>	
														<tbody>
															<?php
																$p=1;
																$rows = mysqli_query($con,"SELECT A.*,(SELECT COUNT(*) FROM manage_bookingdetail B 
																WHERE A.BOOKING_ID = B.BOOKING_ID) AS COUNT_NUM
																FROM manage_booking  A WHERE MEMBER_ID ='".$_SESSION['MEMBER_ID']."' ORDER BY A.BOOKING_ID DESC");
																
																while($rec = mysqli_fetch_array($rows)){
																	$class= $rec['BOOKING_STATUS'] =="N"?'text-danger':'text-success';
																	$PAY_DATE= $rec['PAY_DATE'] =="0000-00-00"?'':show_convert_date($rec['PAY_DATE']);
																	
																	$TYPEROOM_ID = "'TYPEROOM_ID'";
																	$TYPEROOM =   "'".$rec['TYPEROOM_ID']."'";
																	$BOOKING_ID = "'".$rec['BOOKING_ID']."'";
																	$VIEW = "'VIEW'";
																	$COUNT_NUM = $rec['COUNT_NUM'] > 0 ?'<a href="javascript:void(0);" onclick="VIEW('.$BOOKING_ID.','.$TYPEROOM_ID.','.$TYPEROOM.','.$VIEW.');" class="btn btn-xs">'.number_format($rec['COUNT_NUM']).'</a>':number_format($rec['COUNT_NUM']); 
																	
																	$rows_manage = mysqli_query($con,"SELECT *
																	FROM  manage_satisfaction  
																	WHERE MEMBER_ID ='".$_SESSION['MEMBER_ID']."' AND TYPEROOM_ID ='".$rec['TYPEROOM_ID']."'");
																	$rec_manage = mysqli_fetch_array($rows_manage);
																	
																?>
																<tr class="" >
																	<td style="text-align:center;" class=""><?php echo $p;?></td>
																	<td style="text-align:left;"><?php echo $arr_typeroom[$rec['TYPEROOM_ID']];?></td>
																	<td style="text-align:right;"><?php echo show_convert_date($rec['BOOKING_DATE']);?></td>
																	<td style="text-align:right;"><?php echo show_convert_date($rec['DATE_STAY']);?></td>
																	<td style="text-align:right;"><?php echo show_convert_date($rec['DATE_END']);?></td>
																	<td style="text-align:right;"><?php echo  $COUNT_NUM;?></td>
																	<td style="text-align:right;"><?php echo  number_format($rec['SUM_AMOUNT'],2);?></td>
																	<td class="<?php echo  $class;?>" style="text-align:center;"><?php echo $arr_statusbooking[$rec['BOOKING_STATUS']].'<br>'.$PAY_DATE;?>
																	</td>
																	
																	<td style="text-align:center;">
																		<?php if($rec['BOOKING_STATUS'] !='C'){?>
																			<a href="javascript:void(0);" type="button" onclick="cancel('<?php echo $rec['BOOKING_ID'];?>');" class="btn btn-danger btn-xs">
																			ยกเลิกการจอง</a>
																		<?php } ?>
																		<?php if($rec['BOOKING_STATUS'] =='Y'){?>
																			<a href="javascript:void(0);" type="button" onclick="satisfac('<?php echo $rec_manage['SATIS_ID'];?>','<?php echo $_SESSION['MEMBER_ID'];?>','<?php echo $rec['TYPEROOM_ID'];?>','<?php echo $rec_manage['FACILITIES'];?>','<?php echo $rec_manage['CLEAN'];?>','<?php echo $rec_manage['DESIGN'];?>','<?php echo $rec_manage['SIZE'];?>','<?php echo $rec_manage['ROOM_RATES'];?>','<?php echo $rec_manage['SERVICE_FEE'];?>','<?php echo $rec_manage['FINESS_ROOM'];?>','<?php echo $rec_manage['FOOD_PRICE'];?>');" class="btn btn-info btn-xs">
																			แบบประเมิน</a>
																		<?php } ?>
																		<a href="javascript:void(0);" type="button" onclick="report('<?php echo $rec['BOOKING_ID'];?>','<?php echo $rec['MEMBER_ID'];?>','<?php echo $rec['TYPEROOM_ID'];?>','<?php echo $rec['BOOKING_DATE'];?>','<?php echo $rec['PAY_DATE'];?>','<?php echo $rec['DATE_STAY'];?>','<?php echo $rec['DATE_END'];?>','<?php echo $rec['SUM_AMOUNT'];?>','<?php echo $rec['BOOKING_STATUS'];?>');" class="btn btn-primary btn-xs" style="display:none;">
																		พิมพ์ใบจอง</a>
																		
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
								<!-- /.box-body -->
							</div>
							<!-- /.box -->
						</div>
						<!-- /.col -->
						
					</div>
					<!-- /.row -->
					
					<!-- /.content -->
					<div class="col-md-1">
						<div id="addlogin"></div>
						<div id="editlogin"></div>
						<div id="booking"></div>
						<div id="view"></div>
						<div id="satisfac"></div>
					</div>
				</section>
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
					<?php if(count($_SESSION) == 0){?> 
						chk_logout().trigger('change');
					<?php }?>
				});
				$('#example').DataTable({
					"oLanguage": {
						"sEmptyTable":     "ไม่มีข้อมูลในตาราง",
						"sInfo":           "แสดง _START_ ถึง _END_ จาก _TOTAL_ แถว",
						"sInfoEmpty":      "แสดง 0 ถึง 0 จาก 0 แถว",
						"sInfoFiltered":   "(กรองข้อมูล _MAX_ ทุกแถว)",
						"sInfoPostFix":    "",
						"sInfoThousands":  ",",
						"sLengthMenu":     "แสดง _MENU_ แถว",
						"sLoadingRecords": "กำลังโหลดข้อมูล...",
						"sProcessing":     "กำลังดำเนินการ...",
						"sSearch":         "ค้นหา: ",
						"sZeroRecords":    "ไม่พบข้อมูล",
						"oPaginate": {
							"sFirst":    "หน้าแรก",
							"sPrevious": "ก่อนหน้า",
							"sNext":     "ถัดไป",
							"sLast":     "หน้าสุดท้าย"
						},
						"oAria": {
							"sSortAscending":  ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
							"sSortDescending": ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย"
						}
					}
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
				function cancel(booking_id){
					$.ajax({
						url: 'form/chk_data.php',
						type: 'POST',
						dataType: 'html',
						data: {chk_data:'update_booking',BOOKING_ID:booking_id},
						success: function(data) {
							
						    if(data.trim() == '1'){
							    alert('ยกเลิกข้อมูลเรียบร้อยแล้ว');
								window.location.reload();
							}
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
				
				function VIEW(id,value,booking_id,TYPE){	
					$.ajax({
						url: 'form/modal.php',
						type: 'POST',
						dataType: 'html',
						data: {chk_data:'memberbooking',type:'3',id:id,val:value,booking_id:booking_id},
						success: function(data) {
							$('#view').html(data);
							$('#view'+id).modal('toggle');
							//$('.selectpicker').selectpicker();
						}
					});
				}
				function satisfac(id,value,typeroom,FACILITIES,CLEAN,DESIGN,SIZE,ROOM_RATES,SERVICE_FEE,FINESS_ROOM,FOOD_PRICE){
					var SATIS = {'1_1':FACILITIES,'1_2':CLEAN,'1_3':DESIGN,'1_4':SIZE,'2_1':ROOM_RATES,'2_2':SERVICE_FEE,'2_3':FINESS_ROOM,'2_4':FOOD_PRICE};
					
					if(id == ''){
						var proc_id ='กรุณาใส่ข้อมูล';
						var proc    ='save';
						}else{
						var proc_id ='แก้ไขใส่ข้อมูล';
						var proc    ='edit';	
					}
					$.ajax({
						url: 'form/modal.php',
						type: 'POST',
						dataType: 'html',
						data: {chk_data:'member_satisfac',proc_id:proc_id,proc:proc, id:id,val:value,typeroom:typeroom,SATIS:SATIS,TYPE:'manage_satisfaction',CHK_TYPE:'<?php echo $CHK_TYPE;?>'},
						success: function(data) {
							$('#satisfac').html(data);
							$('#satisfac'+proc).modal('toggle'); 
							//$('.selectpicker').selectpicker();
						}
					});
				}
				function member(value,TYPE){
					$.ajax({
						url: 'form/chk_data.php',
						type: 'POST',
						dataType: 'html',
						data: {chk_data:'SATISFAC',val:value,selected:'0'},
						success: function(data) {
							$('#TYPEROOMSATISFAC'+TYPE).html(data);
							//$('.selectpicker').selectpicker();
						}
					});
					
					
				}
			</script>
		</html>
		