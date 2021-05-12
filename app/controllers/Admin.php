<?php 

    class Admin extends Controller {

        public function index(){
            redirect('admin/dashboard');
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