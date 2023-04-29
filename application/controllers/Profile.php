<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Profile extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper(['url', 'form', 'html']);
		$this->load->library(['template', 'session', 'form_validation']);
		$this->load->model(['Auth_model', 'Main_model']);
	}

	public function index()
	{
		if ($this->session->userdata('is_Logged') == FALSE) {
			redirect('auth/login', 'refresh');
		} else {
			redirect('dashboard', 'refresh');
		}
	}
	
// Logout
	public function logout()
	{
		$this->session->sess_destroy();
		redirect('auth/login', 'refresh');
	}
}
