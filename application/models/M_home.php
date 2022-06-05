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
        public function total_jadwal()
        {
                return $this->db->get('tbl_jadwal')->num_rows();
                
        }
        public function total_daftar_online()
        {
                $query    = "SELECT * FROM tbl_peserta WHERE id_user IS NOT NULL";
                return $this->db->query($query)->num_rows();                
        }
        public function total_daftar_offline()
        {
                $query    = "SELECT * FROM tbl_peserta WHERE id_user IS NULL";
                return $this->db->query($query)->num_rows(); 
                
        }
        public function total_user()
        {
                return $this->db->get('tbl_user')->num_rows();
        }

        public function get_kantor()
        {
                $this->db->select('*');
                $this->db->from('tbl_kantor');
                $this->db->order_by('id_kantor', 'desc');
                return $this->db->get()->result();
                
        }
        public function get_id_kantor($id_kantor)
        {
                $this->db->select('*');
                $this->db->from('tbl_kantor');
                $this->db->where('id_kantor', $id_kantor);  
                $this->db->order_by('id_kantor', 'desc');

                return $this->db->get()->row();          
        }

        public function update_kantor($data)
        {
                $this->db->where('id_kantor', $data['id_kantor']);
                $this->db->update('tbl_kantor', $data);
        }
        
        public function user_online()
        {
                $query    = "SELECT * FROM tbl_user WHERE is_active='1'";
                return $this->db->query($query)->num_rows(); 
                
        }
        public function user_offline()
        {
                $query    = "SELECT * FROM tbl_user WHERE is_active='2'";
                return $this->db->query($query)->num_rows(); 
                
        }

}

/* End of file ModelName.php */
