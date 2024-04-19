<?php
	class UserRBR {
		public function logar($usuario, $senha) {
			global $serverDB, $userDB, $passDB, $DBname, $connectDB;
			$queryLog = mysqli_query($connectDB, "SELECT * FROM radiobr_contas WHERE usuario='$usuario'") or die ('<script>alert("Um erro aconteceu. Tente novamente mais tarde ou procure um membro do CTEx!");window.location="permissao.php";</script>');
			$assoc = mysqli_fetch_assoc($queryLog);
			$loginRows = mysqli_num_rows($queryLog);

			if ($loginRows > 0) {
				if ($senha == $assoc['senha'] AND $assoc['cargo'] > 0) {
					$_SESSION['usuario'] = $usuario;
					$ip = $_SERVER['REMOTE_ADDR'];
					gerarLog(''.$usuario.' logou. ('.$ip.')');
					header('Location: index.php');
				}
				if ($senha !== $assoc['senha']) {
				$ip = $_SERVER['REMOTE_ADDR'];
				gerarLog('Tentativa de entrar na conta '.$usuario.' com senha incorreta. ('.$ip.')');
				echo '<script>
					alert("Usuário ou senha incorretos!");
					window.location="login.php";
				</script>';
				}
				if ($assoc['cargo'] < 1) {
				unset($_SESSION['usuario']);
				gerarLog('O usuário desativado '.$usuario.' tentou entrar. ('.$ip.')');
				echo '<script>
					alert("Usuário desativado.");
					window.location="login.php";
				</script>';
				}
			}

			else {
				unset($_SESSION['usuario']);
				echo '<script>
					alert("Conta inexistente!");
					window.location="login.php";
				</script>';
			}
		}
		public function permissao($usuario) {
			global $serverDB, $userDB, $passDB, $DBname, $connectDB;
			$queryPermi = mysqli_query($connectDB, "SELECT * FROM radiobr_contas WHERE usuario='$usuario'") or die ('<script>alert("Um erro aconteceu. Tente novamente mais tarde ou procure um membro do CTEx!");window.location="permissao.php";</script>');
			$permi = mysqli_fetch_assoc($queryPermi);
			$_SESSION['cargo'] = $permi['cargo'];
		}
		public function criarConta($usuario, $senha, $cargo) {
			global $serverDB, $userDB, $passDB, $DBname, $connectDB;
			$password = md5('M1'.$senha.'Garand');
			$cargoU = $cargo * 1;
			$verificar = mysqli_query($connectDB, "SELECT * FROM radiobr_contas WHERE usuario='$usuario'");
			$contarRows = mysqli_num_rows($verificar);
			if ($contarRows < 1) {
				$criar = mysqli_query($connectDB, "INSERT INTO radiobr_contas (usuario, senha, datadecriacao, cargo) VALUES ('$usuario', '$password', '".date('d-m-Y')."', '$cargoU')");
				$criador = $_SESSION['usuario'];
				gerarLog(''.$criador.' criou a conta de '.$usuario.'.');
				echo '<script>
					alert("Conta criada com sucesso!");
					window.location="index.php?modulo=2";
				</script>';
			}
			else {
				echo '<script>
					alert("Conta já existente.");
					window.location="index.php?modulo=2";
				</script>';
			}
		}
		public function editarConta($usuario, $newuser, $senha, $cargo, $acao) {
			global $serverDB, $userDB, $passDB, $DBname, $connectDB;
			$editor = $_SESSION['usuario'];
			$senhaC = md5('M1'.$senha.'Garand');
			if ($acao == 'mudarusuario') {
				$queryVerifi = mysqli_query($connectDB, "SELECT * FROM radiobr_contas WHERE usuario='$usuario'") or die ('<script>alert("Um erro aconteceu. Tente novamente mais tarde ou procure um membro do CTEx!");window.location="permissao.php";</script>');
				$contarRVe = mysqli_num_rows($queryVerifi);
				if ($contarRVe > 0) {
					if ($newuser !== 'NULL') {
					$criar = mysqli_query($connectDB, "UPDATE radiobr_contas SET usuario='$newuser' WHERE usuario='$usuario'");
					gerarLog(''.$editor.' editou o nome da conta de '.$usuario.'.');
					echo '<script>
						alert("Nome editado com sucesso!");
						window.location="index.php?modulo=3";
					</script>';
					}
					else {
					echo '<script>
						alert("O novo nome não pode ser vazio!");
						window.location="index.php?modulo=3";
					</script>';					
					}
				}
				else {
					echo '<script>
						alert("Conta inexistente.");
						window.location="index.php?modulo=3";
					</script>';		
				}
			}
			if ($acao == 'mudarsenha') {
				$criar = mysqli_query($connectDB, "UPDATE radiobr_contas SET senha='$senhaC' WHERE usuario='$usuario'") or die ('<script>alert("Um erro aconteceu. Tente novamente mais tarde ou procure um membro do CTEx!");window.location="permissao.php";</script>');
				gerarLog(''.$editor.' editou a senha de '.$usuario.'.');
				echo '<script>
					alert("Senha editada com sucesso!");
					window.location="index.php?modulo=3";
				</script>';
			}
			if ($acao == 'mudarcargo') {
				$criar = mysqli_query($connectDB, "UPDATE radiobr_contas SET cargo='$cargo' WHERE usuario='$usuario'") or die ('<script>alert("Um erro aconteceu. Tente novamente mais tarde ou procure um membro do CTEx!");window.location="permissao.php";</script>');
				gerarLog(''.$editor.' editou o cargo de '.$usuario.'.');
				echo '<script>
					alert("Cargo editado com sucesso!");
					window.location="index.php?modulo=3";
				</script>';
			}
		}
		public function trocarSenha($usuario, $senhaatual, $senhanova) {
			global $serverDB, $userDB, $passDB, $DBname, $connectDB;
			$queryVerifi = mysqli_query($connectDB, "SELECT * FROM radiobr_contas WHERE usuario='$usuario'") or die ('<script>alert("Um erro aconteceu. Tente novamente mais tarde ou procure um membro do CTEx!");window.location="permissao.php";</script>');
			$numRows = mysqli_num_rows($queryVerifi);
			$dados = mysqli_fetch_assoc($queryVerifi);
			if ($numRows > 0 AND $dados['senha'] == $senhaatual) {
				$inserirSenha = mysqli_query($connectDB, "UPDATE radiobr_contas SET senha='$senhanova' WHERE usuario='$usuario'");
				gerarLog(''.$usuario.' mudou sua senha.');
				echo '<script>
					alert("Senha editada com sucesso!");
					window.location="index.php?modulo=1";
				</script>';
			}
			else {
				echo '
				
				<script>
					alert("Senha atual incorreta!");
					window.location="index.php?modulo=1";
				</script>';
			}
		}
		public function esquecisenha($usuario, $senha) {
			global $serverDB, $userDB, $passDB, $DBname, $connectDB;
			$query = mysqli_query($connectDB, "SELECT * FROM radiobr_contas WHERE usuario='$usuario'") or die ('<script>alert("Um erro aconteceu. Tente novamente mais tarde ou procure um membro do CTEx!");window.location="permissao.php";</script>');
			$numRows = mysqli_num_rows($query);

		    $url = "https://www.habbo.com.br/api/public/users?name=".trim($usuario);
			$ch = curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($ch, CURLOPT_URL, $url);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			curl_setopt($ch, CURLOPT_USERAGENT,'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) ecko/20080311 Firefox/2.0.0.13');
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
				
			$resultCodado = curl_exec($ch);
			curl_close($ch);

			$resultado = json_decode($resultCodado);

			if ($numRows > 0 AND $resultado->motto == $_SESSION['codigoSenha']) {
				$inserir = mysqli_query($connectDB, "UPDATE radiobr_contas SET senha='$senha' WHERE usuario='$usuario'");
				gerarLog(''.$usuario.' mudou sua senha usando a ferramenta de Esqueci a senha.');
				echo '<script>
					alert("Senha editada com sucesso!");
					window.location="login.php";
				</script>';
			}
			if ($numRows < 0) {
				echo '<script>
					alert("Conta inexistente.");
					window.location="esqueci_senha.php";
				</script>';
			}
			if ($resultado->motto !== $_SESSION['codigoSenha']) {
				gerarLog(''.$usuario.' tentou mudar sua senha usando a ferramenta de Esqueci a senha.');
				echo '<script>
					alert("Senha não alterada.");
					window.location="esqueci_senha.php";
				</script>';
			}
		}
	}
?>