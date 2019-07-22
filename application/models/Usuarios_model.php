<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	public function getUsuarios(){
		$this->db->select("u.*,r.nombre");
		$this->db->from("usuarios u");
		$this->db->join("roles r", "u.rol_id = r.id","left");
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function getUsuario($id){
		$this->db->select("u.*,r.nombre");
		$this->db->from("usuarios u");
		$this->db->join("roles r", "u.rol_id = r.id","left");
		$this->db->where("u.id", $id);
		$resultados = $this->db->get();
		return $resultados->row();
	}

	public function save($data){
		return $this->db->insert("usuarios",$data);
	}

	public function update($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("usuarios",$data);
	}

	public function login($email, $password){
		$this->db->where("(email ='$email' OR cedula='$email')");
		$this->db->where("password", $password);
		$this->db->where("estado","1");

		$resultados = $this->db->get("usuarios");
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}

	public function getRoles(){
		$resultados = $this->db->get("roles");
		return $resultados->result();
	}

	public function saveFincas($data){
		return $this->db->insert("usuarios_fincas", $data);
	}
	public function getFincas($idusuario){
		$this->db->select("f.*,uf.*");
		$this->db->from("usuarios_fincas uf");
		$this->db->join("fincas f","uf.finca_id = f.id");
		$this->db->where("uf.usuario_id",$idusuario);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	
}