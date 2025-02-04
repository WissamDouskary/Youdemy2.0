<?php
class Pages extends Controllers
{
    public function index(){
        $this->view('index');
    }

    public function edit($id){
        echo "this user id = ". $id;
    }
}