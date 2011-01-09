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
					$result=@mysql_query("select * from photo where aid=".$_GET['aid']."",$link);
					$num=mysql_num_rows($result);
					/**************************************************************************************************zheli******/
					$result2=@mysql_query("select mid,text,nickname from comment where comment.pid=".$_GET['pid']."",$link);
					$num2=@mysql_num_rows($result2);
						$j=1;
						if($num2!=0){
							while($ctemp=@mysql_fetch_array($result2)){
								//$c_nickname=mysql_query("select nickname from comment where ");
								$comment[$j]=array('text'=>$ctemp['text'],'nickname'=>$ctemp['nickname']);
								$j=$j+1;
						}
					}
					/********************************************************************************************************/
					$cur_num=0;
					
					if($num!=0){
						$p=0;
						$i=1;
						$leftphoto=$num-1;
						$rightphoto=0;
						while($photo=mysql_fetch_array($result,MYSQL_NUM)){
							$pids[$p]=$photo[0];
							if($_GET['pid']==$photo[0]){
								$cur_num=$p;
								$flowers = $photo[4];
								$eggs = $photo[5];
								if($cur_num!=0)
									$leftphoto=$cur_num-1;
								if($cur_num!=$num-1)
									$rightphoto=$cur_num+1;
							}
							
							$p=$p+1;
							
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
			echo "</script>"
		?>
		<script type="text/javascript">
			function createXmlhttp()
			{
				  var Xmlhttp=null; 
				  try
				  {
					Xmlhttp=new ActiveXObject('Microsoft.XMLHTTP');
				  }
				  catch(oc)
				  {
					Xmlhttp=null;
				  }
				  if(!Xmlhttp && typeof XMLHttpRequest !='undefined')
				  {
					Xmlhttp=new XMLHttpRequest();
				  }
				return Xmlhttp;
			}
			function deletePhoto()
			{
				XmlHttp=createXmlhttp();
				var URL='delete.php';
				var data='image='+imgArray[curIndex];
				XmlHttp.open("POST",URL,true);
				XmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
				XmlHttp.send(data);
				imgArray.splice(curIndex,1);
				commentArray.splice(curIndex,1);
				nicknamesArray.splice(curIndex,1);
			}
			function showNextPhoto(n)
			{
				curIndex+=n;
				if(curIndex<0){curIndex=imgArray.length-1;}
				if(curIndex>=imgArray.length){curIndex=0;}
			    var cur_photo = document.getElementById("cur_photo");
				cur_photo.src = imgArray[curIndex];
			}

			function addflower()
			{
				XmlHttp=createXmlhttp();
				var URL='addflower.php';
				var data='image='+imgArray[curIndex];
				XmlHttp.open("POST",URL,true);
				XmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
				XmlHttp.send(data);
				var flower = document.getElementById("flo_num");
				var flower_num = Number(flower.innerHTML) + 1;
				flower.innerHTML = flower_num;
			}
			function addegg()
			{
				XmlHttp=createXmlhttp();
				var URL='addegg.php';
				var data='image='+imgArray[curIndex];
				XmlHttp.open("POST",URL,true);
				XmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
				XmlHttp.send(data);
				var egg = document.getElementById("egg_num");
				var egg_num = Number(egg.innerHTML) + 1;//
				egg.innerHTML = egg_num;

			}
		</script>
	</head>
	<body>
	<div class="all">
		<div style="font-size:150%">
				<a href="user.php?uid=<?=$_SESSION['user']?>"><img src="./images/home.png" class="home_logo">K-Image<?=$leftphoto?>首页</a>
		</div>

		<div class="left">
			<div><!--user??&#65533;???????????????&#65533;?-->
				<a href="modi_user.php?uid=<?=$_SESSION['user']?>"><img src="<?php if($_SESSION['avatar']!="")echo $_SESSION['avatar'];else echo"./images/avatar.gif";?>" class="avatarimage"></img></a>
			</div>

			<div id="name">
			点击头像<a href="modi_user.php?uid=<?=$_SESSION['user']?>">修改资料</a><br/>
			<span id="blue"><?php $nickname=$_SESSION['nickname']; echo "$nickname"?>的主页<!-- ������û�?&#65533;&#65533;-->
    
			</div><br/>

			<div>
				<form action="action.php" method="post">
					<table><!--??????&#65533;?????????????&#65533;??????&#65533;?????????po???&#65533;?-->
						<tr><td><input type="text" name="search" id="search" class="text" /></td><td><input type="submit" name="search" id="search" value="search" class="button1" /></td></tr>
					</table>
				</form>
				</div><br/><!--?????&#65533;??phpд????????~~??????&#65533;????&#65533;??????5?&#65533;???????&#65533;&#65533;??????&#65533;?????po????5??td???&#65533;? -->
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
		

		<div id="right">

			<table>
				<tr><td id="symbol" style="text-align:left"><a href="user.php?uid=<?=$_SESSION['user']?>">My Picture</a>-><a href="album.php?aid=<?=$_GET['aid']?>">Album</a></td></tr>
				<tr><td style="text-align:left"><input type="button" value="Flower" onclick="addflower()"><span id="flo_num"><?=$flowers?></span>
											<input type="button" value="Egg" onclick="addegg()"><span id="egg_num"><?=$eggs?></span>
											<a href="photo.php?pid=<?=$pids[$leftphoto]?>&aid=<?=$_GET['aid']?>"><input type="button" value="左"></a>
											
											<a href="photo.php?pid=<?=$pids[$rightphoto]?>&aid=<?=$_GET['aid']?>"><input type="button" value="右"></a>
											<a href="<?php
											if($num>1){
											echo "photo.php?pid=".$pids[$rightphoto]."&aid=".$_GET['aid'];
											}
											else {
												echo "album.php?aid=".$_GET['aid'];
												}?>"><input type="button" value="删除" onMouseDown="deletePhoto()"></a></td></tr>
				<tr><td><a href="photo.php?pid=<?=$pids[$rightphoto]?>&aid=<?=$_GET['aid']?>"><img src="<?php echo $photos[0];?>" name="cur_photo" id="cur_photo" class="photo"/></a></td>
				<!--<td><input type="button" value="油画" onclick="oilpaint()"></td>--></tr>
				<!--左为逆时针转90度-->

			</table>

			<div class="commentDiv">
			<form action="comment.php" method="post">
			<span></span>
		    <textarea id="comment" rows="3" cols="41" name="comment"></textarea>
			<input type="hidden" value="<?=$_GET['aid']?>" name="a_id">
			<input type="hidden" value="<?=$_GET['pid']?>" name="p_id">
			<input type="hidden" value="<?=$_SESSION['nickname']?>" name="nickname">
				<span style="text-align:right"><input type="submit" value="评论"></span>
		    </form>

			<table>
			<tr><td id="symbol" style="width:350px;text-align:left">收到的评论</td></tr>
			</table>
			<!--**************************************************************************************************************-->
			<?php
			if($j==1){ 
			echo "<div class=\"pcomment\">
				<label class=\"comment_name\"></label>
				<div class=\"ccontent\">"."暂时没有评论"."</div>
			</div>";}
			else{
			for($i=1;$i<$num2+1;$i++){
			echo "<div class=\"pcomment\">
				<label class=\"comment_name\">".$comment[$i]['nickname']."</label>
				<div class=\"ccontent\">".$comment[$i]['text']."</div>
			</div>";}
			}
			?>
			<!--**************************************************************************************************************-->
			
			</div>
			</div>
		</div>
		<div id="tool" style="text-align:left">
			<p id="symbol" style="text-align:left">工具栏</p><br/>
			<input type="button" value="油画" onclick="oilpaint()" class="toolbutton"><input type="button" value="游戏" onclick="game()" class="toolbutton"><br/>
			<input type="button" value="黑白" onclick="whiteblack()" class="toolbutton"><input type="button" value="模糊" onclick="mohu()" class="toolbutton"><br/>
			<input type="button" value="上传" onclick="upload()" class="toolbutton"><input type="button" value="删除" onclick="delete()" class="toolbutton">
		</div>
	
		<!--<div id="bottom">
			<p><a href="team_of_us.html">TEAM 0F US</a></p>
		</div>-->
	
	</body>
</html>