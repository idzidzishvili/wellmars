<?php

class hotelorder extends CI_Model
{
   public function addReservation($userId, $startsDate, $endDate, $roomid, $name, $email, $phone, $numPerson, $color){
      $data = array('user_id' => $userId, 'startdate' => $startsDate, 'enddate' => $endDate, 'room_id' => $roomid, 'order_name' => $name, 'order_email' => $email, 'order_phone' => $phone, 'num_persons' => $numPerson, 'color' => $color);
      if ($this->db->insert('hotelorders', $data))
      return $this->db->insert_id();
      return false;
   }

	public function getReservation($id)
	{
		return $this->db->select('*')->from('hotelorders')->where('id', $id)->get()->row();
	}

   public function getColorById($id)
	{
		return $this->db->select('*')->from('hotelorders')->where('id', $id)->get()->row('color');
	}

   public function getHotelOrdersById($id)
	{
		return $this->db->select('*')->from('hotelorders')->where('user_id', $id)->get()->result();
	}	


}