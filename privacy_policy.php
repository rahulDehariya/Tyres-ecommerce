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
?>
 <div class="main-container container" style="margin-top: 20px">
    <div class="row">
			 
	<div id="content" class="col-md-12 col-sm-12">
      <div id="wrapper" class="wrapper-full ">
      	<h2>Brotyres.com.au Pty Ltd Privacy Policy</h2>
      	<p>Brotyres.com.au Privacy Policy is conducted in compliance to the Australian Privacy Principle.</p>
      	<p><b>What kinds of personal information does Brotyres collects and holds?</b></p>
      	<p>Brotyres.com.au collects personal information when you fill out our form and/or when you register on our site.</p>
      	

      	<p><b>How does Brotyres collects and holds personal information?</b></p>
		<p>When registering on site, or when ordering products from our site, as appropriate, you may be requested to enter personal details. We highly value your privacy, we do not trade, sell, or otherwise share information to parties regarding your personal identifiable information.</p>
		<p><b>For which purposes does Brotyres collects, holds, uses and discloses personal information?</b></p>
		<p>Information that we collect from you can be used in a variety of different ways: Processing customer orders and responding to your customer support requests. The email address you provide us may be used for providing you with further information on our products, discounts, service information and/or general updates about services we can offer you.</p>
		<p><b>Will Brotyres disclose my personal information to outside parties?</b></p>
		<p>The information provided by you will not be sold, exchanged, transferred, and/or shared with other companies for any reason, except for the sole purpose of delivering the purchased goods and services.</p>

		<p><b>Your Consent</b></p>
		<p>By using our site you consent to our privacy policy.</p>
		<p><b>Contact us</b></p>
		<p>If you have questions regarding our privacy policy, have a complain about a breach of the privacy policy, wish to access your personal information that Brotyres holds, or wish to seek the correction of such information you can contact us on:</p>
		
		<p>4 Newton Street</p>
		<p>Broadmeadow, NSW, 2292</p>
		<p>Australia</p>
		<p>E: <a style="color: blue;" href="mailto:online@Brotyres.com.au" title="">online@brotyres.com.au</a></p>
		




   </div>
  </div>
</div>
</div>



<?php
include_once"footer.php";
?>
<script type="text/javascript">
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