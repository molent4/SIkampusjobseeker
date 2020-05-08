<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    //menghindari akses tanpa session
    public function __construct() //menghindari akses tanpa session
    {
        parent::__construct();
        is_logged_in();
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array(); // mengambil $data dari user di session berdasarkan id_akun di session- ambil 1 baris
        $data['title'] = 'Menu Management';
        $data['menu'] = $this->db->get('akun_menu')->result_array();
        
        $this->form_validation->set_rules('menu','Menu', 'required'); //CEK SUBMIT MENU
        
        if($this->form_validation->run()==false){           //KALAU SEDANG TIDAK SUBMIT MENU LOAD HALAMAN
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        }else {
            $this->db->insert('akun_menu', ['menu' => $this->input->post('menu')] );
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Has Been Added</div>');
            redirect('menu');
        }

    }
    public function submenu(){
        $data['user'] = $this->db->get_where('akun', ['id_akun' => $this->session->userdata('id_akun')])->row_array(); // mengambil $data dari user di session berdasarkan id_akun di session- ambil 1 baris
        $data['title'] = 'Submenu Management';
        $data['menu'] = $this->db->get('akun_menu')->result_array();
        
        $this->load->model('Menu_model', 'menu');
        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('akun_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required'); //CEK SUBMIT SUBMENU
        $this->form_validation->set_rules('menu_id', 'Menu', 'required'); //CEK SUBMIT SUBMENU
        $this->form_validation->set_rules('url', 'Url', 'required'); //CEK SUBMIT SUBMENU
        $this->form_validation->set_rules('ikon', 'Icon', 'required'); //CEK SUBMIT SUBMENU
        

        if ($this->form_validation->run() == false) {     
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        }else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'ikon' => $this->input->post('ikon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('akun_sub_menu',$data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">SubMenu Has Been Added</div>');
            redirect('menu');
        }
    }

}