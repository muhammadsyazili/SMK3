<?php
  class Approval_m extends CI_Model
  {
  	private $table = 'persetujuan';

    public function __construct()
    {
      parent::__construct();
      $this->load->model('master_m');
    }
  }