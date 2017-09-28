<?php include('header.php') ?>
<?php

if(isset($_POST['form_login'])) 
{
	
	try {
	
		
		if(empty($_POST['username'])) {
			throw new Exception('Username can not be empty');
		}
		
		if(empty($_POST['password'])) {
			throw new Exception('Password can not be empty');
		}
	
		include('config.php');
		$num=0;
		$result = mysqli_query($link,"select * from tbl_login where username='$_POST[username]' and password='$_POST[password]'");
		$num = mysqli_num_rows($result);
		
		if($num>0) 
		{
			
			$_SESSION['name'] = "ratonpust";
			header("location: index.php");
		}
		else
		{
			throw new Exception('Invalid Username and/or password');
		}
	
	
	
	}
	
	catch(Exception $e) {
		$error_message = $e->getMessage();
	}
	
}

?>
<div class="content">
<h1>Login-Contract Management System</h1>
<div style="color:red; font-weight: bold;">
<?php
if(isset($error_message))
{
	echo $error_message;
}
?>
</div>
	<form action="" method="post">
		<table>
			<tr>
				<td>Username: </td>
				<td><input type="text" name="username" placeholder="Username" required></td>
			</tr>
			<tr>
				<td>Password: </td>
				<td><input type="password" name="password" placeholder="Password" required></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit" value="Login" name="form_login"></td>
			</tr>
		</table>
	</form>

</div>
<?php include('footer.php') ?>