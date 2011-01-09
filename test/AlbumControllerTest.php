<?php

require_once 'lib\AlbumController.php';

require_once 'PHPUnit\Framework\TestCase.php';

/**
 * AlbumController test case.
 */
class AlbumControllerTest extends PHPUnit_Framework_TestCase {
	
	/**
	 * @var AlbumController
	 */
	private $AlbumController;
	
	/**
	 * Prepares the environment before running a test.
	 */
	protected function setUp() {
		parent::setUp ();
		
		// TODO Auto-generated AlbumControllerTest::setUp()
		$this->AlbumController = new AlbumController(1);
		require_once("lib/MySQL.php");
		$con=connect();
		$db=mysql_select_db("user_db");
		$this->AlbumController->_link=$con;
	}
	
	/**
	 * Cleans up the environment after running a test.
	 */
	protected function tearDown() {
		// TODO Auto-generated AlbumControllerTest::tearDown()
		

		$this->AlbumController = null;
		
		parent::tearDown ();
	}
	
	/**
	 * Constructs the test case.
	 */
	public function __construct() {
		// TODO Auto-generated constructor
	}
	
	/**
	 * Tests AlbumController->isEmpty($para)
	 */
	public function testisEmpty(){
		$condition=$this->AlbumController->isEmpty("abc");
		$this->assertTrue($condition==false);
	}
	
	public function testEmpty(){
	
		$this->assertTrue($this->AlbumController->isEmpty(""));
	}
	/**
	 * Tests AlbumController->AlbumController()
	 */
	public function testAlbumController() {
		// TODO Auto-generated AlbumControllerTest->testAlbumController()
		//$this->markTestIncomplete ( "AlbumController test not implemented" );
		//$this->AlbumController->AlbumController(1);
		$this->assertTrue($this->AlbumController->getUid()==1);
	}
	public function testChangeAlbumController() {
		// TODO Auto-generated AlbumControllerTest->testAlbumController()
		//$this->markTestIncomplete ( "AlbumController test not implemented" );
		//$this->AlbumController->AlbumController(1);
		$this->AlbumController->AlbumController(2);
		$this->assertTrue($this->AlbumController->getUid()==2);
	}
	/**
	 * Tests AlbumController->isPost()
	 */
	public function testIsPost() {
		// TODO Auto-generated AlbumControllerTest->testIsPost()
		//$this->markTestIncomplete ( "isPost test not implemented" );
		$_POST['uid']=1;
		$this->assertTrue($this->AlbumController->isPost('uid'));
	}
	public function testIsPost2() {
		// TODO Auto-generated AlbumControllerTest->testIsPost()
		//$this->markTestIncomplete ( "isPost test not implemented" );
		$this->assertTrue(!$this->AlbumController->isPost('album'));
	}
	/**
	 * Tests AlbumController->addNewAlbum()
	 */
	public function testAddNewAlbumSuccessful() {
		// TODO Auto-generated AlbumControllerTest->testAddNewAlbum()
		//$this->markTestIncomplete ( "addNewAlbum test not implemented" );
		$this->AlbumController->addNewAlbum("sunday");
		$condition=$this->AlbumController->_message=="A new album is created!";
		$this->assertTrue($condition);
	}
	public function testAddNewAlbumNotSuccessful() {
		// TODO Auto-generated AlbumControllerTest->testAddNewAlbum()
		//$this->markTestIncomplete ( "addNewAlbum test not implemented" );
		$this->AlbumController->addNewAlbum("");
		$condition=$this->AlbumController->_message=="Failed to create a new album";
		$this->assertTrue($condition);
	}
	/**
	 * Tests AlbumController->getnewalbumHTML()
	 */
	public function testGetnewalbumHTML() {
		// TODO Auto-generated AlbumControllerTest->testGetnewalbumHTML()
		//$this->markTestIncomplete ( "getnewalbumHTML test not implemented" );
		
		$str=$this->AlbumController->getnewalbumHTML();
		$condition=$str!="";
		$this->assertTrue($condition);
	}
	
	/**
	 * Tests AlbumController->getMessage()
	 */
	public function testGetMessage() {
		// TODO Auto-generated AlbumControllerTest->testGetMessage()
		//$this->markTestIncomplete ( "getMessage test not implemented" );
		$this->AlbumController->setMessage("ok!");
		$this->AlbumController->setUrl("index.php");
		$this->AlbumController->getMessage();
		$str="<head>
						<title>My Pictrue</title>
						<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />
						<link rel=\"stylesheet\" type=\"text/css\" href=\"css/forget.css\" />
						<script type\"text/javascript\">
						window.setTimeout(\"window.location.href='index.php'\",4*1000);
						</script>
				</head>
					<body>
					<table width='100%' align=center><tr><td align=center>
					  ok!<br>
					 <input type=\"button\" value=\"<<back\" name=\"back\" onClick=\"window.location.href='index.php'\">
					 </td></tr></table>
					 </body>";
	}

}

