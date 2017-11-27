<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Model_user');		
	}
	public function index()
	{
		$this->load->view('login');
	}
	public function daftar()
	{
		$this->load->view('form_input');
	}
	public function input_data()
	{
		$user_identitas = array(
			'npm' => $this->input->post('npm'),
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'jk' => $this->input->post('jk')		
		);
		$users_user = array(
			'username' => $this->input->post('username'),
			'password' => sha1( $this->input->post('password') )
		);

		if( $this->Model_user->input($user_identitas, $users_user) )
		{
			$data['mhs'] = $this->Model_user->tampil();
			$this->load->view('tampil_data', $data);
		}else {
			$this->load->view('login');
		}
	}
	public function user_login() 
	{
		$users_user = array(
			'username' => $this->input->post('username'),
			'password' => sha1( $this->input->post('password') )
		);
		if( $this->Model_user->login($users_user) ) {
			$this->load->library('session');
			$sess_user = array(
				'username' => $users_user['username'],
				'npm' => $users_user['npm'],
				'status' => 'login'
			);
			
			$this->session->set_userdata($sess_user);
			redirect(base_url('index.php/login/tampil_data'));
		}
	}
	public function tampil_data() {
		echo "Hello tampil data";
	}
}
