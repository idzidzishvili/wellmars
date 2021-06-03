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
			i.filename
		")
		->from('hotels AS h')
		->join('hotelimages AS i', 'h.id=i.hotelid AND i.ismain=1');
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
		return $this->db->where('id', $id)->delete('hotels');
	}


}
