<?php
session_start();
if(isset($_SESSION['uid'])=='')
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
.style3 {color: #000000}
.style4 {
	color: #FFFFFF;
	font-size: 15px;
	font-family: Georgia, "Times New Roman", Times, serif;
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
							/* Header Menu for UI */
						?>
						<li><a href="cart.php">Cart</a></li>
						<li><a href="feedback.php">Feedback</a></li>
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
						<li><a href="guest_feedback.php">Feedback</a></li>
						<li><a href="contact.php" class="active">Contact</a></li>
						</ul>
				</div>
				
				<div id="top_padding"></div>
				
				<div id="content_top"></div>				
				<div id="content_bg_repeat">
					
					<div class="inside" align="center">
            	<div class="row-1 outdent" style="width:650px;">
                
              	<div class="wrapper"></div>
                
				<div id="info" align="center" style="border:#000000 double;">
				<p>&nbsp;</p>
				<p>&nbsp; </p>
				<p class="style4"><em><strong>Manchikanti Sairamakrishna </strong></em></p>
                <p class="style4"><em>sairamakrishnamanchikanti@my.unt.edu</em> </p>
				<p>&nbsp; </p>
                <p class="style4"><em><strong>MANOJ KONATHALA</strong></em></p>               
                <p class="style4"><em>manoj.konathala@my.unt.edu</em></p>
				<p>&nbsp; </p>
                <p class="style4"><em><strong>Shravan Kumar Singisetti</strong></em></p>
                <p class="style3"><span class="style4"><em> shravankumarsingisetti@my.unt.edu</em></span></p>
				<p>&nbsp; </p>
                <p class="style4"><em><strong>Varun Reddy Kayyuru</strong></em></p>
                <p class="style3"><span class="style4"><em> varunreddykayyuru@my.unt.edu </em></span></p>
				<p>&nbsp; </p>
                <p class="style4"><em><strong>Arsalan Aman</strong></em></p>
                <p class="style3"><span class="style4"><em> arsalanaman@my.unt.edu</em></span></p>
				<p>&nbsp; </p>
                <p class="style4"><em><strong>Divya sri Dasi</strong></em></p>
                <p class="style3"><span class="style4"><em> divyasridasi@my.unt.edu </em></span></p>
				<p>&nbsp; </p>
                <p class="style4"><em><strong>Maniveera Shakshath Garimella</strong></em></p>
                <p class="style3"><span class="style4"><em>maniveerashakshathgarimella@my.unt.edu</em></span></p>
				<p>&nbsp; </p>
                <p class="style4"><em><strong>Pujitha Pula</strong></em></p>
                <p class="style3"><span class="style4"><em> pujithapula@my.unt.edu</em></span></p>
				<p>&nbsp; </p>
                <p class="style4"><em><strong>Anas Mohammad Nayeem</strong></em></p>
                <p class="style3"><span class="style4"><em> anasmohammednayeemlnu@my.unt.edu</em></span></p>
				<p>&nbsp; </p>
                <p class="style4"><em><strong>Murali Krishna Yarraguntla</strong></em></p>
                <p class="style3"><span class="style4"><em> muralikrishnayarraguntla@my.unt.edu</em></span></p>
				<p>&nbsp; </p>
				</div>
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
				<div id="footer_bot">
					<p>	</div>
</body>
</html>
