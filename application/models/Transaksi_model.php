<?php

class Transaksi_model extends CI_MODEL{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('Datatables', 'datatables');
    }
    
    public function cash_perhari($tgl){
        $this->db->select("SUM(nominal) AS cash");
        $this->db->from("pembayaran");
        $this->db->where("tgl_pembayaran", $tgl);
        $this->db->where("metode", "cash");
        return $this->db->get()->row_array();
    }

    public function transfer_perhari($tgl){
        $this->db->select("SUM(nominal) AS transfer");
        $this->db->from("pembayaran");
        $this->db->where("tgl_pembayaran", $tgl);
        $this->db->where("metode", "transfer");
        return $this->db->get()->row_array();
    }

    public function deposit_perhari($tgl){
        $this->db->select("SUM(nominal) AS deposit");
        $this->db->from("pembayaran");
        $this->db->where("tgl_pembayaran", $tgl);
        $this->db->where("metode", "deposit");
        return $this->db->get()->row_array();
    }

    function getListTransaksiLainnya() { 
        $query = "
            DROP TEMPORARY TABLE IF EXISTS temporaryTable;

            CREATE TEMPORARY TABLE temporaryTable AS
            SELECT
                id_pembayaran as id
                , tgl_pembayaran as tgl
                , nama_pembayaran as nama
                , pengajar
                , uraian
                , nominal
                , metode
                , keterangan
                , '' as alamat
            FROM pembayaran
            WHERE id_pembayaran NOT IN(SELECT id_pembayaran FROM pembayaran_peserta) AND id_pembayaran NOT IN(SELECT id_pembayaran FROM pembayaran_kelas) AND id_pembayaran NOT IN(SELECT id_pembayaran FROM pembayaran_kpq)

            UNION ALL

            SELECT
                id_transfer as id
                , tgl_transfer as tgl
                , nama_transfer as nama
                , pengajar
                , uraian
                , nominal
                , metode
                , keterangan
                , alamat
            FROM transfer
            WHERE id_transfer NOT IN(SELECT id_transfer FROM transfer_peserta) AND id_transfer NOT IN(SELECT id_transfer FROM transfer_kelas) AND id_transfer NOT IN(SELECT id_transfer FROM transfer_kpq);
        ";

        $queries = explode(";", $query);

        foreach ($queries as $query) {
            if(trim($query) != ""){
                $this->db->query($query);
            }
        }

        $this->datatables->select('id, tgl, nama, pengajar, uraian, nominal, metode, keterangan, alamat');
        $this->datatables->from('temporaryTable');
        return $this->datatables->generate();
    }
}