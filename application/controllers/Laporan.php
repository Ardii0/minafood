<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
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

	public function index()
	{
        $this->data['lap'] = $this->Main_model->get_data('lap')->result();

        $this->data['content'] = 'backend/modul-admin/lap/lap';
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
