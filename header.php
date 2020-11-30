<?php  $HTTP_HOST='https://tyre.staffstarr.com/dealer/';

session_start();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <!-- Basic page needs
    ============================================ -->
    <title>Bro Tyres</title>
    <meta charset="utf-8">
   
    <!-- Mobile specific metas
    ============================================ -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    
    <!-- Favicon
    ============================================ -->
    <link rel="shortcut icon" type="image/png" href="<?php echo $HTTP_HOST; ?>ico/favicon-16x16.png"/>
  
   
    <!-- Libs CSS
    ============================================ -->
    <link rel="stylesheet" href="<?php echo $HTTP_HOST; ?>css/bootstrap/css/bootstrap.min.css">
    <link href="<?php echo $HTTP_HOST; ?>css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="<?php echo $HTTP_HOST; ?>js/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="<?php echo $HTTP_HOST; ?>js/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="<?php echo $HTTP_HOST; ?>css/themecss/lib.css" rel="stylesheet">
    <link href="<?php echo $HTTP_HOST; ?>js/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <link href="<?php echo $HTTP_HOST; ?>js/minicolors/miniColors.css" rel="stylesheet">

    <link href="<?php echo $HTTP_HOST; ?>js/slick-slider/slick.css" rel="stylesheet">
    
    <link href="<?php echo $HTTP_HOST; ?>js/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet">
    <link href="<?php echo $HTTP_HOST; ?>pe-icon-7-stroke/css/helper.css" rel="stylesheet">

    <!-- Theme CSS
    ============================================ -->
    <link href="<?php echo $HTTP_HOST; ?>css/themecss/so_searchpro.css" rel="stylesheet">
    <link href="<?php echo $HTTP_HOST; ?>css/themecss/so_megamenu.css" rel="stylesheet">
    <link href="<?php echo $HTTP_HOST; ?>css/themecss/so_advanced_search.css" rel="stylesheet">
    <link href="<?php echo $HTTP_HOST; ?>css/themecss/so-listing-tabs.css" rel="stylesheet">
    <link href="<?php echo $HTTP_HOST; ?>css/themecss/so-categories.css" rel="stylesheet">
    <link href="<?php echo $HTTP_HOST; ?>css/themecss/so-newletter-popup.css" rel="stylesheet">
    <link href="<?php echo $HTTP_HOST; ?>css/themecss/so-latest-blog.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $HTTP_HOST; ?>css/owl.carousel.min.css">
    <link href="<?php echo $HTTP_HOST; ?>css/footer/footer8.css" rel="stylesheet">
    <link href="<?php echo $HTTP_HOST; ?>css/header/header8.css" rel="stylesheet">
    <link id="color_scheme" href="<?php echo $HTTP_HOST; ?>css/home8.css" rel="stylesheet"> 

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet"> -->
    <!-- <link href="css/responsive.css" rel="stylesheet"> -->

     <!-- Google web fonts
    ============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Rubik:300,400,400i,500,600,700' rel='stylesheet' type='text/css'>
       <link rel="stylesheet" href="https://wfolly.firebaseapp.com/node_modules/sweetalert/dist/sweetalert.css">
  <script src="https://wfolly.firebaseapp.com/node_modules/sweetalert/dist/sweetalert.min.js"></script>

     <!-- <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" /> -->


    <style type="text/css">
         body{font-family:'Rubik', sans-serif;}
         .layout-8.common-home #content .row-advanced{
            background-image: url(image/s6.jpg);
         }
        
            option {
        padding: 15px 15px;
        line-height: 30px;
        }

   #slider .MS-content .item {
   border: none;
   }
   #slider .MS-content {
   border: none;
   /*display: -webkit-box;
display: -webkit-flex;
display: -ms-flexbox;
display: flex;
flex-wrap: wrap;*/
   }
    .row-brands .contentslider .owl2-stage{
    width: max-content!important;
  }


    .ltabs-wrap .owl2-stage{ 
     width: 100% !important;   
 }
    .footer-container .newsletter .form-group{
            display: inline-flex;
        }


     

         .cat-title a {
                font-size: 14px;
                color: #282828;
                margin-bottom: 3px;
                text-transform: uppercase;
                font-weight: 500;
                padding: 8px;
            }
            .layout-8.common-home #content .row-advanced {
                background-size: 105%;
                background: #FAFAFA !important;
                }

            .slider-cates5.so-categories .cat-wrap .content-box .image-cat {
                
                /*width: 130px;*/
                padding: 8px;
                margin: 0 auto;
                margin-bottom: 15px;
            }
            .typeheader-8 .shopping_cart{
            	margin-right: 0;
            	margin-left: 10px;
            }
          .header-top-right {
    line-height: 60px;
    float: right;
}
.typeheader-8 .shopping_cart .btn-shopping-cart .top_cart .shopcart-inner .total-shopping-cart .items_cart{
	top: -5px;
}
            .owl2-item{
                margin-right: 0px !important;
            }
            .owl2-carousel .owl2-item .item {
                margin-right: 20px ;
            }
            .footer-container {
                margin-top: 100px;
            }
            .header-bottom {
                padding-top: 15px;
            }
            .typeheader-8{
                    box-shadow: 0 0 5px #dddddd;
            }
            .header-top-left{
                line-height: 60px;
            }
            .typeheader-8 .logo{
            	line-height: 60px;
            }
            .logo img{
                max-width: 90%;
                max-height: 55px;
                margin: 0;
            }
            .typeheader-8 ul.top-link > li .btn-group .btn-link{
            	margin-top: 12px;
            }
            .cart-box{
                line-height: 58px;
            margin: 0;
            padding: 0;
            }
            .typeheader-8 ul.top-link{
            	float: none!important;
            }
            .search-box{
                height: 58px;
                padding: 15px;
            }
            /*NEW STYLE*/
.banner.header-text.text-center {
    background: #2e3139;
    color: #fff;
    line-height: 60px;
    padding: 0;
    width: 100%;
    margin: 0;
}
.banner.header-text.text-center h2{
    padding: 35px 0;
    text-transform: uppercase;
}
.main-menu{
    display: flex;
}
.main-menu li{
    padding-right: 10px;
    padding-left: 10px;
}
            @media (max-width: 767px) {
                .search-box{
                    display: none;
                }
                .header-top-left{
                	padding: 0;
                	text-align: center;
                	line-height: normal;
                }
                .header-top-right{
                	padding: 0;
                	line-height: normal;
                }
                .typeheader-8 ul.top-link > li .btn-group .btn-link{
                	margin-top: 0;
                }
                .typeheader-8 .logo{
                	line-height: normal;
                }
                .tyreitems_div{
                	padding: 0;
                }
               /* header.typeheader-8 .shopping_cart{
                    top: 0!important;
                }
                header.typeheader-8 .shopping_cart{
                    margin-right: 10px!important;
                    padding-top: 10px!important;
                }*/
            }
    </style>

</head>

<body class="common-home res layout-8">
    
    <div id="wrapper" class="wrapper-fluid banners-effect-11">
    

    <!-- Header Container  -->
    <header id="header" class="typeheader-8">
        
        <!-- Header Top -->
        <div class="header-top hidden-compact"> 
            <div class="container">
                <div class="row">
                    <div class="header-top-left col-lg-4 col-md-4 col-sm-12 col-xs-12"> 
	                    <ul class="main-menu" >
	                        <li><a href="homepage.php"> <i class="fa fa-home"></i> Home</a></li>
	                        <li><a href="contact.php"> <i class="fa fa-phone"></i> Contact Us</a></li>
	                        <li><a href="review.php"> <i class="fa fa-star"></i> Review</a></li>
	                    </ul> 
                    </div>
                    <div class="header-top-right float-right col-lg-4 col-md-4 col-sm-8 col-xs-8 text-right">
                        <ul class="top-link list-inline lang-curr" style="/* display: none; */"> 
                         <?php  

                           if(isset($_SESSION['user_id']))
                                    {
                                       ?>
                                        <li class="currency">
                                            <div class="btn-group currencies-block">
                                                
                                                    <a  class="btn btn-link dropdown-toggle" data-toggle="dropdown">
                                                         <?php echo 'Hello '.$_SESSION["username"]; ?>  <span class="fa fa-angle-down"></span>
                                                    </a>
                                                    <ul class="dropdown-menu btn-xs">
                                                        <li><a href="<?php echo $HTTP_HOST; ?>my_profile.php"> My Profile </a></li>
                                                        <li><a href="<?php echo $HTTP_HOST; ?>my_orders.php"> My Orders </a></li>
                                                        <li><a href="<?php echo $HTTP_HOST; ?>change_pwd.php"> Change Password </a></li>
                                                        <li> <a href="<?php echo $HTTP_HOST; ?>logout.php">  Logout </a> </li>
                                                    </ul>
                                                
                                            </div>
                                        </li>   
                                        
                                    
                                       <?php 
                                    }else{
                                    ?>

                                                 
                            <li><i class="fa fa-lock"></i> <a href="<?php echo $HTTP_HOST; ?>index.php"> Login</a> / <a href="<?php echo $HTTP_HOST; ?>index.php">Register</a></li>
                            <?php  }?>                        
                        </ul>    
                         <div class="shopping_cart">
                            <div id="cart" class="btn-shopping-cart">
                                  <a href="javascript:void(0)" data-loading-text="Loading... " class="btn-group top_cart dropdown-toggle" data-toggle="dropdown" aria-expanded="true">

                                    <div class="shopcart" onclick="window.location.href='<?php echo $HTTP_HOST; ?>view_cart.php';">
                                        <span class="icon-c">
                                            <i class="fa fa-shopping-basket"></i>
                                        </span>
                                        <div class="shopcart-inner">
                                            <p class="text-shopping-cart">
                                                My cart
                                            </p>
                                           <span class="total-shopping-cart cart-total-full">
                                            <span class="items_cart" id="cart_items">0</span>
                                            </span>     
                                        </div>

                                    </div>
                                </a>

                            </div>
                        </div> 
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 text-center p-0">
                        <div class="logo">
                            <a href="<?php echo $HTTP_HOST; ?>homepage.php"><img style="" src="<?php echo $HTTP_HOST; ?>image/logo125.png" title="Your Store" alt="Your Store" /></a>
                        </div>
                    </div>
                    
                </div>
            </div>      
        </div>
        
        <div class="header-bottom hidden-compact" style="display: none;">
            <div class="container">
                <div class="main-menu-w">
                    <div class="responsive so-megamenu megamenu-style-dev">
                        <nav class="navbar-default">
                            <div class=" container-megamenu  horizontal open ">
                                <div class="navbar-header">
                                    <button type="button" id="show-megamenu" data-toggle="collapse" class="navbar-toggle">
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                        <span class="icon-bar"></span>
                                    </button>
                                </div>
                                
                                <div class="megamenu-wrapper">
                                    <span id="remove-megamenu" class="fa fa-times"></span>
                                    <div class="megamenu-pattern">
                                        <div class="container-mega">
                                            <ul class="megamenu" data-transition="slide" data-animationtime="250">
                                                <li class="home hover">
                                                    <a href="<?php echo $HTTP_HOST; ?>homepage.php">Home</a>
                                                    <div class="sub-menu" style="width:100%;" >
                                                        <div class="content" >
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <a href="<?php echo $HTTP_HOST; ?>index.html" class="image-link"> 
                                                                        <span class="thumbnail">
                                                                            <img class="img-responsive img-border" src="<?php echo $HTTP_HOST; ?>image/catalog/menu/home1.jpg" alt="image">
                                                                            
                                                                        </span> 
                                                                        <h3 class="figcaption">Home page - (Default)</h3> 
                                                                    </a> 
                                                                    
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <a href="home2.html" class="image-link"> 
                                                                        <span class="thumbnail">
                                                                            <img class="img-responsive img-border" src="<?php echo $HTTP_HOST; ?>image/catalog/menu/home2.jpg" alt="image">
                                                                           
                                                                        </span> 
                                                                        <h3 class="figcaption">Home page - Layout 2</h3> 
                                                                    </a> 
                                                                    
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <a href="home3.html" class="image-link"> 
                                                                        <span class="thumbnail">
                                                                            <img class="img-responsive img-border" src="<?php echo $HTTP_HOST; ?>image/catalog/menu/home3.jpg" alt="image">
                                                                           
                                                                        </span> 
                                                                        <h3 class="figcaption">Home page - Layout 3</h3> 
                                                                    </a> 
                                                                    
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <a href="home4.html" class="image-link"> 
                                                                        <span class="thumbnail">
                                                                            <img class="img-responsive img-border" src="<?php echo $HTTP_HOST; ?>image/catalog/menu/home4.jpg" alt="image">
                                                                           
                                                                        </span> 
                                                                        <h3 class="figcaption">Home page - Layout 4</h3> 
                                                                    </a> 
                                                                    
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <a href="home5.html" class="image-link"> 
                                                                        <span class="thumbnail">
                                                                            <img class="img-responsive img-border" src="<?php echo $HTTP_HOST; ?>image/catalog/menu/home5.jpg" alt="image">
                                                                           
                                                                        </span> 
                                                                        <h3 class="figcaption">Home page - Layout 5</h3> 
                                                                    </a> 
                                                                    
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <a href="home6.html" class="image-link"> 
                                                                        <span class="thumbnail">
                                                                            <img class="img-responsive img-border" src="<?php echo $HTTP_HOST; ?>image/catalog/menu/home6.jpg" alt="image">
                                                                           
                                                                        </span> 
                                                                        <h3 class="figcaption">Home page - Layout 6</h3> 
                                                                    </a> 
                                                                    
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <a href="home7.html" class="image-link"> 
                                                                        <span class="thumbnail">
                                                                            <img class="img-responsive img-border" src="<?php echo $HTTP_HOST; ?>image/catalog/menu/home7.jpg" alt="image">
                                                                           
                                                                        </span> 
                                                                        <h3 class="figcaption">Home page - Layout 7</h3> 
                                                                    </a> 
                                                                    
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <a href="home8.html" class="image-link"> 
                                                                        <span class="thumbnail">
                                                                            <img class="img-responsive img-border" src="<?php echo $HTTP_HOST; ?>image/catalog/menu/home8.jpg" alt="image">
                                                                           
                                                                        </span> 
                                                                        <h3 class="figcaption">Home page - Layout 8</h3> 
                                                                    </a> 
                                                                    
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <a href="html_with_RTL/index.html" class="image-link"> 
                                                                        <span class="thumbnail">
                                                                            <img class="img-responsive img-border" src="<?php echo $HTTP_HOST; ?>image/catalog/menu/rtl.jpg" alt="image">
                                                                            
                                                                        </span> 
                                                                        <h3 class="figcaption">Home page - RTL</h3> 
                                                                    </a> 
                                                                    
                                                                </div>
                                                                
                                                                <!-- <div class="col-md-15">
                                                                    <a href="#" class="image-link"> 
                                                                        <span class="thumbnail">
                                                                            <img class="img-responsive img-border" src="<?php echo $HTTP_HOST; ?>image/demo/feature/comming-soon.png" alt="">
                                                                            
                                                                        </span> 
                                                                        <h3 class="figcaption">Comming soon</h3> 
                                                                    </a> 
                                                                    
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="with-sub-menu hover">
                                                    <p class="close-menu"></p>
                                                    <a href="#" class="clearfix">
                                                        <strong>Features</strong>                                                                
                                                        <b class="caret"></b>
                                                    </a>
                                                    <div class="sub-menu" style="width: 100%; right: auto;">
                                                        <div class="content" >
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="column">
                                                                        <a href="#" class="title-submenu">Listing pages</a>
                                                                        <div>
                                                                            <ul class="row-list">
                                                                                <li><a href="category.html">Category Page 1 </a></li>
                                                                                <li><a href="category-v2.html">Category Page 2</a></li>
                                                                                <li><a href="category-v3.html">Category Page 3</a></li>
                                                                            </ul>
                                                                            
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="column">
                                                                        <a href="#" class="title-submenu">Product pages</a>
                                                                        <div>
                                                                            <ul class="row-list">
                                                                                <li>Product page 1<</li>
                                                                                <li><a href="product-v2.html">Product page 2</a></li>
                                                                                <!-- <li><a href="product-v3.html">Image size - small</a></li> -->
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="column">
                                                                        <a href="#" class="title-submenu">Shopping pages</a>
                                                                        <div>
                                                                            <ul class="row-list">
                                                                                <li><a href="cart.html">Shopping Cart Page</a></li>
                                                                                <li><a href="checkout.html">Checkout Page</a></li>
                                                                                <li><a href="compare.html">Compare Page</a></li>
                                                                                <li><a href="wishlist.html">Wishlist Page</a></li>
                                                                            
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="column">
                                                                        <a href="#" class="title-submenu">My Account pages</a>
                                                                        <div>
                                                                            <ul class="row-list">
                                                                                <li><a href="login.html">Login Page</a></li>
                                                                                <li><a href="register.html">Register Page</a></li>
                                                                                <li><a href="my-account.html">My Account</a></li>
                                                                                <li><a href="order-history.html">Order History</a></li>
                                                                                <li><a href="order-information.html">Order Information</a></li>
                                                                                <li><a href="return.html">Product Returns</a></li>
                                                                                <li><a href="gift-voucher.html">Gift Voucher</a></li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="with-sub-menu hover">
                                                    <p class="close-menu"></p>
                                                    <a href="#" class="clearfix">
                                                        <strong>Pages</strong>
                                                        <b class="caret"></b>
                                                    </a>
                                                    <div class="sub-menu" style="width: 40%; ">
                                                        <div class="content" >
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <ul class="row-list">
                                                                        <li><a class="subcategory_item" href="faq.html">FAQ</a></li>
                                                                        
                                                                        <li><a class="subcategory_item" href="sitemap.html">Site Map</a></li>
                                                                        <li><a class="subcategory_item" href="contact.html">Contact us</a></li>
                                                                        <li><a class="subcategory_item" href="banner-effect.html">Banner Effect</a></li>
                                                                    </ul>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <ul class="row-list">
                                                                        <li><a class="subcategory_item" href="about-us.html">About Us 1</a></li>
                                                                        <li><a class="subcategory_item" href="about-us-2.html">About Us 2</a></li>
                                                                        <li><a class="subcategory_item" href="about-us-3.html">About Us 3</a></li>
                                                                        <li><a class="subcategory_item" href="about-us-4.html">About Us 4</a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li class="with-sub-menu hover">
                                                    <p class="close-menu"></p>
                                                    <a href="#" class="clearfix">
                                                        <strong>Categories</strong>                                                             
                                              
                                                        <b class="caret"></b>
                                                    </a>
                                                    <div class="sub-menu" style="width: 100%; display: none;">
                                                        <div class="content">
                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="row">
                                                                        <div class="col-md-3 img img1">
                                                                            <a href="#"><img src="<?php echo $HTTP_HOST; ?>image/catalog/menu/megabanner/image-1.jpg" alt="banner1"></a>
                                                                        </div>
                                                                        <div class="col-md-3 img img2">
                                                                            <a href="#"><img src="<?php echo $HTTP_HOST; ?>image/catalog/menu/megabanner/image-2.jpg" alt="banner2"></a>
                                                                        </div>
                                                                        <div class="col-md-3 img img3">
                                                                            <a href="#"><img src="<?php echo $HTTP_HOST; ?>image/catalog/menu/megabanner/image-3.jpg" alt="banner3"></a>
                                                                        </div>
                                                                        <div class="col-md-3 img img4">
                                                                            <a href="#"><img src="<?php echo $HTTP_HOST; ?>image/catalog/menu/megabanner/image-4.jpg" alt="banner4"></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <a href="#" class="title-submenu">Automotive</a>
                                                                    <div class="row">
                                                                        <div class="col-md-12 hover-menu">
                                                                            <div class="menu">
                                                                                <ul>
                                                                                    <li><a href="#"  class="main-menu">Car Alarms and Security</a></li>
                                                                                    <li><a href="#"  class="main-menu">Car Audio &amp; Speakers</a></li>
                                                                                    <li><a href="#"  class="main-menu">Gadgets &amp; Auto Parts</a></li>
                                                                                    <li><a href="#"  class="main-menu">More Car Accessories</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <a href="#" class="title-submenu">Funitures</a>
                                                                    <div class="row">
                                                                        <div class="col-md-12 hover-menu">
                                                                            <div class="menu">
                                                                                <ul>
                                                                                    <li><a href="#"  class="main-menu">Bathroom</a></li>
                                                                                    <li><a href="#"  class="main-menu">Bedroom</a></li>
                                                                                    <li><a href="#"  class="main-menu">Decor</a></li>
                                                                                    <li><a href="#"  class="main-menu">Living room</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <a href="#" class="title-submenu">Jewelry &amp; Watches</a>
                                                                    <div class="row">
                                                                        <div class="col-md-12 hover-menu">
                                                                            <div class="menu">
                                                                                <ul>
                                                                                    <li><a href="#"  class="main-menu">Earings</a></li>
                                                                                    <li><a href="#"  class="main-menu">Wedding Rings</a></li>
                                                                                    <li><a href="#"  class="main-menu">Men Watches</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <a href="#" class="title-submenu">Electronics</a>
                                                                    <div class="row">
                                                                        <div class="col-md-12 hover-menu">
                                                                            <div class="menu">
                                                                                <ul>
                                                                                    <li><a href="#"  class="main-menu">Computer</a></li>
                                                                                    <li><a href="#"  class="main-menu">Smartphone</a></li>
                                                                                    <li><a href="#"  class="main-menu">Tablets</a></li>
                                                                                    <li><a href="#"  class="main-menu">Monitors</a></li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </li>
                                                
                                                <li class="">
                                                    <p class="close-menu"></p>
                                                    <a href="#" class="clearfix">
                                                        <strong>Accessories</strong>
                                     
                                                    </a>
                                        
                                                </li>
                                                <li class="">
                                                    <p class="close-menu"></p>
                                                    <a href="blog-page.html" class="clearfix">
                                                        <strong>Blog</strong>
                                                        <span class="label"></span>
                                                    </a>
                                                </li>
                                                
                                                
                                            </ul>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </nav>
                    </div>
                                           
                </div>                
            </div>            
        </div>

    </header>
    <!-- //Header Container  -->