<?php
	if ($_SESSION['cargo'] < 8) {
		$geralC->redirPermissao();
	}
?>
<table class="responsive-table">
	<thead>
		<tr>
			<th>#</th>
			<th>Log</th>
			<th>Data</th>
			<th>Hora</th>
		</tr>
	</thead>
	<tbody>
		<?php $geralC->listarLogs(); ?>
	</tbody>
</table>