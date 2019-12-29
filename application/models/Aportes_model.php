<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aportes_model extends CI_Model {

	function allaportes_count()
    {   
    	if ($this->session->userdata("rol") == 2) {
    		$this->db->where("cedula",$this->session->userdata("cedula"));
    	}
        $query = $this
                ->db
                ->get('aportes');
    
        return $query->num_rows();  

    }
    
    function allaportes($limit,$start,$col,$dir)
    {   
    	if ($this->session->userdata("rol") == 2) {
    		$this->db->where("cedula",$this->session->userdata("cedula"));
    	}
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('aportes');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }
   
    function aportes_search($limit,$start,$search,$col,$dir)
    {
    	if ($this->session->userdata("rol") == 2) {
    		$this->db->where("cedula",$this->session->userdata("cedula"));
    	}
        $query = $this
                ->db
                ->like('cedula',$search)
                ->or_like('nombre',$search)
                ->or_like('numero',$search)
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('aportes');
        
       
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }

    function aportes_search_count($search)
    {
    	if ($this->session->userdata("rol") == 2) {
    		$this->db->where("cedula",$this->session->userdata("cedula"));
    	}
        $query = $this
                ->db
                ->like('cedula',$search)
                ->or_like('nombre',$search)
                ->or_like('numero',$search)
                ->get('aportes');
    
        return $query->num_rows();
    } 

	public function getAportes($estado = false){
		if ($estado != false) {
			$this->db->where("estado",1);
		}
		$resultados = $this->db->get("aportes");
		return $resultados->result();
	}
	public function getAportesByCedula($cedula){
		
		$this->db->where("cedula",$cedula);
		
		$resultados = $this->db->get("aportes");
		return $resultados->result();
	}

	public function insertAportes($data)
	{
		$this->db->insert_batch("aportes", $data);
	}
	public function getAporte($id){
		$this->db->where("id", $id);
		$resultados = $this->db->get("aportes");
		return $resultados->row();
	}

	public function update($id,$data){
		$this->db->where("id", $id);
		return $this->db->update("aportes",$data);
	}


}