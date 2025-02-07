<?php

Class pages extends Controller {

    private $courModel;
    private $enrollModel;

    public function __construct(){
        $this->courModel = $this->model('Cours');
        $this->enrollModel = $this->model('Enrollmodel');
    }

    public function index(){
        $data = ['title' => "this is index page"];
        $this->view('pages/index', $data);
    }

    public function courses(){
        $courses = $this->courModel->getAllCourses();

        foreach ($courses as $course) {
            $course->tags = $this->courModel->getTagsbycourse($course->course_id);
        }

        $data = ['courses' => $courses];

        $this->view('pages/courses', $data);
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

    public function EnrollPage(){
        $enrolls = $this->enrollModel->getEnrollmentsByUser();
        $data = ['enrolls' => $enrolls];
        $this->view('pages/EnrollPage', $data);
    }
}
