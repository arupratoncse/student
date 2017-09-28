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
	
	$result = mysql_query("delete from tbl_student where st_id='$id'");
		
	header('location: view.php');
}
else {
	header('location: view.php');
}