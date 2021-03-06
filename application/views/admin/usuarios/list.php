<section class="content-header">
    <h1>
        Usuarios <small> Listado</small>
    </h1>

</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box box-solid">
    
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php echo base_url();?>administrador/usuarios/add" class="btn btn-primary btn-flat">
                        <span class="fa fa-plus"></span> Agregar Usuario
                    </a>
                </div>
            </div>   
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="tbusuario" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Cedula</th>
                                    <th>Nombres</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th>Estado</th>
                                    <th>Fincas</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
<div class="modal fade" id="modal-fincas">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">FINCAS DEL USUARIO</h4>
      </div>
      <form action="#" method="POST"  id="form-finca">
      <div class="modal-body">
        <div class="form-group">
            <label for="finca">Fincas:</label>
            <select name="finca" id="finca" class="form-control">
                <option value="">Elija...</option>
                <?php foreach ($fincas as $f): ?>
                    <option value="<?php echo $f->id?>"><?php echo $f->nombre?></option>
                <?php endforeach ?>
            </select>
            <input type="hidden" name="idUsuario" id="idUsuario">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-flat">Guardar</button>
        </div>
        </form>

        <div class="form-group usuariofincas"></div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-flat pull-left" data-dismiss="modal">Cerrar</button>
        
      </div>
      
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">FIRMA DEL USUARIO</h4>
      </div>
      <form action="#" method="POST"  id="form-change-firma" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="imagen text-center">
                
        </div>
        
        <div class="form-group">
            <label class="label-imagen">Subir Firma:</label>
            <input type="file" name="file" class="form-control">
            <input type="hidden" name="idUsuario" id="idUsuario">
            <span class="help-block">Seleccione archivos con extension .jpg y .png</span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-flat pull-left" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success btn-flat">Guardar</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->