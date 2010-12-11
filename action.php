<?php
/*
 * action.php
 * Contain all the action to connect with the webpage
 * @package Knock-Cool-Image
 * @author zhuhaofeng
 * @copyright 2010
 * @version 0.1
 * @access public
 */
if(!isset ($_SESSION))
	@session_start();
if(isset($_POST['avatar'])&&$_SESSION['mod']==1)
{
	if(is_uploaded_file($_FILES['avatar']['tmp_name'])){
	    $Filedata = $_FILES["avatar"];
		$name = $Filedata['name'];
	 	$type = $Filedata['type'];
	 	$size = $Filedata['size'];
	 	$tmp_name = $Filedata['tmp_name'];
	 	$error = $Filedata['error'];

		 if($size>=3000000){
		 	echo "<head>
								<title>My Pictrue</title>
								<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
								<link rel=\"stylesheet\" type=\"text/css\" href=\"css/forget.css\" />
								<script type=\"text/javascript\" src=\"js/check.js\"></script>
								<script language=\"JavaScript\">window.setTimeout(\"window.location.href=\'user.php\'\", 3*1000); </script>
				</head>
				<body>
				<table width='100%' align=center><tr><td align=center>
                  <br>
                 <font color=greeen><a href='user.php'>jump after a few time</a></font>
                 </td></tr></table>
				 </body>";
		  	exit('您上传的文件大小超过限定');
		 }
		 switch($type){
		  	case 'image/pjpeg' : $nameback='.jpg';
		  						break;
			case 'image/jpeg' : $nameback='.jpg';
								break;
			case 'image/gif' : $nameback='.gif';
			 					break;
			case 'image/png' : $nameback='.png';
			  					break;
			case 'image/bmp' : $nameback='.bmp';
			  					break;
			case exit('类型犯规！');

	 	}
	 	include(realpath("./")."/lib/MySQL.php");
	 	$link=connect();
	 	$db=mysql_select_db("user_db");
	 	$dir="data/avatar/";
 		if($nameback && $error==0){
  			$filename= "".$_SESSION['email']."". $nameback;
  			$fileplace="".$dir."" . $filename;
  			$fileroot=$dir;
 		    move_uploaded_file($tmp_name, $fileplace);
  			$para=mysql_query("update userinfo set avatar='".$fileplace."' where uid=".$_SESSION['user']."",$link);
  			if($para){
  				$_SESSION['avatar']=$fileplace;
  				echo "<head>
								<title>My Pictrue</title>
								<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
								<link rel=\"stylesheet\" type=\"text/css\" href=\"css/forget.css\" />
								<script type=\"text/javascript\" src=\"js/check.js\"></script>
								<script language=\"JavaScript\">window.setTimeout(\"window.location.href=\'user.php\'\", 3*1000); </script>
				</head>
				<body>
				<table width='100%' align=center><tr><td align=center>
                  Change avatar succeded!<br>
                 <font color=greeen><a href='user.php'>jump after a few time</a></font>
                 </td></tr></table>
				 </body>";
  			}
 		}
 		if(!isset($para)||!$para)
		echo "<head>
								<title>My Pictrue</title>
								<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
								<link rel=\"stylesheet\" type=\"text/css\" href=\"css/forget.css\" />
								<script type=\"text/javascript\" src=\"js/check.js\"></script>
								<script language=\"JavaScript\">window.setTimeout(\"window.location.href=\'user.php\'\", 3*1000); </script>
				</head>
				<body>
				<table width='100%' align=center><tr><td align=center>
                 Failed to change avatar!<br>
                 <font color=greeen><a href='user.php'>jump after a few time</a></font>
                 </td></tr></table>
				 </body>";
	}

}

if(isset ($_POST['exit']))
{
	require(realpath("./")."/lib/Container.php");
	$temp=new Container(0);
	$temp->userexit();
}

if(isset ($_GET['action'])){
	switch($_GET['action']){
	case 'forget':
		echo "<head>
			<title>My Pictrue</title>
			<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
			<link rel=\"stylesheet\" type=\"text/css\" href=\"css/forget.css\" />
			<script type=\"text/javascript\" src=\"js/check.js\"></script>
			   </head>
		   <body>
			<div class=\"Signback\">
			<h2>Find Pass Word!</h2>
			  <div class=\"Sign\">
				<form action=\"action.php\" method=\"post\" onSubmit=\"return checkemail()\">
					<table>
						<tr><td id=\"orange\">Your Email:</td><td><input type=\"text\" name=\"email\" id=\"email\" class=\"text\"></td></tr>
						<tr><td><input type=\"hidden\" name=\"state\" id=\"state\" value=1><input type=\"hidden\" name=\"action\" id=\"action\" value=\"forget\"></td>
							<td><input type=\"submit\" value=\"Next\" class=\"button1\">
							</td>
						</tr>
					</table>
				</form>
				</div>
			</div>
		</body>";
		break;
	case 'newalbum':
			echo "<head>
               <title>My Pictrue</title>
			   <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
			   <link rel=\"stylesheet\" type=\"text/css\" href=\"css/forget.css\" />
			   <script type=\"text/javascript\">" .
			   		"function checkanswer(){
						var tag=document.getElementById(\'tag\').value;" .
						"if(tag==\"\")return false;" .
						"else return true;
			   		}" .
			   	"</script>
		</head>
		<body>
			<div class=\"forget password\">
			<div class=\"Signback\">
			<form action=\"action.php\" method=\"post\" onSubmit=\"return checkanswer()\"><table>
				<tr><td id=\"orange\">Tips:</td><td><br></td>" .
				"<tr><td></td>><td>type in your album's tag name then create a new album.</td></tr>
				<tr><td>Tag:</td><td><input type=\"hidden\" name=\"action\" id=\"action\" value=\"newalbum\"><input type=\"text\" name=\"tag\" id=\"tag\" class=\"text\"></td></tr>
				<tr><td><input type=\"submit\" value=\"Create new album\" class=\"button\"></td><td><input type=\"button\" value=\"Close\" class=\"button\" onClick=\"window.close()\">
				</td>
				</tr>
			</table>
			</form>
			</div>
			</div>
		</body>";
		break;
	case 'newphoto':
		echo "<head>
               <title>My Pictrue</title>
			   <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
			   <link rel=\"stylesheet\" type=\"text/css\" href=\"css/forget.css\" />
			   <script type=\"text/javascript\">" .
			   		"function checkanswer(){
						var photo=document.getElementById(\'photo\').value;
						var pname=document.getElementById(\'pname\').value;
						if(photo==\"\"||pname==\"\"){alert(\"cannot be empty!\");return false;}
						else return true;
			   		}" .
			   	"</script>
		</head>
		<body>
			<form action=\"action.php\" method=\"post\" enctype=\"multipart/form-data\" onSubmit=\"return check()\">
			<table>
				<tr><td id=\"orange\">photo:</td><td><input type=\"file\" name=\"photo\" id=\"photo\" class=\"text\"><input type=\"hidden\" id=\"aid\" name=\"aid\" value=\"".$_GET['aid']."\"></td>
				<tr><td>name:</td><td><input type=\"hidden\" name=\"action\" id=\"action\" value=\"newphoto\"><input type=\"text\" name=\"pname\" id=\"pname\" class=\"text\"></td></tr>
				<tr><td><input type=\"submit\" value=\"Add new Photo\" class=\"button\"></td><td><input type=\"button\" value=\"Close\" class=\"button\" onClick=\"window.close()\">
				</td>
				</tr>
			</table>
			</form>
		</body>";
		break;
	default:
		echo "<script language=\"JavaScript\">window.setTimeout(\"window.location.href=\'index.php\'\", 3); </script>";
		break;
	}
}

if(isset ($_POST['search']))
{
	$temp=new Container(1);
}

if(isset ($_POST['action']))
{
	switch($_POST['action']){
		case 'signup':
			signup();
			break;
		case 'login':
			login();
			break;
		case 'forget':
			forget();
			break;
		case 'modify':
			modify();
			break;
		case 'newalbum':
			newalbum();
			break;
		case 'newphoto':
			newphoto();
			break;
		default:
			echo "There is nothing to do!";
			echo "<script language=\"JavaScript\">window.setTimeout(\"window.location.href=\'index.php\'\", 3); </script>";
			break;
	}
}
function newphoto(){
	if(is_uploaded_file($_FILES['photo']['tmp_name'])&&$_SESSION['mod']==1){
		    $Filedata = $_FILES["photo"];
			$name = $Filedata['name'];
		 	$type = $Filedata['type'];
		 	$size = $Filedata['size'];
		 	$tmp_name = $Filedata['tmp_name'];
		 	$error = $Filedata['error'];

			 if($size>=3000000){
			 	echo "<head>
									<title>My Pictrue</title>
									<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
									<link rel=\"stylesheet\" type=\"text/css\" href=\"css/forget.css\" />
									<script type=\"text/javascript\" src=\"js/check.js\"></script>
									<script language=\"JavaScript\">window.setTimeout(\"window.close()\", 3*10000); </script>
					</head>
					<body>
					<table width='100%' align=center><tr><td align=center>
	                  <br>
	                 <font color=green>上传文件太大：</font>
	                 </td></tr></table>
					 </body>";
			  	exit('您上传的文件大小超过限定');
			 }
			 switch($type){
			  	case 'image/pjpeg' : $nameback='.jpg';
			  						break;
				case 'image/jpeg' : $nameback='.jpg';
									break;
				case 'image/gif' : $nameback='.gif';
				 					break;
				case 'image/png' : $nameback='.png';
				  					break;
				case 'image/bmp' : $nameback='.bmp';
				  					break;
				case exit('类型犯规！');

		 	}
		 	require(realpath("./")."/lib/MySQL.php");
		 	$link=connect();
		 	$db=mysql_select_db("user_db");
		 	$dir="data/photos/";
	 		if($nameback && $error==0){
	 			@mysql_query("insert into photo (aid,pname,flowers,eggs) values(".$_POST['aid'].",'".$_POST['pname']."',0,0)",$link);
	 			$result=mysql_query("select pid from photo where pname='".$_POST['pname']."'",$link);
	 			$tem=mysql_fetch_array($result);
	 			$pid=$tem['pid'];
	  			$filename= $_SESSION['user']."_".$_POST['aid']."_".$pid. $nameback;
	  			$fileplace="".$dir."" . $filename;
	  			$fileroot=$dir;
	 		    move_uploaded_file($tmp_name, $fileplace);
	  			$para=mysql_query("update photo set image='".$fileplace."' where pid=".$pid."",$link);
	  			if($para){
	  				echo "<head>
									<title>My Pictrue</title>
									<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
									<link rel=\"stylesheet\" type=\"text/css\" href=\"css/forget.css\" />
									<script type=\"text/javascript\" src=\"js/check.js\"></script>
									<script language=\"JavaScript\">window.setTimeout(\"window.close()\", 3*1000); </script>
					</head>
					<body>
					<table width='100%' align=center><tr><td align=center>
	                 <font color=green> Add photo succeded!</font><br>
	                 </td></tr></table>
					 </body>";
	  			}
	 		}
	 		if(!isset($para)||!$para){
	 			mysql_query("delete from photo where pid=".$pid."",$link);
				echo "<head>
									<title>My Pictrue</title>
									<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
									<link rel=\"stylesheet\" type=\"text/css\" href=\"css/forget.css\" />
									<script type=\"text/javascript\" src=\"js/check.js\"></script>
									<script language=\"JavaScript\">window.setTimeout(\"window.close()\", 3*1000); </script>
					</head>
					<body>
					<table width='100%' align=center><tr><td align=center>
	                 <font color=green>Failed to add photo!</front><br>
	                 </td></tr></table>
					 </body>";
	 		}
		}
}
function newalbum(){
	require("/lib/Container.php");
	$temp=new Container(2);
	if($temp->newalbum($_POST['tag']))
		echo "<head>
					<title>My Pictrue</title>
					<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
					<link rel=\"stylesheet\" type=\"text/css\" href=\"css/forget.css\" />
					<script type=\"text/javascript\" src=\"js/check.js\"></script>
			</head>
				<body>
				<table width='100%' align=center><tr><td align=center>
                  Album is created!<br>
                 <input type=\"button\" value=\"close\" name=\"close\" onClick=\"window.close()\">
                 </td></tr></table>
				 </body>";
	else
		echo "<head>
					<title>My Pictrue</title>
					<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
					<link rel=\"stylesheet\" type=\"text/css\" href=\"css/forget.css\" />
					<script type=\"text/javascript\" src=\"js/check.js\"></script>
			</head>
				<body>
				<table width='100%' align=center><tr><td align=center>
                  <B color=\"red\">Failed to Create a new Album!</B><br>
                 <input type=\"button\" value=\"close\" name=\"close\" onClick=\"window.close()\">
                 </td></tr></table>
				 </body>";
}
function login()
{
	require_once(realpath("./")."/lib/information/user.php");
	$con=mysql_connect("localhost","root","");
	$db = mysql_select_db("user_db");
	$result=mysql_query("SELECT * FROM userinfo WHERE e_mail='".$_POST['email']."'",$con);
	$num=mysql_num_rows($result);
	if($num==0){
		echo "<table width='100%' align=center><tr><td align=center>
              Sorry<br>
              <font color=red>There is no the account!</font><br><a href='index.php'>login again on click</a>
              </td></tr></table>
			  <script language=\"JavaScript\">window.setTimeout(\"window.location.href=\'index.php\'\", 2*1000); </script>";
	}else{
		$row=mysql_fetch_array($result);
		if($_POST['pw']==$row['password'])
		{
			$_SESSION['mod']=1;
			$_SESSION['email']=$_POST['email'];
			$_SESSION['nickname']=$row['nickname'];
			$_SESSION['user']=$row['uid'];
			$_SESSION['avatar']=$row['avatar'];
			echo "
				<head>
								<title>My Pictrue</title>
								<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
								<link rel=\"stylesheet\" type=\"text/css\" href=\"css/forget.css\" />
								<script type=\"text/javascript\" src=\"js/check.js\"></script>
								<script language=\"JavaScript\">window.setTimeout(\"window.location.href=\'user.php\'\", 3*1000); </script>
				</head>
				<body>
				<table width='100%' align=center><tr><td align=center>
                  Welcome to Cool Image!<br>
                 <font color=greeen><a href='user.php'>jump after a few time</a></font>
                 </td></tr></table>
				 </body>
                 ";
		}else
			echo "<table width='100%' align=center><tr><td align=center>
            Sorry!<br>
            <font color=red>Wrong password!</font><br><a href='index.php'>login again on click</a>
            </td></tr></table>
			<script language=\"JavaScript\">window.setTimeout(\"window.location.href=\'index.php\'\", 2*1000); </script>";
	}
}
function modify()
{
	include(realpath("./")."/lib/MySQL.php");
	$link=connect();
	$db=mysql_select_db('user_db');
	$doneornot=array(1=>true,2=>true);
	//$temp=new user(1);
	if(isset($_POST['name']))
		$doneornot[1]=mysql_query("update userinfo set nickname='".$_POST['name']."' where uid=".$_SESSION['user']."",$link);
	if(isset($_POST['orips'])&&isset($_POST['newps'])){
		$result=mysql_query("select password from userinfo where uid=".$_SESSION['user']."",$link);
		$pw=mysql_fetch_array($result);
		//foreach($pw as $t)
		echo " ".$pw." ";
		if($pw['password'] == "".$_POST['orips']."")
			$doneornot[2]=mysql_query("update userinfo set password='".$_POST['newps']."' where uid=".$_SESSION['user']."",$link);
		else
			$doneornot[2]=false;
	}
	if($doneornot[1]&&isset($_POST['name']))$_SESSION['nickname']=$_POST['name'];
	if($doneornot[1]&&$doneornot[2])
			echo "<head>
								<title>My Pictrue</title>
								<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
								<link rel=\"stylesheet\" type=\"text/css\" href=\"css/forget.css\" />
								<script type=\"text/javascript\" src=\"js/check.js\"></script>
								<script language=\"JavaScript\">window.setTimeout(\"window.location.href=\'user.php\'\", 3*1000); </script>
				</head>
				<body>
				<table width='100%' align=center><tr><td align=center>
                  your information was changed!<br>
                 <font color=greeen><a href='user.php'>jump to the user page</a></font>
                 </td></tr></table>
				 </body>";
	else{
		if(isset($_POST['name'])&&!$doneornot[1])
			$name="failed to change the name,please try again later!";
		else{
			$name="";
			if(isset($_POST['name']))
				$_SESSION['nickname']=$_POST['name'];
		}
		if(isset($_POST['newps'])&&!$doneornot[2])
			$password="failed to change the password,please try again later!";
		else
			$password="";
		echo "<head>
								<title>My Pictrue</title>
								<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
								<link rel=\"stylesheet\" type=\"text/css\" href=\"css/forget.css\" />
								<script type=\"text/javascript\" src=\"js/check.js\"></script>
								<script language=\"JavaScript\">window.setTimeout(\"window.location.href=\'user.php\'\", 3*1000); </script>
				</head>
				<body>
				<table width='100%' align=center><tr><td align=center>
                  ".$name."<br> ".$password."<br>
                 <font color=greeen><a href='user.php'>jump to the user page</a></font>
                 </td></tr></table>
				 </body>";
	}

}
function signup()
{
	require_once("/lib/MySQL.php");
		if(isset($_SESSION['email']))
			unset($_SESSION['email']);
		$link=connect();
		@mysql_select_db("user_db");
		$temp[0]=mysql_query("select * from userinfo where e_mail='".$_POST['email']."'",$link);
		$temp[1]=mysql_num_rows($temp[0]);
		$temp[2]=mysql_fetch_array($temp[0]);
		if($temp[0]){
			if($temp[1]==0){
				require_once(realpath("./")."/lib/actions/email.php");
				$to=array(
					'email' => $_POST['email'],
					'nickname' => $_POST['name'],
					'subject' => "Welcome to Knock-Cool-Image!",
					'body' => "You are registered to Knock-Cool-Image."
				);
				$result=send_mail($to);
				if($result){
					if(mysql_query("insert into userinfo (e_mail,password,nickname,pwquestion,pwanswer) values('".$_POST['email']."','".$_POST['ps']."','".$_POST['name']."','".$_POST['pwquestion']."','".$_POST['pwanswer']."')",$link)){
						$_SESSION['email']=$_POST['email'];
						$_SESSION['mod']=1;
						$_SESSION['nickname']=$_POST['name'];
						$re=mysql_query("select uid from userinfo where e_mail='".$_POST['email']."'",$link);
						$row=mysql_fetch_array($re);
						$_SESSION['user']=$row['uid'];
						mysql_query("insert into shared (uid) values (".$row['uid'].")",$link);
						@mysql_close($link);
						echo ("<script language=\"JavaScript\">window.setTimeout(\"window.location.href=\'user.php\'\", 10000); </script>");
					}else{
						echo "<table width='100%' align=center><tr><td align=center>
								Failed to register!<br>
								</td></tr></table>
							<script language=\"JavaScript\">window.setTimeout(\"window.location.href=\'signup.html\'\", 3*1000); </script>";
					}
				}else
					echo "<table width='100%' align=center><tr><td align=center>
								The email address is not existed!<br>
								</td></tr></table>
							<script language=\"JavaScript\">window.setTimeout(\"window.location.href=\'signup.html\'\", 3*1000); </script>";
			}else{
					echo "<table width='100%' align=center><tr><td align=center>
							The e-mail is existed!<br>
							</td></tr></table>
						<script language=\"JavaScript\">window.setTimeout(\"window.location.href=\'signup.html\'\", 3*1000); </script>";
			}
		}
		else
			die ("Cannot connect:".mysql_error());
}

function forget ()
{
	initforget();
	if($_SESSION['state']==1)
	{
		if(!isset($_POST['email']))
			$_SESSION['state']=0;
		else{
			$_SESSION['email']=$_POST['email'];
			//require(realpath("./")."/lib/information/user.php");
			//$temp = new user(2);
			$con=mysql_connect("localhost","root","");
			$db = mysql_select_db("user_db");
			$result=mysql_query("SELECT * FROM userinfo WHERE e_mail='".$_SESSION['email']."'",$con);
			$num=mysql_num_rows($result);
			if($num!=0){
					$row=mysql_fetch_array($result);
					$question=$row['pwquestion'];
					$_SESSION['pwanswer']=$row['pwanswer'];
					$_SESSION['pw']=$row['password'];
					$_SESSION['nickname']=$row['nickname'];
					echo"<head>
								<title>My Pictrue</title>
								<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
								<link rel=\"stylesheet\" type=\"text/css\" href=\"css/forget.css\" />
								<script type=\"text/javascript\" src=\"js/check.js\"></script>
						</head>
						<body>
							<div class=\"forget password\">
							<div class=\"Signback\">
								<form action=\"action.php\" method=\"post\" onSubmit=\"return checkpsanswer()\">
										<table>
										<br/><br/><tr><td id=\"orange\">Question:</td><td id=\"orange\">".$question."</td></tr>
											<tr><td id=\"orange\">Your Answer:</td><td><input type=\"text\" name=\"psanswer\" id=\"psanswer\" class=\"text\"></td></tr>
											<tr><td><input type=\"hidden\" name=\"state\" id=\"state\" value=2><input type=\"hidden\" name=\"action\" id=\"action\" value=\"forget\"></td>
													<td><input type=\"submit\" value=\"Finish\" class=\"button1\">
													</td>
											</tr>
										</table>
								</form>
							</div>
							</div>
						</body>";
			}
			else
			{
				$_SESSION['state']=0;
				echo("<head>
						<title>My Pictrue</title>
						<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
						<link rel=\"stylesheet\" type=\"text/css\" href=\"css/forget.css\" />
						<script type=\"text/javascript\" src=\"js/jump.js\"></script>
					</head>
					<body>
						<div class=\"Signback\">
							<h2>There is not the account!</h2>
							<form action=\"action.php\" method=\"get\">
								<table>
								<tr><td><input type=\"hidden\" name=\"action\" id=\"action\" value=\"forget\"></td>></tr>
								<tr><td><input type=\"submit\" value=\"Retry\" class=\"button\"></td>
								<td><input type=\"button\" value=\"Close\" class=\"button\" onClick=\"window.close()\"></td>
								</table>
							</form>
						</div>
					</body>	");
			}
		}
	}
	else if($_SESSION['state']==2)
	{
		if(!isset($_POST['psanswer'])&&!isset($_SESSION['email']))
		{
			$_SESSION['state']=0;
		}
		else if(!isset($_POST['psanswer']))
		{
			$_SESSION['state']=1;
		}
		else
		{
			unset ($_SESSION['state']);
			if($_SESSION['pwanswer']==$_POST['psanswer'])
			{
				require_once(realpath("./")."/lib/actions/email.php");
				$to=array(
					'subject' => "Find Back Your Password",
					'body' => "Here is your password :".$_SESSION['pw']."
					Have a pleasure visit!Welcome to the Cool Image!",
					'nickname' => "".$_SESSION['nickname']."",
					'email' => $_SESSION['email']);
				send_mail($to);
				$_SESSION['mod']=0;
				unset ($_SESSION['pwanswer']);
				unset ($_SESSION['psanswer']);
				unset ($_SESSION['pw']);
				unset ($_SESSION['email']);

				echo "<script type=\"text/javascript\">
						  window.close();
					  </script>";
			}
			else
			{
				unset ($_SESSION['email']);
				unset ($_SESSION['pwanswer']);
				unset ($_SESSION['pw']);
				unset ($_SESSION['nickname']);
				echo "
				<head>
							<title>My Pictrue</title>
							<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
							<link rel=\"stylesheet\" type=\"text/css\" href=\"css/forget.css\" />
							<script type=\"text/javascript\" src=\"js/jump.js\"></script>
					</head>
					<body>
						<div class=\"forget password\">
						<h2>Wrong Answer</h2>
						<div class=\"Sign\">
							<form action=\"action.php\" method=\"get\">
									<table>
										<tr><td id=\"orange\">Your answer is not correct!Please try again later!</td></tr>
										<tr><td><input type=\"hidden\" name=\"action\" id=\"action\" value=\"forget\">
										<input type=\"button\" value=\"close\" class=\"button1\" onClick=\"window.close()\"></td>
												<td><input type=\"submit\" value=\"Retry\" class=\"button1\">
												</td>
										</tr>
									</table>
							</form>
						</div>
						</div>
					</body>";
			}
		}
	}
}
function initforget(){
	if(!isset($_SESSION)){
		session_start();
		$_SESSION['mod']=0;
	}

	if(!isset ($_SESSION['state']))
		$_SESSION['state']=0;

	if (isset($_POST['state'])&&$_SESSION['state']<$_POST['state'])
			$_SESSION['state']=$_POST['state'];
}
?>
