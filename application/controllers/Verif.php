<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Verif extends CI_Controller
{
	public function verifikasi($id)
	{
		$this->load->model('Model_verif');
		$id = base64_decode($id);
		$data['anggota'] = $this->Model_verif->getDataVerif($id)->row_array();
		$data['title'] = "AP3KNI - Verifikasi Anggota";

		if ($data['anggota']['status_keanggotaan'] == 1) {
			$data['status'] = 'Aktif';
		} else {
			$data['status'] = 'Non-Aktif';
		}
		$this->load->view('templateAuth/header', $data);
		$this->load->view('verifikasi', $data);
		$this->load->view('templateAuth/footer');
	}
}
