<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_peserta extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->user_login->proteksi_halaman();
                $this->load->model('m_peserta');
                $this->load->model('m_user');
	}

        // List all your items
        public function index()
        {
                $data=array( 
                        'title' => 'Peserta',
                        'sub_title' => 'List Peserta',
                        'peserta' => $this->m_peserta->get_all_data(),
			'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                        'isi' => 'admin/peserta/v_peserta',
                );
                $this->load->view('layout/backend/v_wrapper_backend', $data ,FALSE);
        }

        // Add a new item
        public function add()
        {        
                $this->form_validation->set_rules('username_peserta', 'Username', 'required|min_length[3]',
                array('required'=>'%s Harus Diisi !!!!',
                'min_length'=> '%s Minimal 3 karakter !'
        ));
                $this->form_validation->set_rules('TTL', 'Tanggal Lahir', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));
                $this->form_validation->set_rules('email_peserta', 'Email', 'required|is_unique[tbl_peserta.email_peserta]',
                array('required'=>'%s Harus Diisi !!!!',
                'is_unique'=>'%s Sudah terdaftar....!'
        ));
                $this->form_validation->set_rules('no_telp', 'No Telp', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));
                $this->form_validation->set_rules('alamat', 'ALamat', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));
                $this->form_validation->set_rules('JK', 'Jenis Kelamin', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));

        if($this->form_validation->run() == TRUE)
        {
                $config['upload_path'] = './assets/images/gambar/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|PNG|ico';
                $config['max_size']     = '5000';
                $config['file_name'] = 'img' . time();
                $this->upload->initialize($config);

                $field_name = "image_peserta";
                if (!$this->upload->do_upload($field_name)) {
                        $data = array(
                                'title' => 'Peserta',
                                'sub_title' => 'Tambah Peserta',
                                'error_upload' => $this->upload->display_errors(),
			        'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                                'isi' => 'admin/peserta/v_tambah_peserta',
        
                        );
                        $this->load->view('layout/backend/v_wrapper_backend', $data,FALSE);
                }else {
                        $upload_data = array('uploads' => $this->upload->data());
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './assets/images/gambar/'.$upload_data['uploads']['file_name'];
                        $this->load->library('image_lib', $config);    
                        $data = array(
                                'username_peserta' => $this->input->post('username_peserta'),
                                'email_peserta' => $this->input->post('email_peserta'),
                                'TTL' => $this->input->post('TTL'),
                                'alamat' => $this->input->post('alamat'),
                                'no_telp' => $this->input->post('no_telp'),
                                'JK' => $this->input->post('JK'),
                                'image_peserta' => $upload_data['uploads']['file_name'],
                        );
                        $this->m_peserta->add($data);
                        $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan !!!!');
                        redirect('crud_peserta');                
                }
        }
                $data=array( 
                        'title' => 'Peserta',
                        'sub_title' => 'Tambah Peserta',
                        'peserta' => $this->m_peserta->get_all_data(),
			'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                        'isi' => 'admin/peserta/v_tambah_peserta',
                );
                $this->load->view('layout/backend/v_wrapper_backend', $data ,FALSE);
        }

        //Update one item
        public function update($id_peserta = NULL)
        {       
                $this->form_validation->set_rules('TTL', 'Tanggal Lahir', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));
                $this->form_validation->set_rules('no_telp', 'No Telp', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));
                $this->form_validation->set_rules('alamat', 'ALamat', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));
                $this->form_validation->set_rules('JK', 'Jenis Kelamin', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));

        if($this->form_validation->run() == TRUE)
        {
                $config['upload_path'] = './assets/images/gambar/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|PNG|ico';
                $config['max_size']     = '5000';
                $config['file_name'] = 'img' . time();
                $this->upload->initialize($config);

                $field_name = "image_peserta";
                if (!$this->upload->do_upload($field_name)) {
                        $data = array(
                                'title' => 'Peserta',
                                'sub_title' => 'Tambah Peserta',
                                'error_upload' => $this->upload->display_errors(),
			        'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                                'isi' => 'admin/peserta/v_edit_peserta',
        
                        );
                        $this->load->view('layout/backend/v_wrapper_backend', $data,FALSE);
                }else{
                        // Timpa gambar lama jadi baru
                        $peserta = $this->m_peserta->get_data($id_peserta);
                        if ($peserta->image_peserta != "" ) {
                                unlink('./assets/images/gambar/'.$peserta->image_peserta);
                        }
                        // end timpa gambar lama jadi baru
                        $upload_data = array('uploads' => $this->upload->data());
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './assets/images/gambar/'.$upload_data['uploads']['file_name'];
                        $this->load->library('image_lib', $config);

                        $data = array(
                                'id_peserta' => $id_peserta,
                                'username_peserta' => $this->input->post('username_peserta'),
                                'TTL' => $this->input->post('TTL'),
                                'alamat' => $this->input->post('alamat'),
                                'no_telp' => $this->input->post('no_telp'),
                                'JK' => $this->input->post('JK'),
                                'image_peserta' => $upload_data['uploads']['file_name'],
                        );
                        $this->m_peserta->update($data);
                        $this->session->set_flashdata('pesan', 'Data berhasil Diganti !!!!');
                        redirect('crud_peserta');
                }

                $data = array(
                        'id_peserta' => $id_peserta,
                        'username_peserta' => $this->input->post('username_peserta'),
                        'TTL' => $this->input->post('TTL'),
                        'alamat' => $this->input->post('alamat'),
                        'no_telp' => $this->input->post('no_telp'),
                        'JK' => $this->input->post('JK'),
                );
                $this->m_peserta->update($data);
                $this->session->set_flashdata('pesan', 'Data berhasil Diganti !!!!');
                redirect('crud_peserta');
        }
                $data=array( 
                        'title' => 'Peserta',
                        'sub_title' => 'Edit Peserta',
                        'peserta' => $this->m_peserta->get_data($id_peserta),
			'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                        'isi' => 'admin/peserta/v_edit_peserta',
                );
                $this->load->view('layout/backend/v_wrapper_backend', $data ,FALSE);
        }



        //Delete one item
        public function delete($id_peserta = NULL)
        {
                // hapus gambar
                $peserta = $this->m_peserta->get_data($id_peserta);
                if ($peserta->image_peserta != "" ) {
                        unlink('./assets/images/gambar/'.$peserta->image_peserta);
                }
                // end hapus gambar

                $data = array('id_peserta' => $id_peserta);
                $this->m_peserta->delete($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil dihapus !!!');
                redirect('crud_peserta');
        }
}

/* End of file Controllername.php */

