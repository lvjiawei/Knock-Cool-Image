<?php 
//输出错误信息
error_reporting(E_ALL|E_STRICT); 
//设置时区
date_default_timezone_set('Asia/Shanghai'); 
//PATH_SEPARATOR 是分号 ‘;’ 分隔符,
set_include_path('.'. PATH_SEPARATOR . './library' 
   . PATH_SEPARATOR . './application/models/'
   . PATH_SEPARATOR . './application/controllers/'  
   . PATH_SEPARATOR . './application/views/'  
   . PATH_SEPARATOR . get_include_path()); 
//加载 zend 主文件,这个文件中有静态类可以供我们调用,并使用这个类加载其他的类
include "Zend/Loader.php"; 
//加载前端控制类
Zend_Loader::loadClass('Zend_Controller_Front'); 
//加载zend config配置文件类
Zend_Loader::loadClass('Zend_Config_Ini'); 
//加载zend register注册函数类
Zend_Loader::loadClass('Zend_Registry'); 

//加载Zend_DB的实例并使用静态函数Zend_Db_Table::setDefaultAdapter()来注册我们的配置信息，
//zend/db  帮我们处理对数据库的操作
Zend_Loader::loadClass('Zend_Db'); 
//加载zend/db/table 类
Zend_Loader::loadClass('Zend_Db_Table'); 
//加载zend的分页助手类
Zend_Loader::loadClass('Zend_Paginator'); 
Zend_Loader::loadClass('Zend_Paginator_Adapter_Array');
//加载zend的会话类
//Zend_Loader::loadClass('Zend_Session');
//Zend_Loader::loadClass('Zend_Session_Namespace');
//加载zend的表单类
Zend_Loader::loadClass('Zend_Form');

//将我们定义的配置文件,载入zend的config中,设为全局 ,不可修改
$config = new Zend_Config_Ini('./application/config.ini', 'general');

//获得注册函数对象,将我们的配置文件加载到这个单例的注册对象中,这个注册对象是全局的
$registry = Zend_Registry::getInstance(); 

//使用zend_db工厂解析数据库连接的配置信息
$database=Zend_Db::factory($config->database->adapter,$config->database->config->toArray());
//或者简单的使用它,$db = Zend_Db::factory($config->database); Zend_Db factory知道如何翻译它

//设置数据库 字符集
$database->query("set names {$config->charset}");

//将数据库信息交给适配器
Zend_Db_Table::setDefaultAdapter($database);

//开启全局会话
session_start();
//Zend_Session::start();
//$session=new Zend_Session_Namespace('user');
//开启全局变量registry，因为原有的Zend_Registry没法用。
//require_once(realpath("./")."/application/models/actions/registry.php");
//$global_registry=new registry();
//设定权限
$rights=array('admin'=>9,'super_user'=>8,'user'=>7,'delete'=>6,'write'=>5,'excute'=>4,'comment'=>3,'guest'=>2,'read'=>1);

//获得前端控制器的单例
$frontController = Zend_Controller_Front::getInstance(); 
//是否抛出前段控制器异常信息
$frontController->throwExceptions(true); 
//设置控制器类的主路径
$frontController->setControllerDirectory('./application/controllers'); 

//设置默认的控制器
$frontController->setDefaultControllerName('Index'); 

//设置默认的action
$frontController->setDefaultAction('index'); 
      					
// run! 
//运行请求分发
$frontController->dispatch(); 
