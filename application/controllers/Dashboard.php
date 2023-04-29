<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper(['url', 'form', 'html', 'slug', 'indonesian_date', 'text']);
        $this->load->library(['template', 'session', 'form_validation']);
        $this->load->model('Main_model');

        $this->check_isActive();
    }

    public function index()
    {
        $this->data['title'] = 'Dashboard';

        $this->data['content'] = 'backend/modul-dashboard/dashboard';
        $this->template->_render_page('layout/adminPanel', $this->data);
    }

    public function check_isActive()
    {
        $data = [
            'email' => $this->session->userdata('email'),
        ];
        $query = $this->Main_model->where_data($data, 'users');
        $result = $query->row_array();

        if (!$result['role'] == 'Admin') {
            $this->session->set_flashdata('warning', 'Tidak bisa masuk karena Anda bukan Administrator');
            redirect('auth/login');
        }
    }
}
