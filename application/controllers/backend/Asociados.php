<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Asociados extends CI_Controller {
	private $modulo = "Fincas";
	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Fincas_model");
		$this->load->model("Asociados_model");
		$this->load->model("Usuarios_model");
		$this->load->library('user_agent');
		$this->load->helper('get_names_tables_relationship');
		$this->load->library('excel');
	}

	public function index()
	{
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/asociados/list",'',TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function getAsociados()
	{

		$columns = array( 
                            0 =>'num_identificacion', 
                            1=> 'primer_apellido',
                            2=> 'segundo_apellido',
                            3=> 'nombres',
                            4=> 'tipo_vinculacion',
                            5=> 'fec_diligencia',
                            6 => 'estado'

                        );

		$limit = $this->input->post('length');
        $start = $this->input->post('start');
        $order = $columns[$this->input->post('order')[0]['column']];
        $dir = $this->input->post('order')[0]['dir'];
  
        $totalData = $this->Asociados_model->allasociados_count();
            
        $totalFiltered = $totalData; 
            
        if(empty($this->input->post('search')['value']))
        {            
            $asociados = $this->Asociados_model->allasociados($limit,$start,$order,$dir);
        }
        else {
            $search = $this->input->post('search')['value']; 

            $asociados =  $this->Asociados_model->asociados_search($limit,$start,$search,$order,$dir);

            $totalFiltered = $this->Asociados_model->asociados_search_count($search);
        }

        $data = array();
        if(!empty($asociados))
        {
            foreach ($asociados as $asociado)
            {

                $nestedData['id'] = $asociado->id;
                $nestedData['num_identificacion'] = $asociado->num_identificacion;
                $nestedData['primer_apellido'] = $asociado->primer_apellido;
                $nestedData['segundo_apellido'] = $asociado->segundo_apellido;
                $nestedData['nombres'] = $asociado->nombres;
                $nestedData['tipo_vinculacion'] = $asociado->tipo_vinculacion;
                $fec_diligencia = "";
                if ($asociado->fec_diligencia != "0000-00-00") {
                	$fec_diligencia = $asociado->fec_diligencia;
                }
                $nestedData['datetime'] = $fec_diligencia." ".$asociado->hora;
                $nestedData['estado'] = $asociado->estado;
                if ($asociado->estado == 0) {
                	$text_estado = "Pendiente";
                } else if($asociado->estado == 1){
                	$text_estado = "Aprobado";
                }else{
                	$text_estado = "Desaprobado";
                }
                $nestedData['text_estado'] = $text_estado;
                
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


	public function save(){
		$fecexpediccion = DateTime::createFromFormat('d/m/Y',$this->input->post("fec_expedicion"));
		$fecnac = DateTime::createFromFormat('d/m/Y',$this->input->post("fecha_nacimiento"));
		if (!empty($this->input->post("fecha_nacimiento_c"))) {
			$fecnac_c = DateTime::createFromFormat('d/m/Y',$this->input->post("fecha_nacimiento_c"))->format("Y-m-d");

		}else{
			$fecnac_c = '';
		}
		
		$fecdiligencia = DateTime::createFromFormat('d/m/Y',$this->input->post("fec_diligencia"));
		$fecafiliacion = DateTime::createFromFormat('d/m/Y',$this->input->post("fec_afiliacion"));
		$fecentrevista = DateTime::createFromFormat('d/m/Y',$this->input->post("fec_entrevista"));
		$fecingreso = DateTime::createFromFormat('d/m/Y',$this->input->post("fecha_ingreso"));
		$dataAsociado  = array(
			"primer_apellido" => $this->input->post("primer_apellido"),
			"segundo_apellido" => $this->input->post("segundo_apellido"),
			"nombres" => $this->input->post("nombres"),
			"tipo_identificacion" => $this->input->post("tipo_identificacion"),
			"num_identificacion" => $this->input->post("num_identificacion"),
			"departamento" => $this->input->post("departamento"),
			"municipio" => $this->input->post("municipio"),
			"genero" => $this->input->post("genero"),
			"estado_civil" => $this->input->post("estado_civil"),
			"fec_expedicion" => $fecexpediccion->format("Y-m-d"),
			"fecha_nacimiento" => $fecnac->format("Y-m-d"),
			"nivel_escolar" => $this->input->post("nivel_escolar"),
			"dep_nacimiento" => $this->input->post("dep_nacimiento"),
			"mun_nacimiento" => $this->input->post("mun_nacimiento"),
			"vivienda" => $this->input->post("vivienda"),
			"profesion" => $this->input->post("profesion"),
			"ocupacion" => $this->input->post("ocupacion"),
			"numero_hijos" => $this->input->post("numero_hijos"),
			"zona_ubicacion" => $this->input->post("zona_ubicacion"),
			"tiempo_residencia" => $this->input->post("tiempo_residencia"),
			"hijos_menores" => $this->input->post("hijos_menores"),
			"cabeza_hogar" => $this->input->post("cabeza_hogar"),
			"personas_dependientes" => $this->input->post("personas_dependientes"),
			"ciudad" => $this->input->post("ciudad"),
			"direccion_residencia" => $this->input->post("direcion_residencia"),
			"barrio" => $this->input->post("barrio"),
			"celular" => $this->input->post("celular"),
			"telefono" => $this->input->post("telefono"),
			"correo" => $this->input->post("correo"),
			"autorizo_envio" => $this->input->post("autorizo_envio"),
			"vinculado_fondo" => $this->input->post("vinculado_fondo"),
			"nombre_entidad" => $this->input->post("nombre_entidad"),
			"poblacion_vulnerable" => $this->input->post("poblacion_vulnerable"),
			"tipo_poblacion" => $this->input->post("tipo_poblacion"),
			"otra_poblacion" => $this->input->post("otra_poblacion"),
			"maneja_recursos" => $this->input->post("maneja_recursos"),
			"reconocimiento" => $this->input->post("reconocimiento"),
			"poder_publico" => $this->input->post("poder_publico"),
			"tiene_familiares" => $this->input->post("tiene_familiares"),
			"especificacion" => $this->input->post("especificacion"),
			"familiares_asociados" => $this->input->post("familiares_asociados"),

			"primer_apellido_conyuge" => $this->input->post("pa_conyugue"),
			"segundo_apellido_conyuge" => $this->input->post("segundo_apellido_c"),
			"nombres_conyuge" => $this->input->post("nombres_c"),
			"tipo_identificacion_conyuge" => $this->input->post("ti_conyugue"),
			"num_identificacion_conyuge" => $this->input->post("num_identificacion_c"),
			"fec_nacimiento_conyuge" => $fecnac_c,
			"actividad_laboral_conyuge" => $this->input->post("actividad_laboral"),
			"salario_conyuge" => $this->input->post("salario_c"),
			"jornada_laboral_conyuge" => $this->input->post("jornada_laboral"),
			"empresa_conyuge" => $this->input->post("empresa"),
			"cargo_conyuge" => $this->input->post("cargo_c"),
			"antiguedad_conyuge" => $this->input->post("antiguedad"),
			"telefono_conyuge" => $this->input->post("telefono_fijo"),
			"celular_conyuge" => $this->input->post("celular_c"),
			"nivel_escolar_conyuge" => $this->input->post("nivel_escolar_c"),
			"ocupacion_conyuge" => $this->input->post("ocupacion_c"),
			"asociado_fesun_conyuge" => $this->input->post("asociado_fesun_c"),

			"vinculacion_empresa" => $this->input->post("vinculacion_empresa"),
			"fecha_ingreso" => $fecingreso->format("Y-m-d"), 
			"finca" => $this->input->post("finca"),
			"municipio_laboral" => $this->input->post("municipio_laboral"),
			"tipo_nomina" => $this->input->post("tipo_nomina"),
			"tipo_contrato" => $this->input->post("tipo_contrato"),
			"tiempo_servicio" => $this->input->post("tiempo_servicio"),
			"sueldo_basico" => $this->input->post("sueldo_basico"),
			"cargo" => $this->input->post("cargo_laboral"),
			"fondo_pensiones" => $this->input->post("fondo_pensiones"),
			"fondo_cesantias" => $this->input->post("fondo_cesantias"),
			"observaciones_laboral" => $this->input->post("observaciones"),

			"ingreso_bruto" => $this->input->post("ingreso_bruto"),
			"otros_ingresos" => $this->input->post("otros_ingresos"),
			"descripcion_ingresos" => $this->input->post("descripcion_ingresos"),
			"total_ingresos" => $this->input->post("total_ingresos"),
			"prestamos" => $this->input->post("prestamos"),
			"gastos_familiares" => $this->input->post("gastos_familiares"),
			"otros_gastos" => $this->input->post("otros_gastos"),
			"total_egresos" => $this->input->post("total_egresos"),
			"bancos" => $this->input->post("bancos"),
			"corporaciones" => $this->input->post("corporaciones"),
			"personales" => $this->input->post("personales"),
			"total_obligaciones" => $this->input->post("total_obligaciones"),
			"activos_propiedades" => $this->input->post("activos_propiedades"),
			"pasivos_obligaciones" => $this->input->post("pasivos_obligaciones"),
			"cuenta_bancaria" => $this->input->post("cuenta_bancaria"),
			"entidad" => $this->input->post("entidad"),
			"tipo_cuenta" => $this->input->post("tipo_cuenta"),
			"operaciones_extranjeras" => $this->input->post("operacion_extranjera"),
			"pais" => $this->input->post("pais"),
			"moneda_extranjera" => $this->input->post("moneda_extranjera"),
			"banco" => $this->input->post("banco"),
			"cuenta" => $this->input->post("cuenta"),
			"declara_renta" => $this->input->post("declara_renta"),

			"marca" => $this->input->post("marca"),
			"modelo" => $this->input->post("modelo"),
			"placa" => $this->input->post("placa"),
			"valor" => $this->input->post("valor"),
			"pignoracion" => $this->input->post("pignoracion"),
			"entidad_pignorado" => $this->input->post("entidad_pignorado"),
			"tipo_bien" => $this->input->post("tipo_bien"),
			"direccion" => $this->input->post("direccion"),
			"departamento_bienes" => $this->input->post("dep_raices"),
			"ciudad_bienes" => $this->input->post("ciudad_raices"),
			"valor_comercial" => $this->input->post("valor_comercial"),
			"matricula_inmobilaria" => $this->input->post("matricula_inmobilaria"),
			"hipoteca" => $this->input->post("hipoteca"),
			"entidad_hipotecada" => $this->input->post("entidad_hipotecada"),
			"otros_activos" => $this->input->post("otros_activos"),

			"prf_nombres_apellidos" => $this->input->post("prf_nombres_apellidos"),
			"prf_parentesco" => $this->input->post("prf_parentesco"),
			"prf_telefono" => $this->input->post("prf_telefono"),
			"prf_celular" => $this->input->post("prf_celular"),

			"srf_nombres_apellidos" => $this->input->post("srf_nombres_apellidos"), 
			"srf_parentesco" => $this->input->post("srf_parentesco"),
			"srf_telefono" => $this->input->post("srf_telefono"),
			"srf_celular" => $this->input->post("srf_celular"),

			"rc_nombres_apellidos" => $this->input->post("rc_nombres_apellidos"),
			"rc_parentesco" => $this->input->post("rc_parentesco"),
			"rc_telefono" => $this->input->post("rc_telefono"),
			"rc_celular" => $this->input->post("rc_celular"),

			"tipo_vinculacion" => $this->input->post("tipo_vinculacion"),
			"fec_diligencia" => $fecdiligencia->format("Y-m-d"),
			"oficina" => $this->input->post("oficina"),
			"fecha_afiliacion" => $fecafiliacion->format("Y-m-d"),
			"interes" => $this->input->post("interes"),
			"lugar_entrevista" => $this->input->post("lugar_entrevista"),
			"fecha_entrevista" => $fecentrevista->format("Y-m-d"),
			"hora" => $this->input->post("hora"),
			"usuario_id" => $this->session->userdata("id"),
			"observaciones_diligencia" => $this->input->post("obs_diligencia"),
			"estado" => 0,
		);

		$nombres = $this->input->post("nombres_b");
		$fechas = $this->input->post("fechas_b");
		$identificaciones = $this->input->post("identificaciones_b");
		$parentesco = $this->input->post("parentescos_b");
		$telefono = $this->input->post("telefonos_b");

		$beneficiarios  = array();

		if (!empty($nombres)) {
			for ($i=0; $i < count($nombres); $i++) { 
				if (!empty($fechas[$i])) {
					$fecha = DateTime::createFromFormat('d/m/Y',$fechas[$i]);
					$beneficiarios[] = array(
						"nombres" => $nombres[$i],
						"fec_nacimiento" => $fecha->format("Y-m-d"),
						"num_identificacion" => $identificaciones[$i],
						"parentesco" => $parentesco[$i],
						"telefono" => $telefono[$i],
					);
				}
				
			}
			
		}

		$ahorros = $this->input->post("ahorros");
	
		if ($this->Asociados_model->save($dataAsociado,$beneficiarios,$ahorros)) {
			$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
			//echo "1";
			redirect(base_url()."backend/asociados");
		}
		else{
			$this->session->set_flashdata("error", "Los datos no fueron guardados");
				//echo "1";
			redirect(base_url()."backend/asociados/add");
		}
	}

	public function add(){
		$contenido_interno = array(
			"departamentos" => $this->Backend_model->getDepartamentos(),
			"estadosciviles" => $this->Backend_model->getEstadosCiviles(),
			"nivelescolaridades" => $this->Backend_model->getNivelEscolaridad(),
			"viviendas" => $this->Backend_model->getViviendas(),
			"actividades" => $this->Backend_model->getActividades(),
			"fincas" => $this->Backend_model->getFincas(),
			"ahorros" => $this->Backend_model->getAhorros(),
			"vinculaciones" => $this->Backend_model->getVinculaciones(),
		);
		$contenido_externo = array(
			"contenido" => $this->load->view("admin/asociados/add",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function importar(){
		$path = $_FILES["file"]["tmp_name"];
		$object = PHPExcel_IOFactory::load($path);

		foreach($object->getWorksheetIterator() as $worksheet)
		{
			$highestRow = $worksheet->getHighestRow();
			$highestColumn = $worksheet->getHighestColumn();
			for($row=2; $row<=$highestRow; $row++)
			{
				$primer_apellido = $worksheet->getCellByColumnAndRow(1, $row)->getValue();
				$segundo_apellido = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
				$nombres = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
				$tipo_identificacion = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
				$num_identificacion = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
				$checkNumIdentificacion = $this->Asociados_model->getAsociadoByIdentificacion($num_identificacion);
				if ($checkNumIdentificacion) {
					$password = $checkNumIdentificacion->password;
				}else{
					$password = sha1($num_identificacion);
				}
				$departamento = $worksheet->getCellByColumnAndRow(6, $row)->getValue();
				if ($departamento) {
					$infoDepartamento = $this->Asociados_model->getDepartamentoByName($departamento);
					$departamento = $infoDepartamento->id_departamento;
				}
				$municipio = $worksheet->getCellByColumnAndRow(7, $row)->getValue();
				if ($municipio) {
					$infoMunicipio = $this->Asociados_model->getMunicipioByName($municipio);
					$municipio = $infoMunicipio->id_municipio;
				}
				$genero = $worksheet->getCellByColumnAndRow(8, $row)->getValue();
				$estado_civil = $worksheet->getCellByColumnAndRow(9, $row)->getValue();
				/*$fec_expedicion = PHPExcel_Shared_Date::ExcelToPHPObject($worksheet->getCellByColumnAndRow(10, $row)->getValue());*/
				$set_fec_expedicion = $worksheet->getCellByColumnAndRow(10, $row)->getFormattedValue();

				if ($set_fec_expedicion!="") {
					$set_fec_expedicion = DateTime::createFromFormat('d/m/Y', $set_fec_expedicion);
					if ($set_fec_expedicion!==false) {
						$set_fec_expedicion = $set_fec_expedicion->format('Y-m-d');
					}else{
						$set_fec_expedicion ="";
					}				
				}

				$set_fecha_nacimiento = $worksheet->getCellByColumnAndRow(11, $row)->getFormattedValue();

				if ($set_fecha_nacimiento!="") {
					$set_fecha_nacimiento = DateTime::createFromFormat('d/m/Y', $set_fecha_nacimiento);
					if ($set_fecha_nacimiento!==false) {
						$set_fecha_nacimiento = $set_fecha_nacimiento->format('Y-m-d');
					}else{
						$set_fecha_nacimiento ="";
					}		
				}

				$nivel_escolar = $worksheet->getCellByColumnAndRow(12, $row)->getValue();
				$dep_nacimiento = $worksheet->getCellByColumnAndRow(13, $row)->getValue();
				if ($dep_nacimiento) {
					$infoDepartamento = $this->Asociados_model->getDepartamentoByName($dep_nacimiento);
					$dep_nacimiento = $infoDepartamento->id_departamento;
				}
				$mun_nacimiento = $worksheet->getCellByColumnAndRow(14, $row)->getValue();
				if ($mun_nacimiento) {
					$infoMunicipio = $this->Asociados_model->getMunicipioByName($mun_nacimiento);
					$mun_nacimiento = $infoMunicipio->id_municipio;
				}
				$vivienda = $worksheet->getCellByColumnAndRow(15, $row)->getValue();
				$profesion = $worksheet->getCellByColumnAndRow(16, $row)->getValue();
				$ocupacion = $worksheet->getCellByColumnAndRow(17, $row)->getValue();
				$numero_hijos = $worksheet->getCellByColumnAndRow(18, $row)->getValue();
				$zona_ubicacion = $worksheet->getCellByColumnAndRow(19, $row)->getValue();
				$tiempo_residencia = $worksheet->getCellByColumnAndRow(20, $row)->getValue();
				$hijos_menores = $worksheet->getCellByColumnAndRow(21, $row)->getValue();
				$cabeza_hogar = $worksheet->getCellByColumnAndRow(22, $row)->getValue();
				$personas_dependientes = $worksheet->getCellByColumnAndRow(23, $row)->getValue();
				$ciudad = $worksheet->getCellByColumnAndRow(24, $row)->getValue();
				$direccion_residencia = $worksheet->getCellByColumnAndRow(25, $row)->getValue();
				$barrio = $worksheet->getCellByColumnAndRow(26, $row)->getValue();
				$celular = $worksheet->getCellByColumnAndRow(27, $row)->getValue();
				$telefono = $worksheet->getCellByColumnAndRow(28, $row)->getValue();
				$correo = $worksheet->getCellByColumnAndRow(29, $row)->getValue();
				$autorizo_envio = $worksheet->getCellByColumnAndRow(30, $row)->getValue();
				$vinculado_fondo = $worksheet->getCellByColumnAndRow(31, $row)->getValue();
				$nombre_entidad = $worksheet->getCellByColumnAndRow(32, $row)->getValue();
				$poblacion_vulnerable = $worksheet->getCellByColumnAndRow(33, $row)->getValue();
				$tipo_poblacion = $worksheet->getCellByColumnAndRow(34, $row)->getValue();
				$otra_poblacion = $worksheet->getCellByColumnAndRow(35, $row)->getValue();
				$maneja_recursos = $worksheet->getCellByColumnAndRow(36, $row)->getValue();
				$reconocimiento = $worksheet->getCellByColumnAndRow(37, $row)->getValue();
				$poder_publico = $worksheet->getCellByColumnAndRow(38, $row)->getValue();
				$tiene_familiares = $worksheet->getCellByColumnAndRow(39, $row)->getValue();
				$especificacion = $worksheet->getCellByColumnAndRow(40, $row)->getValue();
				$familiares_asociados = $worksheet->getCellByColumnAndRow(41, $row)->getValue();
				$primer_apellido_conyuge = $worksheet->getCellByColumnAndRow(42, $row)->getValue();
				$segundo_apellido_conyuge = $worksheet->getCellByColumnAndRow(43, $row)->getValue();
				$nombres_conyuge = $worksheet->getCellByColumnAndRow(44, $row)->getValue();
				$tipo_identificacion_conyuge = $worksheet->getCellByColumnAndRow(45, $row)->getValue();
				$num_identificacion_conyuge = $worksheet->getCellByColumnAndRow(46, $row)->getValue();
	
				$set_fec_nacimiento_conyuge = $worksheet->getCellByColumnAndRow(47, $row)->getFormattedValue();

				if ($set_fec_nacimiento_conyuge!="") {
					$set_fec_nacimiento_conyuge = DateTime::createFromFormat('d/m/Y', $set_fec_nacimiento_conyuge);
					if ($set_fec_nacimiento_conyuge!==false) {
						$set_fec_nacimiento_conyuge = $set_fec_nacimiento_conyuge->format('Y-m-d');
					}else{
						$set_fec_nacimiento_conyuge ="";
					}		
				}


				$actividad_laboral_conyuge = $worksheet->getCellByColumnAndRow(48, $row)->getValue();
				$salario_conyuge = $worksheet->getCellByColumnAndRow(49, $row)->getValue();
				$jornada_laboral_conyuge = $worksheet->getCellByColumnAndRow(50, $row)->getValue();
				$empresa_conyuge = $worksheet->getCellByColumnAndRow(51, $row)->getValue();
				$cargo_conyuge = $worksheet->getCellByColumnAndRow(52, $row)->getValue();
				$antiguedad_conyuge = $worksheet->getCellByColumnAndRow(53, $row)->getValue();
				$telefono_conyuge = $worksheet->getCellByColumnAndRow(54, $row)->getValue();
				$celular_conyuge = $worksheet->getCellByColumnAndRow(55, $row)->getValue();
				$nivel_escolar_conyuge = $worksheet->getCellByColumnAndRow(56, $row)->getValue();
				$ocupacion_conyuge = $worksheet->getCellByColumnAndRow(57, $row)->getValue();
				$asociado_fesun_conyuge = $worksheet->getCellByColumnAndRow(58, $row)->getValue();
				$vinculacion_empresa = $worksheet->getCellByColumnAndRow(59, $row)->getValue();

				$set_fecha_ingreso = $worksheet->getCellByColumnAndRow(60, $row)->getFormattedValue();

				if ($set_fecha_ingreso!="") {
					$set_fecha_ingreso = date("Y-m-d", strtotime( str_replace("/", "-", $set_fecha_ingreso)));
				}
				
				$finca = $worksheet->getCellByColumnAndRow(61, $row)->getValue();
				if ($finca) {
					$infoFinca = $this->Asociados_model->getFincaByName($finca);
					$finca = $infoFinca->id;
				}

				$municipio_laboral = $worksheet->getCellByColumnAndRow(62, $row)->getValue();
				$tipo_nomina = $worksheet->getCellByColumnAndRow(63, $row)->getValue();
				$tipo_contrato = $worksheet->getCellByColumnAndRow(64, $row)->getValue();
				$tiempo_servicio = $worksheet->getCellByColumnAndRow(65, $row)->getValue();
				$sueldo_basico = $worksheet->getCellByColumnAndRow(66, $row)->getValue();
				$cargo = $worksheet->getCellByColumnAndRow(67, $row)->getValue();
				$fondo_pensiones = $worksheet->getCellByColumnAndRow(68, $row)->getValue();
				$fondo_cesantias = $worksheet->getCellByColumnAndRow(69, $row)->getValue();
				$observaciones_laboral = $worksheet->getCellByColumnAndRow(70, $row)->getValue();
				$ingreso_bruto = $worksheet->getCellByColumnAndRow(71, $row)->getValue();
				$otros_ingresos = $worksheet->getCellByColumnAndRow(72, $row)->getValue();
				$descripcion_ingresos = $worksheet->getCellByColumnAndRow(73, $row)->getValue();
				$total_ingresos = $worksheet->getCellByColumnAndRow(74, $row)->getValue();
				$prestamos = $worksheet->getCellByColumnAndRow(75, $row)->getValue();
				$gastos_familiares = $worksheet->getCellByColumnAndRow(76, $row)->getValue();
				$otros_gastos = $worksheet->getCellByColumnAndRow(77, $row)->getValue();
				$total_egresos = $worksheet->getCellByColumnAndRow(78, $row)->getValue();
				$bancos = $worksheet->getCellByColumnAndRow(79, $row)->getValue();
				$corporaciones = $worksheet->getCellByColumnAndRow(80, $row)->getValue();
				$personales = $worksheet->getCellByColumnAndRow(81, $row)->getValue();
				$total_obligaciones = $worksheet->getCellByColumnAndRow(82, $row)->getValue();
				$activos_propiedades = $worksheet->getCellByColumnAndRow(83, $row)->getValue();
				$pasivos_obligaciones = $worksheet->getCellByColumnAndRow(84, $row)->getValue();
				$cuenta_bancaria = $worksheet->getCellByColumnAndRow(85, $row)->getValue();
				$entidad = $worksheet->getCellByColumnAndRow(86, $row)->getValue();
				$tipo_cuenta = $worksheet->getCellByColumnAndRow(87, $row)->getValue();
				$operaciones_extranjeras = $worksheet->getCellByColumnAndRow(88, $row)->getValue();
				$pais = $worksheet->getCellByColumnAndRow(89, $row)->getValue();
				$moneda_extranjera = $worksheet->getCellByColumnAndRow(90, $row)->getValue();
				$banco = $worksheet->getCellByColumnAndRow(91, $row)->getValue();
				$cuenta = $worksheet->getCellByColumnAndRow(92, $row)->getValue();
				$declara_renta = $worksheet->getCellByColumnAndRow(93, $row)->getValue();
				$marca = $worksheet->getCellByColumnAndRow(94, $row)->getValue();
				$modelo = $worksheet->getCellByColumnAndRow(95, $row)->getValue();
				$placa = $worksheet->getCellByColumnAndRow(96, $row)->getValue();
				$valor = $worksheet->getCellByColumnAndRow(97, $row)->getValue();
				$pignoracion = $worksheet->getCellByColumnAndRow(98, $row)->getValue();
				$entidad_pignorado = $worksheet->getCellByColumnAndRow(99, $row)->getValue();
				$tipo_bien = $worksheet->getCellByColumnAndRow(100, $row)->getValue();
				$direccion = $worksheet->getCellByColumnAndRow(101, $row)->getValue();
				$departamento_bienes = $worksheet->getCellByColumnAndRow(102, $row)->getValue();
				if ($departamento_bienes) {
					$infoDepartamento = $this->Asociados_model->getDepartamentoByName($departamento_bienes);
					$departamento_bienes = $infoDepartamento->id_departamento;
				}
				$ciudad_bienes = $worksheet->getCellByColumnAndRow(103, $row)->getValue();
				if ($ciudad_bienes) {
					$infoCiudad = $this->Asociados_model->getDepartamentoByName($ciudad_bienes);
					$ciudad_bienes = $infoCiudad->id_municipio;
				}
				$valor_comercial = $worksheet->getCellByColumnAndRow(104, $row)->getValue();
				$matricula_inmobilaria = $worksheet->getCellByColumnAndRow(105, $row)->getValue();
				$hipoteca = $worksheet->getCellByColumnAndRow(106, $row)->getValue();
				$entidad_hipotecada = $worksheet->getCellByColumnAndRow(107, $row)->getValue();
				$otros_activos = $worksheet->getCellByColumnAndRow(108, $row)->getValue();
				$prf_nombres_apellidos = $worksheet->getCellByColumnAndRow(109, $row)->getValue();
				$prf_parentesco = $worksheet->getCellByColumnAndRow(110, $row)->getValue();
				$prf_telefono = $worksheet->getCellByColumnAndRow(111, $row)->getValue();
				$prf_celular = $worksheet->getCellByColumnAndRow(112, $row)->getValue();
				$srf_nombres_apellidos = $worksheet->getCellByColumnAndRow(113, $row)->getValue();
				$srf_parentesco = $worksheet->getCellByColumnAndRow(114, $row)->getValue();
				$srf_telefono = $worksheet->getCellByColumnAndRow(115, $row)->getValue();
				$srf_celular = $worksheet->getCellByColumnAndRow(116, $row)->getValue();
				$rc_nombres_apellidos = $worksheet->getCellByColumnAndRow(117, $row)->getValue();
				$rc_parentesco = $worksheet->getCellByColumnAndRow(118, $row)->getValue();
				$rc_telefono = $worksheet->getCellByColumnAndRow(119, $row)->getValue();
				$rc_celular = $worksheet->getCellByColumnAndRow(120, $row)->getValue();
				$tipo_vinculacion = $worksheet->getCellByColumnAndRow(121, $row)->getValue();
				$set_fec_diligencia = $worksheet->getCellByColumnAndRow(122, $row)->getFormattedValue();

				if ($set_fec_diligencia!="") {
					$set_fec_diligencia = DateTime::createFromFormat('d/m/Y', $set_fec_diligencia);
					if ($set_fec_diligencia!==false) {
						$set_fec_diligencia = $set_fec_diligencia->format('Y-m-d');
					}else{
						$set_fec_diligencia ="";
					}		
				}
				$oficina = $worksheet->getCellByColumnAndRow(123, $row)->getValue();
				$set_fecha_afiliacion = $worksheet->getCellByColumnAndRow(124, $row)->getFormattedValue();
				if ($set_fecha_afiliacion!="") {
					$set_fecha_afiliacion = DateTime::createFromFormat('d/m/Y', $set_fecha_afiliacion);
					if ($set_fecha_afiliacion!==false) {
						$set_fecha_afiliacion = $set_fecha_afiliacion->format('Y-m-d');
					}else{
						$set_fecha_afiliacion ="";
					}		
				}
				$interes = $worksheet->getCellByColumnAndRow(125, $row)->getValue();
				$lugar_entrevista = $worksheet->getCellByColumnAndRow(126, $row)->getValue();
				$set_fecha_entrevista = $worksheet->getCellByColumnAndRow(127, $row)->getFormattedValue();
				if ($set_fecha_entrevista!="") {
					$set_fecha_entrevista = DateTime::createFromFormat('d/m/Y', $set_fecha_entrevista);
					if ($set_fecha_entrevista!==false) {
						$set_fecha_entrevista = $set_fecha_entrevista->format('Y-m-d');
					}else{
						$set_fecha_entrevista ="";
					}		
				}
				$hora = $worksheet->getCellByColumnAndRow(128, $row)->getValue();
				$usuario_id = $worksheet->getCellByColumnAndRow(129, $row)->getValue();
				if ($usuario_id) {
					$infoUsuario = $this->Asociados_model->getUsuarioByEmail($usuario_id);
					$usuario_id = $infoUsuario->id;
				}
				$observaciones_diligencia = $worksheet->getCellByColumnAndRow(130, $row)->getValue();
				$estado = $worksheet->getCellByColumnAndRow(131, $row)->getValue();
				$user_aprueba = $worksheet->getCellByColumnAndRow(132, $row)->getValue();
				if ($user_aprueba) {
					$infoUsuario = $this->Asociados_model->getUsuarioByEmail($user_aprueba);
					$user_aprueba = $infoUsuario->id;
				}


				$data[] = array(
					"primer_apellido" => $primer_apellido,
					"segundo_apellido" => $segundo_apellido,
					"nombres" => $nombres,
					"tipo_identificacion" => $tipo_identificacion,
					"num_identificacion" => $num_identificacion,
					"departamento" => $departamento,
					"municipio" => $municipio,
					"genero" => $genero,
					"estado_civil" => $estado_civil,
					"fec_expedicion" => $set_fec_expedicion,
					"fecha_nacimiento" => $set_fecha_nacimiento,
					"nivel_escolar" => $nivel_escolar,
					"dep_nacimiento" => $dep_nacimiento,
					"mun_nacimiento" => $mun_nacimiento,
					"vivienda" => $vivienda,
					"profesion" => $profesion,
					"ocupacion" => $ocupacion,
					"numero_hijos" => $numero_hijos,
					"zona_ubicacion" => $zona_ubicacion,
					"tiempo_residencia" => $tiempo_residencia,
					"hijos_menores" => $hijos_menores,
					"cabeza_hogar" => $cabeza_hogar,
					"personas_dependientes" => $personas_dependientes,
					"ciudad" => $ciudad,
					"direccion_residencia" => $direccion_residencia,
					"barrio" => $barrio,
					"celular" => $celular,
					"telefono" => $telefono,
					"correo" => $correo,
					"autorizo_envio" => $autorizo_envio,
					"vinculado_fondo" => $vinculado_fondo,
					"nombre_entidad" => $nombre_entidad,
					"poblacion_vulnerable" => $poblacion_vulnerable,
					"tipo_poblacion" => $tipo_poblacion,
					"otra_poblacion" => $otra_poblacion,
					"maneja_recursos" => $maneja_recursos,
					"reconocimiento" => $reconocimiento,
					"poder_publico" => $poder_publico,
					"tiene_familiares" => $tiene_familiares,
					"especificacion" => $especificacion,
					"familiares_asociados" => $familiares_asociados,
					"primer_apellido_conyuge" => $primer_apellido_conyuge,
					"segundo_apellido_conyuge" => $segundo_apellido_conyuge,
					"nombres_conyuge" => $nombres_conyuge,
					"tipo_identificacion_conyuge" => $tipo_identificacion_conyuge,
					"num_identificacion_conyuge" => $num_identificacion_conyuge,
					"fec_nacimiento_conyuge" => $set_fec_nacimiento_conyuge,
					"actividad_laboral_conyuge" => $actividad_laboral_conyuge,
					"salario_conyuge" => $salario_conyuge,
					"jornada_laboral_conyuge" => $jornada_laboral_conyuge,
					"empresa_conyuge" => $empresa_conyuge,
					"cargo_conyuge" => $cargo_conyuge,
					"antiguedad_conyuge" => $antiguedad_conyuge,
					"telefono_conyuge" => $telefono_conyuge,
					"celular_conyuge" => $celular_conyuge,
					"nivel_escolar_conyuge" => $nivel_escolar_conyuge,
					"ocupacion_conyuge" => $ocupacion_conyuge,
					"asociado_fesun_conyuge" => $asociado_fesun_conyuge,
					"vinculacion_empresa" => $vinculacion_empresa,
					"fecha_ingreso" => $set_fecha_ingreso,
					"finca" => $finca,
					"municipio_laboral" => $municipio_laboral,
					"tipo_nomina" => $tipo_nomina,
					"tipo_contrato" => $tipo_contrato,
					"tiempo_servicio" => $tiempo_servicio,
					"sueldo_basico" => $sueldo_basico,
					"cargo" => $cargo,
					"fondo_pensiones" => $fondo_pensiones,
					"fondo_cesantias" => $fondo_cesantias,
					"observaciones_laboral" => $observaciones_laboral,
					"ingreso_bruto" => $ingreso_bruto,
					"otros_ingresos" => $otros_ingresos,
					"descripcion_ingresos" => $descripcion_ingresos,
					"total_ingresos" => $total_ingresos,
					"prestamos" => $prestamos,
					"gastos_familiares" => $gastos_familiares,
					"otros_gastos" => $otros_gastos,
					"total_egresos" => $total_egresos,
					"bancos" => $bancos,
					"corporaciones" => $corporaciones,
					"personales" => $personales,
					"total_obligaciones" => $total_obligaciones,
					"activos_propiedades" => $activos_propiedades,
					"pasivos_obligaciones" => $pasivos_obligaciones,
					"cuenta_bancaria" => $cuenta_bancaria,
					"entidad" => $entidad,
					"tipo_cuenta" => $tipo_cuenta,
					"operaciones_extranjeras" => $operaciones_extranjeras,
					"pais" => $pais,
					"moneda_extranjera" => $moneda_extranjera,
					"banco" => $banco,
					"cuenta" => $cuenta,
					"declara_renta" => $declara_renta,
					"marca" => $marca,
					"modelo" => $modelo,
					"placa" => $placa,
					"valor" => $valor,
					"pignoracion" => $pignoracion,
					"entidad_pignorado" => $entidad_pignorado,
					"tipo_bien" => $tipo_bien,
					"direccion" => $direccion,
					"departamento_bienes" => $departamento_bienes,
					"ciudad_bienes" => $ciudad_bienes,
					"valor_comercial" => $valor_comercial,
					"matricula_inmobilaria" => $matricula_inmobilaria,
					"hipoteca" => $hipoteca,
					"entidad_hipotecada" => $entidad_hipotecada,
					"otros_activos" => $otros_activos,
					"prf_nombres_apellidos" => $prf_nombres_apellidos,
					"prf_parentesco" => $prf_parentesco,
					"prf_telefono" => $prf_telefono,
					"prf_celular" => $prf_celular,
					"srf_nombres_apellidos" => $srf_nombres_apellidos,
					"srf_parentesco" => $srf_parentesco,
					"srf_telefono" => $srf_telefono,
					"srf_celular" => $srf_celular,
					"rc_nombres_apellidos" => $rc_nombres_apellidos,
					"rc_parentesco" => $rc_parentesco,
					"rc_telefono" => $rc_telefono,
					"rc_celular" => $rc_celular,
					"tipo_vinculacion" => $tipo_vinculacion,
					"fec_diligencia" => $set_fec_diligencia,
					"oficina" => $oficina,
					"fecha_afiliacion" => $set_fecha_afiliacion,
					"interes" => $interes,
					"lugar_entrevista" => $lugar_entrevista,
					"fecha_entrevista" => $set_fecha_entrevista,
					"hora" => $hora,
					"usuario_id" => $usuario_id,
					"observaciones_diligencia" => $observaciones_diligencia,
					"estado" => $estado,
					"user_aprueba" => $user_aprueba,
					"password" => $password
				);

				
			}
		}
		$this->Asociados_model->truncate();

		$this->Asociados_model->insertAsociados($data);
		//$this->Asociados_model->insertUsuarios($dataUsuario);

		$this->session->set_flashdata("success", "Los datos fueron cargados exitosamente");
		redirect(base_url()."backend/asociados");

	}

	public function view($id){
		$this->load->library('pdfgenerator');
        $asociado = $this->Asociados_model->getAsociado($id);
        
        $data = array(
            "asociado" => $asociado,
            "beneficiarios" => $this->Asociados_model->getBeneficiarios($id),
            "productos" => $this->Asociados_model->getProductos($id),
        );
        $html = $this->load->view('admin/asociados/prueba',$data, true);
        $filename = 'Asociado_'.$asociado->num_identificacion;
        $this->pdfgenerator->generate($html, $filename, true, 'A4', 'portrait');
	
	}

	public function delete($id){
		$finca = $this->Fincas_model->getFinca($id);
		$data = array(
			"estado" => "0"
		);

		$this->Fincas_model->update($id, $data);
		$this->backend_lib->savelog($this->modulo,"Eliminación de la Finca ".$finca->nombre);
		echo "configuraciones/fincas";
	}

	public function edit($id){
		$asociado = $this->Asociados_model->getAsociado($id);

		$municipiosexp = "";
		$municipiosraiz = "";
		$municipiosnac = "";
		if ($asociado->departamento!=null) {
			$municipiosexp = $this->Backend_model->getMunicipios($asociado->departamento);
			$municipiosraiz = $this->Backend_model->getMunicipios($asociado->departamento);
		}

		if ($asociado->dep_nacimiento) {
			$municipiosnac = $this->Backend_model->getMunicipios($asociado->dep_nacimiento);
		}
		
		$contenido_interno = array(
			'asociado' => $asociado,
			"tipoidentificaciones" => $this->Backend_model->getTiposIdentificaciones(),
			"departamentos" => $this->Backend_model->getDepartamentos(),
			"estadosciviles" => $this->Backend_model->getEstadosCiviles(),
			"nivelescolaridades" => $this->Backend_model->getNivelEscolaridad(),
			"viviendas" => $this->Backend_model->getViviendas(),
			"actividades" => $this->Backend_model->getActividades(),
			"fincas" => $this->Backend_model->getFincas(),
			"ahorros" => $this->Backend_model->getAhorros(),
			"vinculaciones" => $this->Backend_model->getVinculaciones(),

			"beneficiarios" => $this->Asociados_model->getBeneficiarios($id),

			"productos" => $this->Asociados_model->getProductos($id),

			"municipiosexp" => $municipiosexp,
			"municipiosnac" => $municipiosnac,
			"municipiosraiz" => $municipiosraiz
		);


		$contenido_externo = array(
			"contenido" => $this->load->view("admin/asociados/edit",$contenido_interno,TRUE)
		);
		$this->load->view('admin/template', $contenido_externo);
	}

	public function update(){
		$idAsociado = $this->input->post("idAsociado");
		$fecexpediccion = DateTime::createFromFormat('d/m/Y',$this->input->post("fec_expedicion"));
		$fecnac = DateTime::createFromFormat('d/m/Y',$this->input->post("fecha_nacimiento"));
		if (!empty($this->input->post("fecha_nacimiento_c"))) {
			$fecnac_c = DateTime::createFromFormat('d/m/Y',$this->input->post("fecha_nacimiento_c"))->format("Y-m-d");

		}else{
			$fecnac_c = '';
		}
		
		$fecdiligencia = DateTime::createFromFormat('d/m/Y',$this->input->post("fec_diligencia"));
		$fecafiliacion = DateTime::createFromFormat('d/m/Y',$this->input->post("fec_afiliacion"));
		$fecentrevista = DateTime::createFromFormat('d/m/Y',$this->input->post("fec_entrevista"));
		$fecingreso = DateTime::createFromFormat('d/m/Y',$this->input->post("fecha_ingreso"));
		$dataAsociado  = array(
			"primer_apellido" => $this->input->post("primer_apellido"),
			"segundo_apellido" => $this->input->post("segundo_apellido"),
			"nombres" => $this->input->post("nombres"),
			"tipo_identificacion" => $this->input->post("tipo_identificacion"),
			"num_identificacion" => $this->input->post("num_identificacion"),
			"departamento" => $this->input->post("departamento"),
			"municipio" => $this->input->post("municipio"),
			"genero" => $this->input->post("genero"),
			"estado_civil" => $this->input->post("estado_civil"),
			"fec_expedicion" => $fecexpediccion->format("Y-m-d"),
			"fecha_nacimiento" => $fecnac->format("Y-m-d"),
			"nivel_escolar" => $this->input->post("nivel_escolar"),
			"dep_nacimiento" => $this->input->post("dep_nacimiento"),
			"mun_nacimiento" => $this->input->post("mun_nacimiento"),
			"vivienda" => $this->input->post("vivienda"),
			"profesion" => $this->input->post("profesion"),
			"ocupacion" => $this->input->post("ocupacion"),
			"numero_hijos" => $this->input->post("numero_hijos"),
			"zona_ubicacion" => $this->input->post("zona_ubicacion"),
			"tiempo_residencia" => $this->input->post("tiempo_residencia"),
			"hijos_menores" => $this->input->post("hijos_menores"),
			"cabeza_hogar" => $this->input->post("cabeza_hogar"),
			"personas_dependientes" => $this->input->post("personas_dependientes"),
			"ciudad" => $this->input->post("ciudad"),
			"direccion_residencia" => $this->input->post("direcion_residencia"),
			"barrio" => $this->input->post("barrio"),
			"celular" => $this->input->post("celular"),
			"telefono" => $this->input->post("telefono"),
			"correo" => $this->input->post("correo"),
			"autorizo_envio" => $this->input->post("autorizo_envio"),
			"vinculado_fondo" => $this->input->post("vinculado_fondo"),
			"nombre_entidad" => $this->input->post("nombre_entidad"),
			"poblacion_vulnerable" => $this->input->post("poblacion_vulnerable"),
			"tipo_poblacion" => $this->input->post("tipo_poblacion"),
			"otra_poblacion" => $this->input->post("otra_poblacion"),
			"maneja_recursos" => $this->input->post("maneja_recursos"),
			"reconocimiento" => $this->input->post("reconocimiento"),
			"poder_publico" => $this->input->post("poder_publico"),
			"tiene_familiares" => $this->input->post("tiene_familiares"),
			"especificacion" => $this->input->post("especificacion"),
			"familiares_asociados" => $this->input->post("familiares_asociados"),

			"primer_apellido_conyuge" => $this->input->post("pa_conyugue"),
			"segundo_apellido_conyuge" => $this->input->post("segundo_apellido_c"),
			"nombres_conyuge" => $this->input->post("nombres_c"),
			"tipo_identificacion_conyuge" => $this->input->post("ti_conyugue"),
			"num_identificacion_conyuge" => $this->input->post("num_identificacion_c"),
			"fec_nacimiento_conyuge" => $fecnac_c,
			"actividad_laboral_conyuge" => $this->input->post("actividad_laboral"),
			"salario_conyuge" => $this->input->post("salario_c"),
			"jornada_laboral_conyuge" => $this->input->post("jornada_laboral"),
			"empresa_conyuge" => $this->input->post("empresa"),
			"cargo_conyuge" => $this->input->post("cargo_c"),
			"antiguedad_conyuge" => $this->input->post("antiguedad"),
			"telefono_conyuge" => $this->input->post("telefono_fijo"),
			"celular_conyuge" => $this->input->post("celular_c"),
			"nivel_escolar_conyuge" => $this->input->post("nivel_escolar_c"),
			"ocupacion_conyuge" => $this->input->post("ocupacion_c"),
			"asociado_fesun_conyuge" => $this->input->post("asociado_fesun_c"),

			"vinculacion_empresa" => $this->input->post("vinculacion_empresa"),
			"fecha_ingreso" => $fecingreso->format("Y-m-d"), 
			"finca" => $this->input->post("finca"),
			"municipio_laboral" => $this->input->post("municipio_laboral"),
			"tipo_nomina" => $this->input->post("tipo_nomina"),
			"tipo_contrato" => $this->input->post("tipo_contrato"),
			"tiempo_servicio" => $this->input->post("tiempo_servicio"),
			"sueldo_basico" => $this->input->post("sueldo_basico"),
			"cargo" => $this->input->post("cargo_laboral"),
			"fondo_pensiones" => $this->input->post("fondo_pensiones"),
			"fondo_cesantias" => $this->input->post("fondo_cesantias"),
			"observaciones_laboral" => $this->input->post("observaciones"),

			"ingreso_bruto" => $this->input->post("ingreso_bruto"),
			"otros_ingresos" => $this->input->post("otros_ingresos"),
			"descripcion_ingresos" => $this->input->post("descripcion_ingresos"),
			"total_ingresos" => $this->input->post("total_ingresos"),
			"prestamos" => $this->input->post("prestamos"),
			"gastos_familiares" => $this->input->post("gastos_familiares"),
			"otros_gastos" => $this->input->post("otros_gastos"),
			"total_egresos" => $this->input->post("total_egresos"),
			"bancos" => $this->input->post("bancos"),
			"corporaciones" => $this->input->post("corporaciones"),
			"personales" => $this->input->post("personales"),
			"total_obligaciones" => $this->input->post("total_obligaciones"),
			"activos_propiedades" => $this->input->post("activos_propiedades"),
			"pasivos_obligaciones" => $this->input->post("pasivos_obligaciones"),
			"cuenta_bancaria" => $this->input->post("cuenta_bancaria"),
			"entidad" => $this->input->post("entidad"),
			"tipo_cuenta" => $this->input->post("tipo_cuenta"),
			"operaciones_extranjeras" => $this->input->post("operacion_extranjera"),
			"pais" => $this->input->post("pais"),
			"moneda_extranjera" => $this->input->post("moneda_extranjera"),
			"banco" => $this->input->post("banco"),
			"cuenta" => $this->input->post("cuenta"),
			"declara_renta" => $this->input->post("declara_renta"),

			"marca" => $this->input->post("marca"),
			"modelo" => $this->input->post("modelo"),
			"placa" => $this->input->post("placa"),
			"valor" => $this->input->post("valor"),
			"pignoracion" => $this->input->post("pignoracion"),
			"entidad_pignorado" => $this->input->post("entidad_pignorado"),
			"tipo_bien" => $this->input->post("tipo_bien"),
			"direccion" => $this->input->post("direccion"),
			"departamento_bienes" => $this->input->post("dep_raices"),
			"ciudad_bienes" => $this->input->post("ciudad_raices"),
			"valor_comercial" => $this->input->post("valor_comercial"),
			"matricula_inmobilaria" => $this->input->post("matricula_inmobilaria"),
			"hipoteca" => $this->input->post("hipoteca"),
			"entidad_hipotecada" => $this->input->post("entidad_hipotecada"),
			"otros_activos" => $this->input->post("otros_activos"),

			"prf_nombres_apellidos" => $this->input->post("prf_nombres_apellidos"),
			"prf_parentesco" => $this->input->post("prf_parentesco"),
			"prf_telefono" => $this->input->post("prf_telefono"),
			"prf_celular" => $this->input->post("prf_celular"),

			"srf_nombres_apellidos" => $this->input->post("srf_nombres_apellidos"), 
			"srf_parentesco" => $this->input->post("srf_parentesco"),
			"srf_telefono" => $this->input->post("srf_telefono"),
			"srf_celular" => $this->input->post("srf_celular"),

			"rc_nombres_apellidos" => $this->input->post("rc_nombres_apellidos"),
			"rc_parentesco" => $this->input->post("rc_parentesco"),
			"rc_telefono" => $this->input->post("rc_telefono"),
			"rc_celular" => $this->input->post("rc_celular"),

			"tipo_vinculacion" => $this->input->post("tipo_vinculacion"),
			"fec_diligencia" => $fecdiligencia->format("Y-m-d"),
			"oficina" => $this->input->post("oficina"),
			"fecha_afiliacion" => $fecafiliacion->format("Y-m-d"),
			"interes" => $this->input->post("interes"),
			"lugar_entrevista" => $this->input->post("lugar_entrevista"),
			"fecha_entrevista" => $fecentrevista->format("Y-m-d"),
			"hora" => $this->input->post("hora"),
			"observaciones_diligencia" => $this->input->post("obs_diligencia"),
			
		);

		$nombres = $this->input->post("nombres_b");
		$fechas = $this->input->post("fechas_b");
		$identificaciones = $this->input->post("identificaciones_b");
		$parentesco = $this->input->post("parentescos_b");
		$telefono = $this->input->post("telefonos_b");

		$ahorros = $this->input->post("ahorros");

		if ($this->Asociados_model->update($idAsociado,$dataAsociado)) {
			$this->Asociados_model->deleteBeneficiarios($idAsociado);
			$this->Asociados_model->deleteAhorros($idAsociado);

			if (!empty($nombres)) {
				for ($i=0; $i < count($nombres); $i++) { 
					if (!empty($fechas[$i])) {
						$fecha = DateTime::createFromFormat('d/m/Y',$fechas[$i]);
						$dataBeneficiario = array(
							"nombres" => $nombres[$i],
							"fec_nacimiento" => $fecha->format("Y-m-d"),
							"num_identificacion" => $identificaciones[$i],
							"parentesco" => $parentesco[$i],
							"telefono" => $telefono[$i],
							"asociado_id" => $idAsociado
						);
						$this->Asociados_model->saveBeneficiarios($dataBeneficiario);
					}	
				}
				
			}
			
			if (!empty($ahorros)) {
				for ($i=0; $i < count($ahorros); $i++) { 
					$dataAhorro = array(
						"ahorro_id" => $ahorros[$i],
						"asociado_id" => $idAsociado
					);
					$this->Asociados_model->saveProductos($dataAhorro);
				}
				
			}
			$this->session->set_flashdata("success", "Los datos fueron guardados exitosamente");
			//echo "1";
			redirect(base_url()."backend/asociados");
		}
		else{
			$this->session->set_flashdata("error", "Los datos no fueron guardados");
				//echo "1";
			redirect(base_url()."backend/asociados/add");
		}
	}

	public function getMunicipios(){
		$depa = $this->input->post("id");
		$municipios = $this->Backend_model->getMunicipios($depa);
		echo json_encode($municipios);
	}


	public function changeEstadoSolicitud(){
		$estado = $this->input->post("estado");
		$idasociado = $this->input->post("idasociado");
		$data = array(
			"estado" => $estado,
			"user_aprueba" => $this->session->userdata("id")
		);

		if ($this->Asociados_model->update($idasociado,$data)) {
			echo "1";
		}else{
			echo "0";
		}
	}

	public function exportar(){
		
    
		$this->load->library('excel');
		$this->excel->setActiveSheetIndex(0);
	    

	    $num_fields = $this->Asociados_model->getNumFields();
	    $style['red_text'] = array(
		    'font' => array(
		        'name' => 'Arial',
		        'bold' => true
		    ),
		);

		$fields = ["id", "primer_apellido", "segundo_apellido", "nombres", "tipo_identificacion", "num_identificacion", "departamento", "municipio", "genero", "estado_civil", "fec_expedicion", "fecha_nacimiento", "nivel_escolar", "dep_nacimiento", "mun_nacimiento", "vivienda", "profesion", "ocupacion", "numero_hijos", "zona_ubicacion", "tiempo_residencia", "hijos_menores", "cabeza_hogar", "personas_dependientes", "ciudad", "direccion_residencia", "barrio", "celular", "telefono", "correo", "autorizo_envio", "vinculado_fondo", "nombre_entidad", "poblacion_vulnerable", "tipo_poblacion", "otra_poblacion", "maneja_recursos", "reconocimiento", "poder_publico", "tiene_familiares", "especificacion", "familiares_asociados", "primer_apellido_conyuge", "segundo_apellido_conyuge", "nombres_conyuge", "tipo_identificacion_conyuge", "num_identificacion_conyuge", "fec_nacimiento_conyuge", "actividad_laboral_conyuge", "salario_conyuge", "jornada_laboral_conyuge", "empresa_conyuge", "cargo_conyuge", "antiguedad_conyuge", "telefono_conyuge", "celular_conyuge", "nivel_escolar_conyuge", "ocupacion_conyuge", "asociado_fesun_conyuge", "vinculacion_empresa", "fecha_ingreso", "finca", "municipio_laboral", "tipo_nomina", "tipo_contrato", "tiempo_servicio", "sueldo_basico", "cargo", "fondo_pensiones", "fondo_cesantias", "observaciones_laboral", "ingreso_bruto", "otros_ingresos", "descripcion_ingresos", "total_ingresos", "prestamos", "gastos_familiares", "otros_gastos", "total_egresos", "bancos", "corporaciones", "personales", "total_obligaciones", "activos_propiedades", "pasivos_obligaciones", "cuenta_bancaria", "entidad", "tipo_cuenta", "operaciones_extranjeras", "pais", "moneda_extranjera", "banco", "cuenta", "declara_renta", "marca", "modelo", "placa", "valor", "pignoracion", "entidad_pignorado", "tipo_bien", "direccion", "departamento_bienes", "ciudad_bienes", "valor_comercial", "matricula_inmobilaria", "hipoteca", "entidad_hipotecada", "otros_activos", "prf_nombres_apellidos", "prf_parentesco", "prf_telefono", "prf_celular", "srf_nombres_apellidos", "srf_parentesco", "srf_telefono", "srf_celular", "rc_nombres_apellidos", "rc_parentesco", "rc_telefono", "rc_celular", "tipo_vinculacion", "fec_diligencia", "oficina", "fecha_afiliacion", "interes", "lugar_entrevista", "fecha_entrevista", "hora", "usuario_id", "observaciones_diligencia", "estado", "user_aprueba"];

	    for ($i=0; $i < ($num_fields - 2); $i++) { 
	    	//$this->excel->getColumnDimensionByColumn($i)->setAutoSize(true);
	    	$this->excel->getActiveSheet()->getColumnDimensionByColumn($i)->setAutoSize(true);
	    	$this->excel->getActiveSheet()
    					->getStyleByColumnAndRow($i, 1)
    					->applyFromArray($style['red_text']);
			$this->excel->getActiveSheet()->setCellValueByColumnAndRow($i, 1, $fields[$i]);
	    }

	    $num_rows = $this->Asociados_model->getNumRows();
	    $asociados = $this->Asociados_model->totalAsociados($num_rows);
	    $row = 2;
	    
	    foreach ($asociados as $asociado) {
	    	for ($i=0; $i < ($num_fields-2); $i++) { 
	    		if ($fields[$i]== "finca") {
	    			$finca = "";
	    			$infoFinca = $this->Fincas_model->getFinca($asociado[$fields[$i]]);
	    			if ($infoFinca) {
	    				$finca = $infoFinca->nombre;
	    			}
	    			$this->excel->getActiveSheet()->setCellValueByColumnAndRow($i, $row, $finca);
	    			continue;
	    		}
	    		if ($fields[$i]== "usuario_id") {
	    			$usuario_registra = "";
	    			$infoUsuarioRegistra = $this->Usuarios_model->getUsuario($asociado[$fields[$i]]);
	    			if ($infoUsuarioRegistra) {
	    				$usuario_registra = $infoUsuarioRegistra->email;
	    			}
	    			$this->excel->getActiveSheet()->setCellValueByColumnAndRow($i, $row, $usuario_registra);
	    			continue;
	    		}
	    		if ($fields[$i]== "user_aprueba") {
	    			$usuario_aprueba = "";
	    			$infoUsuarioAprueba = $this->Usuarios_model->getUsuario($asociado[$fields[$i]]);
	    			if ($infoUsuarioAprueba) {
	    				$usuario_aprueba = $infoUsuarioAprueba->email;
	    			}
	    			$this->excel->getActiveSheet()->setCellValueByColumnAndRow($i, $row, $usuario_aprueba);
	    			continue;
	    		}

	    		if ($fields[$i]== "fecha_ingreso") {
	    			if ($asociado[$fields[$i]] == "0000-00-00") {
	    				$fecha_ingreso_format = "";
	    			}else{
	    				$fecha_ingreso_format = date("d/m/Y", strtotime( $asociado[$fields[$i]]));
	    			}
	    			$this->excel->getActiveSheet()->setCellValueByColumnAndRow($i, $row, $fecha_ingreso_format);
	    			continue;
	    		}
	    		if ($fields[$i]== "fec_expedicion") {
	    			if ($asociado[$fields[$i]] == "0000-00-00") {
	    				$fec_expedicion_format = "";
	    			}else{
	    				$fec_expedicion_format = date("d/m/Y", strtotime( $asociado[$fields[$i]]));
	    			}
	    			$this->excel->getActiveSheet()->setCellValueByColumnAndRow($i, $row, $fec_expedicion_format);
	    			continue;
	    		}
	    		if ($fields[$i]== "fecha_nacimiento") {
	    			if ($asociado[$fields[$i]] == "0000-00-00") {
	    				$fecha_nacimiento_format = "";
	    			}else{
	    				$fecha_nacimiento_format = date("d/m/Y", strtotime( $asociado[$fields[$i]]));
	    			}
	    			$this->excel->getActiveSheet()->setCellValueByColumnAndRow($i, $row, $fecha_nacimiento_format);
	    			continue;
	    		}
	    		if ($fields[$i]== "fec_nacimiento_conyuge") {
	    			if ($asociado[$fields[$i]] == "0000-00-00") {
	    				$fec_nacimiento_conyuge_format = "";
	    			}else{
	    				$fec_nacimiento_conyuge_format = date("d/m/Y", strtotime( $asociado[$fields[$i]]));
	    			}
	    			$this->excel->getActiveSheet()->setCellValueByColumnAndRow($i, $row, $fec_nacimiento_conyuge_format);
	    			continue;
	    		}
	    		
	    		if ($fields[$i]== "fec_diligencia") {
	    			if ($asociado[$fields[$i]] == "0000-00-00") {
	    				$fec_diligencia_format = "";
	    			}else{
	    				$fec_diligencia_format = date("d/m/Y", strtotime( $asociado[$fields[$i]]));
	    			}
	    			$this->excel->getActiveSheet()->setCellValueByColumnAndRow($i, $row, $fec_diligencia_format);
	    			continue;
	    		}
	    		if ($fields[$i]== "fecha_afiliacion") {
	    			if ($asociado[$fields[$i]] == "0000-00-00") {
	    				$fecha_afiliacion_format = "";
	    			}else{
	    				$fecha_afiliacion_format = date("d/m/Y", strtotime( $asociado[$fields[$i]]));
	    			}
	    			$this->excel->getActiveSheet()->setCellValueByColumnAndRow($i, $row, $fecha_afiliacion_format);
	    			continue;
	    		}
	    		if ($fields[$i]== "fecha_entrevista") {
	    			if ($asociado[$fields[$i]] == "0000-00-00") {
	    				$fecha_entrevista_format = "";
	    			}else{
	    				$fecha_entrevista_format = date("d/m/Y", strtotime( $asociado[$fields[$i]]));
	    			}
	    			$this->excel->getActiveSheet()->setCellValueByColumnAndRow($i, $row, $fecha_entrevista_format);
	    			continue;
	    		}

	    		$this->excel->getActiveSheet()->setCellValueByColumnAndRow($i, $row, $asociado[$fields[$i]]);

	    		
	    		
	    	}
	    	 //change if required.

	    	$row++;

	    }



		//Le ponemos un nombre al archivo que se va a generar.
	        $archivo = "Listado_de_asociados_".date("dmYHis").".xlsx";
	        header('Content-Type: application/vnd.ms-excel');
	        header('Content-Disposition: attachment;filename="'.$archivo.'"');
	        header('Cache-Control: max-age=0');
	        header("Expires: 0");
	        
	        $objWriter = new PHPExcel_Writer_Excel2007($this->excel); 
	        //Hacemos una salida al navegador con el archivo Excel.
	        ob_end_clean();
	        $objWriter->save('php://output');
	}

	public function infoAsociado(){
		$id = $this->input->post("idAsociado");
		$nombres = $this->input->post("nombres");
		$correo = $this->input->post("correo");
		$genero = $this->input->post("genero");

		$data = array(
			"nombres" => $nombres,
			"correo" => $correo,
			"genero" => $genero,
		);

		if ($this->Asociados_model->update($id, $data)) {
			$this->session->set_flashdata("success", "El cambio de informacion del usuario fue éxitoso");
			$this->session->set_userdata("nombres",$nombres);
			redirect(base_url()."usuario/perfil");
		}
	}

	public function changePassword(){
		$id = $this->input->post("idAsociado");
		$password = $this->input->post("newpass");
		$data = array(
			"password" => sha1($password),
		);

		if ($this->Asociados_model->update($id, $data)) {
			$this->session->set_flashdata("success", "El cambio de contraseña fue éxitoso");
			redirect(base_url()."usuario/perfil");
		}
	}

	public function changeImagen(){
		$id = $this->input->post("idAsociado");

		$config['upload_path']   = './assets/images/usuarios/';
        $config['allowed_types'] = 'gif|jpg|png';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file'))
        {
            $error = array(
            	'error' => $this->upload->display_errors(),
            	'status' => 0
            );
			echo json_encode($error);
        }
        else
        {
            $data = array(
            	'upload_data' => $this->upload->data()
            );

            $datos = array(
            	"imagen" => $data["upload_data"]["file_name"],
            );

            if ($this->Asociados_model->update($id, $datos)) {

            	$success = array(
            		"status" =>1
              	);
				echo json_encode($success);
			}


        }
	}

	public function changeFirma(){
		$id = $this->input->post("idAsociado");

		$config['upload_path']   = './assets/images/firmas/';
        $config['allowed_types'] = 'gif|jpg|png';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file'))
        {
            $error = array(
            	'error' => $this->upload->display_errors(),
            	'status' => 0
            );
			echo json_encode($error);
        }
        else
        {
            $data = array(
            	'upload_data' => $this->upload->data()
            );

            $datos = array(
            	"firma" => $data["upload_data"]["file_name"],
            );

            if ($this->Asociados_model->update($id, $datos)) {

            	$success = array(
            		"status" =>1
              	);
				echo json_encode($success);
			}


        }
	}

	
}