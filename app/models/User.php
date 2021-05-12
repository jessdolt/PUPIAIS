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


}
