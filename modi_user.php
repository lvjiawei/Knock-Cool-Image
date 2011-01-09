<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php include("./lib/Container.php");
      $temp=new Container(0);
	  $temp->usercheck("index.php",1);
?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<!--
	knock,2010.10
	Project: konck_image
	id表：
	Name ：name
	年   ：year
	月   ：month
	日   ：day
	标签 ：tap
	原来的密码：orips
	新密码：newps
    上传头像参考这段：
	
	-->
	<head>
		<title>My Pictrue</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="./css/index_css.css" />
		<link rel="stylesheet" type="text/css" href="./css/user_css.css" />
		<script type="text/javascript">
		 function checkpassword()
 		{
		 	var pw=document.getElementById('orips');
		 	var ps=document.getElementById('newps');
		 	if( pw.value == "" || ps.value == "")
		 	{
		 		alert("Cannot be Empty!");
		 		return false;
 			}
 			return true;
 		}
		</script>
	</head>
	<body>
	                             <!-- 加了这些 -->
	<div class="all">
		<div style="font-size:150%">
		<span id="blue"><?php $nickname=$_SESSION['nickname']; echo "$nickname"?>的主页<!-- ������û�?&#65533;&#65533;-->
        </div>
		<div class="left">
			<div><!--user头像，还有修改资料页面-->
				<a href="user.php?uid=<?=$_GET['uid']?>"><img src="./images/avatar.gif" class="avatarimage"></img></a>
			</div>
			<div id="name">
				<?php $nickname=$_SESSION['nickname']; echo "$nickname"?><!-- 这个是用户?&#65533;&#65533;-->
			</div>
			<div>
				<form action="search.php" method="post">
					<table><!--这个是搜索，通过内容搜索数据库，并将其po出来-->
							<tr><td><input type="text" name="search" id="search" class="text" /></td><td><input type="submit" value="search" class="button1" /></td></tr>
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
			</div>
			<div>
				<form action="action.php" method="post">
				<table><tr><td><input type="submit" name="exit" id="exit" value="leave" class="button1"></td></tr>
				</table>
				</form>
			</div>
			<span><a href="team_of_us.php">TEAM 0F US</a></span>
		</div>

		<div class="change">
			<div id="m_password">
			<!--上传头像-->
			<form name="form3" action="action.php" method="post" enctype="multipart/form-data">
			   <table frame="below">
			   <tr><td id="symbol">上传头像</td><td><input type="hidden" id="avatar" name="avatar"></td><td></td></tr>

			   <tr><td></td><td></td>
			        <td><input type="file" name="avatar" id="avatar" class="text"></td>
			   </tr>
			   <tr><td></td><td></td><td>
			   <input type="submit" value="Upload" class="button3">
			   </td></tr>
			   </table>
			   </form>
			</div>
			<div>
			<form name="form1" action="action.php" method="post">
				<table frame="below">
                <tr><td id="symbol">用户资料</td><td></td><td></td><td></td></tr>
				<tr><td></td><td id="orange"><p align="left">昵称：</p></td><td><input type="text" name="name" value="<?php $nickname=$_SESSION['nickname']; echo "$nickname"?>" id="name" class="text"></td><td></td></tr>
				<tr><td><input type="hidden" id="action" name="action" value="modify"></td>
					<td><input type="submit" value="Save" class="button3">
					</td><td></td>
				</tr>
			</table>
			</form>
			</div>

			<div id="m_password">
			<form name="form2" action="action.php" method="post" onsubmit="return checkpassword()">
			   <table frame="below">
			   <tr><td id="symbol">修改密码</td><td></td><td></td></tr>

			   <tr><td></td><td id="orange"align="left">旧密码：</td>
			        <td><input type="password" name="orips" id="orips" class="text"></td>
			   </tr>
			   <tr><td></td><td id="orange"><p align="left">新密码：</p></td>
			        <td><input type="password" name="newps" id="newps" class="text"></td>
			   </tr>
			   <tr><td><input type="hidden" id="action" name="action" value="modify"></td>
			   <td>
			   <input type="submit" value="ChangePS" class="button3">
			   </td><td></td></tr>
			   </table>
			</form>
			</div>
			<div>
			<form name="form1" action="action.php" method="post">
				<table frame="below">
                <tr><td id="symbol">用户分享</td><td></td><td></td><td></td></tr>
				<tr><td></td><td id="orange" align="left">分享1：<td><input type="text" name="sharename1" id="sharename1" class="text" value="<?=$sharename1?>"></td>
				<td><input type="text" name="share1" id="share1" class="text" value="<?=$share1?>"></td></tr>
				<tr style="font-size:70%"><td></td><td align="right">比如：</td><td>新浪微博</td><td>http://t.sina.com.cn/***</td></tr>
				<tr><td></td><td id="orange" align="left">分享2：</td><td><input type="text" name="sharename2" id="sharename2" class="text" value="<?=$sharename2?>"></td><td><input type="text" value="<?=$share2?>" name="share2" id="share2" class="text"></td></tr>
				<tr><td></td><td id="orange" align="left">分享3：</td><td><input type="text" name="sharename3" id="sharename3" class="text" value="<?=$sharename3?>"></td><td><input type="text" value="<?=$share3?>" name="share3" id="share3" class="text"></td></tr>
				<tr><td></td><td id="orange" align="left">分享4：</td><td><input type="text" name="sharename4" id="sharename4" class="text" value="<?=$sharename4?>"></td><td><input type="text" value="<?=$share4?>" name="share4" id="share4" class="text"></td></tr>
				<tr><td></td><td id="orange" align="left">分享5：</td><td><input type="text" name="sharename5" id="sharename5" class="text" value="<?=$sharename5?>"></td><td><input type="text" value="<?=$share5?>" name="share5" id="share5" class="text"></td></tr>
				
				<tr><td><input type="hidden" id="action" name="action" value="modify"></td>
					<td><input type="submit" value="Save" class="button3">
					</td><td></td>
				</tr>
			</table>
			</form>
			</div>
		</div>
	</div>
<body>
</html>