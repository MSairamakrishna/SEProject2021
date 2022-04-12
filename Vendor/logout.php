<?php
session_start();
$_SESSION['vendor']='';
session_destroy();
session_start();
if(isset($_SESSION['vendor'])=='')
{
	header("location: index.php?msg=Please login to access..");
}?>
?>