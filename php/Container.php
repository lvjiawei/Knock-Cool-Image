<?php
/*
 * Container.php
 * function handler container
 * @package: Knock-Cool-Image/php
 * @author zhuhaofeng
 * @version 0.1
 * @copyright 2010
 * @access public
 */
session_start();
/*
 *Class:Container  It's used to contain all the function handler for reuse.
 */
class Container
{
	public $user;
	public $email;
	private $con;
	private $action;
	/*
	 *construct function   according to the  varable $action to define the 
	 *environment
	 */
	function __construct($action)
	{
		if($action==1){
			$this->con=mysql_connect("localhost","root","");
			if(!$this->con)
				die('Could not connect: ' . mysql_error());
		}
	}
	/*
	 *destruct function   close the unuse function or link to protect the
	 *right
	 */
	function __destruct()
	{
		if($this->action==1)
			mysql_close($this->con);
	}
	/*
	 *function:exit  logout of the webpage and clear the session 
	 */
	public function userexit()
	{
		if(isset($_POST['exit'])){
                    if(isset($_SESSION['mod']))
                            unset($_SESSION['mod']);
                    if(isset($_SESSION['email']))
                            unset($_SESSION['email']);
                    if(isset($_SESSION['user']))
                            unset($_SESSION['user']);
                    if(isset($_SESSION['nickname']))
                            unset($_SESSION['nickname']);
                    echo "<script type=\"text/javascript\">window.location.assign(\"../index.php\");</script>";
                }
	}
	/*
	 *function:usercheck   check if the user is login or not and take some
	 *action to protect the right
	 */
	public function usercheck($address,$action1)
	{
		if(isset($_SESSION['mod']))
		{
			if($_SESSION['mod']!=1&&$action1==1)
			{
				echo "<script type=\"text/javascript\">window.location.replace(\"".$address."\");</script>";
			}else if($action1==2&&$_SESSION['mod']==1)
			{
				echo "<script type=\"text/javascript\">window.location.replace(\"".$address."\");</script>";
			}
		}
		else
		{
			$_SESSION['mod']=0;
			if($action1==1)
				echo "<script type=\"text/javascript\">window.location.replace(\"".$address."\");</script>";
		}
	}
}
?>
