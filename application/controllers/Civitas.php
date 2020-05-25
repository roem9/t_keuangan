<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Civitas extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
        $this->load->model("Keuangan_model");
        $this->load->model("Main_model");
        if($this->session->userdata("status") != "login"){
            $this->session->set_flashdata("flash", "Maaf, Anda harus login terlebih dahulu");
            redirect(base_url('login'));
        }
    }

    public function index(){
        $data['title'] = "List KPQ";
        $data['civitas'] = $this->Main_model->get_all("kpq", ["substring(nip, 1, 3) = " => "012", "status" => "aktif"], "nama_kpq");

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("civitas/civitas", $data);
        $this->load->view("templates/footer");
    }
    
    public function kpq(){
        $data['title'] = "List KPQ";
        $data['civitas'] = $this->Main_model->get_all("kpq", ["substring(nip, 1, 3) = " => "012", "status" => "aktif"], "nama_kpq");

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("civitas/civitas");
        $this->load->view("templates/footer");
    }

    public function karyawan(){
        $data['title'] = "List Karyawan";
        $data['civitas'] = $this->Main_model->get_all("kpq", ["substring(nip, 1, 3) = " => "011", "status" => "aktif"], "nama_kpq");

        $this->load->view("templates/header", $data);
        $this->load->view("templates/sidebar");
        $this->load->view("civitas/civitas", $data);
        $this->load->view("templates/footer");
    }

    // edit
        public function edit_civitas(){
            $nip = $this->input->post("nip", true);
            $data = [
                "golongan" => $this->input->post("golongan", true)
            ];
            $result = $this->Main_model->edit_data("kpq", ["nip" => $nip], $data);

            if($result)
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil <strong>mengubah</strong> data civitas<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            else
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Gagal <strong>mengubah</strong> data civitas<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($_SERVER['HTTP_REFERER']);
        }
    // edit

    // get data
        public function get_civitas_by_nip(){
            $nip = $this->input->post("id", true);
            $data = $this->Main_model->get_one("kpq", ["nip" => $nip]);
            echo json_encode($data);
        }
    // get data
}