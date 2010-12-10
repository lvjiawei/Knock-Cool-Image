<?php include("./lib/Container.php"); $temp=new Container(0); $address="index.php"; $temp->usercheck($address,1);?>
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
		<?php
		for($i=1;$i<=8;$i++)
		{
			echo "<script type=\"text/javascript\">
				function mouseOver".$i."()".
				"{
				   document.b".$i.".style.opacity=1;
			    }
			function mouseOut".$i."()".
			  "{
			  document.b".$i.".style.opacity=0.7;
			  }
		      </script>";
		}
		?>
	</head>
	<body>
	<div class="all">
	<div class="left">
    <div><!--userͷ?&#65533;�������޸�����ҳ?&#65533;?-->
	<a href="modi_user.php"><img src="<?php if($_SESSION['avatar']!="")echo $_SESSION['avatar'];else echo"./images/avatar.gif";?>" class="avatarimage"></img></a>
    </div>
    <div id="name">
    <?php $nickname=$_SESSION['nickname']; echo "$nickname"?><!-- ������û�?&#65533;&#65533;-->
    </div>
    <div>
    <form action="action.php" method="post">
    <table><!--�����?&#65533;?����ͨ������?&#65533;?����?&#65533;?�⣬������po��?&#65533;?-->
    <tr><td><input type="text" name="search" id="search" class="text" /></td><td><input type="submit" name="search" id="search" value="search" class="button1" /></td></tr>
    </table>
    </form>
    <table><!--����?&#65533;��phpд�Ǹ�����Ŷ~~���ǻ�?&#65533;?��?&#65533;?�����5?&#65533;?�����?&#65533;&#65533;�֣���?&#65533;?����po����5��td��?&#65533;? -->
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
	<span><a href="team_of_us.php">TEAM 0F US</a></span>
    </div>
	</div>
	<div id="right">
    <table id="rightshow"><!--����?&#65533;��phpд�Ǹ�����Ŷ~~���ǻ�?&#65533;?��?&#65533;?�����5?&#65533;?�����?&#65533;&#65533;�֣���?&#65533;?����po����5��td��?&#65533;? -->
    <tr style="padding-top:10px"><td><img src="./images/ablum.jpg" name="b1" onmouseOver="mouseOver1()" onmouseOut="mouseOut1()" class="ablumimage"/>
							</td><td><img src="./images/ablum.jpg" name="b2" onmouseOver="mouseOver2()" onmouseOut="mouseOut2()" class="ablumimage"/>
							</td><td><img src="./images/ablum.jpg" name="b3" onmouseOver="mouseOver3()" onmouseOut="mouseOut3()" class="ablumimage"/>
							</td></tr>
    <tr style="padding-top:10px"><td><img src="./images/ablum.jpg" name="b4" onmouseOver="mouseOver4()" onmouseOut="mouseOut4()" class="ablumimage"/>
							</td><td><img src="./images/ablum.jpg" name="b5" onmouseOver="mouseOver5()" onmouseOut="mouseOut5()" class="ablumimage"/>
							</td><td><img src="./images/ablum.jpg" name="b6" onmouseOver="mouseOver6()" onmouseOut="mouseOut6()" class="ablumimage"/>
							</td></tr>
    <tr style="padding-top:10px"><td><img src="./images/ablum.jpg" name="b7" onmouseOver="mouseOver7()" onmouseOut="mouseOut7()" class="ablumimage"/>
							</td><td><img src="./images/ablum.jpg" name="b8" onmouseOver="mouseOver8()" onmouseOut="mouseOut8()" class="ablumimage"/>
							</td><td><input type="button" id="listbutton" value ="Order Post"><input type="button" id="listbutton" value ="Pre Post">
							</td></tr>
    </table>
	</div>
	<div id="bottom">
	</div>
	</div>
	</body>
</html>
