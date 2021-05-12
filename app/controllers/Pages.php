<?php

class Pages extends Controller{
    public function __construct(){
        if (!isLoggedIn()) {
            redirect('users/login');
        }
    }
    
    public function index(){
        if (isLoggedIn()) {
            if (userType() == "Admin") {
                redirect('admin/dashboard');
            } elseif (userType() == "Alumni") {
                redirect('pages/home');
            } elseif (userType() == "Content Creator") {
                redirect('admin/dashboard');
            }
        }


    }

    public function home() {
        if (isLoggedIn()) {
            $data = [
                'title' => 'Homepage'
            ]; 
            $this->view('pages/home' ,$data);
        }

    }


    public function login(){
        $data = [
            'title' => 'Login'
        ];
        $this->view('users/login',$data);
    }

}