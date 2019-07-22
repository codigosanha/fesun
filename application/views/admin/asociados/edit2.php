<section class="content-header">
    <h1>
        Asociados <small> Listado</small>
    </h1>

</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <form action="<?php echo base_url(); ?>backend/asociados/save" method="POST" id="form-asociado">
        <input type="hidden" name="idPersona" value="<?php echo $this->uri->segment(4);?>">
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                
                <div class="panel panel-primary">
                    <div class="panel-heading" role="tab" id="headingOne">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <h4 class="panel-title">
                                <i class="more-less glyphicon glyphicon-minus"></i>
                                Información Personal
                            </h4>
                        </a>
                    </div>
                    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="primer_apellido" placeholder="Primer Apellido" value="<?php echo $persona->primer_apellido?>">
                                    </div>
                                    <div class="form-group">
                                        <select name="tipo_identificacion" id="tipo_identificacion" class="form-control">
                                            <option value="">Tipo Identificacion</option>
                                            <?php foreach ($tipoidentificaciones as $ti): ?>
                                                <option value="<?php echo $ti->id;?>" <?php echo $persona->tipo_identificacion == $ti->id ? "selected":"";?>><?php echo $ti->tipoidentificacion?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="municipio" id="municipio" class="form-control">
                                            <option value="">Lugar de Expedición(Municipio)</option>
                                            <?php foreach ($municipiosexp as $me): ?>
                                                <option value="<?php echo $me->id_municipio;?>" <?php echo $me->id_municipio == $persona->municipio?"selected":"";?>><?php echo $me->municipio?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <?php $fec_expedicion = DateTime::createFromFormat('Y-m-d',$persona->fec_expedicion); ?>
                                    <div class="form-group">
                                        <input type="text" class="datepicker form-control" name="fec_expedicion" placeholder="Fecha Expedicion" value="<?php echo $fec_expedicion->format("d/m/Y");?>">
                                    </div>
                                    <div class="form-group">
                                        <select name="dep_nacimiento" id="dep_nacimiento" class="form-control">
                                            <option value="">Lugar de Nacimiento(Departamento)</option>
                                            <?php foreach ($departamentos as $dep): ?>
                                                <option value="<?php  echo $dep->id_departamento?>" <?php echo $dep->id_departamento == $persona->dep_nacimiento?"selected":"";?>><?php echo $dep->departamento?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="profesion" class="form-control" placeholder="Profesion" value="<?php echo $persona->profesion;?>">
                                    </div>
                                    <div class="form-group">
                                        <select name="zona_ubicacion" class="form-control">
                                            <option value="">Zona de Ubicación</option>
                                            <option value="1" <?php echo $persona->zona_ubicacion==1?"selected":"";?>>Urbana</option>
                                            <option value="2" <?php echo $persona->zona_ubicacion==2?"selected":"";?>>Rural</option>
                                        </select>
                                    </div>
                                     <div class="form-group">
                                        <select name="cabeza_hogar" class="form-control">
                                            <option value="">Cabecera de Hogar</option>
                                            <option value="1" <?php echo $persona->cabeza_hogar==1?"selected":"";?>>SI</option>
                                            <option value="2" <?php echo $persona->cabeza_hogar==2?"selected":"";?>>No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="direcion_residencia" class="form-control" placeholder="Direción de Residencia" value="<?php echo $persona->direccion_residencia;?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="telefono" class="form-control" placeholder="Telefono" value="<?php echo $persona->telefono;?>">
                                    </div>
                                    <div class="form-group">
                                        <select name="vinculado_fondo" id="vinculado_fondo" class="form-control">
                                            <option value="">Vinculado a otro fondo de empleados</option>
                                            <option value="1" <?php echo $persona->vinculado_fondo==1?"selected":"";?>>SI</option>
                                            <option value="2" <?php echo $persona->vinculado_fondo==2?"selected":"";?>>No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="tipo_poblacion" id="tipo_poblacion" class="form-control">
                                            <option value="">Tipo de Poblacion</option>
                                            <option value="1" <?php echo $persona->tipo_poblacion==1?"selected":"";?>>Etnica</option>
                                            <option value="2" <?php echo $persona->tipo_poblacion==2?"selected":"";?>>Afectada por la Violencia</option>
                                            <option value="3"<?php echo $persona->tipo_poblacion==3?"selected":"";?>>Otro</option>
                                        </select>
                                    </div>
                                    
                                </div>
                                <!-- Columna 2-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="segundo_apellido" placeholder="Segundo Apellido" value="<?php echo $persona->segundo_apellido;?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="num_identicacion" placeholder="Numero de Identificacion" value="<?php echo $persona->num_identificacion;?>">
                                    </div>
                                    <div class="form-group">
                                        <select name="genero" class="form-control">
                                            <option value="">Sexo</option>
                                            <option value="M" <?php echo $persona->genero == "M" ? "selected":"";?>>Masculino</option>
                                            <option value="F" <?php echo $persona->genero == "F" ? "selected":"";?>>Femenino</option>
                                        </select>
                                    </div>
                                    <?php $fecha_nacimiento = DateTime::createFromFormat('Y-m-d',$persona->fecha_nacimiento); ?>
                                    <div class="form-group">
                                        <input type="text" name="fecha_nacimiento" class="form-control datepicker" placeholder="Fecha de Nacimiento" value="<?php echo $fecha_nacimiento->format("d/m/Y");?>">
                                    </div>
                                    <div class="form-group">
                                        <select name="mun_nacimiento" id="mun_nacimiento" class="form-control">
                                            <option value="">Lugar de Nacimiento(Municipio)</option>
                                            <?php foreach ($municipiosnac as $mc): ?>
                                                <option value="<?php echo $mc->id_municipio;?>" <?php echo $mc->id_municipio == $persona->mun_nacimiento?"selected":"";?>><?php echo $mc->municipio?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="ocupacion" placeholder="Ocupación" value="<?php echo $persona->ocupacion;?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="tiempo_residencia" placeholder="Tiempo de Residencia en la ubicacion" value="<?php echo $persona->tiempo_residencia;?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="personas_dependientes" placeholder="Personas que dependan economicamente" value="<?php echo $persona->personas_dependientes;?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="barrio" class="form-control" placeholder="Barrio/Vereda" value="<?php echo $persona->barrio;?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="correo" class="form-control" placeholder="Correo Electronico" value="<?php echo $persona->correo;?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="nombre_entidad" id="nombre_entidad" class="form-control" placeholder="Nombre de Entidad" disabled="disabled" value="<?php echo $persona->nombre_entidad;?>">
                                    </div>
                                     <div class="form-group">
                                        <input type="text" name="otra_poblacion" id="otra_poblacion" class="form-control" placeholder="Indique tipo población" disabled="disabled" value="<?php echo $persona->otra_poblacion;?>">
                                    </div>

                                    
                                </div>
                                <!-- Columna 3-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="nombres" placeholder="Nombres" value="<?php echo $persona->nombres;?>">
                                    </div>
                                    <div class="form-group">
                                        <select name="departamento" id="departamento" class="form-control">
                                            <option value="">Lugar de Expedicion(Departamento)</option>
                                            <?php foreach ($departamentos as $d): ?>
                                                <option value="<?php echo $d->id_departamento;?>" <?php echo $d->id_departamento == $persona->departamento?"selected":"";?>><?php echo $d->departamento;?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="estado_civil" class="form-control">
                                            <option value="">Estado Civil</option>
                                            <?php foreach ($estadosciviles as $ec): ?>
                                                <option value="<?php  echo $ec->id;?>" <?php echo $ec->id == $persona->estado_civil?"selected":"";?>><?php echo $ec->nombre;?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="nivel_escolar" class="form-control">
                                            <option value="">Nivel de Escolaridad</option>
                                            <?php foreach ($nivelescolaridades as $ne): ?>
                                                <option value="<?php echo $ne->id?>" <?php echo $ne->id == $persona->nivel_escolar?"selected":"";?>><?php echo $ne->nivel?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="vivienda" class="form-control">
                                            <option value="">Vivienda</option>
                                            <?php foreach ($viviendas as $v): ?>
                                                <option value="<?php echo $v->id?>" <?php echo $v->id == $persona->vivienda?"selected":"";?>><?php echo $v->vivienda?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="numero_hijos" placeholder="Numeros de Hijos" value="<?php echo $persona->numero_hijos;?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="hijos_menores" placeholder="Hijos menores de 25 años solteros o con discapacidad" value="<?php echo $persona->hijos_menores;?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="ciudad" class="form-control" placeholder="Ciudad" value="<?php echo $persona->ciudad;?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="celular" class="form-control" placeholder="Telefono celular" value="<?php echo $persona->celular;?>">
                                    </div>
                                    <div class="form-group">
                                        <select name="autorizo_envio" class="form-control">
                                            <option value="">Autorizo envio de informacion por correo electronico</option>
                                            <option value="1" <?php echo $persona->autorizo_envio == "1" ? "selected":"";?>>SI</option>
                                            <option value="2" <?php echo $persona->autorizo_envio == "2" ? "selected":"";?>>NO</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="poblacion_vulnerable" class="form-control">
                                            <option value="">Poblacion Vulnerable</option>
                                            <option value="1" <?php echo $persona->poblacion_vulnerable == "1" ? "selected":"";?>>SI</option>
                                            <option value="2" <?php echo $persona->poblacion_vulnerable == "2" ? "selected":"";?>>NO</option>
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
                                        <label class="radio-inline"><input type="radio" name="maneja_recursos" value="1" <?php echo $persona->maneja_recursos == 1 ? "checked":"";?>>Si</label>
                                        <label class="radio-inline"><input type="radio" name="maneja_recursos" value="0" <?php echo $persona->maneja_recursos == 0 ? "checked":"";?>>No</label> <br>
                                        <label class="radio-inline"><input type="radio" name="reconocimiento" value="1" <?php echo $persona->reconocimiento == 1 ? "checked":"";?>>Si</label>
                                        <label class="radio-inline"><input type="radio" name="reconocimiento" value="0" <?php echo $persona->reconocimiento == 0 ? "checked":"";?>>No</label> <br>
                                        <label class="radio-inline"><input type="radio" name="poder_publico" value="1" <?php echo $persona->poder_publico == 1 ? "checked":"";?>>Si</label>
                                        <label class="radio-inline"><input type="radio" name="poder_publico" value="0" <?php echo $persona->poder_publico == 0 ? "checked":"";?>>No</label> <br>
                                        <label class="radio-inline"><input type="radio" name="tiene_familiares" value="1" <?php echo $persona->tiene_familiares == 1 ? "checked":"";?>>Si</label>
                                        <label class="radio-inline"><input type="radio" name="tiene_familiares" value="0" <?php echo $persona->tiene_familiares == 0 ? "checked":"";?>>No</label>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <textarea name="especificacion" id="especificacion" rows="3" class="form-control" placeholder="Especifique..."><?php echo $persona->especificacion?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    Tiene familiares hasta segundo grado de afinidad y consanguinidad asociados a FESUN?
                                </div>
                                <div class="col-md-2">
                                    <label class="radio-inline"><input type="radio" name="familiares_asociados" value="1" <?php echo $persona->familiares_asociados == 1 ? "checked":"";?>>Si</label>
                                    <label class="radio-inline"><input type="radio" name="familiares_asociados" value="0" <?php echo $persona->familiares_asociados == 0 ? "checked":"";?>>No</label>
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
                                    <?php if (!empty($familiares)) :?>
                                        <?php foreach ($familiares as $f): ?>
                                        <tr>
                                            <td>
                                                <input type="text" class="form-control" name="familiares[]" value="<?php echo $f->nombres ?>">
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="parentesco[]" value="<?php echo $f->parentesco ?>">
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-delete-familiar"><span class="fa fa-times"></span></button>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                    <?php endif;?>
                                    
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
                                Información del Conyugue
                            
                            </h4>
                        </a>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                           <div class="row">
                               <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="pa_conyugue" placeholder="Primer Apellido" value="<?php echo $conyugue->primer_apellido;?>">
                                    </div>
                                    <div class="form-group">
                                        <select name="ti_conyugue" id="ti_conyugue" class="form-control">
                                            <option value="">Tipo Identificacion</option>
                                            <?php foreach ($tipoidentificaciones as $ti): ?>
                                                <option value="<?php echo $ti->id;?>" <?php echo $ti->id==$conyugue->tipo_identificacion?"selected":"";?>><?php echo $ti->tipoidentificacion?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="actividad_laboral" id="actividad_laboral" class="form-control">
                                            <option value="">Actividad Laboral</option>
                                            <?php foreach ($actividades as $a): ?>
                                                <option value="<?php echo $a->id;?>" <?php echo $a->id == $conyugue->actividad_laboral?"selected":"";?>><?php echo $a->actividad?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="empresa" class="form-control" placeholder="Empresa donde Trabaja" value="<?php echo $conyugue->empresa;?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="telefono_fijo" class="form-control" placeholder="Telefono fijo" value="<?php echo $conyugue->telefono;?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="ocupacion_c" placeholder="Ocupación" value="<?php echo $conyugue->ocupacion;?>">
                                    </div>
                               </div>
                               <div class="col-md-4">
                                   <div class="form-group">
                                        <input type="text" class="form-control" name="segundo_apellido_c" placeholder="Segundo Apellido" value="<?php echo $conyugue->segundo_apellido;?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="num_identicacion_c" placeholder="Numero de Identificacion" value="<?php echo $conyugue->num_identificacion;?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="salario_c" placeholder="Salario" value="<?php echo $conyugue->salario;?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="cargo_c" class="form-control" placeholder="Cargo" value="<?php echo $conyugue->cargo;?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="celular_c" class="form-control" placeholder="Celular" value="<?php echo $conyugue->celular;?>">
                                    </div>
                                    <div class="form-group">
                                        <select name="asociado_fesun_c" id="asociado_fesun_c" class="form-control">
                                            <option value="">Asociado a FESUN</option>
                                            <option value="1" <?php echo $conyugue->asociado_fesun==1?"selected":"";?>>SI</option>
                                            <option value="2" <?php echo $conyugue->asociado_fesun==0?"selected":"";?>>NO</option>
                                        </select>
                                    </div>
                               </div>
                               <div class="col-md-4">
                                   <div class="form-group">
                                        <input type="text" class="form-control" name="nombres_c" placeholder="Nombres" value="<?php echo $conyugue->nombres;?>">
                                    </div>
                                    <?php $fecnac = DateTime::createFromFormat('Y-m-d',$conyugue->fec_nacimiento); ?>
                                    <div class="form-group">
                                        <input type="text" name="fecha_nacimiento_c" class="form-control datepicker" placeholder="Fecha de Nacimiento" value="<?php echo $fecnac->format("d/m/Y");?>">
                                    </div>
                                    <div class="form-group">
                                        <select name="jornada_laboral" id="jornada_laboral" class="form-control">
                                            <option value="">Jornada Laboral</option>
                                            <option value="1" <?php echo $conyugue->jornada_laboral == 1 ? "selected":"";?>>Tiempo Total</option>
                                            <option value="2" <?php echo $conyugue->jornada_laboral == 2 ? "selected":"";?>>Tiempo Parcial</option>
                                            <option value="3" <?php echo $conyugue->jornada_laboral == 3 ? "selected":"";?>>No Aplica</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="antiguedad" class="form-control" placeholder="Antiguedad" value="<?php echo $conyugue->antiguedad;?>">
                                    </div>
                                    <div class="form-group">
                                        <select name="nivel_escolar_c" class="form-control">
                                            <option value="">Nivel de Escolaridad</option>
                                            <?php foreach ($nivelescolaridades as $ne): ?>
                                                <option value="<?php echo $ne->id?>" <?php echo $conyugue->nivel_escolar == $ne->id ? "selected":"";?>><?php echo $ne->nivel?></option>
                                            <?php endforeach ?>
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
                                Beneficiarios
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
                                            <?php foreach ($beneficiarios as $b): ?>
                                                <tr>
                                                <td>
                                                    <input type="text" name="nombres_b[]" class="form-control" placeholder="Nombres y Apellidos completos" value="<?php echo $b->nombres;?>">
                                                </td>
                                                <?php $fec_nac = DateTime::createFromFormat('Y-m-d',$b->fec_nacimiento); ?>
                                                <td>
                                                    <input type="text" name="fechas_b[]" class="form-control datepicker" placeholder="fecha de Nacimmiento" value="<?php echo $fec_nac->format("d/m/Y")?>">
                                                </td>
                                                <td>
                                                    <input type="text" name="identificaciones_b[]" class="form-control" placeholder="N° de Identificacion" value="<?php echo $b->num_identificacion?>">
                                                </td>
                                                <td>
                                                    <input type="text" name="parentescos_b[]" class="form-control" placeholder="Parentesco" value="<?php echo $b->parentesco?>">
                                                </td>
                                                <td>
                                                    <input type="text" name="telefonos_b[]" class="form-control" placeholder="Telefono/Celular" value="<?php echo $b->telefono?>">
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-danger btn-delete-beneficiario"><span class="fa fa-times"></span></button>
                                                </td>
                                                </tr>
                                            <?php endforeach ?>
                                            <tr>
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
                                            </tr>
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
                                Información Laboral
                            </h4>
                        </a>
                    </div>
                    <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="vinculacion_empresa" class="form-control " placeholder="Vinculación ala Empresa" value="<?php echo $laboral->vinculacion_empresa ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="municipio_laboral" class="form-control " placeholder="Municipio" value="<?php echo $laboral->municipio ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="tiempo_servicio" class="form-control" placeholder="Tiempo de Servicio" value="<?php echo $laboral->tiempo_servicio ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="fondo_pensiones" class="form-control" placeholder="Fondo Pensiones" value="<?php echo $laboral->fondo_pensiones ?>">
                                    </div>
                                </div>
                                <!-- fin de la columna 1-->
                                <div class="col-md-4">
                                    <?php $fecingreso = DateTime::createFromFormat('Y-m-d',$laboral->fecha_ingreso); ?>
                                    <div class="form-group">
                                        <input type="text" name="fecha_ingreso" class="form-control datepicker" placeholder="Fecha de Ingreso" value="<?php echo $fecingreso->format("d/m/Y")?>">
                                    </div>
                                    <div class="form-group">
                                        <select name="tipo_nomina" class="form-control">
                                            <option value="">Tipo de Nomina</option>
                                            <option value="1" <?php echo $laboral->tipo_nomina==1?"selected":"";?>>Mensual</option>
                                            <option value="2" <?php echo $laboral->tipo_nomina==2?"selected":"";?>>Quincenal</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="sueldo_basico" class="form-control" placeholder="Sueldo Basico" value="<?php echo $laboral->sueldo_basico ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="fondo_cesantias" class="form-control" placeholder="Fondo de Cesantias" value="<?php echo $laboral->fondo_cesantias ?>">
                                    </div>
                                </div>
                                <!-- fin de la columna 2-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="finca" class="form-control">
                                            <option value="">Finca</option>
                                            <?php foreach ($fincas as $f): ?>
                                                <option value="<?php echo $f->id;?>" <?php echo $laboral->finca==$f->id?"selected":"";?>><?php echo $f->nombre?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="tipo_contrato" class="form-control">
                                            <option value="">Tipo de Contrato</option>
                                            <option value="1" <?php echo $laboral->tipo_contrato==1?"selected":"";?>>T Fijo</option>
                                            <option value="2" <?php echo $laboral->tipo_contrato==1?"selected":"";?>>T Indefinido</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="cargo_laboral" class="form-control" placeholder="Cargo" value="<?php echo $laboral->cargo ?>">
                                    </div>
                                </div>
                                <!-- fin de la columna 3-->
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <textarea name="observaciones" id="observaciones"  rows="3" class="form-control" placeholder="Observaciones..."><?php echo $laboral->observaciones?></textarea>
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
                                Información Financiera
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
                                            <input type="text" class="form-control" name="ingreso_bruto" placeholder="Sueldo / Ingresos Brutos" value="<?php echo $financiera->ingreso_bruto?>">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="otros_ingresos" placeholder="Otros ingresos" value="<?php echo $financiera->otros_ingresos?>">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="descripcion_ingresos" placeholder="Descripcion otros ingresos" value="<?php echo $financiera->descripcion_ingresos?>">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="total_ingresos" placeholder="Total ingresos" value="<?php echo $financiera->total_ingresos?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-center">Egresos Mensuales</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="prestamos" placeholder="Prestamos / Hipotecas / Arriendos" value="<?php echo $financiera->prestamos?>">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" name="gastos_familiares" placeholder="Gastos Familiares" value="<?php echo $financiera->gastos_familiares?>">
                                        </td>
                                        <td>
                                            <input type="text" name="otros_gastos" class="form-control" placeholder="Otros Gastos" value="<?php echo $financiera->otros_gastos?>">
                                        </td>
                                        <td>
                                            <input type="text" name="total_egresos" class="form-control" placeholder="Total egresos" value="<?php echo $financiera->total_egresos?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-center">Obligaciones Mensuales</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" name="bancos" placeholder="Bancos" value="<?php echo $financiera->bancos?>">
                                        </td>
                                        <td>
                                            <input type="text" name="corporaciones" class="form-control" placeholder="Corporaciones" value="<?php echo $financiera->corporaciones?>">
                                        </td>
                                        <td>
                                            <input type="text" name="personales" class="form-control" placeholder="Personales" value="<?php echo $financiera->personales?>">
                                        </td>
                                        <td>
                                            <input type="text" name="total_obligaciones" class="form-control" placeholder="Total obligaciones" value="<?php echo $financiera->total_obligaciones?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-center">Balance General</th>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <input type="text" name="activos_propiedades" class="form-control" placeholder="Activos:Valor de las Propiedades" value="<?php echo $financiera->activos_propiedades?>">
                                        </td>
                                        <td colspan="2">
                                            <input type="text" name="pasivos_obligaciones" class="form-control" placeholder="Pasivo: Saldo de las Obligaciones" value="<?php echo $financiera->pasivos_obligaciones?>">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="cuenta_bancaria" id="cuenta_bancaria" class="form-control">
                                            <option value="">Tiene cuenta bancaria?</option>
                                            <option value="1" <?php echo $financiera->cuenta_bancaria == 1?"selected":"";?>>SI</option>
                                            <option value="2" <?php echo $financiera->cuenta_bancaria == 2?"selected":"";?>>NO</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="operacion_extranjera" id="operacion_extranjera" class="form-control">
                                            <option value="">Realiza Operaciones en Moneda Extranjera?</option>
                                            <option value="1" <?php echo $financiera->operaciones_extranjeras == 1?"selected":"";?>>SI</option>
                                            <option value="2" <?php echo $financiera->operaciones_extranjeras == 2?"selected":"";?>>NO</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="banco" class="form-control" placeholder="Banco" value="<?php echo $financiera->banco?>">
                                    </div>
                                </div><!-- Fin de la columna 1-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" name="entidad" class="form-control" placeholder="Entidad" value="<?php echo $financiera->entidad?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="pais" class="form-control" placeholder="Pais" value="<?php echo $financiera->pais?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="cuenta" class="form-control" placeholder="Cuenta" value="<?php echo $financiera->cuenta?>">
                                    </div>
                                </div><!-- Fin de la columna 2-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="tipo_cuenta" id="tipo_cuenta" class="form-control">
                                            <option value="">tipo de Cuenta</option>
                                            <option value="1" <?php echo $financiera->tipo_cuenta == 1?"selected":"";?>>Ahorro</option>
                                            <option value="2" <?php echo $financiera->tipo_cuenta == 2?"selected":"";?>>Corriente</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="moneda_extranjera" id="moneda_extranjera" class="form-control"> 
                                            <option value="">Cuenta con moneda Extrajera?</option>
                                            <option value="1" <?php echo $financiera->moneda_extranjera == 1?"selected":"";?>>SI</option>
                                            <option value="2" <?php echo $financiera->moneda_extranjera == 2?"selected":"";?>>NO</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="declara_renta" id="declara_renta" class="form-control">
                                            <option value="">Declara renta?</option>
                                            <option value="1" <?php echo $financiera->declara_renta == 1?"selected":"";?>>SI</option>
                                            <option value="2" <?php echo $financiera->declara_renta == 2?"selected":"";?>>NO</option>
                                        </select>
                                    </div>
                                </div><!-- Fin de la columna 3-->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading" role="tab" id="headingSix">
                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                            <h4 class="panel-title">
                                <i class="more-less glyphicon glyphicon-plus"></i>
                                DESCRIPCION DE LOS ACTIVOS
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
                                            <input type="text" name="marca" class="form-control" placeholder="Marca" value="<?php echo $activo->marca?>">
                                        </td>
                                        <td>
                                            <input type="text" name="modelo" class="form-control" placeholder="Modelo" value="<?php echo $activo->modelo?>">
                                        </td>
                                        <td>
                                            <input type="text" name="placa" class="form-control" placeholder="Placa" value="<?php echo $activo->placa?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="valor" class="form-control" placeholder="Valor $" value="<?php echo $activo->valor?>">
                                        </td>
                                        <td>
                                            <select name="pignoracion" id="pignoracion" class="form-control">
                                                <option value="">Pignoracion</option>
                                                <option value="1" <?php echo $activo->pignoracion==1?"selected":"";?>>SI</option>
                                                <option value="2" <?php echo $activo->pignoracion==2?"selected":"";?>>NO</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name="entidad_pignorado" class="form-control" placeholder="Entidad ala cual se encuentra pignorado" value="<?php echo $activo->entidad_pignorado?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="3" class="text-center">BIENES RAICES</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="tipo_bien" class="form-control" placeholder="Tipo de Bien" value="<?php echo $activo->tipo_bien?>">
                                        </td>
                                        <td>
                                            <input type="text" name="direccion" class="form-control" placeholder="Direccion" value="<?php echo $activo->direccion?>">
                                        </td>
                                        <td>
                                            <select name="dep_raices" id="dep_raices" class="form-control">
                                                <option value="">Departamento</option>
                                                <?php foreach ($departamentos as $dep): ?>
                                                    <option value="<?php  echo $dep->id_departamento?>" <?php echo $dep->id_departamento == $activo->departamento?"selected":"";?>><?php echo $dep->departamento?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <select name="ciudad_raices" id="ciudad_raices" class="form-control">
                                                <option value="">Ciudad</option>
                                                <?php foreach ($municipiosraiz as $mr): ?>
                                                    <option value="<?php echo $mr->id_municipio?>" <?php echo $mr->id_municipio == $activo->ciudad?"selected":"";?>><?php echo $mr->municipio;?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name="valor_comercial" class="form-control" placeholder="Valor comercial $" value="<?php echo $activo->valor_comercial?>">
                                        </td>
                                        <td>
                                            <input type="text" name="matricula_inmobilaria" class="form-control" placeholder="Matricula Inmobilaria" value="<?php echo $activo->matricula_inmobilaria?>">
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td>
                                            <select name="hipoteca" id="hipoteca" class="form-control">
                                                <option value="">Hipoteca</option>
                                                <option value="1" <?php echo $activo->hipoteca==1?"selected":"";?>>SI</option>
                                                <option value="2" <?php echo $activo->hipoteca==2?"selected":"";?>>NO</option>
                                            </select>
                                        </td>
                                        <td colspan="2">
                                            <input type="text" name="entidad_hipotecada" class="form-control" placeholder="Entidad ala cual se encuentra Hipotecada" value="<?php echo $activo->entidad_hipotecada?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <textarea name="otros_activos" id="otros_activos"  rows="3" placeholder="Otros Activos" class="form-control"><?php echo $activo->otros_activos?></textarea>
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
                                INFORMACION DE PRODUCTOS A TOMAR
                            </h4>
                        </a>
                    </div>
                    <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ahorros">Ahorros</label>
                                        <select name="ahorros[]" id="ahorros" class="select2 form-control" multiple="multiple" data-placeholder="Seleccione" style="width: 100%;" required="required">
                                            <?php foreach ($ahorros as $a): ?>

                                                <?php 
                                                    $selected ="";

                                                    foreach($productos as $p){
                                                        if ($p->ahorro_id == $a->id) {
                                                            $selected = "selected";
                                                        }
                                                    }

                                                ?>

                                                <option value="<?php echo $a->id ?>" <?php echo $selected;?>><?php echo $a->nombre;?></option>
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
                                REFERENCIAS PERSONAL COMERCIAL
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
                                            <input type="text" name="nombres_referencias[]" class="form-control" placeholder="Nombres y Apellidos" value="<?php echo $referencias[0]->nombres?>">
                                        </td>
                                        <td>
                                            <input type="text" name="parentesco_referencias[]" class="form-control" placeholder="Parentesco" value="<?php echo $referencias[0]->parentesco?>">
                                        </td>
                                        <td>
                                            <input type="text" name="telefono_referencias[]" class="form-control" placeholder="Telefono" value="<?php echo $referencias[0]->telefono?>">
                                        </td>
                                        <td>
                                            <input type="text" name="celular_referencias[]" class="form-control" placeholder="Celular" value="<?php echo $referencias[0]->celular?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="nombres_referencias[]" class="form-control" placeholder="Nombres y Apellidos" value="<?php echo $referencias[1]->nombres?>">
                                        </td>
                                        <td>
                                            <input type="text" name="parentesco_referencias[]" class="form-control" placeholder="Parentesco" value="<?php echo $referencias[1]->parentesco?>">
                                        </td>
                                        <td>
                                            <input type="text" name="telefono_referencias[]" class="form-control" placeholder="Telefono" value="<?php echo $referencias[1]->telefono?>">
                                        </td>
                                        <td>
                                            <input type="text" name="celular_referencias[]" class="form-control" placeholder="Celular" value="<?php echo $referencias[1]->celular?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-center">Referencias Comerciales/Personal</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="nombres_referencias[]" class="form-control" placeholder="Nombres y Apellidos" value="<?php echo $referencias[2]->nombres?>">
                                        </td>
                                        <td>
                                            <input type="text" name="parentesco_referencias[]" class="form-control" placeholder="Parentesco" value="<?php echo $referencias[2]->parentesco?>">
                                        </td>
                                        <td>
                                            <input type="text" name="telefono_referencias[]" class="form-control" placeholder="Telefono" value="<?php echo $referencias[2]->telefono?>">
                                        </td>
                                        <td>
                                            <input type="text" name="celular_referencias[]" class="form-control" placeholder="Celular" value="<?php echo $referencias[2]->celular?>">
                                        </td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- panel-group -->  
            <input type="submit" name="guardar" value="Guardar" class="btn btn-success btn-lg"> 
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