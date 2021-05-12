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
/*     public function email($id){
        $alumni = $this->alumniModel->getAlumniById($id);
        
        $mail = new PHPMailer();
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'ssl';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '465';
        $mail->isHTML();
        $mail->Username = 'tueres.gilmer@gmail.com';
        $mail->Password = 'Echonek0';
        $mail->setFrom('meepmeerpp@idk.com');
        $mail->Subject = 'LMAOLMAO?'  ;
        $mail->Body = 'ello bubu this yo password '.$alumni->userPassword;
        $mail->addAddress($alumni->email);
        $mail->Send();

        redirect('alumni');

    } */


        //Add Alumni
        public function add(){
                $code = $this->alumniModel->selectDepartmentCode();
                
            if($_SERVER['REQUEST_METHOD']=='POST') {
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                $pass = rand();
                $pass = password_hash($pass, PASSWORD_DEFAULT);
                $data = [
                    'userType' => 'alumni',
                    'studentID' => ($_POST['studentID']),
                    'userPassword' => $pass,
                    'firstName' => ($_POST['firstName']),
                    'lastName' => ($_POST['lastName']),
                    'midInitial' => ($_POST['midInitial']),
                    'gender' => ($_POST['gender']),
                    'birthDate' => ($_POST['birthDate']),
                    'address' => ($_POST['address']),
                    'contactNum' => ($_POST['contactNum']),
                    'email' => ($_POST['email']),
                    'employment' => ($_POST['employment']),
                    'department' => ($_POST['department']),
                    'batch' => ($_POST['batch']),
                    'studentIDError' => '',
                    'firstNameError' => '',
                    'lastNameError' => '',
                    'midInitialError' => '',
                    'genderError' => '',
                    'birthDateError' => '',
                    'addressError' => '',
                    'contactNumError' => '',
                    'emailError' => '',
                    'employmentError' => '',
                    'departmentError' => '',
                    'batchError' => '',
                ];

                if (empty($data['studentID'])){
                    $data['studentIDError'] = 'Please enter the student ID';
                }
                if (empty($data['firstName'])){
                    $data['firstNameError'] = "Please enter the Alumni's First Name";
                }
                if (empty($data['lastName'])){
                    $data['lastNameError'] = "Please enter the Alumni's Last Name";
                }
                if (empty($data['midInitial'])){
                    $data['midInitialError'] = "Please enter the Alumni's Middle Initial";
                }

                if (empty($data['birthDate'])){
                    $data['birthDateError'] = "Please input the Alumni's Birth Date";
                }
                if (empty($data['address'])){
                    $data['addressError'] = "Please input the Alumni's Address";
                }
                if (empty($data['contactNum'])){
                    $data['contactNumError'] = "Please input the Alumni's Contact Number";
                }
                if (empty($data['email'])){
                    $data['emailError'] = "Please input the Alumni's Email Address";
                }
                if (empty($data['employment'])){
                    $data['employmentError'] = "Please input the Alumni's employment status";
                }
                if (empty($data['department'])){
                    $data['departmentError'] = "Please input the Alumni's Department";
                }
                if (empty($data['batch'])){
                    $data['batchError'] = "Please input the Alumni's Batch";
                }

                print_r($data);
                if (empty($data['studentIDError']) && empty($data['firstNameError']) && empty($data['lastNameError']) && empty($data['midInitialError'])  && empty($data['birthDateError']) && empty($data['addressError']) && empty($data['contactNumError']) && empty($data['emailError']) && empty($data['employmentError']) && empty($data['departmentError']) && empty($data['batchError'])){
                        if($this->alumniModel->addAlumni($data)){
                            redirect('alumni');
                        }
                        else {
                            die("you wronk");
                        }
                    }
                else{
                    /* $this->alumniModel->addAlumni($data); */
                    $this->view('alumni/add', $data);
                }
        }
        else {
            
            $data = [
                'userType' => '',
                'studentID' => '',
                'userPassword' => '',
                'firstName' => '',
                'lastName' => '',
                'midInitial' => '',
                'gender' => '',
                'birthDate' => '',
                'address' => '',
                'contactNum' => '',
                'email' => '',
                'employment' => '',
                'department' => '',
                'departmentCode' => $code,
                'batch' => '',
                'studentIDError' => '',
                'firstNameError' => '',
                'lastNameError' => '',
                'midInitialError' => '',
                'genderError' => '',
                'birthDateError' => '',
                'addressError' => '',
                'contactNumError' => '',
                'emailError' => '',
                'employmentError' => '',
                'departmentError' => '',
                'batchError' => '',
            ];
        }
            $this->view('alumni/add', $data);
    }

    //add batch
    public function batch(){

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $data = [
                'batch' => ($_POST['batch']),
                'batchError' => '',
            ];

            if (empty($data['batch'])){
                $data['batchError'] = "Please input the batch";
            }
            else {
                $this->alumniModel->addBatch($data);
            }
        }

        else{
            $data = [
                'batch' => '',
                'batchError' => ''
            ];
        }


        $this->view('alumni/batch', $data);
    }

    //Add Department
    public function department(){

        if($_SERVER['REQUEST_METHOD']=='POST'){
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            
            $data = [

                'department' => ($_POST['department']),
                'departmentCode' => ($_POST['departmentCode']),
                'departmentError' => '',
                'departmentCodeError' => ''
            ];

            if (empty($data['department'])){
                $data['departmentError'] = "Please input the name of the department";
            }
            
            if (empty($data['departmentCode'])){
                $data['departmentCodeError'] = "Please input the code of the department";
            }

            print_r($data);
            if(empty($data['departmentError']) && empty($data['departmentCodeError'])){
                if($this->alumniModel->addDepartment($data)){
                    redirect('alumni');
                }
                else{
                    die('something went wrong');
                }
            }
        }
        else{
            $data = [
                'department' => '',
                'departmentCode' => '',
                'departmentError' => '',
                'departmentCodeError' => ''
            ];
        }


        $this->view('alumni/department', $data);
    }


    public function edit($id){
        $alumni = $this->alumniModel->getAlumniById($id);

        if($_SERVER['REQUEST_METHOD']=='POST') {
            $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
            $data = [

                'id' => $id,
                'firstName' => ($_POST['firstName']),
                'lastName' => ($_POST['lastName']),
                'midInitial' => ($_POST['midInitial']),
                'birthDate' => ($_POST['birthDate']),
                'address' => ($_POST['address']),
                'contactNum' => ($_POST['contactNum']),
                'email' => ($_POST['email']),
                'employment' => ($_POST['employment']),

            ];

            print_r($data);
            $this->alumniModel->editAlumni($data);
        }
        
        else   {

            $data = [
                'id' => $id,
                'firstName' => $alumni->firstName,
                'lastName' => $alumni->lastName,
                'midInitial' => $alumni->midInitial,
                'birthDate' => $alumni->birthDate,
                'address' => $alumni->address,
                'contactNum' => $alumni->contactNum,
                'email' => $alumni->email,
                'employment' => $alumni->employment,
            ];
    
        }
            
    $this->view('alumni/edit', $data);
    }

    public function delete($id) {
        if($this->alumniModel->deleteAlumni($id)){
            redirect('admin/users');
        }
    }
    
    public function tables($id){
        $alumni = $this->alumniModel->getAlumniById($id);
 
        $data = [
            'alumni' => $alumni,
        ];

        $this->view('alumni/tables', $data);
    }
    

}