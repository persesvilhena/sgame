<?php
if($row['adm'] == 1){
	//////////////////////////////////////////////////////////cadastrar nova carta
	if(isset($_POST["cadastrar_carta"])) { 
		$foto = $_FILES["foto"];
		$carta_nome = $class->antisql($_POST["carta_nome"]); 
		$carta_artista = $class->antisql($_POST["carta_artista"]); 
		$carta_est_musical = $class->antisql($_POST["carta_est_musical"]); 
		$carta_ano = $class->antisql($_POST["carta_ano"]); 
		$carta_qtd_vendas = $class->antisql($_POST["carta_qtd_vendas"]); 
		$carta_pts = $class->antisql($_POST["carta_pts"]); 
		$carta_qtd_fas = $class->antisql($_POST["carta_qtd_fas"]); 
		$carta_tip = $class->antisql($_POST["carta_tip"]); 
		$carta_valor = $class->antisql($_POST["carta_valor"]); 
	 
		// Se a foto estiver sido selecionada
		if (!empty($foto["name"])) {
	 
			// Largura máxima em pixels
			$largura = 5000;
			$larguramin = 1;
			// Altura máxima em pixels
			$altura = 2500;
			// Tamanho máximo do arquivo em bytes
			$tamanho = 5000000;

	    	// Verifica se o arquivo é uma imagem
	    	if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $foto["type"])){
	     	   $error[1] = "<script>alert ('Formato incompativel!')</script>";
	   	 	} else {
	 
				// Pega as dimensões da imagem
				$dimensoes = getimagesize($foto["tmp_name"]);
		 
				// Verifica se a largura da imagem é maior que a largura permitida
				if($dimensoes[0] > $largura) {
					$error[2] = "<script>alert ('A largura da imagem não deve ultrapassar ".$largura." pixels')</script>";
				}
				
				if($dimensoes[0] < $larguramin) {
					$error[5] = "<script>alert ('A largura da imagem não deve ser menor de ".$larguramin." pixels')</script>";
				}
		 
				// Verifica se a altura da imagem é maior que a altura permitida
				if($dimensoes[1] > $altura) {
					$error[3] = "<script>alert ('Altura da imagem não deve ultrapassar ".$altura." pixels')</script>";
				}
		 
				// Verifica se o tamanho da imagem é maior que o tamanho permitido
				if($foto["size"] > $tamanho) {
		   		 	$error[4] = "<script>alert ('A imagem deve ter no máximo ".$tamanho." bytes')</script>";
				}
			}
	 
			// Se não houver nenhum erro
			if (!isset($error)){
			//if (count($error) == 0) {
				// Pega extensão da imagem
				preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
	 
	        	// Gera um nome único para a imagem
	        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
	 
	        	// Caminho de onde ficará a imagem
	        	$caminho_imagem = "cartas/" . $nome_imagem;
	 
				// Faz o upload da imagem para seu respectivo caminho
				move_uploaded_file($foto["tmp_name"], $caminho_imagem);
	 
				// Insere os dados no banco
				$sql = mysql_query("INSERT INTO cartas(nome, artista, est_musical, ano, qtd_vendas, pts, qtd_fas, tip, valor, imagem) VALUES ('$carta_nome', '$carta_artista', '$carta_est_musical', '$carta_ano', '$carta_qtd_vendas', '$carta_pts', '$carta_qtd_fas', '$carta_tip', '$carta_valor', '$nome_imagem');");

				if ($sql){
					echo "<script>alert('Nova carta inserida com sucesso!'); window.location = 'index.php?admin'</script>";
				}else{
					echo "<script>alert('Houve um erro!'); window.location = 'index.php?admin'</script>";
				}
			}
	 
			// Se houver mensagens de erro, exibe-as
			//if (count($error) != 0) {
			if(isset($error)){
				foreach ($error as $erro) {
					echo $erro;
				}
			}
		}	
	}











	//////////////////////////////////////////////////////////alterar uma carta
	if(isset($_POST["alterar_carta"])) { 
		$foto = $_FILES["foto"];
		$carta_id = $class->antisql($_POST["carta_id"]);
		$carta_nome = $class->antisql($_POST["carta_nome"]); 
		$carta_artista = $class->antisql($_POST["carta_artista"]); 
		$carta_est_musical = $class->antisql($_POST["carta_est_musical"]); 
		$carta_ano = $class->antisql($_POST["carta_ano"]); 
		$carta_qtd_vendas = $class->antisql($_POST["carta_qtd_vendas"]); 
		$carta_pts = $class->antisql($_POST["carta_pts"]); 
		$carta_qtd_fas = $class->antisql($_POST["carta_qtd_fas"]); 
		$carta_tip = $class->antisql($_POST["carta_tip"]); 
		$carta_valor = $class->antisql($_POST["carta_valor"]); 
		if (!empty($foto["name"])) {
			$largura = 5000;
			$larguramin = 1;
			$altura = 2500;
			$tamanho = 5000000;

	    	if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $foto["type"])){
	     	   $error[1] = "<script>alert ('Formato incompativel!')</script>";
	   	 	} else {
				$dimensoes = getimagesize($foto["tmp_name"]);
				if($dimensoes[0] > $largura) {
					$error[2] = "<script>alert ('A largura da imagem não deve ultrapassar ".$largura." pixels')</script>";
				}
				if($dimensoes[0] < $larguramin) {
					$error[5] = "<script>alert ('A largura da imagem não deve ser menor de ".$larguramin." pixels')</script>";
				}
				if($dimensoes[1] > $altura) {
					$error[3] = "<script>alert ('Altura da imagem não deve ultrapassar ".$altura." pixels')</script>";
				}
				if($foto["size"] > $tamanho) {
		   		 	$error[4] = "<script>alert ('A imagem deve ter no máximo ".$tamanho." bytes')</script>";
				}
			}

			if (!isset($error)){
				$sql = mysql_query("SELECT imagem FROM cartas WHERE id = '$carta_id';");
				$usuario = mysql_fetch_object($sql);
				unlink("cartas/".$usuario->imagem."");
				preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
	        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
	        	$caminho_imagem = "cartas/" . $nome_imagem;
				move_uploaded_file($foto["tmp_name"], $caminho_imagem);
				$sql = mysql_query("update cartas set nome = '$carta_nome', artista = '$carta_artista', est_musical = '$carta_est_musical', ano = '$carta_ano', qtd_vendas = '$carta_qtd_vendas', pts = '$carta_pts', qtd_fas = '$carta_qtd_fas', tip = '$carta_tip', valor = '$carta_valor', imagem = '$nome_imagem' where id = '$carta_id';");

				if ($sql){
					echo "<script>alert('Carta alterada com sucesso!'); window.location = 'index.php?admin'</script>";
				}else{
					echo "<script>alert('Houve um erro!'); window.location = 'index.php?admin'</script>";
				}
			}
			if(isset($error)){
				foreach ($error as $erro) {
					echo $erro;
				}
			}
		}	
	}













	//////////////////////////////////////////////////////////cadastrar novo efeito
	if(isset($_POST["cadastrar_efeito"])) { 
		$foto = $_FILES["foto"];
		$efeito_nome = $class->antisql($_POST["efeito_nome"]); 
		$efeito_ganho = $class->antisql($_POST["efeito_ganho"]); 
		$efeito_valor = $class->antisql($_POST["efeito_valor"]); 
		$efeito_tip = $class->antisql($_POST["efeito_tip"]); 

		if (!empty($foto["name"])) {
			$largura = 5000;
			$larguramin = 1;
			$altura = 2500;
			$tamanho = 5000000;

	    	if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $foto["type"])){
	     	   $error[1] = "<script>alert ('Formato incompativel!')</script>";
	   	 	} else {
				$dimensoes = getimagesize($foto["tmp_name"]);
				if($dimensoes[0] > $largura) {
					$error[2] = "<script>alert ('A largura da imagem não deve ultrapassar ".$largura." pixels')</script>";
				}
				if($dimensoes[0] < $larguramin) {
					$error[5] = "<script>alert ('A largura da imagem não deve ser menor de ".$larguramin." pixels')</script>";
				}
				if($dimensoes[1] > $altura) {
					$error[3] = "<script>alert ('Altura da imagem não deve ultrapassar ".$altura." pixels')</script>";
				}
				if($foto["size"] > $tamanho) {
		   		 	$error[4] = "<script>alert ('A imagem deve ter no máximo ".$tamanho." bytes')</script>";
				}
			}

			if (!isset($error)){
				preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
	        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
	        	$caminho_imagem = "cartas/" . $nome_imagem;
				move_uploaded_file($foto["tmp_name"], $caminho_imagem);
				$sql = mysql_query("INSERT INTO ee(nome, ganho, valor, tip, imagem) VALUES ('$efeito_nome', '$efeito_ganho', '$efeito_valor', '$efeito_tip', '$nome_imagem');");
				if ($sql){
					echo "<script>alert('Novo efeito inserido com sucesso!'); window.location = 'index.php?admin'</script>";
				}else{
					echo "<script>alert('Houve um erro!'); window.location = 'index.php?admin'</script>";
				}
			}
			if(isset($error)){
				foreach ($error as $erro) {
					echo $erro;
				}
			}
		}	
	}










	//////////////////////////////////////////////////////////alterar um efeito
	if(isset($_POST["alterar_efeito"])) { 
		$foto = $_FILES["foto"];
		$efeito_id = $class->antisql($_POST["efeito_id"]);
		$efeito_nome = $class->antisql($_POST["efeito_nome"]); 
		$efeito_ganho = $class->antisql($_POST["efeito_ganho"]); 
		$efeito_valor = $class->antisql($_POST["efeito_valor"]); 
		$efeito_tip = $class->antisql($_POST["efeito_tip"]); 
		if (!empty($foto["name"])) {
			$largura = 5000;
			$larguramin = 1;
			$altura = 2500;
			$tamanho = 5000000;

	    	if(!eregi("^image\/(pjpeg|jpeg|png|gif|bmp)$", $foto["type"])){
	     	   $error[1] = "<script>alert ('Formato incompativel!')</script>";
	   	 	} else {
				$dimensoes = getimagesize($foto["tmp_name"]);
				if($dimensoes[0] > $largura) {
					$error[2] = "<script>alert ('A largura da imagem não deve ultrapassar ".$largura." pixels')</script>";
				}
				if($dimensoes[0] < $larguramin) {
					$error[5] = "<script>alert ('A largura da imagem não deve ser menor de ".$larguramin." pixels')</script>";
				}
				if($dimensoes[1] > $altura) {
					$error[3] = "<script>alert ('Altura da imagem não deve ultrapassar ".$altura." pixels')</script>";
				}
				if($foto["size"] > $tamanho) {
		   		 	$error[4] = "<script>alert ('A imagem deve ter no máximo ".$tamanho." bytes')</script>";
				}
			}

			if (!isset($error)){
				$sql = mysql_query("SELECT imagem FROM ee WHERE id = '$efeito_id';");
				$usuario = mysql_fetch_object($sql);
				unlink("cartas/".$usuario->imagem."");
				preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
	        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
	        	$caminho_imagem = "cartas/" . $nome_imagem;
				move_uploaded_file($foto["tmp_name"], $caminho_imagem);
				$sql = mysql_query("update ee set nome = '$efeito_nome', ganho = '$efeito_ganho', valor = '$efeito_valor', tip = '$efeito_tip', imagem = '$nome_imagem' where id = '$efeito_id';");

				if ($sql){
					echo "<script>alert('Efeito alterado com sucesso!'); window.location = 'index.php?admin'</script>";
				}else{
					echo "<script>alert('Houve um erro!'); window.location = 'index.php?admin'</script>";
				}
			}
			if(isset($error)){
				foreach ($error as $erro) {
					echo $erro;
				}
			}
		}	
	}






















	//////////////////////////////////////////////////////////cadastrar novo tipo
	if(isset($_POST["cadastrar_tipo"])) { 
		$tip_nome = $class->antisql($_POST["tip_nome"]); 
		$sql = mysql_query("INSERT INTO tip(nome) VALUES ('$tip_nome');");
		if ($sql){
			echo "<script>alert('Novo tipo inserido com sucesso!'); window.location = 'index.php?admin'</script>";
		}else{
			echo "<script>alert('Houve um erro!'); window.location = 'index.php?admin'</script>";
		}
	}










	//////////////////////////////////////////////////////////alterar um tipo
	if(isset($_POST["alterar_tipo"])) { 
		$tip_id = $class->antisql($_POST["tip_id"]);
		$tip_nome = $class->antisql($_POST["tip_nome"]); 
		$sql = mysql_query("update tip set nome = '$tip_nome' where id = '$tip_id';");

		if ($sql){
			echo "<script>alert('Tipo alterado com sucesso!'); window.location = 'index.php?admin'</script>";
		}else{
			echo "<script>alert('Houve um erro!'); window.location = 'index.php?admin'</script>";
		}
	}












	//////////////////////////////////////////////////////////cadastrar novo estilo
	if(isset($_POST["cadastrar_estilo"])) { 
		$est_nome = $class->antisql($_POST["est_nome"]); 
		$sql = mysql_query("INSERT INTO est_musical(nome) VALUES ('$est_nome');");
		if ($sql){
			echo "<script>alert('Novo estilo inserido com sucesso!'); window.location = 'index.php?admin'</script>";
		}else{
			echo "<script>alert('Houve um erro!'); window.location = 'index.php?admin'</script>";
		}
	}










	//////////////////////////////////////////////////////////alterar um estilo
	if(isset($_POST["alterar_estilo"])) { 
		$est_id = $class->antisql($_POST["est_id"]);
		$est_nome = $class->antisql($_POST["est_nome"]); 
		$sql = mysql_query("update est_musical set nome = '$est_nome' where id = '$est_id';");

		if ($sql){
			echo "<script>alert('Estilo alterado com sucesso!'); window.location = 'index.php?admin'</script>";
		}else{
			echo "<script>alert('Houve um erro!'); window.location = 'index.php?admin'</script>";
		}
	}












		//////////////////////////////////////////////////////////cadastrar novo artista
	if(isset($_POST["cadastrar_artista"])) { 
		$art_nome = $class->antisql($_POST["art_nome"]); 
		$art_descricao = $class->antisql($_POST["art_descricao"]); 
		$art_est_musical = $class->antisql($_POST["art_est_musical"]); 
		$sql = mysql_query("INSERT INTO artista(nome, descricao, est_musical) VALUES ('$art_nome', '$art_descricao', '$art_est_musical');");
		if ($sql){
			echo "<script>alert('Novo artista inserido com sucesso!'); window.location = 'index.php?admin'</script>";
		}else{
			echo "<script>alert('Houve um erro!'); window.location = 'index.php?admin'</script>";
		}
	}










	//////////////////////////////////////////////////////////alterar um artista
	if(isset($_POST["alterar_artista"])) { 
		$art_id = $class->antisql($_POST["art_id"]);
		$art_nome = $class->antisql($_POST["art_nome"]); 
		$art_descricao = $class->antisql($_POST["art_descricao"]); 
		$art_est_musical = $class->antisql($_POST["art_est_musical"]); 
		$sql = mysql_query("update artista set nome = '$art_nome', descricao = '$art_descricao', est_musical = '$art_est_musical' where id = '$art_id';");

		if ($sql){
			echo "<script>alert('Artista alterado com sucesso!'); window.location = 'index.php?admin'</script>";
		}else{
			echo "<script>alert('Houve um erro!'); window.location = 'index.php?admin'</script>";
		}
	}




































	if($i1 == null || $i1 == 1){
		echo "
		<span class=\"titulo\">Administração:</span>
		<hr size=\"1\" color=\"#cccccc\">
		<a href=\"index.php?admin&i1=2\" class=\"linkus\">>Adicionar uma nova carta</a><br>
		<a href=\"index.php?admin&i1=3\" class=\"linkus\">>Alterar uma carta</a><br><br>
		<a href=\"index.php?admin&i1=14\" class=\"linkus\">>Adicionar um novo artista</a><br>
		<a href=\"index.php?admin&i1=15\" class=\"linkus\">>Alterar um artista</a><br><br>
		<a href=\"index.php?admin&i1=5\" class=\"linkus\">>Adicionar um novo efeito</a><br>
		<a href=\"index.php?admin&i1=6\" class=\"linkus\">>Alterar um efeito</a><br><br>
		<a href=\"index.php?admin&i1=8\" class=\"linkus\">>Adicionar um novo tipo</a><br>
		<a href=\"index.php?admin&i1=9\" class=\"linkus\">>Alterar um tipo</a><br><br>
		<a href=\"index.php?admin&i1=11\" class=\"linkus\">>Adicionar um novo estilo musical</a><br>
		<a href=\"index.php?admin&i1=12\" class=\"linkus\">>Alterar um estilo musical</a><br>

		";
	}

















	if($i1 == 2){

		echo"
		<span class=\"titulo\">Adicionar uma nova carta:</span>
		<hr size=\"1\" color=\"#cccccc\">
		<form method=\"post\" enctype=\"multipart/form-data\" action=\"\">
		<table>
			<tr>
				<td>Nome: </td>
				<td><input name=\"carta_nome\" type=\"text\"></td>
			</tr>
			<tr>
				<td>Artista: </td>
				<td><select name=\"carta_artista\">";
					$csql = mysql_query("select * from artista");
					while($rsql = mysql_fetch_array($csql)){
						echo "<option value=\"" . $rsql['id'] . "\">" . $rsql['nome'] . "</option>";
					}

				echo "
				</select>
				</td>
			</tr>
			<tr>
				<td>Estilo Musical: </td>
				<td><select name=\"carta_est_musical\">";
					$csql = mysql_query("select * from est_musical");
					while($rsql = mysql_fetch_array($csql)){
						echo "<option value=\"" . $rsql['id'] . "\">" . $rsql['nome'] . "</option>";
					}

				echo "
				</select>
				</td>
			</tr>
			<tr>
				<td>Ano: </td>
				<td><input name=\"carta_ano\" type=\"text\"></td>
			</tr>
			<tr>
				<td>Quantidade de vendas: </td>
				<td><input name=\"carta_qtd_vendas\" type=\"text\"></td>
			</tr>
			<tr>
				<td>Pontos: </td>
				<td><input name=\"carta_pts\" type=\"text\"></td>
			</tr>
			<tr>
				<td>Quantidade de fãs: </td>
				<td><input name=\"carta_qtd_fas\" type=\"text\"></td>
			</tr>
			<tr>
				<td>Tipo: </td>
				<td><select name=\"carta_tip\">";
					$csql = mysql_query("select * from tip");
					while($rsql = mysql_fetch_array($csql)){
						echo "<option value=\"" . $rsql['id'] . "\">" . $rsql['nome'] . "</option>";
					}

				echo "
				</select>
				</td>
			</tr>
			<tr>
				<td>Valor: </td>
				<td><input name=\"carta_valor\" type=\"text\"></td>
			</tr>
			<tr>
				<td>Imagem: </td>
				<td><input type=\"file\" name=\"foto\"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type=\"submit\" name=\"cadastrar_carta\" value=\"Cadastrar\"></td>
			</tr>
		</table>
		</form>";
	}













	if($i1 == 3){
		echo"
		<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
			<span class=\"titulo\">ALTERAR CARTAS</span><hr size=\"1\" width=\"100%\" color=\"#cccccc\">";
			$csql = mysql_query("SELECT * FROM cartas;");
		 	while($rsql=mysql_fetch_array($csql)){
		 		echo "
		 		<div id=\"item\" style=\"width: 143px; float: left; margin: 2px; text-align: justify; padding: 5px;\" align=\"left\">
		 			<a href=\"index.php?admin&i1=4&i2=" . $rsql['id'] . "\" class=\"linkus\">
		 				<img src=\"cartas/" . $rsql['imagem'] . "\" width=\"143\" height=\"150\">
		 			</a>
		 			<center><a href=\"index.php?admin&i1=4&i2=" . $rsql['id'] . "\" class=\"linkus\">" . $rsql['nome'] . "</a></center>
		 		</div>";
		 	}
		echo "
		<div style=\"clear: both;\"></div>
		</div>";
	}










	if($i1 == 4){
		$csql_carta = mysql_query("select * from cartas where id = '$i2';");
		$rsql_carta = mysql_fetch_array($csql_carta);

		echo"
		<span class=\"titulo\">" . $rsql_carta['nome'] ."</span>
		<hr size=\"1\" color=\"#cccccc\">
		<form method=\"post\" enctype=\"multipart/form-data\" action=\"\">
		<table>
			<tr>
				<td>Nome: </td>
				<td><input name=\"carta_nome\" type=\"text\" value=\"" . $rsql_carta['nome'] . "\"></td>
			</tr>
			<tr>
				<td>Artista: </td>
				<td><select name=\"carta_artista\">";
					$csql = mysql_query("select * from artista");
					while($rsql = mysql_fetch_array($csql)){
						if($rsql['id'] == $rsql_carta['artista']){
							echo "<option value=\"" . $rsql['id'] . "\" selected>" . $rsql['nome'] . "</option>";
						}else{
							echo "<option value=\"" . $rsql['id'] . "\">" . $rsql['nome'] . "</option>";
						}
					}

				echo "
				</select>
				</td>
			</tr>
			<tr>
				<td>Estilo Musical: </td>
				<td><select name=\"carta_est_musical\">";
					$csql = mysql_query("select * from est_musical");
					while($rsql = mysql_fetch_array($csql)){
						if($rsql['id'] == $rsql_carta['est_musical']){
							echo "<option value=\"" . $rsql['id'] . "\" selected>" . $rsql['nome'] . "</option>";
						}else{
							echo "<option value=\"" . $rsql['id'] . "\">" . $rsql['nome'] . "</option>";
						}
					}

				echo "
				</select>
				</td>
			</tr>
			<tr>
				<td>Ano: </td>
				<td><input name=\"carta_ano\" type=\"text\" value=\"" . $rsql_carta['ano'] . "\"></td>
			</tr>
			<tr>
				<td>Quantidade de vendas: </td>
				<td><input name=\"carta_qtd_vendas\" type=\"text\" value=\"" . $rsql_carta['qtd_vendas'] . "\"></td>
			</tr>
			<tr>
				<td>Pontos: </td>
				<td><input name=\"carta_pts\" type=\"text\" value=\"" . $rsql_carta['pts'] . "\"></td>
			</tr>
			<tr>
				<td>Quantidade de fãs: </td>
				<td><input name=\"carta_qtd_fas\" type=\"text\" value=\"" . $rsql_carta['qtd_fas'] . "\"></td>
			</tr>
			<tr>
				<td>Tipo: </td>
				<td><select name=\"carta_tip\">";
					$csql = mysql_query("select * from tip");
					while($rsql = mysql_fetch_array($csql)){
						if($rsql['id'] == $rsql_carta['tip']){
							echo "<option value=\"" . $rsql['id'] . "\" selected>" . $rsql['nome'] . "</option>";
						}else{
							echo "<option value=\"" . $rsql['id'] . "\">" . $rsql['nome'] . "</option>";
						}
					}

				echo "
				</select>
				</td>
			</tr>
			<tr>
				<td>Valor: </td>
				<td><input name=\"carta_valor\" type=\"text\" value=\"" . $rsql_carta['valor'] . "\"></td>
			</tr>
			<tr>
				<td>Imagem: </td>
				<td><input type=\"file\" name=\"foto\"></td>
			</tr>
			<tr>
				<td><input type=\"hidden\" name=\"carta_id\" value=\"" . $i2 . "\"></td>
				<td><input type=\"submit\" name=\"alterar_carta\" value=\"Alterar\"></td>
			</tr>
		</table>
		</form>";
	}

















	if($i1 == 5){
		echo"
		<span class=\"titulo\">Adicionar um novo efeito:</span>
		<hr size=\"1\" color=\"#cccccc\">
		<form method=\"post\" enctype=\"multipart/form-data\" action=\"\">
		<table>
			<tr>
				<td>Nome: </td>
				<td><input name=\"efeito_nome\" type=\"text\"></td>
			</tr>
			<tr>
				<td>Ganho: </td>
				<td><input name=\"efeito_ganho\" type=\"text\"></td>
			</tr>
			<tr>
				<td>Valor: </td>
				<td><input name=\"efeito_valor\" type=\"text\"></td>
			</tr>
			<tr>
				<td>Tipo: </td>
				<td><select name=\"efeito_tip\">";
					$csql = mysql_query("select * from tip");
					while($rsql = mysql_fetch_array($csql)){
						echo "<option value=\"" . $rsql['id'] . "\">" . $rsql['nome'] . "</option>";
					}

				echo "
				</select>
				</td>
			</tr>
			<tr>
				<td>Imagem: </td>
				<td><input type=\"file\" name=\"foto\"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type=\"submit\" name=\"cadastrar_efeito\" value=\"Cadastrar\"></td>
			</tr>
		</table>
		</form>";
	}













	if($i1 == 6){
		echo"
		<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
			<span class=\"titulo\">ALTERAR EFEITOS</span><hr size=\"1\" width=\"100%\" color=\"#cccccc\">";
			$csql = mysql_query("SELECT * FROM ee;");
		 	while($rsql=mysql_fetch_array($csql)){
		 		echo "
		 		<div id=\"item\" style=\"width: 143px; float: left; margin: 2px; text-align: justify; padding: 5px;\" align=\"left\">
		 			<a href=\"index.php?admin&i1=7&i2=" . $rsql['id'] . "\" class=\"linkus\">
		 				<img src=\"cartas/" . $rsql['imagem'] . "\" width=\"143\" height=\"150\">
		 			</a>
		 			<center><a href=\"index.php?admin&i1=7&i2=" . $rsql['id'] . "\" class=\"linkus\">" . $rsql['nome'] . "</a></center>
		 		</div>";
		 	}
		echo "
		<div style=\"clear: both;\"></div>
		</div>";
	}










	if($i1 == 7){
		$csql_efeito = mysql_query("select * from ee where id = '$i2';");
		$rsql_efeito = mysql_fetch_array($csql_efeito);

		echo"
		<span class=\"titulo\">" . $rsql_efeito['nome'] ."</span>
		<hr size=\"1\" color=\"#cccccc\">
		<form method=\"post\" enctype=\"multipart/form-data\" action=\"\">
		<table>
			<tr>
				<td>Nome: </td>
				<td><input name=\"efeito_nome\" type=\"text\" value=\"" . $rsql_efeito['nome'] . "\"></td>
			</tr>
			<tr>
				<td>Ganho: </td>
				<td><input name=\"efeito_ganho\" type=\"text\" value=\"" . $rsql_efeito['ganho'] . "\"></td>
			</tr>
			<tr>
				<td>Valor: </td>
				<td><input name=\"efeito_valor\" type=\"text\" value=\"" . $rsql_efeito['valor'] . "\"></td>
			</tr>
			<tr>
				<td>Tipo: </td>
				<td><select name=\"efeito_tip\">";
					$csql = mysql_query("select * from tip");
					while($rsql = mysql_fetch_array($csql)){
						if($rsql['id'] == $rsql_efeito['tip']){
							echo "<option value=\"" . $rsql['id'] . "\" selected>" . $rsql['nome'] . "</option>";
						}else{
							echo "<option value=\"" . $rsql['id'] . "\">" . $rsql['nome'] . "</option>";
						}
					}
				echo "
				</select>
				</td>
			</tr>
			<tr>
				<td>Imagem: </td>
				<td><input type=\"file\" name=\"foto\"></td>
			</tr>
			<tr>
				<td><input type=\"hidden\" name=\"efeito_id\" value=\"" . $i2 . "\"></td>
				<td><input type=\"submit\" name=\"alterar_efeito\" value=\"Alterar\"></td>
			</tr>
		</table>
		</form>";
	}
















	if($i1 == 8){
		echo"
		<span class=\"titulo\">Adicionar um novo tipo:</span>
		<hr size=\"1\" color=\"#cccccc\">
		<form method=\"post\" enctype=\"multipart/form-data\" action=\"\">
		<table>
			<tr>
				<td>Nome: </td>
				<td><input name=\"tip_nome\" type=\"text\"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type=\"submit\" name=\"cadastrar_tipo\" value=\"Cadastrar\"></td>
			</tr>
		</table>
		</form>";
	}













	if($i1 == 9){
		echo"
		<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
			<span class=\"titulo\">ALTERAR TIPOS</span><hr size=\"1\" width=\"100%\" color=\"#cccccc\">";
			$csql = mysql_query("SELECT * FROM tip;");
		 	while($rsql=mysql_fetch_array($csql)){
		 		echo "
		 			<a href=\"index.php?admin&i1=10&i2=" . $rsql['id'] . "\" class=\"linkus\">" . $rsql['nome'] . "</a><br>
		 		";
		 	}
		echo "
		</div>";
	}










	if($i1 == 10){
		$csql_tip = mysql_query("select * from tip where id = '$i2';");
		$rsql_tip = mysql_fetch_array($csql_tip);

		echo"
		<span class=\"titulo\">" . $rsql_tip['nome'] ."</span>
		<hr size=\"1\" color=\"#cccccc\">
		<form method=\"post\" enctype=\"multipart/form-data\" action=\"\">
		<table>
			<tr>
				<td>Nome: </td>
				<td><input name=\"tip_nome\" type=\"text\" value=\"" . $rsql_tip['nome'] . "\"></td>
			</tr>
			<tr>
				<td><input type=\"hidden\" name=\"tip_id\" value=\"" . $i2 . "\"></td>
				<td><input type=\"submit\" name=\"alterar_tipo\" value=\"Alterar\"></td>
			</tr>
		</table>
		</form>";
	}



















	if($i1 == 11){
		echo"
		<span class=\"titulo\">Adicionar um novo estilo musical:</span>
		<hr size=\"1\" color=\"#cccccc\">
		<form method=\"post\" enctype=\"multipart/form-data\" action=\"\">
		<table>
			<tr>
				<td>Nome: </td>
				<td><input name=\"est_nome\" type=\"text\"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type=\"submit\" name=\"cadastrar_estilo\" value=\"Cadastrar\"></td>
			</tr>
		</table>
		</form>";
	}













	if($i1 == 12){
		echo"
		<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
			<span class=\"titulo\">ALTERAR ESTILO MUSICAL</span><hr size=\"1\" width=\"100%\" color=\"#cccccc\">";
			$csql = mysql_query("SELECT * FROM est_musical;");
		 	while($rsql=mysql_fetch_array($csql)){
		 		echo "
		 			<a href=\"index.php?admin&i1=13&i2=" . $rsql['id'] . "\" class=\"linkus\">" . $rsql['nome'] . "</a><br>
		 		";
		 	}
		echo "
		</div>";
	}










	if($i1 == 13){
		$csql_est = mysql_query("select * from est_musical where id = '$i2';");
		$rsql_est = mysql_fetch_array($csql_est);

		echo"
		<span class=\"titulo\">" . $rsql_est['nome'] ."</span>
		<hr size=\"1\" color=\"#cccccc\">
		<form method=\"post\" enctype=\"multipart/form-data\" action=\"\">
		<table>
			<tr>
				<td>Nome: </td>
				<td><input name=\"est_nome\" type=\"text\" value=\"" . $rsql_est['nome'] . "\"></td>
			</tr>
			<tr>
				<td><input type=\"hidden\" name=\"est_id\" value=\"" . $i2 . "\"></td>
				<td><input type=\"submit\" name=\"alterar_estilo\" value=\"Alterar\"></td>
			</tr>
		</table>
		</form>";
	}























	if($i1 == 14){
		echo"
		<span class=\"titulo\">Adicionar um novo artista:</span>
		<hr size=\"1\" color=\"#cccccc\">
		<form method=\"post\" enctype=\"multipart/form-data\" action=\"\">
		<table>
			<tr>
				<td>Nome: </td>
				<td><input name=\"art_nome\" type=\"text\"></td>
			</tr>
			<tr>
				<td>Descrição: </td>
				<td><textarea name=\"art_descricao\" type=\"text\" row=\"10\" cols=\"50\"></textarea></td>
			</tr>
			<tr>
				<td>Estilo Musical: </td>
				<td><select name=\"art_est_musical\">";
					$csql = mysql_query("select * from est_musical");
					while($rsql = mysql_fetch_array($csql)){
						echo "<option value=\"" . $rsql['id'] . "\">" . $rsql['nome'] . "</option>";
					}

				echo "
				</select>
				</td>
			</tr>
			<tr>
				<td></td>
				<td><input type=\"submit\" name=\"cadastrar_artista\" value=\"Cadastrar\"></td>
			</tr>
		</table>
		</form>";
	}













	if($i1 == 15){
		echo"
		<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
			<span class=\"titulo\">ALTERAR ARTISTA</span><hr size=\"1\" width=\"100%\" color=\"#cccccc\">";
			$csql = mysql_query("SELECT * FROM artista;");
		 	while($rsql=mysql_fetch_array($csql)){
		 		echo "
		 			<a href=\"index.php?admin&i1=16&i2=" . $rsql['id'] . "\" class=\"linkus\">" . $rsql['nome'] . "</a><br>
		 		";
		 	}
		echo "
		</div>";
	}










	if($i1 == 16){
		$csql_art = mysql_query("select * from artista where id = '$i2';");
		$rsql_art = mysql_fetch_array($csql_art);

		echo"
		<span class=\"titulo\">" . $rsql_art['nome'] ."</span>
		<hr size=\"1\" color=\"#cccccc\">
		<form method=\"post\" enctype=\"multipart/form-data\" action=\"\">
		<table>
			<tr>
				<td>Nome: </td>
				<td><input name=\"art_nome\" type=\"text\" value=\"" . $rsql_art['nome'] . "\"></td>
			</tr>
			<tr>
				<td>Descrição: </td>
				<td><textarea name=\"art_descricao\" type=\"text\" row=\"10\" cols=\"50\">" . $rsql_art['descricao'] . "</textarea></td>
			</tr>
			<tr>
				<td>Estilo Musical: </td>
				<td><select name=\"art_est_musical\">";
					$csql = mysql_query("select * from est_musical");
					while($rsql = mysql_fetch_array($csql)){
						if($rsql['id'] == $rsql_art['est_musical']){
							echo "<option value=\"" . $rsql['id'] . "\" selected>" . $rsql['nome'] . "</option>";
						}else{
							echo "<option value=\"" . $rsql['id'] . "\">" . $rsql['nome'] . "</option>";
						}
					}

				echo "
				</select>
				</td>
			</tr>
			<tr>
				<td><input type=\"hidden\" name=\"art_id\" value=\"" . $i2 . "\"></td>
				<td><input type=\"submit\" name=\"alterar_artista\" value=\"Alterar\"></td>
			</tr>
		</table>
		</form>";
	}














}
?>