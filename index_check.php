<?php
/**
 * user_login
 * 
 * @package 
 * @author zhuhaofeng
 * @copyright 2010
 * @version $Id$
 * @access public
 */
class user_login
{
    public $con;
    //private $res;
    //private $row;
    //public $user;
    //public $password;
    
    public function connect_mysql()
    {
        $this->con=mysql_connect("localhost","coolimage","1234asd");
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
         $usr=$_POST['email']; 
         $result=mysql_query("SELECT * FROM userinfo WHERE e_mail='$usr'",$this->con);
     //$row=mysql_num_rows("SELECT * FROM userinfo WHERE e_mail='$_post[email]'",$con);
     $num=mysql_num_rows($result);
     if($num==0){
        echo("<table width='100%' align=center><tr><td align=center>
              用户不存在<br>
              <font color=red>登录失败!</font><br><a href='index.html'>请重新输入</a>
              </td></tr></table>");              
     }
     else{
        $row=mysql_fetch_array($result);
        //if($result['password']==$_POST['pw'])
        if($row['password']==$_POST['pw'])
        {
            echo("<table width='100%' align=center><tr><td align=center>
              Welcome to Cool Image!<br>
              <font color=greeen><a href='user.html'>点击进入</a></font>
              </td></tr></table>");
        }
        else{
            echo("<table width='100%' align=center><tr><td align=center>
            密码错误<br>  
            <font color=red>登录失败!</font><br><a href='index.html'>请重新输入</a>
            </td></tr></table>");
        }
     }
     mysql_close();
         /*
         $mysql = mysql_query("SELECT * FROM userinfo WHERE e_mail='$this->user'",$this->con);
         $num=mysql_num_rows($mysql);
         $his->res=mysql_fetch_array($mysql);
         if($this->res['password']==$this->password)
         {
              echo "<table width='100%' align=center><tr><td align=center>" ;
              echo "Welcome to Cool Image!<br>" ;
              echo "<font color=greeen><a href='user.html'>点击进入</a></font>";
              echo "</td></tr></table>" ;
              
              mysql_close();
            
             //echo "<script language='javascript' type='text/javascript'>";
             
            // echo "alert('登录成功！')"; 
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
              echo "账号或密码错误,或者不是管理员账号<br>" ;  
              //echo "'$this->res'";          
              echo "<font color=red>登录失败!</font><br><a href='index.html'>请重新输入</a>";
              echo "</td></tr></table>" ;
              
              mysql_close();*/
          //}       
      }
}
    $log = new user_login();
    if(!$log->connect_mysql())
    { 
        //$log->user=$_post['email'];
        //$log->password=$_post['pw'];
        $log->check_pw();
        //echo ($log->res);
     }
     /*$con=mysql_connect("localhost","coolimage","1234asd");
     if(!$con){die('Could not connect: '.mysql_error());}
     $db=mysql_select_db("user_db");
     //mysql_query("set names utf8",$con); 
     $usr=$_POST['email']; 
        
     $result=mysql_query("SELECT * FROM userinfo WHERE e_mail='$usr'",$con);
     //$row=mysql_num_rows("SELECT * FROM userinfo WHERE e_mail='$_post[email]'",$con);
     $num=mysql_num_rows($result);
     if($num==0){
        echo("<table width='100%' align=center><tr><td align=center>
              用户不存在<br>
              <font color=red>登录失败!</font><br><a href='index.html'>请重新输入</a>
              </td></tr></table>");              
     }
     else{
        $row=mysql_fetch_array($result);
        //if($result['password']==$_POST['pw'])
        if($row['password']==$_POST['pw'])
        {
            echo("<table width='100%' align=center><tr><td align=center>
              Welcome to Cool Image!<br>
              <font color=greeen><a href='user.html'>点击进入</a></font>
              </td></tr></table>");
        }
        else{
            echo("<table width='100%' align=center><tr><td align=center>
            密码错误<br>  
            <font color=red>登录失败!</font><br><a href='index.html'>请重新输入</a>
            </td></tr></table>");
        }
     }
     mysql_close();*/
?>