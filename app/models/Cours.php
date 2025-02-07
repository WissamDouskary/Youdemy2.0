<?php
Class Cours {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function createCourse($data) {
        $this->db->beginTrans();

        $query = isset($data['video'])
            ? 'INSERT INTO courses(title, description, course_image, course_type, video_url, price, category_id, teacher_id)
           VALUES (:title, :description, :course_image, :course_type, :video_url, :price, :category_id, :teacher_id)'
            : 'INSERT INTO courses(title, description, course_image, course_type, document_content, price, category_id, teacher_id)
           VALUES (:title, :description, :course_image, :course_type, :document_content, :price, :category_id, :teacher_id)';

        $this->db->query($query);
        $this->db->bindparam(':title', $data['title']);
        $this->db->bindparam(':description', $data['description']);
        $this->db->bindparam(':course_image', $data['c_image']);
        $this->db->bindparam(':price', $data['price']);
        $this->db->bindparam(':course_type', $data['type']);
        $this->db->bindparam(':category_id', $data['category']);
        $this->db->bindparam(':teacher_id', $_SESSION['user_id']);
        isset($data['video']) ? $this->db->bindparam(':video_url', $data['video']) : $this->db->bindparam(':document_content', $data['document']);

        if (!$this->db->execute()) {
            $this->db->rollback();
            return false;
        }

        $course_id = $this->db->lastid();

        foreach ($data['tags'] as $tag) {
            $tag = trim($tag);
            $this->db->query("SELECT tag_id FROM tags WHERE name = :tag_name");
            $this->db->bindParam(':tag_name', $tag, PDO::PARAM_STR);
            $tagExists = $this->db->single();

            if ($tagExists) {
                $tag_id = $tagExists->tag_id;
            } else {
                $this->db->query("INSERT INTO tags (name) VALUES (:tag_name)");
                $this->db->bindParam(':tag_name', $tag, PDO::PARAM_STR);
                if (!$this->db->execute()) {
                    $this->db->rollback();
                    return false;
                }
                $tag_id = $this->db->lastid();
            }

            $this->db->query("INSERT INTO course_tags (tag_id, course_id) VALUES (:tag_id, :course_id)");
            $this->db->bindParam(':tag_id', $tag_id, PDO::PARAM_INT);
            $this->db->bindParam(':course_id', (int) $course_id, PDO::PARAM_INT);

            if (!$this->db->execute()) {
                $this->db->rollback();
                return false;
            }
        }

        $this->db->commit();
        return true;
    }

    public function getCategorie(){
        $this->db->query('SELECT * FROM categories');
        return $this->db->resultSet();
    }

    public function getAllCourses(){
        $this->db->query('SELECT c.*, u.prenom, u.nom, u.user_id
            FROM courses c
            LEFT JOIN users u ON c.teacher_id = u.user_id');
        return $this->db->resultSet();
    }

    public function getTagsbycourse($course_id){
        $this->db->query('SELECT t.name FROM course_tags ct
            LEFT JOIN tags t ON ct.tag_id = t.tag_id
            WHERE ct.course_id = :course_id');
        $this->db->bindParam(':course_id', $course_id);
        $this->db->execute();
        return $this->db->resultSet();
    }

    public function getCourseById($course_id){
        $this->db->query('SELECT c.*, u.prenom, u.nom, u.user_id
            FROM courses c
            LEFT JOIN users u ON c.teacher_id = u.user_id
            WHERE c.course_id = :course_id');
        $this->db->bindParam(':course_id', $course_id);
        $this->db->execute();
        return $this->db->single();
    }
}