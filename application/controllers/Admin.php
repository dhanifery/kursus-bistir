<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	
	public function __construct()
	{
		parent::__construct();
		$this->user_login->proteksi_halaman();
		$this->load->model(['m_user','m_jadwal','m_home']); 

	}
	
	public function index()
	{
		$data = array(
			'title' => 'Dashboard',
			'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
			'active' => $this->m_jadwal->get_data_active(),
			'total_peserta' => $this->m_home->total_peserta(),
			'total_instruktur' => $this->m_home->total_instruktur(),
			'total_jadwal' => $this->m_home->total_jadwal(),
			'isi' => 'admin/v_admin',
		);
		$this->load->view('layout/backend/v_wrapper_backend', $data ,FALSE);
	}

	public function myprofil($id_user = NULL)
	{
		$data = array(
			'title' => 'My Profil',
			'sub_title' => 'Profil',
                        'user' => $this->m_user->get_data($id_user),
			'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
			'isi' => 'admin/v_myprofil',
		);
		$this->load->view('layout/backend/v_wrapper_backend', $data ,FALSE);
	}



	// edit profil
	public function edit_profil($id_user = NULL)
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
                        redirect('admin');
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
                        redirect('admin');
                        
                }

                $data = array(
                        'title' => 'My Profil',
                        'sub_title' => 'Edit Profil',
			'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                        'error_upload' => $this->upload->display_errors(),
                        'isi' => 'admin/v_myprofil',

                );
                $this->load->view('layout/backend/v_wrapper_backend', $data,FALSE);
        }
                $data=array( 
                        'title' => 'My Profil',
                        'sub_title' => 'Edit Profil',
                        'user' => $this->m_user->get_data($id_user),
			'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                        'isi' => 'admin/v_edit_profil',
                );
                $this->load->view('layout/backend/v_wrapper_backend', $data ,FALSE);
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
				  'title' => 'My Profil',
				  'sub_title' => 'Ganti Password',
				  'user' => $this->m_user->get_data($id_user),
				  'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
				  'isi' => 'admin/v_profil_ganti_password',
			  );
			  $this->load->view('layout/backend/v_wrapper_backend', $data ,FALSE);
		  } else {
			  $data = array(
  
				  'id_user' => $id_user,
				  'password' => $this->input->post('password'),
				  
	   
			  );
			  $this->m_user->update($data);
			  
			  $this->session->set_flashdata('pesan', 'Password berhasil diganti!');
			  redirect('admin');
		  }     
		  $data = array(
			  'title' => 'My Profil',
			  'sub_title' => 'Profil',
			  'user' => $this->m_user->get_data($id_user),
			  'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
			  'isi' => 'admin/v_profil_ganti_password',
		  );
		  $this->load->view('layout/backend/v_wrapper_backend', $data ,FALSE);        
	  }

	

	public function kantor()
	{
		$data = array(
			'title' => 'B I S T I R',
			'sub_title' => 'Kantor',
			'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
			'kantor' => $this->m_home->get_kantor(),
			'isi' => 'admin/kantor/v_kantor',
		);
		$this->load->view('layout/backend/v_wrapper_backend', $data ,FALSE);
	}

	public function edit_kantor($id_kantor = NULL)
	{
		$this->form_validation->set_rules('alamat', 'Alamat', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));
		$this->form_validation->set_rules('no_telp', 'No Telp', 'required',
		array('required'=>'%s Harus Diisi !!!!'
	));
		$this->form_validation->set_rules('deskripsi', 'Deskripsi Kantor', 'required',
		array('required'=>'%s Harus Diisi !!!!'
	));

        if($this->form_validation->run() == TRUE)
        {
                $config['upload_path'] = './assets/images/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|PNG|ico';
                $config['max_size']     = '5000';
                $config['file_name'] = 'img' . time();
                $this->upload->initialize($config);

                $field_name = "image";
                if (!$this->upload->do_upload($field_name)) {	
                        $data = array(
                                'id_kantor' => $id_kantor,
                                'alamat' => $this->input->post('alamat'),
                                'no_telp' => $this->input->post('no_telp'),
                                'deskripsi' => $this->input->post('deskripsi'),
          
                        );
                        $this->m_home->update_kantor($data);
                        $this->session->set_flashdata('pesan', 'Profil Kantor berhasil diedit !!!!');
                        redirect('admin/kantor');
                }else{
                        // Timpa gambar lama jadi baru
                        $kantor = $this->m_home->get_id_kantor($id_kantor);
                        if ($kantor->image != "" ) {
                                unlink('./assets/images/'.$kantor->image);
                        }
                        $upload_data = array('uploads' => $this->upload->data());
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './assets/images/'.$upload_data['uploads']['file_name'];
                        $this->load->library('image_lib', $config);    
                        $data = array(
                                'id_kantor' => $id_kantor,
				'alamat' => $this->input->post('alamat'),
                                'no_telp' => $this->input->post('no_telp'),
                                'deskripsi' => $this->input->post('deskripsi'),
                                'image' => $upload_data['uploads']['file_name'],
                                );
                        $this->m_home->update_kantor($data);
                        $this->session->set_flashdata('pesan', 'Profil Kantor berhasil diedit !!!!');
                        redirect('admin/kantor');
                        
                }

                $data = array(
			'title' => 'B I S T I R',
			'sub_title' => 'Kantor',
			'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                        'error_upload' => $this->upload->display_errors(),
			'isi' => 'admin/kantor/v_edit_kantor',

                );
                $this->load->view('layout/backend/v_wrapper_backend', $data,FALSE);
        }
		$data = array(
			'title' => 'B I S T I R',
			'sub_title' => 'Kantor',
			'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
			'kantor' => $this->m_home->get_id_kantor($id_kantor),
			'isi' => 'admin/kantor/v_edit_kantor',
		);
		$this->load->view('layout/backend/v_wrapper_backend', $data ,FALSE);
	}
}
