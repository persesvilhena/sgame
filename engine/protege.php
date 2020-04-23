<?php
session_start();
if(!empty($_SESSION["login"]) && !empty($_SESSION["senha"]) && !empty($_SESSION["id"])){

	$login = $_SESSION["login"];
	$senha = $_SESSION["senha"];
	$id_gen = base64_decode($_SESSION["id"]); 

	$autentica = mysqli_query($conecta, "SELECT * FROM $tabela WHERE id='$id_gen' AND login='$login' AND senha='$senha';"); 
	$rs = mysqli_fetch_array($autentica);
	$id = $rs["id"]; 

	if (mysqli_num_rows($autentica) > 0) { 
		$mysqlq = mysqli_query($conecta, "SELECT * FROM user WHERE id='$id'"); 
		$row = mysqli_fetch_array($mysqlq);
		$mysqlq2 = mysqli_query($conecta, "SELECT * FROM perfil WHERE id='$id'");
		$row2 = mysqli_fetch_array($mysqlq2);
		$mysqlq3 = mysqli_query($conecta, "SELECT * FROM batalhas WHERE deid='$id'");
		$row3 = mysqli_fetch_array($mysqlq3);
	}
}else{
	header ("Location: logar.php");
	exit();
}

?>