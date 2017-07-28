<?php
session_start();
include("dbconnect.php");
if(isset ($_SESSION['user'])){
	$var = "SELECT * FROM tbl_users WHERE uid = ".$_SESSION['user'];
	$run = mysqli_query($db,$var); 
	$temp = mysqli_fetch_array($run);
?>
<link rel="stylesheet" href="bootstrap.min.css" type="text/css">
<link rel="stylesheet" type="text/css" href="user.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css"/>

<div class="one row">	
	<div class="col-lg-2"></div>
	<div class="col-lg-2"></div>
	<div class="col-lg-2"></div>
	<div class="col-lg-4"><?php if(isset($_SESSION['admin'])) echo "<a href='adminpanel.php'>Admin Panel</a>"; ?></div>
	<div class="col-lg-1 "><?php echo $temp['fname'] ?></div>
	<div class="col-lg-1"><i class="fa fa-caret-down text-right"></i></div></div>
<div class="one row">
	<p><?php if(isset($_SESSION['error'])){ echo $_SESSION['error']; unset($_SESSION['error']); }	 ?></p>
	</div>
<div class="one">	</div>
<div class="one">	</div>
<br><button class="btn btn-danger"><a href="logout.php" style="text-decorative: none;">Log Out</a></button>
<?php
	}
else
{
	$_SESSION['error']="<p id='error'>Sorry! You need to be Logged in</p>"; 
	header("Location: index.php");
}
?>

