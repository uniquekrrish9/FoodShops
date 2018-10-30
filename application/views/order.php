<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
		});
	});
</script>
<script src="<?=ASSETS?>js/jquery.carouFredSel-6.1.0-packed.js"></script>
<script src="<?=ASSETS?>js/tms-0.4.1.js"></script>
<script>
	$(window).load(function(){
		$('.slider')._TMS({
			show:0,
			pauseOnHover:false,
			prevBu:'.prev',
			nextBu:'.next',
			playBu:false,
			duration:800,
			preset:'fade', 
              pagination:true,//'.pagination',true,'<ul></ul>'
              pagNums:false,
              slideshow:8000,
              numStatus:false,
              banners:false,
              waitBannerAnimation:false,
              progressBar:false
          })  
	});

	$(window).load (
		function(){
			$('.carousel1').carouFredSel({auto: false,prev: '.prev',next: '.next', width: 960, items: {
			visible : {min: 1,
				max: 4
			},
			height: 'auto',
			width: 240,

		}, responsive: false, 

		scroll: 1, 

		mousewheel: false,

		swipe: {onMouse: false, onTouch: false}});


	});      

</script>
<script src="<?=ASSETS?>js/jquery.easydropdown.js"></script>
<div class="ordering-form">
	<form action="<?=PATH?>Order" method="POST">
		<div class="container">
			<div class="order-form-head text-center wow bounceInLeft" data-wow-delay="0.4s">
				<h3>Restaurant Order Form</h3>
				<p>Ordering Food Was Never So Simple !!!!!!</p>
				<?php 
				if(isset($success))
					echo '<p id="success" class="msg done">'.$success.'</p>';
				if(isset($error))
					echo '<p id="error" class="msg error">'.$error.'</p>';
				?>
			</div>
			<div class="col-md-6 order-form-grids">
				<div class="order-form-grid  wow fadeInLeft" data-wow-delay="0.4s">
					<h5>Order Information</h5>
					<span>Name</span><br>
					<input type="text" class="text validate[required]" placeholder="Enter Your Name" name="uname" required="required"> <br>
					<span>Type of Order</span>
					<div class="dropdown-button">
						<select class="dropdown" name="order_type" required="required" data-settings='{"wrapperClass":"flat"}'>
							<option value="Delivery">Delivery</option>	
							<option value="Take away">Take away</option>
						</select> 
					</div>
					<span>Cuisine Name</span>
					<div class="dropdown-button">
						<select class="dropdown" required="required"  name="cuisine" data-settings='{"wrapperClass":"flat"}'><?=(isset($products)) ? $products: ''; ?></select> 
					</div>
					<span>Restaurant Location</span>
					<div class="dropdown-button wow">           			
						<select class="dropdown" name="city" required="required" data-settings='{"wrapperClass":"flat"}'>
							<?=(isset($cities)) ? $cities: ''; ?>
						</select>

					</div>
					<!-- <span>Location name</span> -->
					<!-- <div class="dropdown-button">
						<select class="dropdown" name="location"  data-settings='{"wrapperClass":"flat"}'>
							<?=(isset($location)) ? $location: ''; ?>
						</select>
					</div> -->

					<span>Select Restaurant</span>
					<div class="dropdown-button">           			
						<select class="dropdown" name="restname"  data-settings='{"wrapperClass":"flat"}'>
							<?=(isset($rest_name)) ? $rest_name: ''; ?>
						</select>
					</div>
					<span>Delivery Time</span><br/>
					<input type="date" class="text validate[required]" name="delivery_date" tabindex="6" value="Time" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Time';}"><br>
					<div class="wow swing animated" data-wow-delay= "0.4s">
						<input type="submit" name="submitOrder" id="submitOrder" value="order now">
					</div>

				</div>
			</div>
			<div class="col-md-6 ordering-image wow bounceIn" data-wow-delay="0.4s">
				<img src="<?=ASSETS?>images/order.jpg" class="img-responsive" alt="" />
			</div>
		</div>
	</form>
</div>
