<?php

    class Profile extends Controller {
        public function __construct() {
            $this->userModel = $this->model('user');
  
            if($this->getID() == $_SESSION['alumni_id'] || $_SESSION['user_type'] == "Admin") {
                
            }else {
                redirect('pages/home');
            }

        }

        public function getID() {
            $url= rtrim($_GET['url'],'/');
            $url= explode('/', $url);
            return $url[2];
        }

        public function viewProfile($id) {
            $user = $this->userModel->singleUser($id);

            $data = [
                'user' => $user
            ];

            $this->view('users/viewProfile', $data);
        }


        public function editProfile($id) {

            $user = $this->userModel->singleUser($id);

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
                                redirect('profile//'.$_SESSION['alumni_id']);
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
                    'file_error' => ''
                ];
    
            }
    
            $this->view('users/editProfile', $data);

        }

        public function changePassword($id) {

            if($_SESSION['alumni_id'] != $this->getID()) {
                redirect('pages/home');
            }

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
    }