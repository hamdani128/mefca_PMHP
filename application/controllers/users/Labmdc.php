<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Labmdc extends CI_Controller
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

    public function index()
    {
        $data = [
            'title' => "Admin Operasional - SILABKES",
            'content' => 'admin/pages/users/view_mdc',
        ];
        $this->load->view('admin/layout/content', $data);
    }

    public function get_data_request_users()
    {
        $user_id = $this->session->userdata('user_id');
        $query = $this->db->where('user_id', $user_id)->get('mdc_users_request')->result();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($query));
    }

    public function get_list_pengujian()
    {
        $kategori_id = $this->input->post('kategori_id');
        $query = $this->db->where('kategori_id', $kategori_id)->get('mdc_harga')->result();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($query));
    }


    public function get_list_harga()
    {
        $id = $this->input->post('id');
        $query = $this->db->where('id', $id)->get('mdc_harga')->row();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($query));
    }

    public function users_insert_request()
    {
        date_default_timezone_set('Asia/Jakarta');
        $now = date('Y-m-d H:i:s');
        $payload = json_decode(file_get_contents('php://input'), true);
        $username = $this->session->userdata('username');
        $request_id = $username . random_int(100, 999);

        $nik = $payload['nik'];
        $nama = $payload['nama'];
        $jk = $payload['jk'];
        $no_kontak = $payload['no_kontak'];
        $alamat = $payload['alamat'];
        $user_id = $this->session->userdata('user_id');

        $detail = $payload['detail'];
        foreach ($detail as $row) {
            $data2 = array(
                'request_id' => $request_id,
                'kategori' => $row['kategori'],
                'list' => $row['list'],
                'harga' => $row['harga'],
                'user_id' => $user_id,
                'status' => 'request',
                'created_at' => $now,
                'updated_at' => $now,
            );
            $this->db->insert("mdc_users_request_detail", $data2);
        }

        $data1 = array(
            'request_id' => $request_id,
            'tanggal' => date('Y-m-d'),
            'nik' => $nik,
            'nama' => $nama,
            'jk' => $jk,
            'alamat' => $alamat,
            'telepon' => $no_kontak,
            'status' => 'request',
            'user_id' => $user_id,
            'username' => $username,
            'created_at' => $now,
            'updated_at' => $now,
        );

        $query = $this->db->insert('mdc_users_request', $data1);
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

    public function delete_request()
    {
        $payload = json_decode(file_get_contents('php://input'), true);
        $request_id = $payload['request_id'];
        $query1 = $this->db->where('request_id', $request_id)->delete('mdc_users_request');
        $query2 = $this->db->where('request_id', $request_id)->delete('mdc_users_request_detail');
        if ($query1 && $query2) {
            $response = array(
                'status' => 'success',
                'message' =>  'Successfully Deleted Request',
            );
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function cetak_permohonan($request_id)
    {
        $this->load->library('pdfgenerator');
        $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
        $value_detail = $this->db->where('request_id', $request_id)->get('mdc_users_request_detail')->result();
        $value = $this->db->where('request_id', $request_id)->get('mdc_users_request')->row();
        $qrcode = '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($value->request_id, $generator::TYPE_CODE_128)) . '">';
        // title dari pdf
        $this->data['title_pdf'] = 'Permohonan - ' . $request_id;
        $this->data['value'] = $value;
        $this->data['detail_request'] = $value_detail;
        $this->data['qrcode'] = $qrcode;
        // filename dari pdf ketika didownload
        $file_pdf = 'Permohonan - ' . $request_id;
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        $html = $this->load->view('admin/pages/operation/invc/permohonan', $this->data, true);
        // run dompdf
        $pdf_data = $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
        // Mengirim file PDF ke browser
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $file_pdf . '.pdf"');
        echo $pdf_data;
    }
}
