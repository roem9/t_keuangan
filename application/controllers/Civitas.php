<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Civitas extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
        $this->load->model("Keuangan_model");
        if($this->session->userdata("status") != "login"){
            $this->session->set_flashdata("flash", "Maaf, Anda harus login terlebih dahulu");
            redirect(base_url('login'));
        }
    }

    public function index(){
        $data['title'] = "List Karyawan";
        $data['civitas'] = $this->Keuangan_model->civitas_by_type("011");

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("civitas/civitas", $data);
        $this->load->view("templates/footer");
    }
    
    public function kpq(){
        $data['title'] = "List KPQ";
        $data['civitas'] = $this->Keuangan_model->civitas_by_type("012");

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("civitas/civitas");
        $this->load->view("templates/footer");
    }

    public function karyawan(){
        $data['title'] = "List Karyawan";
        $data['civitas'] = $this->Keuangan_model->civitas_by_type("011");

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("civitas/civitas", $data);
        $this->load->view("templates/footer");
    }

    // edit
        public function edit_civitas(){
            $nip = $this->input->post("nip", true);
            $this->Keuangan_model->edit_civitas($nip);
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil <strong>mengubah</strong> data civitas<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($_SERVER['HTTP_REFERER']);
        }
    // edit

    // get data
        public function get_civitas_by_nip(){
            $nip = $this->input->post("id", true);
            $data = $this->Keuangan_model->get_civitas_by_nip($nip);
            echo json_encode($data);
        }
    // get data
}