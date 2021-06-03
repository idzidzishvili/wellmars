<?php

class roomtype extends CI_Model
{

   public function getRoomTypes()
	{
		return $this->db->select('*')->from('roomtypes')->get()->result();
	}

   public function getRoomsByType($hotel_type_id)
	{
		return $this->db->select('*')->from('roomtypes')->where('hotel_type', $hotel_type_id)->get()->result();
	}

   public function updateRoomTypes($room1, $room2, $room3, $room4, $room5, $room6, $room7, $room8, $room9, $room10, $room11, $room12, $room13, $room14, $room15, $room16)
	{
      $data = array(
         array('id' => 1,  'hotel_type' => $room1),
         array('id' => 2,  'hotel_type' => $room2),
         array('id' => 3,  'hotel_type' => $room3),
         array('id' => 4,  'hotel_type' => $room4),
         array('id' => 5,  'hotel_type' => $room5),
         array('id' => 6,  'hotel_type' => $room6),
         array('id' => 7,  'hotel_type' => $room7),
         array('id' => 8,  'hotel_type' => $room8),
         array('id' => 9,  'hotel_type' => $room9),
         array('id' => 10, 'hotel_type' => $room10),
         array('id' => 11, 'hotel_type' => $room11),
         array('id' => 12, 'hotel_type' => $room12),
         array('id' => 13, 'hotel_type' => $room13),
         array('id' => 14, 'hotel_type' => $room14),
         array('id' => 15, 'hotel_type' => $room15),
         array('id' => 16, 'hotel_type' => $room16)        
      );
      return $this->db->update_batch('roomtypes', $data, 'id');
	}

}


