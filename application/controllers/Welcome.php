<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(['url', 'form', 'html', 'slug', 'indonesian_date', 'text']);
		$this->load->library(['template', 'session', 'form_validation']);
		$this->load->model('Main_model');
	}

	public function index()
	{
		$this->data['kontak'] = $this->Main_model->get_data('kontak')->row_array();
		
		$this->data['title'] = 'Home';
		$this->template->_render_page('layout/landingpagePanel', $this->data);
	}
}
