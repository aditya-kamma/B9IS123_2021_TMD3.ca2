<?php
	session_start();
	include_once("db_connect.php");
	include_once("functions.php");
	ini_set("display_errors",0);
	error_reporting(E_ERROR);
	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Employee Management System</title>
<!-- // Stylesheets // -->
<link rel="stylesheet" type="text/css" href="./css/style.css" />
<link rel="stylesheet" type="text/css" href="./css/ddsmoothmenu.css" />
<link rel="stylesheet" type="text/css" href="./css/contentslider.css" />
<link rel="stylesheet" type="text/css" href="./css/jquery.fancybox-1.3.1.css" />
<link rel="stylesheet" type="text/css" href="./css/slider.css" />
<link rel="stylesheet" type="text/css" href="./css/jquery-ui.css">


</head>

<body>
<div id="wrapper_sec">
	<div id="masthead">
    	<div class="logo">
        	<a href="./index.php" class="logo-custom">Employee Management System</a>
        </div>
        <div class="slogan"></div>
        <div class="clear"></div>
            <div class="navigation">
            	<div id="smoothmenu1" class="ddsmoothmenu">
                    <ul>
                    <li><a href="./index.php">Home</a>
                   </li>
					<?php if($_SESSION['user_details']['user_level_id'] == 1) {?>
					<li><a href="./login-home.php">Dashboard</a></li>
					<?php } if($_SESSION['login'] == 1) {?>
					<li><a href="./lib/login.php?act=logout">Logout</a></li>
					<?php } else { ?>
					<li><a href="./login.php">Login</a></li>
                    <li><a href="./contact.php">Contact Us</a></li>
					<?php }?>
                    </ul>
                    <br style="clear: left" />
                    </div>
            </div>
    </div>
