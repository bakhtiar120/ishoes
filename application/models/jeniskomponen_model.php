<?php
class Jeniskomponen_model extends CI_Model {
  
 function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
     
    function get(){
        $query = $this->db->get('jenis_komponen');// mengambil semua data dari tabel data_barang
         
        return $query->result();// mengembalikan ke controller hasil dari query ke table data_barang
    }

    function getid($id) {
   
      $results = $this->db->get_where('jenis_komponen', array('ID_Jenis_Komponen' => $id))->result();
      $result = $results[0];
      return $result;
    }
    function input($param){
   		$this->db->insert('jenis_komponen',$param);
   		return true;
	}
 
	function getEdit($id){
   		$this->db->where('ID_Jenis_Komponen',$id);
   		$query = $this->db->get('jenis_komponen');
 
	    return $query->result();
	}
 
	function edit($param,$id){
  		 $this->db->where('ID_Jenis_Komponen',$id);
   		  $this->db->update('jenis_komponen',$param);
   	return true;
	}
	function delete($id){
   		$this->db->where('ID_Jenis_Komponen',$id);
   		$this->db->delete('jenis_komponen');
	}
  function tambah() {
     $query = $this->db->get('komponen');// mengambil semua data dari tabel data_barang
      return $query->result();
  }
 
}