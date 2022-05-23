<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jadwal extends CI_Model {

        public function simpan_jadwal($data)
        {
                $this->db->insert('tbl_jadwal',$data);
        }

        public function get_jadwal_peserta()
        { 
                $this->db->select('*');
                $this->db->from('tbl_jadwal');
                $this->db->join('tbl_peserta', 'tbl_peserta.id_peserta = tbl_jadwal.id_peserta', 'left');              
                $this->db->join('tbl_user', 'tbl_user.id_user = tbl_jadwal.id_user_peserta', 'left');              
                $this->db->join('tbl_instruktur', 'tbl_instruktur.id_instruktur = tbl_jadwal.id_instruktur', 'left');              
                $this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_jadwal.id_paket', 'left');   
                $this->db->where('id_user_peserta', $this->session->userdata('id_user'));
                $this->db->where('status_jadwal = 0 ');
                $this->db->where('status_bayar = 0');
                $this->db->order_by('id_jadwal', 'desc'); 
                return $this->db->get()->result();
        }

        public function get_jadwal_peserta_bayar()
        { 
                $this->db->select('*');
                $this->db->from('tbl_jadwal');
                $this->db->join('tbl_peserta', 'tbl_peserta.id_peserta = tbl_jadwal.id_peserta', 'left');              
                $this->db->join('tbl_user', 'tbl_user.id_user = tbl_jadwal.id_user_peserta', 'left');              
                $this->db->join('tbl_instruktur', 'tbl_instruktur.id_instruktur = tbl_jadwal.id_instruktur', 'left');              
                $this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_jadwal.id_paket', 'left');   
                $this->db->where('id_user_peserta', $this->session->userdata('id_user'));
                $this->db->where('status_jadwal = 0 ');
                $this->db->where('status_bayar = 1');
                $this->db->order_by('id_jadwal', 'desc'); 
                return $this->db->get()->result();
        }

        public function get_jadwal_peserta_pending()
        { 
                $this->db->select('*');
                $this->db->from('tbl_jadwal');
                $this->db->join('tbl_peserta', 'tbl_peserta.id_peserta = tbl_jadwal.id_peserta', 'left');              
                $this->db->join('tbl_user', 'tbl_user.id_user = tbl_jadwal.id_user_peserta', 'left');              
                $this->db->join('tbl_instruktur', 'tbl_instruktur.id_instruktur = tbl_jadwal.id_instruktur', 'left');              
                $this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_jadwal.id_paket', 'left');   
                $this->db->where('id_user_peserta', $this->session->userdata('id_user'));
                $this->db->where('status_jadwal = 1 ');
                $this->db->where('status_bayar = 1');
                $this->db->order_by('id_jadwal', 'desc'); 
                return $this->db->get()->result();
        }


        public function get_jadwal_peserta_aktif()
        { 
                $this->db->select('*');
                $this->db->from('tbl_jadwal');
                $this->db->join('tbl_peserta', 'tbl_peserta.id_peserta = tbl_jadwal.id_peserta', 'left');              
                $this->db->join('tbl_user', 'tbl_user.id_user = tbl_jadwal.id_user_peserta', 'left');              
                $this->db->join('tbl_instruktur', 'tbl_instruktur.id_instruktur = tbl_jadwal.id_instruktur', 'left');              
                $this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_jadwal.id_paket', 'left');   
                $this->db->where('id_user_peserta', $this->session->userdata('id_user'));
                $this->db->where('status_jadwal = 2');
                $this->db->where('status_bayar = 1');
                $this->db->order_by('id_jadwal', 'desc'); 
                return $this->db->get()->result();
        }

        public function get_jadwal_instruktur()
        { 
                $this->db->select('*');
                $this->db->from('tbl_jadwal');
                $this->db->join('tbl_peserta', 'tbl_peserta.id_peserta = tbl_jadwal.id_peserta', 'left');              
                $this->db->join('tbl_user', 'tbl_user.id_user = tbl_jadwal.id_user_peserta', 'left');              
                $this->db->join('tbl_instruktur', 'tbl_instruktur.id_instruktur = tbl_jadwal.id_instruktur', 'left');              
                $this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_jadwal.id_paket', 'left');
                $this->db->where('status_jadwal = 1');
                $this->db->where('status_bayar = 1');
                $this->db->order_by('id_jadwal', 'desc');
                 
                return $this->db->get()->result();
        }
        public function get_jadwal_instruktur_aktif()
        { 
                $this->db->select('*');
                $this->db->from('tbl_jadwal');
                $this->db->join('tbl_peserta', 'tbl_peserta.id_peserta = tbl_jadwal.id_peserta', 'left');              
                $this->db->join('tbl_user', 'tbl_user.id_user = tbl_jadwal.id_user_peserta', 'left');              
                $this->db->join('tbl_instruktur', 'tbl_instruktur.id_instruktur = tbl_jadwal.id_instruktur', 'left');              
                $this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_jadwal.id_paket', 'left');
                $this->db->where('id_user_instruktur', $this->session->userdata('id_user'));
                $this->db->where('status_jadwal = 2');
                $this->db->where('status_bayar = 1');
                $this->db->order_by('id_jadwal', 'desc');
                 
                return $this->db->get()->result();
        }

        public function my_jadwal($id_jadwal)
        {
                $this->db->select('*');
                $this->db->from('tbl_jadwal');
                $this->db->where('id_jadwal', $id_jadwal);
                return $this->db->get()->row(); 
        }

        public function detail_jadwal($id_jadwal)
        {
                $this->db->select('*');
                $this->db->from('tbl_jadwal');
                $this->db->join('tbl_peserta', 'tbl_peserta.id_peserta = tbl_jadwal.id_peserta', 'left');              
                $this->db->join('tbl_user', 'tbl_user.id_user = tbl_jadwal.id_user_peserta', 'left');              
                $this->db->join('tbl_instruktur', 'tbl_instruktur.id_instruktur = tbl_jadwal.id_instruktur', 'left');              
                $this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_jadwal.id_paket', 'left');
                $this->db->where('id_jadwal', $id_jadwal);
                return $this->db->get()->row(); 
        }

        public function cek_jadwal($id_jadwal)
        {
                $this->db->select('*');
                $this->db->from('tbl_jadwal');
                $this->db->where('id_jadwal', $id_jadwal);
                return $this->db->get()->row(); 
        }

        public function bank()
        {
                $this->db->select('*');
                $this->db->from('tbl_bank');
                return $this->db->get()->result(); 
        }

        public function get_all_data()
        {
                $this->db->select('*');
                $this->db->from('tbl_jadwal');
                $this->db->join('tbl_peserta', 'tbl_peserta.id_peserta = tbl_jadwal.id_peserta', 'left');              
                $this->db->join('tbl_instruktur', 'tbl_instruktur.id_instruktur = tbl_jadwal.id_instruktur', 'left');              
                $this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_jadwal.id_paket', 'left');              
                $this->db->order_by('tbl_jadwal.id_jadwal','desc');

                return $this->db->get()->result();
        }
        public function get_data()
        {
                $this->db->select('*');
                $this->db->from('tbl_jadwal');
                $this->db->join('tbl_peserta', 'tbl_peserta.id_peserta = tbl_jadwal.id_peserta', 'left');              
                $this->db->join('tbl_instruktur', 'tbl_instruktur.id_instruktur = tbl_jadwal.id_instruktur', 'left');              
                $this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_jadwal.id_paket', 'left');              
                $this->db->order_by('tbl_jadwal.id_jadwal','desc');

                return $this->db->get()->result();
        }
        public function get_data_belum_bayar()
        {
                $this->db->select('*');
                $this->db->from('tbl_jadwal');
                $this->db->join('tbl_peserta', 'tbl_peserta.id_peserta = tbl_jadwal.id_peserta', 'left');              
                $this->db->join('tbl_instruktur', 'tbl_instruktur.id_instruktur = tbl_jadwal.id_instruktur', 'left');              
                $this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_jadwal.id_paket', 'left');
                $this->db->where('status_bayar = 0');
                $this->db->order_by('tbl_jadwal.id_jadwal','desc');

                return $this->db->get()->result();
        }
        public function get_data_sudah_bayar()
        {
                $this->db->select('*');
                $this->db->from('tbl_jadwal');
                $this->db->join('tbl_peserta', 'tbl_peserta.id_peserta = tbl_jadwal.id_peserta', 'left');              
                $this->db->join('tbl_instruktur', 'tbl_instruktur.id_instruktur = tbl_jadwal.id_instruktur', 'left');              
                $this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_jadwal.id_paket', 'left');
                $this->db->where('status_bayar = 1');
                $this->db->where('status_jadwal = 0');
                $this->db->order_by('tbl_jadwal.id_jadwal','desc');

                return $this->db->get()->result();
        }
        public function get_data_pending()
        {
                $this->db->select('*');
                $this->db->from('tbl_jadwal');
                $this->db->join('tbl_peserta', 'tbl_peserta.id_peserta = tbl_jadwal.id_peserta', 'left');              
                $this->db->join('tbl_instruktur', 'tbl_instruktur.id_instruktur = tbl_jadwal.id_instruktur', 'left');              
                $this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_jadwal.id_paket', 'left');
                $this->db->where('status_jadwal = 1');
                $this->db->where('status_bayar = 1');
                $this->db->order_by('tbl_jadwal.id_jadwal','desc');

                return $this->db->get()->result();
        }
        public function get_data_active()
        {
                $this->db->select('*');
                $this->db->from('tbl_jadwal');
                $this->db->join('tbl_peserta', 'tbl_peserta.id_peserta = tbl_jadwal.id_peserta', 'left');              
                $this->db->join('tbl_instruktur', 'tbl_instruktur.id_instruktur = tbl_jadwal.id_instruktur', 'left');              
                $this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_jadwal.id_paket', 'left');
                $this->db->where('status_jadwal = 2');
                $this->db->where('status_bayar = 1');
                $this->db->order_by('tbl_jadwal.id_jadwal','desc');

                return $this->db->get()->result();
        }
        
        public function simpan_rinci_jadwal($data_rinci)
        {
                $this->db->insert('tbl_rinci_jadwal',$data_rinci);
        }

        public function upload_buktibayar($data)
        {       
                $this->db->where('id_jadwal', $data['id_jadwal']);
                $this->db->update('tbl_jadwal', $data);
        }
        public function update_jadwal($data)
        {       
                $this->db->where('id_jadwal', $data['id_jadwal']);
                $this->db->update('tbl_jadwal', $data);
        }



}

/* End of file ModelName.php */
