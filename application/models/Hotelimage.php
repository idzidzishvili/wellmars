<?php

class hotelimage extends CI_Model
{
	public function checkHotelImageName($filename)
	{
		return $this->db->select('*')->from('hotelimages')->like('filename', $filename, 'after')->count_all_results();
	}

	public function addImage($hotelid, $fileName, $ismain)
	{
		if($ismain) $this->resetMainImage($hotelid);
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

   public function getImagesByHotelId($id)
	{
		return $this->db->select('*')->from('hotelimages')->where('hotelid', $id)->get()->result();
	}

	public function deleteImage($id){
		return $this->db->where('id', $id)->delete('hotelimages');
	}

	public function deleteHotelImages($hotelId){
		return $this->db->where('hotelid', $hotelId)->delete('hotelimages');
	}

	public function getImageDataByImageId($id){
		return $this->db->select('*')->from('hotelimages')->where('id', $id)->get()->row();
	}

	public function setFirstActive($hotelid){
		if(!$this->db->select('id')->from('hotelimages')->where('hotelid', $hotelid)->where('ismain', 1)->count_all_results()){
			$id = $this->db->where('hotelid', $hotelid)->get('hotelimages')->row('id');
			return $this->db->update('hotelimages', array('ismain' => 1), array('id' => $id));
		}
		return false;
	}

	public function updateMainImage($hotelid, $imageid){
		$this->db->update('hotelimages', array('ismain' => 0), array('hotelid' => $hotelid));
		return $this->db->update('hotelimages', array('ismain' => 1), array('id' => $imageid));
	}

	public function resetMainImage($hotelid){
		$this->db->update('hotelimages', array('ismain' => 0), array('hotelid' => $hotelid));
	}

}
