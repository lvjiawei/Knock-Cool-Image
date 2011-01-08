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
			   'label' => '�����',
			   'value' => $name
			 ))
			 ->addElement('hidden','offset',array(
			   'value' => $offset))
			 ->addElement('submint','submit',array(
			   'ignore' => true,
			   'label'  => '����',
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
			       'label'  => '�½�',
				 ));
		else
			$this->setMathod('post')
				 ->setAction("Knock-Cool-Image/user/tophotos")
				 ->addElement('hidden','album_id',array(
				   'value' => $aid,
				   ))
				 ->addElement('submit','submit',array(
				   'ignore' => true,
				   'label'  => '����'));
	}
	
	public function nextPage()
	{
		$this->reset();
        $this->setMethod('post');
		$this->setAction("/Knock-Cool-Image/user/nextpage");
		$this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => '��һҳ',
        ));
	}
	
	public function prePage()
	{
		$this->reset();
        $this->setMethod('post');
		$this->setAction("/Knock-Cool-Image/user/prepage");
		$this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => '��һҳ',
        ));
	}
}
?>