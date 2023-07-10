<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Medical extends CI_Controller
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
            'content' => 'admin/pages/operation/medical_master',
        ];
        $this->load->view('admin/layout/content', $data);
    }

    public function getdata_master()
    {
        $SQL = "SELECT
                a.id as id,
                a.kategori_id as kategori_id,
                b.kategori as kategori,
                a.detail as detail,
                a.harga as harga
                FROM mdc_harga a LEFT JOIN mdc_kategori b ON a.kategori_id = b.id";
        $query1 = $this->db->query($SQL)->result();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($query1));
    }

    public function getdata_kategori_master()
    {
        $query1 = $this->db->get("mdc_kategori")->result();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($query1));
    }


    public function insert_kategori()
    {
        date_default_timezone_set('Asia/jakarta');
        $now = date('Y-m-d H:i:s');
        $user_id = $this->session->userdata('user_id');
        $json = file_get_contents('php://input');
        $input = json_decode($json, true);
        $kategori = $input["kategori"];

        $data = array(
            'kategori' => $kategori,
            'user_id' => $user_id,
            'created_at' => $now,
            'updated_at' => $now,
        );

        $query = $this->db->insert('mdc_kategori', $data);
        if ($query) {
            $response = array(
                'status' => 'success',
                'message' =>  'Successfully',
            );
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function delete_kategori()
    {
        $json = file_get_contents('php://input');
        $input = json_decode($json, true);
        $id = $input["id"];
        $query = $this->db->where('id', $id)->delete('mdc_kategori');
        if ($query) {
            $response = array(
                'status' => 'success',
                'message' =>  'Successfully',
            );
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }


    public function insert_medical_harga()
    {
        date_default_timezone_set('Asia/Jakarta');
        $kategori_id = $this->input->post('cmb_kategori_medical');
        $list = $this->input->post('list');
        $harga = $this->input->post('harga');
        $user_id = $this->session->userdata('user_id');
        $data = array(
            'kategori_id' => $kategori_id,
            'detail' => $list,
            'harga' => $harga,
            'user_id' => $user_id,
            'created_at' =>  date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $query = $this->db->insert('mdc_harga', $data);
        if ($query) {
            $response = array(
                'status' => 'success',
                'message' =>  'Successfully Insert',
            );
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }


    public function update_medical_harga()
    {
        date_default_timezone_set('Asia/Jakarta');
        $kategori_id = $this->input->post('cmb_kategori_medical_update');
        $list = $this->input->post('list_update');
        $harga = $this->input->post('harga_update');
        $user_id = $this->session->userdata('user_id');
        $id = $this->input->post('id_update');
        $data = array(
            'kategori_id' => $kategori_id,
            'detail' => $list,
            'harga' => $harga,
            'user_id' => $user_id,
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $query = $this->db->where('id', $id)->update('mdc_harga', $data);
        if ($query) {
            $response = array(
                'status' => 'success',
                'message' =>  'Successfully Updated',
            );
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function delete_medical_harga()
    {
        $json = file_get_contents('php://input');
        $input = json_decode($json, true);
        $id = $input["id"];
        $query = $this->db->where('id', $id)->delete('mdc_harga');
        if ($query) {
            $response = array(
                'status' => 'success',
                'message' =>  'Successfully Deleted',
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
            'content' => 'admin/pages/operation/trans_medical',
        ];
        $this->load->view('admin/layout/content', $data);
    }

    public function transaksi_permohonan()
    {
        $SQL = "SELECT * FROM mdc_users_request ORDER BY created_at DESC";
        $query = $this->db->query($SQL)->result();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($query));
    }
}
