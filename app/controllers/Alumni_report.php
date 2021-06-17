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

            if(!empty($allCount)) {
                $allCount = count($allCount);
            }

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

            if(!empty($allCount)) {
                $allCount = count($allCount);
            }
            
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

        function filterData(&$str){ 
            $str = preg_replace("/\t/", "\\t", $str); 
            $str = preg_replace("/\r?\n/", "\\n", $str); 
            if(strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"'; 
        }

        public function export() {

            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $data = array();
                $select = $_POST['result'];
                foreach($select as $id) {
                    $newData = $this->alumniRModel->selectExport($id);
                    $newData = json_decode(json_encode($newData), true);
                    array_push($data, $newData[0]);
                }

                // Excel file name for download 
                $fileName = "untitled-" . date('Ymd') . ".xls"; 

                // Headers for download 
                header("Content-Disposition: attachment; filename=\"$fileName\""); 
                header("Content-Type: application/vnd.ms-excel");
                
                $flag = false; 
                foreach($data as $row) {
                    
                    if(!$flag) { 
                        // display column names as first row 
                        echo implode("\t", array_keys($row)) . "\n"; 
                        $flag = true; 
                    }
                    // filter data
                    array_walk($row, array($this, 'filterData'));
                    echo implode("\t", array_values($row)) . "\n"; 
                }
            }
        }

        
    }