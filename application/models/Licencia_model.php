<?php

defined('BASEPATH') OR exit('No direct script access allowed');


class Licencia_model extends CI_Model {

  public function __construct() {
    parent::__construct();
  }


  public function generar_mdl(){
   $this->load->model("email_model");
   $this->load->model("GoogleURL_model","google");

   $codigo=$this->input->post("codigo");
   $arr= array(
    'prv_id'=>$this->session->id_usuario,
    'com_codigo' => $codigo,
    'com_fecha'=> hoy('c')
    );
   $this->db->insert("compras",$arr);

   $email=datoDeTablaCampo("proveedores","prv_id","prv_email",$this->session->id_usuario);

   $enlace=$this->google->encode(base_url()."licencia/generar_compra");                                                                                         
   $this->email_model->enviar_mail($email,"Orden Compra Codefac","Ha generado una orden de compra para Codefac-Lite Pro, su código de compra es '$codigo'. Por favor realice el pago y suba el comprobante en el siguiente enlace $enlace");
 }

 public function actualizar_mdl($id_usuario=0){
   $this->load->model("archivos_model");
   $this->load->model("email_model");

   $com_id=$this->input->post('com_id');

   $this->archivos_model->subirarchivo_mdl();

  /*
   $this->db->where("prv_id",$id_usuario);
   $this->db->update("proveedores",array("prv_tipolicencia"=>'p'));
*/

   $this->db->where("com_id",$com_id);
   $this->db->update("compras",array("com_estado"=>'f'));


   $email=datoDeTablaCampo("proveedores","prv_id","prv_email",$id_usuario);
   $this->email_model->enviar_mail($email,"Compra Codefac","Felicitaciones ya dispones de Codefac-Lite Pro. Gracias por confiar en nosotros.");

   $this->email_model->enviar_mail("carlosmast2301@hotmail.ec","Compra Codefac","Pendinete de autorizar");
 }


 public function vcodigo_compra_mdl(){
  $prv_id=$this->uri->segment(3);

  $codigo=$this->input->get("codigo",TRUE);



  $sql="SELECT * FROM `compras` WHERE `prv_id`='$prv_id' AND `com_codigo` LIKE '%$codigo%' ";
  $query=$this->db->query($sql);

  $num=$query->num_rows();

  if($num>0)
    return "true";
  else
    return "false";

}


public function tiene_compra_mdl($prv_id=0){
  $query=$this->db->query("SELECT * FROM `compras` WHERE `prv_id` = '$prv_id' LIMIT 0,1 ");
  if($query->num_rows()>0)
    return $query->row()->com_id;
  else
    return 0;

}


}
