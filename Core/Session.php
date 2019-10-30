<?php

class Session{

public static function init(){
    if(!isset($_SESSION)) 
        { 
            session_start(); 
        } 
}

public static function checkSession(){
    if(isset($_SESSION["isLoggedIn"]) && $_SESSION["isLoggedIn"] == "true"){
        return true;
    }
    return false;
}
public static function close(){
    if(!isset($_SESSION)) 
{ 
    session_start(); 
} 
$_SESSION = array();
session_destroy();
header("Location: " . WEBROOT . "posts/index/1");
}

public static function checkError(){
    if(isset($_SESSION["loginError"]) && $_SESSION["loginError"] == true){
        return true;
    }
    return false;
}
}