<?php


class Home extends Controller
{


    /**
     * Home constructor.
     */
    public function __construct($controller, $action)
    {
        parent::__construct($controller, $action);
    }

    public function indexAction(){
        die('index acrtion');
    }
}