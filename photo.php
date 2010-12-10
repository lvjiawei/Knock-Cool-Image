<?php include("./lib/Container.php"); $temp=new Container(0); $address="index.html"; $temp->usercheck($address,1);?>
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
		<script type="text/javascript">
			function addflower()
			{
				var flower = document.getElementById("flo_num");
				var flower_num = Number(flower.innerHTML) + 1;//
				//alert(flower_num);
				flower.innerHTML = flower_num;
				
			}
			function addegg()
			{
				var egg = document.getElementById("egg_num");
				var egg_num = Number(egg.innerHTML) + 1;//
				//alert(flower_num);
				egg.innerHTML = egg_num;

			}
		</script>
	</head>
	<body>
	<div class="all">
	    <div id="tilte">My Picture</div>
		<div class="left">
			<div><!--user??&#65533;???????????????&#65533;?-->
				<a href="modi_user.php"><img src="./images/avatar.gif" class="avatarimage"></img></a>
			</div>
			
			<div id="name">
				<?php $nickname=$_SESSION['nickname']; echo "$nickname"?><!-- ?????????&#65533;&#65533;-->
				
			</div>
			
			<div>
				<form action="./php/action.php" method="post">
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
					<form action="./php/action.php" method="post">
						<table><tr><td><input type="submit" name="exit" id="exit" value="leave" class="button1"></td></tr>
						</table>
					</form>
				</div>
				<span><a href="team_of_us.php">TEAM 0F US</a></span> 
			</div>
		</div>
	
		<div id="right">
		<form action="comment.php" method="post">
			<table>
				<tr><td id="symbol" style="text-align:left"><a href="user.php">Pic</a></td></tr>
				<tr><td><img src="./images/ablum.jpg" name="b1" class="photo"/></td> 
				<!--<td><input type="button" value="油画" onclick="oilpaint()"></td>--></tr>
				<!--左为逆时针转90度-->	
				<tr><td style="text-align:right"><input type="button" value="Flower" onclick="addflower()"><span id="flo_num">12</span>
											<input type="button" value="Egg" onclick="addegg()"><span id="egg_num">2</span>
											<input type="button" value="左" onclick="trunleft()"><input type="button" value="右" onclick="trunright()"></td></tr>
				<tr><td style="text-align:right"><textarea id="comment" rows="3" cols="41"></textarea></td></tr>
				<tr><td style="text-align:right"><input type="submit" value="评论"></td></tr>
			</table>
		</form>
			<table>
			<tr><td id="symbol" style="width:350px;text-align:left">收到的评论</td></tr>
			<?php
				//if(条件)
				echo "<tr><td>". "内容"."<//td><//tr>"."<tr><td>". "名字"."<//td><//tr>";
			?>
			</table>
		</div>
		<div id="tool" style="text-align:left">
			<p id="symbol" style="text-align:left">工具栏<p></br>
			<input type="button" value="油画" onclick="oilpaint()" class="toolbutton"><input type="button" value="游戏" onclick="game()" class="toolbutton"></br>
			<input type="button" value="黑白" onclick="whiteblack()" class="toolbutton"><input type="button" value="模糊" onclick="mohu()" class="toolbutton"></br>
			<input type="button" value="上传" onclick="upload()" class="toolbutton"><input type="button" value="删除" onclick="delete()" class="toolbutton">
		</div>
	</div>
		<!--<div id="bottom">
			<p><a href="team_of_us.html">TEAM 0F US</a></p> 
		</div>-->
	</div>
	</body>
</html>