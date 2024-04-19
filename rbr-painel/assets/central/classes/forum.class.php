<?php
	class Forum {
		public function bobba($texto) {
			//A censura era inútil, era só uma lista de palavrões. Para não ficar feio, apaguei.
			$filtro = array(
				'bobba' => 'bobba',
			);
			$censurado = strtr($texto, $filtro);
			return $censurado;
		}
		public function postar($usuario, $post, $categoria) {
			global $serverDB, $userDB, $passDB, $dbname, $DBname, $connectDB, $hora, $dataAtual;
			$postar = mysqli_query($connectDB, "INSERT INTO radiobr_forum (usuario, data, post, status, categoria) VALUES ('$usuario', '$dataAtual', '$post', 'ativo', '$categoria')") or die ('<script>alert("Um erro aconteceu ao tentar postar. Tente novamente mais tarde ou procure um membro do CTEx!");window.location="permissao.php";</script>');
			gerarLog(''.$usuario.' fez um post no fórum com a categoria '.$categoria.'.');
			echo '<script>
				alert("Post feito com sucesso!");
				window.location="index.php?modulo=1";
			</script>';
		}
		public function listar($categoria) {
			global $serverDB, $userDB, $passDB, $dbname, $DBname, $connectDB, $hora, $dataAtual;
			$listar = mysqli_query($connectDB, "SELECT * FROM radiobr_forum WHERE categoria='$categoria' AND status='ativo' ORDER BY id DESC LIMIT 20");
			foreach ($listar as $postagem) {
				$curtinhas = mysqli_query($connectDB, "SELECT * FROM radiobr_forum_curtidas WHERE id_post='".$postagem['id']."'");
				$curtidasnum = mysqli_num_rows($curtinhas);
				if ($curtidasnum == 0) {
					$ortografia = "curtidas";
				}
				if ($curtidasnum == 1) {
					$ortografia = "curtida";
				}
				else {
					$ortografia = "curtidas";
				}
				$verSeJaCurtiu = mysqli_query($connectDB, "SELECT * FROM radiobr_forum_curtidas WHERE id_post='".$postagem['id']."' AND user='".$_SESSION['usuario']."'");
				$curtidaUsernum = mysqli_num_rows($verSeJaCurtiu);
				echo '<div class="card" id="'.$postagem['id'].'" style="border-radius:10px;">
				<form method="POST" action="#">
				<div class="postagem" style="padding:10px;">
					<div class="usuario_postado">
					<div class="card light-green darken-3" style="margin-top:8px;width:50px;height:50px;background: url(https://www.habbo.com.br/habbo-imaging/avatarimage?user='.$postagem['usuario'].'&amp;action=std&amp;direction=3&amp;head_direction=3&amp;gesture=sml&amp;size=m) no-repeat -8px -15px;border-radius: 50px;margin-left: 10px;float:left;"></div><div style="margin-left:15px;margin-top:10px;display:inline-block;"><span style="font-size:14px;"><b>'.$postagem['usuario'].'</b></span><br><span style="font-size:13px;">'.$postagem['data'].' - '.$curtidasnum.' '.$ortografia.'</span>';
					if ($_SESSION['cargo'] > 5) { echo '<button type="submit" style="border:none;margin-left:5px;" name="apagarPost" value="'.$postagem['id'].'">Apagar</button>'; }
					echo '</div>
					</div>
					<div style="clear:both;"></div>
					<p style="margin-left:73px;margin-top:-10px;">'.$postagem['post'].'</p>
					<div style="margin-left:68px;width:90%;"><hr></div>';
					if ($curtidaUsernum < 1) {
						echo '<form method="POST" action="#"><button style="margin-left:68px;" value="'.$postagem['id'].'" class="btn waves-effect light-green darken-3" type="submit" name="curtidinha"><i style="font-size:15px;" class="far fa-thumbs-up"></i> Curtir</button></form>';
					}
					else {
						echo '<form method="POST" action="#"><button style="margin-left:68px;" value="'.$postagem['id'].'" class="btn waves-effect light-green darken-3" type="submit" name="descurtir"><i style="font-size:15px;" class="far fa-thumbs-up"></i> Curtido</button></form>';
					}
					echo '<span style="margin-left:5px;"><button class="btn waves-effect light-green darken-3" type="button"><i style="font-size:13px;" class="fas fa-tags"></i> '.$postagem['categoria'].'</button></span>';
					echo '<div></div>
				</div>
				</form>';
				$comentinhos = mysqli_query($connectDB, "SELECT * FROM radiobr_forum_comentarios WHERE id_post='".$postagem['id']."'");
				foreach ($comentinhos as $comentario) {
					echo '
					<div class="card light-green darken-3" style="margin-top:8px;width:50px;height:50px;background: url(https://www.habbo.com.br/habbo-imaging/avatarimage?user='.$comentario['usuario'].'&amp;action=std&amp;direction=3&amp;head_direction=2&headonly=1&amp;gesture=spk&amp;size=m) no-repeat -1px -6px;border-radius: 50px;margin-left: 10px;float:left;"></div><span style="float:left;margin-left:18px;font-size:14px;"><b>'.$comentario['usuario'].' -</b> '.$comentario['data'];
					echo '</span><div class="card z-depth-0 grey lighten-5" style="float:left;margin-left:18px;padding:7px;border-radius:10px;width:90%;">
						<p>'.$comentario['comentario'].'</p>
					</div>
					';
				}
				echo '<div style="clear:both;"></div>
				<div style="margin-top:-10px;">
				<form method="POST" action="#">
				<input name="idpost" value="'.$postagem['id'].'" style="display:none;">
				<div class="input-field">
					<textarea style="margin-left:68px;width:90%;" name="comentarizin" id="comentarizin'.$postagem['id'].'" class="materialize-textarea" required></textarea>
					<label style="margin-left:68px;width:90%;" for="comentarizin'.$postagem['id'].'">Comente!</label>
				</div>
				<button type="submit" class="btn waves-effect light-green darken-3" style="margin-left:68px;margin-top:-15px;margin-bottom:15px;width:90%;"><i style="font-size:15px;" class="fas fa-plus"></i> COMENTAR</button>
				</form>
				</div>
				';
				echo '</div>';
			}
		}
		public function listarTudo() {
			global $serverDB, $userDB, $passDB, $dbname, $DBname, $connectDB, $hora, $dataAtual;
			$listarT = mysqli_query($connectDB, "SELECT * FROM radiobr_forum WHERE status='ativo' ORDER BY id DESC LIMIT 20");
			foreach ($listarT as $postagem) {
				$curtinhas = mysqli_query($connectDB, "SELECT * FROM radiobr_forum_curtidas WHERE id_post='".$postagem['id']."'");
				$curtidasnum = mysqli_num_rows($curtinhas);
				if ($curtidasnum == 0) {
					$ortografia = "curtidas";
				}
				if ($curtidasnum == 1) {
					$ortografia = "curtida";
				}
				else {
					$ortografia = "curtidas";
				}
				$verSeJaCurtiu = mysqli_query($connectDB, "SELECT * FROM radiobr_forum_curtidas WHERE id_post='".$postagem['id']."' AND user='".$_SESSION['usuario']."'");
				$curtidaUsernum = mysqli_num_rows($verSeJaCurtiu);
				echo '<div class="card" id="'.$postagem['id'].'" style="border-radius:10px;">
				<form method="POST" action="#">
				<div class="postagem" style="padding:10px;">
					<div class="usuario_postado">
					<div class="card light-green darken-3" style="margin-top:8px;width:50px;height:50px;background: url(https://www.habbo.com.br/habbo-imaging/avatarimage?user='.$postagem['usuario'].'&amp;action=std&amp;direction=3&amp;head_direction=3&amp;gesture=sml&amp;size=m) no-repeat -8px -15px;border-radius: 50px;margin-left: 10px;float:left;"></div><div style="margin-left:15px;margin-top:10px;display:inline-block;"><span style="font-size:14px;"><b>'.$postagem['usuario'].'</b></span><br><span style="font-size:13px;">'.$postagem['data'].' - '.$curtidasnum.' '.$ortografia.'</span>';
					if ($_SESSION['cargo'] > 5) { echo '<button type="submit" style="border:none;margin-left:5px;" name="apagarPost" value="'.$postagem['id'].'">Apagar</button>'; }
					echo '</div>
					</div>
					<div style="clear:both;"></div>
					<p style="margin-left:73px;margin-top:-10px;">'.$postagem['post'].'</p>
					<div style="margin-left:68px;width:90%;"><hr></div>';
					if ($curtidaUsernum < 1) {
						echo '<form method="POST" action="#"><button style="margin-left:68px;" value="'.$postagem['id'].'" class="btn waves-effect light-green darken-3" type="submit" name="curtidinha"><i style="font-size:15px;" class="far fa-thumbs-up"></i> Curtir</button></form>';
					}
					else {
						echo '<form method="POST" action="#"><button style="margin-left:68px;" value="'.$postagem['id'].'" class="btn waves-effect light-green darken-3" type="submit" name="descurtir"><i style="font-size:15px;" class="far fa-thumbs-up"></i> Curtido</button></form>';
					}
					echo '<span style="margin-left:5px;"><button class="btn waves-effect light-green darken-3" type="button"><i style="font-size:13px;" class="fas fa-tags"></i> '.$postagem['categoria'].'</button></span>';
					echo '<div></div>
				</div>
				</form>';
				$comentinhos = mysqli_query($connectDB, "SELECT * FROM radiobr_forum_comentarios WHERE id_post='".$postagem['id']."'");
				foreach ($comentinhos as $comentario) {
					echo '
					<div class="card light-green darken-3" style="margin-top:8px;width:50px;height:50px;background: url(https://www.habbo.com.br/habbo-imaging/avatarimage?user='.$comentario['usuario'].'&amp;action=std&amp;direction=3&amp;head_direction=2&headonly=1&amp;gesture=spk&amp;size=m) no-repeat -1px -6px;border-radius: 50px;margin-left: 10px;float:left;"></div><span style="float:left;margin-left:18px;font-size:14px;"><b>'.$comentario['usuario'].' -</b> '.$comentario['data'];
					echo '</span><div class="card z-depth-0 grey lighten-5" style="float:left;margin-left:18px;padding:7px;border-radius:10px;width:90%;">
						<p>'.$comentario['comentario'].'</p>
					</div>
					';
				}
				echo '<div style="clear:both;"></div>
				<div style="margin-top:-10px;">
				<form method="POST" action="#">
				<input name="idpost" value="'.$postagem['id'].'" style="display:none;">
				<div class="input-field">
					<textarea style="margin-left:68px;width:90%;" name="comentarizin" id="comentarizin'.$postagem['id'].'" class="materialize-textarea" required></textarea>
					<label style="margin-left:68px;width:90%;" for="comentarizin'.$postagem['id'].'">Comente!</label>
				</div>
				<button type="submit" class="btn waves-effect light-green darken-3" style="margin-left:68px;margin-top:-15px;margin-bottom:15px;width:90%;"><i style="font-size:15px;" class="fas fa-plus"></i> COMENTAR</button>
				</form>
				</div>
				';
				echo '</div>';
			}
		}
		public function apagarPost($id) {
			global $serverDB, $userDB, $passDB, $dbname, $DBname, $connectDB, $hora, $dataAtual;
			$apagar = mysqli_query($connectDB, "UPDATE radiobr_forum SET status='inativo' WHERE id='$id'");
			gerarLog(''.$_SESSION['usuario'].' apagou o post de id '.$id.'.');
			echo '<script>
				alert("Post apagado com sucesso!");
				window.location="index.php?modulo=1";
			</script>';
		}
		public function curtir($idpost, $usuario) {
			global $serverDB, $userDB, $passDB, $dbname, $DBname, $connectDB, $hora, $dataAtual;
			$curtir = mysqli_query($connectDB, "INSERT INTO radiobr_forum_curtidas (id_post, user) VALUES ('$idpost', '$usuario')") or die ('<script>alert("Um erro aconteceu. Tente novamente mais tarde ou procure um membro do CTEx!");window.location="permissao.php";</script>');
			gerarLog(''.$usuario.' curtiu o post de id '.$idpost.'.');
			echo '<script>
				window.location="index.php?modulo=1";
			</script>';
		}
		public function descurtir($idpost, $usuario) {
			global $serverDB, $userDB, $passDB, $dbname, $DBname, $connectDB, $hora, $dataAtual;
			$curtir = mysqli_query($connectDB, "DELETE FROM radiobr_forum_curtidas WHERE user='$usuario' AND id_post='".$idpost."'") or die ('<script>alert("Um erro aconteceu. Tente novamente mais tarde ou procure um membro do CTEx!");window.location="permissao.php";</script>');
			gerarLog(''.$usuario.' descurtiu o post de id '.$idpost.'.');
			echo '<script>
				window.location="index.php?modulo=1";
			</script>';
		}
		public function comentar($idpost, $comentario, $usuario) {
			global $serverDB, $userDB, $passDB, $dbname, $DBname, $connectDB, $hora, $dataAtual;
			$curtir = mysqli_query($connectDB, "INSERT INTO radiobr_forum_comentarios (id_post, usuario, comentario, data, status) VALUES ('$idpost', '$usuario', '$comentario', '$dataAtual', 'ativo')") or die ('<script>alert("Um erro aconteceu ao tentar postar. Tente novamente mais tarde ou procure um membro do CTEx!");window.location="permissao.php";</script>');
			gerarLog(''.$usuario.' comentou o post de id '.$idpost.'.');
			echo '<script>
				window.location="index.php?modulo=1";
			</script>';
		}
	}
?>
