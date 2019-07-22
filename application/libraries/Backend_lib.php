<?php

class Backend_lib
{

	public function __get($var)
    {
        return get_instance()->$var;
    }

	public function savelog($modulo, $descripcion){
		$data = array(
			"usuario_id" => $this->session->userdata("id"),
			"modulo" => $modulo,
			"fecha" => date("Y-m-d H:i:s"),
			"descripcion" => $descripcion,

		);

		$this->Backend_model->savelogs($data);
	}

	public function breadcrumb(){
		/*<ol class="breadcrumb">
	        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
	        <li><a href="#">UI</a></li>
	        <li class="active">Buttons</li>
	      </ol>*/
	    $breadcrumb = "<ol class='breadcrumb'>";

	    $codigo = "";
	    $nombres = array();
	    $codigos = array();

	    if ($this->uri->segment(2)) {
	    	$codigo = $this->uri->segment(2);
	    	$archivo = $this->Backend_model->infoArchivo($codigo);
	    	$id = $archivo->id;
	    	$valorparent = 999;
	    	while ($valorparent != 0) {

	    		$infoArchivo = $this->Backend_model->infoCarpeta($id);
	    		$nombres[] = $infoArchivo->nombre;
	    		$codigos[] = $infoArchivo->codigo;

	    		if ($infoArchivo->parent != 0) {
	    			$id = $infoArchivo->parent;
	    		}
	    		
	    		$valorparent = $infoArchivo->parent;
	    	}
	    	$breadcrumb .= "<li><a href='".base_url("myfiles")."'>Mis archivos</a></li>";

	    	$reversaNombres = array_reverse($nombres);
		    $reversaCodigos = array_reverse($codigos);

		    $aux = count($reversaCodigos) - 1;

		    for ($i=0; $i < count($reversaCodigos); $i++) { 

		    	if ($i == $aux) {
		    		$breadcrumb .= "<li class='active'>{$reversaNombres[$i]}</li>";
		    	}else{
		    		$breadcrumb .= "<li><a href='".base_url("myfiles/{$reversaCodigos[$i]}")."'>{$reversaNombres[$i]}</a></li>";
		    	}
		    	
		    }
	    	
	    }else{
	    	$breadcrumb .= "<li class='active'>Mis archivos</li>";
	    }

	    
	    


	    $breadcrumb .= "</ol>";

	    return $breadcrumb;
	}


	public function getUsuarioAutenticado(){
		$this->load->model("Usuarios_model");

		$usuario = $this->Usuarios_model->getUsuario($this->session->userdata("id"));

		return $usuario;
	}
}