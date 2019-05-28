<?php
error_reporting("E_ALL &~ E_NOTIC");
ob_start();
require 'include/config.php';

define("uid",$_COOKIE['uid']);
define("login",$_COOKIE['login']);

$stmnt = $conn->query("SELECT * FROM users WHERE u_id = '".uid."' ");
$row = $stmnt->fetch(PDO::FETCH_OBJ);

define("uid",$row->u_id);
define("uname",$row->u_name);
define("uemail",$row->u_email);

?>

<html>
    <head>
        <title>ElfertBlog V 2.0</title>
        <meta charset="utf-8">
        <link rel="icon" href="css/image/logo.ico">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
       
        <!-- Start Header -->
        <div class="header">
            <div class="navTop">
               <div class="container">
                    <ul>
                        <li><a href="#">عن الموقع</a></li>
                        <li><a href="#">راسلنا</a></li>
                        <li><a href="#">فريق التدوين</a></li>
                        <li><a href="#">للاعلان بالموقع</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
            </div>
            
            <div class="head container">
                <div class="logo">
                    <a href="#"><img src="images/logo.png" title="ElfertBlog" width="210"></a>
                </div>
                <div class="ads">
                    الاعلانات هنا 
                </div>
                <div class="clear"></div>
            </div>
            
            <div class="navbar">
               <div class="container">
                    <ul>
                        <li><a href="index.php">الرئيسيه</a></li>
                        <?php
                          if(login != 1)
                          {
                              echo'<li><a href="register.php">تسجيل</a></li>';
                          }else{
                              echo'<li><a href="logout.php">خروج</a></li>';
                          }
                        ?>
                        <li><a href="#">رابط</a></li>
                        <li><a href="#">رابط</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- End Header -->
        
        <!-- Start Cnotent -->
        <div class="container">