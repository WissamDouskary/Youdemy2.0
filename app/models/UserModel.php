<?php
Class UserModel {
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function register($data){
        $this->db->query('INSERT INTO users (nom, prenom, email, password, role_id, status) VALUES(:nom, :prenom, :email, :password, :role_id, :status)');
        // Bind values
        $this->db->bindParam(':nom', $data['nom']);
        $this->db->bindParam(':prenom', $data['prenom']);
        $this->db->bindParam(':email', $data['email']);
        $this->db->bindParam(':password', $data['password']);
        $this->db->bindParam(':role_id', $data['role_id']);
        $this->db->bindParam(':status', $data['status']);
        // Execute
        if($this->db->execute()){
            return true;
        } else {
            return false;
        }
    }
}