<?php
/**
* @author Muhammad syazili, Imas Syaibun Nisa
* @copyright Teknik Informatika, Fasilkom Unsri 2017
*/
  class Pekerjaan_m extends CI_Model
  {
    private $table = ['pekerjaan', 'pengawas', 'pekerja', 'peralatan', 'vendor', 'rayon', 'penyulang', 'aplikasi', 'jenis_peralatan', 'bahaya_pekerjaan', 'tindakan_pencegahan', 'apd', 'langkah_pengerjaan', 'peralatan_kerja_k2', 'detail_pekerjaan', 'd_aplikasi', 'd_jPeralatan', 'd_bahaya', 'd_tPencegahan', 'd_apd'];

    public function __construct()
    {
      parent::__construct();
      $this->load->model('master_m');
    }

//==================================================== set function
    public function set_pekerjaan($data)
    {
      return $this->master_m->insert($this->table[0], $data);
    }

    public function set_pengawas($data)
    {
      return $this->master_m->insert($this->table[1], $data);
    }

    public function set_pekerja($data)
    {
      return $this->master_m->insert($this->table[2], $data);
    }

    public function set_peralatan($data)
    {
      return $this->master_m->insert($this->table[3], $data);
    }

    public function set_aplikasi($data)
    {
      return $this->master_m->insert($this->table[7], $data);
    }

    public function set_jPeralatan($data)
    {
      return $this->master_m->insert($this->table[8], $data);
    }

    public function set_bahaya($data)
    {
      return $this->master_m->insert($this->table[9], $data);
    }

    public function set_tPencegahan($data)
    {
      return $this->master_m->insert($this->table[10], $data);
    }

    public function set_apd($data)
    {
      return $this->master_m->insert($this->table[11], $data);
    }

    public function set_detailKerja($data)
    {
      return $this->master_m->insert($this->table[14], $data);
    }

    public function set_k2($data)
    {
      return $this->master_m->insert($this->table[13], $data);
    }

    public function set_langkahPengerjaan($data)
    {
      return $this->master_m->insert($this->table[12], $data);
    }
//==================================================== update function
    public function update_pekerjaan($where, $data)
    {
      return $this->master_m->update($this->table[0], $where, $data);
    }

    // public function update_a_aplikasi($where, $data)
    // {
    //   return $this->master_m->update($this->table[7], $where, $data);
    // }

    // public function update_a_jPeralatan($where, $data)
    // {
    //   return $this->master_m->update($this->table[8], $where, $data);
    // }

    // public function update_a_bahaya($where, $data)
    // {
    //   return $this->master_m->update($this->table[9], $where, $data);
    // }

    // public function update_a_tPencegahan($where, $data)
    // {
    //   return $this->master_m->update($this->table[10], $where, $data);
    // }

    // public function update_a_apd($where, $data)
    // {
    //   return $this->master_m->update($this->table[11], $where, $data);
    // }

    // public function update_a_pengawas($where, $data)
    // {
    //   return $this->master_m->update($this->table[1], $where, $data);
    // }

    // public function update_a_pekerja($where, $data)
    // {
    //   return $this->master_m->update($this->table[2], $where, $data);
    // }

    // public function update_a_peralatan($where, $data)
    // {
    //   return $this->master_m->update($this->table[3], $where, $data);
    // }

    // public function update_a_dPekerjaan($where, $data)
    // {
    //   return $this->master_m->update($this->table[14], $where, $data);
    // }

    // public function update_a_k2($where, $data)
    // {
    //   return $this->master_m->update($this->table[13], $where, $data);
    // }

    // public function update_a_lKerja($where, $data)
    // {
    //   return $this->master_m->update($this->table[12], $where, $data);
    // }
//==================================================== get function
    public function get_d_rayon(){
      return $this->master_m->read_all($this->table[5]);
    }

    public function get_d_penyulang(){
      return $this->master_m->read_all($this->table[6]);
    }

    public function get_d_aplikasi(){
      return $this->master_m->read_all($this->table[15]);
    }

    public function get_d_jPeralatan(){
      return $this->master_m->read_all($this->table[16]);
    }

    public function get_d_bahaya(){
      return $this->master_m->read_all($this->table[17]);
    }

    public function get_d_tPencegahan(){
      return $this->master_m->read_all($this->table[18]);
    }

    public function get_d_apd(){
      return $this->master_m->read_all($this->table[19]);
    }

    public function get_pekerjaan($where)
    {
      $this->db->select('pekerjaan.*, rayon.nama_rayon, penyulang.nama_penyulang');
      $this->db->from($this->table[0]);
      $this->db->join($this->table[5], 'pekerjaan.id_rayon = rayon.id_rayon');
      $this->db->join($this->table[6], 'pekerjaan.id_penyulang = penyulang.id_penyulang');
      $this->db->where($where);
      $q = $this->db->get();
      return $q->result();
    }

    public function get_pekerjaan_by_idPekerjaan($where)
    {
      $this->db->select('vendor.nama_vendor, pekerjaan.*, rayon.id_rayon, penyulang.id_penyulang');
      $this->db->from($this->table[0]);
      $this->db->join($this->table[4], 'pekerjaan.id_vendor = vendor.id_vendor');
      $this->db->join($this->table[5], 'pekerjaan.id_rayon = rayon.id_rayon');
      $this->db->join($this->table[6], 'pekerjaan.id_penyulang = penyulang.id_penyulang');
      $this->db->where($where);
      $q = $this->db->get();
      return $q->result();
    }

    public function get_diagram_by_idPekerjaan($where)
    {
      return $this->master_m->read_by_where_return_row($this->table[0], $where)->single_line;
    }

    public function getAll_pekerjaan()
    {
      $this->db->select('pekerjaan.*, rayon.nama_rayon, penyulang.nama_penyulang');
      $this->db->from($this->table[0]);
      $this->db->join($this->table[5], 'pekerjaan.id_rayon = rayon.id_rayon');
      $this->db->join($this->table[6], 'pekerjaan.id_penyulang = penyulang.id_penyulang');
      $q = $this->db->get();
      return $q->result();
    }

    public function get_aplikasi_by_idPekerjaan($where)
    {
      $this->db->select('aplikasi.id_aplikasi');
      $this->db->from($this->table[7]);
      $this->db->join($this->table[0], 'pekerjaan.id_pekerjaan = aplikasi.id_pekerjaan');
      $q = $this->db->get();
      return $q->result_array();
    }

    public function get_jenisPeralatan_by_idPekerjaan($where)
    {
      $this->db->select('jenis_peralatan.id_jPeralatan');
      $this->db->from($this->table[8]);
      $this->db->join($this->table[0], 'pekerjaan.id_pekerjaan = jenis_peralatan.id_pekerjaan');
      $q = $this->db->get();
      return $q->result_array();
    }

    public function get_bahayaPekerjaaan_by_idPekerjaan($where)
    {
      $this->db->select('bahaya_pekerjaan.id_bahaya');
      $this->db->from($this->table[9]);
      $this->db->join($this->table[0], 'pekerjaan.id_pekerjaan = bahaya_pekerjaan.id_pekerjaan');
      $q = $this->db->get();
      return $q->result_array();
    }

    public function get_tindakanPencegahan_by_idPekerjaan($where)
    {
      $this->db->select('tindakan_pencegahan.id_tPencegahan');
      $this->db->from($this->table[10]);
      $this->db->join($this->table[0], 'pekerjaan.id_pekerjaan = tindakan_pencegahan.id_pekerjaan');
      $q = $this->db->get();
      return $q->result_array();
    }

    public function get_apd_by_idPekerjaan($where)
    {
      $this->db->select('apd.id_apd');
      $this->db->from($this->table[11]);
      $this->db->join($this->table[0], 'pekerjaan.id_pekerjaan = apd.id_pekerjaan');
      $q = $this->db->get();
      return $q->result_array();
    }

    public function get_pengawas_by_idPekerjaan($where)
    {
      $this->db->select('pengawas.*');
      $this->db->from($this->table[1]);
      $this->db->join($this->table[0], 'pekerjaan.id_pekerjaan = pengawas.id_pekerjaan');
      $q = $this->db->get();
      return $q->result();
    }

    public function get_pekerja_by_idPekerjaan($where)
    {
      $this->db->select('pekerja.*');
      $this->db->from($this->table[2]);
      $this->db->join($this->table[0], 'pekerjaan.id_pekerjaan = pekerja.id_pekerjaan');
      $q = $this->db->get();
      return $q->result();
    }

    public function get_peralatan_by_idPekerjaan($where)
    {
      $this->db->select('peralatan.*');
      $this->db->from($this->table[3]);
      $this->db->join($this->table[0], 'pekerjaan.id_pekerjaan = peralatan.id_pekerjaan');
      $q = $this->db->get();
      return $q->result();
    }

    public function get_detailPekerjaan_by_idPekerjaan($where)
    {
      $this->db->select('detail_pekerjaan.*');
      $this->db->from($this->table[14]);
      $this->db->join($this->table[0], 'pekerjaan.id_pekerjaan = detail_pekerjaan.id_pekerjaan');
      $q = $this->db->get();
      return $q->result();
    }

    public function get_k2_by_idPekerjaan($where)
    {
      $this->db->select('peralatan_kerja_k2.*');
      $this->db->from($this->table[13]);
      $this->db->join($this->table[0], 'pekerjaan.id_pekerjaan = peralatan_kerja_k2.id_pekerjaan');
      $q = $this->db->get();
      return $q->result();
    }

    public function get_langkahPengerjaan_by_idPekerjaan($where)
    {
      $this->db->select('langkah_pengerjaan.*');
      $this->db->from($this->table[12]);
      $this->db->join($this->table[0], 'pekerjaan.id_pekerjaan = langkah_pengerjaan.id_pekerjaan');
      $q = $this->db->get();
      return $q->result();
    }
//==================================================== cek function
    public function cek_pekerjaan($where)
    {
      return $this->master_m->count_by_where($this->table[0], $where);
    }

    public function cekAll_pekerjaan()
    {
      return $this->master_m->count_all($this->table[0]);
    }
//==================================================== delete function
    public function delete_pekerjaan($where)
    {
      return $this->master_m->delete($this->table[0], $where);
    }

    public function delete_a_aplikasi($where)
    {
      return $this->master_m->delete($this->table[7], $where);
    }

    public function delete_a_jPeralatan($where)
    {
      return $this->master_m->delete($this->table[8], $where);
    }

    public function delete_a_set_bahaya($where)
    {
      return $this->master_m->delete($this->table[9], $where);
    }

    public function delete_a_tPencegahan($where)
    {
      return $this->master_m->delete($this->table[10], $where);
    }

    public function delete_a_apd($where)
    {
      return $this->master_m->delete($this->table[11], $where);
    }

    public function delete_a_pengawas($where)
    {
      return $this->master_m->delete($this->table[1], $where);
    }

    public function delete_a_pekerja($where)
    {
      return $this->master_m->delete($this->table[2], $where);
    }

    public function delete_a_peralatan($where)
    {
      return $this->master_m->delete($this->table[3], $where);
    }

    public function delete_a_detailKerja($where)
    {
      return $this->master_m->delete($this->table[14], $where);
    }

    public function delete_a_k2($where)
    {
      return $this->master_m->delete($this->table[13], $where);
    }

    public function delete_a_langkahPengerjaan($where)
    {
      return $this->master_m->delete($this->table[12], $where);
    }   
  }