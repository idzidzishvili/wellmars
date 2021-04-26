<?php

class tourmainimage extends CI_Model
{
	
	public function addImage($tourId, $fileName)
	{
		$data = array('tourid' => $tourId, 'filename' => $fileName);
		if ($this->db->insert('tourmainimages', $data))
			return true;
		return false;
	}

	public function updateImage($id, $fileName)
	{
		return$this->db->update('tourmainimages', array('filename' => $fileName), array('tourid' => $id));
	}

   public function getFilename($id){
		return $this->db->select('*')->from('tourmainimages')->where('tourid', $id)->get()->row('filename');
	}


}
