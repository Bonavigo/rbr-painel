<?php
	if ($_SESSION['cargo'] < 6) {
		$geralC->redirPermissao();
	}
	if (!empty($_POST['accao'])) {
		if (empty($_POST['newuser'])) {
			$_POST['newuser'] = 'NULL';
		}
		if (empty($_POST['senha'])) {
			$_POST['senha'] = 'NULL';
		}
		if (empty($_POST['cargo'])) {
			$_POST['cargo'] = 'NULL';
		}
		$userC->editarConta($_POST['user'], $_POST['newuser'], $_POST['senha'], $_POST['cargo'], $_POST['accao']);
	}
?>
<h4>Edição de Contas</h4>
<form method="POST" action="#">
<div class="input-field" style="margin-top:30px;">
	<input id="user" name="user" type="text" class="validate" required>
	<label for="user">Usuário</label>
</div>
<div class="input-field">
	<input id="newuser" name="newuser" type="text" class="validate">
	<label for="newuser">Novo Usuário</label>
</div>
<div class="input-field">
	<input id="senha" name="senha" type="password" class="validate">
	<label for="senha">Senha</label>
</div>
<div class="input-field">
	<select name="cargo">
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
		<option value="0">Desativar conta</option>
	</select>
</div>
<div class="input-field">
<p>
	<label>
		<input class="with-gap" value="mudarusuario" name="accao" type="radio" required>
		<span>Mudar usuário</span>
	</label>
</p>
<p>
	<label>
		<input class="with-gap" value="mudarsenha" name="accao" type="radio" required>
		<span>Mudar senha</span>
	</label>
</p>
<p>
	<label>
		<input class="with-gap" value="mudarcargo" name="accao" type="radio" required>
		<span>Mudar cargo</span>
	</label>
</p>
</div>
<button type="submit" style="width:100%;height:45px;margin-top:5px;" class="waves-effect waves-light btn light-green darken-3">EDITAR</button>
</form>