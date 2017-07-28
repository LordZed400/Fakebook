<?php
session_start();
include("dbconnect.php");
$var = "SELECT * FROM tbl_users WHERE uid=".$_POST['uid'];
$run = mysqli_query($db,$var);
$count = mysqli_fetch_array($run);
?>
<link rel="stylesheet" href="signup.css" type="text/css">
<link rel="stylesheet" href="bootstrap.min.css" type="text/css">
<html>
<head><title>Lorem</title>
</head>
<body>
<div id="signuppage">
	<div class="corrector container">
		<div class="class1">
		<p class="text-primary text-center" style="font-size: 20px;"><u>Edit Information</u></p>
		<form action="controller.php" method="POST" enctype="multipart/form-data">
		<div id="pader">
			<div class="row marger">
			<div class="col-md-6"><input type="text" value="<?php echo $count['fname']; ?>" name="fname" class="btn btn-block btn-default"/></div>
			<div class="col-md-6"><input type="text" value="<?php echo $count['lname']; ?>" name="lname" class="btn btn-block btn-default"/></div>
			</div>
			
			<div class="row marger">
				<div class="col-md-12"><input type="text" value="<?php echo $count['uname']; ?>" name="uname" class="btn btn-block btn-default"/></div>
			</div>
			
			<div class="row marger">
				<div class="col-md-12"><input type="password" value="<?php echo $count['password']; ?>" name="upass" class="btn btn-block btn-default"/></div>
			</div>
			
			<div class="row marger">
				<div class="col-md-12"><input type="text" value="<?php echo $count['phone']; ?>" name="phone" class="btn btn-block btn-default"/></div>
			</div>
			
			<div class="row marger">
				<div class="col-md-12"><input type="text" value="<?php echo $count['addr']; ?>" name="addr" class="btn btn-block btn-default"/></div>
			</div>
			
			<div class="row marger">
				<div class="col-md-12"><select name="role" class="btn btn-block btn-default"><option value="admin"<?php if($count['role']=='admin') echo "selected"; ?>>Admin</option><option value="user" <?php if($count['role']=='user') echo "selected"; ?>>User</option></select></div>
			</div>			
			
			<div class="row marger">
				<div class="col-md-12"><input type="file" name="pict" class="btn btn-block btn-default"/></div>
			</div>
			
		</div>
	</div>
	<input type="hidden" value="<?php echo $count['uid']; ?>" name="uxd">
	<div class="text-center" style="padding:10px;"><button type="submit" class="btn-primary btn-lg" name="upd">Update</button></div>
	</form>
</div>
</body>
</html>
