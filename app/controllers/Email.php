<?php 


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email extends Controller{  
    public function __construct(){
        $this->emailModel = $this->model('email_model');
    }

    //Email specific alumni
    public function sendCredentials($id){
        $alumniUser = $this->emailModel->singleAlumni($id);
        $alumni = $this->emailModel->getAlumniById($id);
        $referenceNo = rand(10000,99999);

        $mail = new PHPMailer();
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.gmail.com';
       
        $mail->Username = 'itechpup1@gmail.com';
        $mail->Password = 'PUPtest123';
        $mail->SMTPSecure = 'tls';
        $mail->Port = '587';

        $mail->isHTML();
       
        $mail->setFrom('itechpup1@gmail.com', 'PUP ITECH Administrator');

        $mail->addAddress($alumni->email);
        $mail->Subject = 'Login Credentials for PUPIAIS (Reference No. '.$referenceNo.')';

        $website = URLROOT;
       

        $msg = '
                <p>Your Username is <strong>'.$alumni->email.'</strong></p>
                <p>Your Password is <strong>'.$alumniUser->password.'</strong></p>
                <p>You can access our website at <strong>'. $website.'</strong></p>
                ';
                
        $mail->Body = $msg;

        $mail->Priority = 1;
        $mail->addCustomHeader("X-MSMail-Priority: High");
        $mail->addCustomHeader("Importance: High");
       
        if($mail->Send()){
            if($this->userModel->updateSend($alumni->alumni_id)){
                redirect('admin/alumni');
            }
        }
        else{
            echo $mail->ErrorInfo;
        }
    }

    public function sendToAll(){
        //$alumni = $this->emailModel->getAlumniById($id);
        $alumniUser = $this->emailModel->showAlumniNotSent();
            foreach($alumniUser as $user){
                $alumni = $this->emailModel->getAlumniById($user->a_id); 
                $referenceNo = rand(10000,99999);

                $mail = new PHPMailer();
                $mail->SMTPDebug = 2;
                $mail->isSMTP();
                $mail->SMTPAuth = true;
                $mail->Host = 'smtp.gmail.com';
            
                $mail->Username = 'itechpup1@gmail.com';
                $mail->Password = 'PUPtest123';
                $mail->SMTPSecure = 'tls';
                $mail->Port = '587';

                $mail->isHTML();
            
                $mail->setFrom('itechpup1@gmail.com', 'PUP ITECH Administrator');
                 
                $mail->addAddress($alumni->email);
                $mail->Subject = 'Login Credentials for PUPIAIS (Reference No. '.$referenceNo.')';

                $website = URLROOT;
            
                $msg = '
                        <p>Your Username is <strong>'.$alumni->email.'</strong></p>
                        <p>Your Password is <strong>'.$user->password.'</strong></p>
                        <p>You can access our website at <strong>'. $website.'</strong></p>
                        ';
                        
                $mail->Body = $msg;

                $mail->Priority = 1;
                $mail->addCustomHeader("X-MSMail-Priority: High");
                $mail->addCustomHeader("Importance: High");
            
                if($mail->Send()){
                    $sent[] = $this->emailModel->updateSend($alumni->alumni_id);
                }
                else{
                    echo $mail->ErrorInfo;
                }
            }

            if($sent){
                echo "1";
            }
    }
}

    