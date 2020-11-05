<?php

class Fullcalendar_model extends CI_Model
{
	function fetchAllEvents(){
		$this->db->order_by('id');
		return $this->db->get('events');
	}

	function insertEvent($data)
	{
		$this->db->insert('events', $data);
	}

	function updateEvent($data, $id)
	{
		$this->db->where('id', $id);
		$this->db->update('events', $data);
	}

	function deleteEvent($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('events');
	}
}

?>