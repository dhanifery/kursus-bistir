<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_login
{
        protected $ci;

        public function __construct()
        {
        $this->ci =& get_instance();
        $this->ci->load->model('m_auth');
        }

        public function login($email, $password)
        { 
                $cek = $this->ci->m_auth->login_user($email, $password);
                if ($cek){
                        if($cek['level_user'] == 1) {
                                $data =[
                                        'email' => $cek['email'],
                                        'level_user' => $cek['level_user'],
                                        'nama_user' => $cek['nama_user'],
                                        'id_user' => $cek['id_user'],
                                      ];
                                   $this->ci->session->set_userdata($data);
                                // redirect
                                echo "<script>
                                alert('Selamat anda berhasil login');
                                window.location='" .site_url('admin'),"';
                                </script>";
                              }elseif($cek['level_user'] == 2){
                                $data =[
                                        'email' => $cek['email'],
                                        'level_user' => $cek['level_user'],
                                        'nama_user' => $cek['nama_user'],
                                        'id_user' => $cek['id_user'],
                                      ];
                                   $this->ci->session->set_userdata($data);
                                // redirect
                                echo "<script>
                                alert('Selamat anda berhasil login');
                                window.location='" .site_url('peserta'),"';
                                </script>";    
                              }
                              else{
                                $data =[
                                        'email' => $cek['email'],
                                        'level_user' => $cek['level_user'],
                                        'nama_user' => $cek['nama_user'],
                                        'id_user' => $cek['id_user'],
                                      ];
                                   $this->ci->session->set_userdata($data);
                                // redirect
                                echo "<script>
                                alert('Selamat anda berhasil login');
                                window.location='" .site_url('instruktur'),"';
                                </script>";   
                              }
                } else{
                        // jika salah
                        $this->ci->session->set_flashdata('error', 'Username atau Password salah !!!');
                        redirect('auth/login_user');
                        
                      }
        
        }

        public function proteksi_halaman(){
                if ($this->ci->session->userdata('email') == ''){
                        $this->ci->session->set_flashdata('invalid', 'Anda Belum Login');
                        redirect('auth/login_user');
                }
        }

        public function logout()
        {
                $this->ci->session->unset_userdata('id_user' );
                $this->ci->session->unset_userdata('email' );
                $this->ci->session->unset_userdata('nama_user' );
                $this->ci->session->unset_userdata('level_user' );
                $this->ci->session->set_flashdata('pesan', 'Anda Berhasil Logout !!!!');
                redirect('auth/login_user');
        }
}

