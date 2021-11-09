<?php
session_start();
if(isset($_SESSION['uid'])=='')
{
header("location: login.php ?msg=Please log in first");
}
include("connect.php");
if(isset($_REQUEST['perform'])=="true")
{
$bid=$_REQUEST['buid'];
$com=$_REQUEST['comm'];
$ut=$_REQUEST['utype'];
$name=$_REQUEST['name'];
$surv=$_REQUEST['sur'];
mysqli_query($conn,"insert into feedback(buyerid,name,comments,usertype) values('$bid','$name','$com','buyer')")or die('QF');
header("location: feedback.php?msg=Feedback Submitted.");	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>Farmer Land Information System</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
    <link href="styles.css" rel="stylesheet" type="text/css" media="screen" />
        <style type="text/css">
<!--
.style3 {font-size: 13px}
-->
        </style>
<script language="javascript" type="text/javascript">
function validate()
{
   if(document.getElementById('comm').value=="")
    { 
	   alert('please fill feedback');
	   document.getElementById('comm').focus();
	   return false;
	}
}
</script>
</head>
<body>
    	<div id="wrap">
		        <div id="menu">
					<ul>
						<li><a href="index.php">Home</a></li>
						<?php if(isset($_SESSION['uid'])!='')
						{
						?>
						<li><a href="cart.php" >Cart</a></li>
						<?php
						}
						?>
						<?php if(isset($_SESSION['uid'])!='')
						{?>
						<li><a href="myprofile.php">Myprofile</a></li>
						<li><a href="inquiry.php">Inquiry</a></li>
            <li><a href="organicfarming.php">Farming</a></li>
						<?php
						}?>
						<li><a href="feedback.php" class="active"
						>Feedback</a></li>
						<li><a href="contact.php">Contact</a></li>
						<?php if(isset($_SESSION['uid'])=='')
						{
						?>
						<li><a href="login.php">Login</a></li>
						<?php
						}
						else
						{
						?>
						<li><a href="Logout.php">Logout</a></li>
						<?php
						}
						?>
						</ul>
				</div>
				
				<div id="top_padding"></div>
				
				<div id="content_top"></div>				
				<div id="content_bg_repeat">
					
					<div class="inside" align="center">
            	<div class="row-1 outdent">
            	  <div class="wrapper"></div>
                <form id="form1" method="post" action="" onsubmit="return validate();">
                  <input type="hidden" name="perform" value="true" />
                  <?php
     include("connect.php");
     $id=$_SESSION['uid'];
     $q=mysqli_query($conn,"select * from buyer where id=$id");
     $data=mysqli_fetch_array($q);
    ?>
                  <table width="50%" height="250" border="0" align="center" style="border:#000000 double;">
                    <tr>
                    <td colspan="3"><table width="100%" height="36" border="0">
                        <tr>
                        <td align="center" style="background-color:#CCFF99; font-size:18px; font-family:Georgia, 'Times New Roman', Times, serif; color:#990033;">
                          <?php 
	                      if(isset($_REQUEST['msg'])!="")
	                       {
	                        echo $_REQUEST['msg'];
	                       }
	                         ?>		 </td>
                           </tr></table></td>
                       </tr>
                       <tr>
                         <td width="22%"><span class="style1">BuyerID</span></td>
                         <td width="77%"><label>
                           <input name="bid" type="text" id="bid" value="<?php echo $data['buyerid'];?>" / readonly="">
                         </label></td>
                       </tr>
                       <tr>
                         <td width="22%"><span class="style1">Name</span></td>
                         <td width="77%"><label>
                           <input name="name" type="text" id="name" value="<?php echo $data['name'];?>"/ readonly="">
                         </label></td>
                       </tr>
                       <tr>
                         <td width="22%"><span class="style1">Survey No.</span></td>
                         <td width="77%"><label>
                           <input name="sur" type="text" id="sur" value="<?php echo $data['survey_no'];?>"/ readonly="">
                         </label></td>
                       </tr>
                       
                        <td height="31"><span class="style1">Comments</span></td>
                        <td><div align="left">
                          <textarea name="comm" id="comm"></textarea>
                        </div></td>
                      </tr>
                       <tr>
                         <td>&nbsp;</td>
                      <td><label>
                        <input type="submit" name="Submit" value="Submit"">
                      </label></td>
                    </tr>
                  </table>
                </form>
            	<p>&nbsp;</p>
            	<p>&nbsp;</p>
            	<p>&nbsp;</p>
            	</div>
              <div class="row-2">
              	<div class="wrapper"></div>
              </div>
            </div>
					
				</div>
				<div id="content_bottom"></div>
				<div id="footer_top">
				  <div class="clear"></div>
				</div>
			
		</div>
</body>
</html>