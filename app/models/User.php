<?php
class User {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }
    

    public function login($email, $password) {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        
        $row = $this->db->single();
        if($this->db->rowCount() > 0) {

            $hashedPassword = $row->password;

            if (password_verify($password, $hashedPassword)) {
                return $row;
            } else {
                return false;
            }

        } else {
            return false;
        }
    }

    
    // GET USER_CONTROL FROM TABLE USER_TYPE
    public function forSession($user) {
        $this->db->query('SELECT * FROM users LEFT JOIN user_type ON users.user_type = user_type.id WHERE email= :email ');
        $this->db->bind(':email', $user->email);

        $row = $this->db->single();
        if($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    } 

    public function register($data){
        $this->db->query('INSERT INTO users(name,email,password,user_type) VALUES (:name,:email,:password,:user_type)');

        $this->db->bind(':name', $data['name']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':user_type', $data['user_type']);
        
        if($this->db->execute()){
            return true;
        } else{
            return false;
        }
    }

}
