<?php
  class Jsa_m extends CI_Model
  {
    private $table = 'jsa';

    public function __construct()
    {
      parent::__construct();
      $this->load->model('master_m');
    }

    public function set_jsa($data)
    {
    	return $this->master_m->insert($this->table, $data);
    }

    public function update_jsa($where, $data)
    {
      return $this->master_m->update($this->table, $where, $data);
    }

    public function get_jsa_by_idPekerjaan($where)
    {
      return $this->master_m->read_by_where_return_row($this->table, $where);
    }
  }