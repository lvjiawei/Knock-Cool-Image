<?php include("./php/Container.php"); $temp=new Container(0); $address="index.html"; $temp->usercheck($address,1);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<!--
	knock,2010.10
	Project: konck_image
	@author lvjiawei
	@author zhuhaofeng
	@version 0.1
	@copyright 2010
	-->
	<head>
		<title>My Pictrue</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="./css/index_css.css" />
		<link rel="stylesheet" type="text/css" href="./css/user_css.css" />
	</head>
	<body>
	<div class="all">
	<div class="left">
    <div><!--user头?&#65533;，还有修改资料页?&#65533;?-->
	<a href="modi_user.php"><img src="./images/avatar.gif" class="avatarimage"></img></a>
    </div>
    <div id="name">
    <?php $nickname=$_SESSION['nickname']; echo "$nickname"?><!-- 这个是用户?&#65533;&#65533;-->
    </div>
    <div>
    <form action="./php/action.php" method="post">
    <table><!--这个是?&#65533;?索，通过内容?&#65533;?索数?&#65533;?库，并将其po出?&#65533;?-->
    <tr><td><input type="text" name="search" id="search" class="text" /></td><td><input type="submit" name="search" id="search" value="search" class="button1" /></td></tr>
    </table>
    </form>
    <table><!--这里?&#65533;用php写那个分享哦~~就是获?&#65533;?数?&#65533;?库里的5?&#65533;?分享（?&#65533;&#65533;字，地?&#65533;?），po到这5个td上?&#65533;? -->
    <tr><td><a href="">share 1</a></td></tr>
    <tr><td><a href="">share 2</a></td></tr>
    <tr><td><a href="">share 3</a></td></tr>
    <tr><td><a href="">share 4</a></td></tr>
    <tr><td><a href="">share 5</a></td></tr>
    </table>
    <div>
    <form action="./php/action.php" method="post">
     <table><tr><td><input type="submit" name="exit" id="exit" value="leave" class="button1"></td></tr>
    </table>
	</form>
    </div>
    </div>
	</div>
	<div id="right">
    
	</div>
	<div id="bottom">
	</div>
	</div>
	</body>
</html>
