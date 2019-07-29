<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aportes_model extends CI_Model {

	public function getAportes($estado = false){
		if ($estado != false) {
			$this->db->where("estado",1);
		}
		$resultados = $this->db->get("aportes");
		return $resultados->result();
	}

	public function insertAportes($data)
	{
		$this->db->insert_batch("aportes", $data);
	}
	public function gertAporte($id){
		$this->db->where("id", $id);
		$resultados = $this->db->get("aportes");
		return $resultados->row();
	}

	public function update($id,$data){
		$this->db->where("id", $id);
		return $this->db->update("aportes",$data);
	}


}