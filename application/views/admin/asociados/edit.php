<section class="content-header">
    <h1>
        Asociados <small> Editar</small>
    </h1>

</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <form action="<?php echo base_url(); ?>backend/asociados/update" method="POST" >
        <input type="hidden" name="idAsociado" value="<?php echo $asociado->id;?>">
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
                                        <label>Primer Apellido</label>
                                        <input type="text" class="form-control" name="primer_apellido" placeholder="Primer Apellido" required="required" value="<?php echo $asociado->primer_apellido?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Tipo de Identificacion</label>
                                        <select name="tipo_identificacion" id="tipo_identificacion" class="form-control" required="required">
                                            <option value="">Seleccione...</option>
                                            <?php foreach ($tipoidentificaciones as $ti): ?>
                                                <option value="<?php echo $ti->id;?>" <?php echo $asociado->tipo_identificacion == $ti->id ? "selected":"";?>><?php echo $ti->tipoidentificacion?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Lugar de Expedición(Municipio)</label>
                                        <select name="municipio" id="municipio" class="form-control" required="required">
                                            <option value="">Seleccione..</option>
                                            <?php foreach ($municipiosexp as $me): ?>
                                                <option value="<?php echo $me->id_municipio;?>" <?php echo $me->id_municipio == $asociado->municipio?"selected":"";?>><?php echo $me->municipio?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <?php $fec_expedicion = DateTime::createFromFormat('Y-m-d',$asociado->fec_expedicion); ?>
                                    <div class="form-group">
                                        <label>Fecha Expedicion</label>
                                        <input type="text" class="form-control datepicker" name="fec_expedicion" placeholder="Fecha Expedicion" required="required" value="<?php echo $fec_expedicion->format("d/m/Y");?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Lugar de Nacimiento(Departamento)</label>
                                        <select name="dep_nacimiento" id="dep_nacimiento" class="form-control" required="required">
                                            <option value="">Seleccione..</option>
                                            <?php foreach ($departamentos as $dep): ?>
                                                <option value="<?php  echo $dep->id_departamento?>" <?php echo $dep->id_departamento == $asociado->dep_nacimiento?"selected":"";?>><?php echo $dep->departamento?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Profesion</label>
                                        <input type="text" name="profesion" class="form-control" placeholder="Profesion" value="<?php echo $asociado->profesion;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Zona de Ubicación</label>
                                        <select name="zona_ubicacion" class="form-control" required="required">
                                            <option value="">Selecione...</option>
                                            <option value="1" <?php echo $asociado->zona_ubicacion==1?"selected":"";?>>Urbana</option>
                                            <option value="2" <?php echo $asociado->zona_ubicacion==2?"selected":"";?>>Rural</option>
                                        </select>
                                    </div>
                                     <div class="form-group">
                                        <label for="">Cabecera de Hogar</label>
                                        <select name="cabeza_hogar" class="form-control" required="required">
                                            <option value="">Indique</option>
                                            <option value="1" <?php echo $asociado->cabeza_hogar==1?"selected":"";?>>SI</option>
                                            <option value="2" <?php echo $asociado->cabeza_hogar==2?"selected":"";?>>No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Dirección de Residencia</label>
                                        <input type="text" name="direcion_residencia" class="form-control" placeholder="Direción de Residencia" required="required" value="<?php echo $asociado->direccion_residencia;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Telefono</label>
                                        <input type="text" name="telefono" class="form-control" placeholder="Telefono" value="<?php echo $asociado->telefono;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Vinculado a otro fondo de empleados</label>
                                        <select name="vinculado_fondo" id="vinculado_fondo" class="form-control" required="required">
                                            <option value="">Indique</option>
                                            <option value="1" <?php echo $asociado->vinculado_fondo==1?"selected":"";?>>SI</option>
                                            <option value="2" <?php echo $asociado->vinculado_fondo==2?"selected":"";?>>No</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tipo de Poblacion</label>
                                        <select name="tipo_poblacion" id="tipo_poblacion" class="form-control" required="required">
                                            <option value="">Seleccione..</option>
                                            <option value="1" <?php echo $asociado->tipo_poblacion==1?"selected":"";?>>Etnica</option>
                                            <option value="2" <?php echo $asociado->tipo_poblacion==2?"selected":"";?>>Afectada por la Violencia</option>
                                            <option value="3"<?php echo $asociado->tipo_poblacion==3?"selected":"";?>>Otro</option>
                                        </select>
                                    </div>
                                    
                                </div>
                                <!-- Columna 2-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Segundo Apellido</label>
                                        <input type="text" class="form-control" name="segundo_apellido" placeholder="Segundo Apellido" required="required" value="<?php echo $asociado->segundo_apellido;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Numero de Identificacion</label>
                                        <input type="text" class="form-control" name="num_identificacion" placeholder="Numero de Identificacion" required="required" value="<?php echo $asociado->num_identificacion;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Sexo</label>
                                        <select name="genero" class="form-control" required="required">
                                            <option value="">Indique</option>
                                            <option value="M" <?php echo $asociado->genero == "M" ? "selected":"";?>>Masculino</option>
                                            <option value="F" <?php echo $asociado->genero == "F" ? "selected":"";?>>Femenino</option>
                                        </select>
                                    </div>
                                    <?php $fecha_nacimiento = DateTime::createFromFormat('Y-m-d',$asociado->fecha_nacimiento); ?>
                                    <div class="form-group">
                                        <label for="">Fecha de Nacimiento</label>
                                        <input type="text" name="fecha_nacimiento" class="form-control datepicker" placeholder="Fecha de Nacimiento" required="required" value="<?php echo $fecha_nacimiento->format("d/m/Y");?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Lugar de Nacimiento(Municipio)</label>
                                        <select name="mun_nacimiento" id="mun_nacimiento" class="form-control" required="required">
                                            <option value="">Seleccione</option>
                                            <?php foreach ($municipiosnac as $mc): ?>
                                                <option value="<?php echo $mc->id_municipio;?>" <?php echo $mc->id_municipio == $asociado->mun_nacimiento?"selected":"";?>><?php echo $mc->municipio?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Ocupación</label>
                                        <input type="text" class="form-control" name="ocupacion" placeholder="Ocupación" value="<?php echo $asociado->ocupacion;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tiempo de Residencia en la ubicacion</label>
                                        <input type="text" class="form-control" name="tiempo_residencia" placeholder="Tiempo de Residencia en la ubicacion" value="<?php echo $asociado->tiempo_residencia;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Personas que dependan economicamente</label>
                                        <input type="text" class="form-control" name="personas_dependientes" placeholder="Personas que dependan economicamente" value="<?php echo $asociado->personas_dependientes;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Barrio/Vereda</label>
                                        <input type="text" name="barrio" class="form-control" placeholder="Barrio/Vereda" required="required" value="<?php echo $asociado->barrio;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Correo Electronico</label>
                                        <input type="text" name="correo" class="form-control" placeholder="Correo Electronico" value="<?php echo $asociado->correo;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nombre de Entidad</label>
                                        <input type="text" name="nombre_entidad" id="nombre_entidad" class="form-control" placeholder="Nombre de Entidad" disabled="disabled" value="<?php echo $asociado->nombre_entidad;?>">
                                    </div>
                                     <div class="form-group">
                                        <label for="">Indique tipo población</label>
                                        <input type="text" name="otra_poblacion" id="otra_poblacion" class="form-control" placeholder="Indique tipo población" disabled="disabled"  value="<?php echo $asociado->otra_poblacion;?>">
                                    </div>

                                    
                                </div>
                                <!-- Columna 3-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombres</label>
                                        <input type="text" class="form-control" name="nombres" placeholder="Nombres" required="required"  value="<?php echo $asociado->nombres;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Departamento</label>
                                        <select name="departamento" id="departamento" class="form-control" required="required">
                                            <option value="">Lugar de Expedicion(Departamento)</option>
                                            <?php foreach ($departamentos as $d): ?>
                                                <option value="<?php echo $d->id_departamento;?>" <?php echo $d->id_departamento == $asociado->departamento?"selected":"";?>><?php echo $d->departamento;?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Estado Civil</label>
                                        <select name="estado_civil" class="form-control" required="required">
                                            <option value="">Seleccione..</option>
                                            <?php foreach ($estadosciviles as $ec): ?>
                                                <option value="<?php  echo $ec->id;?>" <?php echo $ec->id == $asociado->estado_civil?"selected":"";?>><?php echo $ec->nombre;?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nivel de Escolaridad</label>
                                        <select name="nivel_escolar" class="form-control" required="required">
                                            <option value="">Indique</option>
                                             <?php foreach ($nivelescolaridades as $ne): ?>
                                                <option value="<?php echo $ne->id?>" <?php echo $ne->id == $asociado->nivel_escolar?"selected":"";?>><?php echo $ne->nivel?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Vivienda</label>
                                        <select name="vivienda" class="form-control" required="required">
                                            <option value="">Indique</option>
                                            <?php foreach ($viviendas as $v): ?>
                                                <option value="<?php echo $v->id?>" <?php echo $v->id == $asociado->vivienda?"selected":"";?>><?php echo $v->vivienda?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Numeros de Hijos</label>
                                        <input type="text" class="form-control" name="numero_hijos" placeholder="Numeros de Hijos" value="<?php echo $asociado->numero_hijos;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Hijos menores de 25 años solteros o con discapacidad</label>
                                        <input type="text" class="form-control" name="hijos_menores" placeholder="Hijos menores de 25 años solteros o con discapacidad" value="<?php echo $asociado->hijos_menores;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Ciudad</label>
                                        <input type="text" name="ciudad" class="form-control" placeholder="Ciudad" required="required" value="<?php echo $asociado->ciudad;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Telefono celular</label>
                                        <input type="text" name="celular" class="form-control" placeholder="Telefono celular" value="<?php echo $asociado->celular;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Autorizo envio de informacion por correo electronico</label>
                                        <select name="autorizo_envio" class="form-control" required="required">
                                            <option value="">Indique</option>
                                            <option value="1" <?php echo $asociado->autorizo_envio == "1" ? "selected":"";?>>SI</option>
                                            <option value="2" <?php echo $asociado->autorizo_envio == "2" ? "selected":"";?>>NO</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Poblacion Vulnerable</label>
                                        <select name="poblacion_vulnerable" class="form-control" required="required">
                                            <option value="">Indique</option>
                                            <option value="1" <?php echo $asociado->poblacion_vulnerable == "1" ? "selected":"";?>>SI</option>
                                            <option value="2" <?php echo $asociado->poblacion_vulnerable == "2" ? "selected":"";?>>NO</option>
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
                                        <label class="radio-inline"><input type="radio" name="maneja_recursos" value="1" required="required" <?php echo $asociado->maneja_recursos == 1 ? "checked":"";?>>Si</label>
                                        <label class="radio-inline"><input type="radio" name="maneja_recursos" value="0" <?php echo $asociado->maneja_recursos == 0 ? "checked":"";?>>No</label> <br>
                                        <label class="radio-inline"><input type="radio" name="reconocimiento" value="1" required="required" <?php echo $asociado->reconocimiento == 1 ? "checked":"";?>>Si</label>
                                        <label class="radio-inline"><input type="radio" name="reconocimiento" value="0" <?php echo $asociado->reconocimiento == 0 ? "checked":"";?>>No</label> <br>
                                        <label class="radio-inline"><input type="radio" name="poder_publico" value="1" <?php echo $asociado->poder_publico == 1 ? "checked":"";?> required="required">Si</label>
                                        <label class="radio-inline"><input type="radio" name="poder_publico" value="0" <?php echo $asociado->poder_publico == 0 ? "checked":"";?>>No</label> <br>
                                        <label class="radio-inline"><input type="radio" name="tiene_familiares" value="1" <?php echo $asociado->tiene_familiares == 1 ? "checked":"";?> required="required">Si</label>
                                        <label class="radio-inline"><input type="radio" name="tiene_familiares" value="0" <?php echo $asociado->tiene_familiares == 0 ? "checked":"";?>>No</label>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="">Especificaciones</label>
                                    <textarea name="especificacion" id="especificacion" rows="3" class="form-control" placeholder="Especifique..."><?php echo $asociado->especificacion?></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    Tiene familiares hasta segundo grado de afinidad y consanguinidad asociados a FESUN?
                                </div>
                                <div class="col-md-2">
                                    <label class="radio-inline"><input type="radio" name="familiares_asociados" value="1" <?php echo $asociado->familiares_asociados == 1 ? "checked":"";?> required="required">Si</label>
                                    <label class="radio-inline"><input type="radio" name="familiares_asociados" value="0" <?php echo $asociado->familiares_asociados == 0 ? "checked":"";?>>No</label>
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
                                Información del Conyuge
                            
                            </h4>
                        </a>
                    </div>
                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                           <div class="row">
                               <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Primer Apellido</label>
                                        <input type="text" class="form-control" name="pa_conyugue" placeholder="Primer Apellido"  value="<?php echo $asociado->primer_apellido_conyuge;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tipo Identificacion</label>
                                        <select name="ti_conyugue" id="ti_conyugue" class="form-control" >
                                            <option value="">Seleccione..</option>
                                            <?php foreach ($tipoidentificaciones as $ti): ?>
                                                <option value="<?php echo $ti->id;?>" <?php echo $ti->id==$asociado->tipo_identificacion_conyuge?"selected":"";?>><?php echo $ti->tipoidentificacion?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Actividad Laboral</label>
                                        <select name="actividad_laboral" id="actividad_laboral" class="form-control">
                                            <option value="">Seleccione..</option>
                                            <?php foreach ($actividades as $a): ?>
                                                <option value="<?php echo $a->id;?>" <?php echo $a->id == $asociado->actividad_laboral_conyuge?"selected":"";?>><?php echo $a->actividad?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Empresa donde Trabaja</label>
                                        <input type="text" name="empresa" class="form-control" placeholder="Empresa donde Trabaja" value="<?php echo $asociado->empresa_conyuge;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Telefono fijo</label>
                                        <input type="text" name="telefono_fijo" class="form-control" placeholder="Telefono fijo" value="<?php echo $asociado->telefono_conyuge;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Ocupación</label>
                                        <input type="text" class="form-control" name="ocupacion_c" placeholder="Ocupación" value="<?php echo $asociado->ocupacion_conyuge;?>">
                                    </div>
                               </div>
                               <div class="col-md-4">
                                   <div class="form-group">
                                        <label for="">Segundo Apellido</label>
                                        <input type="text" class="form-control" name="segundo_apellido_c" placeholder="Segundo Apellido" value="<?php echo $asociado->segundo_apellido_conyuge;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Numero de Identificacion</label>
                                        <input type="text" class="form-control" name="num_identificacion_c" placeholder="Numero de Identificacion" value="<?php echo $asociado->num_identificacion_conyuge;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Salario</label>
                                        <input type="text" class="form-control" name="salario_c" placeholder="Salario" value="<?php echo $asociado->salario_conyuge;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Cargo</label>
                                        <input type="text" name="cargo_c" class="form-control" placeholder="Cargo" value="<?php echo $asociado->cargo_conyuge;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Celular</label>
                                        <input type="text" name="celular_c" class="form-control" placeholder="Celular" value="<?php echo $asociado->celular_conyuge;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Asociado a FESUN</label>
                                        <select name="asociado_fesun_c" id="asociado_fesun_c" class="form-control">
                                            <option value="">Indique</option>
                                            <option value="1" <?php echo $asociado->asociado_fesun_conyuge==1?"selected":"";?>>SI</option>
                                            <option value="2" <?php echo $asociado->asociado_fesun_conyuge==0?"selected":"";?>>NO</option>
                                        </select>
                                    </div>
                               </div>
                               <div class="col-md-4">
                                   <div class="form-group">
                                        <label for="">Nombres</label>
                                        <input type="text" class="form-control" name="nombres_c" placeholder="Nombres"  value="<?php echo $asociado->nombres_conyuge;?>">
                                    </div>
                                    <?php
                                        $fecnac = '';
                                        if (strtotime($asociado->fec_nacimiento_conyuge)!=0) {
                                            $fecnac = DateTime::createFromFormat('Y-m-d',$asociado->fec_nacimiento_conyuge)->format("d/m/Y"); 
                                        } 
                                    ?>
                                    <div class="form-group">
                                        <label for="">Fecha de Nacimiento</label>
                                        <input type="text" name="fecha_nacimiento_c" class="form-control datepicker" placeholder="Fecha de Nacimiento"  value="<?php echo $fecnac;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jornada Laboral</label>
                                        <select name="jornada_laboral" id="jornada_laboral" class="form-control">
                                            <option value="">Indique</option>
                                            <option value="1" <?php echo $asociado->jornada_laboral_conyuge == 1 ? "selected":"";?>>Tiempo Total</option>
                                            <option value="2" <?php echo $asociado->jornada_laboral_conyuge == 2 ? "selected":"";?>>Tiempo Parcial</option>
                                            <option value="3" <?php echo $asociado->jornada_laboral_conyuge == 3 ? "selected":"";?>>No Aplica</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Antiguedad</label>
                                        <input type="text" name="antiguedad" class="form-control" placeholder="Antiguedad" value="<?php echo $asociado->antiguedad_conyuge;?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nivel de Escolaridad</label>
                                        <select name="nivel_escolar_c" class="form-control">
                                            <option value="">Seleccione..</option>
                                            <?php foreach ($nivelescolaridades as $ne): ?>
                                                <option value="<?php echo $ne->id?>" <?php echo $asociado->nivel_escolar_conyuge == $ne->id ? "selected":"";?>><?php echo $ne->nivel?></option>
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
                                            <?php if (!empty($beneficiarios)): ?>
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
                                            <?php endif ?>
                                            
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
                                        <input type="text" name="vinculacion_empresa" class="form-control " placeholder="Vinculación ala Empresa" value="<?php echo $asociado->vinculacion_empresa ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Municipio</label>
                                        <input type="text" name="municipio_laboral" class="form-control " placeholder="Municipio" required="required" value="<?php echo $asociado->municipio_laboral ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tiempo de Servicio</label>
                                        <input type="text" name="tiempo_servicio" class="form-control" placeholder="Tiempo de Servicio" value="<?php echo $asociado->tiempo_servicio ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Fondo Pensiones</label>
                                        <input type="text" name="fondo_pensiones" class="form-control" placeholder="Fondo Pensiones" value="<?php echo $asociado->fondo_pensiones ?>">
                                    </div>
                                </div>
                                <!-- fin de la columna 1-->
                                <div class="col-md-4">
                                    <?php $fecingreso = DateTime::createFromFormat('Y-m-d',$asociado->fecha_ingreso); ?>
                                    <div class="form-group">
                                        <label for="">Fecha de Ingreso</label>
                                        <input type="text" name="fecha_ingreso" class="form-control datepicker" placeholder="Fecha de Ingreso" required="required" value="<?php echo $fecingreso->format("d/m/Y")?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tipo de Nomina</label>
                                        <select name="tipo_nomina" class="form-control">
                                            <option value="">Indique</option>
                                            <option value="1" <?php echo $asociado->tipo_nomina==1?"selected":"";?>>Mensual</option>
                                            <option value="2" <?php echo $asociado->tipo_nomina==2?"selected":"";?>>Quincenal</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Sueldo Basico</label>
                                        <input type="text" name="sueldo_basico" class="form-control" placeholder="Sueldo Basico"  value="<?php echo $asociado->sueldo_basico ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Fondo de Cesantias</label>
                                        <input type="text" name="fondo_cesantias" class="form-control" placeholder="Fondo de Cesantias" value="<?php echo $asociado->fondo_cesantias ?>">
                                    </div>
                                </div>
                                <!-- fin de la columna 2-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Finca</label>
                                        <select name="finca" class="form-control" required="required">
                                            <option value="">Seleccione..</option>
                                            <?php foreach ($fincas as $f): ?>
                                                <option value="<?php echo $f->id;?>" <?php echo $asociado->finca==$f->id?"selected":"";?>><?php echo $f->nombre?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tipo de Contrato</label>
                                        <select name="tipo_contrato" class="form-control" required="">
                                            <option value="">Indique</option>
                                            <option value="1" <?php echo $asociado->tipo_contrato==1?"selected":"";?>>T Fijo</option>
                                            <option value="2" <?php echo $asociado->tipo_contrato==2?"selected":"";?>>T Indefinido</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Cargo</label>
                                        <input type="text" name="cargo_laboral" class="form-control" placeholder="Cargo" value="<?php echo $asociado->cargo ?>">
                                    </div>
                                </div>
                                <!-- fin de la columna 3-->
                            </div>
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <label for="">Observaciones</label>
                                    <textarea name="observaciones" id="observaciones"  rows="3" class="form-control" placeholder="Observaciones..."><?php echo $asociado->observaciones_laboral?></textarea>
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
                                            <input type="text" class="form-control" name="ingreso_bruto" placeholder="Sueldo / Ingresos Brutos" value="<?php echo $asociado->ingreso_bruto?>">
                                        </td>
                                        <td>
                                            <label for="">Otros ingresos</label>
                                            <input type="text" class="form-control" name="otros_ingresos" placeholder="Otros ingresos" value="<?php echo $asociado->otros_ingresos?>">
                                        </td>
                                        <td>
                                            <label for="">Descripcion otros ingresos</label>
                                            <input type="text" class="form-control" name="descripcion_ingresos" placeholder="Descripcion otros ingresos" value="<?php echo $asociado->descripcion_ingresos?>">
                                        </td>
                                        <td>
                                            <label for="">Total ingresos</label>
                                            <input type="text" class="form-control" name="total_ingresos" placeholder="Total ingresos" value="<?php echo $asociado->total_ingresos?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-center">Egresos Mensuales</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Prestamos / Hipotecas / Arriendos</label>
                                            <input type="text" class="form-control" name="prestamos" placeholder="Prestamos / Hipotecas / Arriendos" value="<?php echo $asociado->prestamos?>">
                                        </td>
                                        <td>
                                            <label for="">Gastos Familiares</label>
                                            <input type="text" class="form-control" name="gastos_familiares" placeholder="Gastos Familiares" value="<?php echo $asociado->gastos_familiares?>">
                                        </td>
                                        <td>
                                            <label for="">Otros Gastos</label>
                                            <input type="text" name="otros_gastos" class="form-control" placeholder="Otros Gastos" value="<?php echo $asociado->otros_gastos?>">
                                        </td>
                                        <td>
                                            <label for="">Total egresos</label>
                                            <input type="text" name="total_egresos" class="form-control" placeholder="Total egresos" value="<?php echo $asociado->total_egresos?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-center">Obligaciones Mensuales</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Bancos</label>
                                            <input type="text" class="form-control" name="bancos" placeholder="Bancos" value="<?php echo $asociado->bancos?>">
                                        </td>
                                        <td>
                                            <label for="">Corporaciones</label>
                                            <input type="text" name="corporaciones" class="form-control" placeholder="Corporaciones" value="<?php echo $asociado->corporaciones?>">
                                        </td>
                                        <td>
                                            <label for="">Personales</label>
                                            <input type="text" name="personales" class="form-control" placeholder="Personales" value="<?php echo $asociado->personales?>">
                                        </td>
                                        <td>
                                            <label for="">Total obligaciones</label>
                                            <input type="text" name="total_obligaciones" class="form-control" placeholder="Total obligaciones" value="<?php echo $asociado->total_obligaciones?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-center">Balance General</th>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <label for="">Activos:Valor de las Propiedades</label>
                                            <input type="text" name="activos_propiedades" class="form-control" placeholder="Activos:Valor de las Propiedades" value="<?php echo $asociado->activos_propiedades?>">
                                        </td>
                                        <td colspan="2">
                                            <label for="">Pasivo: Saldo de las Obligaciones</label>
                                            <input type="text" name="pasivos_obligaciones" class="form-control" placeholder="Pasivo: Saldo de las Obligaciones" value="<?php echo $asociado->pasivos_obligaciones?>">
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
                                            <option value="1" <?php echo $asociado->cuenta_bancaria == 1?"selected":"";?>>SI</option>
                                            <option value="2" <?php echo $asociado->cuenta_bancaria == 2?"selected":"";?>>NO</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Realiza Operaciones en Moneda Extranjera?</label>
                                        <select name="operacion_extranjera" id="operacion_extranjera" class="form-control">
                                            <option value="">Indique</option>
                                            <option value="1" <?php echo $asociado->operaciones_extranjeras == 1?"selected":"";?>>SI</option>
                                            <option value="2" <?php echo $asociado->operaciones_extranjeras == 2?"selected":"";?>>NO</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Banco</label>
                                        <input type="text" name="banco" class="form-control" placeholder="Banco" value="<?php echo $asociado->banco?>">
                                    </div>
                                </div><!-- Fin de la columna 1-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Entidad</label>
                                        <input type="text" name="entidad" class="form-control" placeholder="Entidad" value="<?php echo $asociado->entidad?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Pais</label>
                                        <input type="text" name="pais" class="form-control" placeholder="Pais" value="<?php echo $asociado->pais?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Cuenta</label>
                                        <input type="text" name="cuenta" class="form-control" placeholder="Cuenta" value="<?php echo $asociado->cuenta?>">
                                    </div>
                                </div><!-- Fin de la columna 2-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Tipo de Cuenta</label>
                                        <select name="tipo_cuenta" id="tipo_cuenta" class="form-control">
                                            <option value="">Indique</option>
                                            <option value="1" <?php echo $asociado->tipo_cuenta == 1?"selected":"";?>>Ahorro</option>
                                            <option value="2" <?php echo $asociado->tipo_cuenta == 2?"selected":"";?>>Corriente</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Cuenta con moneda Extrajera?</label>
                                        <select name="moneda_extranjera" id="moneda_extranjera" class="form-control"> 
                                            <option value="">Indique</option>
                                            <option value="1" <?php echo $asociado->moneda_extranjera == 1?"selected":"";?>>SI</option>
                                            <option value="2" <?php echo $asociado->moneda_extranjera == 2?"selected":"";?>>NO</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Declara renta?</label>
                                        <select name="declara_renta" id="declara_renta" class="form-control">
                                            <option value="">Indique</option>
                                            <option value="1" <?php echo $asociado->declara_renta == 1?"selected":"";?>>SI</option>
                                            <option value="2" <?php echo $asociado->declara_renta == 2?"selected":"";?>>NO</option>
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
                                6.DESCRIPCION DE LOS ACTIVOS
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
                                            <input type="text" name="marca" class="form-control" placeholder="Marca" value="<?php echo $asociado->marca?>">
                                        </td>
                                        <td>
                                            <label for="">Modelo</label>
                                            <input type="text" name="modelo" class="form-control" placeholder="Modelo" value="<?php echo $asociado->modelo?>">
                                        </td>
                                        <td>
                                            <label for="">Placa</label>
                                            <input type="text" name="placa" class="form-control" placeholder="Placa" value="<?php echo $asociado->placa?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Valor $</label>
                                            <input type="text" name="valor" class="form-control" placeholder="Valor $" value="<?php echo $asociado->valor?>">
                                        </td>
                                        <td>
                                            <label for="">Pignoracion</label>
                                            <select name="pignoracion" id="pignoracion" class="form-control">
                                                <option value="">Inidque</option>
                                                <option value="1" <?php echo $asociado->pignoracion==1?"selected":"";?>>SI</option>
                                                <option value="2" <?php echo $asociado->pignoracion==2?"selected":"";?>>NO</option>
                                            </select>
                                        </td>
                                        <td>
                                            <label for="">Entidad ala cual se encuentra pignorado</label>
                                            <input type="text" name="entidad_pignorado" class="form-control" placeholder="Entidad ala cual se encuentra pignorado" value="<?php echo $asociado->entidad_pignorado?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="3" class="text-center">BIENES RAICES</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Tipo de Bien</label>
                                            <input type="text" name="tipo_bien" class="form-control" placeholder="Tipo de Bien" value="<?php echo $asociado->tipo_bien?>">
                                        </td>
                                        <td>
                                            <label for="">Direccion</label>
                                            <input type="text" name="direccion" class="form-control" placeholder="Direccion"  value="<?php echo $asociado->direccion?>">
                                        </td>
                                        <td>
                                            <label for="">Departamento</label>
                                            <select name="dep_raices" id="dep_raices" class="form-control">
                                                <option value="">Seleccione</option>
                                                <?php foreach ($departamentos as $dep): ?>
                                                    <option value="<?php  echo $dep->id_departamento?>" <?php echo $dep->id_departamento == $asociado->departamento_bienes?"selected":"";?>><?php echo $dep->departamento?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Ciudad</label>
                                            <select name="ciudad_raices" id="ciudad_raices" class="form-control">
                                                <option value="">Seleccione..</option>
                                                <?php foreach ($municipiosraiz as $mr): ?>
                                                    <option value="<?php echo $mr->id_municipio?>" <?php echo $mr->id_municipio == $asociado->ciudad?"selected":"";?>><?php echo $mr->municipio;?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </td>
                                        <td>
                                            <label for="">Valor comercial $</label>
                                            <input type="text" name="valor_comercial" class="form-control" placeholder="Valor comercial $" value="<?php echo $asociado->valor_comercial?>">
                                        </td>
                                        <td>
                                            <label for="">Matricula Inmobilaria</label>
                                            <input type="text" name="matricula_inmobilaria" class="form-control" placeholder="Matricula Inmobilaria" value="<?php echo $asociado->matricula_inmobilaria?>">
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Hipoteca</label>
                                            <select name="hipoteca" id="hipoteca" class="form-control">
                                                <option value="">Indique</option>
                                                <option value="1" <?php echo $asociado->hipoteca==1?"selected":"";?>>SI</option>
                                                <option value="2" <?php echo $asociado->hipoteca==2?"selected":"";?>>NO</option>
                                            </select>
                                        </td>
                                        <td colspan="2">
                                            <label for="">Entidad ala cual se encuentra Hipotecada</label>
                                            <input type="text" name="entidad_hipotecada" class="form-control" placeholder="Entidad ala cual se encuentra Hipotecada" value="<?php echo $asociado->entidad_hipotecada?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <label for="">Descripcion de otros activos</label>
                                            <textarea name="otros_activos" id="otros_activos"  rows="3" placeholder="Otros Activos" class="form-control"><?php echo $asociado->otros_activos?></textarea>
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
                                7.INFORMACION DE PRODUCTOS A TOMAR
                            </h4>
                        </a>
                    </div>
                    <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ahorros">Ahorros</label>
                                        <select name="ahorros[]" id="ahorros" class="select2 form-control" multiple="multiple" style="width: 100%;" required="required">
                                            <option value="">Seleccione</option>
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
                                8.REFERENCIAS PERSONAL COMERCIAL
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
                                            <input type="text" name="prf_nombres_apellidos" class="form-control" placeholder="Nombres y Apellidos" value="<?php echo $asociado->prf_nombres_apellidos;?>">
                                        </td>
                                        <td>
                                            <label for="">Parentesco</label>
                                            <input type="text" name="prf_parentesco" class="form-control" placeholder="Parentesco" value="<?php echo $asociado->prf_parentesco;?>">
                                        </td>
                                        <td>
                                            <label for="">Telefono</label>
                                            <input type="text" name="prf_telefono" class="form-control" placeholder="Telefono" value="<?php echo $asociado->prf_telefono;?>">
                                        </td>
                                        <td>
                                            <label for="">Celular</label>
                                            <input type="text" name="prf_celular" class="form-control" placeholder="Celular" value="<?php echo $asociado->prf_celular;?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Nombres y Apellidos</label>
                                            <input type="text" name="srf_nombres_apellidos" class="form-control" placeholder="Nombres y Apellidos" value="<?php echo $asociado->srf_nombres_apellidos;?>">
                                        </td>
                                        <td>
                                            <label for="">Parentesco</label>
                                            <input type="text" name="srf_parentesco" class="form-control" placeholder="Parentesco" value="<?php echo $asociado->srf_parentesco;?>">
                                        </td>
                                        <td>
                                            <label for="">Telefono</label>
                                            <input type="text" name="srf_telefono" class="form-control" placeholder="Telefono" value="<?php echo $asociado->srf_telefono;?>">
                                        </td>
                                        <td>
                                            <label for="">Celular</label>
                                            <input type="text" name="srf_celular" class="form-control" placeholder="Celular" value="<?php echo $asociado->srf_celular;?>">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th colspan="4" class="text-center">Referencias Comerciales/Personal</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <label for="">Nombres y Apellidos</label>
                                            <input type="text" name="rc_nombres_apellidos" class="form-control" placeholder="Nombres y Apellidos" value="<?php echo $asociado->rc_nombres_apellidos;?>">
                                        </td>
                                        <td>
                                            <label for="">Parentesco</label>
                                            <input type="text" name="rc_parentesco" class="form-control" placeholder="Parentesco" value="<?php echo $asociado->rc_parentesco;?>">
                                        </td>
                                        <td>
                                            <label for="">Telefono</label>
                                            <input type="text" name="rc_telefono" class="form-control" placeholder="Telefono" value="<?php echo $asociado->rc_telefono;?>">
                                        </td>
                                        <td>
                                            <label for="">Celular</label>
                                            <input type="text" name="rc_celular" class="form-control" placeholder="Celular" value="<?php echo $asociado->rc_celular;?>">
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
                                            <?php foreach ($vinculaciones as $v): ?>
                                                <option value="<?php echo $v->id; ?>" <?php echo $v->id == $asociado->tipo_vinculacion ? 'selected':'';?>><?php echo $v->vinculacion?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Lugar de la Entrevista</label>
                                        <select name="lugar_entrevista" id="finca" class="form-control" required="required">
                                            <option value="">Seleccione</option>
                                            <?php foreach ($fincas as $f): ?>
                                                <option value="<?php echo $f->id?>" <?php echo $f->id == $asociado->lugar_entrevista ? 'selected':'';?>><?php echo $f->nombre?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                    
                                </div> 

                                <!-- fin columna 1-->
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Fecha de Diligenciamiento</label>
                                        <input type="text" class="form-control datepicker" name="fec_diligencia" placeholder="Fecha Expedicion" required="required" value="<?php echo DateTime::createFromFormat('Y-m-d',$asociado->fec_diligencia)->format("d/m/Y");?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Fecha de la entrevista</label>
                                        <input type="text" class="form-control datepicker" name="fec_entrevista" placeholder="Fecha Expedicion" required="required" value="<?php echo DateTime::createFromFormat('Y-m-d',$asociado->fecha_entrevista)->format("d/m/Y");?>">
                                    </div>
                                    

                                </div>
                                <!-- fin columna 2-->
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Oficina:</label>
                                        <input type="text" name="oficina" class="form-control" placeholder="oficina" value="<?php echo $asociado->oficina;?>">
                                    </div>
                                    <div class="bootstrap-timepicker">
                                    <div class="form-group">
                                        <label for="">Hora:</label>
                                        <input type="text" class="form-control timepicker" name="hora" value="<?php echo $asociado->hora;?>">
                                    </div>
                                    </div>
                                </div> 
                                <!-- fin columna 3-->
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Interes manifestado:</label>
                                        <input type="text" class="form-control" name="interes" value="<?php echo $asociado->interes;?>">
                                    </div>
                                </div>
                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Fecha de Afiliacion:</label>
                                        <input type="text" class="form-control datepicker" name="fec_afiliacion" required="required" value="<?php echo DateTime::createFromFormat('Y-m-d',$asociado->fecha_afiliacion)->format('d/m/Y');?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="obs_diligencia">Observaciones</label>
                                        <textarea name="obs_diligencia" id="obs_diligencia" rows="3" class="form-control" value="<?php echo $asociado->observaciones_diligencia;?>"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- panel-group -->  
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