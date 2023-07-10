<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    private $payload;
    private $now;
    private $userid;

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->session->sess_expiration = '60s';
        $this->session->sess_expire_on_close = 'true';
        if ($this->session->userdata('log_in') != "login") {
            redirect(base_url("usr/login"));
        }
        $this->payload = json_decode(file_get_contents('php://input'), true);
        date_default_timezone_set('Asia/Jakarta');
        $this->now = date('Y-m-d H:i:s');
        $this->userid = $this->session->userdata('user_id');
    }

    public function list_pengujian()
    {
        $data = [
            'title' => "Admin Operasional - MEFCA",
            'content' => 'admin/pages/operation/list_permohonan',
        ];
        $this->load->view('admin/layout/content', $data);
    }

    public function permohonan_getdata()
    {
        $query = $this->db->get("permohonan_request_users")->result();
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($query));
    }
}
