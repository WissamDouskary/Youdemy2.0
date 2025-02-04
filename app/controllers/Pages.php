<?php
class Pages extends Controller
{
    public function index(){
        $data = ['title' => "i'am title"];
        $this->view('index', $data);
    }

    public function edit($id){
        echo "this user id = ". $id;
    }
}