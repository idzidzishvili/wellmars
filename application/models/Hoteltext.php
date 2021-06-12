<?php

class hoteltext extends CI_Model
{

   public function getHoteltexts()
	{
		return $this->db->select('*')->from('hoteltexts')->where('id', 1)->get()->row();
	}

   public function updateHoteltexts($text_ge, $text_en, $text_ru)
	{
      $data = array('text_ge' => $text_ge, 'text_en' => $text_en, 'text_ru' => $text_ru);
      return $this->db->where('id', 1)->update('hoteltexts', $data);
	}

}


