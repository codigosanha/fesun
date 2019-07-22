<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model("Fincas_model");
        $this->load->model("Asociados_model");
        $this->load->library('user_agent');
        $this->load->helper('get_names_tables_relationship');
  }
    

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *      http://example.com/index.php/welcome
     *  - or -
     *      http://example.com/index.php/welcome/index
     *  - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function index()
    {
        $this->load->library('pdfgenerator');
        $asociado = $this->Asociados_model->getAsociado(8);
        
        $data = array(
            "asociado" => $asociado,
            "beneficiarios" => $this->Asociados_model->getBeneficiarios(8),
            "productos" => $this->Asociados_model->getProductos(8),
        );
        $html = $this->load->view('admin/asociados/prueba',$data, true);
        $filename = 'report_'.time();
        $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
    }
}
