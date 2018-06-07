<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Soporte extends MY_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model("soporte_model", "model");
  }

  public function index() {
    $data=$this->model->index_mdl();
    $this->loadTemplates("soporte/index",$data);
  }

  public function crear() {
    $this->loadTemplates("soporte/crear");
  }

  
  public function almacenar() {
    $this->model->almacenar_mdl();
    redirect("admin/soporte","refresh");
  }



}
