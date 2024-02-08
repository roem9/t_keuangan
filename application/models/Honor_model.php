<?php
class Honor_model extends CI_MODEL{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->library('Datatables', 'datatables');
    }

    function getListHonor() { 
        // $query = "
        //     DROP TEMPORARY TABLE IF EXISTS temporaryHonor;

        //     CREATE TEMPORARY TABLE temporaryHonor AS
        //     SELECT
        //         *,
        //         'Transfer' as metode
        //     FROM ppu_transfer
        // ";

        // $queries = explode(";", $query);

        // foreach ($queries as $query) {
        //     if(trim($query) != ""){
        //         $this->db->query($query);
        //     }
        // }

        $this->datatables->select('id_gol, gol, tipe_kelas, honor, ot');
        $this->datatables->from('golongan');
        return $this->datatables->generate();
    }
}