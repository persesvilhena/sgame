<?php
$csql = mysql_query("SELECT * FROM `user` ORDER BY `pts` DESC");
echo "<div class=\"tabela1\"><table><tr><td width=\"150\"></td><td>Jogador</td><td width=\"50\">Pontos</td></tr>";
while($rsql=mysql_fetch_array($csql)){
	echo "<tr>
	<td><a href=\"index.php?user&i1=1&i2=" . $rsql['id'] . "\"><img src=\"fotos/" . $rsql['foto'] . "\" class=\"pr1\" width=\"150\" style=\"max-height: 150px;\"></a></td>
	<td><a href=\"index.php?user&i1=1&i2=" . $rsql['id'] . "\" class=\"classe1\">" . $rsql['nome'] . "</a></td>
	<td><span class=\"texto\">" . $rsql['pts'] . "</span></td>
	</tr>";
}
echo "</table></div>";
?>