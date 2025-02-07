<?php

Class Enrollmodel{
    private $db;

    function __construct(){
        $this->db = new Database();
    }

    public function enroll($course_id){
        $this->db->query("INSERT INTO enrollments (student_id, course_id) VALUES ( :student_id, :course_id)");
        $this->db->bindparam(':student_id', $_SESSION['user_id']);
        $this->db->bindparam(':course_id', $course_id);
        $this->db->execute();
    }
}