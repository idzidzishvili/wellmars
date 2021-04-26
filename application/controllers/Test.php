<?php
defined('BASEPATH') or exit('No direct script access allowed');

class test extends CI_Controller
{
   public function __construct()
   {
      parent::__construct();
    
   	$this->lang->load("home", 'georgian');
      $this->load->model("tour");
      $this->load->model("subtour");
      $this->load->model("image");
   }
      
   public function index()
   {
      $data['tours'] = $this->tour->getAllTours();
      $this->load->view('index');
   }

   public function tours(){
      $data['tours'] = $this->tour->getAllTours();
       $data['subtours'] = $this->tour->getAllTours();
      $this->load->view('tours');
   }

   public function tourdetails(){
      $this->load->view('tourdetails');
   }
}
