<?php
include("./lib/Container.php");
$temp=new Container(0);
$temp->usercheck("user.php",2);
if(isset ($_GET['id']))
	echo "<script type=\"text/javascript\">window.location.replace(\"guest.php?id=".$_GET['id']."\");</script>";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<!--
	knock,2010.10
	Project: konck_image
	@author lvjiawei
	@author zhuhaofeng
	@copyright 2010
	@version 0.1
	-->
	<head>
		<title>My Pictrue</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="./css/index_css.css" />
		<script type="text/javascript" src="./js/check.js"></script>
		<script type="text/javascript" src="./js/jump.js"></script>
	</head>
	<body>
	<div class="signback">

	<div class="Sign">
		<form action="action.php" method="post" onSubmit="return signin_check()">
			<table>
				<tr><td id="orange">邮箱地址:</td><td><input type="text" name="email" id="email" class="text"></td></tr>
				<tr><td id="orange">输入密码:<td><input type="password" name="pw" id="pw" class="text"></td></tr>
				<tr><td><input type="hidden" name="action" id="action" value="login"/></td>
					<td><input type="submit" value="登录" class="button1">
					    <input type="button" value="忘记密码" class="button1" onClick="forget_jump()">
					</td>
				</tr>
			</table>
			<br/>
			<table>
				<tr><td id="orange">还没有帐号？</td><td><input type="button" value="注册帐号" class="button2" onclick="signup_jump(4)"></td></tr>
				
			</table>
		</form>
	</div>
	</div>

	</body>
</html>
