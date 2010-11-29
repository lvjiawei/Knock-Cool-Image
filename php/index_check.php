<?php
/**
 * index_check.php
 * check the email and password then initialize the user environment
 * @package Knock-Cool-Image/php
 * @author zhuhaofeng
 * @copyright 2010
 * @version 1.2
 * @access public
 */
    class user_login
{
      public $con;
    //private $res;
    //private $row;
      public $email;
      public $password;
    
    public function connect_mysql()
    {
        $this->con=mysql_connect("localhost","root","");
        if(!$this->con)
        {
            die('Could not connect: '.mysql_error());
         }
     }
     
     public function check_pw()
     {
         //$this->con=mysql_connect("localhost","coolimage","1234asd");
         $db=mysql_select_db("user_db");
         //$this->user=$_post['email'];
         //$this->password=$post['pw'];
         if(!$db){die(' Cannot connect the table�&#65533; '.mysql_error());}
         //$user=$_POST['email']; 
         $result=mysql_query("SELECT * FROM userinfo WHERE e_mail='$this->email'",$this->con);
     //$row=mysql_num_rows("SELECT * FROM userinfo WHERE e_mail='$_post[email]'",$con);
     $num=mysql_num_rows($result);
     if($num==0){
        echo("<table width='100%' align=center><tr><td align=center>
              Sorry<br>
              <font color=red>There is no the account!</font><br><a href='../index.php'>login again on click</a>
              </td></tr></table>
			  <script language=\"JavaScript\">window.setTimeout(\"window.location.href=\'../index.php\'\", 2*1000); </script>
			  ");              
     }
     else{
        $row=mysql_fetch_array($result);
        //if($result['password']==$_POST['pw'])
        if($row['password']==$this->password)//$_POST['pw'])
        {
            //echo "<script>window.location =\"http://localhost/Knock-Cool-Image/user.html\";</script>";
           session_start();
            $_SESSION['email']=$this->email;
            $_SESSION['mod']=1;
			$_SESSION['nickname']=$row['nickname'];
			$_SESSION['uid']=$row['uid'];
            echo "<table width='100%' align=center><tr><td align=center>      		              
                  Welcome to Cool Image!<br>
                 <font color=greeen><a href='../user.php'>jump after a few time</a></font>
                 </td></tr></table>
                 <script language=\"JavaScript\">window.setTimeout(\"window.location.href=\'../user.php\'\", 3*1000); </script>";
            //echo("<table width='100%' align=center><tr><td align=center>            
           //   Welcome to Cool Image!<br>
           //   <font color=greeen><a href='user.html'>�&#65533;&#65533;瑰嚮�&#65533;�涘�&#65533;�</a></font>
           //   </td></tr></table>");
        }
        else{
            echo("<table width='100%' align=center><tr><td align=center>
            Sorry<br>  
            <font color=red>Wrong password!</font><br><a href='../index.php'>login again on click</a>
            </td></tr></table>
			<script language=\"JavaScript\">window.setTimeout(\"window.location.href=\'../index.php\'\", 2*1000); </script>
			");
        }
     }
         /*
         $mysql = mysql_query("SELECT * FROM userinfo WHERE e_mail='$this->user'",$this->con);
         $num=mysql_num_rows($mysql);
         $his->res=mysql_fetch_array($mysql);
         if($this->res['password']==$this->password)
         {
              echo "<table width='100%' align=center><tr><td align=center>" ;
              echo "Welcome to Cool Image!<br>" ;
              echo "<font color=greeen><a href='user.html'>�&#65533;&#65533;瑰嚮�&#65533;�涘�&#65533;�</a></font>";
              echo "</td></tr></table>" ;
              
              mysql_close();
            
             //echo "<script language='javascript' type='text/javascript'>";
             
            // echo "alert('�&#65533;�诲�&#65533;鎴愬姛锛?)"; 
             //echo "location.href='user.php';"; 
           //  echo "</script>";                      
            // exit;
          }
          else
          {          
              //header("location:Error1.php")
              // echo("login!");
              // mysql_close($con);
              echo "<table width='100%' align=center><tr><td align=center>" ;
              echo "�&#65533;﹀彿鎴栧瘑�&#65533;�侀敊璇?鎴栬?涓嶆槸绠＄悊�&#65533;�樿处�&#65533;�?br>" ;  
              //echo "'$this->res'";          
              echo "<font color=red>�&#65533;�诲�&#65533;澶辫触!</font><br><a href='index.html'>璇烽噸�&#65533;�拌緭�&#65533;&#65533;?/a>";
              echo "</td></tr></table>" ;
              
              mysql_close();*/
          //}       
      }
}

    $log = new user_login();
    if(!$log->connect_mysql())
    { 
        $log->email=trim($_POST['email']);
        $log->password=trim($_POST['pw']);
        $log->check_pw();
        //echo ($log->res);
     }
     /*$con=mysql_connect("localhost","coolimage","1234asd");
     if(!$con){die('Could not connect: '.mysql_error());}
     $db=mysql_select_db("user_db");
     //mysql_query("set names utf8",$con); 
     $usr=$_POST['email']; 
        
     $result=mysql_query("SELECT * FROM userinfo WHERE e_mail='$usr'",$con);
     //$row=mysql_num_rows("SELECT/*$con=mysql_connect("localhost","coolimage","1234asd");
     if(!$con){die('Could not connect: '.mysql_error());}
     $db=mysql_select_db("user_db");
     //mysql_query("set names utf8",$con); 
     $usr=$_POST['email']; 
        
     $result=mysql_query * FROM userinfo WHERE e_mail='$_post[email]'",$con);
     $num=mysql_num_rows($result);
     if($num==0){
        echo("<table width='100%' align=center><tr><td align=center>
              �&#65533;�ㄦ埛涓嶅瓨�&#65533;�?br>
              <font color=red>�&#65533;�诲�&#65533;澶辫触!</font><br><a href='index.html'>璇烽噸�&#65533;�拌緭�&#65533;&#65533;?/a>
              </td></tr></table>");              
     }
     else{
        $row=mysql_fetch_array($result);
        //if($result['password']==$_POST['pw'])
        if($row['password']==$_POST['pw'])
        {
            echo("<table width='100%' align=center><tr><td align=center>
              Welcome to Cool Image!<br>
              <font color=greeen><a href='user.html'>�&#65533;&#65533;瑰嚮�&#65533;�涘�&#65533;�</a></font>
              </td></tr></table>");
        }
        else{
            echo("<table width='100%' align=center><tr><td align=center>
            瀵嗙爜閿欒<br>  
            <font color=red>�&#65533;�诲�&#65533;澶辫触!</font><br><a href='index.html'>璇烽噸�&#65533;�拌緭�&#65533;&#65533;?/a>
            </td></tr></table>");
        }
     }
     mysql_close();*/
?>
