<?php
class Angcrud extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('mdl_crud');
	}

	function index() {
		$this->load->view('angcrud');
	}

	function get_all() {
		$data=array();
		foreach ($this->mdl_crud->get_all()->result() as $row) {
			$data[]=array('id'=>$row->cnt_id,'name'=>$row->cnt_fname,'place'=>$row->cnt_place,'phone'=>$row->cnt_phone,'email'=>$row->cnt_email,'gender'=>$row->cnt_gender);
		}
		echo json_encode($data);
	}

	function if_phone_exist_in_table() {
		$obj=json_decode(file_get_contents("php://input"));
		$data=array();
		if ($this->mdl_crud->chk_phone_exist($obj->phone,$obj->mail)) {
			$data=true;
		}else {
			$data=false;
		}
		echo json_encode($data);
	}

	function save_verified_data() {
		$obj=json_decode(file_get_contents("php://input"));
		$data=array(
			'cnt_fname'=>$obj->fname,
			'cnt_place'=>$obj->place,
			'cnt_phone'=>$obj->phone,
			'cnt_email'=>$obj->mail,
			'cnt_gender'=>$obj->gend
			);
		if($this->mdl_crud->save_it($data, $obj->id)) {
			echo "succes";
		}else{
			echo "error";
		}
	}

	function selectTo_update() {
		$obj=json_decode(file_get_contents("php://input"));
		$data=array();
		foreach ($this->mdl_crud->get_row($obj->id)->result() as $row) {
			$data['id']=$row->cnt_id;
			$data['name']=$row->cnt_fname;
			$data['place']=$row->cnt_place;
			$data['phone']=$row->cnt_phone;
			$data['email']=$row->cnt_email;
			$data['gender']=$row->cnt_gender;

		}
		echo json_encode($data);
	}

	function delete_data() {
		$obj=json_decode(file_get_contents("php://input"));
		$this->mdl_crud->update_row_for_del($obj->id);
	}
	
}