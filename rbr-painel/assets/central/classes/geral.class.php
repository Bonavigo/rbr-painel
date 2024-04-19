<?php
	class GeralRBR {
		public function gerarCargo($numcargo) {
			if ($numcargo == 10) {
				$_SESSION['cargoT'] = 'Programador';
			}
			if ($numcargo == 9) {
				$_SESSION['cargoT'] = 'Alto-Comando';
			}
			if ($numcargo == 8) {
				$_SESSION['cargoT'] = 'Administrador';
			}
			if ($numcargo == 7) {
				$_SESSION['cargoT'] = 'Diretor';
			}
			if ($numcargo == 6) {
				$_SESSION['cargoT'] = 'Coordenador';
			}
			if ($numcargo == 5) {
				$_SESSION['cargoT'] = 'Locutor';
			}
			if ($numcargo == 4) {
				$_SESSION['cargoT'] = 'Radialista';
			}
			if ($numcargo == 3) {
				$_SESSION['cargoT'] = 'Marketing';
			}
			if ($numcargo == 2) {
				$_SESSION['cargoT'] = 'Divulgador';
			}
			if ($numcargo == 1) {
				$_SESSION['cargoT'] = 'Aprendiz De Locução';
			}
		}
		public function redirPermissao() {
			echo '<script>
				alert("Você não tem permissão para acessar essa página!");
				window.location="permissao.php";
			</script>';
			$usuarioLog = $_SESSION['usuario'];
			gerarLog(''.$usuarioLog.' tentou acessar uma página que não tinha permissão.');
		}
		public function inserirVinheta($nome, $link) {
			global $serverDB, $userDB, $passDB, $dbname, $DBname, $connectDB, $hora, $dataAtual;
			$inserir = mysqli_query($connectDB, "INSERT INTO radiobr_vinhetas (nome, link, data) VALUES ('$nome', '$link', '$dataAtual')") or die ('<script>alert("Um erro aconteceu. Tente novamente mais tarde ou procure um membro do CTEx!");window.location="permissao.php";</script>');
			$usuarioLog = $_SESSION['usuario'];
			gerarLog(''.$usuarioLog.' inseriu a vinheta '.$nome.'.');
			echo '<script>
				alert("Vinheta inserida com sucesso!");
				window.location="index.php?modulo=4";
			</script>';
		}
		public function inserirPlaylist($nome, $link) {
			global $serverDB, $userDB, $passDB, $dbname, $DBname, $connectDB, $hora, $dataAtual;
			$inserir = mysqli_query($connectDB, "INSERT INTO radiobr_playlists (nome, link, data) VALUES ('$nome', '$link', '$dataAtual')") or die ('<script>alert("Um erro aconteceu. Tente novamente mais tarde ou procure um membro do CTEx!");window.location="permissao.php";</script>');
			$usuarioLog = $_SESSION['usuario'];
			gerarLog(''.$usuarioLog.' inseriu a playlist '.$nome.'.');
			echo '<script>
				alert("Playlist inserida com sucesso!");
				window.location="index.php?modulo=5";
			</script>';
		}
		public function inserirPiloto($usuario, $link) {
			global $serverDB, $userDB, $passDB, $dbname, $DBname, $connectDB, $hora, $dataAtual;
			$inserir = mysqli_query($connectDB, "INSERT INTO radiobr_pilotos (usuario, link, data) VALUES ('$usuario', '$link', '$dataAtual')") or die ('<script>alert("Um erro aconteceu. Tente novamente mais tarde ou procure um membro do CTEx!");window.location="permissao.php";</script>');
			$usuarioLog = $_SESSION['usuario'];
			gerarLog(''.$usuarioLog.' inseriu o piloto '.$nome.'.');
			echo '<script>
				alert("Piloto inserido com sucesso!");
				window.location="index.php?modulo=8";
			</script>';
		}
		public function inserirProjeto($usuario, $titulo, $projeto) {
			global $serverDB, $userDB, $passDB, $dbname, $DBname, $connectDB, $hora, $dataAtual;
			$inserir = mysqli_query($connectDB, "INSERT INTO radiobr_projetos (titulo, conteudo, usuario, data, hora) VALUES ('$titulo', '$projeto', '$usuario', '$dataAtual', '$hora')") or die ('<script>alert("Um erro aconteceu. Tente novamente mais tarde ou procure um membro do CTEx!");window.location="permissao.php";</script>');
			$usuarioLog = $_SESSION['usuario'];
			gerarLog(''.$usuarioLog.' inseriu a projeto '.$nome.'.');
			echo '<script>
				alert("Projeto inserido com sucesso!");
				window.location="index.php?modulo=10";
			</script>';
		}
		public function listarVinheta() {
			global $serverDB, $userDB, $passDB, $dbname, $DBname, $connectDB, $hora, $dataAtual;
			$listar = mysqli_query($connectDB, "SELECT * FROM radiobr_vinhetas") or die ('<script>alert("Um erro aconteceu. Tente novamente mais tarde ou procure um membro do CTEx!");window.location="permissao.php";</script>');
			foreach ($listar as $vinheta) {
				echo '<tr>
					<td>'.$vinheta['nome'].'</td>
					<td>'.$vinheta['link'].'</td>
					<td>'.$vinheta['data'].'</td>
				</tr>';
			}
		}
		public function listarPlaylist() {
			global $serverDB, $userDB, $passDB, $dbname, $DBname, $connectDB, $dataAtual, $hora, $dataAtual;
			$listar = mysqli_query($connectDB, "SELECT * FROM radiobr_playlists") or die ('<script>alert("Um erro aconteceu. Tente novamente mais tarde ou procure um membro do CTEx!");window.location="permissao.php";</script>');
			foreach ($listar as $playlist) {
				echo '<tr>
					<td>'.$playlist['nome'].'</td>
					<td>'.$playlist['link'].'</td>
					<td>'.$playlist['data'].'</td>
				</tr>';
			}
		}
		public function listarPiloto() {
			global $serverDB, $userDB, $passDB, $dbname, $DBname, $connectDB, $dataAtual, $hora, $dataAtual;
			$listar = mysqli_query($connectDB, "SELECT * FROM radiobr_pilotos") or die ('<script>alert("Um erro aconteceu. Tente novamente mais tarde ou procure um membro do CTEx!");window.location="permissao.php";</script>');
			foreach ($listar as $piloto) {
				echo '<tr>
					<td>'.$piloto['usuario'].'</td>
					<td>'.$piloto['link'].'</td>
					<td>'.$piloto['data'].'</td>
				</tr>';
			}
		}
		public function listarProjeto() {
			global $serverDB, $userDB, $passDB, $dbname, $DBname, $connectDB, $dataAtual, $hora, $dataAtual;
			$listar = mysqli_query($connectDB, "SELECT * FROM radiobr_projetos ORDER BY id DESC") or die ('<script>alert("Um erro aconteceu. Tente novamente mais tarde ou procure um membro do CTEx!");window.location="permissao.php";</script>');
			foreach ($listar as $projeto) {
				echo '<tr>
					<td>'.$projeto['usuario'].'</td>
					<td>'.$projeto['titulo'].'</td>
					<td>'.$projeto['data'].'</td>';
					$onClick = "return abrirPopup('projeto.php?id=".$projeto['id']."', 800, 500)";
					echo '<td><a onclick="'.$onClick.'" href="#">Expandir</a></td>
				</tr>';
			}
		}
		public function listarLogs() {
			global $serverDB, $userDB, $passDB, $dbname, $DBname, $connectDB, $dataAtual, $hora, $dataAtual;
			$listar = mysqli_query($connectDB, "SELECT * FROM radiobr_logs ORDER BY id DESC LIMIT 100") or die ('<script>alert("Um erro aconteceu. Tente novamente mais tarde ou procure um membro do CTEx!");window.location="permissao.php";</script>');
			foreach ($listar as $log) {
				echo '<tr>
					<td>'.$log['id'].'</td>
					<td>'.$log['log'].'</td>
					<td>'.$log['data'].'</td>
					<td>'.$log['hora'].'</td>
				</tr>';
			}
		}
		public function listarAvisos() {
			global $serverDB, $userDB, $passDB, $dbname, $DBname, $connectDB, $dataAtual, $hora, $dataAtual;
			$listar = mysqli_query($connectDB, "SELECT * FROM radiobr_avisos WHERE status='ativo' ORDER BY id DESC LIMIT 100") or die ('<script>alert("Um erro aconteceu. Tente novamente mais tarde ou procure um membro do CTEx!");window.location="permissao.php";</script>');
			foreach ($listar as $aviso) {
				echo '
				<form method="POST" action="#">
				<tr>
					<td>'.$aviso['id'].'</td>
					<td>'.$aviso['titulo'].'</td>
					<td>'.$aviso['usuario'].'</td>
					<td>'.$aviso['data'].'</td>';
					$onClick = "return abrirPopup('aviso.php?id=".$aviso['id']."', 800, 500)";
					echo '<td><a onclick="'.$onClick.'" href="#">Abrir</a></td>';
				if ($_SESSION['cargo'] > 5) {
					echo '<td><button type="submit" name="apagaraviso" value="'.$aviso['id'].'" class="btn"><i class="far fa-trash-alt"></i></button></td>';
				}
				echo '</tr></form>';
			}
		}
		public function apagarAviso($id) {
			global $serverDB, $userDB, $passDB, $dbname, $DBname, $connectDB, $dataAtual, $hora, $dataAtual;
			$inativar = mysqli_query($connectDB, "UPDATE radiobr_avisos SET status='inativo' WHERE id='$id'") or die ('<script>alert("Um erro aconteceu. Tente novamente mais tarde ou procure um membro do CTEx!");window.location="permissao.php";</script>');
		}
		public function inserirAviso($titulo, $aviso) {
			global $serverDB, $userDB, $passDB, $dbname, $DBname, $connectDB, $dataAtual, $hora, $dataAtual;
			$usuario = $_SESSION['usuario'];
			$inserir = mysqli_query($connectDB, "INSERT INTO radiobr_avisos (usuario, titulo, aviso, data, status) VALUES ('$usuario', '$titulo', '$aviso', '$dataAtual', 'ativo')") or die ('<script>alert("Um erro aconteceu. Tente novamente mais tarde ou procure um membro do CTEx!");window.location="permissao.php";</script>');
			echo '<script>
				alert("Aviso inserido com sucesso!");
				window.location="index.php?modulo=13";
			</script>';
		}
		public function inserirAtt($titulo, $conteudo) {
			global $serverDB, $userDB, $passDB, $dbname, $DBname, $connectDB, $dataAtual, $hora, $dataAtual;
			$usuario = $_SESSION['usuario'];
			$inserir = mysqli_query($connectDB, "INSERT INTO radiobr_atualizacoes (usuario, titulo, data, conteudo) VALUES ('$usuario', '$titulo', '$dataAtual', '$conteudo')") or die ('<script>alert("Um erro aconteceu. Tente novamente mais tarde ou procure um membro do CTEx!");window.location="permissao.php";</script>');
			echo '<script>
				alert("Atualização inserida com sucesso!");
				window.location="index.php?modulo=15";
			</script>';
		}
	}
?>