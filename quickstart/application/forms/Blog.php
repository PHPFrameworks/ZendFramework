<?php

class Application_Form_Blog extends Zend_Form
{

    public function init()
    {
        $this->setMethod('post');
 
        // Add an email element
        $this->addElement('text', 'title', array(
            'label'      => 'Title:',
            'required'   => true,
            'filters'    => array('StringTrim'),
        ));
 
        // Add the comment element
        $this->addElement('textarea', 'body', array(
            'label'      => 'Body:',
            'required'   => true,
        ));
        // Add a captcha
//        $this->addElement('captcha', 'captcha', array(
//            'label'      => 'Please enter the 5 letters displayed below:',
//            'required'   => true,
//            'captcha'    => array(
//                'captcha' => 'Figlet',
//                'wordLen' => 5,
//                'timeout' => 300
//            )
//        ));
        // Add the submit button
        $this->addElement('submit', 'submit', array(
            'ignore'   => true,
            'label'    => 'Sign Guestbook',
        ));
//        // And finally add some CSRF protection
//        $this->addElement('hash', 'csrf', array(
//            'ignore' => true,
//        ));
    }


}

