<?php 

    class Forum extends Controller{
        public function __construct(){
            if(!isLoggedIn()){
                redirect('users/login');
            }

            $this->forumModel = $this->model('forum_model');
            $this->userModel = $this->model('User');
            $this->alumniModel = $this->model('alumni_model');
        }

        public function index(){
            //Get Posts
            $posts = $this->forumModel->getPosts(); 
            $pop = $this->forumModel->getPopular();
            $my = $this->forumModel->getCurrent($_SESSION['id']);
            $data = [
                'posts' => $posts,
                'popular' => $pop,
                'user_posts' => $my,
            ];

            $this->view('forum/index',$data);
        }


        public function show($id){
            $post = $this->forumModel->getPostById($id);
            $comment = $this->forumModel->getComments();
            $reply = $this->forumModel->getReply();
            $user = $this->userModel->getUserByID($post->topic_author);
            $alumni = $this->alumniModel->getAlumniByID($user->a_id);
            $current = $this->alumniModel->getAlumniByID($_SESSION['alumni_id']);
            $data = [
                'post' => $post,
                'user' => $user,
                'comment' => $comment,
                'reply' => $reply,
                'alumni' => $alumni,
                'current' => $current,
            ];
            
            
            $this->view('forum/view',$data);
            $this->forumModel->viewCounter($data);
        }

        public function add(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

                $data = [
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['id'],
                    'title_err' => '',
                    'body_err' => ''
                ];


                if(empty($data['title'])){
                    $data['title_err'] = 'Please enter title';
                }
                if(empty($data['body'])){
                    $data['body_err'] = 'Please enter body text';
                }

                if(empty($data['title_err']) && empty($data['body_err'])){
                    // Validated
                    if($this->forumModel->addPost($data)){
                        redirect('forum/index');
                    }
                        else{
                            die('Something went wrong');
                    }
                } 
                else{
                    // Load the view with errors
                    $this->view('forum/add', $data);
                }

            } else{
                $data = [
                    'title' => '',
                    'body' => '',
                    'title_err' => '',
                    'body_err' => ''
                ];
            }
           
            $this->view('forum/add',$data);

        }
        
        public function comment($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

                $data = [
                    'comment_for' => $id,
                    'comment' => trim($_POST['comment']),
                    'comment_sender' => $_SESSION['id'],
                ];


                if($this->forumModel->addComment($data)){
                    redirect('forum/show/' . $id);
                }
                else{
                    die('something went wrong');
                }
            }
            else {

                $data = [
                    'comment_for' => '',
                    'comment' => '',
                    'comment_sender' => $_SESSION['id'],
                ];
            }
        }

        public function reply($id,$topic){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

                $data = [
                    'parent' => $id,
                    'reply' => trim($_POST['reply']),
                    'reply_sender' => $_SESSION['id'],
                ];


                if($this->forumModel->addReply($data)){
                    redirect('forum/show/' . $topic);
                }
                else{
                    die('something went wrong');
                }
            }
            else {

                $data = [
                    'parent' => $id[0],
                    'reply' => '',
                    'reply_sender' => $_SESSION['id'],

                ];
            }
        }
        public function edit($id){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

                $data = [
                    'title' => trim($_POST['title']),
                    'body' => trim($_POST['body']),
                    'user_id' => $_SESSION['id'],
                    'id' => $id,
                    'title_err' => '',
                    'body_err' => ''
                ];


                if(empty($data['title'])){
                    $data['title_err'] = 'Please enter title';
                }
                if(empty($data['body'])){
                    $data['body_err'] = 'Please enter body text';
                }

                if(empty($data['title_err']) && empty($data['body_err'])){
                    // Validated
                    if($this->forumModel->updatePost($data)){
                        
                        redirect('forum');
                    }else{
                        die('Something went wrong');
                    }
                } else{
                    // Load the view with errors
                
                    $this->view('forum/edit', $data);
                }

            } else{
                // Check for owner
                $post = $this->forumModel->getPostById($id);
                if($post->topic_author != $_SESSION['id']){
                    redirect('forum');
                }
                $data = [
                    'id' => $id,
                    'title' => $post->title,
                    'body' => $post->body,
                    'title_err' => '',
                    'body_err' => '',
                ];
            }
           

            $this->view('forum/edit',$data);
        }
        
        public function delete($id){
                // Check for owner
                $post = $this->forumModel->getPostById($id);
                if($post->topic_author != $_SESSION['id']){
                    redirect('forum');
                }
                
                if($this->forumModel->deletePost($id)){
                
                    redirect('forum');
                }    
                else{
                    die("Something went wrong");
                }
            }

    }


    