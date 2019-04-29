<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @author Muhammad syazili, Imas Syaibun Nisa
* @copyright Teknik Informatika, Fasilkom Unsri 2017
*/
class Admin extends CI_Controller
{
	public function __construct(){
		parent::__construct();		
		$this->load->model('akun_m');

		$userdata['id_akun'] = $this->session->userdata('id_akun');

		if (!isset($userdata['id_akun'])) {
			redirect(base_url("masuk"));
			exit;
		}
	}
	
	public function index()
	{
		$data = array(
				'title'		=> $this->uri->segment(1),
				'navbar'	=> 'navbar_custom',
				'content'	=> 'dashboard_admin',
				'dt_akun'	=> $this->akun_m->getAll_akun()
			);
		$this->load->view('includes/template', $data);
	}

	public function tambah_akun()
	{
		if ($this->input->post('tambah')){
			$data_akun['username'] 	= $this->input->post('username');
			$data_akun['password'] 	= md5($this->input->post('password'));
			$data_akun['role'] 		= $this->input->post('role');

			if ($this->akun_m->cek_akun($data_akun) !== 0) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center text-capitalize">akun sudah terdaftar :(</div>');
				redirect(base_url("admin/tambah_akun"));
				exit;
			}
			$this->akun_m->set_akun($data_akun);
			$this->session->set_flashdata('msg', '<div class="alert alert-success text-center text-capitalize">akun berhasil ditambahkan :)</div>');
			redirect(base_url("admin"));
			exit;
		}
		$data = array(
				'title'		=> $this->uri->segment(1).'|'.str_replace('_', ' ', $this->uri->segment(2)),
				'navbar'	=> 'navbar_custom',
				'content'	=> 'tambah_akun'
			);
		$this->load->view('includes/template', $data);
	}

	public function ubah_akun()
	{
		if ($this->input->post('ubah')){
			$data_akun['username'] 	= $this->input->post('username');
			$data_akun['password'] 	= md5($this->input->post('password'));
			$data_akun['role'] 		= $this->input->post('role');

			$id['id_akun'] = $this->input->post('id_akun');

			if ($this->akun_m->edit_akun($id, $data_akun))
			{
				$this->session->set_flashdata('msg', '<div class="alert alert-success text-center text-capitalize">ubah akun berhasil :)</div>');
				redirect(base_url("admin"));
				exit;
			}
		}
		$id['id_akun'] = base64_decode($this->input->get('id'));
		$data = array(
				'title'		=> $this->uri->segment(1).'|'.str_replace('_', ' ', $this->uri->segment(2)),
				'navbar'	=> 'navbar_custom',
				'content'	=> 'ubah_akun',
				'dt_akun'	=> $this->akun_m->get_akun_by_idAkun($id)
			);
		$this->load->view('includes/template', $data);
	}

	public function hapus_akun()
	{
		$id['id_akun'] = base64_decode($this->input->get('id'));
		$this->akun_m->delete_akun($id);
		
		$this->session->set_flashdata('msg', '<div class="alert alert-success text-center text-capitalize">hapus berhasil</div>');
		redirect(base_url("admin"));
		exit;
	}
}