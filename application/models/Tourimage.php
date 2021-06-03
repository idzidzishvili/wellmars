<?php

class tourimage extends CI_Model
{
	public function checkImageName($filename){
		return $this->db->select('*')->from('tourimages')->like('filename', $filename, 'after')->count_all_results();
	}

	public function addImage($tourId, $fileName, $isMain){
		if($isMain) $this->resetMainImage($tourId);
		$data = array('tourid' => $tourId, 'filename' => $fileName, 'ismain' => $isMain);
		if ($this->db->insert('tourimages', $data))
			return true;
		return false;
	}

	public function updateFirstImage($tour){		
		$firstid = $this->db->select('id')->from('tourimages')->where('tourid', $tour)->get()->row();
		$this->db->set('ismain', 1);
		$this->db->where('id', $firstid->id);
		return $this->db->update('tourimages');
	}

	public function getImagesByTourId($id){
		return $this->db->select('*')->from('tourimages')->where('tourid', $id)->get()->result();
	}

	public function deleteImage($id){
		return $this->db->where('id', $id)->delete('tourimages');
	}

	public function deleteTourImages($tourid){
		return $this->db->where('tourid', $tourid)->delete('tourimages');
	}

	public function updateMainImage($tourid, $id){
		$this->db->update('tourimages', array('ismain' => 0), array('tourid' => $tourid));
		return $this->db->update('tourimages', array('ismain' => 1), array('id' => $id));
	}

	public function getImageDataByImageId($id){
		return $this->db->select('*')->from('tourimages')->where('id', $id)->get()->row();
	}

	public function setFirstActive($tourid){
		if(!$this->db->select('id')->from('tourimages')->where('tourid', $tourid)->where('ismain', 1)->count_all_results()){
			$id = $this->db->where('tourid', $tourid)->get('tourimages')->row('id');
			return $this->db->update('tourimages', array('ismain' => 1), array('id' => $id));
		}
		return false;
	}

	public function resetMainImage($tourid){
		$this->db->update('tourimages', array('ismain' => 0), array('tourid' => $tourid));
	}







}
