<?php
    date_default_timezone_set('Asia/Manila');
    class Application_model extends CI_model{
        public function __construct(){
            $this->load->database();
        }
        public function checkEmailExist($email){
            $result=$this->db->query("SELECT * FROM applicant WHERE app_email='$email' AND `status`='verified'");
            if($result->num_rows() > 0){
                return true;
            }else{
                return false;
            }
        }
        public function register_user(){
            $firstname=$this->input->post('app_firstname');
            $lastname=$this->input->post('app_lastname');
            $contactno=$this->input->post('app_contactno');
            $email=$this->input->post('app_email');
            $password=$this->input->post('app_password');
            $id=date('YmdHis');
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $result=$this->db->query("INSERT INTO applicant(app_id,app_lastname,app_firstname,app_contact,app_email,app_password,`status`,datearray,timearray) VALUES('$id','$lastname','$firstname','$contactno','$email','$password','pending','$date','$time')");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function send_SMS($contact,$code,$user){
            $url = 'http://194.233.79.65/SMS';
            $ch = curl_init($url);

            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, false);

            $message = "Your one-time verification code is $code. For your safety, DO NOT share this code with anyone. Please use within 5 minutes to continue with your transaction.";
            $purpose = "Final Bill";

            $headers = [
                "message: $message",
                "contact: $contact",
                "purpose: $purpose", 
                "user: $user",               
                "branch: 1"
            ];

            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $response = curl_exec($ch);

            if (curl_errno($ch)) { return false;}
            else {return true;}

            curl_close($ch);
        }

        public function save_verification($email,$code){            
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $check=$this->db->query("SELECT * FROM verification WHERE email='$email'");
            if($check->num_rows()>0){
                $result=$this->db->query("UPDATE verification SET `code`='$code',datearray='$date',timearray='$time' WHERE email='$email'");
            }else{
                $result=$this->db->query("INSERT INTO verification(email,`code`,datearray,timearray) VALUES('$email','$code','$date','$time')");
            }            
            if($result){
                return true;
            }else{
                return false;
            }
        }

        public function verify_account($code){
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $email=$this->session->email;
            $query=$this->db->query("SELECT * FROM verification WHERE email='$email' AND `code`='$code'");
            if($query->num_rows()>0){
                $row=$query->row_array();
                $start_time = strtotime($row['datearray']." ".$row['timearray']);
                $end_time = strtotime(date('Y-m-d H:i:s'));

                $difference_in_seconds = abs($end_time - $start_time);
                $minutes = $difference_in_seconds / 60;        

                if($minutes <= 5){
                    $this->db->query("UPDATE applicant SET `status`='verified',date_verified='$date',time_verified='$time' WHERE app_email='$email'");
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
        public function authenticate($email,$password){
            $date=date('Y-m-d');
            $time=date('H:i:s');
            $result=$this->db->query("SELECT * FROM applicant WHERE app_email='$email' AND app_password='$password' AND `status`='verified'");
            if($result->num_rows()>0){
                $this->db->query("UPDATE applicant SET login_date='$date',login_time='$time' WHERE app_email='$email'");
                return $result->row_array();
            }else{
                return false;
            }
        }

        public function getApplicantProfile($id){
            $result=$this->db->query("SELECT a.*,ad.* FROM applicant a LEFT JOIN applicant_details ad ON a.app_id=ad.app_id WHERE a.app_id='$id'");
            return $result->row_array();
        }
        public function getAllDocuments($id){
            $result=$this->db->query("SELECT * FROM documents WHERE app_id='$id'");
            return $result->result_array();
        }

        public function update_profile(){
            $app_id=$this->session->app_id;
            $app_lastname=$this->input->post('app_lastname');
            $app_firstname=$this->input->post('app_firstname');
            $app_middlename=$this->input->post('app_middlename');
            $app_suffix=$this->input->post('app_suffix');
            $app_address=$this->input->post('app_address');
            $app_birthdate=$this->input->post('app_birthdate');
            $app_contact=$this->input->post('app_contact');
            $app_email=$this->input->post('app_email');
            $branch=$this->input->post('branch');
            $department=$this->input->post('department');
            $school_name=$this->input->post('school_name');
            $course=$this->input->post('course');
            $year_graduated=$this->input->post('year_graduated');

            $result=$this->db->query("UPDATE applicant SET app_lastname='$app_lastname',app_firstname='$app_firstname',app_middlename='$app_middlename',app_suffix='$app_suffix',app_address='$app_address',app_birthdate='$app_birthdate',app_contact='$app_contact',app_email='$app_email' WHERE app_id='$app_id'");
            if($result){
                $check=$this->db->query("SELECT * FROM applicant_details WHERE app_id='$app_id'");
                if($check->num_rows()>0){
                    $this->db->query("UPDATE applicant_details SET branch='$branch',department='$department',school_name='$school_name',course='$course',year_graduated='$year_graduated' WHERE app_id='$app_id'");
                }else{
                    $this->db->query("INSERT INTO applicant_details(app_id,branch,department,school_name,course,year_graduated) VALUES('$app_id','$branch','$department','$school_name','$course','$year_graduated')");
                }
                return true;
            }else{
                return true;
            }
        }
        public function upload_document(){
            $app_id=$this->session->app_id;
            $title=$this->input->post('doc_title');
            $fileName=basename($_FILES["file"]["name"]);
            $fileType=pathinfo($fileName, PATHINFO_EXTENSION);
            $allowTypes = array('pdf');
            if(in_array($fileType,$allowTypes)){
                $image = $_FILES["file"]["tmp_name"];
                $imgContent=addslashes(file_get_contents($image));
                $result=$this->db->query("INSERT INTO documents(app_id,doc_title,document) VALUES('$app_id','$title','$imgContent')");
            }
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function getSingleDocument($id){
            $result=$this->db->query("SELECT * FROM documents WHERE id='$id'");
            return $result->row_array();
        }

        public function delete_document($id){
            $result=$this->db->query("DELETE FROM documents WHERE id='$id'");
            if($result){
                return true;
            }else{
                return false;
            }
        }
        public function change_password(){
            $id=$this->session->app_id;
            $email=$this->session->email;
            $oldpass=$this->input->post('oldpass');
            $newpass=$this->input->post('newpass');
            $check=$this->db->query("SELECT * FROM applicant WHERE app_password='$oldpass' AND app_email='$email' AND app_id='$id'");
            if($check->num_rows()>0){
                $result=$this->db->query("UPDATE applicant SET app_password='$newpass' WHERE app_email='$email' AND app_id='$id'");
                if($result){
                    return true;
                }else{
                    return false;
                }                  
            }else{
                return false;              
            }
        }
    }
?>
