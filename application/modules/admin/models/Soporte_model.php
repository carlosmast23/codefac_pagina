<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Soporte_model extends CI_Model {


  public function __construct() {
    parent::__construct();
  }

  public function index_mdl(){
    $html="";

    $sql = "SELECT * FROM `soporte` WHERE 1";


    $query = $this->db->query($sql);

    if ($query->num_rows() > 0) {
      $html = "";
      foreach ($query->result() as $fila) {
        $html.= $this->parser->parse('admin/soporte/index_tpl', $fila, true);
      }
    } else {
      $html.="<tr><td colspan='4'>No hay data</td></tr>";
    }
    $arreglo["html"] = $html;
    return $arreglo;
  }

  public function almacenar_mdl(){
    $this->load->library('bcrypt');
    $password=$this->input->post("sop_clave");

    $hash = $this->bcrypt->hash_password($password);

    if ($this->bcrypt->check_password($password, $hash)) {
      $data=array(
        "sop_usuario"=>$this->input->post("sop_usuario"),
        "sop_clave"=>$hash,
        "sop_fechavisita"=>hoy('c'),
        );
      $this->db->insert("soporte",$data);
    }
  }

  public function datos_mdl() {
    $id=$this->uri->segment(4);
    $this->db->where("id", $id);
    $query = $this->db->get("soporte");
    if ($query->num_rows() > 0) {
      return $query->row_array();
    }
    else
      die("No existe informacion");
  }

  public function actualizar_mdl(){
    $sop_id=$this->input->post('sop_id');

    $this->load->library('bcrypt');
    $password=$this->input->post("sop_clave");

    $hash = $this->bcrypt->hash_password($password);

    if ($this->bcrypt->check_password($password, $hash)) {
      $data=array(
        "sop_usuario"=>$this->input->post("sop_usuario"),
        "sop_clave"=>$hash,
        );
      $this->db->where("id",$sop_id);
      $this->db->update("soporte",$data);
    }
  }

  public function eliminar_mdl(){
    $sop_id=$this->uri->segment(4);
    $data=array('sop_estado' => 'i');
    $this->db->where("id",$sop_id);
    $this->db->update("soporte",$data);  
  }

//funciones webservice

  public function comprobar_mdl($u,$c){
   $this->load->library('bcrypt');

   $this->db->where('prv_email',$u);
   $query = $this->db->get('proveedores');
   if($query->num_rows() == 1){
     $user = $query->row();
     $pass = $user->prv_clave;
     if($this->bcrypt->check_password($c, $pass)){
       return "success";
     }else{
      return "fail";
    }
  }
  else
    return "fail";
}

/**
 * [obtener_dias_fecha_maxima_pago Me permite obtener en dias la diferencia en dias de la fecha limite de pago para informar al cliente]
 * @author Carlos Sánchez 
 * @param  String $usuario Correo del cliente
 * @return int         Numero de dias entre la fecha actual y la fecha de pago , si no existe fecha retorna -1
 */
public function obtener_dias_fecha_maxima_pago($usuario)
{
  $this->db->where('prv_email',$id);
  $query = $this->db->get('proveedores');

  if($query->num_rows() == 1)
  {
    $prv_resultado= $query->row()->prv_fecha_maxima_pago;
     if($prv_resultado!="")
     {
        return $prv_resultado;
     }
  }
  retunr -1;

}


public function obtener_licencia_mdl($id){
 $this->db->where('prv_email',$id);
 $query = $this->db->get('proveedores');
 if($query->num_rows() == 1){
   $prv_licencia= $query->row()->prv_licencia;
   if($prv_licencia!="")
    return $prv_licencia;
  else
    return "fail";
}
else
  return "fail";

}

public function actualizar_licencia_mdl($id=0,$p=""){
  $arr=array('prv_licencia' => $p);
  $this->db->where("prv_email",$id);
  $this->db->update("proveedores",$arr);

  return "success";

}


public function actualizar_tipolicencia_mdl($email="",$tipo=""){
  $arr=array('prv_tipolicencia' => $tipo);
  $this->db->where("prv_email",$email);
  $this->db->update("proveedores",$arr);

  return "success";

}

public function devolverlicencia_mdl($email){
 $this->db->where('prv_email',$email);
 $query = $this->db->get('proveedores');
 if($query->num_rows() == 1)
  return $query->row()->prv_tipolicencia;
else
  return "fail";

}

public function numaquinas_mdl($email){
 $this->db->where('prv_email',$email);
 $query = $this->db->get('proveedores');
 if($query->num_rows() == 1)
  return $query->row()->prv_maquinas;
else
  return "fail";

}


public function verificarmodulo_mdl($email,$tipo){
  $sql="SELECT * FROM `proveedores` WHERE `prv_email`='$email' AND  `prv_modulos` LIKE '%$tipo%' ";

  $query = $this->db->query($sql);
  if($query->num_rows() == 1)
    return "success";
  else
    return "fail";

}


public function estadousuario_mdl($id){
 $this->db->where('prv_email',$id);
 $query = $this->db->get('proveedores');
 if($query->num_rows() == 1){
   $prv_estado= $query->row()->prv_estado;
   if($prv_estado!="")
    return $prv_estado;
  else
    return "null";
}
else
  return "null";

}



public function verificarsoporte_mdl($usuario,$clave){
  $this->load->library('bcrypt');

  $this->db->where('sop_usuario',$usuario);
  $query = $this->db->get('soporte');
  if($query->num_rows() == 1){
   $user = $query->row();
   $pass = $user->sop_clave;
   if($this->bcrypt->check_password($clave, $pass)){
     return "success";
   }else{
    return "fail";
  }
}
else
  return "fail";

}



}
