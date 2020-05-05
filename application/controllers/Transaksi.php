<?php
class Transaksi extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
        // $this->load->model("Keuangan_model");
        $this->load->model("Keuangan_model");
    }

    public function cetak_laporan(){
        $tgl_awal = $this->input->post("tgl_awal");
        $tgl_akhir = $this->input->post("tgl_akhir");
        $tipe = $this->input->post("metode");


        if($tipe == "transfer"){
            
            $name = "Transfer " . date("d/m/y", strtotime($tgl_awal)) ." - ". date("d/m/y", strtotime($tgl_akhir));
            header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
            header('Content-Disposition: attachment;filename="'.$name.'.xls"');

            $tgl = $this->Keuangan_model->get_tanggal_between_transfer();
    
            $data['data'] = [];
            foreach ($tgl as $i => $tgl) {
                $data['data'][$i]['tgl'] = $tgl['tgl_transfer'];
                $data['data'][$i]['transaksi'] = $this->Keuangan_model->get_transaksi_tanggal_transfer($tgl['tgl_transfer']);
            }
            $this->load->view("transaksi/excel_transfer", $data);
        } else if($tipe == "deposit"){
            
            $name = "Deposit " . date("d/m/y", strtotime($tgl_awal)) ." - ". date("d/m/y", strtotime($tgl_akhir));
            header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
            header('Content-Disposition: attachment;filename="'.$name.'.xls"');

            $tgl = $this->Keuangan_model->get_tanggal_between_deposit();
    
            $data['data'] = [];
            foreach ($tgl as $i => $tgl) {
                $data['data'][$i]['tgl'] = $tgl['tgl_deposit'];
                $data['data'][$i]['transaksi'] = $this->Keuangan_model->get_transaksi_tanggal_deposit($tgl['tgl_deposit']);
            }
            
            $this->load->view("transaksi/excel_deposit", $data);
        } else if($tipe == "piutang reguler"){

            $data['title'] = "Laporan Piutang Peserta Reguler";
            $name = "Piutang Reguler";
            header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
            header('Content-Disposition: attachment;filename="'.$name.'.xls"');

            $data['data'] = $this->Keuangan_model->get_all_tagihan_reguler();

            $this->load->view("transaksi/excel_piutang", $data);
        } else if($tipe == "piutang pv khusus"){
            
            $data['title'] = "Laporan Piutang Peserta PV Khusus";
            $name = "Piutang Pv Khusus";
            header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
            header('Content-Disposition: attachment;filename="'.$name.'.xls"');

            $data['data'] = $this->Keuangan_model->get_all_tagihan_pv_khusus();

            $this->load->view("transaksi/excel_piutang", $data);
        } else if($tipe == "piutang pv luar"){
            $data['title'] = "Laporan Piutang Peserta PV Luar";
            
            $name = "Piutang Pv luar";
            header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
            header('Content-Disposition: attachment;filename="'.$name.'.xls"');

            $data['data'] = $this->Keuangan_model->get_all_tagihan_pv_luar();

            $this->load->view("transaksi/excel_piutang", $data);
        } else if($tipe == "invoice"){
            $data['title'] = "Laporan Invoice";
            
            $name = "Invoice";
            header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
            header('Content-Disposition: attachment;filename="'.$name.'.xls"');

            $id = $this->Keuangan_model->get_tanggal_between_invoice();
    
            // $data['data'] = ;
            foreach ($id as $i => $id) {
                $data['data'][$i] = $this->Keuangan_model->get_invoice_by_id($id['id_invoice']);
                $data['data'][$i]['uraian'] = $this->Keuangan_model->get_invoice_uraian($id['id_invoice']);
            }

            ini_set('xdebug.var_display_max_depth', '10');
            ini_set('xdebug.var_display_max_children', '256');
            ini_set('xdebug.var_display_max_data', '1024');

            // var_dump($data);
            $this->load->view("transaksi/excel_invoice", $data);
        } 
    }

    public function edit_status_tagihan(){
        $this->Keuangan_model->edit_status_tagihan();

        redirect($_SERVER['HTTP_REFERER']);
    }
    
}