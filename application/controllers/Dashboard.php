<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
		$this->data['title_web'] = 'Dashboard | SIG Kakao Pesawaran';
		$this->data['kakao'] = $this->M_Admin->get_table_maps('kakao');
		$this->load->view('header_view', $this->data);
		$this->load->view('sidebar_view', $this->data);
		$this->load->view('dashboard_view', $this->data);
		$this->load->view('footer_view', $this->data);
	}
}
