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
        $categorie = $this->getCategories();
        $cat = ['categorie' => $categorie['categories']];
        $this->view('profdashboard/creat_course_dash', $cat);
    }

    public function my_course(){
        $this->view('profdashboard/my_courses_dash');
    }

    public function getCategories(){
        $category = $this->courModel->getCategorie();
        if (empty($category)) {
            return ['categories' => []];
        }
        return ['categories' => $category];
    }

}
