<?php

class tour extends CI_Model
{

	public function getTours()
	{
		$this->db->select("t.id, t.tourid, t.tourname_ge, t.tourname_en, t.tourname_ru, t.duration_ge, i.ismain, i.filename")
		->from('tours AS t')
		// ->where('istour',1)
		->where('t.tourid', NULL)
		->join('tourimages AS i', 't.id=i.tourid AND i.ismain=1')
		->order_by('t.istour ASC');
		return $this->db->get()->result();
	}

	public function getChildTours($id)
	{
		$this->db->select("t.id, t.tourid, t.tourname_ge, t.tourname_en, t.tourname_ru, t.duration_ge, i.ismain, i.filename")
		->from('tours AS t')
		->where('t.tourid', $id)
		->join('tourimages AS i', 't.id=i.tourid AND i.ismain=1')
		->order_by('t.istour ASC');
		return $this->db->get()->result();
	}

	public function getTour($id)
	{
		return $this->db->select('*')->from('tours')->where('id', $id)->get()->row();
	}


	public function getToursAdmin()
	{
		$array['tours'] = $this->db->select('*')->from('tours')->where('tourid', NULL)->order_by('istour ASC')->get()->result_array();
		$array['subtours'] = $this->db->select('*')->from('tours')->where('tourid!=', NULL)->order_by('istour ASC')->get()->result_array();
		return $array;
	}


	public function getTourCategories(){
		return $this->db->select('*')->from('tours')->where('istour', 0)->get()->result();
	}


	public function addTourCategory($name_ge, $name_en, $name_ru){
		$data = array('tourname_ge' => $name_ge, 'tourname_en' => $name_en, 'tourname_ru' => $name_ru, 'istour' => false);
		if ($this->db->insert('tours', $data))
			return $this->db->insert_id();
		return false;
	}


	public function addTour($tourid, $tourname_ge, $tourname_en, $tourname_ru, $duration_ge, $duration_en, $duration_ru, $destination_ge, $destination_en, $destination_ru, 
		$description_ge, $description_en, $description_ru)
	{
		$tour_id = $tourid>0?$tourid:null;
		$data = array('tourid' => $tour_id, 'istour' => true, 'tourname_ge' => $tourname_ge, 'tourname_en' => $tourname_en, 'tourname_ru' => $tourname_ru, 'duration_ge' => $duration_ge, 
		 'duration_en' => $duration_en, 'duration_ru' => $duration_ru, 'destination_ge' => $destination_ge, 'destination_en' => $destination_en, 'destination_ru' => $destination_ru,
		 'description_ge' => $description_ge, 'description_en' => $description_en, 'description_ru' => $description_ru);
		if ($this->db->insert('tours', $data))
			return $this->db->insert_id();
		return false;
	}


	public function getSubTourDataById($id)
	{
		//return $this->db->select('id')->from('tourimages')->where('tourid', $id)->where('ismain', 1)->count_all_results();


		$this->db->select("T.id, T.tourid as tour_id, T.tourname_ge, T.tourname_en, T.tourname_ru, T.duration_ge, T.duration_en, T.duration_ru, T.destination_ge, T.destination_en, T.destination_ru, 
		T.description_ge, T.description_en, T.description_ru, T.price, I.tourid, I.filename");
		$this->db->from('tours AS T');
		$this->db->where('T.id', $id);
		$this->db->join('tourimages AS I', 'T.id=I.tourid AND I.ismain=1');
		return $this->db->get()->row();
	}


	public function editSubTour($id, $tourid, $tourname_ge, $tourname_en, $tourname_ru, $duration_ge, $duration_en, $duration_ru, $destination_ge, $destination_en, $destination_ru, 
	$description_ge, $description_en, $description_ru)
	{
		$tour_id = $tourid>0?$tourid:null;
		return $this->db->update(
			'tours', 
			array(
				'tourid' => $tour_id, 
				'tourname_ge' => $tourname_ge, 
				'tourname_en' => $tourname_en, 
				'tourname_ru' => $tourname_ru, 
				'duration_ge' => $duration_ge, 
				'duration_en' => $duration_en, 
				'duration_ru' => $duration_ru, 
				'destination_ge' => $destination_ge, 
				'destination_en' => $destination_en, 
				'destination_ru' => $destination_ru,
				'description_ge' => $description_ge, 
				'description_en' => $description_en, 
				'description_ru' => $description_ru
			), 
			array('id' => $id));
	}

	public function deleteTour($id)
	{
		return $this->db->where('id', $id)->delete('tours');
	}






























	
	public function getAllTours()
	{
		//return $this->db->select('*')->from('tours')->get()->result();
		$this->db->select("
			t.id, 			
			t.tourname_ge,
			t.tourname_en,
			t.tourname_ru,
			tmi.filename
		")
		->from('tourmainimages AS tmi')
		->join('tours AS t', 't.id=tmi.tourid', 'right');
		$query = $this->db->get();
		return $query->result();




	}

	

	

	public function editTour($id, $tourname_ge, $tourname_en, $tourname_ru)
	{
		return $this->db->update('tours', array('tourname_ge' => $tourname_ge, 'tourname_en' => $tourname_en, 'tourname_ru' => $tourname_ru), array('id' => $id));
	}

	

	public function getTours_()
	{
		$tours = $this->db->get('tours')->result_array();
		foreach($tours as $i=>$tour) {
			$this->db->where('tourid', $tour['id']);
			$fsubtours = $this->db->get('subtours')->result_array();
			$tours[$i]['subtours'] = $fsubtours;
		}
		return $tours;
	}

















	

	public function getUserData($username)
	{
		return $this->db->select('*')->from('users')->where('username', $username)->get()->row();
	}

	public function getUserDataById($id)
	{
		return $this->db->select('*')->from('users')->where('id', $id)->get()->row();
	}

	public function getAllUsersSAdmin($roles){
		return $this->db->select('*')->where_in('role', $roles)->from('users')->get()->result();
	}

	public function getOtherUsers($id)
	{
		return $this->db->select('*')->where_in('role', 3)->from('users')->where('id !=', $id)->get()->result();
	}

	public function deleteUser($id){
		$this->db->where('id', $id);
		$this->db->delete('users');
	}

	public function setNewPassword($id, $pwd)
	{
		return $this->db->update('users', array('password' => $pwd), array('id' => $id));
	}

	public function setNewName($id, $name, $username)
	{
		return $this->db->update('users', array('name' => $name, 'username' => $username), array('id' => $id));
	}

	public function setNewNamePassword($id, $name, $username, $password)
	{
		return $this->db->update('users', array('name' => $name, 'username' => $username, 'password' => $password), array('id' => $id));
	}
	public function getSAdminData(){
		return $this->db->select('*')->where('role', 1)->from('users')->get()->row();
	}

	public function updateSadminPassword($password)
	{
		$this->db->set('password', $password);
		$this->db->where('role', 1);
		return $this->db->update('users');
	}
}
