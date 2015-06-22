<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Base extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('base_model');
	}

	public function index()
	{
		$data['records'] = $this->base_model->get();
		$this->load->view('base_view', $data);
	}
	public function Input()
	{
      $data['type']="INPUT";// definisi type, karena nanti juga ada edit
      $this->load->view('base_input',$data);// memanggil view v_input_produk.php
	}
 
	public function Edit()
	{
      
  
      $id = $this->input->get('base');//mengambil param produk dari get
      $data['base'] = $this->base_model->getEdit($id);
      $data['type']="EDIT";// definisi type, karena nanti juga ada edit
      $this->load->view('base_input',$data);// memanggil view v_input_produk.php
	}
	public function Post(){
     //mengambil data dari post memasukan ke array agar lebih mudah 
     $param = array(
       'nama_base' => $this->input->post('nama')
       );
     //jika simpan == input 
     if($this->input->post('simpan')=="INPUT"){
          $this->base_model->input($param); 
     }else
     if($this->input->post('simpan')=="EDIT"){
          $id= $this->input->post('ID_Base_Model');
          $this->base_model->edit($param,$id); 
     }
 
      //memanggil helper url untuk fungsi redirect
      redirect('base','refresh');
     }
     public function Delete(){
  		 $id = $this->input->get('base');
  		 $this->base_model->delete($id);
  		 redirect('base','refresh');
	}

}