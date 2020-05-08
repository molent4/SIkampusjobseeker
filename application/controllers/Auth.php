<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }
    public function index(){
        $this->load->view('auth/home');
    }
    public function login()
    {
        if ($this->session->userdata('role')) {
            $temp = $this->session->userdata('role');
            if($temp == 'a'){
                redirect('admin');
            }
            elseif($temp == 'p'){
                redirect('perusahaan');
            }
            elseif($temp == 'm'){
                redirect('mahasiswa');
            }
        }
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Job-Seeker-Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');

        } else {
            $this->_login(); #method private
            
            }
        }
    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $user = $this->db->get_where('akun', ['username' => $username])->row_array();
        // ada
        if($user != null){
            // jika user aktif
            if($user['is_active'] == 1){
                // cek password
                if(password_verify($password, $user['password'])) {
                    // password benar
                    $data = [
                        'id_akun' => $user['id_akun'],
                        'role' => $user['role']
                    ];
                    $this->session->set_userdata($data);
                    if($data['role']=='m'){
                        redirect('mahasiswa/index');

                    } elseif($data['role']=='p'){
                        redirect('perusahaan/index');

                    }elseif($data['role']=='a'){
                        redirect('admin/index');

                    }
                } else {
                    // password salah
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Salah</div>');
                    redirect('auth/login');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Has Not Been Activated</div>');
                redirect('auth/login');
            }
        }
        // tidak ada
        else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username Not Found</div>');
            redirect('auth/login');
        }
    }
    public function registration()
    {
        if ($this->session->userdata('role')) {
            $temp = $this->session->userdata('role');
            if ($temp == 'a') {
                redirect('admin');
            } elseif ($temp == 'p') {
                redirect('perusahaan');
            } elseif ($temp == 'm') {
                redirect('mahasiswa');
            }
        }
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[akun.email]', ['is_unique' => 'email tidak dapat digunakan']); #trim biar spasi ga masuk is_unique[akun.email]
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[akun.username]', ['is_unique' => 'username tidak dapat digunakan' ]); #trim biar spasi ga masuk
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[6]|matches[repassword]', ['matches' => 'Password doesnt match', 'min_length' => 'Password too short' ]); #trim biar spasi ga masuk
        $this->form_validation->set_rules('repassword', 'Password', 'required|trim|matches[password]' ); #trim biar spasi ga masuk
        
        if ( $this->form_validation->run() == false){
            $data['title'] = 'Job-Seeker-Registration';
            $this->load->view('templates/auth_header', $data); 
        } else {

            $data = [
                'email' => htmlspecialchars($this->input->post('email', true)),
                'username' => htmlspecialchars($this->input->post('username', true)),
                'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
                'image'=>'default.jpg',
                'role' => $this->input->post('role'),
                'is_active' => 1,
                'date_created' => time()
            ];
            $this->db->insert('akun', $data);
            $user2 = $data['username'];
            if ($data['role'] == 'm') {
                $query = "INSERT INTO `mahasiswa`(`id_akun`) SELECT `id_akun` from `akun` where `username` = '$user2'";
                $this->db->query($query);
            } else if ($data['role'] == 'p') {
                $query = "INSERT INTO `perusahaan`(`id_akun`) SELECT `id_akun` from `akun` where `username` = '$user2'";
                $this->db->query($query);
            }
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your Account Has Been Created</div>');
            redirect('auth/login');
        }
        $data['title'] = 'Job-Seeker-Registration';
        $this->load->view('templates/auth_header', $data);
        $this->load->view('auth/registration');
        $this->load->view('templates/auth_footer');

    }

    public function logout(){
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('id_akun');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You Have Been Logged Out</div>');
        redirect('auth');
    }

    public function blocked(){
        $this->load->view('auth/blocked');
        
    }
}

   