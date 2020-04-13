<?php
$res2 = mysql_query("SELECT * FROM `contato` where deid = '$id'");
$contatos = $id;
while($escrever2=mysql_fetch_array($res2)){
	// echo "<br>" . $escrever2['cotid'] . "<br>";
	$contatos = $contatos . "," . $escrever2['cotid'];
}
// echo $contatos;
echo "<div style=\"border: 0px solid #000000; width: 590px; position: absolute; left: 0px; top: -6px;\">";
echo "<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\"><span class=\"texto\">
<form method=\"post\" action=\"\">
<textarea id=\"cordoinput\" type=\"text\" name=\"msg\" rows=\"5\" cols=\"50\"></textarea>
<input id=\"cordoinput\" type=\"submit\" name=\"post\" value=\"Postar\">
</form>
</span></div>";
include ("engine/postagem.php");


echo "</div>";



echo "<div id=\"publicidade\" style=\" width: 198px; position: absolute; left: 594px; top: 0px;\">";
echo "
propaganda<br>


</div>";
?>