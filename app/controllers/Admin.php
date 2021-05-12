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
            $data=[];
            $this->view('admin_d/users', $data);
        }

        public function events(){
            $this->eventModel = $this->model('Event');
            $events = $this->eventModel->showEvent();
            $this->view('admin_d/events', $events);
        }

<<<<<<< HEAD
        public function job_portal(){
            $this->jobModel = $this->model('job_portal');
            $job_portal = $this->jobModel->showJobs();
            $this->view('admin_d/job_portal',$job_portal);
        }
=======
        public function news() {
            $this->postModel = $this->model('post');
            $data = $this->postModel->showNews();
            $this->view('admin_d/news', $data);
        }


>>>>>>> news
        


    }