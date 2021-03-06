<section class="content-header">
    <h1>
        Usuarios <small> Registro</small>
    </h1>

</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box box-solid">
    
        <div class="box-body">
            <div class="row">
                <div class="col-md-6 col-sm-8 col-xs-12">
                    <form action="<?php echo base_url();?>administrador/usuarios/store" method="POST">
                        <?php if ($this->session->flashdata("success")): ?>
                            <script>
                                swal("Registro Actualizado!", "Haz click en el botón para continuar.", "success");
                            </script>
                        <?php endif ?>
                        <?php if ($this->session->flashdata("error")): ?>
                            <script>
                                swal("Error al Actualizar!", "Haz click en el botón para volver intentarlo.", "error");
                            </script>
                        <?php endif ?>
                        <div class="form-group">
                            <label for="">Cedula:</label>
                            <input type="text" name="cedula" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label for="">Nombres:</label>
                            <input type="text" name="nombres" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label for="">Apellidos:</label>
                            <input type="text" name="apellidos" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label for="">Email:</label>
                            <input type="email" name="email" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label for="">Rol:</label>
                            <select name="rol" id="rol" required class="form-control">
                                <option value="">Seleccione Rol</option>
                                <?php foreach ($roles as $rol): ?>
                                    <option value="<?php echo $rol->id?>"><?php echo $rol->nombre;?></option>
                                <?php endforeach ?>
                            </select>
                        </div >
                        <div class="form-group">
                            <label for="password">Contraseña:</label>
                            <input type="password" name="password" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="guardar" class="btn btn-success btn-flat" value="Guardar">
                            <a href="<?php echo base_url();?>administrador/usuarios" class="btn btn-danger btn-flat"> Volver</a>
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