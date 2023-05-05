<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(['url', 'form', 'html', 'main_helper']);
		$this->load->library(['template', 'session', 'form_validation']);
		$this->load->model(['Auth_model', 'Main_model']);
	}

	public function index()
	{
		$where = array('id_user' => $this->session->userdata('id_user'));
		$this->data['user'] = $this->Main_model->where_data($where, 'users')->row_array();
		$user = $this->Main_model->where_data($where, 'users')->row_array();
		$this->data['foto'] = array(
			'id'    => 'foto',
			'name'  => 'foto',
			'type'  => 'file',
			'value' => $this->form_validation->set_value('foto', $user['foto']),
		);

		$this->data['content'] = 'auth/profile';
		$this->template->_render_page('layout/landingpagePanel', $this->data);
	}
	
	public function upload_foto()
	{
		$where = array('id_user' => $this->session->userdata('id_user'));
		$user = $this->Main_model->where_data($where, 'users')->row_array();
		$data = [];
		if (!empty($_FILES['foto']['name'])) {
			$config['upload_path']          = './uploads/foto-profil/';
			$config['allowed_types']        = 'jpg|png';
			$config['max_size']             = 2000000;
			$config['file_name']            = $_FILES['foto']['name'];

			$this->load->library('upload', $config);
			$this->upload->initialize($config);

			if (!$this->upload->do_upload('foto')) {
				$this->session->set_flashdata('error', $this->upload->display_errors());
				redirect('profile', 'refresh');
			} else {
				$image_data = $this->upload->data();
				$data['foto'] = $image_data['file_name'];
				if ($this->Main_model->update_data($where, $data, 'users')) {
					if (!empty($user['foto'])) {
						unlink('./uploads/foto-profil/' . $user['foto']);
					}
					$this->session->set_flashdata('success', 'Foto berhasil diubah!');
					redirect('profile', 'refresh');
				}
			}
		} else {
			if ($this->Main_model->update_data($where, $data, 'user')) {
				$this->session->set_flashdata('success', 'Data berhasil diubah!');
				redirect('user', 'refresh');
			}
		}
	}

	
	
// History
	public function history()
	{
		$where = array('id_user' => $this->session->userdata('id_user'));
		$this->data['history'] = $this->Main_model->where_data($where, 'pembayaran')->result();

		$this->data['additional_head'] = '<link rel="stylesheet" href="'.base_url().'assets/landing-page/css/detail_produk.css" />';
		$this->data['content'] = 'interface/history_pembayaran/index';
		$this->template->_render_page('layout/landingpagePanel', $this->data);
	}
}
