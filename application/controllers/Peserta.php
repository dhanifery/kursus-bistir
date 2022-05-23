<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Peserta extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->user_login->proteksi_halaman();
		$this->load->model(['m_user','m_home']);
	}
	
	public function index()
	{
		$data = array(
			'title' => 'B I S T I R | Home',
			'sub_heading' => 'Peserta',
			'user' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
			'isi' => 'peserta/v_peserta',
		);
		$this->load->view('layout/frontend/v_wrapper_frontend', $data ,FALSE);
	}

	public function about()
	{
		$data = array(
			'title' => 'B I S T I R | About',
			'sub_heading' => 'Peserta',
			'total_peserta' => $this->m_home->total_peserta(),
			'total_instruktur' => $this->m_home->total_instruktur(),
			'user' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
			'isi' => 'peserta/v_about',
		);
		$this->load->view('layout/frontend/v_wrapper_frontend', $data ,FALSE);
	}

	public function contact()
	{
		$data = array(
			'title' => 'B I S T I R | About',
			'user' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
			'isi' => 'peserta/v_contact',
		);
		$this->load->view('layout/frontend/v_wrapper_frontend', $data ,FALSE);
	}
}
