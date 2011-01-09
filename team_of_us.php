<?php include("./lib/Container.php"); $temp=new Container(0); $address="index.html"; $temp->usercheck($address,1);?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<!--
	knock,2010.11
	Project: konck_image
	@author zhangjingru,lvjiawei
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
					content.innerHTML = '&nbsp;&nbsp;&nbsp;&nbsp;We are a team of six members inclusive of two girls and four boys. The name of our team is Knock because our target is to satisfy our users’ need just like knocking the door. When the users want to communicate with others or share their interest with others, they just need to click our pages which is as easy as to knock the door.<br />&nbsp;&nbsp;&nbsp;&nbsp;Our website is a picture sharing, and related features on the website. Our basic functions includes uploading pictures and sharing pictures. In addition, users can make comments on others’ photos and share users’ t album. Furthermore, users can also do some simple processing on photos, such as turning and other operations.';
				}
				else
				{
					trans.value = "English";
					content.innerHTML = '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;我们的小组名字是Knock，我们的小组由6个成员组成，其中2个女生，4个男生。为什么我们是Knock小组呢？因为我们希望我们做出来的成品可以切实满足广大用户的需要，当用户想要与别人交流或者分享的时候，只要轻轻地knock一下，就像敲门一样，就可以达到满足他们的需求。<br />&nbsp;&nbsp;&nbsp;&nbsp;我们的网页是一个关于图片分享以及相关功能的网站。我们的基本功能包括有上传图片、分享图片，此外，用户可以对其它用户的图片相册等进行评论、分享等操作。在可能实现的基础上，用户还可以对自己的图片进行一些基本的处理，比如翻转等操作。 ';
				}

		    }
		</script>


	</head>
	<body>
	<div class="all">
	<div style="font-size:150%">
				<a href="user.php"><img src="./images/home.png" class="home_logo">K-Image首页</a>
		</div>
	<div class="left">
    <div><!--userͷ?&#65533;�������޸�����ҳ?&#65533;?-->
	<a href="modi_user.php?uid=<?=$_SESSION['uid']?>"><img src="./images/avatar.gif" class="avatarimage"></img></a>
    </div>
    <div id="name">
    <span id="blue"><?php $nickname=$_SESSION['nickname']; echo "$nickname"?>的主页<!-- ������û�?&#65533;&#65533;-->
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
    <div id="teamContent"><p>&nbsp;&nbsp;&nbsp;&nbsp;我们的小组名字是Knock，我们的小组由6个成员组成，其中2个女生，4个男生。为什么我们是Knock小组呢？因为我们希望我们做出来的成品可以切实满足广大用户的需要，当用户想要与别人交流或者分享的时候，只要轻轻地knock一下，就像敲门一样，就可以达到满足他们的需求。<br/>&nbsp;&nbsp;&nbsp;&nbsp;我们的网页是一个关于图片分享以及相关功能的网站。我们的基本功能包括有上传图片、分享图片，此外，用户可以对其它用户的图片相册等进行评论、分享等操作。在可能实现的基础上，用户还可以对自己的图片进行一些基本的处理，比如翻转等操作。<p></div>
	</div>
	<div id="bottom">
	</div>
	</div>
	</body>
</html>
