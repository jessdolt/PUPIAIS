<?php

class Pages extends Controller{
    public function __construct(){


        if (!isLoggedIn()) {
            redirect('users/login');
        }

    }
    
    public function index(){
        
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