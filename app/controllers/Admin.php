<?php 

    class Admin extends Controller {
        
       
        public function __construct() {

            if (!isLoggedIn()) {
                redirect('users/login');
            }

            if (!isAdmin()) {
                redirect('pages/home');
            }
            
        }

        public function index(){

        }

        public function dashboard(){
            $data = [];
            $this->view('admin_d/dashboard', $data);
        }

        public function alumni(){
            $this->alumniModel = $this->model('alumni_model');
            $this->groupModel = $this->model('group_model');
            $alumni = $this->alumniModel->showAlumni();
            $department = $this->alumniModel->showDepartment();
            $classification = $this->groupModel->showClassificaition();

            $data = [
                'alumni' => $alumni,
                'department' =>  $department,
                'classification' => $classification,
                'isPreview' => 0,
                'title' => 'All Alumni',
                'batch' => '',
                'alumniCount' => count($alumni)
            ];
            // $data = $this->alumniModel->showAlumni();
            // $dep  = $this->alumniModel->showDepartment(); 
            // $year = $this->alumniModel->showYear();
            $this->view('admin_d/alumni', $data);
        }

        public function events(){
            $this->eventModel = $this->model('Event');
            $events = $this->eventModel->showEvent();
            $this->view('admin_d/events', $events);
        }

        public function news() {
            $this->postModel = $this->model('post');
            $data = $this->postModel->showNews();
            $this->view('admin_d/news', $data);
        }

        public function job_portal() {
            $this->jobModel = $this->model('job_portal');
            $data = $this->jobModel->showJobs();
            $this->view('admin_d/job_portal', $data);
        }

        public function survey_list() {
            $this->surveyModel = $this->model('survey');
            $data = $this->surveyModel->showSurvey();
            $this->view('admin_d/survey', $data);
        }
    

        public function survey_report(){
            $this->surveyReportModel = $this->model('s_report');
            $surveys = $this->surveyReportModel->showSurvey();
            
            foreach($surveys as $survey){
                $survey->{'respondents'} = $this->surveyReportModel->surveyTaken($survey->id);
            }

            $currentDate = date('Y-m-d');
            $activeSurvey = array();
            $pastSurvey = array();

            foreach($surveys as $survey){
                if($survey->end_date >= $currentDate){
                    array_push($activeSurvey,$survey);
                }
                else{
                    array_push($pastSurvey,$survey);
                }
            }

            $data = [
                'activeSurvey' => $activeSurvey,
                'pastSurvey' => $pastSurvey
            ];

            $this->view('admin_d/survey_report', $data);
    }
}