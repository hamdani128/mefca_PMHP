<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper("url");
        $this->session->sess_expiration = '60';
        $this->session->sess_expire_on_close = 'true';
        if ($this->session->userdata('log_in') != "login") {
            redirect(base_url("admin/login"));
        }
    }

    public function index()
    {

        $level = $this->session->userdata('level');
        if ($level == 'Users') {
            $username = $this->session->userdata('username');
            $content = 'admin/pages/users/home';
            $jumlah_mdc = $this->db->distinct()->where('username', $username)->count_all_results('mdc_users_request');
            $jumlah_mkb = $this->db->distinct()->where('username', $username)->count_all_results('mkb_request');
            $jumlah_kma_air_minum = $this->db->distinct()->where('username', $username)->count_all_results('kma_users_request_air_minum');
            $jumlah_kma_air_bersih = $this->db->distinct()->where('username', $username)->count_all_results('kma_users_request_air_bersih');
            $jumlah_kma_badan_air = $this->db->distinct()->where('username', $username)->count_all_results('kma_users_request_badan_air');
            $data = [
                'title' => "Admin - SILABKES",
                'jumlah_mdc' => $jumlah_mdc,
                'jumlah_mkb' => $jumlah_mkb,
                'jumlah_kma_air_minum' => $jumlah_kma_air_minum,
                'jumlah_kma_air_bersih' => $jumlah_kma_air_bersih,
                'jumlah_kma_badan_air' => $jumlah_kma_badan_air,
                'content' => $content,
            ];
        } elseif ($level == 'Admin Operasional') {
            $jumlah_mdc = $this->db->count_all_results('mdc_users_request');
            $jumlah_mkb = $this->db->count_all_results('mkb_request');
            $jumlah_kma_air_minum = $this->db->count_all_results('kma_users_request_air_minum');
            $jumlah_kma_air_bersih = $this->db->count_all_results('kma_users_request_air_bersih');
            $jumlah_kma_badan_air = $this->db->count_all_results('kma_users_request_badan_air');
            $jumlah_register = $this->db->count_all_results('register');
            $content = 'admin/pages/operation/home';
            $data = [
                'title' => "Admin - SILABKES",
                'jumlah_mdc' => $jumlah_mdc,
                'jumlah_mkb' => $jumlah_mkb,
                'jumlah_kma_air_minum' => $jumlah_kma_air_minum,
                'jumlah_kma_air_bersih' => $jumlah_kma_air_bersih,
                'jumlah_kma_badan_air' => $jumlah_kma_badan_air,
                'jumlah_register' => $jumlah_register,
                'content' => $content,
            ];
        } else {
            $content = 'admin/pages/index';
            $data = [
                'title' => "Admin - SILABKES",
                'content' => $content,
            ];
        }
        $this->load->view('admin/layout/content', $data);
    }
}
