<?php

class Pages extends Controller{
    public function __construct(){

    }
    
    public function index(){

        if (!isLoggedIn()) {
            redirect('users/login');
        }

    }

    public function home() {

            $data = [
                'title' => 'Homepage'
            ]; 
            $this->view('pages/home' ,$data);
    }


    public function login(){
        $data = [
            'title' => 'Login'
        ];
        $this->view('users/login',$data);
    }

}