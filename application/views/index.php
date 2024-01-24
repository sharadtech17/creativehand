<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie9 no-js" lang="en"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="no-js" lang="en"> <!--<![endif]-->

<!-- Mirrored from demo.enpek.com/html-templates/dye/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Aug 2023 12:55:02 GMT -->

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--=================== The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags ===================-->
    <meta name="description" content="creative hands of india">
    <meta name="author" content="ThemeTidy">
    <link rel="shortcut icon" href="<?=base_url()?>assets/images/favicon.png" type="image/png" />
    <title>creative hands of india</title>
    <!--=================== Bootstrap core CSS ===================-->
    <link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all">
    <!--=================== Animate CSS ===================-->
    <link href="<?=base_url()?>assets/css/animate.min.css" rel="stylesheet" type="text/css" media="all">
    <!--=================== Paira Framework Main CSS ===================-->
    <link href="<?=base_url()?>assets/css/paira.css" rel="stylesheet" type="text/css" media="all">
    <!--=================== Paira Framework Font and Color CSS ===================-->
    <link href="<?=base_url()?>assets/css/paira-color-font.css" rel="stylesheet" type="text/css" media="all">
    <!--=================== Paira Framework Main Responsive CSS ===================-->
    <link href="<?=base_url()?>assets/css/paira-responsive.css" rel="stylesheet" type="text/css" media="all">
    <!--=================== Font Awesome ===================-->
    <link href="<?=base_url()?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
    <!--=================== HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries ===================-->
    <!--[if lt IE 9]>
    <script src="<?=base_url()?>assets/js/html5shiv.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/js/respond.min.js" type="text/javascript"></script>
    <![endif]-->
    <!--=================== Google Fonts ===================-->
    <!-- <link rel="icon" href="<?=base_url()?>assets/images/favicon.ico"> -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,600" rel="stylesheet">

    <style>
        .paira-single-product-image iframe {
            width: 100%;
        }

        .paira-single-product-image-wrp {
            width: 100%;
        }

        .navbar {
            margin-bottom: 0px !important;
            display: flex;
            flex-direction: row;
            align-items: center;

        }

        .navbar .nav-links:nth-child(2) {
            margin-left: auto;
        }

        .navbar ul {
            display: flex;
            align-items: center;
            gap: 30px;
            margin-bottom: 0px !important;
        }

        .moblie-search-icon {
            display: none !important;
        }

        .moblie-search-wrp {
            display: none !important;
        }

        .moblie-sub-link {
            display: none;
        }

        @media only screen and (max-width: 1199px) {
            .navbar ul {
                gap: 20px;
            }

            .account-ajax-cart {
                display: flex;
                justify-content: end;

            }

            .account-ajax-cart ul li {
                margin-left: 0px !important;

            }

            .navbar .nav-links a {
                font-size: 14px !important;
            }
        }

        @media only screen and (max-width: 991px) {
            .navbar ul {
                gap: 5px;
            }

            .navbar .nav-links a {
                font-size: 13px !important;
            }

            .navbar {
                padding: 0px 0px !important;
            }

            .navbar .nav-links:nth-child(2) {
                margin-left: 0px !important;
            }

            .navbar ul li a {
                font-size: 14px !important;
            }

            .logo img {
                margin: 15px 0 5px;
                max-height: 100px;
            }


        }

        /* @media only screen and (max-width: 767px) {
            .hamburger {
                display: block;
                position: absolute;
                cursor: pointer;
                right: 5%;
                top: 50%;
                transform: translate(-5%, -50%);
                z-index: 2;
                transition: all 0.7s ease;
            }
            .navbar ul li a {
                font-size: 10px !important;
            }
        } */
        @media only screen and (max-width: 767px) {
            .hamburger {
                display: block;
                position: absolute;
                cursor: pointer;
                right: 5%;
                top: 50%;
                transform: translate(-5%, -50%);
                z-index: 2;
                transition: all 0.7s ease;
                z-index: 10000;
            }

            .navbar ul li a {
                font-size: 16px !important;
            }

            .hamburger div {
                width: 30px;
                height: 3px;
                background: #fff;
                margin: 5px;
                transition: all 0.3s ease;

            }

            .nav-links {
                position: fixed;
                background: red;
                height: 100vh;
                width: 100%;
                flex-direction: column;
                clip-path: circle(50px at 90% -20%);
                -webkit-clip-path: circle(0px at 90% -10%);
                transition: all 1s ease-out;
                pointer-events: none;
                top: 0;
                left: 0;
                padding-top: 100px !important;
                z-index: 10000;
            }

            nav ul li a.active {
                color: #fff !important;
            }

            .nav-links.open {
                clip-path: circle(1000px at 90% -10%);
                -webkit-clip-path: circle(1000px at 90% -10%);
                pointer-events: all;
            }

            .hamburger.toggle {
                top: -100%;
                transform: translate(-5%, -100%);

            }

            .search-wrp {
                display: none !important;
            }

            .moblie-search-wrp {
                position: fixed;
                top: 0;
                left: 0%;
                width: 100%;
                height: 0px;
                z-index: -5;
                background-color: #fff;
                transition: all 0.45s ease;
                opacity: 0;
                visibility: hidden;
                display: flex !important;
                justify-content: center;
                align-items: center;
            }

            .moblie-search-wrp.is-active {
                opacity: 1;
                visibility: visible;
                height: 120px;
                z-index: 10;
            }

            .moblie-search-icon {
                display: block !important;
            }

            .search-overlap {
                position: fixed;
                width: 100%;
                height: 100%;
                background: transparent;
                z-index: 10;
                display: none;
            }

            .search-overlap.is-active {
                display: block;
            }

            .moblie-sub-link {
                display: block;
            }

            .navbar .nav-links:nth-child(2) {
                display: none;
            }

        }
    </style>
</head>

<body>
    <div class="search-overlap "></div>


    <div class="paira-container pages-container">


        <header class=" ">


            <section class="">
                <div style="background-color:#023020; color:white;">
                    <div class="container">

                        <ul class="nav navbar-nav navbar-nav navbar-right " style="margin: -10px;">
                            <li>
                                <i class="fas fa-sign-in-alt"></i>

                                <a href="<?=base_url()?>artist-login" style="color: white;"><span class="fa fa-sign-in "
                                        style="color: white;"></span>
                                    LogIn </a>
                            </li>
                            <li>
                                <a href="<?=base_url()?>artist-register" style="color: white;"><span class="fa fa-user "
                                        style="color: white;"></span>
                                    Register as a Artist </a>
                            </li>


                        </ul>
                    </div>
                </div>
                <div class="container-fluid ">
                    <div class="row padding-fix">
                        <div class="pull-left logo col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
                            <a href="<?=base_url()?>" style="margin-top: -15px; ">
                                <img src="<?=base_url()?>assets/images/logo1.png" alt="" class=" rounded-top"
                                    style="background-color: white; border-radius: 15px 50px; "></a>
                        </div>
                        <div class=" col-md-7 col-sm-7 col-xs-9" style="padding-top: 40px;">
                            <div style="display: flex;" class="search-wrp">

                                <input type="text" class=" form-control " placeholder="Search by Keywords..."
                                    style="  padding-top: 21px; padding-bottom: 21px;border-color: #c66b15; border-radius: 0;">
                                <style>
                                    input::placeholder {
                                        font-weight: bold;
                                        /* opacity: 0.5; */
                                        color: black;
                                    }
                                </style>
                                <div class="">
                                    <select class="btn btn-default " type="button"
                                        style="padding-top:10px; padding-bottom:10px;">
                                        <option>Section</option>
                                        <option>Artist</option>
                                        <option>Painting</option>
                                        <option>Hand Made Arts</option>
                                    </select>
                                </div>

                                <button class="btn btn-default" type="button" style="background-color: #c66b15;"><i
                                        class="fa fa-search " style=" 
                                    color: white;"></i></button>

                                <!-- <span class="input-group-btn">
                                    <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                                </span> -->

                            </div>

                        </div>

                        <div class=" pull-right col-md-2 col-sm-2 col-xs-3  " style="padding-top: 25px;">
                            <div class="account-ajax-cart">
                                <ul class="list-inline  " style="display: flex;justify-content: center; ">
                                    <!-- <ul class="nav navbar-nav navbar- right"> -->
                                    <li><a href="<?=base_url()?>"> <i class="fa fa-user fa-lg" style="color: #c66b15;"></i>
                                        </a>
                                    </li>

                                    </li>
                                    <li>
                                        <a href="checkout.html"> <i class="fa fa-shopping-cart fa-lg"
                                                style="color: #c66b15;"></i>
                                        </a>
                                    </li>
                                    <li class="moblie-search-icon">
                                        <i class="fa fa-search fa-lg mobile-search-btn" style="color: #c66b15;"></i>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>



                </div>

                <!-- <div class="container-fluid " style="background-color: #c2a476; "> -->

                <div class="container-fluid " style="background-color: #c66b15; ">
                    <div class="row  ">
                        <div class="col-md-12">
                            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 ">
                                <nav class="navbar navbar-collapse" role=""
                                    style="display: flex;justify-content: space-between;">
                                    <ul class="nav-links ">
                                        <li>
                                            <a href="<?=base_url()?>home" style="color: white;font-size: large;"><span
                                                    class="fa fa-home" style="color:white;"></span> Home</a>
                                        </li>
                                        <li>
                                            <a href="Hand Made Art.html" style="color: white;font-size: large;"><span
                                                    class="fa fa-image" style="color:white;"></span> Hand Made Arts</a>
                                        </li>
                                        <li>
                                            <a href="Painting Arts.html" style="color: white;font-size: large;"><span
                                                    class="fa fa-paint-brush" style="color:white;"></span>Painting</a>
                                        </li>
                                        <li>
                                            <a href="<?=base_url()?>artist" style="color: white;font-size: large;"><span
                                                    class="fa fa-users" style="color:white;"></span> Artist</a>
                                        </li>
                                        
                                        <li>
                                            
                                            <a href="events.html" style="color: white;font-size: large;"><span
                                                    class="fa fa-envira" style="color:white;"></span> Events</a>
                                        </li>
                                        <li>
                                            <a href="shop.html" style="color: white;font-size: large;"><span
                                                    class="fa fa-shopping-cart" style="color:white;"></span> Shop</a>
                                        </li>


                                        <li class="moblie-sub-link">
                                            <a href="events.html" style="color: white;font-size: large;"><span
                                                    class="fa fa-envira" style="color:white;"></span> Events</a>
                                        </li>

                                        <li class="moblie-sub-link">
                                            <a href="blog.html" style="color: white;font-size: large;"><span
                                                    class="fa fa-paste" style="color:white;"></span>blog</a>
                                        </li>
                                        <li class="moblie-sub-link">
                                            <a href="contact.html" style="color: white;font-size: large;"><span
                                                    class="fa fa-address-card" style="color:white;"></span> connect Us</a>
                                        </li>
                                    </ul>
                                    <ul class="nav-links">
                                        
                                        <li>
                                            <a href="<?=base_url()?>about" style="color: white;font-size: large;"><span
                                                    class="fa fa-male" style="color:white;"></span> About</a>
                                        </li>


                                        <li>
                                            <a href="blog.html" style="color: white;font-size: large;"><span
                                                    class="fa fa-paste" style="color:white;"></span>blog</a>
                                        </li>
                                        <li>
                                            <a href="contact.html" style="color: white;font-size: large;"><span
                                                    class="fa fa-address-card" style="color:white;"></span>Contact us</a>
                                        </li>
                                    </ul>

                                    <!-- <div class="collapse navbar-collapse">
                                        <ul class="nav navbar-nav pull-left  ">
                                            <ul class="">
                                            <li class="">
                                                <a href="<?=base_url()?>" style="color: white;font-size: large;">

                                                    <span class="fa fa-home" style="color:white;"></span> Home</a>

                                            </li>

                                            <li class=""><a href="Hand Made Art.html"
                                                    style="color: white;font-size: large;">
                                                    <span class="fa fa-image " style="color: white;"></span> Hand Made
                                                    Arts</a>

                                            </li>
                                            <li class=""><a href="Painting Arts.html"
                                                    style="color: white;font-size: large;">
                                                    <span class="fa fa-paint-brush " style="color: white;"></span>
                                                    Painting</a>

                                            </li>

                                            <li class=" "><a href="<?=base_url()?>artist" style="color: white;font-size: large;">
                                                    <span class="fa fa-users" style="color: white;"></span> Artists</a>

                                            </li>
                                            <li class=""><a href="shop.html" style="color: white;font-size: large;">
                                                    <span class="fa fa-shopping-cart " style="color: white;"></span>
                                                    Shop</a>

                                            </li>

                                            <li class=""><a href="events.html" style="color: white;font-size: large;">
                                                    <span class="fa fa-envira " style="color: white;"></span> Events</a>

                                            </li>



                                        </ul>
                                    </div> -->

                                </nav>
                                <div class="hamburger">
                                    <div class="line1"></div>
                                    <div class="line2"></div>
                                    <div class="line3"></div>
                                </div>

                            </div>

                            <!-- <div class=" pull-right col-md-4 col-sm-4 col-xs-4 ">
                                <nav class=" navbar " role="">
                                    <div class="collapse navbar-collapse">
                                        <ul class="nav navbar-nav pull-left  ">


                                            <li class=""><a href="blog.html" style="color: white;font-size: large;">
                                                    <span class="fa fa-paste " style="color: white;"></span> Blogs</a>

                                            </li>
                                            <li class=""><a href="about.html" style="color: white;font-size: large;">
                                                    <span class="fa fa-male" style="color: white;"></span> About us</a>

                                            </li>





                                            <li class=" "><a href="contact.html"
                                                    style="color: white;font-size: large;"><span
                                                        class="fa fa-address-card "
                                                        style="color: white;font-size: large;"></span>
                                                    Contact Us</a>

                                            </li>



                                        </ul>
                                    </div>

                                </nav>
                            </div> -->
                        </div>
                    </div>
                </div>

                <div class="moblie-search-wrp">

                    <input type="text" class=" form-control " placeholder="Search by Keywords..."
                        style="  padding-top: 21px; padding-bottom: 21px;border-color: #c66b15; border-radius: 0;">
                    <style>
                        input::placeholder {
                            font-weight: bold;
                            /* opacity: 0.5; */
                            color: black;
                        }
                    </style>
                    <div class="">
                        <select class="btn btn-default " type="button" style="padding-top:10px; padding-bottom:10px;">
                            <option>Section</option>
                            <option>Artist</option>
                            <option>Painting</option>
                            <option>Hand Made Arts</option>
                        </select>
                    </div>

                    <button class="btn btn-default" type="button" style="background-color: #c66b15;"><i
                            class="fa fa-search " style=" 
                        color: white;"></i></button>

                    <!-- <span class="input-group-btn">
                        <button class="btn btn-default" type="button"><i class="fa fa-search"></i></button>
                    </span> -->

                </div>

            </section>


            




        </header>
        <?php include_once($content);?>
        <footer>
            <!--=================== Footer Top Section ===================-->
            <section class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-xs-12 col-sm-12">
                            <div class="paira-widget paira-subscribe">
                                <h3 class="text-center margin-clear text-uppercase">Sign up for the newsletter</h3>
                                <hr class="margin-bottom-40 margin-top-15">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Email Address">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button">SUBSCRIBE</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--=================== Footer Bottom Section ===================-->
            <section class="footer-bottom">
                <div class="container-fluid">
                    <div class="row" style="padding-bottom: 50px;">
    
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="paira-widget paira-menu">
                                <img src="<?=base_url()?>assets/images/logo1.png" alt=""
                                    style="width: 200px; border-radius: 20px 50px; background-color:white;">
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                            <div class="paira-widget paira-menu">
                                <h4>Contact Information</h4>
                                <ul class="list-unstyled">
    
                                    <li style="display: flex;">
                                        <i class="fa fa-map-marker" style="width: 30px;"></i>
                                        <a href="">
                                            9, "Someshwar", Harivilla row<br>
                                            house, Opp. Seema Hall,<br>
                                            100ft road, satelite<br>
                                            Ahmedabad-380015</a>
                                    </li>
                                    <li style="display: flex;">
                                        <i class="fa fa-envelope" style="width: 30px;"></i>
                                        <a href="" type="Email">info@creativehandsofindia.com</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
    
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="paira-widget paira-menu">
                                <h4>Link Heding</h4>
                                <ul class="list-unstyled">
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Forums</a></li>
                                    <li><a href="#">AutThemetidy Blog</a></li>
                                    <li><a href="#">Faqs</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2 col-sm-6 col-xs-12">
                            <div class="paira-widget paira-menu">
                                <h4>Policy</h4>
                                <ul class="list-unstyled">
                                    <li><a href="privacy_policy.html">Privacy Policy</a></li>
                                    <li><a href="Terms-and_Conditions.html">Terms and Conditions</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="paira-widget paira-menu ">
                                <h4>Instagram Feed</h4>
                                <ul class="list-unstyled ">
                                    <li><a href="#">
                                            <img src="<?=base_url()?>assets/images/artist/2.jpg" alt="" style="width: 70px;height: 70px; ">
                                            <img src="<?=base_url()?>assets/images/artist/5.jpg" alt="" style="width: 70px;height: 70px; ">
                                            <img src="<?=base_url()?>assets/images/artist/9.jpg" alt=""
                                                style="width: 70px;height: 70px; "></a></li>
    
                                    <li><a href="#">
                                            <img src="<?=base_url()?>assets/images/artist/15.jpeg" alt=""
                                                style="width: 70px;height: 70px;">
                                            <img src="<?=base_url()?>assets/images/artist/16.jpg" alt=""
                                                style="width: 70px;height: 70px; ">
                                            <img src="<?=base_url()?>assets/images/artist/12.jpg" alt=""
                                                style="width: 70px;height: 70px; "></a></li>
    
                                </ul>
                            </div>
                        </div>
    
    
    
    
                    </div>
                    <hr>
                    <div class=" row">
    
                        <div class="col-md-2 col-sm-6 col-xs-12 ">
                            <div class="paira-widget paira-menu">
    
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12 ">
                            <div class="paira-widget paira-menu">
                                <h4>Call Us On</h4>
                                <ul class="list-unstyled">
    
                                    <li style="display: flex;">
                                        <i class="fa fa-phone" style="width: 30px;"></i>
                                        <a href="">8155919651,<br> 8866770388</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="paira-widget paira-social">
                                <h4>Follow Us</h4>
                                <ul class="list-inline list-unstyled">
                                    <li><a href="https://www.facebook.com/Creativehandsofindia" target="_blank"><i
                                                class="fa fa-facebook"></i></a></li>
                                    <li><a href="https://www.creativehandsofindia.com/" target="_blank"><i
                                                class="fa fa-google-plus"></i></a>
                                    </li>
                                    <li><a href="https://twitter.com/CreativeHands56" target="_blank"><i
                                                class="fa fa-twitter"></i></a></li>
                                    <li><a href="https://www.linkedin.com/company/themetidy" target="_blank"><i
                                                class="fa fa-linkedin"></i></a></li>
                                    <li><a href="https://in.pinterest.com/dodaniworld/" target="_blank"><i
                                                class="fa fa-pinterest"></i></a></li>
                                    <li><a href="https://www.instagram.com/creativehandsofindia/" target="_blank"><i
                                                class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
    
                        </div>
    
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="paira-widget paira-social">
    
                                <h4>Payment Methode</h4>
                                <img src="<?=base_url()?>assets/images/footer/payment-icon.png" alt="">
                            </div>
    
                        </div>
    
                        <div class="col-md-12 col-xs-12 col-sm-12  ">
                            <div class="paira-widget paira-copyright text-center">
                                <p class="margin-clear">©CreativeHandsOfIndia. All Rights Reserved.</p>
    
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </footer>

    </div>
    <!--=================== Placed at the end of the document, so the pages load faster ===================-->
    <!-- <script src="<?=base_url()?>assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/js/jquery-migrate-3.0.0.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/js/jquery.waypoints.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/js/jquery.parallax-1.1.3.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/js/jquery.mousewheel.min.js" type="text/javascript"></script>
    <script src="<?=base_url()?>assets/js/jquery.bxslider.min.js"></script> -->
    <!--=================== Paira Framework Main Javascript ===================-->
    <!-- <script src="<?=base_url()?>assets/js/paira.js" type="text/javascript"></script> -->



</body>

<!-- Mirrored from demo.enpek.com/html-templates/dye/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Aug 2023 12:56:27 GMT -->

</html>