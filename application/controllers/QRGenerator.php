<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class QRGenerator extends CI_Controller {
	public function __construct(){
        parent::__construct();
    }

    public function index(){
		$this->load->view('comun/head');
		$this->load->view('comun/header');
		$this->load->view('qr');
		$this->load->view('comun/footer');
	}
}

?>