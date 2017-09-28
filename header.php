<?php 
	ob_start();
	session_start();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Welcome to Student Management System</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="main">
<h2>Student Management System</h2>
<div class="manu">
<ul>
	<li><a href="index.php">Home</a></li>
	<li><a href="insert.php">Insert Data</a></li>
	<li><a href="view.php">Show Data</a></li>
	<li><a href="modify.php">Update</a></li>
	<li><a href="logout.php">Logout</a></li>

</ul>
</div>