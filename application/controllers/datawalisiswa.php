<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class datawalisiswa extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model("Wali_siswa_model");
		
		$username = $this->session->userdata('username');
		if(empty($username)){redirect("login");}
	}

    function ajax_data(){
		$list = $this->Wali_siswa_model->get_datatables();
		$level = $this->session->userdata('level');
		$data = array();
		$no = 1;
		
		foreach($list as $wali){
			$row = array();
			$admin ='<a rel="tooltip" class="table-action edit" href="datawalisiswa/edit/'.$wali->id_wali.'"/>
						<i class="fa fa-edit"></i>
					</a>
					<a class="table-action remove" href="javascript:void(0)" rel="tooltip" title="Remove" onclick="delete_wali_siswa('."'".$wali->NIK."'".')">
						<i class="fa fa-remove"></i>
					</a>';
			$user = '<a rel="tooltip" title="Like" class="table-action like" href="'.site_url("Penilaian/index")."/".$wali->id_wali.'" title="Like">
						<i class="pe-7s-graph2"></i>
					</a>';
			$row[] = $no++;
			$row[] = '<a href="javascript:void(0)" onclick="get_data_wali('."'".$wali->id_wali."'".')">'.$wali->NIK.'</a>';
			$row[] = $wali->nama_wali;
			$row[] = $wali->no_hp;
			$row[] = $wali->alamat;
			$row[] = ($level==1) ? $admin : $user;
			$data[] = $row;
		}
		
		$output = array(
			"draw" => $_POST['draw'],
			"recordsFiltered" => $this->Wali_siswa_model->count_filtered(),
			"data" => $data,
		); 
		echo json_encode($output);
	}
	
	function ajax_get($id){
		$data = $this->Wali_siswa_model->get_id($id);
		echo json_encode($data);
	}

	function do_add(){
		$post = $this->input->post(NULL, TRUE);
		
		$useradd['NIP'] = $post["NIK"];
		$useradd['username'] = $post["NIK"];
		$useradd['password'] = md5($post["NIK"]);
		$useradd['id_level'] = 5;
		
		$this->Wali_siswa_model->create($post, $useradd);
		
		echo json_encode(array("status" => TRUE));
	}

	function edit($id){
		$data['notif_in'] = get_notif_inbox();
		$result = $this->Wali_siswa_model->read("id_wali= '$id'");
		
		$data['result'] = $result[0];
		$data['vadmin'] = TRUE;
		$data['view'] = "dataguru/v_form_wali_siswa";
		$this->load->view("index",$data);
	}

	function do_edit($id){
		$post = $this->input->post(NULL, TRUE);
		$this->Wali_siswa_model->update("id_wali='$id'", $post);
		
		redirect('DataGuru');
	}
	
	function delete($id){
		$this->Wali_siswa_model->delete($id);
		echo json_encode(array("status" => TRUE));
	}
}