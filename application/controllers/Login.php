<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model("login_model");
	}
	
	function index(){
		$data['error'] = $this->session->flashdata("error");
		$this->load->view("login/new_vlogin", $data);
	}

	// Halaman pilihan role login
	function pilih_role()
	{
		$data['error'] = $this->session->flashdata("error");
		$this->load->view("login/pilih_role", $data);
	}

	// Halaman form login berdasarkan role
	function form_login($role = '')
	{
		if (empty($role)) {
			redirect('login/pilih_role');
		}

		$allowed_roles = ['operator', 'penilai', 'guru', 'siswa', 'wali_siswa'];
		if (!in_array($role, $allowed_roles)) {
			redirect('login/pilih_role');
		}

		$data['role'] = $role;
		$data['error'] = $this->session->flashdata("error");
		$this->load->view("login/form_login", $data);
	}
	
	function do_login(){
		$username = $this->login_model->anti($this->input->post("username"));
		$password = $this->login_model->anti($this->input->post("password"));
		
		$result = $this->login_model->read("t_dataguru.NIP='".$username."' AND t_login.password='".md5($password)."' OR t_login.username='".$username."' AND t_login.password='".md5($password)."'");
		
		if(count($result) !=0){
			$this->session->set_userdata("username", $result[0]->NIP);
			$this->session->set_userdata("nama", $result[0]->nama);
			$this->session->set_userdata("image", $result[0]->image);
			$this->session->set_userdata("level",$result[0]->id_level);
			$this->session->set_userdata("id_guru",$result[0]->id_guru);
			
			$this->session->set_flashdata("success", "Berhasil Login!");
			
			redirect("home");
		}else{
			$this->session->set_flashdata("error", "Username Atau Password Salah!");
			
			redirect("login");
		}
	}
	
	function logout(){
		$this->session->sess_destroy();
		redirect("login");
	}
}
?>