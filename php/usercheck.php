<?php
/* 
 * usercheck.php
 * a temp php for usercheck
 * @package Knock-Cool-Image
 * @author zhuhaofeng
 * @copyright 2010
 * @version 1.0
 * @access public
 */
 $email=trim($_GET['email']);
?>
<?php
	$con=mysql_connect("localhost","root","");
?>
<html>
<head>
<title>
check if the account used
</title>
<link rel="stylesheet" type="text/css" href="../css/index_css.css" />
</head>
<body topmargin="0" leftmargin="0" bottommargin="0">
<table width="200" height="100" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="50"><div align="center"> 
 <?php
   if($email=="")
   {
     echo "Input the e-mail address!";
   
   }
   else if(!preg_match("/^[-a-zA-Z0-9_\.]+\@([0-9A-Za-z][0-9A-Za-z-]+\.)+[A-Za-z]{2,5}$/",$email))
   {
		echo "Input the corrected e-mail address锛&#65533;";
   }
   else
   {
	   $db=mysql_select_db("user_db");
	   $sql=mysql_query("select * from userinfo where e_mail='".$email."'",$con);  
	   $info=mysql_fetch_array($sql);
	   if($info==true)
	   {
		   echo "The account is registered!";
	   }
	   else
	   {
		 echo "Conguraduation!Account can be used!";
	   } 
   }
 ?>
 </div></td>
  </tr>
  <tr>
    <td height="50"><div align="center"><input type="button" value="OK" class="buttoncss" onClick="window.close()"></div></td>
  </tr>
</table>
</body>
