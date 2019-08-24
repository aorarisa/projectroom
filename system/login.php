<?php
	if($_POST['chk_data'] == 'login'){
		include '../connect/config.php'; 
		if($_POST['type'] =='1'){
		?>	  
<!DOCTYPE html>
<html lang="en">
<head>
<title>BR Homestay : Account</title>
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
									<input type="submit" value="เข้าสู่ระบบ"> 
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
	
</body>
</html>