<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	private $data = array(); 

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(['language', 'url', 'security']);
		$this->lang->load('home');
		$this->load->library('form_validation');
		$this->load->model(['mainslider', 'hotel', 'tour', 'contact']);
		$this->data['hotels'] = $this->hotel->getHotels();
		$this->data['tours'] = $this->tour->getTours();
		$this->data['contacts'] = $this->contact->getContacts();
	}
	

	public function index(){
		$this->data['slides'] = $this->mainslider->getSlides();		
		$this->load->view('templates/header', $this->data);
		$this->load->view('slider', $this->data);
		$this->load->view('hotels', $this->data);
		$this->load->view('tours', $this->data);
		$this->load->view('templates/footer');
	}

	public function hotels(){
		$this->load->view('templates/header', $this->data);
		$this->load->view('hotels', $this->data);
		$this->load->view('templates/footer');		
	}

	public function hotel($id=0){		
		if (filter_var($id, FILTER_VALIDATE_INT) && $id>0){
			$this->load->model(['hotelimage', 'roomtype']);
			$this->data['rooms'] = $this->roomtype->getRoomsByType($id);

			if (strtoupper($_SERVER['REQUEST_METHOD'])=='POST'){
				$this->form_validation->set_rules('hotelorder_date', 'Reservation Date', 'required|callback_validate_daterange');
				$this->form_validation->set_rules('room_number', 'Room Number', 'required|integer|greater_than[0]');				
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
				// else{
				// 	echo "incorrect range";exit;
				// }
			}
			$this->data['hotel'] = $this->hotel->getHotel($id);
			$this->data['images'] = $this->hotelimage->getImagesByHotelId($id);
			$this->load->view('hoteldetails', $this->data);
		}else{$this->hotels();}
	}

	public function tours(){
		$this->load->view('templates/header', $this->data);
		$this->load->view('tours', $this->data);
		$this->load->view('templates/footer');
	}

	public function tour($id=0){
		if (filter_var($id, FILTER_VALIDATE_INT) && $id>0){
			$tour = $this->tour->getTour($id);
			$this->data['tourdetails'] = $tour;
			if($tour){
				if($tour->istour){
					$this->load->model('tourimage');
					$this->data['images'] = $this->tourimage->getImagesByTourId($id);
					$this->load->view('templates/header', $this->data);
					$this->load->view('tourdetails', $this->data);
					$this->load->view('templates/footer');
				}else{
					$this->data['childTours'] = $this->tour->getChildTours($id);
					$this->load->view('templates/header', $this->data);
					$this->load->view('tours', $this->data);
					$this->load->view('templates/footer');
				}
			}else{return redirect('/home/tours');}
		}else{return redirect('/home/tours');}
	}


	public function contact(){
		$this->load->view('templates/header', $this->data);
		$this->load->view('contact', $this->data);
		$this->load->view('templates/footer');
	}


	//$this->form_validation->set_rules('reg[dob]', 'Date of birth', 'regex_match[(0[1-9]|1[0-2])/(0[1-9]|1[0-9]|2[0-9]|3(0|1))/\d{4}]');

	function validate_daterange($dtrange){
		$startDate = substr($dtrange,0,10);
		$endDate = substr($dtrange,-10);
		$stdt = explode("/", $startDate);
		$endt = explode("/", $endDate);
		if(count($stdt)==3 && count($endt)==3 && checkdate($stdt[0], $stdt[1], $stdt[2]) && checkdate($endt[0], $endt[1], $endt[2])) return true;
		return false;
	}


	public function test(){
		$a = array();
		$a[0] = null;
		$a[1] = null;
		$a[3] = "dsjhfsdkfj";
		
		
		
		if(isset($a[2])) echo "such key exists";
		else echo "such key does not exists";
	}

	
	
}
