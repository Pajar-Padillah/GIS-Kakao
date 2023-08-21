<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kakao extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//validasi jika user belum login
		$this->data['CI'] = &get_instance();
		$this->load->helper(array('form', 'url', 'file'));
		$this->load->model('M_Admin');
		if ($this->session->userdata('masuk_sistem_rekam') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		}
	}

	public function index()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->db->order_by('id_kakao', 'desc');
		$this->data['kakao'] = $this->M_Admin->get_table('kakao');

		$this->data['title_web'] = 'Data Kakao | SIG Kakao Pesawaran';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('kakao/kakao_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function tambah()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['kakao'] = $this->M_Admin->get_table('kakao');

		$this->data['title_web'] = 'Tambah Kakao | SIG Kakao Pesawaran';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('kakao/tambah_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function add()
	{
		$desa = htmlentities($this->input->post('desa', TRUE));
		$kecamatan = htmlentities($this->input->post('kecamatan', TRUE));
		$kabupaten = htmlentities($this->input->post('kabupaten', TRUE));
		$luas = htmlentities($this->input->post('luas', TRUE));
		$alamat = htmlentities($this->input->post('alamat', TRUE));
		$keterangan = htmlentities($this->input->post('keterangan', TRUE));
		$kategori = htmlentities($this->input->post('kategori', TRUE));
		$geojson = $this->input->post('geojson', TRUE);
		$latitude = htmlentities($this->input->post('latitude', TRUE));
		$longitude = htmlentities($this->input->post('longitude', TRUE));
		$warna = htmlentities($this->input->post('warna', TRUE));

		// setting konfigurasi upload
		$nmfile = $desa . '_' . time();
		$config['upload_path'] = './assets_style/file/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['file_name'] = $nmfile;
		// load library upload
		$this->load->library('upload', $config);

		// uploud file pertama
		if ($this->upload->do_upload('foto')) {
			$this->upload->data();
			$file1 = array('upload_data' => $this->upload->data());
		} else {
			return false;
		}

		$data = array(
			'desa' => $desa,
			'kecamatan' => $kecamatan,
			'kabupaten' => $kabupaten,
			'luas' => $luas,
			'alamat' => $alamat,
			'keterangan' => $keterangan,
			'kategori' => $kategori,
			'geojson' => $geojson,
			'latitude' => $latitude,
			'longitude' => $longitude,
			'warna' => $warna,
			'foto' => $file1['upload_data']['file_name']
		);
		$this->db->insert('kakao', $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert"> Tambah Kakao berhasil !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect(base_url('kakao'));
	}

	public function edit()
	{
		if ($this->uri->segment('3') == '') {
			echo '<script>alert("halaman tidak ditemukan");window.location="' . base_url('kakao') . '";</script>';
		}
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('kakao', 'id_kakao', $this->uri->segment('3'));
		if ($count > 0) {
			$this->data['kakao'] = $this->M_Admin->get_tableid_edit('kakao', 'id_kakao', $this->uri->segment('3'));
		} else {
			echo '<script>alert("UNIT TIDAK DITEMUKAN");window.location="' . base_url('kakao') . '"</script>';
		}
		$this->data['title_web'] = 'Edit Kakao | SIG Kakao Pesawaran';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('kakao/edit_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function detail()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('kakao', 'id_kakao', $this->uri->segment('3'));
		if ($count > 0) {
			$this->data['kakao'] = $this->M_Admin->get_tableid_edit('kakao', 'id_kakao', $this->uri->segment('3'));
		} else {
			echo '<script>alert("KAKAO TIDAK DITEMUKAN");window.location="' . base_url('kakao') . '"</script>';
		}

		$this->data['title_web'] = 'Detail Kakao | SIG Kakao';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('kakao/detail', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function upd()
	{
		$desa = htmlentities($this->input->post('desa', TRUE));
		$kecamatan = htmlentities($this->input->post('kecamatan', TRUE));
		$kabupaten = htmlentities($this->input->post('kabupaten', TRUE));
		$luas = htmlentities($this->input->post('luas', TRUE));
		$alamat = htmlentities($this->input->post('alamat', TRUE));
		$keterangan = htmlentities($this->input->post('keterangan', TRUE));
		$kategori = htmlentities($this->input->post('kategori', TRUE));
		$geojson = $this->input->post('geojson', TRUE);
		$latitude = htmlentities($this->input->post('latitude', TRUE));
		$longitude = htmlentities($this->input->post('longitude', TRUE));
		$warna = htmlentities($this->input->post('warna', TRUE));
		$id = htmlentities($this->input->post('id_kakao', TRUE));

		// setting konfigurasi upload
		$post = $this->input->post();
		$nmfile = $desa . '_' . time();
		$config['upload_path'] = './assets_style/file/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['max_size'] = 5000;
		$config['file_name'] = $nmfile;
		// load library upload
		$this->load->library('upload', $config);

		if (!empty($_FILES['foto']['name'])) {
			$this->upload->initialize($config);
			if ($this->upload->do_upload('foto')) {
				$this->upload->data();
				$file1 = array('upload_data' => $this->upload->data());
			} else {
				return false;
			}

			$foto = './assets_style/file/' . htmlentities($post['foto_old']);
			if (file_exists($foto)) {
				unlink($foto);
			}

			$data = array(
				'desa' => $desa,
				'kecamatan' => $kecamatan,
				'kabupaten' => $kabupaten,
				'luas' => $luas,
				'alamat' => $alamat,
				'keterangan' => $keterangan,
				'kategori' => $kategori,
				'geojson' => $geojson,
				'latitude' => $latitude,
				'longitude' => $longitude,
				'warna' => $warna,
				'foto' => $file1['upload_data']['file_name']
			);
		} else {
			$data = array(
				'desa' => $desa,
				'kecamatan' => $kecamatan,
				'kabupaten' => $kabupaten,
				'luas' => $luas,
				'alamat' => $alamat,
				'keterangan' => $keterangan,
				'kategori' => $kategori,
				'geojson' => $geojson,
				'latitude' => $latitude,
				'longitude' => $longitude,
				'warna' => $warna
			);
		}
		$this->M_Admin->update_table('kakao', 'id_kakao', $id, $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil Update Kakao : ' . $desa . ' !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect(base_url('kakao'));
	}

	public function del()
	{
		if ($this->uri->segment('3') == '') {
			echo '<script>alert("halaman tidak ditemukan");window.location="' . base_url('kakao') . '";</script>';
		}

		$kakao = $this->M_Admin->get_tableid_edit('kakao', 'id_kakao', $this->uri->segment('3'));
		unlink('./assets_style/file/' . $kakao->foto);
		$this->M_Admin->delete_table('kakao', 'id_kakao', $this->uri->segment('3'));
		$this->session->set_flashdata('pesan', '<div class="alert alert-warning" role="alert">Kakao Berhasil di Hapus!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect(base_url('kakao'));
	}
}
