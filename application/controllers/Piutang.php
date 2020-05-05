<?php
    class Piutang extends CI_CONTROLLER{
        public function __construct(){
            parent::__construct();
            $this->load->model('Keuangan_model');
            
            if($this->session->userdata('status') != "login"){
                $this->session->set_flashdata('flash', 'Maaf, Anda harus login terlebih dahulu');
                redirect(base_url("login"));
            }
        }

        public function reguler(){
            $data['title'] = 'Piutang Peserta Reguler';
            $data['tabs'] = 'reguler';
            
            $data["peserta"] = [];

            $peserta = $this->Keuangan_model->get_peserta_reguler();
            foreach ($peserta as $key => $peserta) {
                $data['peserta'][$key] = $peserta;

                // $data['peserta'][$key]['piutang'] = $this->Keuangan_model->get_piutang_peserta_by_id($peserta['id_peserta']);
                // tagihan
                $tagihan = $this->Keuangan_model->get_total_tagihan_peserta($peserta['id_peserta']);
                // deposit
                $deposit = $this->Keuangan_model->get_total_deposit_peserta($peserta['id_peserta']);
                // bayar cash
                $cash = $this->Keuangan_model->get_total_cash_peserta($peserta['id_peserta']);
                // bayar transfer
                $transfer = $this->Keuangan_model->get_total_transfer_peserta($peserta['id_peserta']);

                $data['peserta'][$key]['piutang'] =  $tagihan['total'] + $deposit['total'] ;

                $data['peserta'][$key]['bayar'] = $transfer['total'] + $cash['total'];
            }

            
            // ini_set("xdebug.var_display_max_children", -1);
            // ini_set("xdebug.var_display_max_data", -1);
            // ini_set("xdebug.var_display_max_depth", -1);
            // var_dump($data);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('piutang/piutang_peserta', $data);
            $this->load->view('templates/footer');
        }

        public function pvKhusus(){
            $data['title'] = 'Piutang Kelas Pv Khusus';
            $data['tabs'] = 'pvkhusus';

            $data['kelas'] = [];

            $kelas = $this->Keuangan_model->get_kelas_pv_khusus();
            foreach ($kelas as $key => $kelas) {
                $data['kelas'][$key] = $kelas;
                
                // tagihan
                $tagihan = $this->Keuangan_model->get_total_tagihan_kelas($kelas['id_kelas']);
                // deposit
                $deposit = $this->Keuangan_model->get_total_deposit_kelas($kelas['id_kelas']);
                // bayar cash
                $cash = $this->Keuangan_model->get_total_cash_kelas($kelas['id_kelas']);
                // bayar transfer
                $transfer = $this->Keuangan_model->get_total_transfer_kelas($kelas['id_kelas']);

                $data['kelas'][$key]['piutang'] =  $tagihan['total'] + $deposit['total'] ;

                $data['kelas'][$key]['bayar'] = $transfer['total'] + $cash['total'];
            }

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('piutang/piutang_kelas', $data);
            $this->load->view('templates/footer');
        }
        
        public function pvLuar(){
            $data['title'] = 'Piutang Kelas Pv Luar';
            $data['tabs'] = 'pvluar';

            $data['kelas'] = [];

            $kelas = $this->Keuangan_model->get_kelas_pv_luar();
            foreach ($kelas as $key => $kelas) {
                $data['kelas'][$key] = $kelas;
                // tagihan
                $tagihan = $this->Keuangan_model->get_total_tagihan_kelas($kelas['id_kelas']);
                // deposit
                $deposit = $this->Keuangan_model->get_total_deposit_kelas($kelas['id_kelas']);
                // bayar cash
                $cash = $this->Keuangan_model->get_total_cash_kelas($kelas['id_kelas']);
                // bayar transfer
                $transfer = $this->Keuangan_model->get_total_transfer_kelas($kelas['id_kelas']);

                $data['kelas'][$key]['piutang'] =  $tagihan['total'] + $deposit['total'] ;

                $data['kelas'][$key]['bayar'] = $transfer['total'] + $cash['total'];
                $data['kelas'][$key]['tagihan'] = $this->Keuangan_model->get_tagihan_kelas($kelas['id_kelas']);
            }

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('piutang/piutang_kelas', $data);
            $this->load->view('templates/footer');
        }

        public function kpq(){
            $data['title'] = 'Piutang Civitas';
            $data['tabs'] = 'kpq';
            
            $data['kpq'] = [];
            $kpq = $this->Keuangan_model->get_all_civitas();
            foreach ($kpq as $key => $kpq) {
                $data['kpq'][$key] = $kpq;
                
                // tagihan
                $tagihan = $this->Keuangan_model->get_total_tagihan_kpq($kpq['nip']);
                // deposit
                $deposit = $this->Keuangan_model->get_total_deposit_kpq($kpq['nip']);
                // bayar cash
                $cash = $this->Keuangan_model->get_total_cash_kpq($kpq['nip']);
                // bayar transfer
                $transfer = $this->Keuangan_model->get_total_transfer_kpq($kpq['nip']);

                $data['kpq'][$key]['piutang'] =  $tagihan['total'] + $deposit['total'] ;

                $data['kpq'][$key]['bayar'] = $transfer['total'] + $cash['total'];
            }

            // var_dump($data['kpq']);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('piutang/piutang_kpq', $data);
            $this->load->view('templates/footer');
        }

        public function generatePiutang(){

            // start transaction
            // $this->Keuangan_model->start_transaction();

            $bulan = ["1" => "Januari", "2" => "Februari", "3" => "Maret", "4" => "April", "5" => "Mei", "6" => "Juni", "7" => "Juli", "8" => "Agustus", "9" => "September", "10" => "Oktober", "11" => "November", "12" => "Desember"];

            $kelas = $this->Keuangan_model->getAllKelasPvAktif();

            $data['kelas'] = [];
            foreach ($kelas as $key => $kelas) {
                $data['kelas'][$key] = $kelas;
                $jadwal = $this->Keuangan_model->getJadwalAktif($kelas['id_kelas']);
                $nominal = 0;
                $data['kelas'][$key]['ot'] = 0;
                foreach ($jadwal as $i => $jadwal) {
                    if($jadwal['ot'] != 0){
                        $data['kelas'][$key]['ot']++; 
                    }
                }
                $data['kelas'][$key]['jadwal']= COUNT($this->Keuangan_model->getJadwalAktif($kelas['id_kelas']));
                $ot = $this->Keuangan_model->getInfaqByKet("ot");
                $data['kelas'][$key]['pembayaran']['ot'] = $data['kelas'][$key]['ot'] * $ot['infaq'];
                $biayajadwal = $this->Keuangan_model->getInfaqByKet($kelas['ket']);
                $data['kelas'][$key]['pembayaran']['jadwal'] = $data['kelas'][$key]['jadwal'] * $biayajadwal['infaq']; 

                if ($data['kelas'][$key]['ot'] == 0){
                    $uraian = $bulan[date('n')] . " " . date('Y') . " " . $data['kelas'][$key]['jadwal'] . " jadwal";
                } else {
                    $uraian = $bulan[date('n')] . " " . date('Y') . " " . $data['kelas'][$key]['jadwal'] . " jadwal + " . $data['kelas'][$key]['ot'] . " OT";
                }

                // var_dump($data);
                $nominal = $data['kelas'][$key]['pembayaran']['jadwal'] + $data['kelas'][$key]['pembayaran']['ot'];

                // tentukan tagihannya
                $id = $this->Keuangan_model->getLastIdTagihan();
                $id_tagihan = $id['id_tagihan'] + 1;

                $this->Keuangan_model->insertPiutangKelas($id_tagihan, $kelas['id_kelas'], $kelas['nama_peserta'], $uraian, $nominal);
                
            }
            
            $reguler = $this->Keuangan_model->getInfaqByKet("reguler");
            $peserta = $this->Keuangan_model->getAllPesertaRegulerAktif();
            $uraian = $bulan[date('n')] . " " . date('Y');
            foreach ($peserta as $peserta) {
                $id = $this->Keuangan_model->getLastIdTagihan();
                $id_tagihan = $id['id_tagihan'] + 1;
                $this->Keuangan_model->insertPiutangPeserta($id_tagihan, $peserta['id_peserta'], $peserta['nama_peserta'], $uraian, $reguler['infaq']);
            }

            // ini_set("xdebug.var_display_max_children", -1);
            // ini_set("xdebug.var_display_max_data", -1);
            // ini_set("xdebug.var_display_max_depth", -1);
            
            // var_dump($data);
            
            // end transaction
            // $this->Keuangan_model->end_transaction();

            $this->session->set_flashdata('piutang', 'digenerate');
            redirect('piutang/pvluar');
        }

        public function pembayaran(){
            $tipe = $_POST['tipe'];
            $metode = $_POST['metode'];
            $id = $this->input->post("id", TRUE);
            $nama = $_POST['nama'];

            if($metode == "Deposit"){
                $this->Keuangan_model->add_pembayaran_by_deposit();
            } else {
                $id_tagihan = $this->Keuangan_model->getLastIdTagihan();
    
                $id_tagihan = $id_tagihan['id_tagihan']+1;
    
                $this->Keuangan_model->cek_add_pembayaran($id_tagihan, $nama, $tipe, $id);
            }
            
            $this->session->set_flashdata('piutang', 'ditambahkan');
            redirect($_SERVER['HTTP_REFERER']);
        }
        
        public function edit_pj(){
            $this->Keuangan_model->edit_pj();

            redirect($_SERVER['HTTP_REFERER']);
        }
    }

?>