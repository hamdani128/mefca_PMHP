<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{

    public function cek_daftar()
    {
        $nik = $this->input->post('nik');
        $value = $this->db->where('nik', $nik)->get('register')->row();
        if (empty($value)) {
            $response = array(
                'status' => 'not_ready',
                'message' => 'NIK Belom Terdaftar !'
            );
        } else {
            $response = array(
                'status' => 'nik_ready',
                'message' => 'NIK Sudah Terdaftar !'
            );
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function getAutoNumberRegister()
    {
        $cd = $this->db->query("SELECT MAX(RIGHT(no_registrasi,6)) AS kd_max FROM register_instansi");
        $kd = "";
        if ($cd->num_rows() > 0) {
            foreach ($cd->result() as $k) {
                $tmp = ((int)$k->kd_max) + 1;
                $kd = sprintf("%06s", $tmp);
            }
        } else {
            $kd = "0000001";
        }
        date_default_timezone_set('Asia/Jakarta');
        $newDate = date('ymd', strtotime(date('Y-m-d')));
        return "MEF" . "-" . $newDate . $kd;
    }

    public function insert_pendaftaran()
    {
        date_default_timezone_set('Asia/Jakarta');
        $no_register = $this->getAutoNumberRegister();
        $ipi = $this->input->post("cmb_ipi");
        $instansi = $this->input->post("cmb_instansi");
        $nama_perusahaan = $this->input->post("nama");
        $alamat = $this->input->post("alamat");
        $telepon = $this->input->post("telepon");
        $fax = $this->input->post("fax");
        $email = $this->input->post("email");
        $filehccp =  $_FILES['filehccp'];
        $tgl_hccp = $this->input->post("tgl_hccp");
        $no_hccp = $this->input->post("no_hccp");
        $product_hccp = $this->input->post("product_hccp");
        $ratting_hccp = $this->input->post("ratting_hccp");
        if (isset($_FILES['filehccp']) && !empty($_FILES['filehccp']['name'])) {
            $new_name = time() . "-" . date('Ymd');
            $config['upload_path']          = './public/upload/pendaftaran/';
            $config['allowed_types']        = '*';
            $config['max_size']            = 15360;
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('filehccp')) {
                $error = array('error' => $this->upload->display_errors());
            } else {
                $data = array('upload_data' => $this->upload->data());
                $datainsert = [
                    'no_registrasi' => $no_register,
                    'kategori' => $ipi,
                    'instansi' => $instansi,
                    'nama' => $nama_perusahaan,
                    'alamat' => $alamat,
                    'tlp' => $telepon,
                    'fax' => $fax,
                    'email' => $email,
                    'file_hccp' => $data['upload_data']['file_name'],
                    'tgl_hccp' => $tgl_hccp,
                    'no_hccp' => $no_hccp,
                    'product_hccp' => $product_hccp,
                    'ratting_hccp' => $ratting_hccp,
                    'status' => 'Registered',
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ];
            }
        } else {
            $datainsert = [
                'no_registrasi' => $no_register,
                'kategori' => $ipi,
                'instansi' => $instansi,
                'nama' => $nama_perusahaan,
                'alamat' => $alamat,
                'tlp' => $telepon,
                'fax' => $fax,
                'email' => $email,
                'file_hccp' => "",
                'tgl_hccp' => $tgl_hccp,
                'no_hccp' => $no_hccp,
                'product_hccp' => $product_hccp,
                'ratting_hccp' => $ratting_hccp,
                'status' => 'Registered',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }
        $query = $this->db->insert("register_instansi", $datainsert);
        if ($query) {
            $response = [
                'status' => 'success',
                'message' => 'Register successfully',
                'no_register' => $no_register,
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'Resetting registration failed',
            ];
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }

    public function dokumen_register($no_register)
    {
        require 'vendor/autoload.php';
        $this->load->library('pdfgenerator');
        $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
        $value =  $this->db->where('no_registrasi', $no_register)->get('register_instansi')->row();
        $qrcode = '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode("gokil123", $generator::TYPE_CODE_128)) . '">';

        $this->data['value'] = $value;
        $this->data['title_pdf'] = 'Registrasi-' . $value->no_registrasi;
        $this->data['qrcode'] = $qrcode;
        $this->data['kategori'] = 'Registrasi Instansi';
        $this->data['filepath'] = '';

        $file_pdf = 'Registrasi-' . $value->no_registrasi . '.pdf';
        $paper = 'A4';
        $orientation = "portrait";
        $html = $this->load->view('landing/pages/inv/inv_register', $this->data, true);

        $pdf_data = $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation, false);
        // Mengirim file PDF untuk diunduh
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="' . $file_pdf . '"');
        header('Content-Length: ' . strlen($pdf_data));
        echo $pdf_data;
        exit();
    }
}
