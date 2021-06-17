<?php

    class AlumniR_model {
        private $db;
        public function __construct() {
            $this->db = new Database;
        }

        public function showAll() {
            $this->db->query('SELECT * 
                            FROM employment
                            INNER JOIN alumni
                            ON employment.alumni_id = alumni.alumni_id
                            INNER JOIN batch
                            ON alumni.batchID = batch.id 
                            ORDER BY date_responded DESC
                            ');
                $row = $this->db->resultSet();
            if($row > 0){
                return $row;
            }
        }

        public function allCount() {
            $this->db->query('SELECT ALL (employment_id) FROM employment');
                $row = $this->db->resultSet();
                if($this->db->rowCount() > 0) {
                    return $row;
                }
        }

        public function showCourses(){
            $this->db->query('SELECT * FROM `courses`');
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

        public function getAlumniByBatch($batch) {
            $this->db->query('SELECT * FROM employment 
                            INNER JOIN alumni
                            ON employment.alumni_id = alumni.alumni_id
                            INNER JOIN batch
                            ON batch.id = alumni.batchID 
                            WHERE alumni.batchID = :batch');
            $this->db->bind(':batch', $batch);
            $row = $this->db->resultSet();
            if($row > 0) {
                return $row;
            } else {
                return false;
            }
        }
        

        public function getAlumniByCourse($batch, $course) {
            $this->db->query('SELECT * FROM employment 
                            INNER JOIN alumni
                            ON employment.alumni_id = alumni.alumni_id
                            INNER JOIN batch
                            ON batch.id = alumni.batchID 
                            INNER JOIN courses
                            ON courses.id = alumni.courseID
                            WHERE alumni.batchID = :batch AND alumni.courseID = :course');
            $this->db->bind(':batch', $batch);
            $this->db->bind(':course', $course);
            $row = $this->db->resultSet();
            if($row > 0) {
                return $row;
            } else {
                return false;
            }
        }

        public function alumniCountPerBatch() {
            $this->db->query('SELECT * FROM batch');
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $this->getCountPerBatch($row);
            }
        }

        public function getCountPerBatch($batch) {
            $batchCount = array();

            foreach($batch as $newBatch){
                $this->db->query('SELECT ALL batchID FROM employment
                                INNER JOIN alumni
                                ON employment.alumni_id = alumni.alumni_id
                                WHERE batchID = :batchID');
                $this->db->bind(':batchID', $newBatch->id);
                $row = $this->db->resultSet();
                $newRow = [
                    'alumniCount' => count($row),
                    'batchID' => $newBatch->id
                ];
                array_push($batchCount, $newRow);
            }

            return $batchCount;
        }

        public function getAlumniSingle($id) {
            $this->db->query('SELECT * 
                            FROM employment
                            INNER JOIN alumni
                            ON employment.alumni_id = alumni.alumni_id
                            INNER JOIN batch
                            ON alumni.batchID = batch.id 
                            INNER JOIN courses
                            ON alumni.courseID = courses.id
                            WHERE employment.employment_id = :id
            ');
            $this->db->bind(':id', $id);
            $row = $this->db->single();
            if($this->db->rowCount() > 0){
                return $row;
            }
        }

        public function selectExport($id) {
            $this->db->query('SELECT * FROM employment 
                            INNER JOIN alumni
                            ON employment.alumni_id = alumni.alumni_id
                            WHERE employment_id = :id');
            $this->db->bind(':id', $id);
            $row = $this->db->resultSet();
            if($this->db->rowCount() > 0){
                return $row;
            }
        }
 

    }

    