<?php

class categories {
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getCategorie(){
        $this->db->query('SELECT * FROM categories');
        if($this->db->execute()){
            return $this->db->resultset();
        }else{
            return false;
        }
    }

}
