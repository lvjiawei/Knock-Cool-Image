<?php 
require_once(realpath('./').'/application/models/forms/Index.php');
 class UserController extends Zend_Controller_Action{ 
 	//init函数在控制器初始化时执行，是最先执行的方法
	function init(){
			if(!isset($_SESSION['user'])): $this->_redirect("index/index"); endif;
			Zend_Loader::loadClass('User');							//加载模型
			Zend_Loader::loadClass('Album');
			$this->view->baseUrl = $this->_request->getBaseUrl();	//获得系统根路径
			$this->view->title="User manager";							//设置视图标题
			$this->view->firstphoto=$this->view->baseUrl."/public/images/ablum.jpg";
			$this->view->secondphoto=$this->view->baseUrl."/public/images/ablum.jpg";
			$this->view->thirdphoto=$this->view->baseUrl."/public/images/ablum.jpg";
			$this->view->avatar=$this->view->baseUrl."/public/images/avatar.gif";
			require_once(realpath("./")."/application/models/actions/UserActions.php");
			$_SESSION['user']['album']=new UserActions();
	} 	

	function indexAction(){
		if(isset($_SESSION['user'])&&$_SESSION['user']['avatar']!="")$this->view->avatar=$_SESSION['user']['avatar'];
		$albums=$_SESSION['user']['album'];
		$albums->setUser($_SESSION['uid']);
		$count=$albums->getCount();
		if($count!=null){
			if($count<3):
			$temp=$albums->getThreeAlbums(0);
			endif;
		}
	}
	
	function exitAction(){
		if($this->_getParam('action')=="exit"):
			unset($_SESSION['user']);
			$this->_redirect("index/index");
		endif;
	}
	function managerAction()
	{
		if(isset($_POST['action'])):
			switch($this->_getParam('action')){
			case 'manager':
				$this->render("user/manager",null,true);
				break;
			case 'modify':
				$this->render("user/index",null,true);
				break;
			default:
				$this->render("user/index",null,true);
				break;
			}
		endif;
	}
	function nextpageAction()
	{
		$this->render("user/index",null,true);
	}
	function prepageAction()
	{
		$this->render("user/index",null,true);
	}
	function addalbumAction()
	{
	}
	function addalbumnameAction()
	{
	}
	function tophotosAction()
	{
		$_SESSION['user']['album_id']=$this->_getParam('album_id');
		$this->_redirect('album/index');
	}
}
?>