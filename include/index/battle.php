<?php


if($i1 == null || $i1 == 1){
echo "
<div style=\"border: 0px solid #000000; width: 590px; position: absolute; left: 0px; top: -6px;\">
	<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
		<span class=\"titulo\">BATALHAS</span><hr size=\"1\" width=\"100%\" color=\"#cccccc\">
		<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px; width: 250px; float: left;\">
			<center><span class=\"titulo\">BATALHA</span></center><hr size=\"1\" width=\"100%\" color=\"#cccccc\"><br>
			<span class=\"titulo\"><div id=\"tempobatalhasimples\" align=\"center\"></div></span>
		</div>
		<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px; width: 250px; float: right;\">
			<center><span class=\"titulo\">BONUS</span></center><hr size=\"1\" width=\"100%\" color=\"#cccccc\"><br>
			<span class=\"titulo\"><div id=\"tempobatalhacompleta\" align=\"center\"></div></span>
		</div>
		<div style=\"clear: both;\"></div>
	</div>
</div>	
";
}






if($i1 == 2){
	$csql = mysqli_query($conecta, "select * from batalhas where deid = '$row[id]'");
	$rsql = mysqli_fetch_array($csql);
	$horadoservidor = mktime(date("H")-3, date("i"), date("s"), date("m"), date("d"), date("Y"));
	if($rsql['simples'] <= $horadoservidor){
		if($p1 == null || $p1 == 1){
			echo "
			<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
			<span class=\"titulo\">ESCOLHA UMA CARTA</span><hr size=\"1\" width=\"100%\" color=\"#cccccc\">";



			$csql = mysqli_query($conecta, "SELECT * FROM user_cartas where deid = '$id' and tipo = '1';");
		 	while($rsql=mysqli_fetch_array($csql)){
		 		$cont++;
		 		$csql1 = mysqli_query($conecta, "select * from cartas where id = '$rsql[carta]';");
		 		$rsql1 = mysqli_fetch_array($csql1);
		 		echo "
		 		<div id=\"item\" style=\"width: 143px; float: left; margin: 2px; text-align: justify; padding: 5px;\" align=\"left\">
		 			<a href=\"index.php?battle&i1=2&p1=2&p2=" . $rsql['id'] . "\" class=\"linkus\">
		 				<img src=\"cartas/" . $rsql1['imagem'] . "\" width=\"143\" height=\"150\">
		 			</a>
		 			<center><a href=\"index.php?battle&i1=2&p1=2&p2=" . $rsql['id'] . "\" class=\"linkus\">" . $rsql1['nome'] . "</a></center>
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
			</div>";
		}
		if($p1 == 2){
			$csql = mysqli_query($conecta, "select * from user_cartas where id = '$p2';");
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
			<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
				<span class=\"texto\">
				<span class=\"titulo\">" . $rsql1['nome'] . "</span><hr size=\"1\" color=\"#cccccc\">
					<img src=\"cartas/" . $rsql1['imagem'] . "\" width=\"200\" height=\"200\" align=\"left\" class=\"pr1\">
					<b>Nome: </b>" . $rsql1['nome'] . "<br>
					<b>Artista: </b>" . $rsql2['nome'] . "<br>
					<b>Estilo Musical: </b>" . $rsql3['nome'] .  "<br>
					<b>Ano: </b>" . $rsql1['ano'] .  "<br>
					<b>Quantidade de vendas(em milhares): </b>" . $rsql1['qtd_vendas'] . "<br>
					<b>Pontos: </b>" . $rsql1['pts'] . "<br>
					<b>Quantidade de fãs(em milhares): </b>" . $rsql1['qtd_fas'] . "<br>
					<b>Tipo: </b>" . $rsql4['nome'] . "<br>
					<b>Valor: </b>" . $rsql1['valor'] . "<br>
				</span>
			<div style=\"clear: both;\"></div>
			</div>
			<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
			<span class=\"titulo\">ESCOLHA UM EFEITO</span><hr size=\"1\" width=\"100%\" color=\"#cccccc\">
			";
			$cont_ee = 0;
			$csql_ee = mysqli_query($conecta, "SELECT * FROM user_ee where deid = '$id';");
		 	while($rsql_ee=mysqli_fetch_array($csql_ee)){
		 		$cont_ee++;
		 		$csql_ee1 = mysqli_query($conecta, "select * from ee where id = '$rsql_ee[ee]';");
		 		$rsql_ee1 = mysqli_fetch_array($csql_ee1);
		 		echo "
		 		<div id=\"item\" style=\"width: 143px; float: left; margin: 2px; text-align: justify; padding: 5px;\" align=\"left\">
		 			<a href=\"index.php?battle&i1=2&p1=3&p2=" . $p2 . "&p3=" . $rsql_ee['id'] . "\" class=\"linkus\">
		 				<img src=\"cartas/" . $rsql_ee1['imagem'] . "\" width=\"143\" height=\"150\">
		 			</a>
		 			<center><a href=\"index.php?battle&i1=2&p1=3&p2=" . $p2 . "&p3=" . $rsql_ee['id'] . "\" class=\"linkus\">" . $rsql_ee1['nome'] . "</a></center>
		 		</div>";
		 	}
		 	if($cont_ee == 0){
		 		echo "<center><a href=\"index.php?battle&i1=2&p1=3&p2=" . $p2 . "&p3=0\" class=\"linkus\">Pular</a></center>";
		 	}
		 	echo "
			<div style=\"clear: both;\"></div>
			</div>";
		}
		if($p1 == 3){
			///////////////////// p1 = pagina
			///////////////////// p2 = carta
			///////////////////// p3 = efeito
			///////////////////// p4 = user
			$csql = mysqli_query($conecta, "select * from user_cartas where id = '$p2';");
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
			<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
				<span class=\"texto\">
				<span class=\"titulo\">" . $rsql1['nome'] . "</span><hr size=\"1\" color=\"#cccccc\">
					<img src=\"cartas/" . $rsql1['imagem'] . "\" width=\"200\" height=\"200\" align=\"left\" class=\"pr1\">
					<b>Nome: </b>" . $rsql1['nome'] . "<br>
					<b>Artista: </b>" . $rsql2['nome'] . "<br>
					<b>Estilo Musical: </b>" . $rsql3['nome'] .  "<br>
					<b>Ano: </b>" . $rsql1['ano'] .  "<br>
					<b>Quantidade de vendas(em milhares): </b>" . $rsql1['qtd_vendas'] . "<br>
					<b>Pontos: </b>" . $rsql1['pts'] . "<br>
					<b>Quantidade de fãs(em milhares): </b>" . $rsql1['qtd_fas'] . "<br>
					<b>Tipo: </b>" . $rsql4['nome'] . "<br>
					<b>Valor: </b>" . $rsql1['valor'] . "<br>
				</span>
			<div style=\"clear: both;\"></div>
			</div>";
			if($p3 != 0){
				echo"
				<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
				<span class=\"titulo\">EFEITO</span><hr size=\"1\" width=\"100%\" color=\"#cccccc\">
				";
				$csql_ee = mysqli_query($conecta, "select * from user_ee where id = '$p3';");
		 		$rsql_ee = mysqli_fetch_array($csql_ee);
			 	$csql_ee1 = mysqli_query($conecta, "select * from ee where id = '$rsql_ee[ee]';");
		 		$rsql_ee1 = mysqli_fetch_array($csql_ee1);
				$csql_ee2 = mysqli_query($conecta, "select * from tip where id = '$rsql_ee1[tip]';");
				$rsql_ee2 = mysqli_fetch_array($csql_ee2);
				echo "
				<span class=\"texto\">
					<img src=\"cartas/" . $rsql_ee1['imagem'] . "\" width=\"200\" height=\"200\" align=\"left\" class=\"pr1\">
					<b>Nome: </b>" . $rsql_ee1['nome'] . "<br>
					<b>Ganho: </b>" . $rsql_ee1['ganho'] . "%<br>
					<b>Valor: </b>" . $rsql_ee1['valor'] .  "<br>
					<b>Tipo: </b>" . $rsql_ee2['nome'] .  "<br>
				</span>
				<div style=\"clear: both;\"></div>
				</div>";
			}
			echo"
			<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
			<span class=\"titulo\">ALVO</span><hr size=\"1\" width=\"100%\" color=\"#cccccc\">
			";
			$csql_con = mysqli_query($conecta, "SELECT * FROM `contato` where deid = '$id'");
			while($rsql_con=mysqli_fetch_array($csql_con)){
				$csql_con1 = mysqli_query($conecta, "SELECT * FROM user WHERE id='$rsql_con[cotid]'");
				$rsql_con1 = mysqli_fetch_array($csql_con1);
			echo "
			<div id=\"item\" style=\"width: 143px; float: left; margin: 2px; text-align: justify; padding: 5px;\" align=\"left\">
				<a href=\"index.php?battle&i1=2&p1=4&p2=" . $p2 . "&p3=" . $p3 . "&p4=" . $rsql_con['cotid'] . "\"><img src=\"fotos/" . $rsql_con1['foto'] . "\" width=\"143\" height=\"150\"></a>
				<center><a href=\"index.php?battle&i1=2&p1=4&p2=" . $p2 . "&p3=" . $p3 . "&p4=" . $rsql_con['cotid'] . "\" class=\"linkus\">" . $rsql_con1['nome'] . " " . $rsql_con1['sobrenome'] . "</a></center>
			</div>
			";
			}
			if (mysqli_num_rows($csql_con) <= 0){
			echo "<center><span class=\"titulo\">A lista de contatos está vazia</span></center>";
			}
			echo "
			<div style=\"clear: both;\"></div>
			</div>
			";
		}
		if($p1 == 4){
			///////////////////// p1 = pagina
			///////////////////// p2 = carta
			///////////////////// p3 = efeito
			///////////////////// p4 = user
			echo "
			<form action=\"index.php?battle&i1=2&p1=5\" method=\"post\">
			";
			$csql = mysqli_query($conecta, "select * from user_cartas where id = '$p2';");
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
			<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
				<span class=\"texto\">
				<span class=\"titulo\">" . $rsql1['nome'] . "</span><hr size=\"1\" color=\"#cccccc\">
					<img src=\"cartas/" . $rsql1['imagem'] . "\" width=\"200\" height=\"200\" align=\"left\" class=\"pr1\">
					<b>Nome: </b>" . $rsql1['nome'] . "<br>
					<b>Artista: </b>" . $rsql2['nome'] . "<br>
					<b>Estilo Musical: </b>" . $rsql3['nome'] .  "<br>
					<b>Ano: </b>" . $rsql1['ano'] .  "<br>
					<b>Quantidade de vendas(em milhares): </b>" . $rsql1['qtd_vendas'] . "<br>
					<b>Pontos: </b>" . $rsql1['pts'] . "<br>
					<b>Quantidade de fãs(em milhares): </b>" . $rsql1['qtd_fas'] . "<br>
					<b>Tipo: </b>" . $rsql4['nome'] . "<br>
					<b>Valor: </b>" . $rsql1['valor'] . "<br>
					<select name=\"comparar\">
					<option value=\"1\">Quantidade de vendas</option>
					<option value=\"2\">Pontos</option>
					<option value=\"3\">Quantidade de fãs</option>
					</select>
				</span>
			<div style=\"clear: both;\"></div>
			</div>";
			if($p3 != 0){
				echo"
				<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
				<span class=\"titulo\">EFEITO</span><hr size=\"1\" width=\"100%\" color=\"#cccccc\">
				";
				$csql_ee = mysqli_query($conecta, "select * from user_ee where id = '$p3';");
		 		$rsql_ee = mysqli_fetch_array($csql_ee);
			 	$csql_ee1 = mysqli_query($conecta, "select * from ee where id = '$rsql_ee[ee]';");
		 		$rsql_ee1 = mysqli_fetch_array($csql_ee1);
				$csql_ee2 = mysqli_query($conecta, "select * from tip where id = '$rsql_ee1[tip]';");
				$rsql_ee2 = mysqli_fetch_array($csql_ee2);
				echo "
				<span class=\"texto\">
					<img src=\"cartas/" . $rsql_ee1['imagem'] . "\" width=\"200\" height=\"200\" align=\"left\" class=\"pr1\">
					<b>Nome: </b>" . $rsql_ee1['nome'] . "<br>
					<b>Ganho: </b>" . $rsql_ee1['ganho'] . "%<br>
					<b>Valor: </b>" . $rsql_ee1['valor'] .  "<br>
					<b>Tipo: </b>" . $rsql_ee2['nome'] .  "<br>
				</span>
				<div style=\"clear: both;\"></div>
				</div>";
			}
			echo "
			<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
			<span class=\"titulo\">ALVO</span><hr size=\"1\" width=\"100%\" color=\"#cccccc\">
			";
			$csql_con1 = mysqli_query($conecta, "SELECT * FROM user WHERE id='$p4'");
			$rsql_con1 = mysqli_fetch_array($csql_con1);
			$csql_con2 = mysqli_query($conecta, "select * from perfil where id = '$p4';");
			$rsql_con2 = mysqli_fetch_array($csql_con2);
			echo "
				<img src=\"fotos/" . $rsql_con1['foto'] . "\" width=\"250\" height=\"250\" align=\"left\" class=\"pr1\">
				<div align=\"left\">
				<span class=\"titulo\">" . $rsql_con1['nome'] . " " . $rsql_con1['sobrenome'] . " - <a href=\"index.php?user&i1=1&i2=" . $rsql_con1['id'] . "\" class=\"classe1\">Visitar Perfil</a></span>
				<hr size=\"1\" color=\"#cccccc\">
				<span class=\"texto\">
				<b>Data de Nascimento:</b> " . $rsql_con2['data_nasc'] . "<br>
				<b>Telefone:</b> " . $rsql_con2['telefone'] . "<br>
				<b>Telefone2:</b> " . $rsql_con2['telefone2'] . "<br>
				<b>Cidade:</b> " . $rsql_con2['cidade'] . "<br>
				<b>Estado:</b> " . $rsql_con2['estado'] . "<br>
				<b>Regiao:</b> " . $rsql_con2['regiao'] . "<br>
				<b>País:</b> " . $rsql_con2['pais'] . "<br>
				<b>Descricao:</b> " . $rsql_con2['descricao1'] . "<br>
				</span>
				</div>
			<div style=\"clear: both;\"></div>
			</div>
			<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
			<span class=\"titulo\">ATACAR</span><hr size=\"1\" width=\"100%\" color=\"#cccccc\">
			<span class=\"texto\">Tipo de ataque: </span><select name=\"tipo\"><option value=\"1\">Ataque</option><option value=\"2\">Assalto</option></select>
			<input name=\"carta\" type=\"hidden\" value=\"" . $p2 . "\">
			<input name=\"efeito\" type=\"hidden\" value=\"" . $p3 . "\">
			<input name=\"user\" type=\"hidden\" value=\"" . $p4 . "\">
			<div style=\"float: right\"><input name=\"atacar\" type=\"submit\" value=\"Atacar\"></div>
			</form>
			</div>
			";
		}
		if(isset($_POST["atacar"])) {
			$comparar = $class->antisql($_POST["comparar"]);
			$carta = $class->antisql($_POST["carta"]);
			$efeito = $class->antisql($_POST["efeito"]);
			$user = $class->antisql($_POST["user"]);
			$tipo = $class->antisql($_POST["tipo"]);
			$hora_do_servidor = mktime(date("H")-3, date("i"), date("s"), date("m"), date("d"), date("Y"));
			$verifica_se_possui_registro = mysqli_query($conecta, "select * from batalhas deid = '$id'");
			if(mysqli_num_rows($verifica_se_possui_registro) <= 0){
				$verifica_se_possui_registro = mysqli_query($conecta, "insert into batalhas values('$id', '$hora_do_servidor', '$hora_do_servidor')");
			}
			$novo_horario_simples = $hora_do_servidor + $engine->tempo_batalha_simples;

			echo "
			<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
			";
			$verificar_carta = mysqli_query($conecta, "select * from user_cartas where id = '$carta' and deid='$id'");
			$verificar_efeito = mysqli_query($conecta, "select * from user_ee where id = '$efeito' and deid='$id'");
			$rverificar_carta = mysqli_fetch_array($verificar_carta);
			$rverificar_efeito = mysqli_fetch_array($verificar_efeito);
			if($id != $user){		
				if($rverificar_carta != null){
					if($rverificar_efeito != null || $efeito == 0){
						if($tipo == 1){/////ataque
							$verificar_se_possui_carta = mysqli_query($conecta, "select count(*) from user_cartas where deid = '$user' and tipo != '3'");
							$rverificar_se_possui_carta = mysqli_fetch_array($verificar_se_possui_carta);
							if($rverificar_se_possui_carta['count(*)'] != 0){
								$verificar_se_possui_carta_defesa = mysqli_query($conecta, "select count(*) from user_cartas where deid = '$user' and tipo = '2'");
								$rverificar_se_possui_carta_defesa = mysqli_fetch_array($verificar_se_possui_carta_defesa);
								if($rverificar_se_possui_carta_defesa['count(*)'] != 0){

									/////////////////////se possuir carta de defesa

									$carta_atacada = rand(1, $rverificar_se_possui_carta_defesa['count(*)']);
									$rverificar_se_possui_carta_defesa_cont = 0;
									$verificar_se_possui_carta_defesa1 = mysqli_query($conecta, "select * from user_cartas where deid = '$user' and tipo = '2'");
									while($rverificar_se_possui_carta_defesa1 = mysqli_fetch_array($verificar_se_possui_carta_defesa1)){
										$rverificar_se_possui_carta_defesa_cont++;
										if($rverificar_se_possui_carta_defesa_cont == $carta_atacada){
											$carta_atacada_id = $rverificar_se_possui_carta_defesa1['id'];
											$defesa_bonus_ver = 1;
										}
									}



								}else{



									$carta_atacada = rand(1, $rverificar_se_possui_carta['count(*)']);
									$rverificar_se_possui_carta_cont = 0;
									$verificar_se_possui_carta1 = mysqli_query($conecta, "select * from user_cartas where deid = '$user' and tipo != '3'");
									while($rverificar_se_possui_carta1 = mysqli_fetch_array($verificar_se_possui_carta1)){
										$rverificar_se_possui_carta_cont++;
										if($rverificar_se_possui_carta_cont == $carta_atacada){
											$carta_atacada_id = $rverificar_se_possui_carta1['id'];
											$defesa_bonus_ver = 0;
										}
									}

								}

								////////////////possuindo o id das duas cartas vamos a comparacao
								$seleciona_carta_ataque = mysqli_query($conecta, "select * from user_cartas where id = '$carta'");
								$rseleciona_carta_ataque = mysqli_fetch_array($seleciona_carta_ataque);
								$seleciona_carta_ataque1 = mysqli_query($conecta, "select * from cartas where id = '$rseleciona_carta_ataque[carta]'");
								$rseleciona_carta_ataque1 = mysqli_fetch_array($seleciona_carta_ataque1);
								$seleciona_carta_defesa = mysqli_query($conecta, "select * from user_cartas where id = '$carta_atacada_id'");
								$rseleciona_carta_defesa = mysqli_fetch_array($seleciona_carta_defesa);
								$seleciona_carta_defesa1 = mysqli_query($conecta, "select * from cartas where id = '$rseleciona_carta_defesa[carta]'");
								$rseleciona_carta_defesa1 = mysqli_fetch_array($seleciona_carta_defesa1);
								if($comparar == 1){
									$pts_carta_ataque = $rseleciona_carta_ataque1['qtd_vendas'];
									$pts_carta_defesa = $rseleciona_carta_defesa1['qtd_vendas'];
								}
								if($comparar == 2){
									$pts_carta_ataque = $rseleciona_carta_ataque1['pts'];
									$pts_carta_defesa = $rseleciona_carta_defesa1['pts'];
								}
								if($comparar == 3){
									$pts_carta_ataque = $rseleciona_carta_ataque1['qtd_fas'];
									$pts_carta_defesa = $rseleciona_carta_defesa1['qtd_fas'];
								}
								if($efeito != 0){
									$seleciona_efeito = mysqli_query($conecta, "select * from user_ee where id = '$efeito'");
									$rseleciona_efeito = mysqli_fetch_array($seleciona_efeito);
									$seleciona_efeito1 = mysqli_query($conecta, "select * from ee where id = '$rseleciona_efeito[ee]'");
									$rseleciona_efeito1 = mysqli_fetch_array($seleciona_efeito1);
									if($rseleciona_efeito1['tip'] == $rseleciona_carta_ataque1['tip']){
										$pts_carta_ataque = $pts_carta_ataque * (1 + ($rseleciona_efeito1['ganho'] / 100));
									}
								}
								if($defesa_bonus_ver == 1){
									$pts_carta_defesa = $pts_carta_defesa * (1 + ($engine->bonus_de_carta_defesa / 100));
								}
								
								if($pts_carta_ataque > $pts_carta_defesa){
									$pts_ganho = $row['pts'] + (($pts_carta_ataque - $pts_carta_defesa) * ($engine->porcentagem_entre_cartas / 100));
									$pts_ganho1 = (($pts_carta_ataque - $pts_carta_defesa) * ($engine->porcentagem_entre_cartas / 100));
									$insert = mysqli_query($conecta, "UPDATE user_cartas SET tipo = '0', deid = '$id' WHERE id = '$carta_atacada_id';");
									$insert = mysqli_query($conecta, "UPDATE user SET pts = '$pts_ganho' WHERE id = '$id';");
									$insert = mysqli_query($conecta, "UPDATE batalhas SET simples = '$novo_horario_simples' WHERE deid = '$id';");
									$res = 1;
									$insert = mysqli_query($conecta, "insert into rel values (null, '$id', '$user', '$res', '$pts_carta_ataque', '$pts_carta_defesa', '$pts_ganho1', null, '$hora_do_servidor');");
									if($insert){
										echo "<script>alert('Você ganhou!');window.location='index.php?relatorio'</script>";
									}else{ 
										echo "<script>alert('Houve um problema!');window.location='index.php?battle'</script>"; 
									}
								}
								if($pts_carta_ataque == $pts_carta_defesa){
									$pts_ganho = $row['pts'] + $engine->pontuacao_base;
									$pts_ganho1 = $engine->pontuacao_base;
									$insert = mysqli_query($conecta, "UPDATE user SET pts = '$pts_ganho' WHERE id = '$id';");
									$insert = mysqli_query($conecta, "UPDATE batalhas SET simples = '$novo_horario_simples' WHERE deid = '$id';");
									$res = 2;
									$insert = mysqli_query($conecta, "insert into rel values (null, '$id', '$user', '$res', '$pts_carta_ataque', '$pts_carta_defesa', '$pts_ganho1', null, '$hora_do_servidor');");
									if($insert){
										echo "<script>alert('Empate!');window.location='index.php?relatorio'</script>";
									}else{ 
										echo "<script>alert('Houve um problema!');window.location='index.php?battle'</script>"; 
									}
								}
								if($pts_carta_ataque < $pts_carta_defesa){
									$pts_ganho1 = 0;
									$insert = mysqli_query($conecta, "UPDATE user_cartas SET tipo = '0', deid = '$user' WHERE id = '$carta';");
									$insert = mysqli_query($conecta, "UPDATE batalhas SET simples = '$novo_horario_simples' WHERE deid = '$id';");
									$res = 3;
									$insert = mysqli_query($conecta, "insert into rel values (null, '$id', '$user', '$res', '$pts_carta_ataque', '$pts_carta_defesa', '$pts_ganho1', null, '$hora_do_servidor');");
									if($insert){
										echo "<script>alert('Você perdeu!');window.location='index.php?relatorio'</script>";
									}else{ 
										echo "<script>alert('Houve um problema!');window.location='index.php?battle'</script>"; 
									}
								}

							}else{
								$pts_ganho = $row['pts'] + $engine->pontuacao_base;
								$pts_ganho1 = $engine->pontuacao_base;
								$insert = mysqli_query($conecta, "UPDATE user SET pts = '$pts_ganho' WHERE id = '$id';");
								$insert = mysqli_query($conecta, "UPDATE batalhas SET simples = '$novo_horario_simples' WHERE deid = '$id';");
								$res = 4;
								$insert = mysqli_query($conecta, "insert into rel values (null, '$id', '$user', '$res', '$pts_carta_ataque', '$pts_carta_defesa', '$pts_ganho1', null, '$hora_do_servidor');");
								if($insert){
									echo "<script>alert('O jogador atacado não possuia cartas!');window.location='index.php?relatorio'</script>";
								}else{ 
									echo "<script>alert('Houve um problema!');window.location='index.php?battle'</script>"; 
								}
							}
						}








						//////////////////////////////////////////////////////////assalto
						if($tipo == 2){
							$verificar_se_possui_carta = mysqli_query($conecta, "select count(*) from user_cartas where deid = '$user' and tipo != '3'");
							$rverificar_se_possui_carta = mysqli_fetch_array($verificar_se_possui_carta);
							if($rverificar_se_possui_carta['count(*)'] != 0){
								$verificar_se_possui_carta_defesa = mysqli_query($conecta, "select count(*) from user_cartas where deid = '$user' and tipo = '2'");
								$rverificar_se_possui_carta_defesa = mysqli_fetch_array($verificar_se_possui_carta_defesa);
								if($rverificar_se_possui_carta_defesa['count(*)'] != 0){

									/////////////////////se possuir carta de defesa

									$carta_atacada = rand(1, $rverificar_se_possui_carta_defesa['count(*)']);
									$rverificar_se_possui_carta_defesa_cont = 0;
									$verificar_se_possui_carta_defesa1 = mysqli_query($conecta, "select * from user_cartas where deid = '$user' and tipo = '2'");
									while($rverificar_se_possui_carta_defesa1 = mysqli_fetch_array($verificar_se_possui_carta_defesa1)){
										$rverificar_se_possui_carta_defesa_cont++;
										if($rverificar_se_possui_carta_defesa_cont == $carta_atacada){
											$carta_atacada_id = $rverificar_se_possui_carta_defesa1['id'];
											$defesa_bonus_ver = 1;
										}
									}



								}else{



									$carta_atacada = rand(1, $rverificar_se_possui_carta['count(*)']);
									$rverificar_se_possui_carta_cont = 0;
									$verificar_se_possui_carta1 = mysqli_query($conecta, "select * from user_cartas where deid = '$user' and tipo != '3'");
									while($rverificar_se_possui_carta1 = mysqli_fetch_array($verificar_se_possui_carta1)){
										$rverificar_se_possui_carta_cont++;
										if($rverificar_se_possui_carta_cont == $carta_atacada){
											$carta_atacada_id = $rverificar_se_possui_carta1['id'];
											$defesa_bonus_ver = 0;
										}
									}

								}

								////////////////possuindo o id das duas cartas vamos a comparacao
								$seleciona_carta_ataque = mysqli_query($conecta, "select * from user_cartas where id = '$carta'");
								$rseleciona_carta_ataque = mysqli_fetch_array($seleciona_carta_ataque);
								$seleciona_carta_ataque1 = mysqli_query($conecta, "select * from cartas where id = '$rseleciona_carta_ataque[carta]'");
								$rseleciona_carta_ataque1 = mysqli_fetch_array($seleciona_carta_ataque1);
								$seleciona_carta_defesa = mysqli_query($conecta, "select * from user_cartas where id = '$carta_atacada_id'");
								$rseleciona_carta_defesa = mysqli_fetch_array($seleciona_carta_defesa);
								$seleciona_carta_defesa1 = mysqli_query($conecta, "select * from cartas where id = '$rseleciona_carta_defesa[carta]'");
								$rseleciona_carta_defesa1 = mysqli_fetch_array($seleciona_carta_defesa1);
								if($comparar == 1){
									$pts_carta_ataque = $rseleciona_carta_ataque1['qtd_vendas'];
									$pts_carta_defesa = $rseleciona_carta_defesa1['qtd_vendas'];
								}
								if($comparar == 2){
									$pts_carta_ataque = $rseleciona_carta_ataque1['pts'];
									$pts_carta_defesa = $rseleciona_carta_defesa1['pts'];
								}
								if($comparar == 3){
									$pts_carta_ataque = $rseleciona_carta_ataque1['qtd_fas'];
									$pts_carta_defesa = $rseleciona_carta_defesa1['qtd_fas'];
								}
								if($efeito != 0){
									$seleciona_efeito = mysqli_query($conecta, "select * from user_ee where id = '$efeito'");
									$rseleciona_efeito = mysqli_fetch_array($seleciona_efeito);
									$seleciona_efeito1 = mysqli_query($conecta, "select * from ee where id = '$rseleciona_efeito[ee]'");
									$rseleciona_efeito1 = mysqli_fetch_array($seleciona_efeito1);
									if($rseleciona_efeito1['tip'] == $rseleciona_carta_ataque1['tip']){
										$pts_carta_ataque = $pts_carta_ataque * (1 + ($rseleciona_efeito1['ganho'] / 100));
									}
								}
								if($defesa_bonus_ver == 1){
									$pts_carta_defesa = $pts_carta_defesa * (1 + ($engine->bonus_de_carta_defesa / 100));
								}
								
								if($pts_carta_ataque > $pts_carta_defesa){
									$pts_ganho = $row['pts'] + (($pts_carta_ataque - $pts_carta_defesa) * ($engine->porcentagem_entre_cartas / 100));
									$pts_ganho1 = (($pts_carta_ataque - $pts_carta_defesa) * ($engine->porcentagem_entre_cartas / 100));
									$cash_ganho = $row['cash'] + ($pts_carta_ataque - $pts_carta_defesa) + $engine->bonus_de_cash;
									$cash_ganho1 = ($pts_carta_ataque - $pts_carta_defesa) + $engine->bonus_de_cash;
									$insert = mysqli_query($conecta, "UPDATE user SET pts = '$pts_ganho', cash = '$cash_ganho' WHERE id = '$id';");
									$insert = mysqli_query($conecta, "UPDATE batalhas SET simples = '$novo_horario_simples' WHERE deid = '$id';");
									$res = 5;
									$insert = mysqli_query($conecta, "insert into rel values (null, '$id', '$user', '$res', '$pts_carta_ataque', '$pts_carta_defesa', '$pts_ganho1', '$cash_ganho1', '$hora_do_servidor');");
									if($insert){
										echo "<script>alert('Você ganhou!');window.location='index.php?relatorio'</script>";
									}else{ 
										echo "<script>alert('Houve um problema!');window.location='index.php?battle'</script>"; 
									}
								}
								if($pts_carta_ataque == $pts_carta_defesa){
									$pts_ganho = $row['pts'] + $engine->pontuacao_base;
									$pts_ganho1 = $engine->pontuacao_base;
									$cash_ganho = $row['cash'] + $engine->bonus_de_cash;
									$cash_ganho1 = $engine->bonus_de_cash;
									$insert = mysqli_query($conecta, "UPDATE user SET pts = '$pts_ganho', cash = '$cash_ganho' WHERE id = '$id';");
									$insert = mysqli_query($conecta, "UPDATE batalhas SET simples = '$novo_horario_simples' WHERE deid = '$id';");
									$res = 6;
									$insert = mysqli_query($conecta, "insert into rel values (null, '$id', '$user', '$res', '$pts_carta_ataque', '$pts_carta_defesa', '$pts_ganho1', '$cash_ganho1', '$hora_do_servidor');");
									if($insert){
										echo "<script>alert('Empate!');window.location='index.php?relatorio'</script>";
									}else{ 
										echo "<script>alert('Houve um problema!');window.location='index.php?battle'</script>"; 
									}
								}
								if($pts_carta_ataque < $pts_carta_defesa){
									$pts_ganho1 = 0;
									$cash_ganho1 = 0;
									$insert = mysqli_query($conecta, "UPDATE batalhas SET simples = '$novo_horario_simples' WHERE deid = '$id';");
									$res = 7;
									$insert = mysqli_query($conecta, "insert into rel values (null, '$id', '$user', '$res', '$pts_carta_ataque', '$pts_carta_defesa', '$pts_ganho1', '$cash_ganho1', '$hora_do_servidor');");
									if($insert){
										echo "<script>alert('Você perdeu!');window.location='index.php?relatorio'</script>";
									}else{ 
										echo "<script>alert('Houve um problema!');window.location='index.php?battle'</script>"; 
									}
								}

							}else{
								$pts_ganho = $row['pts'] + $engine->pontuacao_base;
								$pts_ganho1 = $engine->pontuacao_base;
								$cash_ganho = $row['cash'] + $engine->bonus_de_cash;
								$cash_ganho1 = $engine->bonus_de_cash;
								$insert = mysqli_query($conecta, "UPDATE user SET pts = '$pts_ganho', cash = '$cash_ganho' WHERE id = '$id';");
								$insert = mysqli_query($conecta, "UPDATE batalhas SET simples = '$novo_horario_simples' WHERE deid = '$id';");
								$res = 8;
								$insert = mysqli_query($conecta, "insert into rel values (null, '$id', '$user', '$res', '$pts_carta_ataque', '$pts_carta_defesa', '$pts_ganho1', '$cash_ganho1', '$hora_do_servidor');");
								if($insert){
									echo "<script>alert('O jogador atacado não possuia cartas!');window.location='index.php?relatorio'</script>";
								}else{ 
									echo "<script>alert('Houve um problema!');window.location='index.php?battle'</script>"; 
								}
							}
						}
					}else{
						echo "<span class=\"titulo\">Você não possui este efeito!</span>";
					}
				}else{
					echo "<span class=\"titulo\">Você não possui esta carta!</span>";
				}
			}else{
				echo "<span class=\"titulo\">Você não atacar a si mesmo!</span>";
			}
			echo "</div>";

		}
	}
}









if($i1 == 3){
	$hora_do_servidor = mktime(date("H")-3, date("i"), date("s"), date("m"), date("d"), date("Y"));
	$verifica_se_possui_registro = mysqli_query($conecta, "select * from batalhas deid = '$id'");
	if(mysqli_num_rows($verifica_se_possui_registro) <= 0){
		$verifica_se_possui_registro = mysqli_query($conecta, "insert into batalhas values('$id', '$hora_do_servidor', '$hora_do_servidor')");
	}
	$csql = mysqli_query($conecta, "select * from batalhas where deid = '$row[id]'");
	$rsql = mysqli_fetch_array($csql);
	$novo_horario_completo = $hora_do_servidor + $engine->tempo_batalha_completa;
	if($rsql['completa'] <= $hora_do_servidor){
		$verificar_se_possui_carta = mysqli_query($conecta, "select * from user_cartas where deid = '$id';");
		if(mysqli_num_rows($verificar_se_possui_carta) > 0){
			$csql_cartas = mysqli_query($conecta, "select * from user_cartas where deid = '$id';");
			while($rsql_cartas = mysqli_fetch_array($csql_cartas)){
				$csql_cartas1 = mysqli_query($conecta, "select * from cartas where id = '$rsql_cartas[carta]';");
				$rsql_cartas1 = mysqli_fetch_array($csql_cartas1);
				$bonus_cash = $bonus_cash + ($rsql_cartas1['valor'] * ($engine->porcentagem_ganho_cartas_cash / 100));
				$bonus_pts = $bonus_pts + ($rsql_cartas1['valor'] * ($engine->porcentagem_ganho_cartas_pts / 100));
			}
			$nova_cash = $row['cash'] + $bonus_cash;
			$novo_pts = $row['pts'] + $bonus_pts;
			$insert = mysqli_query($conecta, "update user set cash = '$nova_cash', pts = '$novo_pts' where id = '$id';");
		}
		$insert = mysqli_query($conecta, "UPDATE batalhas SET completa = '$novo_horario_completo' WHERE deid = '$id';");
		if($insert){
			echo "<script>alert('Bonus coletado!\\nBonus ganho (cash): " . $bonus_cash . "\\nBonus ganho (pts): " . $bonus_pts . "');window.location='index.php?index'</script>";
		}else{
			echo "<script>alert('Houve um problema!');window.location='index.php?index'</script>"; 
		}
	}
}




?>