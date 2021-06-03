<?php

class hotelorder extends CI_Model
{
   public function addReservation($startsDate, $endDate, $roomid, $color){
      $data = array('startdate' => $startsDate, 'enddate' => $endDate, 'room_id' => $roomid, 'color' => $color);
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
	


}
