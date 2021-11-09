<?php
session_start();
if(isset($_SESSION['vendor'])=="")
{
	header("location: index.php?msg=Please login to access..");
}
include("connect.php");
$i=$_REQUEST['did'];
mysqli_query($conn,"delete from inquiry where iid=$i") or die ("query fail");
header("location: show_inquiry.php?msg=data are deleted...");

?>