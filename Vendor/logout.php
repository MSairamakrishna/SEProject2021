<?php
session_start();
$_SESSION['vendor']='';
session_destroy();
header("location: index.php?msg=Thanks For Visit");
?>