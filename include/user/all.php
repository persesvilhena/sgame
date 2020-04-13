<span class="titulo">TODOS OS USUARIOS</span>
<hr size="1" color="#cccccc">
<?php
$cont = 0;
$res1 = mysql_query("SELECT * FROM user ORDER BY id asc");
 while($escrever1=mysql_fetch_array($res1)){
 	 	$csql = mysql_query("SELECT * FROM user WHERE id='$escrever1[id]'");
	$rsql = mysql_fetch_array($csql);
		$cont = $cont + 1;
	$mod = $cont % 5;
 	if ($mod == 0){ $iii = "<div style=\"clear: both;\"></div>"; } else { $iii = ""; }
 echo "<div id=\"item\" style=\"width: 143px; float: left; margin: 2px; text-align: justify; padding: 5px;\" align=\"left\">";
 echo "<img src=\"fotos/" . $rsql['foto'] . "\" width=\"143\" height=\"150\">";
 echo "<center><a href=index.php?user&i1=1&i2=" . $escrever1['id'] . " class=\"classe1\">" . $rsql['nome'] . " " . $rsql['sobrenome'] . "</a></center>";
 echo "</div>";
 echo $iii;
}

?>
