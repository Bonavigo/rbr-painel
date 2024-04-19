<?php
	require_once('assets/central/general.php');

	if (isset($_SESSION['usuario'])) {
		header('Location: index.php');
	}

	if (!empty($_POST['usr_log']) AND !empty($_POST['passwordlog'])) {
		$usuario = $_POST['usr_log'];
		$senhaSalgada = 'M1'.$_POST['passwordlog'].'Garand';
		$senha = md5($senhaSalgada);
		$userC->logar($usuario, $senha);
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login - Radio Brasileira</title>
	<meta charset="utf-8">
	<link rel="icon" href="assets/img/radio_small.gif"/>
	<link rel="stylesheet" type="text/css" href="assets/materialize/materialize.min.css">
	<script src="assets/materialize/materialize.min.js"></script>
	<script src="assets/materialize/main.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/stylesheets/loginstyles.css">
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
					<h4 style="text-align:center;padding-top:20px;">Login Rádio Brasileira</h4>
				</div>
				<div class="card-content">
					<div class="input-field">
						<input id="usr_log" name="usr_log" type="text" class="validate" required>
						<label for="usr_log">Usuário</label>
					</div>
					<div class="input-field" style="margin-top:20px;">
						<input id="passwordlog" name="passwordlog" type="password" class="validate" required>
						<label for="passwordlog">Senha</label>
					</div>
					<div class="input-field" style="margin-top:10px;">
						<a href="esqueci_senha.php">Esqueci a senha</a>
					</div>
					<button type="submit" style="width:100%;height:45px;" class="waves-effect waves-light btn light-green darken-3">ENTRAR</button>
				</div>
			</form>
		</div>
	</div>
</div>
</body>
</html>