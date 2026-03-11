<?php
ini_set('max_execution_time', 0);
ini_set('memory_limit','2048M');
date_default_timezone_set('Asia/Manila');
    class Pages extends CI_Controller{
        public function index(){
            $page = "index";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                                
            $userdata=array('firstname','lastname','email','contactno','password','ctime');
            $this->session->unset_userdata($userdata);
            if($this->session->user_login){redirect(base_url('main'));}                       
            $this->load->view('pages/'.$page);                 
        }
        public function register(){
            $page = "register";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }               
            $userdata=array('firstname','lastname','email','contactno','password','ctime');
            $this->session->unset_userdata($userdata);                      
            if($this->session->user_login){redirect(base_url('main'));}
            else{}
            $this->load->view('pages/'.$page);                 
        }
        public function submit_registration(){
            $firstname=$this->input->post('app_firstname');
            $lastname=$this->input->post('app_lastname');
            $contactno=$this->input->post('app_contactno');
            $email=$this->input->post('app_email');
            $password=$this->input->post('app_password');
            $exist=$this->Application_model->checkEmailExist($email);
            if($exist){
                $this->session->set_flashdata('feedback','Email already exist!');
                redirect(base_url('register'));
            }else{                                
                    $code=substr(str_shuffle("0123456789"),0,4);                    
                    if($this->Application_model->send_SMS($contactno,$code,$firstname)){
                        $this->Application_model->register_user();
                        $userdata=array(
                            'firstname' => $firstname,
                            'lastname' => $lastname,
                            'contactno' => $contactno,
                            'email' => $email,
                            'password' => $password,
                        );
                        $this->session->set_userdata($userdata);
                        $this->Application_model->save_verification($email,$code);
                        redirect(base_url('verification'));
                    }else{
                        redirect(base_url('error_page'));
                    } 
             }
           
        }
        public function error_page(){
            $page = "error_page";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                                     
            if($this->session->user_login){redirect(base_url('main'));}
            else{}
            $this->load->view('pages/'.$page);                 
        }
        public function verification(){
            $page = "authentication";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                                     
            if($this->session->user_login){redirect(base_url('main'));}
            else{}
            $this->load->view('pages/'.$page);                 
        }
        public function resend_code(){
             $firstname=$this->session->firstname;
             $contactno=$this->session->contactno;
             $email=$this->session->email;
             $code=substr(str_shuffle("0123456789"),0,4);
             if($this->Application_model->send_SMS($contactno,$code,$firstname)){                
                $this->Application_model->save_verification($email,$code);
                $this->session->set_userdata('ctime','1');
                redirect(base_url('verification'));
            }else{
                redirect(base_url('error_page'));
            }
        }
        public function verify_account(){
            $c1=$this->input->post('c1');
            $c2=$this->input->post('c2');
            $c3=$this->input->post('c3');
            $c4=$this->input->post('c4');
            $code=$c1."".$c2."".$c3."".$c4;
            $verify=$this->Application_model->verify_account($code);
            if($verify){                
                redirect(base_url('success_verify'));
            }else{
                $this->session->set_flashdata('error','Invalid one-time code!');
                redirect(base_url('verification'));
            }            
        }
        public function success_verify(){
            $page = "success_verify";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                                     
            if($this->session->user_login){redirect(base_url('main'));}
            else{}
            $this->load->view('pages/'.$page);                 
        }
        public function authenticate(){
            $email=$this->input->post('email');
            $password=$this->input->post('password');
            $user=$this->Application_model->authenticate($email,$password);
            if($user){
                $userdata = array(
                    'app_id' => $user['app_id'],
                    'email' => $email,
                    'fullname' => $user['app_firstname']." ".$user['app_lastname'],
                    'user_login' => true
                );
                $this->session->set_flashdata('login','Success');
                $this->session->set_userdata($userdata);                
                redirect(base_url('main'));
            }else{
                $this->session->set_flashdata('error_email','* Invalid email address!');
                $this->session->set_flashdata('error_password','* Invalid password!');
                redirect(base_url());
            }
        } 
        public function logout(){
            $userdata = array('app_id','email','fullname','user_login');
            $this->session->unset_userdata($userdata);
            redirect(base_url());
        }
        public function main(){
            $page = "main";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                                                        
            if($this->session->user_login){}            
            else{redirect(base_url());}
            $data['applicant'] = $this->Application_model->getApplicantProfile($this->session->app_id);
            $data['documents'] = $this->Application_model->getAllDocuments($this->session->app_id);
            $this->load->view('includes/header');
            $this->load->view('includes/sidebar',$data);
            $this->load->view('includes/navbar');            
            $this->load->view('pages/'.$page,$data); 
            $this->load->view('includes/modal',$data);                
            $this->load->view('includes/footer');
        }      
        
        public function update_profile(){
            $update=$this->Application_model->update_profile();
            if($update){
                $this->session->set_flashdata('success','Profile successfully updated!');
            }else{
                $this->session->set_flashdata('failed','Unable to update profile!');
            }
            redirect(base_url('main'));
        }
        public function upload_document(){
            $update=$this->Application_model->upload_document();
            if($update){
                $this->session->set_flashdata('success','Document successfully uploaded!');
            }else{
                $this->session->set_flashdata('failed','Unable to upload document!');
            }
            redirect(base_url('main'));
        }

        public function delete_document(){
            $id=$this->input->post('id');
            $update=$this->Application_model->delete_document($id);
            if($update){
                $this->session->set_flashdata('success','Document successfully deleted!');
            }else{
                $this->session->set_flashdata('failed','Unable to delete document!');
            }
            redirect(base_url('main'));
        }

        public function view_document($id){
            $page = "view_document";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }                                                        
            if($this->session->user_login){}            
            else{redirect(base_url());}            
            $data['document'] = $this->Application_model->getSingleDocument($id);
            $this->load->view('pages/'.$page,$data);             
        }

        public function change_password(){
            $update=$this->Application_model->change_password();
            if($update){
                $this->session->set_flashdata('success','Password successfully updated!');
            }else{
                $this->session->set_flashdata('failed','Unable to update password!');
            }
            redirect(base_url('main'));
        }
}
?>
