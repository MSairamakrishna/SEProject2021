<?php
session_start();
if(isset($_SESSION['uid'])=='')
{
header("location:login.php ?msg=PLZ log in First");
}
if(isset($_REQUEST['perform'])=="true")
{
  $bfname=$_REQUEST['fname'];
  $bid=$_REQUEST['buid'];
  $pd=$_REQUEST['pswd'];
  $age=$_REQUEST['age'];
  $sx=$_REQUEST['se'];
  $cntct=$_REQUEST['mobile'];
  $serv=$_REQUEST['surv'];
  $ad=$_REQUEST['add'];
  $loc=$_REQUEST['local'];
  $stt=$_REQUEST['state'];
  $prof=$_REQUEST['pro'];
  $inc=$_REQUEST['inco'];
  $fip=$_REQUEST['frinp'];
  $land=$_REQUEST['land'];
  $chf=$_REQUEST['chaf'];
  $secq=$_REQUEST['secqu'];
  $seca=$_REQUEST['seca'];

	mysqli_query($conn, "update buyer set name='$bfname',age='$age',sex='$sx',phone='$cntct',address='$ad',locality='$loc',state='$stt',profession='$prof',income='$inc',farming_in_practice='$fip',land_owned='$land',challenges_faced='$chf'") or die("qf");
	header("location: register.php?msg=Account updated successfully.");	
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
.style1 {font-size: 14px}
.style2 {
	font-size: 15px;
	font-family: Georgia, "Times New Roman", Times, serif;
	color: #CC3333;
}
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
						<li><a href="Logout.php">Logout</a></li>
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
                <input type="hidden" name="perform" value="true" />
              <?php
              include("connect.php");
              $id=$_SESSION['uid'];
              $q=mysqli_query($conn,"select * from buyer where id=$id");
              $data=mysqli_fetch_array($q);
              ?>
		  <table width="80%" height="509" border="0" align="center" style="border: #000000 double;">
            <tr>
              <td height="47" colspan="3"><table width="100%" height="36" border="0">
                <tr>
                  <td width="34%" bgcolor="#CCFF99"><span class="style2">Welcome </span><span class="style2"><?php echo      "               " ;echo $data['name'];?></span></td>
                  <td width="66%" bgcolor="#CCFF99"><span style="background-color:#CCFF99; font:Georgia, 'Times New Roman', Times, serif; font-size:18px; color:#990033;">
                    <?php 
	                      if(isset($_REQUEST['msg'])!="")
	                       {
	                        echo $_REQUEST['msg'];
	                       }
	                         ?>
                  </span></td>
                </tr>
              </table></td>
            </tr>
            
            <tr>
              <td width="33%" height="47"><span class="style1">Name</span></td>
              <td width="66%">
                  <label>
                  <input name="fname" type="text" id="fname" value="<?php echo $data['name'];?>">
                  </label></td>
            </tr>
            <tr>
              <td width="33%" height="47"><span class="style1">BuyerID</span></td>
              <td width="66%">
                  <label>
                  <input name="name" type="text" id="name" value="<?php echo $data['buyerid'];?>" / readonly="">
                  </label></td>
            </tr>

            <tr>
              <td height="31"><span class="style1">Age</span></td>
              <td><label>
                <input name="age" type="text" id="age" value="<?php echo $data['age'];?>">
              </label></td>
            </tr>
            <tr>
                <td height="31"><span class="style5">Sex</span></td>
                <td><select name="se" id="se">
                  <option value="<?php echo $data['address'];?> " selected="selected"><?php echo $data['address'];?></option>
                  <option value="M" selected="selected">M</option>
                  <option value="F">F</option>
                </select></td>
              </tr>
            <tr>
              <td height="31"><span class="style1">Mobile no. </span></td>
              <td><input name="mobile" type="text" id="mobile" value="<?php echo $data['phone'];?>" maxlength="10" ></td>
            </tr>
            <tr>
              <td height="31"><span class="style1">Survey No </span></td>
              <td><input name="surv" type="text" id="surv" value="<?php echo $data['survey_no'];?>"  / readonly=""></td>
            </tr>
            <tr>
              <td height="31"><span class="style1">Address</span></td>
              <td><div align="left">
                  <textarea name="add" id="add"><?php echo $data['address'];?></textarea>
              </div></td>
            </tr>
            <tr>
              <td height="31"><span class="style1">Locality</span></td>
              <td><label>
                <input name="local" type="text" id="local" value="<?php echo $data['locality'];?>"/>
              </label></td>
            </tr>
            <tr>
              <td height="31"><span class="style1">State</span></td>
              <td><label>
                <input name="state" type="text" id="state" value="<?php echo $data['state'];?>"/>
              </label></td>
            </tr>
            <tr>
              <td height="31"><span class="style1">Profession</span></td>
              <td><label>
                <input name="pro" type="text" id="pro" value="<?php echo $data['profession'];?>"/>
              </label></td>
            </tr>
            <tr>
                <td height="31"><span class="style5">Yearly income</span> </td>
                <td><select name="inco" id="inco">
                  <option value="<?php echo $data['income'];?>" selected="selected">S<?php echo $data['income'];?></option>
                  <option value="Less than 10000">Less than 10000</option>
                  <option value="10000-25000" >10000-25000</option>
                  <option value="25000-50000">25000-50000</option>
                  <option value="50000-100000">50000-100000</option>
                  <option value="More than 100000">More than 100000</option>
                </select></td>
              </tr>
            <tr>
                <td height="31"><span class="style5">Farming in Practice</span></td>
              <td><input name="frinp" type="text" id="frinp" value="<?php echo $data['farming_in_practice'];?>"/>
              </td>
              </tr>
              <tr>
                <td height="31"><span class="style5">Land Owned (Acres) </span></td>
                <td><input name="land" type="text" id="land" value="<?php echo $data['land_owned'];?>"/></td>
              </tr>
            <tr>
                <td height="31"><span class="style5">Challenges Faced</span></td>
                <td><input name="chaf" type="text" id="chaf" value="<?php echo $data['challenges_faced'];?>"/></td>
              </tr>
            <tr>
            <td>&nbsp;</td>
            </tr>
              <tr>
              <td align="center" colspan="3"><input type="submit" name="Submit" value="Edit/Update Profile" /></td>
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
