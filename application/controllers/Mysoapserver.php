<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mysoapserver extends MY_Controller {

    function __construct() {
        parent::__construct();
        //$this->load->model(''); //load your models here

        $this->load->library("Nusoap_lib"); //load the library here
        $this->nusoap_server = new soap_server();
        $this->nusoap_server->configureWSDL("Mysoapserver", "urn:Mysoapserver");
        $this->nusoap_server->register(
            "login", array("usuario" => "xsd:string","clave" => "xsd:string"), array("return" => "xsd:string"), "urn:Mysoapserver", "urn:Mysoapserver#login", "rpc", "encoded", "Login WS"
            );


    }

    function index() {


        function login($usuario,$clave) {
          $ci =& get_instance();
            /*if (!$tmp) {
                return new soap_fault('-1', 'Server', 'Parameters missing for echoTest().', 'Please refer documentation.');
            } else {
                return "from MySoapServer() : $tmp";
            }*/

            if($usuario=="admin" && $clave=="admin123")
                return "success";
            else
                return "fail";
        }
        
        $this->nusoap_server->service(file_get_contents("php://input")); //shows the standard info about service
    }
}