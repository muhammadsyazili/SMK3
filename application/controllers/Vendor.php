<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @author Muhammad syazili, Imas Syaibun Nisa
* @copyright Teknik Informatika, Fasilkom Unsri 2017
*/
class Vendor extends CI_Controller
{
	public function __construct(){
		parent::__construct();		
		$this->load->model('vendor_m');

		$userdata['id_akun'] = $this->session->userdata('id_akun');

		if (!isset($userdata['id_akun'])) {
			redirect(base_url("masuk"));
			exit;
		}

		if ($this->vendor_m->cek_idVendor($userdata) != 0) {
			$sess['id_vendor'] = $this->vendor_m->get_idVendor($userdata);
			$this->session->set_userdata($sess);

			redirect(base_url('pekerjaan'));
			exit;
		}
	}

	public function index()
	{
		if ($this->_validate()) {

			redirect(base_url("pekerjaan"));
			exit;
		}
		$data = array(
					'title'		=> $this->uri->segment(1),
					'navbar'	=> 'navbar_custom',
					'content'	=> 'tambah_vendor'
				);
		$this->load->view('includes/template', $data);
	}

	public function _validate()
	{
		if ($this->input->post('simpan')){

			$data_vendor['nama_vendor'] 		= $this->input->post('nama_vendor');
			$data_vendor['id_akun'] 			= $this->session->userdata('id_akun');
			
			$sess['id_vendor'] = $this->vendor_m->set_vendor($data_vendor);
			$this->session->set_userdata($sess);
			return TRUE;
		}
		return FALSE;
	}
}