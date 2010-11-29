<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<?php include("./php/Container.php"); 
      $temp=new Container(0); 
	  $temp->usercheck("index.html",1);
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
	-->
	<head>
		<title>My Pictrue</title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<link rel="stylesheet" type="text/css" href="./css/index_css.css" />
		<link rel="stylesheet" type="text/css" href="./css/user_css.css" />
	</head>
	<body>
	                             <!-- 加了这些 -->
	<div class="all">
		<div class="left">
			<div><!--user头像，还有修改资料页面-->
				<a href="user.php"><img src="./images/avatar.gif" class="avatarimage"></img></a>
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
				<table><!--这里要用php写那个分享哦~~就是获取数据库里的5条分享（名字，地址），po到这5个td上面 -->
					<tr><td><a href="">share 1</a></td></tr>
					<tr><td><a href="">share 2</a></td></tr>
					<tr><td><a href="">share 3</a></td></tr>
					<tr><td><a href="">share 4</a></td></tr>
					<tr><td><a href="">share 5</a></td></tr>
				</table>
			</div>
			<div>
				<form action="./php/action.php" method="post">
				<table><tr><td><input type="submit" name="exit" id="exit" value="leave" class="button1"></td></tr>
				</table>
				</form>
			</div>
		</div>
		<div class="change">
			<div>
			<!--上传头像-->
			<form name="form3" action="changeavatar.php" method="post">
			   <table>
			   <tr><td id="symbol">上传头像</td><td></td><td></td></tr>
				
			   <tr><td></td><td></td>
			        <td><input type="file" name="avatar" id="avatar"></td>
			   </tr>
			   <tr><td></td><td></td><td>
			   <input type="submit" value="Upload" class="button3">
			   </td></tr>
			   </table>
			   </form>
			</div>
			<div>
			<form name="form1" action="change.php" method="post">
				<table frame="below">
                <tr><td id="symbol">修改资料</td><td></td><td></td></tr>
				<tr><td></td><td id="orange"><p align="left">Name</p></td><td><input type="text" name="name" value="<?php $nickname=$_SESSION['nickname']; echo "$nickname"?>"
				id="name" class="text"></td></tr>
				
				<tr><td></td><td id="orange"><p align="left">出生年月</p> </td><td><input type="text" name="year" class="text" id="ymd">年
				<input type="text" name="month" class="text" id="ymd">月
				<input type="text" name="day" class="text" id="ymd">日</td></tr>
				
				<tr><td></td><td id="orange"><p align="left">标签</p> </td><td><input type="text" name="tap" id="tap" class="text"></td></tr>
				<tr><td></td>
					<td><input type="submit" value="Save" class="button3">
					</td><td></td>
				</tr>
			</table>
			</form>
			</div>
			
			<div>
			<form name="form2" action="changepassword.php" method="post">
			   <table>
			   <tr><td id="symbol">修改密码</td><td></td><td></td></tr>
				
			   <tr><td></td><td id="orange"><p align="left">原来的密码：</p></td>
			        <td><input type="password" name="orips" id="orips" class="text"></td>
			   </tr>
			   <tr><td></td><td id="orange"><p align="left">新密码：</p></td>
			        <td><input type="text" name="newps" id="newps" class="text"></td>
			   </tr>
			   <tr><td></td><td>
			   <input type="submit" value="ChangePS" class="button3">
			   </td></td><td></tr>
			   </table>
			</form>
			</div>
		</div>
	</div>
<body>
</html>