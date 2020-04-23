<?php

echo"
<div style=\"border: 0px solid #000000; width: 590px; position: absolute; left: 0px; top: -6px;\">
	<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
		<span class=\"titulo\">LIVRO DAS CARTAS</span><hr size=\"1\" width=\"100%\" color=\"#cccccc\">";



		$csql = mysqli_query($conecta, "SELECT * FROM cartas;");
	 	while($rsql=mysqli_fetch_array($csql)){
	 		$cont++;

	 		echo "
	 		<div id=\"item\" style=\"width: 143px; float: left; margin: 2px; text-align: justify; padding: 5px;\" align=\"left\">
	 			<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $rsql['id'] . "','carta_ver');\">
	 				<img src=\"cartas/" . $rsql['imagem'] . "\" width=\"143\" height=\"150\">
	 			</a>
	 			<center><a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $rsql['id'] . "','carta_ver');\">" . $rsql['nome'] . "</a></center>
	 		</div>";
	 		if(($cont%3) == 0){
	 			echo "<div style=\"clear: both;\"></div>";
	 		}
	 	}
	 		
	 	

echo "
		<div style=\"clear: both;\"></div>
	</div>
</div>

<div style=\" width: 198px; position: absolute; left: 594px; top: 0px;\">

	<div id=\"info\">
		<span class=\"titulo\"><center>Info</center></span>
		<hr size=\"1\" width=\"182\" color=\"#cccccc\">
		<span class=\"info\">Cash: " . $row['cash'] . "</span><br>
		<span class=\"info\">Cartas: " . $cont . "</span><br>
		<span class=\"info\">Pontos: " . $row['pts'] . "</span><br>
	</div>

	<div id=\"info\" style=\"margin-top: 4px;\" align=\"left\">
		<span class=\"titulo\"><center>Batalhas</center></span>
		<hr size=\"1\" width=\"182\" color=\"#cccccc\">
		<span class=\"info\">Proxima batalha em: 
		<b><div id=\"tempobatalhasimples\" align=\"center\"></div></b></span><br>
		<span class=\"info\">Bonus das cartas em: 
		<b><div id=\"tempobatalhacompleta\" align=\"center\"></div></b></span>
	</div>

</div>
	";


?>