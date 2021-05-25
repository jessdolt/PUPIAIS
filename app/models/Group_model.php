<?php 

    class Group_model{
        private $db;

        public function __construct(){
            $this->db = new Database;
        }

        public function showClassificaition(){
            $this->db->query('SELECT *
                             FROM classification 
                             INNER JOIN department
                             ON classification.dept_id = department.id
                             INNER JOIN batch
                             ON classification.batch_id = batch.id
                            ');
            $row = $this->db->resultSet();

            if($row > 0){
                return $row;
            }
        }

        

        public function addDepartment($data){
            $this->db->query('INSERT INTO department(dept_name,dept_code) VALUES (:dept_name,:dept_code)');

            $this->db->bind(':dept_name', $data['dept_name']);
            $this->db->bind(':dept_code', $data['dept_code']);
            
            try{
                if($this->db->execute()){
                    $this->insertBatch($data['dept_code']);
                }
            }
            catch (PDOException $e){
                // $msgData = [
                //     'errorMsg' => 'Batch '. $data['batch'] . ' is already in Database'
                // ];
                redirect('group/duplicateError');
            }
        }
        
        public function addBatch($data){
            $this->db->query('INSERT INTO batch(year) VALUES (:year)');
            $this->db->bind(':year', $data['batch']);
            try{
                if($this->db->execute()){
                    $this->insertGroup($data['batch']);
                }
            }
            catch (PDOException $e){
                // $msgData = [
                //     'errorMsg' => 'Batch '. $data['batch'] . ' is already in Database'
                // ];
                redirect('group/duplicateError');
            } 
        }

        public function insertGroup($year){
            $count = 0;
            $this->db->query('SELECT * from department');
            $rowDept= $this->db->resultSet();

            $this->db->query('SELECT id from batch where year=:year');
            $this->db->bind(':year', $year);
            $rowBatch = $this->db->single();

            foreach($rowDept as $dept){
                $this->db->query('INSERT INTO classification(dept_id,batch_id) VALUES (:dept_id,:batch_id)');
                $this->db->bind(':dept_id', $dept->id);
                $this->db->bind(':batch_id', $rowBatch->id);
                $this->db->execute();
                $count++;
            }

            if($count === count($rowDept)){
                redirect('admin/alumni');
            }

            
        }

        public function insertBatch($dept){
            $count = 0;
            $this->db->query('SELECT * from batch');
            $rowBatch = $this->db->resultSet();

            $this->db->query('SELECT id from department where dept_code=:dept_code');
            $this->db->bind(':dept_code', $dept);
            $rowDept = $this->db->single();

            foreach($rowBatch as $batch){
                $this->db->query('INSERT INTO classification(dept_id,batch_id) VALUES (:dept_id,:batch_id)');
                $this->db->bind(':dept_id', $rowDept->id);
                $this->db->bind(':batch_id', $batch->id);
                $this->db->execute();
                $count++;
            }

            if($count === count($rowBatch)){
                redirect('admin/alumni');
            }
        }


}