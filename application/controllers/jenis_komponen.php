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
      $data['type']="EDIT";// definisi type, karena nanti juga ada insert
      $this->load->view('jeniskomponen_input',$data);// memanggil view v_input_produk.php
	}
	public function Post(){
      //mengambil data dari post memasukan ke array agar lebih mudah 
      $config = array(
              'upload_path' => "./application/uploads/",
              'allowed_types' => "gif|jpg|png|jpeg|pdf",
              'overwrite' => TRUE,
              'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
              'max_height' => "768",
              'max_width' => "1366"
              );
      $this->load->library('upload', $config);  
      //jika simpan == input 
      if($this->input->post('simpan')=="INPUT")
      {
        $param = array(
                      'ID_Komponen'=> $this->input->post('ID_Komponen'),
                      'nama' => $this->input->post('nama'),
                      'harga' => $this->input->post('harga'),
                      'keterangan' => $this->upload->data()['full_path']
                     );
        if($this->upload->do_upload())
        {
          //var_dump($param);
          $this->jeniskomponen_model->input($param);
        }
        else
        {
          $error = array('error' => $this->upload->display_errors());
          var_dump($error);
        }
      }
      else if($this->input->post('simpan')=="EDIT")
      {
        if($this->upload->do_upload())
        {
          $param = array(
                      'nama' => $this->input->post('nama'),
                      'harga' => $this->input->post('harga'),
                      'keterangan' => $this->upload->data()['full_path']
                     );
          //var_dump($param);
          $id= $this->input->post('ID_Jenis_Komponen');
          $this->jeniskomponen_model->edit($param,$id); 
        }
        else
        {
          $error = array('error' => $this->upload->display_errors());
          var_dump($error);
        }
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