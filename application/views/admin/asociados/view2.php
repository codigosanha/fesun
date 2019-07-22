
<?php 
	$meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Setiembre','Octubre','Noviembre','Diciembre'];
	$date = new DateTime($asociado->fec_diligencia);
?>
<!-- Main content -->
<section class="content" style="font-size: 10px;">
	<div class="box box-solid">
		<div class="box-body">
			<div class="row" id="print">
				<div class="col-md-12">
					<table width="100%" border="1" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td class="text-center" style="font-size: 8px;">
									 
									FONDO DE EMPLEADOS SUNSHINE BOUQUET <br>
									NIT. 830.093.546-9
								</td>
								<td class="text-center titulos">
									SOLICITUD DE VINCULACION Y/O ACTUALIZACION DE DATOS <br>
									FONDO DE EMPLEADOS SUNSHINE BOUQUET "FESUN" <br>
									Persona Natural
								</td>
								<td style="text-align:center;vertical-align: middle; ">Version 1</td>
							</tr>
							<tr>
								<td colspan="3" class="text-center">Diligencie todos los espacios del formulario a mano y en tinta negra los campos que no aplica favor escribir N/A</td>
							</tr>
							<tr>
								<td>
									<b>Tipo de Diligenciamiento:</b>
									<?php echo $asociado->vinculacion ?>
								</td>
								<td>
									<b>Fecha de Diligenciamiento:</b>
									<?php echo $asociado->fec_diligencia ?>
								</td>
								<td>
									<b>Oficina:</b>
									<?php echo $asociado->oficina ?>
								</td>
							</tr>
						</tbody>
					</table>

					<table width="100%" border="1" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td class="text-center titulos" colspan="5">1. INFORMACION PERSONAL</td>
							</tr>
							<tr>
								<td>
									<b>Primer Apellido:</b> 
									<?php echo $asociado->primer_apellido;?>
								</td>
								<td>
									<b>Segundo Apellido:</b> 
									<?php echo $asociado->segundo_apellido;?>
								</td>
								<td colspan="3">
									<b>Nombres:</b> 
									<?php echo $asociado->nombres;?>
								</td>
							</tr>
							<tr>
								<td>
									<b>Tipo de Identificación:</b> 
									<?php echo get_tipo_identificacion($asociado->tipo_identificacion)->tipoidentificacion;?>
								</td>
								<td>
									<b>Número de Identificación:</b> 
									<?php echo $asociado->num_identificacion;?>
								</td>
								<td>
									<b>Lugar de Expedición:</b> 
									<?php echo get_departamento($asociado->departamento)->departamento." - ".get_municipio($asociado->municipio)->municipio;?>
								</td>
								<td colspan="2">
									<b>Fecha de Expedición:</b> 
									<?php echo $asociado->fec_expedicion;?>
								</td>
							</tr>
							<tr>
								<td>
									<b>Genero:</b> 
									<?php echo $asociado->genero == "M"?"Masculino":"Femenino";?>
								</td>
								<td>
									<b>Estado Civil:</b> 
									<?php echo $asociado->nombre;?>
								</td>
								<td>
									<b>Lugar de Nacimiento:</b> 
									<?php echo get_departamento($asociado->dep_nacimiento)->departamento." - ".get_municipio($asociado->mun_nacimiento)->municipio;?>
								</td>
								<td colspan="2">
									<b>Fecha de Nacimiento:</b> 
									<?php echo $asociado->fecha_nacimiento;?>
								</td>
							</tr>
							<tr>
								<td>
									<b>Nivel Escolaridad</b> 
									<?php echo get_nivel_escolaridad($asociado->nivel_escolar)->nivel;?>
								</td>
								<td>
									<b>Profesión</b> 
									<?php echo $asociado->profesion;?>
								</td>
								<td colspan="3">
									<b>Ocupación</b> 
									<?php echo $asociado->ocupacion;?>
								</td>
							</tr>
							<tr>
								<td>
									<b>Vivienda:</b> 
									<?php echo get_vivienda($asociado->vivienda)->vivienda;?>
								</td>
								<td>
									<b>Zona de Ubicación</b> 
									<?php echo $asociado->zona_ubicacion == "1"?"Urbana":"Rural";?>
								</td>
								<td>
									<b>Tiempo de Residencia en la zona de ubicación</b> 
									<?php echo $asociado->tiempo_residencia;?>
								</td>
								<td>
									<b>Numero de Hijos:</b> 
									<?php echo $asociado->numero_hijos;?>
								</td>
								<td>
									<b>Cabeza de Hogar:</b> 
									<?php echo $asociado->cabeza_hogar=="1"?"SI":"NO";?>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<b>Personas que dependan economicamente (No incluir conyuge si trabaja)</b> 
									<?php echo $asociado->personas_dependientes;?>
								</td>
								<td colspan="3">
									<b>Hijos Menores de 25 Años Solteros sin Hijos o con discapacidad</b> 
									<?php echo $asociado->hijos_menores;?>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<b>Dirección Residencia</b> 
									<?php echo $asociado->direccion_residencia;?>
								</td>
								<td>
									<b>Barrio/Vereda:</b> 
									<?php echo $asociado->barrio;?>
								</td>
								<td>
									<b>Ciudad:</b> 
									<?php echo $asociado->ciudad;?>
								</td>
								<td>
									<b>Telefono:</b> 
									<?php echo $asociado->telefono;?>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<b>Correo Electrónico</b> 
									<?php echo $asociado->correo;?>
								</td>
								<td>
									<b>Telefono Celular</b> 
									<?php echo $asociado->celular;?>
								</td>
								<td colspan="2">
									<b>Como asociado Autorizo el envio de informacion por correo electronico:</b> 
									<?php echo $asociado->autorizo_envio=="1"?"SI":"NO";?>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<b>En la actualidad esta vinculado a otro Fondo de Empleados y/o Coorperativa</b> 
									<?php echo $asociado->vinculado_fondo=="1"?"SI":"NO";?>
								</td>
								<td>
									<b>Población Vulnerable</b> 
									<?php echo $asociado->poblacion_vulnerable=="1"?"SI":"NO";?>
								</td>
								<td colspan="2">
									<b>Tipo  de Población</b> 
									<?php 
										if ($asociado->tipo_poblacion =="1") {
											echo "Poblacion Etnica";
										} else if($asociado->tipo_poblacion =="2"){
											echo "Poblacion afectada por la violencia";
										}else{
											echo "Otra";
										}
									?>
								</td>

							</tr>
							<tr>
								<td colspan="5">
									<p class="text-center" style="margin-bottom: 0px;">
										<strong>
										Usted desempeña en la actualidad o ha desempeñado en los ultimos venticuatro(24) meses cargos o actividades en los cuales:
										</strong>
									</p>
									<div class="form-group">

										<div class="col-xs-9">
											Maneja recursos públicos o tiene poder de desposición sobre estos?
											Tiene o goza de reconocimiento público?<br>
											Tiene grado de poder público o desempeña una funcion pública prominente o destacada en el estado?<br>
											Tiene familiares hasta el segundo grado de consanguinidad y afinidad que encajen en los escenarios descritos previamente?<br>
											Si alguna de las preguntas anteriores es afirmativa por favor especifique: <br>
										</div>
										<div class="col-xs-3">
											<?php echo $asociado->maneja_recursos=="1"?"SI":"NO";?> <br>
											<?php echo $asociado->reconocimiento=="1"?"SI":"NO";?> <br>
											<?php echo $asociado->poder_publico=="1"?"SI":"NO";?> <br>
											<?php echo $asociado->tiene_familiares=="1"?"SI":"NO";?> 
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td colspan="5">
									Tiene familiares hasta segundo grado de afinidad y consanguinidad asociados a FESUN?
									<span style="margin-left: 50px;"><?php echo $asociado->familiares_asociados=="1"?"SI":"NO";?></span>
									<?php if (!empty($familiares)): ?>
										<?php foreach ($familiares as $f): ?>
										<div class="form-group">
										<div class="col-xs-6">
											<strong>Nombre:</strong>
											<?php echo $f->nombres?>
										</div>
										<div class="col-xs-6">
											<strong>Parentesco</strong>
											<?php echo $f->parentesco?>
										</div>
									</div>
									<?php endforeach ?>
									<?php endif ?>
									
									

								</td>
							</tr>
						</tbody>
					</table>
					<table width="100%" border="1" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td colspan="4" class="text-center titulos">2.INFORMACION DEL CONYUGE</td>
							</tr>
							<tr>
								<td>
									<b>Primer Apellido:</b> <br>
									<?php echo $asociado->primer_apellido_conyuge;?>
								</td>
								<td>
									<b>Segundo Apellido:</b> <br>
									<?php echo $asociado->segundo_apellido_conyuge;?>
								</td>
								<td colspan="2">
									<b>Nombres</b> <br>
									<?php echo $asociado->nombres_conyuge;?>
								</td>
							</tr>
							<tr>
								<td>
									<b>Tipo de Identificacion:</b> <br>
									<?php

									 echo !empty($asociado->tipo_identificacion_conyuge) ? get_tipo_identificacion($asociado->tipo_identificacion_conyuge) :'' ; 
									?>
								</td>
								<td>
									<b>Número de Identificación:</b> <br>
									<?php 
										if ($asociado->num_identificacion_conyuge !=0) {
											echo $asociado->num_identificacion_conyuge;
										}
									?>
								</td>
								<td>
									<b>Fecha de Nacimiento:</b> <br>
									<?php

										if ($asociado->fec_nacimiento_conyuge !=0) {
											echo $asociado->fec_nacimiento_conyuge;
										}

									?>
								</td>
								<td>
									<b>Actividad Laboral:</b> <br>
									<?php if ($asociado->actividad_laboral_conyuge !=0) {
											echo $asociado->actividad_laboral_conyuge;
										}
									?>
								</td>
							</tr>
							<tr>
								<td>
									<b>Salario $:</b> <br>
									<?php echo $asociado->salario_conyuge;?>
								</td>
								<td>
									<b>Jornada Laboral:</b> <br>
									<?php 
										if ($asociado->jornada_laboral_conyuge == 1) {
											echo "Tiempo Total";
										}

										if($asociado->jornada_laboral_conyuge==2){
											echo "Tiempo Parcial";
										}
									?>
								</td>
								<td colspan="2">
									<b>Empresa donde trabaja:</b> <br>
									<?php echo $asociado->empresa_conyuge;?>
								</td>
							</tr>
							<tr>
								<td>
									<b>Cargo:</b> <br>
									<?php echo $asociado->cargo_conyuge;?>
								</td>
								<td>
									<b>Antiguedad:</b> <br>
									<?php echo $asociado->antiguedad_conyuge;?>
								</td>
								<td>
									<b>Telefono fijo:</b> <br>
									<?php 
										if ($asociado->telefono_conyuge !=0) {
											echo $asociado->telefono_conyuge;
										}
									?>
								</td>
								<td>
									<b>Celular:</b> <br>
									<?php 
										if ($asociado->celular_conyuge !=0) {
											echo $asociado->celular_conyuge;
										}
									;?>
								</td>
							</tr>
							<tr>
								<td>
									<b>Nivel de Escolaridad:</b> <br>
									<?php echo $asociado->nivel_escolar_conyuge!=0 ? get_nivel_escolaridad($asociado->nivel_escolar_conyuge)->nivel :'' ;?>
								</td>
								<td>
									<b>Ocupación:</b> <br>
									<?php echo $asociado->ocupacion_conyuge;?>
								</td>
								<td colspan="2">
									<b>Asociado a FESUN?:</b> <br>
									<?php 
										if (!empty($asociado->asociado_fesun_conyuge)) {
											echo $asociado->asociado_fesun_conyuge=="1"?"SI":"NO";
										}
									?>
								</td>
							</tr>
						</tbody>
					</table>
					<table width="100%" border="1" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td class="titulos text-center" colspan="5">
									3.BENEFICIARIOS <br>
									En primer grado de consanguinidad:Padres, Esposo(a) o compañero(a) permanente e hijos
								</td>
							</tr>
							<tr>
								<th>Nombres y Apellidos completos</th>
								<th>Fecha de Nacimiemto</th>
								<th>Nro de Identificación</th>
								<th>Parentesco</th>
								<th>Telefono/Celular</th>
							</tr>
							<?php if (!empty($beneficiarios)): ?>
								<?php foreach ($beneficiarios as $b): ?>
									<tr>
										<td><?php echo $b->nombres ?></td>
										<td><?php echo $b->fec_nacimiento ?></td>
										<td><?php echo $b->num_identificacion ?></td>
										<td><?php echo $b->parentesco ?></td>
										<td><?php echo $b->telefono ?></td>
									</tr>
								<?php endforeach ?>
							<?php endif ?>
							
						</tbody>
					</table>
					<table width="100%" border="1" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td colspan="4" class="text-center titulos">4.INFORMACION LABORAL</td>
							</tr>
							<tr>
								<td>
									<b>Viinculación a la empresa: </b> 
									<?php echo $asociado->vinculacion_empresa;?>
								</td>
								<td>
									<b>Fecha de Ingreso: </b> 
									<?php echo $asociado->fecha_ingreso;?>
								</td>
								<td>
									<b>Finca: </b> 
									<?php echo $asociado->nombre;?>
								</td>
								<td>
									<b>Municipio: </b> 
									<?php echo $asociado->municipio_laboral;?>
								</td>
							</tr>
							<tr>
								<td>
									<b>Tipo de Nomina: </b> 
									<?php echo $asociado->tipo_nomina=="1"?"Mensual":"Quincenal";?>
								</td>
								<td>
									<b>Tipo de Contrato: </b> 
									<?php echo $asociado->tipo_contrato=="1"?"T Fijo":"T Indefinido";?>
								</td>
								<td>
									<b>Tiempo de Servicio: </b> 
									<?php echo $asociado->tiempo_servicio;?>
								</td>
								<td>
									<b>Sueldo Basico:</b> 
									<?php echo $asociado->sueldo_basico;?>
								</td>
							</tr>
							<tr>
								<td>
									<b>Cargo:</b> 
									<?php echo $asociado->cargo;?>
								</td>
								<td>
									<b>Fondo de Pensiones: </b> 
									<?php echo $asociado->fondo_pensiones;?>
								</td>
								<td colspan="2">
									<b>Fondo de Cesantias:</b> 
									<?php echo $asociado->fondo_cesantias;?>
								</td>
							</tr>
							<tr>
								<td colspan="4">
									<b>Observaciones:</b> 
									<?php echo $asociado->observaciones_laboral;?>
								</td>
							</tr>
						</tbody>
					</table>
					<table width="100%" border="1" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td colspan="4" class="text-center titulos">5.INFORMACION FINANCIERA</td>
							</tr>
							<tr>
								<th class="text-center" style="background: #f5f5f5;">Ingresos Mensuales</th>
								<th class="text-center" style="background: #f5f5f5;">Egresos Mensuales</th>
								<th class="text-center" style="background: #f5f5f5;">Obligaciones Mensuales</th>
								<th class="text-center" style="background: #f5f5f5;">Balance General</th>
							</tr>
							<tr>
								<td>
									<b>Sueldo / Ingresos Brutos: </b> 
									<?php echo $asociado->ingreso_bruto;?>
								</td>
								<td>
									<b>Prestamos/Hipotecas/Arriendos: </b>
									<?php echo $asociado->prestamos;?>
								</td>
								<td>
									<b>Bancos: </b>
									<?php echo $asociado->bancos;?>
								</td>
								<td rowspan="2">
									<b>Activos: Valor de las propiedades: </b>
									<?php echo $asociado->activos_propiedades;?>
								</td>
							</tr>
							<tr>
								<td>
									<b>Otros Ingresos: </b>
									<?php echo $asociado->otros_ingresos;?>
								</td>
								<td>
									<b>Gastos Familiares: </b>
									<?php echo $asociado->gastos_familiares;?>
								</td>
								<td>
									<b>Corporaciones: </b>
									<?php echo $asociado->corporaciones;?>
								</td>
							</tr>
							<tr>
								<td>
									<b>Descripcion Otros Ingresos: </b>
									<?php echo $asociado->otros_ingresos;?>
								</td>
								<td>
									<b>Otros Gastos: </b>
									<?php echo $asociado->otros_gastos;?>
								</td>
								<td>
									<b>Personales: </b>
									<?php echo $asociado->personales;?>
								</td>
								<td rowspan="2">
									<b>Pasivo: Saldo de las Obligaciones que tengo: </b>
									<?php echo $asociado->pasivos_obligaciones;?>
								</td>
							</tr>
							<tr>
								<td>
									<b>Total Ingresos:</b>
									<?php echo $asociado->total_ingresos;?>
								</td>
								<td>
									<b>Total Egresos: </b>
									<?php echo $asociado->total_egresos;?>
								</td>
								<td>
									<b>Total Obligaciones: </b>
									<?php echo $asociado->total_obligaciones;?>
								</td>
							</tr>
							<tr>
								<td>
									<b>Tiene cuenta bancaria? </b>
									<?php echo $asociado->cuenta_bancaria == 1 ? "SI":"NO";?>
								</td>
								<td colspan="2">
									<b>Entidad: </b>
									<?php echo $asociado->entidad;?>
								</td>
								<td>
									<b>Tipo de Cuenta: </b>
									<?php echo $asociado->tipo_cuenta == 1 ? "SI":"NO";?>
								</td>
							</tr>
							<tr>
								<td>
									<b>Realiza Operaciones con Moneda Estranjera? </b>
									<?php echo $asociado->operaciones_extranjeras == 1 ? "SI":"NO";?>
								</td>
								<td colspan="2">
									<b>Posee cuenta con moneda extranjera? </b>
									<?php echo $asociado->moneda_extranjera == 1 ? "SI":"NO";?>
								</td>
								<td>
									<b>Declara Renta? </b>
									<?php echo $asociado->declara_renta == 1 ? "SI":"NO";?>
								</td>
							</tr>
						</tbody>
					</table>
					<table width="100%" border="1" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td colspan="6" class="text-center titulos">6.Descripcion de los activos</td>
							</tr>
							<tr>
								<td>
									<b>VEHICULO</b>
								</td>
								<td>
									<b>Marca:</b>
									<?php echo $asociado->marca;?>
								</td>
								<td>
									<b>Modelo:</b>
									<?php echo $asociado->modelo;?>
								</td>
								<td>
									<b>Placa:</b>
									<?php echo $asociado->placa;?>
								</td>
								<td>
									<b>Valor:</b>
									<?php echo $asociado->valor;?>
								</td>
								<td>
									<b>Pignoración</b>
									<?php echo $asociado->pignoracion == 1 ? "SI":"NO";?>
								</td>
							</tr>
							<tr>
								<td colspan="6">
								<b>Entidad a la cual se encuentra pignorado:</b> <?php echo $asociado->entidad_pignorado;?>
								</td>
							</tr>
							<tr>
								<td>
									<b>BIENES RAICES</b>
								</td>
								<td>
									<b>Tipo de bien: </b>
									<?php echo $asociado->tipo_bien;?>
								</td>
								<td colspan="2">
									<b>Dirección: </b>
									<?php echo $asociado->direccion;?>
								</td>
								<td colspan="2">
									<b>Ciudad/Departamento: </b>
									<?php
										if ($asociado->ciudad_bienes!=0 && $asociado->departamento_bienes!=0) {
											echo get_municipio($asociado->ciudad_bienes)->municipio."/".get_departamento($asociado->departamento_bienes)->departamento;
										}
									 ?>
								</td>
							</tr>
							<tr>
								<td>
									<b>Valor Comercial: </b>
									<?php echo $asociado->valor_comercial;?>
								</td>
								<td colspan="2">
									<b>Matricula Inmobilaria: </b>
									<?php echo $asociado->matricula_inmobilaria;?>
								</td>
								<td>
									<b>Hipoteca: </b>
									<?php echo $asociado->hipoteca == 1 ? "SI":"NO";?>
								</td>
								<td colspan="2">
									<b>Entidad a la cual se encuentra hipotecada: </b>
									<?php echo $asociado->entidad_hipotecada;?>
								</td>
							</tr>
							<tr>
								<td colspan="6">
									<b>Otros activos: </b>
									<?php echo $asociado->otros_activos;?>
								</td>
							</tr>
						</tbody>
					</table>
					<table width="100%" border="1" cellpadding="0" cellspacing="0">
						<tbody>
							<tr>
								<td colspan="2" class="text-center titulos">7.INFORMACION DE PRODUCTOS A TOMAR</td>
							</tr>
							<tr>
								<th>AHORROS</th>
								<th>AUTORIZACIONES</th>
							</tr>
							<tr>
								<td>
									<ol>
									<?php foreach ($productos as $prod): ?>
										<li><?php echo get_ahorro($prod->ahorro_id)->nombre;?></li>
									<?php endforeach ?>
									</ol>
								</td>
								<td>
									Autorizo a FESUN a descontar por nómina de acuerdo a mi forma de pago los valores que voluntariamente deseo ahorrar y aportar.
								</td>
							</tr>

						</tbody>
					</table>
					<table width="100%" border="1" cellpadding="0" cellspacing="0">	
						<tbody>
							<tr>	
								<td colspan="5" class="text-center titulos">8.REFERENCIAS PERSONAL COMERCIAL</td>
							</tr>	
							<tr>	
								<th>
									Referencia Familiar
								</th>
								<td>
									<b>1.Nombres y Apellidos: </b> 
									<?php echo $asociado->prf_nombres_apellidos;?>
								</td>
								<td>
									<b>Parentesco: </b> 
									<?php echo $asociado->prf_parentesco;?>
								</td>
								<td>
									<b>Telefono: </b>
									<?php echo $asociado->prf_telefono;?>
								</td>
								<td>
									<b>Celular: </b>
									<?php echo $asociado->prf_celular;?>
								</td>
							</tr>
							<tr>	
								<th>
									Referencia Familiar
								</th>
								<td>
									<b>2.Nombres y Apellidos: </b> 
									<?php echo $asociado->srf_nombres_apellidos;?>
								</td>
								<td>
									<b>Parentesco:</b> 
									<?php echo $asociado->srf_parentesco;?>
								</td>
								<td>
									<b>Telefono: </b>
									<?php echo $asociado->srf_telefono;?>
								</td>
								<td>
									<b>Celular: </b>
									<?php echo $asociado->srf_celular;?>
								</td>
							</tr>
							<tr>	
								<th>
									Referencias Comerciales/Personal
								</th>
								<td>
									<b>3.Nombres y Apellidos: </b> 
									<?php echo $asociado->rc_nombres_apellidos;?>
								</td>
								<td>
									<b>Parentesco: </b> 
									<?php echo $asociado->rc_parentesco;?>
								</td>
								<td>
									<b>Telefono: </b>
									<?php echo $asociado->rc_telefono;?>
								</td>
								<td>
									<b>Celular: </b>
									<?php echo $asociado->rc_celular;?>
								</td>
							</tr>
						</tbody>
					</table>

					<table width="100%" cellpadding="2" cellspacing="0" border="1">
						<tbody>
							<tr>
								<td class="text-center titulos">9.AUTORIZACION DESCUENTO POR LIBRANZA</td>
							</tr>
							<tr>
								<td>
									Por medio de la presente autorizo irrevocablemente en calidad de trabajador a ustedes para que de mi salario o compensación salarial que devengo se sirva descontar una cuota periódica correspondiente al 3.5% del sueldo mensual como aporte y ahorro obligatorio para FESUN. Cuota que será variable según el incremento de mi salario, además autorizo irrevocablemente para que del salario se sirva descontar el valor de las cuotas por créditos y otros servicios adquiridos con FESUN hasta que se cubra el valor total de los créditos igualmente autorizo irrevocablemente a FESUN para solicitar a la empresa o empresas a las que actualmente o en un futuro nos encontremos vinculados laboralmente y a quien les realice el pago de acuerdo a la legislación vigente, ARL, Fondo de Pensiones, EPS, debitar de nuestros salarios, prestaciones legales o extralegales, bonificaciones, indemnizaciones y en general todas las obligaciones con FESUN, en caso de desvinculación laboral, solicitar el saldo de las cesantías vigentes en el Fondo de Cesantías en el que me encuentre afiliado con el fin de aplicarles al saldo de las obligaciones que queden a mi cargo, abonar a cualquiera de nuestras obligaciones las sumas que se encuentren en poder de FESUN, totales como los aportes sociales, ahorros y en general de cualquier derecho económico del que seamos titulares en caso de retiro del FESUN. <br>                             
									En caso de insolvencia me obligo a mantener el descuento de nómina de acuerdo con lo solicitado y aprobado aún en el evento de presentarse acuerdo por insolvencia
									<br>
									<div class="form-group">
										<div class="col-md-6 text-center">
											<b>N° Documento de Identidad:</b>
											<span style="text-decoration: underline; width: 200px;" ><?php echo $asociado->num_identificacion;?></span>
										</div>
										<div class="col-md-6 text-center">
											<b>Firma:</b>
										</div>
									</div>
								</td>
							</tr>
						</tbody>
					</table>
					<table width="100%" border="1" cellpadding="2" cellspacing="0">
						<tbody>
							<tr>
								<td class="text-center titulos">10. ACEPTACIONES REQUERIDAS</td>
							</tr>
							<tr>
								<td>
									En cumplimiento de la Ley estatutaria 1581 de 2012 de Protección de Datos (LEPD), del decreto 1377 del 2013 y demás normas que la modifiquen, adicionen y/o complementen, el presente aviso de privacidad tienen como objeto obtener la AUTORIZACION expresa e informada del Titular para el tratamiento y la transferencia de sus datos a terceras entidades, por lo tanto:  Yo <span style="font-weight: bold; text-decoration: underline;"><?php echo $asociado->nombres." ".$asociado->primer_apellido;?> </span> identificado con la CC:<span style="font-weight: bold; text-decoration: underline;"><?php echo $asociado->tipo_identificacion==2 ? "X":"   ";?></span>	CE:<span style="font-weight: bold; text-decoration: underline;"><?php echo $asociado->tipo_identificacion==1 ? "X":"   ";?></span> Número <span style="text-decoration: underline; width: 200px;" ><?php echo $asociado->num_identificacion;?></span> de <span style="text-decoration: underline; width: 200px;" ><?php echo get_municipio($asociado->municipio)->municipio;?></span> en mi calidad de Titular de mis datos personales y de los datos personales de mi grupo familiar, incluidos los datos de menores de edad, dada mi calidad de representante legal de ellos, autorizo para que los datos facilitados voluntariamente mediante este y cualquier otro formulario, pasen a formar parte de una base de datos, cuyo responsable es el FONDO DE EMPLEADOS SUNSHINE BOUQUET - FESUN, cuya finalidad es realizar actividades otorgadas por la ley para cumplir su objeto social y ofrecer productos, servicios y/o beneficios que buscan satisfacer las necesidades de los asociados y sus familias, cualquier otra finalidad que resulte en el desarrollo de esta relación. Así mismo autorizo a FESUN para capturar mi huella dactiloscópica a través de un medio físico (almohadilla y papel) y/o de manera electrónica (biometría), así como la fotografía de mi rostro únicamente para los fines exclusivos en la entidad. De igual modo, he sido informado que la base de datos en la que se encuentran mis datos personales es tratada cumpliendo con las medidas de seguridad definidas en la Política de Tratamiento  desarrollada por FESUN , a la cual se puede tener acceso por medio del correo electrónico y en la página web. También he sido informado que puedo ejercitar los derechos de acceso, corrección, supresión, revocación o reclamo por infracción sobre los datos suministrados, por medio de escrito dirigido a FESUN, a la dirección del correo electrónico Fesun.protecciondedatos@fesun.com.co, o mediante correo ordinario remitido a la dirección KM 4 Vía suba cota – Bogota y/o KM 2.8 Vía Tenjo la Punta (Finca el Cerezo Trópico).
* Acepto y autorizo a FESUN para que reporte conserve consulte o actualice a las centrales de riesgo según la ley 1266 de 2008 y demás normas que la modifiquen, adicionen y/o complementen cualquier información de mi comportamiento que a su favor resulten de todas las operaciones de crédito que bajo cualquier modalidad me otorgue.
* Acepto y me comprometo a efectuar el pago de aportes sociales individuales periódicos, a ahorrar en forma permanente y pagar las cuotas que por Asamblea General sean aprobadas.
* Me comprometo a consultar en la página web el estatuto y toda la normatividad vigente e informar oportunamente cualquier modificación en mis datos personales, dirección, teléfono, correo electrónico o cambios salariales debidamente soportados.
* Autorizo a FESUN para actuar por cuenta y riesgo mío como mandatario de pago para cubrir mis obligaciones que adquiera por convenios relacionados con la adquisición de bienes y/o servicios recibidos de  terceras personas, naturales o jurídicas en mi beneficio y/o de mi grupo familiar, por lo tanto libero a FESUN de cualquier responsabilidad que se genere en esos  negocios.<br>
								
									Bajo la gravedad de juramento y actuando en nombre propio realizo las siguiente declaración de origen y designación de recursos a FESUN, con el fin de cumplir con la disposiciones señaladas en su Sistema de Administracion de Riesgo de Lavado de Activos y de la Financiación del Terrorismo: Yo <span style="font-weight: bold; text-decoration: underline;"><?php echo $asociado->nombres." ".$asociado->primer_apellido;?> </span> identificado con la CC:<span style="font-weight: bold; text-decoration: underline;"><?php echo $asociado->tipo_identificacion==2 ? "X":"   ";?></span>	CE:<span style="font-weight: bold; text-decoration: underline;"><?php echo $asociado->tipo_identificacion==1 ? "X":"   ";?></span> Número <span style="text-decoration: underline; width: 200px;" ><?php echo $asociado->num_identificacion;?></span> obrando en nombre propio, declaro bajo la gravedad de juramento, sujeto a las sanciones establecidas en el código penal: 1- Que mis recursos provienen de actividades licitas y están ligadas al desarrollo normal de mis actividades, y que, por lo tanto, los mismos no provienen de ninguna actividad ilícita de las contempladas en el código penal Colombiano y de cualquier norma que la sustituya, adicione o modifique. 2- que NO he efectuado transacciones u operaciones consistentes, destinadas a la ejecución de actividades ilícitas de las contempladas en el código penal colombiano o en cualquier norma que lo sustituya, adicione o modifique o a favor de personas que ejecuten o estén relacionadas con la ejecución de dichas actividades. 3- que los recursos comprometidos para la ejecución del contrato o para el desarrollo de las actividades del negocio jurídico acordado con FESUN no proviene de ninguna actividad ilícita de las contempladas en el código penal colombiano o en cualquier norma que lo sustituya, adicione o modifique. 4- que no me encuentro en las listas internaciones vinculantes para colombia de conformidad en el derecho internacional (Listas de las Naciones Unidas) o en las listas OFAC, estando FESUN Facultado para efectuar las verificaciones que considere pertinentes y para dar por terminada cualquier relación comercial  o jurídica si verifica que me encuentro figurando en dichas listas. 5- que no existe sobre mi directa o indirectamente delitos dolosos, estando FESUN facultado para efectuar las verificaciones que considere pertinentes en base de datos o informaciones públicas nacionales y para dar por terminada cualquier relación comercial o jurídica si verifica que yo tuviera investigaciones o procesos, o existen informaciones en dichas bases de datos públicas que puedan colocar a FESUN  frente a un riesgo legal, de reputación o  de contagio. 6- que en el evento que tenga conocimiento de algunas de las circunstancias descritas en los puntos anteriores, me comprometo a comunicarlo de inmediato a FESUN. 7- que con la firma del presente documento, se entiende, otorgo mi consentimiento y por lo tanto autorizo a FESUN a comunicar a las autoridades nacionales o de cualquiera de los países en los cuales FESUN realice operaciones, sobre alguna de las situaciones en este documento descritas, así como a suministrar a las autoridades competentes de dichos países toda la información personal, publica, privada o semiprivada que sobre mi requiera. Así mismo para que FESUN efectué los reportes a las autoridades competentes, que considere procedentes de conformidad con sus reglamentos y manuales relacionados con su sistema de administración del riesgo de lavado de activos y de la financiación del terrorismo, exonerando así toda la responsabilidad por tal hecho. 8-  que toda la documentación e información aportada para la celebración y ejecución del contrato o negocio jurídico con FESUN es veraz y exacta, estando FESUN  facultado para efectuar las verificaciones que considere pertinentes y para dar por terminado el contrato o negocio jurídico, si verifica o tiene conocimiento de que ello no es así. 9- que ninguna persona natural o jurídica, tiene interés no legitimo en el contrato o negocio jurídico que motiva la suscripción de la presente declaración. 10- que conozco declaro y acepto que FESUN  está en la obligación legal  de solicitar las aclaraciones que estime pertinentes en el evento en que se presenten circunstancias con base en las cuales FESUN pueda tener dudas razonables sobre mis operaciones o las operaciones de la persona natural o jurídica que represento, así como del origen de mis activos, evento en el cual suministrare las declaraciones que sean del caso. Si estas no son satisfactorias, a juicio de FESUN, lo autorizo para dar por terminada cualquier relación comercial o jurídica.
Declaro que la totalidad de pagos que realizo a FESUN se efectúa de forma directa y con los recursos propios y no a través de terceros ni con recursos de terceros.
								</td>
							</tr>
						</tbody>
					</table>
					<table width="100%" border="1" cellpadding="5" cellspacing="0">
						<tbody>
							<tr>
								<td class="text-center titulos">11.FIRMAS</td>
							</tr>
							<tr>
								<td>
									Como constancia de haber leido, entendido y aceptado lo anterior, declaro que la informacion que he suministrado es exacta en todas sus partes y firmo el presente documento en la ciudad de <?php echo $asociado->municipio;?> a los <?php echo $date->format('d');?> dias del mes de <?php echo $meses[((int) $date->format('m')) -1];?> del año <?php echo $date->format('Y');?>


									<div class="form-group">
										<div class="col-md-3 text-center">
											<hr style="margin: 2px;">
											Firma
										</div>
										<div class="col-md-3 text-center">
											<?php echo $asociado->nombres." ".$asociado->primer_apellido;?>
											<hr style="margin: 2px;">
											Nombre
										</div>
										<div class="col-md-3 text-center">
											<?php echo $asociado->num_identificacion;?>
											<hr style="margin: 2px;">
											Cedula N°
										</div>
									</div>
								</td>

							</tr>
						</tbody>
					</table>
					<table width="100%" border="1" cellspacing="0" cellpadding="0">
						<tbody>
							<tr>
								<td colspan="3" class="text-center titulos">12.ESPACIO PARA USO EXCLUSIVO PARA FESUN</td>
							</tr>
							<tr>
								<td>
									<b>Lugar de la entrevista: </b> 
									<?php echo $asociado->nombre;?>
								</td>
								<td>
									<b>Fecha de la Entrevista: </b> 
									<?php echo $asociado->fecha_entrevista;?>
								</td>
								<td>
									<b>Hora: </b> 
									<?php echo $asociado->hora;?>
								</td>
							</tr>
							<tr>
								<td colspan="3">
									<b>Nombre del funcionario que recepciona y supervisa el diligenciamiento de la solicitud. </b> 
									<?php echo $asociado->user_aprueba?>
								</td>
							</tr>
							<tr>
								<td colspan="3">
									<b>Observaciones. </b> 
									<?php echo $asociado->observaciones_diligencia;?>
								</td>
							</tr>
							<tr>
								<td colspan="3">
									<b>Interes manifestado x el solicitante de su vinculacion a Fesun. </b> 
									<?php echo $asociado->interes;?>
								</td>
							</tr>
							<tr>
								<td colspan="3">
									<b>Nombre y firma del funcionario que ingresa la informacion al sistema: </b> 
									<?php echo $asociado->nombres." ".$asociado->apellidos; ?>
								</td>
							</tr>
							<tr>
								<td>
									<b>Estado de la solicitud.</b> 
									<?php 
										if ($asociado->estado == 0) {
											echo "Pendiente";
										}else if($asociado->estado == 1){
											echo "Aprobado";
										}else{
											echo "No Aprobado";
										}
									?>
								</td>
								<td colspan="2">
									<b>Validacion el estado de la solicitud por Junta Directiva. </b> 
									Acta de Junta Directiva
								</td>

							</tr>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</section>