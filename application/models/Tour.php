<?php

class tour extends CI_Model
{
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

	public function getTour($id)
	{
		return $this->db->select('*')->from('tours')->where('id', $id)->get()->row();
	}

	public function addTour($name_ge, $name_en, $name_ru){
		$data = array('tourname_ge' => $name_ge, 'tourname_en' => $name_en, 'tourname_ru' => $name_ru);
		if ($this->db->insert('tours', $data))
			return $this->db->insert_id();
		return false;
	}

	public function editTour($id, $tourname_ge, $tourname_en, $tourname_ru)
	{
		return $this->db->update('tours', array('tourname_ge' => $tourname_ge, 'tourname_en' => $tourname_en, 'tourname_ru' => $tourname_ru), array('id' => $id));
	}

	public function deleteTour($id)
	{
		$this->db->where('id', $id)->delete('tours');
	}

	public function getTours()
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
