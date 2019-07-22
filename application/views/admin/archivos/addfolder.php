<section class="content-header">
    <h1>
        Carpeta <small> Registro</small>
    </h1>

</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box box-solid">
    
        <div class="box-body">
            <div class="row">
                <div class="col-md-6 col-sm-8 col-xs-12">
                    <form action="<?php echo base_url();?>filemanager/archivos/savefolder" method="POST">
                        <?php if ($this->session->flashdata("success")): ?>
                            <script>
                                swal("Registro Guardado!", "El registro fue exitoso", "success");
                            </script>
                        <?php endif ?>
                        <?php if ($this->session->flashdata("error")): ?>
                            <script>
                                swal("Error al Actualizar!", "Haz click en el botón para volver intentarlo.", "error");
                            </script>
                        <?php endif ?>
                        <div class="form-group">
                            <label for="">Nombre:</label>
                            <input type="text" name="nombre" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripcion:</label>
                            <textarea name="descripcion" id="descripcion" rows="10" class="form-control"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" name="guardar" class="btn btn-success btn-flat" value="Guardar">
                            <input type="reset" class="btn btn-danger btn-flat" value="Cancelar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->