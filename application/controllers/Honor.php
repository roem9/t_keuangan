<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Honor extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
        $this->load->model("Main_model");
        $this->load->model("Honor_model");
        if($this->session->userdata("status") != "login"){
            $this->session->set_flashdata("flash", "Maaf, Anda harus login terlebih dahulu");
            redirect(base_url('login'));
        }
    }

    public function index(){
        $data['title'] = 'List Honor Golongan';
        $data['sidebar'] = "honor";
        $data['sidebarDropdown'] = "";

        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar');
        $this->load->view("honor/index", $data);
    }

    function getListHonor() { //data data produk by JSON object
        header('Content-Type: application/json');
        $output = $this->Honor_model->getListHonor();
        echo $output;
    }

    // add
        public function add_transaksi(){
            // var_dump($_POST);
            // exit();
            $metode = $this->input->post("metode", TRUE);

            if($this->input->post("lainnya", TRUE)){
                $jenis = $this->input->post("lainnya", TRUE);
            } else {
                $jenis = $this->input->post("jenis", TRUE);
            }

            $data = [
              "nama" => $this->input->post("nama", TRUE),
              "jenis" => $jenis,
              "tgl" => $this->input->post("tgl", TRUE),
              "alamat" => $this->input->post("alamat", TRUE),
              "keterangan" => $this->input->post("keterangan", TRUE),
              "nominal" => $this->Main_model->nominal($this->input->post("nominal", TRUE)),
            ];

            if($metode == "Cash"){
                $bulan = date("m", strtotime($this->input->post("tgl")));
                $tahun = date("Y", strtotime($this->input->post("tgl")));
                // $id = $this->Main_model->get_last_id("ppu_cash", "id", "MONTH(tgl) = '$bulan' AND YEAR(tgl) = '$tahun'");
                $id = $this->Main_model->get_last_id_ppu_cash();
                if($id){
                    $id = $id['id'] + 1;
                } else {
                    $id = 1;
                }
                
                // id cash
                    if($id >= 1 && $id < 10){
                        $id_cash = date('ymd', strtotime($this->input->post("tgl")))."00".$id;
                    } else if($id >= 10 && $id < 100){
                        $id_cash = date('ymd', strtotime($this->input->post("tgl")))."0".$id;
                    } else if($id >= 100 && $id < 1000){
                        $id_cash = date('ymd', strtotime($this->input->post("tgl"))).$id;
                    }
                // id cash
                
                $data['id'] = $id_cash;
                $this->Main_model->add_data("ppu_cash", $data);
            } else {
                // $data['id'] = ;
                $bulan = date("m", strtotime($this->input->post("tgl")));
                $tahun = date("Y", strtotime($this->input->post("tgl")));
                // $id = $this->Main_model->get_last_id("ppu_transfer", "id", "MONTH(tgl) = '$bulan' AND YEAR(tgl) = '$tahun'");
                $id = $this->Main_model->get_last_id_ppu_transfer();
                if($id){
                    $id = $id['id'] + 1;
                } else {
                    $id = 1;
                }
                    
                // id transfer
                    if($id >= 1 && $id < 10){
                        $id_transfer = "00".$id.date('my', strtotime($this->input->post("tgl")));
                    } else if($id >= 10 && $id < 100){
                        $id_transfer = "0".$id.date('my', strtotime($this->input->post("tgl")));
                    } else if($id >= 100 && $id < 1000){
                        $id_transfer = $id.date('my', strtotime($this->input->post("tgl")));
                    }
                // id transfer
                $data['id'] = $id_transfer;
                $this->Main_model->add_data("ppu_transfer", $data);
            }

            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Berhasil menambahkan transaksi<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect($_SERVER['HTTP_REFERER']);
        }
    // add

    // get
        public function get_honor(){

            $data = $this->Main_model->get_one("golongan", ["id_gol" => $this->input->post("id_gol")]);

            echo json_encode($data);
        }
    // get 

    // edit 
        public function edit_honor(){

            $data = [
                "gol" => $this->input->post("gol", TRUE),
                "tipe_kelas" => $this->input->post("tipe_kelas", TRUE),
                "honor" => rupiahToInt($this->input->post("honor", TRUE)),
                "ot" => rupiahToInt($this->input->post("ot", TRUE))
            ];
            
            $this->Main_model->edit_data("golongan", ["id_gol" => $this->input->post("id_gol")], $data);

            $this->session->set_flashdata('pesan', 'Berhasil mengubah data honor');
            redirect($_SERVER['HTTP_REFERER']);
        }
    // edit
}