<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model("M_slider");
        $this->load->model("M_profile");
        $this->load->model("M_visimisi");
        $this->load->model("M_pimpinan");
        $this->load->model("M_berita");
        // $this->load->model("M_koleksi");
    }
    public function index()
    {
        $valueprofile = $this->M_profile->getData();
        $data = [
            'title' => 'Sistem Informasi Laboratorium Kesehatan',
            'content' => "landing/pages/home",
            'berita' => $this->M_berita->getData_toHome(),
            'slider' => $this->M_slider->getData(),
            'img_profil' => $valueprofile->file_img,
            'profile_deskripsi' => $valueprofile->deskripsi,
        ];
        $this->load->view('landing/layout/index', $data);
    }
}
