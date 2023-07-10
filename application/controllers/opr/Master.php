<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
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

    function sdm()
    {
        $data = [
            'title' => "Admin Operasional - MEFCA",
            'content' => 'admin/pages/operation/sdm',
        ];
        $this->load->view('admin/layout/content', $data);
    }

    function sdm_getdata()
    {
        $query = $this->db->get("sdm")->result();
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($query));
    }

    function insert_sdm()
    {
        $kode = rand(100000, 999999);
        $nama = $this->payload['nama'];
        $jk = $this->payload['jk'];
        $jabatan = $this->payload['jabatan'];
        $divisi = $this->payload['divisi'];
        $department = $this->payload['department'];

        $data = [
            'kode_sdm' => $kode,
            'nama' => $nama,
            'jk' => $jk,
            'jabatan' => $jabatan,
            'divisi' => $divisi,
            'departement' => $department,
            'status_akun' => 'Non Active',
            'user_id' => $this->userid,
            'created_at' => $this->now,
            'updated_at' => $this->now
        ];
        $query = $this->db->insert("sdm", $data);
        if ($query) {
            $response = [
                'status' => 'success',
                'message' => 'Inserted successfully'
            ];
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}
