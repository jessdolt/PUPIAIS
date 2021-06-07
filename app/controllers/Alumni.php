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
        $this->userModel = $this->model('user');
        $alumni = $this->alumniModel->getAlumniById($id);
        $alumniUser = $this->userModel->singleAlumni($alumni->student_no);
        $referenceNo = rand(10000,99999);

        $mail = new PHPMailer();
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.gmail.com';
       
        $mail->Username = 'itechpup1@gmail.com';
        $mail->Password = 'PUPTest1';
        $mail->SMTPSecure = 'tls';
        $mail->Port = '587';

        $mail->isHTML();
       
        $mail->setFrom('itechpup1@gmail.com', 'PUP ITECH Administrator');

        $mail->addAddress($alumniUser->email);
        $mail->Subject = 'Login Credentials for PUPIAIS (Reference No. '.$referenceNo.')';

        $website = URLROOT;;
       

        $msg = '
                <p>Your Username is <strong>'.$alumni->email.'</strong></p>
                <p>Your Password is <strong>'.$alumniUser->password.'</strong></p>
                <p>You can access Talpakan website at <strong>'. $website.'</strong></p>
                ';
                
        $mail->Body = $msg;


        $mail->Priority = 1;
        $mail->addCustomHeader("X-MSMail-Priority: High");
        $mail->addCustomHeader("Importance: High");
       
        if($mail->Send()){
            if($this->userModel->updateSend($alumni->student_no)){
                redirect('admin/alumni');
            }
        }
        else{
            echo $mail->ErrorInfo;
        }
    }



        //Add Alumni
    public function add(){
            $this->userModel = $this->model('user');    
            $courses = $this->alumniModel->showCourses();

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
                    'course' => ($_POST['course']),
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
                    'course_error' => '',
                    'batch_error' => ''
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
                if (empty($data['course'])){
                    $data['course_error'] = "Please input the Alumni's Department";
                }
                if (empty($data['batch'])){
                    $data['batch_error'] = "Please input the Alumni's Batch";
                }

                // print_r($data);
                if (empty($data['student_no_error']) && empty($data['first_name_error']) && empty($data['last_name_error']) && empty($data['middle_name_error']) && empty($data['birth_date_error']) && empty($data['address_error']) && empty($data['city_error']) && empty($data['region_error']) && empty($data['postal_error']) && empty($data['contact_no_error']) && empty($data['email_error']) && empty($data['departmentError']) && empty($data['batchError'])){
                           $alumni_id = $this->alumniModel->addAlumni($data);
                            // $pass = '12345';
                            // $pass = password_hash($pass, PASSWORD_DEFAULT);
                            $pass = bin2hex(openssl_random_pseudo_bytes(5));
                            if(!empty($alumni_id)){
                                $newData = [
                                    'name' => $data['first_name'] . ' ' . substr($data['middle_name'], 0 ,1) . ' ' . $data['last_name'],
                                    'a_id' => $alumni_id,
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
            
                'department' => '',
                'courseCode' => $courses,
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
            
                'department_error' => '',
                'batch_error' => '',
            ];
        }
            $this->view('alumni/add', $data);
    }

    

    public function edit($id){
        $alumni = $this->alumniModel->getAlumniById($id);
        $batch = $this->alumniModel->showBatch();
        $courses = $this->alumniModel->showCourses();


        if($_SERVER['REQUEST_METHOD']=='POST') {
                
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
            
                'course' => ($_POST['course']),
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
            
                'batch' => $alumni->batchID,
                'year'  => $batch,
                'courseID' => $alumni->courseID,
                'course' => $courses
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

    public function delete() {
        $this->userModel = $this->model('user');
        if($_SERVER['REQUEST_METHOD'] == 'POST'){

            $todelete = $_POST['checkbox'];
            array_print($_POST);

            foreach($todelete as $alumni){
                foreach($alumni as $alumni_id => $id){
                    if($this->alumniModel->deleteAlumni($id)){
                        if($this->userModel->deleteUser($alumni_id)){
                            redirect('admin/alumni');
                        }
                        else{
                            die("Something went wrong!");
                        }
                    }
                }
            }
            // foreach ($todelete as $id) {

            //     if ($this->alumniModel->deleteAlumni($id)){
            //         redirect('admin/alumni');
            //     }
            //     else {
            //         die("There's an error deleting this record");
            //     }
            // }
        }
    }

    public function deleteRow($id) {
        $this->userModel = $this->model('user');

        if($this->alumniModel->deleteAlumni($id)){
                redirect('admin/alumni');   
        }
    }
    
    public function show($course_id,$batch_id){
        $this->groupModel = $this->model('group_model');

        // Get Page # in URL
        if (!isset($_GET['page'])) {
            $page = 1;
        } elseif($_GET['page'] == 0) {
            $page = 1;
        } else {
            $page = $_GET['page'];
        }

        // Limit row displayed
        $limit = 20;
        $start = ($page - 1) * $limit;

        $department = $this->alumniModel->showDepartment();
        $courses = $this->alumniModel->showCourses();
        $classification = $this->groupModel->showClassification();

        $alumniCountPerCourse = $this->alumniModel->alumniCountPerCourse();

        // $alumni = $this->alumniModel->getAlumniByClass($course_id,$batch_id);
        $course_name = $this->alumniModel->getCourseById($course_id);
        $batch_name = $this->alumniModel->getBatchById($batch_id);

        $newData = [
            'course_id' => $course_id,
            'batch_id' => $batch_id,
            'limit' => $limit,
            'start' => $start
        ];

        $alumniCount = $this->alumniModel->NoOfResultsFiltered($newData);
        $alumni = $this->alumniModel->getAlumniByClassIndex($newData);

        $total = count($alumniCount);
        $pages = ceil($total/$limit);

        $startFormula = $start + 1;
        $limitFormula = $startFormula - 1 + $limit;

        if($page == $pages) {
            if ($limitFormula >= $total) {
                $limitFormula = $total;
            }
        }

        if($total == 0) {
            $startFormula = 0;
            $limitFormula = 0;
        }


        $data = [
            'alumni' => $alumni,
            'department' => $department,
            'courses' => $courses,
            'classification' => $classification,
            'isPreview' => 0,
            'title' => $course_name->course_code,
            'batch' => $batch_name->year,
            'alumniCount' => count($alumniCount),
            'alumniPerCourse' => $alumniCountPerCourse,

            'start' => $startFormula,
            'limit' => $limitFormula,
            'total' => $total,
            'first' => '?page=1',
            'previous' => '?page=' . ($page == 1 ? '1' : $page - 1),
            'next' => '?page='. ($page == $pages ? $pages : $page + 1),
            'last' => '?page=' . $pages
        ];

        $this->view('admin_d/alumni', $data);
    }
    

    public function preview(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->groupModel = $this->model('group_model');
            $alumniCount = $this->alumniModel->showAlumni();
            $alumniCountPerCourse = $this->alumniModel->alumniCountPerCourse();
            $department = $this->alumniModel->showDepartment();
            $courses = $this->alumniModel->showCourses();
            $classification = $this->groupModel->showClassification();
            
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
            
            $data= [
                'alumni' => [],
                'courses' => $courses,
                'department' => $department,
                'classification' => $classification,
                'alumniList' => $alumniList,
                'isPreview' => 1,
                'fileName' => $fileRealName,
                'title' => 'All Alumni',
                'batch' => '',
                'alumniCount' => count($alumniCount),
                'alumniPerCourse' => $alumniCountPerCourse
            ];

          $this->view('admin_d/alumni', $data);
        }        
    }


    public function previeww($course_id,$batch_id){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->groupModel = $this->model('group_model');

            $alumniCount = $this->alumniModel->showAlumni();
            $alumniCountPerCourse = $this->alumniModel->alumniCountPerCourse();
            $department = $this->alumniModel->showDepartment();
            $classification = $this->groupModel->showClassification();
            $courses = $this->alumniModel->showCourses();
           $course_name = $this->alumniModel->getCourseById($course_id);
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
            
            $data= [
                'alumni' => [],
                'department' => $department,
                'courses' => $courses,
                'classification' => $classification,
                'alumniList' => $alumniList,
                'isPreview' => 1,
                'fileName' => $fileRealName,
                'title' => $course_name->course_code,
                'batch' => $batch_name->year,
                'alumniCount' => count($alumniCount),
                'alumniPerCourse' => $alumniCountPerCourse   
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
                $data['course'] = $this->checkCourse($data['course']);
                $data['batch'] = $this->checkBatch($data['batch']);
                //array_print($data);
                
              
                if($this->alumniModel->checkAlumni($data['student_no'])){
                    array_push($duplication, $data);
                }

                else{
                    $alumni_id = $this->alumniModel->addBulkAlumni($data);
                    $pass = bin2hex(openssl_random_pseudo_bytes(5));
                    if(!empty($alumni_id)){
                        $newData = [
                            'name' => $data['first_name'] . ' ' . substr($data['middle_name'], 0 ,1) . ' ' . $data['last_name'],
                            'a_id' => $alumni_id,
                            'email' => $data['email'],
                            'password' => $pass,
                            'user_type' => 2
                        ];
                        $this->userModel->register($newData);
                    } 
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

    public function checkCourse($code){
        $course_code = $this->alumniModel->getCourseByCode($code);
        return $course_code->id;
    }

    public function checkBatch($batch){
        $batch_year = $this->alumniModel->getBatchByYear($batch);
        return $batch_year->id;
    }

}