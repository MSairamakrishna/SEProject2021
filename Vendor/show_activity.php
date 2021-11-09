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
<link href="*" rel="stylesheet" type="text/css" />
</head>
<!--CODE FOR PAGGING-->
<?php
$page_name="show_activity.php"; 

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

  <table width="100%" border="1" align="center" class="background">
    <tr>
      <td colspan="3"><?php include("header.php");?></td>
    </tr>
    <tr>
      <td width="13%"><table width="100%" border="1">
        <tr>
          <td width="20%"><a href="add_activities.php">Add Activity </a></td>
        </tr>
        <tr>
          <td><a href="show_activity.php">Show Activities </a></td>
        </tr>
      </table></td>
      <td width="81%">
	  
        <table width="100%" border="1" align="center" class="table">
          <tr>
            <td colspan="5"><?php
		  if(isset($_REQUEST['msg'])!="")
		  {
				echo $_REQUEST['msg'];		  
		  } 
		  ?></td>
          </tr>
          <tr>
            <td width="10%" class="font" align="center">No.</td>
            <td width="15%" class="font" align="center">Location</td>
            <td width="25%" class="font" align="center">Description</td>
            <td colspan="2" class="font" align="center">Action</td>
          </tr>
           <!--CODE FOR PAGGING-->
		      <?php
	include("connect.php");	
		$i=1;
	$sql2 = "select * from activities";
	$fetch = mysqli_query($conn,$sql2) or die("query failed");
	$nume = mysqli_num_rows($fetch);
	$sql_group=mysqli_query($conn,"select * from activities order by aid desc limit $eu,$limit ");
	if(mysqli_num_rows($sql_group)>0)
	{
	$n=0;
	while($data=mysqli_fetch_array($sql_group))
	{
	?>
          <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $data['location'];?></td>
            <td><?php echo $data['description'];?></td>
            <td width="15%"><a href="update_activity.php?uid=<?php echo $data['aid'];?>">Update</a>
            </div></td>
            <td width="15%"><a href="del_activity.php?did=<?php echo $data['aid'];?>">Delete</a>
              </div></td>
          </tr>
          <?php
	$i++;
	}
	?>
        </table>
        	  	  <?php 

echo "<table border=1 align=center style=border:#2980C5; border-style:groove>";
while($data=mysqli_fetch_array($sql_group))

{
	
	echo "<table width='68%' border='0' align='center' bordercolor='#00FFFF' bgcolor='#639EEC'  style='border-style:groove'>
                    <tr>
                      <td colspan='3'>&nbsp;</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td width='20%'>Title</td>
                      <td width='5%'>::</td>
                      <td width='75%'>".$data['location']."</td>
                    </tr>
                    <tr>
                      <td>Description</td>
                      <td>::</td>
                      <td>".$data['description']."</td>
                    </tr>
                    <tr>
                      <td colspan='3' bgcolor='#00CCFF'  height='0.5px;' ></td>
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
</form>
</body>


</html>
