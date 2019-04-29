<?php
  class Master_m extends CI_Model
  {
  	public function insert($table, $data)
  	{
      $this->db->insert($table, $data);
      return $this->db->insert_id();
  	}

  	public function update($table, $where, $data) 
  	{
  		$this->db->where($where);
      return $this->db->update($table, $data);
  	}

  	public function delete($table, $where)
  	{
  		$this->db->where($where);
      return $this->db->delete($table);
  	}

  	public function read_all($table)
  	{
  		$query = $this->db->get($table);
      return $query->result();
  	}

  	public function read_by_where($table, $where)
  	{
    	$query = $this->db->get_where($table, $where);
    	return $query->result();
  	}

  	public function read_by_where_return_row($table, $where)
  	{
      $query = $this->db->get_where($table, $where);
    	return $query->row();
  	}

  	public function count_all($table)
  	{
  		return $this->db->count_all_results($table);
  	}

  	public function count_by_where($table, $where)
  	{
  		$this->db->where($where);
      return $this->db->count_all_results($table);
  	}
  }