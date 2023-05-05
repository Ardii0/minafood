<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(['url', 'form', 'html', 'slug', 'indonesian_date', 'text', 'main_helper']);
		$this->load->library(['template', 'session', 'form_validation']);
		$this->load->model('Main_model');
	}

	public function index()
	{
		$this->data['produk'] = $this->Main_model->get_data('produk')->result();
		$this->data['kontak'] = $this->Main_model->get_data('kontak')->row_array();
		// $this->data['productsbycategory'] = $this->NestedProducts();
		$this->data['title'] = 'Home';
		$this->data['content'] = 'interface/home/home';
		$this->template->_render_page('layout/landingpagePanel', $this->data);
	}

	function NestedProducts() {
		$sql = "Select C.nama_kategori, group_concat(P.nama_produk) as nama_produk 
        From kategori C left join produk P on C.id_kategori = P.id_kategori 
        group by C.nama_kategori
        Order by C.nama_kategori";

		// $sql = "Select C.nama_kategori, P.nama_produk 
		// 	From kategori C left join produk P on C.id_kategori = P.id_kategori 
		// 	Order by C.nama_kategori";
			$query = $this->db->query($sql);
			$products = array();
			if ($query->num_rows()) {
			  foreach ($query->result_array() as $row) {
				$products[$row['nama_kategori']][] = $row;
			  }
			}
			return $query->result_array();
	}
}
