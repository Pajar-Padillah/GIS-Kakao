<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		//validasi jika user belum login
		$this->data['CI'] = &get_instance();
		$this->load->helper(array('form', 'url'));
		$this->load->model('M_Admin');
		if ($this->session->userdata('masuk_sistem_rekam') != TRUE) {
			$url = base_url('administrator');
			redirect($url);
		}
	}

	public function index()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->db->order_by('idUsers', 'desc');
		$this->data['user'] = $this->M_Admin->get_table('users');

		$this->data['title_web'] = 'Data User | SIG Kakao Pesawaran';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('user/user_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function tambah()
	{
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$this->data['user'] = $this->M_Admin->get_table('users');

		$this->data['title_web'] = 'Tambah User | SIG Kakao Pesawaran';
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('user/tambah_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}

	public function add()
	{
		$nama = htmlentities($this->input->post('namaLengkap', TRUE));
		$user = htmlentities($this->input->post('username', TRUE));
		$pass = md5(htmlentities($this->input->post('password', TRUE)));
		$status = htmlentities($this->input->post('status', TRUE));

		// setting konfigurasi upload
		$nmfile = "user_" . time();
		$config['upload_path'] = './assets_style/image/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['file_name'] = $nmfile;
		// load library upload
		$this->load->library('upload', $config);
		// upload gambar 1
		$this->upload->do_upload('foto');
		$result1 = $this->upload->data();
		$result = array('foto' => $result1);
		$data1 = array('upload_data' => $this->upload->data());
		$data = array(
			'namaLengkap' => $nama,
			'username' => $user,
			'password' => $pass,
			'status' => $status,
			'foto' => $data1['upload_data']['file_name'],
		);
		$this->db->insert('users', $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Tambah user berhasil !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect(base_url('user'));
	}

	public function edit()
	{
		if ($this->uri->segment('3') == '') {
			echo '<script>alert("User tidak ditemukan");window.location="' . base_url('user') . '";</script>';
		}
		$this->data['idbo'] = $this->session->userdata('ses_id');
		$count = $this->M_Admin->CountTableId('users', 'idUsers', $this->uri->segment('3'));
		if ($count > 0) {
			$this->data['user'] = $this->M_Admin->get_tableid_edit('users', 'idUsers', $this->uri->segment('3'));
			$this->data['title_web'] = 'Edit User | SIG Kakao Pesawaran';
			$this->load->view('header_view', $this->data);
			$this->load->view('sidebar_view', $this->data);
			$this->load->view('user/edit_view', $this->data);
			$this->load->view('footer_view', $this->data);
		}
	}

	public function upd()
	{
		$nama = htmlentities($this->input->post('namaLengkap', TRUE));
		$user = htmlentities($this->input->post('username', TRUE));
		$pass = htmlentities($this->input->post('password', TRUE));
		$status = htmlentities($this->input->post('status', TRUE));
		$id_user = htmlentities($this->input->post('idUsers', TRUE));

		// setting konfigurasi upload
		$nmfile = "user_" . time();
		$config['upload_path'] = './assets_style/image/';
		$config['allowed_types'] = 'gif|jpg|jpeg|png';
		$config['file_name'] = $nmfile;
		// load library upload
		$this->load->library('upload', $config);
		// upload gambar 1


		if (!$this->upload->do_upload('foto')) {
			if ($this->input->post('password') !== '') {
				$data = array(
					'namaLengkap' => $nama,
					'username' => $user,
					'password' => md5($pass),
					'status' => $status,
				);
				$this->M_Admin->update_table('users', 'idUsers', $id_user, $data);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil Update User : ' . $nama . ' !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect(base_url('user'));
			} else {
				$data = array(
					'namaLengkap' => $nama,
					'username' => $user,
					'status' => $status,
				);
				$this->M_Admin->update_table('users', 'idUsers', $id_user, $data);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil Update User : ' . $nama . ' !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect(base_url('user'));
			}
		} else {
			$result1 = $this->upload->data();
			$result = array('foto' => $result1);
			$data1 = array('upload_data' => $this->upload->data());
			unlink('./assets_style/image/' . $this->input->post('gambar'));
			if ($this->input->post('password') !== '') {
				$data = array(
					'namaLengkap' => $nama,
					'username' => $user,
					'password' => md5($pass),
					'status' => $status,
					'foto' => $data1['upload_data']['file_name'],
				);
				$this->M_Admin->update_table('users', 'idUsers', $id_user, $data);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil Update User : ' . $nama . ' !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect(base_url('user'));
			} else {
				$data = array(
					'namaLengkap' => $nama,
					'username' => $user,
					'status' => $status,
					'foto' => $data1['upload_data']['file_name'],
				);
				$this->M_Admin->update_table('users', 'idUsers', $id_user, $data);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil Update User : ' . $nama . ' !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
				redirect(base_url('user'));
			}
		}
	}
	public function del()
	{
		if ($this->uri->segment('3') == '') {
			echo '<script>alert("User tidak ditemukan");window.location="' . base_url('user') . '";</script>';
		}

		$user = $this->M_Admin->get_tableid_edit('users', 'idUsers', $this->uri->segment('3'));
		unlink('./assets_style/image/' . $user->foto);
		$this->M_Admin->delete_table('users', 'idUsers', $this->uri->segment('3'));
		$this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Berhasil Hapus User !<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
		redirect(base_url('user'));
	}
}
