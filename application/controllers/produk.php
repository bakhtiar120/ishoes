<?php if ( ! defined('BASEPATH')) exit('No direct script access
allowed');

class Produk extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('product_model','product',true);
	}

 	function index()
	{
		$data['product_list'] = $this->product->get_all();
		$this->load->view('product', $data);
	 }
}
