<?php 

    class Users extends Controller{
        public function __construct(){
            $this->userModel = $this->model('user');
        }

        public function index(){
            $data = [];
            $this->view('users/index', $data);
        }

        public function register(){
            $user_types = $this->userModel->getUserTypes();

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                
                $data = [
                    'fName' => trim($_POST['fName']),
                    'email' => trim ($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'user_type' => $_POST['user_type'],
                    'fName_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'user_type_err' => ''
                ];  

                if(empty($data['fName'])){
                    $data['fName_err'] = 'Please your full name.';
                }

                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter your email';
                }
                else{

                }


                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter password';
                } elseif (strlen($data['password']) < 3){
                    $data['password_err'] = 'Password must be at least 3 characters';
                }

                if(empty($data['confirm_password'])){
                    $data['confirm_password_err'] = 'Please enter confirm password';
                }
                else{
                    if($data['password'] != $data['confirm_password']){
                        $data['confirm_password_err'] = 'Passwords do not match';
                    }
                }

                if(empty($data['email_err']) && empty($data['fName_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['user_type_err'])){
                    //Hash password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);  
            
                     if($this->userModel->register($data)){
                        redirect('users/index');
                     }
                     else{
                         die('Something went wrong!');
                     }
                } 

                else{
                    $data['user_type'] = $user_types;
                    $this->view('users/register',$data);
                }

            }

            else{
                $data = [
                    'fName' => '',
                    'email' =>'',
                    'password' => '',
                    'confirm_password' => '',
                    'user_type' => $user_types,
                    'fName_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'user_type_err' => ''
                ];
            }

            $this->view('users/register',$data);
        }

        public function login() {
            $data = [
                'email' => '',
                'password' => '',
                'emailError' => '',
                'passwordError' => ''
            ];
    
            //Check for post
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                //Sanitize post data
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                $data = [
                    'email' => trim($_POST['email']),
                    'password' => trim($_POST['password']),
                    'emailError' => '',
                    'passwordError' => '',
                ];
              
                
                //Validate email
                if (empty($data['email'])) {
                    $data['emailError'] = 'Please enter an email.';
                }
    
                //Validate password
                if (empty($data['password'])) {
                    $data['passwordError'] = 'Please enter a password.';
                } 
                
    
                //Check if all errors are empty
                if (empty($data['emailError']) && empty($data['passwordError'])) {
                    $loggedInUser = $this->userModel->login($data['email'], $data['password']);
    
                    if ($loggedInUser) {
                        $this->createUserSession($loggedInUser);
                    }
                    else {
                        $data['passwordError'] = 'Password or email is incorrect. Please try again.';
                    }
                }
    
            } else {
                $data = [
                    'email' => '',
                    'password' => '',
                    'emailError' => '',
                    'passwordError' => ''
                ];
            }
            
            $this->view('users/login', $data);
        }
        
        public function forgotPassword() {

            $data = [
                'code' => '',
                'codeError' => '',
            ];
    
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                $data = [
                    'email' => trim($_POST['email']),
                    'emailError' => '',
                    'codeError' => ''
                ];
    
                if (empty($data['email'])) {
                    $data['emailError'] = 'Please enter your email.';
                } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                    $data['emailError'] = 'Please enter the correct format.';
                } else {
    
                        session_start();
                        $_SESSION['email'] = $data['email'];
    
                        //SEND EMAIL CODE
                        if ($this->userModel->findUserByEmail($data['email'])) {
    
                            $expires = date("U") + 300;
                            $token = bin2hex(rand(111111, 999999));
                            $code = rand(111111, 999999);
    
                            $data = [
                                'email' => $data['email'],
                                'token' => $token,
                                'code' => $code,
                                'expires' => $expires
                            ];
    
                            $this->userModel->findEmailDuplicate($data['email']);
                            $this->userModel->forgot($data);
            
                            $to = $data['email'];
                            $subject = "Password Reset Code";
                            $message = "If you requested a password reset for $to, use the confirmation code below to complete the process. If you didn't make this request, ignore this email.\r\n";
                            $message .= "Your password reset code is $code\r\n";
                            $message .= "This code will expire in 5 minutes.";
                            $sender = "From: dpagayon15@gmail.com";
            
                            if(mail($to, $subject, $message, $sender)){
    
                                $_SESSION['token'] = $token;
                                redirect('users/emailVerification');
    
                            } else {
                                $data['emailError'] = "Something went wrong.";
                            }
            
                        } else {
                            $data['emailError'] = 'Email does not exist';
                        }
                }
    
    
            } else {
                $data = [
                    'email' => '',
                    'code' => '',
                    'emailError' => '',
                ];
            }
    
            $this->view('users/forgotPassword', $data);
        }

        public function resend() {

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
    
                if ($this->userModel->findUserByEmail($_SESSION['email'])) {
    
                    $expires = date("U") + 300;
                    $token = bin2hex(rand(111111, 999999));
                    $code = rand(111111, 999999);
    
                    $data = [
                        'email' => $_SESSION['email'],
                        'token' => $token,
                        'code' => $code,
                        'expires' => $expires
                    ];
    
                    $this->userModel->findEmailDuplicate($data['email']);
                    $this->userModel->forgot($data);
    
                    $to = $_SESSION['email'];
                    $subject = "Password Reset Code";
                    $message = "If you requested a password reset for $to, use the confirmation code below to complete the process. If you didn't make this request, ignore this email.\r\n";
                    $message .= "Your password reset code is $code\r\n";
                    $message .= "This code will expire in 5 minutes.";
                    $sender = "From: dpagayon15@gmail.com";
    
                    if(mail($to, $subject, $message, $sender)){
    
                        $_SESSION['token'] = $token;
                        redirect('users/emailVerification');
    
                    } else {
                        $data['codeError'] = "Something went wrong.";
                    }
    
                } else {
                    $data['emailError'] = 'Email does not exist';
                }
            }
        }

        public function emailVerification() {
    
            $data = [
                'code' => '',
                'token' => $_SESSION['token'],
                'codeError' => ''
            ];
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                $data = [
                    'code' => $_POST['code'],
                    'token' => $_SESSION['token'],
                    'codeError' => ''
                ];
    
                if(empty($data['code'])) {
                    $data['codeError'] = 'Please enter your code.';
                }
    
                if(empty($data['codeError'])) {
    
                    if ($this->userModel->findCode($data)) {
                        redirect('users/forgotNewPassword');
    
                    } else {
                        $data['codeError'] = 'Your code is invalid or expired';
                    }
                    
                }
    
            } else {
                $data = [
                    'email' => '',
                    'code' => '',
                    'codeError' => ''
                ];
            }

            if(!isset($_SESSION['email'])) {
                redirect('users/forgotPassword');
            }
            
            $this->view('users/emailVerification', $data);
        }

        public function forgotNewPassword() {
            $data = [
                'password' => '',
                'confirmPassword' => '',
                'passwordError' => '',
                'confirmPasswordError' => ''
            ];
    
            if($_SERVER['REQUEST_METHOD'] == "POST") {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    
                $data = [
                    'email' => $_SESSION['email'],
                    'password' => trim($_POST['password']),
                    'confirmPassword' => trim($_POST['confirmPassword']),
                    'passwordError' => '',
                    'confirmPasswordError' => ''
                ];
    
                $passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";
    
                // Validate password on length, numeric values,
                if(empty($data['password'])){
                    $data['passwordError'] = 'Please enter password.';
                  } elseif(strlen($data['password']) < 6){
                    $data['passwordError'] = 'Password must be at least 8 characters';
                  } elseif (preg_match($passwordValidation, $data['password'])) {
                    $data['passwordError'] = 'Password must be have at least one numeric value.';
                  }
      
                  //Validate confirm password
                   if (empty($data['confirmPassword'])) {
                      $data['confirmPasswordError'] = 'Please enter password.';
                  } else {
                      if ($data['password'] != $data['confirmPassword']) {
                      $data['confirmPasswordError'] = 'Passwords do not match, please try again.';
                      }
                  }
    
                  // Make sure that errors are empty
                if (empty($data['passwordError']) && empty($data['confirmPasswordError'])) {
    
                    // Hash password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
    
                    //Register user from model function
                    if ($this->userModel->newPassword($data)) {
                        $this->userModel->deleteRequest($data['email']);
                        //Redirect to the login page
                        session_destroy();
                        redirect('users/login');
                    } else {
                        die('Something went wrong.');
                    } 
                }
    
            } else {
                $data = [
                    'password' => '',
                    'confirmPassword' => '',
                    'passwordError' => '',
                    'confirmPasswordError' => ''
                ];
            }

            if(!isset($_SESSION['email']) && !isset($_SESSION['token'])) {
                redirect('users/forgotPassword');
            }
    
            $this->view('users/forgotNewPassword', $data);
        }

        public function createUserSession($user) {
            $newUser = $this->userModel->forSession($user);
            $_SESSION['id'] = $newUser->user_id;
            $_SESSION['email'] = $newUser->email;
            $_SESSION['name'] = $newUser->name;
            $_SESSION['student_no'] = $newUser->student_no;
            $_SESSION['alumni_id'] = $newUser->a_id;
            $_SESSION['user_type'] = $newUser->user_control;
            $_SESSION['image'] = $newUser->image;
            
            if ($_SESSION['user_type'] == "Admin" || $_SESSION['user_type'] == "Content Creator") {
                redirect('admin/dashboard');
            } else {
                redirect('pages');
            }

        }

        public function logout() {
            unset($_SESSION['id']);
            unset($_SESSION['email']);
            unset($_SESSION['name']);
            unset($_SESSION['alumni_id']);
            unset($_SESSION['student_no']);
            unset($_SESSION['user_type']);
            session_destroy();
            
            redirect('users/login');

        }

        public function edit($id){
            $user_types = $this->userModel->getUserTypes();
            $user = $this->userModel->singleUser($id);

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
                
                $data = [
                    'fName' => trim($_POST['fName']),
                    'email' => trim ($_POST['email']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),
                    'user_type' => $_POST['user_type'],
                    'fName_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'user_type_err' => ''
                ];  

                if(empty($data['fName'])){
                    $data['fName_err'] = 'Please your full name.';
                }

                if(empty($data['email'])){
                    $data['email_err'] = 'Please enter your email';
                }
                else{

                }


                if(empty($data['password'])){
                    $data['password_err'] = 'Please enter password';
                } elseif (strlen($data['password']) < 3){
                    $data['password_err'] = 'Password must be at least 3 characters';
                }

                if(empty($data['confirm_password'])){
                    $data['confirm_password_err'] = 'Please enter confirm password';
                }
                else{
                    if($data['password'] != $data['confirm_password']){
                        $data['confirm_password_err'] = 'Passwords do not match';
                    }
                }

                if(empty($data['email_err']) && empty($data['fName_err']) && empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['user_type_err'])){
                    //Hash password
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);  
            
                     if($this->userModel->edit($data)){
                        redirect('users/index');
                     }
                     else{
                         die('Something went wrong!');
                     }
                } 

                else{
                    $data['user_type'] = $user_types;
                    $this->view('users/edit',$data);
                }

            }

            else{
                $data = [
                    'fName' => $user->name,
                    'email' => $user->email,
                    'password' => $user->password,
                    'confirm_password' => $user->password,
                    'user_type' => $user_types,
                    'fName_err' => '',
                    'email_err' => '',
                    'password_err' => '',
                    'confirm_password_err' => '',
                    'user_type_err' => ''
                ];
            }

            $this->view('users/edit',$data);
        }


        public function delete($id){
            if($this->userModel->deleteUser($id)){
                redirect('users');
            }
            else{
                die("There's an error deleting this record");
            }
        }
    }