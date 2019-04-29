<?php
  class Akun_m extends CI_Model
  {
  	private $table = 'akun';

    public function __construct()
    {
      parent::__construct();
      $this->load->model('master_m');
    }

  	public function cek_akun($where)
  	{	
      return $this->master_m->count_by_where($this->table, $where);
    }

    public function get_idAkun_by_dataAkun($where)
    {
      return $this->master_m->read_by_where_return_row($this->table, $where)->id_akun;
    }

    public function get_role_by_idAkun($where)
    {
      return $this->master_m->read_by_where_return_row($this->table, $where)->role;
    }

    public function getAll_akun()
    {
      return $this->master_m->read_all($this->table);
    }

    public function set_akun($data)
    {
      return $this->master_m->insert($this->table, $data);
    }

    public function delete_akun($where)
    {
      return $this->master_m->delete($this->table, $where);
    }

    public function get_akun_by_idAkun($where)
    {
      return $this->master_m->read_by_where_return_row($this->table, $where);
    }

    public function edit_akun($where, $data)
    {
      return $this->master_m->update($this->table, $where, $data);
    }
}