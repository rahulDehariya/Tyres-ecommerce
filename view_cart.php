<?php
   require_once "header.php";
   // echo $HTTP_HOST;die;
   // print_r($_SESSION);die;
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


//echo($HTTP_HOST."ajax_autopart.php?action=getCategoriesTree");die;

   $data_Cat_json=file_get_contents($HTTP_HOST."ajax_autopart.php?action=getCategoriesTree");
    $data_Cat=json_decode($data_Cat_json,true);
   // print_r($data_Cat); die;
   //$data_Cat = $myCategory->getCategoriesTree(accNum);
   if(isset($_GET['test']))
   {
       echo '<pre>';
       print_r($data_Cat);
       die;
    }

    $guest_id = $_SESSION['guest_id'];
    $is_guest = 1;

     if(isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0)
     {
       $guest_id = $_SESSION['user_id'];
       $is_guest = 0;
     }

     $order_id="";
     if(isset($_GET['order_id']))
     {
      $order_id=$_GET['order_id'];

     }
     // echo ($HTTP_HOST."ajax_autopart.php?action=getCartItemsofuser&user_id=$user_id&guest_id=$guest_id&is_guest=$is_guest");

    $getCartItems_json=file_get_contents($HTTP_HOST."ajax_autopart.php?action=getCartItemsofuser_tyres&user_id=$user_id&guest_id=$guest_id&is_guest=$is_guest&order_id=$order_id");

    $getCartItems=json_decode($getCartItems_json,true);
     // print_r($getCartItems);die;
    //$getCartItems = $myCategory->getCartItems(accNum,$guest_id);

    $address = array();
    $clientName = "";
    $email = "";
    $mobile = "";

    //echo $_SESSION['user_id'];
    if(isset($_SESSION['user_id'])){
        $user_id = $_SESSION['user_id'];

        $getUserDetails_json=file_get_contents($HTTP_HOST."ajax_autopart.php?action=getUserDetails&user_id=".$user_id);
        $getUserDetails=json_decode($getUserDetails_json,true);

        $getUserAddress_json=file_get_contents($HTTP_HOST."ajax_autopart.php?action=getUserAddress&user_id=".$user_id);
        $getUserAddress=json_decode($getUserAddress_json,true);

        //$getUserDetails = $myCategory->getUserDetails(accNum,$user_id);
        //$getUserAddress = $myCategory->getUserAddress($user_id);

        //print_r($getUserDetails);
        $address = $getUserAddress;
        $clientName = $getUserDetails['username'];
        $email = $getUserDetails['email'];
        $mobile=$getUserDetails['mobile'];
    }


    $_SESSION['accNum1'] = accNum;


   ?>


<style type="text/css">

body{
  width: 100%;
  float: left;
  font-family: inherit;
  color: #282828;
}
label{
  font-size: 14px;
  font-family: inherit;

}
    .typeheader-2 .header-bottom {
        border-bottom: none;
    }
    .cart-flex-item{
      text-align: center;
    }
  
     table {
         width:100%;
      }
      
      th {
          font-family: inherit;
          font-weight: 700;
      }
      th, td {
          text-align: left;
          padding: 10px 10px;
      }
      .cart__header {
          background: #ddd;
          border: 1px solid #ddd;
      }
      .border-bottom {
          border-bottom: 1px solid #f2f2f2;
      }
      .cart__image-wrapper {
        display: table-cell;
        width: 150px;
    }
    .total_td{
      border: 1px solid #ddd;
      background: #ddd;
    } 
    .OutOfStock{
      opacity: 0.5;
    }
    .header-bottom {
    padding-top: 15px;
}
.form-control{
	border-color: darkgrey;
      border-radius: 0;
    color: #282828;
}
.tyres_name {
    background-color: #2e3139 !important;
    text-align: center;
    padding: 30px;
    color: #fff !important;
}
table th, .total_td, .btn-link{
	color: #282828;
  font-weight: 300;
}
.form-control:focus{
  border-color: darkgrey;
}
input:focus{
      outline: 0;
}
.cart__header, .cart_bottom{
  background-color: #f5f5f5!important;
}
.total_td{
  background-color: transparent;
}
span.w-100{
  line-height: 40.5px;
}
img.payment-logo {
    height: 30px;
    padding-left: 10px;
}
label {
    margin-top: 10px;
    margin-bottom: 0;
}
</style>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">

 function cart_confirmed()
  {

    var row_counter_items = $("#row_counter_i").val();

    if(row_counter_items > 0)
    {
      for(var p = 0; p < row_counter_items; p++)
      {
        k = p+1;
        is_stock = $("#is_stock_"+k).val();
        //alert(is_stock);
        if(is_stock == 0)
        {
          cart_id = $("#cart_id_"+k).val();

          $.post("ajax_autopart.php?action=removeCartItems&cartId="+cart_id,{},
            function (data) {
            });
        }
      }
    }

 

    var address = $("#address").val();
    var name = $("#clientName").val();
    var email = $("#email").val();
    var mobile = $("#mobile").val();
    var err = 0;

    var cart_items = $("#row_counter").val();
    //alert(cart_items);
    //err = 1;
    if(cart_items <= 0){
      err = 1;
      swal("Warning", "You have empty cart!", "warning");
      return false;

    }

    if($('#select_address').length && $('#select_address').val().length){

      //alert("true");

    }else{
      if(address == '' )
      {
        err = 1;
        $("#address_err").show();
      }else{
         $("#address_err").hide();
      }
    }
  
    if(name == '' )
    {
      err = 1;
      $("#clientName_err").show();
    }else{
       $("#clientName_err").hide();
    }
    if(email == '' )
    {
      err = 1;
      $("#email_err").show();
    }else if ( !validateEmail(email))
    {
      err = 1;
      $("#email_err").hide();
      $("#email_err2").show();
    }else{
      $("#email_err2").hide();
    }
    if(mobile == '' )
    {
      err = 1;
      $("#mobile_err").show();
    }else{
       $("#mobile_err").hide();
    }

    var accNum = <?php echo accNum; ?> ;


    if(err == 0){
      $.ajax({

          type: 'POST',
          url: 'ajax_autopart.php?action=confirmCart',
          data: $('#cart_block').serializeArray(),
          success: function (response) {
             // alert(response);
            

            var payment_type = $("input[name='payment_type']:checked").val();
            // var payment_type = $("payment_type").val();
            // alert(payment_type);

            // var totalPrice=obj_data['total_price'];
            if(payment_type == "CC"){
             // swal("Good job!", "Proceed Payment", "success");

              var obj_data = JSON.parse(response);

              window.location.href = "<?php echo $HTTP_HOST;?>Pay/P/checkout.php?order_id="+obj_data['order_id']+"&invoice_id="+obj_data['invoice_id']+"&total="+obj_data['total_price']+"&email="+obj_data['email']+"&name="+obj_data['name']+"&address="+obj_data['address']+"&paymenttype=card&accNum="+accNum;

              // window.location.href = "<?php echo HTTP_HOST;?>/Pay/P/checkout.php?order_id="+obj_data['order_id']+"&total="+obj_data['total_price']+"&email="+obj_data['email']+"&name="+obj_data['name']+"&address="+obj_data['address']+"&paymenttype=card&accNum="+accNum;

            }else if(payment_type == "POLI"){

                var obj_data = JSON.parse(response);
                window.location.href = "<?php echo $HTTP_HOST;?>polipayment.php?order_id="+obj_data['order_id']+"&amount="+obj_data['total_price'];
            }else if(payment_type == "ZIPPAY"){

                var obj_data = JSON.parse(response);
                window.location.href = "<?php echo $HTTP_HOST;?>zippay.php?order_id="+obj_data['order_id']+"&amount="+obj_data['total_price'];
            }else if(payment_type == "EWAY"){

                var obj_data = JSON.parse(response);
                window.location.href = "<?php echo $HTTP_HOST;?>eway_payment/sharedUrl.php?order_id="+obj_data['order_id']+"&amount="+obj_data['total_price']+"&user_id="+obj_data['user_id'];
            }
            else{

              var obj_data = JSON.parse(response);

              //swal("Good job!", "Order Placed successfully", "success");
              window.location.href = "order_submitted.php?order_id="+obj_data['order_id'];
            }
          }
        });
    }
  }

  function validateEmail($email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    return emailReg.test( $email );
  }
  
  function update_cart_page(product_id,status)
    {
      

      swal({
          title: "Are you sure?",
          text: "You want to remove this item from cart ?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {

            $.post("ajax_autopart.php?action=removeCartItems&cartId="+product_id,{},
            function (data) {

              swal("Deleted!", "Item removed from Cart!", "success");
              //console.log(data);
              window.location.reload();
            });

            
          } else {
            //swal("Your imaginary file is safe!");
          }
        });



    }


    function selected_address()
    {
      var select_address = $("#select_address").val();
      if(select_address != "")
      {
        $("#address").val("");
      }
    }
    function entered_address()
    {
      //alert("inn");
      $("#select_address").val("");
    }
</script>
<div id="wrapper" class="wrapper-full ">
     					<div class="tyres_name"><h1>Cart Items</h1></div>
     				</div><br>
         <div class="header-bottom hidden-compact">
         <div class="container">
         <div class="row">
        
            <div id="content" class="col-md-12 col-sm-12">
                <div class="products-category">
                   <div class="page-width" data-section-id="cart-template" data-section-type="cart-template">

                    
                      <!-- <div class="section-header text-center">
                        <h1>Cart Items</h1>
                      </div> -->
                      <form action="javascript:void(0);" method="post" class="cart" id="cart_block">
                    <table style="border: 1px solid #ddd;" id="cart_list_items" class="form-group">
                          <thead class="cart__row cart__header">
                            <tr>
                                <th class="product-info">SN.</th>
                                <th class="product-info">Product</th>
                              <th class="product-quantity">Quantity</th>
                              <th class="product-price">Price</th>
                              <th class="product-remove">Remove</th>

                              <input type="hidden" id= "row_counter" value="<?php echo count($getCartItems);?>">
                          </tr></thead>
                          <tbody>

                            <?php  $i = $total = 0 ; 

                            if(count($getCartItems)){

                              foreach ($getCartItems as $CartItems) { 
                              	

                                //print_r($CartItems);
                                $cart_details = $CartItems['cart'];
                                $total+=$cart_details['price'];
                                $i++;
                                $invoice_id = $cart_details['invoiceId'];

                                $extraItemPrice_perItem = 0;
                                $extras = $CartItems['extra'];
                                foreach ($extras as $extra) {
                                  $extraItemPrice_perItem+=$extra['price'];
                                }

                                $is_stock = 1;//$cart_details['stock'];
                                $class_on_stock = "";
                                if($is_stock == 0)
                                {
                                  $class_on_stock = "OutOfStock";
                                }

                                $style='style=;';

                              	if($cart_details['price']<number_format(0)){
                              			$style='style=color:red';
                              	}
                                ?>
                                
                              <tr class="cart__row border-bottom line1 cart-flex border-top <?php echo $class_on_stock; ?>">
                                  <input type="hidden" name="cart_id[]" id="<?php echo $cart_details['id']; ?>" value="<?php echo $cart_details['id']; ?>">

                                  <input type="hidden" name="qty[]" id="ContentPlaceHolder1_box_<?php echo $cart_details['id']; ?>" value="<?php echo $cart_details['quantity']; ?>">
                                  <input type="hidden" name="perItemPrice[]" id="product_price_per_item_<?php echo $cart_details['id']; ?>" value="<?php echo $cart_details['perItemPrice']; ?>">
                                  <input type="hidden" name="extraPerItemPrice[]" id="extras_price_per_item_<?php echo $cart_details['id']; ?>" value="<?php echo $extraItemPrice_perItem; ?>">
                                  <input type="hidden" name="is_stock" id="is_stock_<?php echo $i; ?>" value="<?php echo $is_stock; ?>">
                                  <input type="hidden" name="" id="cart_id_<?php echo $i; ?>" value="<?php echo $cart_details['id']; ?>">
                                  
                                  <td <?php echo $style; ?> class="cart__image-wrapper cart-flex-item">
                                    <?php echo $i; ?>
                                  </td>
                                  <td <?php echo $style; ?> class="cart__image-wrapper cart-flex-item">
                                   <?php echo $cart_details['menuName']; ?>                               
                                  </td>
                                  
                                  <td class="cart__update-wrapper cart-flex-item product-quantity">
                                    
                                    <!-- <input type="button" class="buttoncls allbuton quantity_popup" value="-" id="dec" onclick="quantity(<?php echo $cart_details['id']; ?>,0);"> -->
                                    <span name="ctl00$ContentPlaceHolder1$box" id="ContentPlaceHolder1_box22_<?php echo $cart_details['id']; ?>"><?php echo $cart_details['quantity']; ?></span>
                                    <!-- <input name="ctl00$ContentPlaceHolder1$box" onchange="quantity(<?php echo $cart_details['id']; ?>,2);" type="text" id="ContentPlaceHolder1_box22_<?php echo $cart_details['id']; ?>" value="<?php echo $cart_details['quantity']; ?>" class="manual-adjust quantity_popup_manual" style="width: 30px;    padding-left: 7px;" readonly> -->
                                    <!-- <input type="button" class="buttoncls allbuton quantity_popup" value="+" id="inc" onclick="quantity(<?php echo $cart_details['id']; ?>,1);"> -->
                                  </td>
                                  <td <?php echo $style; ?> class="small--hide total-product cart-flex-item">
                                    <div>

                                    	<?php  if($cart_details['price']<0){
                                    		$minus_price=str_replace('-','',$cart_details['price']);
                                    		$discount_price=$minus_price;
                                    	 ?>

                                    		 -$<span class="calculated_price_peritem" id="total_calculated_price_<?php echo $cart_details['id']; ?>"><?php echo number_format($discount_price); ?></span>

                                    	<?php } else { ?>
                                     $<span class="calculated_price_peritem" id="total_calculated_price_<?php echo $cart_details['id']; ?>"><?php echo number_format($cart_details['price']); ?></span>
                                 <?php  } ?>

                                     </div>
                                  </td>

                                  <?php if($cart_details['price']<0  || $cart_details['menuName']=='Free Tyre Fitting'){  ?>
                                     <td class="product_remove cart-flex-item" style="<?php echo ($is_stock == 0 ? "display: none;" : "" ); ?> "></td>

                                     <?php }else{ ?>
                                     <td class="product_remove cart-flex-item" style="<?php echo ($is_stock == 0 ? "display: none;" : "" ); ?> ">
                                      <a href="javascript:void(0);" class="cart__remove" aria-label="Remove this item" onclick="update_cart_page(<?php echo $cart_details['id']; ?>,0);"><!-- Remove -->×</a>
                                  </td>
                                  <?php } ?>
                                  <td class="product_remove cart-flex-item" style="<?php echo ($is_stock == 1 ? "display: none;" : "" ); ?> ">
                                      <span style="color:red;">OUT OF STOCK</span>
                                      
                                  </td>
                                </tr>
                            <?php } } else{ ?>
                              <tr>
                                <td  colspan="5">You don't have anything in your cart</td>
                                
                              </tr>

                           <?php  } ?>
                              <tr class="cart_bottom">

                                <input type="hidden" name="row_counter_i" id="row_counter_i" value="<?php echo $i; ?>">

                                <input type="hidden" name="order_total_price" id="total_calculated_price_hidden" class="total_calculated_price_hidden" value="<?php echo $total; ?>">


                                <td class="total_td text-right" colspan="3">Total</td>
                                <td class="total_td total_calculated_price cart-flex-item" >$<?php echo number_format($total); ?></td>
                                <td class="total_td"></td>
                                
                              </tr>
                            </tbody>
                        </table>

                        <br> 

                        <?php if(count($address) > 0){ ?>
                          
                        <div class="form-group">
                          <div class="col-md-12">
                            
                            <label for="Description" >Select From address:</label> 
                        </div>
                        <div class="col-md-12">

                          <select  class="form-control" name="select_address" id="select_address" onchange="selected_address();">
                            <option value="">SELECT</option>
                            <?php 
                            $p = 0;
                            foreach($address as $single_address){ 
                              $p++; 
                              ?>
                              <option value="<?php echo $single_address['id'];?>" <?php echo($p == 1 ? "Selected" : "");?>> <?php echo $single_address['address'] ;?> </option>
                            <?php } ?>
                          </select>

                            <!-- <textarea class="form-control" rows="2" name="address" id="address" placeholder="Enter your address" onFocus="geolocate()"><?php echo $address;?></textarea> -->
                          
                          
                          </div>
                        </div>
                        <p style="padding-left: 15px;margin-bottom: 0;"> OR </p>
                      <?php } ?>

                        <div class="form-group col-md-6">
                          <div class="w-100">
                              <input type="hidden" name="invoice_id" id="invoice_id" value="<?php echo $invoice_id; ?>">
                              <input type="hidden" name="country" id="country" value="">
                              <input type="hidden" name="city" id="locality" value="">
                              <input type="hidden" name="state" id="administrative_area_level_1" value="">
                              <input type="hidden" name="zip" id="postal_code" value="">
                              <input type="hidden" name="lat" id="hidden_lat" value="">
                              <input type="hidden" name="long" id="hidden_long" value="">
                              <input type="hidden" name="street_number" id="street_number" value="">
                              <input type="hidden" name="route" id="route" value="">
                              <input type="hidden" name="recent_delivery_address" id="hidden_recent_delivery_address" value="">

                              <label for="Description" >Enter New Delivery Address:</label> 
                          </div>
                          <div class="w-100" style="margin-bottom: 10px;">

                            <!-- <input id="autocomplete" placeholder="Enter your address" onFocus="geolocate()" type="text"/> -->

                              <textarea class="form-control" rows="2" onchange="entered_address()" name="address" id="address" placeholder="Enter your address" onFocus="geolocate()"><?php //echo $address;?></textarea>
                            <p id = "address_err" style="display: none; color: red;">Please enter Delivery Address</p>
                          
                          </div>

                          <div class="w-100">
                            <label for="Description" >Name Of Client:</label> 
                          </div>
                          <div class="w-100">
                            <input  class="form-control" type="text" name="clientName" id="clientName" value="<?php echo $clientName;?>" <?php echo($clientName!='' ? "readonly" : "");?> required>
                            <p id = "clientName_err" style="display: none; color: red;">Please enter Name Of Client</p>
                          
                          </div>

                          <div class="w-100">
                            <label for="Description" >Email:</label> 
                          </div>
                          <div class="w-100">
                            <input  class="form-control" type="text" name="email" id="email" <?php echo($email!='' ? "readonly" : "");?> value="<?php echo $email;?>" required>
                          <p id="email_err" style="display: none; color: red;">Please enter Email</p>
                          <p id="email_err2" style="display: none; color: red;">Please enter valid Email</p>

                          </div>

                          <div class="w-100">
                            <label for="Description">Mobile:</label> 
                          </div>
                          <div class="w-100">
                            <input  class="form-control" type="number" name="mobile" id="mobile" <?php echo($mobile!='' ? "readonly" : "");?> value="<?php echo $mobile;?>" required>
                            <p id="mobile_err" style="display: none; color: red;">Please enter mobile number</p>

                          </div>
                        </div>
                        
                        
                        

                        <div class="col-md-6" style="">
                        <!-- <hr> -->
                          <div class="section-header">
                             <label for="Description" >Payment Type:</label> 
                          </div>

                          <!-- <div class="" style="padding-right: 0;padding-left: 0;"> -->
                            <!-- <div class="col-md-12">
                              <label for="Description" >Payment Type:</label> 
                            </div> -->
                            <!-- <div class="col-md-8 form-group"> -->
                            	<div class="w-100">

                                <!-- <select  class="form-control" name="payment_type" id="payment_type" >
                                  
                                    <option value="COD" Selected > CASH ON DELIVERY </option>
                                    <option value="ZIPPAY"  > ZIPPAY </option>
                                    <option value="POLI"  > POLI </option>
                                 
                                </select> -->
                              
                              <!-- <span class="col-md-3"><input type="radio" name="payment_type" value="COD" checked > CASH ON DELIVERY</span> -->
                              <span class="w-100"><input type="radio" name="payment_type" value="ZIPPAY" checked><img src="image/zip.svg" class="payment-logo" style="height: 22px;"> </span><br>
                              <!-- <span class="col-md-4"><input type="radio" name="payment_type" value="AFTERPAY" checked > AFTERPAY</span> -->
                              <?php if($total<=1000) { ?>
                              <span class="w-100"><input type="radio" name="payment_type" value="POLI" ><img src="image/poli.png" class="payment-logo">  </span><br>
                            <?php  }?>
                              <span class="w-100"><input type="radio" name="payment_type" value="EWAY" ><img src="image/eway.png" class="payment-logo">  </span><br>
                              <span class="w-100" style="display: none;"><input type="radio" name="payment_type" value="test"><img src="image/eway.png" class="payment-logo"> Test</span><br>
                              <span class="w-100" style="display: none;"><input type="radio" name="payment_type" value="test"><img src="image/eway.png" class="payment-logo"> Test</span><br>
                              <!-- <span class="col-md-4"><input type="radio" name="payment_type" value="CC" > CARD PAYMENT</span> -->

                              <!-- <p id="payment_type_err" style="display: none; color: red;">Please select payment type</p> -->
  
                            </div>
                          <!-- </div> -->
                            <a href="javascript:void(0)" onclick="cart_confirmed()">
                              <p style="margin-top: 20px;padding: 10px;color: white;background-color: #ff2d37;margin-bottom: 20px;width: 100;text-align: center;">
                                <b>Proceed to Payment</b>
                              </p>
                            </a>
                        </div>
                        <div class="form-group">
                          <div class="col-md-12" >
                            
                          </div>
                        </div>
                              
                    </form>
                    
                  </div>
                    
                </div>
                
            </div>
            </div>  
            </div>
      

      </header>
      <!-- //Header Container  -->


<div id="myModal" class="modal fade" role="dialog" style="z-index: 99999;height:100%;background-color: rgba(0, 0, 0, 0.23);">
  <div class="modal-dialog" style="height: 600px;overflow: scroll;">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" onclick="close_modal()" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"></h4>
        <div class="col-md-3">
          <img style="height:125px;" id="menu_image" src="">
        </div>
        <div class="col-md-9">
          <h2 class="modal-title titleModal"></h2><span class="calories"></span>
          <p class="menudesc"> </p>
        </div>
      </div>
      <div class="modal-body">
        

                <p class="ingredients">
                  <span class="ingre" id='inline_ingredients'>Choose a Color,Choose thickness</span></p>

                <div id="response_msg" class="alert alert-success col-sm-12 mt-3" role="alert" style="display: none;color: red;">

                    <a href="#" class="modal_close close" onclick="close_modal()" data-dismiss="alert">×</a>

                    <div class="res_msg"></div>

                </div>

                <form id="menuAddToCart" action="" method="POST">

                    <div class=" col-md-12 form-group menu-item-cart " id="menu_varient_data" style="display: none;">

                        <div class="row" id="quan" name="variety">

                          <div class=" col-md-12 col-sm my-1 varient_data">

                            

                          </div>

                        </div>

                    </div>

                    <!-- Quantity start -->

                    <div class="form-group d-flex menu-item-cart">

                        <div class="mr-auto p-2">

                            <label>Quantity</label>

                          <p style="display: inline-block;float: right; margin: 0;">

                            <button type="button" class="sub btn rounded bg-danger btn-sm text-white" onclick="sub_quantity()"><strong>-</strong></button>

                            <input type="number" value="1" min="1" max="20" name="qty" id="qty">

                            <button type="button" class="add btn rounded bg-primary btn-sm text-white" onclick="add_quantity()"><strong>+</strong></button>

                          </p>

                        </div>

                    </div>

                    <!-- add extra options start -->

                    <!-- <div class="form-group d-flex">

                          <div class="mr-auto p-2"> -->

                  <div class="form-group d-flex menu-item-cart " id="menu_add_extra" style="display: none;">

                    <div class="form-group">

                            <p class="add_extra">Add Extra</p>

                        

                    </div>

                    <div class="add_extra_menu">

                     

                    </div>

                  </div>

                    <div class="form-group " style="margin-top: 20px; margin-bottom: 20px;">



                        <div class="">

                            <textarea name="note" rows="3" style="resize: none;border: 1px solid #e2dddd;padding: 20px;" class="form-control" placeholder="Add Note"></textarea>

                        </div>

                    </div>



                    <input type="hidden" name="activeTable" id="activeTable" value="0">

                    <input type="hidden" name="activeDepartment" id="activeDepartment" value="0">

                    <input type="hidden" name="menuNum" id="menuNum" value="0">

                    <input type="hidden" name="totalPrice" id="totalPrice" value="0">

                    <div class="form-group d-flex">

                      <a href="javascript:void(0)" id="btn_addToCart" onclick="addToCart();" style="color: #ffffff;">

                      <div class="image-button-wrapper" style="padding: 10px;color: white;background-color: #171717;margin-top: 20px;margin-bottom: 20px;width: 100%;float: left;"><div class="image-button sqs-dynamic-text">
                        <div class="image-button-inner">

                        

                        <p class="pull-left" style="width: 30%; display: inline-block;"><span class="mquan">1</span> item</p>

                        <p class="pull-left offset-sm-4" style="width: 30%; display: inline-block; text-align: center;">Add To Cart</p>

                        <p class="pull-right offset-sm-3" style="width: 30%; display: inline-block; text-align: right;">$<span class="mprice">0</span></p>

                      </div>
                    </div>
                    </div>

                      </a>

                    </div>


                </form>

      </div>
    </div>

  </div>
</div>
      <!-- Main Container  -->
      </div>
      <!-- //Main Container -->
      <!-- Footer Container -->

      <?php Include 'footer.php'; ?>
      <!-- //end Footer Container -->
      </div>

      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAK4boX_o6ArPMYqO3vbwniRIA3iYUOMGI&libraries=places,geometry&callback=initAutocomplete" async defer></script>
      <script type="text/javascript">

            
    $.post("ajax_autopart.php?action=getCartItemsTyre",{},
      function (data1) {

        // alert('ajax_autopart.php?action=getCartItems');

        data = $.parseJSON(data1);
        // alert(data);
        // console.log(data);

  //alert(data1);
        var cart_count = data.length;
        // alert(cart_count);
        $("#cart_items").text(cart_count);
        });
  </script>

      <script>
// This sample uses the Autocomplete widget to help the user select a
// place, then it retrieves the address components associated with that
// place, and then it populates the form fields with those details.
// This sample requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script
// src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

var placeSearch, autocomplete;

var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  postal_code: 'short_name',
  country: 'long_name'
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search predictions to
  // geographical location types.

  var options = {
    types: ['geocode'],
    componentRestrictions: {country: 'au'}
    };
   
  autocomplete = new google.maps.places.Autocomplete(
  document.getElementById('address'), options);

  //alert("here");

  // Avoid paying for data that you don't need by restricting the set of
  // place fields that are returned to just the address components.
  autocomplete.setFields(['address_component']);

  // When the user selects an address from the drop-down, populate the
  // address fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
}


function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details,
  // and then fill-in the corresponding field on the form.
  var country_text = '';
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];



    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];

      // alert(addressType + " : " + val);
      document.getElementById(addressType).value = val;

      if(addressType == "country")
      {
        country_text = val;
      }


      if(addressType == "postal_code")
      {
        address_str = document.getElementById('address').value;
        if(address_str.indexOf(val) != -1){
        }else{
          fin_address = document.getElementById('address').value;
          fin_address = fin_address.replace(", "+country_text, "");
          document.getElementById('address').value = fin_address + " " +val + " " + country_text;
        }
      }
    }
  }

  if(!place.geometry)
  {
    return;
  }else{
    document.getElementById('hidden_lat').value = place.geometry.location.lat();
    document.getElementById('hidden_long').value = place.geometry.location.lng();
  }
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {

      var latitude = position.coords.latitude;
      var longitude = position.coords.longitude;
       //alert(latitude);
      // alert(longitude);

      var geolocation = {
        lat: latitude,
        lng: longitude
      };

      document.getElementById('hidden_lat').value = latitude;
      document.getElementById('hidden_long').value = longitude;

      var circle = new google.maps.Circle(
          {center: geolocation, radius: position.coords.accuracy});
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
</script>





