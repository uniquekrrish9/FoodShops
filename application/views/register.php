
<div class="container">
	<div class="register">
		<form action="<?=PATH?>Register" method="post">
			<div class="register-top-grid">

				<h3>PERSONAL INFORMATION</h3>
				<div class="wow fadeInLeft" data-wow-delay="0.4s">
					<span>First Name<label>*</label><?=" ".form_error('fname')?></span>
					<input type="text" name="fname" required="true">
				</div>
				<div class="wow fadeInRight" data-wow-delay="0.4s">
					<span>Last Name<label>*</label><?=" ".form_error('lname')?></span>
					<input type="text" required="true" name="lname"> 
				</div>
				<div class="wow fadeInRight" data-wow-delay="0.4s">
					<span>Email Address<label>*</label><?=" ".form_error('email')?></span>
					<input type="text" name="email" required="true" > 
				</div>
				<div class="clearfix"> </div>
				<a class="news-letter" href="#">
					<!-- <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>Sign Up for Newsletter</label> -->
				</a>
			</div>
			<div class="register-bottom-grid">
				<h3>LOGIN INFORMATION</h3>
				<div class="wow fadeInLeft" data-wow-delay="0.4s">
					<span>Password<label>*</label><?=" ".form_error('pwd')?></span>
					<input type="password" required="true" name="pwd">
				</div>
				<div class="wow fadeInRight" data-wow-delay="0.4s">
					<span>Confirm Password<label>*</label></span>
					<input type="password" name="pwd2" required="true">
				</div>
			</div>

			<div class="clearfix"> </div>
			<div class="register-but">

				<input type="submit" value="submit" name="submit"/>
				<div class="clearfix"> </div>

			</div>
		</form><br>
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
									autoPlay: true,
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
