<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {
	public function __construct(){
        parent::__construct();
        $this->load->helper('download');
    }
	public function index(){
		$this->load->view('comun/head');
		$this->load->view('comun/header');
		$this->load->view('inicio');
		$this->load->view('comun/footer');
	}
}
