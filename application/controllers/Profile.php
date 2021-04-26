<?php
defined('BASEPATH') or exit('No direct script access allowed');

class profile extends CI_Controller
{
		private $gmtoffset;
		private $break;
		private $jobStartTime;
		private $maxJobDuration;

   public function __construct()
	{
      parent::__construct();
      if (!$this->session->userdata('logged_in')) redirect('auth/login');
		$this->load->library('form_validation');
		$this->load->helper("security");
		$this->load->model('user');
		$this->load->model('tool');
		$this->load->model('logbook');
		$this->load->model('location');
		$this->config->load('customconfig');

		if (get_cookie('lang') && (get_cookie('lang')=="georgian" || get_cookie('lang') == "russian" || get_cookie('lang') == "swedish")){
			$this->session->set_userdata('lang', get_cookie('lang'));
			$this->lang->load("home", $this->session->userdata('lang'));
		}else if($this->session->userdata('lang')){
			$this->lang->load("home", $this->session->userdata('lang'));
		}else{
			$this->session->set_userdata('lang', 'georgian');
			$this->lang->load("home", 'georgian');
		}

		$this->load->model('appconfig');
		$r = $this->appconfig->getConfig();
		$this->gmtoffset = $r[0]['value'];
		$this->break = $r[1]['value'];
		$this->jobStartTime = $r[2]['value'];
		$this->maxJobDuration = $r[3]['value'];
   }


  

   public function index(){
		$this->session->set_userdata('lastPage', '/profile');
      // $llogin = $this->logbook->getLastLogin($this->session->userdata('user_id'));
		// $llogout = $this->logbook->getLastLogout($this->session->userdata('user_id'));

		$userTools = $this->tool->getUserTools($this->session->userdata('user_id'));
		$otherUsers = $this->user->getOtherUsers($this->session->userdata('user_id'));
		$locations = $this->location->getLocations();


      $todayGMT00 =  time() - time() % (3600*24);
		$todayLOC00 =  time() - time() % (3600*24) - $this->gmtoffset * 60;

		$la =  $this->logbook-> getLastActivity($this->session->userdata('user_id'));
		$lastLogin = 0;
		$lastLogout = 0;
		$isended = 0;
		if($la && $la->login > $todayLOC00){
			$lastLogin = $la->login;
			$lastLogout = $la->logout;
			$isended = $la->ended;
		}


		// $lastLogin = ($llogin->login) ? $llogin->login:0;
      // $lastLogout = ($llogout->logout) ? $llogout->logout:0;

		
      $todayJobStartTime = $todayLOC00 + $this->jobStartTime * 60;
      $todayJobEndTime = $todayLOC00 + $this->jobStartTime * 60 + $this->maxJobDuration * 60;
		$isTodayLoggedIn = ($lastLogin > $todayLOC00) ? true : false;
		


      $data['lastLogin'] = $lastLogin;
      $data['lastLogout'] = $lastLogout;
      $data['todayGMT00'] = $todayGMT00;
      $data['todayLOC00'] = $todayLOC00;
      $data['todayJobStartTime'] = $todayJobStartTime;
      $data['todayJobEndTime'] = $todayJobEndTime;
		$data['isTodayLoggedIn'] = $isTodayLoggedIn;
		$data['userTools'] = $userTools;
		$data['otherUsers'] = $otherUsers;
		$data['locations'] = $locations;
		$data['gmtoffset'] = $this->gmtoffset;

		$data['showStartJobButton'] = false;
		$data['showEndJobButton'] = false;
		$data['showTodayStats'] = false;
		$data['showTodayNoWork'] = false;

		if($lastLogin < $todayLOC00 && time() < $todayJobEndTime ){
			$data['showStartJobButton'] = true;
		}
		if ($lastLogin >= $todayJobStartTime && time() < $lastLogout + 7 * 3600 && $isended==0) {
			$data['showEndJobButton'] = true;
		}
		if(($isTodayLoggedIn && time() >= $lastLogout + 7 * 3600) || $isended){
			$data['showTodayStats'] = true;
		}
		// if ($lastLogout > $todayJobStartTime && $lastLogout <= time()) {
		// 	$data['showTodayStats'] = true;
		// }
		if ($lastLogout < $todayJobStartTime) {
			$data['showTodayNoWork'] = true;
		}
		

		if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
			if ($this->input->post('startwork')){
				if(!$isTodayLoggedIn && time() < $todayJobEndTime){
					$startTime = (time()< $todayJobStartTime)? $todayJobStartTime:time();
					$this->logbook->startWork(
						$this->session->userdata('user_id'),
						$startTime, 
						$todayJobEndTime,
						//$this->break,
						$this->gmtoffset,
						$this->input->post('location', true) 
					);
					return redirect('profile');
				}
			}
				
			if ($this->input->post('endwork')){
				if ($isTodayLoggedIn && 
					time() > $todayJobStartTime &&
					$lastLogin >= $todayJobStartTime && 
					time() < $todayJobEndTime + 7 * 3600
				) {
					$endTime = time() > $todayJobEndTime ? $todayJobEndTime : time();
					$this->logbook->endWork(
						$this->session->userdata('user_id'), 
						$lastLogin,
						$endTime, 
						/*$lastLogin + 3600 > $endTime ? 0 : $this->input->post('usedbreak', true), */
						$this->input->post('comment', true)
					);
					return redirect('profile');
				}
			}				
		}
      $this->load->view('status', $data);
	}
	
	public function transfertool(){
		$toolid = $this->input->post('toolid');
		$assignto = $this->input->post('assignto');
		if ($toolid && $assignto){
			$this->tool->addAssign($toolid, $assignto);
		}
		return redirect('/profile/mytools');
	}
	
	public function receivetool(){
		$toolid = $this->input->post('toolid');
		if ($toolid){
			$this->tool->receive($toolid, $this->session->userdata('user_id'));
		}
		return redirect('/profile/mytools');
	}

	public function startwork(){
		$toolid = $this->input->post('toolid');
		if ($toolid){
			$this->tool->receive($toolid, $this->session->userdata('user_id'));
		}
		return redirect('profile');
	}

	public function myhours(){
		$this->session->set_userdata('lastPage', '/profile/myhours');
		$startyear = date("Y");
		$startmonth = date("m");
		$endyear = $startyear;
		$endmonth = $startmonth;
		if (strtoupper($_SERVER['REQUEST_METHOD']) == 'GET' && $this->input->get('year') && $this->input->get('month') && $this->input->get('month') >=1 && $this->input->get('month')<=12) {
			//if year is integer and month 1-12
			$startyear = $this->input->get('year', true);
			$startmonth = $this->input->get('month', true);
		}
		if($startmonth == 12){
			$endmonth = 1;
			$endyear = $startyear+1;
		}else{
			$endmonth = $startmonth+1;
			$endyear = $startyear;
		}

		$date = new DateTime($startyear . '-' . $startmonth .'-1');
		$start_tst = $date->getTimestamp();
		$date2 = new DateTime($endyear . '-' . $endmonth .'-1');
		$end_tst = $date2->getTimestamp()-1;

		$data['myhours'] = $this->logbook->getMyHoursByTst($this->session->userdata('user_id'), $start_tst, $end_tst);
		
		$this->load->model('month');
		$data['months'] = $this->month->getMonths();
		$data['res_year'] = $startyear;
		$data['res_month'] = $startmonth;
		$this->load->view('myhours', $data);
	}

	public function mytools(){
		$this->session->set_userdata('lastPage', '/profile/mytools');
		$userTools = $this->tool->getUserTools($this->session->userdata('user_id'));
		$otherUsers = $this->user->getOtherUsers($this->session->userdata('user_id'));
		$data['userTools'] = $userTools;
		$data['otherUsers'] = $otherUsers;
		$this->load->view('mytools', $data);
	}








	

   public function test(){
		// if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
		//    if($this->input->post('startwork'))
		//       echo 'startwork';
		//    if($this->input->post('endwork'))
		//       echo 'endwork';
		// }
		//$this->load->view('test');
		//echo time() . '<br>';

		//echo date('d.m.Y H:i:s', 1604922668);

		// $la =  $this->logbook->getLastActivity(4);
		// var_dump($la);
		// $lastLogin = 0;
		// $lastLogout = 0;
		// $isended = 0;
		// if ($la) {
		// 	$lastLogin = $la->login;
		// 	$lastLogout = $la->logout;
		// 	$isended = $la->ended;
		// }
		// echo $isended . '<br>';
		// if ($isended == 0) echo "HEllO";



		$lang_cookie = array('name' => 'lang', 'value' => 'swedish', 'expire' => '72000', 'secure' => isset($_SERVER['HTTPS']));
		$this->input->set_cookie($lang_cookie);



   }


}
