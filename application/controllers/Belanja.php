<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Belanja extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(['url', 'form', 'html', 'main_helper']);
		$this->load->library(['template', 'session', 'form_validation']);
		$this->load->model(['Auth_model', 'Main_model']);
        $this->kontak();
	}

	public function detail($id)
	{
        $where = array('id_produk' => $id);
        $row = $this->Main_model->where_data($where, 'produk')->row_array();
        $this->data['produk'] = $this->Main_model->where_data($where, 'produk')->row_array();
        if (isset($row['id_produk'])) {
            $this->form_validation->set_rules('nama_produk', 'Nama Kategori', 'trim|required');

                $this->data['nama_produk'] = array(
                    'id'    => 'nama_produk',
                    'name'  => 'nama_produk',
                    'type'  => 'text',
                    'value' => $this->form_validation->set_value('nama_produk', $row['nama_produk']),
                );
                $this->data['foto'] = array(
                    'id'    => 'foto',
                    'name'  => 'foto',
                    'type'  => 'file',
                    'value' => $this->form_validation->set_value('foto', $row['foto']),
                );
                $this->data['id_produk'] = array(
                    'id'    => 'id_produk',
                    'name'  => 'id_produk',
                    'value' => $this->form_validation->set_value('id_produk', $row['id_produk']),
                );
				$this->data['additional_head'] = '<link href="' . base_url() . 'assets/admin-page/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
                                                  <link href="' . base_url() . 'assets/landing-page/css/detail_produk.css" rel="stylesheet" />';
				$this->data['additional_body'] = '<script src="' . base_url() . 'assets/admin-page/plugins/bootstrap-select/js/bootstrap-select.js"></script>';
                $this->data['content'] = 'interface/detail_produk/detail';
                $this->template->_render_page('layout/landingpagePanel', $this->data);
            }
	}

    public function belanja_add()
    {
        $data = [
            'id_user' => $this->session->userdata('id_user'),
        ];
        $this->Main_model->insert_data($data, 'pembayaran');
		$this->session->set_flashdata('success', 'Data berhasil dibeli!');
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function tipe_edit($id)
    {
        if (!$this->uri->segment(3)) {
            show_404();
        }
        $where = array('id_tipe' => $id);
        $row = $this->Main_model->where_data($where, 'tipe')->row_array();
        if (isset($row['id_tipe'])) {
            $this->form_validation->set_rules('nama_tipe', 'Nama Kategori', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->data['nama_tipe'] = array(
                    'id'    => 'nama_tipe',
                    'name'  => 'nama_tipe',
                    'type'  => 'text',
                    'value' => $this->form_validation->set_value('nama_tipe', $row['nama_tipe']),
                );
                $this->data['id_tipe'] = array(
                    'id'    => 'id_tipe',
                    'name'  => 'id_tipe',
                    'type'  => 'file',
                    'value' => $this->form_validation->set_value('id_tipe', $row['id_tipe']),
                );
				$this->data['additional_head'] = '<link href="' . base_url() . 'assets/admin-page/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />';
				$this->data['additional_body'] = '<script src="' . base_url() . 'assets/admin-page/plugins/bootstrap-select/js/bootstrap-select.js"></script>';
                $this->data['content'] = 'backend/modul-admin/tipe/tipe_edit';
                $this->template->_render_page('layout/adminPanel', $this->data);
            } else {
				$nama_tipe = $this->input->post('nama_tipe', true);
				$data = [
					'nama_tipe'   	=> $nama_tipe,
				];
                $where = array('id_tipe' => $row['id_tipe']);
				if ($this->Main_model->update_data($where, $data, 'tipe')) {
					$this->session->set_flashdata('success', 'Data berhasil diubah!');
					redirect('produk/tipe', 'refresh');
				}
            }
        }
    }

    public function tipe_delete($id)
    {
        $where = array('id_tipe' => $id);
        $_id = $this->Main_model->where_data($where, 'tipe')->row();
        $this->Main_model->delete_data($where, 'tipe');
		$this->session->set_flashdata('success', 'Data berhasil dihapus!');
        redirect('produk/tipe', 'refresh');
    }

// Other Stuff
	public function kontak()
	{
		$this->data['kontak'] = $this->Main_model->get_data('kontak')->row_array();
	}

	public function randomize($long)
	{
		$char = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0987654321';
		$string = '';
		for ($i=0; $i < $long; $i++) { 			
			$pos = rand(0, strlen($char)-1);
			$string .= $char[$pos];
		}
		return $string;
	}

}
