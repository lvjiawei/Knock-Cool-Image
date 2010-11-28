<?php
/**
 * signup.php
 * check out users's password and email and other message and signup
 * @package Knock-Cool-Image/php
 * @author zhuhaofeng
 * @copyright 2010
 * @version 1.0
 * @access public
 */
class signup{
    private $con;
    function link() {
        $this->con=mysql_connect("localhost","root","");;
        if(!$this->con){
            echo "<table width='100%' align=center><tr><td align=center>
                  Cannot connect the MySQL server!<br>
                 </td></tr></table>
                 <script language=\"JavaScript\">window.setTimeout(\"window.location.href=\'../signup.html\'\", 3*1000); </script>";
            return;
        }
        else {
            return $this->con;
        }
    }
    function checkemail($param) {
        $db=mysql_select_db("user_db",$this->con);
        $sql=mysql_query("select * from userinfo where e_mail='".$param."'",$this->con);
        $info=mysql_fetch_array($sql);
        return $info;
    }
    function insert($param){
        $db=mysql_select_db("user_db",$this->con);
        $sql=mysql_query($param);
        if(!$sql){
            return false;
        }
        else{
            return true;
        }
    }
}
session_start();
$sign=new signup();
$link=$sign->link();
if($link!="")
{
    if(!$sign->checkemail($_POST['email'])){
        $email=$_POST['email'];
        $ps=$_POST['ps'];
        $nickname=$_POST['name'];
        $psquestion=$_POST['psquestion'];
        $psanswer=$_POST['psanswer'];
        $insertion="insert into userinfo (e_mail,password,nickname,pwquestion,pwanswer) values('$email','$ps','$nickname','$psquestion','$psanswer')";
       $sql=$sign->insert($insertion);
       if(!$sql){
           echo "<table width='100%' align=center><tr><td align=center>
                  Failed to register!<br>
                 </td></tr></table>
                 <script language=\"JavaScript\">window.setTimeout(\"window.location.href=\'../signup.html\'\", 3*1000); </script>";
       }else{
           $_SESSION['email']=$_POST['email'];
           $_SESSION['mod']=1;
		   $_SESSION['nickname']=$_POST['name'];
           echo "<script language=\"JavaScript\">window.setTimeout(\"window.location.href=\'../user.html\'\", 10); </script>";
       }
    }
}
?>
