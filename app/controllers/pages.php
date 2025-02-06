<?php

Class pages extends Controller {

    private $courModel;

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

    public function admindash(){
        $this->view('admin_dash/admin_dashboard');
    }

    public function mainprofdash(){
        $this->view('profdashboard/maindash');
    }

    public function create_course(){
        $categorie = $this->courModel->getCategorie();
        $data = ['categorie' => $categorie];
        $this->view('profdashboard/creat_course_dash', $data);
    }

    public function my_course(){
        $this->view('profdashboard/my_courses_dash');
    }
}
