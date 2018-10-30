	<div class="container">
		<div class="login-page">
			<div class="dreamcrub">
				<ul class="breadcrumbs">
					<li class="home">
						<a href="index.html" title="Go to Home Page">Home</a>&nbsp;
						<span>&gt;</span>
					</li>
					<li class="women">
						Login
					</li>
				</ul>
				<ul class="previous">
					<li><a href="<?=PATH?>">Back to Previous Page</a></li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="account_grid">
				<div class="col-md-6 login-left wow fadeInLeft" data-wow-delay="0.4s">
					<h3>NEW CUSTOMERS</h3>
					<p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
					<a class="acount-btn" href="<?=PATH?>Register">Create an Account</a>
				</div>
				<div class="col-md-6 login-right wow fadeInRight" data-wow-delay="0.4s">
					<h3>REGISTERED CUSTOMERS</h3>
					<p>If you have an account with us, please log in.</p>
					<?php 
					if(isset($success))
						echo '<div class="alert alert-success alert-dismissable">
					<i class="fa fa-check"></i>
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b>'.$success.'</b></div>';
					if(isset($error))
						echo '<div class="alert alert-danger alert-dismissable">
					<i class="fa fa-check"></i>
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><b>'.$error.'</b></div>';
					?>
					<form action="<?=PATH?>login" method="post">
						<div>
							<span>Email Address<label>*</label></span>
							<input type="text" name="Username"> 
						</div>
						<div>
							<span>Password<label>*</label></span>
							<input type="password" name="Password"> 
						</div>
						<a class="forgot" href="#">Forgot Your Password?</a>
						<input type="submit" value="Login" name="submit">
					</form>
				</div>	
				<div class="clearfix"> </div>
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