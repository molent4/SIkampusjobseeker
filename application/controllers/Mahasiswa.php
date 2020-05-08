<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Mahasiswa extends CI_Controller
{
    public function __construct() //menghindari akses tanpa session
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array(); // mengambil $data dari user di session berdasarkan id_akun di session- ambil 1 baris
        $data['mahasiswa'] = $this->db->get_where('mahasiswa', ['id_akun' => $this->session->userdata('id_akun')])->row_array(); // mengambil $data dari user di session berdasarkan id_akun di session- ambil 1 baris
        $data['title'] = 'My Profile';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('mahasiswa/index', $data);
        $this->load->view('templates/footer');
    }
    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array(); // mengambil $data dari user di session berdasarkan id_akun di session- ambil 1 baris
        $data['mahasiswa'] = $this->db->get_where('mahasiswa', ['id_akun' => $this->session->userdata('id_akun')])->row_array(); // mengambil $data dari user di session berdasarkan id_akun di session- ambil 1 baris
        $data['fakultas'] = $this->db->get('fakultas')->result_array(); // mengambil $data dari user di session berdasarkan id_akun di session- ambil 1 baris
        $data['jurusan'] = $this->db->get('prodi')->result_array(); // mengambil $data dari user di session berdasarkan id_akun di session- ambil 1 baris
        $this->load->model('Fakultas_model', 'fakjur');
        $data['fakjur'] = $this->fakjur->getfakjur();
        $data['semester'] = $this->db->get('semester')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('nim', 'Nim', 'required|trim|min_length[10]');
        $this->form_validation->set_rules('fakultas', 'Fakultas', 'required');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('semester', 'Semester', 'required');
        $this->form_validation->set_rules('no_hp', 'No_hp', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('mahasiswa/edit', $data);
            $this->load->view('templates/footer');
        } else {

            $id_akun = $this->session->userdata('id_akun');
            $data1['detail'] = $this->db->get_where('mahasiswa', ['id_akun' => $this->session->userdata('id_akun')])->row_array(); // mengambil $data dari user di session berdasarkan id_akun di session- ambil 1 baris
            $data = [
                'nim' => htmlspecialchars($this->input->post('nim', true)),
                'nama' => htmlspecialchars($this->input->post('nama', true)),
                'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
                'tmpt_lahir' => htmlspecialchars($this->input->post('tmpt_lahir', true)),
                'fakultas' => htmlspecialchars($this->input->post('fakultas', true)),
                'prodi' => htmlspecialchars($this->input->post('jurusan', true)),
                'semester' => htmlspecialchars($this->input->post('semester', true)),
                'ipk' => htmlspecialchars($this->input->post('ipk', true)),
                'no_hp' => htmlspecialchars($this->input->post('no_hp', true)),
                'alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'email' => htmlspecialchars($this->input->post('email', true))

            ];
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['upload_path'] = './assets/img/profile/mahasiswa/';
                $config['max_size'] = '2048';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data1['detail']['foto'];
                    $data1 = null;
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/mahasiswa/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                    $this->db->where('id_akun', $id_akun);
                    $this->db->update('mahasiswa');
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $where = [
                'id_akun' => $id_akun
            ];
            $this->db->where('id_akun', $id_akun);
            $this->db->update('mahasiswa', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated</div>');
            redirect('mahasiswa');
        }
    }

    public function joblist()
    {
        $data['user'] = $this->db->get_where('akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array(); // mengambil $data dari user di session berdasarkan id_akun di session- ambil 1 baris
        $data['perusahaan'] = $this->db->get_where('perusahaan', ['id_akun' => $this->session->userdata('id_akun')])->row_array(); // mengambil $data dari user di session berdasarkan id_akun di session- ambil 1 baris
        $data['title'] = 'View Job';
        $id_akun = $this->session->userdata('id_akun');
        $this->load->model('Joblist_model', 'jobl_d');
        $data['jobl_d'] = $this->jobl_d->getdetail_job();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('mahasiswa/joblist', $data);
        $this->load->view('templates/footer');
    }

    public function daftar($id_lowongan)
    {
        $data['id_lowongan'] = $id_lowongan;
        $data['title'] = 'Apply Job';
        $data['user'] = $this->db->get_where('akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array();
        $data['mahasiswa'] = $this->db->get_where('mahasiswa', ['id_akun' => $this->session->userdata('id_akun')])->row_array();
        $data['lowongan'] = $this->db->get_where('lowongan', ['id_lowongan' => $id_lowongan])->row_array();
        $data['detail_lowongan'] = $this->db->get_where('detail_lowongan', ['id_lowongan' => $id_lowongan])->row_array();
        $data['lamar'] = $this->db->get_where('lamar', ['id_lowongan' => $id_lowongan])->row_array();
        $this->load->model('Joblist_model', 'jd');
        $data['jd'] = $this->jd->getdetail_job();
        // $this->form_validation->set_rules('nim', 'NIM', 'required');



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('mahasiswa/daftar', $data);
        $this->load->view('templates/footer');
        
    }

    public function apply()
    {
        $data['lamar'] = $this->db->get_where('lamar', ['id_lowongan' => $this->input->post('id_lowongan', true)])->row_array();
        $this->load->model('Joblist_model', 'jd');
        $data['jd'] = $this->jd->getdetail_job();
        $id_lowongan = $this->input->post('id_lowongan');
        $nim = $this->input->post('nim', true);
        $data1 = [
            'id_lowongan' => $id_lowongan,
            'nim' => $nim,
            'apply_date' => time()
        ];
        $this->load->model('Applycheck_model', 'AC');
        $ac = $this->AC->check_apply($nim,$id_lowongan);
        
        if( count($ac) == 0 ){
            $this->db->insert('lamar', $data1);
        }else{
            $this->db->update('lamar', $data1, array('nim' => $nim, 'id_lowongan' => $id_lowongan));
        }
        

        $upload_cv = $_FILES['cv']['name'];

        if ($upload_cv) {
            $config['upload_path'] = './assets/pdf/';
            $config['allowed_types'] = 'pdf';
            $config['max_size'] = '2048';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('cv')) {
                $old_cv = $data['lamar']['cv'];
                if ($old_cv == $upload_cv) {
                    unlink(FCPATH . 'assets/pdf' . $old_cv);
                }
                $new_cv = $this->upload->data('file_name');
                $this->db->set('cv', $new_cv);
                $this->db->where('id_lowongan',  $data1['id_lowongan']);
                $this->db->update('lamar');
            } else {
                echo $this->upload->display_errors();
            }
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Job Apllied</div>');
        redirect('mahasiswa');
    }
}
