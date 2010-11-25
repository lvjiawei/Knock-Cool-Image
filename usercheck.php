<?php
 $email=trim($_GET['email']);
?>
<?php
	$con=mysql_connect("localhost","root","");
?>
<html>
<head>
<title>
邮箱注册使用检测
</title>
<link rel="stylesheet" type="text/css" href="index_css.css" />
</head>
<body topmargin="0" leftmargin="0" bottommargin="0">
<table width="200" height="100" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="50"><div align="center"> 
 <?php
   if($email=="")
   {
     echo "请输入邮箱!";
   
   }
   else if(!preg_match("/^[-a-zA-Z0-9_\.]+\@([0-9A-Za-z][0-9A-Za-z-]+\.)+[A-Za-z]{2,5}$/",$email))
   {
		echo "请输入正确的邮箱地址！";
   }
   else
   {
	   $db=mysql_select_db("user_db");
	   $sql=mysql_query("select * from userinfo where e_mail='".$email."'",$con);  
	   $info=mysql_fetch_array($sql);
	   if($info==true)
	   {
		   echo "对不起,该邮箱已被使用!";
	   }
	   else
	   {
		 echo "恭喜,该邮箱没被使用!";
	   } 
   }
 ?>
 </div></td>
  </tr>
  <tr>
    <td height="50"><div align="center"><input type="button" value="确定" class="buttoncss" onClick="window.close()"></div></td>
  </tr>
</table>
</body>