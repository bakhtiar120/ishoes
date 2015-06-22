<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jenis_komponen extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('jeniskomponen_model');
	}

	public function index()
	{
		$data['records'] = $this->jeniskomponen_model->get();
		$this->load->view('jeniskomponen_view', $data);
	}
	public function Input()
	{
      $data['type']="INPUT";// definisi type, karena nanti juga ada edit
      $data['records'] = $this->jeniskomponen_model->tambah();
      $this->load->view('jeniskomponen_input',$data);// memanggil view v_input_produk.php
	}
 
	public function Edit()
	{
      
  
      $id = $this->input->get('jeniskomponen');//mengambil param produk dari get
      $data['jeniskomponen'] = $this->jeniskomponen_model->getEdit($id);
      $data['type']="EDIT";// definisi type, karena nanti juga ada edit
      $this->load->view('jeniskomponen_input',$data);// memanggil view v_input_produk.php
	}
	public function Post(){
     //mengambil data dari post memasukan ke array agar lebih mudah 
     $param = array(
        'ID_Komponen'=> $this->input->post('ID_Komponen'),
       'nama' => $this->input->post('nama'),
       'harga' => $this->input->post('harga'),
       'keterangan' => $this->input->post('keterangan')
       );
     //jika simpan == input 
     if($this->input->post('simpan')=="INPUT"){
          $this->jeniskomponen_model->input($param); 
     }else
     if($this->input->post('simpan')=="EDIT"){
          $id= $this->input->post('ID_Komponen');
          $this->jeniskomponen_model->edit($param,$id); 
     }
 
      //memanggil helper url untuk fungsi redirect
      redirect('jenis_komponen','refresh');
     }
     public function Delete(){
  		 $id = $this->input->get('jeniskomponen');
  		 $this->jeniskomponen_model->delete($id);
  		 redirect('jenis_komponen','refresh');
	}

}