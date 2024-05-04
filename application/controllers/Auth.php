<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    // private $data = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->model('auth_model', 'auth');
        $this->load->model('responden_model', 'responden');
        $this->load->model('applied_kuesioner_responden_model', 'applied_kuesioner_responden');
        $this->load->model('kuesioner_responden_pretest_kontrol_model', 'kuesioner_responden_pretest_kontrol');
        $this->load->model('kuesioner_responden_pretest_intervensi_model', 'kuesioner_responden_pretest_intervensi');
        $this->load->model('kuesioner_responden_postest_kontrol_model', 'kuesioner_responden_postest_kontrol');
        $this->load->model('kuesioner_responden_postest_intervensi_model', 'kuesioner_responden_postest_intervensi');
        // $this->load->library('form_validation');
    }

    public function index()
    {
        $username = $this->input->post('username_email');
        $email = $this->input->post('username_email');
        $password = $this->input->post('password');

        $user_email = $this->db->get_where('user', ['email' => $email])->row_array();
        $user_username = $this->db->get_where('user', ['username' => $username])->row_array();

        $user = ($user_email) ? $user_email : $user_username;

        // jika user ada
        if ($user) {
            var_dump($user['id']);
            // session
            $this->session->set_flashdata('email_username_value', $this->input->post('username_email'));

            // cek password
            if ($password == $user['password']) {
                $data = [
                    'email' => $user['email'],
                    'username' => $user['username'],
                    'role_id' => $user['role_id']
                ];

                $this->session->set_userdata($data);

                if ($user['role_id'] == 1) {
                    redirect("admin/" . $user['id']);
                } else {
                    redirect("responden/" . $user['id']);
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger d-flex align-items-center text-white" style="font-size:13px" role="alert"><svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                <div>Maaf Password yang anda masukkan salah !</div></div>');

                redirect('home');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger d-flex align-items-center text-white" style="font-size:13px" role="alert"><svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
            <div>Maaf Email atau Username Anda Belum Terdaftar !</div></div>');

            redirect('home');
        }
    }

    public function daftar()
    {
        $this->_validate_daftar();

        $email = $this->input->post('email');
        $password2 = $this->input->post('password2');
        $confirm_password = $this->input->post('confirm_password');
        $nama = $this->input->post('nama');
        $usia = $this->input->post('usia');
        $gender = $this->input->post('gender');
        $pendidikan = $this->input->post('pendidikan');
        $pekerjaan = $this->input->post('pekerjaan');
        $riwayat_merokok = $this->input->post('riwayat-merokok');
        $konsumsi_alkohol = $this->input->post('konsumsi-alkohol');
        $penyakit = $this->input->post('penyakit');
        $desc_penyakit = $this->input->post('desc_penyakit');

        if (!empty($desc_penyakit)) {
            $penyakit = $penyakit . ", " . $desc_penyakit;
        }

        $data_user = array(
            'username' => $nama . date("dmyHis"),
            'email' => $email,
            'password' => $password2,
            'role_id' => '2',
            'date_created' => date("Y-m-d H:i:s"),
            'id_admin' => 1
        );

        $insert_user = $this->auth->save($data_user);

        $data_responden = array(
            'nama' => $nama,
            'usia' => $usia,
            'pendidikan' => $pendidikan,
            'pekerjaan' => $pekerjaan,
            'gender' => $gender,
            'email' => $email,
            'gambar' => 'responden_default.png',
            'id_user' => $insert_user
        );

        $insert_responden = $this->responden->save($data_responden);

        // applied_kuesioner_responden
        $data_applied_kuesioner_responden = array(
            'id_responden' => $insert_responden
        );

        $insert_applied_kuesioner_responden = $this->applied_kuesioner_responden->save($data_applied_kuesioner_responden);

        // pretest kontrol default
        $data_kuesioner_responden_pretest_kontrol = array(
            'id_responden' => $insert_responden,
            'qk1_d' => $nama,
            'qk2_d' => $usia,
            'qk3_d' => $pendidikan,
            'qk4_d' => $pekerjaan,
            'qk5_d' => $riwayat_merokok,
            'qk6_d' => $konsumsi_alkohol,
            'qk7_d' => $penyakit
        );

        $insert_kuesioner_pretest_kontrol = $this->kuesioner_responden_pretest_kontrol->save($data_kuesioner_responden_pretest_kontrol);

        // pretest intervensi default
        $data_kuesioner_responden_pretest_intervensi = array(
            'id_responden' => $insert_responden,
            'qk1_d' => $nama,
            'qk2_d' => $usia,
            'qk3_d' => $pendidikan,
            'qk4_d' => $pekerjaan,
            'qk5_d' => $riwayat_merokok,
            'qk6_d' => $konsumsi_alkohol,
            'qk7_d' => $penyakit
        );

        $insert_kuesioner_pretest_intervensi = $this->kuesioner_responden_pretest_intervensi->save($data_kuesioner_responden_pretest_intervensi);

        // postest kontrol default
        $data_kuesioner_responden_postest_kontrol = array(
            'id_responden' => $insert_responden,
            'qk1_d' => $nama,
            'qk2_d' => $usia,
            'qk3_d' => $pendidikan,
            'qk4_d' => $pekerjaan,
            'qk5_d' => $riwayat_merokok,
            'qk6_d' => $konsumsi_alkohol,
            'qk7_d' => $penyakit
        );

        $insert_kuesioner_postest_kontrol = $this->kuesioner_responden_postest_kontrol->save($data_kuesioner_responden_postest_kontrol);

        // postest intervensi default
        $data_kuesioner_responden_postest_intervensi = array(
            'id_responden' => $insert_responden,
            'qk1_d' => $nama,
            'qk2_d' => $usia,
            'qk3_d' => $pendidikan,
            'qk4_d' => $pekerjaan,
            'qk5_d' => $riwayat_merokok,
            'qk6_d' => $konsumsi_alkohol,
            'qk7_d' => $penyakit
        );

        $insert_kuesioner_postest_intervensi = $this->kuesioner_responden_postest_intervensi->save($data_kuesioner_responden_postest_intervensi);

        $this->session->set_flashdata('message', '<div class="alert alert-success text-white" role="alert"><svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>Selamat, Akun anda telah berhasil terdaftar</div>');

        echo json_encode(array("status" => TRUE));
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success text-white" role="alert">You have been logged out!</div>');

        redirect("/");
    }

    private function login()
    {
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



        if ($username == '') {
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

        if ($password == '') {
            $data['inputerror'][] = 'password';
            $data['error_string'][] = 'Maaf, Password Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($data['status'] === FALSE) {
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
        $password2 = $this->input->post('password2');
        $confirm_password = $this->input->post('confirm_password');
        $nama = $this->input->post('nama');
        $usia = $this->input->post('usia');
        $gender = $this->input->post('gender');
        $pendidikan = $this->input->post('pendidikan');
        $pekerjaan = $this->input->post('pekerjaan');
        $riwayat_merokok = $this->input->post('riwayat-merokok');
        $konsumsi_alkohol = $this->input->post('konsumsi-alkohol');
        $penyakit = $this->input->post('penyakit');
        $desc_penyakit = $this->input->post('desc-penyakit');


        $user = $this->db->get_where('user', ['email' => $email])->row_array();


        if ($email == '') {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'Maaf, email Tidak Boleh Kosong';
            $data['status'] = FALSE;
        } else if (!preg_match("/.+@.+\..+/", $email)) {
            $data['inputerror'][] = 'email';
            $data['error_string'][] = 'Maaf, Format Email Tidak Sesuai';
            $data['status'] = FALSE;
        }

        if ($password2 == '') {
            $data['inputerror'][] = 'password2';
            $data['error_string'][] = 'Maaf, Password Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($confirm_password == '') {
            $data['inputerror'][] = 'confirm_password';
            $data['error_string'][] = 'Maaf, Confirm Password Tidak Boleh Kosong';
            $data['status'] = FALSE;
        } else if ($password2 != $confirm_password) {
            $data['inputerror'][] = 'confirm_password';
            $data['error_string'][] = 'Maaf, Confirm Password Tidak Sesuai';
            $data['status'] = FALSE;
        }

        if ($nama == '') {
            $data['inputerror'][] = 'nama';
            $data['error_string'][] = 'Maaf, nama Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if ($usia == '') {
            $data['inputerror'][] = 'usia';
            $data['error_string'][] = 'Maaf, Usia Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if (!isset($pendidikan)) {
            $data['inputerror'][] = 'pendidikan';
            $data['error_string'][] = 'Maaf, Pendidikan Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if (!isset($gender)) {
            $data['inputerror'][] = 'gender';
            $data['error_string'][] = 'Maaf, Gender Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if (!isset($riwayat_merokok)) {
            $data['inputerror'][] = 'riwayat-merokok';
            $data['error_string'][] = 'Maaf, Riwayat Merokok Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if (!isset($pekerjaan)) {
            $data['inputerror'][] = 'pekerjaan';
            $data['error_string'][] = 'Maaf, Pekerjaan Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if (!isset($konsumsi_alkohol)) {
            $data['inputerror'][] = 'konsumsi-alkohol';
            $data['error_string'][] = 'Maaf, Konsumsi Alkohol Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }

        if (!isset($penyakit)) {
            $data['inputerror'][] = 'penyakit';
            $data['error_string'][] = 'Maaf, Penyakit Tidak Boleh Kosong';
            $data['status'] = FALSE;
        }


        if ($user) {
            $data['inputerror'][] = 'message_daftar';
            $data['error_string'][] = 'Maaf Email yang anda masukkan telah terdaftar !';
            $data['status'] = FALSE;
        }


        if ($data['status'] === FALSE) {
            echo json_encode($data);
            exit();
        }
    }
}
