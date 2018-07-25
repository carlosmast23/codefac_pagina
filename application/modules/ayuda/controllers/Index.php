<?php

if (!defined('BASEPATH'))
  exit('No direct script access allowed');

class Index extends MY_Controller {

  public function __construct() {
    parent::__construct();
  }

  public function index() {
    $this->load->view("principal/header");
    $this->load->view("principal/index");
    $this->load->view("principal/footer");
  }



}
