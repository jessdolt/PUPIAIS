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

        public function users(){
            $data=[];
            $this->view('admin_d/users', $data);
        }

        public function events(){
            $this->eventModel = $this->model('Event');
            $events = $this->eventModel->showEvent();
            $this->view('admin_d/events', $events);
        }

        public function job_portal(){
            $this->jobModel = $this->model('job_portal');
            $job_portal = $this->jobModel->showJobs();
            $this->view('admin_d/job_portal',$job_portal);
        }
        


    }