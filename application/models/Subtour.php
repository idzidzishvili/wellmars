<?php

class subtour extends CI_Model
{

	public function addSubTour($tourid, $tourname_ge, $tourname_en, $tourname_ru, $duration_ge, $duration_en, $duration_ru, $destination_ge, $destination_en, $destination_ru, 
		$description_ge, $description_en, $description_ru, $price)
	{
		$data = array('tourid' => $tourid, 'tourname_ge' => $tourname_ge, 'tourname_en' => $tourname_en, 'tourname_ru' => $tourname_ru, 'duration_ge' => $duration_ge, 
		 'duration_en' => $duration_en, 'duration_ru' => $duration_ru, 'destination_ge' => $destination_ge, 'destination_en' => $destination_en, 'destination_ru' => $destination_ru,
		 'description_ge' => $description_ge, 'description_en' => $description_en, 'description_ru' => $description_ru, 'price' => $price);
		if ($this->db->insert('subtours', $data))
			return $this->db->insert_id();
		return false;
	}

	public function getSubToursById($id)
	{
		$this->db->select("
			st.id, 
			st.tourid,
			st.tourname_ge,
			st.tourname_en,
			st.tourname_ru,
			st.duration_ge,
			st.duration_en,
			st.duration_ru,
			st.destination_ge,
			st.destination_en,
			st.destination_ru,
			st.price,
			im.subtourid,
			im.filename
		")
		->from('tourimages AS im')
		->where('st.tourid', $id)
		->join('subtours AS st', 'st.id=im.subtourid AND im.ismain=1', 'right');
		$query = $this->db->get();
		return $query->result();
	}


	public function getSubTourDataById($id){
		return $this->db->select('*')->from('subtours')->where('id', $id)->get()->row();
	}

	public function getSubTourImagesById($id){
		return $this->db->select('*')->from('tourimages')->where('subtourid', $id)->get()->result();
	}

	public function editSubTour($id, $tourid, $tourname_ge, $tourname_en, $tourname_ru, $duration_ge, $duration_en, $duration_ru, $destination_ge, $destination_en, $destination_ru, 
	$description_ge, $description_en, $description_ru, $price)
	{
		return $this->db->update(
			'subtours', 
			array(
				'tourid' => $tourid, 
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
				'description_ru' => $description_ru, 
				'price' => $price
			), 
			array('id' => $id));
	}

	public function deleteSubTour($id){
		$this->db->where('id', $id);
		$this->db->delete('subtours');
	}
/*




*/











	public function addUser($name, $username, $password)
	{
		$data = array('name' => $name, 'username' => $username, 'password' => $password);
		if ($this->db->insert('users', $data))
			return true;
		return false;
	}

	public function getUserData($username)
	{
		return $this->db->select('*')->from('users')->where('username', $username)->get()->row();
	}

	

	public function getAllUsersSAdmin($roles){
		return $this->db->select('*')->where_in('role', $roles)->from('users')->get()->result();
	}

	public function getOtherUsers($id)
	{
		return $this->db->select('*')->where_in('role', 3)->from('users')->where('id !=', $id)->get()->result();
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
