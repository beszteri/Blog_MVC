<?php
class postsController extends Controller
{
    function index($params)
    {
        require(ROOT . 'Models/Post.php');
        require(ROOT . 'Core/Pagination.php');
        $posts = new Post();
        $page = new Pagination();
        

        $data = $posts->showAllPosts();
        $numbers = $page->Paginate($data,10, $params);
        $result = $page->fetchResult();
        
        $d['posts'] = $result;
        $d['numbers'] = $numbers;
        $this->set($d);
        $this->render("index");
     
    }

    function create()
    {
        $this->render("create");
        if (isset($_POST["title"]))
        {
            require(ROOT . 'Models/Post.php');
            $posts= new Post();
            $posts->create($_POST["title"], $_POST["description"]);
            header("Location: " . WEBROOT . "posts/index");
        }
    }

    function edit($id)
    {
        require(ROOT . 'Models/Post.php');
        $posts= new Post();
        $d["post"] = $posts->showPost($id);
        $this->set($d);
        $this->render("edit");
        if (isset($_POST["title"]))
        {
            $posts->edit($id, $_POST["title"], $_POST["description"]);
            header("Location: " . WEBROOT . "posts/index");
        }
    }

    function delete($id)
    {
        require(ROOT . 'Models/Post.php');
        $posts = new Post();
        $posts->delete($id);
        header("Location: " . WEBROOT . "posts/index");
    }
}
