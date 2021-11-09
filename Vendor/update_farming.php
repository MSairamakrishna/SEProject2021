<?php
 session_start();
if(isset($_SESSION['vendor'])=="")
{
	header("location: index.php?msg=Please login to access..");
}
 if(isset($_REQUEST['update'])=="true")
 {
 	include("connect.php");
	$i=$_REQUEST['upid'];
	$cn=$_REQUEST['cpn'];
	$bt=$_REQUEST['bst'];
    $at=$_REQUEST['art'];
	 
	mysqli_query($conn,"update organicfarming set cropname='$cn',bestpractices='$bt',articles='$at' where cropid=$i") or die ("query fail");
	header("location:show_farming.php?msg=entry updated...");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
<style type="text/css">
<!--
.style1 {font-size: 18px}
-->
</style>
</head>

<body class="body">
<table width="100%" border="1" align="center" class="background">
  <tr>
    <td colspan="3"><?php include("header.php");?></td>
  </tr>
  <tr>
    <td width="22%"><table width="100%" border="1" class="table">
      <tr>
        <td><a href="add_farming.php">Add Entry</a></td>
      </tr>
      <tr>
        <td><a href="show_farming.php">Show Entries</a></td>
      </tr>
    </table></td>
    <td width="74%"><?php 
		include("connect.php");
		$i=$_REQUEST['uid'];
		$q=mysqli_query($conn,"select * from organicfarming where cropid=$i") or die ("query fail");
		$data=mysqli_fetch_array($q);
	?>
        <form id="form1" name="form1" method="post" action="">
          <input type="hidden" name="update" value="true" />
          <input type="hidden" name="upid" value="<?php echo $data['cropid'];?>" />
          <table width="100%" border="1" class="table">
            <tr>
              <td colspan="3"><div align="center" class="font style1">Update Entry </div></td>
            </tr>
            <tr>
              <td width="33%" class="font">Crop Name</td>
              <td width="2%">&nbsp;</td>
              <td width="65%"><label>
                <input name="cpn" type="text" id="cpn" value="<?php echo $data['cropname'];?>" />
              </label></td>
            </tr>
            <tr>
              <td class="font">Best Practices</td>
              <td>&nbsp;</td>
              <td><textarea name="bst" id="bst"><?php echo $data['bestpractices'];?></textarea></td>
            </tr>
            <tr>
              <td width="33%" class="font">Articles</td>
              <td width="2%">&nbsp;</td>
              <td width="65%"><label>
                <input name="art" type="text" id="art" value="<?php echo $data['articles'];?>" />
              </label></td>
            </tr>
            
            <tr>
              <td colspan="3" align="center"><label>
                <input type="submit" name="Submit" value="Update Entry" />
              </label></td>
            </tr>
          </table>
        </form></td>
    <td width="4%">&nbsp;</td>
  </tr>
</table>
</body>
</html>
