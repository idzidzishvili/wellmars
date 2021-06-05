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

	


	public function test(){
		$a = array();
		$a[0] = null;
		$a[1] = null;
		$a[3] = "dsjhfsdkfj";
		
		
		
		if(isset($a[2])) echo "such key exists";
		else echo "such key does not exists";
	}


	
	
	
}
