<?php


if(isset($_POST["addcarta"])) {
		$tipo = $class->antisql($_POST["tip"]);
		$carta = $class->antisql($_POST["carta"]);
			$insert = mysqli_query($conecta, "update user_cartas set tipo = '$tipo' where id = '$carta';") or die(mysqli_error());		
			if($insert) {				
				echo "<script>alert('OK!');window.location='index.php?index'</script>";
		}	

}


//////////////////////////////////////////////////////////////comprar efeito
if($p1 == 1){
	$csql = mysqli_query($conecta, "select * from ee where id = '$p2'");
	$rsql = mysqli_fetch_array($csql);
	if($row['cash'] >= $rsql['valor']){
		$cash = $row['cash'] - $rsql['valor'];
		$iduser = $row['id'];
		$insert = mysqli_query($conecta, "INSERT INTO user_ee VALUES (NULL, '$iduser', '$p2');");
		$insert = mysqli_query($conecta, "update user set cash = '$cash' where id = '$iduser';");
		if($insert){
			echo "<script>alert('OK!');window.location='index.php?index&i1=2'</script>";
		}else{
			echo "<script>alert('Houve um problema!');window.location='index.php?index&i1=2'</script>";
		}
	}else{
		echo "<script>alert('Voce nao possui cash suficiente para comprar o efeito!');window.location='index.php?index&i1=2'</script>";
	}
} 

//////////////////////////////////////////////////////////////vender efeito
if($p1 == 2){
	$csql = mysqli_query($conecta, "select * from user_ee where id = '$p2'");
	$rsql = mysqli_fetch_array($csql);
	$csql1 = mysqli_query($conecta, "select * from ee where id = '$rsql[ee]'");
	$rsql1 = mysqli_fetch_array($csql1);
	$cash = $row['cash'] + ($rsql1['valor'] * 0.6);
	$iduser = $row['id'];
	$insert = mysqli_query($conecta, "DELETE FROM user_ee WHERE id = '$p2';");
	$insert = mysqli_query($conecta, "update user set cash = '$cash' where id = '$iduser';");
	if($insert){
		echo "<script>alert('OK!');window.location='index.php?index&i1=2'</script>";
	}else{
		echo "<script>alert('Houve um problema!');window.location='index.php?index&i1=2'</script>";
	}
} 








//////////////////////////////////////////////////////////////comprar carta
if($p1 == 3){
	$csql = mysqli_query($conecta, "select * from cartas where id = '$p2'");
	$rsql = mysqli_fetch_array($csql);
	if($row['cash'] >= $rsql['valor']){
		$cash = $row['cash'] - $rsql['valor'];
		$iduser = $row['id'];
		$insert = mysqli_query($conecta, "INSERT INTO user_cartas VALUES (NULL, '$iduser', '$p2', null);");
		$insert = mysqli_query($conecta, "update user set cash = '$cash' where id = '$iduser';");
		if($insert){
			echo "<script>alert('OK!');window.location='index.php?book'</script>";
		}else{
			echo "<script>alert('Houve um problema!');window.location='index.php?book'</script>";
		}
	}else{
		echo "<script>alert('Voce nao possui cash suficiente para comprar a carta!');window.location='index.php?book'</script>";
	}
} 

//////////////////////////////////////////////////////////////vender carta
if($p1 == 4){
	$csql = mysqli_query($conecta, "select * from user_cartas where id = '$p2'");
	$rsql = mysqli_fetch_array($csql);
	$csql1 = mysqli_query($conecta, "select * from cartas where id = '$rsql[carta]'");
	$rsql1 = mysqli_fetch_array($csql1);
	$cash = $row['cash'] + ($rsql1['valor'] * 0.6);
	$iduser = $row['id'];
	$insert = mysqli_query($conecta, "DELETE FROM user_cartas WHERE id = '$p2';");
	$insert = mysqli_query($conecta, "update user set cash = '$cash' where id = '$iduser';");
	if($insert){
		echo "<script>alert('OK!');window.location='index.php?index'</script>";
	}else{
		echo "<script>alert('Houve um problema!');window.location='index.php?index'</script>";
	}
} 




if($p1 == 5){
	echo $engine->tempo_batalha_simples;
	echo "<br>" . $engine->tempo_batalha_completa . "<br>" . $engine->quantidade_cartas_dock_ataque . "<br>" . $engine->quantidade_cartas_dock_defesa . "";
}









if($i1 == 1 || $i1 == null){
echo "
<div style=\"border: 0px solid #000000; width: 590px; position: absolute; left: 0px; top: -6px;\">
	<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
		<span class=\"titulo\">DOCK DE ATAQUE</span><hr size=\"1\" width=\"100%\" color=\"#cccccc\">";



		$csql = mysqli_query($conecta, "SELECT * FROM user_cartas where deid = '$id' and tipo = '1';");
	 	while($rsql=mysqli_fetch_array($csql)){
	 		$cont++;
	 		$csql1 = mysqli_query($conecta, "select * from cartas where id = '$rsql[carta]';");
	 		$rsql1 = mysqli_fetch_array($csql1);
	 		echo "
	 		<div id=\"item\" style=\"width: 143px; float: left; margin: 2px; text-align: justify; padding: 5px;\" align=\"left\">
	 			<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $rsql['id'] . "','carta');\">
	 				<img src=\"cartas/" . $rsql1['imagem'] . "\" width=\"143\" height=\"150\">
	 			</a>
	 			<center><a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $rsql['id'] . "','carta');\">" . $rsql1['nome'] . "</a></center>
	 		</div>";
	 	}
	 	if($cont < $engine->quantidade_cartas_dock_ataque){
	 		echo "
	 		<div id=\"item\" style=\"width: 143px; float: left; margin: 2px; text-align: justify; padding: 5px;\" align=\"left\">
	 			<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('1','addcarta');\">
	 				<img src=\"engine/imgs/more.png\" width=\"143\" height=\"150\">
	 			</a>
	 			<center><a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('1','addcarta');\">Adicionar Carta</a></center>
	 		</div>";
	 	}

	echo "
	<div style=\"clear: both;\"></div>
	</div>

	<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
		<span class=\"titulo\">DOCK DE DEFESA</span><hr size=\"1\" width=\"100%\" color=\"#cccccc\">";


		$cont = 0;
		$csql = mysqli_query($conecta, "SELECT * FROM user_cartas where deid = '$id' and tipo = '2';");
	 	while($rsql=mysqli_fetch_array($csql)){
	 		$cont++;
	 		$csql1 = mysqli_query($conecta, "select * from cartas where id = '$rsql[carta]';");
	 		$rsql1 = mysqli_fetch_array($csql1);
	 		echo "
	 		<div id=\"item\" style=\"width: 143px; float: left; margin: 2px; text-align: justify; padding: 5px;\" align=\"left\">
	 			<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $rsql['id'] . "','carta');\">
	 				<img src=\"cartas/" . $rsql1['imagem'] . "\" width=\"143\" height=\"150\">
	 			</a>
	 			<center><a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $rsql['id'] . "','carta');\">" . $rsql1['nome'] . "</a></center>
	 		</div>";
	 	}
	 	if($cont < $engine->quantidade_cartas_dock_defesa){
	 		echo "
	 		<div id=\"item\" style=\"width: 143px; float: left; margin: 2px; text-align: justify; padding: 5px;\" align=\"left\">
	 			<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('2','addcarta');\">
	 				<img src=\"engine/imgs/more.png\" width=\"143\" height=\"150\">
	 			</a>
	 			<center><a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('2','addcarta');\">Adicionar Carta</a></center>
	 		</div>";
	 	}

	echo "
	<div style=\"clear: both;\"></div>
	</div>

	<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
		<span class=\"titulo\">DOCK OCULTO</span><hr size=\"1\" width=\"100%\" color=\"#cccccc\">";


		$cont = 0;
		$csql = mysqli_query($conecta, "SELECT * FROM user_cartas where deid = '$id' and tipo = '3';");
	 	while($rsql=mysqli_fetch_array($csql)){
	 		$cont++;
	 		$csql1 = mysqli_query($conecta, "select * from cartas where id = '$rsql[carta]';");
	 		$rsql1 = mysqli_fetch_array($csql1);
	 		echo "
	 		<div id=\"item\" style=\"width: 143px; float: left; margin: 2px; text-align: justify; padding: 5px;\" align=\"left\">
	 			<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $rsql['id'] . "','carta');\">
	 				<img src=\"cartas/" . $rsql1['imagem'] . "\" width=\"143\" height=\"150\">
	 			</a>
	 			<center><a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $rsql['id'] . "','carta');\">" . $rsql1['nome'] . "</a></center>
	 		</div>";
	 	}
	 	if($cont < $engine->quantidade_cartas_dock_oculto){
	 		echo "
	 		<div id=\"item\" style=\"width: 143px; float: left; margin: 2px; text-align: justify; padding: 5px;\" align=\"left\">
	 			<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('3','addcarta');\">
	 				<img src=\"engine/imgs/more.png\" width=\"143\" height=\"150\">
	 			</a>
	 			<center><a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('3','addcarta');\">Adicionar Carta</a></center>
	 		</div>";
	 	}

	echo "
	<div style=\"clear: both;\"></div>
	</div>

	<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
		<span class=\"titulo\">DOCK DE EFEITOS ESPECIAIS</span><hr size=\"1\" width=\"100%\" color=\"#cccccc\">";



		$csql = mysqli_query($conecta, "SELECT * FROM user_ee where deid = '$id';");
	 	while($rsql=mysqli_fetch_array($csql)){
	 		$csql1 = mysqli_query($conecta, "select * from ee where id = '$rsql[ee]';");
	 		$rsql1 = mysqli_fetch_array($csql1);
	 		echo "
	 		<div id=\"item\" style=\"width: 143px; float: left; margin: 2px; text-align: justify; padding: 5px;\" align=\"left\">
	 			<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $rsql['id'] . "','ee');\">
	 				<img src=\"cartas/" . $rsql1['imagem'] . "\" width=\"143\" height=\"150\">
	 			</a>
	 			<center><a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $rsql['id'] . "','ee');\">" . $rsql1['nome'] . "</a></center>
	 		</div>";
	 	}
	 		echo "
	 		<div id=\"item\" style=\"width: 143px; float: left; margin: 2px; text-align: justify; padding: 5px;\" align=\"left\">
	 			<a href=\"index.php?index&i1=2\" class=\"linkus\">
	 				<img src=\"engine/imgs/more.png\" width=\"143\" height=\"150\">
	 			</a>
	 			<center><a href=\"index.php?index&i1=2\" class=\"linkus\">Adicionar Efeito</a></center>
	 		</div>";
	 	

	echo "
	<div style=\"clear: both;\"></div>
	</div>

	<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
		<span class=\"titulo\">DOCK GERAL</span><hr size=\"1\" width=\"100%\" color=\"#cccccc\">";


		$cont = 0;
		$csql = mysqli_query($conecta, "SELECT * FROM user_cartas where deid = '$id';");
	 	while($rsql=mysqli_fetch_array($csql)){
	 		$cont++;
	 		$csql1 = mysqli_query($conecta, "select * from cartas where id = '$rsql[carta]';");
	 		$rsql1 = mysqli_fetch_array($csql1);
	 		echo "
	 		<div id=\"item\" style=\"width: 143px; float: left; margin: 2px; text-align: justify; padding: 5px;\" align=\"left\">
	 			<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $rsql['id'] . "','carta');\">
	 				<img src=\"cartas/" . $rsql1['imagem'] . "\" width=\"143\" height=\"150\">
	 			</a>
	 			<center><a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $rsql['id'] . "','carta');\">" . $rsql1['nome'] . "</a></center>
	 		</div>";
	 		if(($cont%3) == 0){
	 			echo "<div style=\"clear: both;\"></div>";
	 		}
	 	}
	 		echo "
	 		<div id=\"item\" style=\"width: 143px; float: left; margin: 2px; text-align: justify; padding: 5px;\" align=\"left\">
	 			<a href=\"index.php?book\" class=\"linkus\">
	 				<img src=\"engine/imgs/more.png\" width=\"143\" height=\"150\">
	 			</a>
	 			<center><a href=\"index.php?book\" class=\"linkus\">Adicionar Carta</a></center>
	 		</div>";
	 	

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
}
















if($i1 == 2){
	echo"
	<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
		<span class=\"titulo\">EFEITOS ESPECIAIS</span><hr size=\"1\" width=\"100%\" color=\"#cccccc\">";



		$csql = mysqli_query($conecta, "SELECT * FROM ee;");
	 	while($rsql=mysqli_fetch_array($csql)){
	 		$cont++;

	 		echo "
	 		<div id=\"item\" style=\"width: 143px; float: left; margin: 2px; text-align: justify; padding: 5px;\" align=\"left\">
	 			<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $rsql['id'] . "','ee_ver');\">
	 				<img src=\"cartas/" . $rsql['imagem'] . "\" width=\"143\" height=\"150\">
	 			</a>
	 			<center><a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $rsql['id'] . "','ee_ver');\">" . $rsql['nome'] . "</a></center>
	 		</div>";
	 	}
	 		echo "
	 		<div id=\"item\" style=\"width: 143px; float: left; margin: 2px; text-align: justify; padding: 5px;\" align=\"left\">
	 			<a href=\"index.php?index&i1=2\" class=\"linkus\">
	 				<img src=\"engine/imgs/more.png\" width=\"143\" height=\"150\">
	 			</a>
	 			<center><a href=\"index.php?index&i1=2\" class=\"linkus\">Adicionar Efeito</a></center>
	 		</div>";
	 	

	echo "
	<div style=\"clear: both;\"></div>
	</div>";
}




?>