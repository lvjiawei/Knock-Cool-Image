<?php include("./php/Container.php"); $temp=new Container(0); $temp->usercheck("user.php",2);?>
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
	<h2>Welcome!</h2>
	<div class="Sign">
		<form action="./php/index_check.php" method="post" onSubmit="return signin_check()">
			<table>
				<tr><td id="orange">Your Email:</td><td><input type="text" name="email" id="email" class="text"></td></tr>
				<tr><td id="orange">Password:<td><input type="password" name="pw" id="pw" class="text"></td></tr>
				<tr><td></td>
					<td><input type="submit" value="Sign In" class="button1">
					    <input type="button" value="Forget" class="button1" onClick="forget_jump(4)">
					</td>
				</tr>
				<tr><td id="blue">No Account?</td><td><input type="button" value="Sign Up Now" class="button2" onclick="signup_jump(4)"></td></tr>
			</table>
		</form>
	</div>	
	</div>
	
	</body>
</html>
