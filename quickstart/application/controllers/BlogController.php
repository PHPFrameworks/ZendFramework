<?php

class BlogController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $mapper = new Application_Model_BlogMapper();
        $this->view->entries = $mapper->fetchAll();
    }

    public function insertAction()
    {
        $request = $this->getRequest();
        $form    = new Application_Form_Blog();
        if ($this->getRequest()->isPost()) {
            if ($form->isValid($request->getPost())) {
                $blog = new Application_Model_Blog($form->getValues());
                $mapper  = new Application_Model_BlogMapper();
                $mapper->save($blog);
                return $this->_helper->redirector('index');
            }
        }
 
        $this->view->form = $form;
    }


}



