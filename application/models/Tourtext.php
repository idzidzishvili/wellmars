<?php

class tourtext extends CI_Model
{

   public function getTourtexts()
	{
		return $this->db->select('*')->from('tourtexts')->where('id', 1)->get()->row();
	}

   public function updateTourtexts($text_ge, $text_en, $text_ru)
	{
      $data = array('text_ge' => $text_ge, 'text_en' => $text_en, 'text_ru' => $text_ru);
      return $this->db->where('id', 1)->update('tourtexts', $data);
	}

}


