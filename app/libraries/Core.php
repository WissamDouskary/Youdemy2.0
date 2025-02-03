<?php
// create rooting configuration

Class Core {
    protected $currentController = 'test';
    protected $currentMethode = 'index';
    protected $params = [];

    function __construct(){
        $url = $this->getUrl();

        //check if controller exist with this url
        if(file_exists('../app/controllers/' . ucwords($url[0]) . '.php')){
            $this->currentController = ucwords($url[0]);
            unset($url[0]);
        }
        // require class page
        require_once '../app/controllers/' . $this->currentController . '.php';

        // create instance from controller class
        $this->currentController = new $this->currentController;

        //check for the secend url part (methods)
        if(isset($url[1])){
            // check if method exest on class controller
            if(method_exists($this->currentController, $url[1])) {
                $this->currentMethode = $url[1];
                unset($url[1]);
            }
        }

        // get this method params
        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->currentController, $this->currentMethode], $this->params);
    }
    public function getUrl(): array
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], "/");
            $url = filter_var($url, FILTER_SANITIZE_URL);
            return explode("/", $url);
        }
        return [];
    }
}