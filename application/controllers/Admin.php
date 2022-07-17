<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->library('encryption');
        $this->load->model('Model_admin');
        $data['stausA'] = "";
        is_login();
    }
    public function index()
    {
        $user = $this->session->userdata('id');
        $data['nama'] = $this->session->userdata('nama');
        $data['role'] = $this->session->userdata('role');
        $data['title'] = "AP3KNI | ADMIN";
        $data['breadcumb'] = "Dashboard";
        $data['jumlah'] = $this->Model_admin->getJumlahAnggota()->row();
        $data['aktif'] = $this->Model_admin->getJumlahAnggotaAktif()->row();
        $this->load->view('templateUser/header', $data);
        $this->load->view('templateUser/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templateUser/footer', $data);
    }
    public function pembayaran()
    {
        $data['nama'] = $this->session->userdata('nama');
        $data['role'] = $this->session->userdata('role');
        $data['title'] = "AP3KNI | ADMIN";
        $data['breadcumb'] = "Dashboard";
        $data['bread'] = "Data Pembayaran";
        $data['pembayaran'] = $this->Model_admin->getDataPembayaran(0)->result();
        $data['riwayat'] = $this->Model_admin->getRiwayat()->result();
        $this->load->view('templateUser/header', $data);
        $this->load->view('templateUser/sidebar', $data);
        $this->load->view('admin/pembayaran', $data);
        $this->load->view('templateUser/footer', $data);
    }
    public function terima($id)
    {
        $idp = base64_decode($id);
        $this->_terima($idp);
    }
    private function _terima($idp)
    {
        $status = array('status_pembayaran' => 1);
        $dataAnggota = $this->Model_admin->getDataAnggota($idp)->row_array();
        $idAnggota = array('id_d_anggota' => $dataAnggota['id_anggota']);
        $nomorKeanggotaan = date('y') . '0' . date('dmy', strtotime($dataAnggota['tgl_anggota'])) . '0-' . $dataAnggota['id_keanggotaan'];
        $nomor = base64_encode($nomorKeanggotaan);
        $dataAnggota['stats'] = 'Selamat,';
        $dataAnggota['status'] = "Berhasil";
        if (!($dataAnggota['nomor_keanggotaan'])) {
            $members = array(
                'nomor_keanggotaan' => $nomorKeanggotaan,
                'status_keanggotaan' => 1,
                'berakhir' => date('Y-m-d', strtotime('+1 years')),
                'qrcode' => $nomor . '.png'
            );
            //kirim notif email generate qr code
        } else {
            $members = array(
                'status_keanggotaan' => 1,
                'berakhir' => date('Y-m-d', strtotime('+1 years')),
            );
            //kirim notif
        }
        $mess = $this->load->view('notifikasi', $dataAnggota, true);
        //$this->_notifikasiEmail($dataAnggota['email_user'], 'Pembayaran Anda Berhasil Diterima!', $mess);
        $this->Model_admin->updatePembayaran($status, $idp);
        $this->Model_admin->updateKeanggotaan($members, $idAnggota);
        $this->_generateQr($nomor);
        $this->session->set_flashdata('message', '<div class="alert alert-success no-border col-lg-4">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
        <span class="text-semibold">Anda telah berhasil menerima pembayaran!</div>');
        redirect('Admin/pembayaran');
    }
    public function tolak($id)
    {
        $idp = base64_decode($id);
        $status = array('status_pembayaran' => 2);
        //$this->Model_admin->updatePembayaran($status, $idp);
        $dataAnggota = $this->Model_admin->getDataAnggota($idp)->row_array();
        // var_dump($dataAnggota);
        $dataAnggota['stats'] = 'Mohon Maaf,';
        $dataAnggota['status'] = "Gagal";
        //kirim email
        $mess = $this->load->view('notifikasi', $dataAnggota, true);
        $this->_notifikasiEmail($dataAnggota['email_user'], 'Pembayaran Anda Gagal!', $mess);
        $this->Model_admin->updatePembayaran($status, $idp);
        $this->session->set_flashdata('message', '<div class="alert alert-danger no-border col-lg-4">
        <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>
        <span class="text-semibold">Anda telah Menolak Pembayaran!</div>');
        redirect('Admin/pembayaran');
    }
    private function _generateQr($idMember)
    {
        $this->load->library('ciqrcode');
        header("Content-Type: image/png");
        $config['imagedir'] = './assets/user/qrcode/';
        $config['quality'] = true;
        $config['size'] = '1024';
        $config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
        $config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
        $this->ciqrcode->initialize($config);
        $img_name = $idMember . '.png';
        $params['data'] = 'http://ap3kni.or.id/keanggotaan/Verif/verifikasi/' . $idMember;
        $params['level'] = 'H';
        $params['size'] = 10;
        $params['savename'] = FCPATH . $config['imagedir'] . $img_name;
        $this->ciqrcode->generate($params);
    }
    public function _notifikasiEmail($to, $subject, $message)
    {
        $this->load->library('email');
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = 'mail.ap3kni.or.id';
        $config['smtp_port']    = '587';
        $config['smtp_timeout'] = '10';
        $config['smtp_user']    = 'info@ap3kni.or.id';
        $config['smtp_pass']    = 'Admin3kali';
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $this->email->initialize($config);
        // Set to, from, message, etc
        $this->email->from('info@ap3kni.or.id', 'AP3KNI noreply');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        $result = $this->email->send();
        echo $this->email->print_debugger();
    }
    public function anggota()
    {
        $data['nama'] = $this->session->userdata('nama');
        $data['role'] = $this->session->userdata('role');
        $data['title'] = "AP3KNI | ADMIN";
        $data['breadcumb'] = "Dashboard ";
        $data['bread'] = "Data Anggota";
        $data['anggota'] = $this->Model_admin->getKeanggotaan()->result();
        $this->load->view('templateUser/header', $data);
        $this->load->view('templateUser/sidebar', $data);
        $this->load->view('admin/dataAnggota', $data);
        $this->load->view('templateUser/footer', $data);
    }
    public function anggotaWil()
    {
        $data['nama'] = $this->session->userdata('nama');
        $data['role'] = $this->session->userdata('role');
        $data['title'] = "AP3KNI | ADMIN";
        $data['breadcumb'] = "Dashboard ";
        $data['bread'] = "Data Wilayah";
        $data['jumlahWilayah'] = $this->Model_admin->jumlahAnggotaWilayah()->result();
        $this->load->view('templateUser/header', $data);
        $this->load->view('templateUser/sidebar', $data);
        $this->load->view('admin/anggotaWilayah', $data);
        $this->load->view('templateUser/footer', $data);
    }
    public function updateAnggota($id, $status)
    {
        if ($status === "1") {
            $where = array('id_keanggotaan' => $id);
            $data = array(
                'status_keanggotaan' => 0,
            );
        } else {
            $where = array('id_keanggotaan' => $id);
            $data = array(
                'status_keanggotaan' => 1,
            );
        }
        $this->Model_admin->updateKeanggotaan($data, $where);
        redirect('admin/anggota');
        //kalau statusnya 1
        //ubah status keanggotaan jadi 0
        //ubah masa berakhir sampai skr(belom pasti)
    }
    public function detailAnggota($id)
    {
        $this->load->model('Model_anggota');
        $data['nama'] = $this->session->userdata('nama');
        $data['role'] = $this->session->userdata('role');
        $id = base64_decode($id);
        $data['title'] = "AP3KNI | ADMIN";
        $data['breadcumb'] = "Data Anggota ";
        $data['bread'] = "";
        $data['anggota'] =  $this->Model_admin->getDetailAnggota($id)->row_array();
        $data['riwayat'] = $this->Model_anggota->getDataPembayaran($id)->result();
        $this->load->view('templateUser/header', $data);
        $this->load->view('templateUser/sidebar', $data);
        $this->load->view('admin/detailAnggota', $data);
        $this->load->view('templateUser/footer', $data);
    }
    public function dataAnggotaDaerah($id)
    {
        $data['nama'] = $this->session->userdata('nama');
        $data['role'] = $this->session->userdata('role');
        $data['title'] = "AP3KNI | ADMIN";
        $data['breadcumb'] = "Data Anggota ";
        $data['bread'] = "Wilayah";
        $data['anggota'] = $this->Model_admin->getAnggotaDaerah($id)->result();
        $data['wilayah'] = $this->Model_admin->getWilayah($id)->row_array();
        $this->load->view('templateUser/header', $data);
        $this->load->view('templateUser/sidebar', $data);
        $this->load->view('admin/detailWilayah', $data);
        $this->load->view('templateUser/footer', $data);
    }
    public function aktivasiAkun()
    {
        $data['nama'] = $this->session->userdata('nama');
        $data['role'] = $this->session->userdata('role');
        $data['title'] = "AP3KNI | ADMIN";
        $data['breadcumb'] = "Data Anggota ";
        $data['bread'] = "Aktivasi Akun";
        $data['anggota'] = $this->Model_admin->getAkunNonAktif()->result();
        // $data['anggota'] = $this->Model_admin->getAnggotaDaerah($id)->result();
        // $data['wilayah'] = $this->Model_admin->getWilayah($id)->row_array();
        $this->load->view('templateUser/header', $data);
        $this->load->view('templateUser/sidebar', $data);
        $this->load->view('admin/aktivasiAkun', $data);
        $this->load->view('templateUser/footer', $data);
    }
    public function createToken($email)
    {
        $token = base64_encode(random_bytes(32));
        $user_token = [
            'email' => $email,
            'token' => $token,
            'date_created' => time()
        ];
        $this->db->insert('user_token', $user_token);
        $this->session->set_flashdata('message', '<div class="alert alert-success no-border"> <button type="button" class="close" data-dismiss="alert"><span>&times;</span><span class="sr-only">Close</span></button>Token berhasil dibuat!</div>');
        redirect('Admin/AktivasiAkun');
    }
    public function test($id)
    {
        redirect('admin/anggota');
    }
}
