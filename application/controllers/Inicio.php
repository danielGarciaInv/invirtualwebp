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

	public function convertir(){
		$blobs = json_decode($this->input->post('blobs'));
		$i = 1;
		$webpImgs = [];
		foreach($blobs as $blob){
			// $base64String = base64_decode($blob);
			// $img = imagecreatefromstring($base64String);
			// $nombreArchivo = 'Image_'.$i.'.webp';
			echo $blob;
			// array_push($webpImgs,imagewebp($img,100));
			$i++;
		}
		
	}
}
