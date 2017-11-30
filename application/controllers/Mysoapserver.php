<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mysoapserver extends MY_Controller {

    function __construct() {
        parent::__construct();
        //$this->load->model(''); //load your models here
        $ns=base_url()."mysoapserver";
        $this->load->library("Nusoap_lib"); //load the library here
        $this->nusoap_server = new soap_server();
        $this->nusoap_server->configureWSDL("SOAP Server", $ns,false,"document");
        $this->nusoap_server->wsdl->schemaTargetNamespace = $ns;

        //registrando funciones
        $input_array = array ('a' => "xsd:string", 'b' => "xsd:string");
        $return_array = array ("return" => "xsd:string");
        $this->nusoap_server->register('addnumbers', $input_array, $return_array, "urn:SOAPServerWSDL", "urn:".$ns."/addnumbers", "document", "literal", "Addition Of Two Numbers");
    }

    function index()
    {
        function addnumbers($a,$b)
        {
            $c = $a + $b;
            return $c;
        }

        $this->nusoap_server->service(file_get_contents("php://input"));
    }
}