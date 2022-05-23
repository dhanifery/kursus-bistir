<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_peserta extends CI_Model {

        public function get_all_data()
        { 
                $this->db->select('*');
                $this->db->from('tbl_peserta');
                $this->db->order_by('id_peserta', 'desc');
                return $this->db->get()->result(); 
        }

        public function get_peserta()
        { 
                $this->db->select('*');
                $this->db->from('tbl_peserta');      
                $this->db->where('id_user', $this->session->userdata('id_user'));
                $this->db->order_by('id_peserta', 'desc');
                return $this->db->get()->result();
        }
 
        // tambah data
        public function add($data)
        {
                $this->db->insert('tbl_peserta', $data);
        }

        public function get_data($id_peserta)
        {
                $this->db->select('*');
                $this->db->from('tbl_peserta');
                $this->db->where('id_peserta', $id_peserta);
                return $this->db->get()->row();
        }

        

        // update data
        public function update($data)
        {
                $this->db->where('id_peserta', $data['id_peserta']);
                $this->db->update('tbl_peserta', $data);
        }

        // hapus data
        public function delete($data)
        {
                $this->db->where('id_peserta', $data['id_peserta']);
                $this->db->delete('tbl_peserta', $data);
        }

}

/* End of file ModelName.php */
