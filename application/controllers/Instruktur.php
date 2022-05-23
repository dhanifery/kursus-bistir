<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Instruktur extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->user_login->proteksi_halaman();
		$this->load->model('m_user');
	}
	
	public function index()
	{
		$data = array(
			'title' => 'B I S T I R',
			'sub_heading' => 'Instruktur',
			'user' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
			'isi' => 'instruktur/v_instruktur'
		);
		$this->load->view('layout/frontend/v_wrapper_frontend', $data ,FALSE);
	}
}
