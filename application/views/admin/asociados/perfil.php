<section class="content-header">
    <h1>
        Perfil de Usuario
    </h1>
</section>
<?php if ($this->session->flashdata("success")): ?>
    <script>
        swal("Bien Hecho!", "<?php echo $this->session->flashdata("success");?>");
    </script>
<?php endif ?>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="row">
        <div class="col-md-4 col-xs-12">
            <div class="box box-solid">

            
                <div class="box-body box-profile">
                    <h3 class="profile-username text-center"><?php echo $usuario->nombres;?></h3>

                    <p class="text-muted text-center">Asociado</p>

                    <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>assets/images/usuarios/<?php echo $usuario->imagen;?>" alt="User profile picture">
                    <hr>
                    <form action="<?php echo base_url(); ?>backend/asociados/changeImagen" method="POST" id="form-change-image" enctype="multipart/form-data">
                        <input type="hidden" name="idAsociado" value="<?php echo $usuario->id;?>">
                        <div class="form-group">
                            <label for="">Cambiar Foto:</label>
                            <input type="file" class="form-control" name="file">
                            <span class="help-block">Seleccione archivo .jpg  y .png</span>
                        </div>
                        <button type="submit" class="btn btn-info btn-flat btn-block">Cambiar Imagen</button>
                    </form>
                </div>
                <!-- /.box-body -->
                
            </div>
            <!-- /.box -->
        </div>
        <div class="col-md-8 col-xs-12">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#settings" data-toggle="tab">Información Personal</a></li>
                    <li><a href="#password" data-toggle="tab">Cambiar Contraseña</a></li>
                    <li><a href="#firma" data-toggle="tab">Cambiar Firma</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="settings">
                        <form action="<?php echo base_url();?>backend/asociados/infoAsociado" method="POST">
                            <input type="hidden" name="idAsociado" value="<?php echo $usuario->id;?>">
                            <div class="form-group">
                                <label for="">Cedula:</label>
                                <input type="text" name="cedula" class="form-control" required="required" value="<?php echo $usuario->num_identificacion?>">
                            </div>
                            <div class="form-group">
                                <label for="nombres">Nombres:</label>
                                <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo $usuario->nombres;?>">
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $usuario->correo;?>">
                            </div>
                            <div class="form-group">
                                <label for="">Sexo:</label>
                               <label class="radio-inline">
                                    <input type="radio" name="genero" value="Masculino" <?php echo $usuario->genero=="Masculino"? "checked":"";?>>Masculino
                                </label>
                                <label class="radio-inline">
                                    <input type="radio" name="genero" value="Femenino" <?php echo $usuario->genero=="Femenino"? "checked":"";?>>Femenino
                                </label>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger btn-flat">Enviar</button>
                            </div>
                        </form>
                    </div>

                    <div class="tab-pane" id="password">
                        <form action="<?php echo base_url();?>backend/asociados/changePassword" method="POST">
                            <input type="hidden" name="idAsociado" value="<?php echo $usuario->id;?>">
                            <div class="form-group">
                                <label for="newpass">Nueva Contraseña</label>
                                <input type="password" class="form-control" id="newpass" name="newpass">
                            </div>
                            <div class="form-group">
                                <label for="confpass">Confirmar Nueva Contraseña:</label>
                                <input type="password" class="form-control" id="confpass" name="confpass">
                               
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger btn-flat">Enviar</button>
                            </div>
                        </form>
                    </div>
                    <div class="tab-pane" id="firma">
                        <div class="row">
                            <div class="col-md-3">
                                <p class="text-center"><b>FIRMA ACTUAL</b></p>
                                <?php if (!empty($usuario->firma)): ?>
                                    <img src="<?php echo base_url();?>assets/images/firmas/<?php echo $usuario->firma;?>" alt="" class="img-responsive">
                                <?php else: ?>
                                    <p class="text-center text-muted">No ha establecido alguna firma</p>
                                <?php endif ?>
                            </div>
                            <div class="col-md-9">
                                <form action="<?php echo base_url();?>backend/asociados/changeFirma" method="POST" enctype="multipart/form-data" id="form-change-firma">
                                    <input type="hidden" name="idAsociado" value="<?php echo $usuario->id;?>">
                                    
                                    <div class="form-group">
                                        <label for="">Cambiar Firma:</label>
                                        <input type="file" class="form-control" name="file">
                                        <span class="help-block">Seleccione archivo .jpg  y .png</span>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-danger btn-flat">Enviar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                    </div>

                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>
              <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
    </div>
</section>
<!-- /.content -->