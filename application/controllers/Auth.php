<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Model_auth');
    }



    public function index()
    {
        if ($this->session->userdata('role') == 1) {
            redirect('Admin');
        } else if ($this->session->userdata('role') == 2) {
            redirect('Anggota');
        }

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email Harus disi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'Password harus diisi!']);
        if ($this->form_validation->run() == false) {
            $data['title'] = "AP3KNI | LOGIN";
            $this->load->view('templateAuth/header', $data);
            $this->load->view('auth/login');
            $this->load->view('templateAuth/footer');
        } else {
            $this->_login();
        }
    }

    public function registrasi()
    {
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Kolom Nama harus diisi!',
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user_akun.email_user]', [
            'is_unique' => "This email has been registered!"
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password does not match!',
            'min_length' => 'Password must be at least 6 characters'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = "AP3KNI | REGISTRASI";
            $this->load->view('templateAuth/header', $data);
            $this->load->view('auth/registrasi', $data);
            $this->load->view('templateAuth/footer');
        } else {
            $data = [
                'nama_user' => htmlspecialchars($this->input->post('nama', true)),
                'email_user' => htmlspecialchars($this->input->post('email', true)),
                'password_user' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_user' => 2,
                'is_active' => 0,
                'date_created' => date('Y-m-d')
            ];

            $this->db->insert('user_akun', $data);
            $sess = array(
                'nama_user' => htmlspecialchars($this->input->post('nama', true)),
                'email_user' => htmlspecialchars($this->input->post('email', true)),
            );
            $this->session->set_userdata($sess);
            redirect('Auth/dataDiri');
            //bikin redirect ke isi data diri
        }
    }

    public function dataDiri()
    {
        //cek ada session ato engga kalo ada ke data diri kalo engga balik regis
        if (!($this->session->userdata('email'))) {
            $data['title'] = "Registrasi | Data Diri";
            $data['wilayah'] = $this->Model_auth->getWilayah();
            $email = $this->session->userdata('email_user');
            $idUser = $this->Model_auth->getAkun($email)->row_array(); //getId user
            //rules validation
            $this->form_validation->set_rules('gelar', 'Gelar', 'required|trim', [
                'required' => 'Gelar pendidikan harus diisi!'
            ]);
            $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim', ['required' => 'Tanggal lahir harus diisi!']);
            $this->form_validation->set_rules('tempat', 'Tempat', 'required|trim', ['required' => 'Tempat lahir harus diisi!']);
            $this->form_validation->set_rules('tlp', 'Tlp', 'required|trim|numeric|min_length[10]|max_length[13]', [
                'numeric' => 'Harus diisi dengan angka!',
                'min_length' => 'Minimal 10 digit angka!',
                'max_length' => 'Maksimal 13 digit angka!'
            ]);
            $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', ['required' => 'Alamat harus diisi!']);
            $this->form_validation->set_rules('asal', 'Asal', 'required|trim', ['required' => 'Asal Instansi harus diisi!']);
            //--


            if ($this->form_validation->run() == false) {
                $this->load->view('templateAuth/header', $data);
                $this->load->view('auth/dataDiri', $data);
                $this->load->view('templateAuth/footer');
            } else {

                $upload_foto = $_FILES['foto']['name'];
                if ($upload_foto) {
                    $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG';
                    $config['max_size'] = 3000;
                    $config['upload_path'] = './assets/user/foto';
                    $config['encrypt_name'] = true;
                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('foto')) {
                        $namafile = $this->upload->data('file_name');
                    } else {
                        echo $this->upload->display_errors();
                    }
                }
                $dataDiri = array(
                    'id_akun' => $idUser['id_user'],
                    'gelar_anggota' => $this->input->post('gelar'),
                    'tgl_anggota' => date('Y-m-d', strtotime($this->input->post('tanggal'))),
                    'tempat_anggota' => $this->input->post('tempat'),
                    'tlp_anggota' => $this->input->post('tlp'),
                    'alamat_anggota' => $this->input->post('alamat'),
                    'instansi_anggota' => $this->input->post('asal'),
                    'jabatan_anggota' => $this->input->post('jabatan'),
                    'wilayah_anggota' => $this->input->post('wilayah'),
                    'foto_anggota' => $namafile,
                );
                // $membership = array(
                //     'id_d_anggota' => $idUser['id_user'],
                //     'bergabung' => date('Y-m-d'),
                //     'status_keanggotaan' => 1
                // );
                $this->db->insert('data_anggota', $dataDiri);
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];
                $this->db->insert('user_token', $user_token);
                // $this->_aktivasiEmail($email, $token, 'verifikasi');
                //kirim email aktivasi
                //kasih flash data 
                $unset = array('nama_user', 'email_user');
                $this->session->unset_userdata($unset);
                // $this->session->set_userdata($user_token);
                $this->session->set_flashdata('message', '<div class="alert alert-success no-border"> <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button> Click this to verify your account :  <a href="' . base_url() . 'Auth/verify?email=' . $email . '&token=' . urlencode($token) . '">Aktifkan Akun</a> </div>');

                redirect('Auth');
                //set session jadi kosong

            }
        } else {;
            redirect('Auth');
        }
    }

    private function _aktivasiEmail($to, $token, $type)
    {
        $this->load->library('email');

        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'ssl://smtp.gmail.com';
        $config['smtp_port']    = '465';
        $config['smtp_timeout'] = '10';
        $config['smtp_user']    = 'dummy.ap3kni@gmail.com';
        $config['smtp_pass']    = 'dummy123!';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html

        $this->email->initialize($config);
        // Set to, from, message, etc
        $this->email->from('info@ap3kni.or.id', 'noreply-AP3KNI');
        $this->email->to($to);
        if ($type == 'verify') {
            $this->email->subject('Aktivasi Akun');
            $this->email->message('Click this link to verify your account :  <a href="' . base_url() . 'Auth/verify?email=' . $to . '&token=' . urlencode($token) . '">Aktifkan Akun</a>');
        } else if ($type == 'forgot') {
            $this->email->subject('Forgot Password');
            $this->email->message('Click this link to reset your password :  <a href="' . base_url() . 'Auth/resetPassword?email=' . $to . '&token=' . urlencode($token) . '">Reset Password</a>');
        }


        $result = $this->email->send();
        echo $this->email->print_debugger();
    }
    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user = $this->Model_auth->getAkun($email)->row_array();
        $dataAnggota = $this->Model_auth->getDataAnggota($user['id_user'])->row_array();
        $user_token = $this->Model_auth->getToken($token)->row_array();
        if ($user) {
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24 * 7)) {
                    $this->Model_auth->accActivation($email); //set active
                    $this->db->delete('user_token', ['email' => $email]); //delete current usertoken
                    $membership = array(
                        'id_d_anggota' => $dataAnggota['id_anggota'],
                        'bergabung' => date('Y-m-d'),
                        'status_keanggotaan' => 0
                    );

                    $this->db->insert('keanggotaan', $membership);
                    $this->session->set_flashdata('message', '<div class="alert alert-success no-border"> <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>Akun ' . $email . ' Berhasil di Aktivasi!</div>');

                    redirect($_SERVER['HTTP_REFERER']);
                    // redirect('Auth');
                } else {
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->Model_auth->deleteAkun($user['id_user']);
                    $this->session->set_flashdata('message', '<div class="alert alert-success no-border"><button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button> Aktivasi Akun Gagal! Token Expired! Silahkan Registrasi Ulang</div>');
                    // redirect('Auth');
                    redirect($_SERVER['HTTP_REFERER']);
                }
            } else {

                $this->session->set_flashdata('message', '<div class="alert alert-danger no-border"><button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button> Aktivasi Akun Gagal! Token Anda Salah!</div>');
                redirect($_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success no-border"><button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button> Aktivasi Akun Gagal! Email Anda Salah!</div>');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }


    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $user = $this->Model_auth->getUser($email)->row_array();
        if ($user) {
            //cek aktif ato engga
            if ($user['is_active'] == 1) {
                //cek password
                if (password_verify($password, $user['password_user'])) {
                    $data = [
                        'id' => $user['id_user'],
                        'email' => $user['email_user'],
                        'nama' => $user['nama_user'],
                        'role' => $user['role_user']

                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_user'] == 1) {
                        redirect('Admin');
                    } else {
                        redirect('Anggota');
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger no-border"><button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>Password Anda Salah! </div>');
                    redirect('Auth');
                }
            } else {

                $this->session->set_flashdata('message', '<div class="alert alert-warning no-border"><button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>Akun anda belum diaktivasi! </div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-warning no-border"> <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>Akun anda belom terdaftar! </div>');
            redirect('Auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');

        $this->session->set_flashdata('message', '<div class="alert alert-success no-border"><button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button> Anda berhasil Logout! </div>');
        redirect('Auth');
    }
    public function blocked()
    {
        $this->load->view('auth/error');
    }
    // public function forgotPassword()
    // {
    //     $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
    //         'required' => 'Email Harus disi!'
    //     ]);
    //     $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
    //         'matches' => 'Password does not match!',
    //         'min_length' => 'Password must be at least 6 characters'
    //     ]);
    //     $this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim|matches[password1]');

    //     if ($this->form_validation->run() == false) {
    //         $data['title'] = "AP3KNI | Forgot Password";
    //         $this->load->view('templateAuth/header', $data);
    //         $this->load->view('auth/forgotPassword');
    //         $this->load->view('templateAuth/footer');
    //     } else {
    //         $email = $this->input->post('email');
    //         $cekEmail = $this->Model_auth->getAkunAktif($email)->row_array();
    //         // $cekEmailToken = $this->Model_auth->cekEmailToken($email)->row_array();
    //         if ($cekEmail) {

    //             // echo 1;
    //             // $token = base64_encode(random_bytes(32));
    //             // $user_token = [
    //             //     'email' => $email,
    //             //     'token' => $token,
    //             //     'date_created' => time()
    //             // ];
    //             // $send_email = $this->_aktivasiEmail($email, $token, 'forgot');
    //             // if ($send_email) {
    //             //     echo 2;
    //             //     if (count($cekEmailToken) > 0) {
    //             //         echo 3;
    //             //         $this->db->where('email', $email);
    //             //         $this->db->update('user_token', $user_token);
    //             //     } else {
    //             //         echo 4;
    //             //         $this->db->insert('user_token', $user_token);
    //             //     }
    //             //     $this->session->set_flashdata('message', '<div class="alert alert-success no-border"><button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>Silahkan cek email anda untuk reset password</div>');
    //             // } else {
    //             //     echo 5;
    //             //     $this->session->set_flashdata('message', '<div class="alert alert-danger no-border"><button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button> ERROR OCCURED!</div>');
    //             // }
    //             // die;
    //             redirect('Auth');
    //         } else {
    //             // $this->session->set_flashdata('message', '<div class="alert alert-danger no-border"><button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button> Email belum terdaftar atau diaktivasi!</div>');
    //             // redirect('Auth/forgotPassword');
    //         }
    //     }
    // }
    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');
        $user = $this->Model_auth->getAkun($email)->row_array();
        $user_token = $this->Model_auth->getToken($token)->row_array();
        if ($user) {
            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->resetPass();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger no-border"><button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button> Reset Password Gagal! Token Anda Salah!</div>');
                redirect('Auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger no-border"><button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button> Reset Password Gagal! Email Anda Salah!</div>');
            redirect('Auth');
        }
    }

    public function resetPass()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email Harus disi!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password does not match!',
            'min_length' => 'Password must be at least 6 characters'
        ]);
        $this->form_validation->set_rules('password2', 'Confirm Password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $data['title'] = "AP3KNI | Reset Password";
            $this->load->view('templateAuth/header', $data);
            $this->load->view('auth/resetPass');
            $this->load->view('templateAuth/footer');
        } else {
            $pass = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->input->post('email');
            $this->Model_auth->resetPass($pass, $email);
            $this->session->unset_userdata('email');
            $this->session->set_flashdata('message', '<div class="alert alert-success no-border"><button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button> Reset Password Berhasil!</div>');
            redirect('Auth');
        }
    }
}
