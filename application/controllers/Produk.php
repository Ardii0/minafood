<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(['url', 'form', 'html', 'main_helper']);
		$this->load->library(['template', 'session', 'form_validation']);
		$this->load->model(['Auth_model', 'Main_model']);
        if ($this->session->userdata('is_Logged') == FALSE) {
            redirect('auth/login', 'refresh');
        } else if ($this->session->userdata('role') == 'User') {
			redirect('', 'refresh');
		}
	}

// Produk
	public function index()
	{
        $this->data['produk'] = $this->Main_model->get_data('produk')->result();

        $this->data['content'] = 'backend/modul-admin/produk/produk';
        $this->template->_render_page('layout/adminPanel', $this->data);
	}

    public function add_produk()
    {
        $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'trim|required');
        $this->form_validation->set_rules('id_kategori', 'Kategori', 'trim|required');
        $this->form_validation->set_rules('harga', 'Harga', 'trim|required');
        $this->form_validation->set_rules('stok', 'Stok', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
			$this->data['kategori'] = $this->Main_model->get_data('kategori')->result();
			$this->data['tipe'] = $this->Main_model->get_data('tipe')->result();
            $this->data['nama_produk'] = array(
                'id'    => 'nama_produk',
                'name'  => 'nama_produk',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('nama_produk'),
            );
            $this->data['id_kategori'] = array(
                'id'    => 'id_kategori',
                'name'  => 'id_kategori',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('id_kategori'),
            );
            $this->data['id_tipe'] = array(
                'id'    => 'id_tipe',
                'name'  => 'id_tipe',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('id_tipe'),
            );
            $this->data['harga'] = array(
                'id'    => 'harga',
                'name'  => 'harga',
                'type'  => 'number',
                'value' => $this->form_validation->set_value('harga'),
            );
            $this->data['stok'] = array(
                'id'    => 'stok',
                'name'  => 'stok',
                'type'  => 'number',
                'value' => $this->form_validation->set_value('stok'),
            );
            $this->data['foto'] = array(
                'id'    => 'foto',
                'name'  => 'foto',
                'type'  => 'file',
                'value' => $this->form_validation->set_value('foto'),
            );
            $this->data['deskripsi'] = array(
                'name'  => 'deskripsi',
                'value' => $this->form_validation->set_value('deskripsi'),
            );
            $this->data['additional_head'] = '<link href="' . base_url() . 'assets/admin-page/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />';
            $this->data['additional_body'] = '<script src="' . base_url() . 'assets/admin-page/plugins/bootstrap-select/js/bootstrap-select.js"></script><script src="' . base_url() . 'assets/admin-page/plugins/ckeditor/ckeditor.js"></script>
            <script src="' . base_url() . 'assets/admin-page/js/pages/forms/editors.js"></script>';
            $this->data['content'] = 'backend/modul-admin/produk/produk_add';
            $this->template->_render_page('layout/adminPanel', $this->data);
        } else {
            $kode_produk = 'PDK-'.$this->randomize(7);
            $nama_produk = $this->input->post('nama_produk', true);
            $id_kategori = $this->input->post('id_kategori', true);
            $id_tipe = $this->input->post('id_tipe', true);
            $harga = $this->input->post('harga', true);
            $stok = $this->input->post('stok', true);
            $deskripsi = $this->input->post('deskripsi', true);
            $data = [
                'kode_produk'   	=> $kode_produk,
                'nama_produk'   	=> $nama_produk,
                'id_kategori'     	=> $id_kategori,
                'id_tipe'         	=> $id_tipe,
                'harga'         	=> $harga,
                'stok'         		=> $stok,
                'deskripsi'         => $deskripsi,
            ];
            if (!empty($_FILES['foto']['name'])) {
                $config['upload_path']          = './uploads/foto-produk/';
                $config['allowed_types']        = 'jpg|png';
                $config['max_size']             = 20000;
                $config['max_width']            = 3600;
                $config['max_height']           = 3600;
                $config['file_name']            = $_FILES['foto']['name'];

                $this->load->library('upload', $config);
                $this->upload->initialize($config);

                if (!$this->upload->do_upload('foto')) {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                    redirect('produk/add_produk', 'refresh');
                } else {
                    $image_data = $this->upload->data();
                    $data['foto'] = $image_data['file_name'];
                    if ($this->Main_model->insert_data($data, 'produk')) {
                        $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
                        redirect('produk', 'refresh');
                    }
                }
            } else {
                if ($this->Main_model->insert_data($data, 'produk')) {
                    $this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
                    redirect('produk', 'refresh');
                }
            }
        }
    }

    public function produk_edit($id)
    {
        if (!$this->uri->segment(3)) {
            show_404();
        }
        $where = array('id_produk' => $id);
        $row = $this->Main_model->where_data($where, 'produk')->row_array();
        if (isset($row['id_produk'])) {
			$this->data['kategori'] = $this->Main_model->get_data('kategori')->result();
			$this->data['tipe'] = $this->Main_model->get_data('tipe')->result();

            $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'trim|required');
            $this->form_validation->set_rules('id_kategori', 'id_kategori', 'trim|required');
            $this->form_validation->set_rules('harga', 'Harga', 'trim|required');
            $this->form_validation->set_rules('stok', 'Stok', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->data['nama_produk'] = array(
                    'id'    => 'nama_produk',
                    'name'  => 'nama_produk',
                    'type'  => 'text',
                    'value' => $this->form_validation->set_value('nama_produk', $row['nama_produk']),
                );
                $this->data['id_kategori'] = array(
                    'id'    => 'id_kategori',
                    'name'  => 'id_kategori',
                    'type'  => 'text',
                    'value' => $this->form_validation->set_value('id_kategori', $row['id_kategori']),
                );
                $this->data['id_tipe'] = array(
                    'id'    => 'id_tipe',
                    'name'  => 'id_tipe',
                    'type'  => 'text',
                    'value' => $this->form_validation->set_value('id_tipe', $row['id_tipe']),
                );
                $this->data['harga'] = array(
                    'id'    => 'harga',
                    'name'  => 'harga',
                    'type'  => 'number',
                    'value' => $this->form_validation->set_value('harga', $row['harga']),
                );
                $this->data['stok'] = array(
                    'id'    => 'stok',
                    'name'  => 'stok',
                    'type'  => 'number',
                    'value' => $this->form_validation->set_value('stok', $row['stok']),
                );
                $this->data['foto'] = array(
                    'id'    => 'foto',
                    'name'  => 'foto',
                    'type'  => 'file',
                    'value' => $this->form_validation->set_value('foto', $row['foto']),
                );
                $this->data['deskripsi'] = array(
                    'name'  => 'deskripsi',
                    'value' => $this->form_validation->set_value('deskripsi', $row['deskripsi']),
                );
                $this->data['id_produk'] = array(
                    'id'    => 'id_produk',
                    'name'  => 'id_produk',
                    'type'  => 'file',
                    'value' => $this->form_validation->set_value('id_produk', $row['id_produk']),
                );
				$this->data['additional_head'] = '<link href="' . base_url() . 'assets/admin-page/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />';
				$this->data['additional_body'] = '<script src="' . base_url() . 'assets/admin-page/plugins/bootstrap-select/js/bootstrap-select.js"></script>
                <script src="' . base_url() . 'assets/admin-page/plugins/ckeditor/ckeditor.js"></script>
                <script src="' . base_url() . 'assets/admin-page/js/pages/forms/editors.js"></script>';
                $this->data['content'] = 'backend/modul-admin/produk/produk_edit';
                $this->template->_render_page('layout/adminPanel', $this->data);
            } else {
				$nama_produk = $this->input->post('nama_produk', true);
				$id_kategori = $this->input->post('id_kategori', true);
				$id_tipe = $this->input->post('id_tipe', true);
				$harga = $this->input->post('harga', true);
				$stok = $this->input->post('stok', true);
				$deskripsi = $this->input->post('deskripsi', true);
				$data = [
					'nama_produk'   	=> $nama_produk,
					'id_kategori'     	=> $id_kategori,
					'id_tipe'         	=> $id_tipe,
					'harga'         	=> $harga,
					'stok'         		=> $stok,
					'deskripsi'         => $deskripsi,
				];
                $where = array('id_produk' => $row['id_produk']);
                if (!empty($_FILES['foto']['name'])) {

                    $config['upload_path']          = './uploads/foto-produk/';
                    $config['allowed_types']        = 'jpg|png';
                    $config['max_size']             = 2000000;
                    $config['max_width']            = 3600;
                    $config['max_height']           = 3600;
                    $config['file_name']            = $_FILES['foto']['name'];

                    $this->load->library('upload', $config);
                    $this->upload->initialize($config);

                    if (!$this->upload->do_upload('foto')) {
                        $this->session->set_flashdata('error', $this->upload->display_errors());
                        redirect('produk/produk-edit/' . $row['id_produk'], 'refresh');
                    } else {
                        $image_data = $this->upload->data();
                        $data['foto'] = $image_data['file_name'];

                        if ($this->Main_model->update_data($where, $data, 'produk')) {
                            if (!empty($row['foto'])) {
                                unlink('./uploads/foto-produk/' . $row['foto']);
                            }
                            $this->session->set_flashdata('success', 'Data berhasil diubah!');
                            redirect('produk', 'refresh');
                        }
                    }
                } else {
                    if ($this->Main_model->update_data($where, $data, 'produk')) {
                        $this->session->set_flashdata('success', 'Data berhasil diubah!');
                        redirect('produk', 'refresh');
                    }
                }
            }
        }
    }

    public function produk_delete($id)
    {
        $where = array('id_produk' => $id);
        $_id = $this->Main_model->where_data($where, 'produk')->row();
        if ($this->Main_model->delete_data($where, 'produk')) {
            if ($_id->foto != '') {
                unlink('./uploads/foto-produk/' . $_id->foto);
            }
        }
		$this->session->set_flashdata('success', 'Data berhasil dihapus!');
        redirect('produk', 'refresh');
    }

// Kategori
	public function kategori()
	{
        $this->data['kategori'] = $this->Main_model->get_data('kategori')->result();

        $this->data['content'] = 'backend/modul-admin/kategori/kategori';
        $this->template->_render_page('layout/adminPanel', $this->data);
	}

    public function kategori_add()
    {
        $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->data['nama_kategori'] = array(
                'id'    => 'nama_kategori',
                'name'  => 'nama_kategori',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('nama_kategori'),
            );
            $this->data['additional_head'] = '<link href="' . base_url() . 'assets/admin-page/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />';
            $this->data['additional_body'] = '<script src="' . base_url() . 'assets/admin-page/plugins/bootstrap-select/js/bootstrap-select.js"></script>';
            $this->data['content'] = 'backend/modul-admin/kategori/kategori_add';
            $this->template->_render_page('layout/adminPanel', $this->data);
        } else {
            $nama_kategori = $this->input->post('nama_kategori', true);
            $data = [
                'nama_kategori'   	=> $nama_kategori,
            ];
			if ($this->Main_model->insert_data($data, 'kategori')) {
				$this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
				redirect('produk/kategori', 'refresh');
			}
        }
    }

    public function kategori_edit($id)
    {
        if (!$this->uri->segment(3)) {
            show_404();
        }
        $where = array('id_kategori' => $id);
        $row = $this->Main_model->where_data($where, 'kategori')->row_array();
        if (isset($row['id_kategori'])) {
            $this->form_validation->set_rules('nama_kategori', 'Nama Kategori', 'trim|required');

            if ($this->form_validation->run() == FALSE) {
                $this->data['nama_kategori'] = array(
                    'id'    => 'nama_kategori',
                    'name'  => 'nama_kategori',
                    'type'  => 'text',
                    'value' => $this->form_validation->set_value('nama_kategori', $row['nama_kategori']),
                );
                $this->data['id_kategori'] = array(
                    'id'    => 'id_kategori',
                    'name'  => 'id_kategori',
                    'type'  => 'file',
                    'value' => $this->form_validation->set_value('id_kategori', $row['id_kategori']),
                );
				$this->data['additional_head'] = '<link href="' . base_url() . 'assets/admin-page/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />';
				$this->data['additional_body'] = '<script src="' . base_url() . 'assets/admin-page/plugins/bootstrap-select/js/bootstrap-select.js"></script>';
                $this->data['content'] = 'backend/modul-admin/kategori/kategori_edit';
                $this->template->_render_page('layout/adminPanel', $this->data);
            } else {
				$nama_kategori = $this->input->post('nama_kategori', true);
				$data = [
					'nama_kategori'   	=> $nama_kategori,
				];
                $where = array('id_kategori' => $row['id_kategori']);
				if ($this->Main_model->update_data($where, $data, 'kategori')) {
					$this->session->set_flashdata('success', 'Data berhasil diubah!');
					redirect('produk/kategori', 'refresh');
				}
            }
        }
    }

    public function kategori_delete($id)
    {
        $where = array('id_kategori' => $id);
        $_id = $this->Main_model->where_data($where, 'kategori')->row();
        $this->Main_model->delete_data($where, 'kategori');
		$this->session->set_flashdata('success', 'Data berhasil dihapus!');
        redirect('produk/kategori', 'refresh');
    }

// Tipe
	public function tipe()
	{
        $this->data['tipe'] = $this->Main_model->get_data('tipe')->result();

        $this->data['content'] = 'backend/modul-admin/tipe/tipe';
        $this->template->_render_page('layout/adminPanel', $this->data);
	}

    public function tipe_add()
    {
        $this->form_validation->set_rules('nama_tipe', 'Nama Kategori', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->data['nama_tipe'] = array(
                'id'    => 'nama_tipe',
                'name'  => 'nama_tipe',
                'type'  => 'text',
                'value' => $this->form_validation->set_value('nama_tipe'),
            );
            $this->data['additional_head'] = '<link href="' . base_url() . 'assets/admin-page/plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />';
            $this->data['additional_body'] = '<script src="' . base_url() . 'assets/admin-page/plugins/bootstrap-select/js/bootstrap-select.js"></script>';
            $this->data['content'] = 'backend/modul-admin/tipe/tipe_add';
            $this->template->_render_page('layout/adminPanel', $this->data);
        } else {
            $nama_tipe = $this->input->post('nama_tipe', true);
            $data = [
                'nama_tipe'   	=> $nama_tipe,
            ];
			if ($this->Main_model->insert_data($data, 'tipe')) {
				$this->session->set_flashdata('success', 'Data berhasil ditambahkan!');
				redirect('produk/tipe', 'refresh');
			}
        }
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

// Laporan Pembayaran
 // Belum DiKonfirmasi
	public function pembayaran_notconf()
	{
        $this->data['notconf'] = $this->Main_model->where_data(array('status' => 'Belum Dikonfirmasi'), 'pembayaran')->result();

        $this->data['content'] = 'backend/modul-admin/laporan/belum_dikonfirmasi/index';
        $this->template->_render_page('layout/adminPanel', $this->data);
	}

	public function konfirmasi($id)
	{
        $where = array('id_pembayaran' => $id);
        $data  = [
            'status' => 'Telah Dikonfirmasi',
            'waktu_konfirmasi' => date('Y-m-d H:i:s')
        ];
        if ($this->Main_model->update_data($where, $data, 'pembayaran')) {
            $this->session->set_flashdata('success', 'Data berhasil dikonfirmasi!');
            redirect('produk/pembayaran_conf', 'refresh');
        }
	}

 // DiKonfirmasi
	public function pembayaran_conf()
	{
        $this->data['conf'] = $this->Main_model->where_data(array('status' => 'Telah Dikonfirmasi'), 'pembayaran')->result();

        $this->data['content'] = 'backend/modul-admin/laporan/dikonfirmasi/index';
        $this->template->_render_page('layout/adminPanel', $this->data);
	}

 // Detail Pembayaran
	public function pembayaran_detail($id)
	{
        $where = array('id_pembayaran' => $id);
        $this->data['detail'] = $this->Main_model->where_data($where, 'pembayaran')->row_array();

        $this->data['additional_head'] = '<link rel="stylesheet" href="'.base_url().'assets/landing-page/css/detail_produk.css" />';
        $this->data['content'] = 'backend/modul-admin/laporan/detail/index';
        $this->template->_render_page('layout/adminPanel', $this->data);
	}

// Other Stuff
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
