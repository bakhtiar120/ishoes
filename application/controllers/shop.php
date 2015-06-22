<?php
class Shop extends CI_Controller {
  
  public function __construct()
  {
    parent::__construct();
    $this->load->helper('html');
    $this->load->model('jeniskomponen_model');
  }

 function index() {
   
   
  $data['jeniskomponen'] = $this->jeniskomponen_model->get();
   
  $this->load->view('products', $data);
 }
  
 function add() {
   
  $product = $this->jeniskomponen_model->get($this->input->post('id'));
   
  $insert = array(
   'id' => $this->input->post('id'),
   'qty' => 1,
   'price' => $product->harga,
   'name' => $product->nama
  );
  $this->cart->insert($insert);
  
  redirect('shop');
   
 }
  
 function remove($rowid) {
   
  $this->cart->update(array(
   'rowid' => $rowid,
   'qty' => 0
  ));
   
  redirect('shop');
   
 }
  
}