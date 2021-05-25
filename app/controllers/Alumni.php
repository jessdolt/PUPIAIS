<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


class Alumni extends Controller{
    public function __construct(){
       $this->alumniModel = $this->model('alumni_model');
    }
    
    //Getting data from database
    public function index(){
        $data = $this->alumniModel->showAlumni();
        $this->view('alumni/index', $data);
    }
    
/*     public function csv() {
     
        if(isset($_POST['submit'])){
            var_dump($_FILES['csv']);

            redirect('alumni');
        }

    } */

    //Email specific alumni
    public function email($id){
        $alumni = $this->alumniModel->getAlumniById($id);
        
        $mail = new PHPMailer();
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '465';
        $mail->isHTML();
        $mail->Username = '';
        $mail->Password = '';
        $mail->setFrom('meepmeerpp@idk.com');
        $mail->Subject = 'LMAOLMAO?'  ;
        $mail->Body = 'ello bubu this yo password '.$alumni->userPassword;
        $mail->addAddress($alumni->email);
        $mail->Send();

        redirect('alumni');

    }

        //Add Alumni
        public function add(){
            $this->userModel = $this->model('user');    
            $code = $this->alumniModel->showDepartment();

                $batch = $this->alumniModel->showBatch();
            if($_SERVER['REQUEST_METHOD']=='POST') {
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                // $pass = rand();
                // $pass = password_hash($pass, PASSWORD_DEFAULT);
                $data = [
                    'student_no' => ($_POST['student_no']),
                    //'user_pass' => $pass,
                    'first_name' => ($_POST['first_name']),
                    'last_name' => ($_POST['last_name']),
                    'middle_name' => ($_POST['middle_name']),
                    'gender' => ($_POST['gender']),
                    'birth_date' => ($_POST['birth_date']),
                    'address' => ($_POST['address']),
                    'city' => ($_POST['city']),
                    'region' => ($_POST['region']),
                    'postal' => ($_POST['postal']),
                    'contact_no' => ($_POST['contact_no']),
                    'email' => ($_POST['email']),
                    'employment' => ($_POST['employment']),
                    'department' => ($_POST['department']),
                    'batch' => ($_POST['batch']),
                    'student_no_error' => '',
                    'first_name_error' => '',
                    'last_name_error' => '',
                    'middle_name_error' => '',
                    'gender_error' => '',
                    'birth_date_error' => '',
                    'address_error' => '',
                    'city_error' => '',
                    'region_error' => '',
                    'postal_error' => '',
                    'contact_no_error' => '',
                    'email_error' => '',
                    'employment_error' => '',
                    'department_error' => '',
                    'batch_error' => '',
                ];

                if (empty($data['student_no'])){
                    $data['student_no_error'] = 'Please enter the student ID';
                }
                if (empty($data['first_name'])){
                    $data['first_name_error'] = "Please enter the Alumni's First Name";
                }
                if (empty($data['last_name'])){
                    $data['last_name_error'] = "Please enter the Alumni's Last Name";
                }
                if (empty($data['middle_name'])){
                    $data['middle_name_error'] = "Please enter the Alumni's Middle Initial";
                }
                if (empty($data['birth_date'])){
                    $data['birth_date_error'] = "Please input the Alumni's Birth Date";
                }
                if (empty($data['address'])){
                    $data['address_error'] = "Please input the Alumni's Address";
                }
                if (empty($data['city'])){
                    $data['city_error'] = "Please input the Alumni's Address";
                }
                if (empty($data['region'])){
                    $data['region_error'] = "Please input the Alumni's Address";
                }
                if (empty($data['postal'])){
                    $data['postal_error'] = "Please input the Alumni's Address";
                }
                if (empty($data['contact_no'])){
                    $data['contact_no_error'] = "Please input the Alumni's Contact Number";
                }
                if (empty($data['email'])){
                    $data['email_error'] = "Please input the Alumni's Email Address";
                }
                if (empty($data['employment'])){
                    $data['employment_error'] = "Please input the Alumni's employment status";
                }
                if (empty($data['department'])){
                    $data['department_error'] = "Please input the Alumni's Department";
                }
                if (empty($data['batch'])){
                    $data['batch_error'] = "Please input the Alumni's Batch";
                }

                // print_r($data);
                if (empty($data['student_no_error']) && empty($data['first_name_error']) && empty($data['last_name_error']) && empty($data['middle_name_error']) && empty($data['birth_date_error']) && empty($data['address_error']) && empty($data['city_error']) && empty($data['region_error']) && empty($data['postal_error']) && empty($data['contact_no_error']) && empty($data['email_error']) && empty($data['employment_error']) && empty($data['departmentError']) && empty($data['batchError'])){
                        if($this->alumniModel->addAlumni($data)){
                            $pass = '12345';
                            $pass = password_hash($pass, PASSWORD_DEFAULT);
                            $newData = [
                                'name' => $data['first_name'] . ' ' . substr($data['middle_name'], 0 ,1) . ' ' . $data['last_name'],
                                'email' => $data['email'],
                                'password' => $pass,
                                'user_type' => 2
                            ];
                            if($this->userModel->register($newData)){
                                redirect('admin/alumni');
                            }
                        }
                    }
                else{
                    /* $this->alumniModel->addAlumni($data); */
                    $this->view('alumni/add', $data);
                }
        }
        else {
            
            $data = [
                'student_no' => '',
                'user_pass' => '',
                'first_name' => '',
                'last_name' => '',
                'middle_initial' => '',
                'gender' => '',
                'birth_date' => '',
                'address' => '',
                'city' => '',
                'region' => '',
                'postal' => '',
                'contact_no' => '',
                'email' => '',
                'employment' => '',
                'department' => '',
                'departmentCode' => $code,
                'batch' => $batch,
                'student_no_error' => '',
                'first_name_error' => '',
                'last_name_error' => '',
                'middle_name_error' => '',
                'gender_error' => '',
                'birth_date_error' => '',
                'address_error' => '',
                'city_error' => '',
                'region_error' => '',
                'postal_error' => '',
                'contact_no_error' => '',
                'email_error' => '',
                'employment_error' => '',
                'department_error' => '',
                'batch_error' => '',
            ];
        }
            $this->view('alumni/add', $data);
    }

    

    public function edit($id){
        $alumni = $this->alumniModel->getAlumniById($id);
        $batch = $this->alumniModel->showBatch();
        $dep = $this->alumniModel->showDepartment();

        if($_SERVER['REQUEST_METHOD']=='POST') {
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data = [

                'id' => $id,
                'student_no' => ($_POST['student_no']),
                'first_name' => ($_POST['first_name']),
                'last_name' => ($_POST['last_name']),
                'middle_name' => ($_POST['middle_name']),
                'gender' => ($_POST['gender']),
                'birth_date' => ($_POST['birth_date']),
                'address' => ($_POST['address']),
                'city' => ($_POST['city']),
                'region' => ($_POST['region']),
                'postal' => ($_POST['postal']),
                'contact_no' => ($_POST['contact_no']),
                'email' => ($_POST['email']),
                'employment' => ($_POST['employment']),
                'department' => ($_POST['department']),
                'batch' => ($_POST['batch']),

            ];

            print_r($data);
            if($this->alumniModel->editAlumni($data)){
                redirect('admin/alumni');
            }
            else{
                die('something went wrong');
            }
            
        }
        
        else   {

            $data = [
                'id' => $id,
                'student_no' => $alumni->student_no,
                'first_name' => $alumni->first_name,
                'last_name' => $alumni->last_name,
                'middle_name' => $alumni->middle_name,
                'gender' => $alumni->gender,
                'birth_date' => $alumni->birth_date,
                'address' => $alumni->address,
                'city' => $alumni->city,
                'region' => $alumni->region,
                'postal' => $alumni->postal,
                'contact_no' => $alumni->contact_no,
                'email' => $alumni->email,
                'employment' => $alumni->employment,
                'batch' => $alumni->batchID,
                'year'  => $batch,
                'department' => $alumni->departmentID,
                'dept_code' => $dep
            ];
    
        }
            
    $this->view('alumni/edit', $data);
    }

    public function tables($id){
        $alumni = $this->alumniModel->getAlumniById($id);
 
        $data = [
            'alumni' => $alumni,
        ];

        $this->view('alumni/tables', $data);
    }

    public function delete($id) {
        if($this->alumniModel->deleteAlumni($id)){
            redirect('admin/users');
        }
    }


    
    public function show($dept_id,$batch_id){
        $this->groupModel = $this->model('group_model');


        $department = $this->alumniModel->showDepartment();
        $classification = $this->groupModel->showClassificaition();
        $alumni = $this->alumniModel->getAlumniByClass($dept_id,$batch_id);
        
        $dept_name = $this->alumniModel->getDepartmentById($dept_id);
        $batch_name = $this->alumniModel->getBatchById($batch_id);

        $data = [
            'alumni' => $alumni,
            'department' => $department,
            'classification' => $classification,
            'isPreview' => 0,
            'title' => $dept_name->dept_code,
            'batch' => $batch_name->year
        ];

        $this->view('admin_d/alumni', $data);
    }
    

    public function preview(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->groupModel = $this->model('group_model');
            $department = $this->alumniModel->showDepartment();
            $classification = $this->groupModel->showClassificaition();
 
           $file = $_FILES['csv_file'];
           $fileRealName = $file['name'];
           $fileName = $file['tmp_name'];
           $fileSize = $file['size'];
           $alumniList = array();

           if ($fileSize > 0){
               $openFile = fopen($fileName, "r");
               $column_header = true;
               while(($column = fgetcsv($openFile, 10000, ",")) !== FALSE){
                   if($column_header){
                       $column_header = false;
                   }
                   else{
                       array_push($alumniList, $column);
                   }
               }
               fclose($openFile);
           }

        //    foreach($alumniList as $alumni){
        //        echo '<br>';
        //        echo $alumni[0];
        //        echo '<br>';
        //        echo $alumni[1];
        //    }
            
            $data= [
                'alumni' => [],
                'department' => $department,
                'classification' => $classification,
                'alumniList' => $alumniList,
                'isPreview' => 1,
                'fileName' => $fileRealName,
                'title' => 'All Alumni',
                'batch' => '',                
            ];

          $this->view('admin_d/alumni', $data);
        }        
    }

    public function previeww($dept_id,$batch_id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->groupModel = $this->model('group_model');
            $department = $this->alumniModel->showDepartment();
            $classification = $this->groupModel->showClassificaition();
            
           $dept_name = $this->alumniModel->getDepartmentById($dept_id);
           $batch_name = $this->alumniModel->getBatchById($batch_id);

 
           $file = $_FILES['csv_file'];
           $fileRealName = $file['name'];
           $fileName = $file['tmp_name'];
           $fileSize = $file['size'];
           $alumniList = array();

           if ($fileSize > 0){
               $openFile = fopen($fileName, "r");
               $column_header = true;
               while(($column = fgetcsv($openFile, 10000, ",")) !== FALSE){
                   if($column_header){
                       $column_header = false;
                   }
                   else{
                       array_push($alumniList, $column);
                   }
               }
               fclose($openFile);
           }

        //    foreach($alumniList as $alumni){
        //        echo '<br>';
        //        echo $alumni[0];
        //        echo '<br>';
        //        echo $alumni[1];
        //    }
            
            $data= [
                'alumni' => [],
                'department' => $department,
                'classification' => $classification,
                'alumniList' => $alumniList,
                'isPreview' => 1,
                'fileName' => $fileRealName,
                'title' => $dept_name->dept_code,
                'batch' => $batch_name->year
            ];

          $this->view('admin_d/alumni', $data);
        }        
        
    }

    public function addBulk(){
        $this->userModel = $this->model('user');
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            //array_print($_POST['alumni']);
            
            $alumni = $_POST['alumni'];
            // array_print($alumni[0]);
            
            // $alumni[0]['department'] = checkDept($alumni[0]['department']);
            // $alumni[0]['batch'] = checkBatch($alumni[0]['batch']);
            // array_print($alumni[0]);

            $duplication = array();

            foreach($alumni as $data){
                $data['department'] = $this->checkDept($data['department']);
                $data['batch'] = $this->checkBatch($data['batch']);
                //array_print($data);
                
              
                if($this->alumniModel->checkAlumni($data['student_no'])){
                    array_push($duplication, $data);
                }

                else{
                    $this->alumniModel->addBulkAlumni($data);
                    $pass = '12345';
                    $pass = password_hash($pass, PASSWORD_DEFAULT);
                    $newData = [
                        'name' => $data['first_name'] . ' ' . substr($data['middle_name'], 0 ,1) . ' ' . $data['last_name'],
                        'email' => $data['email'],
                        'password' => $pass,
                        'user_type' => 2
                    ];
                    $this->userModel->register($newData);
                }
            }

            if(!empty($duplication)){
                $this->view('alumni/duplication', $duplication);
            }
            else{
                redirect('admin/alumni');
            }
            
        }
    }

    public function checkDept($dept){
        $dept_code = $this->alumniModel->getDepartmentByCode($dept);
        return $dept_code->id;
    }

    public function checkBatch($batch){
        $batch_year = $this->alumniModel->getBatchByYear($batch);
        return $batch_year->id;
    }

}