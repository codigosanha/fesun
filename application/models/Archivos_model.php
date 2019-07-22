<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Archivos_model extends CI_Model {

	function __construct() {
        parent::__construct(); 
    }

    function allarchivos_count($parent)
    {   
    	if ($this->session->userdata("rol") != 1) {
			$user = $this->session->userdata("id");
		}else {
			$user = false;
		}

    	if ($user != false) {
			$this->db->select("a.*,f.nombre as finca");
			$this->db->from("archivos a");
			$this->db->join("fincas f", "a.finca_id = f.id");
			$this->db->join("usuarios u", "a.usuario_id = u.id");
			$this->db->where("a.usuario_id",$user);
			$this->db->where("a.parent",$parent);

			$query1 = $this->db->get_compiled_select(); // It resets the query just like a get()

			$this->db->select("a.*,f.nombre as finca");
			$this->db->distinct();
			$this->db->from("archivos a");
			$this->db->join("fincas f", "a.finca_id = f.id");
			$this->db->join("usuarios u", "a.usuario_id = u.id");
			$this->db->where("u.rol_id",'1');
			$this->db->where("a.parent",$parent);
			$query2 = $this->db->get_compiled_select(); 

			$resultados = $this->db->query($query1." UNION ".$query2);

		}else{
			$this->db->select("a.*,f.nombre as finca");
			$this->db->from("archivos a");
			$this->db->join("fincas f", "a.finca_id = f.id");
			$this->db->where("a.parent", $parent);
			$this->db->where("a.estado",1);
			$resultados = $this->db->get();

		}
		
        return $resultados->num_rows();  

    }
    
    function allarchivos($limit,$start,$col,$dir,$parent)
    {    

        if ($this->session->userdata("rol") != 1) {
			$user = $this->session->userdata("id");
		}else {
			$user = false;
		}

    	if ($user != false) {
			$this->db->select("a.*,f.nombre as finca");
			$this->db->from("archivos a");
			$this->db->join("fincas f", "a.finca_id = f.id");
			$this->db->join("usuarios u", "a.usuario_id = u.id");
			$this->db->where("a.usuario_id",$user);
			$this->db->where("a.parent",$parent);
			$query1 = $this->db->get_compiled_select(); // It resets the query just like a get()

			$this->db->select("a.*,f.nombre as finca");
			$this->db->distinct();
			$this->db->from("archivos a");
			$this->db->join("fincas f", "a.finca_id = f.id");
			$this->db->join("usuarios u", "a.usuario_id = u.id");
			$this->db->where("u.rol_id",'1');
			$this->db->where("a.parent",$parent);
			$query2 = $this->db->get_compiled_select(); 

			


			$resultados = $this->db->query($query1." UNION ALL ".$query2 ." ORDER  BY $col $dir LIMIT $start,$limit" );

		}else{
			$this->db->select("a.*,f.nombre as finca");
			$this->db->from("archivos a");
			$this->db->join("fincas f", "a.finca_id = f.id");
			$this->db->where("a.parent", $parent);
			$this->db->where("a.estado",1);
			$this->db->limit($limit,$start);
        	$this->db->order_by($col,$dir);
			$resultados = $this->db->get();

		}

		if($resultados->num_rows() > 0)
        {
            return $resultados->result(); 
        }
        else
        {
            return null;
        }
        
    }
   
    function archivos_search($limit,$start,$search,$col,$dir,$parent)
    {
   
        if ($this->session->userdata("rol") != 1) {
			$user = $this->session->userdata("id");
		}else {
			$user = false;
		}

    	if ($user != false) {
			$this->db->select("a.*,f.nombre as finca");
			$this->db->from("archivos a");
			$this->db->join("fincas f", "a.finca_id = f.id");
			$this->db->join("usuarios u", "a.usuario_id = u.id");
			$this->db->where("a.usuario_id",$user);
			$this->db->where("a.parent",$parent);
			$this->db->like('a.nombre',$search);
        	$this->db->or_like('a.descripcion',$search);


			$query1 = $this->db->get_compiled_select(); // It resets the query just like a get()

			$this->db->select("a.*,f.nombre as finca");
			$this->db->from("archivos a");
			$this->db->join("fincas f", "a.finca_id = f.id");
			$this->db->join("usuarios u", "a.usuario_id = u.id");
			$this->db->where("u.rol_id",'1');
			$this->db->where("a.parent",$parent);
			$this->db->like('a.nombre',$search);
        	$this->db->or_like('a.descripcion',$search);

			$query2 = $this->db->get_compiled_select(); 

			$resultados = $this->db->query($query1." UNION ALL ".$query2." ORDER  BY $col $dir LIMIT $start,$limit");

		}else{
			$this->db->select("a.*,f.nombre as finca");
			$this->db->from("archivos a");
			$this->db->join("fincas f", "a.finca_id = f.id");
			$this->db->where("a.parent", $parent);
			$this->db->where("a.estado",1);
			$this->db->like('a.nombre',$search);
        	$this->db->or_like('a.descripcion',$search);
			$this->db->limit($limit,$start);
        	$this->db->order_by($col,$dir);
			$resultados = $this->db->get();

		}

		if($resultados->num_rows() > 0)
        {
            return $resultados->result(); 
        }
        else
        {
            return null;
        }
    }

    function archivos_search_count($search,$parent)
    {
    	if ($this->session->userdata("rol") != 1) {
			$user = $this->session->userdata("id");
		}else {
			$user = false;
		}

    	if ($user != false) {
			$this->db->select("a.*,f.nombre as finca");
			$this->db->from("archivos a");
			$this->db->join("fincas f", "a.finca_id = f.id");
			$this->db->join("usuarios u", "a.usuario_id = u.id");
			$this->db->where("a.usuario_id",$user);
			$this->db->where("a.parent",$parent);
			$this->db->like('a.nombre',$search);
        	$this->db->or_like('a.descripcion',$search);

			$query1 = $this->db->get_compiled_select(); // It resets the query just like a get()

			$this->db->select("a.*,f.nombre as finca");
			$this->db->from("archivos a");
			$this->db->join("fincas f", "a.finca_id = f.id");
			$this->db->join("usuarios u", "a.usuario_id = u.id");
			$this->db->where("u.rol_id",'1');
			$this->db->where("a.parent",$parent);
			$this->db->like('a.nombre',$search);
        	$this->db->or_like('a.descripcion',$search);
			$query2 = $this->db->get_compiled_select(); 

			$resultados = $this->db->query($query1." UNION ".$query2 );

		}else{
			$this->db->select("a.*,f.nombre as finca");
			$this->db->from("archivos a");
			$this->db->join("fincas f", "a.finca_id = f.id");
			$this->db->where("a.parent", $parent);
			$this->db->where("a.estado",1);
			$this->db->like('a.nombre',$search);
        	$this->db->or_like('a.descripcion',$search);
			$resultados = $this->db->get();

		}

		
        return $resultados->num_rows(); 
        
    } 

	public function getArchivos($user=false,$parent){

		if ($user != false) {
			$this->db->select("a.*,f.nombre as finca");
			$this->db->from("archivos a");
			$this->db->join("fincas f", "a.finca_id = f.id");
			$this->db->join("usuarios u", "a.usuario_id = u.id");
			$this->db->where("a.usuario_id",$user);
			$this->db->where("a.parent",$parent);

			$query1 = $this->db->get_compiled_select(); // It resets the query just like a get()

			$this->db->select("a.*,f.nombre as finca");
			$this->db->from("archivos a");
			$this->db->join("fincas f", "a.finca_id = f.id");
			$this->db->join("usuarios u", "a.usuario_id = u.id");
			$this->db->where("u.rol_id",'1');
			$this->db->where("a.parent",$parent);
			$query2 = $this->db->get_compiled_select(); 

			$resultados = $this->db->query($query1." UNION ".$query2);

		}else{
			$this->db->select("a.*,f.nombre as finca");
			$this->db->from("archivos a");
			$this->db->join("fincas f", "a.finca_id = f.id");
			$this->db->where("a.parent", $parent);
			$this->db->where("a.estado",1);
			$resultados = $this->db->get();

		}
		
		return $resultados->result();
	}

	public function allArchivos2($fechainicio = false, $fechafinal =false){
		$this->db->select("a.*, f.nombre as finca,u.email");
		$this->db->from("archivos a");
		$this->db->join("fincas f", "a.finca_id=f.id");
		$this->db->join("usuarios u", "a.usuario_id=u.id");
		$this->db->where("a.estado", 1);
		if ($fechainicio !== false && $fechafinal !== false) {
			$this->db->where("a.fecha >=", $fechainicio." "."00:00:00");
			$this->db->where("a.fecha <=", $fechafinal." "."23:59:59");

		}
		$resultados = $this->db->get();
		return $resultados->result();
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

	public function getFolders(){
		$this->db->where("tipo", null);
		$resultados = $this->db->get("archivos");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("archivos",$data);
	}

	public function getFinca($id){
		$this->db->where("id", $id);
		$resultados = $this->db->get("fincas");
		return $resultados->row();
	}

	public function update($id,$data){
		$this->db->where("id", $id);
		return $this->db->update("archivos",$data);
	}

	public function fileshared($user){
		$this->db->select("a.*,c.fecha_shared,u.nombres, u.apellidos");
		$this->db->from("compartidos c");
		$this->db->join("archivos a", "c.archivo_id = a.id");
		$this->db->join("usuarios u", "a.usuario_id = u.id");
		$this->db->where("c.user_shared", $user);
		$resultados = $this->db->get();
		return $resultados->result();
	}

	public function saveUsersShared($data){
		return $this->db->insert("compartidos",$data);
	}

	public function getUsersShared($archivo){
		$this->db->select("u.nombres, u.apellidos, c.*");
		$this->db->from("compartidos c");
		$this->db->join("usuarios u", "c.user_shared = u.id");
		$this->db->where("c.archivo_id", $archivo);
		$resultados =  $this->db->get();
		return $resultados->result();
	}


}