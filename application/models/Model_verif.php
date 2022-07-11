<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_verif extends CI_Model
{
    function getDataVerif($id)
    {
        $this->db->select('*');
        $this->db->from('keanggotaan');
        $this->db->where('nomor_keanggotaan', $id);
        $this->db->join('data_anggota', 'keanggotaan.id_d_anggota = data_anggota.id_anggota');
        $this->db->join('user_akun', 'data_anggota.id_akun = user_akun.id_user');
        $this->db->join('wilayah', 'data_anggota.wilayah_anggota = wilayah.id');
        return $this->db->get();
    }
}
