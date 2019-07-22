<div class="row">
	<div class="col-xs-12">
		<?php if (!empty($codigoparent)): ?>
			<?php $src = "uploads/folder/".$codigoparent."/".$archivo->codigo.$archivo->extension; ?>
		<?php else: ?>
			<?php $src = "uploads/folder/".$archivo->codigo.$archivo->extension; ?>
		<?php endif ?>
		<?php if ($archivo->extension ==".jpg"): ?>
			<img src="<?php echo base_url().$src?>" alt="" class="img-responsive">
		<?php else: ?>
			<iframe src="<?php echo base_url().$src?>" frameborder="0" style="width: 100%; height: 650px;" title="<?php echo $archivo->codigo.$archivo->extension;?>"></iframe>
		<?php endif ?>
		
		<div class="form-group">
			<b>Subido por: </b> <?php echo $archivo->nombres." ".$archivo->apellidos ?>
		</div>
		<div class="form-group">
			<b>Descripcion: </b><br><?php echo $archivo->descripcion==""?"No cuenta con descripcion":$archivo->descripcion;?>
		</div>
		<?php $dt = new DateTime($archivo->fecha); ?>
		<div class="form-group">
			<span class="fa fa-calendar"></span> <?php echo $dt->format("Y-m-d"); ?>
			<span class="fa fa-clock-o" style="margin-left: 20px;"></span> <?php echo $dt->format("H:i:s"); ?>
		</div>
		<div class="form-group text-center">
			<form action="<?php echo base_url();?>filemanager/archivos/download" method="POST">
				<input type="hidden" name="original" value="<?php echo $archivo->nombre;?>">
				<input type="hidden" name="ruta" value="<?php echo $src;?>">
				<button type="submit" class="btn btn-success btn-flat">
					<span class="fa fa-download"></span> Descargar
				</button>
			</form>
		</div>
	</div>
</div>