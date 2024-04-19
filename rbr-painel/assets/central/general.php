<?php
	//bloquea o acesso do arquivo
	if(basename($_SERVER["PHP_SELF"]) == basename(__FILE__) ){
		http_response_code(404);
		exit;
	}
    else {
    	session_start();
    	
		//configurações gerais
		date_default_timezone_set('America/Sao_Paulo');
		$dataAtual = date('d/m/Y');
		$dataSemAno = date('d/m');
		$hora = date('H:i:s');
		$horaSemSegundos = date('H:i');
		$acessoCorreto = true;

		//conexão com o banco
		$serverDB = "localhost";
		$userDB = "root";
		$passDB = "";
		$DBname = "radiobr";
		$connectDB = new mysqli($serverDB, $userDB, $passDB, $DBname);

		function gerarLog($log) {
			global $serverDB, $userDB, $passDB, $dbname, $DBname, $connectDB, $hora, $dataAtual;
			$log = mysqli_query($connectDB, "INSERT INTO radiobr_logs (log, hora, data) VALUES ('$log', '$hora', '$dataAtual')") or die ('<audio src="https://login.exbrhbofc.net/audio/helper.mp3" style="display:none;" autoplay></audio><script>alert("Um erro aconteceu. Tente novamente mais tarde ou procure um membro do CTEx!");window.location="permissao.php";</script>');
		}

		//classes
		require_once('classes/geral.class.php');
		require_once('classes/forum.class.php');
		require_once('classes/user.class.php');

		$geralC = new GeralRBR();
		$userC = new UserRBR();
		$forum = new Forum();
	}
?>