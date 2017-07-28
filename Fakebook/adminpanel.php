<?php
session_start();
?>
<head>
<script src="jquery-3.2.1.min.js"></script>
<script>
$(document).ready(function(){
	$(".boda").addClass("well").css("background","#e9ebee");
	$(".container .row").addClass("well");
	$(".header").addClass("well").css("background","black");
	$("button").addClass("animated bounce");
});
</script>

<style>
.boda:last-of-type{
	border-bottom: 2px solid #F00;
}
.container .row:first-child{
		padding-top: 10px;
		color: white;
		background: #3b5998;
		border-top: 2px solid #000;
}
.header{
	background: black;
	height: 80px;
	color: black;
}

</style>
</head>
<?php
include("dbconnect.php");
if($_SESSION['user']){
?>
	<body>	
	<link rel="stylesheet" href="bootstrap.min.css" type="text/css">
	<form action="adminpanel.php" method="GET">
	<div class="header">
		<div class="row">
			<div class="col-xs-2"></div>
			<div class="col-xs-4"><input type="text" name="spar" class="btn-block"/></div>
			<div class="col-xs-1"><button name="scmd" class="btn btn-info"><i class="fa fa-search">Search</i></button></div>
			<div class="col-xs-5"></div>
		</div>
	</div>
	</form>
	<div class="container boda">
		<div class="row">
			<div class="col-xs-1">User ID</div>
			<div class="col-xs-1">Profile Picture</div>
			<div class="col-xs-2">Username</div>
			<div class="col-xs-1">First Name</div>
			<div class="col-xs-1">Last Name</div>
			<div class="col-xs-1">Password</div>
			<div class="col-xs-1">Phone No.</div>
			<div class="col-xs-1">Address</div>
			<div class="col-xs-1">Role</div>
			<div class="col-xs-1">&nbsp;</div>
			<div class="col-xs-1">&nbsp;</div>
			
		</div>
	<?php
		if(isset($_GET['scmd'])){
			$serc = $_GET['spar'];
			$var = "SELECT * FROM tbl_users WHERE fname LIKE '%".$serc."%' ORDER BY uid";
			$run = mysqli_query($db,$var);
		
		while($count = mysqli_fetch_array($run)){	
			echo "<div class='row'>";
			echo "<div class='col-xs-1'>".$count['uid']."</div>";
			echo "<div class='col-xs-1'><img src='profile/".$count['pict']."' class='img-responsive'></div>";
			echo "<div class='col-xs-2'>".$count['uname']."</div>";
			echo "<div class='col-xs-1'>".$count['fname']."</div>";
			echo "<div class='col-xs-1'>".$count['lname']."</div>";
			echo "<div class='col-xs-1'>".$count['password']."</div>";
			echo "<div class='col-xs-1'>".$count['phone']."</div>";
			echo "<div class='col-xs-1'>".$count['addr']."</div>";
			echo "<div class='col-xs-1'>".$count['role']."</div>";
			echo "<div class='col-xs-1' ><form action='edit.php' method='POST'><button class='btn btn-warning' value='".$count['uid']."' name='uid'><i class='fa fa-pencil'></i>Edit</button>";
			echo "<input type='hidden' value=".$count['uid']." name='did' />";
			echo "</form></div>";
			echo "<div class='col-xs-1'><form action='controller.php' method='POST'><button class='btn btn-danger' value='".$count['uid']."' name='did'><i class='fa fa-trash'></i>Delete</button>";
			echo "</form></div>";
			echo "</div>";
		}
		echo "</div>";
		echo "<a href='adminpanel.php'><button class='btn'>Go Back!</button></a>";
		}
		else if($_SESSION['admin']){
		$var = "SELECT * FROM tbl_users ORDER BY uid";
		$run = mysqli_query($db,$var);
	
		while($count = mysqli_fetch_array($run)){
		echo "<div class='row'>";
			echo "<div class='col-xs-1'>".$count['uid']."</div>";
			echo "<div class='col-xs-1'><img src='profile/".$count['pict']."' class='img-responsive'></div>";
			echo "<div class='col-xs-2'>".$count['uname']."</div>";
			echo "<div class='col-xs-1'>".$count['fname']."</div>";
			echo "<div class='col-xs-1'>".$count['lname']."</div>";
			echo "<div class='col-xs-1'>".$count['password']."</div>";
			echo "<div class='col-xs-1'>".$count['phone']."</div>";
			echo "<div class='col-xs-1'>".$count['addr']."</div>";
			echo "<div class='col-xs-1'>".$count['role']."</div>";
			echo "<div class='col-xs-1' ><form action='edit.php' method='POST'><button class='btn btn-warning' value='".$count['uid']."' name='uid'><i class='fa fa-pencil'></i>Edit</button>";
			echo "<input type='hidden' value=".$count['uid']." name='did' />";
			echo "</form></div>";
			echo "<div class='col-xs-1'><form action='controller.php' method='POST'><button class='btn btn-danger' value='".$count['uid']."' name='did'><i class='fa fa-trash'></i>Delete</button>";
			echo "</form></div>";
			echo "</div>";
			
		}
		echo "</div>"; 
		echo "<a href='user.php'><button class='btn'>Go Back!</button></a>";
		}
		else{
			$_SESSIONN['error']="<p id='error'>You don't have Admin Privileges</p>";
			header("Location: user.php");
		}
}
else{
	$_SESSIONN['error']="<p id='error'>Sorry! You need to be Logged in</p>";
	header("Location: index.php");
}
	
?>
</body>