<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class General_model extends CI_Model {


  public function __construct() {
    parent::__construct();
  }

  /**
   * @Author: Carlos Sánchez
   */
  public function inscripcion_taller_facturacion_mdl()
  {
    //Datos iniciales que va a llegar al correo de nuestra empresa
    $email="info@codesoft-ec.com";

    //Cargar los modulos necesarios
    $this->load->model("email_model");

    //Obtener las variables de la vista
    $nombresParticipante=$this->input->post("taller_nombres");
    $numeroCelular=$this->input->post("taller_celular");
    $correoElectronico=$this->input->post("taller_correo");

    //Armar mensajes para enviar al correo

    //Armar el titulo del correo
    $tituloCorreo="Inscripción Taller Facturación ".$nombresParticipante;

    //Armar el mensaje del correo    
    $mensajeCorreo="Nombres: ".$nombresParticipante.PHP_EOL;
    $mensajeCorreo=$mensajeCorreo."Celular: ".$numeroCelular.PHP_EOL;
    $mensajeCorreo=$mensajeCorreo."Correo: ".$correoElectronico.PHP_EOL;


    $this->email_model->enviar_mail(
      $email,
      $tituloCorreo,
      $mensajeCorreo);
    
  }

  public function registrar_proveedor_mdl(){
    $this->load->library('bcrypt');
    $this->load->model("email_model");
    $this->load->model("GoogleURL_model","google");

    $ncel=format_celular($this->input->post("prv_celular"));
    $email=$this->input->post("prv_email");
    $password=$this->input->post("prv_clave");

    $hash = $this->bcrypt->hash_password($password);

    if ($this->bcrypt->check_password($password, $hash)) {
     $data=array(
      "prv_nombres"=>$this->input->post("prv_nombres"),
      "prv_apellidos"=>$this->input->post("prv_apellidos"),
      "prv_celular"=>$ncel,
      "prv_email"=>$email,
      "prv_clave"=>$hash,
      "prv_convencional"=>$this->input->post("prv_convencional"),
      "prv_direccion"=>$this->input->post("prv_direccion"),
      "prv_ruc"=>$this->input->post("prv_ruc"),
      "prv_razonsocial"=>$this->input->post("prv_razonsocial"),
      "prv_representante"=>$this->input->post("prv_representante"),
      "act_id"=>$this->input->post("act_id"),
      "prv_fecharegistro"=>hoy('c'),
      "prv_estado"=>'p',
      "prv_modulos"=>'f'//Por defecto seteamos la letra f que corresponde al modulo por defecto def acturar
      );
     $this->db->insert("proveedores",$data);
     
     $id=$this->db->insert_id();


     $enlace= $this->google->codificar_parametro("general/preverificacion/",$id);

     $this->email_model->enviar_mail($email,"Verificación Codefac","Valida tu cuenta en el siguiente enlace $enlace. Gracias por registrarte con nosotros. ");

   }

 }


 public function verificacion_mdl(){
  $prv_id=$this->uri->segment(3);

  if($this->estado_prov($prv_id)=='p'){
    $arr= array('prv_estado' => "a",'prv_modulos'=>"f");
    $this->db->where("prv_id",$prv_id);
    $this->db->update("proveedores",$arr);
  }else
  die("Este enlace ya ha sido usado.");
}



public function estado_prov($id){
  $this->db->where("prv_id", $id);
  $query = $this->db->get("proveedores");
  if ($query->num_rows() > 0)
    return $query->row()->prv_estado;
  else
   return false;
}


public function actualizar_proveedor_mdl(){
  $prv_id=$this->input->post("prv_id");

  $ncel=format_celular($this->input->post("prv_telefono"));
  $email=$this->input->post("prv_email");

  $arr=array(
    "act_id"=>$this->input->post("act_id"),
    'prv_usuario' => $this->input->post('prv_usuario'), 
    'prv_telefono' => $ncel, 
    "prv_email"=>$email,
    "prv_convencional" => $this->input->post('prv_convencional'), 
    "prv_ruc" => $this->input->post('prv_ruc'), 
    "prv_razonsocial" => strtoupper($this->input->post('prv_razonsocial')), 
    "prv_representante" => strtoupper($this->input->post('prv_representante')), 
    "prv_direccion" => $this->input->post('prv_direccion'), 
    "prv_latitud" => $this->input->post('loc_latitud'), 
    "prv_longitud" => $this->input->post('loc_longitud'), 
    "prv_estado" => "a", 
    );
  $this->db->where("prv_id",$prv_id);
  $this->db->update("proveedores",$arr);


}

public function existe_proveedor($telefono,$email){
  $sql="SELECT count(`prv_id`) as total FROM `proveedores` WHERE `prv_telefono` LIKE '$telefono' OR `prv_email` LIKE '$email' ";
  $query=$this->db->query($sql);
  return $query->row()->total+0;
}

public function nproveedores_mdl(){
 $sql="SELECT COUNT(`prv_id`) as total FROM `proveedores`";
 $query=$this->db->query($sql);
 return $query->row()->total;   
}

public function contador_mdl(){
  $this->load->helper('cookie');
  $hoy=hoy();
  $ip=getRealIP();

  if (!isset($_COOKIE['contador'])) {
    $query=$this->db->query("SELECT * FROM `visitas` WHERE `fecha`='$hoy' AND `ip`='$ip' ");
    if($query->num_rows()==0){
      $arr=array(
        "ip"=>$ip,
        "fecha"=>$hoy,
        "num"=>1,
        );
      $this->db->insert("visitas",$arr);
    }
  }

  set_cookie('contador', 1, time()+3700);

  $query=$this->db->query("SELECT count(`id`) as total FROM `visitas` ");
  return $query->row()->total;
}


public function datos_proveedor_mdl($id=0) {
  $this->db->where("prv_id", $id);
  $query = $this->db->get("proveedores");
  if ($query->num_rows() > 0) {
    return $query->row_array();
  }
  else
    die("No existe informacion");
}


//VALIDACIONES
public function buscar_dato($prv_id,$campo,$deque) {

  if($campo=="prv_celular"){
    $valor=format_celular($this->input->get($campo, TRUE));
  }else
  $valor = $this->input->get('$campo', TRUE);

  if($deque=="c"){
   if ($valor != '') {
    $sql = "SELECT * FROM `proveedores` WHERE `$campo` like '%$valor%'";
    $query = $this->db->query($sql);
    $cantidad = $query->num_rows();
    if ($cantidad != 0) {
      return "false";
    } else
    return "true";
  } else
  return "true";
}else if($deque=='m'){
  if ($valor != '') {
    $sql = "SELECT * FROM `proveedores` WHERE `$campo` like '%$valor%' AND `prv_id` = '$prv_id'";
    $query = $this->db->query($sql);
    $cantidad = $query->num_rows();
    if ($cantidad != 0) {
      $var = "true";
    } else {
      $sql2 = "SELECT * FROM `proveedores` WHERE `$campo` like '%$valor%' ";
      log_message("error",$sql2);

      $query2 = $this->db->query($sql2);
      $cantidad2 = $query2->num_rows();
      if ($cantidad2 != 0)
        $var = "false";
      else
        $var = "true";
    }
  } else
  $var = "true";
  return $var;
}

}

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


public function login($username,$hash){
       //obtenemos los datos del usuario que quiere iniciar sesión
 $this->db->where('username',$username);
 $query = $this->db->get('users');
       //si el nombre de usuario coincide y sólo existe uno procedemos
 if($query->num_rows() == 1){
   $user = $query->row();
           //en pass guardamos el hash del usuario que tenemos en la base
           //de datos para comprobarlo con el método check_password de Bcrypt
   $pass = $user->password;

          //esta es la forma de comprobar si el password del 
          //formulario coincide con el codificado de la base de datos
   if($this->bcrypt->check_password($hash, $pass))
   {
     return $query->row();
   }else{
     $this->session->set_flashdata('usuario_incorrecto','Los datos introducidos son incorrectos');
     redirect(base_url().'secure_bcrypt/login','refresh');
   }
 }
}


public function incrementardescarga_mdl(){
  $arr= array('contador' =>  "+1");
  $this->db->where("id","1");
  $this->db->update("descargas",$arr);

  $this->db->query("UPDATE `descargas` SET contador=contador+1 WHERE `id`='1' ");
}

public function numerod_mdl(){
 $this->db->where("id", "1");
 $query = $this->db->get("descargas");
 if ($query->num_rows() > 0) 
  return $query->row()->contador;
else
  die("No existe informacion");
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



}
