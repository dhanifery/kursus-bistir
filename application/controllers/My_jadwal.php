<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_jadwal extends CI_Controller {

        public function __construct()
	{
		parent::__construct();
		$this->user_login->proteksi_halaman();
                $this->load->library('Ciqrcode');
		$this->load->model(['m_user','m_home','m_peserta','m_paket','m_jadwal','m_instruktur']);
	}

        public function bayar($id_jadwal)
        {
                $this->form_validation->set_rules('atas_nama', 'Atas Nama', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));
                $this->form_validation->set_rules('bank', 'Nama Bank', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));
                $this->form_validation->set_rules('no_rek', 'No Rekening', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));

        if($this->form_validation->run() == TRUE)
        {
                $config['upload_path'] = './assets/images/bukti_bayar/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|PNG|ico';
                $config['max_size']     = '5000';
                $config['file_name'] = 'img' . time();
                $this->upload->initialize($config); 
 
                $field_name = 'bukti_bayar';
                if (!$this->upload->do_upload($field_name)) {
                        $data = array(
                                'title' => 'B I S T I R | Pembayaran ',
                                'user' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                                'jadwal'=>$this->m_jadwal->my_jadwal($id_jadwal),
                                'paket'=>$this->m_paket->get_all_data(),
                                'bank'=>$this->m_jadwal->bank(),
                                'error_upload' => $this->upload->display_errors(),
                                'isi' => 'peserta/v_pembayaran',
        
                        );
                        $this->load->view('layout/frontend/v_wrapper_frontend', $data ,FALSE);
                }else {
                        $upload_data = array('uploads' => $this->upload->data());
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './assets/images/bukti_bayar/'.$upload_data['uploads']['file_name'];
                        $this->load->library('image_lib', $config);    
                        $data = array(
                                'id_jadwal' => $id_jadwal,
                                'atas_nama' => $this->input->post('atas_nama'),
                                'bank' => $this->input->post('bank'),
                                'total_bayar' => $this->input->post('total_bayar'),
                                'no_rek' => $this->input->post('no_rek'),
                                'status_bayar' => '1',
                                'bukti_bayar' => $upload_data['uploads']['file_name'],
                        );
                        $this->m_jadwal->upload_buktibayar($data);
                        $this->session->set_flashdata('pesan', 'Bukti Pembayaran Berhasil Di Upload !!!!');
                        redirect('jadwal/jadwal_peserta');                
                }
        }
                $data = array(
			'title' => 'B I S T I R | Pembayaran ',
			'user' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                        'jadwal'=>$this->m_jadwal->my_jadwal($id_jadwal),
                        'paket'=>$this->m_paket->get_all_data(),
                        'bank'=>$this->m_jadwal->bank(),
			'isi' => 'peserta/v_pembayaran',
		);
		$this->load->view('layout/frontend/v_wrapper_frontend', $data ,FALSE);
        }


        public function konfirmasi($id_jadwal = NULL)
        {
                $data = array(
			'title' => 'B I S T I R | Confirm Jadwal ',
			'user' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                        'user_instruktur'=>$this->m_instruktur->get_instruktur(),
                        'jadwal'=>$this->m_jadwal->my_jadwal($id_jadwal),
			'isi' => 'instruktur/v_konfirmasi_jadwal',
		);
		$this->load->view('layout/frontend/v_wrapper_frontend', $data ,FALSE);
        }


        public function update_konfirmasi($id_jadwal = NULL)
        {
                $data = array(
                        'id_jadwal'=> $id_jadwal,
                        'id_user_instruktur' => $this->session->userdata('id_user'),
                        'id_instruktur'=> $this->input->post('id_instruktur'),
                        'status_jadwal'=> '2',

		);
		$this->m_jadwal->update_jadwal($data);
		$this->session->set_flashdata('pesan', 'Konfirmasi berhasil!');
                redirect('jadwal/jadwal_instruktur');
        }

        public function detail_jadwal($id_jadwal = NULL)
        {
                $data = array(
			'title' => 'B I S T I R | Detail Jadwal ',
			'user' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                        'jadwal'=>$this->m_jadwal->detail_jadwal($id_jadwal),
                        'paket'=>$this->m_paket->get_all_data(),
			'isi' => 'instruktur/v_detail_jadwal',
		);
		$this->load->view('layout/frontend/v_wrapper_frontend', $data ,FALSE);
        }

        public function detail_jadwal_peserta($id_jadwal = NULL)
        {
                $data = array(
			'title' => 'B I S T I R | Detail Jadwal ',
			'user' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                        'jadwal'=>$this->m_jadwal->detail_jadwal($id_jadwal),
                        'paket'=>$this->m_paket->get_all_data(),
			'isi' => 'peserta/v_detail_jadwal',
		);
		$this->load->view('layout/frontend/v_wrapper_frontend', $data ,FALSE);
        }

        public function qr_code($kodenya)
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

/* End of file My_jadwal.php */
