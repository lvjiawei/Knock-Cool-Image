<?php
class forget{
	private $email;
	private $pwquestion;
	private $pwanswer;
        private $pw;
        private $con;
	public function mysql()
	{
		$this->con=mysql_connect("localhost","root","");
		if(!$this->con)
		{
			echo"服务器故障，请稍后再试";
			return;
		}
		return $this->con;
	}
	public function set_email($param)
	{
		$this->email = $param;
	}
	public function get_pwquestion()
	{
		return $this->pwquestion;
	}
	public function get_pwanswer()
	{
		return $this->pwanswer;
	}
        public function get_pw()
        {
            return $this->pw;
        }
	public function check_answer()
	{
		$db = mysql_select_db("user_db");
		$result=mysql_query("SELECT * FROM userinfo WHERE e_mail='$this->email'",$this->con);
		$num=mysql_num_rows($result);
		if($num==0){
			echo("<head>
					<title>My Pictrue</title>
					<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
					<link rel=\"stylesheet\" type=\"text/css\" href=\"index_css.css\" />
					<script type=\"text/javascript\" src=\"jump.js\"></script>
				</head>
				<body onload=\"signin_jump()\">
					<div class=\"forget password\">
						<h2>对不起，用户不存在，或输入的email地址错误!</h2>
					</div>	
				</body>	");
                        return false;
		}else{
			$row=mysql_fetch_array($result);
			$this->pwquestion=$row['pwquestion'];
			$this->pwanswer=$row['pwanswer'];
                        $this->pw=$row['password'];
                        return true;
		}
        }
};
session_start();
if(!isset ($_SESSION['state']))
    $_SESSION['state']=1;
else{
    if (isset($_POST['state']))
        $_SESSION['state']=$_POST['state'];
}
if(!isset ($_SESSION['email']) )
    $_SESSION['email']="";
else{
    if(isset($_POST['email'])&&$_SESSION['state']==2)
        $_SESSION['email']=$_POST['email'];
}
$_SESSION['mod']=0;
if($_SESSION['email']==""&&$_SESSION['state']==1)
{
	echo"<head>
		<title>My Pictrue</title>
		<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
		<link rel=\"stylesheet\" type=\"text/css\" href=\"index_css.css\" />
		<script type=\"text/javascript\" src=\"check.js\"></script>
           </head>
	   <body>
	  <div class=\"Signback\">
	  <h2>Find Pass Word!</h2>
          <div class=\"Sign\">
		<form action=\"forget.php\" method=\"post\" onSubmit=\"return checkemail()\">
			<table>
				<tr><td id=\"orange\">Your Email:</td><td><input type=\"text\" name=\"email\" id=\"email\" class=\"text\"></td></tr>
				<tr><td><input type=\"hidden\" name=\"state\" id=\"state\" value=2></td>
					<td><input type=\"submit\" value=\"Next\" class=\"button1\">
					</td>
				</tr>
			</table>
		</form>
		</div>	
	</div>
	
	</body>	";
}else{
    if(!isset ($_SESSION['psanswer']))
        $_SESSION['psanswer']="";
    else{
        if(isset ($_POST['psanswer'])&&$_SESSION['state']==3)
            $_SESSION['psanswer']=$_POST['psanswer'];
    }
if($_SESSION['psanswer']==""&&$_SESSION['state']==2)
{ 
	$temp = new forget();
	$link=$temp->mysql();
	if($link!=""){
		$temp->set_email($_POST['email']);
		if($temp->check_answer()){
		$question=trim($temp->get_pwquestion());
		$_SESSION['pwanswer']=$temp->get_pwanswer();
                $_SESSION['pw']=$temp->get_pw();
        	echo"<head>
                	<title>My Pictrue</title>
			<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
			<link rel=\"stylesheet\" type=\"text/css\" href=\"index_css.css\" />
			<script type=\"text/javascript\" src=\"check.js\"></script>
                    </head>
                    <body>
			<div class=\"forget password\">
			<h2>$question</h2>
			<div class=\"Sign\">
			<form action=\"forget.php\" method=\"post\" onSubmit=\"return checkpsanswer()\">
                        	<table>
				<tr><td id=\"orange\">Your Answer:</td><td><input type=\"text\" name=\"psanswer\" id=\"psanswer\" class=\"text\"></td></tr>
					<tr><td><input type=\"hidden\" name=\"state\" id=\"state\" value=3></td>
						<td><input type=\"submit\" value=\"Finish\" class=\"button1\">
						</td>
					</tr>
				</table>
			</form>
			</div>
			</div>
		</body>";
                unset ($_SESSION['pwquestion']);
                }else{
                    unset ($_SESSION['email']);
                    unset ($_SESSION['state']);
                }
		}else{
			if($_SESSION['psanwer']==$_SESSION['pwanswer']&&$_SESSION['state']==3)
			{
				$_SESSION['mod']=1;
                                $pw=$_SESSION['pw'];
                                unset ($_SESSION['state']);                                
                                unset ($_SESSION['pwanswer']);
                                unset ($_SESSION['psanswer']);
                                unset ($_SESSION['email']);
				echo"<head>
						<title>My Pictrue</title>
						<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
						<link rel=\"stylesheet\" type=\"text/css\" href=\"index_css.css\" />
						<script type=\"text/javascript\" src=\"jump.js\"></script>
			        </head>
					<body onload=\"user_jump()\">
                                $pw</body>
				";
                                unset ($_SESSION['pw']);
			}else{
                                unset ($_SESSION['state']);
                                unset ($_SESSION['pwanswer']);
                                unset ($_SESSION['psanswer']);
                                unset ($_SESSION['pw']);
                                unset ($_SESSION['email']);
                            echo "
							<table width='100%' align=center><tr><td align=center>
							回答错误！<br></table>
							<script type=\"text/javascript\" src=\"jump.js\">
							signin_jump();
                                </script>";
                        }

		}
        }
}
?>