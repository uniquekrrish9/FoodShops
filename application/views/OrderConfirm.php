	<div class="contact-section-page" style="background-color: #fff;">
		<div class="contact-head">
			<div class="container">
				<h3>Confirm Order</h3>
				<p>Home/Confirm Order</p>
			</div>
		</div>
		<div class="contact_top">
			<div class="container">
				<div class="col-md-6 contact_left wow fadeInRight" data-wow-delay="0.4s">
					<h4>Confirm Your Order Here</h4>
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
					<br />
					<a href="<?=PATH?>">Back to Home</a>
				</div>

			</div>
		</div></div>
