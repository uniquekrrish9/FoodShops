<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>:: SHRADDHA PATHOLOGY LABORATORY - ADMIN PANEL ::</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes"> 

	<link href="<?=ASSETS2?>css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<link href="<?=ASSETS2?>css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

	<link href="<?=ASSETS2?>css/font-awesome.css" rel="stylesheet">
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">

	<link href="<?=ASSETS2?>css/style.css" rel="stylesheet" type="text/css">
	<link href="<?=ASSETS2?>css/pages/signin.css" rel="stylesheet" type="text/css">
	<script type="text/javascript">
		function validate()
		{
			var x = document.getElementById("frm1");
			var pwd = document.getElementById("password");
			var pwd2 = document.getElementById("password2");

			if(x.elements[2].value != x.elements[3].value)
			{
				x.elements[3].style.borderColor="red";
				document.getElementById("c").innerHTML="Password Mismatch. Please Enter same passowrd";
			}
			else{ x.elements[3].style.borderColor="#cccccc";
				document.getElementById("c").innerHTML=''; 
			return true;
		}
	}
</script>

</head>

<body>
	
	<div class="navbar navbar-fixed-top">

		<div class="navbar-inner">

			<div class="container">

				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>

				<a class="brand" href="<?=PATH?>">
					:: SHRADDHA PATHOLOGY LABORATORY - ADMIN PANEL ::
				</a>		

				<div class="nav-collapse">
					<ul class="nav pull-right">
						<li class="">						
							<a href="<?=Adminpath?>" class="">
								Already have an account? Login now
							</a>

						</li>
						<li class="">						
							<a href="<?=PATH?>" class="">
								<i class="icon-chevron-left"></i>
								Back to Homepage
							</a>

						</li>
					</ul>

				</div><!--/.nav-collapse -->	

			</div> <!-- /container -->

		</div> <!-- /navbar-inner -->

	</div> <!-- /navbar -->



	<div class="account-container register">
		<div class="login-extra">
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
		</div> <!-- /login-extra -->

		<div class="content clearfix">

			<form action="<?=Adminpath?>Register" id="frm1" method="post">

				<h1>Register Your Account</h1>			

				<div class="login-fields">

					<p>Create your free account:</p>
					<div class="field">
						<p>Full Name:</p>
						<input type="text" id="fname" name="fname" value="" placeholder="Enter your full name" class="login" />
					</div>
					<div class="field">
						<p>Username:</p>
						<input type="text" id="username" name="username" value="" placeholder="Enter username" class="login" />
					</div> <!-- /field -->

					<div class="field">
						<p>Password:</p>
						<input type="password" id="password" name="password" value="" placeholder="Enter password" class="login" />
					</div> <!-- /field -->
					<div class="field">
						<p>Confirm Password:</p><p id="c"></p>
						<input type="password" id="password2" onblur="validate()" name="password2" value="" placeholder="Enter confirm password" class="login" />
					</div> <!-- /field -->


					<div class="field">
						<p>Email Address:</p>
						<input type="email" id="email" name="email" value="" placeholder="Enter Email" class="login"/>
					</div> <!-- /field -->

				</div> <!-- /login-fields -->

				<div class="login-actions">

					<span class="login-checkbox">
						<input id="Field" name="Field" type="checkbox" class="field login-checkbox" value="First Choice" tabindex="4" />
						<label class="choice" for="Field">Agree with the Terms & Conditions.</label>
					</span>

					<input type="submit" name="submit" value="Register" class="button btn btn-primary btn-large">

				</div> <!-- .actions -->

			</form>

		</div> <!-- /content -->

	</div> <!-- /account-container -->
	<script src="<?=ASSETS2?>js/jquery-1.7.2.min.js"></script>
	<script src="<?=ASSETS2?>js/bootstrap.js"></script>

	<script src="<?=ASSETS2?>js/signin.js"></script>
</body>

</html>
