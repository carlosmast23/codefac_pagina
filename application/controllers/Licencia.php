<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Licencia extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('string');

        $this->rand = random_string('alnum', 6);    
        $this->load->model('captcha_model', 'model');

    }


    public function index(){
            //pasamos a la vista el título y el captcha que hemos creado
        $data = array('captcha' => $this->captcha());
        //creamos una sesión con el string del captcha que hemos creado
        //para utilizarlo en la función callback
        $this->session->set_userdata('captcha', $this->rand);
        $this->loadTemplates('principal/vpro',$data);
    }

//aqui captcha

    public function captcha(){
    //configuramos el captcha
      $conf_captcha = array(
        'word'   => $this->rand,
        'img_path' => './captcha/',
        'img_url' =>  base_url().'captcha/',
       // 'font_path' => './fonts/AlfaSlabOne-Regular.ttf',
        'img_width' => '250',
        'img_height' => '70',
      //decimos que pasados 10 minutos elimine todas las imágenes
      //que sobrepasen ese tiempo
        'expiration' => 600,
        'font_size'  => 20,  
        'word_length'   => 8,
        'colors'        => array(
            'background' => array(0, 0, 0),
            'border' => array(255, 255, 255),
            'text' => array(255, 255, 255),
            'grid' => array(134, 115, 161) 
            )
        );
    //guardamos la info del captcha en $cap
      $cap = create_captcha($conf_captcha);
    //pasamos la info del captcha al modelo para 
    //insertarlo en la base de datos
      $this->model->insert_captcha($cap);
    //devolvemos el captcha para utilizarlo en la vista
      return $cap;
  }


  public function validate_captcha(){
    echo $this->model->validate();
}

public function actualizar(){
     //$this->form_validation->set_rules('captcha', 'captcha', 'callback_validate_captcha');
   if($this->model->validate()== false){
    $this->index();
}else{
     $expiration = time()-600; // Límite de 10 minutos 
      $ip = $this->input->ip_address();//ip del usuario
      $captcha = $this->input->post('captcha');//captcha introducido por el usuario
      //eliminamos los captcha con más de 2 minutos de vida
      $this->model->remove_old_captcha($expiration);
      //comprobamos si es correcta la imagen introducida
      $check = $this->model->check($ip,$expiration,$captcha);
      if($check == 1){
       $this->load->model("archivos_model");
       $this->archivos_model->subirarchivo_mdl();

       $this->db->where("prv_id",$this->session->id_usuario);
       $this->db->update("proveedores",array("prv_tipolicencia"=>'p'));

       redirect("general/success");
   }

} 

}

  /*
  //comprobamos si la sessión que hemos creado es igual que el captcha introducido
  //con una función callback
public function validate_captcha(){
    if($this->input->post('captcha') != $this->session->userdata('captcha')){
      $this->form_validation->set_message('validate_captcha', 'Error');
      return false;
  }else{
      return true;
  }

}
*/


}
