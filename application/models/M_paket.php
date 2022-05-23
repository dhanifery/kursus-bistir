<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_paket extends CI_Model {


        public function get_all_data()
        {
                $this->db->select('*');
                $this->db->from('tbl_paket');
                $this->db->join('tbl_mobil', 'tbl_mobil.id_mobil = tbl_paket.id_mobil', 'left');              
                $this->db->order_by('tbl_paket.id_mobil','desc');

                return $this->db->get()->result();
        }

        public function get_data($id_paket)
        {
                $this->db->select('*');
                $this->db->from('tbl_paket');
                $this->db->join('tbl_mobil', 'tbl_mobil.id_mobil = tbl_paket.id_mobil', 'left');              
                $this->db->where('id_paket', $id_paket);
                return $this->db->get()->row();
        }
        //  tambah data
        public function add($data)
        {
                $this->db->insert('tbl_paket', $data);

        }

        // update data
        public function update($data)
        {
                $this->db->where('id_paket', $data['id_paket']);
                $this->db->update('tbl_paket', $data);
        }
        

        // hapus data
        public function delete($data)
        {
                $this->db->where('id_paket', $data['id_paket']);
                $this->db->delete('tbl_paket', $data);
        }
}