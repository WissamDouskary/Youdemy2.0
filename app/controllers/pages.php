<?php

Class pages extends Controller {

    public function __construct(){
        $this->courModel = $this->model('Cours');
    }

    public function index(){
        $data = ['title' => "this is index page"];
        $this->view('pages/index', $data);
    }
}
