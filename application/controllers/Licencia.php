<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Licencia extends MY_Controller {

  public function __construct() {
    parent::__construct();

  /*  $this->load->library('user_agent');
    log_message("error","URL:".$this->agent->referrer());

*/
    if(!$this->session->has_userdata('is_logued_in'))
      redirect("conexion/login","refresh");
    

    $this->load->helper('string');
    $this->rand=random_string('alnum', 4);
    $this->load->model('captcha_model', 'model');


  }


  public function index(){
    $data['codigo']=random_string('alnum', 4);    

    $this->loadTemplates('principal/ordencompra',$data);
  }

  public function generar_compra(){
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

  public function vcodigo_compra(){
    $this->load->model("licencia_model");
    echo $this->licencia_model->vcodigo_compra_mdl();
  }

  public function comprar(){
    $this->loadTemplates("principal/ordencompra");

  }


  public function fin(){
    $this->loadTemplates("principal/fincompra");

  }

    public function ver_compra(){
    $this->loadTemplates("principal/ver_compra");

  }

  public function generar_orden(){
    $this->load->model("licencia_model");
    $this->licencia_model->generar_mdl();
    $this->loadTemplates("principal/notificacion_compra");
  }

  public function actualizar(){
    $this->load->model("licencia_model");
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
       $this->licencia_model->actualizar_mdl($this->session->id_usuario);
       redirect("licencia/fin");
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
