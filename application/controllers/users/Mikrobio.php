<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mikrobio extends CI_Controller
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
        $this->now = date('Y-m-d H:i:s');
    }

    public function index()
    {
        $data = [
            'title' => "Admin Operasional - SILABKES",
            'content' => 'admin/pages/users/view_mikro',
        ];
        $this->load->view('admin/layout/content', $data);
    }

    public function getdata_parameter()
    {
        $query = $this->db->get('mkb_parameter')->result();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($query));
    }

    public function getDataRequest()
    {
        $username = $this->session->userdata('username');
        $query = $this->db->where('username', $username)->get('mkb_request')->result();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($query));
    }

    public function insert_request()
    {
        $username = $this->session->userdata('username');
        $request_id = $username . random_int(100, 999);
        $data = [
            'request_id' => $request_id,
            'pelanggan' => $this->payload['pelanggan'],
            'alamat' => $this->payload['alamat'],
            'pemilik' => $this->payload['pemilik'],
            'no_hp' => $this->payload['no_hp'],
            'sampel' => $this->payload['sampel'],
            'username' => $username,
            'user_id' => $this->session->userdata('user_id'),
            'status' => 'Request',
            'created_at' => $this->now,
            'updated_at' => $this->now,
        ];
        $query = $this->db->insert('mkb_request', $data);
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

    public function cetak_permohonan($request_id)
    {
        $this->load->library('pdfgenerator');
        $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
        $value = $this->db->where('request_id', $request_id)->get('mkb_request')->row();
        $qrcode = '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($value->request_id, $generator::TYPE_CODE_128)) . '">';

        // title dari pdf
        $this->data['title_pdf'] = 'Permohonan - ' . $request_id;
        $this->data['value'] = $value;
        $this->data['qrcode'] = $qrcode;

        // filename dari pdf ketika didownload
        $file_pdf = 'Permohonan - ' . $request_id;
        // setting paper
        $paper = 'A4';
        //orientasi paper potrait / landscape
        $orientation = "portrait";
        $html = $this->load->view('admin/pages/operation/invc/permohonan_biologi', $this->data, true);
        // run dompdf
        $pdf_data = $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
        // Mengirim file PDF ke browser
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $file_pdf . '.pdf"');
        echo $pdf_data;
    }

    public function delete_request()
    {
        $request_id = $this->payload['request_id'];
        $query = $this->db->where('request_id', $request_id)->delete('mkb_request');
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
}