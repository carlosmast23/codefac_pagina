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

  
  public function modificar() {
    $arr=$this->model->datos_mdl();
    $this->loadTemplates("soporte/modificar",$arr);
  }

  public function actualizar() {
    $this->model->actualizar_mdl();
    redirect("admin/soporte","refresh");
  }

  public function eliminar() {
    $this->model->eliminar_mdl();
    redirect("admin/soporte","refresh");
  }

}
