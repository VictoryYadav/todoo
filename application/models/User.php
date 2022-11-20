<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model{

	public function checkUserLogin($data){
		$this->db->select('*')
			->from('login')
			->group_start() 
				->where('email', $data['email'])
				->or_where('mobile',$data['email'])
			->group_end()
			->where('password', $data['password']);
		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return false;
		}	
	}

	public function recordInsert($tbl,$data){
		$this->db->insert($tbl,$data);
		return $this->db->insert_id();
	}

	public function recordUpdate($tbl,$where,$data){
		$this->db->update($tbl, $data, $where);
	}

	public function recordDelete($tbl,$where){
		$this->db->delete($tbl,$where);
	}

	public function countAllRecord($tbl){
		$query="SELECT COUNT(*) as total FROM ".$tbl;
		$result=$this->db->query($query);
		if($result->num_rows() > 0)
		{
			$res = $result->result("array");
			return $res[0];	
		}
	}

	public function getAllRecord($tbl=null,$where=null){
		$this->db->select('*')->from($tbl);
		if(!empty($where)){
			$this->db->where($where);
		}
	    $query = $this->db->get();
	    if ($query->num_rows() > 0) {
	    	if(!empty($where)){
	    		$res =  $query->result("array");
	    		return $res[0];
	    	}else{
	    		return $query->result("array");
	    	}
		} else {
			return false;
		}
	}

	public function getTask($status=''){
		if(!empty($status)){
			$this->db->where('tl.status', $status);
		}
		return $this->db->select('tl.*,l.name')
					->order_by('tl.task_id','desc')
					->join('login l','l.id=tl.user_id','inner')
					->get('task_list tl')->result_array();

					// print_r($this->db->last_query());die;
	}
	
}
