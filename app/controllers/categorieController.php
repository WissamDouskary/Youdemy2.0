<?php

class categorieController extends Controller {
    private $currentModal;
    public function __construct(){
        $this->currentModal = $this->model('categories');
    }

    public function getCategories(){
        $category = $this->currentModal->getCategorie();

        if (empty($category)) {
            $data = ['categories' => []];
        } else {
            $data = ['categories' => $category];
        }

        $this->view('profdashboard/creat_course_dash', $data);
    }
}