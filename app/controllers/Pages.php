<?php
class Pages
{
    public function index(){
        echo 'this is Pages Index';
    }

    public function edit($id){
        echo "this user id = ". $id;
    }
}