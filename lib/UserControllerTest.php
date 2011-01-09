<?php

require_once 'lib\UserController.php';

/**
 * UserController test case.
 */
class UserControllerTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @var UserController
	 */
	private $UserController;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		
		// TODO Auto-generated UserControllerTest::setUp()
		$this->UserController = new UserController();
		require_once("lib/MySQL.php");
		$con=connect();
		$db=mysql_select_db('user_db');
		$this->UserController->_link=$con;		
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated UserControllerTest::tearDown()
		

		$this->UserController = null;
		
		parent::tearDown ();
	}
	
	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}
	
	/**
	 * Tests UserController->forgetPwEmail()
	 */
	public function testForgetPwEmail() {
		// TODO Auto-generated UserControllerTest->testForgetPwEmail()
		//$this->markTestIncomplete ( "forgetPwEmail test ok!" );
		$condition=$this->UserController->forgetPwEmail("545154909@qq.com");
		$this->assertTrue($condition==true);
	}
	

	
	/**
	 * Tests UserController->modifynicknameByUid()
	 */
	public function testModifynicknameByUid() {
		// TODO Auto-generated UserControllerTest->testModifynicknameByUid()
	//	$this->markTestIncomplete ( "modifynicknameByUid test ok!" );
		
		$condition=$this->UserController->modifynicknameByUid(1,"lve");
		$this->assertTrue($condition==true);
	
	}
	
	/**
	 * Tests UserController->checkPostnickname()
	 */
	public function testCheckPostnickname() {
		// TODO Auto-generated UserControllerTest->testCheckPostnickname()
		//$this->markTestIncomplete ( "checkPostnickname test ok!" );
		
	$this->assertTrue($this->UserController->checkPostnickname("myNickname"));
	
	}
	
	/**
	 * Tests UserController->signup()
	 */
	public function testSignupNotSuccess() {
		// TODO Auto-generated UserControllerTest->testSignup()
		//$this->markTestIncomplete ( "signup test ok!" );
		
		$condition=$this->UserController->signup("545154909@qq.com","08386221","lll","who are u","my name is lll");
		$this->assertTrue($condition!=true);
	}
	public function testSignupSuccess() {
		// TODO Auto-generated UserControllerTest->testSignup()
		//$this->markTestIncomplete ( "signup test ok!" );
		$condition=$this->UserController->signup("lv.jw12@gmail.com","08386221","lll","who are u","my name is lll");
		$this->assertTrue($condition==true);
	}
	/**
	 * Tests UserController->isPostInfoSet()
	 */
	public function testIsPostInfoSet() {
		// TODO Auto-generated UserControllerTest->testIsPostInfoSet()
		//$this->markTestIncomplete ( "isPostInfoSet test not implemented" );
		$_POST['ps']=08386221;
		$_POST['pwquestion']="who are you";
		$_POST['pwanswer']="I'm tom";
		$_POST['name']="Tom";
		$_POST['email']="tomcat@gmail.com";
		
		$this->assertTrue($this->UserController->isPostInfoSet());
	
	}
	
	/**
	 * Tests UserController->login()
	 */
	public function testLoginSuccessful() {
		// TODO Auto-generated UserControllerTest->testLogin()
		//$this->markTestIncomplete ( "login test ok!" );
		
		$this->assertTrue(($this->UserController->login("545154909@qq.com","asdf1234")));
	
	}
	public function testLoginNotSuccessful() {
		// TODO Auto-generated UserControllerTest->testLogin()
		//$this->markTestIncomplete ( "login test ok!" );
		
		$this->assertTrue(!($this->UserController->login("545154909@qq.com","asdf123")));
	
	}
	/**
	 * Tests UserController->setmessage()
	 */
	public function testSetmessage() {
		// TODO Auto-generated UserControllerTest->testSetmessage()
		//$this->markTestIncomplete ( "setmessage test ok!" );
		$this->UserController->setmessage("msg");
		$this->assertTrue($this->UserController->_message=="msg");
	
	}
	
	/**
	 * Tests UserController->setjumpurl()
	 */
	public function testSetjumpurl() {
		// TODO Auto-generated UserControllerTest->testSetjumpurl()
		//$this->markTestIncomplete ( "setjumpurl test not implemented" );
		$this->UserController->setjumpurl("index.php");
		$this->assertTrue($this->UserController->_url=="index.php");
		//$this->assertTrue($this->UserController->setjumpurl("index.php"));
	
	}
	
	/**
	 * Tests UserController->getmessage()
	 */
	public function testGetmessage() {
		// TODO Auto-generated UserControllerTest->testGetmessage()
		//$this->markTestIncomplete ( "getmessage test ok!" );
		
		$this->UserController->setmessage("ok!");
		$this->UserController->setjumpurl("index.php");
		$str=$this->UserController->getmessage();
		$str2="<table width='100%' align=center><tr><td align=center>
              <br>
              <font color=red>ok!</font><br><a href='index.php'>click here</a>
              </td></tr></table>
			  <script language=\"JavaScript\">window.setTimeout(\"window.location.href=\'index.php\'\", 2*1000); </script>";
	
		$this->assertTrue($str==$str2);
	
	}

}

