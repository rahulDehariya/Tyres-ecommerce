<?php


include_once"header.php";
include_once"helperfile.php";
 $res=Checklogin();



 if($res==1)
  {
    
      header("Location: homepage.php");
  }
  else if($res==0)
  {
    // header("Location: index.php");
     echo "<script>window.location.href='".$HTTP_HOST."index.php';</script>";
   
  } 

  $accNum= accNum;

 // require_once "config/config.php";

$HTTP_HOST='https://tyre.staffstarr.com/';
$menu_id=$_GET['menu_id'];
$variety_id=$_GET['variety'];


$view_cart_json=file_get_contents($HTTP_HOST."ajax_autopart.php?action=getMenudetails&menuNum=".$menu_id."&variety_id=".$variety_id);
// echo($view_cart_json['menu']['menuName']);die;
$view_cart=json_decode($view_cart_json,true);

// print_r($view_cart);
if(isset($_GET['test'])){

	print_r($view_cart);die;
}
$sp1 = 0;
$sp2 = 0;
$sp3 = 0;


// $view_amount_json=file_get_contents($HTTP_HOST."ajax_autopart.php?action=GetAmmounts&menuNum=".$menu_id);

// $amount=json_decode($view_amount_json,true);
$amount=$view_cart['varieties'][0]['prices'];

$ammount_main_price=$view_cart['varieties'][0]['price_main'];



$sp1=$view_cart['varieties'][0]['sp_data']['sp1'];
$sp2=$view_cart['varieties'][0]['sp_data']['sp2'];
$sp3=$view_cart['varieties'][0]['sp_data']['sp3'];




$name=$view_cart['menu'][0]['menuName'];


$ammount_sale_price="";
$offr_sale_price="";
$ammount_sale_price_text="";
$service_fee="";
$serviceCharge="";
$after_discount="";
$fourthtyre_feeting="";
$Gst="";
$retail_price=$amount['sale_price'];


if($ammount_main_price>0){
  	$ammount_sale_price= round($ammount_main_price['sale_price_main']);
  	$unit_main_price= $ammount_main_price['price'];
	 $service_fee=$ammount_main_price['service_fee'];
	 $fourthtyre_feeting=$ammount_main_price['fourthtyre_feeting'];

	$offr_sale_price=$ammount_main_price['SELLPRICE443_main'];
	$ammount_sale_price_text='$'.$ammount_sale_price;

	if(number_format($retail_price)>number_format($ammount_sale_price))
	{
		$ammount_sale_price_text='<strike>$'.$retail_price.'<span style="font-size: 8px;color: #2c2c2c;">/EA</span></strike>   <span style="color:red">$'.$ammount_sale_price.'<span style="font-size: 8px;color: ">/EA</span>';

	}

	}else
	{
	 $ammount_sale_price= round($amount['sale_price']); 
	 $offr_sale_price=$amount['SELLPRICE443'];
	 $service_fee=$amount['service_fee'];
	 $unit_main_price=$amount['price'];
	 $serviceCharge=$amount['serviceCharge'];
	 $after_discount=$amount['after_discount'];
	 $fourthtyre_feeting=$amount['fourthtyre_feeting'];
	 $Gst=$amount['Gst'];
	 $ammount_sale_price_text='$'.$ammount_sale_price.'<span style="font-size: 8px;color: #2c2c2c;">/EA</span>';

	}	

	// print_r($amount);die;




// print_r($ammount_main_price);
?>


<!DOCTYPE html>
 <html lang="en">
<head>
    
    <!-- Basic page needs
    ============================================ -->
    <title>Autoparts - Multipurpose Responsive HTML5 Template</title>
    <meta charset="utf-8">
    <meta name="keywords" content="html5 template, best html5 template, best html template, html5 basic template, multipurpose html5 template, multipurpose html template, creative html templates, creative html5 templates" />
    <meta name="description" content="SuperMarket is a powerful Multi-purpose HTML5 Template with clean and user friendly design. It is definite a great starter for any eCommerce web project." />
    <meta name="author" content="Magentech">
    <meta name="robots" content="index, follow" />
   
    <!-- Mobile specific metas
    ============================================ -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <link rel="stylesheet" href="https://wfolly.firebaseapp.com/node_modules/sweetalert/dist/sweetalert.css">
  <script src="https://wfolly.firebaseapp.com/node_modules/sweetalert/dist/sweetalert.min.js"></script>
    
    <!-- Favicon
    ============================================ -->
    <link rel="shortcut icon" type="image/png" href="ico/favicon-16x16.png"/>
  
   
    <!-- Libs CSS
    ============================================ -->
    <link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
    <link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="js/datetimepicker/bootstrap-datetimepicker.min.css" rel="stylesheet">
    <link href="js/owl-carousel/owl.carousel.css" rel="stylesheet">
    <link href="css/themecss/lib.css" rel="stylesheet">
    <link href="js/jquery-ui/jquery-ui.min.css" rel="stylesheet">
    <link href="js/minicolors/miniColors.css" rel="stylesheet">
    
    <link href="js/pe-icon-7-stroke/css/pe-icon-7-stroke.css" rel="stylesheet">
    <link href="pe-icon-7-stroke/css/helper.css" rel="stylesheet">

    <!-- Theme CSS
    ============================================ -->
    <link href="css/themecss/so_searchpro.css" rel="stylesheet">
    <link href="css/themecss/so_megamenu.css" rel="stylesheet">
    <link href="css/themecss/so_advanced_search.css" rel="stylesheet">
    <link href="css/themecss/so-listing-tabs.css" rel="stylesheet">
    <link href="css/themecss/so-categories.css" rel="stylesheet">
    <link href="css/themecss/so-newletter-popup.css" rel="stylesheet">
    <link href="css/themecss/so-latest-blog.css" rel="stylesheet">

    <link href="css/footer/footer1.css" rel="stylesheet">
    <link href="css/header/header1.css" rel="stylesheet">
    <link id="color_scheme" href="css/theme.css" rel="stylesheet"> 
    <link href="css/responsive.css" rel="stylesheet">

     <!-- Google web fonts
    ============================================ -->
    <link href='https://fonts.googleapis.com/css?family=Rubik:300,400,400i,500,600,700' rel='stylesheet' type='text/css'>     
    <style type="text/css">

    .label-new:before {
    border-left: 11px solid transparent;
}
.label-new {
    background-color: transparent;
    }
         body{font-family:'Rubik', sans-serif;}

         .outofstock:before{
    		color: #f00000;
         }
         .outofstock{
    		color: #f00000;
         }
          .left-content-product .content-product-right .box-info-product .cart {
            float: right;
            margin-right: 0px;
            }


    .unitPrices {
    color: #201314;;
    font-size: 15px;
    font-weight: 500;
}
.main-container {
    padding-top: 25px;
}
.tyres_name
{
	 background-color: #2e3139 !important;
    text-align: center;
    padding: 30px;
    color: #fff !important;
}

.specf
{
	text-align: right;
}



    </style>
<style type="text/css">
	.price{
		padding: 15px 0;
    margin: 0;
	}
	.price .unitPrices{
	background: transparent;
   /* padding: 5px 10px;*/
    border-radius: 5px;
    color: #878787;
    font-size: 16px;
    display: block;
    width: fit-content;
    font-weight: 400;
	}

	.payable-price{
		 font-size: 19px !important;
		 color: #333 !important;
		font-weight: 500 !important;
	}
	.left-content-product .content-product-right .product-label .price{
		width: 100%;
		display: inline-block;
	}
	.price .price-new {
    color: #ff2d37;
    font-size: 24px;
    background: transparent;
    font-weight: 500;
    padding: 5px 10px;
    border-radius: 5px;
	}
	.overlay-desc{
		position: absolute;
	    bottom: 0;
	    width: 100%;
	    padding: 10px 20px;
	    background: rgba(255, 255, 255, 0.8);
    	color: #000000;
	    overflow-y: scroll;
	    max-height: -webkit-fill-available;
	}
	
	/*.overlay-desc:hover{
		background: transparent;
	}*/
	.zoomWindowContainer{
		display: none;
	}
	@media (max-width: 991.98px) {
		.quickview-w.product-view .content-product-right{
			width: 100%;
		}
	}

	   .price_443{
            text-align: center;
            color: red ;
            border: 1px solid red;
            border-radius: 5px;
            padding: 5px;
            float: right;

        }

        .price_443 .price{
            color: red ;
        }
        .price_443 h4{
            font-size: 12px;
            padding-bottom: 5px;
            border-bottom: 1px solid #d3d3d3;
        }
        .price .unitPrices {

		width:100%;
		}

		.sweet-alert button{
			color: #1d1f22  !important;
		background-color: transparent !important;
		background-image: none !important;
		border-color: #482181  !important;
		box-shadow: rgba(18, 8, 19, 0.77) 0px 0px 2px, rgba(0, 0, 0, 0.05) 0px 0px 0px 1px inset !important;
		font-size: 15px !important;
		font-weight: 501 !important;
		padding: 8px 32px !important;
		    border-radius: 12px !important;
       }
		.sweet-alert h2{
			font-weight: 501 !important;
		}


</style>
</head>

 <body class="res layout-subpage">
     <div id="wrapper" class="wrapper-full ">
     	<div class="tyres_name"  ><h1 style="letter-spacing: 5px;margin: 0;font-size:30px; "><?php echo $name;  ?> Tyre <?php echo $sp1;  ?> / <?php echo $sp2;  ?>R<?php echo $sp3;  ?> </h1>

     	</div>
	<!-- Main Container  -->
	 <div class="main-container container">
		
		 <div class="row">
			 <!--Middle Part Start-->
			 <div id="content" class="col-md-12 col-sm-12">
				
				<div class="product-view row quickview-w">
					<div class="left-content-product">
						<form id="menuAddToCart" action="" method="POST">
							<?php  
						     foreach ($view_cart['menu'] as  $Item_desc) {
							// print_r($Item_desc);
						     	$four_43_apply= "";

						     	if($Item_desc['info4']>0)
								{
						 			$four_43_apply='<span class="label-product label-new offerActive " ><img src= "image/buy4get1.png" style="width:320px;"></span>';
								}

												

						?>
				
						<div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">

							<!-- <div class="title-product">
								<h1><?php echo $Item_desc['menuName']  ?></h1>

							</div> -->
								<!--- image Div -->
							<div class="" style="position: relative; width: 100%; height: auto;">
								<img style="width: 100px;" src="https://www.tyre.admin.starr365.com/ecom-admin/assets/images/supplier/<?php echo $Item_desc['accNum']; ?>/<?php echo $Item_desc['image_manufacturer'] ?>">
								<img itemprop="image" class="" src="<?php echo $Item_desc['image'] ; ?>" >

								<?php echo $four_43_apply; ?>
								<div class="product-box-desc overlay-desc show_less">
									<div class="inner-box-desc">
										<!-- <div class="price-tax"><span>Part No:</span> <?php //echo ($Item_desc['Calories'] != null ? $Item_desc['Calories'] : "NA");?> </div> -->
										<div class="reward"><!-- <h2>Description:</h2> --> <?php 

										// $sub_desc = substr ($Item_desc['description'], 0, 100);
										// echo $sub_desc;   ?> <!-- ... -->

										<?php echo $Item_desc['description'];   ?>
										 <!-- <a href="javascript:void(0)" onclick="show_more_description(1)">Read more</a> -->
										</div>
									</div>
									
								</div>
								<div class="product-box-desc overlay-desc show_more" style="display: none">
									
									<div class="inner-box-desc">
										<div class="price-tax"><span>Part No:</span> <?php echo ($Item_desc['Calories'] != null ? $Item_desc['Calories'] : "NA");?> </div>
										<div class="reward"><h2>Description:</h2> <?php 

										echo $Item_desc['description'];   ?>
										<a href="javascript:void(0)" onclick="show_more_description(0)">Read less</a>
										</div>
									</div>
								</div>
							</div>
							<!--- image Div end -->
							<!-- Review ---->
							<div style="margin-top: 20px; display: none;" class="product-box-desc">
								<div class="inner-box-desc">
									<div class="price-tax"><span>Part No:</span> <?php echo ($Item_desc['Calories'] != null ? $Item_desc['Calories'] : "NA");?> </div>
									<div class="reward"><h2>Description:</h2> <?php echo $Item_desc['description'];   ?></div>
									
								</div>
								
							</div>
							

						
							<!-- <a class="thumb-video pull-left" href="https://www.youtube.com/watch?v=HhabgvIIXik"><i class="fa fa-youtube-play"></i></a> -->
							
						
							
						</div>

					
						<div style="" class="content-product-right col-lg-7 col-md-6 col-sm-12 col-xs-12">
						
							<!-- Review ---->
							

									<?php

									break;
								}
									?>
							

							<div class="product-label form-group" style="min-height: 150px;">
								<div class="product_page_price price" itemprop="offerDetails" itemscope="" itemtype="https://data-vocabulary.org/Offer">
								<?php 
								 if($Item_desc['info4']>0){
								 	?>
						 			<!--  <div class="col-md-6 price_443"><h4>OR Buy 4 for </h4> <div class=""><span class=""><?php echo $amount['SELLPRICE443']; ?></span><span style="font-size: 8px;">/EA</span></div> <button style="display: none" id="offer_btn" type="button" onclick="Applied_offer(1)" class="btn btn-default">Apply</button>
						             </div> -->
								 	 <?php
									  }
								 ?>
								<div class=" unitPrices main-price row">
									<div class="col-md-5 col-sm-6 col-xs-6">
									<span class=""  itemprop="price" title="Price"> Per Item : </span>  
										
									</div>
									<div class="col-md-4 col-sm-6 col-xs-6">
										<span><?php
										echo $ammount_sale_price_text;
										 ?></span>
									</div>
								</div>
									<?php 
								 		if($Item_desc['info4']>0){
								 			?>
											<div id="offerPrice_div" style="display: none" class="unitPrices main-price ">
												
											</div>
										<?php } ?>
										<div  class="unitPrices  payable-price row" style="display: block ruby;">
											<div class="col-md-5 col-sm-6 col-xs-6">
											<span  itemprop="price" title="Price"> Total Amount : </span>
												
											</div>
											<div class="col-md-4 col-sm-6 col-xs-6">
												<span id="mprice">$<?php 
											echo $ammount_sale_price;
												 ?></span>
												
											</div>
										
										</div>

									
									
									
									
								<?php
/*
									$m = 0 ;
									$unit_price_onload = 0 ;
									$total_price_onload = 0;
										
											// print_r($varity);

											$checked_variety = "";

											if($m == 0)
											{
												$checked_variety ="checked";
												$unit_price_onload = $varity['retail'];
												$total_price_onload = $varity['retail'];

											}
											$m++;

												?>-->
									<span class="price-new" id="mprice" itemprop="price" title="Price"><span>Price : </span>$<?php echo $varity['price']; ?></span>
								  <span class="price-old">$122.00</span>
								</div>
								<div class="stock"><span>Availability:</span> 

									<?php
									$msg="";
									$stock_availability=$varity['stock_available'];
									$stock_class = "status-stock";

									$is_stock = 0 ;
									if($stock_availability>5){
										$msg='Available';
										$stock_class = "status-stock";

										$is_stock = 1;
									}
									elseif ($stock_availability<5 && $stock_availability>0) {
										$msg='Limited';
										$stock_class = "status-stock";
										$is_stock = 1;
									}
									else{
										$msg='Out OF Stock';
										$stock_class = "outofstock";
										$is_stock = 0;
									}*/

									?>
									

								</div> 

								<p id="cal_ammount" ondblclick="change_color();" style="font-size: 18px;color: #fafbfb30"> tyre markup : <?php echo $service_fee; ?> 
											 Unit Price : <?php echo $unit_main_price; ?> &nbsp;
											  Fitting  cost : <?php echo $serviceCharge; ?> 
											 Sell Price 443 : <?php echo $offr_sale_price; ?> 
											Model level discount : <?php echo $after_discount; ?>
											Fourth tyre fitting : <?php echo $fourthtyre_feeting; ?>
											GST : <?php echo $Gst; ?>

											
											 </p>

							</div>	
							<?php

								foreach ($view_cart['varieties'] as $varity) {
									
								
							?>
								<input type="hidden" value='<?php echo $is_stock;?>' name="" id="in_stock_<?php echo $varity['varietyNum']?>" ><label style="font-size:14px;"><input checked style="display:none;" type="radio" class="" name="variety" data-price='<?php echo str_replace(",", "", $ammount_sale_price); ?>' id='<?php echo $varity['varietyNum'];?>' value="<?php echo $varity['varietyNum'];?>" onclick="getMenuVarietyPrice(this)"></label>

									<?php
										 }

										?>
									

				                 <div class="form-group d-flex menu-item-cart " id="menu_add_extra" style="display: none;">

				                   <div class="form-group">

				                           <p class="add_extra">Add Extra</p>
				                           <?php
				                          
				                           ?>

				                  </div>

				                 </div>
								
								<div style="display:none; " class="box-checkbox form-group required">
									<textarea name="note" rows="3" style="font-size: 14px;resize: none;border: 1px solid #e2dddd;padding: 20px;" class="form-control" placeholder="Add Note"></textarea>
									
								</div>
								<?php 
									if($view_cart['varieties'][0]['available_stock']>0)
									{

										?>
										<div>
											<span style="color: red">Stock - <?php echo $view_cart['varieties'][0]['available_stock']; ?></span>
										</div>


										<?php
									} 
									?>

								<div class="form-group box-info-product">
									<div class="option quantity">
										<div class="input-group quantity-control" unselectable="on" style="-webkit-user-select: none;">
											  <label style="font-size: 14px; line-height: 30px; margin: 0;">Qty</label>

				                         <p style="display: inline-block;float: right; margin: 0; font-size: 18px;margin-right: 30px;border: 1px solid #ddd;border-right: none; line-height: 30px;">

				                           <button type="button" class="sub btn rounded bg-danger btn-sm text-white" onclick="sub_quantity(0)"><strong style="font-size: 14px;">  &nbsp;-  </strong></button>

				                           <input type="text" value="1" min="1" max="20" name="qty" id="qty" style="font-size: 18px; width: 40px;text-align: center;border: none; line-height: 32px; height: 32px;" readonly="">

				                           <button type="button" class="add btn rounded bg-primary btn-sm text-white" onclick="add_quantity(0)"><strong style="font-size: 14px;">+</strong></button>

				                         </p>
										</div>
									</div>
									<div class="cart">
										<input type="hidden" name="apply444"id="apply444" value="0">
										    <input type="hidden" name="unit_gst" id="unit_gst" value="0">
										    <input type="hidden" name="special_id" id="special_id" value="<?php echo $view_cart['varieties'][0]['special_id']; ?>">
						                   <input type="hidden" name="percentage" id="percentage" value="0">
						                   <input type="hidden" name="unit_price" id="unit_price" value="<?php echo $ammount_sale_price; ?>">
						                   <input type="hidden" name="info4" id="info4" value="<?php echo $view_cart['menu'][0]['info4']; ?>">

						                   <input type="hidden" name="activeTable" id="activeTable" value="0">
						                   <input type="hidden" name="discount_price" id="discount_price" value="0">
						                   <input type="hidden" name="serviceCharge" id="serviceCharge" value="0">

						                   <input type="hidden" name="activeDepartment" id="activeDepartment" value="0">
						                   <input type="hidden" name="jobNumber" id="jobNumber" value="0">

						                   <input type="hidden" name="menuNum" id="menuNum" value="<?php echo $menu_id; ?>">
						                   <input type="hidden" name="menu_ID" id="menu_ID" value="<?php echo $menu_id;?>">

						                   <input type="hidden" name="totalPrice" id="totalPrice" value="<?php echo $ammount_sale_price; ?>">
						                   <input type="hidden" name="totalPrice_discount" id="totalPrice_discount" value="<?php echo $amount['sale_price']; ?>">
						                   <input type="hidden" name="invoice_id" id="invoice_id" value="<?php //echo $invocie_id; ?>">
						                 <a onclick="parent.get_cart_items();" href="#" >
										<input type="button" data-toggle="tooltip" title="" value="Add to Cart" data-loading-text="Loading..." id="button-cart" class="btn btn-mega btn-lg" onclick="addToCart()" data-original-title="Add to Cart"></a>
										
									</div>
									

								</div>
								<div>
									<h2>Specification</h2>
									 <table class="table">
			                        <tbody>
			                           <tr>
			                              <td>Width</td>
			                              <td class="specf" id="width_val"></td>
			                           </tr>
			                           <tr>
			                              <td>Ratio</td>
			                              <td class="specf" id="ratio_val"></td>
			                           </tr>
			                           <tr>
			                              <td>Rim</td>
			                              <td class="specf" id="rim_val"></td>
			                           </tr>
			                           <tr>
			                              <td>Load</td>
			                              <td class="specf" id="load_val"></td>
			                           </tr>
			                           <tr>
			                              <td>Rating</td>
			                              <td class="specf" id="rating_val"></td>
			                           </tr>
			                           <tr>
			                              <td>Fitment</td>
			                              <td class="specf" id="fitment_val"></td>
			                           </tr>
			                        </tbody>
			                     </table>
								</div>

							</div>
						
							<!-- end box info product -->
						</form>
						</div>
				
					</div>
				</div>
				
				 <script type="text/javascript">

				 	function show_more_description(more)
				 	{
				 		if(more==1){
				 			$(".show_less").hide();
				 			$(".show_more").show();
				 		}else{
				 			$(".show_more").hide();
				 			$(".show_less").show();
				 		}
				 		
				 	}

				 	function get_open_invoice_id(){
					 	$.ajax({
		                    type: 'POST',
		                   	url: 'ajax_autopart.php?action=getOpenInvoiceId',
		                   	data: {},
		                   	success: function (response) {
		                      // alert(response);
		                      $("#invoice_id").val(response);
		                  	}
	                  	});
					}

					function calPrice(){ $countValue = 3; $individualPrice = 85.20; $buy4specialDiscount = 4(85.20 - 71.40); if(countValue < 4){ price = $individualPrice * $countValue; // invoice item } else { price = $individualPrice * $countValue; // invoice item discount = $buy4specialDiscount; // invoice item salePrice = price - discount;
					 } 
				}


		     function Applied_offer(val)
		     {
		     	var qty=$("#qty").val();

		     	if(qty==4){
		     	
		     	var prc =Number(<?php echo $ammount_sale_price; ?>);

		     	var offr_prc=Number(<?php echo $offr_sale_price; ?>);
		     	var serviceCharge=Number(<?php echo $amount['serviceCharge']; ?>);
		     	var fourthtyre_feeting=Number(<?php echo $amount['fourthtyre_feeting']; ?>);

		     	// var gst=(Number(offr_prc)*10/100)*qty;

		     	var final_price=offr_prc*4;
		     	final_price=Math.round(final_price);
		     	var subtotal=prc*4;

		     	// var alltotal=Number(final_price)+Number(gst);
		     	var alltotal=Number(final_price);

		     	//var discountapplied=Number(subtotal)-Number(alltotal);
		     	var discountapplied=Number(prc);
		     	discountapplied=discountapplied.toFixed();
		     	fourthtyre_feeting=Number(fourthtyre_feeting).toFixed();
		     	alltotal=Number(subtotal)-Number(discountapplied)+Number(fourthtyre_feeting);
		     	alltotal=Math.round(alltotal);


		     	$("#qty").val(4);


		     	 $('#mprice').html("$"+alltotal);
		     	 $('#totalPrice').val(subtotal);
		     	 $('#totalPrice_discount').val(alltotal);
		     	$("#apply444").val(val);

		     	$("#discount_price").val(discountapplied);
		     	$("#serviceCharge").val(fourthtyre_feeting);

		     	$('#offerPrice_div').html('<div class="row unitPrices main-price"><div id="subtotal_div"><div class="col-md-5 col-sm-6 col-xs-6"><span>Sub Total : </span></div><div class="col-md-4 col-sm-6 col-xs-6">$'+subtotal+'</span></div></div></div><div class="row unitPrices main-price"><div class="col-md-5 col-sm-6 col-xs-6" style="color:red"><span >Discount Applied : </span></div><div class="col-md-4 col-sm-6 col-xs-6" style="color:red"><span>-$'+discountapplied+'</span></div></div><div class="row unitPrices main-price"><div class="col-md-5 col-sm-6 col-xs-6" style=""><span >Free Tyre Fitting : </span></div><div class="col-md-4 col-sm-6 col-xs-6" style=""><span>$'+fourthtyre_feeting+'</span></div></div>');
		     	$("#offerPrice_div").show();

		     }
		     }



					 function add_quantity(val) {
					 	$("#apply444").val(val);


			         if ($("#qty").val() < 5) {

			         	var info4=$("#info4").val();



			             var total = 0;

			             var opt_price = $('.add_extra_menu').find(":selected");
			             // alert(opt_price);

			             for (i = 0; i < opt_price.length; i++) {

			                 total= Number(total)+Number(opt_price[i].getAttributeNode("data-iotprice").value);

			             }

			            var qty = +$("#qty").val() +1;

			            	$("#qty").val(qty);
				         	  

				             if(info4>0 && qty >=4)
			             	 {
			             		Applied_offer(1);
			             		$("#offerPrice_div").show();
			             		if(qty>4){

			             		 var prc = $('input[name=variety]:checked').data('price');
			             		 var totalPrice= $('#totalPrice_discount').val();

			             		 var totalplus=Number(totalPrice)+Number(prc);

			             		 totalplus=Math.round(totalplus);

			             			// alert(totalplus);
			             		 $('#mprice').html("$"+totalplus);
			             		var subtotalorg=Number(prc)*Number(qty);
			             		subtotalorg=Math.round(subtotalorg);

			             		var subtotal_text='<div class="col-md-5 col-sm-6 col-xs-6"><span>Sub Total : </span></div><div class="col-md-4 col-sm-6 col-xs-6">$'+subtotalorg+'</span></div></div>';

			             		 $("#subtotal_div").html(subtotal_text);

				                $('#totalPrice').val(subtotalorg);
				                $("#apply444").val(1);

				            }

			             	}
			             	else
			             	{
			             		$("#offerPrice_div").hide();
			             		var prc = Number($('input[name=variety]:checked').data('price'));

				             	var multiplied_prc = (Number(prc * qty) + Number(total * qty));
				             	// var multiplied_prc=Number(prc)*Number(qty);

				              	multiplied_prc =Math.round(multiplied_prc);

			             		

				             	$('#mprice').html("$"+multiplied_prc);

				             	$('#totalPrice').val(multiplied_prc);
			             	}


				             $('.mquan').html(qty);
				         
			         }
			         

			     }

			     function sub_quantity(val) {

			     	$("#apply444").val(val);

			     	var info4=$("#info4").val();

			         if ($("#qty").val() > 1) {

			            var total = 0;

			             var opt_price = $('.add_extra_menu').find(":selected");
			             // alert(opt_price);

			             for (i = 0; i < opt_price.length; i++) {

			                 total = Number(total)+Number(opt_price[i].getAttributeNode("data-iotprice").value);

			             }

			            var qty = +$("#qty").val() -1;

			             $("#qty").val(qty);

			             var prc = $('input[name=variety]:checked').data('price');
			             // alert(prc);

			             var multiplied_prc = (parseFloat(prc * qty) + parseFloat(total * qty));
			               multiplied_prc =multiplied_prc.toFixed();

			               // alert("computed price "+multiplied_prc);

			             $('#mprice').html("$"+multiplied_prc);

			             $('#totalPrice').val(multiplied_prc);
			              
			              if(info4>0 && qty >=4)
			             	{
			             		Applied_offer(1);
			             		$("#offerPrice_div").show();

			             	}
			             	else
			             	{
			             		$("#offerPrice_div").hide();
			             	}

			             $('.mquan').html(qty);

			         }

                    }


     

				     function responseErr(msg) {

				         $("#response_msg").removeClass('alert-success').addClass('alert-danger').fadeIn();

				         $("#response_msg .res_msg").html(msg);

				        $("#response_msg").delay(3000).fadeOut(1000);

				        //$("html, body").animate({ scrollTop: $('#response_msg').offset().top }, 1000);

				     }

	 function addToCart() {
	 	// alert("hi");

       /*  if($('#activeTable').val() != 0){

        if($('#activeDepartment').val() != 0){*/

         if ($("input[name='variety']").is(':checked')) {


       var err= 0;
         if(IS_EXTRA_COMPULSORY){

           var opt_price = $('.add_extra_menu').find(":selected");

           // alert(opt_price.length);

           var total = 0;

            var id = 0;

           for (i = 0; i < opt_price.length; i++) {

               total += Number(opt_price[i].getAttributeNode("data-iotprice").value);

               if(Number(opt_price[i].getAttributeNode("data-iot").value) != 0)

                {

                  id = Number(opt_price[i].getAttributeNode("data-iot").value);

                }

           }

           if(id ==0)

           {

                 $('.add_extra_menu').focus();

                 responseErr("Please select one Extra");

                  err = 1;

            }

          }
         //alert(err);

         if(err == 0){

            var qty = $('input[name=qty]').val();
            // alert(qty);

            //var activeTable = $('#activeTable').val();

            if ((qty > 0) && (qty <= 20)) {
            	// alert('ajax_autopart.php?action=addToCart');

                $.ajax({

                    type: 'POST',

                   url: 'ajax_autopart.php?action=addToCart',

                   data: $('#menuAddToCart').serializeArray(),

                   success: function (response) {
                      // alert(response);

                      var obj=JSON.parse(response);
                        var invoice_id=obj['invoice_id'];
                        var   item_it=obj['item_id'];
                        var   jobNumber=obj['jobNumber'];

                        $("#invoice_id").val(invoice_id);
                        $("#jobNumber").val(jobNumber);

                      

                      // swal("Item added to Cart!", "", "success");
                      
                       swal({
                       title: "Item added to Cart!",
                         
		                 type: "success",
		                 showCancelButton: true,
		                 confirmButton: 'btn btn-outline-primary',
		                 cancelButton: 'btn btn-outline-primary',
				        
				         confirmButtonText: "CHECKOUT",
				         cancelButtonText: "CONTINUE TO SHOPPING",
		                 },
            		 	function(isConfirm) {
						        if (isConfirm) {
						             window.location="view_cart.php";
						        } 
						    });
						
                     


                      $.post("ajax_autopart.php?action=getCartItems_tyres",{},

                      function (data1) {

                        //alert(data1)

                        data = $.parseJSON(data1);

                        var cart_count = data.length;

                        $("#cart_items").text(cart_count);

                      });

                    // alert(response);

                     // console.log(response);

                       if (response != '0') {

                           // modal.style.display = "block";

                           // // var pc = parseInt($('.itemAddedCart').text()) + 1;

                           // // $('.itemAddedCart').text(pc);

                          // alert('Item added to Cart.');

                           //Notify('Item added to Cart.');

                           //window.location.reload();

                       } else {

                           // $("#itmCart").modal('show');

                           // //$(".itemAddedCart").html("0");

                           // //$('#menuModal').modal('hide');

                           // $('#regModal').modal('show');

                          //window.location.replace(site_url+'home.php');

                       }

                   }

               });

           }

         }

       } else {

         $("input[name='variety']").focus();

           responseErr("Please select one Variety");

       }

       /*}else{

        responseErr("Please select Department");

        }

        }else{

        responseErr("Please select Table Number");

        }  */

     }
     $("#apply444").val(0);

      


// getMenuVarietyPrice();
       function getMenuVarietyPrice(el) {
       	// console.log(el.id);
       	 // alert(el.id);

          var total = 0;

          var is_stock = $("#in_stock_"+el.id).val();
           // alert(is_stock);
          if(is_stock == 0) 
          {
            $("#btn_addToCart").hide();
            $("#btn_outOfStock").show();
          }else{
            $("#btn_outOfStock").hide();
            $("#btn_addToCart").show();
          
          var opt_price = $('.add_extra_menu').find(":selected");

          // console.log(opt_price);

          // console.log(opt_price[0].getAttributeNode("data-iotprice").value);

          // console.log(opt_price[1].getAttributeNode("data-iotprice").value);
         for (i = 0; i < opt_price.length; i++) {

             total += Number(opt_price[i].getAttributeNode("data-iotprice").value);

          }

         
          
         price = $("#"+el.id).attr('data-price');


         // alert(el.id);

         // alert("ajax_autopart.php?action=getMenuVarietyPrice&varietyNum="+el.id);
         //$.post("https://order.everlastingengraving.com.au/common/ax.php?mode=getMenuVarietyPrice", {varietyNum: el.id},
         // $.post("ajax_autopart.php?action=getMenuVarietyPrice&varietyNum="+el.id,{},

         //   function (data) {

         //     alert(data);

             //alert(status);

             prc = parseInt(price);
           $("#unit_price").val(prc);


             if (prc > 0) {

                var qty = $('input[name=qty]').val();

                //alert(qty);

                 var multiplied_prc = (parseInt(prc * qty) + parseInt(total * qty));

                 $('.mprice').html(multiplied_prc);

                 $('#totalPrice').val(multiplied_prc);

             }

         // });

        }

      }

     var arr = new Array();

     function getMenuIngredientOptionPrice(el) {
     	// alert(el);

         var iot = $(el).find(':selected').data("iot");

         var ing_id = parseInt($(el).data('ingid'));

         var opt_price = parseInt($(el).find(":selected").data("iotprice"));

         $.post("ajax_autopart.php?action=getMenuIngredientOptionPrice&iot_id="+iot, {},

         function (data) {

           //alert(ing_id);

           data = parseInt(data);

             if (data > 0) {

                 data = parseInt(data);


                 var added = false;

                 var total = 0;

                 $.map(arr, function (elementOfArray, indexInArray) {

                     if (elementOfArray.ing_id == ing_id) {

                         added = true;

                     }

                     for (var i in arr) {

                         if (arr[i].ing_id == ing_id) {

                             arr[i].amt = opt_price;

                             break;

                         }

                     }

                 });

                 if (!added) {

                     arr.push({ing_id: ing_id, iot: iot, amt: data});

                 }



            }

             var total = 0;

             var opt_price = $('.add_extra_menu').find(":selected");

                 for (i = 0; i < opt_price.length; i++) {

                     total += Number(opt_price[i].getAttributeNode("data-iotprice").value);

                 }

                 var prc = $('input[name=variety]:checked').data('price');
                 // alert(prc);

                 var qty = $('input[name=qty]').val();

                 var multiplied_prc = (parseInt(prc * qty) + parseInt(total * qty));

                 $('.mprice').html(multiplied_prc);

                 $('#totalPrice').val(multiplied_prc);

         });

     }
      var IS_EXTRA_COMPULSORY = <?php echo IS_EXTRA_COMPULSORY;?>;
    window.onclick = function(event) {

       var modal = document.getElementById("myModal");

     /*  if (event.target == modal) {

         modal.style.display = "none";

       }*/

     }


      function getSpecification()
	   {
	     var menu_id='<?php echo $menu_id; ?>';
	     var variety_id='<?php echo $variety_id; ?>';
	     // alert(menu_id);
	    
	       $.ajax({
	   
                  type: 'POST',
                  url: 'ajax_autopart.php?action=getSpecification&menu_id='+menu_id+'&variety_id='+variety_id,
                  data: {},
   
                 success: function (response) {
                   // alert(response);
                    obj = $.parseJSON(response);
                  
                    sp_details = obj.sp_details;
                    sp1= sp_details[0]['sp1'];
                    sp2= sp_details[0]['sp2'];
                    sp3= sp_details[0]['sp3'];
                    sp4= sp_details[0]['sp4'];
                    sp5= sp_details[0]['sp5'];
                    sp6= sp_details[0]['sp6'];
                    description=sp_details[1];

                      $("#width_val").html(sp1);
                      $("#ratio_val").html(sp2);
                      $("#rim_val").html(sp3);
                      $("#load_val").html(sp4);
                      $("#rating_val").html(sp5);
                      $("#fitment_val").html(sp6);
                      // $("#menuitem_description").html(description);
                    // alert(sp1);
                 }
		   });
		 }

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

	function change_color()
	{
		$("#cal_ammount").css('color','whitesmoke');
	}

	
				</script>

				
			 </div>
			
			
		 </div>
		 <!--Middle Part End-->
	 </div>
	 <?php include_once "footer.php";  ?>
	 <!-- //Main Container -->
	
 <style type="text/css">
	/*#wrapper{box-shadow:none;}
	#wrapper > *:not(.main-container){display: none;}
	#content{margin:0}
	.container{width:100%;}
	
	.product-info .product-view,.left-content-product,.box-info-product{margin:0;}
	.left-content-product .content-product-right .box-info-product .cart input{padding:12px 16px;}

	.left-content-product .content-product-right .box-info-product .add-to-links{ width: auto;  float: none; margin-top: 0px; clear:none; }
	.add-to-links ul li{margin:0;}*/
	
</style></div>

 <!-- Include Libs & Plugins
	============================================ -->
 <!-- Placed at the end of the document so the pages load faster -->
<!--  <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
 <script type="text/javascript" src="js/bootstrap.min.js"></script>
 <script type="text/javascript" src="js/owl-carousel/owl.carousel.js"></script>
<script type="text/javascript" src="js/slick-slider/slick.js"></script>
 <script type="text/javascript" src="js/themejs/libs.js"></script>
 <script type="text/javascript" src="js/unveil/jquery.unveil.js"></script>
 <script type="text/javascript" src="js/countdown/jquery.countdown.min.js"></script>
 <script type="text/javascript" src="js/dcjqaccordion/jquery.dcjqaccordion.2.8.min.js"></script>
 <script type="text/javascript" src="js/datetimepicker/moment.js"></script>
 <script type="text/javascript" src="js/datetimepicker/bootstrap-datetimepicker.min.js"></script>
 <script type="text/javascript" src="js/jquery-ui/jquery-ui.min.js"></script>
 
<script type="text/javascript" src="js/lightslider/lightslider.js"></script>

<script type="text/javascript" src="js/themejs/homepage.js"></script>
 
 <script type="text/javascript" src="js/themejs/so_megamenu.js"></script>
 <script type="text/javascript" src="js/themejs/addtocart.js"></script>
 <script type="text/javascript" src="js/themejs/application.js"></script> -->

</body>
<script type="text/javascript">
	get_open_invoice_id();
	getSpecification();
	get_cart_items();
</script>

</html>