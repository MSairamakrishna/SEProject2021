<?php
session_start();
if(isset($_SESSION['vendor'])=='')
{
	header("location: index.php?msg=Please login to access..");
}?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Farmer Land Information System</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<!--CODE FOR PAGGING-->
<?php
$page_name="home.php"; 

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
		
<!--CODE FOR PAGGING-->	
<body bgcolor="#B4A9AC">
  <table width="100%" border="1" align="center" class="background">
    <tr>
      <td colspan="3" ><?php include("header.php");?></td>
    </tr>
	<script>
	gooeymenu.setup({id:'gooeymenu1', selectitem:0})
	</script>
    <tr>
      <td width="14%" rowspan="2" class="background" >&nbsp;</td>
      <td width="79%" class="background"><?php 
	  	if(isset($_REQUEST['msg'])!="")
		{
			echo $_REQUEST['msg'];
		}
	  ?></td>
      <td width="7%" rowspan="2" class="background">&nbsp;</td>
    </tr>
    <tr>
      <td class="background"><table width="98%" border="1" class="table">
        <tr>
		<td  color:"000000" align="center" >No</td>
        <td color:"000000"" align="center"> Category </td>
		<td color:"000000" align="center"> Name </td>
        <td color:"000000" align="center"> Code </td>
        <td color:"000000" align="center"> Quality </td>
        <td color:"000000" align="center"> Quantity <br> per lb</td>
		<td color:"000000" align="center"> price </td>
        </tr>
		<!--CODE FOR PAGGING-->
		      <?php
			  /* Fetching details from product table */
	include("connect.php");	
	$i=1;
	$sql2 = "select * from product";
	$fetch = mysqli_query($conn,$sql2) or die("query failed");
	$nume = mysqli_num_rows($fetch);
	$sql_group=mysqli_query($conn,"select * from product order by id desc limit $eu,$limit ");
	if(mysqli_num_rows($sql_group)>0)
	{
	$n=0;
	while($data=mysqli_fetch_array($sql_group))
	{
	?>
         <!--CODE FOR PAGGING-->
		 <tr align="center"> 
        <td><?php echo $i;?></td>
		<td><?php echo $data['category'];?></td>
        <td><?php echo $data['name'];?></td>
		<td><?php echo $data['code'];?></td>
		<td><?php echo $data['quality'];?></td>
		<td><?php echo $data['quantity'];?></td>
        <td><?php echo $data['price'];?></td>
	  </tr>
	  <?php
	  $i++;
	  }
	  ?>
    </table>
    <p>
      <?php 

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
    </tr>
    <tr>
      <td class="background">&nbsp;</td>
      <td class="background">&nbsp;</td>
      <td class="background">&nbsp;</td>
    </tr>
</table>
</body>
</html>
