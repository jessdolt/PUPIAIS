<?php 

    class Admin extends Controller {

        public function __construct() {

            if (!isLoggedIn()) {
                redirect('users/login');
            }

            if (!isAdmin()) {
                redirect('pages/home');
            }

        }

        public function index(){

        }

        public function dashboard(){
            $data = [];
            $this->view('admin_d/dashboard', $data);
        }

        public function events(){
            $data = [];
            $this->view('admin_d/events', $data);
        }

        public function news() {
            $this->postModel = $this->model('post');
            $data = $this->postModel->showNews();
            $this->view('admin_d/news', $data);
        }


        
    }