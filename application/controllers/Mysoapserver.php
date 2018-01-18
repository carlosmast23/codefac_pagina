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


        $this->nusoap_server->service(file_get_contents("php://input"));
    }
}