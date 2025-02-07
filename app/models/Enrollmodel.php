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

    public function getEnrollmentsByUser(){
        if(!isset($_SESSION['user_id'])){
            return false;
        }
        $this->db->query("SELECT e.*, c.*, CONCAT(n.prenom , ' ' , n.nom) AS teacher_name, u.prenom, u.nom, u.user_id
                    FROM enrollments e
                    LEFT JOIN courses c ON c.course_id = e.course_id
                    LEFT JOIN users u ON e.student_id = u.user_id
                    LEFT JOIN users n ON c.teacher_id = n.user_id
                    WHERE e.student_id = :student_id");

        $this->db->bindparam(':student_id', $_SESSION['user_id']);
        $result = $this->db->resultSet();
        return $result;
    }
}