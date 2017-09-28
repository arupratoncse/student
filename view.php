<?php include('config.php'); ?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Data View</title>
</head>
<body>
<?php include('header.php') ?>
<div class="content">
<h2>View All Data from Database</h2>

<?php  
//if(isset($error_message)) {echo $error_message;}
//if(isset($success_message)) {echo $success_message;}
?>

<br>

<table class="tbl2">
	<tr>
		<th width="10%">Serial No</th>
		<th width="30%">Name</th>
		<th width="15%">Roll</th>
		<th width="15%">Age</th>
		<th width="30%">Email Address</th>
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
		</tr>
		
		<?php
	}
	
	?>
	
	
</table>
</div>

<?php include('footer.php') ?>	
</body>
</html>