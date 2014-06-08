<?php

class StoryController extends Zend_Controller_Action
{

    private $sess = null;

    private $user_data = null;

    public function init()
    {
        $this->user_data = Zend_Auth::getInstance()->getStorage()->read();
        $this->sess = new Zend_Session_Namespace("Zend_Auth");
        $authorization = Zend_Auth::getInstance();
        $action = $this->getRequest()->getActionName();
        $_SESSION['action'] = $action;
        if ($this->user_data->admin == 'false'){
           $this->redirect("/user/"); 
        }
        else if (!$authorization->hasIdentity()) {
            $this->redirect("/user/login");
        }
    }

    public function indexAction()
    {
        // action body
    }

    public function addquizAction()
    {
        $addQuizForm = new Application_Form_Addquiz();
        $this->view->addQuizForm = $addQuizForm;
        if ($this->getRequest()->isPost()) {
            print_r ($this->getRequest()->getParams());
            if ($addQuizForm->isValid($this->getRequest()->getParams())) {
                //$addQuizForm->ans1_1->receive();
                /*$addQuizForm->ans1_2->receive();
                $addQuizForm->ans2_1->receive();
                $addQuizForm->ans2_2->receive();*/
                //$story = new Application_Model_Quiz();
                //$story->addQuiz($this->getRequest()->getParams());
                echo "valid";
            }
            else{
                echo "invalid";
            }
        }
        else{
            echo "get";
        }
    }


}