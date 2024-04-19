<?php
	if (isset($_POST['postagemForum']) AND isset($_POST['forumCategoria'])) {
		$censurado = $forum->bobba($_POST['postagemForum']);
		$postagem = $censurado;
		$forum->postar($_SESSION['usuario'], $postagem, $_POST['forumCategoria']);
	}
	if (isset($_POST['apagarPost'])) {
		$forum->apagarPost($_POST['apagarPost']);
	}
	if (isset($_POST['curtidinha'])) {
		$forum->curtir($_POST['curtidinha'], $_SESSION['usuario']);
	}
	if (isset($_POST['descurtir'])) {
		$forum->descurtir($_POST['descurtir'], $_SESSION['usuario']);
	}
	if (isset($_POST['comentarizin']) AND isset($_POST['idpost'])) {
		$censurado = $forum->bobba($_POST['comentarizin']);
		$forum->comentar($_POST['idpost'], $censurado, $_SESSION['usuario']);
	}
?>
<div class="col s12 m8 l9" style="padding-top:10px;">
	<div class="row">
		<div class="card" style="border-radius:10px;">
			<form method="POST" action="#">
				<div class="card-content">
					<div class="input-field">
						<textarea name="postagemForum" id="forumpostar" class="materialize-textarea"></textarea>
						<label for="forumpostar">Digite aqui...</label>
					</div>
					<div class="input-field">
						<select name="forumCategoria" id="categoria">
							<option value="geral" selected>Geral</option>
							<option value="duvidas">Dúvidas</option>
							<option value="anuncios">Anúncios</option>
							<option value="sugestoes">Sugestões</option>
							<option value="critica">Críticas</option>
						</select>
						<label for="categoria">Categoria</label>
					</div>
					<button type="submit" class="waves-effect btn green darken-3" style="float:right;">Publicar</button>
					<div style="clear:both;"></div>
				</div>
			</form>
		</div>
		<form method="POST" action="#">
			<button type="submit" name="categoria" value="geral" class="waves-effect btn green darken-3">Geral</button><button type="submit" name="categoria" value="duvidas" class="waves-effect btn green darken-3" style="margin-left:5px;">Dúvidas</button><button type="submit" name="categoria" value="anuncios" class="waves-effect btn green darken-3" style="margin-left:5px;">Anúncios</button><button type="submit" name="categoria" value="sugestoes" class="waves-effect btn green darken-3" style="margin-left:5px;">Sugestões</button><button type="submit" name="categoria" value="critica" class="waves-effect btn green darken-3" style="margin-left:5px;">Críticas</button>
		</form>
		<div style="margin-top:15px;">
		<?php
			if (empty($_POST['categoria'])) {
				$forum->listarTudo();
			}
			if (!empty($_POST['categoria'])) {
				$forum->listar($_POST['categoria']);
			}
		?>
		</div>
	</div>
</div>