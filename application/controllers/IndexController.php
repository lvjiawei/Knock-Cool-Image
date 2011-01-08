<?php 
require_once(realpath('./').'/application/models/forms/Index.php');
//require(realpath('./').'/application/actions/registry.php');
class IndexController extends Zend_Controller_Action{ 
	//public myNamespace = new Zend_Session_Namespace('Zend_Auth');
	function init(){			
			Zend_Loader::loadClass('User');						//加载User模型
			Zend_Loader::loadClass('Admin');
//			Zend_Loader::loadClass('Zend_Mail');
			$this->view->baseUrl = $this->_request->getBaseUrl();	//获得系统根路径
			$this->view->title="My Picture";							//设置视图标题
			$form = new Application_Form_Index();
/*			$form->setMethod('post');
			$form->addElement('text','email',array(
				'label'     => 'Your email address:',
				'required'  => true,
				'filters'   => array('StringTrim'),
				'validators'=> array(
				'EmailAddress',
				)
			));
			$form->addElement('submit','submit',array(
				'ignore'  => true,  
				'label'   => 'Next',
			));
*/
			$this->view->form=$form;
	} 	
	function indexAction(){
		if(isset($_SESSION['user'])):
			$this->_redirect("user/index");
		endif;
		if(isset($_SESSION['admin'])):
			$this->_redirect("admin/index");
		endif;
		if(isset($_POST['action'])):
			$action = trim($_POST['action']);
			switch($action)
			{
				case 'login':
					$this->render("index/login",null,true);
					break;
				case 'forget':
					$this->view->form->_initForget();
					$this->view->passquestion="Find Back Your Password";
					$this->render("index/forget",null,true);
					break;
				case 'signup':
					$this->render("index/signup",null,true);
					break;
				default:
					break;
			}
		endif;
	}
	function loginAction(){
		//取得用户姓名参数
		$user_email=trim($this->_getParam("email"));
		//取得用户密码参数
		$user_password=trim($this->_getParam("pw"));
		
		if($user_email=="" || $user_password==""){
			$this->view->error="用户名或密码不能为空";
			$this->render("index/index",null,true);
		}else{
			$user=new User();
			//echo "=============";
			$user=$user->fetchRow("e_mail= '".$user_email."' and password= '".$user_password."'");
				if(empty($user)){
					$admin=new Admin();
					$admin=$admin->fetchRow("admin_name= '".$user_email."' and password= '".$user_password."'");
					if(empty($admin)){
						$this->view->error="错误的用户名和密码";
						$this->render("index/index",null,true);
					}else{
						//unset($_SESSION);
						$this->_forward("index","Admin");
						$_SESSION['admin']=$admin;
						//$session->admin=$admin;
					}
				}else{
					//unset($_SESSION);
					$this->view->nickname=$user->nickname; 
					$_SESSION['user']=array(
						'email' => $user->e_mail,
						'right' => $user->action_right,
						'avatar'=> $user->avatar,
						'uid'   => $user->uid,
					);
					$this->_redirect("user/index");
					//$session->user=$user;
				}
		}
	}	
	/*function mailto($email,$who,$subject,$body)
	{
		require_once(realpath('./').'/library/Mailer/class.phpmailer.php');
		
		$mail = new PHPMailer();
		$address = $email;
		$mail->IsSMTP(); 
		$mail->Host = "mail.sohu.com"; 
		$mail->SMTPAuth = true; 
		$mail->Username = "taptap@sohu.com"; 
		$mail->Password = "asdf1234"; 
		$mail->From = "taptap@sohu.com"; 
		$mail->FromName = "Knock-Cool-Image";
		$mail->AddAddress("$address", "".$who."");
		$mail->Subject = "".$subject."";
		$mail->Body = "".$body.""; 
		$mail->AltBody = "Welcome to Knock-Cool-Image!";
		return $mail->send();
	}*/
	function signupAction(){
		//Zend_Loader::loadClass("Zend_Validate_EmailAddress");
		$user_email=trim($this->_getParam("email"));
		$user_nickname=trim($this->_getParam("nickname"));
		$user_password=trim($this->_getParam("password"));
		$user_pwquestion=trim($this->_getParam("passquestion"));
		$user_pwanswer=trim($this->_getParam("passanswer"));
		
		require_once(realpath("./")."/application/models/actions/Mailer.php");
		$validator=mailto($user_email,$user_nickname,'welcome to Knock-Cool-Image','You will get most fun in our website!');//set $email,$who,$subject,$body
		//require_once 'Zend/Validate/EmailAddress.php';

		//$validator = new Zend_Validate_EmailAddress();

		if ($validator) {
    		$user_signup=new User();
    		$test=$user_signup->fetchRow("e_mail='".$user_email."'");
    		if(empty($test)){
	    		$data=array(
	    		'e_mail'       => trim(''.$user_email.''),
	    		'nickname'     => trim(''.$user_nickname.''),
	    		'password'     => trim(''.$user_password.''),
	    		'pwquestion'   => trim(''.$user_pwquestion.''),
	    		'pwanswer'     => trim(''.$user_pwanswer.''),
				'action_right' => 7,
	    		);
	    		$id=$user_signup->insert($data);
	    		$this->view->error="";
	    		$this->view->nickname=$user_nickname;
	    		$this->view->email=$user_email;
	    		$this->_forward("index","User");
    		}else{
    			$this->view->error="ERROR : The Email is existed!";
    			$this->render('index/index',null,true);
    		}
		} else {
    		// email 无效; 打印原因
    		$this->view->error="Failed to sign up:E-Mail address is not correct"; 
		}	
	}
	
	function forgetAction()
	{
//		$form1=new Zend_Form();		
		$request=$this->getRequest();
		if(isset($_POST['email'])||isset($_POST['answer']))//$this->getRequest()->isPost()){
		{	if(isset($_POST['email']))//&&$form1->isValid($request->getPost()))
			{
				//$form->reset();
				$userinfo=new User();
//				$db = $userinfo->getAdapter();

//				$where = $db->quoteInto('e_mail = ?', '$_POST[\'email\']');

				$row = $userinfo->fetchRow("e_mail ='".$_POST['email']."'");//$where);
				if(empty($row)){
					$this->view->error="错误的邮箱地址";
					$this->render("index/index",null,true);
				}else{
					//$this->view->control=false;
					//$registry=Zend_Registry::getInstance();                               Zend_Registry无效   注销
					Zend_Registry::set('password',$row->password);
					Zend_Registry::set('passanswer',$row->pwanswer);
					$this->view->passquestion=$row->pwquestion;
					$this->view->form->getAnswer($_POST['email']);
					//$myNamespace->email=trim($_POST['email']);
				}
				/*$form->addElement('text','answer',array(
					'label'		=> 'Your answer:',
					'required'  => true,
					'validators'=> array(
					'password',
					)
				));
			$form1->addElement('submit','submit',array(
				'ignore'  => true,  
				'label'   => 'Next',
			));*/
				
			}else{
				if(isset($_POST['answer'])):
					$userinfo=new User();
					$test=$userinfo->fetchRow("e_mail ='".$_POST['mail']."' and pwanswer ='".trim($_POST['answer'])."'");
					//$registry = Zend_Registry::getInstance();
					//if(Zend_Registry::isRegistered('password')&&Zend_Registry::isRegistered('passanswer')){
					//$password=Zend_Registry::get('password');
					//$passanswer=Zend_Registry::get('passanswer');
					if(empty($test)){//$passanswer!=trim($_POST['answer']))
					
						$this->view->error="ERROR:Your Passanser is inCorrect";
						$this->view->init();
						//unset($myNamespace->password);
						//unset($myNamespace->email);
						//unset($this->view->control);
						//unset($_POST['answer']);
						//Zend_Registry::_unsetInstance();
						
						$this->render("index/index",null,true);
					}else{
						require_once(realpath("./")."/application/models/actions/Mailer.php");
						mailto($test->e_mail,$test->nickname,'welcome to Knock-Cool-Image','here is your password:'.$test->password.'
						You should better change your password');
						$this->view->error="Your password is send to your E-mail";
						$this->render("index/index",null,true);
					//if()//$passanswer==trim($_POST['answer'])):
//						$this->view->passquestion=$test->password;
//						$this->view->form->init();
						//$this->temp=array();
						//$this->view->control=true;
						//Zend_Registry::_unsetInstance();
					//endif;
					}
					endif;
				}//else 
					//$this->view->passquestion="Error!";
				
			
//			$this->view->form=$form;
		}else{
			$this->view->form->_initForget();
		}		
	}
}
?>