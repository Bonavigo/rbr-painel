<?php
	if ($_SESSION['cargo'] < 0) {
		$geralC->redirPermissao();
	}
?>
<table class="responsive-table">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Link</th>
			<th>Data</th>
		</tr>
	</thead>
	<tbody>
		<?php $geralC->listarVinheta(); ?>
	</tbody>
</table>