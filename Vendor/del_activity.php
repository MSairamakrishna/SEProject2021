<?php 
session_start();
if(isset($_SESSION['admin'])=="")
{
	header("location: index.php?msg=Please login to access..");
}
include("connect.php");
$i=$_REQUEST['did'];
$q=mysqli_query($conn,"delete from activity where aid=$i") or die ("query fail");
header("location:show_activity.php?msg=activity is deleted...")
?>
