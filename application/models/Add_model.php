<?php


class Add_model extends  CI_Model
{

	public function __construct()
	{
		parent::__construct();
// Your own constructor code
		$this->load->database();
	}


	function insert_img($data_insert)
	{
		return	$this->db->insert('tbl_file_uploads', $data_insert);
	}
}
