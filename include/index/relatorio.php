<?php













if ($i1 == 1 || $i1 == null){
echo "<div id=\"cj\"><span class=\"titulo\">Ataques Feitos:</span></div>";
echo "<div id =\"fj\"><div id =\"ctj\">";
$res = mysql_query("SELECT * FROM `rel` WHERE `deid` LIKE '$id' ORDER BY id DESC limit $row[epp];"); 
echo "<div class=\"tabela1\"><table><tr><td>Resultado:</td><td width=250>Adversário:</td></tr>";
 while($escrever=mysql_fetch_array($res)){
 	$csql = mysql_query("SELECT * FROM user WHERE id='$escrever[paraid]'");
	$rsql = mysql_fetch_array($csql);
 	if($escrever['res'] == 1){ $resultado = "Você ganhou o ataque!"; }
 	if($escrever['res'] == 2){ $resultado = "O ataque empatou!"; }
 	if($escrever['res'] == 3){ $resultado = "Você perdeu o ataque!"; }
 	if($escrever['res'] == 4){ $resultado = "O ataque deu empate técnico!"; }
 	if($escrever['res'] == 5){ $resultado = "Você ganhou o assalto!"; }
 	if($escrever['res'] == 6){ $resultado = "O assalto empatou!"; }
 	if($escrever['res'] == 7){ $resultado = "Você perdeu o assalto!"; }
 	if($escrever['res'] == 8){ $resultado = "O assalto deu empate técnico!"; }
 echo "<tr><td><a href=index.php?relatorio&i1=2&i2=" . $escrever['id'] . " class=classe1>" . $resultado . "</a>"; 
 echo"</td><td><a href=\"index.php?user&i1=1&i2=" . $escrever['paraid'] . "\" class=classe1>" . $rsql['nome'] . " " . $rsql['sobrenome'] . "</a></td></tr>";
}
echo "</table></div>"; 
echo "</div></div><br>";

echo "<div id=\"cj\"><span class=\"titulo\">Ataques Recebidos:</span></div>";
echo "<div id =\"fj\"><div id =\"ctj\">";
$res2 = mysql_query("SELECT * FROM `rel` WHERE `paraid` LIKE '$id' ORDER BY id DESC limit $row[epp];"); 
echo "<div class=\"tabela1\"><table><tr><td>Resultado:</td><td width=250>Adversário:</td></tr>";
 while($escrever2=mysql_fetch_array($res2)){
	$csql2 = mysql_query("SELECT * FROM user WHERE id='$escrever2[deid]'");
	$rsql2 = mysql_fetch_array($csql2);
 	if($escrever2['res'] == 1){ $resultado = "Você perdeu o ataque!"; }
 	if($escrever2['res'] == 2){ $resultado = "O ataque empatou!"; }
 	if($escrever2['res'] == 3){ $resultado = "Você ganhou o ataque!"; }
 	if($escrever2['res'] == 4){ $resultado = "O ataque deu empate técnico!"; }
 	if($escrever2['res'] == 5){ $resultado = "Você perdeu o assalto!"; }
 	if($escrever2['res'] == 6){ $resultado = "O assalto empatou!"; }
 	if($escrever2['res'] == 7){ $resultado = "Você ganhou o assalto!"; }
 	if($escrever2['res'] == 8){ $resultado = "O assalto deu empate técnico!"; }
 echo "<tr><td><a href=index.php?relatorio&i1=2&i2=" . $escrever2['id'] . " class=classe1>" . $resultado . "</a>";
  echo"</td><td><a href=\"index.php?user&i1=1&i2=" . $escrever2['deid'] . "\" class=classe1>" . $rsql2['nome'] . " " . $rsql2['sobrenome'] . "</a></td></tr>";
}
echo "</table></div>"; 
echo "</div></div>";
}


















if ($i1 == 2){
	$csql = mysql_query("SELECT * FROM rel WHERE id='$i2'");
	$rsql = mysql_fetch_array($csql);
	if($rsql['deid'] == $id){
		if($rsql['res'] == 1){ $resultado = "Você ganhou o ataque!"; }
	 	if($rsql['res'] == 2){ $resultado = "O ataque empatou!"; }
	 	if($rsql['res'] == 3){ $resultado = "Você perdeu o ataque!"; }
	 	if($rsql['res'] == 4){ $resultado = "O ataque deu empate técnico!"; }
	 	if($rsql['res'] == 5){ $resultado = "Você ganhou o assalto!"; }
	 	if($rsql['res'] == 6){ $resultado = "O assalto empatou!"; }
	 	if($rsql['res'] == 7){ $resultado = "Você perdeu o assalto!"; }
	 	if($rsql['res'] == 8){ $resultado = "O assalto deu empate técnico!"; }
		echo "
		<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
			<span class=\"titulo\">" . $resultado . "</span><hr size=\"1\" width=\"100%\" color=\"#cccccc\">
			<span class=\"texto\">
			<b>Pontos do atacante: </b>" . $rsql['pts_ataque'] . "<br>
			<b>Pontos do defensor: </b>" . $rsql['pts_defesa'] . "<br>
			<b>Pontos ganhos: </b>" . $rsql['pts_ganho'] . "<br>
			<b>Cash ganho: </b>" . $rsql['cash_ganho'] . "<br>
			<b>Data e hora: </b>" . gmdate("d/m/Y H:i:s", $rsql['data']) . "<br>
		</div>
		";
	}else{
	 	if($rsql['res'] == 1){ $resultado = "Você perdeu o ataque!"; }
	 	if($rsql['res'] == 2){ $resultado = "O ataque empatou!"; }
	 	if($rsql['res'] == 3){ $resultado = "Você ganhou o ataque!"; }
	 	if($rsql['res'] == 4){ $resultado = "O ataque deu empate técnico!"; }
	 	if($rsql['res'] == 5){ $resultado = "Você perdeu o assalto!"; }
	 	if($rsql['res'] == 6){ $resultado = "O assalto empatou!"; }
	 	if($rsql['res'] == 7){ $resultado = "Você ganhou o assalto!"; }
	 	if($rsql['res'] == 8){ $resultado = "O assalto deu empate técnico!"; }
		echo "
		<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
			<span class=\"titulo\">" . $resultado . "</span><hr size=\"1\" width=\"100%\" color=\"#cccccc\">
			<span class=\"texto\">
			<b>Pontos do atacante: </b>" . $rsql['pts_ataque'] . "<br>
			<b>Pontos do defensor: </b>" . $rsql['pts_defesa'] . "<br>
			<b>Pontos ganhos: </b>" . $rsql['pts_ganho'] . "<br>
			<b>Cash ganho: </b>" . $rsql['cash_ganho'] . "<br>
			<b>Data e hora: </b>" . gmdate("d/m/Y H:i:s", $rsql['data']) . "<br>
		</div>
		";
	}

}
































?>