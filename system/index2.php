<?php 
    include 'connect/config.php';
    session_start();
    ob_start();
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="zxx">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> BR Homestay</title>
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="images/logo1.png">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!--Custom CSS-->
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/hotel.css" rel="stylesheet" type="text/css">
    <!--Flaticons CSS-->
    <link href="font/flaticon.css" rel="stylesheet" type="text/css">
    <!--Plugin CSS-->
    <link href="css/plugin.css" rel="stylesheet" type="text/css">
    <!--Font Awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    
</head>
<body>

    <!-- Preloader -->
    <div id="preloader">
        <div id="status"></div>
    </div>
    <!-- Preloader Ends -->

   <!-- Header -->
    <header>
        <div class="upper-head clearfix">
            <div class="container">
                <div class="contact-info">
                    <p><i class="flaticon-phone-call"></i> Phone: </p>
                    <p><i class="flaticon-mail"></i> Mail: </p>
                </div>
                <div class="login-btn pull-right">
                    <a href="#"><i class="fa fa-user-plus"></i> ลงทะเบียนที่พักของท่าน</a>
                    <a href="register.php"><i class="fa fa-user-plus"></i> สมัครสมาชิก</a>
                    <a href="login.php"><i class="fa fa-unlock-alt"></i> เข้าสู่ระบบ</a>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Ends -->

    <!-- Navigation Bar -->
    <div class="navigation">  
        <div class="container">
            <div class="navigation-content">
                <div class="header_menu">
                    <!-- start Navbar (Header) -->
                    <nav class="navbar navbar-default navbar-sticky-function navbar-arrow">
                        <div class="logo pull-left">
                            <a href="index.html"><img alt="Image" src="images/logobr.png"></a>
                        </div>
                        <div id="navbar" class="navbar-nav-wrapper pull-right">
                            <ul class="nav navbar-nav" id="responsive-menu">
                                <li class="active">
                                    <a href="index.html">หน้าแรก </a>                                         
                                </li>
                                <li class="active">                                
                                    <a href="promotion.html">โปรโมชั่น </a>       
                                </li>
                                <li class="active">
                                    <a href="detailroom.html">ที่พัก </a>     
                                </li>
                                <li class="active">
                                    <a href="index.html">ติดต่อเรา </a>       
                                </li> 
                            </ul>
                        </div><!--/.nav-collapse -->
                        <div id="slicknav-mobile"></div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- Navigation Bar Ends -->

    <!-- slide automatic -->
    <div class="w3-content" style="max-width:1400px;margin-top:10px">
        <div class="mySlides w3-display-container w3-center">
            <img src="images/slider/slide1-h1.jpg" style="width:100%;height:450px">
                <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small"></div>
        </div>

        <div class="mySlides w3-display-container w3-center">
            <img src="images/slider/slide2-h1.jpg" style="width:100%;height:450px">
                <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small"></div>
        </div>

        <div class="mySlides w3-display-container w3-center">
            <img src="images/slider/slide1-h1.jpg" style="width:100%;height:450px">
                <div class="w3-display-bottommiddle w3-container w3-text-white w3-padding-32 w3-hide-small"></div>
        </div>

        <script>
        // Automatic Slideshow - change image 
            var myIndex = 0;
            carousel();

            function carousel() {
                var i;
                var x = document.getElementsByClassName("mySlides");
                for (i = 0; i < x.length; i++) {
                   x[i].style.display = "none";  
                }
                myIndex++;
                if (myIndex > x.length) {myIndex = 1}    
                x[myIndex-1].style.display = "block";  
                setTimeout(carousel, 5000);    
            }

        // Used to toggle the menu on small screens when clicking on the menu button
            function myFunction() {
                var x = document.getElementById("navDemo");
                if (x.className.indexOf("w3-show") == -1) {
                    x.className += " w3-show";
                } else { 
                    x.className = x.className.replace(" w3-show", "");
                }
            }

        // When the user clicks anywhere outside of the modal, close it
            var modal = document.getElementById('ticketModal');
            window.onclick = function(event) {
              if (event.target == modal) {
                modal.style.display = "none";
              }
            }
            </script>
    <!-- end slide automatic -->

    <!-- search -->
    <div class="search-content">
    	<div class="search-ad">
    		<div class="container">
    		<form>
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-3 col-xs-6">
                            <div class="table_item">
                                <div class="form-group">
                                    <select name="custom-select-1" class="selectpicker form-control" tabindex="1">
                                    	<option value="0">Destination</option>
                                    	<option value="1">0</option>
                                    	<option value="2">1</option>
                                    	<option value="3">2</option>
                                    	<option value="4">3</option>
                                    	<option value="5">4</option>
                                	</select>
                                	<i class="flaticon-maps-and-flags"></i>
                                </div>
                                <div class="form-group  form-icon">
                                    <select name="custom-select-2" class="selectpicker form-control" tabindex="1">
                                        <option value="0">Type</option>
                                        <option value="1">0</option>
                                        <option value="2">1</option>
                                        <option value="3">2</option>
                                        <option value="4">3</option>
                                        <option value="5">4</option>
                                    </select>
                                    <i class="flaticon-box"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-3 col-xs-6">
                            <div class="table_item">
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" value="เช็คอิน" />
                                        <i class="flaticon-calendar"></i>
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group form-icon">
                                    <div class='input-group date' id='datetimepicker2'>
                                        <input type='text' class="form-control" value="เช็คเอ้าท์" />
                                        <i class="flaticon-calendar"></i>
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                         <div class="col-md-3 col-xs-6">
                            <div class="table_item">
                                <div class="form-group">
                                    <div class='input-group date' id='datetimepicker1'>
                                        <input type='text' class="form-control" value="เช็คอิน" />
                                        <i class="flaticon-calendar"></i>
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group form-icon">
                                    <div class='input-group date' id='datetimepicker2'>
                                        <input type='text' class="form-control" value="เช็คเอ้าท์" />
                                        <i class="flaticon-calendar"></i>
                                        <span class="input-group-addon">
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-xs-6">
                            <div class="table_item table-item-slider">
                                <div class="range-slider">
                                    <div data-min="0" data-max="2000" data-unit="THB" data-min-name="min_price" data-max-name="max_price" class="range-slider-ui ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" aria-disabled="false">
                                    	<span class="min-value text-white">0 THB</span> 
                                    	<span class="max-value">2000 THB</span>
                                        <div class="ui-slider-range ui-widget-header ui-corner-all" style="left: 0%; width: 100%;"></div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                    <div class="search">
                                        <a href="#" class="btn-blue btn-yellow">SEARCH</a>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
			</form> 
        </div>
    </div>
    </div>
  
    <!-- end search -->

    <!-- Popular Packages --> 
    <section class="popular-packages package-inner pad-bottom-80">
        <div class="container">
            <div class="section-title">
                <h2>Popular <span>Rooms</span></h2>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt .</p>
            </div>

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

            <div class="row">
                <div class="col-xs-12">
                    <div class="room-main">
                        <div class="room-item mar-bottom-30">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="images/hotel/room-1.jpg" alt="Image">
                                </div>
                                <div class="col-md-7">
                                    <div class="room-content">
                                        <div class="deal-rating">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o"></span>
                                            <span class="fa fa-star-o"></span>
                                        </div>
                                        <h3><a href="hotel-detail.html">Luxury Room</a></h3>
                                        <p class="mar-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="fw-btns text-center">
                                        <div class="fw-price"><p>Starts from:<span class="bold">$659</span></p></div>
                                        <a href="hotel-detail.html" class="btn-blue" tabindex="0">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="room-item mar-bottom-30">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="images/hotel/room-2.jpg" alt="Image">
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

                                <div class="col-md-7">
                                    <div class="room-content">
                                        <div class="deal-rating">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o"></span>
                                            <span class="fa fa-star-o"></span>
                                        </div>

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

                                        <h3><a href="hotel-detail.html">Super Room</a></h3>
                                        <p class="mar-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="fw-btns text-center">

                                        <div class="fw-price"><p>Starts from:<span class="bold">$659</span></p></div>
                                        <a href="hotel-detail.html" class="btn-red" tabindex="0">Book Now</a>
                                         <div class="row">
                                                                        <div class="col-md-7" style="text-align:right;" ></div>
                                                                        
                                                                        <div class="col-md-5">
                                                                            <?php if($arr_typeroom_countroomnull[$key] > 0  &&  count($_SESSION)>0){?>
                                                                                <a class="btn btn-success"  href="javascript:void(0);"onclick="chk_booking('1','<?php echo $_SESSION['MEMBER_ID'];?>','<?php echo $key;?>');" readonly >จองห้อง</a>
                                                                            <?php }?>
                                                                        </div>  
                                                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="room-item mar-bottom-30">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="images/hotel/room-3.jpg" alt="Image">
                                </div>
                                <div class="col-md-7">
                                    <div class="room-content">
                                        <div class="deal-rating">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o"></span>
                                            <span class="fa fa-star-o"></span>
                                        </div>
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
                                        <h3><a href="hotel-detail.html">Single Room</a></h3>
                                        <p class="mar-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="fw-btns text-center">
                                        <div class="fw-price"><p>Starts from:<span class="bold">$659</span></p></div>
                                        <a href="hotel-detail.html" class="btn-red" tabindex="0">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="room-item mar-bottom-30">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="images/hotel/room-4.jpg" alt="Image">
                                </div>
                                <div class="col-md-7">
                                    <div class="room-content">
                                        <div class="deal-rating">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o"></span>
                                            <span class="fa fa-star-o"></span>
                                        </div>
                                        <h3><a href="hotel-detail.html">Double Room</a></h3>
                                        <p class="mar-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="fw-btns text-center">
                                        <div class="fw-price"><p>Starts from:<span class="bold">$659</span></p></div>
                                        <a href="hotel-detail.html" class="btn-red" tabindex="0">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="room-item">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="images/hotel/room-5.jpg" alt="Image">
                                </div>
                                <div class="col-md-7">
                                    <div class="room-content">
                                        <div class="deal-rating">
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-o"></span>
                                            <span class="fa fa-star-o"></span>
                                        </div>
                                        <h3><a href="hotel-detail.html">Amazing Room</a></h3>
                                        <p class="mar-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="fw-btns text-center">
                                        <div class="fw-price"><p>Starts from:<span class="bold">$659</span></p></div>
                                        <a href="hotel-detail.html" class="btn-red" tabindex="0">Book Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="pagination-content">
                        <ul class="pagination">
                            <li><a href="#"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a></li>
                        </ul>
                    </div> 
                </div>
            </div>
        </div>
    </section>
    <!-- Popular Packages Ends -->
   

    <!-- Footer -->
    <footer>
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-xs-6">
                        <div class="copyright-content">
                            <p>2018 <i class="fa fa-copyright" aria-hidden="true"></i> Yatra by <a href="https://www.cyclonethemes.com">Cyclone Themes</a></p>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="payment-content">
                            <ul>
                                <li>We Accept</li>
                                <li>
                                    <img src="images/payment1.png" alt="Image">
                                </li>
                                <li>
                                    <img src="images/payment2.png" alt="Image">
                                </li>
                                <li>
                                    <img src="images/payment3.png" alt="Image">
                                </li>
                                <li>
                                    <img src="images/payment4.png" alt="Image">
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Ends -->

    <!-- Back to top start -->
    <div id="back-to-top">
        <a href="#"></a>
    </div>
    <!-- Back to top ends -->

    <!-- *Scripts* -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugin.js"></script>
    <script src="js/main.js"></script>
    <script src="js/main-1.js"></script>
    <script src="js/custom-countdown.js"></script>
    <script src="js/preloader.js"></script>
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
                    url: 'form/login.php',
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