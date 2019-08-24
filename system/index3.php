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

    <!-- Breadcrumb -->
    <section class="breadcrumb-outer text-center">
        <div class="container">
            <div class="breadcrumb-content">
                <h2></h2>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Destinations</li>
                    </ul>
                </nav>
            </div>
        </div>
        <div class="section-overlay"></div>
    </section>
    <!-- BreadCrumb Ends -->

    <!-- Listing -->
    <section class="blog-list grid-list">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1">
                    <div class="blog-wrapper">
                        <div class="blog-post-wrap">
                            <div id="home_banner_blog">
                                <div class="swiper-container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="slide-inner slide-overlay" style="background-image:url(images/slider-blog/slider1.jpg)">                                        
                                            </div> 
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slide-inner slide-overlay" style="background-image:url(images/slider-blog/slider2.jpg)">
                                            </div> 
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="slide-inner slide-overlay" style="background-image:url(images/slider-blog/slider3.jpg)">
                                            </div> 
                                        </div>
                                    </div>
                                    <div class="swiper-button-next swiper-button-white"></div>
                                    <div class="swiper-button-prev swiper-button-white"></div>
                                </div>
                            </div>
                            
                        </div>
                        
                        
                        
                        
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Listing Ends -->

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

    

    <!-- *Scripts* -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/rangeslider.js"></script>
    <script src="js/plugin.js"></script>
    <script src="js/main.js"></script>
    <script src="js/preloader.js"></script>
</body>
</html>