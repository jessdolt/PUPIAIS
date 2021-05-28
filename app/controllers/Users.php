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

        public function createUserSession($user) {
            $newUser = $this->userModel->forSession($user);
            $_SESSION['id'] = $newUser->user_id;
            $_SESSION['email'] = $newUser->email;
            $_SESSION['name'] = $newUser->name;
            $_SESSION['user_type'] = $newUser->user_control;

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
            unset($_SESSION['user_type']);
            session_destroy();
            header('location:' . URLROOT . '/users/login');
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
