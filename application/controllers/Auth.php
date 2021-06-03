<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();		
		$this->load->library('form_validation');
		$this->load->helper("security");
		$this->load->model('user');
		// if (get_cookie('lang') && (get_cookie('lang') == "georgian" || get_cookie('lang') == "russian" || get_cookie('lang') == "swedish")) {
		// 	$this->session->set_userdata('lang', get_cookie('lang'));
		// 	$this->lang->load("home", $this->session->userdata('lang'));
		// } else if ($this->session->userdata('lang')) {
		// 	$this->lang->load("home", $this->session->userdata('lang'));
		// } else {
		// 	$this->session->set_userdata('lang', 'georgian');
		// 	$this->lang->load("home", 'georgian');
		// }
	}

	public function login()
	{
		if ($this->session->userdata('logged_in')) redirect('profile');
		if (strtoupper($_SERVER['REQUEST_METHOD']) == 'POST') {
			$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|min_length[5]|max_length[200]');
			$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[5]|max_length[200]');
			if($this->form_validation->run()){
				$userdata = $this->user->getUserData($this->input->post('username'));

				if ($userdata && password_verify($this->input->post('password'), $userdata->password)) {
				//if ($userdata && $this->input->post('password') == $userdata->password) {	
						$sessiondata = array(
						'user_id'  	=> $userdata->id,
						'user_name' => $userdata->username,
						'user_role'	=> $userdata->role,
						'logged_in' => TRUE
					);
					$this->session->set_userdata($sessiondata);
					if ($userdata->role == 1) return redirect('admin/users');
					else if ($userdata->role == 2) return redirect('admin/users');
					else return redirect('profile');
				} else {
					//invalid username or password
					$this->session->set_flashdata('loginerror', $this->lang->line('invUsrPwd'));
				}
			}
		}
		$this->load->view('login');
	}


	public function logout()
	{
		$array_items = array('user_id', 'user_name', 'user_role', 'logged_in');
		$this->session->unset_userdata($array_items);
		redirect('/login');
	}

}
