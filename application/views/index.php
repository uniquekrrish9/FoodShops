<div class="banner wow fadeInUp" data-wow-delay="0.4s" id="Home">
	<div class="container">
		<div class="banner-info">
			<div class="banner-info-head text-center wow fadeInLeft" data-wow-delay="0.5s">
				<h1>Network of over 100+ Restaurants</h1>
				<div class="line">
					<h2> PLace Your Order Online</h2>
				</div>
			</div>
			<!-- <div class="form-list wow fadeInRight" data-wow-delay="0.5s">
				<form>
					<ul class="navmain">
						<li><span>Location Name</span>
							<input type="text" class="text" value="Secunderabad" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Secunderabad';}">
						</li>
						<li><span>Restaurant Name</span>
							<input type="text" class="text" value="Swagath Grand" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Swagath Grand';}">
						</li>
						<li><span>Cuisine Name</span>
							<input type="text" class="text" value="Chicken Biriyani" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Chicken Biriyani';}">
						</li>
					</ul>
				</form>
			</div> -->
			<!-- start search-->
			<!-- <div class="main-search">
				<form action="search.html">
					<input type="text" value="Search" onFocus="this.value = '';" onBlur="if (this.value == '') {this.value = 'Search';}" class="text"/>
					<input type="submit" value=""/>
				</form>
				<div class="close"><img src="<?=ASSETS?>images/cross.png" /></div>
			</div> -->
			<!-- <div class="srch"><button></button></div> -->
			<!-- <script type="text/javascript">
				$('.main-search').hide();
				$('button').click(function (){
					$('.main-search').show();
					$('.main-search text').focus();
				}
				);
				$('.close').click(function(){
					$('.main-search').hide();
				});
			</script> -->
			
		</div>
	</div>
</div>
</div>
<!-- header-section-ends -->
<!-- content-section-starts -->
<div class="content">
	<div class="ordering-section" id="Order">
		<div class="container">
			<div class="ordering-section-head text-center wow bounceInRight" data-wow-delay="0.4s">
				<h3>Ordering food was never so easy</h3>
				<div class="dotted-line">
					<h4>Just 4 steps to follow </h4>
				</div>
			</div>
			<div class="ordering-section-grids">
				<div class="col-md-3 ordering-section-grid">
					<div class="ordering-section-grid-process wow fadeInRight" data-wow-delay="0.4s"">
						<i class="one"></i><br>
						<i class="one-icon"></i>
						<p>Choose <span>Your Restaurant</span></p>
						<label></label>
					</div>
				</div>
				<div class="col-md-3 ordering-section-grid">
					<div class="ordering-section-grid-process wow fadeInRight" data-wow-delay="0.4s"">
						<i class="two"></i><br>
						<i class="two-icon"></i>
						<p>Order  <span>Your Cuisine</span></p>
						<label></label>
					</div>
				</div>
				<div class="col-md-3 ordering-section-grid">
					<div class="ordering-section-grid-process wow fadeInRight" data-wow-delay="0.4s"">
						<i class="three"></i><br>
						<i class="three-icon"></i>
						<p>Pay   <span> online / on delivery</span></p>
						<label></label>
					</div>
				</div>
				<div class="col-md-3 ordering-section-grid">
					<div class="ordering-section-grid-process wow fadeInRight" data-wow-delay="0.4s"">
						<i class="four"></i><br>
						<i class="four-icon"></i>
						<p>Enjoy <span>your food </span></p>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="special-offers-section">
		<div class="container">
			<div class="special-offers-section-head text-center dotted-line">
				<h4>Special Offers</h4>
			</div>
			<div class="special-offers-section-grids">
				<div class="m_3"><span class="middle-dotted-line"> </span> </div>
				<div class="container">
					<ul id="flexiselDemo3">
						<?php
						if(isset($special_offers))
						{
							foreach ($special_offers as $row) {
								echo '<li><div class="offer"><div class="offer-image"><img src="'.ASSETS.'admin/products/'.$row['picture'].'" class="img-responsive" alt=""/></div><div class="offer-text"><h4>'.ucfirst($row['name']).'</h4><p>'.$row['details'].'</p><br/><h4>Offer Price: '.$row['spclprice'].'</h4><input type="button" value="Grab It"><span></span></div><div class="clearfix"></div></div></li>';
							}	}
							?></ul>
							<script type="text/javascript">
								$(window).load(function() {

									$("#flexiselDemo3").flexisel({
										visibleItems: 3,
										animationSpeed: 1000,
										autoPlay: false,
										autoPlaySpeed: 3000,    		
										pauseOnHover: true,
										enableResponsiveBreakpoints: true,
										responsiveBreakpoints: { 
											portrait: { 
												changePoint:480,
												visibleItems: 1
											}, 
											landscape: { 
												changePoint:640,
												visibleItems: 2
											},
											tablet: { 
												changePoint:768,
												visibleItems: 3
											}
										}
									});

								});
							</script>
							<script type="text/javascript" src="<?=ASSETS?>js/jquery.flexisel.js"></script>
						</div>
					</div>
				</div>
			</div>
			<div class="popular-restaurents" id="Popular-Restaurants">
				<div class="container">
					<div class="col-md-4 top-restaurents">
						<div class="top-restaurent-head">
							<h3>Top Restaurants</h3>
						</div>
						<div class="top-restaurent-grids">
							<div class="top-restaurent-logos">
								<?php
								if(isset($top_restaurants))
								{
									foreach ($top_restaurants as $row) {										
										echo '<div class="res-img-1 wow bounceIn" data-wow-delay="0.4s">'.$row['rest_name'].'
											<img src="'.ASSETS.'admin/rest_logo/'.$row['rest_logo'].'" class="img-responsive" alt="'.$row['rest_name'].'" /><br/></div>';
									}
								}
								?>
								<div class="clearfix"></div>
							</div>
						</div>
					</div>
					<div class="col-md-8 top-cuisines">
						<div class="top-cuisine-head">
							<h3>Top Cuisines</h3>
						</div>
						<div class="top-cuisine-grids">
							<div class="top-cuisine-grid wow bounceIn" data-wow-delay="0.4s">
								<a href=""><img src="<?=ASSETS?>images/cuisine1.jpg" class="img-responsive" alt="" /> </a>
								<label>Cuisine Name</label>
							</div>
							<div class="top-cuisine-grid wow bounceIn" data-wow-delay="0.4s">
								<a href=""><img src="<?=ASSETS?>images/cuisine2.jpg" class="img-responsive" alt="" /> </a>
								<label>Cuisine Name</label>
							</div>
							<div class="top-cuisine-grid wow bounceIn" data-wow-delay="0.4s">
								<a href=""><img src="<?=ASSETS?>images/cuisine3.jpg" class="img-responsive" alt="" /> </a>
								<label>Cuisine Name</label>
							</div>
							<div class="top-cuisine-grid nth-grid wow bounceIn" data-wow-delay="0.4s">
								<a href=""><img src="<?=ASSETS?>images/cuisine4.jpg" class="img-responsive" alt="" /> </a>
								<label>Cuisine Name</label>
							</div>
							<div class="top-cuisine-grid nth-grid1 wow bounceIn" data-wow-delay="0.4s">
								<a href=""><img src="<?=ASSETS?>images/cuisine5.jpg" class="img-responsive" alt="" /> </a>
								<label>Cuisine Name</label>
							</div>
							<div class="top-cuisine-grid nth-grid1 wow bounceIn" data-wow-delay="0.4s">
								<a href=""><img src="<?=ASSETS?>images/cuisine6.jpg" class="img-responsive" alt="" /> </a>
								<label>Cuisine Name</label>
							</div>
							<div class="top-cuisine-grid nth-grid1 wow bounceIn" data-wow-delay="0.4s">
								<a href=""><img src="<?=ASSETS?>images/cuisine7.jpg" class="img-responsive" alt="" /> </a>
								<label>Cuisine Name</label>
							</div>
							<div class="top-cuisine-grid nth-grid nth-grid1 wow bounceIn" data-wow-delay="0.4s">
								<a href=""><img src="<?=ASSETS?>images/cuisine8.jpg" class="img-responsive" alt="" /> </a>
								<label>Cuisine Name</label>
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
			<div class="service-section">
				<div class="service-section-top-row">
					<div class="container">
						<div class="service-section-top-row-grids wow bounceInLeft" data-wow-delay="0.4s">
							<div class="col-md-3 service-section-top-row-grid1">
								<h3>Enjoy Exclusive Food Order any of these</h3>
							</div>
							<div class="col-md-2 service-section-top-row-grid2">
								<ul>
									<li><i class="arrow"></i></li>
									<li class="lists">Party Orders</li>
								</ul>
								<ul>
									<li><i class="arrow"></i></li>
									<li class="lists">Home Made Food</li>
								</ul>
								<ul>
									<li><i class="arrow"></i></li>
									<li class="lists"> Diet Food </li>
								</ul>
							</div>
							<div class="col-md-5 service-section-top-row-grid3">
								<img src="<?=ASSETS?>images/lunch.png" class="img-responsive" alt="" />
							</div>
							<div class="col-md-2 service-section-top-row-grid4 wow swing animated" data-wow-delay= "0.4s">
								<input type="submit" value="Order Now">
							</div>
							<div class="clearfix"></div>
						</div>
					</div>
				</div>
				<div class="service-section-bottom-row">
					<div class="container">
						<div class="col-md-4 service-section-bottom-grid wow bounceIn "data-wow-delay="0.2s">
							<div class="icon">
								<img src="<?=ASSETS?>images/icon1.jpg" class="img-responsive" alt="" />
							</div>
							<div class="icon-data">
								<h4>100% Service Guarantee</h4>
								<p>Lorem ipsum dolor sit amet, consect-etuer adipiscing elit. </p>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="col-md-4 service-section-bottom-grid wow bounceIn "data-wow-delay="0.2s">
							<div class="icon">
								<img src="<?=ASSETS?>images/icon2.jpg" class="img-responsive" alt="" />
							</div>
							<div class="icon-data">
								<h4>Fully Secure Payment</h4>
								<p>Lorem ipsum dolor sit amet, consect-etuer adipiscing elit. </p>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="col-md-4 service-section-bottom-grid wow bounceIn "data-wow-delay="0.2s">
							<div class="icon">
								<img src="<?=ASSETS?>images/icon3.jpg" class="img-responsive" alt="" />
							</div>
							<div class="icon-data">
								<h4>Track Your Order</h4>
								<p>Lorem ipsum dolor sit amet, consect-etuer adipiscing elit. </p>
							</div>
							<div class="clearfix"></div>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>