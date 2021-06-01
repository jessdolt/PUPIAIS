<?php 

    /*
        Base Controller
        Loads the models and views
    */

    class Controller{
        // Load model 
        public function model($model){
            // Require model file
            require_once '../app/models/' . $model .'.php';

            // Instatiate model
            return new $model();
        }

        // Load view
        public function view($view, $data = [], $dep = [], $year = []){
            // Check for the view file
            if(file_exists('../app/views/' . $view . '.php')){
                require_once '../app/views/' . $view . '.php';
            } else{
                // View does not exist
                die('View does not exist');
            }
        }

        public function viewHome($view, $news = [], $events = [], $job_portal = []) {
            if (file_exists('../app/views/' . $view . '.php')) {
                require_once '../app/views/' . $view . '.php';
            } else {
                die("View does not exists.");
            }
        }
        
        // For Admin Index with Pagination
        public function viewIndex($view, $data = [], $pagination = [], $navigate = []) {
            if (file_exists('../app/views/' . $view . '.php')) {
                require_once '../app/views/' . $view . '.php';
            } else {
                die("View does not exists.");
            }
        }
    }