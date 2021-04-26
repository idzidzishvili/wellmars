<?php

class hotel extends CI_Model
{
	public function getHotels()
	{
		// return $this->db->select('*')->from('hotels')->get()->result();

		$this->db->select("
			h.id, 			
			h.type_ge,
			h.type_en,
			h.type_ru,
			h.hotel_ge,
			h.hotel_en,
			h.hotel_ru,
			i.hotelid,
			i.filename
		")
		->from('hotelimages AS i')
		->join('hotels AS h', 'h.id=i.hotelid AND i.ismain=1', 'right');
		$query = $this->db->get();
		return $query->result();
	}

	public function getHotel($id)
	{
		return $this->db->select('*')->from('hotels')->where('id', $id)->get()->row();
	}

	public function addHotel($type_ge, $type_en, $type_ru, $hotel_ge, $hotel_en, $hotel_ru){
		$data = array('type_ge' => $type_ge, 'type_en' => $type_en, 'type_ru' => $type_ru, 'hotel_ge' => $hotel_ge, 'hotel_en' => $hotel_en, 'hotel_ru' => $hotel_ru);
		if ($this->db->insert('hotels', $data))
		return $this->db->insert_id();
		return false;
	}

	public function editHotel($id, $type_ge, $type_en, $type_ru, $hotel_ge, $hotel_en, $hotel_ru)
	{
		return $this->db->update('hotels', array('type_ge' => $type_ge, 'type_en' => $type_en, 'type_ru' => $type_ru, 'hotel_ge' => $hotel_ge, 'hotel_en' => $hotel_en, 'hotel_ru' => $hotel_ru), array('id' => $id));
	}

	public function deleteHotel($id)
	{
		$this->db->where('id', $id)->delete('hotel');
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
