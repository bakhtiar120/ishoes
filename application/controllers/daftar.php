<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Daftar extends CI_Controller {

	public function index() {
		$this->load->view('daftar');
	}

	public function register() {
		$data = array('nik' => $this->input->post('nik',true),
						'username' => $this->input->post('username', TRUE),
						'password' => md5($this->input->post('password', TRUE)),
						'level_user' => 'user',
						'status' => 1
			);
		$this->load->model('model_user'); // load model_user
		if($this->model_user->insert_user($data))
		{
			echo "<script>alert('Daftar user berhasil');</script>";
		}
		else {
			echo "<script>alert('Daftar user gagal!');history.go(-1);</script>";
		}
	}

}

?>