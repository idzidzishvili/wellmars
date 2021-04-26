<?php

class mainslider extends CI_Model
{

   public function getSlides()
	{
		return $this->db->select('*')->from('mainsliders')->get()->result();
	}

   public function checkFileName($filename)
	{
		return $this->db->select('*')->from('mainsliders')->like('filename', $filename, 'after')->count_all_results();
	}

   public function addImage($fileName)
	{
		$data = array('filename' => $fileName);
		if ($this->db->insert('mainsliders', $data))
			return true;
		return false;
	}

   public function deleteSlide($id)
	{
		$this->db->where('id', $id)->delete('mainsliders');
	}






}
