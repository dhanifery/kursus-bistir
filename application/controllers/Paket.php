<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paket extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->user_login->proteksi_halaman();
		$this->load->model(['m_user','m_mobil','m_paket']);

	}
	
	public function index()
	{
		$data = array(
			'title' => 'Paket',
			'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
			'paket'=> $this->m_paket->get_all_data(),
			'isi' => 'admin/paket/v_paket',
		);
		$this->load->view('layout/backend/v_wrapper_backend', $data ,FALSE);
	}

	public function add()
	{
		$this->form_validation->set_rules('nama_paket', 'Nama Paket', 'required|min_length[3]',
                array('required'=>'%s Harus Diisi !!!!',
                'min_length'=> '%s Minimal 3 karakter !'
        ));
                $this->form_validation->set_rules('id_mobil', 'Mobil', 'required',
                array('required'=>'%s belum dipilih !!!!'
        ));
                $this->form_validation->set_rules('harga', 'harga', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));
                $this->form_validation->set_rules('byk_pertemuan', 'Banyak Pertemuan', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));
                $this->form_validation->set_rules('deskripsi_paket', 'Deskripsi', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));

        if($this->form_validation->run() == TRUE)
        {
                $config['upload_path'] = './assets/images/paket/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|PNG|ico';
                $config['max_size']     = '5000';
                $config['file_name'] = 'img' . time();
                $this->upload->initialize($config);

                $field_name = "image";
                if (!$this->upload->do_upload($field_name)) {
                        $data = array(
                                'title' => 'Paket',
                                'sub_title' => 'Add Paket',
                                'error_upload' => $this->upload->display_errors(),
			        'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                                'isi' => 'admin/paket/v_tambah_paket',
        
                        );
                        $this->load->view('layout/backend/v_wrapper_backend', $data,FALSE);
                }else {
                        $upload_data = array('uploads' => $this->upload->data());
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './assets/images/paket/'.$upload_data['uploads']['file_name'];
                        $this->load->library('image_lib', $config);    
                        $data = array(
                                'nama_paket' => $this->input->post('nama_paket'),
                                'id_mobil' => $this->input->post('id_mobil'),
                                'harga' => $this->input->post('harga'),
                                'byk_pertemuan' => $this->input->post('byk_pertemuan'),
                                'deskripsi_paket' => $this->input->post('deskripsi_paket'),
                                'image' => $upload_data['uploads']['file_name'],
                        );
                        $this->m_paket->add($data);
                        $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan !!!!');
                        redirect('paket');                
                }
        }

		$data = array(
			'title' => 'Paket',
			'sub_title' => 'Add Paket',
			'mobil' => $this->m_mobil->get_all_data(),
			'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
			'isi' => 'admin/paket/v_tambah_paket',
		);
		$this->load->view('layout/backend/v_wrapper_backend', $data ,FALSE);
	}

	// update data
	public function update($id_paket = NULL)
	{
                $this->form_validation->set_rules('nama_paket', 'Nama Paket', 'required|min_length[3]',
                array('required'=>'%s Harus Diisi !!!!',
                'min_length'=> '%s Minimal 3 karakter !'
        ));
                $this->form_validation->set_rules('id_mobil', 'Mobil', 'required',
                array('required'=>'%s belum dipilih !!!!'
        ));
                $this->form_validation->set_rules('harga', 'harga', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));
                $this->form_validation->set_rules('byk_pertemuan', 'Banyak Pertemuan', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));
                $this->form_validation->set_rules('deskripsi_paket', 'Deskripsi', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));

        if($this->form_validation->run() == TRUE)
        {
                $config['upload_path'] = './assets/images/paket/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|PNG|ico';
                $config['max_size']     = '5000';
                $config['file_name'] = 'img' . time();
                $this->upload->initialize($config);

                $field_name = "image";
                if (!$this->upload->do_upload($field_name)) {
                        $data = array(
                                'title' => 'Paket',
                                'sub_title' => 'Edit Paket',
                                'mobil' => $this->m_mobil->get_all_data(),
                                'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                                'isi' => 'admin/paket/v_tambah_paket',
        
                        );
                        $this->load->view('layout/backend/v_wrapper_backend', $data,FALSE);
                }else{
                        // Timpa gambar lama jadi baru
                        $paket = $this->m_paket->get_data($id_paket);
                        if ($paket->image != "" ) {
                                unlink('./assets/images/paket/'.$paket->image);
                        }
                        // end timpa gambar lama jadi baru
                        $upload_data = array('uploads' => $this->upload->data());
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './assets/images/paket/'.$upload_data['uploads']['file_name'];
                        $this->load->library('image_lib', $config);

                        $data = array(
                                'id_paket' => $id_paket,
                                'nama_paket' => $this->input->post('nama_paket'),
                                'id_mobil' => $this->input->post('id_mobil'),
                                'harga' => $this->input->post('harga'),
                                'byk_pertemuan' => $this->input->post('byk_pertemuan'),
                                'deskripsi_paket' => $this->input->post('deskripsi_paket'),
                                'image' => $upload_data['uploads']['file_name'],
                        );
                        $this->m_paket->update($data);
                        $this->session->set_flashdata('pesan', 'Data berhasil Diganti !!!!');
                        redirect('paket');
                }

                $data = array(
                        'id_paket' => $id_paket,
                        'nama_paket' => $this->input->post('nama_paket'),
                        'id_mobil' => $this->input->post('id_mobil'),
                        'harga' => $this->input->post('harga'),
                        'byk_pertemuan' => $this->input->post('byk_pertemuan'),
                        'deskripsi_paket' => $this->input->post('deskripsi_paket'),
                );
                $this->m_paket->update($data);
                $this->session->set_flashdata('pesan', 'Data berhasil Diganti !!!!');
                redirect('paket');
        }
		$data = array(
                        'title' => '	Paket',
			'sub_title' => 'Edit Paket',
                        'mobil' => $this->m_mobil->get_all_data(),
			'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                        'paket' => $this->m_paket->get_data($id_paket),
                        'isi' => 'admin/paket/v_edit_paket',

                );
		$this->load->view('layout/backend/v_wrapper_backend', $data ,FALSE);

	}

	//Delete one item
	public function delete($id_paket = NULL)
	{
		// hapus gambar
		$paket = $this->m_paket->get_data($id_paket);
		if ($paket->image != "" ) {
			unlink('./assets/images/paket/'.$paket->image);
		}
		// end hapus gambar

		$data = array('id_paket' => $id_paket);
		$this->m_paket->delete($data);
		$this->session->set_flashdata('pesan', 'Data Berhasil dihapus !!!');
		redirect('paket');
	}
}
