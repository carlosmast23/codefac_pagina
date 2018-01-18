<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Conexion extends MY_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('conexion_model', 'model');
  }




  public function login() {
    $data['token'] = $this->token();

    $this->form_validation->set_rules('username', 'Email', 'trim|required|valid_email|min_length[2]|max_length[150]');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|min_length[2]|max_length[150]');

    $this->form_validation->set_message('required', 'El campo %s es obligatorio');
    $this->form_validation->set_message('is_unique', 'El campo %s ya esta registrado');
    $this->form_validation->set_message('required', 'El campo %s es obligatorio');
    $this->form_validation->set_message('max_length', 'El campo %s debe tener un Maximo de %d Caracteres');
    $this->form_validation->set_message('min_length', 'El campo %s debe tener un Minimo de %d Caracteres');
    $this->form_validation->set_message('valid_email', 'El campo %s debe tener email válido');


    if ($this->form_validation->run() == false) {
            // validation not ok, send validation errors to the view
      $this->loadTemplates('conexion/login',$data);
    } else {
            // set variables from the form
      $username = $this->input->post('username');
      $password = $this->input->post('password');
      if ($this->model->resolve_user_login($username, $password)) {
        $user_id = $this->model->get_user_id_from_username($username);
        $user = $this->model->get_user($user_id);

        switch ($user->prv_tipolicencia) {
          case 'f':$tipo="Free"; break;
          case 'p':$tipo="Premium"; break;
        }
        $data = array(
          'is_logued_in' => TRUE,
          'id_usuario' => $user->prv_id,
          'tipo' => $tipo,
          'username' => $user->prv_email
          );
        $this->session->set_userdata($data);
        $this->loadTemplates('principal/vpro',$data);

      } else {
        redirect(base_url() . 'conexion/login');
      }
    }
  }

  public function logout() {
    $this->session->sess_destroy();
    $this->index();
  }

  public function token() {
    $token = md5(uniqid(rand(), true));
    $this->session->set_userdata('token', $token);
    return $token;
  }



}
