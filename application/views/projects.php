<?php include_once('header.php'); ?>
<script type="text/javascript">
	function validate()
	{
		var x = document.getElementById("frm1");
		var pwd = document.getElementById("pwd");
		var pwd2 = document.getElementById("pwd2");

		if(x.elements[1].value != x.elements[2].value)
		{
			alert('Password Mismatch. Please Enter Same Password');
			return false;
		}
		else{ return true;}
	}
	function chek_mob(mob_no)
	{
		if(mob_no.value.length<10)
		{
			alert('Please Enter 10 Digit Mobile No.');
			return false;
		}
		else{
			return true;
		}

	}	
</script>

<div class="page-head" data-bg-image="images/page-head-3.jpg">
	<div class="container">
		<h2 class="page-title">Our Projects</h2>
		<small>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit consequuntur magni </small>
	</div>
</div>

<main class="main-content">
	<div class="fullwidth-block">
		<div class="container">
			<h2 class="section-title">User Registration</h2>
			<div class="row contact-form">
				<form action="projects.php" id="frm1" method="post">
					<div class="col-md-4">
						<p>Username:</p>
						<p><input type="text" name="uname" placeholder="Your name..." required="true"></p>
						<p>Password:</p>
						<p><input type="password" required="true" name="pwd" placeholder="Your Password..."></p>
						<p>Confirm Password:</p>
						<p><input type="password" name="pwd2" required="true" onblur="validate()" placeholder="Your Confirm Password..."></p>
						<p>Email ID:</p>
						<p><input type="email" name="email" placeholder="Your Email..." required="true"></p>
						<p>Mobile:</p>
						<p><input type="text" name="mob_no" placeholder="Your Mobile No..." onblur="chek_mob(this)"></p>
						<input type="submit" value="Login Here" name="submit">
						<p style="color: red"><?php 
							if(isset($_REQUEST['msg'])) { echo $_REQUEST['msg']; }
							;
							?></p>
						</div>
					</form>
				</div>
			</div>
		</div>


		<div class="fullwidth-block" data-bg-color="#edf2f4">
			<div class="container">
				<div class="subscribe-form">
					<h2>Join our newsletter</h2>
					<form action="#">
						<input type="text" placeholder="Enter your email">
						<input type="submit" value="Subscribe">
					</form>
				</div>
			</div>
		</div>

	</main> <!-- .main-content -->

	<?php include_once('footer.php'); ?>
	<?php 
include_once('config.php');
if(isset($_POST['submit']))
	{
extract($_POST);
$qry="insert into users(email,username,password,mob_no) value('".$email."','".$uname."','".$pwd2."','".$mob_no."')";

		$res=mysqli_query($conn,$qry);
		if($res)
			{?>
		<script type="text/javascript">
			window.location.href='projects.php?msg=One Record Inserted';

		</script>

		<?php }
		else
		{
			echo mysqli_error($conn);
		}
	}


	?>