<?php
	require_once('assets/central/general.php');

	if (isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}

	if (empty($_SESSION['codigoSenha'])){
		$_SESSION['codigoSenha'] = "RBR-".rand(10000, 30000);
	}

	if (!empty($_POST['usr_trocar']) AND !empty($_POST['passwordtrocar']) AND !empty($_POST['passwordtrocar2'])) {
		$usuario = $_POST['usr_trocar'];
		$senha = $_POST['passwordtrocar'];
		$senha2 = $_POST['passwordtrocar2'];
		if ($senha == $senha2) {
			$senhaSalgada = md5('M1'.$senha.'Garand');
			$userC->esquecisenha($usuario, $senhaSalgada);
		}
		else {
		echo '<script>
			alert("As senhas não são iguais!");
			window.location="login.php";
		</script>';
		}
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Esqueci minha Senha - Radio Brasileira</title>
	<meta charset="utf-8">
	<link rel="icon" href="assets/img/radio_small.gif"/>
	<link rel="stylesheet" type="text/css" href="assets/materialize/materialize.min.css">
	<script src="assets/materialize/materialize.min.js"></script>
	<script src="assets/materialize/main.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/stylesheets/loginstyles.css">
	<script src="https://www.google.com/recaptcha/api.js"></script>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<link href="assets/css/roboto.css" rel="stylesheet">
</head>
<body class="light-green darken-4">
<div class="container">
	<div class="row">
		<div class="card login-card col s12 m5 l5 xl5" style="border-radius:3px;margin-left:28%;">
			<form action="#" method="POST">
				<div class="card-login-header">
					<div class="card-login-logo"><p style="margin:0;text-align:center;"><img src="assets/img/radio_big.png"></p></div>
					<h5 style="text-align:center;padding-top:20px;">Recupere sua senha da Rádio Brasileira</h5>
				</div>
				<div class="card-content">
					<div class="input-field">
						<input id="usr_trocar" name="usr_trocar" type="text" class="validate" required>
						<label for="usr_trocar">Usuário</label>
					</div>
					<div class="input-field">
						<input id="passwordtrocar" name="passwordtrocar" type="text" class="validate" required>
						<label for="passwordtrocar">Senha</label>
					</div>
					<div class="input-field">
						<input id="passwordtrocar2" name="passwordtrocar2" type="text" class="validate" required>
						<label for="passwordtrocar2">Confirme a Senha</label>
					</div>
					<div class="input-field">
						<input id="codigo" name="codigo" type="text" class="validate active" value="<?php echo $_SESSION['codigoSenha']; ?>" required disabled>
						<label for="codigo">Código</label>
					</div>
					<button type="submit" style="width:100%;height:45px;" class="waves-effect waves-light btn light-green darken-3">TROCAR</button>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>