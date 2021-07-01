<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin extends CI_Controller
{
	


   public function __construct()
	{
      parent::__construct();
      if (!$this->session->userdata('logged_in') || $this->session->userdata('user_role') != 1) redirect('auth/login');
		$this->load->library('form_validation');
		$this->load->helper("security");
      $this->lang->load('home', 'georgian');
	}

	public function index(){
		$this->tours();
	}
	
	//OK
	public function tours(){
		$this->load->model(['tour', 'tourtext']);
		$data['tourdata'] = $this->tour->getToursAdmin();
		$data['tourtexts'] = $this->tourtext->getTourtexts();
		$this->load->view('admin/index', $data);
	}
	
	//OK
	public function addtour(){
		$this->load->model('tour');
		$data['tourCategories'] = $this->tour->getTourCategories();
		$this->load->view('admin/addTour', $data);
	}

	//OK
	public function addtourcategory(){
		$this->load->model(['tour', 'tourimage']);
		if (strtoupper($_SERVER['REQUEST_METHOD'])) {			
			$this->form_validation->set_rules('tourname_ge', 'Tour name Georgian', 'trim|required|xss_clean|min_length[4]|max_length[200]|is_unique[tours.tourname_ge]');
			$this->form_validation->set_rules('tourname_en', 'Tour name English', 'trim|required|xss_clean|min_length[4]|max_length[200]|is_unique[tours.tourname_en]');
			$this->form_validation->set_rules('tourname_ru', 'Tour name Russian', 'trim|required|xss_clean|min_length[4]|max_length[200]|is_unique[tours.tourname_ru]');		
			if (empty($_FILES['tourimage']['name'])) {$this->form_validation->set_rules('tourimage', 'Tour image', 'required');}
			
			if ($this->form_validation->run()) {		
				if ($id = $this->tour->addTourCategory(
						$this->input->post('tourname_ge', true), 
						$this->input->post('tourname_en', true), 
						$this->input->post('tourname_ru', true)
					)){						
						$file = $_FILES['tourimage']['name'];
						$filename = 'tourimage'. str_pad($id, 3, '0', STR_PAD_LEFT) . '.' . pathinfo($file, PATHINFO_EXTENSION);						
						$config['file_name'] = $filename;
						$config['upload_path'] = 'uploads/tours/';
						$config['allowed_types'] = 'gif|jpg|jpeg|png';
						$config['max_size'] = 10000;
						$config['max_width'] = 4500;
						$config['max_height'] = 2500;
						$this->load->library('upload', $config);
						
						if ($this->upload->do_upload('tourimage')) {
							//$this->load->model('tourmainimage');
							//$this->tourmainimage->addImage($id, $filename);
							$this->tourimage->addImage($id, $filename, 1);
								// $error = array('error' => $this->upload->display_errors());
								// $this->load->view('files/upload_form', $error);
						}//else{print_r($this->upload->display_errors());exit;}
					$this->session->set_flashdata('addTourRes', array('status' => true, 'message' => $this->lang->line('toolAdded')));
					return redirect('admin/tours');
				} else {
					$this->session->set_flashdata('addTourRes', array('status' => false, 'message' => $this->lang->line('dbError')));
					return redirect('admin/tours');
				}
			}
		}
		$this->load->view('admin/addTour');
	}

	//OK
	public function edittour($id=0){
		$this->load->model(['tour', 'tourimage']);
		if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST' && filter_var($id, FILTER_VALIDATE_INT)) {
			$this->form_validation->set_rules('tourname_ge', 'Tour name', 'trim|required|xss_clean|strip_tags|min_length[4]|max_length[200]');	
			$this->form_validation->set_rules('tourname_en', 'Tour name', 'trim|required|xss_clean|strip_tags|min_length[4]|max_length[200]');
			$this->form_validation->set_rules('tourname_ru', 'Tour name', 'trim|required|xss_clean|strip_tags|min_length[4]|max_length[200]');
			if ($this->form_validation->run()) {	
				$this->tour->editTour($id, $this->input->post('tourname_ge', true), $this->input->post('tourname_en', true), $this->input->post('tourname_ru', true));
				
				if($_FILES['tourimage']['name']){					
					$file = $_FILES['tourimage']['name'];
					$filename = 'tourimage'. str_pad($id, 3, '0', STR_PAD_LEFT) . '.' . pathinfo($file, PATHINFO_EXTENSION);						
					$config['file_name'] = $filename;
					$config['upload_path'] = 'uploads/tours/';
					$config['allowed_types'] = 'gif|jpg|jpeg|png';
					$config['max_size'] = 10000;
					$config['max_width'] = 4500;
					$config['max_height'] = 2500;
					$config['overwrite'] = true;
					$this->load->library('upload', $config);					
					if ($this->upload->do_upload('tourimage')) {
						$this->load->model('tourmainimage');
						$this->tourmainimage->updateImage($id, $filename);
					}
				}				
				return redirect('admin');								
			}
		}
		$data['tour'] = $this->tour->getTour($id);
		$this->load->model('tourmainimage');
		$data['filename'] = $this->tourmainimage->getFilename($id);
		$this->load->view('admin/editTour', $data);
	}

	//OK
	public function deletetour($id=0){	
		$this->load->model('tour');
		if (filter_var($id, FILTER_VALIDATE_INT)) {
			$this->delTour($id);
			//if it is a category delete all subtours
			$tour = $this->tour->getTour($id);
			if(!$tour->istour){
				$subTours = $this->tour->getChildTours($id);
				foreach($subTours as $subtour){
					$this->delTour($subtour->id);
				}
			}
		}
		return redirect('admin');
	}
	function delTour($id){
		$this->load->model(['tour', 'tourimage']);
		if($this->tour->deleteTour($id)){
			$tourImages = $this->tourimage->getImagesByTourId($id);
			$this->tourimage->deleteTourImages($id);
			foreach($tourImages as $img){
				unlink(FCPATH.'uploads/tours/'.$img->filename);
			}
		}
	}

	//OK
	public function addtour_process(){
		$this->load->model(['tour', 'tourimage']);
		if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
			$this->form_validation->set_rules('tourId', 'Tour Name', 'integer');
			$this->form_validation->set_rules('subTourName_ge', 'Sub Tour Name Georgian', 'trim|required|xss_clean|strip_tags|min_length[4]|max_length[200]|is_unique[tours.tourname_ge]');
			$this->form_validation->set_rules('subTourName_en', 'Sub Tour Name English', 'trim|required|xss_clean|strip_tags|min_length[4]|max_length[200]|is_unique[tours.tourname_en]');
			$this->form_validation->set_rules('subTourName_ru', 'Sub Tour Name Russian', 'trim|required|xss_clean|strip_tags|min_length[4]|max_length[200]|is_unique[tours.tourname_ru]');
			$this->form_validation->set_rules('subTourDuration_ge', 'Tour Duration Georgian', 'trim|required|xss_clean|strip_tags|max_length[200]');
			$this->form_validation->set_rules('subTourDuration_en', 'Tour Duration English', 'trim|required|xss_clean|strip_tags|max_length[200]');
			$this->form_validation->set_rules('subTourDuration_ru', 'Tour Duration Russian', 'trim|required|xss_clean|strip_tags|max_length[200]');
			$this->form_validation->set_rules('subTourDest_ge', 'Tour Destination Georgian', 'trim|required|xss_clean|strip_tags|max_length[200]');
			$this->form_validation->set_rules('subTourDest_en', 'Tour Destination English', 'trim|required|xss_clean|strip_tags|max_length[200]');
			$this->form_validation->set_rules('subTourDest_ru', 'Tour Destination Russian', 'trim|required|xss_clean|strip_tags|max_length[200]');
			$this->form_validation->set_rules('subTourDescr_ge', 'Tour Description Georgian', 'trim|required|xss_clean|max_length[10000]');
			$this->form_validation->set_rules('subTourDescr_en', 'Tour Description English', 'trim|required|xss_clean|max_length[10000]');
			$this->form_validation->set_rules('subTourDescr_ru', 'Tour Description Russian', 'trim|required|xss_clean|max_length[10000]');
			if (empty($_FILES['tourImages']['name'])) {$this->form_validation->set_rules('tourImages', 'Image', 'required');}
			$this->form_validation->set_rules('mainImage', 'Main Image', 'required');

			if ($this->form_validation->run()) {
				$tourId = $this->tour->addTour(
					$this->input->post('tourId', true),
					$this->input->post('subTourName_ge', true),
					$this->input->post('subTourName_en', true),
					$this->input->post('subTourName_ru', true),
					$this->input->post('subTourDuration_ge', true),
					$this->input->post('subTourDuration_en', true),
					$this->input->post('subTourDuration_ru', true),
					$this->input->post('subTourDest_ge', true),
					$this->input->post('subTourDest_en', true),
					$this->input->post('subTourDest_ru', true),
					$this->input->post('subTourDescr_ge', true),
					$this->input->post('subTourDescr_en', true),
					$this->input->post('subTourDescr_ru', true)
				);
				if($tourId){ 
					$this->session->set_flashdata('addSubTourRes', array('status' => true, 'message' => $this->lang->line('subTourAdded')));
					echo "Tour added <br>";
				}else{
					$this->session->set_flashdata('addSubTourRes', array('status' => false, 'message' => $this->lang->line('dbError')));
					echo "couldnot add tour <br>";
				}

				$filename ='';
				$key = true;
				$this->load->model('tourimage');
				while ($key) {
					$filename = substr(str_shuffle(MD5(microtime())), 0, 16);
					if ($this->tourimage->checkImageName($filename) == 0) $key = false;
				}
				//echo $this->input->post('mainImage') . '<br>';
				$filesCount = count($_FILES['tourImages']['name']);
				$mainImage = $this->input->post('mainImage');
				for ($i = 0; $i < $filesCount; $i++) {
					if (!empty($_FILES['tourImages']['name'][$i])) {
						
						$_FILES['image']['name']     = $filename . str_pad($i+1, 3, '0', STR_PAD_LEFT) . '.' . pathinfo($_FILES['tourImages']['name'][$i], PATHINFO_EXTENSION); 
						$_FILES['image']['type']     = $_FILES['tourImages']['type'][$i];
						$_FILES['image']['tmp_name'] = $_FILES['tourImages']['tmp_name'][$i];
						$_FILES['image']['error']    = $_FILES['tourImages']['error'][$i];
						$_FILES['image']['size']     = $_FILES['tourImages']['size'][$i];
						
						// File upload configuration 
						$uploadPath = 'uploads/tours/';
						$config['upload_path'] = $uploadPath;
						$config['allowed_types'] = 'jpg|jpeg|png|gif';
						//$config['max_size'] = '100'; 
						//$config['max_width'] = '1024'; 
						//$config['max_height'] = '768'; 
						
						// Add to db
						$this->tourimage->addImage($tourId, $_FILES['image']['name'], $mainImage==$i+1);

						// Load and initialize upload library 
						$this->load->library('upload', $config);
						$this->upload->initialize($config);

						// Upload file to server 
						if ($this->upload->do_upload('image')) {
							// Uploaded file data 
							$fileData = $this->upload->data();
							$uploadData[$i]['file_name'] = $fileData['file_name'];
							$uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
						} else {
							//$errorUploadType .= $_FILES['file']['name'] . ' | ';
						}
					}else{
						// add first image as main if file input with main image switch is empty
						if ($this->input->post('mainImage') - 1 == $i) {
							$this->tourimage->updateFirstImage($tourId);
						}
					}
				}
				return redirect('admin/tours');				 
			}else{
				$this->load->view('admin/addtour', array('activetab'=>2));
			}
		}else{
			redirect('admin/tours');
		}		
	}

	//OK
	public function editsubtour($id=0){
		$this->load->model(['tour', 'tourimage']);
		if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST' && filter_var($id, FILTER_VALIDATE_INT) && $id>0) {
			//var_dump($_POST);var_dump($_FILES);exit;
			$this->form_validation->set_rules('tourId', 'Tour Name', 'integer');
			$this->form_validation->set_rules('subTourName_ge', 'Sub Tour Name Georgian', 'trim|required|xss_clean|strip_tags|min_length[4]|max_length[200]');
			$this->form_validation->set_rules('subTourName_en', 'Sub Tour Name English', 'trim|required|xss_clean|strip_tags|min_length[4]|max_length[200]');
			$this->form_validation->set_rules('subTourName_ru', 'Sub Tour Name Russian', 'trim|required|xss_clean|strip_tags|min_length[4]|max_length[200]');
			$this->form_validation->set_rules('subTourDuration_ge', 'Tour Duration Georgian', 'trim|required|xss_clean|strip_tags|max_length[200]');
			$this->form_validation->set_rules('subTourDuration_en', 'Tour Duration English', 'trim|required|xss_clean|strip_tags|max_length[200]');
			$this->form_validation->set_rules('subTourDuration_ru', 'Tour Duration Russian', 'trim|required|xss_clean|strip_tags|max_length[200]');
			$this->form_validation->set_rules('subTourDest_ge', 'Tour Destination Georgian', 'trim|required|xss_clean|strip_tags|max_length[200]');
			$this->form_validation->set_rules('subTourDest_en', 'Tour Destination English', 'trim|required|xss_clean|strip_tags|max_length[200]');
			$this->form_validation->set_rules('subTourDest_ru', 'Tour Destination Russian', 'trim|required|xss_clean|strip_tags|max_length[200]');
			$this->form_validation->set_rules('subTourDescr_ge', 'Tour Description Georgian', 'trim|required|xss_clean|max_length[10000]');
			$this->form_validation->set_rules('subTourDescr_en', 'Tour Description English', 'trim|required|xss_clean|max_length[10000]');
			$this->form_validation->set_rules('subTourDescr_ru', 'Tour Description Russian', 'trim|required|xss_clean|max_length[10000]');
			if (empty($_FILES['tourImages']['name'])) {$this->form_validation->set_rules('tourImages', 'Image', 'required');}
			$this->form_validation->set_rules('mainImage', 'Main Image', 'required');

			if ($this->form_validation->run()) {
				// Update database with form fields
				$subTour = $this->tour->editSubTour(
					$id,
					$this->input->post('tourId', true),
					$this->input->post('subTourName_ge', true),
					$this->input->post('subTourName_en', true),
					$this->input->post('subTourName_ru', true),
					$this->input->post('subTourDuration_ge', true),
					$this->input->post('subTourDuration_en', true),
					$this->input->post('subTourDuration_ru', true),
					$this->input->post('subTourDest_ge', true),
					$this->input->post('subTourDest_en', true),
					$this->input->post('subTourDest_ru', true),
					$this->input->post('subTourDescr_ge', true),
					$this->input->post('subTourDescr_en', true),
					$this->input->post('subTourDescr_ru', true)
				);
				if($subTour){ 
					$this->session->set_flashdata('addSubTourRes', array('status' => true, 'message' => $this->lang->line('subTourAdded')));
				}else{
					$this->session->set_flashdata('addSubTourRes', array('status' => false, 'message' => $this->lang->line('dbError')));
				}

				// populate new filename
				$filename ='';
				$key = true;
				while ($key) {
					$filename = substr(str_shuffle(MD5(microtime())), 0, 16);
					if ($this->tourimage->checkImageName($filename) == 0) $key = false;
				}
				
				//echo $this->input->post('mainImage') . '<br>';
				$filesCount = count($_FILES['tourImages']['name']);
				$mainImage = $this->input->post('mainImage');
				for ($i = 0; $i < $filesCount; $i++) {						
					if (!empty($_FILES['tourImages']['name'][$i])) {
						
						$_FILES['image']['name']     = $filename . str_pad($i+1, 3, '0', STR_PAD_LEFT) . '.' . pathinfo($_FILES['tourImages']['name'][$i], PATHINFO_EXTENSION); 
						$_FILES['image']['type']     = $_FILES['tourImages']['type'][$i];
						$_FILES['image']['tmp_name'] = $_FILES['tourImages']['tmp_name'][$i];
						$_FILES['image']['error']    = $_FILES['tourImages']['error'][$i];
						$_FILES['image']['size']     = $_FILES['tourImages']['size'][$i];
						
						// File upload configuration 
						$uploadPath = 'uploads/tours/';
						$config['upload_path'] = $uploadPath;
						$config['allowed_types'] = 'jpg|jpeg|png|gif';
						//$config['max_size'] = '100'; 
						//$config['max_width'] = '1024'; 
						//$config['max_height'] = '768'; 
						
						// Add to db						
						$this->tourimage->addImage($id, $_FILES['image']['name'], $mainImage==$i+1);

						// Load and initialize upload library 
						$this->load->library('upload', $config);
						$this->upload->initialize($config);

						// Upload file to server 
						if ($this->upload->do_upload('image')) {
							// Uploaded file data for any case
							// $fileData = $this->upload->data();
							// $uploadData[$i]['file_name'] = $fileData['file_name'];
							// $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
						} else {
							//$errorUploadType .= $_FILES['file']['name'] . ' | ';
						}
					}else{
						// add first image as main if no main image selected
						// if ($this->input->post('mainImage') - 1 == $i) {
						// 	$this->image->updateFirstImage($subTour);
						// }
					}
				}
				if(substr($mainImage, 0, 3)=='old'){
					$this->tourimage->updateMainImage($id, str_replace('old','', $mainImage));
				}else{
					if ($mainImage-1 == $i) {
						$this->tourimage->updateFirstImage($id);
					}
				}
				return redirect('admin/tours');				 
			}			
		}else{
		$data['id'] = $id;
		$data['tourCategories'] = $this->tour->getTourCategories();
		$data['tour'] = $this->tour->getSubTourDataById($id);
		$data['tourimages'] = $this->tourimage->getImagesByTourId($id);
		$this->load->view('admin/editSubTour', $data);		}
	}

	//OK
	public function deleteImage($imageid=0, $id=0){
		if (filter_var($imageid, FILTER_VALIDATE_INT)) {
			$this->load->model('tourimage');
			$imageData = $this->tourimage->getImageDataByImageId($imageid);
			if($this->tourimage->deleteImage($imageid)){
				unlink(FCPATH.'uploads/tours/'.$imageData->filename);
				if($imageData->ismain){
					$this->tourimage->setFirstActive($id);
				}
			}
		}
		return redirect('admin/editSubTour/'.$id);
	}

	//OK
	public function sliders(){
		$this->load->model('mainslider');
		if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
			$filename ='';
			$key = true;
			while ($key) {
				$filename = substr(str_shuffle(MD5(microtime())), 0, 16);
				if ($this->mainslider->checkFileName($filename) == 0) $key = false;
			}			
			$filesCount = count($_FILES['sliderImages']['name']);
			for ($i = 0; $i < $filesCount; $i++) {						
				if (!empty($_FILES['sliderImages']['name'][$i])) {					
					$_FILES['image']['name']     = $filename . str_pad($i+1, 3, '0', STR_PAD_LEFT) . '.' . pathinfo($_FILES['sliderImages']['name'][$i], PATHINFO_EXTENSION); 
					$_FILES['image']['type']     = $_FILES['sliderImages']['type'][$i];
					$_FILES['image']['tmp_name'] = $_FILES['sliderImages']['tmp_name'][$i];
					$_FILES['image']['error']    = $_FILES['sliderImages']['error'][$i];
					$_FILES['image']['size']     = $_FILES['sliderImages']['size'][$i];
					
					// File upload configuration 
					$config['upload_path'] = 'uploads/slider/';
					$config['allowed_types'] = 'jpg|jpeg|png|gif';
					
					// Add to db
					$this->mainslider->addImage($_FILES['image']['name']);

					// Load and initialize upload library 
					$this->load->library('upload', $config);
					$this->upload->initialize($config);

					// Upload file to server 
					if ($this->upload->do_upload('image')) {
						// Uploaded file data 
						$fileData = $this->upload->data();
						$uploadData[$i]['file_name'] = $fileData['file_name'];
						$uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
					}
				}
			}
		}		
		$data['slides'] = $this->mainslider->getSlides();
		$this->load->view('admin/sliders', $data);	
	}

	//OK
	public function deleteSlider($id=0){
		if (filter_var($id, FILTER_VALIDATE_INT)) {
			$this->load->model('mainslider');
			$filename = $this->mainslider->getFilenameById($id);
			if($this->mainslider->deleteSlide($id)){
				unlink(FCPATH.'uploads/slider/'.$filename);
			}
		}
		return redirect('admin/sliders');
	}

	//OK
	public function hotels(){
		$this->load->model(['hotel', 'hoteltext']);
		$data['hotels'] = $this->hotel->getHotels();
		$data['hoteltexts'] = $this->hoteltext->getHoteltexts();
		$this->load->view('admin/hotels', $data);
	}

	//OK
	public function addHotel(){
		$this->load->model('hotel');
		$this->load->model('hotelimage');
		if (strtoupper($_SERVER['REQUEST_METHOD'])=="POST") {			
			$this->form_validation->set_rules('type_ge', 'Hotel type Georgian', 'trim|required|xss_clean|strip_tags|min_length[4]|max_length[200]|is_unique[hotels.type_ge]');
			$this->form_validation->set_rules('type_en', 'Hotel type English', 'trim|required|xss_clean|strip_tags|min_length[4]|max_length[200]|is_unique[hotels.type_en]');
			$this->form_validation->set_rules('type_ru', 'Hotel type Russian', 'trim|required|xss_clean|strip_tags|min_length[4]|max_length[200]|is_unique[hotels.type_ru]');		
			$this->form_validation->set_rules('hotel_ge', 'Hotel type Georgian', 'trim|required|xss_clean');
			$this->form_validation->set_rules('hotel_en', 'Hotel type English', 'trim|required|xss_clean');
			$this->form_validation->set_rules('hotel_ru', 'Hotel type Russian', 'trim|required|xss_clean');		
			if ($this->form_validation->run()) {		
				if ($hotel = $this->hotel->addHotel(
						$this->input->post('type_ge', true), 
						$this->input->post('type_en', true), 
						$this->input->post('type_ru', true),
						$this->input->post('hotel_ge', true), 
						$this->input->post('hotel_en', true), 
						$this->input->post('hotel_ru', true)
					)){
					$this->session->set_flashdata('addHotelRes', array('status' => true, 'message' => 'Hotel added'));

					// work with files
					$filename ='';
					$key = true;
					while ($key) {
						$filename = substr(str_shuffle(MD5(microtime())), 0, 16);
						if ($this->hotelimage->checkHotelImageName($filename) == 0) $key = false;
					}
					//echo $this->input->post('mainImage') . '<br>';
					$filesCount = count($_FILES['hotelImages']['name']);
					for ($i = 0; $i < $filesCount; $i++) {
						if (!empty($_FILES['hotelImages']['name'][$i])) {
							
							$_FILES['hotelImage']['name']     = $filename . str_pad($i+1, 3, '0', STR_PAD_LEFT) . '.' . pathinfo($_FILES['hotelImages']['name'][$i], PATHINFO_EXTENSION); 
							$_FILES['hotelImage']['type']     = $_FILES['hotelImages']['type'][$i];
							$_FILES['hotelImage']['tmp_name'] = $_FILES['hotelImages']['tmp_name'][$i];
							$_FILES['hotelImage']['error']    = $_FILES['hotelImages']['error'][$i];
							$_FILES['hotelImage']['size']     = $_FILES['hotelImages']['size'][$i];
							
							// File upload configuration 
							$uploadPath = 'uploads/hotels/';
							$config['upload_path'] = $uploadPath;
							$config['allowed_types'] = 'jpg|jpeg|png|gif';
							//$config['max_size'] = '100'; 
							//$config['max_width'] = '1024'; 
							//$config['max_height'] = '768'; 
							
							// Add to db
							$this->hotelimage->addImage($hotel, $_FILES['hotelImage']['name'], $this->input->post('mainImage') == $i+1);

							// Load and initialize upload library 
							$this->load->library('upload', $config);
							$this->upload->initialize($config);

							// Upload file to server 
							if ($this->upload->do_upload('hotelImage')) {
								// Uploaded file data 
								$fileData = $this->upload->data();
								$uploadData[$i]['file_name'] = $fileData['file_name'];
								$uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
							} else {
								//$errorUploadType .= $_FILES['file']['name'] . ' | ';
							}
						}else{
							// add first image as main if no main image selected
							if ($this->input->post('mainImage') - 1 == $i) {
								$this->hotelimage->updateFirstImage($hotel);
							}
						}
					}
				} else {
					$this->session->set_flashdata('addHotelRes', array('status' => false, 'message' => $this->lang->line('dbError')));
					return redirect('admin/addHotel');
				}
			}
		}
		$this->load->view('admin/addHotel');
	}

	//OK
	public function editHotel($id=0){
		$this->load->model(['hotel', 'hotelimage']);
		if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST' && filter_var($id, FILTER_VALIDATE_INT) && $id>0) {
			
			$this->form_validation->set_rules('type_ge', 'Hotel type Georgian', 'trim|required|xss_clean|strip_tags|min_length[4]|max_length[200]');
			$this->form_validation->set_rules('type_en', 'Hotel type English', 'trim|required|xss_clean|strip_tags|min_length[4]|max_length[200]');
			$this->form_validation->set_rules('type_ru', 'Hotel type Russian', 'trim|required|xss_clean|strip_tags|min_length[4]|max_length[200]');		
			$this->form_validation->set_rules('hotel_ge', 'Hotel type Georgian', 'trim|required|xss_clean');
			$this->form_validation->set_rules('hotel_en', 'Hotel type English', 'trim|required|xss_clean');
			$this->form_validation->set_rules('hotel_ru', 'Hotel type Russian', 'trim|required|xss_clean');
			if (empty($_FILES['hotelImages']['name'])) {$this->form_validation->set_rules('hotelImages', 'Image', 'required');}
			$this->form_validation->set_rules('mainImage', 'Main Image', 'required');

			if ($this->form_validation->run()) {		
				// Update database with form fields
				$hotel = $this->hotel->editHotel(
					$id,
					$this->input->post('type_ge', true),
					$this->input->post('type_en', true),
					$this->input->post('type_ru', true),
					$this->input->post('hotel_ge', true),
					$this->input->post('hotel_en', true),
					$this->input->post('hotel_ru', true)
				);
				if($hotel){ 
					$this->session->set_flashdata('editHotel', array('status' => true, 'message' => 'Hotel updated'));
				}else{
					$this->session->set_flashdata('editHotel', array('status' => false, 'message' => 'Database error'));
				}

				$filename ='';
				$key = true;
				while ($key) {
					$filename = substr(str_shuffle(MD5(microtime())), 0, 16);
					if ($this->hotelimage->checkHotelImageName($filename) == 0) $key = false;
				}
				
				//echo $this->input->post('mainImage') . '<br>';
				$filesCount = count($_FILES['hotelImages']['name']);
				$mainImage = $this->input->post('mainImage');
				for ($i = 0; $i < $filesCount; $i++) {
					if (!empty($_FILES['hotelImages']['name'][$i])) {
						
						$_FILES['hotelImage']['name']     = $filename . str_pad($i+1, 3, '0', STR_PAD_LEFT) . '.' . pathinfo($_FILES['hotelImages']['name'][$i], PATHINFO_EXTENSION); 
						$_FILES['hotelImage']['type']     = $_FILES['hotelImages']['type'][$i];
						$_FILES['hotelImage']['tmp_name'] = $_FILES['hotelImages']['tmp_name'][$i];
						$_FILES['hotelImage']['error']    = $_FILES['hotelImages']['error'][$i];
						$_FILES['hotelImage']['size']     = $_FILES['hotelImages']['size'][$i];
						
						// File upload configuration 
						$uploadPath = 'uploads/hotels/';
						$config['upload_path'] = $uploadPath;
						$config['allowed_types'] = 'jpg|jpeg|png|gif';
						//$config['max_size'] = '100'; 
						//$config['max_width'] = '1024'; 
						//$config['max_height'] = '768'; 
						
						// Add to db
						$this->hotelimage->addImage($id, $_FILES['hotelImage']['name'], $mainImage==$i+1);

						// Load and initialize upload library 
						$this->load->library('upload', $config);
						$this->upload->initialize($config);

						// Upload file to server 
						if ($this->upload->do_upload('hotelImage')) {
							// Uploaded file data for any case
							// $fileData = $this->upload->data();
							// $uploadData[$i]['file_name'] = $fileData['file_name'];
							// $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
						} else {
							//$errorUploadType .= $_FILES['file']['name'] . ' | ';
						}
					}else{
						// add first image as main if no main image selected
						// if ($this->input->post('mainImage') - 1 == $i) {
						// 	$this->image->updateFirstImage($subTour);
						// }
					}
				}
				if(substr($mainImage, 0, 3)=='old'){
					$this->hotelimage->updateMainImage($id, str_replace('old','', $mainImage));
				}else{
					if ($mainImage-1 == $i) {
						$this->tourimage->updateFirstImage($hotel);
					}
				}
				return redirect('admin/hotels');
			}
		}
		$data['id'] = $id;
		$data['hotel'] = $this->hotel->getHotel($id);
		$data['hotelimages'] = $this->hotelimage->getImagesByHotelId($id);
		$this->load->view('admin/editHotel', $data);		
	}

	//OK
	public function deletehotel($id=0){	
		if (filter_var($id, FILTER_VALIDATE_INT)) {			
			$this->load->model(['hotel', 'hotelimage']);
			if($this->hotel->deleteHotel($id)){
				$hotelImages = $this->hotelimage->getImagesByHotelId($id);
				$this->hotelimage->deleteHotelImages($id);
				foreach($hotelImages as $img){
					unlink(FCPATH.'uploads/hotels/'.$img->filename);
				}
			}			
		}
		return redirect('admin');
	}

	//OK
	public function deleteHotelImage($imageid=0, $id=0){	
		if (filter_var($imageid , FILTER_VALIDATE_INT) && filter_var($id , FILTER_VALIDATE_INT)) {
			$this->load->model('hotelimage');
			$imageData = $this->hotelimage->getImageDataByImageId($imageid);
			if($this->hotelimage->deleteImage($imageid)){
				unlink(FCPATH.'uploads/hotels/'.$imageData->filename);
				if($imageData->ismain){
					$this->hotelimage->setFirstActive($id);
				}
			}
		}
		return redirect('admin/editHotel/'.$id);
	}


	public function hotelreservations(){
		$this->checkDates();
		exit;
		$dt = new DateTime;
		if (isset($_GET['year']) && isset($_GET['week'])) {
			$dt->setISODate($_GET['year'], $_GET['week']);
		} else {
			$dt->setISODate($dt->format('o'), $dt->format('W'));
		}
		
		$data['year'] = $dt->format('o');
		$data['week'] = $dt->format('W');
		$data['dt'] = $dt;
		
		$start = $dt->format('Y-m-d');
		$end = $dt->modify('+6 day')->format('Y-m-d');
		$this->load->model(['hotelstable', 'hotelorder']);
		$weekDetails = $this->hotelstable->getWeek($start, $end);

		$rooms = array();
		$details = array();
		foreach($weekDetails as $ind=>$wd){
			$rooms['date'][$ind] = $wd->date;
			for ($i=0; $i<16; $i++){
				$orderId = $wd->{'room_'.($i+1)};
				$rooms['weekdays'][$i][$ind] = $orderId;
				if(!array_key_exists($orderId, $details)) $details[$orderId] = $this->hotelorder->getReservation($orderId);
			}
		}
		$data['rooms'] = $rooms;
		$data['details'] = $details;
		$this->load->view('admin/hotelreservations', $data);
	}


	public function roomtypes(){
		$this->load->model(['hotel', 'roomtype']);
		if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
			$this->form_validation->set_rules('room1', 'Room 1', 'required|integer');
			$this->form_validation->set_rules('room2', 'Room 2', 'required|integer');
			$this->form_validation->set_rules('room3', 'Room 3', 'required|integer');
			$this->form_validation->set_rules('room4', 'Room 4', 'required|integer');
			$this->form_validation->set_rules('room5', 'Room 5', 'required|integer');
			$this->form_validation->set_rules('room6', 'Room 6', 'required|integer');
			$this->form_validation->set_rules('room7', 'Room 7', 'required|integer');
			$this->form_validation->set_rules('room8', 'Room 8', 'required|integer');
			$this->form_validation->set_rules('room9', 'Room 9', 'required|integer');
			$this->form_validation->set_rules('room10', 'Room 10', 'required|integer');
			$this->form_validation->set_rules('room11', 'Room 11', 'required|integer');
			$this->form_validation->set_rules('room12', 'Room 12', 'required|integer');
			$this->form_validation->set_rules('room13', 'Room 13', 'required|integer');
			$this->form_validation->set_rules('room14', 'Room 14', 'required|integer');
			$this->form_validation->set_rules('room15', 'Room 15', 'required|integer');
			$this->form_validation->set_rules('room16', 'Room 16', 'required|integer');
			if ($this->form_validation->run()) {				
				$res = $this->roomtype->updateRoomTypes(
					$this->input->post('room1'),
					$this->input->post('room2'),
					$this->input->post('room3'),
					$this->input->post('room4'),
					$this->input->post('room5'),
					$this->input->post('room6'),
					$this->input->post('room7'),
					$this->input->post('room8'),
					$this->input->post('room9'),
					$this->input->post('room10'),
					$this->input->post('room11'),
					$this->input->post('room12'),
					$this->input->post('room13'),
					$this->input->post('room14'),
					$this->input->post('room15'),
					$this->input->post('room16'));
				if($res){ 
					$this->session->set_flashdata('updRoomtypeRes', array('status' => true, 'message' => 'ოთახის ტიპები განახლდა წარმატებით'));
				}else{
					$this->session->set_flashdata('updRoomtypeRes', array('status' => false, 'message' => 'ვერ მოხერხდა მონაცემების განახლება'));
				}	
			}
		}
		$data['hotelTypes'] = $this->hotel->getHotels();
		$data['roomTypes'] = $this->roomtype->getRoomTypes();		
		$this->load->view('admin/roomtypes', $data);
	}


	public function contact(){
		$this->load->model('contact');
		if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
			$this->form_validation->set_rules('phone', 'Phone', 'trim|xss_clean|max_length[30]');
			$this->form_validation->set_rules('email', 'Email', 'trim|xss_clean|valid_email|max_length[100]');
			$this->form_validation->set_rules('address_ge', 'Address Georgian', 'trim|xss_clean|max_length[200]');
			$this->form_validation->set_rules('address_en', 'Address Englis', 'trim|xss_clean|max_length[200]');
			$this->form_validation->set_rules('address_ru', 'Address Russian', 'trim|xss_clean|max_length[200]');
			$this->form_validation->set_rules('map_url', 'Map URL', 'trim|xss_clean|valid_url');
			$this->form_validation->set_rules('facebook', 'Facebook page', 'trim|xss_clean|valid_url|max_length[200]');
			$this->form_validation->set_rules('twitter', 'Twitter page', 'trim|xss_clean|valid_url|max_length[200]');
			$this->form_validation->set_rules('instagram', 'Instagram page', 'trim|xss_clean|valid_url|max_length[200]');
			$this->form_validation->set_rules('pinterest', 'Pinterest page', 'trim|xss_clean|valid_url|max_length[200]');
			if ($this->form_validation->run()) {
				$this->contact->updateContacts(
					1,
					$this->input->post('phone'),
					$this->input->post('email'),
					$this->input->post('address_ge'),
					$this->input->post('address_en'),
					$this->input->post('address_ru'),
					$this->input->post('map_url'),
					$this->input->post('facebook'),
					$this->input->post('twitter'),
					$this->input->post('instagram'),
					$this->input->post('pinterest')
				);				
				return redirect('admin/contact');								
			}
		}
		$data['contacts'] = $this->contact->getContacts();
		$this->load->view('admin/contact', $data);
	}


	public function slidertext(){
		$this->load->model('slidertext');
		if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
			$this->form_validation->set_rules('header_ge', 'სათაური ქართულად', 'trim|xss_clean|max_length[250]');
			$this->form_validation->set_rules('header_en', 'სათაური ინგლისურად', 'trim|xss_clean|max_length[250]');
			$this->form_validation->set_rules('header_ru', 'სათაური რუსულად', 'trim|xss_clean|max_length[250]');
			$this->form_validation->set_rules('static_ge', 'სტატიკური ტექსტი ქართულად', 'trim|xss_clean|max_length[250]');
			$this->form_validation->set_rules('static_en', 'სტატიკური ტექსტი ინგლისურად', 'trim|xss_clean|max_length[250]');
			$this->form_validation->set_rules('static_ru', 'სტატიკური ტექსტი რუსულად', 'trim|xss_clean|max_length[250]');
			$this->form_validation->set_rules('changeable_ge', 'ცვალებადი ტექსტი ქართულად', 'trim|xss_clean|max_length[250]');
			$this->form_validation->set_rules('changeable_en', 'ცვალებადი ტექსტი ინგლისურად', 'trim|xss_clean|max_length[250]');
			$this->form_validation->set_rules('changeable_ru', 'ცვალებადი ტექსტი რუსულად', 'trim|xss_clean|max_length[250]');
			if ($this->form_validation->run()) {
				$this->slidertext->updateslidertexts(
					$this->input->post('header_ge'),
					$this->input->post('header_en'),
					$this->input->post('header_ru'),
					$this->input->post('static_ge'),
					$this->input->post('static_en'),
					$this->input->post('static_ru'),
					$this->input->post('changeable_ge'),
					$this->input->post('changeable_en'),
					$this->input->post('changeable_ru')
				);
				return redirect('admin/slidertext');
			}
		}
		$data['slidertexts'] = $this->slidertext->getslidertexts();
		$this->load->view('admin/slidertexts', $data);
	}


	public function hoteltext_process(){
		if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
			$this->form_validation->set_rules('text_ge', 'ტექსტი ქართულად', 'trim|xss_clean|max_length[255]');
			$this->form_validation->set_rules('text_en', 'ტექსტი ინგლისურად', 'trim|xss_clean|max_length[255]');
			$this->form_validation->set_rules('text_ru', 'ტექსტი რუსულად', 'trim|xss_clean|max_length[255]');
			if ($this->form_validation->run()) {
				$this->load->model('hoteltext');
				$this->hoteltext->updateHoteltexts(
					$this->input->post('text_ge'),
					$this->input->post('text_en'),
					$this->input->post('text_ru')
				);
			}
		}
		$this->hotels();
	}


	public function tourtext_process(){
		if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
			$this->form_validation->set_rules('text_ge', 'ტექსტი ქართულად', 'trim|xss_clean|max_length[255]');
			$this->form_validation->set_rules('text_en', 'ტექსტი ინგლისურად', 'trim|xss_clean|max_length[255]');
			$this->form_validation->set_rules('text_ru', 'ტექსტი რუსულად', 'trim|xss_clean|max_length[255]');
			if ($this->form_validation->run()) {
				$this->load->model('tourtext');
				$this->tourtext->updateTourtexts(
					$this->input->post('text_ge'),
					$this->input->post('text_en'),
					$this->input->post('text_ru')
				);
			}
		}
		$this->tours();
	}

	
	public function gallery($id=0){
		$this->load->model('gallery');
		if($id>0) {
			$this->load->model('galleryimage');
			if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
				$filename = substr(str_shuffle(MD5(microtime())), 0, 16).$id;				
				
				//echo $this->input->post('mainImage') . '<br>';
				$filesCount = count($_FILES['galleryImages']['name']);
				$mainImage = $this->input->post('mainImage');
				for ($i=0; $i<$filesCount; $i++) {
					if (!empty($_FILES['galleryImages']['name'][$i])) {
						
						$_FILES['galleryImage']['name']     = $filename . str_pad($i+1, 3, '0', STR_PAD_LEFT) . '.' . pathinfo($_FILES['galleryImages']['name'][$i], PATHINFO_EXTENSION); 
						$_FILES['galleryImage']['type']     = $_FILES['galleryImages']['type'][$i];
						$_FILES['galleryImage']['tmp_name'] = $_FILES['galleryImages']['tmp_name'][$i];
						$_FILES['galleryImage']['error']    = $_FILES['galleryImages']['error'][$i];
						$_FILES['galleryImage']['size']     = $_FILES['galleryImages']['size'][$i];
						
						// File upload configuration 
						$uploadPath = 'uploads/galleries/';
						$config['upload_path'] = $uploadPath;
						$config['allowed_types'] = 'jpg|jpeg|png|gif';
						//$config['max_size'] = '100'; 
						//$config['max_width'] = '1024'; 
						//$config['max_height'] = '768'; 
						
						// Add to db
						$this->galleryimage->addImage($id, $_FILES['galleryImage']['name'], $mainImage==$i+1);

						// Load and initialize upload library 
						$this->load->library('upload', $config);
						$this->upload->initialize($config);

						// Upload file to server 
						if ($this->upload->do_upload('galleryImage')) {
							// Uploaded file data for any case
							// $fileData = $this->upload->data();
							// $uploadData[$i]['file_name'] = $fileData['file_name'];
							// $uploadData[$i]['uploaded_on'] = date("Y-m-d H:i:s");
						} else {
							//$errorUploadType .= $_FILES['file']['name'] . ' | ';
						}
					}else{
						// add first image as main if no main image selected
						// if ($this->input->post('mainImage') - 1 == $i) {
						// 	$this->image->updateFirstImage($subTour);
						// }
					}
				}
				if(substr($mainImage, 0, 3)=='old'){
					$this->galleryimage->updateMainImage($id, str_replace('old','', $mainImage));
				}else{
					if ($mainImage-1 == $i) {
						$this->galleryimage->updateFirstImage($id);
					}
				}
				return redirect('admin/gallery/'.$id);
			}
			$data['images'] = $this->galleryimage->getImagesByGalleryId($id);
			$data['gallery'] = $this->gallery->getGallery($id);
			$this->load->view('admin/galleryimages', $data);
		}else{			
			$data['galleries'] = $this->gallery->getGalleries();
			$this->load->view('admin/gallery', $data);
		}
	}


	public function addgallery(){
		if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
			$this->form_validation->set_rules('galleryname_ge', 'ტექსტი ქართულად', 'trim|xss_clean|max_length[200]|is_unique[galleries.galleryname_ge]');
			$this->form_validation->set_rules('galleryname_en', 'ტექსტი ინგლისურად', 'trim|xss_clean|max_length[200]|is_unique[galleries.galleryname_en]');
			$this->form_validation->set_rules('galleryname_ru', 'ტექსტი რუსულად', 'trim|xss_clean|max_length[200]|is_unique[galleries.galleryname_ru]');
			if ($this->form_validation->run()) {
				$this->load->model('gallery');
				if($this->gallery->addGallery(
					$this->input->post('galleryname_ge'),
					$this->input->post('galleryname_en'),
					$this->input->post('galleryname_ru')
				)) return redirect('admin/gallery');
			}
		}
		$this->load->view('admin/addgallery');
	}


	public function deletegallery($id=0){	
		if (filter_var($id, FILTER_VALIDATE_INT)) {			
			$this->load->model(['gallery', 'galleryimage']);
			if($this->gallery->deleteGallery($id)){
				$galleryImages = $this->galleryimage->getImagesByGalleryId($id);
				$this->galleryimage->deleteGalleryImages($id);
				foreach($galleryImages as $img){
					unlink(FCPATH.'uploads/galleries/'.$img->filename);
				}
			}			
		}
		return redirect('admin/gallery');
	}


	public function editgallery($id=0){
		$this->load->model('gallery');
		if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST'){
			$this->form_validation->set_rules('galleryname_ge', 'ტექსტი ქართულად', 'trim|xss_clean|max_length[200]');
			$this->form_validation->set_rules('galleryname_en', 'ტექსტი ინგლისურად', 'trim|xss_clean|max_length[200]');
			$this->form_validation->set_rules('galleryname_ru', 'ტექსტი რუსულად', 'trim|xss_clean|max_length[200]');
			if ($this->form_validation->run()) {
				if($this->gallery->editGallery(
					$id,
					$this->input->post('galleryname_ge'),
					$this->input->post('galleryname_en'),
					$this->input->post('galleryname_ru')
				)) return redirect('admin/gallery');
			}
		}
		$data['gallery'] = $this->gallery->getGallery($id);
		$this->load->view('admin/editgallery', $data);
	}


	public function deletegalleryimage($imageid=0, $gallery_id=0){	
		if (filter_var($imageid , FILTER_VALIDATE_INT) && filter_var($gallery_id , FILTER_VALIDATE_INT)) {
			$this->load->model('galleryimage');
			$imageData = $this->galleryimage->getImageDataByImageId($imageid);
			if($this->galleryimage->deleteImage($imageid)){
				unlink(FCPATH.'uploads/galleries/'.$imageData->filename);
				if($imageData->ismain){
					$this->galleryimage->setFirstActive($gallery_id);
				}
			}
		}
		return redirect('admin/gallery/'.$gallery_id);
	}

	function checkDates(){
		$this->load->model('hotelstable');
		$last = $this->hotelstable->getMaxDateFromHotelsTable();
		$dtToday = new DateTime();
		$dt = new DateTime($last);
		if(date_diff($dt, $dtToday)->format('%d')<730){
			$dates = array();
			for($i=1;$i<900;$i++){
				$d = $dt->modify('+1 day')->format('Y-m-d');				
				$newDate = array('date'=>$d);
				array_push($dates, $newDate);
			}
			$this->hotelstable->addEmptyDates($dates);
		}
	}

}
