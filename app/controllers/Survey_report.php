<?php 

    class Survey_report extends Controller{

        public function __construct(){
            $this->surveyReportModel = $this->model('s_report');
        }

        public function index(){
            $survey = $this->surveyReportModel->showSurvey();
            $data = [
               'surveyList' => $survey 
            ]; 
            $this->view('survey_report/index', $data);
        }

        public function view_report($sid){
            $survey = $this->surveyReportModel->getSurveyById($sid);
            $taken = $this->surveyReportModel->surveyTaken($sid);
            $answers = $this->surveyReportModel->getAnswers($sid);
            $questions = $this->surveyReportModel->getQuestion($sid);

            $data = [
               'survey' => $survey,
               'questions' => $questions,
               'taken' => $taken,
               'answers'=> $answers
            ]; 
            
            $this->view('survey_report/view_report', $data);
        }
        
        
    }