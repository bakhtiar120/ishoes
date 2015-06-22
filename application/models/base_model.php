<?php
class Base_model extends CI_Model {
  
 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
     
    function get(){
        $query = $this->db->get('base_model');// mengambil semua data dari tabel data_barang
         
        return $query->result();// mengembalikan ke controller hasil dari query ke table data_barang
    }
    function input($param){
   		$this->db->insert('base_model',$param);
   		return true;
	}
 
	function getEdit($id){
   		$this->db->where('ID_Base_Model',$id);
   		$query = $this->db->get('base_model');
 
	    return $query->result();
	}
 
	function edit($param,$id){
  		 $this->db->where('ID_Base_Model',$id);
   		  $this->db->update('base_model',$param);
   	return true;
	}
	function delete($id){
   		$this->db->where('ID_Base_Model',$id);
   		$this->db->delete('base_model');
	}
 
}