
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
if(!function_exists('get_finca'))
{
	function get_finca($idfinca)
	{
	    //asignamos a $ci el super objeto de codeigniter
		//$ci será como $this
		$ci =& get_instance();

		$ci->db->where('id',$idfinca);
		$query = $ci->db->get('fincas');
		return $query->row();
	 
	}
}


if(!function_exists('getUsuarioByCedula'))
{
	function getUsuarioByCedula($cedula)
	{
	    //asignamos a $ci el super objeto de codeigniter
		//$ci será como $this
		$ci =& get_instance();

		$ci->db->where('cedula',$cedula);
		$query = $ci->db->get('usuarios');
		return $query->row();
	 
	}
}

if(!function_exists('get_departamento'))
{
	function get_departamento($iddepartamento)
	{
	    //asignamos a $ci el super objeto de codeigniter
		//$ci será como $this
		$ci =& get_instance();

		$ci->db->where('id_departamento',$iddepartamento);
		$query = $ci->db->get('departamentos');
		return $query->row();
	 
	}
}

if(!function_exists('get_vinculacion'))
{
	function get_vinculacion($idvinculacion)
	{
	    //asignamos a $ci el super objeto de codeigniter
		//$ci será como $this
		$ci =& get_instance();

		$ci->db->where('id',$idvinculacion);
		$query = $ci->db->get('vinculaciones');
		return $query->row();
	 
	}
}

if(!function_exists('get_municipio'))
{
	function get_municipio($idmunicipio)
	{
	    //asignamos a $ci el super objeto de codeigniter
		//$ci será como $this
		$ci =& get_instance();

		$ci->db->where('id_municipio',$idmunicipio);
		$query = $ci->db->get('municipios');
		return $query->row();
	 
	}
}

if(!function_exists('get_nivel_escolaridad'))
{
	function get_nivel_escolaridad($idnivelescolar)
	{
	    //asignamos a $ci el super objeto de codeigniter
		//$ci será como $this
		$ci =& get_instance();

		$ci->db->where('id',$idnivelescolar);
		$query = $ci->db->get('nivel_escolaridad');
		return $query->row();
	 
	}
}

if(!function_exists('get_tipo_identificacion'))
{
	function get_tipo_identificacion($idtipoidentificacion)
	{
	    //asignamos a $ci el super objeto de codeigniter
		//$ci será como $this
		$ci =& get_instance();

		$ci->db->where('id',$idtipoidentificacion);
		$query = $ci->db->get('tipo_identificacion');
		return $query->row();
	 
	}
}

if(!function_exists('get_vivienda'))
{
	function get_vivienda($idvivienda)
	{
	    //asignamos a $ci el super objeto de codeigniter
		//$ci será como $this
		$ci =& get_instance();

		$ci->db->where('id',$idvivienda);
		$query = $ci->db->get('viviendas');
		return $query->row();
	 
	}
}

if(!function_exists('get_ahorro'))
{
	function get_ahorro($idahorro)
	{
	    //asignamos a $ci el super objeto de codeigniter
		//$ci será como $this
		$ci =& get_instance();

		$ci->db->where('id',$idahorro);
		$query = $ci->db->get('ahorros');
		return $query->row();
	 
	}
}
//end application/helpers/ayuda_helper.php