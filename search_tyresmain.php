<?php
// print_r($_REQUEST['sp_data']);die;


   
    if(isset($_REQUEST))
    {
        $title=$_REQUEST;
        $array=str_replace("r","-",$title['sp_data']);

        $sp_data=explode("-",$array);

      
        $sp1=$sp_data[0];
        $sp2=$sp_data[1];
        $sp3=$sp_data[2];

    }


    include_once"header.php";


    // echo $HTTP_HOST;die;

    require_once "config/config.php";

    include_once"helperfile.php";
 $res=Checklogin();



 if($res==1)
  {
    header("Location: homepage.php");
  }
  else
  {
    header("Location: index.php");die;
  }
 
  $accNum= accNum;
    // $HTTP_HOST='http://tyre.staffstarr.com/';

    $accNum= accNum;

     
    $specials_json=file_get_contents($HTTP_HOST."ajax_autopart.php?action=getSpecials");
    //print_r($specials_json); die;
    $specials=json_decode($specials_json,true);

    //$specials = $myCategory->getSpecials(accNum);
    $specials_offrs = $_SESSION['specials'];


    $getBanners_json=file_get_contents($HTTP_HOST."ajax_autopart.php?action=getBanners");
    $Banners_arr=json_decode($getBanners_json,true);


    $get_manufactures_json=file_get_contents($HTTP_HOST."ajax_autopart.php?action=get_manufactures");
    $manufactures=json_decode($get_manufactures_json,true);

// print_r($manufactures);

    // $cat_id=172;
    // $product_data_json=file_get_contents($HTTP_HOST."ajax_autopart.php?action=getMenuItems_data&categoryNum=".$cat_id);
    // $product_data=json_decode($product_data_json,true);

    ?>

    <style type="text/css">
    .bootstrap-select .dropdown-menu li a {
    text-align: left !important;
    padding-left: 15px;
}


.full_width{
    width:100% !important;
}
    .products-list.grid .product-item-container.item--static .cartinfo--static {
    display: block;
}

        .button_priority {
           background-color:whitesmoke;
          border-color:none;
          color: black;
          padding: 13px 20px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 18px;
          margin: 4px 2px;
          cursor: pointer;
          border-radius: 30px;
          border: 1px solid #ddd;
        }
         .button_priority2 {
          background-color:whitesmoke;
          border-color:none;
          color: black;
          padding: 13px 20px;
          text-align: center;
          text-decoration: none;
          display: inline-block;
          font-size: 18px;
          margin: 4px 2px;
          cursor: pointer;
          border-radius: 30px;
          border: 1px solid #ddd;

        }
        .active_priority{
            color:#fff;

            background-color:#ff2d37;

            border-color:#ff2d37;
        }
         button.button_priority2:focus , button.button_priority:focus  {
            outline: none;
            }


                
        .button4 {border-radius: 50px;}

		.p-0{
			padding: 0;
		}
    	.products-list.grid .product-item-container.item--static .cartinfo--static .btn-button{
		    display: table-cell !important;
		}
        .layout-8.common-home #content .row-advanced {
            background-image: none!important;
            padding: 0;
        }
        
        .layout-8.common-home #content .row-advanced {
            position: absolute;
            /* background-size: 105%; */
            z-index: 99;
            /* bottom: 0; */
            /* top: 8%; */
            margin: 0 auto;
            right: 0;
            left: 0;
            bottom: 0;
            /* line-height: 100%; */
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
        
        .fixed .search-boxes-row {
            width: 90%;
            margin: 10px auto 0 auto;
        }
        
        .fixed .search-boxes {
            margin-bottom: 10px;
        }
        
        .fa {
            line-height: 40px!important;
        }
        
        .layout-8.common-home #content .row-advanced .sas_inner-box-search .search-boxes select {
            box-shadow: 0 0 1px #333!important;
        }
        
        .so_advanced_search {
            margin: 0!important;
        }
        
        .layout-8.common-home #content .row-advanced .sas_inner-box-search .search-boxes {
            margin-bottom: 10px;
        }
        
        .layout-8.common-home #content .row-advanced .heading-title h2 {
            font-size: 24px;
            padding: 10px;

        }
        
        .d-none {
            display: none;
        }
        
        .carousel-inner > .item > img {
            width: 100%;
            height: 450px;
        }

        .search_data{
            background-color: #2e3139 !important;
            text-align: center;
            padding: 30px;
            color: #fff !important;
        }

        .offer_div_not{
            width: 100%;
        }
        .offerActive:before {
            border-left: 11px solid #d00606;
            }

        .offerActive
        {
            background-color: #ff2d37;
        }

        .btn_disabled{
            cursor: not-allowed;
            pointer-events: none;
            opacity: .6;
        }

        .price_443{
            text-align: center;
            color: red ;
            border: 1px solid red;
            border-radius: 5px;
            padding: 5px;

        }

        .price_443 .price{
            color: red ;
        }
        .price_443 h4{
            font-size: 12px;
            padding-bottom: 5px;
            border-bottom: 1px solid #d3d3d3;
        }

        .label-product, .label-new, .label-sale {
            text-align: center;
           
            border-radius: 0;
            color: 
            #fff;
            display: block;
            font-size: 12px;
            font-weight: 400;
            min-width: 60px;
            height: 30px;
            line-height: 30px;
            position: absolute;
            top: 15px;
            text-transform: uppercase;
            z-index: 2;
            padding: 0 15px;
            margin-bottom: 5px;
        }

        .tckLst-desktop {
            
            display: flex;
            -webkit-box-align: center;
          
            align-items: center;
            -webkit-box-pack: center;
         
            justify-content: center;
        }
.u-bold {
    font-family: HelveticaNeueBold,HelveticaNeue-Bold,Helvetica Neue Bold,HelveticaNeue,Helvetica Neue,Helvetica,Arial,sans-serif !important;
    font-weight: 600 !important;
}
.U-content{
    margin-left: 20px; 
    color: #110404;
    }
    .tckLst-icon {
    width: 16px;
    width: 1rem;
    height: 16px;
    height: 1rem;
    border-radius: 50%;
    font-size: 9px;
    font-size: .5625rem;
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    -webkit-box-pack: center;
    -ms-flex-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    margin-right: 5px;
    margin-right: .3125rem;
    position: absolute;
    left: 0;
    top: 50%;
    -webkit-transform: translateY(-50%);
    transform: translateY(-50%);
}
.u-clrBg--lt1 {
    background-color: 
    #ffde00 !important;
}
.icon-tick::before {
    content: "\E01D";
}

.menufor_mobile{
    display: none;
}
.products-list.grid .product-item-container .right-block, .products-list .product-grid .product-item-container .right-block
{
    border-top:none !important; 
}

    @media(max-width: 768px){

     .tckLst-desktop{

         display:none  ;

     }
     .seller_btn{
        margin-left: 50px;
     }

     .tyreitems_div
     {
        margin-top: 20px;
     }

    

    }

    @media screen and (min-width:767px){
        #menu_items_collapse{display:block}
    }
    @media screen and (max-width:766px){
        #menu_items_collapse{display:none}
    }
.listingtab-layout5 .so-listing-tabs .ltabs-tabs-container {
    margin: 35px 0 25px 0;
}

.bootstrap-select .dropdown-menu li a {
text-align: center;
    }


    </style>

        <!-- Main Container  -->
    <div class="main-container">
        <div id="content">
            <div class="search_data"><h1 style="letter-spacing: 5px;margin: 0;font-size:30px; "><?php $string = strtoupper( $_REQUEST['sp_data']); echo str_replace("-", "/", $string); ?> Tyres </h1></div>
            <div style="display: " id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <div class="row-advanced" >
                    <div class="box-advanced-search container">
                        <div class="so_advanced_search">
                            <div class="sas_wrap">
                                <div class="sas_inner">
                                    <div class="heading-title">
                                        <h2 style="">Select Your Tyre</h2></div>
                                    <input type="hidden" name="search_car_hidden" id="search_car_hidden" value="<?php echo (isset($_GET['car_id']) ? $_GET['car_id'] : 0) ?>">
                                    <input type="hidden" name="search_cat_hidden" id="search_cat_hidden" value="<?php echo (isset($_GET['cat_id']) ? $_GET['cat_id'] : 0) ?>">
                                    <input type="hidden" name="search_model_hidden" id="search_model_hidden" value="<?php echo (isset($_GET['model_id']) ? $_GET['model_id'] : 0) ?>">
                                    <div class="sas_inner-box-search">
                                        <div class="row search-boxes-row">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 search-boxes">
                                                <select name="search_car" id="search_car" class="form-control" onchange="get_sp2()">
                                                    <option value="">Select Sp-1</option>

                                                    
                                                </select>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 search-boxes">
                                                <select name="search_category" id="search_category" class="form-control" onchange="get_sp3()">
                                                    <option value="">Select Sp-2</option>

                                                </select>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 search-boxes">
                                                <select name="search_model" id="search_model" class="form-control">
                                                    <option value="">Select Sp-3</option>

                                                </select>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 search-button">
                                                <button type="button" id="top_search_btn" onclick="Getsp123_data()">Search Items</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
           
                <div class="carousel-inner">

                    <?php $p = 0;
            foreach($Banners_arr as $banner) { ?>

                        <div class="item <?php echo ($p==0 ? 'active' : '' ); ?>">
                            <img src="<?php echo $banner['imageUrl']; ?>" alt="Los Angeles">
                        </div>

                        <?php $p++; } ?>

              
                </div>

            </div>

            <div class="container">
                <div class="module listingtab-layout5">
                    <div class="pre_text" style="display: none;">
                        Top sale in the week
                    </div>
                    <h3 class="modtitle" style="display: none;"><span id="priority_title">Best Seller</span></h3>
                    <div class="modcontent">
                        <div id="so_listing_tabs_4" class="so-listing-tabs first-load">
                            <div class="loadeding"></div>
                            <div class="ltabs-wrap">
                                <div class="ltabs-tabs-container" data-delay="300" data-duration="600" data-effect="none" data-ajaxurl="" data-type_source="0" data-lg="4" data-md="4" data-sm="3" data-xs="1" data-margin="30" data-type_show="loadmore">
                                    <!--Begin Tabs-->
                                    <div class="ltabs-tabs-wrap">
                                      <!--   <span class="ltabs-tab-selected d-none">Category 1</span> <span class="ltabs-tab-arrow">▼</span> -->
                                        <div class="item-sub-cat">
                                            <input type="hidden" name="onlinePriority" id="onlinePriority" value="1">
                                            <div class="seller_btn" style="text-align: center;">
                                             <button type="button" onclick="TyresPriority_data(1)"  class=" button_priority active_priority" > <span style="font-weight: 500;" class="ltabs-tab-label"> BEST SELLER </span> </button>
                                              <button type="button" onclick="TyresPriority_data(0)"  class="button_priority2 " > <span style="font-weight: 500;" class="ltabs-tab-label"> ALL TYRES  </span> </button>
                                          </div>
                                            <ul style="display: none" class="ltabs-tabs cf">
                                                <li onclick="Getsp123_data(1)"  class="ltabs-tab tab-sel" data-category-id="" data-active-content=".items-category-34"> <span class="ltabs-tab-label"> Best Seller  </span> </li>


                                                <li onclick="Getsp123_data(0)"  class="ltabs-tab " data-category-id="" data-active-content=".items-category-32"> <span class="ltabs-tab-label">All Tyres </span> </li>
                                              
                                                
                                               
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- End Tabs-->
                                </div>
                                <div class="tckLst-desktop">
                                    <div>
                                        <p style="color: #000"> Tyre price includes <i class="fa fa-question-circle" aria-hidden="true"></i>  </p>
                                    </div>
                                     <div  class="U-content">
                                        <p class="tckLst-itemDT u-pSm u-bold">  <i class="fa fa-check" aria-hidden="true"></i> Tyre Fitting</p>
                                    </div>
                                     <div class="U-content">
                                        <p class="tckLst-itemDT u-pSm u-bold"><i class="fa fa-check" aria-hidden="true"></i> Wheel Balancing</p>
                                    </div>
                                     <div class="U-content">
                                        <p class="tckLst-itemDT u-pSm u-bold"><i class="fa fa-check" aria-hidden="true"></i> Tubeless Valve </p>
                                    </div>
                                     <div class="U-content">
                                        <p class="tckLst-itemDT u-pSm u-bold"><i class="fa fa-check" aria-hidden="true"></i> Waste Tyre Management</p>
                                    </div>
                                    <div class="U-content">
                                        <p class="tckLst-itemDT u-pSm u-bold"><i class="fa fa-check" aria-hidden="true"></i> FREE Shipping to your selected store</p>
                                    </div>
                                    <div class="U-content">
                                        <p class="tckLst-itemDT u-pSm u-bold"><i class="fa fa-check" aria-hidden="true"></i> GST</p>
                                    </div>
                                
                                
                            </div>
                                <div class="wap-listing-tabs products-list grid" style="margin-top: 30px;">
                                    <div class="ltabs-items-container">
                                        <div style="background-color: #f5f5f5;display: none;" class="col-md-3 owl2-stage-outer filter_div"> 

                                            <p class="fa fa-bars mobile_menu_option visible-xs" data-toggle="collapse" data-target="#menu_items_collapse" ></p>

                                            <div id="menu_items_collapse" class="collapse in menufor_mobile">

                                           <h3 class="prdFlt-filterText u-pXs u-clr--dk0">
                                            <i class="fa fa-filter" aria-hidden="true"></i>
                                              FILTER
                                        	</h3>
                                                <!-- <button type="button" class="btn btn-default">Apply Filter</button> -->
                                            <div class="row"  style="margin-top: 20px;">
                                                <!-- <div class="col-md-4">
                                                    <label style="font-size: 14px;" class="custom-control-label">Sort by price : </label>
                                                </div> -->
                                                <div class="col-md-12">
                                                    <select onchange="Getsp123_data()" name="price_sort" id="price_sort" class="custom-control-label form-control selectpicker" style="">
                                                        <option value="0"> Price - Low To high</option>
                                                        <option value="1"> Price - High to low</option>
                                                    </select>
                                                </div>
                                            </div>
                                           
                                            
                                            <div style="margin-top: 20px;">
                                               <input type="checkbox" name="fuelSaving" id="fuelSaving" onchange="Getsp123_data()" value="0">
                                                <label style="font-size: 14px;" class="custom-control-label" for="fuelSaving">FuelSaving</label>
                                            </div>
                                            <div style="" id="lt_rf_div">
                                              
                                            </div>
                                            
                                            <div style="margin-top: 20px;display: " id="tyre_brand" >

                                                <span style="display: " id="tyres_brand_btn"  class="icon-plus" data-toggle="collapse" data-target="#ecomTyre_brands"><b>+ Brand</b></span>
                                                 
        
  
                                               <div style="margin-left: 30px;margin-top: 5px;" id="ecomTyre_brands" class="collapse ">
                                                   
                                               </div>
                                                
                                            </div>
                                            <div style="margin-top: 20px;display: none" id="Tyre_Performance" >

                                                <span style="display: none" id="performance_btn"  class="icon-plus" data-toggle="collapse" data-target="#ecomItems_categories"><b>+ Tyre Performance Categories</b></span>
                                                 
        
  
                                               <div style="margin-left: 30px;margin-top: 5px;" id="ecomItems_categories" class="collapse in">
                                                   
                                               </div>
                                                
                                            </div>


                                        </div>
                                            
                                        </div>
                                        <!--Begin Items-->
                                        <div class="col-md-9 tyreitems_div full_width">
                                        <div class="ltabs-items ltabs-items-selected items-category-34" data-total="16">
                                            <div class="ltabs-items-inner" id="Searched_productItem">
                                                <!-- <div class="item"> -->

                                                <?php
                                            /* $m = 0;
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
                                                                    <div class="left-block">
                                                                        <div class="product-image-container second_img">
                                                                            <a href="javascript:void(0)" target="_self" title="Volup tatem accu">
                                                                    <img src="<?php echo $product_arr['image'];?>" class="img-1 img-responsive" alt="image1">
                                                                    <img src="<?php echo $product_arr['image'];?>" class="img-2 img-responsive" alt="image2">
                                                                </a>
                                                                        </div>
                                                                        <span class="label-product label-new">New </span>
                                                                        <!--quickview-->
                                                                        <div class="so-quickview">
                                                                            <a class=" btn-button quickview quickview_handler " href="<?php echo $HTTP_HOST; ?>quickview.php?menu_id=<?php echo $product_arr['menuNum']; ?>" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-search"></i><span>Quick view</span></a>
                                                                        </div>
                                                                        <!--end quickview-->
                                                                    </div>
                                                                    <div class="right-block">
                                                                        <div class="button-group cartinfo--static">

                                                                            <!-- <button type="button" class="wishlist btn-button" title="Add to Wish List" onclick="wishlist.add('60');"></button> -->
                                                                            <!-- <button type="button" class="addToCart" title="Add to cart" onclick="addToCart()">
                                                                    <span>Add to cart </span>   
                                                                </button> -->
                                                                            <div class="so-quickview"> <a class=" btn-button quickview quickview_handler  addToCart" href="<?php echo $HTTP_HOST; ?>quickview.php?menu_id=<?php echo $product_arr['menuNum']; ?>" title="Quick view" data-fancybox-type="iframe"><span>Add to cart</span></a> </div>
                                                                            <!-- <button type="button" class="compare btn-button" title="Compare this Product " onclick="compare.add('60');"></button>                                                     -->
                                                                            </form>
                                                                        </div>
                                                                        <h4><a href="javascript:void(0)" title="<?php echo $product_arr['menuName']; ?>" target="_self"><?php echo substr($product_arr['menuName'],0,15); echo (strlen($product_arr['menuName']) > 15 ? "..." : ""); ?></a></h4>
                                                                        <div class="rating"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i></span>
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
                                            } */

                                            ?>

                                            </div>

                                        </div>
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

            
        </div>
    </div>


    <?php include_once "footer.php";  ?>

        <script type="text/javascript">

            $('.selectpicker').selectpicker('refresh');

            $('#brand').selectpicker({noneSelectedText: 'Choose A Brand'});

            $(".mobile_menu_option").click(function(){
                $("#menu_items_collapse").toggle("menufor_mobile");
            })
            get_cart_items();

          

            function get_cart_items() {

                $.post("<?php echo $HTTP_HOST; ?>ajax_autopart.php?action=getCartItemsTyre", {},
                    function(data1) {

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

            function get_sp1() {
                //var sp2= $("#sp2_data").val();
                //var sp3=$("#sp3_data").val();

                $.ajax({
                    type: 'POST',

                    url: '<?php echo $HTTP_HOST; ?>ajax_autopart.php?action=get_sp1',

                    data: {},
                    success: function(response) {
                        // alert(response);

                        data = $.parseJSON(response);

                        var sp1_options = "<option value=''>Select Sp-1</option>";
                        //var sp1_options = "";

                        for (var i = 0; i < data['sp1'].length; i++) {
                            sp1_options += "<option value="+ data['sp1'][i]+">" + data['sp1'][i] + "</option>";
                        }

                        //alert(sp1_options);
                        $('#sp1_data').removeAttr("disabled");
                        $("#search_car").html(sp1_options);

                        var sp1 = '<?php echo (isset($_REQUEST['sp_data']) ? $sp1 : '');?>';
                        // alert(sp1);
                        if(sp1!='')
                        {
                         $('#search_car option[value="'+sp1+'"]').prop('selected', true);
                         get_sp2();
                          
                        }
                

                        $('.chosen_sp1').trigger("chosen:updated");

                    }
                });
            }
            
            // get_sp2();
            function get_sp2() {
              var sp1= $("#search_car").val();
                

               
                // var sp3=$("#sp3_data").val();

                $.ajax({
                    type: 'POST',

                    url: '<?php echo $HTTP_HOST; ?>ajax_autopart.php?action=get_sp2',

                    data: {
                        sp1: sp1,
                    },
                    success: function(response) {
                        // alert(response);

                        data = $.parseJSON(response);

                        var sp2_options = "<option value=''>Select Sp-2</option>";
                        // var sp2_options = "";

                        for (var i = 0; i < data['sp2'].length; i++) {
                            sp2_options += "<option value=" + data['sp2'][i] + ">" + data['sp2'][i] + "</option>";
                        }

                        //alert(sp2_options);
                        $('#sp2_data').removeAttr("disabled");

                        $("#search_category").html(sp2_options);

                          var sp2 = '<?php echo (isset($_REQUEST['sp_data']) ? $sp2 : '');?>';
                          // alert(sp2);
                            if(sp2!='')
                            {
                             $('#search_category option[value="'+sp2+'"]').prop('selected', true);
                             get_sp3();

                            }

                       
                        $('.chosen_sp2').trigger("chosen:updated");
                        // $(".chosen_sp2").chosen("destroy");

                    }
                });
            }
            // get_sp3();
            function get_sp3() {
               

                sp2 = $("#search_category").val();
                 sp1 = $("#search_car").val();



                $.ajax({
                    type: 'POST',

                    url: '<?php echo $HTTP_HOST; ?>ajax_autopart.php?action=get_sp3',

                    data: {
                        sp2: sp2,
                        sp1: sp1
                    },
                    success: function(response) {
                        // alert(response);

                        data = $.parseJSON(response);

                        var sp3_options = "<option value=''>Select Sp-3</option>";

                        for (var i = 0; i < data['sp3'].length; i++) {
                            sp3_options += "<option value=" + data['sp3'][i] + ">" + data['sp3'][i] + "</option>";
                        }

                        // $('#sp3_data').removeAttr("disabled");
                        $("#search_model").html(sp3_options);

                        var sp3 = '<?php echo (isset($_REQUEST['sp_data']) ? $sp3 : '');?>';
                      // alert(sp3);                        
                            if(sp3!='')
                            {
                                // alert(sp3);
                             $('#search_model option[value="'+sp3+'"]').prop('selected', true);
                             Getsp123_data("first_call");
                             
                            }
                        // $('.chosen_sp3').trigger("chosen:updated");
                    }
                });
            }
            // Getsp123_data();
            function Getsp123_data(val) {
               

                    var onlinePriority=$("#onlinePriority").val();
                    // alert(onlinePriority);


                    var checked_values = '';
                    $('.subCat_check').each(function () {
                       checked_values+= (this.checked ? $(this).val()+',' : "");
                       // checked_values+=',';
                  });
                     
                       
                   var fuel_Saving = $("#fuelSaving").is(":checked");
                    if(fuel_Saving)
                    {
                     $("#fuelSaving").val(1);
                    }
                    else
                    {
                        $("#fuelSaving").val(0);
                    }

            var lite_truck_val = $("#lite_truck").is(":checked");
                    if(lite_truck_val)
                    {
                     $("#lite_truck").val(1);
                    }
                    else
                    {
                        $("#lite_truck").val(0);
                    }
            var ride_flat_val = $("#ride_flat").is(":checked");
                    if(ride_flat_val)
                    {
                     $("#ride_flat").val(1);
                    }
                    else
                    {
                        $("#ride_flat").val(0);
                    }


                var brand="";
                 $('.echoTyreBrands').each(function () {
                       brand+= (this.checked ? $(this).val()+',' : "");
                       // checked_values+=',';
                  });



                var price_sort=$("#price_sort").val();
                var lite_truck=$("#lite_truck").val();
                var ride_flat=$("#ride_flat").val();
                // alert(price_sort);

                 fuel_Saving=$("#fuelSaving").val();
                 sp1=$("#search_car").val();
                 sp2= $("#search_category").val();
                 sp3=$("#search_model").val();
                 if(sp1!=''){
                
                $.ajax({
                    type: 'POST',
                    url: '<?php echo $HTTP_HOST; ?>ajax_autopart.php?action=GetSpData',
                    data: {
                        sp1: sp1,
                        sp2: sp2,
                        sp3: sp3,
                        fuel_Saving: fuel_Saving,
                        checked_values:checked_values,
                        onlinePriority:onlinePriority,
                        price_sort:price_sort,
                        brand:brand,
                        ride_flat:ride_flat,
                        lite_truck:lite_truck,
                    },
                    success: function(response) {
                        // console.log(response);

                        // alert(response);

                        if(val == "first_call"){
                            
                            if(response!='[]'){
                                var res_item_cat = JSON.parse(response);
                                if(res_item_cat.length>0){
                                    menufactures = res_item_cat[0]['all_manufactures'];

                                    var text_menuf ='';
                                    for(var i = 0; i < menufactures.length; i++)
                                    {
                                        men_id = menufactures[i]['id'];
                                        men_name = menufactures[i]['name'];
                                        text_menuf+='<div><input type="checkbox" class="echoTyreBrands" name="brand_'+men_id+'" id="brand_'+men_id+'" onchange="Getsp123_data()" value="'+men_id+'"> <label style="font-size: 14px;" class="custom-control-label " for="brand_'+men_id+'">'+men_name+'</label></div>';
                                    }

                                    var all_ltrf=res_item_cat[0]['all_ltrf'];

                                    if(all_ltrf!=[]){
                                        var lefr_val="";

                                        if(all_ltrf['LT']!=""){
                                     lefr_val='<div><input type="checkbox" name="lite_truck" id="lite_truck" onchange="Getsp123_data()" value="0"> <label style="font-size: 14px;" class="custom-control-label" for="lite_truck">Lite Truck</label></div>';
                                   }

                                if(all_ltrf['RF']!=""){

                                    lefr_val+='<div><input type="checkbox" name="ride_flat" id="ride_flat" onchange="Getsp123_data()" value="0"> <label style="font-size: 14px;" class="custom-control-label" for="ride_flat">Run Flat</label></div>';
                                  }
                                    $("#lt_rf_div").html(lefr_val);
                                }

                                    $("#ecomTyre_brands").html(text_menuf);
                                     // $('#brand').selectpicker('refresh');
                                }
                            }

                            GetTyresPerformsItem();
                        }

                        if(onlinePriority == 1)
                        {
                            $(".filter_div").hide();
                            $(".tyreitems_div").addClass("full_width");
                        }else{
                            $(".filter_div").show();
                            $(".tyreitems_div").removeClass("full_width");
                        }
                        var res_item_cat = JSON.parse(response);
                        var item_count = res_item_cat[0]['item_count'];
                    if(item_count>0){


                        if(item_count>0){
                                var info5 = res_item_cat[0]["info5"];
                                var info6 = res_item_cat[0]["info6"];
                                var info7 = res_item_cat[0]["info7"];

                                

                                var search_item_string = '<div class="owl2-stage-outer"><div class="owl2-stage">';

                               
                                    for (var i = 0; i < res_item_cat.length; i++) {
                                    var price = "";
                                    var after_discount = "";
                                    var sale_price = "";



                                    res_item_cat1 = res_item_cat[i];

                                   var info4=res_item_cat1['info4'];

                                    img_url = res_item_cat1['image'];

                                    var menu_prices = res_item_cat1['prices'] ;

                                    var menu_sale_price = "";
                                    var menu_sale_price_443 = "";




                                 var variety_id = menu_prices['variety_id'];

                                 var main_price=res_item_cat1['main_price'];
                                 // alert(main_price);


                                    var menu_sale_price_text = '';
                                 
                                    var price_retail=menu_prices['sale_price'];


                                   if(main_price>0)
                                   {
                                    var main_prices_var=res_item_cat1['prices_main'];

                                    menu_sale_price=Math.round(main_prices_var['sale_price_main']);
                                    menu_sale_price_443=main_prices_var['SELLPRICE443_main'];
                                    menu_sale_price_text='$'+menu_sale_price+'<span style="font-size: 8px;color: #2c2c2c;">/EA</span>';

                                    if(Number(price_retail)>Number(menu_sale_price))
                                    {
                                       menu_sale_price_text='<strike>$'+price_retail+'<span style="font-size: 8px;color: #2c2c2c;">/EA</span></strike>  <span style="color:red">$'+menu_sale_price+'<span style="font-size: 8px;">/EA</span></span> '; 
                                    }
                                    
                                   }
                                   else
                                   {

                                     menu_sale_price = Math.round(menu_prices['sale_price']);
                                     menu_sale_price_443 = menu_prices['SELLPRICE443'];
                                    var serviceCharge=menu_prices['serviceCharge'];
                                    var main_price=menu_prices['price'];
                                    menu_sale_price_text='$'+menu_sale_price+'<span style="font-size: 8px;color: #2c2c2c;">/EA</span>';
                                 }

                                    var text='';
                                   // alert(info4);
                                   var costum_class ="";
                                   var offer_div="";
                                   var offer_div_included="offer_div_not";

                                   var special_id=res_item_cat1['special_id'];

                                    var special_text='';

                                    if(special_id!="" && special_id!=null && special_id>0)
                                    {
                                        var top_px="";

                                    var special_amount=res_item_cat1['special_amount'];
                                    special_amount =Math.round(special_amount);

                                   
                                     costum_class= 'offerActive';
                                     // offer_div_included= '';

                                     if(info4==1)
                                       {
                                        top_px='style=top:50px';

                                       }
                                        special_text='<span '+top_px+' class="label-product label-new '+costum_class+' " >$'+special_amount+' caskback </span>';


                                    }


                                    var available_stock_text="";

                                    var available_stock=res_item_cat1['available_stock'];

                                    if(available_stock>0){

                                        available_stock_text='<p style="color:red">Stock - '+available_stock+'</p>';
                                    }
                                

                                   if(info4==1)
                                   {
                                    

                                     var discount_price_gst=0;
                                     discount_price_gst=Math.round(discount_price_gst);
                                     var final_price=Number(menu_sale_price_443)+Number(discount_price_gst);
                                     final_price=Math.round(final_price);
                                     
                                
                                     costum_class= 'offerActive';
                                     offer_div_included= '';
                                     text='<span class="label-product label-new '+costum_class+' " >Buy 3 get 1 Free</span>';
                                     offer_div= '<div class="col-md-6 price_443"><h4>OR Buy 4 for </h4> <div class=""><span class="price saleprice44_val_' + res_item_cat1['menuNum'] + '">'+final_price+'</span><span style="font-size: 8px;">/EA</span></div> </div> ';
                                   }
                                  
                                    // GetAmmounts(res_item_cat1['menuNum']);
                                    search_item_string += '<div class="owl2-item active col-md-4 col-sm-6 col-xs-12 p-0" style=""> <div class="item"> <div class="product-item-container item--static" id=""><div class="left-block" > <div class="so-quickview"><a class=" btn-button quickview quickview_handler " href="<?php echo $HTTP_HOST; ?>quickview.php?menu_id=' + res_item_cat1['menuNum'] + '&variety='+variety_id+'" title="Quick view" data-fancybox-type="iframe"><i class="fa fa-search"></i><span>Quick view</span></a></div><div class="logo"><img style="height:40px; padding:2px;" src="https://www.tyre.admin.starr365.com/ecom-admin/assets/images/supplier/' + res_item_cat1['accNum'] + '/' + res_item_cat1['image_manufacturer'] + '"></div> <div class="product-image-container second_img">  <a href="javascript:void(0)" target="_self" title="Volup tatem accu"><img src="' + img_url + '" class="img-1 img-responsive" alt="image1"> <img src="' + img_url + '" class="img-2 img-responsive" alt="image2"> </a> </div> '+text+' '+special_text+' </div>  <div class="right-block" style="text-align:left;min-height: 110px;padding-bottom: 0px;"><div class="button-group cartinfo--static"> <div class="so-quickview"> <a class=" btn-button quickview quickview_handler addToCart" href="<?php echo $HTTP_HOST; ?>quickview.php?menu_id=' + res_item_cat1['menuNum'] + '&variety='+variety_id+'" title="Quick view" data-fancybox-type="iframe"><span>Add to cart</span></a> </div><!--<button type="button" class="addToCart" title="Add to cart" onclick="addToCart()"> <span>Add to cart </span></button> --> </div> <div class="col-md-6 '+offer_div_included+'" style="text-align:center;"><h4><a href="javascript:void(0)" title=" target="_self"></a>' + res_item_cat1["info1"] + '</h4> <div class=""><span class="price saleprice_val_' + res_item_cat1['menuNum'] + '">' + menu_sale_price_text + '</span>'+available_stock_text+'<div class="price"></div></div></div> '+offer_div+'   </div></div> </div></div> ';


                            }
                            search_item_string + '</div></div><div class="owl2-controls"><div class="owl2-nav"><div class="owl2-prev" style=""></div><div class="owl2-next" style=""></div></div><div class="owl2-dots" style="display: none;"></div></div>';

                            $("#Searched_productItem").html(search_item_string);

                            $("#so_categories_51").hide();
                            $("#middle_content_data").hide();
                            $('html, body').animate({
                                scrollTop: $("#Searched_productItem").offset().top
                            }, 1000);

                            $.getScript('js/themejs/homepage.js', function() {
                                // alert("loaded");
                                //$("#content").html('Javascript is loaded successful!');
                            });
                        } else {
                            search_item_string += "<div style='padding:15px; font-size:18px; min-height:230px;'> Sorry no product found in this category </div>";
                               $("#Searched_productItem").html(search_item_string);

                            $("#so_categories_51").hide();
                            $("#middle_content_data").hide();
                            $('html, body').animate({
                                scrollTop: $("#Searched_productItem").offset().top
                            }, 1000);

                            $.getScript('js/themejs/homepage.js', function() {
                                // alert("loaded");
                                //$("#content").html('Javascript is loaded successful!');
                            });

                        }

                    }
                    else
                    {
                        // alert(onlinePriority);
                        if(onlinePriority == 1)
                        {
                            $(".button_priority").addClass("btn_disabled");
                            TyresPriority_data(0);
                        }
                       search_item_string="<div style='text-align: center;margin-top: 100px;'>No Data Found</div>"; 
                       $("#Searched_productItem").html(search_item_string);
                       $('html, body').animate({
                                scrollTop: $("#Searched_productItem").offset().top
                            }, 1000);
                    }
                }

                });
             }

            }

           function TyresPriority_data(val)
           {
            $('#onlinePriority').val(val);
            if(val==0)
            {
                $("#priority_title").text(' All Tyres')
             
                 $(".button_priority2").addClass('active_priority');
                  $(".button_priority").removeClass('active_priority');
            }
            else
            {
                $("#priority_title").text('Best Seller')
                $(".button_priority").addClass('active_priority');
                $(".button_priority2").removeClass('active_priority');

            }
            Getsp123_data();

           }

            function GetAmmounts(menuNum) {
                // alert(menuNum);
                $.ajax({
                    type: 'POST',
                    url: '<?php echo $HTTP_HOST; ?>ajax_autopart.php?action=GetAmmounts&menuNum=' + menuNum,
                    data: {},
                    success: function(response) {
                        // console.log(response);
                        var data = $.parseJSON(response);

                        var sale_price = data['sale_price'];
                        var after_discount = data['after_discount'];
                        var price = data['price'];
                        var SELLPRICE443 = data['SELLPRICE443'];

                        // $(".price_val_" + menuNum + "").text(price);
                        $(".saleprice_val_" + menuNum + "").text('$'+sale_price);
                        $(".saleprice44_val_"+ menuNum+ "").text('$'+SELLPRICE443);
                        // $(".after_discount_val_" + menuNum + "").text(after_discount);
                        // alert(price);

                    }
                })


            }

            //GetTyresPerformsItem();
            function GetTyresPerformsItem()
            {

                sp1=$("#search_car").val();
                sp2= $("#search_category").val();
                sp3=$("#search_model").val();
                
                $.ajax({
                    type: 'POST',
                    url: '<?php echo $HTTP_HOST; ?>ajax_autopart.php?action=GetTyresPerformsItem',
                    data: {
                        sp1: sp1,
                        sp2: sp2,
                        sp3: sp3
                    },
                    success: function(response) {
                      
                        // console.log(response.length);
                    var data = $.parseJSON(response);
                   
               if(data.length>0){


                    var category_data="";

                        var p=0;

                       var first_old=0;
                       var second_old=0;

                       var  k=0
                        for(var i=0;i<data.length;i++)
                        {
                            if(k==0)
                            {

                            }
                            k++;
                            if(data[i]['down1_categoryNum']!=first_old)
                            {
                                if(p!=0)
                                {
                                    category_data+='</div>';
                                }
                                category_data+='<div><span><b>'+data[i]['down1_categoryName']+'</b></span>';


                            }
                            if(data[i]['down2_categoryNum']!=second_old)
                            {
                                category_data+='<div> <input type="checkbox" name="Subcategory_'+data[i]['down2_categoryNum']+'" class="subCat_check" id="Subcategory_'+data[i]['down2_categoryNum']+'" value="'+data[i]['down2_categoryNum']+'" onchange="Getsp123_data()"  ><label style="margin-left:4px;">'+data[i]['down2_categoryName']+'</label></div>';

                            }


                            first_old=data[i]['down1_categoryNum'];
                            second_old=data[i]['down2_categoryNum'];
                        }

                        
                        
                       $("#Tyre_Performance").show();
                       $("#performance_btn").show();
                        $("#ecomItems_categories").html(category_data);

                  }
                  else
                  {
                      $("#performance_btn").hide();
                       $("#performance_btn").hide();

                  }
                }
                })

            }

            function GetSubcat_items(Cat_id)
            {
                   $.ajax({
                    type: 'POST',
                    url: '<?php echo $HTTP_HOST; ?>ajax_autopart.php?action=GetSubcat_items&Cat_id=' + Cat_id,
                    data: {},
                    success: function(response) {


                    }
                })

            }

        </script>
      


        <?php 
        $selected = '';
        if(isset($_GET['car_id']))
        {

            ?>
            <script>
                $(document).ready(function() {
                    get_categories();
                });
            </script>
            <?php
        }
    ?>
                <script type="text/javascript">
                    $(window).scroll(function() {
                        var sticky = $('.sas_inner-box-search'),
                            scroll = $(window).scrollTop();

                        if (scroll >= 450) sticky.addClass('fixed');
                        else sticky.removeClass('fixed');
                    });
                </script>
                <script type="text/javascript">
                    $(window).scroll(function() {
                        var dnone = $('.heading-title'),
                            scroll = $(window).scrollTop();

                        if (scroll >= 450) dnone.addClass('d-none');
                        else dnone.removeClass('d-none');
                    });
                </script>
                </body>

                </html>