<?php
session_start();
if(!empty($_SESSION["login"]) && !empty($_SESSION["senha"]) && !empty($_SESSION["id"])){

	$login = $_SESSION["login"];
	$senha = $_SESSION["senha"];
	$id_gen = base64_decode($_SESSION["id"]); 

	$autentica = mysql_query("SELECT * FROM $tabela WHERE id='$id_gen' AND login='$login' AND senha='$senha';"); 
	$rs = mysql_fetch_array($autentica);
	$id = $rs["id"]; 

	if (mysql_num_rows($autentica) > 0) { 
		$mysqlq = mysql_query("SELECT * FROM user WHERE id='$id'"); 
		$row = mysql_fetch_array($mysqlq);
		$mysqlq2 = mysql_query("SELECT * FROM perfil WHERE id='$id'");
		$row2 = mysql_fetch_array($mysqlq2);
		$mysqlq3 = mysql_query("SELECT * FROM batalhas WHERE deid='$id'");
		$row3 = mysql_fetch_array($mysqlq3);
	}else{
		header ("Location: sair.php");
	}
}else{
	header ("Location: logar.php");
	exit();
}

?>