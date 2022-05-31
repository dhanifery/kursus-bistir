<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_laporan extends CI_Model {

        public function lap_harian($tanggal,$bulan,$tahun)
        {
                $this->db->select('*');
                $this->db->from('tbl_rinci_jadwal');
                $this->db->join('tbl_jadwal', 'tbl_jadwal.kode_jadwal = tbl_rinci_jadwal.kode_jadwal', 'left');
                $this->db->join('tbl_peserta', 'tbl_peserta.id_peserta = tbl_rinci_jadwal.id_peserta', 'left');
                $this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_rinci_jadwal.id_paket', 'left');
                $this->db->where('DAY(tbl_jadwal.tgl_jadwal)', $tanggal);             
                $this->db->where('MONTH(tbl_jadwal.tgl_jadwal)', $bulan);             
                $this->db->where('YEAR(tbl_jadwal.tgl_jadwal)', $tahun);
                return $this->db->get()->result();                  
        }

        public function lap_bulanan($bulan,$tahun)
        {
                $this->db->select('*');
                $this->db->from('tbl_rinci_jadwal');
                $this->db->join('tbl_jadwal', 'tbl_jadwal.kode_jadwal = tbl_rinci_jadwal.kode_jadwal', 'left');
                $this->db->join('tbl_peserta', 'tbl_peserta.id_peserta = tbl_rinci_jadwal.id_peserta', 'left');
                $this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_rinci_jadwal.id_paket', 'left');            
                $this->db->where('MONTH(tbl_jadwal.tgl_jadwal)', $bulan);             
                $this->db->where('YEAR(tbl_jadwal.tgl_jadwal)', $tahun);
                return $this->db->get()->result();                  
        }

        public function lap_tahunan($tahun)
        {
                $this->db->select('*');
                $this->db->from('tbl_rinci_jadwal');
                $this->db->join('tbl_jadwal', 'tbl_jadwal.kode_jadwal = tbl_rinci_jadwal.kode_jadwal', 'left');
                $this->db->join('tbl_peserta', 'tbl_peserta.id_peserta = tbl_rinci_jadwal.id_peserta', 'left');
                $this->db->join('tbl_paket', 'tbl_paket.id_paket = tbl_rinci_jadwal.id_paket', 'left');                       
                $this->db->where('YEAR(tbl_jadwal.tgl_jadwal)', $tahun);
                return $this->db->get()->result();                  
        }

}

/* End of file ModelName.php */
