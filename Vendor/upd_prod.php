<?php
session_start();
if(isset($_SESSION['vendor'])=='')
{
	header("location: index.php?msg=Please login to access..");
}
if(isset($_REQUEST['update'])=="true")
{
include("connect.php");
$i=$_REQUEST['upid'];
$na=$_REQUEST['nm'];
$co=$_REQUEST['cd'];
$im=$_REQUEST['img'];
$qu=$_REQUEST['qun'];
$qua=$_REQUEST['qual'];
$ct=$_REQUEST['cat'];
$pr=$_REQUEST['pri'];

mysqli_query($conn,"update product set name='$na',code='$co',image='$na',quantity='$qu',quality='$qua', category='$ct',price='$pr' where id=$i") or die ("QF");
header("location: prod.php?msg=Product has Updated successfully");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
<script language="javascript" type="text/javascript">
function validate()
{
  /* Script to validate user input */
   if(document.getElementById('nm').value=="")
    { 
	   alert('Please enter Name');
	   document.getElementById('nm').focus();
	   return false;
	}
	 if(document.getElementById('cd').value=="")
    { 
	   alert('Please enter Code');
	   document.getElementById('cd').focus();
	   return false;
	}
  if(document.getElementById('img').value=="")
    { 
	   alert('Please enter Image Path');
	   document.getElementById('img').focus();
	   return false;
	}
	if(document.getElementById('qun').value=="")
    { 
	   alert('Please enter quantity');
	   document.getElementById('qun').focus();
	   return false;
	}
	if(document.getElementById('qual').value=="Select Quality")
    { 
	   alert('Please select quality');
	   document.getElementById('qual').focus();
	   return false;
	}
	if(document.getElementById('cat').value=="Select Category")
    { 
	   alert('Please select category');
	   document.getElementById('cat').focus();
	   return false;
	}
  if(document.getElementById('pri').value=="")
    { 
	   alert('Please enter price');
	   document.getElementById('pri').focus();
	   return false;
	}
	
}
</script>

</head>

<body class="body">&nbsp;</p>

 

<table width="100%" border="1" class="background">
  <tr>
    <td colspan="3"><?php include("header.php");?></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>
	<?php
  /* Fetching details from product table */
	include("connect.php");
	$i=$_REQUEST['uid'];
	$q=mysqli_query($conn,"select * from product where id=$i") or die ("QF");
	$data=mysqli_fetch_array($q);
	?>
	<form id="form1" name="form1" method="post" action="" onsubmit="return validate();">
	<input type="hidden" name="update" value="true" />
	<input type="hidden" name="upid" value="<?php echo $data['id'];?>" />
	  <table width="50%" border="1" align="center" class="table">
        <tr>
          <td colspan="3" class="font">Update Product </td>
        </tr>
        <tr>
          <td class="font">  Name </td>
          <td class="font"><input name="nm" type="text" id="nm" size="30" value="<?php echo $data['name'];?>"/></td>
        </tr> 
        <tr>
          <td class="font"> Code </td>
          <td class="font"><input name="cd" type="text" id="cd" size="30" value="<?php echo $data['code'];?>"/></td>
        </tr> 
        <tr>
          <td class="font"> Image path </td>
          <td class="font"><input name="img" type="text" id="img" size="30" value="<?php echo $data['image'];?>"/></td>
        </tr> 
        <tr>
          <td class="font"> Quantity </td>
          <td class="font"><input name="qun" type="text" id="qun" size="30" value="<?php echo $data['quantity'];?>"/></td>
        </tr>
        <tr>
          <td width="50%" class="font">Quality </td>
          <td width="50%" class="font"><select name="qual" id="qual">
            <option value="<?php echo $data['quality'];?>" selected="selected"><?php echo $data['quality'];?></option>
            <option value="High">High</option>
            <option value="Moderate">Moderate</option>
          </select>          </td>
        </tr>
        <tr>
          <td width="50%" class="font">Category </td>
          <td width="50%" class="font"><select name="cat" id="cat">
            <option value="<?php echo $data['category'];?>" selected="selected"><?php echo $data['category'];?></option>
            <option value="fruit">Fruits</option>
            <option value="vegetable">Vegetables</option>
            <option value="seed">Seed</option>
            <option value="pesticide">Pesticide</option>
          </select>          
          </td>
        </tr>
        <tr>
          <td class="font">Price</td>
          <td class="font"><input name="pri" type="text" id="pri" size="30" value="<?php echo $data['price'];?>"/></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="3" align="center"><input type="submit" name="Submit" value="Update Product" /></td>
        </tr>
      </table>
      </form>
    </td>
    <td>&nbsp;</td>
  </tr>
</table>
</body>
</html>
