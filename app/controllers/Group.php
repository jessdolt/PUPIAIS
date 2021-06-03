<?php 

    class Group extends Controller{
        //add department
        public function __construct(){
            $this->groupModel = $this->model('group_model');
        }

        public function index(){
            
        }

        public function new_dept(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data =[
                    'dept_name' => $_POST['department_name'],
                ];
                $this->groupModel->addDepartment($data);
                
            }
        }
    

        public function new_course(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data =[
                    'course_name' => $_POST['course_name'],
                    'course_code' => $_POST['course_code'],
                    'department_id' => $_POST['department_id']
                ];
                $this->groupModel->addCourse($data);
            }

        }


        //add batch
        public function new_batch(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data =[
                    'batch' => $_POST['batch'],
                    
                ];
                $this->groupModel->addBatch($data);
            }
        }

        

        public function duplicateError(){
            echo 'Data is already in database';
        }
    }