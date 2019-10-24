<?php


class View
{

    protected $_head, $_body, $_siteTitle = SITE_TITLE, $_outputBuffer, $_layout = DEFAULT_LAYOUT;

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

    public function start($type){
        $this->_outputBuffer = $type;
        ob_start();
    }

    public function end(){
        if($this->_outputBuffer == 'head'){
            $this->_head = ob_get_clean();
        }elseif ($this->_outputBuffer == 'body') {
            $this->_body = ob_get_clean();
        }else{
            die('You must first run the start method');
        }
    }

    /**
     * @return string
     */
    public function getSiteTitle()
    {
        return $this->_siteTitle;
    }


    public function setSiteTitle($title){
        $this->_siteTitle = $title;
    }

    public function setLayout($path){
        $this->_layout = $path;
    }

}