<?php include_once"header.php";


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

 ?>
<style type="text/css">
	.contact-form .wrapper{
		padding: 30px 20px;
	}
	.contact-form .wrapper form input, .contact-form .wrapper form textarea{
		margin-bottom: 15px;
		border-radius: 0;
		font-size: 14px
	}
</style>
<div class="main-container">
    <div id="content">
    	<div class="banner header-text text-center">
    			<h2>CONTACT US</h2>
    	</div>
    	<div class="container">
    		<div class="row">
    			<div class="col-md-6 col-sm-6 contact-form text-center">
    				<div class="wrapper">
						<p>
						<h3><b>Address</b></h3>
						4 Newton Street, Broadmeadow,<br>NSW, 2292<br><br>
						<h3><b>Contact</b></h3>
						Phone : <a href="tel:(02) 4048 0108" onclick="ga('send', 'event', 'Phone Call', 'click-number', 'phone-number', 1);ga('second.send', 'event', 'Phone Call', 'click-number', 'phone-number', 1);">(02) 4048 0108</a><br>
						Email : <a class="protected-email" href="mailto:info@brotyres.com.au" onclick="ga('send', 'event', 'Enquiry Sent', 'click-enquire', 'enquiry', 1);ga('second.send', 'event', 'Enquiry Sent', 'click-enquire', 'enquiry', 1);">info@brotyres.com.au</a>

						<noscript>
							<span>This email address is protected by JavaScript.</span>
						</noscript>	<br><br>
						<h3><b>Open Hours</b></h3>
						Mon - Fri : 8am - 5pm<br>
							Sat : 8am - 1pm<br>
							Sun : CLOSED</p>
					
					</div>
    			</div>
    			<div class="col-md-6 col-sm-6 border-md-left contact-form">
    				<div class="wrapper">
						<h2>Send us a Message</h2>
						
						<form action="" method="post" id="contact-form">
						
							<input type="text" name="name" id="name" placeholder="Full Name" class="form-control required" required="">
							<input type="hidden" name="type" value="contact-form">
							<input type="text" name="address" placeholder="Address" class="form-control hidden">
							<input type="email" name="email" id="email" placeholder="Email Address" class="form-control required" required="">
							<input type="text" name="phone" id="phone" placeholder="Phone/Mobile Number" class="form-control required" required="">
							<textarea name="message" id="message" placeholder="Message" class="form-control required" required=""></textarea>
							
							<br>
							<div class="cols col-6">
							<div style="width: 100%; text-align: center;" class="g-recaptcha" data-sitekey="6LdE-BYUAAAAAMMP72LNvYUzpP3yRNNsfNZqPbO0" id="recaptcha-0"><div style="width: 304px; height: 78px;"><div><iframe src="https://www.google.com/recaptcha/api2/anchor?ar=1&amp;k=6LdE-BYUAAAAAMMP72LNvYUzpP3yRNNsfNZqPbO0&amp;co=aHR0cHM6Ly93d3cuYnJvYWRtZWFkb3d0eXJlc25ld2Nhc3RsZS5jb20uYXU6NDQz&amp;hl=en-GB&amp;v=BT5UwN2jyUJCo7TdbwTYi_58&amp;theme=light&amp;size=normal&amp;cb=bq4zf2p80s11" width="304" height="78" role="presentation" name="a-lw77k53gd9ws" frameborder="0" scrolling="no" sandbox="allow-forms allow-popups allow-same-origin allow-scripts allow-top-navigation allow-modals allow-popups-to-escape-sandbox"></iframe></div><textarea id="g-recaptcha-response" name="g-recaptcha-response" class="g-recaptcha-response" style="width: 250px; height: 40px; border: 1px solid rgb(193, 193, 193); margin: 10px 25px; padding: 0px; resize: none; display: none;"></textarea></div><iframe style="display: none;"></iframe></div>

							<p id="errors" style="color: red;"></p>
							</div><div class="cols col-6 d-col-last">
							<input name="contact-submit" id="contact-submit" type="submit" value="Send Enquiry" class="btn btn-red btn-skew btn-danger form-submit">
							</div>
						</form>
					</div>
    			</div>
    		</div>
    		<div class="row">
    			
			<div id="googleMap" style="width:100%;height:400px;"></div>

			<script>
			function myMap() {
			var mapProp= {
			  center:new google.maps.LatLng(51.508742,-0.120850),
			  zoom:5,
			};
			var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
			}
			</script>

			<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script>
    		</div>
    	</div>
    </div>
</div>
<?php include_once"footer.php"; ?>