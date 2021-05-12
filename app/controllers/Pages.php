<?php

class Pages extends Controller{
    public function __construct(){
       
    }
    
    public function index(){
      

    }

    public function home() {
        

    }


    public function login(){
        $data = [
            'title' => 'Login'
        ];
        $this->view('users/login',$data);
    }

}