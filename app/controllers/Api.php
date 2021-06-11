<?php 

    header('Access-Controll-Allow-Origin: *');
    header('Content-Type: application/json');

    class Api extends Controller{
        public function __construct(){
            $this->apiModel = $this->model('api_model');
        }

        public function posts($request_type){
            if($request_type == 'read'){
                $result = $this->apiModel->news_read();
            
                //array_print($result);
                if (count($result) > 0){
                    $posts_arr = array();
                    $posts_arr['data'] = array();
                    foreach($result as $post){
                        $post_item = array(
                            'id' => $post->id,
                            'title' => $post->title,
                            'description' => $post->description,
                            'image'=> $post->image,
                            'author' => $post->author,
                            'last_date_edited' => $post->lastDateEdited,
                            'date_created' => $post->created_at
                                
                        );
    
                        array_push($posts_arr['data'], $post_item);
                    }
    
                    echo json_encode($posts_arr);
                }
                else{
                    echo json_encode(
                        array('message' => 'No Events Found')
                    );
                }
            }
            else{
                echo json_encode(array(
                    'messsage' => 'Inavlid Request'
                ));
            }

            
        }


        public function events($request_type){
            if($request_type == 'read'){
                $result = $this->apiModel->events_read();
            
                //array_print($result);
                if (count($result) > 0){
                    $events_arr = array();
                    $events_arr['data'] = array();
    
                    foreach($result as $event){
                        $event_item = array(
                            'id' => $event->id,
                            'title' => $event->title,
                            'description' => $event->description,
                            'image'=> $event->image,
                            'date_created' => $event->created_at
                        );
    
                        array_push($events_arr['data'], $event_item);
                    }
    
                    echo json_encode($events_arr);
                }
                else{
                    echo json_encode(
                        array('message' => 'No Events Found')
                    );
                }
            }
            else{
                echo json_encode(array(
                    'messsage' => 'Inavlid Request'
                ));
            }
        }

        public function survey($request_type){
            if($request_type == 'read'){
                $result = $this->apiModel->survey_set_read(30);
                $resultQuestions = $this->apiModel->questions_read(30);
                $resultAnswers = $this->apiModel->answers_read(30);

                //array_print($result);
                $chart_arr = array();
                $chart_arr['data'] = array();
                if (count($result) > 0){
                    $survey_arr = array();
                    $survey_arr['survey'] = array();
    
                    foreach($result as $survey){
                        $survey_item = array(
                            'id' => $survey->id,
                            'title' => $survey->title,
                            'description' => $survey->description,
                            'user_id'=> $survey->user_id,
                            'start_date'=> $survey->start_date,
                            'end_date'=> $survey->end_date,
                            'date_created' => $survey->date_created
                        );
                        
                        array_push($survey_arr['survey'], $survey_item);
                    }
    
                    array_push($chart_arr['data'],$survey_arr);
                    
                }
                else{
                    echo json_encode(
                        array('message' => 'No Events Found')
                    );
                }

                if(count($resultQuestions)> 0){
                    $question_arr = array();
                    $question_arr['question'] = array();
    
                    foreach($resultQuestions as $question){
                        $question_item = array(
                            'id' => $question->id,
                            'question' => $question->question,
                            'frm_option' => json_decode($question->frm_option),
                            'type'=> $question->type,
                            'survey_id'=> $question->survey_id,
                            'order' => $question->order_by,
                            'date_created' => $question->date_created
                        );
                        
                        array_push($question_arr['question'], $question_item);
                    }
    
                    array_push($chart_arr['data'],$question_arr);
                    
                }
                else{
                    echo json_encode(
                        array('message' => 'No Events Found')
                    );
                }
                
                if (count($resultAnswers) > 0){
                    $answer_arr = array();
                    $answer_arr['answer'] = array();
    
                    foreach($resultAnswers as $answer){
                    
                        $answer_item = array(
                            'id' => $answer->id,
                            'survey_id' => $answer->survey_id,
                            'user_id' => $answer->user_id,
                            'answer'=> $answer->answer,
                            'question_id'=> $answer->question_id,
                            'date_created' => $answer->date_created
                        );
                        
                        array_push($answer_arr['answer'], $answer_item);
                    }
    
                    array_push($chart_arr['data'],$answer_arr);
                    
                }
                else{
                    echo json_encode(
                        array('message' => 'No Events Found')
                    );
                }
                

                echo json_encode($chart_arr);



            }//else from if parent
            else{
                echo json_encode(array(
                    'messsage' => 'Inavlid Request'
                ));
            }
        }
    }