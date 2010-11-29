<?php
/*
 * forget.php
 * find out the password for users who don't remember and mail to them
 * @packge:Knock-Cool-Image/php
 * @author zhuhaofeng
 * @copyright 2010
 * @version 0.1
 * @access public
 */
class forget{
	private $email;
	private $pwquestion;
	private $pwanswer;
    private $pw;
    private $con;
	private $name;
	public function mysql()
	{
		$this->con=mysql_connect("localhost","root","");
		if(!$this->con)
		{
			echo"Cannot connect the MySQL server!";
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
	public function get_name()
	{
		return $this->name;
	}
    public function check_answer()
	{
		$db = mysql_select_db("user_db");
		$result=mysql_query("SELECT * FROM userinfo WHERE e_mail='$this->email'",$this->con);
		$num=mysql_num_rows($result);
		if($num==0){
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

if(!isset($_SESSION['mod'])){
session_start();
	$_SESSION['mod']=0;
}

if(!isset ($_SESSION['state']))
    $_SESSION['state']=1;

if (isset($_POST['state'])&&$_SESSION['state']<$_POST['state'])
        $_SESSION['state']=$_POST['state'];

if(isset($_POST['state'])){
	if ($_POST['state']==4){
		$_SESSION['state']=1;
		if(isset($_SESSION['email']))
		unset ($_SESSION['email']);
		if(isset($_SESSION['pwanswer']))
		unset ($_SESSION['pwanswer']);
		if(isset($_SESSION['pw']))
		unset ($_SESSION['pw']);
	}
}

if($_SESSION['state']==1)
{
	echo"<head>
		<title>My Pictrue</title>
		<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
		<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/index_css.css\" />
		<script type=\"text/javascript\" src=\"../js/check.js\"></script>
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
}
else if($_SESSION['state']==2)
{
	if(!isset($_POST['email']))
		$_SESSION['state']=1;
	else{
		$_SESSION['email']=$_POST['email'];
		$temp = new forget();
		$link=$temp->mysql();
		if($link!=""){
			$temp->set_email($_SESSION['email']);
			if($temp->check_answer())
			{
				$question=trim($temp->get_pwquestion());
				$_SESSION['pwanswer']=$temp->get_pwanswer();
				$_SESSION['pw']=$temp->get_pw();
				$_SESSION['nickname']=$temp->get_name();
				echo"<head>
							<title>My Pictrue</title>
							<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
							<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/index_css.css\" />
							<script type=\"text/javascript\" src=\"../js/check.js\"></script>
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
			}
			else
			{
				$_SESSION['state']=1;
				echo("<head>
					<title>My Pictrue</title>
					<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
					<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/index_css.css\" />
					<script type=\"text/javascript\" src=\"../js/jump.js\"></script>
				</head>
				<body onload=\"signin_jump(3000)\">
					<div class=\"Sign\">
						<h2>There is not the account!</h2>
					</div>	
				</body>	");
			}
		}
	}	
}
else if($_SESSION['state']==3)
{
	if(!isset($_POST['psanswer'])&&!isset($_SESSION['email']))
	{
		$_SESSION['state']=1;
	}
	else if(!isset($_POST['psanswer']))
	{
		$_SESSION['state']=2;
	}
	else
	{
		unset ($_SESSION['state']);
		if($_SESSION['pwanswer']==$_POST['psanswer'])
		{
			$subject="Find Back Your Password";
			$message="Here is your password :".$_SESSION['pw']."
			Have a pleasure visit!Welcome to the Cool Image!";
			$header="From :lv.jw12@gmail.com";
			mail($_SESSION['email'],$subject,$message,$header);
			$_SESSION['mod']=1;
			unset ($_SESSION['pwanswer']);
			unset ($_SESSION['psanswer']);
			unset ($_SESSION['pw']);

			echo "<script type=\"text/javascript\">
					  window.setTimeout(\"window.location.href=\'../user.html\'\",3*1000);
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
						<link rel=\"stylesheet\" type=\"text/css\" href=\"../css/index_css.css\" />
						<script type=\"text/javascript\" src=\"../js/jump.js\"></script>
				</head>
				<body onload=\"signin_jump(3000)\">
					<div class=\"forget password\">
					<h2>Wrong Answer</h2>
					<div class=\"Sign\">
						<form action=\"forget.php\" method=\"post\">
								<table>
									<tr><td id=\"orange\">Your answer is not correct!Please try again later!</td></tr>
									<tr><td><input type=\"hidden\" name=\"state\" id=\"state\" value=4></td>
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
?>
