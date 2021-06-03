<?php
class User {
    private $db;
    public function __construct() {
        $this->db = new Database;
    }
    
    public function login($email, $password) {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        
        $row = $this->db->single();
        if($this->db->rowCount() > 0) {

            $hashedPassword = $row->password;

            if (password_verify($password, $hashedPassword)) {
                return $row;
            } else {
                return false;
            }

        } else {
            return false;
        }
    }

    // GET USER_CONTROL FROM TABLE USER_TYPE
    public function forSession($user) {
        $this->db->query('SELECT * FROM users LEFT JOIN user_type ON users.user_type = user_type.id WHERE email= :email ');
        $this->db->bind(':email', $user->email);

        $row = $this->db->single();
        if($this->db->rowCount() > 0) {
            return $row;
        } else {
            return false;
        }
    }

    public function register($data){
        $this->db->query('INSERT INTO users(name,student_no,email,password,user_type) VALUES (:name,:student_no,:email,:password,:user_type)');

        $this->db->bind(':name', $data['name']);
        $this->db->bind(':student_no', $data['student_no']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':user_type', $data['user_type']);
        
        if($this->db->execute()){
            return true;
        } else{
            return false;
        }
    }

    public function deleteUserByStudNo($studNo) {
        $this->db->query('DELETE FROM users WHERE student_no = :studNo');

        $this->db->bind(':studNo', $studNo);

        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    public function forgot($data) {
        $this->db->query('INSERT INTO pwdreset (pwdResetEmail, pwdResetToken, pwdResetCode, pwdResetExpires) VALUES (:email, :token, :code, :expires)');
    
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':token', $data['token']);
        $this->db->bind(':code', $data['code']);
        $this->db->bind(':expires', $data['expires']);

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function findEmailDuplicate($email) {
        //Prepared statement
        $this->db->query('SELECT * FROM pwdreset WHERE pwdResetEmail = :email');

        //Email param will be binded with the email variable
        $this->db->bind(':email', $email);
        $this->db->single();

        //Check if email is already registered
        if($this->db->rowCount() > 0) {
            $this->db->query('DELETE FROM pwdreset WHERE pwdResetEmail = :email');
            $this->db->bind(':email', $email);
                if($this->db->execute()){
                    return true;
                }
                else{
                    return false;
                }
        } else {
            return false;
        }
    }

    public function findCode($data) {
        $this->db->query('SELECT * FROM pwdreset WHERE pwdResetToken = :resetToken');
        $this->db->bind(':resetToken', $data['token']);
        $row = $this->db->single();

        if($this->db->rowCount() > 0) {

            $expires = $row->pwdResetExpires;

            if ($expires > date("U")) { 

                $codedb = $row->pwdResetCode;
                if ($data['code'] == $codedb) {
                    return true;
                }
                else {
                    return false;
                }
            } 
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }

    public function newPassword($data) {
        $this->db->query('UPDATE users SET password=:password WHERE email=:email');

        //Bind values
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':email', $data['email']);

        //Execute function
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    
    // DELETE AFTER CHANGING PASSWORD
    public function deleteRequest($email) {
        $this->db->query('DELETE FROM pwdreset WHERE pwdResetEmail = :email');
        $this->db->bind(':email', $email);
        if($this->db->execute()){
            return true;
        }
        else{
            return false;
        }
    }

    //Find user by email.
    public function findUserByEmail($email) {
        //Prepared statement
        $this->db->query('SELECT * FROM users WHERE email = :email');

        //Email param will be binded with the email variable
        $this->db->bind(':email', $email);
        $this->db->single();

        //Check if email is already registered
        if($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function singleUser($id){
        $this->db->query('SELECT * 
                        FROM alumni
                        INNER JOIN courses
                        ON alumni.courseID = courses.id
                        INNER JOIN batch
                        ON alumni.batchID = batch.id 
                        WHERE student_no = :student_no');
        $this->db->bind(':student_no', $id);
        $row = $this->db->single();
        if($this->db->rowCount() > 0){
            return $row;
        }
        else{
            return false;
        }
    }

    public function editProfile($data, $isUploaded){
        if($isUploaded == 1 ){
            $this->db->query('UPDATE alumni SET first_name=:first_name, middle_name=:middle_name, last_name=:last_name, gender=:gender, employment=:employment, birth_date=:birth_date, address=:address, city=:city, region=:region, postal=:postal, contact_no=:contact_no, email=:email, image=:image WHERE student_no = :student_no');

            $this->db->bind(':first_name', $data['first_name']);
            $this->db->bind(':middle_name', $data['middle_name']);
            $this->db->bind(':last_name', $data['last_name']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':employment', $data['employment']);
            $this->db->bind(':birth_date', $data['birth_date']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':city', $data['city']);
            $this->db->bind(':region', $data['region']);
            $this->db->bind(':postal', $data['postal']);
            $this->db->bind(':contact_no', $data['contact_no']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':image', $data['file']);
            $this->db->bind(':student_no', $data['student_no']);
            
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        } else{
            $this->db->query('UPDATE alumni SET first_name=:first_name, middle_name=:middle_name, last_name=:last_name, gender=:gender, employment=:employment, birth_date=:birth_date, address=:address, city=:city, region=:region, postal=:postal, contact_no=:contact_no, email=:email WHERE student_no = :student_no');
            $this->db->bind(':first_name', $data['first_name']);
            $this->db->bind(':middle_name', $data['middle_name']);
            $this->db->bind(':last_name', $data['last_name']);
            $this->db->bind(':gender', $data['gender']);
            $this->db->bind(':employment', $data['employment']);
            $this->db->bind(':birth_date', $data['birth_date']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':city', $data['city']);
            $this->db->bind(':region', $data['region']);
            $this->db->bind(':postal', $data['postal']);
            $this->db->bind(':contact_no', $data['contact_no']);
            $this->db->bind(':email', $data['email']);
            $this->db->bind(':student_no', $data['student_no']);
            
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
       
    }

        //Insert into USERS IF first editProfile is DONE
        public function accVerified($newData) {
            $this->db->query('UPDATE users SET verify=:verify WHERE student_no = :student_no');
            $this->db->bind(':verify', $newData['verify']);
            $this->db->bind(':student_no', $newData['student_no']);
            
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }

        public function checkOldPassword($data) {
            $this->db->query('SELECT * FROM users WHERE email = :email');
    
            //Bind value
            $this->db->bind(':email', $data['email']);
            
            $row = $this->db->single();
    
            if($this->db->rowCount() > 0) {
    
                $password = $data['oldPassword'];
                $hashedPassword = $row->password;
    
                if (password_verify($password, $hashedPassword)) {
                    return $row;
                } else {
                    return false;
                }
    
            } else {
                return false;
            }
        }
}
