<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permohonan extends CI_Controller
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

    public function pengujian()
    {
        $data = [
            'title' => "Admin Operasional - MEFCA",
            'content' => 'admin/pages/users/view_permohonan',
        ];
        $this->load->view('admin/layout/content', $data);
    }


    public function users_permohonan_getdata()
    {
        $username = $this->session->userdata('username');
        $query = $this->db->where('username', $username)->get('permohonan_request_users')->result();
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($query));
    }

    public function insert_users_permohonan()
    {
        $username = $this->session->userdata('username');
        $request_id = $username . random_int(100, 999);
        $asal_produk = $this->payload['asal_produk'];
        $perincian = $this->payload['perincian_produk'];
        $pengujian_mutu = $this->payload['pengujian_mutu'];

        $data = [
            'request_id' => $request_id,
            'username' => $username,
            'user_id' => $this->userid,
            'created_at' => $this->now,
            'updated_at' => $this->now,
            'asal_produk' => $asal_produk,
            'perincian_produk' => $perincian,
            'pengujian_mutu' => $pengujian_mutu,
            'status' => 'Request',
        ];
        $query = $this->db->insert("permohonan_request_users", $data);
        if ($query) {
            $response = array(
                'status' => 'success',
                'message' =>  'Succelssfully',
            );
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }


    public function delete_users_request_permohonan()
    {
        $id = $this->payload['id'];
        $query = $this->db->where('id', $id)->delete("permohonan_request_users");
        if ($query) {
            $response = array(
                'status' => 'success',
                'message' =>  'Succelssfully Deleted',
            );
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}
