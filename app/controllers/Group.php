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

        public function edit_dept_modal(){
            extract($_POST);
            $dept = $this->groupModel->getDepartmentByID($id);
            $data = [
                'dept' => $dept
            ];
            $this->view('group/edit_dept', $data);
        }

        public function edit_dept(){
            $data= [
                'dept_id' => $_POST['department_id'],
                'dept_name' => $_POST['department_name']
            ];
            if($this->groupModel->updateDepartment($data)){
                redirect('admin/alumni');
            }   
            else{
                die('something went wrong');
            }
        }

        public function edit_course_modal(){
            extract($_POST);
            $course = $this->groupModel->getCourseById($id);
            $dept = $this->groupModel->getDepartment();
            $data = [
                'course' => $course,
                'dept' => $dept
            ];

            //array_print($data);
            $this->view('group/edit_course', $data);
        }

        public function edit_course(){
            $data= [
                'course_id' => $_POST['course_id'],
                'course_name' => $_POST['course_name'],
                'course_code' => $_POST['course_code'],
                'department_id' => $_POST['department_id']
            ];

            if($this->groupModel->updateCourse($data)){
                redirect('admin/alumni');
            }   
            else{
                die('something went wrong');
            }
        }

        public function edit_batch_modal(){
            extract($_POST);
            $batch = $this->groupModel->getBatchById($id);
            $data = [
                'batch' => $batch
            ];
            $this->view('group/edit_batch', $data);
        }

        public function edit_batch(){
            $data= [
                'batch_id' => $_POST['batch_id'],
                'year' => $_POST['year']
            ];
            if($this->groupModel->updateBatch($data)){
                redirect('admin/alumni');
            }   
            else{
                die('something went wrong');
            }
        }
        

        //delete functions 
        public function deleteDept($dept_id){
            if($this->groupModel->deleteDept($dept_id)){
                redirect('admin/alumni');
            }
            else{
                die('Something went wrong!');
            }
        }

        public function deleteCourse($course_id){
            if($this->groupModel->deleteCourse($course_id)){
                redirect('admin/alumni');
            }
            else{
                die('Something went wrong!');
            }
        }

        public function deleteBatch($batch_id){
            if($this->groupModel->deleteBatch($batch_id)){
                redirect('admin/alumni');
            }
            else{
                die('Something went wrong!');
            }
        }

        public function duplicateError(){
            echo 'Data is already in database';
        }
    }