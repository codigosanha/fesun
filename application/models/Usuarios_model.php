<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	function allusuarios_count()
    {   
        $query = $this
                ->db
                ->get('usuarios');
    
        return $query->num_rows();  

    }
    
    function allusuarios($limit,$start,$col,$dir)
    {   
       $query = $this
                ->db
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('usuarios');
        
        if($query->num_rows()>0)
        {
            return $query->result(); 
        }
        else
        {
            return null;
        }
        
    }
   
    function usuarios_search($limit,$start,$search,$col,$dir)
    {
        $query = $this
                ->db
                ->like('nombres',$search)
                ->or_like('apellidos',$search)
                ->or_like('email',$search)
                ->or_like('cedula',$search)
                ->limit($limit,$start)
                ->order_by($col,$dir)
                ->get('usuarios');
        
       
        if($query->num_rows()>0)
        {
            return $query->result();  
        }
        else
        {
            return null;
        }
    }

    function usuarios_search_count($search)
    {
        $query = $this
                ->db
                ->like('nombres',$search)
                ->or_like('apellidos',$search)
                ->or_like('email',$search)
                ->or_like('cedula',$search)
                ->get('usuarios');
    
        return $query->num_rows();
    } 

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
        if ($resultados->num_rows() > 0) {
            return $resultados->row();
        }
        return false;
		
	}

	public function save($data){
		return $this->db->insert("usuarios",$data);
	}

	public function update($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("usuarios",$data);
	}

	public function login($email,$password, $rol){
		
		$this->db->where("password", $password);
		
        if ($rol == 2) {
            $this->db->where("(correo ='$email' OR num_identificacion='$email')");
            $resultados = $this->db->get("asociados");
        }else{
            $this->db->where("estado","1");
            $this->db->where("(email ='$email' OR cedula='$email')");
            $resultados = $this->db->get("usuarios");
        }
		
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