<?php

class slidertext extends CI_Model
{

   public function getSlidertexts()
	{
		return $this->db->select('*')->from('slidertexts')->get()->result();
	}

   public function updateSlidertexts($header_ge, $header_en, $header_ru, $static_ge, $static_en, $static_ru, $changable_ge, $changable_en, $changable_ru)
	{
      $data = array(
         array('id' => '1' , 'text_ge' => $header_ge,    'text_en' => $header_en,    'text_ru' => $header_ru ),
         array('id' => '2' , 'text_ge' => $static_ge,    'text_en' => $static_en,    'text_ru' => $static_ru ),
         array('id' => '3' , 'text_ge' => $changable_ge, 'text_en' => $changable_en, 'text_ru' => $changable_ru )
      );
      return $this->db->update_batch('slidertexts', $data, 'id');
	}

}


