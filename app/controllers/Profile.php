<?php

    class Profile extends Controller {
        public function __construct() {
            $this->userModel = $this->model('user');
  
            if(getProfileID() == $_SESSION['alumni_id'] || $_SESSION['user_type'] == "Admin") {
                
            } else {
                redirect('pages/home');
            }

        }

        function accountPass() {
            //REDIRECT ANYONE WHO IS NOT THE USER
            if ($_SESSION['alumni_id'] != getProfileID()) {
                redirect('pages/home');
            }
        }

        public function viewProfile($id) {
            $user = $this->userModel->singleUser($id);
            $data = [
                'user' => $user,
            ];

            $this->view('users/viewProfile', $data);
        }

        public function editProfile($id) {
            $this->accountPass();

            $user = $this->userModel->singleUser($id);
            $accInfo = $this->userModel->singleAcc($id);

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
    
                $file = $_FILES['fileUpload'];
                $isUploaded = $_POST['isUploaded'];
    
                $data = [
                    'alumni_id' => $id,
                    'file' => $user->image,
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
                    'accInfo' => $accInfo,
                    'file_error' => ''
                ];
    
                $filename = $file['name'];
                $fileTmpName = $file['tmp_name'];
                $fileSize = $file['size'];
                $fileError = $file['error'];
                $fileType = $file['type'];
              
                $fileExt = explode ('.',$filename);
                $fileActualExt = strtolower(end($fileExt));
                $allowed = array('jpg', 'jpeg', 'png');
    
                if(in_array($fileActualExt, $allowed) && $isUploaded == 1){
                    if( $fileError === 0){
                        if($fileSize < 1000000){        
                            $fileNameNew = uniqid('',true).".".$fileActualExt;
                            $target = "uploads/". basename($fileNameNew);
                            move_uploaded_file($fileTmpName, $target);
                            $data['file'] = $fileNameNew;
                        } else{
                            $data['file_error'] = 'File too big';
                        }
                    } else{
                        $data['file_error'] = 'File Size too big. Maximum of 1mb only';
                    }
                } elseif($isUploaded == 1){
                    $data['file_error'] = 'There was a problem in uploading the file';
                }
    
                if(empty($data['file_error'])) {
                    if($this->userModel->editProfile($data, $isUploaded)) {
                        
                        $newData = [
                            'verify' => 'YES',
                            'alumni_id' => $_SESSION['alumni_id']
                        ];
                        $this->userModel->accVerified($newData);
                        
                        if ($data['employment'] == 'Unemployed') {
                            redirect('profile/viewProfile/'.$_SESSION['alumni_id']);
                        } else {
                            if ($this->userModel->additionalVerify($_SESSION['alumni_id'])) {
                                redirect('profile/viewProfile/'.$_SESSION['alumni_id']);
                            } else {
                                //ADDITIONAL INFORMATION
                                redirect('profile/profileAdditionalAdd/'.$_SESSION['alumni_id']);
                            }
                        }

                    } else {
                        die("Something went wrong");
                    }
                } else {
                    $this->view('users/viewProfile/'.$_SESSION['alumni_id'], $data);
                }
    
            } else {
    
                $data = [
                    'alumni_id' => $id,
                    'file' => $user->image,
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'middle_name' => $user->middle_name,
                    'gender' => $user->gender,
                    'birth_date' => $user->birth_date,
                    'address' => $user->address,
                    'city' => $user->city,
                    'region' => $user->region,
                    'postal' => $user->postal,
                    'contact_no' => $user->contact_no,
                    'email' => $user->email,
                    'employment' => $user->employment,
                    'accInfo' => $accInfo,
                    'file_error' => ''
                ];
    
            }
    
            $this->view('users/editProfile', $data);

        }

        public function changePassword($id) {

        $this->accountPass();

            $data = [
                'alumni_id' => $id,
                'email' => '',
                'oldPassword' => '',
                'password' => '',
                'confirmPassword' => '',
                'oldPassword_error' => '',
                'password_error' => '',
                'confirmPassword_error' => ''
            ];
    
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                $data = [
                    'alumni_id' => $id,
                    'email' => $_SESSION['email'],
                    'oldPassword' => trim($_POST['oldPassword']),
                    'password' => trim($_POST['password']),
                    'confirmPassword' => trim($_POST['confirmPassword']),
                    'oldPassword_error' => '',
                    'password_error' => '',
                    'confirmPassword_error' => ''
                ];
    
                $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";
    
                if(empty($data['oldPassword'])) {
                    $data['oldPassword_error'] = 'Please enter your current password.';
                }
    
                // Validate password on length, numeric values,
                if(empty($data['password'])){
                    $data['password_error'] = 'Please enter password.';
                } elseif(strlen($data['password']) < 7){
                    $data['password_error'] = 'Password must be at least 8 characters';
                } elseif (preg_match($passwordValidation, $data['password'])) {
                    $data['password_error'] = 'Password must be have at least one numeric value.';
                }
    
                //Validate confirm password
                if (empty($data['confirmPassword'])) {
                    $data['confirmPassword_error'] = 'Please enter password.';
                } else {
                    if ($data['password'] != $data['confirmPassword']) {
                    $data['confirmPassword_error'] = 'Passwords do not match, please try again.';
                    }
                }
    
                if(empty($data['oldPassword_error']) && empty($data['password_error']) && empty($data['confirmPassword_error'])) {
    
                    if ($this->userModel->checkOldPassword($data)) {
                        
                        // Hash password
                        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    
                        $this->userModel->newPassword($data);
                        redirect('pages/home');
                        
                    } else {
                        $data['oldPassword_error'] = 'Your old password doesn\'t match';
                    }
                }
    
            }
    
            $this->view('users/changePassword', $data);
            
        }

        public function profileAdditionalAdd($id) {
            $this->accountPass();
            $user = $this->userModel->singleUser($id);
            if ($user->employment == 'Employed') {
                // If there is a record in employment
                if($this->userModel->additionalVerify($id) == true) {
                    redirect('profile/profileAdditionalEdit'.$id);
                } else {
                    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
                        $file = $_FILES['newsImageInput'];
        
                        $data = [
                            'alumni_id' => $_SESSION['alumni_id'],
                            'gDate' => $_POST['gDate'],
                            'eDate' => $_POST['eDate'],
                            'ceDate' => $_POST['ceDate'],
                            'tWork' => $_POST['tWork'],
                            'wPosition' => $_POST['wPosition'],
                            'mIncome' => $_POST['mIncome'],
                            'ifRelated' => $_POST['ifRelated'],
                            'file' => '',
                            'file_error' => ''
        
                        ];
        
                        $filename = $file['name'];
                        $fileTmpName = $file['tmp_name'];
                        $fileSize = $file['size'];
                        $fileError = $file['error'];
                        $fileType = $file['type'];
        
                        $fileExt = explode ('.',$filename);
                        $fileActualExt = strtolower(end($fileExt));
                        $allowed = array('jpg','jpeg', 'png');
        
                        if(in_array($fileActualExt, $allowed)){
                            if( $fileError === 0){
                                if($fileSize < 1000000){        
                                    $fileNameNew = uniqid('',true).".".$fileActualExt;
                                    $target = "uploads/". basename($fileNameNew);
                                    move_uploaded_file($fileTmpName, $target);
                                    $data['file'] = $fileNameNew;
                                }
                            } else {
                                $data['file_error'] = 'File Size too big. Maximum of 1mb only';
                            }
                        } else {
                            $data['file_error'] = 'There was a problem in uploading the file';
                        }
        
                        if(empty($data['file_error']) && empty($data['gDate_error'])){
                            if($this->userModel->profileAdditionalAdd($data)){
                                redirect('profile/viewProfile/'.$_SESSION['alumni_id']);
                            }
                            else{
                                die("Something went wrong");
                            } 
                        } else{
                            $this->view('users/additionalProfileAdd', $data);
                        }
                    }
                    else{
                        $data = [
                            'gDate' => '',
                            'eDate' => '',
                            'ceDate' => '',
                            'tWork' => '',
                            'wPosition' => '',
                            'mIncome' => '',
                            'ifRelated' => '',
                            'file' => '',
                            'file_error' => ''
                        ];
                    }
                    
                    $this->view('users/additionalProfileAdd', $data);
                }

            }
            else {
                redirect('profile/editProfile/'.$id);
            }
        }

        public function profileAdditionalEdit($id) {
            $this->accountPass();
            $user = $this->userModel->singleUser($id);
    
            if ($user->employment == 'Employed') {

                if($this->userModel->additionalVerify($id)) {

                    $employment = $this->userModel->employment($id);

                    if($_SERVER['REQUEST_METHOD'] == 'POST'){

                        
        
                        $file = $_FILES['newsImageInput'];
        
                        $data = [
                            'alumni_id' => $_SESSION['alumni_id'],
                            'gDate' => $_POST['gDate'],
                            'eDate' => $_POST['eDate'],
                            'ceDate' => $_POST['ceDate'],
                            'tWork' => $_POST['tWork'],
                            'wPosition' => $_POST['wPosition'],
                            'mIncome' => $_POST['mIncome'],
                            'ifRelated' => $_POST['ifRelated'],
                            'file' => '',
                            'file_error' => ''
        
                        ];
        
                        $filename = $file['name'];
                        $fileTmpName = $file['tmp_name'];
                        $fileSize = $file['size'];
                        $fileError = $file['error'];
                        $fileType = $file['type'];
        
                        $fileExt = explode ('.',$filename);
                        $fileActualExt = strtolower(end($fileExt));
                        $allowed = array('jpg','jpeg', 'png');
        
                        if(in_array($fileActualExt, $allowed)){
                            if( $fileError === 0){
                                if($fileSize < 1000000){        
                                    $fileNameNew = uniqid('',true).".".$fileActualExt;
                                    $target = "uploads/". basename($fileNameNew);
                                    move_uploaded_file($fileTmpName, $target);
                                    $data['file'] = $fileNameNew;
                                }
                            } else {
                                $data['file_error'] = 'File Size too big. Maximum of 1mb only';
                            }
                        } else {
                            $data['file_error'] = 'There was a problem in uploading the file';
                        }
        
                        if(empty($data['file_error']) && empty($data['gDate_error'])){
                            if($this->userModel->profileAdditionalEdit($data)){
                                redirect('profile/viewProfile/'.$_SESSION['alumni_id']);
                            }
                            else{
                                die("Something went wrong");
                            } 
                        } else{
                            $this->view('users/additionalProfileEdit', $data);
                        }
                    }

                    else{
                        $data = [
                            'gDate' => $employment->graduation,
                            'eDate' => $employment->first_employment,
                            'ceDate' => $employment->current_employment,
                            'tWork' => $employment->type_of_work,
                            'wPosition' => $employment->work_position,
                            'mIncome' => $employment->monthly_income,
                            'ifRelated' => $employment->if_related,
                            'file' => $employment->company_id,
                            'file_error' => ''
                        ];
                    }
                    
                    $this->view('users/additionalProfileEdit', $data);

                } else {
                    redirect('profile/additionalProfileAdd'.$_SESSION['alumni_id']);
                }
    

            }
            else {
                redirect('profile/viewProfile/'.$id);
            }
        }



    }