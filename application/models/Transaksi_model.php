<?php

class Transaksi_model extends CI_MODEL{
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
}