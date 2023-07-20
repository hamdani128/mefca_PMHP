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
        $pimpinan = $this->db->get('pimpinan')->row();
        $kegiatan_photo_result = $this->db->count_all_results('kegiatan_photo');
        $kegiatan_photo = $this->db->get('kegiatan_photo')->result();
        $kegiatan_video_result = $this->db->count_all_results('kegiatan_video');
        $kegiatan_video = $this->db->get('kegiatan_video')->result();
        $data = [
            'title' => 'Sistem Informasi Laboratorium Kesehatan',
            'content' => "landing/pages/home",
            'berita' => $this->M_berita->getData_toHome(),
            'slider' => $this->M_slider->getData(),
            'profile' => $valueprofile,
            'pimpinan' => $pimpinan,
            'img_profil' => $valueprofile->file_img,
            'profile_deskripsi' => $valueprofile->deskripsi,
            'jumlah_photo' => $kegiatan_photo_result,
            'kegiatan_photo' => $kegiatan_photo,
            'jumlah_video' => $kegiatan_video_result,
            'kegiatan_video' => $kegiatan_video,
        ];
        $this->load->view('landing/layout/index', $data);
    }
}
