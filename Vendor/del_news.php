<?php 
session_start();
if(isset($_SESSION['vendor'])=="")
{
	header("location: index.php?msg=Please login to access..");
}
/* Deleting details from news table */
include("connect.php");
$i=$_REQUEST['did'];
$q=mysqli_query($conn,"delete from news where nid=$i") or die ("query fail");
header("location:show_news.php?msg=news is deleted...")
?>
