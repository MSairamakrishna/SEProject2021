<?php
session_start();
if(isset($_SESSION['admin'])=='')
{
	header("location: index.php?msg=Please login to access..");
}
include("connect.php");
$id=$_REQUEST['did'];
$query=mysqli_query($conn,"delete from product where sid=$id");
if($query)
{
	header("location: prod.php?msg=Product has Deleted successfully");
} 
else 
{
	header("location: prod.php?msg=Product can't be deleted");
}
?>