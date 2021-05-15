<?php

    class Alumni_model {
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

        public function showDepartment(){
            $this->db->query('SELECT * FROM `department`');
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }

        public function showBatch(){
            $this->db->query('SELECT * FROM `batch`');
            $row = $this->db->resultSet();
            if($row > 0) {
                return $row;
            }
        }


        public function showYear(){
            $this->db->query('SELECT * FROM `department` inner join `classification` on department.id = classification.dept_id left join `batch` on classification.batch_id = batch.id where department.id');
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
            $this->db->query('INSERT INTO alumni (student_no,last_name,first_name,middle_name,gender,birth_date,address,city,region,postal,contact_no,email,employment,departmentID,batchID
            ) VALUES (:student_no,:last_name,:first_name,:middle_name,:gender,:birth_date,:address,:city,:region,:postal,:contact_no,:email,:employment,:department,:batch)');
            
            
            $this->db->bind(':student_no', $data['student_no']);
            $this->db->bind(':last_name', $data['last_name']);
            $this->db->bind(':first_name', $data['first_name']);
            $this->db->bind(':middle_name', $data['middle_name']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':birth_date', $data['birth_date']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':city', $data['city']);
            $this->db->bind(':region', $data['region']);
            $this->db->bind(':postal', $data['postal']);
            $this->db->bind(':contact_no', $data['contact_no']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':employment', $data['employment']);
            $this->db->bind(':department', $data['department']);
            $this->db->bind(':batch', $data['batch']);

            try{
                if($this->db->execute()){
                    return true;
                }
            }
            catch (PDOException $e){
                // $msgData = [
                //     'errorMsg' => 'Batch '. $data['batch'] . ' is already in Database'
                // ];
                    redirect('group/duplicateError');
            }
        }

        public function addBulkAlumni($data){
            $this->db->query('INSERT INTO alumni(student_no, last_name, first_name, middle_name, gender, email, contact_no, employment, departmentID, batchID) VALUES (:student_no, :last_name, :first_name, :middle_name, :gender, :email, :contact_no, :employment, :department, :batch)');

            $this->db->bind(':student_no', $data['student_no']);
            $this->db->bind(':last_name', $data['last_name']);
            $this->db->bind(':first_name', $data['first_name']);
            $this->db->bind(':middle_name', $data['middle_name']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':contact_no', $data['contact_no']);
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
            $this->db->query('UPDATE alumni SET first_name = :first_name , last_name =:last_name, middle_name= :middle_name, birth_date = :birth_date, gender = :gender, address = :address, city = :city, region = :region, postal = :postal,contact_no = :contact_no, email = :email, employment = :employment, departmentID = :department, batchID = :batch WHERE alumni_id =:id');
        
        $this->db->bind(':first_name', $data['first_name']);
        $this->db->bind(':last_name', $data['last_name']);
        $this->db->bind(':middle_name', $data['middle_name']);
        $this->db->bind(':birth_date', $data['birth_date']);
        $this->db->bind(':gender', $data['gender']);
        $this->db->bind(':address', $data['address']);
        $this->db->bind(':city', $data['city']);
        $this->db->bind(':region', $data['region']);
        $this->db->bind(':postal', $data['postal']);
        $this->db->bind(':contact_no', $data['contact_no']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':employment', $data['employment']);
        $this->db->bind(':department', $data['department']);
        $this->db->bind(':batch', $data['batch']);
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
            $this->db->query('DELETE FROM alumni WHERE alumniID = (:id)');

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

        public function getDepartmentByCode($dept_code){
            $this->db->query('SELECT * FROM department WHERE dept_code=:dept_code');
            $this->db->bind(':dept_code', $dept_code);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function getBatchById($id){
            $this->db->query('SELECT * FROM batch WHERE id=:id');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function getBatchByYear($year){
            $this->db->query('SELECT * FROM batch WHERE year=:year');
            $this->db->bind(':year', $year);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

        public function getAlumniByClass($dept_id,$batch_id){
            $this->db->query('SELECT * 
                            FROM alumni
                            INNER JOIN department 
                            ON alumni.departmentID = department.id
                            INNER JOIN batch
                            ON alumni.batchID = batch.id
                            WHERE departmentID=:dept_id AND batchID=:batch_id 
                            ');
            $this->db->bind('dept_id', $dept_id);
            $this->db->bind('batch_id', $batch_id);
            $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
            else{
                return false;
            }
        }


        public function checkAlumni($student_no){
            $this->db->query('SELECT * from alumni WHERE student_no = :student_no' );

            $this->db->bind(':student_no', $student_no);
            $row = $this->db->single();
            
            if($this->db->rowCount() > 0){
                return $row;
            }
            else{
                return false;
            }
        }

    }

    