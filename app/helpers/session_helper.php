<?php
    session_start();

    function flash($name = '', $message='', $class='successAlert'){
        if(!empty($name)){
            if(!empty($message) && empty ($_SESSION[$name])){
                if(!empty($_SESSION[$name])){
                    unset($_SESSION[$name]);
                }
                

                if(!empty($_SESSION[$name . '_class'])){
                    unset($_SESSION[$name . '_class']);
                }

                $_SESSION[$name] = $message;
                $_SESSION[$name. '_class'] = $class;
            } elseif(empty($message) && !empty($_SESSION[$name])){
                $class = !empty($_SESSION[$name. '_class']) ? $_SESSION[$name. '_class'] : '';
                //echo '<div class="'.$class.'" id="msg-flash">'. $_SESSION[$name].'</div>';
                $title = '';
                if($class == 'successAlert'){
                    $title = 'Success!';
                }
                elseif($class == 'warningAlert'){
                    $title = 'Warning!';
                }
                else{
                    $title = 'Error!';
                }

                echo '<div class="notifModalContainer show" id="alert-modal-global">
                        <div class="alertModal notify show '.$class.'" id="alert-modal-inside">
                        <svg></svg>
                        <h2>'.$title.'</h2>
                        <p>'.$_SESSION[$name].'</p>
                            <div>
                                <button type="button" id="alert-ok-btn">Ok</button> 
                            </div>
                        </div>
                      </div>
                     ';


                unset($_SESSION[$name]);
                unset($_SESSION[$name. '_class']);
            }
        }
    }

    function isLoggedIn() {
        if (isset($_SESSION['id'])) {
            return true;
        } else {
            return false;
        }
    }

    function userType() {
        if ($_SESSION['user_type'] == "Super Admin") {
            return 'Super Admin';
        } elseif ($_SESSION['user_type'] == "Admin") {
            return 'Admin';
        } elseif ($_SESSION['user_type'] == "Alumni") {
            return 'Alumni';
        } elseif ($_SESSION['user_type'] == "Content Creator") {
            return 'Content Creator';
        }
    }

    function isAdmin() {
        if ($_SESSION['user_type'] == "Admin" || $_SESSION['user_type'] == "Super Admin" || $_SESSION['user_type'] == "Content Creator") {
            return true;
        } else {
            return false;
        }
    }

    function getProfileID() {
        $url= rtrim($_GET['url'],'/');
        $url= explode('/', $url);
        return $url[2];
    }

    