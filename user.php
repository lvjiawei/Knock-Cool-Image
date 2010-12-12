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
		<?php
			if(!isset($_SESSION))@session_start();
			require_once("./lib/MySQL.php");
			if(!isset($_SESSION['user'])&&isset($_SESSON['email'])&&$_SESSION['mod']==1){//注册后第一次登陆的初始化
				$con=connect();
				@mysql_select_db("user_db");
				$result=mysql_query("select uid from userinfo where e_mail=".$_SESSION['email']."",$con);
				$te=mysql_fetch_array();
				$_SESSION['user']=$te['uid'];
				
				//第一个共享
				$result2=@mysql_query("select first from shared where uid=".$_SESSION['user']."",$link);
				$result3=@mysql_query("select firstname from shared where uid=".$_SESSION['user']."",$link);
				$te2=@mysql_fetch_array($result2);
				$te3=@mysql_fetch_array($result3);
				$_SESSION['first']=$te2['first'];
				$_SESSION['firstname']=$te3['firstname'];
				//第2个共享
				$result4=@mysql_query("select second from shared where uid=".$_SESSION['user']."",$con);
				$result5=@mysql_query("select secondname from shared where uid=".$_SESSION['user']."",$con);
				$te4=@mysql_fetch_array($result4);
				$te5=@mysql_fetch_array($result5);
				$_SESSION['second']=$te4['second'];
				$_SESSION['secondname']=$te5['secondname'];
				//第3个共享
				$result6=@mysql_query("select third from shared where uid=".$_SESSION['user']."",$con);
				$result7=@mysql_query("select thirdname from shared where uid=".$_SESSION['user']."",$con);
				$te6=@mysql_fetch_array($result6);
				$te7=@mysql_fetch_array($result7);
				$_SESSION['third']=$te6['third'];
				$_SESSION['thirdname']=$te7['thirdname'];
				//第4个共享
				$result8=@mysql_query("select forth from shared where uid=".$_SESSION['user']."",$con);
				$result9=@mysql_query("select forthname from shared where uid=".$_SESSION['user']."",$con);
				$te8=@mysql_fetch_array($result8);
				$te9=@mysql_fetch_array($result9);
				$_SESSION['forth']=$te8['forth'];
				$_SESSION['forthname']=$te9['forthname'];
				//第5个共享
				$result10=@mysql_query("select fifth from shared where uid=".$_SESSION['user']."",$con);
				$result11=@mysql_query("select fifthname from shared where uid=".$_SESSION['user']."",$con);
				$te10=@mysql_fetch_array($result10);
				$te11=@mysql_fetch_array($result11);
				$_SESSION['fifth']=$te10['fifth'];
				$_SESSION['fifthname']=$te11['fifthname'];
				mysql_close($con);
			}
			if($_SESSION['mod']==1){
				$link=connect();
				@mysql_select_db("user_db");
				$result2=@mysql_query("select first from shared where uid=".$_SESSION['user']."",$link);
				$result3=@mysql_query("select firstname from shared where uid=".$_SESSION['user']."",$link);
				$te2=@mysql_fetch_array($result2);
				$te3=@mysql_fetch_array($result3);
				$_SESSION['first']=$te2['first'];
				$_SESSION['firstname']=$te3['firstname'];
				//第2个共享
				$result4=@mysql_query("select second from shared where uid=".$_SESSION['user']."",$con);
				$result5=@mysql_query("select secondname from shared where uid=".$_SESSION['user']."",$con);
				$te4=@mysql_fetch_array($result4);
				$te5=@mysql_fetch_array($result5);
				$_SESSION['second']=$te4['second'];
				$_SESSION['secondname']=$te5['secondname'];
				//第3个共享
				$result6=@mysql_query("select third from shared where uid=".$_SESSION['user']."",$con);
				$result7=@mysql_query("select thirdname from shared where uid=".$_SESSION['user']."",$con);
				$te6=@mysql_fetch_array($result6);
				$te7=@mysql_fetch_array($result7);
				$_SESSION['third']=$te6['third'];
				$_SESSION['thirdname']=$te7['thirdname'];
				//第4个共享
				$result8=@mysql_query("select forth from shared where uid=".$_SESSION['user']."",$con);
				$result9=@mysql_query("select forthname from shared where uid=".$_SESSION['user']."",$con);
				$te8=@mysql_fetch_array($result8);
				$te9=@mysql_fetch_array($result9);
				$_SESSION['forth']=$te8['forth'];
				$_SESSION['forthname']=$te9['forthname'];
				//第5个共享
				$result10=@mysql_query("select fifth from shared where uid=".$_SESSION['user']."",$con);
				$result11=@mysql_query("select fifthname from shared where uid=".$_SESSION['user']."",$con);
				$te10=@mysql_fetch_array($result10);
				$te11=@mysql_fetch_array($result11);
				$_SESSION['fifth']=$te10['fifth'];
				$_SESSION['fifthname']=$te11['fifthname'];
				
				$result=mysql_query("select aid from album where uid=".$_SESSION['user']."",$link);
				$num=@mysql_num_rows($result);
				if($num!=0){
					$i=1;
					echo "<script type=\"text/javascript\">" .
							"function album(id){
							switch(id)" .
							"{
							";
					while($aid=mysql_fetch_array($result,MYSQL_NUM)){
						echo "case ".$i.":
								window.setTimeout(window.location.href=\"album.php?aid=".$aid[0]."\",3);
										break;
								";
						$i=$i+1;
					}
					echo"default:
							window.open(\"action.php?action=newalbum\",\"newframe\",\"width=400,height=400,left=500,top=200,menubar=no,toolbar=no,location=no,scrollbars=no,location=no\")";
					echo" }
							}</script>
					";
				}else{
					echo "<script type=\"text/javascript\">" .
							"function album(id){
								window.open(\"action.php?action=newalbum\",\"newframe\",\"width=400,height=400,left=500,top=200,menubar=no,toolbar=no,location=no,scrollbars=no,location=no\");" .
								"
							}</script>";
				}
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
    <table id="rightshow"><!--����?&#65533;��phpд�Ǹ�����Ŷ~~���ǻ�?&#65533;?��?&#65533;?�����5?&#65533;?�����?&#65533;&#65533;�֣���?&#65533;?����po����5��td��?&#65533;? -->
    <tr style="padding-top:10px"><td><img src="./images/ablum.jpg" name="b1" onmouseOver="mouseOver1()" onmouseOut="mouseOut1()" class="ablumimage" onClick="album(1)"/>
                            </td><td><img src="./images/ablum.jpg" name="b2" onmouseOver="mouseOver2()" onmouseOut="mouseOut2()" class="ablumimage" onClick="album(2)"/>
							</td><td><img src="./images/ablum.jpg" name="b3" onmouseOver="mouseOver3()" onmouseOut="mouseOut3()" class="ablumimage" onClick="album(3)"/>
							</td></tr>
    <tr style="padding-top:10px"><td><img src="./images/ablum.jpg" name="b4" onmouseOver="mouseOver4()" onmouseOut="mouseOut4()" class="ablumimage" onClick="album(4)"/>
							</td><td><img src="./images/ablum.jpg" name="b5" onmouseOver="mouseOver5()" onmouseOut="mouseOut5()" class="ablumimage" onClick="album(5)"/>
							</td><td><img src="./images/ablum.jpg" name="b6" onmouseOver="mouseOver6()" onmouseOut="mouseOut6()" class="ablumimage" onClick="album(6)"/>
							</td></tr>
    <tr style="padding-top:10px"><td><img src="./images/ablum.jpg" name="b7" onmouseOver="mouseOver7()" onmouseOut="mouseOut7()" class="ablumimage" onClick="album(7)"/>
							</td><td><img src="./images/ablum.jpg" name="b8" onmouseOver="mouseOver8()" onmouseOut="mouseOut8()" class="ablumimage" onClick="album(8)"/>
							</td><td><input type="button" id="listbutton" value ="Order Post"><input type="button" id="listbutton" value ="Pre Post">
							</td></tr>
    </table>
	</div>
	<div id="bottom">
	</div>
	</div>
	</body>
</html>
