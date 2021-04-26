<?php

class tourimage extends CI_Model
{
	public function checkImageName($filename)
	{
		return $this->db->select('*')->from('tourimages')->like('filename', $filename, 'after')->count_all_results();
	}

	public function addImage($subTourId, $fileName, $isMain)
	{
		$data = array('subtourid' => $subTourId, 'filename' => $fileName, 'ismain' => $isMain);
		if ($this->db->insert('tourimages', $data))
			return true;
		return false;
	}

	public function updateFirstImage($subtour)
	{
		$firstid = $this->db->select('id')->from('tourimages')->where('subtourid', $subtour)->get()->row();
		$this->db->set('ismain', 1);
		$this->db->where('id', $firstid->id);
		return $this->db->update('tourimages');
	}

	public function getImagesById($id)
	{
		return $this->db->select('*')->from('tourimages')->where('subtourid', $id)->get()->result();
	}

	public function deleteImage($id){
		$this->db->where('id', $id);
		$this->db->delete('tourimages');
	}

	public function updateMainImage($subtourid, $id)
	{
		$this->db->update('tourimages', array('ismain' => 0), array('subtourid' => $subtourid));
		return $this->db->update('tourimages', array('ismain' => 1), array('id' => $id));
	}








}
