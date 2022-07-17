<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Model_anggota extends CI_Model
{
    function getDataAnggota($where)
    {
        $this->db->select('*');
        $this->db->from('data_anggota');
        $this->db->where('id_akun', $where);
        $this->db->join('wilayah', 'wilayah.id = data_anggota.wilayah_anggota');
        $this->db->join('keanggotaan', ' keanggotaan.id_d_anggota = data_anggota.id_anggota');
        $this->db->join('user_akun', 'user_akun.id_user=data_anggota.id_akun');
        return $this->db->get();
    }
    function getAkunAnggota($where)
    {
        $this->db->select('*');
        $this->db->from('user_akun');
        $this->db->where('id_user', $where);
        return $this->db->get();
    }
    function getIdAnggota($where)
    {
        $this->db->select('id_anggota');
        $this->db->from('data_anggota');
        $this->db->where('id_akun', $where);
        $this->db->join('user_akun', 'user_akun.id_user=data_anggota.id_akun');
        return $this->db->get();
    }
    function getRiwayat($id)
    {
        $query = "SELECT *, nama_user
        from data_pembayaran 
        join data_anggota on data_pembayaran.id_anggota = data_anggota.id_anggota
        join user_akun on data_anggota.id_akun = user_akun.id_user
        where data_pembayaran.id_anggota=" . $id;
        return $this->db->query($query);
    }
    function getDataPembayaran($where)
    {
        $this->db->select('*');
        $this->db->from('data_pembayaran');
        $this->db->where('id_anggota', $where);
        $this->db->order_by('id', 'desc');
        return $this->db->get();
    }
    function updatePassword($id, $pass)
    {
        $this->db->set('password_user', $pass);
        $this->db->where('id_user', $id);
        $this->db->update('user_akun');
    }
    function updateNama($nama, $id)
    {
        $this->db->set('nama_user', $nama);
        $this->db->where('id_user', $id);
        $this->db->update('user_akun');
    }
    function updateDataDiri($data, $id)
    {
        $this->db->set($data);
        $this->db->where('id_anggota', $id);
        $this->db->update('data_anggota');
    }
}
