<?php
session_start();
?>
<link rel="stylesheet" type="text/css" href="index.css">
<html>
<head><title>Lorem</title>
</head>
<body>
	<div class="corrector">
		<h1>Fakebook</h1>
		<hr>
		<div class="class1">
		<?php
		if(isset($_SESSION['user'])){
			header("Location: user.php");
		}
		else if(isset($_SESSION['error'])){
				echo $_SESSION['error'];
				unset($_SESSION['error']);
		}
		else{
			echo "<p id='normal'>LOGIN</p>";
		}
		?>	
		</div>
			<form action="controller.php" method="POST">
				<table border="0" cellspacing="2" align="center">
					<tr>
						<td>Email or Phone:</td>
						<td>Password:</td>
					</tr>
					<tr>
						<td><input type="text" placeholder="Username" name="uname" /></td>
						<td><input type="password" placeholder="Password" name="upass" /></td>
						<td colspan="2" align="right"><input type="submit" name="usubm" value="DO IT!"/></td>
					</tr>			
				</table>
			</form>
		</div>
		<h2>Not Signed in yet?</h2>
		<button><a href="signup.php" style="text-decoration:none;">Sign Up</a></button>
	</div>
</body>
</html>