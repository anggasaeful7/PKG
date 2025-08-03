<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
class Login_model extends CI_Model{
function validate_user($username, $password) {
        $this->db->where('username', $username);
        $this->db->where('password', md5($password)); // Peringatan: md5 tidak aman!
        
        $query = $this->db->get('t_login');
        
        if ($query->num_rows() == 1) {
            return $query->row(); // Mengembalikan satu baris data user dari t_login
        } else {
            return false;
        }
    }
    function get_user_details($level, $username) {
        if ($level == 4) { // Siswa
            $this->db->select('t_siswa.id_siswa, t_siswa.nama_siswa, t_login.username, t_login.id_level');
            $this->db->from('t_login');
            $this->db->join('t_siswa', 't_siswa.NIS = t_login.username'); // Asumsi username siswa adalah NIS
            $this->db->where('t_login.username', $username);
        } else if ($level == 5) { // Wali Siswa
            $this->db->select('t_wali_siswa.id_wali, t_wali_siswa.nama_wali, t_login.username, t_login.id_level');
            $this->db->from('t_login');
            $this->db->join('t_wali_siswa', 't_wali_siswa.NIK = t_login.username'); // Asumsi username wali adalah NIK
            $this->db->where('t_login.username', $username);
        } else { // Guru, Operator, Penilai
            $this->db->select('t_dataguru.id_guru, t_dataguru.nama, t_dataguru.image, t_login.username, t_login.id_level, t_login.NIP');
            $this->db->from('t_login');
            $this->db->join('t_dataguru', 't_dataguru.NIP = t_login.NIP');
            $this->db->where('t_login.username', $username);
        }
        
        $query = $this->db->get();
        return $query->row();
    }
    function anti($inp){
        if(is_array($inp))
            return array_map(__METHOD__, $inp);
        if(!empty($inp) && is_string($inp)) {
            return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $inp);
        }
        return $inp;
    } 
}