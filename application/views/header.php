<!DOCTYPE html>
<html>
<head>
	<title>Food4Fun Website :: Food for EveryOne | Home :: Food4Fun ::</title>
	<link href="<?=ASSETS?>css/bootstrap.css" rel='stylesheet' type='text/css' />
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="<?=ASSETS?>js/jquery.min.js"></script>
	<!-- Custom Theme files -->
	<link href="<?=ASSETS?>css/style.css" rel="stylesheet" type="text/css" media="all" />
	<!-- Custom Theme files -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
	<!--webfont-->
	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900,200italic,300italic,400italic,600italic,700italic,900italic' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lobster+Two:400,400italic,700,700italic' rel='stylesheet' type='text/css'>
	<!--Animation-->
	<script src="<?=ASSETS?>js/wow.min.js"></script>
	<link href="<?=ASSETS?>css/animate.css" rel='stylesheet' type='text/css' />
	<script>
		new WOW().init();
	</script>
	<script type="text/javascript" src="<?=ASSETS?>js/move-top.js"></script>
	<script type="text/javascript" src="<?=ASSETS?>js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function($) {
			$(".scroll").click(function(event){		
				event.preventDefault();
				$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
			});
		});
	</script>
</head>
<body>
	<?php
	$session = get_session_details();
	$link='';
	if(isset($session->userdetails) && !empty($session->userdetails))
	{
		$loggedadmin = (object)$session->userdetails;
		$link='<ul><li><a href="javascript:;">Welcome, '.ucfirst($loggedadmin->username).'</a></li> |<li><a href="'.PATH.'logout">Logout</a>  </li>
	</ul>';

}
else
{
	$link='<ul>
	<li><a href="'.PATH.'Login">Login</a>  </li> |
	<li><a href="'.PATH.'Register">Register</a> </li> |
	<li><a href="#">Help</a></li>
	<div class="clearfix"></div>
</ul>';
}
?>
<!-- header-section-starts -->
<div class="header">
	<div class="container">
		<div class="top-header">
			<div class="logo">
				<a href=""><img src="<?=ASSETS?>images/logo.png" class="img-responsive" alt="" /></a>
			</div>
			<div class="queries">
				<p>Questions? Call us Toll-free!<span>7777992261 </span><label>(11AM to 12PM)</label></p>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="menu-bar">
		<div class="container">
			<div class="top-menu">
				<ul>
					<li class="active"><a href="<?=PATH?>">Home</a></li>|
					<li><a href="#">Popular Restaurants</a></li>|
					<li><a href="<?=PATH?>Order">Order</a></li>|
					<li><a href="<?=PATH?>Contact">contact</a></li>
					<div class="clearfix"></div>
				</ul>
			</div>
			<div class="login-section">
				<?=$link?>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="content">
		<div class="main">