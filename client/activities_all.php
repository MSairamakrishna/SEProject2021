<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>Farmer Information System</title>
        <meta name="keywords" content="" />
        <meta name="description" content="" />
        <link href="styles.css" rel="stylesheet" type="text/css" media="screen" />
        <style type="text/css">
<!--
.style25 {
	font-size: 15px;
	color: #FF0000;
}
.style27 {color: #FF3333; font-size: 15px; }
.style28 {
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 18px;
	color: #CC3300;
}
-->
        </style>
</head>
<body>
    	<div id="wrap">
		        <div id="menu">
					 <ul>
						<li><a href="index.php">Home</a></li>
						<?php if (isset($_SESSION['uid'])!='')
						{
							/* Header menu for the UI*/
						?> 
						
						<li><a href="cart.php">Cart</a></li>
						<?php
						}
						?>
						
						<?php if(isset($_SESSION['uid'])!='')
						{?>
						
						<li><a href="inquiry.php">Inquiry</a></li>
						<li><a href="myprofile.php">Myprofile</a></li>
						<li><a href="organicfarming.php">Farming</a></li>
						<?php
						}?>
						
						<li><a href="feedback.php">Feedback</a></li>
						<li><a href="contact.php">Contact</a></li>
						<?php if(isset($_SESSION['uid'])=='')
						{
						?>
						<li><a href="register.php">Register</a></li>
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
					  <div class="row-2">
					    <table width="100%" height="209" border="0">
                          <tr>
                            <td colspan="3">&nbsp;</td>
                          </tr>
                          <tr>
                            <td width="6%">&nbsp;</td>
                            <td width="85%"><table width="100%" height="123" border="0">
                              <tr>
                                <td height="21"><div align="center" class="style25 style28">Latest Activities </div></td>
                              </tr>
							  <?php
							  /* Fetching the details from activities table*/
	                           include("connect.php");
	                           $q=mysqli_query($conn,"select * from activities order by location desc") or die ("query fail");
	                           while($data=mysqli_fetch_array($q))
	                             {
	                           ?>
                              <tr>
                                <td height="94"><table width="100%" border="0">
                                  <tr>
                                    <td colspan="3" bgcolor="#66CC66" style="font-family:Georgia, 'Times New Roman', Times, serif; font-size:16px; color:#000000"><span class="style27">Title</span>:<?php echo $data['location'];?></td>
                                  </tr>
                                  <tr>
                                    <td colspan="3" bgcolor="#99CC99"style="font-family:Georgia, 'Times New Roman', Times, serif; font-size:16px; color:#000000"><span class="style27">Description</span>:<?php echo $data['description'];?></td>
                                  </tr>
                                </table></td>
                              </tr>
							  <?php
							  }
							  ?>
                            </table></td>
                            <td width="9%">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="3">&nbsp;</td>
                          </tr>
                        </table>
					    <p>&nbsp;</p>
              	<p>&nbsp;</p>
              	<p>&nbsp;</p>
              	<p>&nbsp;</p>
              	<p>&nbsp;</p>
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