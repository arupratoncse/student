<?php include('header.php');?>
<?php
if($_SESSION['name']!='ratonpust')
{
	header('location: login.php');
}
?>
<?php include('config.php'); ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Update information</title>
	
	<script>
		function confirm_delete() {
			return confirm('are you sure want to delete this data?');
		}
	</script>
	
	
</head>
<body>

<div class="content">
<h2>Select Update Data</h2>

<?php  
//if(isset($error_message)) {echo $error_message;}
//if(isset($success_message)) {echo $success_message;}
?>

<br>

<table class="tbl2">
	<tr>
		<th width="10%">Serial No</th>
		<th width="25%">Name</th>
		<th width="8%">Roll</th>
		<th width="7%">Age</th>
		<th width="25%">Email Address</th>
		<th width="25%">Action</th>
	</tr>
	<?php
	$i=0;
	$result = mysqli_query($link,"select * from tbl_student");
	while($row=mysqli_fetch_array($result)) 
	{
		$i++;
		?>
		
		<tr>
		<td><?php echo $i; ?></td>
		<td><?php echo $row['st_name']; ?></td>
		<td><?php echo $row['st_roll']; ?></td>
		<td><?php echo $row['st_age']; ?></td>
		<td><?php echo $row['st_email']; ?></td>
		<td>
			<a href="update.php?id=<?php echo $row['st_id']; ?>">Edit</a>&nbsp;|&nbsp;
			<a onclick="return confirm_delete();" href="delete.php?id=<?php echo $row['st_id']; ?>">Delete</a>
		</td>
		</tr>
		
		<?php
	}
	
	?>
	
	
</table>
</div>
<?php include('footer.php');?>	
</body>
</html>