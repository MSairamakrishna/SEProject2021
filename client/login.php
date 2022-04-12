<?php
session_start();
if(isset($_REQUEST['login'])=="true")
{
	/* Fetching details from buyer table */
include("connect.php");
$un=$_REQUEST['id'];
$pass=$_REQUEST['ps'];
$q=mysqli_query($conn, "SELECT * FROM buyer 
where buyerid='$un' and password='$pass'") or die("qf");
if(mysqli_num_rows($q))
{
   $data=mysqli_fetch_array($q);
   $_SESSION['uid']=$data['id'];
   header("location: myprofile.php?msg=WELCOME");
}
else
{?>
<script>
alert("Your ID or Password may be wrong");
</script>
<?php
}
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
.style14 {
	font-size: 16px;
	font-family: Georgia, "Times New Roman", Times, serif;
	color: #990000;
}
.style18 {color: #FFFFFF; font-size: 14px; }
-->
        </style>
		<script language="javascript" type="text/javascript">
function validate()
{
	/* Script to validate user input*/
   if(document.getElementById('idn_to_utf8').value=="")
    { 
	   alert('please enter required field');
	   document.getElementById('id').focus();
	   return false;
	}
	if(document.getElementById('ps').value=="")
    { 
	   alert('please enter required field');
	   document.getElementById('ps').focus();
	   return false;
	}
	 
}
</script>		
</head>
<body >
    	<div id="wrap" >
		        <div id="menu" align="center">
					<ul >
						<li><a href="index.php">Home</a></li>
						<?php if (isset($_SESSION['uid'])!='')
						{
							/* Header menu for UI */
						?>
						<li><a href="cart.php">Cart</a></li>
						<?php
						}
						?>
						<li><a href="register.php">Register</a></li>
						<?php if(isset($_SESSION['uid'])!='')
						{?>
						<li><a href="inquiry.php">Inquiry</a></li>
						<li><a href="myprofile.php">Myprofile</a></li>
						<li><a href="organicfarming.php">Farming</a></li>
						<?php
						}?>
						
						<?php if(isset($_SESSION['uid'])=='')
						{
						?>
						<li><a href="login.php" class="active">Login</a></li>
						<?php
						}
						else
						{
						?>
						<li><a href="logout.php">Logout</a></li>
						<?php
						}
						?>
						<li><a href="guest_feedback.php">Feedback</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
				</div>
				
				<div id="top_padding"></div>
				
				<div id="content_top"></div>				
				<div id="content_bg_repeat">
					
				<div class="inside" align="center">
            	<div  class="row-1 outdent" align="center">
            	  <div class="wrapper" align="center"></div>
                <form id="form1" method="post" align="center" action="" onsubmit="return validate();">
                  <input type="hidden" name="login" value="true" />
                  <table align="center" width="669" height="254" border="0" bordercolor="#000000" style="border:#000000 double;">
                    <tr>
                      <td height="56" colspan="3"><table width="100%" height="36
					  " border="0">
                        <tr>
                          <td style="font-family:Georgia, 'Times New Roman', Times, serif; color:#990000; font-size:20px;"><?php 
	                      if(isset($_REQUEST['msg'])!="")
	                       {
	                        echo $_REQUEST['msg'];
	                       }
	                         ?></td>
                      </tr></table><div align="center" style=color:#FFFFFF class="style14">Log in Form </div></td>
                    </tr>
                    <tr>
                      <td colspan="3">
                      </td>
                    </tr>
                    <tr>
                      <td width="207"><span class="style18">Buyer ID </span></td>
                      <td width="13">::</td>
                      <td width="427"><label>
                        <input name="id" type="text" id="id" />
                      </label></td>
                    </tr>
                    <tr>
                      <td><span class="style18">Password</span></td>
                      <td>::</td>
                      <td><input name="ps" type="password" id="ps" /></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td><label>
                        <input type="submit" name="Submit" value="Log in" />
                      </label></td>
                    </tr>
                  </table>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
                  <p>&nbsp;</p>
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

