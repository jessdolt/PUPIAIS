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

        public function users(){
            $this->alumniModel = $this->model('alumni_model');
            $data = $this->alumniModel->showAlumni();
            $dep  = $this->alumniModel->showDepartment(); 
            $year = $this->alumniModel->showYear();
            $this->view('admin_d/users', $data, $dep, $year);
        }

        public function events(){
            $this->eventModel = $this->model('Event');
            $events = $this->eventModel->showEvent();
            $this->view('admin_d/events', $events);
        }

        public function news() {
            $this->postModel = $this->model('post');
            $data = $this->postModel->showNews();
            $this->view('admin_d/news', $data);
        }

        public function job_portal() {
            $this->jobModel = $this->model('job_portal');
            $data = $this->jobModel->showJobs();
            $this->view('admin_d/job_portal', $data);
        }


        


    }