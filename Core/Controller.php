<?php
class Controller
{
    public $vars = [];
    public $layout = "default";
    public $numberOfAllPosts = [];

    public function setNumberOfAllPosts($numberOfAllPosts)
    {
        $this->numberOfAllPosts = $numberOfAllPosts;
    }

    function set($d)
    {
        $this->vars = array_merge($this->vars, $d);
    }

    function render($filename)
    {
        //exctract:
        //This function uses array keys as variable names and values as variable values.
        //For each element it will create a variable in the current symbol table.
        extract($this->vars);
        extract($this->numberOfAllPosts);
        ob_start();
        //??
        require(ROOT . "Views/" . ucfirst(str_replace('Controller', '',
                get_class($this))) . '/' . $filename . '.php');
        $content_for_layout = ob_get_clean();

        if ($this->layout == false)
        {
            $content_for_layout;
        }
        else
        {
            require(ROOT . "Views/Layouts/" . $this->layout . '.php');
        }
    }

}
