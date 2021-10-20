<?php
include("connect.php");
$i=$_REQUEST['aid'];
mysqli_query($conn,"update my_order set flag=2 where id=$i") or die ("QF");
header("location: show_order.php?Order has been approved");
?>