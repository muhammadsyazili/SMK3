<?php
  class Vendor_m extends CI_Model
  {
  	private $table = 'vendor';

    public function __construct()
    {
      parent::__construct();
      $this->load->model('master_m');
    }

    public function set_vendor($data)
    {
      return $this->master_m->insert($this->table, $data);
    }

    public function cek_idVendor($where)
    {
      return $this->master_m->count_by_where($this->table, $where);
    }

    public function get_idVendor_by_dataVendor($where)
    {
      return $this->master_m->read_by_where_return_row($this->table, $where)->id_vendor;
    }

    public function get_idVendor($where)
    {
      return $this->master_m->read_by_where_return_row($this->table, $where)->id_vendor;
    }

    public function get_namaVendor($where)
    {
      return $this->master_m->read_by_where_return_row($this->table, $where)->nama_vendor;
    }
  }