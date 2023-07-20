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

    public function getAutoNumberPermohonan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $cd = $this->db->query("SELECT MAX(RIGHT(no_pelanggan,6)) AS kd_max FROM permohonan_pelanggan WHERE tgl ='" . date('Y-m-d') . "'");
        $kd = "";
        if ($cd->num_rows() > 0) {
            foreach ($cd->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%06s", $tmp);
            }
        } else {
            $kd = "0000001";
        }
        $newDate = date('ymd', strtotime(date('Y-m-d')));
        return "P" . "-" . $newDate . $kd;
    }

    public function index()
    {
        $data = [
            'title' => "Admin Operasional - SILABKES",
            'content' => 'admin/pages/operation/register',
        ];
        $this->load->view('admin/layout/content', $data);
    }

    public function getdata_register_instansi()
    {
        $data = $this->db->get('register_instansi')->result();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
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

    public function delete_register_instansi()
    {
        $json = file_get_contents('php://input');
        $input = json_decode($json, true);
        $id = $input["id"];
        $query = $this->db->where('id', $id)->delete("register_instansi");
        if ($query) {
            $response = array(
                'status' => 'success',
                'message' => 'Deleted Successfully'
            );
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function getdata_kategori_parameter()
    {
        $query = $this->db->get("kategori_parameter")->result();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($query));
    }

    public function get_data_detail_parameter()
    {
        $kategori_id = $this->input->post("kategori_id");
        $instansi = $this->input->post('instansi');
        $query = $this->db->where('kategori_id', $kategori_id)->get('daftar_harga_uji')->result();
        if (count($query) > 0) {
            if ($instansi == "Perusahaan") {
                foreach ($query as $row) {
                    $data = [
                        'detail_parameter' => $row->detail_parameter,
                        'metode' => $row->metode,
                        'lambang' => $row->lambang,
                        'qty' => $row->qty,
                        'tarif' => $row->tarif_umum,
                    ];
                }
            } else {
                foreach ($query as $row) {
                    $data = [
                        'detail_parameter' => $row->detail_parameter,
                        'metode' => $row->metode,
                        'lambang' => $row->lambang,
                        'qty' => $row->qty,
                        'tarif' => $row->tarif_mahasiswa,
                    ];
                }
            }
            $datetemp['data'] = $data;
        } else {
            $datetemp = [];
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($datetemp));
    }



    public function insert_pengambilan_pengujian()
    {
        date_default_timezone_set('Asia/Jakarta');
        $payload = json_decode(file_get_contents('php://input'), true);
        $no_permohonan = $this->getAutoNumberPermohonan();
        $no_pelanggan = $payload['no_pelanggan'];
        $user_id = $this->session->userdata('user_id');
        foreach ($payload['detail'] as $row) {
            $data1 = [
                'no_permohonan' => $no_permohonan,
                'no_pelanggan' => $no_pelanggan,
                'date' => date('Y-m-d'),
                'kategori' => $row['kategori'],
                'detail_parameter' => $row['detail_parameter'],
                'metode' => $row['metode'],
                'lambang' => $row['lambang'],
                'harga' => $row['harga'],
                'user_id' => $user_id,
                'created_at' => date('Y-m-d H:i:s'),
                'created_at' => date('Y-m-d H:i:s'),
            ];
            $this->db->insert("permohonan_pelanggan_detail", $data1);
        }

        $data2 = [
            'no_permohonan' => $no_permohonan,
            'no_pelanggan' => $no_pelanggan,
            'tgl' => date('Y-m-d'),
            'status' => 'In Process',
            'user_id' => $user_id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ];

        $query = $this->db->insert('permohonan_pelanggan', $data2);
        if ($query) {
            $response = [
                'status' => 'success',
                'message' => 'Successfully created'
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Error creating',
            ];
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function getdata_antrian_permohononan()
    {
        date_default_timezone_set('Asia/Jakarta');
        $payload = json_decode(file_get_contents('php://input'), true);
        $no_pelanggan = $payload['no_pelanggan'];
        $query = $this->db->where('no_pelanggan', $no_pelanggan)->where('tgl', date('Y-m-d'))->get('permohonan_pelanggan')->row();
        if (!empty($query)) {
            $response = [
                'status' => 'Ready'
            ];
        } else {
            $response = [
                'status' => 'Not Ready'
            ];
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}
