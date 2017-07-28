<?php
session_start();
?>
<link rel="stylesheet" href="signup.css" type="text/css">
<link rel="stylesheet" href="bootstrap.min.css" type="text/css">
<html>
<head><title>Lorem</title>
</head>
<body>
<div id="signuppage">
	<div class="corrector container">
		<h1 class="text-center">Fakebook</h1>
		<hr>
	<div class="class1">
		<p class="text-primary text-center" style="font-size: 20px;"><u>Sign Up Information</u></p>
		<form action="controller.php" method="POST" enctype="multipart/form-data">
		<div id="pader">
			<div class="row marger">
				<div class="col-md-6"><input type="text" placeholder="First Name" name="fname" class="btn btn-block btn-default"/></div>
				<div class="col-md-6"><input type="text" placeholder="Last Name" name="lname" class="btn btn-block btn-default"/></div>
			</div>
			
			<div class="row marger">
				<div class="col-md-12"><input type="text" placeholder="Username" name="uname" class="btn btn-block btn-default"/></div>
			</div>
			
			<div class="row marger">
				<div class="col-md-12"><input type="password" placeholder="Password" name="upass" class="btn btn-block btn-default"/></div>
			</div>
			
			<div class="row marger">
				<div class="col-md-12"><input type="password" placeholder="Confirm Password" name="cpass" class="btn btn-block btn-default"/></div>
			</div>
			
			<div class="row marger">
				<div class="col-md-12"><input type="text" placeholder="Phone No." name="phone" class="btn btn-block btn-default"/></div>
			</div>
			
			<div class="row marger">
				<div class="col-md-12"><input type="text" placeholder="Address" name="addr" class="btn btn-block btn-default"/></div>
			</div>
			
			<div class="row marger">
				<div class="col-md-12"><input type="file" name="pict" class="btn btn-block btn-default"/></div>
			</div>
		</div>
	</div>
	
	<div class="text-center" style="padding:10px;"><button class="btn-primary btn-lg" type="submit" name="create">Create Account</button></div>
	</form>
</div>
</body>
</html>
