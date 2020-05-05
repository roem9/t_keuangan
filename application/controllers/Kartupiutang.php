<?php
class KartuPiutang extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
        $this->load->model('Keuangan_model');
        
        if($this->session->userdata('status') != "login"){
            $this->session->set_flashdata('flash', 'Maaf, Anda harus login terlebih dahulu');
            redirect(base_url("login"));
        }
    }

    public function kelas($id_kelas){
        $data['kelas'] = $this->Keuangan_model->dataKelasPrivat($id_kelas);
        $data['peserta'] = $this->Keuangan_model->dataPesertaById($id_kelas);
        $data['jadwal'] = $this->Keuangan_model->dataJadwalById($id_kelas);

        $data['header'] = "Kartu Piutang {$data['kelas']['nama_peserta']}";
        $data['title'] = "Kartu Piutang {$data['kelas']['nama_peserta']}";

        $data['total'] = 0;
        $data['detail'] = [];
        $i = 0;
        $piutang = $this->Keuangan_model->get_tagihan_kelas($id_kelas);
        foreach ($piutang as $piutang) {
            $data['detail'][$i] = $piutang;
            $data['detail'][$i]['tgl'] = $piutang['tgl_tagihan'];
            $data['detail'][$i]['status'] = "tagihan";
            $data['detail'][$i]['ket'] = $piutang['stat'];
            $data['total'] += $data['detail'][$i]['nominal'];
            $i++;
        }
        
        $deposit = $this->Keuangan_model->get_deposit_kelas($id_kelas);
        foreach ($deposit as $deposit) {
            $data['detail'][$i] = $deposit;
            $data['detail'][$i]['tgl'] = $deposit['tgl_deposit'];
            $data['detail'][$i]['status'] = "deposit";
            $data['total'] += $data['detail'][$i]['nominal'];
            $i++;
        }

        $data['total'] = $data['total'] * -1;

        $pembayaran = $this->Keuangan_model->get_pembayaran_kelas_cash($id_kelas);
        foreach ($pembayaran as $pembayaran) {
            $data['detail'][$i] = $pembayaran;
            $data['detail'][$i]['tgl'] = $pembayaran['tgl_pembayaran'];
            $data['detail'][$i]['status'] = "cash";
            $data['total'] += $data['detail'][$i]['nominal'];
            $i++;
        }
        
        $pembayaran = $this->Keuangan_model->get_pembayaran_kelas_transfer($id_kelas);
        foreach ($pembayaran as $pembayaran) {
            $data['detail'][$i] = $pembayaran;
            $data['detail'][$i]['tgl'] = $pembayaran['tgl_transfer'];
            $data['detail'][$i]['status'] = "transfer";
            $data['total'] += $data['detail'][$i]['nominal'];
            $i++;
        }
        
        $data['invoice'] = $this->Keuangan_model->get_invoice_kelas($id_kelas);

        usort($data['detail'], function($a, $b) {
            return $a['tgl'] <=> $b['tgl'];
        });

        $data['id'] = $id_kelas;
        $data['kbm'] = $this->Keuangan_model->get_data_kbm($id_kelas);
        // var_dump($data['kbm']);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('modal/modal_tambah_invoice');
        $this->load->view('modal/modal_edit_invoice');
        $this->load->view('modal/modal_transaksi', $data);
        $this->load->view('modal/modal_edit_status_tagihan');
        $this->load->view('modal/modal_edit_tagihan');
        $this->load->view('piutang/kartu-piutang-kelas', $data);
        $this->load->view('templates/footer');
    }

    public function kpq($nip){
        $data['kpq'] = $this->Keuangan_model->getDataKpq($nip);
        $data['header'] = "Kartu Piutang {$data['kpq']['nama_kpq']}";
        $data['title'] = "Kartu Piutang {$data['kpq']['nama_kpq']}";

        
        $data['total'] = 0;
        $data['detail'] = [];
        $i = 0;
        $piutang = $this->Keuangan_model->get_tagihan_kpq($nip);
        foreach ($piutang as $piutang) {
            $data['detail'][$i] = $piutang;
            $data['detail'][$i]['tgl'] = $piutang['tgl_tagihan'];
            $data['detail'][$i]['status'] = "tagihan";
            $data['detail'][$i]['ket'] = $piutang['stat'];
            $data['total'] += $data['detail'][$i]['nominal'];
            $i++;
        }
        
        $deposit = $this->Keuangan_model->get_deposit_kpq($nip);
        foreach ($deposit as $deposit) {
            $data['detail'][$i] = $deposit;
            $data['detail'][$i]['tgl'] = $deposit['tgl_deposit'];
            $data['detail'][$i]['status'] = "deposit";
            $data['total'] += $data['detail'][$i]['nominal'];
            $i++;
        }

        $data['total'] = $data['total'] * -1;

        $pembayaran = $this->Keuangan_model->get_pembayaran_kpq_cash($nip);
        foreach ($pembayaran as $pembayaran) {
            $data['detail'][$i] = $pembayaran;
            $data['detail'][$i]['tgl'] = $pembayaran['tgl_pembayaran'];
            $data['detail'][$i]['status'] = "cash";
            $data['total'] += $data['detail'][$i]['nominal'];
            $i++;
        }
        
        $pembayaran = $this->Keuangan_model->get_pembayaran_kpq_transfer($nip);
        foreach ($pembayaran as $pembayaran) {
            $data['detail'][$i] = $pembayaran;
            $data['detail'][$i]['tgl'] = $pembayaran['tgl_transfer'];
            $data['detail'][$i]['status'] = "transfer";
            $data['total'] += $data['detail'][$i]['nominal'];
            $i++;
        }
        
        $data['invoice'] = $this->Keuangan_model->get_invoice_kpq($nip);
        $data['id'] = $nip;
        
        usort($data['detail'], function($a, $b) {
            return $a['tgl'] <=> $b['tgl'];
        });
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('modal/modal_tambah_invoice');
        $this->load->view('modal/modal_edit_invoice');
        $this->load->view('modal/modal_edit_status_tagihan');
        $this->load->view('modal/modal_transaksi', $data);
        $this->load->view('modal/modal_edit_tagihan');
        $this->load->view('piutang/kartu-piutang-kpq', $data);
        $this->load->view('templates/footer');
    }

    public function peserta($id_peserta){
        $data['total'] = 0;
        $data['detail'] = [];
        $i = 0;

        $piutang = $this->Keuangan_model->get_tagihan_peserta($id_peserta);
        foreach ($piutang as $piutang) {
            $data['detail'][$i] = $piutang;
            $data['detail'][$i]['tgl'] = $piutang['tgl_tagihan'];
            $data['detail'][$i]['status'] = "tagihan";
            $data['detail'][$i]['ket'] = $piutang['stat'];
            $data['total'] += $data['detail'][$i]['nominal'];
            $i++;
        }
        
        $deposit = $this->Keuangan_model->get_deposit_peserta($id_peserta);
        foreach ($deposit as $deposit) {
            $data['detail'][$i] = $deposit;
            $data['detail'][$i]['tgl'] = $deposit['tgl_deposit'];
            $data['detail'][$i]['status'] = "deposit";
            $data['total'] += $data['detail'][$i]['nominal'];
            $i++;
        }

        $data['total'] = $data['total'] * -1;

        $pembayaran = $this->Keuangan_model->get_pembayaran_peserta_cash($id_peserta);
        foreach ($pembayaran as $pembayaran) {
            $data['detail'][$i] = $pembayaran;
            $data['detail'][$i]['tgl'] = $pembayaran['tgl_pembayaran'];
            $data['detail'][$i]['status'] = "cash";
            $data['total'] += $data['detail'][$i]['nominal'];
            $i++;
        }
        
        $pembayaran = $this->Keuangan_model->get_pembayaran_peserta_transfer($id_peserta);
        foreach ($pembayaran as $pembayaran) {
            $data['detail'][$i] = $pembayaran;
            $data['detail'][$i]['tgl'] = $pembayaran['tgl_transfer'];
            $data['detail'][$i]['status'] = "transfer";
            $data['total'] += $data['detail'][$i]['nominal'];
            $i++;
        }
        
        $data['invoice'] = $this->Keuangan_model->get_invoice_peserta($id_peserta);

        $data['peserta'] = $this->Keuangan_model->getDataPeserta($id_peserta);
        $data['header'] = "Kartu Piutang {$data['peserta']['nama_peserta']}";
        $data['title'] = "Kartu Piutang {$data['peserta']['nama_peserta']}";
        $data['id'] = $id_peserta;
        
        usort($data['detail'], function($a, $b) {
            return $a['tgl'] <=> $b['tgl'];
        });
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar');
        $this->load->view('modal/modal_tambah_invoice');
        $this->load->view('modal/modal_edit_invoice');
        $this->load->view('modal/modal_edit_tagihan', $data);
        $this->load->view('modal/modal_edit_status_tagihan');
        $this->load->view('modal/modal_transaksi', $data);
        $this->load->view('piutang/kartu-piutang-peserta', $data);
        $this->load->view('templates/footer');
    }

    public function getDataPeserta(){
        $id_peserta = $this->input->post("id_peserta");
        echo json_encode($this->Keuangan_model->getDataPeserta($id_peserta));
    }

    public function getDataKelas(){
        $id_kelas = $this->input->post("id_kelas");
        echo json_encode($this->Keuangan_model->dataKelasPrivat($id_kelas));
    }

    public function getDataKpq(){
        $nip = $this->input->post("nip");
        echo json_encode($this->Keuangan_model->getDataKpq($nip));
    }

    public function tambah_piutang(){
        // tampilkan id terakhir dari tagihan kemudian tambah 1 
        $id = $this->Keuangan_model->idTagihanTerakhir();
        $id_tagihan = $id['id_tagihan'] + 1;

        // var_dump($_POST);
        $this->Keuangan_model->tambahPiutang($id_tagihan);
        
        $this->session->set_flashdata('piutang', 'ditambahkan');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function add_pembayaran(){
        $this->Keuangan_model->add_pembayaran();

        $this->session->set_flashdata('piutang', 'ditambahkan');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function edit_transaksi(){
        $this->Keuangan_model->edit_transaksi();
        // $this->session->set_flashdata('piutang', 'ditambahkan');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function kwitansi($id){
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        
        $kwitansi['kwitansi'] = $this->Keuangan_model->get_data_pembayaran($id);
        $bulan = date("m", strtotime($kwitansi['kwitansi']['tgl_pembayaran']));
        $tahun = date("y", strtotime($kwitansi['kwitansi']['tgl_pembayaran']));
        $id = $kwitansi['kwitansi']['id_pembayaran'];
        if($id > 0 && $id < 10){
            $id = '00000'.$id;
        } else if($id >= 10 && $id < 100){
            $id = '0000'.$id;
        } else if($id >= 100 && $id < 1000){
            $id = '000'.$id;
        } else if($id >= 1000 && $id < 10000){
            $id = '00'.$id;
        } else if($id >= 10000 && $id < 100000){
            $id = '0'.$id;
        } else {
            $id = $id;
        };

        $kwitansi['id'] = $tahun.$bulan.$id;

        // var_dump($kwitansi);
        $data = $this->load->view('piutang/cetak_kwitansi', $kwitansi, TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output();
    }

    public function kwitansi_transfer($id){
        
        $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];

        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-L', 'margin_top' => '14', 'fontDir' => array_merge($fontDirs, [__DIR__ . 'assets/font',]),
        'fontdata' => $fontData + [
            'candara' => [
                'R' => 'Candara.ttf'
            ]
        ],
        'default_font' => 'candara']);
        
        $kwitansi['data'] = $this->Keuangan_model->get_data_pembayaran_transfer($id);
        
        
        $kwitansi['id'] = substr($kwitansi['data']['id_transfer'],0, 3)."/Keu-Im/".date('m', strtotime($kwitansi['data']['tgl_transfer']))."/".date('Y', strtotime($kwitansi['data']['tgl_transfer']));

        // var_dump($kwitansi);
        $data = $this->load->view('piutang/cetak_kwitansi_transfer', $kwitansi, TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output();
    }

    public function invoice($id){
        $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
        $fontDirs = $defaultConfig['fontDir'];

        $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
        $fontData = $defaultFontConfig['fontdata'];

        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A5-L', 'margin_top' => '3', 'margin_left' => '3', 'margin_right' => '3', 'margin_bottom' => '3', 'fontDir' => array_merge($fontDirs, [__DIR__ . 'assets/font',]),
        'fontdata' => $fontData + [
            'candara' => [
                'R' => 'Candara.ttf'
            ]
        ],
        'default_font' => 'candara']);
        
        $invoice['invoice'] = $this->Keuangan_model->get_data_invoice($id);
        $invoice['detail'] = $this->Keuangan_model->get_data_uraian_invoice($id);

        $invoice['id'] = substr($invoice['invoice']['id_invoice'],0, 3)."/Tag-Im/".date('m', strtotime($invoice['invoice']['tgl_invoice']))."/".date('Y', strtotime($invoice['invoice']['tgl_invoice']));

        // var_dump($kwitansi);
        $data = $this->load->view('piutang/cetak_invoice', $invoice, TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output();

    }

    public function tambah_invoice(){
        $this->Keuangan_model->tambah_invoice();
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function edit_invoice(){
        $aksi = $this->input->post("aksi");
        
        if($aksi == 'doc'){
            $this->Keuangan_model->edit_invoice();
        } else if($aksi == 'edit') {
            $this->Keuangan_model->edit_uraian();
        } else if($aksi == 'tambah'){
            $this->Keuangan_model->add_uraian();
        } else if($aksi == 'hapus'){
            $this->Keuangan_model->delete_uraian();
        }
        
        redirect($_SERVER['HTTP_REFERER']);
    }
    
    public function deposit($id){
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P', 'margin_top' => '3', 'margin_left' => '3', 'margin_right' => '3', 'margin_bottom' => '3']);
        
        $kwitansi['kwitansi'] = $this->Keuangan_model->get_data_pembayaran_deposit($id);

        // var_dump($kwitansi);
        $data = $this->load->view('piutang/cetak_kwitansi', $kwitansi, TRUE);
        $mpdf->WriteHTML($data);
        $mpdf->Output();
    }

    // edit
        public function edit_tagihan(){
            $this->Keuangan_model->edit_tagihan();

            redirect($_SERVER['HTTP_REFERER']);
        }

        public function edit_pembayaran_cash(){
            $this->Keuangan_model->edit_pembayaran_cash();
            redirect($_SERVER['HTTP_REFERER']);
        }

        public function edit_pembayaran_transfer(){
            $this->Keuangan_model->edit_pembayaran_transfer();
            redirect($_SERVER['HTTP_REFERER']);
        }

        public function edit_deposit(){
            $this->Keuangan_model->edit_deposit();
            redirect($_SERVER['HTTP_REFERER']);
        }
    // edit
    
    // get data for ajax

        public function get_data_tagihan(){
            $data = $this->Keuangan_model->get_data_tagihan();
            echo json_encode($data);
        }
        
        public function get_data_tagihan_kelas(){
            $data = $this->Keuangan_model->get_data_tagihan_kelas();
            echo json_encode($data);
        }

        public function get_data_pembayaran(){
            $id = $this->input->post("id");
            $data = $this->Keuangan_model->get_data_pembayaran($id);
            echo json_encode($data);
        }

        public function get_data_pembayaran_transfer(){
            $id = $this->input->post("id");
            $data = $this->Keuangan_model->get_data_pembayaran_transfer($id);
            echo json_encode($data);
        }

        public function get_data_deposit(){
            $id = $this->input->post("id");
            $data = $this->Keuangan_model->get_data_deposit($id);
            echo json_encode($data);
        }

        public function get_data_invoice(){
            $id = $this->input->post("id");
            $data = $this->Keuangan_model->get_data_invoice($id);
            echo json_encode($data);
        }

        public function get_data_uraian_invoice(){
            $id = $this->input->post("id");
            $data = $this->Keuangan_model->get_data_uraian_invoice($id);
            echo json_encode($data);
        }
    // get data for ajax
}