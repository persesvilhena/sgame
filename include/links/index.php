<?php
if($i1 == null){$i1 = 1;}
if ($i1 == 1){
	$csql = mysqli_query($conecta, "SELECT * FROM links WHERE id_us = '$id';");
	echo "<div class=\"tabela1\"><table>
	<tr><td>Links</td><td width=\"50\">Editar</td><td width=\"50\">Apagar?</td></tr>
	";
	while($rsql = mysqli_fetch_array($csql)){
		echo "<tr><td><a href=\"http://" . $rsql['link'] . "\" class=\"classe1\">" . $rsql['nome'] . "</a></td>
		<td><a href=\"index.php?links&i1=2&i2=" . $rsql['id'] . "\" class=\"classe1\">Editar</a></td>
		<td><a href=\"index.php?links&i1=3&i2=" . $rsql['id'] . "\" class=\"classe1\">Apagar</a></td>
		</tr>
		";
	}
	if (mysqli_num_rows($res2) == 0){
		echo "<tr><td><center><span class=\"titulo\">A lista de links está vazia</span></center></td><td></td><td></td></tr>";
	}
	echo "</table></div><br><div align=right><a href=index.php?links&i1=4 class=botao>Novo link</a></div>";
}
if($i1 == 2){
	$csql = mysqli_query($conecta, "select * from links where id = '$i2' and id_us = '$id';");
	$rsql = mysqli_fetch_array($csql);
	if(mysqli_num_rows($csql) == 1){
		if(isset($_POST["alterar"])) {
			if(!empty($_POST["nome"]) && !empty($_POST["link"])) {
				$nome = $class->antisql($_POST["nome"]);
				$link = $class->antisql($_POST["link"]);
				$nlink = str_replace('http://' , '' , $link);

				$altera = mysqli_query($conecta, "update links set nome = '$nome', link = '$nlink' where id = '$i2' and id_us = '$id';");
				if ($altera){ 
					echo "<script>alert('Link alterado com sucesso!');window.location='index.php?links';</script>"; 
				}else{
					echo "<script>alert('Houve um problema!');window.location='index.php?links';</script>";
				}
			}else{
				echo "<script>alert('Houve um problema!');window.location='index.php?links';</script>";
			}
		}

		echo "<span class=\"titulo\">Editar</span><hr size=\"1\" color=\"#cccccc\">
		<form action=\"index.php?links&i1=2&i2=" . $rsql['id'] . "\" method=\"post\">
		<span class=\"texto\">Nome:</span><input name=\"nome\" id=\"cordoinput\" type=\"text\" value=\"" . $rsql['nome'] . "\"><br>
		<span class=\"texto\">Link:</span><input name=\"link\" id=\"cordoinput\" type=\"text\" value=\"" . $rsql['link'] . "\"><br>
		<input name=\"alterar\" id=\"cordoinput\" type=\"submit\" value=\"Alterar\">
		</form>
		";
	}
}
if($i1 == 3){
	$csql = mysqli_query($conecta, "select * from links where id = '$i2' and id_us = '$id';");
	$rsql = mysqli_fetch_array($csql);
	if(mysqli_num_rows($csql) == 1){
		$altera = mysqli_query($conecta, "delete from links where id = '$i2' and id_us = '$id';");
		if ($altera){ 
			echo "<script>alert('Link apagado com sucesso!');window.location='index.php?links';</script>"; 
		}else{
			echo "<script>alert('Houve um problema!');window.location='index.php?links';</script>";
		}
	}
}
if($i1 == 4){
	if(isset($_POST["inserir"])) {
		if(!empty($_POST["nome"]) && !empty($_POST["link"])) {
			$nome = $class->antisql($_POST["nome"]);
			$link = $class->antisql($_POST["link"]);
			$nlink = str_replace('http://' , '' , $link);

			$insere = mysqli_query($conecta, "insert into links (id_us, nome, link) values ('$id', '$nome', '$nlink');");
			if ($insere){ 
				echo "<script>alert('Link criado com sucesso!');window.location='index.php?links';</script>"; 
			}else{
				echo "<script>alert('Houve um problema!');window.location='index.php?links';</script>";
			}
		}else{
			echo "<script>alert('Houve um problema!');window.location='index.php?links';</script>";
		}
	}

	echo "<span class=\"titulo\">Novo link</span><hr size=\"1\" color=\"#cccccc\">
	<form action=\"index.php?links&i1=4\" method=\"post\">
	<span class=\"texto\">Nome:</span><input name=\"nome\" id=\"cordoinput\" type=\"text\" value=\"\"><br>
	<span class=\"texto\">Link:</span><input name=\"link\" id=\"cordoinput\" type=\"text\" value=\"\"><br>
	<input name=\"inserir\" id=\"cordoinput\" type=\"submit\" value=\"Criar\">
	</form>
	";
}
?>