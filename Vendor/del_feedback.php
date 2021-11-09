<?php
session_start();
if(isset($_SESSION['vendor'])=="")
{
	header("location: index.php?msg=Please login to access..");
}
include("connect.php");
$i=$_REQUEST['did'];
mysqli_query($conn,"delete from feedback where id=$i") or die ("query fail");
header("location: show_feedback.php?msg=Feedback deleted");

?>