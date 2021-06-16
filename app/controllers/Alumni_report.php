<?php
    class Alumni_report extends Controller {
        private $db;
        public function __construct() {
            $this->alumniRModel = $this->model('alumnir_model');
        }

        public function showBatch($batch) {
            
            $alumni = $this->alumniRModel->getAlumniByBatch($batch);
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
                'alumniPerBatch' => $alumniPerBatch
            ];

            $this->view('admin_d/alumni_report', $data);
        }

        public function showCourse($batch, $course) {
            $alumni = $this->alumniRModel->getAlumniByCourse($batch, $course);
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
                'alumniPerBatch' => $alumniPerBatch
            ];

            $this->view('admin_d/alumni_report', $data);
        }

        public function report() {
            extract($_POST);
            $alumniSingle = $this->alumniRModel->getAlumniSingle($id);
            $data = [
                'alumni' => $alumniSingle
            ];
            $this->view('alumni/report', $data);
        }

        
    }