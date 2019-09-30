<section class="content-header">
    <h1>
        Asociados <small> Listado</small>
    </h1>

</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <form action="<?php echo base_url(); ?>backend/asociados/save" method="POST" id="form-asociado">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                
                <div class="panel panel-primary">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <h4 class="panel-title">
                                <i class="more-less glyphicon glyphicon-minus"></i>
                                1.Información Personal
                            </h4>
                        </a>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Primer Apellido</label>
                                        <input type="text" class="form-control" name="primer_apellido" placeholder="Primer Apellido" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label>Tipo de Identificacion</label>
                                        <select name="tipo_identificacion" id="tipo_identificacion" class="form-control" required="required">
                                            <option value="">Selecione...</option>
                                            <option value="C. E.">C.E.</option>
                                            <option value="C. C.">C. C.</option>
                                            <option value="Pasaporte">Pasaporte</option>
                                            <option value="Otro">Otro</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Lugar de Expedición(Municipio)</label>
                                        <select name="municipio" id="municipio" class="form-control" required="required">
                                            <option value="">Seleccione..</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Fecha Expedicion</label>
                                        <input type="text" class="form-control datepicker" name="fec_expedicion" placeholder="Fecha Expedicion" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Lugar de Nacimiento(Departamento)</label>
                                        <select name="dep_nacimiento" id="dep_nacimiento" class="form-control" required="required">
                                            <option value="">Seleccione..</option>
                                            <?php foreach ($departamentos as $dep): ?>
                                                <option value="<?php  echo $dep->id_departamento?>"><?php echo $dep->departamento?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Profesion</label>
                                        <input type="text" name="profesion" class="form-control" placeholder="Profesion">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Zona de Ubicación</label>
                                        <select name="zona_ubicacion" class="form-control" required="required">
                                            <option value="">Selecione...</option>
                                            <option value="Urbana">Urbana</option>
                                            <option value="Rural">Rural</option>
                                        </select>
                                    </div>
                                     <div class="form-group">
                                        <label for="">Cabecera de Hogar</label>
                                        <select name="cabeza_hogar" class="form-control" required="required">
                                            <option value="">Indique</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Dirección de Residencia</label>
                                        <input type="text" name="direcion_residencia" class="form-control" placeholder="Direción de Residencia" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Telefono</label>
                                        <input type="text" name="telefono" class="form-control" placeholder="Telefono">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Vinculado a otro fondo de empleados</label>
                                        <select name="vinculado_fondo" id="vinculado_fondo" class="form-control" required="required">
                                            <option value="">Indique</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tipo de Poblacion</label>
                                        <select name="tipo_poblacion" id="tipo_poblacion" class="form-control" required="required">
                                            <option value="">Seleccione..</option>
                                            <option value="Etnica">Etnica</option>
                                            <option value="Afectada por la Violencia">Afectada por la Violencia</option>
                                            <option value="Otro">Otro</option>
                                        </select>
                                    </div>
                                    
                                </div>
                                <!-- Columna 2-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Segundo Apellido</label>
                                        <input type="text" class="form-control" name="segundo_apellido" placeholder="Segundo Apellido" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Numero de Identificacion</label>
                                        <input type="text" class="form-control" name="num_identificacion" placeholder="Numero de Identificacion" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Género</label>
                                        <select name="genero" class="form-control" required="required">
                                            <option value="">Indique</option>
                                            <option value="Masculino">Masculino</option>
                                            <option value="Femenino">Femenino</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Fecha de Nacimiento</label>
                                        <input type="text" name="fecha_nacimiento" class="form-control datepicker" placeholder="Fecha de Nacimiento" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Lugar de Nacimiento(Municipio)</label>
                                        <select name="mun_nacimiento" id="mun_nacimiento" class="form-control" required="required">
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Ocupación</label>
                                        <input type="text" class="form-control" name="ocupacion" placeholder="Ocupación">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tiempo de Residencia en la ubicacion</label>
                                        <input type="text" class="form-control" name="tiempo_residencia" placeholder="Tiempo de Residencia en la ubicacion">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Personas que dependan economicamente</label>
                                        <input type="text" class="form-control" name="personas_dependientes" placeholder="Personas que dependan economicamente">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Barrio/Vereda</label>
                                        <input type="text" name="barrio" class="form-control" placeholder="Barrio/Vereda" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Correo Electronico</label>
                                        <input type="text" name="correo" class="form-control" placeholder="Correo Electronico">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nombre de Entidad</label>
                                        <input type="text" name="nombre_entidad" id="nombre_entidad" class="form-control" placeholder="Nombre de Entidad" disabled="disabled">
                                    </div>
                                     <div class="form-group">
                                        <label for="">Indique tipo población</label>
                                        <input type="text" name="otra_poblacion" id="otra_poblacion" class="form-control" placeholder="Indique tipo población" disabled="disabled">
                                    </div>

                                    
                                </div>
                                <!-- Columna 3-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        <input type="text" class="form-control" name="nombres" placeholder="Nombres" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Departamento</label>
                                        <select name="departamento" id="departamento" class="form-control" required="required">
                                            <option value="">Lugar de Expedicion(Departamento)</option>
                                            <?php foreach ($departamentos as $d): ?>
                                                <option value="<?php echo $d->id_departamento;?>"><?php echo $d->departamento;?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Estado Civil</label>
                                        <select name="estado_civil" class="form-control" required="required">
                                            <option value="">Seleccione..</option>
                                            <option value="Soltero">Soltero</option>
                                            <option value="Casado">Casado</option>
                                            <option value="Divorciado">Divorciado</option>
                                            <option value="Unión Libre">Unión libre</option>
                                            <option value="Viudo">Viudo</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nivel de Escolaridad</label>
                                        <select name="nivel_escolar" class="form-control" required="required">
                                            <option value="">Indique</option>
                                            <option value="Ninguno">Ninguno</option>
                                            <option value="Primaria">Primaria</option>
                                            <option value="Secundaria">Secundaria</option>
                                            <option value="Técnico">Técnico</option>
                                            <option value="Técnologo">Técnologo</option>
                                            <option value="Universitario">Universitario</option>
                                            <option value="Postgrado">Postgrado</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Vivienda</label>
                                        <select name="vivienda" class="form-control" required="required">
                                            <option value="">Indique</option>
                                            <option value="Propia">Propia</option>
                                            <option value="Hipotecada">Hipotecada</option>
                                            <option value="Arrendada">Arrendada</option>
                                            <option value="Financiada">Financiada</option>
                                            <option value="Familiar">Familiar</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Numeros de Hijos</label>
                                        <input type="text" class="form-control" name="numero_hijos" placeholder="Numeros de Hijos">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Hijos menores de 25 años solteros o con discapacidad</label>
                                        <input type="text" class="form-control" name="hijos_menores" placeholder="Hijos menores de 25 años solteros o con discapacidad">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Ciudad</label>
                                        <input type="text" name="ciudad" class="form-control" placeholder="Ciudad" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Telefono celular</label>
                                        <input type="text" name="celular" class="form-control" placeholder="Telefono celular">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Autorizo envio de informacion por correo electronico</label>
                                        <select name="autorizo_envio" class="form-control" required="required">
                                            <option value="">Indique</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Poblacion Vulnerable</label>
                                        <select name="poblacion_vulnerable" class="form-control" required="required">
                                            <option value="">Indique</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <b>Usted desempeña en la actualidad o ha desempeñado en los ultimos veinticuatro(24) meses cargos o actividades en los cuales:</b>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                   <div class="form-group">
                                        Maneja recursos públicos o tiene poder de disposición sobre estos? <br>
                                        Tiene o goza de reconocimiento público? <br>
                                        Tiene grado de poder público o desempeña una función pública prominente o destacada en el estado? <br>
                                        Tiene familiares hasta el segundo grado de consanguínidad y afinidad que encajen en los escenarios descritos previamente?<br>
                                        Si alguna de las preguntas anteriores es afirmativa por favor especifique:

                                   </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="radio-inline"><input type="radio" name="maneja_recursos" value="1" required="required">Si</label>
                                        <label class="radio-inline"><input type="radio" name="maneja_recursos" value="0">No</label> <br>
                                        <label class="radio-inline"><input type="radio" name="reconocimiento" value="1" required="required">Si</label>
                                        <label class="radio-inline"><input type="radio" name="reconocimiento" value="0">No</label> <br>
                                        <label class="radio-inline"><input type="radio" name="poder_publico" value="1" required="required">Si</label>
                                        <label class="radio-inline"><input type="radio" name="poder_publico" value="0">No</label> <br>
                                        <label class="radio-inline"><input type="radio" name="tiene_familiares" value="1" required="required">Si</label>
                                        <label class="radio-inline"><input type="radio" name="tiene_familiares" value="0">No</label>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="">Especificaciones</label>
                                    <textarea name="especificacion" id="especificacion" rows="3" class="form-control" placeholder="Especifique..."></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    Tiene familiares hasta segundo grado de afinidad y consanguinidad asociados a FESUN?
                                </div>
                                <div class="col-md-2">
                                    <label class="radio-inline"><input type="radio" name="familiares_asociados" value="1" required="required">Si</label>
                                    <label class="radio-inline"><input type="radio" name="familiares_asociados" value="0">No</label>
                                </div>
                                <div class="col-md-3">
                                    De ser afirmativo por favor especifique:
                                </div>
                            </div>
                            <table class="table table-bordered" id="tb-familiares">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Parentesco</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="familiares[]">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="parentesco[]">
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-success btn-add-familiar"><span class="fa fa-plus"></span></button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                              
                <div class="panel panel-primary">
                    <div class="panel-heading" role="tab" id="headingTwo">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <h4 class="panel-title">
                            
                                <i class="more-less glyphicon glyphicon-plus"></i>
                                2.Información del Conyuge
                            
                            </h4>
                        </a>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                           <div class="row">
                               <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Primer Apellido</label>
                                        <input type="text" class="form-control" name="pa_conyuge" placeholder="Primer Apellido" >
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tipo Identificacion</label>
                                        <select name="ti_conyuge" id="ti_conyuge" class="form-control" >
                                            <option value="">Seleccione..</option>
                                            <option value="C. E.">C.E.</option>
                                            <option value="C. C.">C. C.</option>
                                            <option value="Pasaporte">Pasaporte</option>
                                            <option value="Otro">Otro</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Actividad Laboral</label>
                                        <select name="actividad_laboral" id="actividad_laboral" class="form-control">
                                            <option value="">Seleccione..</option>
                                            <option value="Independiente">Independiente</option>
                                            <option value="Asalariado">Asalariado</option>
                                            <option value="Hogar">Hogar</option>
                                            <option value="Pensionado">Pensionado</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Empresa donde Trabaja</label>
                                        <input type="text" name="empresa" class="form-control" placeholder="Empresa donde Trabaja">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Telefono fijo</label>
                                        <input type="text" name="telefono_fijo" class="form-control" placeholder="Telefono fijo">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Ocupación</label>
                                        <input type="text" class="form-control" name="ocupacion_c" placeholder="Ocupación">
                                    </div>
                               </div>
                               <div class="col-md-4">
                                   <div class="form-group">
                                        <label for="">Segundo Apellid</label>
                                        <input type="text" class="form-control" name="segundo_apellido_c" placeholder="Segundo Apellido">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Numero de Identificacion</label>
                                        <input type="text" class="form-control" name="num_identificacion_c" placeholder="Numero de Identificacion" >
                                    </div>
                                    <div class="form-group">
                                        <label for="">Salario</label>
                                        <input type="text" class="form-control" name="salario_c" placeholder="Salario">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Cargo</label>
                                        <input type="text" name="cargo_c" class="form-control" placeholder="Cargo">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Celular</label>
                                        <input type="text" name="celular_c" class="form-control" placeholder="Celular">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Asociado a FESUN</label>
                                        <select name="asociado_fesun_c" id="asociado_fesun_c" class="form-control">
                                            <option value="">Indique</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                               </div>
                               <div class="col-md-4">
                                   <div class="form-group">
                                        <label for="">Nombres</label>
                                        <input type="text" class="form-control" name="nombres_c" placeholder="Nombres" >
                                    </div>
                                    <div class="form-group">
                                        <label for="">Fecha de Nacimiento</label>
                                        <input type="text" name="fecha_nacimiento_c" class="form-control datepicker" placeholder="Fecha de Nacimiento" >
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jornada Laboral</label>
                                        <select name="jornada_laboral" id="jornada_laboral" class="form-control" >
                                            <option value="">Indique</option>
                                            <option value="Tiempo Total">Tiempo Total</option>
                                            <option value="Tiempo Parcial">Tiempo Parcial</option>
                                            <option value="No Aplica">No Aplica</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Antiguedad</label>
                                        <input type="text" name="antiguedad" class="form-control" placeholder="Antiguedad">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nivel de Escolaridad</label>
                                        <select name="nivel_escolar_c" class="form-control" >
                                            <option value="">Seleccione..</option>
                                            <option value="Ninguno">Ninguno</option>
                                            <option value="Primaria">Primaria</option>
                                            <option value="Secundaria">Secundaria</option>
                                            <option value="Técnico">Técnico</option>
                                            <option value="Técnologo">Técnologo</option>
                                            <option value="Universitario">Universitario</option>
                                            <option value="Postgrado">Postgrado</option>
                                        </select>
                                    </div>
                               </div>
                           </div>
                        </div>
                    </div>
                </div>
                
                <div class="panel panel-primary">
                    <div class="panel-heading" role="tab" id="headingThree">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <h4 class="panel-title">
                                <i class="more-less glyphicon glyphicon-plus"></i>
                                3.Beneficiarios
                            </h4>
                        </a>
                    </div>
                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                            <div class="row">   
                                <div class="col-md-12"> 
                                    En primer grado de consanguinidad: Padres, Esposo(a) o compañero(a) permanente e hijos <br>
                                    <table class="table table-bordered" id="tb-beneficiarios"> 
                                        <thead> 
                                            <tr>    
                                                <th>Nombres y Apellidos completos</th>
                                                <th>Fecha de Nacimiento</th>
                                                <th>N° de Identificacion</th>
                                                <th>Parentesco</th>
                                                <th>Telefono/Celular</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <td>
                                                <input type="text" name="nombres_b[]" class="form-control" placeholder="Nombres y Apellidos completos">
                                            </td>
                                            <td>
                                                <input type="text" name="fechas_b[]" class="form-control datepicker" placeholder="fecha de Nacimmiento">
                                            </td>
                                            <td>
                                                <input type="text" name="identificaciones_b[]" class="form-control" placeholder="N° de Identificacion">
                                            </td>
                                            <td>
                                                <input type="text" name="parentescos_b[]" class="form-control" placeholder="Parentesco">
                                            </td>
                                            <td>
                                                <input type="text" name="telefonos_b[]" class="form-control" placeholder="Telefono/Celular">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-add-beneficiario"><span class="fa fa-plus"></span></button>
                                            </td>
                                        </tbody>
                                    </table>    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading" role="tab" id="headingFour">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            <h4 class="panel-title">
                                <i class="more-less glyphicon glyphicon-plus"></i>
                                4.Información Laboral
                            </h4>
                        </a>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Vinculación ala Empresa</label>
                                        <input type="text" name="vinculacion_empresa" class="form-control " placeholder="Vinculación ala Empresa">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Municipio</label>
                                        <input type="text" name="municipio_laboral" class="form-control " placeholder="Municipio" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tiempo de Servicio</label>
                                        <input type="text" name="tiempo_servicio" class="form-control" placeholder="Tiempo de Servicio">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Fondo Pensiones</label>
                                        <input type="text" name="fondo_pensiones" class="form-control" placeholder="Fondo Pensiones">
                                    </div>
                                </div>
                                <!-- fin de la columna 1-->
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Fecha de Ingreso</label>
                                        <input type="text" name="fecha_ingreso" class="form-control datepicker" placeholder="Fecha de Ingreso" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tipo de Nomina</label>
                                        <select name="tipo_nomina" class="form-control">
                                            <option value="">Indique</option>
                                            <option value="Mensual">Mensual</option>
                                            <option value="Quincenal">Quincenal</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Sueldo Basico</label>
                                        <input type="text" name="sueldo_basico" class="form-control" placeholder="Sueldo Basico">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Fondo de Cesantias</label>
                                        <input type="text" name="fondo_cesantias" class="form-control" placeholder="Fondo de Cesantias">
                                    </div>
                                </div>
                                <!-- fin de la columna 2-->
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Finca</label>
                                        <select name="finca" class="form-control" required="required">
                                            <option value="">Seleccione..</option>
                                            <?php foreach ($fincas as $f): ?>
                                                <option value="<?php echo $f->id;?>"><?php echo $f->nombre?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tipo de Contrato</label>
                                        <select name="tipo_contrato" class="form-control" required="">
                                            <option value="">Indique</option>
                                            <option value="Fijo">T Fijo</option>
                                            <option value="Indefinido">T Indefinido</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Cargo</label>
                                        <input type="text" name="cargo_laboral" class="form-control" placeholder="Cargo">
                                    </div>
                                </div>
                                <!-- fin de la columna 3-->
                                
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="">Observaciones</label>
                                    <textarea name="observaciones" id="observaciones"  rows="3" class="form-control" placeholder="Observaciones..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading" role="tab" id="headingFive">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            <h4 class="panel-title">
                                <i class="more-less glyphicon glyphicon-plus"></i>
                                5.Información Financiera
                            </h4>
                        </a>
                    </div>
                    <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th colspan="4" class="text-center">Ingresos Mensuales</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Sueldo / Ingresos Brutos</label>
                                            <input type="text" class="form-control" name="ingreso_bruto" placeholder="Sueldo / Ingresos Brutos">
                                        </td>
                                        <td>
                                            <label for="">Otros ingresos</label>
                                            <input type="text" class="form-control" name="otros_ingresos" placeholder="Otros ingresos">
                                        </td>
                                        <td>
                                            <label for="">Descripcion otros ingresos</label>
                                            <input type="text" class="form-control" name="descripcion_ingresos" placeholder="Descripcion otros ingresos">
                                        </td>
                                        <td>
                                            <label for="">Total ingresos</label>
                                            <input type="text" class="form-control" name="total_ingresos" placeholder="Total ingresos">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-center">Egresos Mensuales</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Prestamos / Hipotecas / Arriendos</label>
                                            <input type="text" class="form-control" name="prestamos" placeholder="Prestamos / Hipotecas / Arriendos">
                                        </td>
                                        <td>
                                            <label for="">Gastos Familiares</label>
                                            <input type="text" class="form-control" name="gastos_familiares" placeholder="Gastos Familiares">
                                        </td>
                                        <td>
                                            <label for="">Otros Gastos</label>
                                            <input type="text" name="otros_gastos" class="form-control" placeholder="Otros Gastos">
                                        </td>
                                        <td>
                                            <label for="">Total egresos</label>
                                            <input type="text" name="total_egresos" class="form-control" placeholder="Total egresos">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-center">Obligaciones Mensuales</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Bancos</label>
                                            <input type="text" class="form-control" name="bancos" placeholder="Bancos">
                                        </td>
                                        <td>
                                            <label for="">Corporaciones</label>
                                            <input type="text" name="corporaciones" class="form-control" placeholder="Corporaciones">
                                        </td>
                                        <td>
                                            <label for="">Personales</label>
                                            <input type="text" name="personales" class="form-control" placeholder="Personales">
                                        </td>
                                        <td>
                                            <label for="">Total obligaciones</label>
                                            <input type="text" name="total_obligaciones" class="form-control" placeholder="Total obligaciones">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-center">Balance General</th>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <label for="">Activos:Valor de las Propiedades</label>
                                            <input type="text" name="activos_propiedades" class="form-control" placeholder="Activos:Valor de las Propiedades">
                                        </td>
                                        <td colspan="2">
                                            <label for="">Pasivo: Saldo de las Obligaciones</label>
                                            <input type="text" name="pasivos_obligaciones" class="form-control" placeholder="Pasivo: Saldo de las Obligaciones">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Tiene cuenta bancaria?</label>
                                        <select name="cuenta_bancaria" id="cuenta_bancaria" class="form-control">
                                            <option value="">Indique</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Realiza Operaciones en Moneda Extranjera?</label>
                                        <select name="operacion_extranjera" id="operacion_extranjera" class="form-control">
                                            <option value="">Indique</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Banco</label>
                                        <input type="text" name="banco" class="form-control" placeholder="Banco">
                                    </div>
                                </div><!-- Fin de la columna 1-->
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Entidad</label>
                                        <input type="text" name="entidad" class="form-control" placeholder="Entidad">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Pais</label>
                                        <input type="text" name="pais" class="form-control" placeholder="Pais">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Cuenta</label>
                                        <input type="text" name="cuenta" class="form-control" placeholder="Cuenta">
                                    </div>
                                </div>
                                <!-- Fin de la columna 2-->
                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Tipo de Cuenta</label>
                                        <select name="tipo_cuenta" id="tipo_cuenta" class="form-control">
                                            <option value="">Indique</option>
                                            <option value="Ahorro">Ahorro</option>
                                            <option value="Corriente">Corriente</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Cuenta con moneda Extrajera?</label>
                                        <select name="moneda_extranjera" id="moneda_extranjera" class="form-control"> 
                                            <option value="">Indique</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Declara renta?</label>
                                        <select name="declara_renta" id="declara_renta" class="form-control">
                                            <option value="">Indique</option>
                                            <option value="SI">SI</option>
                                            <option value="NO">NO</option>
                                        </select>
                                    </div>
                                </div> 
                                <!-- Fin de la columna 3-->
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading" role="tab" id="headingSix">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            <h4 class="panel-title">
                                <i class="more-less glyphicon glyphicon-plus"></i>
                                6.Descripción de los Activos
                            </h4>
                        </a>
                    </div>
                    <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th colspan="3" class="text-center">VEHICULO</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Marca</label>
                                            <input type="text" name="marca" class="form-control" placeholder="Marca">
                                        </td>
                                        <td>
                                            <label for="">Modelo</label>
                                            <input type="text" name="modelo" class="form-control" placeholder="Modelo">
                                        </td>
                                        <td>
                                            <label for="">Placa</label>
                                            <input type="text" name="placa" class="form-control" placeholder="Placa">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Valor $</label>
                                            <input type="text" name="valor" class="form-control" placeholder="Valor $">
                                        </td>
                                        <td>
                                            <label for="">Pignoracion</label>
                                            <select name="pignoracion" id="pignoracion" class="form-control">
                                                <option value="">Inidque</option>
                                                <option value="SI">SI</option>
                                                <option value="NO">NO</option>
                                            </select>
                                        </td>
                                        <td>
                                            <label for="">Entidad ala cual se encuentra pignorado</label>
                                            <input type="text" name="entidad_pignorado" class="form-control" placeholder="Entidad ala cual se encuentra pignorado">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="3" class="text-center">BIENES RAICES</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Tipo de Bien</label>
                                            <input type="text" name="tipo_bien" class="form-control" placeholder="Tipo de Bien">
                                        </td>
                                        <td>
                                            <label for="">Direccion</label>
                                            <input type="text" name="direccion" class="form-control" placeholder="Direccion">
                                        </td>
                                        <td>
                                            <label for="">Departamento</label>
                                            <select name="dep_raices" id="dep_raices" class="form-control">
                                                <option value="">Seleccione</option>
                                                <?php foreach ($departamentos as $dep): ?>
                                                    <option value="<?php  echo $dep->id_departamento?>"><?php echo $dep->departamento?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Ciudad</label>
                                            <select name="ciudad_raices" id="ciudad_raices" class="form-control">
                                                <option value="">Seleccione..</option>
                                            </select>
                                        </td>
                                        <td>
                                            <label for="">Valor comercial $</label>
                                            <input type="text" name="valor_comercial" class="form-control" placeholder="Valor comercial $">
                                        </td>
                                        <td>
                                            <label for="">Matricula Inmobilaria</label>
                                            <input type="text" name="matricula_inmobilaria" class="form-control" placeholder="Matricula Inmobilaria">
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Hipoteca</label>
                                            <select name="hipoteca" id="hipoteca" class="form-control">
                                                <option value="">Indique</option>
                                                <option value="SI">SI</option>
                                                <option value="NO">NO</option>
                                            </select>
                                        </td>
                                        <td colspan="2">
                                            <label for="">Entidad ala cual se encuentra Hipotecada</label>
                                            <input type="text" name="entidad_hipotecada" class="form-control" placeholder="Entidad ala cual se encuentra Hipotecada">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <label for="">Descripcion de otros activos</label>
                                            <textarea name="otros_activos" id="otros_activos"  rows="3" placeholder="Otros Activos" class="form-control"></textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading" role="tab" id="headingSeven">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                            <h4 class="panel-title">
                                <i class="more-less glyphicon glyphicon-plus"></i>
                                7.Información de Productos a Tomar
                            </h4>
                        </a>
                    </div>
                    <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ahorros">Ahorros</label>
                                        <select name="ahorros[]" id="ahorros" class="select2 form-control" multiple="multiple" style="width: 100%;" data-placeholder="Seleccione.." required="required">
                                            <?php foreach ($ahorros as $a): ?>
                                                <option value="<?php echo $a->id ?>"><?php echo $a->nombre;?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="">Autorizaciones</label>
                                        <p>
                                            Autorizo a FESUN a descontar por nómina de acuerdo a mi forma de pago los valores que voluntariamente deseo ahorrar y aportar.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading" role="tab" id="headingEight">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                            <h4 class="panel-title">
                                <i class="more-less glyphicon glyphicon-plus"></i>
                                8.Referencias Personal Comercial
                            </h4>
                        </a>
                    </div>
                    <div id="collapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingEight">
                        <div class="panel-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="4" class="text-center">Referencia Familiar</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Nombres y Apellidos</label>
                                            <input type="text" name="prf_nombres_apellidos" class="form-control" placeholder="Nombres y Apellidos">
                                        </td>
                                        <td>
                                            <label for="">Parentesco</label>
                                            <input type="text" name="prf_parentesco" class="form-control" placeholder="Parentesco">
                                        </td>
                                        <td>
                                            <label for="">Telefono</label>
                                            <input type="text" name="prf_telefono" class="form-control" placeholder="Telefono">
                                        </td>
                                        <td>
                                            <label for="">Celular</label>
                                            <input type="text" name="prf_celular" class="form-control" placeholder="Celular">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Nombres y Apellidos</label>
                                            <input type="text" name="srf_nombres_apellidos" class="form-control" placeholder="Nombres y Apellidos">
                                        </td>
                                        <td>
                                            <label for="">Parentesco</label>
                                            <input type="text" name="srf_parentesco" class="form-control" placeholder="Parentesco">
                                        </td>
                                        <td>
                                            <label for="">Telefono</label>
                                            <input type="text" name="srf_telefono" class="form-control" placeholder="Telefono">
                                        </td>
                                        <td>
                                            <label for="">Celular</label>
                                            <input type="text" name="srf_celular" class="form-control" placeholder="Celular">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-center">Referencias Comerciales/Personal</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Nombres y Apellidos</label>
                                            <input type="text" name="rc_nombres_apellidos" class="form-control" placeholder="Nombres y Apellidos">
                                        </td>
                                        <td>
                                            <label for="">Parentesco</label>
                                            <input type="text" name="rc_parentesco" class="form-control" placeholder="Parentesco">
                                        </td>
                                        <td>
                                            <label for="">Telefono</label>
                                            <input type="text" name="rc_telefono" class="form-control" placeholder="Telefono">
                                        </td>
                                        <td>
                                            <label for="">Celular</label>
                                            <input type="text" name="rc_celular" class="form-control" placeholder="Celular">
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading" role="tab" id="headingNine">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                            <h4 class="panel-title">
                                <i class="more-less glyphicon glyphicon-plus"></i>
                                9.Información del Diligenciamiento
                            </h4>
                        </a>
                    </div>
                    <div id="collapseNine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingNine">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Tipo de Vinculacion:</label>
                                        <select name="tipo_vinculacion" id="tipo_vinculacion" required="required" class="form-control">
                                            <option value="">Seleccione...</option>
                                            <option value="Vinculación">Vinculación</option>
                                            <option value="Actualización">Actualización</option>
                                            <option value="Vinculación por Primera vez">Vinculación por Primera vez</option>
                                            <option value="Reingreso">Reingreso</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Lugar de la Entrevista</label>
                                        <select name="lugar_entrevista" id="finca" class="form-control" required="required">
                                            <option value="">Seleccione</option>
                                            <?php foreach ($fincas as $f): ?>
                                                <option value="<?php echo $f->id?>"><?php echo $f->nombre?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    
                                </div> 

                                <!-- fin columna 1-->
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Fecha de Diligenciamiento</label>
                                        <input type="text" class="form-control datepicker" name="fec_diligencia" placeholder="Fecha Expedicion" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Fecha de la entrevista</label>
                                        <input type="text" class="form-control datepicker" name="fec_entrevista" placeholder="Fecha Expedicion" required="required">
                                    </div>
                                    

                                </div>
                                <!-- fin columna 2-->
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Oficina:</label>
                                        <input type="text" name="oficina" class="form-control" placeholder="oficina">
                                    </div>
                                    <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <label for="">Hora:</label>
                                        <input type="text" class="form-control timepicker" name="hora">
                                    </div>
                                    </div>
                                </div> 
                                <!-- fin columna 3-->
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Interes manifestado:</label>
                                        <input type="text" class="form-control" name="interes">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Fecha de Afiliacion:</label>
                                        <input type="text" class="form-control datepicker" name="fec_afiliacion" required="required">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="obs_diligencia">Observaciones</label>
                                        <textarea name="obs_diligencia" id="obs_diligencia" rows="3" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- panel-group -->  
            <input type="submit" name="guardar" id="guardar" value="Guardar" class="btn btn-success btn-lg"> 
            <a href="<?php echo base_url();?>backend/asociados" class="btn btn-danger btn-lg">Volver</a>
    </form>   
</section>
<!-- /.content -->


<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion de la Finca</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-print"><span class="fa fa-print"> </span>Imprimir</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->