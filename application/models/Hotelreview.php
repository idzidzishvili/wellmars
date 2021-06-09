<?php

class hotelreview extends CI_Model
{
	public function addReview($hotel_id, $user_id, $rating, $review, $date)
	{
		$data = array('hotel_id' => $hotel_id, 'user_id' => $user_id, 'rating' => $rating, 'review' => $review, 'date' => $date);
		if ($this->db->insert('hotelreviews', $data))
			return true;
		return false;
	}

   public function userHasReview($user_id, $hotel_id){
      if($this->db->select('id')->from('hotelreviews')->where('user_id', $user_id)->where('hotel_id', $hotel_id)->count_all_results())
         return true;
      return false;
   }

	public function getReviewCountByHotelId($hotel_id){
		return $this->db->select('*')->from('hotelreviews')->where('hotel_id', $hotel_id)->count_all_results();
	}
	public function getReviewsByHotelId($hotel_id, $limit, $start){
		$this->db->select('R.id AS reviewId, R.hotel_id, R.user_id, R.rating, R.review, R.date, U.id AS userId, U.fullname, U.email, U.avatar');
		$this->db->from('hotelreviews AS R');
		$this->db->where('R.hotel_id', $hotel_id);
		$this->db->order_by('R.date', 'DESC');
		$this->db->join('users AS U', 'R.user_id=U.id', 'left');
		$this->db->limit($limit, $start);
		return $this->db->get()->result();
	}
	




}
