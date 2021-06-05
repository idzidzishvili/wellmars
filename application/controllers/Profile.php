<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {

	private $data = array(); 

	public function __construct()
	{
		parent::__construct();
		$nextURL = $this->router->fetch_class().'/'.$this->router->fetch_method();
		if (!$this->session->userdata('logged_in')){
			$this->session->set_userdata('nextURL', $nextURL);
			redirect('auth/login');
		} 
		$this->load->helper(['language', 'url', 'security']);
		$this->lang->load('home');
		$this->load->library('form_validation');
		$this->load->model(['contact', 'tour', 'user']);
		$this->data['contacts'] = $this->contact->getContacts();
		$this->data['tours'] = $this->tour->getTours();
	}
	

	public function index(){
		$this->data['userdata'] = $this->user->getUserdataById($this->session->userdata('user_id'));
		$this->load->view('templates/header', $this->data);
		$this->load->view('profile/index', $this->data);
		$this->load->view('templates/footer');
	}


	public function orders(){
		$this->load->view('templates/header', $this->data);
		$this->load->view('profile/orders', $this->data);
		$this->load->view('templates/footer');
	}

	public function hotel_order_process(){
		if (strtoupper($_SERVER['REQUEST_METHOD'])=='POST'){
			$this->form_validation->set_rules('hotelorder_date', 'Reservation Date', 'required|callback_validate_daterange');				
			///// validate other fields too
			if ($this->form_validation->run()) {
				$startFullDate = substr($this->input->post('hotelorder_date'),0,10);
				$endFullDate = substr($this->input->post('hotelorder_date'),-10);
				$startDate = DateTime::createFromFormat('m/j/Y', $startFullDate);
				$endDate = DateTime::createFromFormat('m/j/Y', $endFullDate);
				$dateRange = array();
				while ($startDate <= $endDate) {
					array_push($dateRange, $startDate->format('Y-m-d'));
					$startDate->modify('+1 day');
				}
				// get rooms by hotel type
				

				// check for free rooms for selected range in hotelstable
				$this->load->model('hotelstable');
				$sum = $this->hotelstable->checkForFreeRoom('room_'.$this->input->post('room_number'), $dateRange);
				if($sum==0){
					// insert order details to hotelorders table	
					$stdt = explode("/", $startFullDate);
					$endt = explode("/", $endFullDate);
					$st = $stdt[2].'-'.$stdt[0].'-'.$stdt[1];
					$en = $endt[2].'-'.$endt[0].'-'.$endt[1];
					$r = rand (0, 200);
					$g = rand (0, 200);
					$b = rand (0, 200);
					$col = '#'.dechex($r).dechex($g).dechex($b);
					$this->load->model('hotelorder');
					$reservationID = $this->hotelorder->addReservation($st, $en, $this->input->post('room_number'), $col);
					// update rooms in hotelstable
					$updateHotels = $this->hotelstable->updateHotelsTable($this->input->post('room_number'), $dateRange, $reservationID);
				}else{
					echo "room is not free for selected range";exit;
				}
			}
		}
	}


	public function profile_process(){
		if (strtoupper($_SERVER['REQUEST_METHOD'])=='POST') {
			$this->form_validation->set_rules('fullname', 'Full Name', 'trim|xss_clean|strip_tags|min_length[4]|max_length[100]');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|xss_clean|strip_tags|min_length[6]|max_length[100]');
			if (empty($_FILES['avatar']['name'])) {$this->form_validation->set_rules('avatar', 'Avatar Image', '');}
			if($this->form_validation->run()){
				if($this->user->updateUserdata($this->session->userdata('user_id'), $this->input->post('fullname', true), $this->input->post('phone', true))){
					if (!empty($_FILES['avatar']['name'])) {						
						$_FILES['image']['name']     = 'avatar'.$this->session->userdata('user_id').'.'.pathinfo($_FILES['avatar']['name'], PATHINFO_EXTENSION); 
						$_FILES['image']['type']     = $_FILES['avatar']['type'];
						$_FILES['image']['tmp_name'] = $_FILES['avatar']['tmp_name'];
						$_FILES['image']['error']    = $_FILES['avatar']['error'];
						$_FILES['image']['size']     = $_FILES['avatar']['size'];
						
						// File upload configuration
						$uploadPath = 'uploads/users/';
						$config['upload_path'] = $uploadPath;
						$config['allowed_types'] = 'jpg|jpeg|png|gif';
						$config['overwrite'] = true;
						//$config['max_size'] = '100';
						//$config['max_width'] = '1024';
						//$config['max_height'] = '768';
						
						// Load and initialize upload library 
						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						
						// Upload file to server 
						if ($this->upload->do_upload('image')) {
							// Add to db						
							$this->user->updateAvatar($this->session->userdata('user_id'), $_FILES['image']['name']);
							return redirect('profile/index');
							// Uploaded file data for any case
							// $fileData = $this->upload->data();
							// $uploadData[$i]['file_name'] = $fileData['file_name'];
							// $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
						} else {
							//$errorUploadType .= $_FILES['file']['name'] . ' | ';
							// invalid file type or file size
							return redirect('profile/index');
						}
					}
				}
			}
		}
	}


	public function password_process(){
		if (strtoupper($_SERVER['REQUEST_METHOD'])=='POST') {
			$this->form_validation->set_rules('currpassword', lang('currpwd'), 'required|max_length[30]');
			$this->form_validation->set_rules('password', lang('npwd'), 'required|min_length[6]|max_length[30]');
			$this->form_validation->set_rules('cpassword', lang('pwd2'), 'required|min_length[6]|max_length[30]');
			if($this->form_validation->run()){
				$userdata = $this->user->getUserdataById($this->session->userdata('user_id'));
					if ($userdata && password_verify($this->input->post('currpassword'), $userdata->password)){
						if($this->user->updatePassword($this->session->userdata('user_id'), password_hash($this->input->post('password'), PASSWORD_BCRYPT))){
							$this->session->set_flashdata('profPwdChng', array('status' => true, 'message' => lang('pwdUpdSucc')));
						}
					}
					else{
						$this->session->set_flashdata('profPwdChng', array('status' => false, 'message' => lang('invOldPwd')));
					}
				
			}
		}
		$this->index();
	}


	public function test2($id=0){
		echo $id;
	}


	function validate_daterange($dtrange){
		$startDate = substr($dtrange,0,10);
		$endDate = substr($dtrange,-10);
		$stdt = explode("/", $startDate);
		$endt = explode("/", $endDate);
		if(count($stdt)==3 && count($endt)==3 && checkdate($stdt[0], $stdt[1], $stdt[2]) && checkdate($endt[0], $endt[1], $endt[2])) return true;
		$this->form_validation->set_message('validate_daterange', lang('invDTRangeFormat'));
		return false;
	}
	
	
}