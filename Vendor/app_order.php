<?php
include("connect.php");
$id=$_REQUEST['aid'];
$q=mysqli_query($conn,"select * from my_order where id=$id");
$data=mysqli_fetch_array	($q);
$i=$data['rid'];
$t1=0;
$mtot=0;
$nq=mysqli_query($conn,"select * from my_order where rid=$i and flag=1 ") or die ("QF");
while($ndata=mysqli_fetch_array($nq))
{
	$t1=$ndata['amount'];
	$mtot=$mtot+$t1;
}

	if($mtot>50)
	{
		
		header("location: myprofile.php?msg=Stock Limit for this user is over");
	
	} 
	else 
	{
	
     mysqli_query($conn,"update my_order set flag=1 where id=$id") or die ("QF");
	 $p=$data['taluka']; 
 	 $r=$data['amount']; 
	 $q1=mysqli_query($conn,"select * from  god_mngt where taluka='$p'") or die ("QF"); 
	 $data1=mysqli_fetch_array($q1);
	 $r1=$data1['stock']; 
	 $r2=$r1-$r;
     mysqli_query($conn,"update god_mngt set stock=$r2 where taluka='$p'") or die ("QF");
     header("location:show_order.php?Order has been approved");
    }
?>