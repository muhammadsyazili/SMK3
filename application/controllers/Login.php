<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @author Muhammad syazili, Imas Syaibun Nisa
* @copyright Teknik Informatika, Fasilkom Unsri 2017
*/
class Login extends CI_Controller
{
	public function __construct(){
		parent::__construct();		
		$this->load->model('akun_m');

		$userdata['id_akun'] = $this->session->userdata('id_akun');
		if (isset($userdata['id_akun'])){
			$role = $this->akun_m->get_role_by_idAkun($userdata);

			if ($role == 'admin') {
				redirect(base_url('admin'));
				exit;
			}
			else if ($role == 'vendor') {
				redirect(base_url('vendor'));
				exit;
			}
			else {
				redirect(base_url('approval'));
				exit;
			};
		}
	}

	public function index()
	{
		$validasi = $this->_validate();
		if ($validasi) {
			$userdata['id_akun'] = $this->session->userdata('id_akun');
			
			$role = $this->akun_m->get_role_by_idAkun($userdata);

			if ($role == 'admin') {
				redirect(base_url('admin'));
				exit;
			}
			else if ($role == 'vendor') {
				redirect(base_url('vendor'));
				exit;
			}
			else {
				redirect(base_url('approval'));
				exit;
			}
		}
		$data = array(
				'title'		=> $this->uri->segment(1),
				'navbar'	=> 'navbar_none',
				'content'	=> 'login'
			);
		$this->load->view('includes/template', $data);
	}

	public function _validate()
	{
		if ($this->input->post('login_btn')){

			$data_akun['username'] = $this->input->post('username');
			$data_akun['password'] = md5($this->input->post('password'));
			if($this->akun_m->cek_akun($data_akun) !== 0){

				$sess['id_akun'] = $this->akun_m->get_idAkun_by_dataAkun($data_akun);
				$this->session->set_userdata($sess);
	 			
	 			return TRUE;
			}
			else{
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center text-capitalize">username atau password salah !</div>');
				return FALSE;
			}
		}
		return FALSE;
	}
}