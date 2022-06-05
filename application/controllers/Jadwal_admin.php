<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_admin extends CI_Controller {

        public function __construct()
	{
		parent::__construct();
		$this->user_login->proteksi_halaman();
                $this->load->library('Ciqrcode');
		$this->load->model(['m_user','m_peserta','m_paket','m_jadwal']);
	}

        public function index()
        {
                $data = array(
			'title' => 'Jadwal',
			'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                        'jadwal' => $this->m_jadwal->get_data(),
                        'belum_bayar' => $this->m_jadwal->get_data_belum_bayar(),
                        'sudah_bayar' => $this->m_jadwal->get_data_sudah_bayar(),
                        'pending' => $this->m_jadwal->get_data_pending(),
                        'active' => $this->m_jadwal->get_data_active(),
			'isi' => 'admin/jadwal/v_jadwal',
		);
		$this->load->view('layout/backend/v_wrapper_backend', $data ,FALSE);
        }

        public function cek_bukti($id_jadwal = NULL)
        {
                $data = array(
			'title' => 'Jadwal | Cek Bukti',
			'sub_title' => 'Bukti Pembayaran',
			'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                        'jadwal' => $this->m_jadwal->cek_jadwal($id_jadwal), 
			'isi' => 'admin/jadwal/v_cek_bukti',
		);
		$this->load->view('layout/backend/v_wrapper_backend', $data ,FALSE);
        }

        public function konfirmasi($id_jadwal = NULL)
        {
                $data = array(
                        'id_jadwal' => $id_jadwal,
                        'status_jadwal' => '1',
                );
                $this->m_jadwal->update_jadwal($data);
                $this->session->set_flashdata('pesan', 'Konfirmasi berhasil');
                redirect('jadwal_admin');
                
        }
        public function qr_Code($id_jadwal = NULL)
	{
                $data = array(
			'title' => 'Jadwal | QR Code',
			'sub_title' => 'Bukti Jadwal',
			'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                        'jadwal' => $this->m_jadwal->detail_jadwal($id_jadwal), 
                        'paket'=>$this->m_paket->get_all_data(),
			'isi' => 'admin/jadwal/v_qr_code',
		);
		$this->load->view('layout/backend/v_wrapper_backend', $data ,FALSE);
	}

        public function qr_code_jadwal($kodenya)
        {
                // render qr code dengan format gambar png
                Qrcode::png(
                        $kodenya,
                        $outfile = false,
                        $level = QR_ECLEVEL_H,
                        $size =  15,
                        $margin =1
                );
        }
}