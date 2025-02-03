<?php
// create rooting configuration

Class Core {
    protected $currentController = 'Pages';
    protected $currentMethode = 'index';
    protected $params = [];

    function __construct(){
        print_r($this->getUrl());
    }
    public function getUrl(){
        if(isset($_GET['url'])){
            $url = rtrim($_GET['url'], "/");
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode("/", $url);
        }
    }
}