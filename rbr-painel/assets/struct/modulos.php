<?php
/*if ($_GET['modulo'] == 1) {
	require('assets/modulos/inicial.php');
}*/
if ($_GET['modulo'] == 1) {
	require('assets/modulos/forum.php');
}
if ($_GET['modulo'] == 2) {
	require('assets/modulos/criar_conta.php');
}
if ($_GET['modulo'] == 3) {
	require('assets/modulos/editar_conta.php');
}
if ($_GET['modulo'] == 4) {
	require('assets/modulos/inserir_vinheta.php');
}
if ($_GET['modulo'] == 5) {
	require('assets/modulos/inserir_playlist.php');
}
if ($_GET['modulo'] == 6) {
	require('assets/modulos/listar_vinheta.php');
}
if ($_GET['modulo'] == 7) {
	require('assets/modulos/listar_playlist.php');
}
if ($_GET['modulo'] == 8) {
	require('assets/modulos/inserir_pilotos.php');
}
if ($_GET['modulo'] == 9) {
	require('assets/modulos/listar_pilotos.php');
}
if ($_GET['modulo'] == 10) {
	require('assets/modulos/inserir_projetos.php');
}
if ($_GET['modulo'] == 11) {
	require('assets/modulos/listar_projetos.php');
}
if ($_GET['modulo'] == 12) {
	require('assets/modulos/logs.php');
}
if ($_GET['modulo'] == 13) {
	require('assets/modulos/inserir_aviso.php');
}
if ($_GET['modulo'] == 14) {
	require('assets/modulos/listar_aviso.php');
}
if ($_GET['modulo'] == 15) {
	require('assets/modulos/inserir_atualizacao.php');
}
if ($_GET['modulo'] == 0 OR $_GET['modulo'] > 15) {
	$geralC->redirPermissao();
}
?>