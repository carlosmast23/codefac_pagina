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
        $this->nusoap_server->register('actualizar_licencia', $input_array2, $return_array2, "urn:SOAPServerWSDL", "urn:".$ns."/actualizar_licencia", "document", "literal", "Actualizar Licencia Codefac");

        $input_array3 = array ('u' => "xsd:string", 'c' => "xsd:string");
        $return_array3= array ("return" => "xsd:string");
        $this->nusoap_server->register('comprobar', $input_array3, $return_array3, "urn:SOAPServerWSDL", "urn:".$ns."/comprobar", "document", "literal", "Comprobar Usuario");

          $input_array4 = array ('id' => "xsd:string");
        $return_array4= array ("return" => "xsd:string");
        $this->nusoap_server->register('obtener_licencia', $input_array4, $return_array4, "urn:SOAPServerWSDL", "urn:".$ns."/obtener_licencia", "document", "literal", "Obtener Licencia");
    }

    function index(){
        
        function addnumbers($a,$b){
            $c = $a + $b;
            return $c;
        }

        function actualizar_licencia($email,$licencia){
            $ci = &get_instance();
            $ci->load->model('general_model');
            return $ci->general_model->actualizar_licencia_mdl($email,$licencia);
        }

        function comprobar($u,$c){
            $ci = &get_instance();
            $ci->load->model('general_model');
            return $ci->general_model->comprobar_mdl($u,$c);
        }

         function obtener_licencia($id){
            $ci = &get_instance();
            $ci->load->model('general_model');
            return $ci->general_model->comprobar_licencia_mdl($id);
        }



        $this->nusoap_server->service(file_get_contents("php://input"));
    }
}