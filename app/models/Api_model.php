<?php 

    class Api_model{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function news_read(){
            $this->db->query('SELECT * from posts');
            $row = $this->db->resultSet();
            return $row;
        }

        public function events_read(){
            $this->db->query('SELECT * from events');
            $row = $this->db->resultSet();
            return $row;
        }

        public function survey_set_read($sid){
            $this->db->query('SELECT * from survey_set WHERE id =:sid');
            $this->db->bind(':sid' , $sid);
            $row = $this->db->resultSet();
            return $row;
        }

        public function questions_read($sid){
            $this->db->query('SELECT * from questions WHERE survey_id =:sid ORDER BY order_by asc');
            $this->db->bind(':sid' , $sid);
            $row = $this->db->resultSet();
            return $row;
        }

        public function answers_read($sid){
            $this->db->query('SELECT * from answers WHERE survey_id =:sid');
            $this->db->bind(':sid' , $sid);
            $row = $this->db->resultSet();
            return $row;
        }

        // public function survey_list_read(){
        //     $this->db->query('SELECT * from events');
        //     $row = $this->db->resultSet();
        //     return $row;
        // }

    }