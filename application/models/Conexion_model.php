<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Conexion_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }


    public function resolve_user_login($username, $password) {
        $this->load->library('bcrypt');
        $this->db->select('prv_clave ');
        $this->db->from('proveedores');
        $this->db->where('prv_email', $username);
        $hash = $this->db->get()->row('prv_clave');
        return $this->bcrypt->check_password($password, $hash);
    }

    public function get_user_id_from_username($username) {
        $this->db->select('prv_id');
        $this->db->from('proveedores');
        $this->db->where('prv_email', $username);
        return $this->db->get()->row('prv_id');
    }

    public function get_user($user_id) {
        $this->db->from('proveedores');
        $this->db->where('prv_id', $user_id);
        return $this->db->get()->row();
    }



}
