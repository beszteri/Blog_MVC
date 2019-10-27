<?php
class postsController extends Controller
{
    function index()
    {
        require(ROOT . 'Models/Post.php');
        $posts = new Post();
        //melyik oldalon vagyunk jelenleg
        if(!isset($_GET['page'])) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }

        //beállítja az sql LIMIT kezdőszámát
        $thisPageFirstResult = ($page - 1) * 10;
        $d['posts'] = $posts->showLimitedPost($thisPageFirstResult, 10);
        $allPosts = $posts->showAllPosts();
        $numberOfAllPosts['numberOfAllPosts'] = count($allPosts);

        $this->setNumberOfAllPosts($numberOfAllPosts);
        $this->set($d);
        $this->render("index");
    }

    function create()
    {
        if (isset($_POST["title"]))
        {
            require(ROOT . 'Models/Post.php');
            $posts= new Post();
            $posts->create($_POST["title"], $_POST["description"]);
            header("Location: " . WEBROOT . "posts/index");
        }
        $this->render("create");
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
