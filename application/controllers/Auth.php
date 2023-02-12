<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    // private $data = [];

    public function __construct() {
        parent::__construct();
        $this->load->model('auth_model','auth');
        $this->load->model('antrian_user_model','antrian_user');
        // $this->load->library('form_validation');
    }
    
    public function index() {

        // if ($this->session->userdata('email')) {
        //     redirect('User');
        // }
        var_dump('tes');
        $this->_validate();
        
        $username = $this->input->post('username_email');
        $email = $this->input->post('username_email');
        $password = $this->input->post('password');
    
        $user_email = $this->db->get_where('user', ['email' => $email])->row_array();
        $user_username = $this->db->get_where('user', ['username' => $username])->row_array();
        if( ($user_email) || ($user_username) ) {

            if($user_email){
                // cek password
                if ($password == $user_email['password']) {
                    $data = [
                        'email' => $user_email['email'],
                        'username' => $user_email['username'],
                        'role_id' => $user_email['role_id']
                    ];
                    $this->session->set_userdata($data);
                    echo json_encode(array("id" => $user_email['id'], "role_id" => $data['role_id'], "status" => TRUE));
                }
                
            }else if($user_username){
                // cek password
                if ($password == $user_username['password']) {
                    $data = [
                        'email' => $user_username['email'],
                        'username' => $user_username['username'],
                        'role_id' => $user_username['role_id']
                    ];
                    $this->session->set_userdata($data);
                    echo json_encode(array("id" => $user_username['id'], "role_id" => $data['role_id'], "status" => TRUE));
                }
                
            }
        }
        // $this->_login();

    }

    public function daftar()
    {
        $this->_validate_daftar();

        $email = $this->input->post('email');
        $role = $this->input->post('role');
        $nama = $this->input->post('nama');
        
        $data = array(
            'email' => $email,
            'role' => $role,
            'nama' => $nama,
            'datetime_requested' => date("Y-m-d H:i:s"),
            'status' => 'diproses',
        );

        $insert = $this->antrian_user->save($data);

        echo json_encode(array("status" => TRUE));

    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        
        var_dump($this->session->flashdata('message'));
        redirect('home');
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // jika usernya ada
        if ($user) {
            // jika usernya aktif
            if ($user['is_active'] == 1) {
                // cek password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else if ($user['role_id'] == 2){
                        redirect('coach');
                    } else {
                        redirect('startup');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This email has not been activated!</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email is not registered!</div>');
            redirect('auth');
        }
    }


    public function ajax_add()
    {
        $this->_validate();
        $data = array(
                'email' => $this->input->post('firstName'),
                'lastName' => $this->input->post('lastName'),
                'gender' => $this->input->post('gender'),
                'address' => $this->input->post('address'),
                'dob' => $this->input->post('dob'),
            );
        $insert = $this->person->save($data);
        echo json_encode(array("status" => TRUE));
    }

    // validasi
    private function _validate()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        $username = $this->input->post('username_email');
        $email = $this->input->post('username_email');
        $password = $this->input->post('password');

        
 
        if($username == '')
        {
            $data['inputerror'][] = 'username_email';
            $data['error_string'][] = 'Maaf, username atau email Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        // else if(!preg_match("/.+@.+\..+/",$email))
        // {
        //     $data['inputerror'][] = 'email';
        //     $data['error_string'][] = 'Maaf, Format Email Tidak Sesuai';
        //     $data['status'] = FALSE;
        // }
 
        if($password == '')
        {
            $data['inputerror'][] = 'password';
            $data['error_string'][] = 'Maaf, Password Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

    private function _validate_daftar()
    {
        $data = array();
        $data['error_string'] = array();
        $data['inputerror'] = array();
        $data['status'] = TRUE;

        $email = $this->input->post('email');
        $role = $this->input->post('role');
        $nama = $this->input->post('nama');
        
 
        if($email == '')
        {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'Maaf, email Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        else if(!preg_match("/.+@.+\..+/",$email))
        {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'Maaf, Format Email Tidak Sesuai';
            $data['status'] = FALSE;
        }
 
        if($nama == '')
        {
            $data['inputerror'][] = 'nama';
            $data['error_string'][] = 'Maaf, Nama Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }
 
        if($data['status'] === FALSE)
        {
            echo json_encode($data);
            exit();
        }
    }

}