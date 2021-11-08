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
.style22 {color: #99FF00}
.style11 {color: #990033}
.style14 {color: #CC3300}
.style24 {font-size: 16px}
.style25 {
	font-size: 15px;
	color: #FF3333;
}
.style27 {font-size: 13px}
.style28 {color: #FF3333}
-->
        </style>
</head>
    <body>
    	<div id="wrap">
		        <div id="menu">	
				     <ul>
						<li><a href="index.php" class="active">Home</a></li>
						<?php if (isset($_SESSION['uid'])!='')
						{
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
						<?php
						}?>
						<li><a href="contact.php">Contact</a></li>
						<?php if(isset($_SESSION['uid'])=='')
						{
						?>
						<li><a href="guest_feedback.php">Feedback</a></li>
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
            	<div class="row-1 outdent">
                 <?php include("slider.php");?>
              	<div class="wrapper">
              	  <div class="metam1">
                  	<!-- .box1 -->
                  	<div class="box1">
                    	<h2 align="center">Animal Husbandry </h2>
                      <div class="img-box" style="height:150px;">
                          <p style="color:#99CC00; font-family:Georgia, 'Times New Roman', Times, serif; font-size:15px;">It is agricultural practise of breeding and raising livestock production ,prevention and protection </span></span></p>
                          <p style="color:#99CC00; font-family:Georgia, 'Times New Roman', Times, serif; font-size:15px;">In animal husbandry may employ breeders, herd health specialist, feeders, and milkers to helps care for animals</p>
                          <table width="80%" border="0">
                            <tr>
                              <td><a href="animal.php">Read more</a></td>
                            </tr>
                          </table>
						  <p>&nbsp; </p>
                      </div>
                    </div>
                  	<!-- /.box1 -->
                  </div>
              	  <div class="metam2">
                  	<!-- .box1 -->
                  	<div class="box1" >
                    	<h2 align="center">Welcome </h2>
                        <h4 align="center" class="list1 style28">Hello Dear Farmer</h4>
                        <p style="color:#99CC00; font-family:Georgia, 'Times New Roman', Times, serif; font-size:15px;"> we welcome you to our site to feed up your needs with our all possible ways. </p>                  
						<p>&nbsp; </p>
						</div>
               	  </div>
              	  <div class="metam3">
                  	<!-- .box1 -->
                  	<div class="box1">
                    	<h2 align="center" >Announcements</h2>
                    	<table width="100%" height="155" border="0">
                          <tr>
                            <th scope="col"><span class="style25">Latest News </span></th>
                          </tr>
                          <?php
					include("connect.php");
					$q=mysqli_query($conn,"select * from news order by nid desc limit 3") or die ("query fail");
					while($data=mysqli_fetch_array($q))
					{
	  						?>
                          <tr>
                            <td style="color:#99CC00; font-family:Georgia, 'Times New Roman', Times, serif; font-size:15px;"><?php echo $data['tittle'];?></td>
                          </tr>
                          <?php
						}
						?>
                          <tr>
                            <td><a href="news_all.php">Read More </a></td>
                          </tr>
                        </table>
                  	</div>
					  <p>&nbsp; </p>
                  	<!-- /.box1 -->
                  </div>
				
              	</div>
				  <div align="center" class="wrapper">
					<div align="center" class="metam1">
						<!-- .box1 -->
						<div class="box1">
							<h2 align="center">Activities</h2>
							<p style="color:#99CC00; font-family:Georgia, 'Times New Roman', Times, serif; font-size:15px;">For activities based on the location will be displayed, please navigate to below mentioned page.</p>
							<table width="80%" border="0">
                            <tr>
							<p>&nbsp; </p>
							<p>&nbsp; </p>
                              <td><a href="activities_all.php">Read more</a></td>
                            </tr>
                          </table>
						</div>
						<!-- /.box1 -->
					</div>
					<div class="metam2" >
						<!-- .box1 -->
						<div class="box1">
							<h2>Weather</h2>
							<table width="100%" height="164" border="0">
								<tr>
									<th>Location</th>
									<th>Temperature in Celcius</th>
									<th>Weather</th>
								</tr>
								<tr align="center">
								<?php 
								include("Texasweather.php");
								?>
									<td>  Texas  </td>
								<?php
									echo "<td>$temperature_in_celcius </td>";
									echo "<td><img src='http://openweathermap.org/img/wn/" .$temperature_current_weather_icon. "@2x.png'/> </td>";	
								?>
								</tr>						
								<tr>
								<tr align="center">
								<?php 
								include("Londonweather.php");
								?>
									<td>  London  </td>
								<?php
									echo "<td>$temperature_in_celcius </td>";
									echo "<td><img src='http://openweathermap.org/img/wn/" .$temperature_current_weather_icon. "@2x.png'/> </td>";	
								?>
								</tr>	
								</tr>
								<tr>
									<td></td>
								</tr>
							</table>
						</div>
						<!-- /.box1 -->
					</div>
				  </div>
              </div>
              <div class="row-2">
           
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
