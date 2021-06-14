<?php

class gallery extends CI_Model
{
	public function getGalleries()
	{
		$this->db->select("G.id, G.galleryname_ge, G.galleryname_en, G.galleryname_ru, I.gallery_id, I.filename");
		$this->db->from('galleries AS G');	
		$this->db->join('galleryimages AS I', 'G.id=I.gallery_id AND I.ismain=1', 'left');
		return $this->db->get()->result();
	}

	public function addGallery($galleryname_ge, $galleryname_en, $galleryname_ru){
		$data = array('galleryname_ge' => $galleryname_ge, 'galleryname_en' => $galleryname_en, 'galleryname_ru' => $galleryname_ru);
		if ($this->db->insert('galleries', $data))
			return $this->db->insert_id();
		return false;
	}


	public function deleteGallery($id)
	{
		return $this->db->where('id', $id)->delete('galleries');
	}

	public function getGallery($id)
	{
		return $this->db->select('*')->from('galleries')->where('id', $id)->get()->row();
	}

	public function editGallery($id, $galleryname_ge, $galleryname_en, $galleryname_ru)
	{
		return $this->db->update('galleries', array('galleryname_ge' => $galleryname_ge, 'galleryname_en' => $galleryname_en, 'galleryname_ru' => $galleryname_ru), array('id' => $id));
	}

}
