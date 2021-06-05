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

    }