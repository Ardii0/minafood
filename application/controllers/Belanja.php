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
            $this->data['jumlah'] = array(
                'id'    => 'jumlah',
                'name'  => 'jumlah',
                'type'  => 'number',
                'value' => $this->form_validation->set_value('jumlah'),
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
        $where = array('id_user' => $this->session->userdata('id_user'));
        $this->Main_model->delete_data($where, 'beli_langsung');
        $jumlah = $this->input->post('jumlah', true);
        $id_produk = $this->input->post('id_produk', true);
        $data = [
            'id_user' => $this->session->userdata('id_user'),
            'id_produk' => $id_produk,
            'jumlah' => $jumlah,
        ];
        $this->Main_model->insert_data($data, 'beli_langsung');
        redirect(base_url('belanja/bayar'));
    }

// Bayar
    public function bayar()
    {
        $where = array('id_produk' => $this->Main_model->getone());
        $row = $this->Main_model->where_data($where, 'produk')->row_array();
        $this->data['produk'] = $this->Main_model->where_data($where, 'produk')->row_array();
        if (isset($row['id_produk']) || isset($row['id_user'])) {
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
            $this->data['jumlah'] = array(
                'id'    => 'jumlah',
                'name'  => 'jumlah',
                'type'  => 'number',
                'value' => $this->form_validation->set_value('jumlah'),
            );
            $this->data['additional_head'] = '<link href="' . base_url() . 'assets/admin-page/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />
                                                <link href="' . base_url() . 'assets/landing-page/css/detail_produk.css" rel="stylesheet" />';
            $this->data['additional_body'] = '<script src="' . base_url() . 'assets/admin-page/plugins/bootstrap-select/js/bootstrap-select.js"></script>';
            $this->data['content'] = 'interface/produk/bayar/detail';
            $this->template->_render_page('layout/landingpagePanel', $this->data);
        } else {
            $this->session->set_flashdata('warning', 'Pastikan Anda Memilih Barang Terlebih Dahulu');
            redirect($_SERVER['HTTP_REFERER']);
        }
    }
    
    public function pembayaran()
    {
        $nama_produk = $this->input->post('nama_produk', true);
        $id_produk = $this->input->post('id_produk', true);
        $data = [
            'kode_produk'   	=> $kode_produk,
            'nama_produk'   	=> $nama_produk,
            'id_produk'     	=> $id_produk,
        ];
        if ($this->Main_model->insert_data($data, 'produk')) {
            $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
            redirect('produk', 'refresh');
        }
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
