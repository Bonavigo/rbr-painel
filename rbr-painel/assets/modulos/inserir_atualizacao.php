<?php
	if (!empty($_POST['titulo']) AND !empty($_POST['conteudo'])) {
		$geralC->inserirAtt($_POST['titulo'], $_POST['conteudo']);
	}
?>
<h4>Inserir Atualização</h4>
<script src="//cdn.ckeditor.com/4.15.0/full/ckeditor.js"></script>
<form method="POST" action="#">
<div class="input-field">
	<input id="titulo" name="titulo" type="text" class="validate" required>
	<label for="titulo">Título</label>
</div>
<div class="input-field">
	<?php require_once('assets/modulos/antikick.php'); ?>
	<textarea name="conteudo" id="conteudo"></textarea>
</div>
<script>CKEDITOR.replace('conteudo');</script>
	<button type="submit" style="width:100%;height:45px;margin-top:5px;margin-bottom:10px;" class="waves-effect waves-light btn light-green darken-3">INSERIR</button>
</div>
</form>