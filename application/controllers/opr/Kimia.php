<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kimia extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->session->sess_expiration = '60s';
        $this->session->sess_expire_on_close = 'true';
        if ($this->session->userdata('log_in') != "login") {
            redirect(base_url("usr/login"));
        }
    }

    public function master()
    {
        $data = [
            'title' => "Admin Operasional - SILABKES",
            'content' => 'admin/pages/operation/kimia_air_master',
        ];
        $this->load->view('admin/layout/content', $data);
    }

    public function getdata_kimia_air_minum()
    {
        $query = $this->db->get('kma_parameter_air_minum')->result();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($query));
    }

    public function insert_air_minum_paramater()
    {
        date_default_timezone_set('Asia/Jakarta');
        $userid = $this->session->userdata('user_id');
        $now = date('Y-m-d H:i:s');
        $payload = json_decode(file_get_contents('php://input'), true);
        $kategori = $payload['kategori'];
        $parameter = $payload['parameter'];
        $satuan = $payload['satuan'];
        $standart = $payload['standart'];
        $metode = $payload['metode'];


        $data = array(
            'kategori' => $kategori,
            'parameter' => $parameter,
            'satuan' => $satuan,
            'standart' => $standart,
            'metode' => $metode,
            'user_id' => $userid,
            'created_at' => $now,
            'updated_at' => $now
        );
        $query = $this->db->insert('kma_parameter_air_minum', $data);
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

    function update_air_minum_paramater()
    {
        $payload = json_decode(file_get_contents('php://input'), true);
        $kategori = $payload['kategori'];
        $parameter = $payload['parameter'];
        $satuan = $payload['satuan'];
        $standart = $payload['standart'];
        $metode = $payload['metode'];
        $id = $payload['id'];
        $now = date('Y-m-d H:i:s');
        $userid = $this->session->userdata('user_id');

        $data = array(
            'kategori' => $kategori,
            'parameter' => $parameter,
            'satuan' => $satuan,
            'standart' => $standart,
            'metode' => $metode,
            'user_id' => $userid,
            'created_at' => $now,
            'updated_at' => $now
        );
        // var_dump($data);
        $query = $this->db->where('id', $id)->update('kma_parameter_air_minum', $data);
        if ($query) {
            $response = array(
                'status' => 'success',
                'message' => 'Successfully update'
            );
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function delete_parameter_air_minum()
    {
        $payload = json_decode(file_get_contents('php://input'), true);
        $id = $payload['id'];
        $query = $this->db->where('id', $id)->delete('kma_parameter_air_minum');
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



    // Air Bersih
    public function getdata_kimia_air_bersih()
    {
        $query = $this->db->get('kma_parameter_air_bersih')->result();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($query));
    }

    public function insert_air_bersih_paramater()
    {
        date_default_timezone_set('Asia/Jakarta');
        $userid = $this->session->userdata('user_id');
        $now = date('Y-m-d H:i:s');
        $payload = json_decode(file_get_contents('php://input'), true);
        $kategori = $payload['kategori'];
        $parameter = $payload['parameter'];
        $satuan = $payload['satuan'];
        $standart = $payload['standart'];
        $metode = $payload['metode'];

        $data = array(
            'kategori' => $kategori,
            'parameter' => $parameter,
            'satuan' => $satuan,
            'standart' => $standart,
            'metode' => $metode,
            'user_id' => $userid,
            'created_at' => $now,
            'updated_at' => $now
        );
        // var_dump($data);
        $query = $this->db->insert('kma_parameter_air_bersih', $data);
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

    public function update_air_bersih_paramater()
    {
        $payload = json_decode(file_get_contents('php://input'), true);
        $kategori = $payload['kategori'];
        $parameter = $payload['parameter'];
        $satuan = $payload['satuan'];
        $standart = $payload['standart'];
        $metode = $payload['metode'];
        $id = $payload['id'];
        $now = date('Y-m-d H:i:s');
        $userid = $this->session->userdata('user_id');

        $data = array(
            'kategori' => $kategori,
            'parameter' => $parameter,
            'satuan' => $satuan,
            'standart' => $standart,
            'metode' => $metode,
            'user_id' => $userid,
            'created_at' => $now,
            'updated_at' => $now
        );
        // var_dump($data);
        $query = $this->db->where('id', $id)->update('kma_parameter_air_bersih', $data);
        if ($query) {
            $response = array(
                'status' => 'success',
                'message' => 'Successfully update'
            );
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function delete_parameter_air_bersih()
    {
        $payload = json_decode(file_get_contents('php://input'), true);
        $id = $payload['id'];
        $query = $this->db->where('id', $id)->delete('kma_parameter_air_bersih');
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


    // Badan Air

    public function getdata_kimia_badan_air()
    {
        $query = $this->db->get('kma_parameter_badan_air')->result();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($query));
    }

    public function insert_air_badan_parameter()
    {
        date_default_timezone_set('Asia/Jakarta');
        $payload =  json_decode(file_get_contents('php://input'), true);
        $kategori = $payload['kategori'];
        $parameter = $payload['parameter'];
        $satuan = $payload['satuan'];
        $kelas1 = $payload['kelas1'];
        $kelas2 = $payload['kelas2'];
        $kelas3 = $payload['kelas3'];
        $kelas4 = $payload['kelas4'];
        $metode = $payload['metode'];
        $userid = $this->session->userdata('user_id');
        $data = array(
            'kategori' => $kategori,
            'parameter' => $parameter,
            'satuan' => $satuan,
            'kelas1' => $kelas1,
            'kelas2' => $kelas2,
            'kelas3' => $kelas3,
            'kelas4' => $kelas4,
            'metode' => $metode,
            'user_id' => $userid,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $query = $this->db->insert('kma_parameter_badan_air', $data);
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

    public function update_air_badan_parameter()
    {
        date_default_timezone_set('Asia/Jakarta');
        $payload =  json_decode(file_get_contents('php://input'), true);
        $id = $payload['id'];
        $kategori = $payload['kategori'];
        $parameter = $payload['parameter'];
        $satuan = $payload['satuan'];
        $kelas1 = $payload['kelas1'];
        $kelas2 = $payload['kelas2'];
        $kelas3 = $payload['kelas3'];
        $kelas4 = $payload['kelas4'];
        $metode = $payload['metode'];
        $userid = $this->session->userdata('user_id');

        $data = array(
            'kategori' => $kategori,
            'parameter' => $parameter,
            'satuan' => $satuan,
            'kelas1' => $kelas1,
            'kelas2' => $kelas2,
            'kelas3' => $kelas3,
            'kelas4' => $kelas4,
            'metode' => $metode,
            'user_id' => $userid,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        );
        $query = $this->db->where('id', $id)->update('kma_parameter_badan_air', $data);
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

    public function delete_air_badan_parameter()
    {
        $payload = json_decode(file_get_contents('php://input'), true);
        $id = $payload['id'];
        $query = $this->db->where('id', $id)->delete('kma_parameter_badan_air');
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


    // transaksi
    public function transaksi()
    {
        $data = [
            'title' => "Admin Operasional - SILABKES",
            'content' => 'admin/pages/operation/trans_kimia_air',
        ];
        $this->load->view('admin/layout/content', $data);
    }

    public function get_kimia_air()
    {
        $query = $this->db->get('kma_users_request_air_minum')->result();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($query));
    }

    public function get_kimia_air_bersih()
    {
        $query = $this->db->get('kma_users_request_air_bersih')->result();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($query));
    }

    public function get_kimia_badan_air()
    {
        $query = $this->db->get('kma_users_request_badan_air')->result();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($query));
    }
}
