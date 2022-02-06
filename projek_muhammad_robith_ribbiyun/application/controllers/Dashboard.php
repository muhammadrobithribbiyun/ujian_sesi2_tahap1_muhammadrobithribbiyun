<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta'); 
		$this->load->model('m_data');
		if($this->session->userdata('status')!="telah_login"){
			redirect(base_url()."login?alert=belum_login");
		}
	}
	public function index()
	{

	// hitung jumlah pengguna

		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_index');
		$this->load->view('dashboard/v_footer');
	} 
	public function keluar()
	{
		$this->session->sess_destroy();
		redirect('login?alert=logout'); 
	}
	public function ganti_password()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_ganti_password');
		$this->load->view('dashboard/v_footer');
	}
	public function ganti_password_aksi()
	{
		// form validasi
		$this->form_validation->set_rules('password_lama','Password Lama','required');
		$this->form_validation->set_rules('password_baru','Password Baru','required|min_length[8]');
		$this->form_validation->set_rules('konfirmasi_password','Konfirmasi Password
			Baru','required|matches[password_baru]');
		// cek validasi
		if($this->form_validation->run() != false){
			// menangkap data dari form
			$password_lama = $this->input->post('password_lama');
			$password_baru = $this->input->post('password_baru');
			$konfirmasi_password = $this->input->post('konfirmasi_password');
			// cek kesesuaian password lama dengan id pengguna yang sedang login dan password lama
			$where = array(
				'pengguna_id' => $this->session->userdata('id'),
				'pengguna_password' => md5($password_lama)
			);
			$cek = $this->m_data->cek_login('pengguna', $where)->num_rows();
			// cek kesesuaikan password lama
			if($cek > 0){
				// update data password pengguna
				$w = array(
					'pengguna_id' => $this->session->userdata('id')
				);
				$data = array(
					'pengguna_password' => md5($password_baru)
				);
				$this->m_data->update_data($where, $data, 'pengguna');
				// alihkan halaman kembali ke halaman ganti password
				redirect('dashboard/ganti_password?alert=sukses');
			}else{
				// alihkan halaman kembali ke halaman ganti password
				redirect('dashboard/ganti_password?alert=gagal');
			}
		}else{
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_ganti_password');
			$this->load->view('dashboard/v_footer');
		}
	}

	public function profil()
	{
		// id pengguna yang sedang login
		$id_pengguna = $this->session->userdata('id');
		$where = array(
			'pengguna_id' => $id_pengguna
		);
		$data['profil'] = $this->m_data->edit_data($where,'pengguna')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_profil',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function profil_update()
	{
		// Wajib isi nama dan email
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('email','Email','required');
		if($this->form_validation->run() != false){
			$id = $this->session->userdata('id');
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$where = array(
				'pengguna_id' => $id
			);
			$data = array(
				'pengguna_nama' => $nama,
				'pengguna_email' => $email );
			$this->m_data->update_data($where,$data,'pengguna');
			redirect(base_url().'dashboard/profil/?alert=sukses');
		}else{
		// id pengguna yang sedang login 
			$id_pengguna = $this->session->userdata('id');
			$where = array(
				'pengguna_id' => $id_pengguna
			);
			$data['profil'] = $this->m_data->edit_data($where,'pengguna')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_profil',$data);
			$this->load->view('dashboard/v_footer');
		}
	}



	
	public function pengguna()
	{
		$data['pengguna'] = $this->m_data->get_data('pengguna')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pengguna',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function pengguna_tambah()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pengguna_tambah');
		$this->load->view('dashboard/v_footer');
	}
	public function pengguna_aksi()
	{
	// Wajib isi
		$this->form_validation->set_rules('nama','Nama Pengguna','required');
		$this->form_validation->set_rules('email','Email Pengguna','required');
		$this->form_validation->set_rules('username','Username Pengguna','required');
		$this->form_validation->set_rules('password','Password Pengguna','required|min_length[8]');
		$this->form_validation->set_rules('level','Level Pengguna','required');
		$this->form_validation->set_rules('status','Status Pengguna','required');
		if($this->form_validation->run() != false){
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$level = $this->input->post('level');
			$status = $this->input->post('status');
			$data = array(
				'pengguna_nama' => $nama,
				'pengguna_email' => $email,
				'pengguna_username' => $username,
				'pengguna_password' => $password,
				'pengguna_level' => $level,
				'pengguna_status' => $status
			);
			$this->m_data->insert_data($data,'pengguna');
			redirect(base_url().'dashboard/pengguna');
		}else{
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_pengguna_tambah');
			$this->load->view('dashboard/v_footer');
		}
	}
	
	public function pengguna_edit($id)
	{
		$where = array(
			'pengguna_id' => $id
		);
		$data['pengguna'] = $this->m_data->edit_data($where,'pengguna')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pengguna_edit',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function pengguna_update()
	{
	// Wajib isi
		$this->form_validation->set_rules('nama','Nama Pengguna','required');
		$this->form_validation->set_rules('email','Email Pengguna','required');
		$this->form_validation->set_rules('username','Username Pengguna','required');
		$this->form_validation->set_rules('level','Level Pengguna','required');
		$this->form_validation->set_rules('status','Status Pengguna','required');
		if($this->form_validation->run() != false){
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			$level = $this->input->post('level');
			$status = $this->input->post('status');
	//cek jika form password tidak diisi, maka jangan update kolum password, dan sebaliknya
			if($this->input->post('password') == ""){
				$data = array(
					'pengguna_nama' => $nama,
					'pengguna_email' => $email,
					'pengguna_username' => $username,
					'pengguna_level' => $level,
					'pengguna_status' => $status
				);
			}else{
				$data = array(
					'pengguna_nama' => $nama,
					'pengguna_email' => $email,
					'pengguna_username' => $username,
					'pengguna_password' => $password,
					'pengguna_level' => $level,
					'pengguna_status' => $status
				);
			}
			$where = array(
				'pengguna_id' => $id
			);
			$this->m_data->update_data($where,$data,'pengguna');
			redirect(base_url().'dashboard/pengguna');
		}else{
			$id = $this->input->post('id');
			$where = array(
				'pengguna_id' => $id
			);
			$data['pengguna'] = $this->m_data->edit_data($where,'pengguna')->result();
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_pengguna_edit',$data);
			$this->load->view('dashboard/v_footer');
		}
	}
	public function pengguna_hapus($id)
	{
		$where = array(
			'pengguna_id' => $id
		);
		$this->m_data->delete_data($where,'pengguna');
		redirect(base_url().'dashboard/pengguna?alert=done');
	}
//-------------------Penyakit-----------------------------------------
	public function penyakit()
	{
		$data['penyakit'] = $this->m_data->get_data('penyakit')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_penyakit',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function penyakit_tambah()
	{
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_penyakit_tambah');
		$this->load->view('dashboard/v_footer');
	}
	public function penyakit_aksi()
	{
	// Wajib isi
		$this->form_validation->set_rules('nama','Nama Pengguna','required');
		$this->form_validation->set_rules('ket','Ket','required');
		if($this->form_validation->run() != false){
			$nama = $this->input->post('nama');
			$ket = $this->input->post('ket');
			
			$data = array(
				'penyakit_nama' => $nama,
				'penyakit_desc' => $ket,
			);
			$this->m_data->insert_data($data,'penyakit');
			redirect(base_url().'dashboard/penyakit?alert=done');
		}else{
			$this->load->view('dashboard/v_header');
			$this->load->view('dashboard/v_penyakit_tambah');
			$this->load->view('dashboard/v_footer');
		}
	}
	public function penyakit_edit($id)
	{
		$where = array(
			'penyakit_id' => $id
		);
		$data['penyakit'] = $this->m_data->edit_data($where,'penyakit')->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_penyakit_edit',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function penyakit_update()
	{
	// Wajib isi
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('ket','Ket','required');
		if($this->form_validation->run() != false){
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$ket = $this->input->post('ket');
			$data = array(
			'penyakit_nama' => $nama,
			'penyakit_desc' => $ket,
				);
			
			$where = array(
				'penyakit_id' => $id
			);
			$this->m_data->update_data($where,$data,'penyakit');
			redirect(base_url().'dashboard/penyakit?alert=update');
		}else{
			$id = $this->input->post('id');
			$where = array(
				'penyakit_id' => $id
			);
			$data['penyakit'] = $this->m_data->edit_data($where,'penyakit')->result();
			redirect(base_url().'dashboard/penyakit_edit?alert=gagal');
		}
	}
	public function penyakit_hapus($id)
	{
		$where = array(
			'penyakit_id' => $id
		);
		$this->m_data->delete_data($where,'penyakit');
		redirect(base_url().'dashboard/penyakit?alert=done2');
	}
//-----------------------------------------pasien--------------------------------------
	public function pasien()
	{	
		$data['pasien'] = $this->db->query("SELECT * FROM pengguna WHERE
			pengguna_level='pasien'  order by pengguna_nama asc")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_pasien',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function pasien_periksa($id)
	{
		$where = array(
			'pengguna_id' => $id
		);
		$data['periksa'] = $this->m_data->edit_data($where,'pengguna')->result();
		$data['penyakit'] = $this->db->query("SELECT * FROM penyakit order by penyakit_nama asc")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_periksa',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function pasien_aksi()
	{
	// Wajib isi
		$this->form_validation->set_rules('penyakit','Penyakit','required');
		$this->form_validation->set_rules('tindakan','Tindakan','required');
		if($this->form_validation->run() != false){
			$dokter = $this->session->userdata('id');
			$pasien = $this->input->post('id2');
			$penyakit = $this->input->post('penyakit');
			$tindakan = $this->input->post('tindakan');
			$obat = $this->input->post('obat');
			$status = $this->input->post('status');

			$data = array(
				'riwayat_dokter' => $dokter,
				'riwayat_pasien' => $pasien,
				'riwayat_penyakit' => $penyakit,
				'riwayat_tindakan' => $tindakan,
				'riwayat_resep' => $obat,
				'riwayat_status' => $status,
			);
			$this->m_data->insert_data($data,'riwayat_medik');
			redirect(base_url().'dashboard/periksa?alert=done');
		}else{
			redirect(base_url().'dashboard/pasien');
		}
	}
//---------------------------------------data medis--------------------------------------
	public function periksa()
	{	
		$data['riwayat'] = $this->db->query("SELECT * FROM riwayat_medik,pengguna,penyakit where pengguna_id=riwayat_pasien and riwayat_penyakit=penyakit_id order by riwayat_id desc")->result();
		$data['pasien'] = $this->db->query("SELECT * FROM riwayat_medik,pengguna,penyakit where pengguna_id=riwayat_dokter and riwayat_penyakit=penyakit_id order by riwayat_id desc")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_riwayat',$data);
		$this->load->view('dashboard/v_footer');
	}
//---------------------------------------Pembayaran---------------------------------------
	public function pembayaran()
	{	
		$data['pasien'] = $this->db->query("SELECT * FROM riwayat_medik,pengguna,penyakit where pengguna_id=riwayat_pasien and riwayat_penyakit=penyakit_id order by riwayat_id desc")->result();
		$data['administrasi'] = $this->db->query("SELECT * FROM pembayaran_administrasi,riwayat_medik,pengguna where pengguna_id=pembayaran_by and riwayat_id=pembayaran_riwayat order by pembayaran_id desc")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_administrasi',$data);
		$this->load->view('dashboard/v_footer');
	}
//-------------------------------------------administrasi----------------------------------
	public function administrasi($id)
	{
		$data['administrasi'] = $this->db->query("SELECT * FROM riwayat_medik,pengguna,penyakit where pengguna_id=riwayat_pasien and riwayat_penyakit=penyakit_id and riwayat_id=$id order by riwayat_id desc")->result();
		$this->load->view('dashboard/v_header');
		$this->load->view('dashboard/v_form_administrasi',$data);
		$this->load->view('dashboard/v_footer');
	}
	public function administrasi_aksi()
	{
	// Wajib isi
		$this->form_validation->set_rules('bayar','Bayar','required');
		if($this->form_validation->run() != false){
			$pegawai = $this->session->userdata('id');
			$riwayat = $this->input->post('id2');
			$total = $this->input->post('bayar');
			$status = $this->input->post('status');
			$data = array(
				'pembayaran_riwayat' => $riwayat,
				'pembayaran_total' => $total,
				'pembayaran_by' => $pegawai,
			);
			$data2 = array(
				'riwayat_status' => $status,
			);
			$where = array(
				'riwayat_id' => $riwayat,
			);
			$this->m_data->update_data($where,$data2,'riwayat_medik');
			$this->m_data->insert_data($data,'pembayaran_administrasi');
			redirect(base_url().'dashboard/pembayaran?alert=done');
		}else{
			redirect(base_url().'dashboard/pasien');
		}
	}



}
?>