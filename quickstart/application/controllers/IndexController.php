<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
    }

    public function indexAction()
    {
        $blog = new Application_Model_BlogMapper();
        $entries = $blog->fetchAll();
    }


}

