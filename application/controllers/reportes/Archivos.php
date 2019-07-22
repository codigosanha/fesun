<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archivos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Archivos_model");
	}

	public function index(){
		$fecinicio = $this->input->post("fecinicio");
		$fecfin = $this->input->post("fecfin");

		if ($this->input->post("buscar")) {
			$archivos = $this->Archivos_model->allArchivos($fecinicio,$fecfin);
		}
		else{
			$archivos = $this->Archivos_model->allArchivos();
		}

		$contenido_interno = array(
			"archivos" => $archivos,
			"fecinicio" => $fecinicio,
			"fecfin" => $fecfin

		);
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/reportes/archivos",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}


	
}