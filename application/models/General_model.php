<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class General_model extends CI_Model {


    public function __construct() {
        parent::__construct();
        $this->load->library('encrypt');
    }


    public function registrar_proveedor_mdl(){

     $ncel=format_celular($this->input->post("prv_celular"));
     $email=$this->input->post("prv_email");

     $data=array(
        "prv_nombres"=>$this->input->post("prv_nombres"),
        "prv_apellidos"=>$this->input->post("prv_apellidos"),
        "prv_convencional"=>$this->input->post("prv_convencional"),
        "prv_direccion"=>$this->input->post("prv_direccion"),
        "prv_celular"=>$ncel,
        "prv_email"=>$email,
        "act_id"=>$this->input->post("act_id"),
        "prv_fecharegistro"=>hoy('c'),
        );
     $this->db->insert("proveedores",$data);

     /*$d1=array(
        "bus_id"=>0,
        'ser_id' => 1, 
        "usu_id"=>0,
        "tel_destinatario"=>$ncel,
        "mensaje"=>"Gracias por registrarte en Virtual Mall, visita nuestra pagina y mantente informado de nuestra ofertas. ".base_url(),
        "fecha"=>hoy('c'),
        "deque"=>"pr",
        );
        $this->db->insert("envio_sms",$d1);*/

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
    return $query->row()->total*1000;
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
    $query=$this->db->query("SELECT COUNT(`prv_id`) as num FROM `prv_email` LIKE '$u' AND `prv_clave` LIKE '$c' ");
    if($query->row()->num >0 )
        $res=1;
    else
        $res=0:
    return $res;
}


public function actualizar_clave_mdl($id=0,$p=""){
    $arr=array('prv_clave' => $p);
    $this->db->where("prv_id",$id);
    $this->db->update("proveedores",$arr);

    return 1;

}







}
