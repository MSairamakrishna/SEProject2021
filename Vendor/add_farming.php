<?php

session_start();
if(isset($_SESSION['vendor'])=="")
{
	header("location: index.php?msg=Please login to access..");
}
if(isset($_REQUEST['perform'])=="true")
{
	include("connect.php");
	$c=$_REQUEST['t1'];
	$b=$_REQUEST['t2'];
    $a=$_REQUEST['t3'];
	
	mysqli_query($conn,"insert into organicfarming(cropname,bestpractices,articles) values ('$c','$b','$a')") or die ("query fail");
	 
	header("location:show_farming.php?msg=Entry is added..."); 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Farmer Land Information System</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
<style type="text/css">
<!--
.style1 {font-size: 18px}
-->
</style>
<script language="javascript" type="text/javascript">
function validate()
{
  
	if(document.getElementById('t1').value=="")
    { 
	   alert('please enter name of the crop');
	   document.getElementById('t1').focus();
	   return false;
	}
	if(document.getElementById('t2').value=="")
    { 
	   alert('please fill best practices');
	   document.getElementById('t2').focus();
	   return false;
	}
    if(document.getElementById('t1').value=="")
    { 
	   alert('please enter articles');
	   document.getElementById('t1').focus();
	   return false;
	}
}
</script>

</head>

<body class="body">
<table width="100%" border="1" align="center" class="background">
  <tr>
    <td colspan="3"><?php include("header.php");?></td>
  </tr>
  <tr>
    <td width="20%"><p>&nbsp;</p>
      <table width="100%" height="94" border="1" class="table">
        <tr>
          <td class="font"><a href="add_farming.php">Add Entry</a></td>
        </tr>
        <tr>
          <td class="font"><a href="show_farming.php">Show Entries</a></td>
        </tr>
      </table>
    <p></p></td>
    <td width="65%"
	><form id="form1" name="form1" method="post" action="" onsubmit="return validate();">
	<input type="hidden" name="perform" value="true" />
      <table width="100%" border="1" align="center" class="table">
        <tr>
          <td colspan="3"><div align="center" class="font">Add Entry </div></td>
        </tr>
        <tr>
          <td width="33%" class="font">Crop Name</td>
          <td width="2%">&nbsp;</td>
          <td width="65%"><label>
            <input name="t1" type="text" id="t1" />
          </label></td>
        </tr>
        <tr>
          <td class="font">Best Practices</td>
          <td>&nbsp;</td>
          <td><textarea name="t2" id="t2"></textarea></td>
        </tr>
        <tr>
          <td width="33%" class="font">Articles</td>
          <td width="2%">&nbsp;</td>
          <td width="65%"><label>
            <input name="t3" type="text" id="t3" />
          </label></td>
        </tr>
        <tr>
          <td colspan="3">&nbsp;</td>
        </tr>
        <tr>
          <td><input type="reset" name="Submit2" value="Reset" /></td>
          <td>&nbsp;</td>
          <td><label>
            <input type="submit" name="Submit" value="Add Entry" />
          </label></td>
        </tr>
      </table>
        </form>
    </td>
    <td width="15%">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3">&nbsp;</td>
  </tr>
</table>
</body>
</html>
