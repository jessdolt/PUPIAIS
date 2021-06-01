<?php

class Pages extends Controller{
    public function __construct(){

        if (!isLoggedIn()) {
            redirect('users/login');
        }

        // $this->surveyWidgetModel = $this->model('s_widget');
        // $surveyExists = $this->surveyWidgetModel->getSurvey();
        // if(isset($surveyExists)){
        //     redirect('survey_widget');
        // }   
    }
    
    public function index(){ 
        if (isLoggedIn()){
            $this->checkSurvey();
        }
    }
    
    function checkSurvey(){
        $this->surveyListModel = $this->model('s_widget');
        $currentSurvey = $this->surveyListModel->getSurvey();
        $answeredSurvey = $this->surveyListModel->surveyAnswered($_SESSION['id']);

        $answered = array();
        foreach($currentSurvey as $c_survey){
            foreach($answeredSurvey as $a_survey ){
                if($c_survey->id === $a_survey->survey_id){
                    array_push($answered, 1);
                }
            }
        }
        if(count($currentSurvey) == count($answered)){
            redirect('pages/home');
        }
        else{
            redirect('survey_widget');
        }
    }

    public function home() {
        $this->postModel = $this->model('post');
        $this->eventModel = $this->model('event');
        $this->jobModel = $this->model('job_portal');

        $news = $this->postModel->showNewsHome();
        $events = $this->eventModel->showEventHome();
        $job_portal = $this->jobModel->showJobsHome();

        $this->viewHome('pages/home', $news, $events, $job_portal);
    }

    public function login(){
        $data = [];
        $this->view('users/login', $data);
    }

}