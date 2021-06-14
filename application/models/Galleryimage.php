<?php

class galleryimage extends CI_Model
{
   
   public function getImagesByGalleryId($id)
   {
      return $this->db->select('*')->from('galleryimages')->where('gallery_id', $id)->get()->result();
   }

   public function deleteGalleryImages($galleryId){
      return $this->db->where('gallery_id', $galleryId)->delete('galleryimages');
   }

	public function addImage($gallery_id, $fileName, $ismain)
	{
		if($ismain) $this->resetMainImage($gallery_id);
		$data = array('gallery_id' => $gallery_id, 'filename' => $fileName, 'ismain' => $ismain);
		if ($this->db->insert('galleryimages', $data))
			return true;
		return false;
	}

	public function resetMainImage($gallery_id){
		$this->db->update('galleryimages', array('ismain' => 0), array('gallery_id' => $gallery_id));
	}

   public function updateFirstImage($gallery_id)
   {
      $firstid = $this->db->select('id')->from('galleryimages')->where('gallery_id', $gallery_id)->get()->row();
      $this->db->set('ismain', 1);
      $this->db->where('id', $firstid->id);
      return $this->db->update('galleryimages');
   }
   
   public function updateMainImage($gallery_id, $imageid){
      $this->db->update('galleryimages', array('ismain' => 0), array('gallery_id' => $gallery_id));
      return $this->db->update('galleryimages', array('ismain' => 1), array('id' => $imageid));
   }
   
   public function getImageDataByImageId($id){
      return $this->db->select('*')->from('galleryimages')->where('id', $id)->get()->row();
   }

	public function deleteImage($id){
		return $this->db->where('id', $id)->delete('galleryimages');
	}

	public function setFirstActive($gallery_id){
		if(!$this->db->select('id')->from('galleryimages')->where('gallery_id', $gallery_id)->where('ismain', 1)->count_all_results()){
			$id = $this->db->where('gallery_id', $gallery_id)->get('galleryimages')->row('id');
			return $this->db->update('galleryimages', array('ismain' => 1), array('id' => $id));
		}
		return false;
	}

}
