<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend_model extends CI_Model {
	public function countRows($table){
		
		return $this->db->get($table)->num_rows();
	}
	public function getLogs(){
		$this->db->select("l.*, u.email");
		$this->db->from("logs l");
		$this->db->join("usuarios u", "l.usuario_id = u.id");
		$resultados = $this->db->get();
		return $resultados->result();
	}
	public function savelogs($data){
		return $this->db->insert("logs",$data);
	}
	
	public function getTiposIdentificaciones(){
		return $this->db->get("tipo_identificacion")->result();
	}
	public function getEstadosCiviles(){
		return $this->db->get("estado_civil")->result();
	}
	public function getNivelEscolaridad(){
		return $this->db->get("nivel_escolaridad")->result();
	}
	public function getViviendas(){
		return $this->db->get("viviendas")->result();
	}
	public function getActividades(){
		return $this->db->get("actividad_laboral")->result();
	}

	public function getFincas(){
		return $this->db->get("fincas")->result();
	}
	public function getAhorros(){
		return $this->db->get("ahorros")->result();
	}
	public function getVinculaciones(){
		return $this->db->get("vinculaciones")->result();
	}

	public function getDepartamentos(){
		return $this->db->get("departamentos")->result();
	}
	public function getMunicipios($depa){
		$this->db->where("departamento_id", $depa);
		return $this->db->get("municipios")->result();
	}
	public function insert($table,$data)
	{
		$this->db->insert_batch($table, $data);
	}

	public function infoArchivo($codigo){
		$this->db->where("codigo", $codigo);
		$resultados = $this->db->get("archivos");
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}else{
			return false;
		}
	}
	public function infoCarpeta($id){
		$this->db->select("a.*,u.nombres,u.apellidos");
		$this->db->from("archivos a");
		$this->db->join("usuarios u", "a.usuario_id = u.id");
		$this->db->where("a.id", $id);
		$resultados = $this->db->get();
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}else{
			return false;
		}
	}
}
