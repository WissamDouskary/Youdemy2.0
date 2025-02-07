<?php

class courses extends Controller {

    private $currentmodel;
    public function __construct(){
        $this->currentmodel = $this->model('Cours');
    }

    public function createCourse(){
        $categorie = $this->currentmodel->getCategorie();
        $data = ['categorie' => $categorie];

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $course_title = $_POST['course_title'];
            $course_description = $_POST['course_description'];
            $tags = explode(',', $_POST['tags']);
            $categories_select = $_POST['categories_select'];
            $course_price = $_POST['course_price'];
            $course_type = $_POST['course_type'];

            if(empty($course_title) || empty($course_description) || empty($tags) || empty($categories_select) || empty($course_price) || empty($course_type)){
                $_SESSION['message'] = [
                    'type' => 'error',
                    'text' => 'please fill all fields!'
                ];
                redirect('/courses/createCourse');
                exit();
            }
            if ($course_type === 'video') {
                if (isset($_FILES['course_content']) && isset($_FILES['course_image'])) {
                    $uploadDirVideo = 'C:/xampp/htdocs/Youdemy2.0/public/uploads/video/';
                    if (!is_dir($uploadDirVideo)) {
                        mkdir($uploadDirVideo, 0777, true);
                    }
                    $videoFile = $_FILES['course_content'];
                    $videoPath = $uploadDirVideo . basename($videoFile['name']);

                    $uploadDirImage = 'C:/xampp/htdocs/Youdemy2.0/public/uploads/image/';
                    if (!is_dir($uploadDirImage)) {
                        mkdir($uploadDirImage, 0777, true);
                    }
                    $imageFile = $_FILES['course_image'];
                    $imagePath = $uploadDirImage . basename($imageFile['name']);

                    if (move_uploaded_file($videoFile['tmp_name'], $videoPath) && move_uploaded_file($imageFile['tmp_name'], $imagePath)) {
                        $data = [
                            'title' => $course_title,
                            'c_image' => $imagePath,
                            'description' => $course_description,
                            'tags' => $tags,
                            'price' => $course_price,
                            'category' => $categories_select,
                            'type' => $course_type,
                            'video' => $videoPath
                        ];
                        if($this->currentmodel->createcourse($data)){
                            $_SESSION['message'] = [
                                'type' => 'success',
                                'text' => 'Course created success!'
                            ];
                            redirect('/pages/create_course');
                            exit();
                        }
                    }
                }
            } else if ($course_type === 'document'){
                $uploadDirImage = '/public/uploads/images/';
                if (!is_dir($uploadDirImage)) {
                    mkdir($uploadDirImage, 0777, true);
                }
                $imageFile = $_FILES['course_image'];
                $imagePath = $uploadDirImage . basename($imageFile['name']);
                $documentcontent = $_POST['course_content'];
                if (move_uploaded_file($imageFile['tmp_name'], $imagePath)) {
                    $data = [
                        'title' => $course_title,
                        'c_image' => $imagePath,
                        'description' => $course_description,
                        'tags' => $tags,
                        'price' => $course_price,
                        'category' => $categories_select,
                        'type' => $course_type,
                        'document' => $documentcontent
                    ];
                    if($this->currentmodel->createcourse($data)){
                        $_SESSION['message'] = [
                            'type' => 'success',
                            'text' => 'Course created success!'
                        ];
                        echo 'ssss';
                        redirect('/courses/createCourse');
                        exit();
                    }
                }
            }
        } else {
            $this->view('profdashboard/creat_course_dash', $data);
        }
    }
}

