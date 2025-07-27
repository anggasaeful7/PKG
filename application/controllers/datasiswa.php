<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class datasiswa extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model("Siswa_model");
		
		$username = $this->session->userdata('username');
		if(empty($username)){redirect("login");}
	}

    function ajax_data(){
		$list = $this->Siswa_model->get_datatables();
		$level = $this->session->userdata('level');
		$data = array();
		$no = 1;
		
		foreach($list as $siswa){
			$row = array();
			$admin ='<a rel="tooltip" class="table-action edit" href="datasiswa/edit/'.$siswa->id_siswa.'"/>
						<i class="fa fa-edit"></i>
					</a>
					<a class="table-action remove" href="javascript:void(0)" rel="tooltip" title="Remove" onclick="delete_siswa('."'".$siswa->NIS."'".')">
						<i class="fa fa-remove"></i>
					</a>';
			$user = '<a rel="tooltip" title="Like" class="table-action like" href="'.site_url("Penilaian/index")."/".$siswa->id_siswa.'" title="Like">
						<i class="pe-7s-graph2"></i>
					</a>';
			$row[] = $no++;
			$row[] = '<a href="javascript:void(0)" onclick="get_data_siswa('."'".$siswa->id_siswa."'".')">'.$siswa->NIS.'</a>';
			$row[] = $siswa->nama_siswa;
			$row[] = $siswa->nama_kelas;
			$row[] = $siswa->alamat;
			$row[] = $siswa->agama;
			$row[] = $siswa->no_hp;
			$row[] = ($level==1) ? $admin : $user;
			$data[] = $row;
		}
		
		$output = array(
			"draw" => $_POST['draw'],
			"recordsFiltered" => $this->Siswa_model->count_filtered(),
			"data" => $data,
		); 
		echo json_encode($output);
	}
	
	function ajax_get($id){
		$data = $this->Siswa_model->get_id($id);
		echo json_encode($data);
	}

	function do_add(){
		$post = $this->input->post(NULL, TRUE);
		
		$useradd['NIP'] = $post["NIS"];
		$useradd['username'] = $post["NIS"];
		$useradd['password'] = md5($post["NIS"]);
		$useradd['id_level'] = 4;
		
		$this->Siswa_model->create($post, $useradd);
		
		echo json_encode(array("status" => TRUE));
	}

	function edit($id){
		$data['notif_in'] = get_notif_inbox();
		$result = $this->Siswa_model->read("id_siswa= '$id'");
		
		$data['kelas'] = $this->Siswa_model->bacaKelas();
		
		$data['result'] = $result[0];
		$data['vadmin'] = TRUE;
		$data['view'] = "dataguru/v_form_siswa";
		$this->load->view("index",$data);
	}

	function do_edit($id){
		$post = $this->input->post(NULL, TRUE);
		$this->Siswa_model->update("id_siswa='$id'", $post);
		
		redirect('DataGuru');
	}
	
	function delete($id){
		$this->Siswa_model->delete($id);
		echo json_encode(array("status" => TRUE));
	}
}