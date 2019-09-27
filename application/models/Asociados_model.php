<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asociados_model extends CI_Model {
	function __construct() {
        parent::__construct(); 
    }

    function allasociados_count()
    {   
        $query = $this
                ->db
                ->get('asociados');
    
        return $query->num_rows();  

    }
    
    function allasociados($limit,$start,$col,$dir)
    {   
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('asociados');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }
   
    function asociados_search($limit,$start,$search,$col,$dir)
    {
        $query = $this
                ->db
                ->like('nombres',$search)
                ->or_like('primer_apellido',$search)
                ->or_like('segundo_apellido',$search)
                ->or_like('num_identificacion',$search)
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('asociados');
        
       
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }

    function asociados_search_count($search)
    {
        $query = $this
                ->db
                ->like('nombres',$search)
                ->or_like('primer_apellido',$search)
                ->or_like('segundo_apellido',$search)
                ->or_like('num_identificacion',$search)
                ->get('asociados');
    
        return $query->num_rows();
    } 
	public function getAsociados(){
		$this->db->select("a.*,v.vinculacion");
		$this->db->from("asociados a");
		$this->db->join("vinculaciones v", "a.tipo_vinculacion = v.id");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function save($data,$beneficiarios, $ahorros){
		$this->db->trans_start();

        if ($this->db->insert("asociados", $data)) {
			$asociado_id =  $this->db->insert_id();
		}


		if (!empty($beneficiarios)) {
        	for ($i=0; $i <count($beneficiarios) ; $i++) { 
        		$databenificiario = array(
        			"nombres" => $beneficiarios[$i]["nombres"],
					"fec_nacimiento" => $beneficiarios[$i]["fec_nacimiento"],
					"num_identificacion" => $beneficiarios[$i]["num_identificacion"],
					"parentesco" => $beneficiarios[$i]["parentesco"],
					"telefono" => $beneficiarios[$i]["telefono"],
	        		'asociado_id' => $asociado_id
	        	);
	        	$this->db->insert("beneficiarios", $databenificiario);
        	}
        }

        if (!empty($ahorros)) {
        	for ($i=0; $i <count($ahorros) ; $i++) { 
        		$dataahorro = array(
        			"ahorro_id" => $ahorros[$i],
        			"asociado_id" => $asociado_id
					
	        	);
	        	$this->db->insert("informacion_productos", $dataahorro);
        	}
        }

        $this->db->trans_complete();
        if($this->db->trans_status() === FALSE)
        {
            $this->set_flash_error();
            return FALSE;  
        }
        return TRUE; //everything worked
	}

	public function set_flash_error()
    {
        $error = $this->db->error();
        $this->session->set_flashdata('Error', $error["message"]);
    }

    public function getAsociado($id){
		$this->db->select("a.*, v.vinculacion,ur.nombres as nombresur, ur.apellidos as apellidosur, f.nombre, CONCAT(ua.nombres, ' ',ua.apellidos) as user_aprueba");
		$this->db->from("asociados a");
		$this->db->join("usuarios ur", "ur.id=a.usuario_id");
		$this->db->join("usuarios ua", "ua.id=a.user_aprueba","left");
		$this->db->join("fincas f", "f.id=a.lugar_entrevista");
		$this->db->join("vinculaciones v", "v.id=a.tipo_vinculacion");
		$this->db->where("a.id",$id);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		return false;
	}

	public function getInfoPersonal($id){
		$this->db->select("ip.*,ti.tipoidentificacion,d.departamento as depa,m.municipio as muni,de.departamento as depanac,mu.municipio as muninac,ec.nombre, ne.nivel,v.vivienda as viviendaasoc");
		$this->db->from("informacion_personal ip");
		$this->db->join("tipo_identificacion ti", "ti.id=ip.tipo_identificacion");
		$this->db->join("departamentos d", "d.id_departamento=ip.departamento");
		$this->db->join("municipios m", "m.id_municipio=ip.municipio");
		$this->db->join("departamentos de", "de.id_departamento=ip.dep_nacimiento");
		$this->db->join("municipios mu", "mu.id_municipio=ip.mun_nacimiento");
		$this->db->join("estado_civil ec", "ec.id=ip.estado_civil");
		$this->db->join("nivel_escolaridad ne", "ne.id=ip.nivel_escolar");
		$this->db->join("viviendas v", "v.id=ip.vivienda");
		$this->db->where("ip.id",$id);
		return $this->db->get()->row();
	}

	public function save_personal($data){
		if ($this->db->insert("informacion_personal", $data)) {
			return $this->db->insert_id();
		}
		return false;
	}

	public function save_familiares($data){
		return $this->db->insert("familiares_asociados", $data);
	}

	public function getFamiliares($id){
		$this->db->where("asociado_id",$id);
		$resultados = $this->db->get("familiares_asociados");
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		return false;
	}

	public function saveInfoConyugue($data){
		return $this->db->insert("conyuges", $data);
	}
	public function getConyugue($id){
		$this->db->select("c.*,ti.tipoidentificacion,al.actividad,ne.nivel");
		$this->db->from("conyuges c");
		$this->db->join("tipo_identificacion ti", "ti.id=c.tipo_identificacion");
		$this->db->join("actividad_laboral al", "al.id=c.actividad_laboral");
		$this->db->join("nivel_escolaridad ne", "ne.id=c.nivel_escolar");
		$this->db->where("c.persona_id",$id);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		return false;
	}

	public function saveBeneficiarios($data){
		return $this->db->insert("beneficiarios", $data);
	}
	public function getBeneficiarios($id){
		$this->db->where("asociado_id",$id);
		$resultados = $this->db->get("beneficiarios");
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		return false;
	}

	public function deleteBeneficiarios($id){
		$this->db->where("asociado_id",$id);
		return $this->db->delete('beneficiarios');
	}

	public function deleteAhorros($id){
		$this->db->where("asociado_id",$id);
		return $this->db->delete('informacion_productos');
	}

	public function saveInfoLaboral($data){
		return $this->db->insert("informacion_laboral", $data);
	}
	public function getInfoLaboral($id){
		$this->db->select("il.*,f.nombre");
		$this->db->from("informacion_laboral il");
		$this->db->join("fincas f", "f.id=il.finca");
		$this->db->where("il.persona_id",$id);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		return false;
	}

	public function saveInfoFinanciera($data){
		return $this->db->insert("informacion_financiera", $data);
	}
	public function getInfoFinanciera($id){
		$this->db->where("persona_id",$id);
		$resultados = $this->db->get("informacion_financiera");
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		return false;
	}


	public function saveActivos($data){
		return $this->db->insert("descripcion_activos", $data);
	}
	public function getActivos($id){
		$this->db->select("da.*,d.departamento as depa, m.municipio as muni");
		$this->db->from("descripcion_activos da");
		$this->db->join("departamentos d", "d.id_departamento=da.departamento");
		$this->db->join("municipios m", "m.id_municipio=da.ciudad");
		$this->db->where("da.persona_id",$id);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		return false;
	}
	public function saveProductos($data){
		return $this->db->insert("informacion_productos", $data);
	}
	public function getProductos($id){

		$this->db->where("asociado_id",$id);
		$resultados = $this->db->get('informacion_productos');
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		return false;
	}
	public function saveReferencias($data){
		return $this->db->insert("referencias_personal", $data);
	}
	public function getReferencias($id){
		$this->db->where("persona_id",$id);
		$resultados = $this->db->get("referencias_personal");
		if ($resultados->num_rows() > 0) {
			return $resultados->result();
		}
		return false;
	}


	public function getFinca($id){
		$this->db->where("id", $id);
		$resultados = $this->db->get("fincas");
		return $resultados->row();
	}

	public function update($id,$data){
		$this->db->where("id", $id);
		return $this->db->update("asociados",$data);
	}

	public function deleteDetalle($persona_id, $tabla){
		$this->db->where("persona_id",$persona_id);
		return $this->db->delete($tabla);
	}

	public function insertAsociados($data)
	{
		$this->db->insert_batch("asociados", $data);
	}

	public function insertUsuarios($data)
	{
		$this->db->insert_batch("usuarios", $data);
	}


	public function getNumFields(){
		$resultados = $this->db->get('asociados');
		return $resultados->num_fields();
	}

	public function getNumRows(){
		$resultados = $this->db->get('asociados');
		return $resultados->num_rows();
	}

	public function totalAsociados($num_rows){
		$resultados = $this->db->get('asociados',$num_rows,0);
		return $resultados->result_array();
	}


	public function getDepartamentoByName($name){
		$this->db->where("departamento", $name);
		$resultados = $this->db->get("departamentos");
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		return false;
	}
	public function getMunicipioByName($name){
		$this->db->where("municipio", $name);
		$resultados = $this->db->get("municipios");
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		return false;
	}

	public function getFincaByName($name){
		$this->db->where("nombre", $name);
		$resultados = $this->db->get("fincas");
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		return false;
	}

	public function getUsuarioByEmail($name){
		$this->db->where("email", $name);
		$resultados = $this->db->get("usuarios");
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		return false;
	}

	public function getAsociadoByIdentificacion($num_identificacion){
		$this->db->where("num_identificacion", $num_identificacion);
		$resultados = $this->db->get("asociados");
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		return false;
	}

	public function truncate(){
		$this->db->truncate('asociados');
	}
}