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

        public function api_test(){

            $data = [];
            $this->view('tryouts/api_test', $data);
        }

        public function dashboard(){
            $data = [];
            $this->view('admin_d/dashboard', $data);
        }

        public function notif(){
            $data =[];
            
            $this->view('admin_d/email_notif', $data);
        }

        public function passHash(){
            $data =[];
            
            $this->view('admin_d/testPass', $data);
        }

        public function alumni(){
            $this->alumniModel = $this->model('alumni_model');
            $this->groupModel = $this->model('group_model');

            // Get Page # in URL
            $page = $this->getPage();

            // Limit row displayed
            $limit = 20;
            $start = ($page - 1) * $limit;
            
            $alumniCountPerCourse = $this->alumniModel->alumniCountPerCourse();
            // $alumni = $this->alumniModel->showAlumni();
            $department = $this->alumniModel->showDepartment();
            $courses = $this->alumniModel->showCourses();
            $classification = $this->groupModel->showClassification();

            $alumni = $this->alumniModel->showAlumniIndex($start, $limit);

            $pagination = $this->alumniModel->showAlumni();

            $total = count($pagination);
            $pages = ceil($total/$limit);

            // No URL bypass
            if($pages == 0) {
                $pages = 1;
            }
            if($page > $pages) {
                redirect('admin/alumni?page='.$pages);
            }

            $startFormula = $start + 1;
            $limitFormula = $startFormula - 1 + $limit;

            if($page == $pages) {
                if ($limitFormula >= $total) {
                    $limitFormula = $total;
                }
            }

            if($total == 0) {
                $startFormula = 0;
                $limitFormula = 0;
            }
            
            $data = [
                'alumni' => $alumni,
                'department' =>  $department,
                'courses' => $courses,
                'classification' => $classification,
                'isPreview' => 0,
                'title' => 'All Alumni',
                'batch' => '',
                'alumniCount' => count($alumni),
                'alumniPerCourse' => $alumniCountPerCourse,
                
                'start' => $startFormula,
                'limit' => $limitFormula,
                'total' => $total,
                'first' => '?page=1',
                'previous' => '?page=' . ($page == 1 ? '1' : $page - 1),
                'next' => '?page='. ($page == $pages ? $pages : $page + 1),
                'last' => '?page=' . $pages
            ];

            // $data = $this->alumniModel->showAlumni();
            // $dep  = $this->alumniModel->showDepartment(); 
            // $year = $this->alumniModel->showYear();
            $this->view('admin_d/alumni', $data);
        }

        public function news() {
            $this->postModel = $this->model('post');
           
            // Get Page # in URL
            $page = $this->getPage();
                
            // Limit row displayed
            $limit = 10;
            $start = ($page - 1) * $limit;

            $posts = $this->postModel->showNewsIndex($start, $limit);

            $pagination = $this->postModel->NoOfResults();

            $total = count($pagination);
            $pages = ceil($total/$limit);

            // No URL bypass
            if($pages == 0) {
                $pages = 1;
            }
            if($page > $pages) {
                redirect('admin/news?page='.$pages);
            }

            $startFormula = $start + 1;
            $limitFormula = $startFormula - 1 + $limit;

            if($page == $pages) {
                if ($limitFormula >= $total) {
                    $limitFormula = $total;
                }
            }

            if($total == 0) {
                $startFormula = 0;
                $limitFormula = 0;
            }

            $data = [
                'news' => $posts,
                'start' => $startFormula,
                'limit' => $limitFormula,
                'total' => $total,
                'first' => '?page=1',
                'previous' => '?page=' . ($page == 1 ? '1' : $page - 1),
                'next' => '?page='. ($page == $pages ? $pages : $page + 1),
                'last' => '?page=' . $pages
            ];
        
            $this->view('admin_d/news', $data);
        }

        public function events(){
            $this->eventModel = $this->model('Event');

            // Get Page # in URL
            $page = $this->getPage();
                
            // Limit row displayed
            $limit = 10;
            $start = ($page - 1) * $limit;

            $events = $this->eventModel->showEventsIndex($start, $limit);

            $pagination = $this->eventModel->NoOfResults();

            $total = count($pagination);
            $pages = ceil($total/$limit);

            // No URL bypass
            if($pages == 0) {
                $pages = 1;
            }
            if($page > $pages) {
                redirect('admin/events?page='.$pages);
            }

            $startFormula = $start + 1;
            $limitFormula = $startFormula - 1 + $limit;

            if($page == $pages) {
                if ($limitFormula >= $total) {
                    $limitFormula = $total;
                }
            }

            if($total == 0) {
                $startFormula = 0;
                $limitFormula = 0;

            }

            $data = [
                'event' => $events,
                'start' => $startFormula,
                'limit' => $limitFormula,
                'total' => $total,
                'first' => '?page=1',
                'previous' => '?page=' . ($page == 1 ? '1' : $page - 1),
                'next' => '?page='. ($page == $pages ? $pages : $page + 1),
                'last' => '?page=' . $pages
            ];
        
            $this->view('admin_d/events', $data);

        }

        public function job_portal() {
            $this->jobModel = $this->model('job_portal');

            // Get Page # in URL
            if (!isset($_GET['page'])) {
                $page = 1;
            } elseif($_GET['page'] == 0) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }
                
            // Limit row displayed
            $limit = 20;
            $start = ($page - 1) * $limit;

            $jobs = $this->jobModel->showJobsIndex($start, $limit);

            $pagination = $this->jobModel->NoOfResults();

            $total = count($pagination);
            $pages = ceil($total/$limit);

            // No URL bypass
            if($pages == 0) {
                $pages = 1;
            }
            if($page > $pages) {
                redirect('admin/job_portal?page='.$pages);
            }

            $startFormula = $start + 1;
            $limitFormula = $startFormula - 1 + $limit;

            if($page == $pages) {
                if ($limitFormula >= $total) {
                    $limitFormula = $total;
                }
            }

            if($total == 0) {
                $startFormula = 0;
                $limitFormula = 0;
            }

            $data = [
                'jobs' => $jobs,
                'start' => $startFormula,
                'limit' => $limitFormula,
                'total' => $total,
                'first' => '?page=1',
                'previous' => '?page=' . ($page == 1 ? '1' : $page - 1),
                'next' => '?page='. ($page == $pages ? $pages : $page + 1),
                'last' => '?page=' . $pages
            ];
        
            $this->view('admin_d/job_portal', $data);

        }

        public function survey_list() {
            $this->surveyModel = $this->model('survey');

            // Get Page # in URL
            $page = $this->getPage();
                
            // Limit row displayed
            $limit = 10;
            $start = ($page - 1) * $limit;

            $survey = $this->surveyModel->showSurveyIndex($start, $limit);

            $pagination = $this->surveyModel->NoOfResults();

            $total = count($pagination);
            $pages = ceil($total/$limit);

            // No URL bypass
            if($pages == 0) {
                $pages = 1;
            }
            if($page > $pages) {
                redirect('admin/survey_list?page='.$pages);
            }

            $startFormula = $start + 1;
            $limitFormula = $startFormula - 1 + $limit;

            if($page == $pages) {
                if ($limitFormula >= $total) {
                    $limitFormula = $total;
                }
            }

            if($total == 0) {
                $startFormula = 0;
                $limitFormula = 0;
            }

            $data = [
                'survey' => $survey,
                'start' => $startFormula,
                'limit' => $limitFormula,
                'total' => $total,
                'first' => '?page=1',
                'previous' => '?page=' . ($page == 1 ? '1' : $page - 1),
                'next' => '?page='. ($page == $pages ? $pages : $page + 1),
                'last' => '?page=' . $pages
            ];
        
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

        public function getPage() {

            // Get Page # in URL
            if (!isset($_GET['page'])) {
                $page = 1;
            } elseif($_GET['page'] == 0) {
                $page = 1;
            } else {
                $page = $_GET['page'];
            }

            return $page;

        }


        public function gallery(){
            $this->galleryModel = $this->model('gallery');
            $rowGallery = $this->galleryModel->showGallery();
            $rowImages = $this->galleryModel->showImages();
            $data = [
                'gallery' => $rowGallery,
                'images' => $rowImages 
            ];

            $this->view('admin_d/gallery' , $data);
        }

        public function alumni_report() {
            $this->alumniRModel = $this->model('alumnir_model');
            $alumni = $this->alumniRModel->showAll();
            $allCount = $this->alumniRModel->allCount();
            $batch = $this->alumniRModel->showBatch();
            $course = $this->alumniRModel->showCourses();
            $alumniPerBatch = $this->alumniRModel->alumniCountPerBatch();

            $allCount = count($allCount);
            $data = [
                'allCount' => $allCount,
                'alumni' => $alumni,
                'batch' => $batch,
                'course' => $course,
                'alumniPerBatch' => $alumniPerBatch,
            ];

            $this->view('admin_d/alumni_report', $data);
        }
}