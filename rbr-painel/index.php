<?php
	require_once('assets/central/general.php');

	if(!isset($_SESSION['usuario'])) {
	echo "<script>
		window.location='login.php';
		</script>";
	exit();
	}

	if (!isset($_GET['modulo'])) {
		$_GET['modulo'] = 1;
	}

	if (!empty($_POST['senhaatual']) AND !empty($_POST['senhanova'])) {
		$senhaatual = md5('M1'.$_POST['senhaatual'].'Garand');
		$senhanova = md5('M1'.$_POST['senhanova'].'Garand');
		$userC->trocarSenha($_SESSION['usuario'], $senhaatual, $senhanova);
	}
	$userC->permissao($_SESSION['usuario']);
	$geralC->gerarCargo($_SESSION['cargo']);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Painel - Radio Brasileira</title>
	<meta charset="utf-8">
	<link rel="icon" href="assets/img/radio_small.gif"/>
	<link rel="stylesheet" type="text/css" href="assets/materialize/materialize.min.css">
	<script src="assets/materialize/materialize.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/stylesheets/loginstyles.css">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<link href="assets/css/roboto.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<script src="https://kit.fontawesome.com/5db384e8a3.js" crossorigin="anonymous"></script>
</head>
<body style="background:#f5f5f5;">
<nav class="light-green darken-4">
	<div class="nav-wrapper">
		<a href="index.php" class="brand-logo"><img src="assets/img/radio_small.gif" style="margin-top:13px;margin-left:15px;"></a>
		<ul id="nav-mobile" class="right hide-on-med-and-down">
			<li><a href="#!" class="dropdown-trigger" data-target="dropdown3"><i class="material-icons">sync</i></a></li>
			<li><a href="#!" class="dropdown-trigger" data-target="dropdown2"><i class="material-icons">chat</i></a></li>
			<li><a href="#!" class="dropdown-trigger" data-target="dropdown1"><?php echo $_SESSION['usuario'] ?></a></li>
		</ul>
	</div>
</nav>
<div class="z-depth-2" style="background:#FFFFFF;height:45px;">
	<div class="circle waves-effect sidenav-trigger" data-target="mobile-navbar" style="height:40px;width:40px;text-align:center;margin-top:2px;margin-left:15px;"><i style="margin-top:7px;font-size:28px;" class="material-icons">menu</i></div>
</div>
<ul id="mobile-navbar" class="sidenav">
	<li style="margin-top:-20px;">
		<div class="user-view light-green darken-4">
			<a href="#"><div class="card light-green darken-3" title="<?php echo $_SESSION['usuario'] ?>" style="margin-top:8px;width:50px;height:50px;background: url(https://www.habbo.com.br/habbo-imaging/avatarimage?user=<?php echo $_SESSION['usuario'] ?>&amp;action=std&amp;direction=3&amp;head_direction=3&amp;gesture=sml&amp;size=m) no-repeat -8px -15px;border-radius: 50px;float: right;margin-left: 10px;"></div></a>
			<a href="#"><span class="white-text name"><?php echo $_SESSION['usuario']; ?></span></a>
			<a href="#"><span class="white-text email"><?php echo $_SESSION['cargoT']; ?></span></a>
		</div>
	</li>
	<li><a href="index.php?modulo=1" class="waves-effect" style="margin-top:-8px;">Início</a></li>
	<ul class="collapsible collapsible-accordion">
		<?php if ($_SESSION['cargo'] > 5) { ?>
		<li class="bold"><a style="padding-left:30px;" class="collapsible-header waves-effect">Contas</a>
			<div class="collapsible-body">
				<ul>
					<li><a style="padding-left:50px;" href="index.php?modulo=2">Criar</a></li>
					<li><a style="padding-left:50px;" href="index.php?modulo=3">Editar</a></li>
				</ul>
			</div>
		</li>
		<?php } ?>
	</ul>
	<ul class="collapsible collapsible-accordion">
		<li class="bold"><a style="padding-left:30px;" class="collapsible-header waves-effect">Avisos</a>
			<div class="collapsible-body">
				<ul>
					<li><a style="padding-left:50px;" href="index.php?modulo=14">Avisos</a></li>
					<?php if ($_SESSION['cargo'] > 5) { ?><li><a style="padding-left:50px;" href="index.php?modulo=13">Inserir Aviso</a></li><?php } ?>
				</ul>
			</div>
		</li>
	</ul>
	<ul class="collapsible collapsible-accordion">
		<li class="bold"><a style="padding-left:30px;" class="collapsible-header waves-effect">Rádio</a>
			<div class="collapsible-body">
				<ul>
					<li><a style="padding-left:50px;" href="index.php?modulo=7">Playlists</a></li>
					<?php if ($_SESSION['cargo'] > 5) { ?><li><a style="padding-left:50px;" href="index.php?modulo=5">Inserir Playlist</a></li><?php } ?>
					<li><a style="padding-left:50px;" href="index.php?modulo=6">Vinhetas</a></li>
					<?php if ($_SESSION['cargo'] > 5) { ?><li><a style="padding-left:50px;" href="index.php?modulo=4">Inserir Vinheta</a></li><?php } ?>
					<?php if ($_SESSION['cargo'] > 5) { ?><li><a style="padding-left:50px;" href="index.php?modulo=9">Pilotos</a></li><?php } ?>
					<li><a style="padding-left:50px;" href="index.php?modulo=8">Inserir Piloto</a></li>
					<li><a style="padding-left:50px;" href="index.php?modulo=11">Projetos</a></li>
					<li><a style="padding-left:50px;" href="index.php?modulo=10">Inserir Projeto</a></li>
				</ul>
			</div>
		</li>
	</ul>
	<?php if ($_SESSION['cargo'] > 7) { ?><li><a href="index.php?modulo=12" class="waves-effect">Logs</a></li> <?php } ?>
	<?php if ($_SESSION['cargo'] == 10) { ?><li><a href="index.php?modulo=15" class="waves-effect">Inserir Atualização</a></li> <?php } ?>
	<li><a class="modal-trigger waves-effect" href="#modal_dados">Alterar Dados</a></li>
	<li><a href="logout.php" class="waves-effect">Sair</a></li>
</ul>
<ul id='dropdown1' class='dropdown-content'>
	<li><a class="modal-trigger" href="#modal_dados" style="color:black;">Alterar Dados</a></li>
	<li><a href="logout.php" style="color:black;">Sair</a></li>
</ul>
<script type="text/javascript">
	function abrirPopup(url) {
		popupzin = window.open (url, 'popup', "width=420, height=600, top=100, left=110")
	}
	function abrirPopup(e,o,i){var n=o+100,r=i+100,t=(screen.width-n)/2,h=(screen.height-r)/2,c=window.open(e,"name","width="+n+",height="+r+",left="+t+",top="+h);return c.resizeTo(n,r),c.moveTo(t,h),c.focus(),!1}
</script>
<ul id='dropdown2' class='dropdown-content'>
	<?php
		$consultaAvisos = mysqli_query($connectDB, "SELECT * FROM radiobr_avisos WHERE status='ativo' ORDER BY id DESC LIMIT 3");
		foreach ($consultaAvisos as $aviso) {
			$onClick = "return abrirPopup('aviso.php?id=".$aviso['id']."', 800, 500)";
			echo '<li><a onclick="'.$onClick.'" href="#" style="color:black;">'.$aviso['titulo'].'</a></li>';
		}
	?>
</ul>
<ul id='dropdown3' class='dropdown-content'>
	<?php
		$consultaAtt = mysqli_query($connectDB, "SELECT * FROM radiobr_atualizacoes ORDER BY id DESC LIMIT 3");
		foreach ($consultaAtt as $atualizacao) {
			$onClick = "return abrirPopup('atualizacao.php?id=".$atualizacao['id']."', 800, 500)";
			echo '<li><a onclick="'.$onClick.'" href="#" style="color:black;">'.$atualizacao['titulo'].'</a></li>';
		}
	?>
</ul>
<div id="modal_dados" class="modal">
	<form method="POST" action="#">
	<div class="modal-content">
		<h4>Mudar senha</h4>
		<div class="input-field">
			<input id="senhaatual" name="senhaatual" type="password" class="validate">
			<label for="senhaatual">Senha Atual</label>
		</div>
		<div class="input-field">
			<input id="senhanova" name="senhanova" type="password" class="validate">
			<label for="senhanova">Senha Nova</label>
		</div>
	</div>
	<div class="modal-footer">
		<a href="#!" class="modal-close waves-effect waves-red btn-flat">Fechar</a>
		<button type="submit" class="modal-close waves-effect waves-green btn-flat">Mudar</a>
	</div>
	</form>
</div>	
<main>
<div class="container" style="width:80%;">
	<?php require_once('assets/struct/modulos.php'); ?>
</div>
</main>
<script src="assets/materialize/main.js"></script>
<footer class="light-green darken-4" style="color:#FFF;margin-top:15px;">
	<div class="footer-copyright">
		<div class="container">
			<p style="text-align:center;margin:8px;">Exército Brasileiro do Habbo - Anonimo © 2008-<?php echo date('Y'); ?> < /> por Bona.</p>
		</div>
	</div>
</footer>
</body>
</html>