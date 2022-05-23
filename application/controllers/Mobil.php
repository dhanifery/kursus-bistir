<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mobil extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->user_login->proteksi_halaman();
		$this->load->model(['m_user','m_mobil']);

	}
	
	public function index()
	{
		$data = array(
			'title' => 'Mobil',
			'sub_title' => 'Daftar Mobil',
			'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                        'mobil' => $this->m_mobil->get_all_data(),
			'isi' => 'admin/mobil/v_mobil',
		);
		$this->load->view('layout/backend/v_wrapper_backend', $data ,FALSE);
	}

        public function add()
        {        
                $this->form_validation->set_rules('nama_mobil', 'Nama Mobil', 'required|min_length[3]',
                array('required'=>'%s Harus Diisi !!!!',
                'min_length'=> '%s Minimal 3 karakter !'
        ));
                $this->form_validation->set_rules('jenis_mobil', 'Jenis Mobil', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));
                $this->form_validation->set_rules('no_mesin', 'No Mesin', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));
                $this->form_validation->set_rules('no_plat', 'No Plat', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));

        if($this->form_validation->run() == TRUE)
        {       
                $config['upload_path'] = './assets/images/mobil/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|PNG|ico';
                $config['max_size']     = '5000';
                $config['file_name'] = 'img' . time();
                $this->upload->initialize($config);

                $field_name = "image_mobil"; 

                if (!$this->upload->do_upload($field_name)) {
                        $data = array(
                                'title' => 'Mobil',
                                'sub_title' => 'Tambah Mobil',
                                'error_upload' => $this->upload->display_errors(),
                                'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                                'isi' => 'admin/mobil/v_tambah_mobil',
        
                        );
                        $this->load->view('layout/backend/v_wrapper_backend', $data,FALSE);
                }else {
                        $upload_data = array('uploads' => $this->upload->data());
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './assets/images/mobil/'.$upload_data['uploads']['file_name'];
                        $this->load->library('image_lib', $config);    
                        $data = array(
                                'nama_mobil' => $this->input->post('nama_mobil'),
                                'jenis_mobil' => $this->input->post('jenis_mobil'),
                                'no_mesin' => $this->input->post('no_mesin'),
                                'no_plat' => $this->input->post('no_plat'),
                                'deskripsi_mobil' => $this->input->post('deskripsi_mobil'),
                                'image_mobil' => $upload_data['uploads']['file_name'],
                        );
                        $this->m_mobil->add($data);
                        $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan !!!!');
                        redirect('mobil');                
                }
        }
                $data = array(
			'title' => 'Mobil',
			'sub_title' => 'Tambah Mobil',
			'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                        'mobil' => $this->m_mobil->get_all_data(),
			'isi' => 'admin/mobil/v_tambah_mobil',
		);
		$this->load->view('layout/backend/v_wrapper_backend', $data ,FALSE);
        }


        // update data
	public function update($id_mobil = NULL)
	{
                $this->form_validation->set_rules('nama_mobil', 'Nama mobil', 'required|min_length[3]',
                array('required'=>'%s Harus Diisi !!!!',
                'min_length'=> '%s Minimal 3 karakter !'
        ));
                $this->form_validation->set_rules('jenis_mobil', 'Jenis Mobil', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));
                $this->form_validation->set_rules('no_mesin', 'No Mesin', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));
                $this->form_validation->set_rules('no_plat', 'No Plat', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));
        

        if($this->form_validation->run() == TRUE)
        {
                $config['upload_path'] = './assets/images/mobil/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|PNG|ico';
                $config['max_size']     = '5000';
                $config['file_name'] = 'img' . time();
                $this->upload->initialize($config);

                $field_name = "image_mobil";
                if (!$this->upload->do_upload($field_name)) {
                        $data = array(
                                'title' => 'Mobil',
                                'sub_title' => 'Edit Mobil',
                                'mobil' => $this->m_mobil->get_all_data(),
                                'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                                'isi' => 'admin/mobil/v_tambah_mobil',
        
                        );
                        $this->load->view('layout/backend/v_wrapper_backend', $data,FALSE);
                }else{
                        // Timpa gambar lama jadi baru
                        $mobil = $this->m_mobil->get_data($id_mobil);
                        if ($mobil->image_mobil != "" ) {
                                unlink('./assets/images/mobil/'.$mobil->image_mobil);
                        }
                        // end timpa gambar lama jadi baru
                        $upload_data = array('uploads' => $this->upload->data());
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './assets/images/mobil/'.$upload_data['uploads']['file_name'];
                        $this->load->library('image_lib', $config);

                        $data = array(
                                'id_mobil' => $id_mobil,
                                'nama_mobil' => $this->input->post('nama_mobil'),
                                'jenis_mobil' => $this->input->post('jenis_mobil'),
                                'no_mesin' => $this->input->post('no_mesin'),
                                'no_plat' => $this->input->post('no_plat'),
                                'deskripsi_mobil' => $this->input->post('deskripsi_mobil'),
                                'image_mobil' => $upload_data['uploads']['file_name'],
                        );
                        $this->m_mobil->update($data);
                        $this->session->set_flashdata('pesan', 'Data berhasil Diganti !!!!');
                        redirect('mobil');
                }

                $data = array(
                        'id_mobil' => $id_mobil,
                        'nama_mobil' => $this->input->post('nama_mobil'),
                        'jenis_mobil' => $this->input->post('jenis_mobil'),
                        'no_mesin' => $this->input->post('no_mesin'),
                        'no_plat' => $this->input->post('no_plat'),
                        'deskripsi_mobil' => $this->input->post('deskripsi_mobil'),
                );
                $this->m_mobil->update($data);
                $this->session->set_flashdata('pesan', 'Data berhasil Diganti !!!!');
                redirect('mobil');
        }
		$data = array(
                        'title' => '	Mobil',
			'sub_title' => 'Edit Mobil',
                        'mobil' => $this->m_mobil->get_all_data(),
			'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                        'mobil' => $this->m_mobil->get_data($id_mobil),
                        'isi' => 'admin/mobil/v_edit_mobil',

                );
		$this->load->view('layout/backend/v_wrapper_backend', $data ,FALSE);

	}

        //Delete one item
        public function delete($id_mobil = NULL)
        {

                $data = array('id_mobil' => $id_mobil);
                $this->m_mobil->delete($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil dihapus !!!');
                redirect('mobil');
        }
}
