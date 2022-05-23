<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mobil extends CI_Model { 


        public function get_all_data()
        {
                $this->db->select('*');
                $this->db->from('tbl_mobil');
                $this->db->order_by('id_mobil','desc');

                return $this->db->get()->result();
        }

        public function get_data($id_mobil)
        {
                $this->db->select('*');
                $this->db->from('tbl_mobil');
                $this->db->where('id_mobil', $id_mobil);
                return $this->db->get()->row();
        }

        //  tambah data
        public function add($data)
        {
                $this->db->insert('tbl_mobil', $data);

        }

        // update data
        public function update($data)
        {
                $this->db->where('id_mobil', $data['id_mobil']);
                $this->db->update('tbl_mobil', $data);
        }
        

        // hapus data
        public function delete($data)
        {
                $this->db->where('id_mobil', $data['id_mobil']);
                $this->db->delete('tbl_mobil', $data);
        }
}