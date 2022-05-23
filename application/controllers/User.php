<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->user_login->proteksi_halaman();
                $this->load->model('m_user');

	}
	
	public function index()
	{
		$data = array(
			'title' => 'Admin',
                        'sub_title' => 'Daftar Admin',
                        'user' => $this->m_user->get_data_row(),
			'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
			'isi' => 'admin/user_admin/v_admin_user',
		);
		$this->load->view('layout/backend/v_wrapper_backend', $data ,FALSE);
	}

        public function add()
        {
                $this->form_validation->set_rules('nama_user', 'Username', 'required|min_length[3]',
                array('required'=>'%s Harus Diisi !!!!',
                'min_length'=> '%s Minimal 3 karakter !'
        ));
                $this->form_validation->set_rules('email', 'Email', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));
                $this->form_validation->set_rules('is_active', 'Is Active', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));                
                $this->form_validation->set_rules('password', 'Password', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));
                $this->form_validation->set_rules('level_user', 'Level user', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));

        if($this->form_validation->run() == TRUE)
        {
                $config['upload_path'] = './assets/images/user/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|PNG|ico';
                $config['max_size']     = '5000';
                $config['file_name'] = 'img' . time();
                $this->upload->initialize($config);

                $field_name = "image";
                if (!$this->upload->do_upload($field_name)) {
                        $data = array(
                                'title' => 'Admin',
                                'sub_title' => 'Daftar Admin',
                                'error_upload' => $this->upload->display_errors(),
			        'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                                'isi' => 'admin/user_admin/v_tambah_user',
        
                        );
                        $this->load->view('layout/backend/v_wrapper_backend', $data,FALSE);
                }else {
                        $upload_data = array('uploads' => $this->upload->data());
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './assets/images/user/'.$upload_data['uploads']['file_name'];
                        $this->load->library('image_lib', $config);    
                        $data = array(
                                'nama_user' => $this->input->post('nama_user'),
                                'email' => $this->input->post('email'),
                                'password' => $this->input->post('password'),
                                'is_active' => $this->input->post('is_active'),
                                'level_user' => $this->input->post('level_user'),
                                'date_created' => time(),
                                'image' => $upload_data['uploads']['file_name'],
                        );
                        $this->m_user->add($data);
                        $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan !!!!');
                        redirect('user');                
                }
        }

                $data = array(
			'title' => 'Admin',
                        'sub_title' => 'Add Admin',
                        'user' => $this->m_user->get_data_row(),
			'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
			'isi' => 'admin/user_admin/v_tambah_user',
		);
		$this->load->view('layout/backend/v_wrapper_backend', $data ,FALSE);
        }

        // update data
        public function update($id_user = NULL)
        {       
                $this->form_validation->set_rules('nama_user', 'Nama User', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));

        if($this->form_validation->run() == TRUE)
        {
                $config['upload_path'] = './assets/images/user/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|PNG|ico';
                $config['max_size']     = '5000';
                $config['file_name'] = 'img' . time();
                $this->upload->initialize($config);

                $field_name = "image";
                if (!$this->upload->do_upload($field_name)) {
                        $data = array(
                                'id_user' => $id_user,
                                'nama_user' => $this->input->post('nama_user'),
                                'is_active' => $this->input->post('is_active'),
                                'level_user' => $this->input->post('level_user'),
          
                        );
                        $this->m_user->update($data);
                        $this->session->set_flashdata('pesan', 'Data berhasil Diganti !!!!');
                        redirect('user');
                }else{
                        // Timpa gambar lama jadi baru
                        $user = $this->m_user->get_data($id_user);
                        if ($user->image != "" ) {
                                unlink('./assets/images/user/'.$user->image);
                        }
                        $upload_data = array('uploads' => $this->upload->data());
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './assets/images/user/'.$upload_data['uploads']['file_name'];
                        $this->load->library('image_lib', $config);    
                        $data = array(
                                'id_user' => $id_user,
                                'nama_user' => $this->input->post('nama_user'),
                                'is_active' => $this->input->post('is_active'),
                                'level_user' => $this->input->post('level_user'),
                                'image' => $upload_data['uploads']['file_name'],
                                );
                        $this->m_user->update($data);
                        $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan !!!!');
                        redirect('user');
                        
                }

                $data = array(
                        'title' => 'Admin',
                        'sub_title' => 'Edit Admin',
			'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                        'error_upload' => $this->upload->display_errors(),
                        'isi' => 'admin/user_admin/v_tambah_user',

                );
                $this->load->view('layout/backend/v_wrapper_backend', $data,FALSE);
        }
                $data=array( 
                        'title' => 'Admin',
                        'sub_title' => 'Edit Admin',
                        'user' => $this->m_user->get_data($id_user),
			'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                        'isi' => 'admin/user_admin/v_edit_admin_user',
                );
                $this->load->view('layout/backend/v_wrapper_backend', $data ,FALSE);
        }

          //Delete one item
          public function delete($id_user = NULL)
          {
                  // hapus gambar
                  $user = $this->m_user->get_data($id_user);
                  if ($user->image != "" ) {
                          unlink('./assets/images/user/'.$user->image);
                  }
                  // end hapus gambar
  
                  $data = array('id_user' => $id_user);
                  $this->m_user->delete($data);
                  $this->session->set_flashdata('pesan', 'Data Berhasil dihapus !!!');
                  redirect('user');
          }


        // ganti password
        public function ganti_password($id_user = NULL)
        {        
                $this->form_validation->set_rules('password', 'Password', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));
                $this->form_validation->set_rules('ulangi_password', 'Password', 'required|matches[password]',
                array('required'=>'%s Harus Diisi !!!!',
                        'matches'=>'%s Tidak Sama !!!'
        ));
                if($this->form_validation->run() == FALSE)
                { 
                        $data = array(
                                'title' => 'Admin',
                                'sub_title' => 'Ganti Password',
                                'user' => $this->m_user->get_data($id_user),
                                'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                                'isi' => 'admin/user_admin/v_admin_ganti_password',
                        );
                        $this->load->view('layout/backend/v_wrapper_backend', $data ,FALSE);
                } else {
                        $data = array(

				'id_user' => $id_user,
				'password' => $this->input->post('password'),
				
	 
			);
			$this->m_user->update($data);
			
			$this->session->set_flashdata('pesan', 'Password berhasil diganti!');
			redirect('user');
                }     
                $data = array(
                        'title' => 'Admin',
                        'sub_title' => 'Daftar Admin',
                        'user' => $this->m_user->get_data($id_user),
                        'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                        'isi' => 'admin/user_admin/v_admin_ganti_password',
                );
                $this->load->view('layout/backend/v_wrapper_backend', $data ,FALSE);        
        }

}
