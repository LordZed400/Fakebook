<?php
session_start();
include("dbconnect.php");
if(!isset($_SESSION['admin'])){
	if(isset($_SESSION['user'])){
		header("Location: user.php");
	}
}

if(isset($_POST['usubm']))
{
	$uname = $_POST['uname'];
	$upass = $_POST['upass'];
	$var = "SELECT * FROM tbl_users ORDER BY uid";
	$run = mysqli_query($db,$var);
	while($count = mysqli_fetch_array($run)){
		if($count['uname']==$uname and $count['password']==$upass)
		{
			$_SESSION['user']=$count['uid'];
			if($count['role']=="admin")
				$_SESSION['admin']=1;
			header("Location: user.php");
		}
	}
	if(!isset($_SESSION['user'])){
		$_SESSION['error']="<p id='error'>Wrong Login Information</p>";
		header("Location: index.php?c=".$count);
	}

}
if(isset($_POST['create'])){
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$uname = $_POST['uname'];
	$upass = $_POST['upass'];
	$cpass = $_POST['cpass'];
	$phone = $_POST['phone'];
	$addr = $_POST['addr'];
	$role =  'user';
	move_uploaded_file($_FILES['pict']['tmp_name'],"profile/".$_FILES['pict']['name']);
	$pict = $_FILES['pict']['name'];
	if($upass==$cpass){
		$var = "SELECT * FROM tbl_users WHERE uname='".$uname."'";
		$run = mysqli_query($db,$var);
		$count= mysqli_num_rows($run);
		if($count){
			$_SESSION['error']="<p id='error'>The Username is already Taken</p>";
			header("Location: index.php");
		}
		else{
			$temp = "INSERT INTO tbl_users(fname,lname,uname,password,phone,addr,role,pict) VALUES ('$fname', '$lname', '$uname', '$upass', '$phone', '$addr', '$role' , '$pict')";
			$temp2 = mysqli_query($db,$temp);
			if($temp2){
				$_SESSION['error']="<p id='success'>Account Successfully created</p>";
				header("Location: index.php");
			}
			else{
				$_SESSION['error']="<p id='error'>Problem Creating Account</p>";
				header("Location: index.php");
			}
		}
	}
	else{
		$_SESSION['error']="<p id='error'>Wrong Confirmation Password</p>";
		header("Location: index.php");
	}
}

if(isset($_POST['did'])){
	if($_POST['did']!=$_SESSION['user']){
		$var = "DELETE FROM tbl_users WHERE uid='".$_POST['did']."'";
		$run = mysqli_query($db,$var);
		if($run){
			$_SESSION['error']="<p id='success'>Successfully Deleted</p>";
			header("Location: user.php");
		}
		else{
			$_SESSION['error']="<p id='error'>Couldn't delete due to Server error</p>";
			header("Location: user.php");
		}
	}
	else{
		$_SESSION['error']="<p id='error'>Please don't Suicide</p>";
		header("Location: user.php");
	}	
}

if(isset($_POST['upd'])){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$uname = $_POST['uname'];
		$upass = $_POST['upass'];
		$phone = $_POST['phone'];
		$addr = $_POST['addr'];
		$role = $_POST['role'];
		move_uploaded_file($_FILES['pict']['tmp_name'],"profile/".$_FILES['pict']['name']);
		$pict = $_FILES['pict']['name'];
	
	$var = "UPDATE tbl_users SET fname = '".$fname."', lname = '".$lname."', uname = '".$uname."', password = '".$upass."', phone = '".$phone."', addr = '".$addr."', role = '".$role."', pict = '".$pict."' WHERE uid='".$_POST['uxd']."'";
	
	$run = mysqli_query($db,$var);
	if($run){
		$_SESSION['error']="<p id='success'>Successfully Edited</p>";
		header("Location: user.php");
	}
	else{
		$_SESSION['error']="<p id='error'>Error Editing Info</p>";
		header("Location: user.php");
	}
}
?>
