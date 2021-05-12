<?php 

    class Event{
        private $db;
        public function __construct(){
            $this->db = new Database;
        }

        public function addEvent($data){
            $this->db->query('INSERT INTO events(title,description,image) VALUES (:title,:description,:image)');

            $this->db->bind(':title', $data['title']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':image', $data['file']);
            
            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }

        public function showEvent(){
            $this->db->query('SELECT * from events');
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }

        public function editEvent($data,$isUploaded){
            if($isUploaded == 1 ){
                $this->db->query('UPDATE events set title=:title,description=:description,image=:image where id =:id');

                $this->db->bind(':title',$data['title']);
                $this->db->bind(':description',$data['description']);
                $this->db->bind(':image',$data['file']);
                $this->db->bind(':id',$data['id']);
                
                if($this->db->execute()){
                    return true;
                }
                else{
                    return false;
                }
            }
            else{
                $this->db->query('UPDATE events set title=:title,description=:description where id =:id');
                $this->db->bind(':title',$data['title']);
                $this->db->bind(':description',$data['description']);
                $this->db->bind(':id',$data['id']);
                
                if($this->db->execute()){
                    return true;
                }
                else{
                    return false;
                }
            }
           
        }

        public function singleEvent($id){
            $this->db->query('SELECT * from events where id=:id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function deleteEvent($id){

            $this->db->query('DELETE FROM events where id= (:id)');
            $this->db->bind(':id', $id);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }

        }

        
    }