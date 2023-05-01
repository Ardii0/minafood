<?php
    if (!defined('BASEPATH')) {
        exit('No direct script access allowed');
    }

    function namaKategori($id) {
        $ci =& get_instance();
        $ci->load->database();
        $result = $ci->db->where('id_kategori',$id)->get('kategori');
        foreach ($result->result() as $c) {
            $stmt= $c->nama_kategori;
        return $stmt;
        }
    }

    function namaTipe($id) {
        $ci =& get_instance();
        $ci->load->database();
        $result = $ci->db->where('id_tipe',$id)->get('tipe');
        foreach ($result->result() as $c) {
            $stmt= $c->nama_tipe;
        return $stmt;
        }
    }
    
    function IDR($value) {
        return 'Rp. ' . number_format($value).',-';
    } 
