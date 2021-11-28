<?php
class App
{
    //http://localhost/EBookStore/Home/SayHi/1/2/3
    protected $controller="Home";
    protected $action="Show";
    protected $params=[];

    function __construct()
    {
        $arr = $this->UrlProcess();
        //echo gettype($arr);
        if(empty($arr) || (!empty($arr)&&count($arr)!=2))
        {
            header("Location: http://localhost/READAWORLD/Home/Show");
            //die();
        }
        //avoid warning "Trying to access array offset on value of type null"
        elseif(!empty($arr) && count($arr)==2 )
        {
            //echo count($arr);
            //Handling Controller
            if(file_exists("./mvc/controllers/".$arr[0].".php"))
            {
                $this->controller = $arr[0];
            }
            unset($arr[0]);
            require_once "./mvc/controllers/".$this->controller.".php";
            $this->controller = new $this->controller;

            //Handling Action
            if(isset($arr[1]))
            {
                if(method_exists($this->controller, $arr[1]))
                {
                    $this->action = $arr[1];
                }
                unset($arr[1]);
            }

            //Handling Params
            //$this->params = $arr?array_values($arr):[];
        
            $this->params = $this->getParams();
        }
        else //default value of $this
        {
            require_once "./mvc/controllers/".$this->controller.".php";
            $this->controller = new $this->controller;
        }

        call_user_func_array([$this->controller, $this->action], $this->params);

    }

    function UrlProcess()
    {
        //$_GET['url'] not return query components
        if(isset($_GET["url"]))
        {
            $arr = explode("/", filter_var(trim($_GET["url"], "/")));
            return $arr;
        }

    }

    function getParams()
    {
        $query = parse_url($_SERVER["REQUEST_URI"], PHP_URL_QUERY);
        parse_str($query, $params);
        //print_r($params);
        
        return $params;
    }
}

?>