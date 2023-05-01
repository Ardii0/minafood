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
		
		$this->data['title'] = 'Home';
		$this->data['content'] = 'interface/home/home';
		$this->template->_render_page('layout/landingpagePanel', $this->data);
	}
}
