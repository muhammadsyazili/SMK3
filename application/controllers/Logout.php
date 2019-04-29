<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @author Muhammad syazili, Imas Syaibun Nisa
* @copyright Teknik Informatika, Fasilkom Unsri 2017
*/
class Logout extends CI_Controller
{
	public function index()
	{
		$this->session->sess_destroy();
		redirect(base_url('login'));
		exit;
	}
}