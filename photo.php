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
		<?php
				$nickname=$_SESSION['nickname'];
				if(!isset($_SESSION))@session_start();
			    if($_SESSION['mod']==1&&isset($_GET['aid'])){
			    	require_once("./lib/MySQL.php");
					$link=connect();
					@mysql_select_db("user_db");
					$result=mysql_query("select pid from photo where aid=".$_GET['aid']."",$link);
					$num=mysql_num_rows($result);
					if($num!=0){
						$i=1;
						while($photo=mysql_fetch_array($result,MYSQL_NUM)){
							$re=mysql_query("select image from photo where pid=".$photo[0]."",$link);
							$temp=mysql_fetch_array($re,MYSQL_NUM);
							if($_GET['pid']==$photo[0]){
								$photos[0]=$temp[0];
							}else{
								$photos[$i]=$temp[0];
								$i=$i+1;
							}
						}
					}
			    }

		echo "<script type=\"text/javascript\">
			var curIndex = 0;
			var imgArray = new Array();";
			for($i=0;$i<count($photos);$i++)
			{
				echo "imgArray[".$i."] = '".$photos[$i]."';";
			}

		?>
			function showNextPhoto(n)
			{
				curIndex+=n;
				if(curIndex<0){curIndex=imgArray.length-1;}
				if(curIndex>=imgArray.length){curIndex=0;}
			    var cur_photo = document.getElementById("cur_photo");

				cur_photo.src = imgArray[curIndex];
			}

			function deletePhoto()
			{
				imgArray.splice(curIndex,1);
				var cur_photo = document.getElementById("cur_photo");
				curIndex--;
				if(curIndex <0)
				{
				   curIndex= imgArray.length-1;
				}
				cur_photo.src = imgArray[curIndex];
			}

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
		<div style="font-size:150%">
				<a href="user.php"><img src="./images/home.png" class="home_logo">K-Image首页</a>
		</div>

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
				<span><a href="team_of_us.php">TEAM 0F US</a></span>
			</div>
		</div>

		<div id="right">

			<table>
				<tr><td id="symbol" style="text-align:left"><a href="user.php">My Picture</a>-><a href="ablum.php">Ablum</a></td></tr>
				<tr><td style="text-align:left"><input type="button" value="Flower" onclick="addflower()"><span id="flo_num">12</span>
											<input type="button" value="Egg" onclick="addegg()"><span id="egg_num">2</span>
											<input type="button" value="左" onclick="showNextPhoto(-1)">
											<input type="button" value="右" onclick="showNextPhoto(1)">
											<input type="button" value="删除" onclick="deletePhoto()"></td></tr>
				<tr><td><img src="<?php echo $photos[0];?>" name="cur_photo" id="cur_photo" class="photo" onclick="showNextPhoto(1)"/></td>
				<!--<td><input type="button" value="油画" onclick="oilpaint()"></td>--></tr>
				<!--左为逆时针转90度-->

			</table>

			<div class="commentDiv">
			<form action="comment.php" method="post">
			<span></span>
		    <textarea id="comment" rows="3" cols="41"></textarea></td></tr>
				<td style="text-align:right"><input type="submit" value="评论">
		    </form>

			<table>
			<tr><td id="symbol" style="width:350px;text-align:left">收到的评论</td></tr>
			<?php
				//if(条件)
				echo "<tr><td>". "内容"."<//td><//tr>"."<tr><td>". "名字"."<//td><//tr>";
			?>
			</table>
			</div>
			</div>
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