<?php
   require_once "getdata/autopart_data.php";
   
   $myCategory = new Category();
   
   if(!isset($_SESSION['user_id']) || $_SESSION['user_id'] == 0)
   {
      header("location:index.php");
   }

   //$user_details = $myCategory->getUserDetails($user_id);

    require_once "header.php";
   ?>

<style type="text/css">

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
          font-family: "Montserrat", sans-serif;
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

</style>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">

  function get_login()
  {

    var email = $("#email").val();
    var password = $("#password").val();
    var err = 0;    

    $("#login_failed").hide();

    
    if(email == '' )
    {
      err = 1;
      $("#email_err").show();
    }else{
      $("#email_err").hide();
    } 

    if ( email != '' && !validateEmail(email))
    {
      err = 1;
      
      $("#email_err2").show();
    }else{
      
      $("#email_err2").hide();
    }
    if(password == '' )
    {
      err = 1;
      $("#password_err").show();
    }else{
       $("#password_err").hide();
    }


    if(err == 0){
      $.ajax({

          type: 'POST',
          url: 'ajax_autopart.php?action=getUserLogin',
          data: $('#login_form').serializeArray(),
          success: function (response) {
            //alert(response);
            if(response == 1){
              window.location.reload();
            }else{
              $("#login_failed").show();
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
      //alert("remove_it");

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


</script>

 
        <div class="header-middle hidden-compact">
            <div class="container">
                <div class="row">           
                    <div class="col-lg-3 col-md-4 col-sm-12 col-xs-12">
                        
                        
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12 col-xs-12 middle-right">
                        <div class="search-header-w">
                            <!-- <div class="icon-search hidden-lg hidden-md"><i class="fa fa-search"></i></div>                                 -->
                              
                            <div id="sosearchpro" class="sosearchpro-wrapper so-search " style="display: none;">
                                <form method="GET" action="index.html">
                                    <div id="search0" class="search input-group form-group">
                                        <div class="select_category filter_type  icon-select hidden-sm hidden-xs">
                                            <select class="no-border" name="category_id">
                                                <option value="0">All Categories</option>
                                                <option value="78">Apparel</option>
                                                <option value="77">Cables &amp; Connectors</option>
                                                <option value="82">Cameras &amp; Photo</option>
                                                <option value="80">Flashlights &amp; Lamps</option>
                                                <option value="81">Mobile Accessories</option>
                                                <option value="79">Video Games</option>
                                                <option value="20">Jewelry &amp; Watches</option>
                                                <option value="76">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Earings</option>
                                                <option value="26">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Wedding Rings</option>
                                                <option value="27">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Men Watches</option>
                                            </select>
                                        </div>

                                        <input class="autosearch-input form-control" type="text" value="" size="50" autocomplete="off" placeholder="Keyword here..." name="search">
                                
                                        <button type="submit" class="button-search btn btn-primary" name="submit_search"><i class="fa fa-search"></i></button>
                                    
                                    </div>
                                    <input type="hidden" name="route" value="product/search">
                                </form>
                            </div>
                        </div>

                        <div class="shopping_cart" style="display: none;">
                            <div id="cart" class="btn-shopping-cart">

                                <a href="javascript:void(0)" data-loading-text="Loading... " class="btn-group top_cart dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                    <div class="shopcart" onclick="window.location.href='autoparts_view_cart.php';">
                                        <span class="icon-c">
                                            <i class="fa fa-shopping-basket"></i>
                                        </span>
                                        <div class="shopcart-inner">
                                            <p class="text-shopping-cart">
                                                My cart
                                            </p>

                                            <span class="total-shopping-cart cart-total-full">
                                            <span class="items_cart" id="cart_items">0</span><!-- <span class="items_cart2"> item(s)</span><span class="items_carts">$162.00</span> -->
                                            </span>

                                        </div>
                                    </div>
                                </a>

                                
                            </div>
                            <script type="text/javascript">
            
                                $.post("ajax_autopart.php?action=getCartItems",{},
                                  function (data1) {

                                    //alert(data1);

                                    data = $.parseJSON(data1);
                                    // alert(data);
                                    // console.log(data);

                              //alert(data1);
                                    var cart_count = data.length;
                                    //alert(cart_count);
                                    $("#cart_items").text(cart_count);
                                    });
                              </script>
                        </div>

                        <div style="display: none;" class="wishlist hidden-md hidden-sm hidden-xs"><a href="#" id="wishlist-total" class="top-link-wishlist" title="Wish List (0) "><i class="fa fa-heart"></i></a></div>
                                         
                    </div>
                </div>
            </div>
        </div>
         <div class="header-bottom hidden-compact">
         <div class="container">
          <div class="row">
            <div class="col-md-3 col-sm-2"></div>
        
            <div id="content" class="col-md-6 col-sm-8" style="padding: 15px;border: 1px solid #ddd;">
                <div class="products-category">
                   <div class="page-width" data-section-id="cart-template" data-section-type="cart-template">

                    
                      <div class="section-header text-center">
                        <h1>Change Password</h1>
                      </div>

                      <form action="javascript:void(0);" method="post" class="cart" id="login_form">
                        <br> 
                        <!-- <input type="hidden" name="token" id="token" value="<?php //echo $_GET['user_token'];?>"> -->
                        
                        <div class="form-group">
                          <div class="col-md-12">
                            <label for="Description" >Old Password:</label> 
                          </div>
                          <div class="col-md-12">
                            <input  class="form-control" type="password" name="old_password" id="old_password" value="" required>
                            <p id="old_password_err" style="display: none; color: red;">Please enter old password</p>
                          </div>
                        </div>
                          
                        <div class="form-group">
                          <div class="col-md-12">
                            <label for="Description" >New Password:</label> 
                          </div>
                          <div class="col-md-12">
                            <input  class="form-control" type="password" name="password" id="password" value="" required>
                          <p id="password_err" style="display: none; color: red;">Please enter password</p>
                          
                          </div>
                        </div>
                          

                        <div class="form-group">
                          <div class="col-md-12">
                            <label for="Description" >Confirm Password:</label> 
                          </div>
                          <div class="col-md-12">
                            <input  class="form-control" type="password" name="cpassword" id="cpassword" value="" required>
                            <p id="cpassword_err" style="display: none; color: red;">Please enter confirm password</p>
                            <p id="dis_cpassword_err" style="display: none; color: red;">Password and confirm password must be same</p>
                          
                          </div>
                        </div>
                          

                        <div class="form-group">
                          <div class="col-md-12" >
                            

                            <a href="javascript:void(0)" onclick="update_password()">
                            <p style="margin-top: 20px;padding: 10px;color: white;background-color: #171717;margin-bottom: 20px;width: 100;text-align: center;">
                              <b>Update Password</b>
                            </p>
                            </a>
                            
                          </div>
                        </div>
                              
                    </form>
                    
                  </div>
                    
                </div>
                
            </div>

            <div class="col-md-3 col-sm-2"></div>
            </div>  
            </div>
      

      </header>
      <!-- //Header Container  -->



      <!-- Main Container  -->
      </div>
      <!-- //Main Container -->
      <!-- Footer Container -->
      <?php require_once 'footer.php'; ?>
      <!-- //end Footer Container -->
      </div>



      <script type="text/javascript">
        
      function update_password(){
        var old_password = $("#old_password").val();
        var password = $("#password").val();
        var cpassword = $("#cpassword").val();
        if(old_password=="")
        {
          err = 1;
          $("#old_password_err").show();
        }else{
           $("#old_password_err").hide();
        }
        if(password=="")
        {
          err = 1;
          $("#password_err").show();
        }else{
           $("#password_err").hide();
        }
        if(cpassword=="")
        {
          err = 1;
          $("#cpassword_err").show();
        }else{
           $("#cpassword_err").hide();
        }
        if(password!="" && cpassword!="" && cpassword!= password)
        {
          err = 1;
          $("#dis_cpassword_err").show();
        }else if(password!="" && cpassword!="" && cpassword == password && old_password != ""){
           err = 0;
           $("#old_password_err").hide();
           $("#password_err").hide();
           $("#cpassword_err").hide();
           $("#dis_cpassword_err").hide();
        }


        if(err != 1){
          $.ajax({

            type: 'POST',
            url: 'ajax_autopart.php?action=update_password',
            data: $('#login_form').serializeArray(),
            success: function (response) {
              //alert(response);
              if(response == 1){

                swal("Good", "Password updated successfully", "success");
              }else {
                swal("Warning", "Old Password did not matched", "error");
              }
              //alert(response);
            }
          });
        }
    }
      </script>


      <?php
         die;
         
         $getCategoryTreeView  = $myCategory->getCategoryTreeView(888888);
         
         ?>
      <!DOCTYPE html>
      <html>
      <head>
      <title></title>
      <link href="https://jonmiles.github.io/bootstrap-treeview/bower_components/bootstrap/dist/css/bootstrap.css" rel="stylesheet">
      <!-- <link href="./css/bootstrap-treeview.css" rel="stylesheet"> -->
      </head>
      <body>
      <div class="container">
      <h1></h1>
      <br>
    
      <br/>
      <br/>
      <br/>
      <br/>
      </div>



      <script src="https://jonmiles.github.io/bootstrap-treeview/bower_components/jquery/dist/jquery.js"></script>
      <script src="https://jonmiles.github.io/bootstrap-treeview/js/bootstrap-treeview.js"></script>
     
      </body>
      </html>

