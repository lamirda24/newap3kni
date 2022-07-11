<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_auth extends CI_Model
{

    function getUser($where)
    {
        return $this->db->get_where('user_akun', ['email_user' => $where]);
    }
    function getAkun($where)
    {
        $this->db->select('*');
        $this->db->from('user_akun');
        $this->db->where('email_user', $where);
        return $this->db->get();
    }

    function getDataAnggota($id)
    {
        $this->db->select('*');
        $this->db->from('data_anggota');
        $this->db->where('id_akun', $id);
        return $this->db->get();
    }

    function getWilayah()
    {
        return $this->db->get('wilayah')->result();
    }
    function getToken($token)
    {
        return $this->db->get_where('user_token', ['token' => $token]);
    }

    function deleteAkun($id)

    {
        $this->db->query("DELETE user_akun, data_anggota from user_akun LEFT join data_anggota on user_akun.id_user = data_anggota.id_akun WHERE user_akun.id_user =$id");
    }
    function deleteKeanggotaan($where)
    {
        $this->db->query("DELETE from keanggotaan where id_d_anggota = $where ");
    }

    function accActivation($email)
    {
        $this->db->set('is_active', 1);
        $this->db->where('email_user', $email);
        $this->db->update('user_akun');
    }
    function getAkunAktif($where)
    {
        $this->db->select('*');
        $this->db->from('user_akun');
        $this->db->where('email_user', $where);
        $this->db->where('is_active', 1);
        return $this->db->get();
    }
    function resetPass($pass, $email)
    {
        $this->db->set('password_user', $pass);
        $this->db->where('email_user', $email);
        $this->db->update('user_akun');
    }
  function cekEmailToken($email)
    {
        return $this->db->get_where('user_token', ['email' => $email]);
    }

}
