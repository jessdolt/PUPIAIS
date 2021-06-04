<?php

    class Profile extends Controller {
        public function __construct() {
            $this->userModel = $this->model('user');
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
                                redirect('profile/viewProfile/'.$_SESSION['alumni_id']);
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
    }