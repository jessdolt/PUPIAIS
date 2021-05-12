<?php

class Pages extends Controller{
    public function __construct(){
       
    }
    
    public function index(){
        $data = [
            'title' => 'Homepage'
        ]; 

       $this->view('pages/home' ,$data);
    }


    public function login(){
        $data = [
            'title' => 'Login'
        ];
        $this->view('pages/login',$data);
    }

}