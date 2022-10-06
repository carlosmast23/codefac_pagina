<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class General extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model("general_model", "model");
  }

  public function index()
  {
    $data['transacciones'] = ""; //$this->model->transacciones_mdl();
    $visitas = $this->model->contador_mdl();
    $this->session->set_userdata(array('visitas' => $visitas));
    $this->loadTemplates("principal/index", $data);
  }

  public function cliente()
  {
    $this->loadTemplates("principal/registrar_cliente");
  }

  public function registro_taller_facturacion()
  {
    $this->loadTemplates("principal/registro_taller_facturacion");
  }

  public function registro_taller_facturacion_grabar()
  {
      $this->model->inscripcion_taller_facturacion_mdl();
      redirect("index.php/general/successTallerFacturacion", "refresh");
  }

  public function registro()
  {
    $this->load->model("admin/actividades_model");
    $data['cmb_actividades'] = $this->actividades_model->cmb_actividades();
    $this->loadTemplates("principal/registrar_proveedor", $data);
  }

  public function registrar_cliente()
  {
    $this->model->registrar_cliente_mdl();
  }

  
  public function registrar_proveedor()
  {
    $this->model->registrar_proveedor_mdl();
    redirect("index.php/general/success", "refresh");
  }

  public function modificar_proveedor()
  {
    $this->load->library('encrypt');

    $enc_username = $this->uri->segment(3);
    $dec_username = str_replace(array('-', '_', '~'), array('+', '/', '='), $enc_username);
    $dec_username = $this->encrypt->decode($dec_username);

    if (datoDeTablaCampo("proveedores", "prv_id", "prv_estado", $dec_username) == 'i') {
      $this->load->model("admin/actividades_model");
      $data = $this->model->datos_proveedor_mdl($dec_username);
      $data['cmb_actividades'] = $this->actividades_model->cmb_actividades($data['act_id']);
      $data['prv_telefono'] = format_celular($data['prv_telefono'], "i");
      $this->loadTemplates("principal/actualizar_proveedor", $data);
    } else
      redirect("general/erroract", "refresh");
  }

  public function actualizar_prov()
  {
    $this->model->actualizar_proveedor_mdl();
    redirect("index.php/general/success", "refresh");
  }

  public function success()
  {
    $this->loadTemplates("principal/success");
  }

  public function successTallerFacturacion()
  {
    $this->loadTemplates("principal/success_inscripcion_taller_facturacion");
  }


  public function preverificacion()
  {
    $this->load->model("GoogleURL_model", "google");
    $enc_username = $this->uri->segment(3);
    $dec_username = str_replace(array('-', '_', '~'), array('+', '/', '='), $enc_username);
    $prv_id = $this->encrypt->decode($dec_username);

    $data["prv_id"] = $prv_id;
    $this->loadTemplates("principal/preverificacion", $data);
  }


  public function verificacion()
  {
    $this->model->verificacion_mdl();
    $this->loadTemplates("principal/verificacion");
  }



  public function errorprov()
  {
    $this->loadTemplates("principal/errorprov");
  }
  public function erroract()
  {
    $this->loadTemplates("principal/erroract");
  }

  //enlaces externos
  public function conocenos()
  {
    $this->loadTemplates("principal/conocenos");
  }


  public function servicios()
  {
    $this->loadTemplates("principal/servicios");
  }

  public function politica()
  {
    $this->loadTemplates("principal/politica");
  }

  public function publicidad()
  {
    $tipo = $this->uri->segment(3);
    if ($tipo == "c")
      $data["columnas"] = "col-xs-8 col-xs-offset-2";
    else if ($tipo == "b")
      $data["columnas"] = "col-xs-12";
    $data["tipo"] = $tipo;
    $this->load->view("principal/publicidad", $data);
  }


  public function liteinfo()
  {
    $this->loadTemplates("principal/liteinfo");
  }

  public function versiones()
  {
    $data["numd"] = $this->model->numerod_mdl();
    $this->loadTemplates("principal/versiones", $data);
  }

  public function incrementardescarga()
  {
    $this->model->incrementardescarga_mdl();
  }

  public function publicidad2()
  {
    $this->load->model("archivos_model");
    $data['anuncios'] = $this->archivos_model->ver_anuncios();
    $this->load->view("principal/publicidad", $data);
  }

  public function loginVista()
  {
    $this->loadTemplates("principal/login");
  }

  public function loginVerificar()
  {
    $usuarioDefecto = "ROSITA";
    $claveDefecto = "2301";

    $usuarioDefecto2 = "GIOVIS";
    $claveDefecto2 = "0212";

    if (isset($_POST['clave'])) {
      //$this->load->model('UsuarioModel');
      if ( 
        ($_POST['usuario'] == $usuarioDefecto && $_POST['clave'] == $claveDefecto) || 
        ($_POST['usuario'] == $usuarioDefecto2 && $_POST['clave'] == $claveDefecto2)
        ) 
      {

        /**
         * Crear la variable de session que me permite tener acceso a la pantalla
         */
        $this->load->library('session');
        $this->session->set_userdata('admin_activo', 'si');
        redirect('index.php/general/adminVista');
      }
    }
    $this->loginVista();
  }

  public function adminVista()
  {
    /**
     * Verificar que tiene permisos para acceder a esta pantalla
     */
    $this->verificarSession();
    

    $filtro = "";
    if (isset($_POST['filtro'])) {
      $filtro = $_POST['filtro'];
    }

    $filtroLicenciaPago=NULL;
    if(isset($_POST['licenciaPago']))
    {
      if($_POST['licenciaPago']=='on')
      {
        $filtroLicenciaPago='p';      
      }
      
    }

    $filtroFechaPago=NULL;
    if(isset($_POST['fechaPago']))
    {
      if($_POST['fechaPago']=='on')
      {
        $filtroFechaPago=$_POST['fechaPago'];
      }            
    }

    $this->load->model('Admin_model');
    $result = $this->Admin_model->todos($filtro,$filtroLicenciaPago,$filtroFechaPago);
    
    $this->loadTemplates("admin/index.php", array('consulta' => $result,'filtro'=> $filtro,'licenciaPago'=>$filtroLicenciaPago,'$filtroFechaPago'=>$filtroFechaPago));
  }

  public function editarLicenciaVista($id = NULL)
  {

    /**
     * Verificar que tiene permisos para acceder a esta pantalla
     */
    $this->verificarSession();

    $this->load->model('Admin_model');
    $result = $this->Admin_model->consultarPorId($id);

    $this->loadTemplates("admin/editar_licencia", array('consulta' => $result));
  }

  public function editarLicencia()
  {
    /**
     * Verificar que tiene permisos para acceder a esta pantalla
     */
    $this->verificarSession();
    //$fechaOriginalPago,$valorAdicional,$numeroEquipos,$observaciones
    $this->load->model("Admin_model");
    $this->Admin_model->editar(
      $this->input->post("id"),
      $this->input->post("nombres"),
      $this->input->post("apellidos"),
      $this->input->post("razonSocial"),
      $this->input->post("email"),
      $this->input->post("valor"),
      $this->input->post("fechaPago"),
      $this->input->post("tipoLicencia"),
      $this->input->post("modulos"),
      $this->input->post("licencia"),
      $this->input->post("clave"),
      $this->input->post("fechaOriginalPago"),
      $this->input->post("valorAdicional"),
      $this->input->post("numeroEquipos"),
      $this->input->post("observaciones")
    );
    redirect('index.php/general/adminVista');
  }

  public function verificarSession()
  {
    $this->load->library('session');
    if(empty($this->session->userdata('admin_activo')))
    {
      //$this->loginVista();
      redirect('index.php/general/loginVista');
      return;
    }
  }

  public function terminarSession()
  {
    $this->session->sess_destroy();
    redirect('index.php/general/loginVista');

  }
}
