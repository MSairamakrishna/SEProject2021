<?php
session_start();
include("connect.php");
if(isset($_REQUEST['perform'])=="true")
{
$f=$_REQUEST['f_id'];
$s=$_REQUEST['serv'];
$a=$_REQUEST['add'];
$p=$_REQUEST['phone'];
$v=$_REQUEST['vill'];
$c=$_REQUEST['com'];

mysqli_query($conn,"insert into feedback(f_id,serv_no,address,phone,village,usertype,comment) values('NA','$s','$a','$p','$v','guest','$c')")or die('die');
header("location: myprofile.php ?msg= Feedback successfully added");
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
                <form id="form1" method="post" action="" onsubmit="return validate();">
                  <input type="hidden" name="perform" value="true" />
                  
                  <table width="575" height="538" align="center"  style="border-style: double; border-color: #000000; font-family:Georgia, 'Times New Roman', Times, serif;">
                    <tr>
                      <td height="41" colspan="3" align="center"><table width="100%" height="36
					  " border="0">
                        <tr>
                          <td style=" font-size:18px;"><?php 
	                      if(isset($_REQUEST['msg'])!="")
	                       {
	                        echo $_REQUEST['msg'];
	                       }
	                         ?></td>
                        </tr></table>
                        <table width="100%" border="1"><tr></tr>
                      </table>
                        <p>&nbsp;</p>
                      <span class="style2"></td>
                    </tr>
                    <tr>
                      <td><span class="style1 style3">Servey No </span></td>
                      <td>::</td>
                      <td><input name="serv" type="text" id="serv" ></td>
                    </tr>
                    <tr>
                      <td><span class="style1 style3">Address</span></td>
                      <td>::</td>
                      <td><input name="add" type="text" id="add" ></td>
                    </tr>
                    <tr>
                      <td><span class="style1 style3">Mobile No </span></td>
                      <td>::</td>
                      <td><label>
                        <input name="phone" type="text" id="phone" >
                      </label></td>
                    </tr>
                    <tr>
                      <td><span class="style1 style3">Village</span></td>
                      <td>::</td>
                      <td><label>
                        <input name="vill" type="text" id="vill" >
                      </label></td>
                    </tr>
                    <tr>
                      <td><span class="style1 style3">Comments</span></td>
                      <td>::</td>
                      <td><textarea name="com" id="com"></textarea></td>
                    </tr>
                    <tr>
                      <td height="73">&nbsp;</td>
                      <td>&nbsp;</td>
                      <td><label>
                        <input type="submit" name="Submit" value="Feedback" / readonly="">
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