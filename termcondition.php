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
<style type="text/css">
	p{
		text-align: justify;
	}
	.inside_content,  .inside_content li   {
	
	list-style-type: disc;
	margin-block-start: 1em;
	margin-block-end: 1em;
	margin-inline-start: 0px;
	margin-inline-end: 0px;
	padding-inline-start: 40px;
	list-style: disc;
}
.content_inner, .content_inner li 
{
	list-style-type: disc;
	margin-block-start: 1em;
	margin-block-end: 1em;
	margin-inline-start: 0px;
	margin-inline-end: 0px;
	padding-inline-start: 40px;
	list-style: circle;

}

</style>
 <div class="main-container container">
		
		 <div class="row">
			 <!--Middle Part Start-->
		 <div id="content" class="col-md-12 col-sm-12">
    	<div id="wrapper" class="wrapper-full ">
    	<h2 style="text-align: center;margin-top: 20px">TERMS AND CONDITIONS Brotyres.com.au PTY Ltd</h2>
    	<p>Please read the general terms &amp; conditions before you order at Brotyres.com.au. When you place the
            order, you automatically give acceptance to the general terms and conditions.</p>

            <ul class="inside_content" >
            	<li class="main_heading">    1. Definitions<br></li>
            		<ul class="content_inner">
            			<li>1.1 Customer – stands for the individual, person, company or other body who place an order on the site www.Brotyres.com.au.</li>
            			<li>1.2 Homepage – <a href="www.Brotyres.com.au" style="color: blue;">www.Brotyres.com.au</a></li>
            			<li>1.3 Account – means what you will need to register to submit an order on this site.</li>
						<li>	1.4 Business day – stands for the day except Saturday or Sunday, nor a public and/or bank holiday anywhere in Australia. Also referable with "working day".</li>
						<li>	1.5 Confirmation of order – means our email to you where we accept your order.</li>
						<li>	1.6 Customer information – Information we request from you to place an order.</li>
						<li>	1.7 Order number – Gathered by you as a customer after completing your order, you will find it in your order confirmation. Whenever questions related to an order arise, this should be your reference.</li>
						<li>	1.8 Brotyres.com.au – Brotyres.com.au Pty Ltd and the activities in Australia</li>
						<li>	1.9 Product – The product(s) which are ordered by a customer from Brotyres via the website or any other medium. Similar words, like goods or items also refer to this. Note that all words which are used in singular can also be used in plural and it also applies vica versa.</li>

            			
            		</ul>


            	
            	<li class="main_heading">2. About Us and the General Terms and Conditions</li>
            		<ul class="content_inner">
            			
            			<p>Brotyres.com.au Pty Ltd</p>
						<p>Office Address:<br>
						<p>4 Newton Street </p>
						<p>Broadmeadow NSW 2292</p>
						<p>E: <a style="color: blue;" href="mailto:online@Brotyres.com.au" title="">online@Brotyres.com.au</a></p></p>
						<p>Brotyres.com.au Pty Ltd will hereafter be referred to as the Seller, Company, Brotyres, We or Our. These general terms and conditions are applicable to all contracts a customer (hereafter indicated as you, the customer, or purchaser) made with Brotyres.com.au by ordering a product from Brotyres.com.au. By ordering a product from this website, you accept the General Terms and Conditions.</p>
						<p>If you have any questions, you can contact us by email at <a style="color: blue;" href="mailto:online@Brotyres.com.au" title="">online@Brotyres.com.au</a></p>
            		</ul>
            		<li class="main_heading">3. Orders and Customers</li>
            		<ul class="content_inner"> 
            			<p>All orders at Brotyres.com.au will be processed immediately, assuming you place your order on a business day. When placing an order, you accept Brotyres's General Terms and Conditions, and confirm that you are:</p>
            			<p>- A resident in Australia</p>
                       <p> - Legally authorized to make purchases with the selected payment account</p>
						<p>- Ordering Products to be delivered and/or fitted in Australia</p>
						<p>- Ordering Products to be delivered and/or fitted in Australia
						If any of the above is incorrect, please do not place an Order with this site. We reserve the right, in our sole discretion, and at any time, to refuse, reject, or cancel any order placed with us.
						</p>


            		</ul>
            		<li class="main_heading">	4. Prices</li>
            		<ul class="content_inner"> 
            			<p>All Our Prices include GST and any other applicable taxes (which will be charged at the current rate as shown on the website). Prices include delivery, unless otherwise stated on the Website. The prices are given in Australian dollars (AUD). We reserve the right to correct mistakes and or update information without prior notice. However, if the wrong price has been shown on a product you already have ordered, we will of course notify you and await your approval of the correct price before we process your order.</p>
            		</ul>
            		<li class="main_heading">5. Payment</li>
            		<ul class="content_inner">
	            			<li>	5.1 At the moment Brotyres.com.au offers following payment methods: Eway (Visa, MasterCard, American Express, Diner Club), Poli , ZipMoney and Afterpay. We reserve the right to not offer all payment methods. By submitting a credit or debit card number, you:
							(a) confirm that your use of the particular card is authorized and that all information that you submit is true and accurate; and
							(b) authorize us to charge to the card you tendered all amounts payable by you to us (including GST and any other applicable taxes) based on the Items you order.</li>
							<li>	5.2 If we suspect that any order is fraudulent or involves stolen identity or payment information, we reserve the right to make any additional authenticity checks and to involve any authorities we deem fit.</li>
							<li>	5.3 The payment methods of ZipMoney and Afterpay are offered and controlled by these companies themselves, we simply offer it as a payment option, although any issues or queries regarding instalments should be directed to the correct company.</li>

            		</ul>
            		<li class="main_heading">6. Warranty</li>
            		<ul class="content_inner">
            			<p>All products that are purchased at Brotyres.com.au have a 1 year warranty regarding faults or defects resulting from manufacturing. Damages caused by fitting, disassembling or balancing, or improper usage of the Products are not covered by the warranty.
						For any warranty claims, the buyer must first have the tyres return for inspection to determine if the issue is due to manufacturing. If the inspection determines there is a manufacturing issue, compensation will be evaluated from the remaining tread of the tyres, and in the terms of a replacement, or partial refund, which will be determined after inspection.
						</p>
            		</ul>

            		<li class="main_heading">7. Delivery Costs</li>
            		<ul class="content_inner">
            			<p>
            				Delivery costs are based on postal code of the delivery address and the tyre size. These costs will be added to the total order price which will be visible in the cart and can already be calculated in the product detail page.
            			</p>
            		</ul>

            		<li class="main_heading">8.Delivery</li>
            		<ul class="content_inner">
            			<li>8.1 Products purchased at Brotyres can be delivered to</li>
            			<p class="content_inner">1) your address</p>
						<p class="content_inner">2) your chosen fitting partner (if available) or</p>
						<p class="content_inner">3) another given address</p>
						<li>8.2 Products are usually delivered in 3-5 business days from the time the product has left the warehouse, unless stated otherwise. However, due to unforeseen changes in purchasing volume, shipping times can fluctuate. We aim to notify you if we suspect that we cannot make the delivery in the estimated delivery time, but, to the extent permitted by law, we shall not be liable to you for any losses, liabilities, costs, damages, charges or expenses arising out of late delivery.</li>
						<li>8.3 Metro area postcodes: 2000 - 2002, 2006 - 2012, 2015 - 2050, 2052, 2055, 2057, 2059 - 2077, 2079 - 2097, 2099 - 2148, 2150 - 2168, 2170 - 2179, 2190 - 2200, 2203 - 2214, 2216 - 2234, 2555 - 2560, 2563 - 2567, 2745, 2747 - 2763, 2765 - 2770, 3000 - 3006, 3008, 3010 - 3013, 3015 - 3016, 3018 - 3034, 3036 - 3062, 3064 - 3068, 3070 - 3076, 3078 - 3079, 3081 - 3089, 3093 - 3095, 3101 - 3109, 3111, 3113 – 3116, 3121 - 3156, 3160 - 3175, 3177 - 3202, 3204 - 3207, 3752, 3800, 3802 - 3803, 3806, 3975 - 3976, 4000 - 4014, 4017 - 4022, 4025, 4029 - 4032, 4034 - 4037, 4051, 4053 - 4055, 4059 - 4061, 4064 - 4070, 4072 - 4078, 4101 - 4125, 4127 - 4133, 4151 - 4161, 4163 - 4165, 4169 - 4174, 4178 – 4179, 4300 - 4301, 4500 - 4505, 4508 - 4509, 5000 - 5001, 5005 - 5025, 5031 - 5035, 5037 - 5052, 5061 - 5076, 5081 - 5098, 5106 - 5115, 5125 - 5127, 5158 - 5162, 5164 - 5166, 5168, 5950, 6000 - 6001, 6003 - 6012, 6014 - 6031, 6036, 6050 - 6074, 6076 - 6079, 6081 - 6082, 6090, 6100 - 6112, 6121 - 6125, 6147 - 6176, 6180 - 6182</li>

            		</ul>
            		<li class="main_heading">9. Cancellation Notice</li>
            			<ul class="content_inner">
            				<p>You are entitled to request a return within 14 days after you, or a third party named by you, received the tyres. Please send an email to online@brotyres.com.au with your name, order number and reason for return in order to request an RMA number.<br>
							Only unused tyres that have not been mounted are eligible for return. We do not offer returns for simply change of mind or wrongly ordered products. In case of a return, we will ensure the tyres are picked up at the address specified by the customer.
							</p>
							<p>If we have come to an agreement on return for an order that was due to a customers fault, a 15% restocking fee will apply (15% of total order value) and the customer is in charge of the return fee.</p>
            			</ul>

            			<li class="main_heading">	10. Refund</li>
            			<ul class="content_inner">
            				<p>As soon as we have received the returned tyres and have inspected the conditions, we will refund the original order amount minus freight cost within 30 days. The refund amount will be transferred to the original means of payment used for the order, unless differently specified by the customer.</p>
            			</ul>


            			<li class="main_heading">11.Complaints</li>
            			<ul class="content_inner">
            				<p>For complaints, please contact Brotyres.com.au by email or post. Brotyres will send the claims forms and the return delivery labels you need. For approved claims, the customer will get the products replaced with an equivalent product and reimbursed for any additional expenses. Before the new product is sent, Brotyres must conclude that it is free from manufacturing or material defects. Associated costs, such as for rental cars, are not reimbursed by Brotyres. If the claim is not approved, the delivery costs are not refunded, and the customer is fully charged. Please note that the customer is responsible for the products until they have been received by Brotyres. Please make sure you pack the products carefully, so they do not get damaged when they are returned to Brotyres.</p>
            			</ul>

            			<li class="main_heading">12.Ownership Reservation</li>
            			<ul class="content_inner">
            				<p>All products remain property of Brotyres until the full payment has been received.</p>
            			</ul>

            			<li class="main_heading">13.Others</li>
            			<ul class="content_inner">
            				<p>The products on our website are for sale, however, we reserve the right to make changes. If typographical errors, technical problems or similar occur, we reserve the right to cancel incoming orders. If this occurs, you will be contacted. The existing product description is mainly from our supplier, we accept no responsibility for them. Sometimes the product image differs from reality. An example might be a tyre, under “tyre menu” which is attached to a rim. The rim in this example is not included in the price, and thus not included in the purchase. Brotyres.com.au accepts no responsibility for any tyre equipment, which you as a car owner choose to use for your vehicle.</p>
            			</ul>
            			<li class="main_heading">14. Force Majeure</li>
            			<ul class="content_inner">
            				<p>We are not responsible for delays caused by Force Majeure events. Examples of such events are: natural disasters, war, strike, decisions from authorities, non-deliveries from suppliers, and circumstances beyond our control, that cannot have been foreseen. If events like this occur, which makes Brotyres.com.au unable to keep agreement/commitment;
							Brotyres.com.au will be released from the obligation to fulfill the contract/commitment.
							</p>
            			</ul>
            			<li class="main_heading">15.Changes in General Terms and Conditions</li>
            			<ul class="content_inner">
            				<p>We reserve the right to update and make changes in our General Terms and Conditions. Any changes or additions will be published at www.Brotyres.com.au. Continued use of our webpage is considered as an approval of the potential changes.</p>
            			</ul>

            			<li class="main_heading">16. Declaration of invalidity</li>
            			<ul class="content_inner">
            				<p>If any of the clauses of these General Terms and Conditions, or an agreement is declared invalid or cannot be executed by court, the other parts of the General Terms and Condition remains valid. The clauses held invalid or cannot be executed will be replaced with the appropriate legal guidance, counselling and practice.</p>
            			</ul>

						<li class="main_heading">17.Website Restrictions</li>
            			<ul class="content_inner">
            				<p>Any program or automated technology may not be used to browse, search, share, or download text and/or images and/or code from this website.</p>
            			</ul>

						<li class="main_heading">18.Privacy Policy</li>
            			<ul class="content_inner">
            				<p>Please read our Privacy, which represents a part of our General Terms and Conditions. You will find our Privacy Policy <a href="privacy_policy.php" style="color: blue">here</a></p>
            			</ul> 

						<li class="main_heading">19.Age of Tyres</li>
            			<ul class="content_inner">
            				<p>Most tyres are around 1 year old but max age is 4 years. We only sell NEW tyres, we do not sell second hand/used tyres, factory seconds or any damage tyres. The date of the order will be used against the manufacture date of the tyre to determine the max 4 year gap.</p>
            				<p>If stock is marked as 'Clearance stock', the age of the tyres potentially could have an age greater than 4 years.</p>
            			</ul>

						<li class="main_heading">20.Tyres Left at Fitting Stations</li>
            			<ul class="content_inner">
            				<p>If a customer is unreachable for a month or more since the tyres have been delivered to the Fitting Station, the customer is forfeiting the tyres and may not be subject to a refund.</p>
            			</ul>

						<li class="main_heading">21.Images</li>
            			<ul class="content_inner">
            				<p>Images are for illustration purposes only. Wheel rims are not included with the tyre, and actual tread may differ from images depicted.</p>
            			</ul>

						<li class="main_heading">21.Inappropriate / Rude Behaviour to Staff</li>
            			<ul class="content_inner">
            				<p>If you, the customer, fitting partner, or any other individual involved with Brotyres.com.au or the purchase of tyres is inappropriate and rude to staff, you will forfeit all additional privileges, promotions and additional services other than the very basic purchase and delivery of tyres at full retail price.</p>
            			</ul>



            </ul>
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