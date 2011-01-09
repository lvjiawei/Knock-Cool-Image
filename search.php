<?php include("./lib/Container.php");
$temp=new Container(0); $address="index.php";
$temp->usercheck($address,1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<!--
	knock,2010.11
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
    <div><!--user??&#65533;???????????????&#65533;?-->
	<a href="modi_user.php"><img src="./images/avatar.gif" class="avatarimage"></img></a>
    </div>
    <div id="name">
    <?php $nickname=$_SESSION['nickname']; echo "$nickname"?><!-- ?????????&#65533;&#65533;-->
    </div>
    <div>
    <form action="action.php" method="post">
    <table><!--??????&#65533;?????????????&#65533;??????&#65533;?????????po???&#65533;?-->
    <tr><td><input type="text" name="search" id="search" class="text" /></td><td><input type="submit" name="search" id="search" value="search" class="button1" /></td></tr>
    </table>
    </form>
    <table><!--?????&#65533;??phpд????????~~??????&#65533;????&#65533;??????5?&#65533;???????&#65533;&#65533;??????&#65533;?????po????5??td???&#65533;? -->
    <tr><td><a href="">share 1</a></td></tr>
    <tr><td><a href="">share 2</a></td></tr>
    <tr><td><a href="">share 3</a></td></tr>
    <tr><td><a href="">share 4</a></td></tr>
    <tr><td><a href="">share 5</a></td></tr>
    </table>
    <div>
    <form action="action.php" method="post">
     <table><tr><td><input type="submit" name="exit" id="exit" value="leave" class="button1"></td></tr>
    </table>
	</form>
    </div>
    </div>
	</div>

	<div id="right">
		<div class="list">
					<dl id="papers">  
						<dt>
							<div class="item3">
								<!--4个功能项-->
								<a class="select" href="">用户</a>
								<a href="">照片</a>
								<a href="">专辑</a>
								
							</div>
						</dt>  
						<dd>
							<ul>
								<li class="ilist">
									<div class="listitem"><h2>100</h2></div>
									<div class="listinfo">
										<div class="title">
											<a href="">...</a>
										</div>
										<div class="description">helloworld</div>
									</div>
									<div class="go_to"><a href="">去测一下</a>
									</div>
								</li>
								
								<li class="ilist">
									<div class="listitem"><h2>100</h2></div>
									<div class="listinfo">
										<div class="title">
											<a href="">...</a>
										</div>
										<div class="description">helloworld</div>
									</div>
									<div class="go_to"><a href="">去测一下</a>
									</div>
								</li>
								<li class="ilist">
									<div class="listitem"><h2>100</h2></div>
									<div class="listinfo">
										<div class="title">
											<a href="">...</a>
										</div>
										<div class="description">helloworld</div>
									</div>
									<div class="go_to"><a href="">去测一下</a>
									</div>
								</li>
								<li class="ilist">
									<div class="listitem"><h2>100</h2></div>
									<div class="listinfo">
										<div class="title">
											<a href="">...</a>
										</div>
										<div class="description">helloworld</div>
									</div>
									<div class="go_to"><a href="">去测一下</a>
									</div>
								</li>
								<li class="ilist">
									<div class="listitem"><h2>100</h2></div>
									<div class="listinfo">
										<div class="title">
											<a href="">...</a>
										</div>
										<div class="description">helloworld</div>
									</div>
									<div class="go_to"><a href="">去测一下</a>
									</div>
								</li>
								<li class="ilist">
									<div class="listitem"><h2>100</h2></div>
									<div class="listinfo">
										<div class="title">
											<a href="">...</a>
										</div>
										<div class="description">helloworld</div>
									</div>
									<div class="go_to"><a href="">去测一下</a>
									</div>
								</li>
								<li class="ilist">
									<div class="listitem"><h2>100</h2></div>
									<div class="listinfo">
										<div class="title">
											<a href="">lai ce ce</a>
										</div>
										<div class="description">helloworld</div>
									</div>
									<div class="go_to"><a href="">去测一下</a>
									</div>
								</li>
								<li class="ilist">
									<div class="listitem"><h2>100</h2></div>
									<div class="listinfo">
										<div class="title">
											<a href="">...</a>
										</div>
										<div class="description">helloworld</div>
									</div>
									<div class="go_to"><a href="">去测一下</a>
									</div>
								</li>
								<li class="ilist">
									<div class="listitem"><h2>100</h2></div>
									<div class="listinfo">
										<div class="title">
											<a href="">...</a>
										</div>
										<div class="description">helloworld</div>
									</div>
									<div class="go_to"><a href="">去测一下</a>
									</div>
								</li>
								<li class="ilist">
									<div class="listitem"><h2>100</h2></div>
									<div class="listinfo">
										<div class="title">
											<a href="">...</a>
										</div>
										<div class="description">helloworld</div>
									</div>
									<div class="go_to"><a href="">去测一下</a>
									</div>
								</li>
								
							</ul>
						</dd>  
					</dl> 
				</div>
	</div>

	<div id="bottom">
	</div>
	</div>
	</body>
</html>
