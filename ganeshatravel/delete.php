<?php
include('config.php');
if (isset($_GET['id']))
{
	$id=$_GET['id'];
	$query=mysqli_query($con,"delete from reservasi where idReservasi='$id'");
	if($query){
		header('location: edit.php');
	}
}
?>
