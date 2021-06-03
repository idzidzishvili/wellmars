<?php

class Hotelstable extends CI_Model
{

   public function getWeek($weekStart, $weekEnd)
	{
		return $this->db->select('*')->from('hotelstable')->where('date >=', $weekStart)->where('date <=', $weekEnd)->order_by('date', 'ASC')->get()->result();
	}

	public function checkForFreeRoom($roomId, $dateRange){
		return $this->db->select_sum($roomId, 'room_sum')->from('hotelstable')->where_in('date', $dateRange)->get()->row('room_sum');
	}

	public function updateHotelsTable($roomid, $dateRange, $reservationID)
	{
		$data = array();
		foreach($dateRange as $dtr){
			array_push($data, array('date' => $dtr, 'room_'.$roomid => $reservationID));
		}      
      return $this->db->update_batch('hotelstable', $data, 'date');
	}












}
