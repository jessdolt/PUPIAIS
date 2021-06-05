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
    }