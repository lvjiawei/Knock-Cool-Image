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
		<?php if(!isset($_SESSION))@session_start();
			require_once("./lib/MySQL.php");
			if($_SESSION['mod']==1&&isset($_GET['aid'])){
				$link=connect();
				@mysql_select_db("user_db");
				$result=mysql_query("select pid from photo where aid=".$_GET['aid']."",$link);
				$num=mysql_num_rows($result);
				if($num!=0){
					$i=1;
					echo "<script type=\"text/javascript\">" .
							"function photo(id){
							switch(id)" .
							"{
							";
					while($photo=mysql_fetch_array($result,MYSQL_NUM)){
						echo "case ".$i.":
								window.setTimeout(window.location.href=\"photo.php?pid=".$photo[0]."&aid=".$_GET['aid']."\",3);
										break;
								";
						$i=$i+1;
					}
					echo"default:
							window.open(\"action.php?action=newphoto&aid=".$_GET['aid']."\",\"newframe\",\"width=400,height=400,left=500,top=200,menubar=no,toolbar=no,location=no,scrollbars=no,location=no\")";
					echo" }
							}
							</script>
					";
					echo"<script type=\"text/javascript\">
							function load(){
									";
					$i=1;
					$result=mysql_query("select pid from photo where aid=".$_GET['aid']."",$link);
					while($photo=mysql_fetch_array($result,MYSQL_NUM)){
						$re=mysql_query("select image from photo where pid=".$photo[0]."",$link);
						$temp=mysql_fetch_array($re,MYSQL_NUM);
						echo"var img".$i."=document.getElementById(\"img".$i."\").src=\"".$temp[0]."\";
								";
						$i=$i+1;
					}
					echo "}</script>";
				}else{
					echo "<script type=\"text/javascript\">" .
							"function photo(id){
								window.open(\"action.php?action=newphoto&aid=".$_GET['aid']."\",\"newframe\",\"width=400,height=400,left=500,top=200,menubar=no,toolbar=no,location=no,scrollbars=no,location=no\");" .
								"
							}</script>";
				}
			}
		?>
	</head>
	<body onLoad="load()">
	<div class="all">
	<div class="left">
    <div><!--user??&#65533;???????????????&#65533;?-->
	<a href="modi_user.php"><img src="<?php if($_SESSION['avatar']!="")echo $_SESSION['avatar'];else echo"./images/avatar.gif";?>" class="avatarimage"></img></a>
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
    <form action="action.php" method="post">
     <table><tr><td><input type="submit" name="exit" id="exit" value="leave" class="button1"></td></tr>
    </table>
	</form>
    </div>
	<span><a href="team_of_us.php">TEAM 0F US</a></span>
    </div>
	</div>
	<div id="right">
	<a href="user.php" id="symbol" style="text-align:left">My Picture</a>
    <table id="rightshow"><!--?????&#65533;??phpд????????~~??????&#65533;????&#65533;??????5?&#65533;???????&#65533;&#65533;??????&#65533;?????po????5??td???&#65533;? -->
    <tr style="padding-top:10px"><td><img id="img1" src="./images/ablum.jpg" name="b1" onmouseOver="mouseOver1()" onmouseOut="mouseOut1()" class="ablumimage" onClick="photo(1)"/>
							</td><td><img id="img2" src="./images/ablum.jpg" name="b2" onmouseOver="mouseOver2()" onmouseOut="mouseOut2()" class="ablumimage" onClick="photo(2)"/>
							</td><td><img id="img3" src="./images/ablum.jpg" name="b3" onmouseOver="mouseOver3()" onmouseOut="mouseOut3()" class="ablumimage" onClick="photo(3)"/>
							</td></tr>
    <tr style="padding-top:10px"><td><img id="img4" src="./images/ablum.jpg" name="b4" onmouseOver="mouseOver4()" onmouseOut="mouseOut4()" class="ablumimage" onClick="photo(4)"/>
							</td><td><img id="img5" src="./images/ablum.jpg" name="b5" onmouseOver="mouseOver5()" onmouseOut="mouseOut5()" class="ablumimage" onClick="photo(5)"/>
							</td><td><img id="img6" src="./images/ablum.jpg" name="b6" onmouseOver="mouseOver6()" onmouseOut="mouseOut6()" class="ablumimage" onClick="photo(6)"/>
							</td></tr>
    <tr style="padding-top:10px"><td><img id="img7" src="./images/ablum.jpg" name="b7" onmouseOver="mouseOver7()" onmouseOut="mouseOut7()" class="ablumimage" onClick="photo(7)"/>
							</td><td><img id="img8" src="./images/ablum.jpg" name="b8" onmouseOver="mouseOver8()" onmouseOut="mouseOut8()" class="ablumimage" onClick="photo(8)"/>
							</td><td><input type="button" id="listbutton" value ="Order Post"><input type="button" id="listbutton" value ="Pre Post">
							</td></tr>
    </table>
	</div>
	<div id="bottom">
	</div>
	</div>
	</body>
</html>
