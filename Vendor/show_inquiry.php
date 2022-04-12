<?php
session_start();
if(isset($_SESSION['vendor'])=="")
{
	header("location: index.php?msg=Please login to access..");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Farmer Land Information System</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<?php
$page_name="show_inquiry.php"; 

if(!isset($_REQUEST["start"])) 
{
	$start = 0;
}
else
{
	$start = $_REQUEST["start"];
}
		
		$eu = ($start - 0); 
		$limit = 10;          
		$this1 = $eu + $limit; 
		$back = $eu - $limit; 
		$next = $eu + $limit; 
?>
<body bgcolor="#B4A9AC">
<table width="100%" border="1" class="table">
  <tr>
    <td colspan="3"><?php include("header.php");?></td>
  </tr>
  <script>
	gooeymenu.setup({id:'gooeymenu1', selectitem:1})
	</script>
  <tr>
    <td width="14%">&nbsp;</td>
    <td width="68%">
	<table width="100%" border="1" align="center" class="background">
      <tr>
        <td colspan="11"><?php 
	  if(isset($_REQUEST['msg'])!="")
	  {
	  	echo $_REQUEST['msg'];
	  }
	  ?></td>
      </tr>
      <tr align="center">
        <td width="8%" color:"000000">No.</td>
        <td width="7%" color:"000000">BuyerID</td>
        <td width="7%" color:"000000">Query Topic</td>
        <td width="7%" color:"000000">Details</td>
        <td  color:"000000">Action</td>
      </tr>
          <?php
		  /* Fetching details from inquiry table */
	include("connect.php");	
		$i=1;
	$sql2 = "select * from inquiry";
	$fetch = mysqli_query($conn,$sql2) or die("query failed");
	$nume = mysqli_num_rows($fetch);
	$sql_group=mysqli_query($conn,"select * from inquiry order by iid desc limit $eu,$limit ");
	if(mysqli_num_rows($sql_group)>0)
	{
	$n=0;
	while($data=mysqli_fetch_array($sql_group))
	{
		?>
 	
      <tr align="center">
        <td><?php echo $i;?></td>
        <td><?php echo $data['buyerid'];?></td>
        <td><?php echo $data['query_topic'];?></td>
        <td><?php echo $data['details'];?></td>
        <td width="11%"><a href="del_inquiry.php?did=<?php  echo $data['iid'];?>">Delete</a></td>
      </tr>
      <?php
	$i++;
	}
	?>
    </table>
	<p>
	  <?php 

echo "<table border=1 align=center style=border:#2980C5; border-style:groove>";
while($data=mysqli_fetch_array($sql_group))

{
	
	echo "<table width='100%' border='1' align='center' class='background'>
      
      <tr>
        <td width='8%' class='font'>No.</td>
        <td width='6%' class='font'>BuyerID</td>
        <td width='7%' class='font'>Query Topic</td>
        <td width='7%' class='font'>Details</td>
        <td  class='font'>Action</td>
      </tr>
     
      <tr>
        <td>".$i."</td>
        <td>".$data['buyerid']."</td>
        <td>".$data['query_topic']."</td>
        <td>".$data['details']."</td>
        <td width='11%'><a href='del_inquiry.php?did=".$data['iid']."'>Delete</a></td>
      </tr>
   
    </table>";
} 
echo "</table>";



echo "<table align = 'center' width='50%'><tr><td  align='left' width='30%'>";

if($back>=0) 
{ 
	echo "<a href='$page_name?start=$back'><font face='Verdana' size='2'>PREV</font></a>"; 
} 

	echo "</td><td align=center width='40%'>Page:";
	$i=0;
	$l=1;
	$total=0;
	for($i=0;$i < $nume;$i=$i+$limit)
	{
		if($i <> $eu)
		{
			echo " <a href='$page_name?start=$i'><font face='Verdana' size='2'>$l</font></a> ";
		}
		else 
		{ 
			echo "<font face='Verdana' size='2' color=red>$l</font>";
		}
		$l=$l+1;
		$total = $total+1;
	}
echo " of $total</td><td  align='right' width='40%'>";


if($this1 < $nume) 
{ 
	echo "<a href='$page_name?start=$next'><font face='Verdana' size='2'>NEXT</font></a>";} 
	echo "</td></tr></table>";
}

?>
	</p></td>
    <td width="18%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
</body>
</html>
