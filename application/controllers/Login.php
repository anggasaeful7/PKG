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
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        $login_data = $this->login_model->validate_user($username, $password);
        
        if($login_data){
            $user_details = $this->login_model->get_user_details($login_data->id_level, $login_data->username);

            if (!$user_details) {
                 $this->session->set_flashdata("error", "Data profil tidak ditemukan!");
                 redirect("login");
            }

            // 3. Set session berdasarkan level
            if ($user_details->id_level == 4) { // Siswa
                $this->session->set_userdata("username", $user_details->username);
                $this->session->set_userdata("nama", $user_details->nama_siswa);
                $this->session->set_userdata("image", "default-avatar.png");
                $this->session->set_userdata("level", $user_details->id_level);
                $this->session->set_userdata("id_user", $user_details->id_siswa); // Ganti id_guru jadi id_user
            } else if ($user_details->id_level == 5) { // Wali Siswa
                $this->session->set_userdata("username", $user_details->username);
                $this->session->set_userdata("nama", $user_details->nama_wali);
                $this->session->set_userdata("image", "default-avatar.png");
                $this->session->set_userdata("level", $user_details->id_level);
                $this->session->set_userdata("id_user", $user_details->id_wali);
            } else { // Guru dan lainnya
                $this->session->set_userdata("username", $user_details->username); // Bisa juga NIP
                $this->session->set_userdata("nama", $user_details->nama);
                $this->session->set_userdata("image", $user_details->image);
                $this->session->set_userdata("level", $user_details->id_level);
                $this->session->set_userdata("id_user", $user_details->id_guru);
            }
            
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