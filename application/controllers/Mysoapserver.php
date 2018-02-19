<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mysoapserver extends MY_Controller {

    function __construct() {
        parent::__construct();
        //$this->load->model(''); //load your models here
        $ns=base_url()."mysoapserver";
        $this->load->library("Nusoap_lib"); //load the library here
        $this->nusoap_server = new soap_server();
        $this->nusoap_server->configureWSDL("SOAPServer", $ns,false,"document");
        $this->nusoap_server->wsdl->schemaTargetNamespace = $ns;

        //registrando funciones
        $input_array = array ('a' => "xsd:string", 'b' => "xsd:string");
        $return_array = array ("return" => "xsd:string");
        $this->nusoap_server->register('addnumbers', $input_array, $return_array, "urn:SOAPServerWSDL", "urn:".$ns."/addnumbers", "document", "literal", "Addition Of Two Numbers");


        $input_array2 = array ('email' => "xsd:string", 'licencia' => "xsd:string");
        $return_array2= array ("return" => "xsd:string");
        $this->nusoap_server->register('actualizarlicencia', $input_array2, $return_array2, "urn:SOAPServerWSDL", "urn:".$ns."/actualizarlicencia", "document", "literal", "Actualizar Licencia Codefac");

        $input_array3 = array ('u' => "xsd:string", 'c' => "xsd:string");
        $return_array3= array ("return" => "xsd:string");
        $this->nusoap_server->register('comprobar', $input_array3, $return_array3, "urn:SOAPServerWSDL", "urn:".$ns."/comprobar", "document", "literal", "Comprobar Usuario");

        $input_array4 = array ('email' => "xsd:string");
        $return_array4= array ("return" => "xsd:string");
        $this->nusoap_server->register('obtenerlicencia', $input_array4, $return_array4, "urn:SOAPServerWSDL", "urn:".$ns."/obtenerlicencia", "document", "literal", "Obtener Licencia");

        $input_array5 = array ('email' => "xsd:string");
        $return_array5= array ("return" => "xsd:string");
        $this->nusoap_server->register('devolverlicencia', $input_array5, $return_array5, "urn:SOAPServerWSDL", "urn:".$ns."/devolverlicencia", "document", "literal", "Devolver Licencia");


        $input_array6 = array ('email' => "xsd:string", 'tipo' => "xsd:string");
        $return_array6= array ("return" => "xsd:string");
        $this->nusoap_server->register('actualizartipolicencia', $input_array6, $return_array6, "urn:SOAPServerWSDL", "urn:".$ns."/actualizartipolicencia", "document", "literal", "Actualizar Tipo Licencia");

        $input_array7 = array ('email' => "xsd:string");
        $return_array7= array ("return" => "xsd:string");
        $this->nusoap_server->register('numaquinas', $input_array7, $return_array7, "urn:SOAPServerWSDL", "urn:".$ns."/numaquinas", "document", "literal", "Devolver cantidad de maquinas");

        $input_array8 = array ('email' => "xsd:string");
        $return_array8= array ("return" => "xsd:string");
        $this->nusoap_server->register('verificarmoduloi', $input_array8, $return_array8, "urn:SOAPServerWSDL", "urn:".$ns."/verificarmoduloi", "document", "literal", "Modulo inventario verificar");

        $input_array9 = array ('email' => "xsd:string");
        $return_array9= array ("return" => "xsd:string");
        $this->nusoap_server->register('verificarmoduloa', $input_array9, $return_array9, "urn:SOAPServerWSDL", "urn:".$ns."/verificarmoduloa", "document", "literal", "Modulo academico verificar");

        $input_array10 = array ('email' => "xsd:string");
        $return_array10= array ("return" => "xsd:string");
        $this->nusoap_server->register('verificarmodulof', $input_array10, $return_array10, "urn:SOAPServerWSDL", "urn:".$ns."/verificarmodulof", "document", "literal", "Modulo facturacion verificar");

        $input_array11 = array ('email' => "xsd:string");
        $return_array11= array ("return" => "xsd:string");
        $this->nusoap_server->register('verificarmoduloc', $input_array11, $return_array11, "urn:SOAPServerWSDL", "urn:".$ns."/verificarmoduloc", "document", "literal", "Modulo CRM verificar");
    }

    function index(){

        function addnumbers($a,$b){
            $c = $a + $b;
            return $c;
        }

        function actualizarlicencia($email,$licencia){
            $ci = &get_instance();
            $ci->load->model('general_model');
            return $ci->general_model->actualizar_licencia_mdl($email,$licencia);
        }

        function actualizartipolicencia($email,$tipo){
            $ci = &get_instance();
            $ci->load->model('general_model');
            return $ci->general_model->actualizar_tipolicencia_mdl($email,$tipo);
        }

        function comprobar($u,$c){
            $ci = &get_instance();
            $ci->load->model('general_model');
            return $ci->general_model->comprobar_mdl($u,$c);
        }

        function obtenerlicencia($email){
            $ci = &get_instance();
            $ci->load->model('general_model');
            return $ci->general_model->obtener_licencia_mdl($email);
        }

        function devolverlicencia($email){
            $ci = &get_instance();
            $ci->load->model('general_model');
            return $ci->general_model->devolverlicencia_mdl($email);
        }  

        function numaquinas($email){
            $ci = &get_instance();
            $ci->load->model('general_model');
            return $ci->general_model->numaquinas_mdl($email);
        }

        function verificarmoduloi($email){
            $ci = &get_instance();
            $ci->load->model('general_model');
            return $ci->general_model->verificarmodulo_mdl($email,"i");
        }
        function verificarmoduloa($email){
            $ci = &get_instance();
            $ci->load->model('general_model');
            return $ci->general_model->verificarmodulo_mdl($email,"a");
        }   
        function verificarmodulof($email){
            $ci = &get_instance();
            $ci->load->model('general_model');
            return $ci->general_model->verificarmodulo_mdl($email,"f");
        }     
        function verificarmoduloc($email){
            $ci = &get_instance();
            $ci->load->model('general_model');
            return $ci->general_model->verificarmodulo_mdl($email,"c");
        }

        $this->nusoap_server->service(file_get_contents("php://input"));
    }
}