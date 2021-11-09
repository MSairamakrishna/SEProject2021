<?php
session_start();
if (isset($_SESSION['uid']) == '')
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Organic Farming</title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="styles.css" rel="stylesheet" type="text/css" media="screen" />
    <style type="text/css">
        <!--
        .style4 {
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
                <?php if (isset($_SESSION['uid']) != '') {
                ?>
                    <li><a href="cart.php">Cart</a></li>
                    <li><a href="feedback.php">Feedback</a></li>
                <?php
            }
                ?>
                <?php if (isset($_SESSION['uid']) != '') { ?>
                    <li><a href="myprofile.php">Myprofile</a></li>
                    <li><a href="inquiry.php">Inquiry</a></li>
                    <li><a href="organicfarming.php" class="active">Farming</a></li>
                <?php
                } ?>
                
                <?php if (isset($_SESSION['uid']) == '') {
                ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="guest_feedback.php">Feedback</a></li>
                    <li><a href="contact.php">Contact</a></li>
                <?php
                } else {
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

            <div class="inside" style="border: #000000; border-style:double;">
                <div class="row-1 outdent">
                    <div class="wrapper" style=" width:1000px; height:30px; border: #000000; color:whitesmoke; padding:20px; ">
                        <h2>Identifying the best of the best in organic agriculture</h2>
                    </div>

                    <p></p>
                    <p align="left" class="style8 style4">Even with good things, there is the best of the best. So it is with organic agriculture. Organic farming techniques have long been proven to help foster and restore soil health, replenish soil organic carbon and preserve underground biodiversity. And some organic strategies provide a bigger bang for soil health than others.</p>
                    <p align="left" class="style8 style4">Four practices that are the most critical to good soil health: </p>
                    <div id="organic"
                        <ul> 
                            <li>Planting cover crops,</li>
                            <li>Applying combinations of organic inputs,</li>
                            <li>Increasing crop rotation diversity and length, and</li>
                            <li>Conservation tillage.</li>
                        </ul></p>
                    </div>
                    <!-- 
                    <p align="left" class="style8 style4">&nbsp;</p>
                    <p align="left" class="style8 style4">Techniques:</p>
                    <p align="left" class="style8 style4">Techniques such as artificial insemination and embryo transfer are frequently used today, not only as methods to guarantee that females breed regularly but also to help improve herd genetics.</p>
                    <p align="left" class="style8 style4">This may be done by transplanting embryos from stud-quality females into flock-quality surrogate mothers - freeing up the stud-quality mother to be reimpregnated. This practice vastly increases the number of offspring which may be produced by a small selection of stud-quality parent animals. On the one hand, this improves the ability of the animals to convert feed to meat, milk, or fibre more efficiently, and improve the quality of the final product. On the other, it decreases genetic diversity, increasing the severity of disease outbreaks among other risks.</p>
                    -->
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