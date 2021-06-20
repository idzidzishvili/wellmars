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
		$this->load->model(['slidertext', 'hoteltext', 'tourtext']);
		$this->data['hoteltexts'] = $this->hoteltext->getHoteltexts();
		$this->data['tourtexts'] = $this->tourtext->getTourtexts();
		$this->data['slidedertexts'] = $this->slidertext->getSlidertexts();
		$this->load->view('templates/header', $this->data);
		$this->load->view('slider', $this->data);
		$this->load->view('hotels', $this->data);
		$this->load->view('tours', $this->data);
		$this->load->view('templates/footer');
	}

	public function hotels(){
		$this->load->model('hoteltext');
		$this->data['hoteltexts'] = $this->hoteltext->getHoteltexts();
		$this->load->view('templates/header', $this->data);
		$this->load->view('hotels', $this->data);
		$this->load->view('templates/footer');
	}

	public function hotel($id=0){		
		if (filter_var($id, FILTER_VALIDATE_INT) && $id>0){
			$this->load->model(['hotelimage', 'hotelreview', 'roomtype', 'hotelreview']);
			$this->data['rooms'] = $this->roomtype->getRoomsByType($id);			
			$hotel = $this->hotel->getHotel($id);
			$this->data['hotel'] = $hotel;
			$this->data['images'] = $this->hotelimage->getImagesByHotelId($id);
			$reviewsCount = $this->hotelreview->getReviewCountByHotelId($id);
			$this->data['reviewsCount'] = $reviewsCount;
			
			$this->load->library('pagination');
			$config['base_url'] = site_url('home/hotel/'.$hotel->hotelid.'/'.strtolower(preg_replace('/[^A-Za-z0-9-]+/', '-', $hotel->type_en)));
			$config['total_rows'] = $reviewsCount;
			$config['use_page_numbers'] = TRUE;
			$config['per_page'] = 4;
			$config['num_links'] = 2;
			$this->pagination->initialize($config);
			$this->data['links'] = $this->pagination->create_links();
			$page = ($this->uri->segment(6)) ? $this->uri->segment(6) : 0;
			$this->data['page'] = $page;
			$this->data['reviews'] = $this->hotelreview->getReviewsByHotelId($id, 4, $page);

			$this->data['hoteId'] = $id;
			$this->data['userHasReview'] = $this->session->userdata('logged_in')?$this->hotelreview->userHasReview($this->session->userdata('user_id'), $id):false;
			$this->load->view('hoteldetails', $this->data);
		}else{$this->hotels();}
	}

	public function tours(){
		$this->load->model('tourtext');
		$this->data['tourtexts'] = $this->tourtext->getTourtexts();
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


	public function gallery($id=0){
		if($id){
			$this->load->model(['gallery', 'galleryimage']);
			$this->data['gallery'] = $this->gallery->getGallery($id);
			$this->data['galleryImages'] = $this->galleryimage->getImagesByGalleryId($id);
			if(!count($this->data['galleryImages'])){
				return redirect('home/gallery');
			}
			$this->load->view('templates/header', $this->data);
			$this->load->view('galleryimages', $this->data);
			$this->load->view('templates/footer');
		}else{
			$this->load->model('gallery');
			$this->data['galleries'] = $this->gallery->getGalleries();
			$this->load->view('templates/header', $this->data);
			$this->load->view('gallery', $this->data);
			$this->load->view('templates/footer');
		}
	}


	public function sendmail(){
		$this->load->library('email');
		$this->email->from('your@example.com', 'Your Name');
		$this->email->to('ilia.dzidzishvili@gmail.com');
		// $this->email->cc('another@another-example.com');
		// $this->email->bcc('them@their-example.com');
		$this->email->subject('Email Test');
		$this->email->message('Testing the email class.');
		$this->email->send();
	}
	
	
}
