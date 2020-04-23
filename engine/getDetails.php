<?php

$pagina = "index.php?mural";

include "../engine/conexao.php"; 
include "../engine/functions.php";
include "../engine/protege.php";


$idu = $_GET['id'];
$ua = $_GET['ua'];








////////////////////////////////////////////////////////////
/////////////////////JANELA USUARIOS E ARTISTAS
/////////////////////////////////////////////////////////////
if($ua == "us"){
$csql = mysqli_query($conecta, "select * from user where id = '$idu';");
$rsql = mysqli_fetch_array($csql);
$perfilcsql = mysqli_query($conecta, "select * from perfil where id = '$idu';");
$perfilrsql = mysqli_fetch_array($perfilcsql);

echo "
		<img src=\"fotos/" . $rsql['foto'] . "\" width=\"250\" height=\"250\" align=\"left\" class=\"pr1\">
		<div align=\"left\">
		<span class=\"titulo\">" . $rsql['nome'] . " " . $rsql['sobrenome'] . " - <a href=\"index.php?user&i1=1&i2=" . $rsql['id'] . "\" class=\"classe1\">Visitar Perfil</a></span>
		<hr size=\"1\" color=\"#cccccc\">
		<span class=\"texto\">
		<b>Data de Nascimento:</b> " . $perfilrsql['data_nasc'] . "<br>
		<b>Telefone:</b> " . $perfilrsql['telefone'] . "<br>
		<b>Telefone2:</b> " . $perfilrsql['telefone2'] . "<br>
		<b>Cidade:</b> " . $perfilrsql['cidade'] . "<br>
		<b>Estado:</b> " . $perfilrsql['estado'] . "<br>
		<b>Regiao:</b> " . $perfilrsql['regiao'] . "<br>
		<b>País:</b> " . $perfilrsql['pais'] . "<br>
		<b>Descricao:</b> " . $perfilrsql['descricao1'] . "<br>
		</span>
		</div>
";
}

if($ua == "ar"){
	$csql = mysqli_query($conecta, "select * from artista where id = '$idu';");
$rsql = mysqli_fetch_array($csql);

	$estmus = mysqli_query($conecta, "select * from est_musical where id = '$rsql[est_musical]';");
	$restmus = mysqli_fetch_array($estmus);
		if ($rsql['musicas'] == 1){ $mus = "Proprias"; }
		if ($rsql['musicas'] == 2){ $mus = "Covers"; }
		if ($rsql['musicas'] == 3){ $mus = "Mistas"; }
echo "
	<img src=\"fotos/" . $rsql['foto'] . "\" width=\"250\" height=\"250\" align=\"left\" class=\"pr1\">
	<div align=\"left\">
		<span class=\"titulo\">" . $rsql['nome'] . " - <a href=\"index.php?verart&i1=1&i2=" . $rsql['id'] . "\" class=\"classe1\">Visitar Perfil</a></span>
		<hr size=\"1\" color=\"#cccccc\">
		<span class=\"texto\">
			<b>Musicas:</b> " . $mus . "<br>
			<b>Estilo Musical:</b> " . $restmus['nome'] . "<br>
			<b>Cidade:</b> " . $rsql['cidade'] . "<br>
			<b>Estado:</b> " . $rsql['estado'] . "<br>
			<b>Descrição:</b> " . $rsql['descricao'] . "<br>
		</span>
	</div>
";
}








////////////////////////////////////////////////////////////
/////////////////////PERFIL
/////////////////////////////////////////////////////////////



if($ua == "perfil_alt"){
echo "
<span class=\"titulo\">Alterar Dados:</span>
<hr size=\"1\" color=\"#ccc\">
<form method=\"post\" action=\"index.php?perfilalterar\">
	<table border=\"0\" cellspacing=\"0\" cellpadding=\"2\">
		<tr>
			<td><span class=\"texto\">Nome:</span></td>
			<td><input type=\"text\" name=\"nome\" value=\"" . $row['nome'] . "\" size=\"80\"></td>
		</tr>
		<tr>
			<td><span class=\"texto\">Sobrenome:</span></td>
			<td><input type=\"text\" name=\"sobrenome\" value=\"" . $row['sobrenome'] . "\" size=\"80\"></td>
		</tr>
		<tr>
			<td><span class=\"texto\">E-mail:</span></td>
			<td><input type=\"text\" name=\"email\" value=\"" . $row['email'] . "\" size=\"80\"></td>
		</tr>
		<tr>
			<td></td>
			<td><div align=\"right\"><input type=\"submit\" name=\"cadastrar\" value=\"OK\"></div></td>
		</tr>
	</table>
</form>
";
}

if($ua == "perfil_alt1"){
	echo "
		<span class=\"titulo\">Alterar Dados:</span>
		<hr size=\"1\" color=\"#ccc\">
		<form method=\"post\" action=\"index.php?perfilalterar2\">
			<table border=\"0\" cellspacing=\"0\" cellpadding=\"2\">
				<tr>
					<td width=\"150\"><span class=\"texto\">Data de Nascimento:</span></td>
					<td width=\"150\"><input type=\"text\" name=\"data_nasc\" value=\"" . $row2["data_nasc"] . "\"></td>
					<td width=\"150\"><span class=\"texto\">Estado:</span></td>
					<td width=\"150\"><input type=\"text\" name=\"estado\" value=\"" . $row2["estado"] . "\"></td>
				</tr>
				<tr>
					<td><span class=\"texto\">Telefone:</span></td>
					<td><input type=\"text\" name=\"telefone\" value=\"" . $row2["telefone"] . "\"></td>
					<td><span class=\"texto\">Regiao:</span></td>
					<td><input type=\"text\" name=\"regiao\" value=\"" . $row2["regiao"] . "\"></td>
				</tr>
				<tr>
					<td><span class=\"texto\">Telefone2:</span></td>
					<td><input type=\"text\" name=\"telefone2\" value=\"" . $row2["telefone2"] . "\"></td>
					<td><span class=\"texto\">País:</span></td>
					<td><input type=\"text\" name=\"pais\" value=\"" . $row2["pais"] . "\"></td>
				</tr>
				<tr>
					<td><span class=\"texto\">Cidade:</span></td>
					<td><input type=\"text\" name=\"cidade\" value=\"" . $row2["cidade"] . "\"></td>
					<td></td>
					<td></td>
				</tr>
			</table>

			<table border=\"0\" cellspacing=\"0\" cellpadding=\"2\">
				<tr>
					<td><span class=\"texto\">Descricao1:</span></td>
					<td><textarea type=\"text\" name=\"descricao1\" rows=\"6\" cols=\"60\">" . $row2["descricao1"] . "</textarea></td>
				</tr>
				<tr>
					<td><span class=\"texto\">Descricao2:</span></td>
					<td><textarea type=\"text\" name=\"descricao2\" rows=\"6\" cols=\"60\">" . $row2["descricao2"] . "</textarea></td>
				</tr>

				<tr>
					<td></td>
					<td><div align=\"right\"><input type=\"submit\" name=\"cadastrar\" value=\"OK\"></div></td>
				</tr>
			</table>
		</form>

	";
}

















////////////////////////////////////////////////////////////
/////////////////////BOTOES LIKE E DESLIKE
/////////////////////////////////////////////////////////////


if($ua == "btn_like"){
	$csql = mysqli_query($conecta, "select * from gostar where id_post = '$idu' and gostei = '1'");
	while($rsql = mysqli_fetch_array($csql)){
		$csqluser = mysqli_query($conecta, "select * from user where id = '$rsql[id_us]'");
		$rsqluser = mysqli_fetch_array($csqluser);
		$datatempo = explode(" ", $rsql['data']);
		$dat = explode("-", $datatempo[0]);
		echo "
		<div style=\"min-height: 50px; margin-top: 5px;\">
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $rsqluser['id'] . "','us');\"><img src=\"fotos/min/" . $rsqluser['foto'] . "\" width=\"50\" height=\"50\" align=\"left\" class=\"pr1\"></a>
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $rsqluser['id'] . "','us');\">" . $rsqluser['nome'] . " " . $rsqluser['sobrenome'] . "</a><br>
		<span class=textoinfo>" . $dat[2] . "/" . $dat[1] . "/" . $dat[0] . " " . $datatempo[1] . " 
		</div>
		";
	}
}

if($ua == "btn_nlike"){
	$csql = mysqli_query($conecta, "select * from gostar where id_post = '$idu' and gostei = '0'");
	while($rsql = mysqli_fetch_array($csql)){
		$csqluser = mysqli_query($conecta, "select * from user where id = '$rsql[id_us]'");
		$rsqluser = mysqli_fetch_array($csqluser);
		$datatempo = explode(" ", $rsql['data']);
		$dat = explode("-", $datatempo[0]);
		echo "
		<div style=\"min-height: 50px; margin-top: 5px;\">
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $rsqluser['id'] . "','us');\"><img src=\"fotos/min/" . $rsqluser['foto'] . "\" width=\"50\" height=\"50\" align=\"left\" class=\"pr1\"></a>
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $rsqluser['id'] . "','us');\">" . $rsqluser['nome'] . " " . $rsqluser['sobrenome'] . "</a><br>
		<span class=textoinfo>" . $dat[2] . "/" . $dat[1] . "/" . $dat[0] . " " . $datatempo[1] . " 
		</div>
		";
	}
}

if($ua == "btn_like2"){
	$csql = mysqli_query($conecta, "select * from gostar where id_repost = '$idu' and gostei = '1'");
	while($rsql = mysqli_fetch_array($csql)){
		$csqluser = mysqli_query($conecta, "select * from user where id = '$rsql[id_us]'");
		$rsqluser = mysqli_fetch_array($csqluser);
		$datatempo = explode(" ", $rsql['data']);
		$dat = explode("-", $datatempo[0]);
		echo "
		<div style=\"min-height: 50px; margin-top: 5px;\">
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $rsqluser['id'] . "','us');\"><img src=\"fotos/min/" . $rsqluser['foto'] . "\" width=\"50\" height=\"50\" align=\"left\" class=\"pr1\"></a>
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $rsqluser['id'] . "','us');\">" . $rsqluser['nome'] . " " . $rsqluser['sobrenome'] . "</a><br>
		<span class=textoinfo>" . $dat[2] . "/" . $dat[1] . "/" . $dat[0] . " " . $datatempo[1] . " 
		</div>
		";
	}
}

if($ua == "btn_nlike2"){
	$csql = mysqli_query($conecta, "select * from gostar where id_repost = '$idu' and gostei = '0'");
	while($rsql = mysqli_fetch_array($csql)){
		$csqluser = mysqli_query($conecta, "select * from user where id = '$rsql[id_us]'");
		$rsqluser = mysqli_fetch_array($csqluser);
		$datatempo = explode(" ", $rsql['data']);
		$dat = explode("-", $datatempo[0]);
		echo "
		<div style=\"min-height: 50px; margin-top: 5px;\">
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $rsqluser['id'] . "','us');\"><img src=\"fotos/min/" . $rsqluser['foto'] . "\" width=\"50\" height=\"50\" align=\"left\" class=\"pr1\"></a>
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $rsqluser['id'] . "','us');\">" . $rsqluser['nome'] . " " . $rsqluser['sobrenome'] . "</a><br>
		<span class=textoinfo>" . $dat[2] . "/" . $dat[1] . "/" . $dat[0] . " " . $datatempo[1] . " 
		</div>
		";
	}
}












////////////////////////////////////////////////////////////
/////////////////////MENUS
/////////////////////////////////////////////////////////////


/////////////////////////////////MENU DO POST
if($ua == "menu_us"){
	$csql = mysqli_query($conecta, "select * from post where id = '$idu';");
	$rsql = mysqli_fetch_array($csql);
	$datatempo = explode(" ", $rsql['data']);
	$dat = explode("-", $datatempo[0]);
	echo "
	<center>
	<span class=textoinfo>" . $dat[2] . "/" . $dat[1] . "/" . $dat[0] . " " . $datatempo[1] . " ";
	if($rsql['id_us'] == $id){
		echo "<br>
		<input id=\"cordoinput\" type=\"button\" value=\"Alterar\" onClick=\"MostrarOcultar('menualterar');Ocultar('menuapagar');\">
		<input id=\"cordoinput\" type=\"button\" value=\"Apagar\" onClick=\"MostrarOcultar('menuapagar');Ocultar('menualterar');\">";
	}
	echo "
	</center>
	</span>

	<div id=\"menualterar\" style=\"display: none;\">
	<form action=\"" . $pagina . "&p1=6&p2=" . $rsql['id'] . "\" method=\"post\">
	<textarea id=\"cordoinput\" name=\"msg\" type=\"text\">" . $rsql['msg'] . "</textarea>
	<input id=\"cordoinput\" name=\"alterapost\" type=\"submit\" value=\"Alterar\">
	</form>
	</div>

	<div id=\"menuapagar\" style=\"display: none;\">
	<center><span class=\"texto\">Você realmente deseja apagar o comentário?</span><br><br>
	<a href=\"" . $pagina . "&p1=4&p2=" . $rsql['id'] . "\" class=\"classe4\"><img src=\"engine/imgs/ok.png\"></a> 
	<a href=\"#\" class=\"close\"><img src=\"engine/imgs/cancela.png\"></a></span></center>";
}



/////////////////////////////////MENU DO REPOST
if($ua == "remenu_us"){
	$csql = mysqli_query($conecta, "select * from repost where id = '$idu';");
	$rsql = mysqli_fetch_array($csql);
	$datatempo = explode(" ", $rsql['data']);
	$dat = explode("-", $datatempo[0]);
	echo "
	<center>
	<span class=textoinfo>" . $dat[2] . "/" . $dat[1] . "/" . $dat[0] . " " . $datatempo[1] . " ";
	if($rsql['id_us'] == $id){
		echo "<br>
		<input id=\"cordoinput\" type=\"button\" value=\"Alterar\" onClick=\"MostrarOcultar('menualterar');Ocultar('menuapagar');\">
		<input id=\"cordoinput\" type=\"button\" value=\"Apagar\" onClick=\"MostrarOcultar('menuapagar');Ocultar('menualterar');\">";
	}
	echo "
	</center>
	</span>

	<div id=\"menualterar\" style=\"display: none;\">
	<form action=\"" . $pagina . "&p1=7&p2=" . $rsql['id'] . "\" method=\"post\">
		<textarea id=\"cordoinput\" name=\"msg\" type=\"text\">" . $rsql['msg'] . "</textarea>
		<input id=\"cordoinput\" name=\"alterarepost\" type=\"submit\" value=\"Alterar\">
		</form>
	</div>

	<div id=\"menuapagar\" style=\"display: none;\">
	<center><span class=\"texto\">Você realmente deseja apagar o comentário?</span><br><br>
	<a href=\"" . $pagina . "&p1=5&p2=" . $rsql['id'] . "\" class=\"classe4\"><img src=\"engine/imgs/ok.png\"></a> 
	<a href=\"#\" class=\"close\"><img src=\"engine/imgs/cancela.png\"></a>
	</center>
	</div>
	";
}








////////////////////////////////////////////////////////////
/////////////////////CARTAS
/////////////////////////////////////////////////////////////

if($ua == "carta"){
$csql = mysqli_query($conecta, "select * from user_cartas where id = '$idu';");
$rsql = mysqli_fetch_array($csql);
$csql1 = mysqli_query($conecta, "select * from cartas where id = '$rsql[carta]';");
$rsql1 = mysqli_fetch_array($csql1);
$csql2 = mysqli_query($conecta, "select * from artista where id = '$rsql1[artista]';");
$rsql2 = mysqli_fetch_array($csql2);
$csql3 = mysqli_query($conecta, "select * from est_musical where id = '$rsql1[est_musical]';");
$rsql3 = mysqli_fetch_array($csql3);
$csql4 = mysqli_query($conecta, "select * from tip where id = '$rsql1[tip]';");
$rsql4 = mysqli_fetch_array($csql4);

echo "
		<span class=\"texto\">
		<span class=\"titulo\">" . $rsql1['nome'] . "</span><hr size=\"1\" color=\"#cccccc\">
			<img src=\"cartas/" . $rsql1['imagem'] . "\" width=\"200\" height=\"200\" align=\"left\">
			<b>Nome: </b>" . $rsql1['nome'] . "<br>
			<b>Artista: </b>" . $rsql2['nome'] . "<br>
			<b>Estilo Musical: </b>" . $rsql3['nome'] .  "<br>
			<b>Ano: </b>" . $rsql1['ano'] .  "<br>
			<b>Quantidade de vendas(em milhares): </b>" . $rsql1['qtd_vendas'] . "<br>
			<b>Pontos: </b>" . $rsql1['pts'] . "<br>
			<b>Quantidade de fãs(em milhares): </b>" . $rsql1['qtd_fas'] . "<br>
			<b>Tipo: </b>" . $rsql4['nome'] . "<br>
			<b>Valor: </b>" . $rsql1['valor'] . "<br>
			<center><a href=\"index.php?index&p1=4&p2=" . $rsql['id'] . "\" class=\"botao\">Vender Carta</a></center>
		</span>";
}





if($ua == "addcarta"){
echo "
<form action=\"index.php?index\" method=\"post\">
<input name=\"tip\" type=\"hidden\" value=\"" . $idu . "\">
<select name=\"carta\">";
$csql = mysqli_query($conecta, "select * from user_cartas where deid = '$id';");
while($rsql = mysqli_fetch_array($csql)){
	$csql1 = mysqli_query($conecta, "select * from cartas where id = '$rsql[carta]';");
	$rsql1 = mysqli_fetch_array($csql1);
	echo "<option value=\"" . $rsql['id'] . "\">" . $rsql1['nome'] . "</option>";
}

echo "
</select>
<input name=\"addcarta\" type=\"submit\" value=\"Enviar\">
</form>
";
}


if($ua == "carta_ver"){
$csql = mysqli_query($conecta, "select * from cartas where id = '$idu';");
$rsql = mysqli_fetch_array($csql);
$csql1 = mysqli_query($conecta, "select * from user_cartas where carta = '$idu' and deid = '$row[id]';");
$rsql1 = mysqli_fetch_array($csql1);
$csql2 = mysqli_query($conecta, "select * from artista where id = '$rsql[artista]';");
$rsql2 = mysqli_fetch_array($csql2);
$csql3 = mysqli_query($conecta, "select * from est_musical where id = '$rsql[est_musical]';");
$rsql3 = mysqli_fetch_array($csql3);
$csql4 = mysqli_query($conecta, "select * from tip where id = '$rsql[tip]';");
$rsql4 = mysqli_fetch_array($csql4);

echo "
	<span class=\"texto\">
		<span class=\"titulo\">" . $rsql['nome'] . "</span><hr size=\"1\" color=\"#cccccc\">
		<img src=\"cartas/" . $rsql['imagem'] . "\" width=\"200\" height=\"200\" align=\"left\">
		<b>Nome: </b>" . $rsql['nome'] . "<br>
		<b>Artista: </b>" . $rsql2['nome'] . "<br>
		<b>Estilo Musical: </b>" . $rsql3['nome'] .  "<br>
		<b>Ano: </b>" . $rsql['ano'] .  "<br>
		<b>Quantidade de vendas(em milhares): </b>" . $rsql['qtd_vendas'] . "<br>
		<b>Pontos: </b>" . $rsql['pts'] . "<br>
		<b>Quantidade de fãs(em milhares): </b>" . $rsql['qtd_fas'] . "<br>
		<b>Tipo: </b>" . $rsql4['nome'] . "<br>
		<b>Valor: </b>" . $rsql['valor'] . "
		";
		if($rsql1['id'] != null){
			echo "<br><center><b>Você já possui esta carta!</b></center>";
		}
		echo"
		<br><center><a href=\"index.php?index&p1=3&p2=" . $rsql['id'] . "\" class=\"botao\">Comprar Carta</a></center>
		</span>";
}









////////////////////////////////////////////////////////////
/////////////////////EFEITOS ESPECIAIS
/////////////////////////////////////////////////////////////

if($ua == "ee"){
$csql = mysqli_query($conecta, "select * from user_ee where id = '$idu';");
$rsql = mysqli_fetch_array($csql);
$csql1 = mysqli_query($conecta, "select * from ee where id = '$rsql[ee]';");
$rsql1 = mysqli_fetch_array($csql1);
$csql2 = mysqli_query($conecta, "select * from tip where id = '$rsql1[tip]';");
$rsql2 = mysqli_fetch_array($csql2);


echo "
		<span class=\"texto\">
		<span class=\"titulo\">" . $rsql1['nome'] . "</span><hr size=\"1\" color=\"#cccccc\">
			<img src=\"cartas/" . $rsql1['imagem'] . "\" width=\"200\" height=\"200\" align=\"left\">
			<b>Nome: </b>" . $rsql1['nome'] . "<br>
			<b>Ganho: </b>" . $rsql1['ganho'] . "%<br>
			<b>Valor: </b>" . $rsql1['valor'] .  "<br>
			<b>Tipo: </b>" . $rsql2['nome'] .  "<br>
			<center><a href=\"index.php?index&p1=2&p2=" . $rsql['id'] . "\" class=\"botao\">Vender Efeito</a></center>
		</span>";
}








if($ua == "ee_ver"){
$csql = mysqli_query($conecta, "select * from ee where id = '$idu';");
$rsql = mysqli_fetch_array($csql);
$csql1 = mysqli_query($conecta, "select * from user_ee where ee = '$idu' and deid = '$row[id]';");
$rsql1 = mysqli_fetch_array($csql1);
$csql2 = mysqli_query($conecta, "select * from tip where id = '$rsql[tip]';");
$rsql2 = mysqli_fetch_array($csql2);


echo "
		<span class=\"texto\">
		<span class=\"titulo\">" . $rsql['nome'] . "</span><hr size=\"1\" color=\"#cccccc\">
			<img src=\"cartas/" . $rsql['imagem'] . "\" width=\"200\" height=\"200\" align=\"left\">
			<b>Nome: </b>" . $rsql['nome'] . "<br>
			<b>Ganho: </b>" . $rsql['ganho'] . "%<br>
			<b>Valor: </b>" . $rsql['valor'] .  "<br>
			<b>Tipo: </b>" . $rsql2['nome'] .  "<br>
			";
			if($rsql1['id'] == null){
				echo"<br><center><a href=\"index.php?index&p1=1&p2=" . $rsql['id'] . "\" class=\"botao\">Comprar Efeito</a></center>";
			}else{
				echo "<br><center><b>Você já possui este efeito!</b></center>";
			}
		echo "</span>";
}



?>