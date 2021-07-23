<?php

class autopark extends CI_Model
{

   public function getImages()
	{
		return $this->db->select('*')->from('autopark')->get()->result();
	}

   public function checkFileName($filename)
	{
		return $this->db->select('*')->from('autopark')->like('filename', $filename, 'after')->count_all_results();
	}

   public function addImage($fileName)
	{
		$data = array('filename' => $fileName);
		if ($this->db->insert('autopark', $data))
			return true;
		return false;
	}

   public function deleteAutoparkImage($id)
	{
		return $this->db->where('id', $id)->delete('autopark');
	}


	public function getFilenameById($id)
	{
		return $this->db->select('*')->from('autopark')->where('id', $id)->get()->row('filename');
	}



}
