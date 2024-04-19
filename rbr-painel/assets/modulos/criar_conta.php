<?php
	if ($_SESSION['cargo'] < 6) {
		$geralC->redirPermissao();
	}
	if (!empty($_POST['user']) AND !empty($_POST['senha']) AND !empty($_POST['cargo'])) {
		$userC->criarConta($_POST['user'], $_POST['senha'], $_POST['cargo']);
	}
?>
<h4>Criação de Contas</h4>
<form method="POST" action="#">
<div class="input-field" style="margin-top:30px;">
	<input id="user" name="user" type="text" class="validate" required>
	<label for="user">Usuário</label>
</div>
<div class="input-field">
	<input id="senha" name="senha" type="password" class="validate" required>
	<label for="senha">Senha</label>
</div>
<div class="input-field">
	<select name="cargo" required>
		<option value="" disabled selected>Cargo</option>
		<?php if ($_SESSION['cargo'] > 8) { echo  '<option value="10">Programador</option>;'; } ?>
		<?php if ($_SESSION['cargo'] > 7) { echo  '<option value="9">Alto Comando</option>'; } ?>
		<?php if ($_SESSION['cargo'] > 7) { echo  '<option value="8">Administrador</option>'; } ?>
		<?php if ($_SESSION['cargo'] > 7) { echo  '<option value="7">Diretor</option>'; } ?>
		<?php if ($_SESSION['cargo'] > 6) { echo '<option value="6">Coordenador</option>'; } ?>
		<option value="5">Locutor</option>
		<option value="4">Radialista</option>
		<option value="3">Marketing</option>
		<option value="2">Divulgador</option>
		<option value="1">Aprendiz De Locução</option>
	</select>
</div>
	<button type="submit" style="width:100%;height:45px;margin-top:5px;" class="waves-effect waves-light btn light-green darken-3">CRIAR</button>
</form>