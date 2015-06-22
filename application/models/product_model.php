<?php
class Product_model extends CI_Model {
	function __construct()
	{
       parent::__construct();
 	}
	function get_all($limit = NULL, $offset = NULL) {
		$query = $this->db->get('jenis_komponen', $limit, $offset);
		return $query->result();
	}
	function get($id) {
		$query = $this->db->get_where('jenis_komponen', array('ID_Jenis_Komponen'=>$id));
		return $query->row();
	}
}