<section class="content-header">
    <h1>
        Compartidos conmigo <small> Listado</small>
    </h1>

</section>
<?php if ($this->session->flashdata("success")): ?>
    <script>
        swal("Registro Actualizado!","<?php echo $this->session->flashdata("success"); ?>", "success");
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
            <input type="hidden" id="modulo" value="fincas">
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="tb-without-buttons" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Compartido por</th>
                                    <th>Fecha que se compartio</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($archivos as $a): ?>
                                    <tr>
                                        <td>
                                            <?php if (!empty($a->tipo)): ?>
                                                <a data-target="#modal-info" data-toggle="modal" class="btn-info-file" id="<?php echo $a->id;?>" href="#modal-default"><?php echo $a->nombre;?></a>
                                                

                                            <?php else: ?>

                                                <!--<a href="<?php echo current_url()."/".$a->codigo;?>"><?php echo $a->nombre?></a>-->
                                                 <a href="<?php echo base_url()."myfiles/{$a->codigo}";?>"><?php echo $a->nombre?></a>
                                            <?php endif ?>
                                        </td>
                                        <td><?php echo $a->nombres." ".$a->apellidos?></td>
                                        <td><?php echo $a->fecha?></td>

                                    </tr>
                                <?php endforeach ?>
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