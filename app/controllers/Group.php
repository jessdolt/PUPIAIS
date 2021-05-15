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
                    'dept_name' => $_POST['dept_name'],
                    'dept_code' => $_POST['dept_code']
                ];
                $this->groupModel->addDepartment($data);
            }

            else{
                $data = [];
            }

            $this->view('group/add_dept', $data);
        }
    


        //add batch
        public function new_batch(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $data =[
                    'batch' => $_POST['batch'],
                    
                ];
                if($this->groupModel->addBatch($data)){
                    redirect('admin/alumni');
                }
            }

            else{
                $data = [];
            }

            $this->view('group/add_batch', $data);
        }

        

        public function duplicateError(){
            echo 'Data is already in database';
        }
    }