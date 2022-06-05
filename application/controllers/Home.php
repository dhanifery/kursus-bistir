<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->load->model(['m_paket','m_user','m_instruktur','m_home','m_mobil']);
	}
	
	public function index()
	{
	$data = array(
		// title
		'title_course'=> 'Courses',
		'title_paket'=> 'Paket & Mobil',
		'title_instr'=> 'Our Instruktur',

		// database
		'total_peserta' => $this->m_home->total_peserta(),
		'total_instruktur' => $this->m_home->total_instruktur(),
		'paket'=> $this->m_paket->get_all_data(),
		'mobil'=> $this->m_mobil->get_all_data(),
		'instruktur'=> $this->m_instruktur->get_join_data(),
	);
		$this->load->view('layout/v_home', $data ,FALSE);
		
	}

	public function rinci_paket($id_paket = NULL)
	{
		$data = array(
			'title'=> 'Courses Paket',
			'paket'=> $this->m_paket->get_data($id_paket),
		);
		$this->load->view('layout/v_rinci_paket', $data, FALSE);

	}
	public function rinci_mobil($id_mobil = NULL)
	{
		$data = array(
			'title'=> 'Courses Mobil',
			'sub_title'=> 'Rinci Mobil',
			'mobil'=> $this->m_mobil->get_data($id_mobil),
		);
		$this->load->view('layout/v_rinci_mobil', $data, FALSE);

	}
	public function kantor()
	{
		$data = array(
			'title'=> 'Courses B I S T I R',
			'sub_title'=> 'Kantor BISTIR',
			'kantor'=> $this->m_home->get_kantor(),
		);
		$this->load->view('layout/v_kantor', $data, FALSE);

	}
}
