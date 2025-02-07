<?php

Class Enroll extends Controller{
    private $currentModal;
    public function __construct(){
        $this->currentModal = $this->model('Enrollmodel');
    }

    public function addtoEnroll($course_id){
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            try {
                $this->currentModal->enroll($course_id);
                $_SESSION['message'] = [
                    'type' => 'success',
                    'text' => 'Course added to your enroll list!'
                ];
                redirect('pages/courses');
                exit();
            } catch (Exception $e) {
                $_SESSION['message'] = [
                    'type' => 'error',
                    'text' => "you have enrolled this course before!"
                ];
                redirect('pages/courses');
                exit();
            }
        }
    }
}

// cantlect