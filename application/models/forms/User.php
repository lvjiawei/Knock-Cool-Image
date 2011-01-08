<?php
class Application_Form_User extends Zend_Form
{
	
	public function init()
	{
	}
	
	public function setNull()
	{
		$this->reset();
	}
	
	public function albumname($name=NULL,$offset=NULL)
	{
		$this->reset();
		if($offset!=NULL)
		$this->setMathod('post')
			 ->setAction("Knock-Cool-Image/user/addalbumname")
			 ->addElement('text','album_name',array(
			   'label' => '相册名',
			   'value' => $name
			 ))
			 ->addElement('hidden','offset',array(
			   'value' => $offset))
			 ->addElement('submint','submit',array(
			   'ignore' => true,
			   'label'  => '保存',
			 ));
	}
	
	public function _initAlbum($offset,$aid=NULL)
	{
		$this->reset();
		if($aid==NULL||$aid=='')
			$this->setMathod("post")
				 ->setAction("Knock-Cool-Image/user/addalbum")
				 ->addElement('submit','submit',array(
				   'ignore' => true,
			       'label'  => '新建',
				 ));
		else
			$this->setMathod('post')
				 ->setAction("Knock-Cool-Image/user/tophotos")
				 ->addElement('hidden','album_id',array(
				   'value' => $aid,
				   ))
				 ->addElement('submit','submit',array(
				   'ignore' => true,
				   'label'  => '进入'));
	}
	
	public function nextPage()
	{
		$this->reset();
        $this->setMethod('post');
		$this->setAction("/Knock-Cool-Image/user/nextpage");
		$this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => '下一页',
        ));
	}
	
	public function prePage()
	{
		$this->reset();
        $this->setMethod('post');
		$this->setAction("/Knock-Cool-Image/user/prepage");
		$this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => '上一页',
        ));
	}
}
?>