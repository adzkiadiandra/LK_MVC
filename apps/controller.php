<?php

class controller{

    public function loadmodel($model){
       if(file_exists('apps/models/'.$model.'.php')){
        require_once('apps/models/'.$model.'.php');
        $model = new $model;
       } 
       return $model;
    }
   
    public function loadView($view, $data=null){
        if (file_exists('apps/views/'.$view.',php')) {
            require_once('apps/Vies/'.$view.'.php');
        }
    }
}