<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftar_harga extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_berita");
    }

    public function index()
    {
        $jumlahData = $this->M_berita->jumlahData();
        $this->load->library('pagination');
        $config['per_page'] = 2;
        $config['num_links'] = 2;
        $this->pagination->initialize($config);
        $limit = $config['per_page'];
        $offset = html_escape($this->input->get('per_page'));
        $berita = $this->M_berita->get_published($limit, $offset);
        $data = [
            'title' => 'Sistem Informasi Laboratorium Kesehatan',
            'content' => "landing/pages/daftar_harga",
            'kategoriberita' => $this->M_berita->KategoriBerita(),
            'berita' => $this->M_berita->get_published($limit, $offset),
        ];
        $this->load->view('landing/layout/index', $data);
    }
}
