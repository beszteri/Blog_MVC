<?php


class View
{

    protected $_head, $_body, $_siteTitle, $outputBuffer, $_layout = DEFAULT_LAYOUT;

    /**
     * View constructor.
     */
    public function __construct()
    {
    }

    public function render($viewName){
        $viewArray = explode('/', $viewName);
        $viewString = implode(DS, $viewArray);
        if(file_exists(ROOT . DS . 'app' . DS . 'views' . $viewString . '.php')) {
            include(ROOT . DS . 'app' . DS . 'views' . $viewString . '.php');
            include(ROOT . DS . 'app' . DS . 'views' . 'layouts' . DS . $this->_layout . '.php');
        } else {
            die('View does not exist');
        }
    }

    public function content($type){
        if($type == 'head') {
            return $this->_head;
        } elseif ($type == 'body'){
            return $this->_body;
        }
        return false;
    }

}