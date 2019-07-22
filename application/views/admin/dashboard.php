<section class="content-header">
    <h1>
        Tablero Principal
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $totalArchivos;?></h3>

              <p>Archivos</p>
            </div>
            <div class="icon">
              <i class="ion ion-document"></i>
            </div>
            <a href="<?php echo base_url();?>myfiles" class="small-box-footer">Ver Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $asociados;?></h3>

              <p>Asociados</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="<?php echo base_url();?>backend/asociados" class="small-box-footer">Ver Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $usuarios;?></h3>

              <p>Usuarios</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="<?php echo base_url();?>administrador/usuarios" class="small-box-footer" >Ver Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <!-- ./col -->
    </div>
   




</section>
<!-- /.content -->