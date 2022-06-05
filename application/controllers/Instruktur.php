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
	public function my_profil()
	{
		$data = array(
			'title' => 'B I S T I R | My Profil',
			'sub_heading' => 'Instruktur',
			'user' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
			'isi' => 'instruktur/v_profil',
		);
		$this->load->view('layout/frontend/v_wrapper_frontend', $data ,FALSE);
	}

	public function update_profil($id_user = NULL)
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
          
                        );
                        $this->m_user->update($data);
                        $this->session->set_flashdata('pesan', 'Profil berhasil diedit !!!!');
                        redirect('instruktur/my_profil');
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
                                'image' => $upload_data['uploads']['file_name'],
                                );
                        $this->m_user->update($data);
                        $this->session->set_flashdata('pesan', 'Profil berhasil diedit !!!!');
                        redirect('instruktur/my_profil');
                        
                }

                $data = array(
			'title' => 'B I S T I R | Edit My Profil',
			'sub_heading' => 'Instruktur',
			'user' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                        'error_upload' => $this->upload->display_errors(),
                        'isi' => 'instruktur/v_edit_profil',

                );
		$this->load->view('layout/frontend/v_wrapper_frontend', $data ,FALSE);
        }
		$data = array(
			'title' => 'B I S T I R | Edit My Profil',
			'sub_heading' => 'Instruktur',
			'user' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
			'isi' => 'instruktur/v_edit_profil',
		);
		$this->load->view('layout/frontend/v_wrapper_frontend', $data ,FALSE);
	}
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
				'title' => 'B I S T I R | Ganti Password',
				'sub_heading' => 'instruktur',
				'user' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
				'isi' => 'instruktur/v_ganti_password',
			);
			$this->load->view('layout/frontend/v_wrapper_frontend', $data ,FALSE);
		} else {
			$data = array(

				'id_user' => $id_user,
				'password' => $this->input->post('password'),
				
	 
			);
			$this->m_user->update($data);
			
			$this->session->set_flashdata('pesan', 'Password berhasil diganti!');
			redirect('instruktur/my_profil');
		}
		$data = array(
			'title' => 'B I S T I R | Ganti Password',
			'sub_heading' => 'instruktur',
			'user' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
			'isi' => 'instruktur/v_ganti_password',
		);
		$this->load->view('layout/frontend/v_wrapper_frontend', $data ,FALSE);
	}
}
