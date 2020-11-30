

<?php
include_once"header.php";
include_once"helperfile.php";

 require_once "config/config.php";
   // $HTTP_HOST='http://tyre.staffstarr.com/';

 $res=Checklogin();

 

 if($res==1)
  {
    
     // echo "<script>window.location.href='".$HTTP_HOST."homepage.php';</script>";
      header("Location: homepage.php");
  }
  else if($res==0)
  {
    // header("Location: index.php");
     echo "<script>window.location.href='".$HTTP_HOST."index.php';</script>";
   
  } 
  $accNum= accNum;







$specials_json=file_get_contents($HTTP_HOST."ajax_autopart.php?action=getSpecials");
//print_r($specials_json); die;
$specials=json_decode($specials_json,true);

//$specials = $myCategory->getSpecials(accNum);
$specials_offrs = $_SESSION['specials'];



    $data_Cat_json=file_get_contents($HTTP_HOST."ajax_autopart.php?action=getCategoryTreeView");
    $data_Cat=json_decode($data_Cat_json,true);
    // print_r($data_Cat);

//$data_Cat = $myCategory->getCategoryTreeView(accNum);
    $menuNum=166;
    // echo ($HTTP_HOST."ajax_autopart.php?action=getMainCategories&menuNum=".$menuNum);die;

    $main_cat_json=file_get_contents($HTTP_HOST."ajax_autopart.php?action=getMainCategories&menuNum=".$menuNum);
    $main_cat=json_decode($main_cat_json,true);

    // echo ($HTTP_HOST."ajax_autopart.php?action=SupplierM_images");die;
    $supplier_image_json=file_get_contents($HTTP_HOST."ajax_autopart.php?action=SupplierM_images");
    // print_r($supplier_image_json);die;
    $supplier_image=json_decode($supplier_image_json,true);

    $newarrivlNum=171;
    // echo ($HTTP_HOST."ajax_autopart.php?action=getMainCategories&menuNum=".$newarrivlNum);die;

    $new_arrival_json=file_get_contents($HTTP_HOST."ajax_autopart.php?action=getMenuItems_data&categoryNum=".$newarrivlNum);
    $newarrival=json_decode($new_arrival_json,true);

    // print_r($newarrival);die;

    $cart_itemscount_json=file_get_contents($HTTP_HOST."ajax_autopart.php?action=getCartItems");
    // print_r($cart_itemscount_json);
    $cartItemscount=json_encode($cart_itemscount_json,true);
    // echo (count($cartItemscount));
    // echo $HTTP_HOST."ajax_autopart.php?action=getBanners";

    $getBanners_json=file_get_contents($HTTP_HOST."ajax_autopart.php?action=getBanners");
    // print_r($cart_itemscount_json);
    $Banners_arr=json_decode($getBanners_json,true);

    // print_r($Banners_arr);die;

    $FrontBanner_json=file_get_contents($HTTP_HOST."ajax_autopart.php?action=GetFrontBanner");
     $FrontBanners_arr=json_decode($FrontBanner_json,true);

     // print_r($FrontBanners_arr);die;

if (isset($_GET['test'])) {

  echo '<pre>';

  print_r($data_Cat);

  die;

}






$cat_id=172;
    // echo ($HTTP_HOST."ajax_autopart.php?action=getMenuItems&categoryNum=".$cat_id);die;
   $product_data_json=file_get_contents($HTTP_HOST."ajax_autopart.php?action=getMenuItems_data&categoryNum=".$cat_id);
   $product_data=json_decode($product_data_json,true);

   // print_r($product_data);die;
  //$product_data = $myCategory->getMenuItems(accNum, $menu_ids);

if (isset($_GET['test1'])) {

  echo '<pre>';

  print_r($product_data);

  die;

}


$banners_result = array();

?>

<style type="text/css">
    .chosen-container-single .chosen-single {
        padding-bottom: 30px !important;
        padding-left: 30px !important;
        padding-top: 10px !important;


    }
    .chosen-container-single .chosen-single div{
top:8px !important;
}

    .layout-8.common-home #content .row-advanced{
        background-image: none!important;
        padding: 0;
    }
    .layout-8.common-home #content .row-advanced {
        position: absolute;
    z-index: 99;
  
    margin: 0 auto;
    right: 0;
    left: 0;
    top: 0;
   
    padding: 0!important;
    background: #33333350;
    }
    .sas_inner-box-search.fixed {
        position: fixed;
        top: 0;
        width: 100%;
        margin: 0 auto;
        left: 0;
        right: 0;
        background: #f5f5f5;
        z-index: 99;

    }
    .fixed .search-boxes-row{
        width: 90%;
        margin: 10px auto 0 auto;
    }
    .fixed .search-boxes{
        margin-bottom: 10px;
    }
    .fa{
        line-height: 40px!important;
    }
    .layout-8.common-home #content .row-advanced .sas_inner-box-search .search-boxes select{
        box-shadow: 0 0 1px #333!important;
    }
    .so_advanced_search{
        margin: 0!important;
    }
    .layout-8.common-home #content .row-advanced .sas_inner-box-search .search-boxes{
        margin-bottom: 10px;
    }
    .layout-8.common-home #content .row-advanced .heading-title h2{
        font-size: 24px;
        padding: 10px;
        color: #7d7979 !important;
    }
    .d-none{
        display: none;
    }

    .carousel-inner > .item > img{
        width: 100%;
        height: 450px;
    }
    .modtitle
    {
        width: 100% !important;
    }
</style>    
   
<!-- Main Container  -->
<div class="main-container">
    <div id="content">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <div class="row-advanced">
            <div class="box-advanced-search container">
                <div class="so_advanced_search">
                    <div class="sas_wrap">
                        <div class="sas_inner">
                            <!-- <div class="heading-title"><h2>Select Your Tyre Size</h2></div> -->
                            <input type="hidden" name="search_car_hidden" id="search_car_hidden" value="<?php echo (isset($_GET['car_id']) ? $_GET['car_id'] : 0) ?>">
                            <input type="hidden" name="search_cat_hidden" id="search_cat_hidden" value="<?php echo (isset($_GET['cat_id']) ? $_GET['cat_id'] : 0) ?>">
                            <input type="hidden" name="search_model_hidden" id="search_model_hidden" value="<?php echo (isset($_GET['model_id']) ? $_GET['model_id'] : 0) ?>">
                            <div class="sas_inner-box-search" style="margin-top: 30px">
                                <div class="row search-boxes-row">
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 search-boxes">
                                        <!-- <select name="search_car" id="search_car" class="selectpicker" onchange="get_sp2()"> -->



                                     <select class="form-control chosen_sp1" name="search_car" id="search_car" onchange="get_sp2()" >

                                        
                                            <option value=""> Section Width</option>

                                            
                                        </select>
                                       <p id="sp1_select_err" style="display: none; color: red;">Please  Select Sp-1 </p>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 search-boxes">
                                       
                                        <select name="search_category" id="search_category" class="form-control chosen_sp2" onchange="get_sp3()">
                                            <option value=""> Aspect Ratio</option>
                                            
                                        </select>
                                          <p id="sp2_select_err" style="display: none; color: red;">Please  Select Sp-2 </p>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 search-boxes">
                                        <select name="search_model" id="search_model" class="form-control chosen_sp3">
                                            <option value="">Rim Diameter</option>
                                            
                                        </select>
                                          <p id="sp3_select_err" style="display: none; color: red;">Please  Select Sp-3 </p>
                                    </div>
                                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 search-button">
                                        <button type="button" id="top_search_btn" onclick="Getsp123_data()"> Find Matching Tyres</button>
                                    </div>
                                </div>              
                            </div>
                        </div>   
                    </div>
                </div> 
            </div>
        </div>
          <!-- <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol> -->

          <!-- Wrapper for slides -->
          <div class="carousel-inner">

            <?php $p = 0;
            foreach($Banners_arr as $banner) { ?> 

            <div class="item <?php echo ($p==0 ? 'active' : '' ); ?>">
              <img src="<?php echo $banner['imageUrl']; ?>" alt="Los Angeles">
            </div>

            <?php $p++; } ?>

            <!-- <div class="item">
              <img src="image/s6.jpg" alt="Chicago">
            </div>

            <div class="item">
              <img src="image/s6.jpg" alt="New York">
            </div> -->
          </div>

          <!-- Left and right controls -->
          <!-- <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a> -->
        </div>
        
        <div class="container" >

            <div id="so_categories_51" class="so-categories module theme3 slider-cates5">                    
                    <div class="modcontent">
                        <div class="cat-wrap theme3">

                            <?php
                            
                                if(count($supplier_image['imagename'])>0){
                                foreach ($supplier_image['imagename'] as $mainItems) {

                                    
                                   // print_r($mainItems);
                                    ?>
                                     <div class="content-box">
                                        <div class="image-cat">
                                         <img src="https://www.tyre.admin.starr365.com/ecom-admin/assets/images/supplier/<?php echo $accNum?>/<?php echo $mainItems ?>" />
                                            <div class="cat-title">
                                        
                                    </div>                              
                                </div>                        
                                                     
                            </div>


                                    <?php
                                }
                            }
                            else
                            {
                                echo "<div style='padding:15px; font-size:18px; min-height:230px;'> Sorry no product found in this category </div>";
                            }
                            ?>
                         
                            <!-- <div class="content-box">
                                <div class="image-cat">                        
                                    <a href="#"><img src="image/catalog/demo/category/id5-cate1.jpg" alt="image" /></a>
                                    <div class="cat-title">
                                        <a href="#">Wheels & Tires</a>
                                    </div> 
                                </div>                        
                                                       
                            </div>
                            <div class="content-box">
                                <div class="image-cat">
                                    <a href="#"><img src="image/catalog/demo/category/id5-cate5.jpg" alt="image" /></a>
                                </div>                  
                                <div class="cat-title">
                                    <a href="#">Replacement parts</a>
                                </div>                        
                            </div>
                            <div class="content-box">
                                <div class="image-cat">
                                    <a href="#"><img src="image/catalog/demo/category/id5-cate3.jpg" alt="image" /></a>
                                </div>                        
                                <div class="cat-title">
                                    <a href="#">Oil Fluids</a>
                                </div>                        
                            </div>
                            <div class="content-box">
                                <div class="image-cat">
                                    <a href="#"><img src="image/catalog/demo/category/id5-cate2.jpg" alt="image" /></a>
                                </div>                        
                                <div class="cat-title">
                                    <a href="#">Smart devices</a>
                                </div>                        
                            </div>
                            <div class="content-box">
                                <div class="image-cat">
                                    <a href="#"><img src="image/catalog/demo/category/id5-cate6.jpg" alt="image" /></a>
                                </div>                        
                                <div class="cat-title">
                                    <a href="#">Lighting</a>
                                </div>                        
                            </div>
                            <div class="content-box">
                                <div class="image-cat">
                                    <a href="#"><img src="image/catalog/demo/category/id5-cate2.jpg" alt="image" /></a>
                                </div>                        
                                <div class="cat-title">
                                    <a href="#">Smart devices</a>
                                </div>                        
                            </div>
                            <div class="content-box">
                                <div class="image-cat">
                                    <a href="#"><img src="image/catalog/demo/category/id5-cate3.jpg" alt="image" /></a>
                                </div>                        
                                <div class="cat-title">
                                    <a href="#">Oil Fluids</a>
                                </div>                        
                            </div> -->
                        </div>
                    </div>
                </div>

        </div>
        <div class="container" >
            <div class="block-services" id="middle_content_data">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-margin1">
                        <div class="icon-service">
                            <div class="icon"><i class="pe-7s-car">&nbsp;</i></div>
                            <div class="text">
                                <h6>World wide Free shipping</h6>
                                <p class="no-margin">Sed ut perspiciatis unde omnis iste natus error sit
                                voluptatem accusantium doloremque</p>
                            </div>
                        </div>
                    </div>        
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-margin1">
                        <div class="icon-service">
                            <div class="icon"><i class="pe-7s-refresh-2">&nbsp;</i></div>
                            <div class="text">
                                <h6>Money Back Guarantee</h6>
                                <p class="no-margin">Sed ut perspiciatis unde omnis iste natus error sit
            voluptatem accusantium doloremque</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <div class="icon-service">
                            <div class="icon"><i class="pe-7s-users">&nbsp;</i></div>
                            <div class="text">
                                <h6>Online support 24/24</h6>
                                <p class="no-margin">Sed ut perspiciatis unde omnis iste natus error sit
            voluptatem accusantium doloremque</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="banners banners1" style="display: none;">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="bn bn1">
                            <a href="#"><img src="image/catalog/banners/id8-bn1.jpg" alt="banner"></a>
                        </div>
                        <div class="bn bn2">
                            <a href="#"><img src="image/catalog/banners/id8-bn2.jpg" alt="banner"></a>
                        </div>
                    </div>  
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="bn bn3">
                            <a href="#"><img src="image/catalog/banners/id8-bn3.jpg" alt="banner"></a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Extra new arrivals -->
            <div style="display: none;" class="module extra-layout1">
                <div class="pre_text">
                    Top sale in the week              
                </div>  
                 <form id="menuAddToCart" action="" method="POST">               
                <h3 class="modtitle"><span>New Arrivals</span></h3>
                <div class="modcontent">
                    <div id="so_extra_slider_12" class="so-extraslider button-type1">
                        <div class="products-list yt-content-slider extraslider-inner" data-rtl="yes" data-pagination="no" data-arrows="no" data-autoplay="no" data-delay="4" data-speed="0.6" data-margin="30" data-items_column00="4" data-items_column0="4" data-items_column1="3" data-items_column2="2" data-items_column3="1" data-items_column4="1" data-lazyload="yes" data-loop="no" data-buttonpage="top">

                            <?php
                                    $m = 0;
                                    if (count($newarrival) > 0) {

                                      foreach ($newarrival as $product_arr) {

                                            //print_r($product_arr); die;

                                        $menuNum_arr=$product_arr['menuNum']; 

                                        $res_json=file_get_contents($HTTP_HOST."ajax_autopart.php?action=getItemDetails&menuNum=".$menuNum_arr);

                                        $res=json_decode($res,true);
                                        //print_r($res);


                                        //$res = $myCategory->getItemDetails(accNum, $product_arr['menuNum']);

                                        $price = $stock = "";

                                        $discountType = $product_arr['discountType'];

                                        $imageTag =  "";

                                      
                                        $min_price = 40;

                                        ?>
                            <div class="item">
                                <div class="product-layout product-grid">         
                                    <div class="item-inner product-layout transition product-grid">
                                        <div class="product-item-container item--static">
                                            <div class="left-block">
                                                <div class="product-image-container second_img">
                                                    <a  target="_self" title="DPicanha porkcho">
                                                        <img src="<?php echo $product_arr['image'];?>" class="img-1 img-responsive" alt="image1">
                                                        <img src="<?php echo $product_arr['image'];?>" class="img-2 img-responsive" alt="image2">
                                                    </a>
                                                </div>
                                                <span class="label-product label-new">New</span>
                                                <!--quickview--> 
                                                <div class="so-quickview">
                                                  <a  href="quickview.php?menu_id=<?php echo $product_arr['menuNum']; ?>" title="Quick view" data-fancybox-type=""><i class="fa fa-search"></i><span>Quick view</span></a>
                                                </div>                                                     
                                                <!--end quickview-->
                                            </div>
                                            <div class="right-block">
                                                <div class="button-group cartinfo--static">                                                
                                                    <!-- <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('60');"></button> -->
                                                   <!--  <button type="button" class="addToCart  " title="Add to cart" >
                                                        <span>Add to cart </span>   
                                                    </button> -->
                                                    <div class="so-quickview">
                                                 <a class=" btn-button quickview quickview_handler visible-lg addToCart" href="quickview.php?menu_id=<?php echo $product_arr['menuNum']; ?>" title="Quick view" data-fancybox-type="iframe"><span>Add to cart</span></a>
                                               </div>
                                                    <!-- <button type="button" class="compare btn-button" title="Compare this Product " onclick="compare.add('60');"></button>                                                     -->
                                                </div>
                                                <h4><a  title="Picanha porkcho" target="_self"><?php echo $product_arr['menuName'];?></a></h4>
                                                <div class="rating">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                </div>
                                                <div class="price">
                                                  <span class="price">$<?php echo  $product_arr['min_price'];?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>      
                                </div>
                            </div>
                        <?php } }

                                else {

                                      echo "<div style='padding:15px; font-size:18px; min-height:230px;'> Sorry no product found in this category </div>";
                              }

                         ?>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- end Extra new arrivals -->

            <div class="banners banners2" style="display: none;">
                <div>
                    <a href="#"><img src="image/catalog/banners/id8-bn4.jpg" alt="banner"></a>
                </div>
            </div>

            <div class="module listingtab-layout5" style="display: none;">
                <div class="pre_text">
                    Top sale in the week              
                </div>                 
                <h3 class="modtitle"><span>Best Seller</span></h3>
                <div class="modcontent">
                    <div id="so_listing_tabs_4" class="so-listing-tabs first-load">
                        <div class="loadeding"></div>
                        <div class="ltabs-wrap">
                            <div class="ltabs-tabs-container" data-delay="300" data-duration="600" data-effect="none" data-ajaxurl="" data-type_source="0" data-lg="4" data-md="4" data-sm="3" data-xs="1" data-margin="30" data-type_show="loadmore">
                                <!--Begin Tabs-->
                                <div class="ltabs-tabs-wrap"> 
                                <span class="ltabs-tab-selected">Category 1</span> <span class="ltabs-tab-arrow">▼</span>
                                    <div class="item-sub-cat">
                                        <ul class="ltabs-tabs cf">
                                            <li class="ltabs-tab tab-sel" data-category-id="34" data-active-content=".items-category-34"> <span class="ltabs-tab-label"> Category 1</span> </li>
                                            <li class="ltabs-tab " data-category-id="32" data-active-content=".items-category-32"> <span class="ltabs-tab-label">Category 2 </span> </li>
                                            <li class="ltabs-tab " data-category-id="33" data-active-content=".items-category-33"> <span class="ltabs-tab-label">Category  </span> </li>
                                        </ul>
                                    </div>
                                </div>
                                <!-- End Tabs-->
                            </div>
                            <div class="wap-listing-tabs products-list grid" >
                                <div class="ltabs-items-container">                                    
                                    <!--Begin Items-->
                                    <div class="ltabs-items ltabs-items-selected items-category-34" data-total="16">
                                        <div class="ltabs-items-inner" id="Searched_productItem">
                                            <!-- <div class="item"> -->

                                        <?php
                                            $m = 0;
                                            if (count($product_data) > 0) {

                                              foreach ($product_data as $product_arr) {

                                                    //print_r($product_arr); die;

                                                $menuNum_arr=$product_arr['menuNum']; 

                                                $res_json=file_get_contents($HTTP_HOST."ajax_autopart.php?action=getItemDetails&menuNum=".$menuNum_arr);

                                                $res=json_decode($res,true);
                                                print_r($res); 


                                                //$res = $myCategory->getItemDetails(accNum, $product_arr['menuNum']);

                                                $price = $stock = "";

                                                $discountType = $product_arr['discountType'];

                                                $imageTag =  "";

                                               

                                                
                                                if(isset($specials_offrs[$discountType]) || $m == 1)
                                                {
                                                  if(!empty($specials_offrs[$discountType]['imageTag'])  || $m == 1){
                                                    $imageTag = 'https://ecommerce.staffstarr.com/its-admin/assets/images/special/'.accNum.'/'.$specials_offrs[$discountType]['imageTag'];
                                                  }
                                                }

                                                // echo "<pre>";

                                                // print_r($res['varieties']);

                                                $min_price = 40;

                                                foreach ($res['varieties'] as $var_arr) {

                                                  $price .= "<option>$".$var_arr['price']."</option>";

                                                  $min_price = $var_arr['min_price'];

                                                  // $stock = $res['varieties'][0]['stock'];

                                                }

                                                
                                                ?>
                                                <div class="item">

                                                     <input type="hidden" name="unit_gst" id="unit_gst" value="0">
                                                       <input type="hidden" name="percentage" id="percentage" value="0">
                                                       <input type="hidden" name="unit_price" id="unit_price" value="0">

                                                       <input type="hidden" name="activeTable" id="activeTable" value="0">

                                                       <input type="hidden" name="activeDepartment" id="activeDepartment" value="0">

                                                       <input type="hidden" name="menuNum" id="menuNum" value="0">
                                                       <input type="hidden" name="menu_ID" id="menu_ID" value="<?php echo $menu_id;?>">

                                                       <input type="hidden" name="totalPrice" id="totalPrice" value="0">
                                                       <input type="hidden" name="invoice_id" id="invoice_id" value="0">
                                            
                                                <div class="product-layout product-grid">                                               
                                                    <div class="product-item-container item--static" id="search_item_html">
                                                        <div id="remove_div">
                                                        <div class="left-block" >
                                                            <div class="product-image-container second_img">
                                                                <a href="javascript:void(0)" target="_self" title="Volup tatem accu">
                                                                    <img src="<?php echo $product_arr['image'];?>" class="img-1 img-responsive" alt="image1">
                                                                    <img src="<?php echo $product_arr['image'];?>" class="img-2 img-responsive" alt="image2">
                                                                </a>
                                                            </div>
                                                            <span class="label-product label-new">New </span>
                                                            <!--quickview--> 
                                                            <div class="so-quickview">
                                                              <a class=" btn-button quickview quickview_handler visible-lg" href="quickview.php?menu_id=<?php echo $product_arr['menuNum']; ?>" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-search"></i><span>Quick view</span></a>
                                                            </div>                                                     
                                                            <!--end quickview-->
                                                        </div>
                                                        <div class="right-block">
                                                            <div class="button-group cartinfo--static">
                                                                
                                                                <!-- <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('60');"></button> -->
                                                                <!-- <button type="button" class="addToCart" title="Add to cart" onclick="addToCart()">
                                                                    <span>Add to cart </span>   
                                                                </button> -->
                                                                <div class="so-quickview"> <a class=" btn-button quickview quickview_handler visible-lg addToCart" href="quickview.php?menu_id=<?php echo $product_arr['menuNum']; ?>" title="Quick view" data-fancybox-type="iframe"><span>Add to cart</span></a> </div>
                                                                <!-- <button type="button" class="compare btn-button" title="Compare this Product " onclick="compare.add('60');"></button>                                                     -->
                                                            </form>
                                                            </div>
                                                            <h4><a href="javascript:void(0)" title="<?php echo $product_arr['menuName']; ?>" target="_self"><?php echo substr($product_arr['menuName'],0,15); echo (strlen($product_arr['menuName']) > 15 ? "..." : ""); ?></a></h4>
                                                            <div class="rating">    <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
                                                                <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                                                            </div>
                                                            <div class="price">
                                                              <span class="price">$<?php echo $product_arr['min_price'];?></span>
                                                            </div>
                                                        </div>                                            
                                                    </div> 
                                                    </div>                                           
                                                </div>
                                            </div>
                                            

                                             <?php }

                                            } else {

                                              echo "<div style='padding:15px; font-size:18px; min-height:230px;'> Sorry no product found in this category </div>";
                                            }

                                            ?>

                                                                                                                   
                                        </div>
 
   <!--  <section id="demos">
      <div class="row">
        <div class="large-12 columns">
          <div class="owl-carousel owl-theme">
            <div class="item">
              <h4>1</h4>
            </div>
            <div class="item">
              <h4>2</h4>
            </div>
            <div class="item">
              <h4>3</h4>
            </div>
            <div class="item">
              <h4>4</h4>
            </div>
            <div class="item">
              <h4>5</h4>
            </div>
            <div class="item">
              <h4>6</h4>
            </div>
            <div class="item">
              <h4>7</h4>
            </div>
            <div class="item">
              <h4>8</h4>
            </div>
            <div class="item">
              <h4>9</h4>
            </div>
            <div class="item">
              <h4>10</h4>
            </div>
            <div class="item">
              <h4>11</h4>
            </div>
            <div class="item">
              <h4>12</h4>
            </div>
          </div>
          <script>
            $(document).ready(function() {
              $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                autoplay:true,
                items:4,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:1000,
    autoplayHoverPause:true,
                responsive: {
                  0: {
                    items: 1,
                    nav: true
                  },
                  600: {
                    items: 3,
                    nav: false
                  },
                  1000: {
                    items: 5,
                    nav: true,
                    loop: false,
                    margin: 20
                  }
                }
              })
            })
          </script>
        </div>
      </div>
    </section> -->
                                    <!-- <div class="container" style="display: none;">
                                     <div class="row">
                                        <div id="slider">
                                           <div class="MS-content">
                                              <div class="item">
                                                 <img src="banner/TEYSEER%20TYRE%20CAMPAIGN%20ENG.jpg">
                                              </div>
                                              <div class="item">
                                                 <img src="banner/EricksenHonda_Z8-set-special_19-500x707.jpg">
                                              </div>
                                              <div class="item">
                                                 <img src="https://www.murphystyrepower.com.au/images/specials/Continental-Flipbook-3_small.jpg">
                                              </div>
                                              <div class="item">
                                                 <img src="https://www.murphystyrepower.com.au/images/specials/Continental-Flipbook-3_small.jpg">
                                              </div>
                                              <div class="item">
                                                 <img src="banner/michelin-promotion_1024x1024.jpg">
                                              </div>
                                              <div class="item">
                                                 <img src="banner/TEYSEER%20TYRE%20CAMPAIGN%20ENG.jpg">
                                              </div>
                                              <div class="item">
                                                 <img src="banner/michelin-promotion_1024x1024.jpg">
                                              </div>
                                              <div class="item">
                                                 <img src="banner/MICHELIN_REBATE_PROMO_1024x1024.jpg">
                                              </div>
                                              <div class="item">
                                                 <img src="https://www.murphystyrepower.com.au/images/specials/Continental-Flipbook-3_small.jpg
                                                 ">
                                              </div>
                                              <div class="item">
                                                 <img src="banner/TEYSEER%20TYRE%20CAMPAIGN%20ENG.jpg">
                                              </div>
                                           </div>
                                           <div class="MS-controls">
                                              <button class="MS-left"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                                              <button class="MS-right"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                                           </div>
                                        </div>
                                     </div>
                                  </div> -->
                                       <!--  <div class="ltabs-loadmore" data-active-content=".items-category-31" data-rl_start="12" data-rl_total="12" data-ajaxurl="" data-rl_load="8" data-moduleid="253">
                                            <div class="ltabs-loadmore-btn loaded" data-label="All ready" style="display: inline-block;">                                                    
                                                <i class="fa fa-plus"></i>
                                            </div>
                                        </div> -->
                                    </div>
                                    <div class="ltabs-items items-category-32 grid" data-total="16">
                                        <div class="ltabs-loading"></div>
                                        
                                    </div>
                                    <div class="ltabs-items  items-category-33 grid" data-total="16">
                                        <div class="ltabs-loading"></div>
                                    </div>
                                    <!--End Items-->
                                </div>
                            </div>
                            
                            
                        </div>   
                    </div>
                </div>
            </div>
        </div>

        <div class="row-brands" style="">
            <div class="slider-brands container">           
                <div class="yt-content-slider contentslider" data-rtl="no" data-loop="yes" data-autoplay="no" data-autoheight="no" data-autowidth="no" data-delay="4" data-speed="0.6" data-margin="0" data-items_column00="4" data-items_column0="4" data-items_column1="3" data-items_column2="2" data-items_column3="1"  data-arrows="yes" data-pagination="no" data-lazyload="yes" data-hoverpause="yes">
                    <?php
                    // print_r($FrontBanners_arr);
                     foreach($FrontBanners_arr as $images){ ?>
                    <div class="item"><a href="#"><img src="<?php echo $images['imageUrl'] ?>" alt="brand"></a></div>
                <?php } ?>
                   <!--  <div class="item"><a href="#"><img src="image/catalog/brands/b2.jpg" alt="brand"></a></div>
                    <div class="item"><a href="#"><img src="image/catalog/brands/b3.jpg" alt="brand"></a></div>
                    <div class="item"><a href="#"><img src="image/catalog/brands/b4.jpg" alt="brand"></a></div>
                    <div class="item"><a href="#"><img src="image/catalog/brands/b5.jpg" alt="brand"></a></div>
                    <div class="item"><a href="#"><img src="image/catalog/brands/b6.jpg" alt="brand"></a></div>
                    <div class="item"><a href="#"><img src="image/catalog/brands/b3.jpg" alt="brand"></a></div> -->
                </div>
                
            </div>
        </div>

        <div class="container" style="display: none;">
            <div class="module so-latest-blog blog-home">
                <div class="pre_text">Our recent posts</div>
                <h3 class="modtitle"><span>Latest blogs</span></h3>
                <div class="modcontent clearfix">
                    <div class="so-blog-external buttom-type1 button-type1">
                        <div class="blog-external yt-content-slider contentslider" data-rtl="no" data-loop="no" data-autoplay="no" data-autoheight="no" data-autowidth="no" data-delay="4" data-speed="0.6" data-margin="30" data-items_column00="3" data-items_column0="3" data-items_column1="2" data-items_column2="2" data-items_column3="1" data-items_column4="1" data-arrows="no" data-pagination="no" data-lazyload="yes" data-hoverpause="yes">
                            <div class="media">
                                <div class="item head-button">
                                    <div class="media-left so-block">
                                        <a class="imag" href="#"><img src="image/catalog/blog/1.jpg" alt="image" /></a>
                                    </div>
                                    <div class="media-body">
                                        <div class="media-content so-block">
                                            <div class="infos"><span class="media-date-added"> March 6th, 2019</span>By <span class="media-author">Wash upito</span></div>
                                            <h4 class="media-heading font-title head-item">
                                                <a href="#" title="Biten demons lector in henderit in vulp no sea takimata sanctus est" target="_self">Biten demons lector in henderit in ..</a>
                                            </h4>
                                            <div class="readmore font-title">
                                                <a href="#" target="_self"><span>Read more</span> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="media">
                                <div class="item head-button">
                                    <div class="media-left so-block">
                                        <a class="imag" href="#"><img src="image/catalog/blog/2.jpg" alt="image" /></a>
                                    </div>
                                    <div class="media-body">
                                        <div class="media-content so-block">
                                            <div class="infos"><span class="media-date-added"> March 6th, 2019</span>By <span class="media-author">Wash upito</span></div>
                                            <h4 class="media-heading font-title head-item">
                                                <a href="#" title="Commodo laoreet semper tincidun  sit vel illum dolore eu feugiat" target="_self">Commodo laoreet semper tincidun sit ..</a>
                                            </h4>
                                            <div class="readmore font-title">
                                                <a href="#" target="_self"><span>Read more</span> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="media">
                                <div class="item head-button">
                                    <div class="media-left so-block">
                                        <a class="imag" href="#"><img src="image/catalog/blog/3.jpg" alt="image" /></a>
                                    </div>
                                    <div class="media-body">
                                        <div class="media-content so-block">
                                            <div class="infos"><span class="media-date-added"> March 6th, 2019</span>By <span class="media-author">Wash upito</span></div>
                                            <h4 class="media-heading font-title head-item">
                                                <a href="#" title="Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse" target="_self">Duis autem vel eum iriure dolor ..</a>
                                            </h4>
                                            <div class="readmore font-title">
                                                <a href="#" target="_self"><span>Read more</span> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
<!-- //Main Container -->
   
   
<?php include_once "footer.php";  ?>
<script type="text/javascript">

     $(".chosen_sp1").chosen();
     $(".chosen_sp2").chosen();
     $(".chosen_sp3").chosen();
   
get_cart_items();





    function get_cart_items(){
            
    $.post("ajax_autopart.php?action=getCartItemsTyre",{},
      function (data1) {

        // alert('ajax_autopart.php?action=getCartItems');

          // alert(data1);
        data = $.parseJSON(data1);
        // console.log(data);

  //alert(data1);
        var cart_count = data.length;
        // alert(cart_count);
        $("#cart_items").text(cart_count);
        });
}
  </script>

<script type="text/javascript">
    
          get_sp1();

           function get_sp1()
         {
         //var sp2= $("#sp2_data").val();
         //var sp3=$("#sp3_data").val();
   
         $.ajax
         ({
              type: 'POST',
   
              url: 'ajax_autopart.php?action=get_sp1',
   
              data:{ },
              success: function (response) {
                 // alert(response);
   
                 data = $.parseJSON(response);
   
                 var sp1_options = "<option value='' disabled selected hidden>Section Width</option>";
                 //var sp1_options = "";
   
                 for(var i = 0; i< data['sp1'].length; i++)
                 {
                     sp1_options+="<option data-tokens="+data['sp1'][i]+" value="+ data['sp1'][i]+">"+ data['sp1'][i]+"</option>";
                 }
   
                 //alert(sp1_options);
                  // $('#sp1_data').removeAttr("disabled");
                 $("#search_car").html(sp1_options);
                 // $('.selectpicker').selectpicker('refresh')
   
                 $('.chosen_sp1').trigger("chosen:updated");



   
                 
              }
         });
     }


 function get_sp2()
   {
     var sp1= $("#search_car").val();

    
   
     $.ajax
     ({
        type: 'POST',
   
              url: 'ajax_autopart.php?action=get_sp2',
   
              data:{ sp1: sp1, },
              success: function (response) {
               // alert(response);
   
               data = $.parseJSON(response);
   
               var sp2_options = "<option value='' disabled selected hidden>Aspect Ratio</option>";
               // var sp2_options = "";
   
               for(var i = 0; i< data['sp2'].length; i++)
               {
                 sp2_options+="<option>"+ data['sp2'][i]+"</option>";
               }

   
               //alert(sp2_options);
                  $('#sp2_data').removeAttr("disabled");
               $("#search_category").html(sp2_options);
               $('.chosen_sp2').trigger("chosen:updated");


               if(sp1!="")
                  {

                   
                      $(".chosen_sp2").trigger('chosen:open');
                  }
                        
   
              }
     });
   }
   function get_sp3()
   {
     var sp2= $("#search_category").val();
     var sp1=$("#search_car").val();
   
     $.ajax
     ({
        type: 'POST',
   
              url: 'ajax_autopart.php?action=get_sp3',
   
              data:{ sp2: sp2, sp1: sp1 },
              success: function (response) {
               // alert(response);
   
               data = $.parseJSON(response);
   
               var sp3_options = "<option value='' disabled selected hidden>Rim Diameter</option>";
   
               for(var i = 0; i< data['sp3'].length; i++)
               {
                 sp3_options+="<option>"+ data['sp3'][i]+"</option>";
               }
               

                    // $('#sp3_data').removeAttr("disabled");
                  $("#search_model").html(sp3_options);
                 $('.chosen_sp3').trigger("chosen:updated");

                  if(sp2!="")
                  {

                   
                      $(".chosen_sp3").trigger('chosen:open');
                  }
              }
     });
   }
    function Getsp123_data()
    {

        
     
     var sp1=$("#search_car").val();
     var sp2= $("#search_category").val();
     var sp3=$("#search_model").val();
     var err_flg=0;

     if(sp1=="")
     {
        $("#sp1_select_err").show();
        err_flg=1;
     }
     else
     {
        $('#sp1_select_err').hide();
     }

    if(sp2=="")
     {
        $("#sp2_select_err").show();
        err_flg=1;
     }
     else
     {
        $('#sp2_select_err').hide();
     }

    if(sp3=="")
     {
        $("#sp3_select_err").show();
        err_flg=1;
     }
     else
     {
        $('#sp3_select_err').hide();
     }


     if(err_flg==0){
     // window.location='search_tyres.php?sp1='+sp1+'&sp2='+sp2+'&sp3='+sp3;

     // window.location='tyres/size/'+sp1+'/'+sp2+'/'+sp3+'/';
     // 13-inch/155-80r13
    window.location='tyres/sizes/'+sp3+ '-inch/' +sp1+ '-'+sp2+'r'+sp3+'/';
   }
     // //alert("hi");
     // $.ajax({
     //   type:'POST',
     //   url:'ajax_autopart.php?action=GetSpData',
     //   data:{ sp1:sp1,sp2:sp2,sp3:sp3},
     //   success:function(response){
     //     // console.log(response);
   
     //                  // alert(response);
                   

     //            var res_item_cat = $.parseJSON(response);

     //            var info5=res_item_cat[0]["info5"];
     //            var info6=res_item_cat[0]["info6"];
     //            var info7=res_item_cat[0]["info7"];

   
     //            var search_item_string = '<div class="owl2-stage-outer"><div class="owl2-stage">';

             
     //            if(res_item_cat.length>0)
     //            {
     //            for(var i=0;i<res_item_cat.length;i++)
     //            {
     //                 var price="";
     //                  var after_discount="";
     //                  var sale_price="";
     //             res_item_cat1 = res_item_cat[i];
                   
                  
           
     //            // alert(ammt);
            
     //             img_url = res_item_cat1['image'];
     //              // alert(price);
   
     //             // var img="";

     //              // after_discount=Number((100-info5)*price/ 100);
     //              // sale_price=after_discount;
     //              //  // alert(after_discount);

     //              // if(info6>0)
     //              // {
                    
     //              //   sale_price1=parseFloat(after_discount) + parseFloat(info6);
     //              //   sale_price=sale_price1.toFixed(2);
     //              //   // alert("if"+sale_price+" after_discount= "+after_discount+" info6="+info6+" sale_price1= "+sale_price1);
                    
     //              // }
     //              // else if(info7>0)
     //              // {
                    
                      
     //              //   sale_price2=parseFloat(after_discount)+(parseFloat(info7)*parseFloat(after_discount)/100);
     //              //   sale_price=sale_price2.toFixed(2);
     //              //   // alert("if"+sale_price+" after_discount= "+after_discount+" info7="+info7+" sale_price2= "+sale_price2);

     //              //    // window.location.href="home8.php?car_id="+item_car+"&cat_id="+item_cat+"&model_id="+item_model;
                    
                    
     //              // }
     //               GetAmmounts(res_item_cat1['menuNum']);
     //                 search_item_string+='<div class="owl2-item active" style="width: 270px;"> <div class="item"> <div class="product-item-container item--static" id=""><div class="left-block" > <div class="so-quickview"><a class=" btn-button quickview quickview_handler visible-lg" href="quickview.php?menu_id='+res_item_cat1['menuNum']+'" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-search"></i><span>Quick view</span></a></div><div class="logo"><img style="width:100px" src="https://www.tyre.admin.starr365.com/ecom-admin/assets/images/supplier/'+res_item_cat1['accNum']+'/'+res_item_cat1['image_manufacturer']+'"></div> <div class="product-image-container second_img">  <a href="javascript:void(0)" target="_self" title="Volup tatem accu"><img src="'+img_url+'" class="img-1 img-responsive" alt="image1"> <img src="'+img_url+'" class="img-2 img-responsive" alt="image2"> </a> </div> <span class="label-product label-new">New </span> </div>  <div class="right-block"><div class="button-group cartinfo--static"> <div class="so-quickview"> <a class=" btn-button quickview quickview_handler visible-lg addToCart" href="quickview.php?menu_id='+res_item_cat1['menuNum']+'" title="Quick view" data-fancybox-type="iframe"><span>Add to cart</span></a> </div><!--<button type="button" class="addToCart" title="Add to cart" onclick="addToCart()"> <span>Add to cart </span></button> --> </div> <h4><a href="javascript:void(0)" title=" target="_self"></a>'+res_item_cat1["info1"]+'</h4> <div class="rating">  <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>  <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>  <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>  <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span> </div> <div class=""><span>Price : </span>  <span class="price_val_'+res_item_cat1['menuNum']+'"></span><br><span >After Discount :  </span><span class="after_discount_val_'+res_item_cat1['menuNum']+'">$'+after_discount+'</span><br><span class="price">Sale Price : </span><span class="price saleprice_val_'+res_item_cat1['menuNum']+'">$'+sale_price+'</span<p>Price : '+price+' </p><p>sale_price : '+sale_price+' </p><p>After discount : '+after_discount+' </p><p>info5 : '+info5+' </p><p>info6 : '+info6+' </p><p>info7 : '+info7+' </p><p> after_discount=Number((100-info5)*price/ 100);</p><p>  if(info6>0){sale_price1=parseFloat(after_discount) + parseFloat(info6)};</p><p>   else if(info7>0) { sale_price2=parseFloat(after_discount)+(parseFloat(info7)*parseFloat(after_discount)/100)};</p></div>  </div></div> </div></div> ';
                    
                            
                   
   
     //             // item_cate_string+='<div class="product-layout col-lg-4 col-md-4 col-sm-4 col-xs-12"><div class="product-item-container item--static"><div class="left-block"><div class=""><a href="javascript:void(0)" target="_self" title="Volup tatem accu" onclick="show_modal('+res_item_cat1["menuNum"]+','+res_item_cat1["min_price"]+','+sale_price+')"> <img  src="'+img_url+'" class="img-1 img-responsive" alt="image"></a></div><div class="item_name">'+res_item_cat1["info1"]+'</div><div class="item_description item-desc "><p>'+res_item_cat1["description"]+'</p></div><div class="item_description" style="">Retail Price - $'+res_item_cat1["min_price"]+'</div><div class="item_description" style="">After Discount - $'+after_discount+'</div><div class="item_name" style="">Sale Price - $'+sale_price+'</div><div class="list-block hidden"><button class="addToCart btn-button"  type="button" title="View Details" onclick="show_modal('+res_item_cat1["menuNum"]+','+res_item_cat1["min_price"]+')"><i class="fa fa-eye"></i></button></div> <div class="so-quickview"></div></div><div class="right-block" style="margin-top: 5px;"><div ><button type="button" class="btn-header btn btn-primary" title="View Details" onclick="show_modal('+res_item_cat1["menuNum"]+','+res_item_cat1["min_price"]+')"><span>View Details </span></button></div></div></div></div> ';
   
     //             // <div style="text-align:center; padding:5px;">Qty-<select style="padding:5px 10px"><option>1</option><option>2</option><option>3</option><option>4</option><option>5</option><option>6</option></select></div>
                  
     //           }
     //            search_item_string+'</div></div><div class="owl2-controls"><div class="owl2-nav"><div class="owl2-prev" style=""></div><div class="owl2-next" style=""></div></div><div class="owl2-dots" style="display: none;"></div></div>';


     //              $("#Searched_productItem").html(search_item_string);

     //                $("#so_categories_51").hide();
     //                $("#middle_content_data").hide();
     //               $('html, body').animate({
     //                        scrollTop: $("#Searched_productItem").offset().top
     //                    }, 1000);

     //                    $.getScript('js/themejs/homepage.js', function() {
     //                        // alert("loaded");
     //                        //$("#content").html('Javascript is loaded successful!');
     //                    });
     //         }
     //         else{
     //            search_item_string+="<div style='padding:15px; font-size:18px; min-height:230px;'> Sorry no product found in this category </div>";

     //         }
   
     //   }
   
     // });
   
   }

   function GetAmmounts(menuNum)
   {
    // alert(menuNum);
     $.ajax({
       type:'POST',
       url:'ajax_autopart.php?action=GetAmmounts&menuNum='+menuNum,
       data:{ },
       success:function(response){
        // console.log(response);
         var data = $.parseJSON(response);

         var sale_price=data['sale_price'];
         var after_discount=data['after_discount'];
         var price=data['price'];

         $(".price_val_"+menuNum+"").text(price);
         $(".saleprice_val_"+menuNum+"").text(sale_price);
         $(".after_discount_val_"+menuNum+"").text(after_discount);
         // alert(price);
                     
        }
    })  

   }




</script>
<!-- <script src="sliderCss/multislider.min.js"></script> -->

<!-- Initialize element with Multislider -->
<script>
   // $('#slider').multislider({
   //    interval: 4000,
   //     slideAll: true,
   //    duration: 1500
   // });
</script>
<script>
   // var slideIndex = 0;
   // showSlides();
   
   // //setInterval(showSlides(), 300);
   
   // function showSlides() {
   //   var i;
   //   var slides = document.getElementsByClassName("mySlides");
   //   var dots = document.getElementsByClassName("dot");
   //   for (i = 0; i < slides.length; i++) {
   //     slides[i].style.display = "none";  
   //   }
   //   slideIndex++;
   //   if (slideIndex > slides.length) {slideIndex = 1}    
   //   for (i = 0; i < dots.length; i++) {
   //     dots[i].className = dots[i].className.replace(" active", "");
   //   }
   //   slides[slideIndex-1].style.display = "block";  
   //   dots[slideIndex-1].className += " active";
   //   setTimeout(showSlides, 5000); // Change image every 2 seconds
   // }
</script>




<?php 
        $selected = '';
        if(isset($_GET['car_id']))
        {

            ?>
            <script>
            $( document ).ready(function() {
                get_categories();
            });
            </script>
            <?php
        }
    ?>
<script type="text/javascript">
    $(window).scroll(function(){
      var sticky = $('.sas_inner-box-search'),
          scroll = $(window).scrollTop();

      if (scroll >= 450) sticky.addClass('fixed');
      else sticky.removeClass('fixed');
    });
</script>
<script type="text/javascript">
    $(window).scroll(function(){
      var dnone = $('.heading-title'),
          scroll = $(window).scrollTop();

      if (scroll >= 450) dnone.addClass('d-none');
      else dnone.removeClass('d-none');
    });
</script>
</body>
</html>