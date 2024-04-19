<?php
require_once('assets/central/general.php');
if(!isset($_SESSION['usuario'])) {
echo "<script>
	window.location='login.php';
	</script>";
exit();
}

if(isset($_GET['id'])) {
	$id = $_GET['id'];
	$aviso = mysqli_query($connectDB, "SELECT * FROM radiobr_avisos WHERE id='$id' AND status='ativo'") or die ('<script>alert("Um erro aconteceu. Tente novamente mais tarde ou procure um membro do CTEx!");window.location="permissao.php";</script>');
	$numRows = mysqli_num_rows($aviso);
	$avisoFetch = mysqli_fetch_assoc($aviso);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php if (isset($_GET['id']) AND $numRows > 0) { ?>Aviso <?php echo $avisoFetch['titulo']; ?> - por <?php echo $avisoFetch['usuario']; ?><?php } else { echo 'Aviso inexistente'; } ?></title>
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
	<div class="container">
		<?php if(isset($_GET['id']) AND $numRows > 0) { ?>
			<h5><?php echo $avisoFetch['titulo'] ?></h5>
			<h6>Por <?php echo $avisoFetch['usuario'] ?>, <?php echo $avisoFetch['data'] ?>.</h6>
			<?php echo $avisoFetch['aviso'] ?>
		<?php } else { echo '<p style="text-align:center;"><b>Aviso inexistente.</b></p>'; } ?>
		<p style="text-align:center;padding:30px;"><b>< /> por BrunoBonamigo</b></p>
	</div>
</body>