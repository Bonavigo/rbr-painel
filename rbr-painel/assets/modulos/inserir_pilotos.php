<?php
	if (!empty($_POST['nome']) AND !empty($_POST['link'])) {
		$geralC->inserirPiloto($_SESSION['usuario'], $_POST['link']);
	}
?>
<h4>Inserir Piloto</h4>
<form method="POST" action="#">
<div class="input-field">
	<input id="link" name="link" type="text" class="validate" required>
	<label for="link">Link</label>
</div>
	<button type="submit" style="width:100%;height:45px;margin-top:5px;" class="waves-effect waves-light btn light-green darken-3">INSERIR</button>
</div>
</form>