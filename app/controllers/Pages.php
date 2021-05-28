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
        $data = []; 
        $this->view('pages/home', $data);
    }

    public function login(){
        $data = [];
        $this->view('users/login', $data);
    }

}