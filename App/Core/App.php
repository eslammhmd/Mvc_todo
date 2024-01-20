<?php
//default controller =>  represent the first controller in app

class App
{
    protected $controller = 'HomeController' ;
    protected $method = 'index';
    protected $params = [];

    public function __construct()
    {
        $this->prepareURL($_SERVER['REQUEST_URI']);
        $this->render();
        
    }
    
    private function prepareUrl($url)
    {
        $url = trim($url,"/");
        if(!empty($url))
        {
            $url = explode('/',$url);
            // define controller 
            $this->controller = isset($url[0]) ? ucwords($url[0])."Controller":$this->controller;
            // define action 
            $this->method = isset($url[1]) ? $url[1]: $this->method;
            // remove my component [controller , method] from url
            unset($url[0],$url[1]);
            
            // // store params if exists
            $this->params = !empty($url) ? array_values($url) : [];
        }
    }

    //run controller
    private function render()
    {
        
        // check if controller method is exist ?
        if(class_exists($this->controller))
        {
            $controller = new $this->controller;   //instantiate an obj
            // // check if method is exist
            if(method_exists($controller,$this->method))
            {
                 call_user_func_array([$controller , $this->method] , $this->params);
            }
            else 
            {
                new View('error');
                // throw new Exception('Controller method does not exist.');
            }
        }
        
        else 
        {
            // new View('error');
            echo "not found yet";
            // throw new Exception('Controller does not exist.');
        }  
        
    }
}