<?php
defined('BASEPATH') OR exit('No direct script access allowed');
	
class Wali_siswa_model extends CI_Model{
	var $column_order = array('id_wali','NIK','nama_wali','no_hp','alamat');
	var $column_search = array('nama_wali');
	var $order = array('id_wali' => 'desc');
	
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

    private function _get_datatables_query(){	
		$this->db->from('t_wali_siswa');

		$i = 0;
	
		foreach ($this->column_search as $item)
		{
			if($_POST['search']['value'])
			{
				
				if($i===0) 
				{
					$this->db->group_start();
					$this->db->like($item, $_POST['search']['value']);
				}
				else
				{
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if(count($this->column_search) - 1 == $i)
					$this->db->group_end();
			}
			$i++;
		}
		
		if(isset($_POST['order']))
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} 
		else if(isset($this->order))
		{
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}

	function get_datatables(){
		$this->_get_datatables_query();
		if($_POST['length'] != -1)
		$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	function count_filtered(){
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}

    function create($data, $login){
		$this->db->insert("t_wali_siswa",$data);
		$this->db->insert("t_login",$login);
	}
	
	function update($where, $data){
		$this->db->where($where);
		$this->db->update("t_wali_siswa", $data);
		
		if($this->db->affected_rows()>0){
			$this->session->set_flashdata("success", "Data Siswa Berhasil Diubah");
		}else{
			$this->session->set_flashdata("error", "Terjadi Kesalahan,".$this->db->error());
		}
	}
	
	function delete($where){
		$this->db->delete("t_login",array('NIP' => $where));
		$this->db->delete("t_wali_siswa",array('NIK' => $where));
	}
	
	function get_id($id){
		$this->db->where("id_wali",$id);
		
		$query = $this->db->get("t_wali_siswa");
		
		return $query->row();
	}

    function read($where="",$order=""){
		if(!empty($where))$this->db->where($where);
		if(!empty($order))$this->db->order_by($order);
		
		$query = $this->db->get("t_wali_siswa");
		if($query AND $query->num_rows() !=0){
			return $query->result();
		}else{
			return array();
		}
	}
}