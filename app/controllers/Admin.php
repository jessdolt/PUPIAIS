<?php 

    class Admin extends Controller {

        public function __contstruct() {
            if (!isLoggedIn()) {
                redirect('users/login');
            }
        }

        public function index(){
            if (isAdmin()) {
                redirect('admin_d/dashboard');
            } else {
                redirect('pages/home');
            }

        }

        public function dashboard(){
            $data = [];
            $this->view('admin_d/dashboard', $data);
        }

        public function events(){
            $data = [];
            $this->view('admin_d/events', $data);
        }

        
    }