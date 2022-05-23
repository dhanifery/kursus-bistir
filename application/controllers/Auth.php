<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

        
        public function __construct()
        {
                parent::__construct();
                $this->load->model('m_auth');
        }
        

        public function login_user()
	{       
                $this->form_validation->set_rules('email', 'Email', 'required',array(
                        'required' => '%s Harus Diisi !!!'
                ));
                $this->form_validation->set_rules('password', 'Password', 'required',array(
                        'required' => '%s Harus Diisi !!!'
                ));

                if ($this->form_validation->run() == TRUE) {
                        $email = $this->input->post('email');
                        $password = $this->input->post('password');
                        $this->user_login->login($email, $password);
                }
                $data=array(
                        'title' => 'Login User',
                );
                $this->load->view('auth/v_login_user', $data ,FALSE);
	}

        public function registrasi()
        {
                $this->form_validation->set_rules('nama_user', 'Username', 'required',
		array('required'=>'%s Harus Diisi !!!!'
	));
                $this->form_validation->set_rules('email', 'Email', 'required|is_unique[tbl_user.email]',
                array('required'=>'%s Harus Diisi !!!!',
                        'is_unique'=>'%s Sudah terdaftar....!'
        ));
                $this->form_validation->set_rules('password', 'Password', 'required',
                array('required'=>'%s Harus Diisi !!!!'
        ));
        
		if($this->form_validation->run() == FALSE)
		{
			$data = array(
                                'title' => 'Register User',
                        );
                        $this->load->view('auth/v_registrasi_user', $data ,FALSE);
		} else {
			$data = array(

				'nama_user' => htmlspecialchars($this->input->post('nama_user')),
                                'email' => htmlspecialchars($this->input->post('email')),
                                'image' => 'default.jpg',
                                'password' => $this->input->post('password'),
                                'level_user' => '2',
                                'is_active' => '1',
                                'date_created' =>time()
				
	 
			);
			$this->m_auth->registrasi($data);
			
			$this->session->set_flashdata('pesan', 'Selamat Register Telah Berhasil, Silahkan Login !!!!');
			redirect('auth/login_user');
		}	

        }

        public function logout_user()
        {
                $this->user_login->logout();
        }

}

/* End of file Controllername.php */

