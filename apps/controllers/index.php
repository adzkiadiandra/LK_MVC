<?php
class index{
    public function __construct (){
        echo "Anda berada pada controller index";
    }

    public function index(){
        echo "Anda memanggil action index";
        }
    public function home($data1, $data2){
        echo "Anda memamggil action home";
    }
}