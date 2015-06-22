<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Komponen extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('komponen_model');
	}

	public function index()
	{
		$data['records'] = $this->komponen_model->get();
		$this->load->view('komponen_view', $data);
	}
	public function Input()
	{
      $data['type']="INPUT";// definisi type, karena nanti juga ada edit
      $data['records'] = $this->komponen_model->tambah();
      $this->load->view('komponen_input',$data);// memanggil view v_input_produk.php
	}
 
	public function Edit()
	{
      
  
      $id = $this->input->get('komponen');//mengambil param produk dari get
      $data['komponen'] = $this->komponen_model->getEdit($id);
      $data['type']="EDIT";// definisi type, karena nanti juga ada edit
      $this->load->view('komponen_input',$data);// memanggil view v_input_produk.php
	}
	public function Post(){
     //mengambil data dari post memasukan ke array agar lebih mudah 
     $param = array(
        'ID_Base_Model'=> $this->input->post('ID_Base_Model'),
       'nama_komponen' => $this->input->post('nama')
       );
     //jika simpan == input 
     if($this->input->post('simpan')=="INPUT"){
          $this->komponen_model->input($param); 
     }else
     if($this->input->post('simpan')=="EDIT"){
          $id= $this->input->post('ID_Komponen');
          $this->komponen_model->edit($param,$id); 
     }
 
      //memanggil helper url untuk fungsi redirect
      redirect('komponen','refresh');
     }
     public function Delete(){
  		 $id = $this->input->get('komponen');
  		 $this->komponen_model->delete($id);
  		 redirect('komponen','refresh');
	}

}