<?php
session_start();
/* Fetching details from buyer table */
include("connect.php");
if(isset($_REQUEST['perform'])=="true")
{
$name=$_REQUEST['fname'];
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
$q1=mysqli_query($conn,"select * from buyer where buyerid='$bid'") or die("QF");
$q2=mysqli_query($conn,"select * from buyer where survey_no='$serv'")or die ("QF");
    if(@mysqli_num_rows($q1)!= 0)       
    {
        $msg = "This ID  has been already taken";
    }
    else if(@mysqli_num_rows($q2)!=0)
    {
        $msg = "This survey number has been already registered";
    }
    else
    {
        mysqli_query($conn, "insert into buyer(name,buyerid,password,age,sex,phone,survey_no,address,locality,state,profession,income,farming_in_practice,land_owned,challenges_faced,security_question,security_answer) values('$name','$bid','$pd',$age,'$sx',$cntct,'$serv','$ad','$loc','$stt','$prof','$inc','$fip',$land,'$chf','$secq','$seca')") or die("qf");
        header("location: register.php?msg=Account created successfully."); 
    }
}
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
.style1 {color: #999933}
.style3 {color: #999933; font-size: 14px; }
.style5 {color: #FFFFFF; font-size: 14px; }
-->
        </style>
</head>

<script language="javascript" type="text/javascript">
function validate()
{
  /* Script to validate user inputs*/
   if(document.getElementById('fname').value=="")
    { 
       alert('please enter your first name');
       document.getElementById('fname').focus();
       return false;
    }
    
    if(document.getElementById('buid').value=="")
    { 
       alert('please enter your ID');
       document.getElementById('buid').focus();
       return false;
    }
    if(document.getElementById('pswd').value=="")
    { 
       alert('please enter your password');
       document.getElementById('pswd').focus();
       return false;
    }
    if(document.getElementById('pswd').value=="")
    { 
       alert('please enter your password');
       document.getElementById('pswd').focus();
       return false;
    }
    if(document.getElementById('age').value=="")
    { 
       alert('please enter your age');
       document.getElementById('age').focus();
       return false;
    }
    if(isNaN(document.getElementById('age').value))
    { 
       alert('Age should be integer');
       document.getElementById('age').focus();
       return false;
    }
     if(document.getElementById('mobile').value=="")
    { 
       alert('please enter your contact number');
       document.getElementById('mobile').focus();
       return false;
    }
    if(isNaN(document.getElementById('mobile').value))
    { 
       alert('Mobile number should be integer');
       document.getElementById('mobile').focus();
       return false;
    }
    if(document.getElementById('surv').value=="")
    { 
       alert('please enter your survey no.');
       document.getElementById('surv').focus();
       return false;
    }
    if(document.getElementById('add').value=="")
    { 
       alert('please enter your Address');
       document.getElementById('add').focus();
       return false;
    }
    if(document.getElementById('local').value=="")
    { 
       alert('please enter your locality');
       document.getElementById('local').focus();
       return false;
    }
     if(document.getElementById('state').value=="")
    { 
       alert('please enter your State');
       document.getElementById('state').focus();
       return false;
    }
     if(document.getElementById('pro').value=="")
    { 
       alert('please enter your profession');
       document.getElementById('pro').focus();
       return false;
    }
     if(document.getElementById('inco').value=="Select Your income")
    { 
       alert('please enter your Yearly Income');
       document.getElementById('inco').focus();
       return false;
    }
     if(document.getElementById('frinp').value=="")
    { 
       alert('please enter your Farming in practice');
       document.getElementById('frinp').focus();
       return false;
    }
    if(document.getElementById('land').value=="")
    { 
       alert('please enter your land owned in acres');
       document.getElementById('land').focus();
       return false;
    }
    if(isNaN(document.getElementById('land').value))
    { 
       alert('Land owned should be integer');
       document.getElementById('land').focus();
       return false;
    }
    if(document.getElementById('chaf').value=="")
    { 
       alert('please enter your challenges faced');
       document.getElementById('chaf').focus();
       return false;
    }
      if(document.getElementById('secqu').value=="select your security question")
    { 
       alert('please select your security question');
       document.getElementById('secqu').focus();
       return false;
    }
     
     if(document.getElementById('seca').value=="")
    { 
       alert('please enter you answer for security question');
       document.getElementById('seca').focus();
       return false;
    }
}
</script>
<script language="javascript" type="text/javascript">

function getXMLHTTP() 
{ 
        var xmlhttp=false;  
        try
        {
            xmlhttp=new XMLHttpRequest();
        }
        catch(e)    
        {       
            try
            {           
                xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");
            }
            catch(e)
            {
                try
                {
                    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
                }
                catch(e1)
                {
                    xmlhttp=false;
                }
            }
        }
         return xmlhttp;
}
</script>

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
                        <li><a href="register.php" class="active">Register</a></li>
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
                        <li><a href="login.php">Login</a></li>
                        <li><a href="guest_feedback.php">Feedback</a></li>
                        <li><a href="contact.php">Contact</a></li>
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
                <input type="hidden" name="perform" value="true" />
                
                   <table align="center" width="80%" height="579" border="0"  style="border: #000000 double;">
                       <tr>
                     <td height="26" colspan="3"><table width="100%" height="36
                      " border="0">
                        <tr>
                          <td style="background-color:#CCFF99; font-size:18px; font-family:Georgia, 'Times New Roman', Times, serif; color:#990033;"><?php 
                          if(isset($_REQUEST['msg'])!="")
                           {
                            echo $_REQUEST['msg'];
                           }
                            if(isset($msg)!="")
                            {
                                echo $msg;
                            }
                            ?>
                             </td>
                        </tr></table></td>
                  </tr>
                   <tr>
      <td height="56" colspan="3">
      <div align="center" class="style1" style="color:#FFFFFF">Create Account</div>        
      <div align="center"></div>       
    <div align="center"></div></td>
    </tr>
    <tr>
    
      <td width="33%"><span class="style5">Name</span></td>
      <td width="66%"><div align="left">
        <label>
        <input name="fname" type="text" id="fname" />
        </label>
      </div></td>
    </tr>
    <tr>
      <td height="31"><span class="style5">BuyerID </span></td>
      <td><input name="buid" type="text" id="buid" /></td>
    </tr>
    <tr>
      <td height="31"><span class="style5">Password</span></td>
      <td><input name="pswd" type="password" id="pswd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 5 or more characters" required"></td>
      
    </tr>
    <tr>
      <td height="31"><span class="style5">Age</span></td>
      <td><label>
        <input name="age" type="text" id="age" maxlength="3" />
      </label></td>
    </tr>
    <tr>
      <td height="31"><span class="style5">Sex</span> </td>
      <td><select name="se" id="se">
        <option value="M" selected="selected">M</option>
        <option value="F">F</option>
      </select></td>
    </tr>
    <tr>
      <td height="31"><span class="style5">Mobile no. </span></td>
      <td><input name="mobile" type="text" id="mobile" maxlength="10" /></td>
    </tr>
    <tr>
      <td height="31"><span class="style5">Survey No. </span></td>
      <td><input name="surv" type="text" id="surv" /></td>
    </tr>
    <tr>
      <td height="31"><span class="style5">Address</span></td>
      <td><div align="left">
        <textarea name="add" id="add"></textarea>
      </div></td>
    </tr>
    <tr>
      <td height="31"><span class="style5">Locality </span></td>
      <td><input name="local" type="text" id="local" /></td>
    </tr>
    <tr>
      <td height="31"><span class="style5">State</span></td>
      <td><input name="state" type="text" id="state" />
      </td>
    </tr>
    <tr>
      <td height="31"><span class="style5">Profession</span></td>
      <td><input name="pro" type="text" id="pro" />
      </td>
    </tr>
    <tr>
      <td height="31"><span class="style5">Yearly income</span> </td>
      <td><select name="inco" id="inco">
        <option value="Select Your income" selected="selected">Select Your income</option>
        <option value="Less than 10000">Less than 10000</option>
        <option value="10000-25000">10000-25000</option>
        <option value="25000-50000">25000-50000</option>
        <option value="50000-100000">50000-100000</option>
        <option value="More than 100000">More than 100000</option>
      </select></td>
    </tr>
    <tr>
      <td height="31"><span class="style5">Farming in Practice</span></td>
      <td><input name="frinp" type="text" id="frinp" />
      </td>
    </tr>
    <tr>
      <td height="31"><span class="style5">Land Owned (Acres) </span></td>
      <td><input name="land" type="text" id="land" /></td>
    </tr>
    <tr>
      <td height="31"><span class="style5">Challenges Faced</span></td>
      <td><input name="chaf" type="text" id="chaf" /></td>
    </tr>
    <tr>
      <td height="31"><span class="style5">Security Question</span> </td>
      <td><select name="secqu" id="secqu">
        <option value="select your security question" selected="selected">select your security question</option>
        <option value="What is your school name" >What is your school name</option>
        <option value="What is your mother maiden name">What is your mother maiden name</option>
        <option value="What is your pet name">what is your pet name</option>
        <option value="What is your favorite movie">What is your favorite movie</option>
      </select></td>
    </tr>
    <tr>
      <td height="31"><span class="style5">Security Answer</span></td>
      <td><input name="seca" type="text" id="seca" /></td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    </tr>
    <tr>
    <td align="left"><input type="reset" name="reset" /></td>
    <td align="left"><input type="submit" name="Submit" value="Create Account" /></td>
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