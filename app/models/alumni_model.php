<?php

    class alumni_model {
        private $db;
        public function __construct() {
            $this->db = new Database;
        }

        public function showAlumni() {
            $this->db->query('SELECT * FROM `alumni` left join `department` on alumni.departmentID = department.id left join batch on alumni.batchID = batch.id');
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }

        public function selectDepartmentCode(){
            $this->db->query('SELECT * FROM department');
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }


        public function import($file) {
            $file = fopen($file, 'r');
            $column = fgetcsv($file);
            $password = rand(); 
            while ($column !==false) {
                $this->db->query('INSERT INTO alumni (userType,studentID,userPassword,firstName,lastName,midName,gender,birthDate,address,contactNum,email,employment,department,batch
            ) VALUES ($column[0],$column[1],:userPassword,$column[2],$column[3],$column[4],$column[5],$column[6],$column[7],:contactNum,:email,:employment,:department,:batch)');

            $this->db->bind(':userPassword', $password);
            
            if($this->db->execute()){
                return true;
            } else{
                return false;
            }

        }   
    }

        public function addAlumni($data){
            $this->db->query('INSERT INTO alumni (userType,studentID,userPassword,firstName,lastName,midName,gender,birthDate,address,contactNum,email,employment,departmentID,batchID
            ) VALUES (:userType,:studentID,:userPassword,:firstName,:lastName,:midInitial,:gender,:birthDate,:address,:contactNum,:email,:employment,:department,:batch)');
            
            $this->db->bind(':userType', $data['userType']);
            $this->db->bind(':studentID', $data['studentID']);
            $this->db->bind(':userPassword', $data['userPassword']);
            $this->db->bind(':firstName', $data['firstName']);
            $this->db->bind(':lastName', $data['lastName']);
            $this->db->bind(':midInitial', $data['midInitial']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':birthDate', $data['birthDate']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':contactNum', $data['contactNum']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':employment', $data['employment']);
            $this->db->bind(':department', $data['department']);
            $this->db->bind(':batch', $data['batch']);

            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }

        public function addDepartment($data){
            $this->db->query('INSERT INTO department (department,departmentCode) VALUES (:department,:departmentCode)');

            $this->db->bind(':department', $data['department']);
            $this->db->bind(':departmentCode', $data['departmentCode']);
            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }


        public function addBatch($data){
            $this->db->query('INSERT INTO batch (batch) VALUES (:batch)');

            $this->db->bind(':batch', $data['batch']);

            if($this->db->execute()){
                return true;
            } else{
                return false;
            }
        }


        public function editAlumni($data){
            $this->db->query('UPDATE alumni SET firstName = :firstName , lastName =:lastName, midName= :midInitial, birthDate = :birthDate, address = :address, contactNum = :contactNum, email = :email, employment = :employment WHERE id =:id');
        
        $this->db->bind(':firstName', $data['firstName']);
        $this->db->bind(':lastName', $data['lastName']);
        $this->db->bind(':midInitial', $data['midInitial']);
        $this->db->bind(':birthDate', $data['birthDate']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':contactNum', $data['contactNum']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':employment', $data['employment']);
        $this->db->bind(':id',$data['id']);

        if($this->db->execute()) {
            return true;
            } 
        else {
            return false;
            }
        }

        public function editDepartment($data){
            $this->db->query('UPDATE department SET department = :department WHERE id = :id');

            $this->db->bind(':department', $data['department']);
            $this->db->bind('departmentID',$data['departmentID']);
            $this->db->bind(':id',$data['id']);
        }

        public function deleteAlumni($id) {
            $this->db->query('DELETE FROM alumni WHERE id = (:id)');

            $this->db->bind(':id', $id);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function deleteDepartment($id) {
            $this->db->query('DELETE FROM department WHERE departmentID = (:departmentID)');

            $this->db->bind(':departmentID', $id);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        
        public function getAlumniById($id){
            $this->db->query('SELECT * FROM alumni WHERE id=:id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function getDepartmentById($id){
            $this->db->query('SELECT * FROM department WHERE id=:id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

    }

    