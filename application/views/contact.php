	<div class="contact-section-page" style="background-color: #fff;">
		<div class="contact-head">
			<div class="container">
				<h3>Contact</h3>
				<p>Home/Contact</p>
			</div>
		</div>
		<div class="contact_top">
			<div class="container">
				<div class="col-md-6 contact_left wow fadeInRight" data-wow-delay="0.4s">
					<h4>Contact Form</h4>
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
					<form action="<?=PATH?>Contact" method="POST">
						<div class="col-md-8 order-form-grids">
							<div class="order-form-grid  wow fadeInLeft" data-wow-delay="0.4s" >
								<span>Enter Your Name:</span>
								<input type="text" class="text" name="uname"/>
								<?=form_error('uname')?><br>
								<span>Enter Your Email ID:</span><br>
								<input type="text" class="text" name="email"/>
								<?=form_error('email')?><br>
								<span>Enter Your Phone Number:</span>
								<input type="text" class="text" name="phone"/>
								<?=form_error('phone')?><br>
								<span>Enter Subject:</span>
								<input type="text" class="text"  name="subject" />
								<?=form_error('subject')?><br>
								<span>Enter Your Message:</span><br>
								<textarea name="msg" style="width: 250px;outline:none;padding:0.4em;width:75%;margin:1em 0;font-weight:600;font-size:16px;border: 1px solid #5BBD50;" >Message</textarea>
								<div class="clearfix"> </div>

								<div class="sub-button wow swing animated" data-wow-delay= "0.4s">
									<input name="submit" name="submit" type="submit" value="Send message">
								</div>
							</div></div>
						</form>
					</div>
					<div class="col-md-6 company-right wow fadeInLeft" data-wow-delay="0.4s">
						<div class="contact-map">
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14687.269470331268!2d72.51073877153543!3d23.030477009182803!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395e9b353bc60d91%3A0xd5e48ea22ff8d924!2sSatellite%2C+Ahmedabad%2C+Gujarat!5e0!3m2!1sen!2sin!4v1492164871757" frameborder="0" style="border:0" allowfullscreen></iframe>
						</div>

						<div class="company-right">
							<div class="company_ad">
								<h3>Contact Info</h3>
<!-- 							<span>Lorem ipsum dolor sit amet, consectetur adipiscing elit velit justo.</span>
-->							<address>
<p>email:<a href="mail-to: sagarswtboy@gmail.com">sagarswtboy@gmail.com</a></p>
<p>phone:  +91 7777 992261</p>
<p>Near Prernatirth Jain Derasar</p>
<p>Jodhpur Gaam, Satellite, Ahmedabad</p>

</address>
</div>
</div>	
<div class="follow-us">
	<h3>follow us on</h3>
	<a href="#"><i class="facebook"></i></a>
	<a href="#"><i class="twitter"></i></a>
	<a href="#"><i class="google-pluse"></i></a>
</div>
</div>
</div>
</div></div>
