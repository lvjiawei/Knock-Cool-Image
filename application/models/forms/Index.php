<?php
class Application_Form_Index extends Zend_Form
{
	public function init()
	{

	}
    public function _initForget()
    {
		$this->reset();
        // Set the method for the display form to POST
        $this->setMethod('post');
		$this->setAction("/Knock-Cool-Image/index/forget");

		// Add an email element
        $this->addElement('text', 'email', array(
            'label'      => 'Your email address:',
            'required'   => true,
            'filters'    => array('StringTrim'),
            'validators' => array(
                'EmailAddress',
            )
        ));
 
        // Add the comment element
/*        $this->addElement('textarea', 'comment', array(
            'label'      => 'Please Comment:',
            'required'   => true,
            'validators' => array(
                array('validator' => 'StringLength', 'options' => array(0, 20))
                )
        ));
*/ 
        // Add a captcha
/*        $this->addElement('captcha', 'captcha', array(
            'label'      => 'Please enter the 5 letters displayed below:',
            'required'   => true,
            'captcha'    => array(
                'captcha' => 'Figlet',
                'wordLen' => 5,
                'timeout' => 300
            )
        ));
*/
        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Next',
        ));
 
        // And finally add some CSRF protection
/*        $this->addElement('hash', 'csrf', array(
            'ignore' => true,
        ));
*/
    }
	public function setNull()
	{
		$this->reset();
	}
	public function getAnswer($data)
	{
		$this->reset();
		$this->setMethod('post');
		$this->setAction("/Knock-Cool-Image/index/forget");		
		$this->addElement('text','answer',array(
			'label'		=> 'Your answer:',
			'required'  => true,
			'validators'=> array(
			'/^[A-Za-z0-9]/i',
			)
		));
		$this->addElement('hidden','mail',array(
		'value'=>$data,
		));
		$this->addElement('submit','submit',array(
			'ignore'  => true,  
			'label'   => 'Next',
		));
	}

}
?>