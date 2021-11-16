<?php
session_start();
if(isset($_SESSION['uid'])=='')
{
	header("location: index.php?msg=Please login to access..");
}
if(isset($_REQUEST['update'])=="true")
{
  /* Fetching details from buyer*/
include("connect.php");
$id=$_REQUEST['idd'];
$bid=$_REQUEST['buid'];
$pd=$_REQUEST['pswd'];
$secq=$_REQUEST['secqu'];
$secan=$_REQUEST['seca'];
$secans = mysqli_query($conn,"select * from buyer where buyerid='$bid' and security_answer='$secan'") or die("QF");
if(mysqli_num_rows($secans))
{
    mysqli_query($conn,"update buyer set password='$pd' where buyerid='$bid'") or die ("QF");
    header("location: changepassword.php?msg=Password updated successfully");

}
else
{
    header("location:changepassword.php? msg=Security answer is wrong, Please enter the correct one");
}
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
    if(document.getElementById('seca').value=="")
    { 
	   alert('please enter your security answer');
	   document.getElementById('seca').focus();
	   return false;
	}
    if(document.getElementById('pswd').value=="")
    { 
	   alert('please enter your password');
	   document.getElementById('pswd').focus();
	   return false;
	}
   

}
</script>

</head>

<body>
    	<div id="wrap">
        <div id="menu">
          <!-- Header Menu for UI -->
					 <ul>
						<li><a href="index.php">Home</a></li>
						<?php if(isset($_SESSION['uid'])!='')
						{
						?>
						<li><a href="cart.php">Cart</a></li>
						<?php
						}
						?>
						<?php if(isset($_SESSION['uid'])!='')
						{?>
						<li><a href="myprofile.php" class="active">Myprofile</a></li>
						<li><a href="inquiry.php">Inquiry</a></li>
                        <li><a href="organicfarming.php">Farming</a></li>
						<?php
						}?>
						<li><a href="feedback.php">Feedback</a></li>
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
						<li><a href="logout.php">Logout</a></li>
						<?php
						}
						?>
						</ul>
				</div>
				<div id="top_padding"></div>
				
				<div id="content_top"></div>				
				<div id="content_bg_repeat">
					
					<div class="inside">
            	<div class="row-1 outdent">
              
            	  <div class="wrapper"></div>
                <form id="form1" name="form1" method="post" action="" onsubmit="return validate();">                  
                <input type="hidden" name="update" value="true" />
              <?php
              /* Fetching details from buyer table */
              include("connect.php");
              $id=$_SESSION['uid'];
              $q=mysqli_query($conn,"select * from buyer where id=$id");
              $data=mysqli_fetch_array($q);
              ?>
   
		  <table width="50%" height="250" border="0" align="center" style="border: #000000 double;">
            <tr>
              <td height="47" colspan="5"><table width="100%" height="36" border="0">
                <tr>
                <td style="background-color:#CCFF99; font-size:18px; font-family:Georgia, 'Times New Roman', Times, serif; color:#990033;">
                    <?php 
	                      if(isset($_REQUEST['msg'])!="")
	                       {
	                        echo $_REQUEST['msg'];
	                       }
                         if(isset($msg)!="")
                          {
                            echo $msg;
                          }
	                         ?>
                  </span></td>
                </tr>
              </table></td>
            </tr>
            
            <tr>
              <td width="33%" height="31"><span class="style1">BuyerID</span></td>
              <td width="66%">
                  <label>
                  <input name="buid" type="text" id="buid" value="<?php echo $data['buyerid'];?>" / readonly="">
                  </label></td>
            </tr>
            <tr>
              <td height="31"><span class="style1">Security Question</span></td>
              <td><label>
                <input name="secqu" type="text" id="secqu" value="<?php echo $data['security_question'];?>"/ readonly="">
              </label></td>
            </tr>
            <tr>
              <td height="31"><span class="style1">Security Answer</span></td>
              <td><label>
                <input name="seca" type="text" id="seca"/>
              </label></td>
            </tr>
            <tr>
              <td height="31"><span class="style1">New Password</span></td>
              <td><input name="pswd" type="password" id="pswd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 5 or more characters" required"></td>
            </tr>
            <tr>
              <td align="center" colspan="3"><input type="submit" name="Submit" value="Change password" /></td>
            </tr>
          </table>
                </form>
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
