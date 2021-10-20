<?php
include("connect.php");
$i=$_REQUEST['did'];
mysqli_query($conn,"delete from transfer where tid=$i");
header("location: show_transfer.php?msg=Transfer has been deleted.");
?>