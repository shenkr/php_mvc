<?php

class Router
{

    static public function parse($url, $request)
    {
        $url = trim($url);
        
        if($url == "/")
        {
            $request->controller = "tasks";
            $request->action = "index";
            $request->params = [];
        }
        else
        {
            $explode_url = explode('/', $url);
            $explode_url = array_slice($explode_url, 1);

            $file = ROOT . 'Controllers/' . $explode_url[0] . 'Controller.php';

            if(file_exists($file))
            {
                $request->controller = $explode_url[0];
                $request->action = $explode_url[1];

                if($request->action == '') $request->action = "index";
                
                $request->params = array_slice($explode_url, 2);
            }
            else
            {
                $request->controller = "pages";
                $request->action = "error";
                $request->params = [];
            }
        }

    }
}
?>