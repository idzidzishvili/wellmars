<?php

class hotelimage extends CI_Model
{
	public function checkHotelImageName($filename)
	{
		return $this->db->select('*')->from('hotelimages')->like('filename', $filename, 'after')->count_all_results();
	}

	public function addImage($hotelid, $fileName, $ismain)
	{
		$data = array('hotelid' => $hotelid, 'filename' => $fileName, 'ismain' => $ismain);
		if ($this->db->insert('hotelimages', $data))
			return true;
		return false;
	}

   public function updateFirstImage($hotel)
	{
		$firstid = $this->db->select('id')->from('hotelimages')->where('hotelid', $hotel)->get()->row();
		$this->db->set('ismain', 1);
		$this->db->where('id', $firstid->id);
		return $this->db->update('hotelimages');
	}

   public function getImagesById($id)
	{
		return $this->db->select('*')->from('hotelimages')->where('hotelid', $id)->get()->result();
	}

	public function deleteImage($id){
		$this->db->where('id', $id);
		$this->db->delete('hotelimages');
	}



}
