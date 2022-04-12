<?php
session_start();
include("connect.php");
if(isset($_REQUEST['perform'])=="true")
{
$com=$_REQUEST['comm'];
$name=$_REQUEST['name'];

mysqli_query($conn,"insert into feedback(buyerid,name,comments,usertype) values('NA','$name','$com','guest')")or die('QF');
header("location: guest_feedback.php?msg= Feedback submitted");

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
	if(document.getElementById('name').value=="")
    { 
	   alert('please fill feedback');
	   document.getElementById('name').focus();
	   return false;
	}
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
						
            			<li><a href="register.php">Register</a></li>
						<?php if(isset($_SESSION['uid'])=='')
						{
							/* Header menu for the UI*/
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
						<li><a href="guest_feedback.php" class="active"
						>Feedback</a></li>
						<li><a href="contact.php">Contact</a></li>
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
                  
                  <table width="50%" height="250" border="0" align="center" style="border:#000000 double;">
                    <tr>
                    <td colspan="3"><table width="100%" height="36" border="0">
                        <tr>
                        <td align="center" style="background-color:#CCFF99; font-size:18px; font-family:Georgia, 'Times New Roman', Times, serif; color:#000000;">
                          <?php 
	                      if(isset($_REQUEST['msg'])!="")
	                       {
	                        echo $_REQUEST['msg'];
	                       }
	                         ?>		 </td>
                           </tr></table></td>
                       </tr>
                       
                       <tr>
                         <td width="22%" style="color: #FFFFFF;"><span class="style1">Name</span></td>
                         <td width="77%"><label>
                           <input name="name" type="text" id="name" >
                         </label></td>
                       </tr>
                        <td height="31" style="color: #FFFFFF;"><span class="style1">Comments</span></td>
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
