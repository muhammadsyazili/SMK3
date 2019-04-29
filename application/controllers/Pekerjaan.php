<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @author Muhammad syazili, Imas Syaibun Nisa
* @copyright Teknik Informatika, Fasilkom Unsri 2017
*/
class Pekerjaan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pekerjaan_m');
		$this->load->model('vendor_m');
		$this->load->model('jsa_m');

		$userdata['id_akun'] = $this->session->userdata('id_akun');
		$userdata['id_vendor'] = $this->session->userdata('id_vendor');

		if (!isset($userdata['id_akun'])) {
			redirect(base_url("masuk"));
			exit;
		}

		if ($this->vendor_m->cek_idVendor($userdata) == 0) {
			redirect(base_url('vendor'));
			exit;
		}
	}

	public function index()
	{	
		$id['id_vendor'] = $this->session->userdata('id_vendor');
		if ($this->pekerjaan_m->cek_pekerjaan($id) == 0)
		{
			$this->session->set_flashdata('pekerjaan', '<div class="alert alert-danger text-center text-capitalize">belum ada pekerjaan ! :(</div>');
		}

		$data = array(
			'title'		=> $this->uri->segment(1),
			'navbar' 	=> 'navbar_custom',
			'content'	=> 'dashboard_pekerjaan',
			'dt'		=> $this->pekerjaan_m->get_pekerjaan($id)
		);
		$this->load->view('includes/template', $data);
	}

	public function single_array($arr){
	    foreach($arr as $key){
	        if(is_array($key)){
	            $arr1=$this->single_array($key);
	            foreach($arr1 as $k){
	                $new_arr[]=$k;
	            }
	        }
	        else{
	            $new_arr[]=$key;
	        }
	    }
	    return $new_arr;
	}

	public function _validate_c($data)
	{
		if ($data === NULL) {
			return FALSE;
		}
		return TRUE;
	}

	public function _delete_file($dir, $file)
	{
		return unlink($dir.$file);
	}

	public function detail()
	{
		$id['id_pekerjaan'] = base64_decode($this->input->get('id'));
		$data = array(
				'title'				=> $this->uri->segment(1).'|'.str_replace('_', ' ', $this->uri->segment(2)),
				'navbar' 			=> 'navbar_custom',
				'content'			=> 'detail_pekerjaan',
				'dt_pekerjaan'		=> $this->pekerjaan_m->get_pekerjaan_by_idPekerjaan($id),
				'd_a_aplikasi'		=> $this->single_array($this->pekerjaan_m->get_aplikasi_by_idPekerjaan($id)),
				'd_a_jPeralatan'	=> $this->single_array($this->pekerjaan_m->get_jenisPeralatan_by_idPekerjaan($id)),
				'd_a_bahaya'		=> $this->single_array($this->pekerjaan_m->get_bahayaPekerjaaan_by_idPekerjaan($id)),
				'd_a_tPencegahan'	=> $this->single_array($this->pekerjaan_m->get_tindakanPencegahan_by_idPekerjaan($id)),
				'd_a_apd'			=> $this->single_array($this->pekerjaan_m->get_apd_by_idPekerjaan($id)),
				'd_a_pengawas'		=> $this->pekerjaan_m->get_pengawas_by_idPekerjaan($id),
				'd_a_petugas'		=> $this->pekerjaan_m->get_pekerja_by_idPekerjaan($id),
				'd_a_peralatan'		=> $this->pekerjaan_m->get_peralatan_by_idPekerjaan($id),
				'd_a_dPekerjaan'	=> $this->pekerjaan_m->get_detailPekerjaan_by_idPekerjaan($id),
				'd_a_k2'			=> $this->pekerjaan_m->get_k2_by_idPekerjaan($id),
				'd_a_lPengerjaan'	=> $this->pekerjaan_m->get_langkahPengerjaan_by_idPekerjaan($id),

				'd_rayon'			=> $this->pekerjaan_m->get_d_rayon(),
				'd_penyulang'		=> $this->pekerjaan_m->get_d_penyulang(),
				'd_aplikasi'		=> $this->pekerjaan_m->get_d_aplikasi(),
				'd_jPeralatan'		=> $this->pekerjaan_m->get_d_jPeralatan(),
				'd_bahaya'			=> $this->pekerjaan_m->get_d_bahaya(),
				'd_tPencegahan'		=> $this->pekerjaan_m->get_d_tPencegahan(),
				'd_apd'				=> $this->pekerjaan_m->get_d_apd()
			);
		$this->load->view('includes/template', $data);
	}

	public function tambah_pekerjaan()
	{
		if ($this->input->post('tambah')) {

			$config['upload_path']          = './single_line/';
			$config['encrypt_name']         = TRUE;
			$config['allowed_types']        = 'jpg|png';
			$config['max_size']             = '5120';
			$config['remove_spaces']        = TRUE;
			$config['file_ext_tolower']		= TRUE;
	 
			$this->load->library('upload', $config);

			if (!$this->upload->do_upload('diagram')) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center text-capitalize">gagal simpan single line diagram :(, 
try again...</div>');
				redirect(base_url('pekerjaan/tambah_pekerjaan'));
				exit;
			}

			$data_pekerjaan['area'] 				= $this->input->post('area');
			$data_pekerjaan['id_rayon'] 			= $this->input->post('rayon');
			$data_pekerjaan['id_penyulang'] 		= $this->input->post('penyulang');
			$data_pekerjaan['no_dok'] 				= $this->input->post('no_dok');
			$data_pekerjaan['lokasi'] 				= $this->input->post('lokasi');
			$data_pekerjaan['id_vendor'] 			= $this->input->post('id_vendor');
			$data_pekerjaan['nama_pekerjaan'] 		= $this->input->post('kerja');
			$data_pekerjaan['tindakan_keselamatan'] = $this->input->post('tindakan_keselamatan');
			$data_pekerjaan['tgl_mulai'] 			= $this->input->post('tgl_awal');
			$data_pekerjaan['tgl_berakhir'] 		= $this->input->post('tgl_akhir');
			$data_pekerjaan['tgl_pengajuan'] 		= $this->input->post('tgl_pengajuan');
			$data_pekerjaan['single_line'] 			= $this->upload->data('file_name');
			$data_pekerjaan['catatan_peralatan'] 	= $this->input->post('catatan');
			$data_pekerjaan['status_pemadaman'] 	= $this->input->post('pemadaman');
			$data_pekerjaan['status_pekerjaan'] 	= $this->input->post('status_pekerjaan');

			//ke tabel pekerjaan
			$id_pekerjaan = $this->pekerjaan_m->set_pekerjaan($data_pekerjaan);

			//ke tabel aplikasi
			for ($i=0; $i <= count($this->input->post('aplikasi'))-1 ; $i++) {
				$data_aplikasi['id_pekerjaan'] 	= $id_pekerjaan;
				$data_aplikasi['id_aplikasi'] 	= $this->input->post('aplikasi')[$i];
				
				$this->pekerjaan_m->set_aplikasi($data_aplikasi);	
			}

			//ke tabel jeis peralatan
			for ($i=0; $i <= count($this->input->post('jPeralatan'))-1 ; $i++) {
				$data_jPeralatan['id_pekerjaan'] 	= $id_pekerjaan;
				$data_jPeralatan['id_jPeralatan'] 	= $this->input->post('jPeralatan')[$i];
				
				$this->pekerjaan_m->set_jPeralatan($data_jPeralatan);	
			}

			//ke tabel bahaya
			for ($i=0; $i <= count($this->input->post('bahaya'))-1 ; $i++) {
				$data_bahaya['id_pekerjaan'] 	= $id_pekerjaan;
				$data_bahaya['id_bahaya'] 		= $this->input->post('bahaya')[$i];
				
				$this->pekerjaan_m->set_bahaya($data_bahaya);	
			}

			//ke tabel tindakan pencegahan
			for ($i=0; $i <= count($this->input->post('tPencegahan'))-1 ; $i++) {
				$data_tPencegahan['id_pekerjaan'] 		= $id_pekerjaan;
				$data_tPencegahan['id_tPencegahan'] 	= $this->input->post('tPencegahan')[$i];
				
				$this->pekerjaan_m->set_tPencegahan($data_tPencegahan);	
			}

			//ke tabel apd
			for ($i=0; $i <= count($this->input->post('apd'))-1 ; $i++) {
				$data_apd['id_pekerjaan'] 	= $id_pekerjaan;
				$data_apd['id_apd'] 		= $this->input->post('apd')[$i];
				
				$this->pekerjaan_m->set_apd($data_apd);	
			}

			//ke tabel pengawas
			for ($i=0; $i <= count($this->input->post('pengawas'))-1 ; $i++) {
				$data_pengawas['id_pekerjaan'] 	= $id_pekerjaan;
				$data_pengawas['nama_pengawas'] = $this->input->post('pengawas')[$i];
				$data_pengawas['kontraktor']	= $this->input->post('kontraktor')[$i];
				
				$this->pekerjaan_m->set_pengawas($data_pengawas);	
			}

			//ke tabel petugas
			for ($i=0; $i <= count($this->input->post('pekerja'))-1 ; $i++) {
				$data_petugas['id_pekerjaan'] 	= $id_pekerjaan;
				$data_petugas['nama_pekerja']	= $this->input->post('pekerja')[$i];
				
				$this->pekerjaan_m->set_pekerja($data_petugas);
			}

			//ke tabel peralatan
			for ($i=0; $i <= count($this->input->post('peralatan'))-1 ; $i++) {
				$data_peralatan['id_pekerjaan'] = $id_pekerjaan;
				$data_peralatan['nama_alat']	= $this->input->post('peralatan')[$i];
				$data_peralatan['status']		= $this->input->post('status')[$i];
				
				$this->pekerjaan_m->set_peralatan($data_peralatan);
			}

			//ke tabel detail pekerjaan
			for ($i=0; $i <= count($this->input->post('dPekerjaan'))-1 ; $i++) {
				$data_detailKerja['id_pekerjaan'] 	= $id_pekerjaan;
				$data_detailKerja['nama_pekerjaan']	= $this->input->post('dPekerjaan')[$i];
				
				$this->pekerjaan_m->set_detailKerja($data_detailKerja);
			}

			//ke tabel k2
			for ($i=0; $i <= count($this->input->post('k2'))-1 ; $i++) {
				$data_k2['id_pekerjaan'] 	= $id_pekerjaan;
				$data_k2['nama_peralatan']	= $this->input->post('k2')[$i];
				
				$this->pekerjaan_m->set_k2($data_k2);
			}

			//ke tabel langkah kerja
			for ($i=0; $i <= count($this->input->post('lKerja'))-1 ; $i++) {
				$data_langkahPengerjaan['id_pekerjaan'] = $id_pekerjaan;
				$data_langkahPengerjaan['lKerja']		= $this->input->post('lKerja')[$i];
				$data_langkahPengerjaan['pBahaya']		= $this->input->post('pBahaya')[$i];
				$data_langkahPengerjaan['apd']			= $this->input->post('apd_k')[$i];
				$data_langkahPengerjaan['pRekomendasi']	= $this->input->post('pRekomendasi')[$i];
				
				$this->pekerjaan_m->set_langkahPengerjaan($data_langkahPengerjaan);
			}

			redirect(base_url('pekerjaan'));
			exit;
		}
//========================================================================
		$id['id_vendor'] = $this->session->userdata('id_vendor');

		$data = array(
				'title'			=> $this->uri->segment(1).'|'.str_replace('_', ' ', $this->uri->segment(2)),
				'navbar' 		=> 'navbar_custom',
				'content'		=> 'tambah_pekerjaan',
				'id_vendor'		=> $this->session->userdata('id_vendor'),
				'nama_vendor'	=> $this->vendor_m->get_namaVendor($id),
				'd_rayon'		=> $this->pekerjaan_m->get_d_rayon(),
				'd_penyulang'	=> $this->pekerjaan_m->get_d_penyulang(),
				'd_aplikasi'	=> $this->pekerjaan_m->get_d_aplikasi(),
				'd_jPeralatan'	=> $this->pekerjaan_m->get_d_jPeralatan(),
				'd_bahaya'		=> $this->pekerjaan_m->get_d_bahaya(),
				'd_tPencegahan'	=> $this->pekerjaan_m->get_d_tPencegahan(),
				'd_apd'			=> $this->pekerjaan_m->get_d_apd()
			);
		$this->load->view('includes/template', $data);
	}

	public function ubah_pekerjaan()
	{
		if ($this->input->post('ubah')) {
			
			//cek apakah user melakuakan upload diagram yg baru?
			if (!empty($_FILES["diagram"]["tmp_name"])) {
				//delete diagram lama
				$this->_delete_file('./single_line/', $this->input->post('last_diagram'));

				//upload diagram baru
				$config['upload_path']          = './single_line/';
				$config['allowed_types']        = 'jpg|png';
				$config['max_size']             = 5120;
				$config['encrypt_name'] 		= TRUE;
				$config['file_ext_tolower']		= TRUE;
		 
				$this->load->library('upload', $config);
				$this->upload->do_upload('diagram');
				$name_diagram = $this->upload->data('file_name');
			} else{
				$name_diagram = $this->input->post('last_diagram');
			}

			$data_pekerjaan['area'] 				= $this->input->post('area');
			$data_pekerjaan['id_rayon'] 			= $this->input->post('rayon');
			$data_pekerjaan['id_penyulang'] 		= $this->input->post('penyulang');
			$data_pekerjaan['no_dok'] 				= $this->input->post('no_dok');
			$data_pekerjaan['lokasi'] 				= $this->input->post('lokasi');
			$data_pekerjaan['id_vendor'] 			= $this->input->post('vendor');
			$data_pekerjaan['nama_pekerjaan'] 		= $this->input->post('kerja');
			$data_pekerjaan['tindakan_keselamatan'] = $this->input->post('tindakan_keselamatan');
			$data_pekerjaan['tgl_mulai'] 			= $this->input->post('tgl_awal');
			$data_pekerjaan['tgl_berakhir'] 		= $this->input->post('tgl_akhir');
			$data_pekerjaan['tgl_pengajuan'] 		= $this->input->post('tgl_pengajuan');
			$data_pekerjaan['single_line'] 			= $name_diagram;
			$data_pekerjaan['catatan_peralatan'] 	= $this->input->post('catatan');
			$data_pekerjaan['status_pemadaman'] 	= $this->input->post('pemadaman');


			$id['id_pekerjaan'] = $this->input->post('id_pekerjaan');
			$id_pekerjaan 		= $this->input->post('id_pekerjaan');
			//========================================================================
			$this->pekerjaan_m->update_pekerjaan($id, $data_pekerjaan);
			//========================================================================
			$this->pekerjaan_m->delete_a_aplikasi($id);
			//ke tabel aplikasi
			for ($i=0; $i <= count($this->input->post('aplikasi'))-1 ; $i++) {
				$data_aplikasi['id_pekerjaan'] 	= $id_pekerjaan;
				$data_aplikasi['id_aplikasi'] 	= $this->input->post('aplikasi')[$i];
				
				$this->pekerjaan_m->set_aplikasi($data_aplikasi);	
			}
			//========================================================================
			$this->pekerjaan_m->delete_a_jPeralatan($id);
			//ke tabel jeis peralatan
			for ($i=0; $i <= count($this->input->post('jPeralatan'))-1 ; $i++) {
				$data_jPeralatan['id_pekerjaan'] 	= $id_pekerjaan;
				$data_jPeralatan['id_jPeralatan'] 	= $this->input->post('jPeralatan')[$i];
				
				$this->pekerjaan_m->set_jPeralatan($data_jPeralatan);	
			}
			//========================================================================
			$this->pekerjaan_m->delete_a_set_bahaya($id);
			//ke tabel bahaya
			for ($i=0; $i <= count($this->input->post('bahaya'))-1 ; $i++) {
				$data_bahaya['id_pekerjaan'] 	= $id_pekerjaan;
				$data_bahaya['id_bahaya'] 		= $this->input->post('bahaya')[$i];
				
				$this->pekerjaan_m->set_bahaya($data_bahaya);	
			}
			//========================================================================
			$this->pekerjaan_m->delete_a_tPencegahan($id);
			//ke tabel tindakan pencegahan
			for ($i=0; $i <= count($this->input->post('tPencegahan'))-1 ; $i++) {
				$data_tPencegahan['id_pekerjaan'] 		= $id_pekerjaan;
				$data_tPencegahan['id_tPencegahan'] 	= $this->input->post('tPencegahan')[$i];
				
				$this->pekerjaan_m->set_tPencegahan($data_tPencegahan);	
			}
			//========================================================================
			$this->pekerjaan_m->delete_a_apd($id);
			//ke tabel apd
			for ($i=0; $i <= count($this->input->post('apd'))-1 ; $i++) {
				$data_apd['id_pekerjaan'] 	= $id_pekerjaan;
				$data_apd['id_apd'] 		= $this->input->post('apd')[$i];
				
				$this->pekerjaan_m->set_apd($data_apd);	
			}
			//========================================================================
			$this->pekerjaan_m->delete_a_pengawas($id);
			//ke tabel pengawas
			for ($i=0; $i <= count($this->input->post('pengawas'))-1 ; $i++) {
				$data_pengawas['id_pekerjaan'] 	= $id_pekerjaan;
				$data_pengawas['nama_pengawas'] = $this->input->post('pengawas')[$i];
				$data_pengawas['kontraktor']	= $this->input->post('kontraktor')[$i];
				
				$this->pekerjaan_m->set_pengawas($data_pengawas);	
			}
			//========================================================================
			$this->pekerjaan_m->delete_a_pekerja($id);
			//ke tabel petugas
			for ($i=0; $i <= count($this->input->post('pekerja'))-1 ; $i++) {
				$data_petugas['id_pekerjaan'] 	= $id_pekerjaan;
				$data_petugas['nama_pekerja']	= $this->input->post('pekerja')[$i];
				
				$this->pekerjaan_m->set_pekerja($data_petugas);
			}
			//========================================================================
			$this->pekerjaan_m->delete_a_peralatan($id);
			//ke tabel peralatan
			for ($i=0; $i <= count($this->input->post('peralatan'))-1 ; $i++) {
				$data_peralatan['id_pekerjaan'] = $id_pekerjaan;
				$data_peralatan['nama_alat']	= $this->input->post('peralatan')[$i];
				$data_peralatan['status']		= $this->input->post('status')[$i];
				
				$this->pekerjaan_m->set_peralatan($data_peralatan);
			}
			//========================================================================
			$this->pekerjaan_m->delete_a_detailKerja($id);
			//ke tabel detail pekerjaan
			for ($i=0; $i <= count($this->input->post('dPekerjaan'))-1 ; $i++) {
				$data_detailKerja['id_pekerjaan'] 	= $id_pekerjaan;
				$data_detailKerja['nama_pekerjaan']	= $this->input->post('dPekerjaan')[$i];
				
				$this->pekerjaan_m->set_detailKerja($data_detailKerja);
			}
			//========================================================================
			$this->pekerjaan_m->delete_a_k2($id);
			//ke tabel k2
			for ($i=0; $i <= count($this->input->post('k2'))-1 ; $i++) {
				$data_k2['id_pekerjaan'] 	= $id_pekerjaan;
				$data_k2['nama_peralatan']	= $this->input->post('k2')[$i];
				
				$this->pekerjaan_m->set_k2($data_k2);
			}
			//========================================================================
			$this->pekerjaan_m->delete_a_langkahPengerjaan($id);
			//ke tabel langkah kerja
			for ($i=0; $i <= count($this->input->post('lKerja'))-1 ; $i++) {
				$data_langkahPengerjaan['id_pekerjaan'] = $id_pekerjaan;
				$data_langkahPengerjaan['lKerja']		= $this->input->post('lKerja')[$i];
				$data_langkahPengerjaan['pBahaya']		= $this->input->post('pBahaya')[$i];
				$data_langkahPengerjaan['apd']			= $this->input->post('apd_k')[$i];
				$data_langkahPengerjaan['pRekomendasi']	= $this->input->post('pRekomendasi')[$i];
				
				$this->pekerjaan_m->set_langkahPengerjaan($data_langkahPengerjaan);
			}
			

			$this->session->set_flashdata('msg', '<div class="alert alert-success text-center text-capitalize">ubah berhasil :)</div>');
			redirect(base_url('pekerjaan'));
			exit;
		}
//========================================================================
		$id['id_pekerjaan'] = base64_decode($this->input->get('id'));
		$data = array(
				'title'				=> $this->uri->segment(1).'|'.str_replace('_', ' ', $this->uri->segment(2)),
				'navbar' 			=> 'navbar_custom',
				'content'			=> 'ubah_pekerjaan',
				'dt_pekerjaan'		=> $this->pekerjaan_m->get_pekerjaan_by_idPekerjaan($id),
				'd_a_aplikasi'		=> $this->single_array($this->pekerjaan_m->get_aplikasi_by_idPekerjaan($id)),
				'd_a_jPeralatan'	=> $this->single_array($this->pekerjaan_m->get_jenisPeralatan_by_idPekerjaan($id)),
				'd_a_bahaya'		=> $this->single_array($this->pekerjaan_m->get_bahayaPekerjaaan_by_idPekerjaan($id)),
				'd_a_tPencegahan'	=> $this->single_array($this->pekerjaan_m->get_tindakanPencegahan_by_idPekerjaan($id)),
				'd_a_apd'			=> $this->single_array($this->pekerjaan_m->get_apd_by_idPekerjaan($id)),
				'd_a_pengawas'		=> $this->pekerjaan_m->get_pengawas_by_idPekerjaan($id),
				'd_a_petugas'		=> $this->pekerjaan_m->get_pekerja_by_idPekerjaan($id),
				'd_a_peralatan'		=> $this->pekerjaan_m->get_peralatan_by_idPekerjaan($id),
				'd_a_dPekerjaan'	=> $this->pekerjaan_m->get_detailPekerjaan_by_idPekerjaan($id),
				'd_a_k2'			=> $this->pekerjaan_m->get_k2_by_idPekerjaan($id),
				'd_a_lPengerjaan'	=> $this->pekerjaan_m->get_langkahPengerjaan_by_idPekerjaan($id),

				'd_rayon'			=> $this->pekerjaan_m->get_d_rayon(),
				'd_penyulang'		=> $this->pekerjaan_m->get_d_penyulang(),
				'd_aplikasi'		=> $this->pekerjaan_m->get_d_aplikasi(),
				'd_jPeralatan'		=> $this->pekerjaan_m->get_d_jPeralatan(),
				'd_bahaya'			=> $this->pekerjaan_m->get_d_bahaya(),
				'd_tPencegahan'		=> $this->pekerjaan_m->get_d_tPencegahan(),
				'd_apd'				=> $this->pekerjaan_m->get_d_apd()
			);
		$this->load->view('includes/template', $data);
	}

	public function status()
	{

		$id['id_pekerjaan'] = base64_decode($this->input->get('id'));
		//var_dump($id);
		var_dump($this->uri->segment(4));

		// if ($this->input->get('status') == '0') {
		// 	$status_update = '1';
		// }
		// else if($this->input->get('status') == '1'){
		// 	$status_update = '0';
		// }
		// $data_pekerjaan['status_pekerjaan'] = $status_update;
		// //========================================================================
		// $this->pekerjaan_m->update_pekerjaan($id, $data_pekerjaan);

		// $this->session->set_flashdata('msg', '<div class="alert alert-success text-center text-capitalize">berhasil :)</div>');
		// redirect(base_url('pekerjaan'));
		// exit;

	}

	public function hapus()
	{
		$id['id_pekerjaan'] = base64_decode($this->input->get('id'));

		//menghapus file diagram di folder single line
		$this->_delete_file('./single_line/', $this->pekerjaan_m->get_diagram_by_idPekerjaan($id));

		//menghapus record pada table
		$this->pekerjaan_m->delete_pekerjaan($id);
			
		$this->session->set_flashdata('msg', '<div class="alert alert-success text-center text-capitalize">delete berhasil</div>');
		redirect(base_url("pekerjaan"));
		exit;
	}
}