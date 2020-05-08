<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct() //menghindari akses tanpa session
    {
        parent::__construct();
        is_logged_in();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array(); // mengambil $data dari user di session berdasarkan id_akun di session- ambil 1 baris
        $data['title'] = 'Dashboard';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }
    
    public function role(){
        
        $data['user'] = $this->db->get_where('akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array(); // mengambil $data dari user di session berdasarkan id_akun di session- ambil 1 baris
        $data['title'] = 'Role';
        $data['role'] = $this->db->get('user_role')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }
    public function roleaccess($role_id){
        $data['user'] = $this->db->get_where('akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array(); // mengambil $data dari user di session berdasarkan id_akun di session- ambil 1 baris
        $data['title'] = 'Role Access';
        $data['role'] = $this->db->get_where('user_role', ['role_id'=> $role_id])->row_array();
        
        $this->db->where('id_menu!=', '1'); //biar menu admin ga muncul
        $data['menu'] = $this->db->get('akun_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }
    public function changeaccess(){
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');
        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_acces_menu', $data);
        if($result->num_rows() < 1){
            $this->db->insert('user_acces_menu', $data);
        } else {
            $this->db->delete('user_acces_menu', $data);
        }
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Has Been Updated</div>');
    }
    
    public function academic()
    {

        $data['nama_bidang'] = $this->db->get('bidang')->result_array();
        $data['user'] = $this->db->get_where('akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array(); // mengambil $data dari user di session berdasarkan id_akun di session- ambil 1 baris
        $data['fakultas'] = $this->db->get('fakultas')->result_array(); // mengambil $data dari user di session berdasarkan id_akun di session- ambil 1 baris
        $data['jurusan'] = $this->db->get('prodi')->result_array(); // mengambil $data dari user di session berdasarkan id_akun di session- ambil 1 baris
        $this->load->model('Fakultas_model', 'fakjur');
        $data['fakjur'] = $this->fakjur->getfakjur();
        $data['semester'] = $this->db->get('semester')->result_array();
        $data['title'] = 'Academic';
        $data['role'] = $this->db->get('user_role')->result_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/academic', $data);
        $this->load->view('templates/footer');

    }
    public function fakultas(){
        
            $data = [
                'fakultas' => $this->input->post('fakultas')
            ];
            $this->db->insert('fakultas', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Faculty Has Been Added</div>');
            redirect('admin/academic');
    }
    public function jurusan()
    {

        $data = [
            'id_fakultas' => $this->input->post('fakultas'),
            'jurusan' => $this->input->post('jurusan')
        ];
        $this->db->insert('prodi', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Course Has Been Added</div>');
        redirect('admin/academic');
    }
    public function semester()
    {

        $data = [
            'semester' => $this->input->post('semester')
        ];
        $this->db->insert('semester', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Semester Has Been Added</div>');
        redirect('admin/academic');
    }
    public function bidang()
    {
        $data = [
            'nama_bidang' => $this->input->post('nama_bidang')
        ];
        $this->db->insert('bidang', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Study Field Has Been Added</div>');
        redirect('admin/academic');
    }
}
