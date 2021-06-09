<?php

class hotel extends CI_Model
{
	public function getHotels()
	{
		$this->db->select("
			h.id, 			
			h.type_ge,
			h.type_en,
			h.type_ru,
			h.hotel_ge,
			h.hotel_en,
			h.hotel_ru,
			i.hotelid,
			i.filename,
			AVG(R.rating) AS averageRate
		")
		->from('hotels AS h')
		->join('hotelreviews AS R', 'h.id=R.hotel_id', 'left outer')
		->join('hotelimages AS i', 'h.id=i.hotelid AND i.ismain=1')
		->group_by('h.id');
		$query = $this->db->get();
		return $query->result();
	}


public function getHotels2()
	{
		$sql="SELECT h.id, h.type_ge, h.type_en, h.type_ru, h.hotel_ge, h.hotel_en, h.hotel_ru, i.hotelid, i.filename, AVG(R.rating) AS averageRate FROM hotels AS h 
		LEFT JOIN hotelreviews AS R ON h.id=R.hotel_id 
		LEFT JOIN hotelimages AS i ON h.id=i.hotelid AND i.ismain=1
		GROUP BY h.id";    
		return $this->db->query($sql)->result_array();
	}

	public function getHotel($id)
	{
		$this->db->select('H.id as hotelid, H.type_ge, H.type_en, H.type_ru, H.hotel_ge, H.hotel_en, H.hotel_ru, AVG(R.rating) AS averageRate, COUNT(R.rating) AS rateCount');
		$this->db->from('hotels as H')->where('H.id', $id)->join('hotelreviews AS R', 'H.id = R.hotel_id', 'left outer');
		return $this->db->get()->row();
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
		return $this->db->where('id', $id)->delete('hotels');
	}


}
