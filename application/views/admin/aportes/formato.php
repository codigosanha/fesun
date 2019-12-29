<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Estado de Cuenta</title>
	<style>
		html, body{
			font-size: 10px;
			margin: 0;
			padding: 20px;
		}
		table{
			border: 1px solid #000;
			margin: 0;

		}
		.titulo{
			border: 1px solid #000;
		}
		table tr td , table tr th{
			border: 0px;
		}
		.texto-centrado{
			text-align: center;
		}
		.texto-derecho{
			text-align: right;
		}
	</style>
</head>
<body>
	<p class="texto-centrado"> <strong>FONDO DE EMPLEADOS DE <br>
	SUNSHINE BOUQUET<br>
	NIT. 830.039.546-9 </strong></p>
	<table style="width: 100%;" cellpadding="3" cellspacing="0">
		<tr>
			<td>NOMBRE</td>
			<td colspan="2"><?php echo $aporte->nombre ?></td>
			<td>SALDOS AL DIA</td>
			<td class="texto-derecho"><?php echo date("Y.m.d"); ?></td>
		</tr>
		<tr>
			<td>EMPRESA</td>
			<td colspan="2"><?php echo $aporte->area ?></td>
			<td>ACUM. AHORROS PERMANENTES</td>
			<td class="texto-derecho"><?php echo $aporte->ahorro ?></td>
		</tr>
		<tr>
			<td>CEN/COSTO</td>
			<td colspan="2"><?php echo $aporte->cencos ?></td>
			<td>ACUM. APORTES SOCIALES</td>
			<td class="texto-derecho"><?php echo $aporte->aporte ?></td>
		</tr>
		<tr>
			<td colspan="2">CEDULA ASOCIADO</td>
			<td><?php echo $aporte->cedula ?></td>
			<td>AHORROS VOL. Y REV. APORTES</td>
			<td class="texto-derecho"><?php echo $aporte->ahorrv ?></td>
		</tr>
		<tr>
			<td colspan="2">CODIGO NOMINA</td>
			<td><?php echo $aporte->codnom ?></td>
			<td>TOTAL SALDO A FAVOR</td>
			<td class="texto-derecho"><?php echo $aporte->saldof ?></td>
		</tr>
		<tr>
			<td colspan="2">FECHA AFILIACION</td>
			<td><?php echo date("Y.m.d",strtotime($aporte->fechai)); ?></td>
			<th>CUOTA OBLIGATORIA</th>
			<td class="texto-derecho"><?php echo $aporte->cuotaf ?></td>
		</tr>
		<tr>
			<td colspan="2">FECHA DE INGRESO ALA EMPRESA</td>
			<td><?php echo $aporte->fecing ?></td>
			<th>APO+AHO EN MORA</th>
			<td class="texto-derecho"><?php echo $aporte->morapo ?></td>
		</tr>
		<tr>
			<th colspan="5" style="font-size:1.5em;" class="texto-centrado titulo">INFORMACION ADICIONAL AL ASOCIADO</th>
		</tr>
		<tr>
			<th colspan="5" style="padding-top: 40px;"><?php echo $aporte->mensa3 ?></th>
		</tr>
	</table>
	<table style="width: 100%;" cellpadding="3" cellspacing="0">
		<tr>
			<th colspan="8" class="texto-centrado titulo" style="font-size: 1.5em;">OTROS AHORROS, REVALORIZACIONES Y DEMAS SALDOS A FAVOR</th>
		</tr>
		<tr>
			<th class="texto-centrado">NUMERO <br>CUENTA</th>
			<th class="texto-centrado">MODALIDAD DE AHORRO</th>
			<th class="texto-centrado">FECHA DE <br>EMISION</th>
			<th class="texto-centrado">FECHA DE <br>VENCTO</th>
			<th class="texto-centrado">VALOR CUOTA <br>AHORRO</th>
			<th class="texto-centrado"></th>
			<th class="texto-centrado">SALDO <br>ACTUAL</th>
			<th class="texto-centrado">RENDTOS POR <br>PAGAR</th>
		</tr>
		<?php if ($aporte->numer1): ?>
		<tr>
			<td><?php echo $aporte->numer1 ?></td>
			<td><?php echo $aporte->detar1 ?></td>
			<td><?php echo $aporte->fechr1 ?></td>
			<td><?php echo $aporte->fechv1 ?></td>
			<td class="texto-derecho"><?php echo $aporte->ahocu1 ?></td>
			<td><?php echo $aporte->ahofp1 ?></td>
			<td class="texto-derecho"><?php echo $aporte->ahorr1 ?></td>
			<td class="texto-derecho"><?php echo $aporte->aporr1 ?></td>
		</tr>
		<?php endif ?>
		<?php if ($aporte->numer2): ?>
		<tr>
			<td><?php echo $aporte->numer2 ?></td>
			<td><?php echo $aporte->detar2 ?></td>
			<td><?php echo $aporte->fechr2 ?></td>
			<td><?php echo $aporte->fechv2 ?></td>
			<td class="texto-derecho"><?php echo $aporte->ahocu2 ?></td>
			<td><?php echo $aporte->ahofp2 ?></td>
			<td class="texto-derecho"><?php echo $aporte->ahorr2 ?></td>
			<td class="texto-derecho"><?php echo $aporte->aporr2 ?></td>
		</tr>
		<?php endif ?>
		<?php if ($aporte->numer3): ?>
		<tr>
			<td><?php echo $aporte->numer3 ?></td>
			<td><?php echo $aporte->detar3 ?></td>
			<td><?php echo $aporte->fechr3 ?></td>
			<td><?php echo $aporte->fechv3 ?></td>
			<td class="texto-derecho"><?php echo $aporte->ahocu3 ?></td>
			<td><?php echo $aporte->ahofp3 ?></td>
			<td class="texto-derecho"><?php echo $aporte->ahorr3 ?></td>
			<td class="texto-derecho"><?php echo $aporte->aporr3 ?></td>
		</tr>
		<?php endif ?>
		<?php if ($aporte->numer4): ?>
		<tr>
			<td><?php echo $aporte->numer4 ?></td>
			<td><?php echo $aporte->detar4 ?></td>
			<td><?php echo $aporte->fechr4 ?></td>
			<td><?php echo $aporte->fechv4 ?></td>
			<td class="texto-derecho"><?php echo $aporte->ahocu4 ?></td>
			<td><?php echo $aporte->ahofp4 ?></td>
			<td class="texto-derecho"><?php echo $aporte->ahorr4 ?></td>
			<td class="texto-derecho"><?php echo $aporte->aporr4 ?></td>
		</tr>
		<?php endif; ?>
		<?php if ($aporte->numer5): ?>
		<tr>
			<td><?php echo $aporte->numer5 ?></td>
			<td><?php echo $aporte->detar5 ?></td>
			<td><?php echo $aporte->fechr5 ?></td>
			<td><?php echo $aporte->fechv5 ?></td>
			<td class="texto-derecho"><?php echo $aporte->ahocu5 ?></td>
			<td><?php echo $aporte->ahofp5 ?></td>
			<td class="texto-derecho"><?php echo $aporte->ahorr5 ?></td>
			<td class="texto-derecho"><?php echo $aporte->aporr5 ?></td>
		</tr>
	<?php endif; ?>
		<?php if ($aporte->numer6): ?>
		<tr>
			<td><?php echo $aporte->numer6 ?></td>
			<td><?php echo $aporte->detar6 ?></td>
			<td><?php echo $aporte->fechr6 ?></td>
			<td><?php echo $aporte->fechv6 ?></td>
			<td class="texto-derecho"><?php echo $aporte->ahocu6 ?></td>
			<td><?php echo $aporte->ahofp6 ?></td>
			<td class="texto-derecho"><?php echo $aporte->ahorr6 ?></td>
			<td class="texto-derecho"><?php echo $aporte->aporr6 ?></td>
		</tr>
		<?php endif ?>
		<tr>
			<th colspan="6">Total Ahorros a la Vista, CDATS y Rendimientos</th>
			<td class="texto-derecho"><?php echo $aporte->ahorrt ?></td>
			<td class="texto-derecho">0</td>
		</tr>
		<?php if ($aporte->prest1): ?>
			<tr>
				<th colspan="8" class="texto-centrado titulo" style="font-size: 1.5em;">CUOTAS EXTRAORDINARIAS</th>
			</tr>
		<?php endif ?>
		
	</table>

	<table style="width: 100%;" cellpadding="2" cellspacing="0">
		<?php if ($aporte->prest1): ?>
		<tr>
			<th>FECHA DE <br>PAGO</th>
			<th>VALOR <br>PACTADO</th>
			<th>NUMERO <br>CREDITO</th>
			<th>MOD.</th>
			<th>FECHA DE <br>PAGO</th>
			<th>VALOR <br>PACTADO</th>
			<th>NUMERO <br>CREDITO</th>
			<th>MOD.</th>
			<th>FECHA DE <br>PAGO</th>
			<th>VALOR <br>PACTADO</th>
			<th>NUMERO <br>CREDITO</th>
			<th>MOD.</th>
		</tr>
		<tr>
			<?php if ($aporte->prest1): ?>
				<td>$aporte->feche1</td>
				<td>$aporte->valoe1</td>
				<td>$aporte->prest1</td>
				<td>$aporte->tipop1</td>
			<?php else: ?>
				<td colspan="4"></td>
			<?php endif ?>
			<?php if ($aporte->prest2): ?>
				<td>$aporte->feche2</td>
				<td>$aporte->valoe2</td>
				<td>$aporte->prest2</td>
				<td>$aporte->tipop2</td>
			<?php else: ?>
				<td colspan="4"></td>
			<?php endif ?>
			<?php if ($aporte->prest3): ?>
				<td>$aporte->feche3</td>
				<td>$aporte->valoe3</td>
				<td>$aporte->prest3</td>
				<td>$aporte->tipop3</td>
			<?php else: ?>
				<td colspan="4"></td>
			<?php endif ?>
			
		</tr>
		<tr>
			<?php if ($aporte->prest4): ?>
				<td>$aporte->feche4</td>
				<td>$aporte->valoe4</td>
				<td>$aporte->prest4</td>
				<td>$aporte->tipop4</td>
			<?php else: ?>
				<td colspan="4"></td>
			<?php endif ?>
			<?php if ($aporte->prest5): ?>
				<td>$aporte->feche5</td>
				<td>$aporte->valoe5</td>
				<td>$aporte->prest5</td>
				<td>$aporte->tipop5</td>
			<?php else: ?>
				<td colspan="4"></td>
			<?php endif ?>
			<?php if ($aporte->prest6): ?>
				<td>$aporte->feche6</td>
				<td>$aporte->valoe6</td>
				<td>$aporte->prest6</td>
				<td>$aporte->tipop6</td>
			<?php else: ?>
				<td colspan="4"></td>
			<?php endif ?>
		</tr>
		<tr>
			<?php if ($aporte->prest7): ?>
				<td>$aporte->feche7</td>
				<td>$aporte->valoe7</td>
				<td>$aporte->prest7</td>
				<td>$aporte->tipop7</td>
			<?php else: ?>
				<td colspan="4"></td>
			<?php endif ?>
			<?php if ($aporte->prest8): ?>
				<td>$aporte->feche8</td>
				<td>$aporte->valoe8</td>
				<td>$aporte->prest8</td>
				<td>$aporte->tipop8</td>
			<?php else: ?>
				<td colspan="4"></td>
			<?php endif ?>
			<?php if ($aporte->prest9): ?>
				<td>$aporte->feche9</td>
				<td>$aporte->valoe9</td>
				<td>$aporte->prest9</td>
				<td>$aporte->tipop9</td>
			<?php else: ?>
				<td colspan="4"></td>
			<?php endif ?>
		</tr>
		<tr>
			<?php if ($aporte->prest10): ?>
				<td>$aporte->feche10</td>
				<td>$aporte->valoe10</td>
				<td>$aporte->prest10</td>
				<td>$aporte->tipop10</td>
			<?php else: ?>
				<td colspan="4"></td>
			<?php endif ?>
			<?php if ($aporte->prest11): ?>
				<td>$aporte->feche11</td>
				<td>$aporte->valoe11</td>
				<td>$aporte->prest11</td>
				<td>$aporte->tipop11</td>
			<?php else: ?>
				<td colspan="4"></td>
			<?php endif ?>
			<?php if ($aporte->prest12): ?>
				<td>$aporte->feche12</td>
				<td>$aporte->valoe12</td>
				<td>$aporte->prest12</td>
				<td>$aporte->tipop12</td>
			<?php else: ?>
				<td colspan="4"></td>
			<?php endif ?>
		</tr>
		<tr>
			<?php if ($aporte->prest13): ?>
				<td>$aporte->feche13</td>
				<td>$aporte->valoe13</td>
				<td>$aporte->prest13</td>
				<td>$aporte->tipop13</td>
			<?php else: ?>
				<td colspan="4"></td>
			<?php endif ?>
			<?php if ($aporte->prest14): ?>
				<td>$aporte->feche14</td>
				<td>$aporte->valoe14</td>
				<td>$aporte->prest14</td>
				<td>$aporte->tipop14</td>
			<?php else: ?>
				<td colspan="4"></td>
			<?php endif ?>
			<?php if ($aporte->prest15): ?>
				<td>$aporte->feche15</td>
				<td>$aporte->valoe15</td>
				<td>$aporte->prest15</td>
				<td>$aporte->tipop15</td>
			<?php else: ?>
				<td colspan="4"></td>
			<?php endif ?>
		</tr>
		<tr>
			<?php if ($aporte->prest16): ?>
				<td>$aporte->feche16</td>
				<td>$aporte->valoe16</td>
				<td>$aporte->prest16</td>
				<td>$aporte->tipop16</td>
			<?php else: ?>
				<td colspan="4"></td>
			<?php endif ?>
			
		</tr>
		<?php endif ?>
		<tr>
			<th colspan="12" class="texto-centrado titulo" style="font-size: 1.5em;">SALDOS DE CARTERA</th>
		</tr>
	</table>
	<table style="width: 100%;" cellpadding="2" cellspacing="0">
		<tr>
			<th>NUMERO <br>PTMO</th>
			<th>LINEA DE CREDITO</th>
			<th>FECHA DE <br>EMISION</th>
			<th>FECHA DE <br>VENCTO</th>
			<th>VALOR <br>INICIAL</th>
			<th>CTAS <br>PTES</th>
			<th>VALOR <br>CUOTA</th>
			<th>SALDO EN <br>MORA</th>
			<th>SALDO A <br>CAPITAL</th>
			<th>INT./SEGUR. <br>OTR./CONC.</th>
			<th>SDO TOTAL <br>DE LA DEUDA</th>
		</tr>
		<?php 

			$total_valorp = 0;
			$total_valorc = 0;
			$total_saldom = 0;
			$total_saldoc = 0;
			$total_saldoi = 0;
			$total_saldot = 0;
		 ?>
		<?php foreach ($aportes as $aporte): ?>
			<tr>
				<td><?php echo $aporte->numero; ?></td>
				<td><?php echo $aporte->tipopr; ?></td>
				<td><?php echo $aporte->fechae; ?></td>
				<td><?php echo $aporte->fechav; ?></td>
				<td class="texto-derecho"><?php echo floor($aporte->valorp); ?></td> <?php $total_valorp = $total_valorp + $aporte->valorp ?>
				<td class="texto-derecho"><?php echo floor($aporte->cuotap); ?></td>
				<td class="texto-derecho"><?php echo floor($aporte->valorc); ?></td> <?php $total_valorc = $total_valorc + $aporte->valorc ?>
				<td class="texto-derecho"><?php echo floor($aporte->saldom); ?></td> <?php $total_saldom = $total_saldom + $aporte->saldom ?>
				<td class="texto-derecho"><?php echo floor($aporte->saldoc); ?></td> <?php $total_saldoc = $total_saldoc + $aporte->saldoc ?>
				<td class="texto-derecho"><?php echo floor($aporte->saldoi); ?></td> <?php $total_saldoi = $total_saldoi + $aporte->saldoi ?>
				<td class="texto-derecho"><?php echo floor($aporte->saldot); ?></td> <?php $total_saldot = $total_saldot + $aporte->saldot ?>
			</tr>
		<?php endforeach ?>
		<tr>
			<th colspan="4" class="texto-centrado">Totales</th>
			<td class="texto-derecho"><?php echo $total_valorp; ?></td>
			<td></td>
			<td class="texto-derecho"><?php echo $total_valorc; ?></td>
			<td class="texto-derecho"><?php echo $total_saldom; ?></td>
			<td class="texto-derecho"><?php echo $total_saldoc; ?></td>
			<td class="texto-derecho"><?php echo $total_saldoi; ?></td>
			<td class="texto-derecho"><?php echo $total_saldot; ?></td>
		</tr>
	
	</table>
</body>
</html>