<?php
session_start();
session_destroy();
session_start();
$_SESSION['error']="<p id='success'>Successfully Logged Out!!!</p>";
header("Location: index.php");
?>