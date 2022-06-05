<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Crud_instruktur extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->user_login->proteksi_halaman();
                $this->load->model('m_instruktur');
                $this->load->model('m_user');
	}

        // List all your items
        public function index()
        {
                $data=array( 
                        'title' => 'Instruktur',
                        'sub_title' => 'List Instruktur',
                        'instruktur' => $this->m_instruktur->get_all_data(),
			'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                        'isi' => 'admin/instruktur/v_instruktur',
                );
                $this->load->view('layout/backend/v_wrapper_backend', $data ,FALSE);
        }

         // Add a new item
         public function add()
         {                         
                $this->form_validation->set_rules('username_instr', 'Username', 'required|min_length[3]',
                array('required'=>'%s Harus Diisi !!!!',
                'min_length'=> '%s Minimal 3 karakter !'
         ));
                 $this->form_validation->set_rules('TTL', 'Tanggal Lahir', 'required',
                 array('required'=>'%s Harus Diisi !!!!'
         ));
                 $this->form_validation->set_rules('email_instr', 'Email', 'required|is_unique[tbl_instruktur.email_instr]',
                 array('required'=>'%s Harus Diisi !!!!',
                'is_unique'=>'%s Sudah terdaftar....!'
         ));
                 $this->form_validation->set_rules('no_telp', 'No Telp', 'required',
                 array('required'=>'%s Harus Diisi !!!!'
         ));
                 $this->form_validation->set_rules('JK', 'Jenis Kelamin', 'required',
                 array('required'=>'%s Harus Diisi !!!!'
         ));
                $this->form_validation->set_rules('deskripsi_instr', 'Deskripsi', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));

 
         if($this->form_validation->run() == TRUE)
         {
                 $config['upload_path'] = './assets/images/gambar/';
                 $config['allowed_types'] = 'gif|jpg|png|jpeg|PNG|ico';
                 $config['max_size']     = '5000';
                 $config['file_name'] = 'img' . time();
                 $this->upload->initialize($config);
 
                 $field_name = "image_instr";
                 if (!$this->upload->do_upload($field_name)) {
                         $data = array(
                                 'title' => 'Instruktur',
                                 'sub_title' => 'Tambah Instruktur',
        			'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                                 'error_upload' => $this->upload->display_errors(),
                                 'isi' => 'admin/instruktur/v_tambah_instruktur',
         
                         );
                         $this->load->view('layout/backend/v_wrapper_backend', $data,FALSE);
                 }else {
                         $upload_data = array('uploads' => $this->upload->data());
                         $config['image_library'] = 'gd2';
                         $config['source_image'] = './assets/images/gambar/'.$upload_data['uploads']['file_name'];
                         $this->load->library('image_lib', $config);    
                         $data = array(
                                 'username_instr' => $this->input->post('username_instr'),
                                 'email_instr' => $this->input->post('email_instr'),
                                 'TTL' => $this->input->post('TTL'),
                                 'no_telp' => $this->input->post('no_telp'),
                                 'deskripsi_instr' => $this->input->post('deskripsi_instr'),
                                 'honor' => 'Rp.'.number_format(50000,0),
                                 'JK' => $this->input->post('JK'),
                                 'image_instr' => $upload_data['uploads']['file_name'],
                         );
                         $this->m_instruktur->add($data);
                         $this->session->set_flashdata('pesan', 'Data berhasil ditambahkan !!!!');
                         redirect('crud_instruktur');                
                 }
         }
                 $data=array( 
                         'title' => 'Instruktur',
                         'sub_title' => 'Tambah Instruktur',
                         'instruktur' => $this->m_instruktur->get_all_data(),
        		 'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                         'isi' => 'admin/instruktur/v_tambah_instruktur',
                 );
                 $this->load->view('layout/backend/v_wrapper_backend', $data ,FALSE);
         }


         //Update one item
        public function update($id_instruktur = NULL)
        {       
                $this->form_validation->set_rules('username_instr', 'Username', 'required|min_length[3]',
                array('required'=>'%s Harus Diisi !!!!',
                'min_length'=> '%s Minimal 3 karakter !'
         ));
                 $this->form_validation->set_rules('TTL', 'Tanggal Lahir', 'required',
                 array('required'=>'%s Harus Diisi !!!!'
         ));
                 $this->form_validation->set_rules('no_telp', 'No Telp', 'required',
                 array('required'=>'%s Harus Diisi !!!!'
         ));
                $this->form_validation->set_rules('honor', 'Honor', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));
                 $this->form_validation->set_rules('JK', 'Jenis Kelamin', 'required',
                 array('required'=>'%s Harus Diisi !!!!'
         ));
                $this->form_validation->set_rules('deskripsi_instr', 'Deskripsi', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));

        if($this->form_validation->run() == TRUE)
        {
                $config['upload_path'] = './assets/images/gambar/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|PNG|ico';
                $config['max_size']     = '5000';
                $config['file_name'] = 'img' . time();
                $this->upload->initialize($config);

                $field_name = "image_instr";
                if (!$this->upload->do_upload($field_name)) {
                        $data = array(
                                'title' => 'Instruktur',
                                'sub_title' => 'Tambah Instruktur',
                                'error_upload' => $this->upload->display_errors(),
        			'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                                'isi' => 'admin/instruktur/v_edit_instruktur',
        
                        );
                        $this->load->view('layout/backend/v_wrapper_backend', $data,FALSE);
                }else{
                        // Timpa gambar lama jadi baru
                        $instruktur = $this->m_instruktur->get_data($id_instruktur);
                        if ($instruktur->image_instr != "" ) {
                                unlink('./assets/images/gambar/'.$instruktur->image_instr);
                        }
                        // end timpa gambar lama jadi baru
                        $upload_data = array('uploads' => $this->upload->data());
                        $config['image_library'] = 'gd2';
                        $config['source_image'] = './assets/images/gambar/'.$upload_data['uploads']['file_name'];
                        $this->load->library('image_lib', $config);

                        $data = array(
                                'id_instruktur' => $id_instruktur,
                                'username_instr' => $this->input->post('username_instr'),
                                'email_instr' => $this->input->post('email_instr'),
                                'TTL' => $this->input->post('TTL'),
                                'no_telp' => $this->input->post('no_telp'),
                                'deskripsi_instr' => $this->input->post('deskripsi_instr'),
                                'honor' => $this->input->post('honor'),
                                'JK' => $this->input->post('JK'),
                                'image_instr' => $upload_data['uploads']['file_name'],
                        );
                        $this->m_instruktur->update($data);
                        $this->session->set_flashdata('pesan', 'Data berhasil Diganti !!!!');
                        redirect('crud_instruktur');
                }

                $data = array(
                        'id_instruktur' => $id_instruktur,
                        'username_instr' => $this->input->post('username_instr'),
                        'email_instr' => $this->input->post('email_instr'),
                        'TTL' => $this->input->post('TTL'),
                        'deskripsi_instr' => $this->input->post('deskripsi_instr'),
                        'honor' => $this->input->post('honor'),
                        'no_telp' => $this->input->post('no_telp'),
                        'JK' => $this->input->post('JK'),
                );
                $this->m_instruktur->update($data);
                $this->session->set_flashdata('pesan', 'Data berhasil Diganti !!!!');
                redirect('crud_instruktur');
        }
                $data=array( 
                        'title' => 'instruktur',
                        'sub_title' => 'Edit instruktur',
                        'instruktur' => $this->m_instruktur->get_data($id_instruktur),
			'admin' => $this->m_user->cek_data(['email' => $this->session->userdata('email')])->row_array(),
                        'isi' => 'admin/instruktur/v_edit_instruktur',
                );
                $this->load->view('layout/backend/v_wrapper_backend', $data ,FALSE);
        }


        //Delete one item
        public function delete($id_instruktur = NULL)
        {
                // hapus gambar
                $instruktur = $this->m_instruktur->get_data($id_instruktur);
                if ($instruktur->image_instr != "" ) {
                        unlink('./assets/images/gambar/'.$instruktur->image_instr);
                }
                // end hapus gambar

                $data = array('id_instruktur' => $id_instruktur);
                $this->m_instruktur->delete($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil dihapus !!!');
                redirect('crud_instruktur');
        }

}