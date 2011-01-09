<?php
if(!isset($_SESSION))
	session_start();
if(isset ($_GET['id']))
{
	if(isset ($_SESSION['user']))
		switch($_GET['page']){
		case 'all':
			echo "nothing";
			break;
		default:
			break;
		}
	else if(isset ($_GET['right']))
		switch($_GET['right']){
		case 1:
			break;
		default:
			echo "<script language=\"JavaScript\">window.setTimeout(\"window.location.href=\'index.php\'\", 3); </script>";
		}
	else
		see();
}else
	echo "<script language=\"JavaScript\">window.setTimeout(\"window.location.href=\'index.php\'\", 3); </script>";
function see()
{	
	$_SESSION['mod']=0;
	require_once(realpath("./")."/lib/MySQL.php");
	$link=connect();
	$db=mysql_select_db("user_db");
	if(!$db)die("Cannot connect:".mysql_error());
	$result=mysql_query("select * from album where uid=".$_GET['id']."");
	if(!$result){die("Cannot connect:".mysql_error());$num=0;}
	else
		$num=mysql_num_rows($result);
	if($num==0){
		$_SESSION['ablum']=array(
			1 => './images/ablum.jpg',
			2 => './images/ablum.jpg',
			3 => './images/ablum.jpg',
			4 => './images/ablum.jpg',
			5 => './images/ablum.jpg',
			6 => './images/ablum.jpg',
			7 => './images/ablum.jpg',
			8 => './images/ablum.jpg',
		);
	}else{
	}
}
?>
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
    <div>
    <form action="action.php" method="post">
    <table><!--�����?&#65533;?����ͨ������?&#65533;?����?&#65533;?�⣬������po��?&#65533;?-->
    <tr><td><input type="text" name="search" id="search" class="text" /></td><td><input type="submit" name="search" id="search" value="search" class="button1" /></td></tr>
    </table>
    </div>
	</div>
	<div id="right">
    <table id="rightshow"><!--����?&#65533;��phpд�Ǹ�����Ŷ~~���ǻ�?&#65533;?��?&#65533;?�����5?&#65533;?�����?&#65533;&#65533;�֣���?&#65533;?����po����5��td��?&#65533;? -->
    <tr style="padding-top:10px"><td><img src="<?php echo $_SESSION['ablum'][1]?>" name="b1" onmouseOver="mouseOver1()" onmouseOut="mouseOut1()" class="ablumimage"/>
							</td><td><img src="<?php echo $_SESSION['ablum'][2]?>" name="b2" onmouseOver="mouseOver2()" onmouseOut="mouseOut2()" class="ablumimage"/>
							</td><td><img src="<?php echo $_SESSION['ablum'][3]?>" name="b3" onmouseOver="mouseOver3()" onmouseOut="mouseOut3()" class="ablumimage"/>
							</td></tr>
    <tr style="padding-top:10px"><td><img src="<?php echo $_SESSION['ablum'][4]?>" name="b4" onmouseOver="mouseOver4()" onmouseOut="mouseOut4()" class="ablumimage"/>
							</td><td><img src="<?php echo $_SESSION['ablum'][5]?>" name="b5" onmouseOver="mouseOver5()" onmouseOut="mouseOut5()" class="ablumimage"/>
							</td><td><img src="<?php echo $_SESSION['ablum'][6]?>" name="b6" onmouseOver="mouseOver6()" onmouseOut="mouseOut6()" class="ablumimage"/>
							</td></tr>
    <tr style="padding-top:10px"><td><img src="<?php echo $_SESSION['ablum'][7]?>" name="b7" onmouseOver="mouseOver7()" onmouseOut="mouseOut7()" class="ablumimage"/>
							</td><td><img src="<?php echo $_SESSION['ablum'][8]?>" name="b8" onmouseOver="mouseOver8()" onmouseOut="mouseOut8()" class="ablumimage"/>
							</td><td><input type="button" id="listbutton" value ="Order Post"><input type="button" id="listbutton" value ="Pre Post">
							</td></tr>
    </table>
	</div>
	<div id="bottom">
	</div>
	</div>
	</body>
</html>
