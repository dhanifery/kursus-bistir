<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {


        public function get_data($id_user)
        {
                $this->db->select('*');
                $this->db->from('tbl_user');
                $this->db->where('id_user', $id_user);
                return $this->db->get()->row();
        }
        
        public function get_all_data()
        { 
                $this->db->select('*');
                $this->db->from('tbl_user');
                $this->db->order_by('id_user', 'desc');
                return $this->db->get()->result();
        }

        public function cek_data($where = null)
        {
             return $this->db->get_where('tbl_user', $where);
        }

        public function get_data_row()
        {
                $this->db->select('*');
                $this->db->from('tbl_user');
                $this->db->where('level_user = 1');
                $this->db->order_by('id_user', 'desc');
                return $this->db->get()->result();   
        }

        // tambah data
        public function add($data)
        {
                $this->db->insert('tbl_user', $data);
        }

        public function update($data)
        {
                $this->db->where('id_user', $data['id_user']);
                $this->db->update('tbl_user', $data);
        }
        
        // hapus data
        public function delete($data)
        {
                $this->db->where('id_user', $data['id_user']);
                $this->db->delete('tbl_user', $data);
        }
}

/* End of file ModelName.php */
