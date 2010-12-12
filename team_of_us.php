<?php include("./lib/Container.php"); $temp=new Container(0); $address="index.html"; $temp->usercheck($address,1);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<!--
	knock,2010.11
	Project: konck_image
	@author XXX
	@version 0.1
	@copyright 2010
	说明：写100字左右我们小组的介绍，我们什么名字，是做什么，等等的。随意一点就好了。
	写一个中文版的，还有英文版的，中英文内容可以不太一样，内容可以自己加。在下面有提示
	在哪里写了。
	-->
	<head>
		<title>My Pictrue</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="./css/index_css.css" />
		<link rel="stylesheet" type="text/css" href="./css/user_css.css" />
		<script type="text/javascript">
			function Zh2Eng()
			{
				var trans = document.getElementById("Translate");
				var content = document.getElementById("teamContent");
				if(trans.value == "English")
				{
					trans.value = "中文";
					content.innerHTML = '在这里写英文的。';
				}
				else
				{
					trans.value = "English";
					content.innerHTML = '在这里写中文的';
				}

		    }
		</script>


	</head>
	<body>
	<div class="all">
	<div class="left">
    <div><!--userͷ?&#65533;�������޸�����ҳ?&#65533;?-->
	<a href="modi_user.php"><img src="./images/avatar.gif" class="avatarimage"></img></a>
    </div>
    <div id="name">
    <?php $nickname=$_SESSION['nickname']; echo "$nickname"?><!-- ������û�?&#65533;&#65533;-->
    </div>
    <div>
    <form action="./php/action.php" method="post">
    <table><!--�����?&#65533;?����ͨ������?&#65533;?����?&#65533;?�⣬������po��?&#65533;?-->
    <tr><td><input type="text" name="search" id="search" class="text" /></td><td><input type="submit" name="search" id="search" value="search" class="button1" /></td></tr>
    </table>
    </form>
    <table><!--����?&#65533;��phpд�Ǹ�����Ŷ~~���ǻ�?&#65533;?��?&#65533;?�����5?&#65533;?�����?&#65533;&#65533;�֣���?&#65533;?����po����5��td��?&#65533;? -->
    <tr><td><a href="<?php $share1=$_SESSION['first']; echo "$share1";?>">
			<?php $sharename1=$_SESSION['firstname']; echo "$sharename1";?></a></td></tr>
    <tr><td><a href="<?php $share2=$_SESSION['second']; echo "$share2";?>">
			<?php $sharename2=$_SESSION['secondname']; echo "$sharename2";?></a></td></tr>
    <tr><td><a href="<?php $share3=$_SESSION['third']; echo "$share3";?>">
			<?php $sharename3=$_SESSION['thirdname']; echo "$sharename3";?></a></td></tr>
    <tr><td><a href="<?php $share4=$_SESSION['forth']; echo "$share4";?>">
			<?php $sharename4=$_SESSION['forthname']; echo "$sharename4";?></a></td></tr>
    <tr><td><a href="<?php $share5=$_SESSION['fifth']; echo "$share5";?>">
			<?php $sharename5=$_SESSION['fifthname']; echo "$sharename5";?></a></td></tr>
    </table>
    <div>
    <form action="./php/action.php" method="post">
     <table><tr><td><input type="submit" name="exit" id="exit" value="leave" class="button1"></td></tr>
    </table>
	</form>
    </div>
	<span><a href="user.php">BACK</a></span>
    </div>
	</div>
	<div id="team_right">
	<h1>Team of us <input type="button" id="Translate" value="English" onclick="Zh2Eng()"></h1>
    <div id="teamContent"><p>你好吗，在这里写中文喔，更上面一样。<p></div>
	</div>
	<div id="bottom">
	</div>
	</div>
	</body>
</html>
