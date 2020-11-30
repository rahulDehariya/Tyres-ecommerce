<?php include_once"header.php"; 

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
	.reviews{
		font-size: 70px;
		color: #ff2d37;
	}
	.reviews-panel{
		margin-bottom: 10px;
	    margin-top: 10px;
	    box-shadow: 0 0 4px #ccc;
	    border-radius: 10px;
	    padding: 20px;
	}
	.reviews-panel p{
		margin:0;
	}
</style>
<div class="main-container">
    <div id="content">
    	<div class="banner header-text text-center">
    			<h2>Reviews</h2>
    	</div>
    	<div class="container">
    		<div class="row">
    			<div class="average-rating text-center">
					<div class="col-sm-12">
						<p class="reviews"><span itemprop="ratingValue">5</span><i class="fa fa-star"></i></p>
						<p class="count">Based on <span itemprop="reviewCount">7</span> reviews</p>
						<button href="/feedback" class="btn btn-red btn-skew btn-danger">Give Feedback</button>
					</div>
					
				</div>
    		</div><br>
    		<div class="row reviews-panel">
    			<div class="">
					
					<div class="col-sm-3">
						<p class="p-1 m-1" itemprop="author" itemscope="" itemtype="http://schema.org/Person">
						<b itemprop="name">Gail Maier</b>
						</p>
						<p class="p-1 m-1">09th February, 2020</p>
						<p class="p-1 m-1" itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating">
						<span class="hidden" itemprop="ratingValue">5</span>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						</p>
					</div>
					<div class="col-sm-9">
						<p itemprop="reviewBody">
							I have personally found Broadmeadow Tyres &amp; Service to give excellent service &amp; to be reasonably priced with very friendly &amp; efficient staff. I take my hybrid Toyota there for six monthly services &amp; I have never been disappointed in any way. I would trust them with any make of car as their mechanics are very knowledgeable
						</p>
					</div>
				</div>
    			
    		</div>
    		<div class="row reviews-panel">
    			<div class="">
					
					<div class="col-sm-3">
						<p class="p-1 m-1" itemprop="author" itemscope="" itemtype="http://schema.org/Person">
						<b itemprop="name">rita murdocca</b>
						</p>
						<p class="p-1 m-1">09th February, 2020</p>
						<p class="p-1 m-1" itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating">
						<span class="hidden" itemprop="ratingValue">5</span>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						</p>
					</div>
					<div class="col-sm-9">
						<p itemprop="reviewBody">
							Very efficient fantastic service professional business perfect re gas of air con checked my tyres advised me where to take my Volvo for suspension check brilliant will definitely be back
						</p>
					</div>
				</div>
    			
    		</div>
    		<div class="row reviews-panel">
    			<div class="">
					
					<div class="col-sm-3">
						<p class="p-1 m-1" itemprop="author" itemscope="" itemtype="http://schema.org/Person">
						<b itemprop="name">Kerry Chapman</b>
						</p>
						<p class="p-1 m-1">08th February, 2020</p>
						<p class="p-1 m-1" itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating">
						<span class="hidden" itemprop="ratingValue">5</span>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						</p>
					</div>
					<div class="col-sm-9">
						<p itemprop="reviewBody">
							Excellent support and service with the daughter\u2019s blue slip. Will highly recommend this company
						</p>
					</div>
				</div>
    			
    		</div>
    		<div class="row reviews-panel">
    			<div class="">
					
					<div class="col-sm-3">
						<p class="p-1 m-1" itemprop="author" itemscope="" itemtype="http://schema.org/Person">
						<b itemprop="name">Todd Hamilton</b>
						</p>
						<p class="p-1 m-1">11th September, 2019</p>
						<p class="p-1 m-1" itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating">
						<span class="hidden" itemprop="ratingValue">5</span>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						</p>
					</div>
					<div class="col-sm-9">
						<p itemprop="reviewBody">
							fantastic service guys thank you was informed on what needed doing and wen my car would be ready to collect this is what service should be look after their customers the best in newcastle
						</p>
					</div>
				</div>
    			
    		</div>
    		<div class="row reviews-panel">
    			<div class="">
					
					<div class="col-sm-3">
						<p class="p-1 m-1" itemprop="author" itemscope="" itemtype="http://schema.org/Person">
						<b itemprop="name">Ben Davis</b>
						</p>
						<p class="p-1 m-1">29th June, 2019</p>
						<p class="p-1 m-1" itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating">
						<span class="hidden" itemprop="ratingValue">5</span>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						</p>
					</div>
					<div class="col-sm-9">
						<p itemprop="reviewBody">
							Great website for wheel and tyre availability.
						</p>
					</div>
				</div>
    			
    		</div>
    		<div class="row reviews-panel">
    			<div class="">
					
					<div class="col-sm-3">
						<p class="p-1 m-1" itemprop="author" itemscope="" itemtype="http://schema.org/Person">
						<b itemprop="name">Jason</b>
						</p>
						<p class="p-1 m-1">15th September, 2018</p>
						<p class="p-1 m-1" itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating">
						<span class="hidden" itemprop="ratingValue">5</span>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						</p>
					</div>
					<div class="col-sm-9">
						<p itemprop="reviewBody">
							Loved the service! Best prices in Newcastle by far.
						</p>
					</div>
				</div>
    			
    		</div>
    		<div class="row reviews-panel">
    			<div class="">
					
					<div class="col-sm-3">
						<p class="p-1 m-1" itemprop="author" itemscope="" itemtype="http://schema.org/Person">
						<b itemprop="name">Chris</b>
						</p>
						<p class="p-1 m-1">04th August, 2018</p>
						<p class="p-1 m-1" itemprop="reviewRating" itemscope="" itemtype="http://schema.org/Rating">
						<span class="hidden" itemprop="ratingValue">5</span>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						<i class="fa fa-star"></i>
						</p>
					</div>
					<div class="col-sm-9">
						<p itemprop="reviewBody">
							Brilliant Service ! Recommended to everyone!
						</p>
					</div>
				</div>
    			
    		</div>
    	</div>
    </div>
</div>
<?php include_once"footer.php"; ?>