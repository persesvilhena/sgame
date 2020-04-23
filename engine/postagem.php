<?php
include("engine/post/cabeca.php");
$exibicoesporpag = $row['epp'];
$numincial = $p4 * $exibicoesporpag;
// echo $contatos;

$res1 = mysqli_query($conecta, "SELECT * FROM `post` where id_us in ($contatos) ORDER BY id DESC LIMIT $numincial , $exibicoesporpag");
while($escrever1=mysqli_fetch_array($res1)){
	$e = $e + 1;
	$res = mysqli_query($conecta, "select * from user where id = '$escrever1[id_us]'");
	$escrever=mysqli_fetch_array($res);
	$datatempo = explode(" ", $escrever1['data']);
	$dat = explode("-", $datatempo[0]);
	$like = mysqli_query($conecta, "select * from gostar where id_post = '$escrever1[id]' and gostei = '1'");
	$rlike = mysqli_num_rows($like);
	$nlike = mysqli_query($conecta, "select * from gostar where id_post = '$escrever1[id]' and gostei = '0'");
	$rnlike = mysqli_num_rows($nlike);

	echo "<div id=\"item\" style=\"min-height: 50px; margin-top: 6px; padding: 5px; background: #ffffff;\"><div style=\"min-height: 55px;\">
	<div style=\"right: 6px; position: absolute;\">
	<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe4\" onclick=\"CarregaDadosJanela('" . $escrever1['id'] . "','menu_us');\"><img src=\"engine/imgs/showmenu.png\"></a>
	<!--<a href=\"#menu" . $e . "\" name=\"abremenu\" class=\"classe4\"><img src=\"engine/imgs/showmenu.png\"></a>-->
	</div>
	<div style=\"margin-right: 30px;\">
	<span class=\"textoinfo\">
	<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $escrever1['id_us'] . "','us');\"><img src=\"fotos/min/" . $escrever['foto'] . "\" width=\"50\" height=\"50\" align=\"left\" class=\"pr1\"></a>
	<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $escrever1['id_us'] . "','us');\"><span class=\"nome\">" . $escrever['nome'] . " " . $escrever['sobrenome'] . "</span></a>

	<a href=\"#\" class=\"classe4\" onclick=\"BtnLike('pus','" . $escrever1['id'] . "','1');\" id=\"pus" . $escrever1['id'] . "1\"><img src=\"engine/imgs/like.png\"></a> 
	<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $escrever1['id'] . "','btn_like');\">(" . $rlike . ")</a>

	<a href=\"#\" class=\"classe4\" onclick=\"BtnLike('pus','" . $escrever1['id'] . "','0');\" id=\"pus" . $escrever1['id'] . "0\"><img src=\"engine/imgs/nlike.png\"></a> 
	<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $escrever1['id'] . "','btn_nlike');\">(" . $rnlike . ")</a>

	</span><br>
	<span class=\"texto\">" . $escrever1['msg'] . "</span>


	";
	include ("engine/post/menus.php");




	//}
  		///////////////////////AREA DO REPOSTE
  		////////////////////////
  		////////////////////////
 	$tabelagostar = "gostar";
 	$btn = "btn_";
 	$rp = "rpus";
 	$ar = 0;
	echo "</div></div><div style=\"position: relative; border: 0px solid #000000; left: 55px; /*width: 520px;*/ margin-right: 55px;\">";
	$res3 = mysqli_query($conecta, "SELECT * FROM `repost` where id_post = '$escrever1[id]' ORDER BY id asc LIMIT 0 , 30");
 	while($escrever3=mysqli_fetch_array($res3)){
 		$i = $i + 1;
 		include ("engine/post/usrepost.php");
	}

	echo "
	<form action=\"\" method=\"post\" name=\"coment\">
	<input name=\"msg\" id=\"cordoinput\" size=\"65\" onkeypress=\"handle();\">
	<input type=\"hidden\" name=\"idpost\" value=\"" . $escrever1['id'] . "\">
	<input type=\"submit\" name=\"repost\" id=\"cordoinput\" value=\"Postar\">
	</form></div></div>";
}
$contagemdepags = mysqli_query($conecta, "SELECT count(*) FROM `post` where id_us in ($contatos);");
$rcontagemdepags = mysqli_fetch_array($contagemdepags);
//echo $rcontagemdepags['count(*)'];
$cnumdepags = $rcontagemdepags['count(*)'] / $exibicoesporpag;
$numdepags = ceil($cnumdepags);
$iepg = 0;
if($numdepags > 1){
if ($numdepags > 19){
	$numdepags = 19;
}
echo "<span class=\"texto\"><center>";
while ($iepg != $numdepags){
	$ndp = $iepg + 1;
	if($iepg != 0){
		echo " - ";
	}
	echo "<a href=\"index.php?index&p4=" . $iepg . "\" class=\"classe1\">" . $ndp . "</a>";
	$iepg++;
}
echo "</center></span>";
}


