<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
class Penilaiansiswa_model extends CI_Model{
    function guru(){
        $query = $this->db->query("SELECT * FROM t_dataguru");
        return $query->result();
    }

    function get_data(){
        $query = $this->db->query("SELECT nps.NIP, npm.nama FROM t_nilai_penilaian_siswa nps JOIN t_dataguru guru ON nps.NIP = guru.NIP");
        return $query->result();
    }
}