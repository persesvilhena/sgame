<?php
$bd_server = "localhost";
$bd_user = "root";
$bd_pass = "";
$bd_name = "game";

header('Content-Type: text/html; charset=utf-8');
$conecta = mysql_connect($bd_server, $bd_user, $bd_pass);
mysql_select_db($bd_name, $conecta);
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');
		   
class SistemaLogin {
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
