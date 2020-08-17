<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api_ci extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Add_model', 'add_model');
		$this->load->helper('text');
	}

	public function index()
	{
		echo "this controller is working fine";
	}

//	public function upload_img()
//	{
//		echo "working" or die();
//		$image = base64_decode($this->input->post("img"));
//		$image_name = md5(uniqid(rand(), true));
//		$filename = $image_name . '.' . 'png';
////rename file name with random number
//		$path = "uploads/" . $filename;
////image uploading folder path
//		file_put_contents($path . $filename, $image);
//// image is bind and upload to respective folde
//
//		$data_insert = array('pictures' => $filename);
//
//		$success = $this->add_model->insert_img($data_insert);
//		if ($success == TRUE) {
//			$b = "User Registered Successfully..";
//		} else {
//			$b = "Some Error Occured. Please Try Again..";
//		}
//		echo json_encode($b);
//	}
	public function upload_img()
	{
		$image = base64_decode($this->input->post("img"));
		$image_name = md5(uniqid(rand(), true));
		$filename = $image_name . '.' . 'png';
//rename file name with random number
		$path = "uploads/" . $filename;
//image uploading folder path
		file_put_contents($path . $filename, $image);
// image is bind and upload to respective folde

		$data_insert = array('pictures' => $filename);

		$success = $this->add_model->insert_img($data_insert);
		if ($success) {
			$array = array(
				'success'		=>	true
			);
		}
		else{
			$array = array(
				'error'		=>	true
			);
		}
		echo json_encode($array);
	}
}
