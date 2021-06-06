<?php

class Pages extends Controller{
    public function __construct(){
      
        if (!isLoggedIn()) {
            redirect('users/login');
        }
        //$this->checkVerify();
        $this->isEmployed();
        // CHECK IF PROFILE UPDATED (VERIFIED)

        // $this->surveyWidgetModel = $this->model('s_widget');
        // $surveyExists = $this->surveyWidgetModel->getSurvey();
        // if(isset($surveyExists)){
        //     redirect('survey_widget');
        // }   
      
        //$this->alumniModel = $this->model('alumni_model');\
        
    }
    
    public function index(){
        if(isLoggedIn()) { 
        /* $this->checkSurvey(); */
        redirect('pages/home');
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
    
    function checkVerify() {
        $this->userModel = $this->model('user');
        $user = $this->userModel->singleAcc($_SESSION['alumni_id']);
        if(userType() == "Alumni" && $user->verify != "YES") {
            redirect('profile/editProfile/'.$_SESSION['alumni_id']);
        }
    }

    function isEmployed() {
        $this->userModel = $this->model('user');
        $user = $this->userModel->singleUserAlumniJoin($_SESSION['alumni_id']);
        $findRecord = $this->userModel->additionalVerify($_SESSION['alumni_id']);
        // if(userType() == "Alumni" && $user->employment == "Employed" && $findRecord != 1) {
        //     // redirect('profile/profileAdditionalAdd/'.$_SESSION['alumni_id']);

        // }  

        $data =[
            'a' = $user,
            'b' = $findRecord
        ];

        $this->view('prac/prac',$data);
    }

   


    public function home() {

        $this->postModel = $this->model('post');
        $this->eventModel = $this->model('event');
        $this->jobModel = $this->model('job_portal');

        $news = $this->postModel->showNewsHome();
        $events = $this->eventModel->showEventHome();
        $job_portal = $this->jobModel->showJobsHome();

        $data = [
            'news' => $news,
            'events' => $events,
            'job_portals' => $job_portal
        ];

         $this->view('pages/home', $data);
    }

    public function news() {
        $this->postModel = $this->model('post');
        $news = $this->postModel->showNewsList();

        // Get Page # in URL
        $page = $this->getPage();
                
        // Limit row displayed
        $limit = 10;

        $pagination = $this->postModel->NoOfResultsOld();

        $total = count($pagination);
        $pages = ceil($total/$limit);

        $start = (($page - 1) * $limit) + 10;

        $oldNews = $this->postModel->showNewsIndex($start, $limit);

        // No URL bypass
        if($pages == 0) {
            $pages = 1;
        }
        if($page > $pages) {
            redirect('pages/news?page='.$pages);
        }

        $startFormula = ($start + 1) - 10;
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

        $originalCount = $this->postModel->NoOfResults();
        if ($originalCount < 10) {

            $data = [
                'latestNews' => $news,
                'oldNews' => $oldNews,
                'start' => $startFormula,
                'limit' => $limitFormula,
                'total' => $total,
                'first' => '?page=1',
                'previous' => '?page=' . ($page == 1 ? '1' : $page - 1),
                'next' => '?page='. ($page == $pages ? $pages : $page + 1),
                'last' => '?page=' . $pages
            ];
        } else {

            $data = [
                'latestNews' => $news,
                'oldNews' => $oldNews,
                'start' => 0,
                'limit' => 0,
                'total' => 0,
                'first' => '?page=0',
                'previous' => '?page=0',
                'next' => '?page=0',
                'last' => '?page=0'
            ];

        }

        $this->view('pages/news', $data);
    }

    public function events() {
        $this->eventModel = $this->model('event');
        $events = $this->eventModel->showEventsList();

        // Get Page # in URL
        $page = $this->getPage();
                        
        // Limit row displayed
        $limit = 10;

        $pagination = $this->eventModel->NoOfResultsOld();

        $total = count($pagination);
        $pages = ceil($total/$limit);

        $start = (($page - 1) * $limit) + 10;

        $oldEvents = $this->eventModel->showEventsIndex($start, $limit);

        // No URL bypass
        if($pages == 0) {
            $pages = 1;
        }
        if($page > $pages) {
            redirect('pages/events?page='.$pages);
        }

        $startFormula = ($start + 1) - 10;
        $limitFormula = $startFormula - 1 + $limit;

        if($page == $pages) {
            if ($limitFormula >= $total) {
                $limitFormula = $total;
            }
        }

        $originalCount = $this->eventModel->NoOfResults();
        
        if ($originalCount < 10) {

            $data = [
                'latestEvents' => $events,
                'oldEvents' => $oldEvents,
                'start' => $startFormula,
                'limit' => $limitFormula,
                'total' => $total,
                'first' => '?page=1',
                'previous' => '?page=' . ($page == 1 ? '1' : $page - 1),
                'next' => '?page='. ($page == $pages ? $pages : $page + 1),
                'last' => '?page=' . $pages
            ];
        } else {

            $data = [
                'latestEvents' => $events,
                'oldEvents' => $oldEvents,
                'start' => 0,
                'limit' => 0,
                'total' => 0,
                'first' => '?page=0',
                'previous' => '?page=0',
                'next' => '?page=0',
                'last' => '?page=0'
            ];

        }

        $this->view('pages/events', $data);
    }

    public function job_portals() {
        $this->jobModel = $this->model('job_portal');
        $job_portal_active = $this->jobModel->showJobListActive();
        $job_portal_archived = $this->jobModel->showJobListArchive();
        $data = [
            'active' => $job_portal_active,
            'archive' => $job_portal_archived
        ];
        $this->view('pages/job_portals', $data);
    }

    public function login(){
        $data = [];
        $this->view('users/login', $data);
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

}