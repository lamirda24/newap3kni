<?php

defined('BASEPATH') or exit('No direct script access allowed');



class Model_admin extends CI_Model

{

    function getJumlahAnggota()

    {

        $query  = "SELECT count(*) as jumlah_anggota FROM data_anggota";

        return $this->db->query($query);
    }



    function getJumlahAnggotaAktif()

    {

        $query = "SELECT count(*) as jumlahAktif from data_anggota join keanggotaan on data_anggota.id_anggota = keanggotaan.id_d_anggota where status_keanggotaan = 1";

        return $this->db->query($query);
    }



    function jumlahAnggotaWilayah()

    {

        $query = "SELECT *, (SELECT count(*) FROM keanggotaan join data_anggota on data_anggota.id_anggota = keanggotaan.id_d_anggota WHERE data_anggota.wilayah_anggota = dw.id) AS total_anggota FROM wilayah dw";

        return $this->db->query($query);
    }



    function getDataPembayaran($status)

    {

        $this->db->select('*');

        $this->db->from('data_pembayaran');

        $this->db->where('status_pembayaran', $status);

        $this->db->join('data_anggota', 'data_pembayaran.id_anggota = data_anggota.id_anggota');

        $this->db->join('user_akun', 'data_anggota.id_akun = user_akun.id_user');

        $this->db->order_by('tgl_pembayaran', 'desc');

        return $this->db->get();
    }

    function getRiwayat()

    {

        $query = "SELECT *, nama_user from data_pembayaran join data_anggota on data_pembayaran.id_anggota = data_anggota.id_anggota join user_akun on data_anggota.id_akun = user_akun.id_user join keanggotaan on data_anggota.id_anggota = keanggotaan.id_d_anggota where not status_pembayaran = 0";

        return $this->db->query($query);
    }



    function updatePembayaran($status, $id)

    {

        $this->db->set($status);

        $this->db->where('id', $id);

        $this->db->update('data_pembayaran');
    }

    function getDataAnggota($where)

    {

        $this->db->select('*');

        $this->db->from('data_pembayaran');

        $this->db->where('id', $where);

        $this->db->join('data_anggota', 'data_pembayaran.id_anggota = data_anggota.id_anggota');

        $this->db->join('keanggotaan', 'data_anggota.id_anggota = keanggotaan.id_d_anggota');

        $this->db->join('user_akun', 'data_anggota.id_akun = user_akun.id_user');

        return $this->db->get();
    }

    function updateKeanggotaan($data, $where)

    {

        $this->db->set($data);
        $this->db->where($where);
        $this->db->update('keanggotaan');
    }

    function getKeanggotaan()

    {

        $this->db->select('*');
        $this->db->from('keanggotaan');
        $this->db->join('data_anggota', 'keanggotaan.id_d_anggota = data_anggota.id_anggota');
        $this->db->join('user_akun', 'data_anggota.id_akun = user_akun.id_user');
        // $this->db->where('nomor_keanggotaan !=', '');
        return $this->db->get();
    }



    function getDetailAnggota($where)

    {

        $this->db->select('*');

        $this->db->from('data_anggota');

        $this->db->where('id_anggota', $where);

        $this->db->join('wilayah', 'wilayah.id = data_anggota.wilayah_anggota');

        $this->db->join('keanggotaan', ' keanggotaan.id_d_anggota = data_anggota.id_anggota');

        $this->db->join('user_akun', 'user_akun.id_user=data_anggota.id_akun');

        return $this->db->get();
    }



    function getAnggotaDaerah($id)

    {

        $this->db->select('*');

        $this->db->from('data_anggota');

        $this->db->where('wilayah_anggota', $id);

        $this->db->join('user_akun', 'data_anggota.id_akun = user_akun.id_user');

        $this->db->join('wilayah', 'data_anggota.wilayah_anggota = wilayah.id');

        $this->db->join('keanggotaan', 'data_anggota.id_anggota = keanggotaan.id_d_anggota');

        return $this->db->get();
    }

    function getWilayah($id)

    {

        $this->db->select('*');

        $this->db->from('wilayah');

        $this->db->where('id', $id);

        return $this->db->get();
    }
    function getAkunNonAktif()
    {
        $this->db->select('*');
        $this->db->from('user_akun');
        $this->db->join('user_token', 'user_akun.email_user = user_token.email', 'left');
        $this->db->where('is_active', 0);
        return $this->db->get();
    }

    // function ubahStatusAnggota($data, $where)
    // {
    //     $this->db->set($data);
    //     $this->db->where($where);
    //     $this->db->update('keanggotaan');
    // }
}
