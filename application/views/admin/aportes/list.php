<section class="content-header">
    <h1>
        Aportes <small> Listado</small>
    </h1>

</section>
<?php if ($this->session->flashdata("success")): ?>
    <script>
        swal("Exito!","<?php echo $this->session->flashdata("success"); ?>", "success");
    </script>
<?php endif ?>
<?php if ($this->session->flashdata("error")): ?>
    <script>
        swal("Error al Registrar!", "Haz click en el botón para volver intentarlo.", "error");
    </script>
<?php endif ?>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box box-solid">
    
        <div class="box-body">
            <input type="hidden" id="modulo" value="aportes">
            <?php if ($this->session->userdata("rol") == 1): ?>
            <div class="row">
                <div class="col-md-12 text-right">
                    <button type="button" class="btn btn-success btn-flat" data-toggle="modal" data-target="#modal-importar">
                        <span class="fa fa-file-excel-o"></span> 
                            Importar Aportes
                    </button>
                </div>
            </div>
            <hr>
            <?php endif ?>
            <div class="row">
                <div class="col-md-12">
                    
                    <div class="table-responsive">
                        <table id="tb-without-buttons" class="table table-bordered table-hover" width="100%">
                            <thead>
                                <tr>
                                    
                                    <th>Cedula</th>
                                    <th>Apellidos y Nombres</th>
                                    <th>Tipo de Credito</th>
                                    <th>Valor Actual</th>
                                    <th>Saldo Pendiente</th>
                                    <th>Fecha</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($aportes)): ?>
                                    <?php foreach ($aportes as $aporte): ?>
                                        <tr>
                                            <td><?php echo $aporte->cedula ?></td>
                                            <td><?php echo $aporte->nombre ?></td>
                                            <td><?php echo $aporte->cedula ?></td>
                                            <td><?php echo $aporte->cedula ?></td>
                                            <td><?php echo $aporte->cedula ?></td>
                                            <td><?php echo $aporte->cedula ?></td>
                                            <td>
                                                <a href="#" class="btn btn-info btn-sm">
                                                    <span class="fa fa-search"></span>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                <?php endif ?>
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


<div class="modal fade" id="modal-importar">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Importar Asociados</h4>
      </div>
      <form action="<?php echo base_url();?>backend/aportes/importar" method="POST"  enctype="multipart/form-data">  
          <div class="modal-body">
                <div class="form-group">
                    <label for="file">Seleccione Archivo Excel</label>
                    <input type="file" name="file" class="form-control" accept=".xls, .xlsx" required="required">
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-success" id="btn-import">Guardar</button>
          </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->