<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        //validasi jika user belum login
        $this->data['CI'] = &get_instance();
        $this->load->helper(array('form', 'url'));
        $this->load->model('M_login');
    }

    public function index()
    {
        $this->data['title_web'] = 'Halaman Login | SIG Kakao Pesawaran';
        $this->load->view('v_login', $this->data);
    }

    public function auth()
    {
        $user = htmlspecialchars($this->input->post('username', TRUE), ENT_QUOTES);
        $pass = htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES);
        // auth
        $proses_login = $this->db->query("SELECT * FROM users WHERE username='$user' AND password = md5('$pass')");
        $row = $proses_login->num_rows();
        if ($row > 0) {
            $hasil_login = $proses_login->row_array();

            // create session
            $this->session->set_userdata('masuk_sistem_rekam', TRUE);
            $this->session->set_userdata('status', $hasil_login['status']);
            $this->session->set_userdata('ses_id', $hasil_login['idUsers']);
            echo '<script>window.location="' . base_url() . 'dashboard";</script>';
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Login Gagal, Periksa Kembali Username dan Password Anda!<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('administrator');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        echo '<script>window.location="' . base_url('administrator') . '";</script>';
    }
}
