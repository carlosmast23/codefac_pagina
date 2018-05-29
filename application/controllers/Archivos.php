<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Archivos extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('archivos_model', 'model');
    }


    public function index(){
        die("archivos");
    }


//updates codefac
    public function subirc(){
      $this->loadTemplates("archivos/subirc");
  }

  public function almacenarc() {
    $this->model->subirarchivo_version_mdl();
    redirect("archivos/subirc","refresh");
}

public function verc(){
    $this->loadTemplates("archivos/verc");
}

public function descargar() {
    switch ($this->uri->segment(3)) {
        case 1:$name="codefac.jar";$data="Codefac";
        break;  
        case 2:$name="updater.jar";$data="Update";
        break; 
        case 3:$name="ultimaVersion.codefac";$data="Config";
        break;
    }
    $this->model->descargar_mdl($name,$data);
}

public function subirarchivo() {
    echo $this->model->subirarchivo_mdl();
}


public function vensubir() {
        $arc_ref_id = $this->uri->segment(4); // $this->input->post('arc_ref_id');
        $data['arc_ref_id'] = $arc_ref_id;
        $this->loadTemplates('archivos/subir', $data);
    }

    public function ver() {
        //$arc_ref_id = $this->input->post('arc_ref_id');
        $arc_ref_id = $this->uri->segment(4);
        $datos['arc_ref_id'] = $arc_ref_id;
        $datos["archivos"] = $this->model->ver_archivos_mdl($arc_ref_id, '', true);
        $this->loadTemplates('archivos/lista_archivos', $datos);
    }

    
    public function descargar_archivo() {
        $this->model->descargar_mdl();
    }

    public function eliminar_archivo() {
        $id = $this->uri->segment(4);
        $this->model->eliminar_archivo_mdl($id);
    }



}
