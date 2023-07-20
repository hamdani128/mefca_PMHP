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

    public function parameter()
    {
        $data = [
            'title' => "Admin Operasional - MEFCA",
            'content' => 'admin/pages/operation/parameter',
        ];
        $this->load->view('admin/layout/content', $data);
    }

    public function getdata_kategori_parameter_uji()
    {
        $query  = $this->db->get('kategori_parameter')->result();
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($query));
    }

    public function insert_parameter_kategori()
    {
        $kategori = $this->payload['kategori'];
        $data = [
            'kategori' => $kategori,
            'user_id' => $this->userid,
            'created_at' => $this->now,
            'updated_at' => $this->now,
        ];
        $query = $this->db->insert('kategori_parameter', $data);
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

    public function delete_parameter_kategori()
    {
        $id = $this->payload['id'];
        $query = $this->db->where('id', $id)->delete('kategori_parameter');
        if ($query) {
            $response = [
                'status' => 'success',
                'message' => 'Deleted successfully'
            ];
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function insert_parameter()
    {
        $kategori_id = $this->payload['kategori_id'];
        $list_detail = $this->payload['list_detail'];
        $data = [
            'kategori_id' => $kategori_id,
            'parameter' => $list_detail,
            'user_id' => $this->userid,
            'created_at' => $this->now,
            'updated_at' => $this->now,
        ];
        $query = $this->db->insert('parameter_uji', $data);
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

    public function getdata_parameter_uji()
    {
        $SQL = "SELECT 
                a.id as id,
                a.kategori_id as kategori_id,
                b.kategori as kategori,
                a.parameter as parameter
                FROM parameter_uji a
                LEFT JOIN kategori_parameter b 
                ON a.kategori_id = b.id";
        $query  = $this->db->query($SQL)->result();
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($query));
    }

    public function update_parameter()
    {
        $id = $this->payload['id'];
        $kategori_id = $this->payload['kategori_id'];
        $list_detail = $this->payload['list_detail'];
        $data = [
            'kategori_id' => $kategori_id,
            'parameter' => $list_detail,
            'user_id' => $this->userid,
            'updated_at' => $this->now,
        ];
        $query = $this->db->where('id', $id)->update('parameter_uji', $data);
        if ($query) {
            $response = [
                'status' => 'success',
                'message' => 'Updated successfully'
            ];
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function delete_parameter()
    {
        $id = $this->payload['id'];
        $query = $this->db->where('id', $id)->delete('parameter_uji');
        if ($query) {
            $response = [
                'status' => 'success',
                'message' => 'Deleted successfully'
            ];
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }


    // Metode Uji
    public function metode_uji()
    {
        $data = [
            'title' => "Admin Operasional - MEFCA",
            'content' => 'admin/pages/operation/metode_uji',
        ];
        $this->load->view('admin/layout/content', $data);
    }

    public function get_data_detail_list_parameter()
    {
        $kategori_id = $this->input->post("kategori_id");
        $query = $this->db->where('kategori_id', $kategori_id)->get('parameter_uji')->result();
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($query));
    }

    public function getdata_metode_uji()
    {
    }


    // daftar harga Uji
    // Metode Uji
    public function daftar_harga_uji()
    {
        $data = [
            'title' => "Admin Operasional - MEFCA",
            'content' => 'admin/pages/operation/daftar_harga_uji',
        ];
        $this->load->view('admin/layout/content', $data);
    }


    public function getdata_daftar_uji()
    {
        $SQL = "SELECT
                a.id as id,
                b.kategori as kategori,
                a.kategori_id as kategori_id,
                a.detail_parameter as detail_parameter,
                a.metode as metode,
                a.lambang as lambang,
                a.qty as qty,
                a.tarif_umum as tarif_umum,
                a.tarif_mahasiswa as tarif_mahasiswa
                FROM daftar_harga_uji a
                LEFT JOIN kategori_parameter b ON a.kategori_id = b.id";
        $query1 = $this->db->query($SQL)->result();
        $query2 = $this->db->get("kategori_parameter")->result();
        $data = [
            'daftar_harga' => $query1,
            'kategori' => $query2
        ];
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }


    public function insert_daftar_uji()
    {
        $kategori_id = $this->payload['kategori_id'];
        $detail_parameter = $this->payload['detail_parameter'];
        $metode = $this->payload['metode'];
        $lambang = $this->payload['lambang'];
        $qty = $this->payload['qty'];
        $tarif_umum = $this->payload['tarif_umum'];
        $tarif_mahasiswa = $this->payload['tarif_mahasiswa'];

        $data = [
            'kategori_id' => $kategori_id,
            'detail_parameter' => $detail_parameter,
            'metode' => $metode,
            'lambang' => $lambang,
            'qty' => $qty,
            'tarif_umum' => $tarif_umum,
            'tarif_mahasiswa' => $tarif_mahasiswa,
            'user_id' => $this->userid,
            'created_at' => $this->now,
            'updated_at' => $this->now,
        ];

        $query = $this->db->insert('daftar_harga_uji', $data);

        if ($query) {
            $response = [
                'status' => 'success',
                'message' => 'Success Inserted',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Error Inserted',
            ];
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function update_daftar_uji()
    {
        $id = $this->payload['id'];
        $kategori_id = $this->payload['kategori_id'];
        $detail_parameter = $this->payload['detail_parameter'];
        $metode = $this->payload['metode'];
        $lambang = $this->payload['lambang'];
        $qty = $this->payload['qty'];
        $tarif_umum = $this->payload['tarif_umum'];
        $tarif_mahasiswa = $this->payload['tarif_mahasiswa'];

        $data = [
            'kategori_id' => $kategori_id,
            'detail_parameter' => $detail_parameter,
            'metode' => $metode,
            'lambang' => $lambang,
            'qty' => $qty,
            'tarif_umum' => $tarif_umum,
            'tarif_mahasiswa' => $tarif_mahasiswa,
            'user_id' => $this->userid,
            'created_at' => $this->now,
            'updated_at' => $this->now,
        ];

        $query = $this->db->where('id', $id)->update('daftar_harga_uji', $data);

        if ($query) {
            $response = [
                'status' => 'success',
                'message' => 'Success updated',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Error updated',
            ];
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function delete_daftar_uji()
    {
        $id = $this->payload['id'];
        $query = $this->db->where('id', $id)->delete('daftar_harga_uji');
        if ($query) {
            $response = [
                'status' => 'success',
                'message' => 'Success Deleted',
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Error Deleted',
            ];
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}
