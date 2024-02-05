<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Civitas extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
        $this->load->model("Civitas_model");
        $this->load->model("Keuangan_model");
        $this->load->model("Main_model");
        if($this->session->userdata("status") != "login"){
            $this->session->set_flashdata("flash", "Maaf, Anda harus login terlebih dahulu");
            redirect(base_url('login'));
        }
    }

    public function index(){
        $data['title'] = "List KPQ";
        $data['sidebar'] = "civitas";
        $data['sidebarDropdown'] = "kpq";
        $data['deskripsi'] = 'List civitas dengan tipe KPQ';
        $data['kode'] = '012';
        // $data['civitas'] = $this->Main_model->get_all("kpq", ["substring(nip, 1, 3) = " => "012", "status" => "aktif"], "nama_kpq");

        // $this->load->view("layout/header", $data);
        // $this->load->view("layout/navbar");
        $this->load->view("layout/header", $data);
        $this->load->view("layout/navbar", $data);
        $this->load->view("civitas/civitas", $data);
        // $this->load->view("templates/footer");
    }
    
    public function kpq(){
        $data['title'] = "List KPQ";
        $data['sidebar'] = "civitas";
        $data['sidebarDropdown'] = "kpq";
        $data['deskripsi'] = 'List civitas dengan tipe KPQ';
        $data['kode'] = '012';
        // $data['civitas'] = $this->Main_model->get_all("kpq", ["substring(nip, 1, 3) = " => "012", "status" => "aktif"], "nama_kpq");

        // $this->load->view("layout/header", $data);
        // $this->load->view("layout/navbar");
        $this->load->view("layout/header", $data);
        $this->load->view("layout/navbar", $data);
        $this->load->view("civitas/civitas", $data);
        // $this->load->view("templates/footer");
    }

    public function karyawan(){
        $data['title'] = "List Karyawan";
        $data['sidebar'] = "civitas";
        $data['sidebarDropdown'] = "karyawan";
        $data['deskripsi'] = 'List civitas dengan tipe Karyawan';
        $data['kode'] = '011';
        // $data['civitas'] = $this->Main_model->get_all("kpq", ["substring(nip, 1, 3) = " => "012", "status" => "aktif"], "nama_kpq");

        // $this->load->view("layout/header", $data);
        // $this->load->view("layout/navbar");
        $this->load->view("layout/header", $data);
        $this->load->view("layout/navbar", $data);
        $this->load->view("civitas/civitas", $data);
        // $this->load->view("templates/footer");
    }

    function getListCivitas($tipe) { //data data produk by JSON object
        header('Content-Type: application/json');
        $output = $this->Civitas_model->getListCivitas($tipe);
        echo $output;
    }

    // edit
        public function edit_civitas(){
            $nip = $this->input->post("nip", true);
            $data = [
                "golongan" => $this->input->post("golongan", true)
            ];
            $result = $this->Main_model->edit_data("kpq", ["nip" => $nip], $data);

            if($result)
                $this->session->set_flashdata('pesan', 'Berhasil <strong>mengubah</strong> data civitas');
            else
                $this->session->set_flashdata('pesan', 'Gagal <strong>mengubah</strong> data civitas');
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