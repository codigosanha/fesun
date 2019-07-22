<section class="content-header">
    <h1>
        Archivos <small> Registro</small>
    </h1>

</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box box-solid">
    
        <div class="box-body">
            <div class="row">
                <div class="col-md-6 col-sm-8 col-xs-12">
                    <form action="<?php echo base_url();?>filemanager/archivos/savefile" method="POST" enctype="multipart/form-data">
                        <?php if ($this->session->flashdata("success")): ?>
                            <script>
                                swal("Registro Actualizado!", "Haz click en el botón para continuar.", "success");
                            </script>
                        <?php endif ?>
                        <?php if ($this->session->flashdata("error")): ?>
                            <script>
                                swal("Error!", "<?php echo $this->session->flashdata("error");?>", "error");
                            </script>
                        <?php endif ?>
                        <div class="form-group">
                            <label for="">Carpeta:</label>
                            <select name="carpeta" id="carpeta" class="form-control">
                                <option value="">Seleccione Carpeta</option>
                                <?php foreach ($folders as $f): ?>
                                    <option value="<?php echo $f->id;?>"><?php echo $f->nombre?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Descripcion:</label>
                            <textarea name="descripcion" id="descripcion" class="form-control" rows="10"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="">Archivo:</label>
                            <input type="file" class="form-control" name="archivo" accept=".jpg,.pdf" required="required">
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