<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaiansiswa extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model("Penilaiansiswa_model");
		
		$username = $this->session->userdata('username');
		if(empty($username)){redirect("login");}
	}
	
	function index(){
		$data['listguru'] = $this->Penilaiansiswa_model->guru();
		$data['notif_in'] = get_notif_inbox();
		
		$data['success'] = $this->session->flashdata("success");
		$data['error'] = $this->session->flashdata("error");
		$data['view'] = "pkg_siswa/index";
		$this->load->view("index", $data);
	}
}

?>