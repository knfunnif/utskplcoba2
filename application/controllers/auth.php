<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel');
        $this->load->library('session');
    }
    public function index()
    {
        if ($this->session->userdata('authenticated')) // Jika user sudah login (Session authenticated ditemukan)
            redirect('dashboard'); // Redirect ke page welcome
        $this->load->view('login'); // Load view login.php
    }
    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->LoginModel->get($email);

        if (empty($user)) {
            $this->session->set_flashdata('message', 'Login Gagal');
            redirect('auth');
        }  
            if ($password == $user->password) {
                $session = array(
                    'authenticated' => true,
                    'email' => $user->email
                );
                $this->session->set_userdata($session);
                redirect('dashboard');
            }
                $this->session->set_flashdata('message', 'Password Salah');
                redirect('auth');
    }
    public function logout()
    {
        $this->session->sess_destroy(); // Hapus semua session
        redirect('auth'); // Redirect ke halaman login
    }
}
