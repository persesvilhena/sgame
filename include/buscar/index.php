<?php
$procurar = $_GET['buscar'];

$bcpessoas = mysql_query("select * from user where (nome like '%$procurar%') or (sobrenome like '%$procurar%') or (login like '%$procurar%') order by nome");

echo "
<span class=\"titulo\">" . $procurar . "</span><hr size=\"1\" color=\"#cccccc\">
";
while($rbcpessoas = mysql_fetch_array($bcpessoas)){
	echo "
	<div id=\"item\" style=\"padding: 5px; margin-top: 5px; margin-left: 5px; width: 380px; float: left;\">
	<a href=\"index.php?user&i1=1&i2=" . $rbcpessoas['id'] . "\"><img src=\"fotos/" . $rbcpessoas['foto'] . "\" align=\"left\" class=\"pr1\" width=\"100\" height=\"100\"></a>
	<a href=\"index.php?user&i1=1&i2=" . $rbcpessoas['id'] . "\" class=\"linkus\">" . $rbcpessoas['nome'] . " " . $rbcpessoas['sobrenome'] . "</a><br>
	<span class=\"texto\">
	<b>Nome: </b>" . $rbcpessoas['nome'] . "<br>
	<b>Sobrenome: </b>" . $rbcpessoas['sobrenome'] . "<br>
	<b>Login: </b>" . $rbcpessoas['login'] . "
	</span>
	</div>";
}
echo "
<div style=\"clear: both;\"></div>
";

?>