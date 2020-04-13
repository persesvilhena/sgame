<?php
session_start();
include "conexao.php"; 

if(isset($_SESSION["login"]) && isset($_SESSION["senha"]) && isset($_SESSION["id"])) { // Verfico se existem os cookies
	session_destroy();
	// Gravo os cookies como nulos, o que fará o user 'deslogar' 
	/*setcookie("login", "", 0);
	setcookie("senha", "", 0);
	setcookie("id", "", 0);*/
}

// Redireciono o usuário para a página de login
header("Location: logar.php");
exit();
?>