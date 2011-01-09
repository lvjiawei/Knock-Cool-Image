<?php
/*
 * user.php
 * function handler container
 * @package: Knock-Cool-Image/lib
 * @author zhuhaofeng
 * @version 0.1
 * @copyright 2010
 * @access public
 */
 class UserController{
 private $_uid;
 private $_user=array();
 public $_link;
 private $_albums;
 public $_avatar;
 public $_message=null;
 public $_url;
 public $choose=3;
 public function forgetPwEmail($email)
 {
	if($this->checkPostEmail($email))
	{
		return true;
	}
 }
 public function sendEmailToUser($email,$password,$nickname)
 {
	require_once("actions/email.php");
	if($this->choose==0)
	{
		$to=array(
			'subject' => "Find Back Your Password",
			'body' => "Here is your password :".$password."
			Have a pleasure visit!Welcome to the Cool Image!",
			'nickname' => "".$nickname."",
			'email' => $email);
	}
	else if($this->choose==1){
		$to=array(
			'subject' => "Welcome to CoolImage",
			'body' => "Welcome to CoolImage, enjoy~",
			'nickname' => "".$nickname."",
			'email' => $email);
	}
	send_mail($to);
 }
 
 public function modifynicknameByUid($uid,$newNickname)
 {
	if($this->checkPostnickname($newNickname))
	{
		if($this->updatenickname($uid,$newNickname))
		{
			$this->setmessage("Changed seccessful!");
			$this->setjumpurl("modi_user.php?uid=".$uid);
			return true;
		}
		
	}
	$this->setmessage("Failed to modify");
	$this->setjumpurl("modi_user.php?uid=".$uid);
	return false;
 }
 private function updatenickname($uid,$newNickname)
 {
	if(@mysql_query("update userinfo set nickname='".$newNickname."' where uid=".$uid."",$this->_link))
	{
		return true;
	}
	return false;
 }
 public function checkPostnickname($newNickname)
 {
	return $newNickname!="";
 }
 public function signup($email,$pw,$nickname,$pwquestion,$pwanswer)
 {
	if($this->checkPostEmail($email)&&$this->checkPostOtherinfo($pw,$nickname,$pwquestion,$pwanswer))
	{
		if(!$this->isEmailExisted($email))
		{	if($this->addUserInfo($email,$pw,$nickname,$pwquestion,$pwanswer))
			{
				$this->setmessage("welcome to Knock-Cool-Image");
				$this->setjumpurl("user.php?uid=".$this->_user['uid']);
				$this->choose=1;
				//$this->sendEmailToUser($email,$pw,$nickname);
				return true;
			}
			
		}		
		
	}
	$this->setmessage("Failed to signup");
	$this->setjumpurl("index.php");
	return false;
 
 }
 private function addUserInfo($email,$pw,$nickname,$pwquestion,$pwanswer)
 {
	$result=mysql_query("insert into userinfo (e_mail,password,nickname,pwquestion,pwanswer) values('".$email."','".$pw."','".$nickname."','".$pwquestion."','".$pwanswer."')",$this->_link);
	if(!$result)
		return false;
	else
	{
		$result=mysql_query("select * from userinfo where e_mail='".$_POST['email']."'",$this->_link);
		$this->_user=mysql_fetch_array($result);
		$this->setUserSession();
		return true;
	}
 }
 
 private function checkPostEmail($email)
 {
		return $this->iscorrectedemail($email);
 }
 private function checkPostOtherInfo($pw,$nickname,$pwquestion,$pwanswer)
 {
	if($pw!=""&&$nickname!=""&&$pwquestion!=""&&$pwanswer!="")
		return true;
	else
		return false;			
 }

public function isPostInfoSet()
{
	return(isset($_POST['ps'])&&isset($_POST['pwquestion'])&&isset($_POST['pwanswer'])&&isset($_POST['name'])&&isset($_POST['email']));
}
 
 private function isEmailExisted($email)
 {
	$result=mysql_query("select * from userinfo where e_mail='".$email."'",$this->_link);
	$num=mysql_num_rows($result);
	if($num==0)
		return false;
	else
		return true;
 }
 
 
 public function login($email,$password){
	if((!$this->isempty($email,$password))&&$this->iscorrectedemail($email))
		return $this->isuserexisted($email,$password);
	else{
		$this->setjumpurl("index.php");
		$this->setmessage("email or password is not correct!");
		return false;
	}
		//return true;
	//$num=mysql_query("select * from userinfo where e_mail='".$email."' and password='".$password."'",$this->_link);	
 }
 private function isempty($para1,$para2)
 {
	if($para1==""||$para2=="")
		return true;
	else
		return false;
		//return true;
 }
 private function iscorrectedemail($email)
 {
	if(!preg_match("/^[-a-zA-Z0-9_\.]+\@([0-9A-Za-z][0-9A-Za-z-]+\.)+[A-Za-z]{2,5}$/",$email))
	{
	return false;
	//return true;
	}
	return true;
 }
 private function setUserSession()
 {
	$_SESSION['user']=$this->_user['uid'];
	$_SESSION['mod']=1;
	$_SESSION['nickname']=$this->_user['nickname'];
	$_SESSION['avatar']=$this->_user['avatar'];
	$_SESSION['email']=$this->_user['e_mail'];
 }
 private function isuserexisted($email,$password)
 {
	$result=@mysql_query("select * from userinfo where e_mail='".$email."' and password='".$password."'",$this->_link);
	$num=@mysql_num_rows($result);
	if($num==0)
	{
		$this->setmessage("Email or password is not correct!");
		$this->setjumpurl('index.php');
		return false;
		//return true;
	}
	else
	{
		$this->_user=mysql_fetch_array($result);
		$this->setmessage("welcome to Knock-Cool-Image");
		$this->setjumpurl('user.php?uid='.$this->_user['uid']);
		$this->setUserSession();
		return true;
	}
 }
 private function isUserExistByEmail($email)
 {
	$result=@mysql_query("select * from userinfo where e_mail='".$email."'",$this->_link);
	$num=@mysql_num_rows($result);
	if($num==0)
	{
		$this->setmessage("Email is not correct!");
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
	else
	{
		$row=mysql_fetch_array($result);
		$question=$row['pwquestion'];
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
 }
 public function setmessage($para)
 {
	$this->_message=$para;
 }
 public function setjumpurl($para)
 {
	$this->_url=$para;
 }
 public function getmessage()
 {
	return "<table width='100%' align=center><tr><td align=center>
              <br>
              <font color=red>".$this->_message."</font><br><a href='".$this->_url."'>click here</a>
              </td></tr></table>
			  <script language=\"JavaScript\">window.setTimeout(\"window.location.href=\'".$this->_url."\'\", 2*1000); </script>";
 }

 };
 
?>