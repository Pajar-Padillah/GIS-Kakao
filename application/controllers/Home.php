<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'file'));
        $this->load->model('M_Admin');
    }

    public function index()
    {
        $data = array(
            'title_web' => 'Sistem Informasi Geografis Kakao Kab, Pesawaran',
            'kakao' => $this->M_Admin->get_table_maps('kakao')
        );
        $this->load->view('home/v_head', $data, FALSE);
        $this->load->view('home/v_utama', $data, FALSE);
    }
    public function info()
    {
        $this->data['idbo'] = $this->session->userdata('ses_id');
        $this->data['title_web'] = 'Biodata | SIG Kakao Pesawaran';
        $this->load->view('header_view', $this->data);
        $this->load->view('sidebar_view', $this->data);
        $this->load->view('biodata', $this->data);
        $this->load->view('footer_view', $this->data);
    }
    public function detail()
    {
        $count = $this->M_Admin->CountTableId('kakao', 'id_kakao', $this->uri->segment('3'));
        if ($count > 0) {
            $this->data['kakao'] = $this->M_Admin->get_tableid_edit('kakao', 'id_kakao', $this->uri->segment('3'));
        } else {
            echo '<script>alert("KAKAO TIDAK DITEMUKAN");window.location="' . base_url('kakao') . '"</script>';
        }

        $this->data['title_web'] = 'Detail Kakao | SIG Kakao';
        $this->load->view('home/v_head', $this->data);
        $this->load->view('home/detail', $this->data);
    }
}
