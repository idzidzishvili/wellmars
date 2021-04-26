<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class lang extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
	}
	

	public function ge()
	{
		$this->session->set_userdata('lang', 'georgian');
		$lang_cookie = array('name' => 'lang', 'value' => 'georgian', 'expire' => '72000', 'secure' => isset($_SERVER['HTTPS']));
		$this->input->set_cookie($lang_cookie);
		return redirect($this->session->userdata('lastPage') ? $this->session->userdata('lastPage') : '/');
	}
	public function en(){
		$this->session->set_userdata('lang', 'english');
		$lang_cookie = array('name' => 'lang', 'value' => 'english', 'expire' => '72000', 'secure' => isset($_SERVER['HTTPS']));
		$this->input->set_cookie($lang_cookie);
		return redirect($this->session->userdata('lastPage')?$this->session->userdata('lastPage'):'/');
	}
	public function ru()
	{
		$this->session->set_userdata('lang', 'russian');
		$lang_cookie = array('name' => 'lang', 'value' => 'russian', 'expire' => '72000', 'secure' => isset($_SERVER['HTTPS']));
		$this->input->set_cookie($lang_cookie);
		return redirect($this->session->userdata('lastPage') ? $this->session->userdata('lastPage') : '/');
	}

	

}
