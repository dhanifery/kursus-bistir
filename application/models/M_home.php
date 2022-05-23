<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_home extends CI_Model {

        public function total_peserta()
        {
                return $this->db->get('tbl_peserta')->num_rows();
                
        }
        public function total_instruktur()
        {
                return $this->db->get('tbl_instruktur')->num_rows();
                
        }
        

}

/* End of file ModelName.php */
