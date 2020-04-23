<?php

header('Content-Type: text/html; charset=utf-8');

$conecta = mysqli_connect("localhost", "root", "");
		   mysqli_select_db($conecta, "sgame");

mysqli_query($conecta, "SET NAMES 'utf8'");
mysqli_query($conecta, 'SET character_set_connection=utf8');
mysqli_query($conecta, 'SET character_set_client=utf8');
mysqli_query($conecta, 'SET character_set_results=utf8');

		   
class SistemaLogin { // Defino a classe principal do sistema
	
	//function antisql($sql) { // Função Anti-SQL
	//	$sql = get_magic_quotes_gpc() == 0 ? addslashes($sql) : $sql;
	//	$sql = trim($sql);
	//	$sql = strip_tags($sql);
	//	$sql = mysqli_escape_string($sql);
	//	return preg_replace("@(--|\#|\*|;|=)@s", '', $sql);
	//}
	function antisql($sql) {
    $sql = addslashes($sql);
    return $sql;
	}
}
$class = new SistemaLogin;
class EngineGame { 
	public $tempo_batalha_simples = 300;
	public $tempo_batalha_completa = 720;
	public $quantidade_cartas_dock_ataque = 3;
	public $quantidade_cartas_dock_defesa = 3;
	public $quantidade_cartas_dock_oculto = 3;
	public $pontuacao_base = 100;
	public $porcentagem_entre_cartas = 10;
	public $bonus_de_carta_defesa = 10;
	public $bonus_de_cash = 100;
	public $porcentagem_ganho_cartas_cash = 5;
	public $porcentagem_ganho_cartas_pts = 0.1;
}
$engine = new EngineGame;
$tabela = "user";
$creditos = "Sgame © 2016";
?>
