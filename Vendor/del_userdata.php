<?php
session_start();
if(isset($_SESSION['vendor'])=="")
{
	header("location: index.php?msg=Please login to access..");
}
/* Deleting details from buyer table */
include("connect.php");
$i=$_REQUEST['did'];
mysqli_query($conn,"delete from buyer where id=$i") or die ("query fail");
header("location: show_user.php?msg=User data is deleted.");

?>