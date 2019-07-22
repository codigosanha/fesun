<table class="table table-bordered">
	<thead>
		<tr>
			<td colspan="2" style="background: #3c8dbc; color: #FFF; border-color:#3c8dbc; ">Fincas Asignadas</td>
		</tr>
		<tr>
			<th>NIT</th>
			<th>Nombre</th>
		</tr>
	</thead>
	<tbody>
		<?php if (!empty($fincas)): ?>
			<?php foreach ($fincas as $f): ?>
				<tr>
					<td><?php echo $f->nit ?></td>
					<td><?php echo $f->nombre ?></td>
				</tr>
			<?php endforeach ?>
		<?php else: ?>
			<tr>
				<td class="text-center" colspan="2">Aun no se ha establecido fincas para este usuario</td>
			</tr>
		<?php endif ?>
	</tbody>
</table>
