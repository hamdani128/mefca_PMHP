<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mikrobiologi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->session->sess_expiration = '60';
        $this->session->sess_expire_on_close = 'true';
        if ($this->session->userdata('log_in') != "login") {
            redirect(base_url("usr/login"));
        }
    }

    public function master()
    {
        $data = [
            'title' => "Admin Operasional - SILABKES",
            'content' => 'admin/pages/operation/mikrobiologi_master',
        ];
        $this->load->view('admin/layout/content', $data);
    }

    public function getdata_master()
    {
        $query = $this->db->get('mkb_parameter')->result();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($query));
    }

    public function insert_parameter()
    {
        date_default_timezone_set('Asia/Jakarta');
        $parameter = $this->input->post('parameter');
        $satuan = $this->input->post('satuan');
        $metode = $this->input->post('metode');
        $userid = $this->session->userdata('user_id');
        $now = date('Y-m-d H:i:s');

        $data = array(
            'parameter' => $parameter,
            'satuan' => $satuan,
            'metode' => $metode,
            'user_id' => $userid,
            'created_at' => $now,
            'updated_at' => $now
        );

        $query = $this->db->insert('mkb_parameter', $data);
        if ($query) {
            $response = array(
                'status' => 'success',
                'message' => 'Successfully Insert'
            );
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function update_master()
    {
        date_default_timezone_set('Asia/Jakarta');
        $payload = json_decode(file_get_contents('php://input'), true);
        $id = $payload['id'];
        $parameter = $payload['parameter'];
        $satuan = $payload['satuan'];
        $metode = $payload['metode'];
        $data = array(
            'parameter' => $parameter,
            'satuan' => $satuan,
            'metode' => $metode,
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $query = $this->db->where('id', $id)->update('mkb_parameter', $data);
        if ($query) {
            $response = array(
                'status' => 'success',
                'message' => 'Successfully Updated'
            );
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function delete_parameter()
    {
        $payload = json_decode(file_get_contents('php://input'), true);
        $id = $payload['id'];
        $query = $this->db->where('id', $id)->delete('mkb_parameter');
        if ($query) {
            $response = array(
                'status' => 'success',
                'message' => 'Successfully Deleted'
            );
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    // Menu Transaksi ======================================>

    public function transaksi()
    {
        $data = [
            'title' => "Medical Transaksi - SILABKES",
            'content' => 'admin/pages/operation/trans_mikrobiologi',
        ];
        $this->load->view('admin/layout/content', $data);
    }

    public function transaksi_permohonan()
    {
        $SQL = "SELECT * FROM mkb_request ORDER BY created_at DESC";
        $query = $this->db->query($SQL)->result();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($query));
    }
}
