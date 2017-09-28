<?php include('header.php');?>
<?php
if($_SESSION['name']!='ratonpust')
{
	header('location: login.php');
}
?>
<?php
include('config.php');

if(isset($_REQUEST['id'])) {
	$id = $_REQUEST['id'];
}
else {
	header('location: view.php');
}

if(isset($_POST['form1'])) {

	try {
	
	
		if(empty($_POST['st_name'])) {
			throw new Exception('Name can not be empty');
		}
		
		if(empty($_POST['st_roll'])) {
			throw new Exception('Roll can not be empty');
		}
		
		if(empty($_POST['st_age'])) {
			throw new Exception('Age can not be empty');
		}
		
		if(empty($_POST['st_email'])) {
			throw new Exception('Email can not be empty');
		}
		
		
		
		//$result = mysql_query("insert into tbl_student (st_name,st_roll,st_age,st_email) values('$_POST[st_name]','$_POST[st_roll]','$_POST[st_age]','$_POST[st_email]') ");
		
		$result = mysqli_query($link,"update tbl_student set st_name='$_POST[st_name]',st_roll='$_POST[st_roll]',st_age='$_POST[st_age]',st_email='$_POST[st_email]' where st_id='$id'");
			
		
		$success_message = 'Data has been updated successfully.';
		
	}
	
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
	
}

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Information Update</title>
</head>
<body>

<div class="content">
<h2>Update Information</h2>

<?php  
if(isset($error_message)) {echo $error_message;}
if(isset($success_message)) {echo $success_message;}
?>

<br>

<?php

$result = mysqli_query($link,"select * from tbl_student where st_id='$id'");
while($row=mysqli_fetch_array($result)) 
{
	$st_name_old = $row['st_name'];
	$st_roll_old = $row['st_roll'];
	$st_age_old = $row['st_age'];
	$st_email_old = $row['st_email'];
}

?>


<form action="" method="post">
<table>
	<tr>
		<td>Name: </td>
		<td><input type="text" name="st_name" value="<?php echo $st_name_old; ?>"></td>
	</tr>
	<tr>
		<td>Roll: </td>
		<td><input type="text" name="st_roll" value="<?php echo $st_roll_old; ?>"></td>
	</tr>
	<tr>
		<td>Age: </td>
		<td><input type="text" name="st_age" value="<?php echo $st_age_old; ?>"></td>
	</tr>
	<tr>
		<td>Email: </td>
		<td><input type="text" name="st_email" value="<?php echo $st_email_old; ?>"></td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" value="Update" name="form1"></td>
	</tr>
</table>

<input type="hidden" name="id" value="<?php echo $id; ?>">

</form>


<br>
<a href="modify.php">Back to previous</a>
</div>
<?php include('footer.php')?>	
</body>
</html>