<?php 
//���������Ϣ
error_reporting(E_ALL|E_STRICT); 
//����ʱ��
date_default_timezone_set('Asia/Shanghai'); 
//PATH_SEPARATOR �Ƿֺ� ��;�� �ָ���,
set_include_path('.'. PATH_SEPARATOR . './library' 
   . PATH_SEPARATOR . './application/models/'
   . PATH_SEPARATOR . './application/controllers/'  
   . PATH_SEPARATOR . './application/views/'  
   . PATH_SEPARATOR . get_include_path()); 
//���� zend ���ļ�,����ļ����о�̬����Թ����ǵ���,��ʹ������������������
include "Zend/Loader.php"; 
//����ǰ�˿�����
Zend_Loader::loadClass('Zend_Controller_Front'); 
//����zend config�����ļ���
Zend_Loader::loadClass('Zend_Config_Ini'); 
//����zend registerע�ắ����
Zend_Loader::loadClass('Zend_Registry'); 

//����Zend_DB��ʵ����ʹ�þ�̬����Zend_Db_Table::setDefaultAdapter()��ע�����ǵ�������Ϣ��
//zend/db  �����Ǵ�������ݿ�Ĳ���
Zend_Loader::loadClass('Zend_Db'); 
//����zend/db/table ��
Zend_Loader::loadClass('Zend_Db_Table'); 
//����zend�ķ�ҳ������
Zend_Loader::loadClass('Zend_Paginator'); 
Zend_Loader::loadClass('Zend_Paginator_Adapter_Array');
//����zend�ĻỰ��
//Zend_Loader::loadClass('Zend_Session');
//Zend_Loader::loadClass('Zend_Session_Namespace');
//����zend�ı���
Zend_Loader::loadClass('Zend_Form');

//�����Ƕ���������ļ�,����zend��config��,��Ϊȫ�� ,�����޸�
$config = new Zend_Config_Ini('./application/config.ini', 'general');

//���ע�ắ������,�����ǵ������ļ����ص����������ע�������,���ע�������ȫ�ֵ�
$registry = Zend_Registry::getInstance(); 

//ʹ��zend_db�����������ݿ����ӵ�������Ϣ
$database=Zend_Db::factory($config->database->adapter,$config->database->config->toArray());
//���߼򵥵�ʹ����,$db = Zend_Db::factory($config->database); Zend_Db factory֪����η�����

//�������ݿ� �ַ���
$database->query("set names {$config->charset}");

//�����ݿ���Ϣ����������
Zend_Db_Table::setDefaultAdapter($database);

//����ȫ�ֻỰ
session_start();
//Zend_Session::start();
//$session=new Zend_Session_Namespace('user');
//����ȫ�ֱ���registry����Ϊԭ�е�Zend_Registryû���á�
//require_once(realpath("./")."/application/models/actions/registry.php");
//$global_registry=new registry();
//�趨Ȩ��
$rights=array('admin'=>9,'super_user'=>8,'user'=>7,'delete'=>6,'write'=>5,'excute'=>4,'comment'=>3,'guest'=>2,'read'=>1);

//���ǰ�˿������ĵ���
$frontController = Zend_Controller_Front::getInstance(); 
//�Ƿ��׳�ǰ�ο������쳣��Ϣ
$frontController->throwExceptions(true); 
//���ÿ����������·��
$frontController->setControllerDirectory('./application/controllers'); 

//����Ĭ�ϵĿ�����
$frontController->setDefaultControllerName('Index'); 

//����Ĭ�ϵ�action
$frontController->setDefaultAction('index'); 
      					
// run! 
//��������ַ�
$frontController->dispatch(); 
