<?php
session_start();
if(isset($_SESSION['admin'])=='')
{
	header("location: index.php?msg=Please login to access..");
}
include("connect.php");
$id=$_REQUEST['did'];
mysqli_query($conn,"delete from s_prod where sid=$id");
header("location: prod.php?msg=Product has Deleted sucessfully");
?>
