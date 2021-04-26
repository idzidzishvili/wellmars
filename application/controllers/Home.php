<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper("security");
		$this->load->model('tour');
		$this->load->model('subtour');		
		$this->lang->load('home', $this->session->userdata('lang')?$this->session->userdata('lang'):'georgian');

		
		//$this->config->load('customconfig');
		//$this->config->item('offsetPrevNext');

	}
	

	public function index(){
		$this->load->model('hotel');
		$data['hotels'] = $this->hotel->getHotels();
		$data['tours'] = $this->tour->getAllTours();
		$data['lang'] = $this->session->userdata('lang')?substr($this->session->userdata('lang'),0,2):'ge';
		$this->load->model('mainslider');
		$data['slides'] = $this->mainslider->getSlides();
		$this->load->view('index', $data);
	}

	public function subtours($id=1){
		if (filter_var($id, FILTER_VALIDATE_INT)) {			
			$data['tours'] = $this->tour->getAllTours();
			$data['lang'] = $this->session->userdata('lang')?substr($this->session->userdata('lang'),0,2):'ge';
			$data['subtours'] = $this->subtour->getSubToursById($id);
			$this->load->view('subtours', $data);
		}
	}

	public function tourdetails($id=1){
		if (filter_var($id, FILTER_VALIDATE_INT)) {
			$this->load->model('tourimage');
			$data['tours'] = $this->tour->getAllTours();
			$data['lang'] = $this->session->userdata('lang')?substr($this->session->userdata('lang'),0,2):'ge';
			$data['tourdetails'] = $this->subtour->getSubTourDataById($id);			
			$data['images'] = $this->tourimage->getImagesById($id);
			$this->load->view('tourdetails', $data);
		}
	}

	public function hotels(){
		$this->load->model('hotel');
		$data['hotels'] = $this->hotel->getHotels();
		$data['tours'] = $this->tour->getAllTours();
		$data['lang'] = $this->session->userdata('lang')?substr($this->session->userdata('lang'),0,2):'ge';
		$this->load->view('hotels', $data);
		
	}

	public function hotel($id=0){
		if (filter_var($id, FILTER_VALIDATE_INT) && $id>0) {
			$this->load->model('hotel');
			$this->load->model('hotelimage');
			$data['hotel'] = $this->hotel->getHotel($id);
			$data['images'] = $this->hotelimage->getImagesById($id);
			$data['tours'] = $this->tour->getAllTours();
			$data['lang'] = $this->session->userdata('lang')?substr($this->session->userdata('lang'),0,2):'ge';
			$this->load->view('hoteldetails', $data);
		}
	}








	public function tour($subTourId)
	{
		$data['tours'] = $this->tour->getAllTours();
		$data['subtours'] = $this->subtour->getSubToursById($subTourId);
		$this->load->view('tours', $data);		
	}

	public function tourid($tourId)
	{
		$data['tours'] = $this->tour->getAllTours();
		$data['subTourData'] = $this->subtour->getSubTourDataById($tourId);
		$data['subTourImages'] = $this->subtour->getSubTourImagesById($tourId);
		$this->load->view('tourdetails', $data);
	}





	public function hi()
	{
		//echo $this->session->userdata('userrname');
		//echo time();
		$getLastLogin = $this->logbook->getLastLogin(1);
		echo($getLastLogin->login)."<br>";
		echo date('Y.m.d H:i:s', $getLastLogin->login);
	}

	public function time()
	{

		echo time();
		
	}


	public function login()
	{
		$this->load->view('login');
	}

	public function dashboard()
	{
		$this->load->view('admin/index');
	}

	public function test()
	{
		echo 'time:' . time() . '<br>';
		echo 'date:' . date('Y.m.d H:i:s', time()) . '<br><br>';

		echo 'gmdate:' . gmdate('Y.m.d\TH:i:s\C', time()) . '<br><br>';

		//$time = time();
		//$year = $time / 31556926 % 12;

		$dateat00 =  time() - time() % (3600*24);
		$todaystime = time() % (3600*24);
		echo $dateat00 . '<br><br>';
		echo $todaystime . '<br><br>';

		echo "today00: " . date('Y.m.d H:i:s', $dateat00) . '<br><br>';
		//echo "today--: " . date('Y.m.d H:i:s', $dateat00) . '<br><br>';
	}

	public function test2(){
		$date = new DateTime('2020-10-26');
		echo $date->getTimestamp() .'<br>';
		echo 'date:' . date('Y.m.d H:i:s', $date->getTimestamp()) . '<br><br>';

		$startyear = 2020;
		$startmonth = 1;
		if($startmonth == 12){
			$endmonth = 1;
			$endyear = $startyear+1;
		}else{
			$endmonth = $startmonth+1;
			$endyear = $startyear;
		}
		
		$date = new DateTime($startyear . '-' . $startmonth .'-1');
		echo date('Y.m.d H:i:s', $date->getTimestamp()). '<br>';
		$date2 = new DateTime($endyear . '-' . $endmonth .'-1');
		echo date('Y.m.d H:i:s', $date2->getTimestamp()-1). '<br>';
	}



	public function getlast(){
		$this->load->model('logbook');
		$x = $this->logbook->getLastLogin(2);
		var_dump($x);
		if($x->login)
			echo($x->login);
		else
			echo "00";
			echo "000";
	}

	
	public function test3(){
		$this->load->view('admin/index');
	}

	public function test4(){
		$this->load->view('admin/adduser');
	}


	public function test5(){
		var_dump($this->logbook->getLastLogin2(1));
	}

	public function test6()
	{
		if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
			$dtstart = $this->input->post('dtstart');
			$dtend = $this->input->post('dtend');
			if($dtstart > $dtend) echo "dtstart is greater";
			else echo "dtend is greater";

			echo $this->convertdate($dtstart) . "<br>";
			echo $this->convertdate($dtend) . "<br>";
		}
		else{
			$this->load->view('test');
		}
	}

public function test7(){
		var_dump($this->logbook->getAllHours(1601510400, 1604188799));
	}

	public function test8()
	{
		echo($this->logbook->checkTodayLogin(3, 1603670400, 1603756799));
		
	}




	private function convertdate($dt)
	{
		$parts = explode(" ", $dt);
		if (count($parts) == 2) {
			if (preg_match("/^([0-1]?[0-9]|2[0-3])\:[0-5][0-9]:[0-5][0-9]$/", $parts[1])) {
				$dateparts = explode(".", $parts[0]);
				if (count($dateparts) == 3) {
					$dateformatted = $dateparts[2] . '-' . $dateparts[1] . '-' . $dateparts[0] . ' ' . $parts[1];
					return strtotime($dateformatted);
				}else{return false /*"no 3"*/;}
			}else{return false /*"no pregmatch"*/;}
		}else{return false /*"no 2"*/;}
		return false;
	}


}
