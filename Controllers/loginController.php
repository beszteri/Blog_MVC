<?php
class loginController extends Controller
{
    function login()
    {
        $this->render("login");
        require(ROOT . 'Models/User.php');
        $user = new User();

        if(!empty($_POST['email']) && !empty($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $LoggedInUser = $user->validateUser($email, $password);

            if( ($LoggedInUser != null)){
                $_SESSION['isLoggedIn'] = "true";
                
                header("Location: " . WEBROOT . "posts/index/1");
                
            }else{
                $_SESSION['loginError'] = true;
                header("Location: " . WEBROOT . "login/login");
            }
        }
    }
}