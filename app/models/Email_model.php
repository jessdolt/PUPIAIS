<?php 

    class Email_model{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function getAlumniById($id){
            $this->db->query('SELECT * FROM alumni WHERE alumni_id=:id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        
        public function singleAlumni($alumni_id){
            $this->db->query('SELECT * from users where a_id =:alumni_id');
            $this->db->bind(':alumni_id', $alumni_id);
            $row  = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function showAlumniNotSent(){
            $this->db->query('SELECT * from users where a_id IS NOT NULL AND isSend = 0');
            $row  = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function updateSend($alumni_id){
            $this->db->query('UPDATE users set isSend = 1 WHERE a_id = :alumni_id');
            $this->db->bind(':alumni_id', $alumni_id);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
    }