<?php
class Mdl_crud extends CI_Model {
	function chk_phone_exist($phone,$mail) {
		$this->db->where('cnt_phone',$phone);
		$this->db->where('cnt_email',$mail);
		$this->db->where('cnt_deleted',0);
		$query = $this->db->get('contacts');
	    if ($query->num_rows() > 0){
	        return true;
	    }
	    else{
	        return false;
	    }
	}

	function save_it($data, $cnt_id) {
		if($cnt_id==-1) {
			$this->db->insert('contacts',$data);
		}else {
			$this->db->where('cnt_id',$cnt_id);
			$this->db->update('contacts',$data);
		}
		
	}

	function get_all() {
		$this->db->where('cnt_deleted',0);
		return $this->db->get('contacts');
	}

	function get_row($cnt_id) {
		$this->db->where('cnt_id',$cnt_id);
		return $this->db->get('contacts');
	}
	
	function update_row_for_del($cnt_id) {
		$this->db->where('cnt_id',$cnt_id);
		$this->db->update('contacts',array('cnt_deleted'=>1));
	}
}