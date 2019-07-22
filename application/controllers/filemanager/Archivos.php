<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archivos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Archivos_model");
		$this->load->model("Usuarios_model");
		$this->load->library('user_agent');
		$this->load->helper(array('download','get_names_tables_relationship'));
		$this->load->library('user_agent');
	}

	public function index($codigo = false)
	{
		$parent = 0;

		if ($codigo!= false) {
			$info = $this->Archivos_model->infoArchivo($codigo);
			$parent = $info->id;
		}

		if ($this->session->userdata("rol") != 1) {
			$archivos = $this->Archivos_model->getArchivos($this->session->userdata("id"),$parent);
		}else {
			$archivos = $this->Archivos_model->getArchivos(false,$parent);
		}

		$contenido_interno = array(
			"usuarios" => $this->Usuarios_model->getUsuarios(),
				"archivos" =>$archivos,
			"parent" => $parent,
			"fincas" => $this->Usuarios_model->getFincas($this->session->userdata("id")),
			
		);
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/archivos/list",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
		
	}

	public function getArchivos($codigo = false)
	{
		$parent = 0;
		if ($codigo!== false) {
			$info = $this->Archivos_model->infoArchivo($codigo);
			$parent = $info->id;
		}


		$columns = array( 
            0 => 'id', 
            1 => 'finca',
            2 => 'nombre',
            3 => 'descripcion',
            4 => 'fecha_subida',
        );

		$limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];
  
        $totalData = $this->Archivos_model->allarchivos_count($parent);
            
        $totalFiltered = $totalData; 
            
        if(empty($this->input->post('search')['value']))
        {            
            $archivos = $this->Archivos_model->allarchivos($limit,$start,$order,$dir,$parent);
        }
        else {
            $search = $this->input->post('search')['value']; 

            $archivos =  $this->Archivos_model->archivos_search($limit,$start,$search,$order,$dir,$parent);

            $totalFiltered = $this->Archivos_model->archivos_search_count($search,$parent);
        }

        $data = array();
        if(!empty($archivos))
        {
            foreach ($archivos as $archivo)
            {

                $nestedData['id'] = $archivo->id;
                $nestedData['finca'] = get_finca($archivo->finca_id)->nombre;
                $nestedData['nombre'] = $archivo->nombre;
                $nestedData['descripcion'] = $archivo->descripcion;
                $nestedData['fecha_subida'] = $archivo->fecha;
                $nestedData['tipo'] = $archivo->tipo;
                $nestedData['codigo'] = $archivo->codigo;
                
                $data[] = $nestedData;

            }
        }
          
        $json_data = array(
                    "draw"            => intval($this->input->post('draw')),  
                    "recordsTotal"    => intval($totalData),  
                    "recordsFiltered" => intval($totalFiltered), 
                    "data"            => $data   
                    );
            
        echo json_encode($json_data); 
	}

	public function addfile(){
		$contenido_interno = array(
			"folders" => $this->Archivos_model->getFolders()
		);

		$contenido_externo = array(
			"contenido" => $this->load->view("admin/archivos/addfile",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function addfolder(){
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/archivos/addfolder","",TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function savefolder(){
		$nombre = $this->input->post("nombre");
		$descripcion = $this->input->post("descripcion");
		$finca = $this->input->post("finca");
		$parent = $this->input->post("parent");
		$codigo = uniqid();
		$data = array(
			"nombre" => $nombre,
			"codigo" => $codigo,
			"parent" => $parent,
			"finca_id" => $finca,
			"descripcion" => $descripcion,
			"fecha" => date("Y-m-d H:i:s"),
			"usuario_id" => $this->session->userdata("id")
		);
		$resp = $this->Archivos_model->save($data);
		if ($resp != false) {
			$carpeta = "./uploads/folder/".$codigo;
			if (!file_exists($carpeta)) {
			    mkdir($carpeta, 0777, true);
			}
			// crear carpeta
			$this->session->set_flashdata("success", "Registro Exitoso");
			redirect($this->agent->referrer());
		}else{
			$this->session->set_flashdata("error", "Registro no Exitoso");
			redirect($this->agent->referrer());
		}
	}

	public function savefile(){
		$descripcion = $this->input->post("descripcion");
		$parent = $this->input->post("parent");
		$finca = $this->input->post("finca");

		$infoCarpeta = $this->Archivos_model->infoCarpeta($parent);
		if ($infoCarpeta != false) {
			$destino = './uploads/folder/'.$infoCarpeta->codigo.'/';
		}else{
			$destino = './uploads/folder/';
		}
		
		$this->load->library('upload');
		
        //$config['encrypt_name'] = true;

        $variablefile = $_FILES;

        $files        = count($_FILES['archivo']['name']);

        $imagen = "";
        for ($i = 0; $i < $files; $i++) {
        	$codigo = uniqid();
			$config['upload_path']   = $destino;
        	$config['allowed_types'] = 'jpg|pdf';
        	$config['file_name'] = $codigo;
            $_FILES['archivo']['name']     = $variablefile['archivo']['name'][$i];
            $_FILES['archivo']['type']     = $variablefile['archivo']['type'][$i];
            $_FILES['archivo']['tmp_name'] = $variablefile['archivo']['tmp_name'][$i];
            $_FILES['archivo']['error']    = $variablefile['archivo']['error'][$i];
            $_FILES['archivo']['size']     = $variablefile['archivo']['size'][$i];

            $this->upload->initialize($config);
            if ($this->upload->do_upload('archivo')) {
                $dataFile = array(
	            	'upload_data' => $this->upload->data()
	            );
            } 

            $data = array(
				"nombre" => $dataFile["upload_data"]["client_name"],
				"codigo" => $codigo,
				"parent" => $parent,
				"finca_id" => $finca,
				"descripcion" => $descripcion,
				"size" => $dataFile["upload_data"]["file_size"],
				"extension" => $dataFile["upload_data"]["file_ext"],
				"tipo" => 1,
				"fecha" => date("Y-m-d H:i:s"),
				"usuario_id" => $this->session->userdata("id")
			);
			$this->Archivos_model->save($data);

            
        }

        $this->session->set_flashdata("success", "Registro Exitoso");
		redirect($this->agent->referrer());

		
		/*if ($resp!=false) {
			$this->session->set_flashdata("success", "Registro Exitoso");
			redirect($this->agent->referrer());
			print_r($dataFile);
		}else{
			redirect($this->agent->referrer());
		}
*/

		        
	}

	public function shared(){
		$contenido_interno = array(
			"archivos" => $this->Archivos_model->fileshared($this->session->userdata("id")),
		);
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/archivos/shared",$contenido_interno,TRUE)
			
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function usershared(){
		$idArchivo = $this->input->post("idArchivo");
		$usuarios = $this->input->post("usuarios");
		for ($i=0; $i < count($usuarios); $i++) { 
			$data = array(
				"fecha_shared" => date("Y-m-d H:i:s"), 
				"user_shared" => $usuarios[$i],
				"archivo_id" => $idArchivo
			);
			$this->Archivos_model->saveUsersShared($data);
		}
		$this->session->set_flashdata("success", "El Archivo fue compartido por los usuarios seleccionados");
		redirect($this->agent->referrer());
	}

	public function view(){
		$id = $this->input->post("id");
		$archivo = $this->Archivos_model->infoCarpeta($id);
		$codigoparent = "";
		if ($archivo->parent != 0) {
			$parent = $this->Archivos_model->infoCarpeta($archivo->parent);
			$codigoparent = $parent->codigo;
		}
		$data = array(
			"archivo" => $archivo,
			"codigoparent" => $codigoparent,
		);
		$this->load->view("admin/archivos/view", $data);
	}

	public function download(){
		$ruta = $this->input->post("ruta");
		$original = $this->input->post("original");
		force_download($original,file_get_contents($ruta));
	}

	public function update(){
		$id = $this->input->post("archivo");
		$nombre = $this->input->post("nombre");
		$descripcion = $this->input->post("descripcion");

		$data = array(
			"nombre" => $nombre,
			"descripcion" => $descripcion
		);

		if ($this->Archivos_model->update($id,$data)) {
			$this->session->set_flashdata("success", "Registro Actualizado");
		}else{
			$this->session->set_flashdata("success", "Registro No Actualizado");
		}
		redirect($this->agent->referrer());
	}

	public function delete($id){
		$data = array(
			"estado" => 0
		);

		$this->Archivos_model->update($id, $data);

		echo "1";
	}

	public function getUsersShared(){
		$archivo = $this->input->post("id");
		$users = $this->Archivos_model->getUsersShared($archivo);
		echo json_encode($users);
	}


}