<?php
Class Cours {
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function createcourse($data){
        if(isset($data['video'])){
            // begin transaction
            $this->db->beginTrans();

            // insert course data
            $this->db->query('INSERT INTO courses(title, description, course_image, course_type, video_url, price, category_id, teacher_id)
                              VALUES (:title, :description, :course_image, :course_type, :video_url, :price, :category_id, :teacher_id)');

            //bind course table param
            $this->db->bindparam(':title', $data['title']);
            $this->db->bindparam(':description', $data['description']);
            $this->db->bindparam(':course_image', $data['c_image']);
            $this->db->bindparam(':video_url', $data['video']);
            $this->db->bindparam(':price', $data['price']);
            $this->db->bindparam(':course_type', $data['type']);
            $this->db->bindparam(':category_id', $data['category']);
            $this->db->bindparam(':teacher_id', $_SESSION['user_id']);

            // execute course query
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }

            $course_id = $this->db->lastid();

            // insert into courses and tags associative table
            $this->db->query('INSERT INTO course_tags (tag_id, course_id)
                                VALUES (:tag_id, :course_id)');

            foreach ($data['tags'] as $tag) {
                $tag = trim($tag);

                $this->db->query("SELECT tag_id FROM tags WHERE name = :tag_name");
                $this->db->bindParam(':tag_name', $tag, PDO::PARAM_STR);
                $tagExists = $this->db->single(); // Fetch the result

                if ($tagExists) {
                    $tag_id = $tagExists->tag_id;
                } else {
                    $this->db->query("INSERT INTO tags (name) VALUES (:tag_name)");
                    $this->db->bindParam(':tag_name', $tag, PDO::PARAM_STR);
                    $this->db->execute();

                    $tag_id = $this->db->lastid();
                }

                $this->db->query("INSERT INTO course_tags (tag_id, course_id) VALUES (:tag_id, :course_id)");
                $this->db->bindParam(':tag_id', $tag_id, PDO::PARAM_INT);
                $this->db->bindParam(':course_id', (int) $course_id, PDO::PARAM_INT);
                if($this->db->execute()){
                    return true;
                }else{
                    return false;
                }

            }

            $this->db->commit();
        } else {
            // begin transaction
            $this->db->beginTrans();

            // insert course data
            $this->db->query('INSERT INTO courses(title, description, course_image, course_type, document_content, price, category_id, teacher_id)
                              VALUES (:title, :description, :course_image, :course_type, :document_content, :price, :category_id, :teacher_id)');

            //bind course table param
            $this->db->bindparam(':title', $data['title']);
            $this->db->bindparam(':description', $data['description']);
            $this->db->bindparam(':course_image', $data['c_image']);
            $this->db->bindparam(':document_content', $data['document']);
            $this->db->bindparam(':price', $data['price']);
            $this->db->bindparam(':course_type', $data['type']);
            $this->db->bindparam(':category_id', $data['category']);
            $this->db->bindparam(':teacher_id', $_SESSION['user_id']);

            // execute course query
            if($this->db->execute()){
                return true;
            }else{
                return false;
            }

            $course_id = $this->db->lastid();

            // insert into courses and tags associative table
            $this->db->query('INSERT INTO course_tags (tag_id, course_id)
                                VALUES (:tag_id, :course_id)');

            foreach ($data['tags'] as $tag) {
                $tag = trim($tag);

                $this->db->query("SELECT tag_id FROM tags WHERE name = :tag_name");
                $this->db->bindParam(':tag_name', $tag, PDO::PARAM_STR);
                $tagExists = $this->db->single(); // Fetch the result

                if ($tagExists) {
                    $tag_id = $tagExists->tag_id;
                } else {
                    $this->db->query("INSERT INTO tags (name) VALUES (:tag_name)");
                    $this->db->bindParam(':tag_name', $tag, PDO::PARAM_STR);
                    if($this->db->execute()){
                        return true;
                    }else{
                        return false;
                    }

                    $tag_id = $this->db->lastid();
                }

                $this->db->query("INSERT INTO course_tags (tag_id, course_id) VALUES (:tag_id, :course_id)");
                $this->db->bindParam(':tag_id', $tag_id, PDO::PARAM_INT);
                $this->db->bindParam(':course_id', (int) $course_id, PDO::PARAM_INT);
                if($this->db->execute()){
                    return true;
                }else{
                    return false;
                }
            }

            $this->db->commit();
        }
    }

    public function getCategorie(){
        $this->db->query('SELECT * FROM categories');
        return $this->db->resultSet();
    }
}