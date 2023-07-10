<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Biokimia extends CI_Controller
{
    private $payload;
    private $now;

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
    }

    public function index()
    {
        $data = [
            'title' => "Admin Operasional - SILABKES",
            'content' => 'admin/pages/users/view_kimia',
        ];
        $this->load->view('admin/layout/content', $data);
    }

    public function getdata_request_air_minum()
    {
        $username = $this->session->userdata('username');
        $query = $this->db->where('username', $username)->get('kma_users_request_air_minum')->result();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($query));
    }

    public function insert_request_user_air_minum()
    {
        $username = $this->session->userdata('username');
        $user_id = $this->session->userdata('user_id');
        $pelanggan = $this->payload['pelanggan'];
        $alamat = $this->payload['alamat'];
        $pemilik = $this->payload['pemilik'];
        $no_hp = $this->payload['no_hp'];
        $sampel = $this->payload['sampel'];
        $merk = $this->payload['merk'];
        $kemasan = $this->payload['kemasan'];
        $request_id = $username . random_int(100, 999);
        $data = array(
            'request_id' => $request_id,
            'pelanggan' => $pelanggan,
            'alamat' => $alamat,
            'no_hp' => $no_hp,
            'pemilik' => $pemilik,
            'sampel' => $sampel,
            'merk' => $merk,
            'kemasan' => $kemasan,
            'status' => 'Request',
            'user_id' => $user_id,
            'username' => $username,
            'created_at' => $this->now,
            'updated_at' => $this->now,
        );

        $query = $this->db->insert('kma_users_request_air_minum', $data);
        if ($query) {
            $response = array(
                'status' => 'success',
                'message' => 'Successfully Inserted'
            );
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function delete_request_air_minum()
    {
        $request_id = $this->payload['request_id'];
        $query = $this->db->where('request_id', $request_id)->delete('kma_users_request_air_minum');
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


    public function getdata_request_air_bersih()
    {
        $username = $this->session->userdata('username');
        $query = $this->db->where('username', $username)->get('kma_users_request_air_bersih')->result();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($query));
    }

    public function insert_request_user_air_bersih()
    {
        $username = $this->session->userdata('username');
        $user_id = $this->session->userdata('user_id');
        $pelanggan = $this->payload['pelanggan'];
        $alamat = $this->payload['alamat'];
        $pemilik = $this->payload['pemilik'];
        $no_hp = $this->payload['no_hp'];
        $sampel = $this->payload['sampel'];
        $merk = $this->payload['merk'];
        $kemasan = $this->payload['kemasan'];
        $request_id = $username . random_int(100, 999);
        $data = array(
            'request_id' => $request_id,
            'pelanggan' => $pelanggan,
            'alamat' => $alamat,
            'no_hp' => $no_hp,
            'pemilik' => $pemilik,
            'sampel' => $sampel,
            'merk' => $merk,
            'kemasan' => $kemasan,
            'status' => 'Request',
            'user_id' => $user_id,
            'username' => $username,
            'created_at' => $this->now,
            'updated_at' => $this->now,
        );

        $query = $this->db->insert('kma_users_request_air_bersih', $data);
        if ($query) {
            $response = array(
                'status' => 'success',
                'message' => 'Successfully Inserted'
            );
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function delete_request_air_bersih()
    {
        $request_id = $this->payload['request_id'];
        $query = $this->db->where('request_id', $request_id)->delete('kma_users_request_air_bersih');
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


    public function getdata_request_badan_air()
    {
        $username = $this->session->userdata('username');
        $query = $this->db->where('username', $username)->get('kma_users_request_badan_air')->result();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($query));
    }

    public function insert_request_users_badan_air()
    {
        $username = $this->session->userdata('username');
        $user_id = $this->session->userdata('user_id');
        $pelanggan = $this->payload['pelanggan'];
        $alamat = $this->payload['alamat'];
        $pemilik = $this->payload['pemilik'];
        $no_hp = $this->payload['no_hp'];
        $sampel = $this->payload['sampel'];
        $merk = $this->payload['merk'];
        $kemasan = $this->payload['kemasan'];
        $request_id = $username . random_int(100, 999);
        $data = array(
            'request_id' => $request_id,
            'pelanggan' => $pelanggan,
            'alamat' => $alamat,
            'no_hp' => $no_hp,
            'pemilik' => $pemilik,
            'sampel' => $sampel,
            'merk' => $merk,
            'kemasan' => $kemasan,
            'status' => 'Request',
            'user_id' => $user_id,
            'username' => $username,
            'created_at' => $this->now,
            'updated_at' => $this->now,
        );

        $query = $this->db->insert('kma_users_request_badan_air', $data);
        if ($query) {
            $response = array(
                'status' => 'success',
                'message' => 'Successfully Inserted'
            );
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function delete_request_badan_air()
    {
        $request_id = $this->payload['request_id'];
        $query = $this->db->where('request_id', $request_id)->delete('kma_users_request_badan_air');
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

    public function cetak_permohonan_air_minum($request_id)
    {
        $this->load->library('pdfgenerator');
        $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
        $value = $this->db->where('request_id', $request_id)->get('kma_users_request_air_minum')->row();
        $qrcode = '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($value->request_id, $generator::TYPE_CODE_128)) . '">';

        // title dari pdf
        $this->data['title_pdf'] = 'Permohonan - ' . $request_id;
        $this->data['value'] = $value;
        $this->data['qrcode'] = $qrcode;
        $this->data['kategori'] = 'Laboratorium Air Minum';

        // filename dari pdf ketika didownload
        $file_pdf = 'Permohonan - ' . $request_id;
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        $html = $this->load->view('admin/pages/operation/invc/permohonan_kimia_air', $this->data, true);
        // run dompdf
        $pdf_data = $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
        // Mengirim file PDF ke browser
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $file_pdf . '.pdf"');
        echo $pdf_data;
    }

    public function cetak_permohonan_badan_air($request_id)
    {
        $this->load->library('pdfgenerator');
        $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
        $value = $this->db->where('request_id', $request_id)->get('kma_users_request_badan_air')->row();
        $qrcode = '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($value->request_id, $generator::TYPE_CODE_128)) . '">';

        // title dari pdf
        $this->data['title_pdf'] = 'Permohonan - ' . $request_id;
        $this->data['value'] = $value;
        $this->data['qrcode'] = $qrcode;
        $this->data['kategori'] = 'Laboratorium Badan Air';

        // filename dari pdf ketika didownload
        $file_pdf = 'Permohonan - ' . $request_id;
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        $html = $this->load->view('admin/pages/operation/invc/permohonan_kimia_air', $this->data, true);
        // run dompdf
        $pdf_data = $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
        // Mengirim file PDF ke browser
        header('Content-Type: application/pdf');
        echo $pdf_data;
    }

    public function cetak_permohonan_air_bersih($request_id)
    {
        $this->load->library('pdfgenerator');
        $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
        $value = $this->db->where('request_id', $request_id)->get('kma_users_request_air_bersih')->row();
        $qrcode = '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($value->request_id, $generator::TYPE_CODE_128)) . '">';

        // title dari pdf
        $this->data['title_pdf'] = 'Permohonan - ' . $request_id;
        $this->data['value'] = $value;
        $this->data['qrcode'] = $qrcode;
        $this->data['kategori'] = 'Laboratorium Air Minum';

        // filename dari pdf ketika didownload
        $file_pdf = 'Permohonan - ' . $request_id;
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        $html = $this->load->view('admin/pages/operation/invc/permohonan_kimia_air', $this->data, true);
        // run dompdf
        $pdf_data = $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
        // Mengirim file PDF ke browser
        header('Content-Type: application/pdf');
        echo $pdf_data;
    }
}
