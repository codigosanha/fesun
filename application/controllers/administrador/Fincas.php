<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fincas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}

		$this->load->model("Fincas_model");

	}

	public function index()
	{
		$contenido_interno = array(
			"fincas" => $this->Fincas_model->getFincas()

		);

		$contenido_externo = array(
			"contenido" => $this->load->view("admin/fincas/list",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

}