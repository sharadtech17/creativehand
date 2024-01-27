<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Model {
	
	public function __construct(){
		parent::__construct();
	}
	public function getEventList()
	{
		$this->db->select('events.*, artist.name as artistname');
		$this->db->from('events');
		$this->db->join('artist', 'artist.id = events.artist_id', 'left');
		$this->db->order_by('events.id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function getActiveEventList()
	{
		$this->db->select('events.*, artist.name as artistname');
		$this->db->from('events');
		$this->db->join('artist', 'artist.id = events.artist_id', 'left');
		$this->db->where('events.status', 0);
		$this->db->order_by('events.id', 'desc');
		$query = $this->db->get();
		return $query->result();
	}
	public function store_Event($data) {
        $this->db->insert('events', $data);
        return $this->db->insert_id(); // Return the ID of the inserted row
    }
	public function update_Event($id,$data) {
		$this->db->where('id', $id);
        return $this->db->update('events', $data);
    }
	public function get_Event_by_id($id) {
		$this->db->select('events.*, artist.name as artistname');
		$this->db->from('events');
		$this->db->join('artist', 'artist.id = events.artist_id', 'left');
		$this->db->where('events.id', $id); // Specify the table alias for 'id'
		$query = $this->db->get();
		return $query->row();
	}
	public function getEventListByArtist($id) {
		$this->db->select('events.*, artist.name as artistname');
		$this->db->from('events');
		$this->db->join('artist', 'artist.id = events.artist_id', 'left');
		$this->db->where('events.artist_id', $id); // Specify the table alias for 'id'
		$query = $this->db->get();
		return $query->result();
	}
	public function delete_Event($id) {
        $this->db->where('id', $id);
        $this->db->delete('events');
    }

}
?>