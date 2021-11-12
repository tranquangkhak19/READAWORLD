<?php
class App{
    //http://localhost/EBookStore/Home/SayHi/1/2/3
    protected $controller="Home";
    protected $action="SayHi";
    protected $params=[];

    function __construct(){
       
        $arr = $this->UrlProcess();
        
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

        call_user_func_array([$this->controller, $this->action], $this->params);

    }

    function UrlProcess()
    {
        //$_GET['url'] not return query components
        if(isset($_GET["url"]))
        {
            return explode("/", filter_var(trim($_GET["url"], "/")));
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