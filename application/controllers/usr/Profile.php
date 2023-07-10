<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{
    private $payload;
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model("M_profile");
        $this->session->sess_expiration = '60';
        $this->session->sess_expire_on_close = 'true';
        if ($this->session->userdata('log_in') != "login") {
            redirect(base_url("admin/login"));
        }
        $this->payload = json_decode(file_get_contents('php://input'), true);
    }

    public function index()
    {
        $data = [
            'title' => "Admin - SILABKES",
            'content' => 'admin/pages/profile',
            'profile' => $this->M_profile->getData(),
        ];
        $this->load->view('admin/layout/content', $data);
    }

    public function insert()
    {
        date_default_timezone_set("Asia/Jakarta");
        $now = date("Y-m-d H:i:s");
        $deskripsi = $this->input->post('summernoteValue');
        $file_image = $_FILES["file_image"];
        $new_name = time() . "-" . date('Ymd');
        $config['upload_path']          = './public/upload/profile/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']            = 2048;
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('file_image')) {
            // $error = array('error' => $this->upload->display_errors());
            $response = array(
                'status' => 'img_error',
                'message' => $this->upload->display_errors . " Upload failed",
            );
        } else {
            $data = array('upload_data' => $this->upload->data());
            $data2 = array(
                'file_img' => $data['upload_data']['file_name'],
                'deskripsi' => $deskripsi,
                'user_id' => $this->session->userdata('user_id'),
                'created_at' => $now,
                'updated_at' => $now
            );
            $query = $this->db->insert("profile", $data2);
            $response = array(
                'status' => 'success',
                'message' => 'Slider updated successfully',
            );
        }
        echo json_encode($response);
    }

    public function show_edit()
    {
        $id = $this->input->post('id');
        $value = $this->db->where('id', $id)->get('profile')->row();
        $data = [
            'file_img' => $value->file_img,
            'description' => $value->deskripsi,
            'id' => $id,
        ];
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($data));
    }

    public function update_berita()
    {
        $id = $this->input->post('id_update');
        $value = $this->db->where('id', $id)->get('profile')->row();
        date_default_timezone_set("Asia/Jakarta");
        $now = date("Y-m-d H:i:s");
        $deskripsi = $this->input->post('deskripsi');
        $file_image = $_FILES["file_image_update"];
        if (!empty($file_image['name'])) {
            $existing_image_path = './public/upload/profile/' . $value->file_img;
            unlink($existing_image_path);
            $new_name = time() . "-" . date('Ymd');
            $config['upload_path']          = './public/upload/profile/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']            = 2048;
            $config['file_name'] = $new_name;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('file_image_update')) {
                // $error = array('error' => $this->upload->display_errors());
                $response = array(
                    'status' => 'img_error',
                    'message' => $this->upload->display_errors . " Upload failed",
                );
            } else {
                $data = array('upload_data' => $this->upload->data());
                $data = array(
                    'file_img' => $data['upload_data']['file_name'],
                    'deskripsi' => $deskripsi,
                    'user_id' => $this->session->userdata('user_id'),
                    'updated_at' => $now
                );
                $query = $this->db->where('id', $id)->update("profile", $data);
            }
        } else {
            $data = [
                'id' => $id,
                'deskripsi' => $deskripsi,
                'updated_at' => $now,
            ];
            $query = $this->db->where('id', $id)->update("profile", $data);
        }

        if ($query) {
            $response = array(
                'status' => 'success',
                'message' => 'Slider updated successfully',
            );
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }


    public function delete_profile()
    {
        $id = $this->input->post('id');
        $value = $this->db->where('id', $id)->get('profile')->row();
        $existing_image_path = './public/upload/profile/' . $value->file_img;
        unlink($existing_image_path);
        $query = $this->db->where('id', $id)->delete('profile');
        if ($query) {
            $response = array(
                'status' => 'success',
                'message' => 'Deleted successfully',
            );
        }
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($response));
    }
}
