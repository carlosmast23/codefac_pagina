<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Archivos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function subirarchivo_mdl() {
        $this->load->library('upload');   

        $ref_id=$this->input->post("ref_id");
        $carpeta = "./uploads/";
        $config['upload_path'] = $carpeta;
        $config['allowed_types'] = 'gif|jpg|png';
        $config['remove_spaces'] = false;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('mi_archivo')) {
            $datos = array('error' => $this->upload->display_errors());
            $this->load->view('archivos/erroralsubir', $datos);
        } else {
            $arr = $this->upload->data();
            $file_name = $arr["file_name"];
            $file_path = $arr["file_path"];
            $full_path = $arr["full_path"];
            $arreglo = array(
                "ref_id" => $ref_id,
                "arc_nombre" => $file_name,
                "arc_fecha" => hoy('c'),
                );
            $this->db->insert('archivos', $arreglo);
            $id = $this->db->insert_id();
            rename($full_path, $file_path . "$id");
            return $id;
        }
    }

    public function subirarchivo_version_mdl() {
        $this->load->library('upload');   

        if (!empty($_FILES['mi_archivo1']['name']))  {
            $carpeta = "./uploads/versiones/";
            $config['upload_path'] = $carpeta;
            $config['allowed_types'] = '*';
            $config['remove_spaces'] = FALSE;
            $config['overwrite'] = TRUE;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('mi_archivo1')) {
                log_message("error","Error:".$this->upload->display_errors() );
            } else {
                $arr = $this->upload->data();
                $file_name = $arr["file_name"];
            }  
        }   
        if (!empty($_FILES['mi_archivo2']['name']))  {
            $carpeta = "./uploads/versiones/";
            $config['upload_path'] = $carpeta;
            $config['allowed_types'] = '*';
            $config['remove_spaces'] = FALSE;
            $config['overwrite'] = TRUE;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('mi_archivo2')) {
                log_message("error","Error:".$this->upload->display_errors() );
            } else {
                $arr = $this->upload->data();
                $file_name = $arr["file_name"];
            }  
        }     
        if (!empty($_FILES['mi_archivo3']['name']))  {
            $carpeta = "./uploads/versiones/";
            $config['upload_path'] = $carpeta;
            $config['allowed_types'] = '*';
            $config['remove_spaces'] = FALSE;
            $config['overwrite'] = TRUE;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('mi_archivo3')) {
                log_message("error","Error:".$this->upload->display_errors() );
            } else {
                $arr = $this->upload->data();
                $file_name = $arr["file_name"];
            }  
        }



    }



}
