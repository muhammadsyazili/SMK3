<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
* @author Muhammad syazili, Imas Syaibun Nisa
* @copyright Teknik Informatika, Fasilkom Unsri 2017
*/
class Pengajuan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('pengajuan_m');
		$this->load->model('vendor_m');

		$userdata['id_akun'] = $this->session->userdata('id_akun');
		$userdata['id_vendor'] = $this->session->userdata('id_vendor');

		if (!isset($userdata['id_akun'])) {
			redirect(base_url("login"));
			exit;
		}

		if ($this->vendor_m->cek_idVendor($userdata) == 0) {
			redirect(base_url('vendor'));
			exit;
		}
	}

	public function index()
	{	
		$id['pengajuan.id_vendor'] = $this->session->userdata('id_vendor');
		if ($this->pengajuan_m->cek_pengajuan($id) == 0)
		{
			$this->session->set_flashdata('pengajuan', '<div class="alert alert-danger text-center text-capitalize">belum ada pengajuan SMK3 ! :(</div>');
		}
		$order = 'catatan_pengajuan';
		$data = array(
			'title'		=> $this->uri->segment(1),
			'navbar' 	=> 'navbar_custom',
			'content'	=> 'dashboard_pengajuan',
			'dt'		=> $this->pengajuan_m->get_pengajuan($id, $order)
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

	public function detail_pengajuan()
	{
		$id['pengajuan.id_pengajuan'] = base64_decode($this->input->get('id'));
		$data = array(
				'title'				=> $this->uri->segment(1).'|'.str_replace('_', ' ', $this->uri->segment(2)),
				'navbar' 			=> 'navbar_custom',
				'content'			=> 'detail_pengajuan',
				'dt_pengajuan'		=> $this->pengajuan_m->get_pengajuan_by_idPengajuan($id),
				'd_a_aplikasi'		=> $this->single_array($this->pengajuan_m->get_aplikasi_by_idPengajuan($id)),
				'd_a_jPeralatan'	=> $this->single_array($this->pengajuan_m->get_jenisPeralatan_by_idPengajuan($id)),
				'd_a_bahaya'		=> $this->single_array($this->pengajuan_m->get_bahayaPekerjaaan_by_idPengajuan($id)),
				'd_a_tPencegahan'	=> $this->single_array($this->pengajuan_m->get_tindakanPencegahan_by_idPengajuan($id)),
				'd_a_apd'			=> $this->single_array($this->pengajuan_m->get_apd_by_idPengajuan($id)),
				'd_a_pengawas'		=> $this->pengajuan_m->get_pengawas_by_idPengajuan($id),
				'd_a_pekerja'		=> $this->pengajuan_m->get_pekerja_by_idPengajuan($id),
				'd_a_peralatan'		=> $this->pengajuan_m->get_peralatan_by_idPengajuan($id),
				'd_a_dPekerjaan'	=> $this->pengajuan_m->get_detailPekerjaan_by_idPengajuan($id),
				'd_a_k2'			=> $this->pengajuan_m->get_k2_by_idPengajuan($id),
				'd_a_lPengerjaan'	=> $this->pengajuan_m->get_langkahPengerjaan_by_idPengajuan($id),

				'd_rayon'			=> $this->pengajuan_m->get_d_rayon(),
				'd_penyulang'		=> $this->pengajuan_m->get_d_penyulang(),
				'd_aplikasi'		=> $this->pengajuan_m->get_d_aplikasi(),
				'd_jPeralatan'		=> $this->pengajuan_m->get_d_jPeralatan(),
				'd_bahaya'			=> $this->pengajuan_m->get_d_bahaya(),
				'd_tPencegahan'		=> $this->pengajuan_m->get_d_tPencegahan(),
				'd_apd'				=> $this->pengajuan_m->get_d_apd()
			);
		$this->load->view('includes/template', $data);
	}

	public function tambah_pengajuan()
	{
		if ($this->input->post('tambah')) {

			$config['upload_path']          = './single_line/';
			$config['encrypt_name']         = TRUE;
			$config['allowed_types']        = 'jpg|png';
			$config['max_size']             = '5120';
			$config['remove_spaces']        = TRUE;
			$config['file_ext_tolower']		= TRUE;
	 
			$this->load->library('upload', $config);

			$upload = $this->upload->do_upload('diagram');

			if (!$upload) {
				$this->session->set_flashdata('msg', '<div class="alert alert-danger text-center text-capitalize">gagal saat upload single line diagram</div>');
				redirect(base_url('pengajuan/tambah_pengajuan'));
				exit;
			}

			$data_pengajuan['area'] 				= $this->input->post('area');
			$data_pengajuan['id_rayon'] 			= $this->input->post('rayon');
			$data_pengajuan['id_penyulang'] 		= $this->input->post('penyulang');
			$data_pengajuan['no_dok'] 				= $this->input->post('no_dok');
			$data_pengajuan['lokasi'] 				= $this->input->post('lokasi');
			$data_pengajuan['id_vendor'] 			= $this->session->userdata('id_vendor');
			$data_pengajuan['nama_pekerjaan'] 		= $this->input->post('kerja');
			$data_pengajuan['tindakan_keselamatan'] = $this->input->post('tindakan_keselamatan');
			$data_pengajuan['tgl_mulai'] 			= $this->input->post('tgl_awal');
			$data_pengajuan['tgl_berakhir'] 		= $this->input->post('tgl_akhir');
			$data_pengajuan['tgl_pengajuan'] 		= date('Y/m/d');
			$data_pengajuan['single_line'] 			= $this->upload->data('file_name');
			$data_pengajuan['catatan_peralatan'] 	= $this->input->post('catatan');
			$data_pengajuan['status_pemadaman'] 	= $this->input->post('pemadaman');
			$data_pengajuan['status_p_a1'] 			= '0';
			$data_pengajuan['status_p_a2'] 			= '0';
			$data_pengajuan['status_p_a3'] 			= '0';
			$data_pengajuan['status_p_a4'] 			= '0';
			$data_pengajuan['status_pengajuan'] 	= '0';
			$data_pengajuan['catatan_pengajuan'] 	= '0';

			//ke tabel pekerjaan
			$id_pengajuan = $this->pengajuan_m->set_pengajuan($data_pengajuan);

			//ke tabel aplikasi
			for ($i=0; $i <= count($this->input->post('aplikasi'))-1 ; $i++) {
				$data_aplikasi['id_pengajuan'] 	= $id_pengajuan;
				$data_aplikasi['id_aplikasi'] 	= $this->input->post('aplikasi')[$i];
				
				$this->pengajuan_m->set_aplikasi($data_aplikasi);	
			}

			//ke tabel jeis peralatan
			for ($i=0; $i <= count($this->input->post('jPeralatan'))-1 ; $i++) {
				$data_jPeralatan['id_pengajuan'] 	= $id_pengajuan;
				$data_jPeralatan['id_jPeralatan'] 	= $this->input->post('jPeralatan')[$i];
				
				$this->pengajuan_m->set_jPeralatan($data_jPeralatan);	
			}

			//ke tabel bahaya
			for ($i=0; $i <= count($this->input->post('bahaya'))-1 ; $i++) {
				$data_bahaya['id_pengajuan'] 	= $id_pengajuan;
				$data_bahaya['id_bahaya'] 		= $this->input->post('bahaya')[$i];
				
				$this->pengajuan_m->set_bahaya($data_bahaya);	
			}

			//ke tabel tindakan pencegahan
			for ($i=0; $i <= count($this->input->post('tPencegahan'))-1 ; $i++) {
				$data_tPencegahan['id_pengajuan'] 		= $id_pengajuan;
				$data_tPencegahan['id_tPencegahan'] 	= $this->input->post('tPencegahan')[$i];
				
				$this->pengajuan_m->set_tPencegahan($data_tPencegahan);	
			}

			//ke tabel apd
			for ($i=0; $i <= count($this->input->post('apd'))-1 ; $i++) {
				$data_apd['id_pengajuan'] 	= $id_pengajuan;
				$data_apd['id_apd'] 		= $this->input->post('apd')[$i];
				
				$this->pengajuan_m->set_apd($data_apd);	
			}

			//ke tabel pengawas
			for ($i=0; $i <= count($this->input->post('pengawas'))-1 ; $i++) {
				$data_pengawas['id_pengajuan'] 	= $id_pengajuan;
				$data_pengawas['nama_pengawas'] = $this->input->post('pengawas')[$i];
				$data_pengawas['kontraktor']	= $this->input->post('kontraktor')[$i];
				
				$this->pengajuan_m->set_pengawas($data_pengawas);	
			}

			//ke tabel petugas
			for ($i=0; $i <= count($this->input->post('pekerja'))-1 ; $i++) {
				$data_petugas['id_pengajuan'] 	= $id_pengajuan;
				$data_petugas['nama_pekerja']	= $this->input->post('pekerja')[$i];
				
				$this->pengajuan_m->set_pekerja($data_petugas);
			}

			//ke tabel peralatan
			for ($i=0; $i <= count($this->input->post('peralatan'))-1 ; $i++) {
				$data_peralatan['id_pengajuan'] = $id_pengajuan;
				$data_peralatan['nama_alat']	= $this->input->post('peralatan')[$i];
				$data_peralatan['status']		= $this->input->post('status')[$i];
				
				$this->pengajuan_m->set_peralatan($data_peralatan);
			}

			//ke tabel detail pekerjaan
			for ($i=0; $i <= count($this->input->post('dPekerjaan'))-1 ; $i++) {
				$data_detailKerja['id_pengajuan'] 	= $id_pengajuan;
				$data_detailKerja['nama_pekerjaan']	= $this->input->post('dPekerjaan')[$i];
				
				$this->pengajuan_m->set_detailKerja($data_detailKerja);
			}

			//ke tabel k2
			for ($i=0; $i <= count($this->input->post('k2'))-1 ; $i++) {
				$data_k2['id_pengajuan'] 	= $id_pengajuan;
				$data_k2['nama_peralatan']	= $this->input->post('k2')[$i];
				
				$this->pengajuan_m->set_k2($data_k2);
			}

			//ke tabel langkah kerja
			for ($i=0; $i <= count($this->input->post('lKerja'))-1 ; $i++) {
				$data_langkahPengerjaan['id_pengajuan'] = $id_pengajuan;
				$data_langkahPengerjaan['lKerja']		= $this->input->post('lKerja')[$i];
				$data_langkahPengerjaan['pBahaya']		= $this->input->post('pBahaya')[$i];
				$data_langkahPengerjaan['apd']			= $this->input->post('apd_k')[$i];
				$data_langkahPengerjaan['pRekomendasi']	= $this->input->post('pRekomendasi')[$i];
				
				$this->pengajuan_m->set_langkahPengerjaan($data_langkahPengerjaan);
			}

			$this->session->set_flashdata('msg', '<div class="alert alert-success text-center text-capitalize">tambah pengajuan berhasil</div>');
			redirect(base_url('pengajuan'));
			exit;
		}
//========================================================================
		$id['id_vendor'] = $this->session->userdata('id_vendor');

		$data = array(
				'title'			=> $this->uri->segment(1).'|'.str_replace('_', ' ', $this->uri->segment(2)),
				'navbar' 		=> 'navbar_custom',
				'content'		=> 'tambah_pengajuan',
				'nama_vendor'	=> $this->vendor_m->get_namaVendor($id),
				'd_rayon'		=> $this->pengajuan_m->get_d_rayon(),
				'd_penyulang'	=> $this->pengajuan_m->get_d_penyulang(),
				'd_aplikasi'	=> $this->pengajuan_m->get_d_aplikasi(),
				'd_jPeralatan'	=> $this->pengajuan_m->get_d_jPeralatan(),
				'd_bahaya'		=> $this->pengajuan_m->get_d_bahaya(),
				'd_tPencegahan'	=> $this->pengajuan_m->get_d_tPencegahan(),
				'd_apd'			=> $this->pengajuan_m->get_d_apd()
			);
		$this->load->view('includes/template', $data);
	}

	public function ubah_pengajuan()
	{
		if ($this->input->post('ubah')) {
			
			$upload = empty($_FILES["diagram"]["tmp_name"]);

			if (!$upload) {
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
			}

			$name_diagram = $this->input->post('last_diagram');

			$data_pengajuan['area'] 				= $this->input->post('area');
			$data_pengajuan['id_rayon'] 			= $this->input->post('rayon');
			$data_pengajuan['id_penyulang'] 		= $this->input->post('penyulang');
			$data_pengajuan['no_dok'] 				= $this->input->post('no_dok');
			$data_pengajuan['lokasi'] 				= $this->input->post('lokasi');
			$data_pengajuan['id_vendor'] 			= $this->input->post('vendor');
			$data_pengajuan['nama_pekerjaan'] 		= $this->input->post('kerja');
			$data_pengajuan['tindakan_keselamatan'] = $this->input->post('tindakan_keselamatan');
			$data_pengajuan['tgl_mulai'] 			= $this->input->post('tgl_awal');
			$data_pengajuan['tgl_berakhir'] 		= $this->input->post('tgl_akhir');
			$data_pengajuan['tgl_pengajuan'] 		= $this->input->post('tgl_pengajuan');
			$data_pengajuan['single_line'] 			= $name_diagram;
			$data_pengajuan['catatan_peralatan'] 	= $this->input->post('catatan');
			$data_pengajuan['status_pemadaman'] 	= $this->input->post('pemadaman');


			$id['id_pengajuan'] = base64_decode($this->input->post('id_pengajuan'));
			$id_pengajuan 		= base64_decode($this->input->post('id_pengajuan'));
			//========================================================================
			$this->pengajuan_m->update_pengajuan($id, $data_pengajuan);
			//========================================================================
			$this->pengajuan_m->delete_a_aplikasi($id);
			//ke tabel aplikasi
			for ($i=0; $i <= count($this->input->post('aplikasi'))-1 ; $i++) {
				$data_aplikasi['id_pengajuan'] 	= $id_pengajuan;
				$data_aplikasi['id_aplikasi'] 	= $this->input->post('aplikasi')[$i];
				
				$this->pengajuan_m->set_aplikasi($data_aplikasi);	
			}
			//========================================================================
			$this->pengajuan_m->delete_a_jPeralatan($id);
			//ke tabel jeis peralatan
			for ($i=0; $i <= count($this->input->post('jPeralatan'))-1 ; $i++) {
				$data_jPeralatan['id_pengajuan'] 	= $id_pengajuan;
				$data_jPeralatan['id_jPeralatan'] 	= $this->input->post('jPeralatan')[$i];
				
				$this->pengajuan_m->set_jPeralatan($data_jPeralatan);	
			}
			//========================================================================
			$this->pengajuan_m->delete_a_bahaya($id);
			//ke tabel bahaya
			for ($i=0; $i <= count($this->input->post('bahaya'))-1 ; $i++) {
				$data_bahaya['id_pengajuan'] 	= $id_pengajuan;
				$data_bahaya['id_bahaya'] 		= $this->input->post('bahaya')[$i];
				
				$this->pengajuan_m->set_bahaya($data_bahaya);	
			}
			//========================================================================
			$this->pengajuan_m->delete_a_tPencegahan($id);
			//ke tabel tindakan pencegahan
			for ($i=0; $i <= count($this->input->post('tPencegahan'))-1 ; $i++) {
				$data_tPencegahan['id_pengajuan'] 		= $id_pengajuan;
				$data_tPencegahan['id_tPencegahan'] 	= $this->input->post('tPencegahan')[$i];
				
				$this->pengajuan_m->set_tPencegahan($data_tPencegahan);	
			}
			//========================================================================
			$this->pengajuan_m->delete_a_apd($id);
			//ke tabel apd
			for ($i=0; $i <= count($this->input->post('apd'))-1 ; $i++) {
				$data_apd['id_pengajuan'] 	= $id_pengajuan;
				$data_apd['id_apd'] 		= $this->input->post('apd')[$i];
				
				$this->pengajuan_m->set_apd($data_apd);	
			}
			//========================================================================
			$this->pengajuan_m->delete_a_pengawas($id);
			//ke tabel pengawas
			for ($i=0; $i <= count($this->input->post('pengawas'))-1 ; $i++) {
				$data_pengawas['id_pengajuan'] 	= $id_pengajuan;
				$data_pengawas['nama_pengawas'] = $this->input->post('pengawas')[$i];
				$data_pengawas['kontraktor']	= $this->input->post('kontraktor')[$i];
				
				$this->pengajuan_m->set_pengawas($data_pengawas);	
			}
			//========================================================================
			$this->pengajuan_m->delete_a_pekerja($id);
			//ke tabel petugas
			for ($i=0; $i <= count($this->input->post('pekerja'))-1 ; $i++) {
				$data_petugas['id_pengajuan'] 	= $id_pengajuan;
				$data_petugas['nama_pekerja']	= $this->input->post('pekerja')[$i];
				
				$this->pengajuan_m->set_pekerja($data_petugas);
			}
			//========================================================================
			$this->pengajuan_m->delete_a_peralatan($id);
			//ke tabel peralatan
			for ($i=0; $i <= count($this->input->post('peralatan'))-1 ; $i++) {
				$data_peralatan['id_pengajuan'] = $id_pengajuan;
				$data_peralatan['nama_alat']	= $this->input->post('peralatan')[$i];
				$data_peralatan['status']		= $this->input->post('status')[$i];
				
				$this->pengajuan_m->set_peralatan($data_peralatan);
			}
			//========================================================================
			$this->pengajuan_m->delete_a_detailKerja($id);
			//ke tabel detail pekerjaan
			for ($i=0; $i <= count($this->input->post('dPekerjaan'))-1 ; $i++) {
				$data_detailKerja['id_pengajuan'] 	= $id_pengajuan;
				$data_detailKerja['nama_pekerjaan']	= $this->input->post('dPekerjaan')[$i];
				
				$this->pengajuan_m->set_detailKerja($data_detailKerja);
			}
			//========================================================================
			$this->pengajuan_m->delete_a_k2($id);
			//ke tabel k2
			for ($i=0; $i <= count($this->input->post('k2'))-1 ; $i++) {
				$data_k2['id_pengajuan'] 	= $id_pengajuan;
				$data_k2['nama_peralatan']	= $this->input->post('k2')[$i];
				
				$this->pengajuan_m->set_k2($data_k2);
			}
			//========================================================================
			$this->pengajuan_m->delete_a_langkahPengerjaan($id);
			//ke tabel langkah kerja
			for ($i=0; $i <= count($this->input->post('lKerja'))-1 ; $i++) {
				$data_langkahPengerjaan['id_pengajuan'] = $id_pengajuan;
				$data_langkahPengerjaan['lKerja']		= $this->input->post('lKerja')[$i];
				$data_langkahPengerjaan['pBahaya']		= $this->input->post('pBahaya')[$i];
				$data_langkahPengerjaan['apd']			= $this->input->post('apd_k')[$i];
				$data_langkahPengerjaan['pRekomendasi']	= $this->input->post('pRekomendasi')[$i];
				
				$this->pengajuan_m->set_langkahPengerjaan($data_langkahPengerjaan);
			}
			

			$this->session->set_flashdata('msg', '<div class="alert alert-success text-center text-capitalize">ubah berhasil</div>');
			redirect(base_url('pengajuan'));
			exit;
		}
//========================================================================
		$id['pengajuan.id_pengajuan'] = base64_decode($this->input->get('id'));
		$data = array(
				'title'				=> $this->uri->segment(1).'|'.str_replace('_', ' ', $this->uri->segment(2)),
				'navbar' 			=> 'navbar_custom',
				'content'			=> 'ubah_pengajuan',
				'dt_pengajuan'		=> $this->pengajuan_m->get_pengajuan_by_idPengajuan($id),
				'd_a_aplikasi'		=> $this->single_array($this->pengajuan_m->get_aplikasi_by_idPengajuan($id)),
				'd_a_jPeralatan'	=> $this->single_array($this->pengajuan_m->get_jenisPeralatan_by_idPengajuan($id)),
				'd_a_bahaya'		=> $this->single_array($this->pengajuan_m->get_bahayaPekerjaaan_by_idPengajuan($id)),
				'd_a_tPencegahan'	=> $this->single_array($this->pengajuan_m->get_tindakanPencegahan_by_idPengajuan($id)),
				'd_a_apd'			=> $this->single_array($this->pengajuan_m->get_apd_by_idPengajuan($id)),
				'd_a_pengawas'		=> $this->pengajuan_m->get_pengawas_by_idPengajuan($id),
				'd_a_petugas'		=> $this->pengajuan_m->get_pekerja_by_idPengajuan($id),
				'd_a_peralatan'		=> $this->pengajuan_m->get_peralatan_by_idPengajuan($id),
				'd_a_dPekerjaan'	=> $this->pengajuan_m->get_detailPekerjaan_by_idPengajuan($id),
				'd_a_k2'			=> $this->pengajuan_m->get_k2_by_idPengajuan($id),
				'd_a_lPengerjaan'	=> $this->pengajuan_m->get_langkahPengerjaan_by_idPengajuan($id),

				'd_rayon'			=> $this->pengajuan_m->get_d_rayon(),
				'd_penyulang'		=> $this->pengajuan_m->get_d_penyulang(),
				'd_aplikasi'		=> $this->pengajuan_m->get_d_aplikasi(),
				'd_jPeralatan'		=> $this->pengajuan_m->get_d_jPeralatan(),
				'd_bahaya'			=> $this->pengajuan_m->get_d_bahaya(),
				'd_tPencegahan'		=> $this->pengajuan_m->get_d_tPencegahan(),
				'd_apd'				=> $this->pengajuan_m->get_d_apd()
			);
		$this->load->view('includes/template', $data);
	}

	public function ajukan_pengajuan()
	{
		$id['pengajuan.id_pengajuan'] = base64_decode($this->input->get('id'));
		$data_pengajuan['status_pengajuan'] 	= '1';

		$ajukan = $this->pengajuan_m->update_pengajuan($id, $data_pengajuan);

		if ($ajukan == TRUE) {
			$this->session->set_flashdata('msg', '<div class="alert alert-success text-center text-capitalize">ajukan pengajuan berhasil</div>');
			redirect(base_url('pengajuan'));
			exit;
		}
	}

	public function hapus_pengajuan()
	{
		$id['pengajuan.id_pengajuan'] = base64_decode($this->input->get('id'));

		//menghapus file diagram di folder single line
		$this->_delete_file('./single_line/', $this->pengajuan_m->get_diagram_by_idPengajuan($id));

		//menghapus record pada table
		$this->pengajuan_m->delete_pengajuan($id);
			
		$this->session->set_flashdata('msg', '<div class="alert alert-success text-center text-capitalize">hapus berhasil</div>');
		redirect(base_url('pengajuan'));
		exit;
	}
}