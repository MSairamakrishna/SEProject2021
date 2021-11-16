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
<!--CODE FOR PAGGING-->
<?php
$page_name="show_user.php"; 

if(!isset($_REQUEST["start"])) 
{
	$start = 0;
}
else
{
	$start = $_REQUEST["start"];
}
		
		$eu = ($start - 0); 
		$limit = 5;          
		$this1 = $eu + $limit; 
		$back = $eu - $limit; 
		$next = $eu + $limit; 
?>
		
<!--CODE FOR PAGGING-->	
<body class="body">

<table width="100%" border="1" class="background">
    <tr>
    <td colspan="3"><?php include("header.php");?></td>
  </tr>
  <tr>
    <td width="86%">
	<table width="100%" border="1" class="table">
      <tr>
        <td colspan="16"><?php 
	  if(isset($_REQUEST['msg'])!="")
	  {
	  	echo $_REQUEST['msg'];
	  }
	  ?></td>
      </tr>
      <tr>
        <td width="6%" class="font">ID</td>
        <td width="6%" class="font">Name</td>
        <td width="6%" class="font">BuyerID</td>
        <td width="6%" class="font">Survey No.</td>
        <td width="6%" class="font">Address</td>
        <td width="6%" class="font">Locality</td>
        <td width="6%" class="font">State</td>
        <td width="6%" class="font">Profession</td>
        <td width="6%" class="font">Income</td>
        <td width="6%" class="font">Farming In practice</td>
        <td width="6%" class="font">Land owned in Acres</td>
        <td width="6%" class="font">Challenges faced</td>
        <td width="4%" class="font">Action</td>
      </tr>
      <!--CODE FOR PAGGING-->
		      <?php
			  /* Fetching details from buyer table */
	include("connect.php");	
	$i=1;
	$sql2 = "select * from buyer";
	$fetch = mysqli_query($conn,$sql2) or die("query failed");
	$nume = mysqli_num_rows($fetch);
	$sql_group=mysqli_query($conn,"select * from buyer order by id desc limit $eu,$limit ");
	if(mysqli_num_rows($sql_group)>0)
	{
	$n=0;
	while($data=mysqli_fetch_array($sql_group))
	{
	?>
         <!--CODE FOR PAGGING-->
      <tr>
        <td><?php echo $i;?></td>
        <td><?php echo $data['name'];?></td>
        <td><?php echo $data['buyerid'];?></td>
        <td><?php echo $data['survey_no'];?></td>
        <td><?php echo $data['address'];?></td>
        <td><?php echo $data['locality'];?></td>
        <td><?php echo $data['state'];?></td>
        <td><?php echo $data['profession'];?></td>
        <td><?php echo $data['income'];?></td>
        <td><?php echo $data['farming_in_practice'];?></td>
        <td><?php echo $data['land_owned'];?></td>
        <td><?php echo $data['challenges_faced'];?></td>
        <td><div align="center"><a href="del_userdata.php?did=<?php echo $data['id'];?>">Delete</a></div></td>
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


?></p></td>
              </tr>
              <?php
	 }
	
	?>
	 
    <td width="7%">&nbsp;</td>
  </tr>
  
</table>
</body>
</html>
