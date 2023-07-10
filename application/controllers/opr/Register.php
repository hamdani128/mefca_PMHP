<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        // $this->load->model("M_berita");
        $this->session->sess_expiration = '60';
        $this->session->sess_expire_on_close = 'true';
        if ($this->session->userdata('log_in') != "login") {
            redirect(base_url("usr/login"));
        }
    }

    public function index()
    {
        $data = [
            'title' => "Admin Operasional - SILABKES",
            'content' => 'admin/pages/operation/register',
        ];
        $this->load->view('admin/layout/content', $data);
    }

    public function getdata()
    {
        $data = $this->db->get('register')->result();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

    public function validasi_akun()
    {
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d H:i:s');
        $json = file_get_contents('php://input');
        $input = json_decode($json, true);
        $id = $input["id"];
        $user_id = $this->session->userdata('user_id');
        $value = $this->db->where('id', $id)->get('register')->row();
        $passwoord = random_int(100000, 999999);
        $passwoord_hash = md5($passwoord);
        $cek = $this->db->where('register_id', $id)->get('password_history_register')->row();
        if (empty($cek)) {
            $data1 = array(
                'register_id' => $id,
                'password' => $passwoord,
                'user_id' => $user_id,
                'created_at' => $now,
                'updated_at' => $now,
            );

            $data2 = array(
                'fullname' => $value->nama,
                'username' => $value->no_register,
                'email' => $value->email,
                'password' => $passwoord_hash,
                'level' => 'Users',
                'inititated' => 'Users',
                'created_at' => $now,
                'updated_at' => $now,
            );

            $data3 = array(
                'status' => 'active',
                'updated_at' => $now,
            );

            $query1 = $this->db->insert('password_history_register', $data1);
            $query2 = $this->db->insert('users', $data2);
            $query3 = $this->db->where('id', $id)->update('register', $data3);
            if ($query1 && $query2 && $query3) {
                $response = array(
                    'status' => 'success',
                    'message' => 'Validasi Akun Successfully'
                );
            }
        } else {
            $response = array(
                'status' => 'akun_ready',
                'message' => 'Akun Ready',
            );
        }
        echo json_encode($response);
    }

    public function show_password_akun()
    {
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d H:i:s');
        $json = file_get_contents('php://input');
        $input = json_decode($json, true);
        $id = $input["id"];
        $SQL = "SELECT
                b.no_register as no_register,
                a.password as password,
                a.created_at as created_at
                FROM password_history_register a LEFT JOIN register b ON a.register_id = b.id
                WHERE a.register_id ='" . $id . "'";

        $query = $this->db->query($SQL)->result();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($query));
    }

    public function delete_akun()
    {
        $json = file_get_contents('php://input');
        $input = json_decode($json, true);
        $id = $input["id"];
        $value = $this->db->where('id', $id)->get('register')->row();
        $query1 = $this->db->where('username', $value->no_register)->delete('users');
        $query2 = $this->db->where('id', $id)->delete('register');
        $query3 = $this->db->where('register_id', $id)->delete('password_history_register');

        if ($query1 && $query2 && $query3) {
            $response = array(
                'status' => 'success',
                'message' => 'Validasi Akun Successfully'
            );
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}
