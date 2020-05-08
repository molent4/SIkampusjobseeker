<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Perusahaan extends CI_Controller
{
    public function __construct() //menghindari akses tanpa session
    {
        parent::__construct();
        is_logged_in();
        $this->load->helper('url');
           //load model 'model_buku'
           $this->load->model('export_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array(); // mengambil $data dari user di session berdasarkan id_akun di session- ambil 1 baris
        $data['title'] = 'My Profile';
        $data['perusahaan'] = $this->db->get_where('perusahaan', ['id_akun' => $this->session->userdata('id_akun')])->row_array(); // mengambil $data dari user di session berdasarkan id_akun di session- ambil 1 baris

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('perusahaan/index', $data);
        $this->load->view('templates/footer');
    }
    public function edit()
    {
        $data['user'] = $this->db->get_where('akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array(); // mengambil $data dari user di session berdasarkan id_akun di session- ambil 1 baris
        $data['title'] = 'Edit Profile';
        $data['perusahaan'] = $this->db->get_where('perusahaan', ['id_akun' => $this->session->userdata('id_akun')])->row_array(); // mengambil $data dari user di session berdasarkan id_akun di session- ambil 1 baris

        $this->form_validation->set_rules('nama_perusahaan', 'nama_perusahaan', 'required|trim');
        $this->form_validation->set_rules('alamat', 'nama_perusahaan', 'required|trim');
        $this->form_validation->set_rules('kontak', 'nama_perusahaan', 'required|trim|numeric');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('perusahaan/edit', $data);
            $this->load->view('templates/footer');
        } else {

            $id_akun = $this->session->userdata('id_akun');
            $data1['detail'] = $this->db->get_where('perusahaan', ['id_akun' => $this->session->userdata('id_akun')])->row_array(); // mengambil $data dari user di session berdasarkan id_akun di session- ambil 1 baris
            $data = [
                'nama_perusahaan' => htmlspecialchars($this->input->post('nama_perusahaan', true)),
                'kontak' => htmlspecialchars($this->input->post('kontak', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true))

            ];
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['upload_path'] = './assets/img/profile/perusahaan/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data1['detail']['foto'];
                    $data1 = null;
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/perusahaan/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                    $this->db->where('id_akun', $id_akun);
                    $this->db->update('perusahaan');
                } else {
                    echo $this->upload->display_errors();
                }
            }
            $where = [
                'id_akun' => $id_akun
            ];
            $this->db->where('id_akun', $id_akun);
            $this->db->update('perusahaan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated</div>');
            redirect('perusahaan');
        }
    }
    public function addjob()
    {
        $data['user'] = $this->db->get_where('akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array(); // mengambil $data dari user di session berdasarkan id_akun di session- ambil 1 baris
        $data['title'] = 'Add Job';
        $data['bidang'] = $this->db->get('bidang')->result_array();
        $data['jenis'] = $this->db->get('jenispekerjaan')->result_array();
        $data['perusahaan'] = $this->db->get_where('perusahaan', ['id_akun' => $this->session->userdata('id_akun')])->row_array(); // mengambil $data dari user di session berdasarkan id_akun di session- ambil 1 baris

        $this->form_validation->set_rules('nama_pekerjaan', 'Nama_pekerjaan', 'required|trim');
        $this->form_validation->set_rules('bidang','Bidang', 'required|trim');
        $this->form_validation->set_rules('jenis', 'Jenis', 'required|trim');
        $this->form_validation->set_rules('gaji', 'Gaji', 'required|trim|numeric');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required|trim');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('perusahaan/addjob', $data);
            $this->load->view('templates/footer');
        } else {

            $id_akun = $this->session->userdata('id_akun');
            $data1 = $this->db->get_where('perusahaan', ['id_akun' => $id_akun])->row_array(); // mengambil $data dari user di session berdasarkan id_akun di session- ambil 1 baris

            $data = [
                'nama_pekerjaan' => htmlspecialchars($this->input->post('nama_pekerjaan', true)),
                'bidang' => htmlspecialchars($this->input->post('bidang', true)),
                'jenis' => htmlspecialchars($this->input->post('jenis', true)),
                'gaji' => htmlspecialchars($this->input->post('gaji', true)),
                'deskripsi' => htmlspecialchars($this->input->post('deskripsi', true)),
                'id_perusahaan' => $data1['id_perusahaan']
            ];

            $where = [
                'id_akun' => $id_akun
            ];
            $this->db->where('id_akun', $id_akun);
            $this->db->insert('detail_lowongan', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Job Has Been Added</div>');
            
            $data2 = $this->db->get_where('detail_lowongan', ['nama_pekerjaan' => $data['nama_pekerjaan']])->row_array();
            $data3 = [
                'id_perusahaan' => $data1['id_perusahaan'],
                'id_lowongan' => $data2['id_lowongan'],
                'status' => '1'
            ];
            $this->db->insert('lowongan', $data3);

            redirect('perusahaan/viewjob');

        }
    }

    public function viewjob(){
        $data['user'] = $this->db->get_where('akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array(); // mengambil $data dari user di session berdasarkan id_akun di session- ambil 1 baris
        $data['perusahaan'] = $this->db->get_where('perusahaan', ['id_akun' => $this->session->userdata('id_akun')])->row_array(); // mengambil $data dari user di session berdasarkan id_akun di session- ambil 1 baris
        $data['title'] = 'View Job';
        $id_akun = $this->session->userdata('id_akun');
        $this->load->model('Job_model', 'job_d');
        $data['job_d'] = $this->job_d->getdetail_pekerjaan();

       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('perusahaan/viewjob', $data);
        $this->load->view('templates/footer');


    }

    public function employe(){
        $data['user'] = $this->db->get_where('akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array(); // mengambil $data dari user di session berdasarkan id_akun di session- ambil 1 baris
        $data['perusahaan'] = $this->db->get_where('perusahaan', ['id_akun' => $this->session->userdata('id_akun')])->row_array(); // mengambil $data dari user di session berdasarkan id_akun di session- ambil 1 baris
        $data['title'] = 'Employe';
        $id_akun = $this->session->userdata('id_akun');
        $this->load->model('Employe_model', 'emp');
        $data['emp'] = $this->emp->getdetail_pelamar();

       
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('perusahaan/employe', $data);
        $this->load->view('templates/footer');
    }
    public function export(){
        $data['user'] = $this->db->get_where('akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array(); // mengambil $data dari user di session berdasarkan id_akun di session- ambil 1 baris
        $data['perusahaan'] = $this->db->get_where('perusahaan', ['id_akun' => $this->session->userdata('id_akun')])->row_array(); // mengambil $data dari user di session berdasarkan id_akun di session- ambil 1 baris
        $data['title'] = 'Employe';
        $id_akun = $this->session->userdata('id_akun');
        $this->load->model('Employe_model', 'emp');
        $data['emp'] = $this->emp->getdetail_pelamar();

           
           $this->load->view('templates/header', $data);
           $this->load->view('perusahaan/export', $data);
           $this->load->view('templates/footer');
    }
}
