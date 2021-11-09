<?php
session_start();
if(isset($_SESSION['uid'])=='')
{
header("location:login.php ?msg=Please log in First");
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
.style4 {font-size: 15px}
-->
        </style>
		<script language="javascript" type="text/javascript">
function validate()
{
   if(document.getElementById('name').value=="")
   {
        if (document.getElementById('local').value=="") 
        { 
            if (document.getElementById('state').value=="") 
            {
                if (document.getElementById('fip').value=="") 
                {
                    alert('please enter any one search fields');
                    return false;
                }
            }
        }
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
						<li><a href="inquiry.php" class="active">Inquiry</a></li>
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
				
               
					<div class="inside" align="center">
            	<div class="row-1 outdent">
            	  <div class="wrapper"></div>
				  <form id="form1" method="post" action="" onsubmit="return validate();">
                  <input type="hidden" name="perform" value="true" />
                  <table width="50%" height="250" border="0"  style="border:#000000 double;">
                    <tr >
                      <td colspan="3"><table width="100%" height="36" border="0">
                        <tr>
						<td align="center" style="background-color:#CCFF99; font-size:18px; font-family:Georgia, 'Times New Roman', Times, serif; color:#990033;">
						  <?php 
	                      if(isset($_REQUEST['msg'])!="")
	                       {
	                        echo $_REQUEST['msg'];
	                       }
	                         ?>
							 </td>
                        </tr></table></td>
                    </tr>
                    <tr align="center">
                      <td width="22%"><span class="style1">Search by Name</span></td>
                      <td width="77%"><label>
                        <input name="name" type="text" id="name">
                      </label></td>
                    </tr>
                    <tr align="center">
                      <td width="22%"><span class="style1">Search by Locality</span></td>
                      <td width="77%"><label>
                        <input name="local" type="text" id="local">
                      </label></td>
                    </tr>
                    <tr align="center">
                      <td><span class="style4">Search by state</span> </td>
                      <td><label>
                        <input name="state" type="text" id="state" />
                      </label></td>
                    </tr>
                    <tr align="center">
						<td height="31"><span class="style1">Search by Farming in practice</span></td>
						<td><label>
                        <input name="fip" type="text" id="fip" />
                      </label></td>
					</tr>
                    <tr>
                      <td  align="center" colspan="2">
                        <input type="submit" name="Submit" value="Search" />
                      </td>
                    </tr>
                  </table>
                </form>
            	</div>
              <div class="row-2">
              	<div class="wrapper"></div>
              </div>
            </div>
<?php
    if(isset($_REQUEST['perform'])=="true")
        {
            ?> 
            <div>			    
        <table width="100%" border="1" align="center" color>
          <tr>
             <td width="10%" class="font" align="center">No.</td>
            <td width="10%" class="font" align="center">Buyer Name.</td>
            <td width="10%" class="font" align="center">Phone</td>
            <td width="10%" class="font" align="center">Address</td>
            <td width="10%" class="font" align="center">Locality</td>
            <td width="10%" class="font" align="center">State</td>
            <td width="10%" class="font" align="center">Profession</td>
            <td width="10%" class="font" align="center">Challenges Faced</td>
            <td width="10%" class="font" align="center">Farming in practice</td>
            <td width="10%" class="font" align="center">Landowned</td>
          </tr>
		      <?php
	        include("connect.php");	
		$i=1;
        $q1=$_REQUEST['name'];
        $q2=$_REQUEST['local'];
        $q3=$_REQUEST['state'];
        $q4=$_REQUEST['fip'];
        $sql2 = mysqli_query($conn,"select * from buyer where name='$q1' or locality='$q2' or state='$q3' or farming_in_practice='$q4'")or die("query failed");
        if(mysqli_num_rows($sql2)!=0)
        {
            
            $n=0;
            while($data=mysqli_fetch_array($sql2))
            {
            ?>
                <tr font-color: while>
                    <td><?php echo $i;?></td>
                    <td><?php echo $data['name'];?></td>
                    <td><?php echo $data['phone'];?></td>
                    <td><?php echo $data['address'];?></td>
                    <td><?php echo $data['locality'];?></td>
                    <td><?php echo $data['state'];?></td>
                    <td><?php echo $data['profession'];?></td>
                    <td><?php echo $data['challenges_faced'];?></td>
                    <td><?php echo $data['farming_in_practice'];?></td>
                    <td><?php echo $data['land_owned'];?></td>
                    
                </tr>
                <?php
            $i++;
            }
            ?>
                </table>
                </div>
                <?php	
        }
        else{
            $msg ="No Profile found";
        }
    }
    ?>

				</div>
				<div id="content_bottom"></div>
				<div id="footer_top">
				  <div class="clear"></div>
				</div>
			
		</div>
    </body>
</html>