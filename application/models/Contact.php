<?php

class contact extends CI_Model
{

   public function getContacts()
	{
		return $this->db->select('*')->from('contacts')->where('id', 1)->get()->row();
	}

   public function updateContacts($id, $phone, $email, $address_ge, $address_en, $address_ru, $map_url, $facebook, $twitter, $instagram, $pinterest)
	{
		return $this->db->update('contacts', array('phone'=>$phone, 'email'=>$email, 'address_ge'=>$address_ge, 'address_en'=>$address_en, 'address_ru'=>$address_ru, 
		'map_url'=>$map_url, 'facebook'=>$facebook, 'twitter'=>$twitter, 'instagram'=>$instagram, 'pinterest'=>$pinterest), array('id' => $id));
	}

}


