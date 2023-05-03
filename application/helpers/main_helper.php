<?php
    if (!defined('BASEPATH')) {
        exit('No direct script access allowed');
    }

    function Akun($id, $title) {
        $ci =& get_instance();
        $ci->load->database();
        $result = $ci->db->where('id_user',$id)->get('users');
        foreach ($result->result() as $c) {
            $stmt= $c->$title;
        return $stmt;
        }
    }

    function Produk($id, $column) {
        $ci =& get_instance();
        $ci->load->database();
        $result = $ci->db->where('id_produk',$id)->get('produk');
        foreach ($result->result() as $c) {
            $stmt= $c->$column;
        return $stmt;
        }
    }

    function Kategori($id, $column) {
        $ci =& get_instance();
        $ci->load->database();
        $result = $ci->db->where('id_kategori',$id)->get('kategori');
        foreach ($result->result() as $c) {
            $stmt= $c->$column;
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
    
    function Alamat($id, $column) {
        $ci =& get_instance();
        $ci->load->database();
        $result = $ci->db->where('id_alamat',$id)->get('alamat');
        foreach ($result->result() as $c) {
            $stmt= $c->$column;
        return $stmt;
        }
    }

    function IDR($value) {
        return 'Rp. ' . number_format($value);
    }
