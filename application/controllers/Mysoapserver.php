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

        $input_array8 = array ('email' => "xsd:string",'tipo' => "xsd:string");
        $return_array8= array ("return" => "xsd:string");
        $this->nusoap_server->register('verificarmodulo', $input_array8, $return_array8, "urn:SOAPServerWSDL", "urn:".$ns."/verificarmodulo", "document", "literal", "Modulo verificacion");


        $input_array12 = array ('email' => "xsd:string");
        $return_array12= array ("return" => "xsd:string");
        $this->nusoap_server->register('estadousuario', $input_array12, $return_array12, "urn:SOAPServerWSDL", "urn:".$ns."/estadousuario", "document", "literal", "Verificar estado");


        $input_array13 = array ('usuario' => "xsd:string",'clave' => "xsd:string");
        $return_array13= array ("return" => "xsd:string");
        $this->nusoap_server->register('verificarsoporte', $input_array13, $return_array13, "urn:SOAPServerWSDL", "urn:".$ns."/verificarsoporte", "document", "literal", "Verificar estado");

        $input_array14 = array ('usuario' => "xsd:string");
        $return_array14= array ("return" => "xsd:string");
        $this->nusoap_server->register('obtenerDiasFechaPago', $input_array14, $return_array14, "urn:SOAPServerWSDL", "urn:".$ns."/obtenerDiasFechaPago", "document", "literal", "Obtener dias hasta la fecha de pago , si no existe devuelve -1");
    }

    function index(){

        function addnumbers($a,$b){
            $c = $a + $b;
            return $c;
        }

        function actualizarlicencia($email,$licencia){
            $ci = &get_instance();
            $ci->load->model('admin/soporte_model');
            return $ci->soporte_model->actualizar_licencia_mdl($email,$licencia);
        }

        function actualizartipolicencia($email,$tipo){
            $ci = &get_instance();
            $ci->load->model('admin/soporte_model');
            return $ci->soporte_model->actualizar_tipolicencia_mdl($email,$tipo);
        }

        /**
         * [obtenerDiasFechaPago description]
         * @author Carlos Sánchez <[<email address>]>
         * @param  [type] $email [description]
         * @return [type]        [description]
         */
        function obtenerDiasFechaPago($email)
        {
            $ci = &get_instance();
            $ci->load->model('admin/soporte_model');
            return $ci->soporte_model->obtener_dias_fecha_maxima_pago($email);            
        }

        function comprobar($u,$c){
            $ci = &get_instance();
            $ci->load->model('admin/soporte_model');
            return $ci->soporte_model->comprobar_mdl($u,$c);
        }

        function obtenerlicencia($email){
            $ci = &get_instance();
            $ci->load->model('admin/soporte_model');
            return $ci->soporte_model->obtener_licencia_mdl($email);
        }

        function devolverlicencia($email){
            $ci = &get_instance();
            $ci->load->model('admin/soporte_model');
            return $ci->soporte_model->devolverlicencia_mdl($email);
        }  

        function numaquinas($email){
            $ci = &get_instance();
            $ci->load->model('admin/soporte_model');
            return $ci->soporte_model->numaquinas_mdl($email);
        }

        function verificarmodulo($email,$tipo){
            $ci = &get_instance();
            $ci->load->model('admin/soporte_model');
            return $ci->soporte_model->verificarmodulo_mdl($email,$tipo);
            //i a f c b w s t
        }

        function estadousuario($email){
            $ci = &get_instance();
            $ci->load->model('admin/soporte_model');
            return $ci->soporte_model->estadousuario_mdl($email);
        }   
        function verificarsoporte($usuario,$clave){
            $ci = &get_instance();
            $ci->load->model('admin/soporte_model');
            return $ci->soporte_model->verificarsoporte_mdl($usuario,$clave);
        }

        $this->nusoap_server->service(file_get_contents("php://input"));
    }
}