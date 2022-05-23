<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {

        public function login_user($email, $password)
        {
                $this->db->select('*');
                $this->db->from('tbl_user');
                $this->db->where(array(
                        'email' => $email,
                        'password' => $password
                ));
                return $this->db->get()->row_array();
        } 

        public function registrasi($data = null)
        {
                $this->db->insert('tbl_user', $data);
        }

        

}

/* End of file ModelName.php */
