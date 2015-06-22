<?php
class Komponen_model extends CI_Model {
  
 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
     
    function get(){
        $query = $this->db->get('komponen');// mengambil semua data dari tabel data_barang
         
        return $query->result();// mengembalikan ke controller hasil dari query ke table data_barang
    }
    function input($param){
   		$this->db->insert('komponen',$param);
   		return true;
	}
 
	function getEdit($id){
   		$this->db->where('ID_Komponen',$id);
   		$query = $this->db->get('komponen');
 
	    return $query->result();
	}
 
	function edit($param,$id){
  		 $this->db->where('ID_Komponen',$id);
   		  $this->db->update('komponen',$param);
   	return true;
	}
	function delete($id){
   		$this->db->where('ID_Komponen',$id);
   		$this->db->delete('komponen');
	}
  function tambah() {
     $query = $this->db->get('base_model');// mengambil semua data dari tabel data_barang
      return $query->result();
  }
 
}