<?php


class Controller extends Application
{

    protected $_controller;
    protected $_action;
    public $view;

    /**
     * Controller constructor.
     * @param $_controller
     * @param $_action
     */
    public function __construct($_controller, $_action)
    {
        parent::__construct();
        $this->_controller = $_controller;
        $this->_action = $_action;
        $this->view = new View();
    }



}