<section class="content-header">
    <h1>
        Archivos <small> Listado</small>
    </h1>

</section>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box box-solid">
    
        <div class="box-body">
            <form action="<?php echo current_url();?>" method="POST">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group" style="padding-top: 5px;">
                            <label for="">Rango de fechas:</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="date" name="fecinicio" class="form-control" value="<?php echo isset($fecinicio) ? $fecinicio:date("Y-m-d");?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="date" name="fecfin" class="form-control" value="<?php echo isset($fecfin) ? $fecfin:date("Y-m-d");?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="submit" name="buscar" class="btn btn-success btn-flat" value="Buscar">
                            <a href="<?php echo base_url();?>reportes/lectores" class="btn btn-danger btn-flat">Reestablecer</a>
                        </div>
                    </div>
                </div>
                <hr>
            </form>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="tb-without-buttons" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Usuario</th>
                                    <th>Finca</th>
                                    <th>Tipo</th>
                                    <th>Nombre</th>
                                    <th>Fecha de Subida</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($archivos as $a): ?>
                                    <tr>
                                        <td><?php echo $a->email?></td>
                                        <td><?php echo $a->finca?></td>
                                        <td>
                                            <?php if ($a->tipo==1): ?>
                                                Archivo
                                            <?php else: ?>
                                                Carpeta
                                            <?php endif ?>
                                        </td>
                                        
                                        
                                        <td><?php echo $a->nombre?></td>
                                        <td><?php echo $a->fecha?></td>
                                        

                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
       
</section>
<!-- /.content -->

<div class="modal fade" id="modal-add-folder">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Crear Carpeta</h4>
      </div>
      <form action="<?php echo base_url();?>filemanager/archivos/savefolder" method="POST">
      <div class="modal-body">
            <input type="hidden" name="parent" value="<?php echo $parent;?>">
            <div class="form-group">
                <label for="">Nombre:</label>
                <input type="text" name="nombre" class="form-control" required="required">
            </div>
            <div class="form-group">
                <label for="descripcion">Descripcion:</label>
                <textarea name="descripcion" id="descripcion" rows="10" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="">Finca:</label>
                <select name="finca" id="finca" class="form-control" required="required">
                    <option value="">Seleccione Finca..</option>
                    <?php foreach ($fincas as $f): ?>
                        <option value="<?php echo $f->id?>"><?php echo $f->nombre?></option>
                    <?php endforeach ?>
                </select>
                <?php if (empty($fincas)): ?>
                    <span class="help-block">Aun no cuenta con una finca asignada.</span>
                <?php endif ?>
                
            </div>

            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
        <input type="submit" name="guardar" class="btn btn-success btn-flat" value="Guardar">
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-add-file">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Subir Archivo</h4>
      </div>
      <form action="<?php echo base_url();?>filemanager/archivos/savefile" method="POST" enctype="multipart/form-data">
      <div class="modal-body">
            <input type="hidden" name="parent" value="<?php echo $parent;?>">
            <div class="form-group">
                <label for="">Descripcion:</label>
                <textarea name="descripcion" id="descripcion" class="form-control" rows="10"></textarea>
            </div>
            <div class="form-group">
                <label for="">Archivo:</label>
                <input type="file" class="form-control" name="archivo" accept=".jpg,.pdf" required="required">
            </div>
            <div class="form-group">
                <label for="">Finca:</label>
                <select name="finca" id="finca" class="form-control" required="required">
                    <option value="">Seleccione Finca..</option>
                    <?php foreach ($fincas as $f): ?>
                        <option value="<?php echo $f->id?>"><?php echo $f->nombre?></option>
                    <?php endforeach ?>
                </select>
                <?php if (empty($fincas)): ?>
                    <span class="help-block">Aun no cuenta con una finca asignada.</span>
                <?php endif ?>
                
            </div>

            
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
        <input type="submit" name="guardar" class="btn btn-success btn-flat" value="Guardar">
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-compartir">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Compartir con otros usuarios</h4>
      </div>
      <form action="<?php echo base_url();?>filemanager/archivos/usershared" method="POST">
      <div class="modal-body">
        <div class="form-group">
            <label for="usuarios">Seleccione usuarios</label>
            <input type="hidden" name="idArchivo" id="idArchivo">
            <select name="usuarios[]" id="usuarios" multiple="multiple" class="form-control select2" required="required" data-placeholder="Seleccione usuarios" style="width: 100%;">
                <?php foreach ($usuarios as $u): ?>
                        <option value="<?php echo $u->id;?>"> <?php echo $u->nombres." ".$u->apellidos?></option>
                <?php endforeach ?>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
        <div class="form-group">
            <table class="table table-bordered table-striped" id="tbUsers">
                <thead>
                    <tr>
                        <th colspan="2" class="text-center" style="background-color: #367fa9; color: #FFF;">Usuarios que se le compartio el archivo</th>
                    </tr>
                    <tr>
                        <th>Nombres y Apellidos</th>
                        <th>Fecha del compartir</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
        </div>
      </div>
      </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
        
      </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<div class="modal fade" id="modal-info">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Detalle del Archivo</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-editar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Editar Archivo</h4>
      </div>
      <form action="<?php echo base_url();?>filemanager/archivos/update" method="POST">
      <div class="modal-body">
        <div class="form-group">
            <label for="">Nombre:</label>
            <input type="text" name="nombre" id="nombre" class="form-control">
            <input type="hidden" name="archivo" id="archivo">
        </div>
        <div class="form-group">
            <label for="">Descripcion:</label>
            <textarea name="descripcion" id="descripcion" rows="10" class="form-control"></textarea>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success">Guardar</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->