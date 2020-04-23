<span class="titulo">Contatos:</span>
<hr size="1" color="#cccccc">
<?php
$cont = 0;
$res2 = mysqli_query($conecta, "SELECT * FROM `contato` where deid = '$id'");
 while($escrever2=mysqli_fetch_array($res2)){
 	$csql = mysqli_query($conecta, "SELECT * FROM user WHERE id='$escrever2[cotid]'");
	$rsql = mysqli_fetch_array($csql);
	$cont = $cont + 1;
	$mod = $cont % 5;
 	if ($mod == 0){ $iii = "<div style=\"clear: both;\"></div>"; } else { $iii = ""; }
 echo "<div id=\"item\" style=\"width: 143px; float: left; margin: 2px; text-align: justify; padding: 5px;\" align=\"left\">";
 echo "<a href=index.php?user&i1=1&i2=" . $escrever2['cotid'] . "><img src=\"fotos/" . $rsql['foto'] . "\" width=\"143\" height=\"150\"></a>";
 echo "<center><a href=index.php?user&i1=1&i2=" . $escrever2['cotid'] . " class=\"classe1\">" . $rsql['nome'] . " " . $rsql['sobrenome'] . "</a></center>";
 echo "</div>";
 echo $iii;
}
if (mysqli_num_rows($res2) > 0){

} else {
echo "<center><span class=\"titulo\">A lista de contatos está vazia</span></center>";
}
?>