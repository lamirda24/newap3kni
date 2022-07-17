<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Anggota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Model_anggota');
        $this->load->model('Model_auth');
        is_login();
    }
    public function index()
    {
        $user = $this->session->userdata('id');
        $data['nama'] = $this->session->userdata('nama');
        $data['role'] = $this->session->userdata('role');
        $data['anggota'] = $this->Model_anggota->getDataAnggota($user)->row_array();
        if ($data['anggota']['status_keanggotaan'] == 1) {
            $data['statusA'] = '<span class="label label-success">Aktif</span>';
        } else {
            $data['statusA'] = '<span class="label label-danger">Non-Aktif</span>';
            $this->session->set_flashdata('message', '<div class="alert alert-danger no-border col-lg-4">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
            <span class="text-semibold">Harap Segera Lakukan Pembayaran Untuk Mengaktifkan Keanggotaan Anda!</div>');
            redirect('anggota/pembayaran');
            // redirect('pembayaran');
        }
        $data['title'] = "AP3KNI | ANGGOTA";
        $this->load->view('templateUser/header', $data);
        $this->load->view('templateUser/sidebar', $data);
        $this->load->view('anggota/index', $data);
        $this->load->view('templateUser/footer', $data);
    }
    public function profile()
    {
        $user = $this->session->userdata('id');
        $data['nama'] = $this->session->userdata('nama');
        $data['title'] = "AP3KNI | ANGGOTA - Profile";
        $data['role'] = $this->session->userdata('role');
        //bikin model buaat get info profile
        $data['anggota'] = $this->Model_anggota->getDataAnggota($user)->row_array();
        $data['akun'] = $this->Model_anggota->getAkunAnggota($user)->row_array();
        if ($data['anggota']['status_keanggotaan'] == 1) {
            $data['statusA'] = '<span class="label label-success">Aktif</span>';
        } else {
            $data['statusA'] = '<span class="label label-danger">Non-Aktif</span>';
            $this->session->set_flashdata('message', '<div class="alert alert-danger no-border col-lg-4">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
            <span class="text-semibold">Harap Segera Lakukan Pembayaran Untuk Mengaktifkan Keanggotaan Anda!</div>');
            redirect('Anggota/pembayaran');
            // redirect('pembayaran');
        }
        $cekrows = $this->Model_anggota->getDataPembayaran($data['anggota']['id_anggota']);
        if ($cekrows->num_rows()) {
            $data['pembayaran'] = $this->Model_anggota->getDataPembayaran($data['anggota']['id_anggota'])->row_array();
            $data['history'] = $this->Model_anggota->getDataPembayaran($data['anggota']['id_anggota'])->result();
            if ($data['pembayaran']['status_pembayaran'] == 0) {
                $data['label'] = 'grey-400';
                $data['status'] = 'Diperiksa';
            } elseif ($data['pembayaran']['status_pembayaran'] == 1) {
                $data['label'] = 'success-400';
                $data['status'] = 'Diterima';
            } else {
                $data['label'] = 'danger-400';
                $data['status'] = 'Ditolak';
            }
        } else {
            $data['pembayaran']['id'] = '-';
            $data['pembayaran']['tgl_pembayaran'] = '';
            $data['status'] = '-';
            $data['history'] = array();
            $data['label'] = 'grey-800';
        }
        $this->form_validation->set_rules('curPassword', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('newPassword', 'New Password', 'required|trim|min_length[6]|matches[newPassword1]', [
            'matches' => 'Password does not match!',
            'min_length' => 'Password must be at least 6 characters'
        ]);
        $this->form_validation->set_rules('newPassword1', 'Password', 'required|trim|matches[newPassword]', [
            'matches' => 'Password does not match!',
        ]);
        if ($this->form_validation->run() == false) {
            $this->load->view('templateUser/header', $data);
            $this->load->view('templateUser/sidebar', $data);
            $this->load->view('anggota/profile', $data);
            $this->load->view('templateUser/footer', $data);
        } else {
            $currPas = $this->input->post('curPassword');
            $newPas = $this->input->post('newPassword');
            if (!password_verify($currPas, $data['akun']['password_user'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger no-border col-lg-4">
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                <span class="text-semibold"> Current Password Salah!</div>');
                redirect('Anggota/profile');
            } else {
                if ($currPas == $newPas) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger no-border col-lg-4">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold"> Password baru tidak boleh sama dengan password sekarang!</div>');
                    redirect('Anggota/profile');
                } else {
                    $pass = password_hash($newPas, PASSWORD_DEFAULT);
                    $this->Model_anggota->updatePassword($user, $pass);
                    $this->session->set_flashdata('message', '<div class="alert alert-success no-border col-lg-4">
                    <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
                    <span class="text-semibold">Password berhasil diubah!</div>');
                    redirect('Anggota/profile');
                }
            }
        }
    }
    public function pembayaran()
    {
        $user = $this->session->userdata('id');
        $data['nama'] = $this->session->userdata('nama');
        $data['title'] = "AP3KNI | ANGGOTA - Pembayaran";
        $data['judul'] = "Data Pembayaran";
        $data['role'] = $this->session->userdata('role');
        $data['anggota'] = $this->Model_anggota->getDataAnggota($user)->row_array();
        $idAnggota  = $data['anggota']['id_anggota'];
        //bikin model buaat get info profile
        $cekrows = $this->Model_anggota->getDataPembayaran($idAnggota);
        if ($cekrows->num_rows()) {
            $data['pembayaran'] = $this->Model_anggota->getDataPembayaran($idAnggota)->row_array();
            $data['history'] = $this->Model_anggota->getRiwayat($idAnggota)->result();
            if ($data['pembayaran']['status_pembayaran'] == 0) {
                $data['label'] = 'grey-400';
                $data['status'] = 'Diperiksa';
            } elseif ($data['pembayaran']['status_pembayaran'] == 1) {
                $data['label'] = 'success-400';
                $data['status'] = 'Diterima';
            } else {
                $data['label'] = 'danger-400';
                $data['status'] = 'Ditolak';
            }
        } else {
            $data['pembayaran']['id'] = '-';
            $data['pembayaran']['tgl_pembayaran'] = '';
            $data['status'] = '-';
            $data['history'] = array();
            $data['label'] = 'grey-800';
        }
        if ($data['anggota']['status_keanggotaan'] == 1) {
            $data['statusA'] = '<span class="label label-success">Aktif</span>';
        } else {
            $data['statusA'] = '<span class="label label-danger">Non-Aktif</span>';
        }
        $this->load->view('templateUser/header', $data);
        $this->load->view('templateUser/sidebar', $data);
        $this->load->view('anggota/pembayaran', $data);
        $this->load->view('templateUser/footer', $data);
    }
    public function uploadPembayaran()
    {
        $user = $this->session->userdata('id');
        $idAnggota = $this->Model_anggota->getIdAnggota($user)->row_array();
        $upload_foto = $_FILES['foto']['name'];
        if ($upload_foto) {
            $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG';
            $config['max_size'] = 3000;
            $config['upload_path'] = './assets/user/bukti';
            $config['encrypt_name'] = true;
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('foto')) {
                $namafile = $this->upload->data('file_name');
            } else {
                echo $this->upload->display_errors();
            }
            $data = array(
                'id_anggota' => $idAnggota['id_anggota'],
                'tgl_pembayaran' => date('Y-m-d'),
                'status_pembayaran' => 0,
                'bukti_pembayaran' => $namafile
            );
            $this->db->insert('data_pembayaran', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success no-border col-lg-4">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
            <span class="text-semibold"> Berhasil Unggah Bukti Pembayaran!</div>');
            redirect('Anggota/pembayaran');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger no-border col-lg-4"> <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>Anda Belum Memilih File! </div>');
            redirect('Anggota/pembayaran');
        }
    }
    public function editProfile()
    {
        $user = $this->session->userdata('id');
        $idAnggota = $this->Model_anggota->getIdAnggota($user)->row_array();
        $idAnggota = $idAnggota['id_anggota'];
        $data['nama'] = $this->session->userdata('nama');
        $data['role'] = $this->session->userdata('role');
        $data['title'] = "AP3KNI | ANGGOTA - Ubah Profile";
        //bikin model buaat get info profile
        $data['anggota'] = $this->Model_anggota->getDataAnggota($user)->row_array();
        $data['wilayah'] = $this->Model_auth->getWilayah();
        $defaultFoto = $data['anggota']['foto_anggota'];
        if ($data['anggota']['status_keanggotaan'] == 1) {
            $data['statusA'] = '<span class="label label-success">Aktif</span>';
        } else {
            $data['statusA'] = '<span class="label label-danger">Non-Aktif</span>';
            $this->session->set_flashdata('message', '<div class="alert alert-danger no-border col-lg-4">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
            <span class="text-semibold">Harap Segera Lakukan Pembayaran Untuk Mengaktifkan Keanggotaan Anda!</div>');
            redirect('anggota/pembayaran');
            // redirect('pembayaran');
        }
        $this->form_validation->set_rules('gelar', 'Gelar', 'required|trim', [
            'required' => 'Gelar pendidikan harus diisi!'
        ]);
        $this->form_validation->set_rules('notlp', 'Nomor Telepon', 'required|trim|numeric|min_length[10]|max_length[13]', [
            'required' => 'Nomor Telepon Harus diisi!',
            'numeric' => 'Harus diisi dengan angka!',
            'min_length' => 'Minimal 10 digit angka!',
            'max_length' => 'Maksimal 13 digit angka!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', ['required' => 'Alamat harus diisi!']);
        $this->form_validation->set_rules('asal', 'Asal', 'required|trim', ['required' => 'Asal Instansi harus diisi!']);
        //--
        if ($this->form_validation->run() == false) {
            $this->load->view('templateUser/header', $data);
            $this->load->view('templateUser/sidebar', $data);
            $this->load->view('anggota/editProfile', $data);
            $this->load->view('templateUser/footer', $data);
        } else {
            $nama = $this->input->post('nama');
            $upload_foto = $_FILES['foto']['name'];
            if ($upload_foto) {
                $config['allowed_types'] = 'jpg|png|jpeg|JPG|PNG';
                $config['max_size'] = 2048;
                $config['upload_path'] = './assets/user/foto';
                $config['encrypt_name'] = true;
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('foto')) {
                    $old_img = $data['anggota']['foto_anggota'];
                    $namafile = $this->upload->data('file_name');
                    if ($namafile) {
                        unlink(FCPATH . 'assets/user/foto/' . $old_img);
                    }
                } else {
                    echo $this->upload->display_errors();
                }
            } else {
                $namafile = $defaultFoto;
            }
            $profile = array(
                'gelar_anggota' => $this->input->post('gelar'),
                'tlp_anggota' => $this->input->post('notlp'),
                'alamat_anggota' => $this->input->post('alamat'),
                'instansi_anggota' => $this->input->post('asal'),
                'jabatan_anggota' => $this->input->post('jabatan'),
                'wilayah_anggota' => $this->input->post('wilayah'),
                'foto_anggota' => $namafile
            );
            var_dump($profile);
            die;
            $this->Model_anggota->updateNama($nama, $user);
            $this->Model_anggota->updateDataDiri($profile, $idAnggota);
            $this->session->set_flashdata('message', '<div class="alert alert-success no-border col-lg-4">
            <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
            <span class="text-semibold"> Profile Anda Berhasil diubah!</div>');
            redirect('Anggota/profile');
        }
    }
}
