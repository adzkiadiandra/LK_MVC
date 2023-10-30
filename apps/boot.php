<?php
require "config.php";
require "controller.php";
require "database.php";
require "model.php";
class Boot extends controller{
    protected $controller = 'Index';
    protected $action = 'index';
    protected $params = [];
    public function __construct(){

        $url = $_GET['r'];
        $url = $this->__parseUrl($url);

        if(file_exists('apps/controllers/'. $url[0].'.php')){
            $this->controller = $url[0];
            unset($url[0]);
        }
        require('apps/controllers/'.$this->controller.'.php');
        $this->controller = new $this->controller;

        if (isset($url[1])){
            if(method_exists($this->controller,$url[1])){
                $this->action=$url[1];
                unset($url[1]);
            }

        }

        if(!empty($url)){
            $this->params = array_values($url);
        }
       call_user_func_array ([$this->controller, $this->action], $this->params);
}
public function __parseUrl($url){
    if (isset ($_GET['r'])){
        $url = rtrim($_GET['r'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
    }
    return $url;
}
}
