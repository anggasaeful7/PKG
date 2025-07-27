<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class datakelas extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model("Kelas_model");
		
		$username = $this->session->userdata('username');
		if(empty($username)){redirect("login");}
	}

    function ajax_data(){
		$list = $this->Kelas_model->get_datatables();
		$level = $this->session->userdata('level');
		$data = array();
		$no = 1;
		
		foreach($list as $kelas){
			$row = array();
			$admin ='<a rel="tooltip" class="table-action edit" href="datakelas/edit/'.$kelas->id_kelas.'"/>
						<i class="fa fa-edit"></i>
					</a>
					<a class="table-action remove" href="javascript:void(0)" rel="tooltip" title="Remove" onclick="delete_kelas('."'".$kelas->id_kelas."'".')">
						<i class="fa fa-remove"></i>
					</a>';
			$user = '<a rel="tooltip" title="Like" class="table-action like" href="'.site_url("Penilaian/index")."/".$kelas->id_kelas.'" title="Like">
						<i class="pe-7s-graph2"></i>
					</a>';
			$row[] = $no++;
			$row[] = '<a href="javascript:void(0)" onclick="get_data_kelas('."'".$kelas->id_kelas."'".')">'.$kelas->nama_kelas.'</a>';
			$row[] = ($level==1) ? $admin : $user;
			$data[] = $row;
		}
		
		$output = array(
			"draw" => $_POST['draw'],
			"recordsFiltered" => $this->Kelas_model->count_filtered(),
			"data" => $data,
		); 
		echo json_encode($output);
	}
	
	function ajax_get($id){
		$data = $this->Kelas_model->get_id($id);
		echo json_encode($data);
	}

	function do_add(){
		$post = $this->input->post(NULL, TRUE);
		$this->Kelas_model->create($post);
		
		echo json_encode(array("status" => TRUE));
	}

	function edit($id){
		$data['notif_in'] = get_notif_inbox();
		$result = $this->Kelas_model->read("id_kelas= '$id'");
		
		$data['result'] = $result[0];
		$data['vadmin'] = TRUE;
		$data['view'] = "dataguru/v_form_kelas";
		$this->load->view("index",$data);
	}

	function do_edit($id){
		$post = $this->input->post(NULL, TRUE);
		$this->Kelas_model->update("id_kelas='$id'", $post);
		
		redirect('DataGuru');
	}
	
	function delete($id){
		$this->Kelas_model->delete($id);
		echo json_encode(array("status" => TRUE));
	}
}