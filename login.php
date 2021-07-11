<?php
$noLogin = 1;
require('config.php');
if(strtolower($_SERVER['REQUEST_METHOD']) == "post")
{
	if(!isset($_POST['g-recaptcha-response']) || empty($_POST['g-recaptcha-response']) ||
	  !isset($_POST['name']) || empty($_POST['name']) ||
	  !isset($_POST['pass']) || empty($_POST['pass']))
	{
		header('Location: login.php?error');
		die();
	}
	else
	{
		if($_POST['name'] == $username && $_POST['pass'] == $password)
		{
			session_start();
			$_SESSION['nimapanel_loginexpire'] = time()+30;
			$_SESSION['nimapanel_loginip'] = getIPAddress();
			$_SESSION['nimapanel_login'] = 0;
			header('Location: index.php');
		}
	}
}
?>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>SA:MP Panel - Login</title>
<link rel="stylesheet" href="normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="animate.css/3.7.0/animate.min.css">
<link rel="stylesheet" href="twitter-bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="font-awesome/4.7.0/css/all.min.css">
<style>
html {
	height: 100%;
}
body {
	height: 100%;
	margin: 0;
	background-repeat: no-repeat;
	background-attachment: fixed;
}
.text-c {
	text-align: center;
}
.text-l {
	text-align: left;
}
.text-r {
	text-align: right
}
.text-j {
	text-align: justify;
}
.text-whitesmoke {
	color: whitesmoke
}
.text-darkyellow {
	color: rgba(255, 235, 59, 0.432)
}
.line-b {
	border-bottom: 1px solid #FFEB3B !important;
}
.button {
	border-radius: 3px;
}
.form-button {
	background-color: rgba(255, 235, 59, 0.24);
	border-color: rgba(255, 235, 59, 0.24);
	color: #e6e6e6;
}
.form-button:hover,
.form-button:focus,
.form-button:active,
.form-button.active,
.form-button:active:focus,
.form-button:active:hover,
.form-button.active:hover,
.form-button.active:focus {
	background-color: rgba(255, 235, 59, 0.473);
	border-color: rgba(255, 235, 59, 0.473);
	color: #e6e6e6;
}
.margin-g {
	margin: 15px;
}
.margin-g-sm {
	margin: 10px;
}
.margin-g-md {
	margin: 20px;
}
.margin-g-lg {
	margin: 30px;
}
.margin-l {
	margin-left: 15px;
}
.margin-l-sm {
	margin-left: 10px;
}
.margin-l-md {
	margin-left: 20px;
}
.margin-l-lg {
	margin-left: 30px;
}
.margin-r {
	margin-right: 15px;
}
.margin-r-sm {
	margin-right: 10px;
}
.margin-r-md {
	margin-right: 20px;
}
.margin-r-lg {
	margin-right: 30px;
}
.margin-t {
	margin-top: 15px;
}
.margin-t-sm {
	margin-top: 10px;
}
.margin-t-md {
	margin-top: 20px;
}
.margin-t-lg {
	margin-top: 30px;
}
.form-control,
.border-line {
	background-color: #5f5f5f;
	background-image: none;
	border: 1px solid #424242;
	border-radius: 1px;
	color: inherit;
	display: block;
	padding: 6px 12px;
	transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
	width: 100%;
}
.form-control:focus,
.border-line:focus {
	border-color: #FFEB3B;
	background-color: #616161;
	color: #e6e6e6;
}
.form-control,
.form-control:focus {
	box-shadow: none;
}
.form-control::-webkit-input-placeholder { color: #BDBDBD; }
.container-content {
	background-color: #3a3a3aa2;
	color: inherit;
	padding: 15px 20px 20px 20px;
	border-color: #FFEB3B;
	border-image: none;
	border-style: solid solid none;
	border-width: 1px 0;
}
.login-container {
	max-width: 400px;
	z-index: 100;
	margin: 0 auto;
	padding-top: 100px;
}
.login.login-container {
	width: 300px;
}
.wrapper.login-container {
	margin-top: 140px;
}
.logo-badge {
	color: #e6e6e6;
	font-size: 80px;
	font-weight: 800;
	letter-spacing: -10px;
	margin-bottom: 0;
}
</style>
<script src='https://www.google.com/recaptcha/api.js?explicit&hl=fa' async defer></script>
</head>
<body translate="no" class="bg-dark">  
  <div class="login-container text-c animated flipInX">
	  <h1 class="logo-badge text-whitesmoke"><span class="fa fa-user-circle"></span></h1>
	  <p class="text-whitesmoke"></p>
	  <div class="container-content">
		  <form class="margin-t" method="POST" action="#">
			  <div class="form-group">
				  <input type="text" class="form-control" placeholder="Username" required="" name="name">
			  </div>
			  <div class="form-group">
				  <input type="password" class="form-control" placeholder="Password" required="" name="pass">
			  </div>
			  <div class="form-group">
				  <div align="center" class="g-recaptcha" data-theme="dark" data-sitekey="6LcF3BYaAAAAAJ--f7_G4u638KE1ia87TVshTcMH"></div>
			  </div>
			  <button type="submit" class="btn btn-success btn-md">Login</button>
			  <hr>
		  </form>
		  <p class="margin-t text-whitesmoke"><small> Made by Nima Bastaniw</small> </p>
	  </div>
  </div>
  <script src="jquery/3.3.1/jquery.min.js"></script> 
</body>
</html>