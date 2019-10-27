<?php

class Router
{

    static public function parse($url, $request)
    {
        $url = trim($url);

        if ($url == "/blogmvc/")
        {
            $request->controller = "posts";
            $request->action = "index";
            $request->params = [];
        }
        else
        {
            //3 részre bontjuk az url-t
            //controller, function, paraméter
            $explode_url = explode('/', $url);
            $explode_url = array_slice($explode_url, 2);
            $request->controller = $explode_url[0];
            $request->action = $explode_url[1];
            $request->params = array_slice($explode_url, 2);
        }

    }
}
