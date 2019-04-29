<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @author Muhammad syazili, Imas Syaibun Nisa
* @copyright Teknik Informatika, Fasilkom Unsri 2017
*/
class Approval extends CI_Controller
{
	public function __construct(){
		parent::__construct();		
		$this->load->model('approval_m');
		$this->load->model('pekerjaan_m');

		$userdata['id_akun'] = $this->session->userdata('id_akun');

		if (!isset($userdata['id_akun'])) {
			redirect(base_url("masuk"));
			exit;
		}
	}
	
	public function index()
	{
		if ((int)$this->pekerjaan_m->cekAll_pekerjaan() === 0)
		{
			$this->session->set_flashdata('job', '<div class="alert alert-danger text-center text-capitalize">daftar pekerjaan kosong ! :(</div>');
		}

		$data = array(
			'title'				=> $this->uri->segment(1),
			'navbar' 			=> 'navbar_custom',
			'content'			=> 'dashboard_approval',
			'dt'				=> $this->pekerjaan_m->getAll_pekerjaan()
		);
		$this->load->view('includes/template', $data);
	}
}