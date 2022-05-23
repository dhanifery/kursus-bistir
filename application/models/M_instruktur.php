<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_instruktur extends CI_Model {

        public function get_all_data()
        {
                $this->db->select('*');
                $this->db->from('tbl_instruktur');
                $this->db->order_by('id_instruktur', 'desc');
                return $this->db->get()->result();
        }

        public function get_instruktur()
        { 
                $this->db->select('*');
                $this->db->from('tbl_instruktur');      
                $this->db->where('id_user', $this->session->userdata('id_user'));
                $this->db->order_by('id_instruktur', 'desc');
                return $this->db->get()->result();
        }

        public function get_join_data()
        {       
                $this->db->select('*');
                $this->db->from('tbl_instruktur');
                $this->db->join('tbl_user', 'tbl_user.id_user = tbl_instruktur.id_user', 'left');  
                $this->db->order_by('id_instruktur', 'desc');                     
                return $this->db->get()->result();
                
        }

         // tambah data
         public function add($data)
         {
                 $this->db->insert('tbl_instruktur', $data);
         }

         public function get_data($id_instruktur)
         {
                 $this->db->select('*');
                 $this->db->from('tbl_instruktur');
                 $this->db->where('id_instruktur', $id_instruktur);
                 return $this->db->get()->row();
         }

        // update data
        public function update($data)
        {
                $this->db->where('id_instruktur', $data['id_instruktur']);
                $this->db->update('tbl_instruktur', $data);
        }

        // hapus data
        public function delete($data)
        {
                $this->db->where('id_instruktur', $data['id_instruktur']);
                $this->db->delete('tbl_instruktur', $data);
        }
}