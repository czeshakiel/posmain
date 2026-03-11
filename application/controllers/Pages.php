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
            if($this->session->user_login){redirect(base_url('main'));}                       
            $this->load->view('pages/'.$page);                 
        }
        public function authenticate(){
            $this->load->model('Sales_model');
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $login = $this->Sales_model->authenticate($username, $password);
            if($login){
                $userdata=array(
                    'username' => $username,
                    'fullname' => $login['fullname'],
                    'user_login' => true
                );
                $this->session->set_userdata($userdata);
                redirect(base_url('main'));
            } else {
                redirect(base_url());
            }
        }
        public function main(){
            $page = "main";
            if(!file_exists(APPPATH.'views/pages/'.$page.".php")){
                show_404();
            }
            if(!$this->session->user_login){redirect(base_url());}
            $data['title'] = "Products Masterfile";
            $this->load->view('includes/header');
            $this->load->view('includes/navbar');
            $this->load->view('includes/sidebar');
            $this->load->view('pages/'.$page,$data);
            $this->load->view('includes/modal');
            $this->load->view('includes/footer');
        }
}
?>
