<?php
	if (isset($_POST['apagaraviso'])) {
		$geralC->apagarAviso($_POST['apagaraviso']);
	}
?>
<table class="responsive-table">
	<thead>
		<tr>
			<th>#</th>
			<th>Título</th>
			<th>Usuário</th>
			<th>Data</th>
			<th>Abrir</th>
			<?php if ($_SESSION['cargo'] > 5) { echo '<th>Excluir</th>'; } ?>
		</tr>
	</thead>
	<tbody>
		<?php $geralC->listarAvisos(); ?>
	</tbody>
</table>