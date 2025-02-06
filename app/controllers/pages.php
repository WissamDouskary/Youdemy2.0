<?php

Class pages extends Controller {

    public function __construct(){
        $this->courModel = $this->model('Cours');
    }

    public function index(){
        $data = ['title' => "this is index page"];
        $this->view('pages/index', $data);
    }

    public function courses(){
        $this->view('pages/courses');
    }
    public function mainprofdash(){
        $this->view('profdashboard/maindash');
    }

    public function create_course(){
        $this->view('profdashboard/creat_course_dash');
    }

    public function my_course(){
        $this->view('profdashboard/my_courses_dash');
    }

}
