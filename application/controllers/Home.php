<?php
class Home extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
        $this->load->model('Home_model');

        if($this->session->userdata('status') != "login"){
            $this->session->set_flashdata('login', 'Maaf, Anda harus login terlebih dahulu');
			redirect(base_url("login"));
		} else {
			redirect(base_url("civitas"));
        }
    }
}