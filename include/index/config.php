<?php

if(isset($_POST["cadastrar"])) { 
	if(!empty($_POST["epp"])) { 
		$epp = $class->antisql($_POST["epp"]); 
		$insert = mysqli_query($conecta, "update user set epp = '$epp' where id = '$id';") or die(mysqli_error()); 
		if($insert) {
			echo "<script>alert('Salvo!');window.location='index.php?config'</script>";
		}else{
			echo "<script>alert('Houve um erro!');window.location='index.php?config'</script>";
		}
	}
	else {
		echo "<script>alert('Por favor, preencha os campos corretamente!');window.location='index.php?config'</script>";
		
	}		
}





if(isset($_POST["alterar_senha"])) { 
	if(!empty($_POST["senha_atual"]) && !empty($_POST["nova_senha"]) && !empty($_POST["nova_senha1"])) { 
		$senha_atual = md5($class->antisql($_POST["senha_atual"]));
		$nova_senha = md5($class->antisql($_POST["nova_senha"])); 
		$nova_senha1 = md5($class->antisql($_POST["nova_senha1"])); 
		if($senha_atual == $row['senha']){
			if($nova_senha == $nova_senha1){
				$insert = mysqli_query($conecta, "update user set senha = '$nova_senha' where id = '$id';") or die(mysqli_error()); 
				if($insert) {
					echo "<script>alert('Salvo!');window.location='sair.php'</script>";
				}else{
					echo "<script>alert('Houve um erro!');window.location='index.php?config'</script>";
				}
			}else{
				echo "<script>alert('As senhas não são iguais!');window.location='index.php?config'</script>";
			}
		}else{
			echo "<script>alert('Senha errada!');window.location='index.php?config'</script>";
		}
	}
	else {
		echo "<script>alert('Por favor, preencha os campos corretamente!');window.location='index.php?config'</script>";
		
	}		
}







if(isset($_POST["excluir_conta"])) { 
	if(!empty($_POST["senha_atual"])) { 
		$senha_atual = md5($class->antisql($_POST["senha_atual"]));
		if($senha_atual == $row['senha']){
			unlink("fotos/". $row['foto'] ."");
			unlink("fotos/min/". $row['foto'] ."");
			$insert = mysqli_query($conecta, "DELETE FROM user_cartas WHERE deid = '$id';") or die(mysqli_error()); 
			$insert = mysqli_query($conecta, "DELETE FROM user_ee WHERE deid = '$id';") or die(mysqli_error()); 
			$insert = mysqli_query($conecta, "DELETE FROM rmsg WHERE deid = '$id';") or die(mysqli_error()); 
			$insert = mysqli_query($conecta, "DELETE FROM rmsg WHERE idpert = '$id';") or die(mysqli_error()); 
			$insert = mysqli_query($conecta, "DELETE FROM repost WHERE id_us = '$id';") or die(mysqli_error()); 
			$insert = mysqli_query($conecta, "DELETE FROM post WHERE id_us = '$id';") or die(mysqli_error()); 
			$insert = mysqli_query($conecta, "DELETE FROM perfil WHERE id = '$id';") or die(mysqli_error()); 
			$insert = mysqli_query($conecta, "DELETE FROM msg WHERE deid = '$id';") or die(mysqli_error()); 
			$insert = mysqli_query($conecta, "DELETE FROM msg WHERE paraid = '$id';") or die(mysqli_error()); 
			$insert = mysqli_query($conecta, "DELETE FROM links WHERE id_us = '$id';") or die(mysqli_error()); 
			$insert = mysqli_query($conecta, "DELETE FROM gostar WHERE id_us = '$id';") or die(mysqli_error()); 
			$insert = mysqli_query($conecta, "DELETE FROM contato WHERE deid = '$id';") or die(mysqli_error()); 
			$insert = mysqli_query($conecta, "DELETE FROM contato WHERE cotid = '$id';") or die(mysqli_error()); 
			$insert = mysqli_query($conecta, "DELETE FROM batalhas WHERE deid = '$id';") or die(mysqli_error()); 
			$insert = mysqli_query($conecta, "DELETE FROM user WHERE id = '$id';") or die(mysqli_error()); 
			if($insert) {
				echo "<script>alert('Sua conta foi apagada!');window.location='sair.php'</script>";
			}else{
				echo "<script>alert('Houve um erro!');window.location='index.php?config'</script>";
			}
			
		}else{
			echo "<script>alert('Senha errada!');window.location='index.php?config'</script>";
		}
	}
	else {
		echo "<script>alert('Por favor, preencha os campos corretamente!');window.location='index.php?config'</script>";
		
	}		
}








echo "
<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
	<span class=\"titulo\">Configuração:</span>
	<hr size=\"1\" color=\"#cccccc\">
	<form method=\"post\" action=\"\">
		<table border=\"0\">
			<tr>
				<td><span class=\"texto\">Número de exibições de posts/relatórios por pagina: </span></td>
				<td><input type=\"text\" name=\"epp\" value=\"" . $row["epp"] . "\"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type=\"submit\" name=\"cadastrar\" value=\"Salvar\" style=\"float: right;\"></td>
			</tr>
		</table>
	</form>
</div>

<br>

<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
	<span class=\"titulo\">Alterar senha:</span>
	<hr size=\"1\" color=\"#cccccc\">
	<form method=\"post\" action=\"\">
		<table border=\"0\">
			<tr>
				<td><span class=\"texto\">Senha atual: </span></td>
				<td><input type=\"password\" name=\"senha_atual\"></td>
			</tr>
			<tr>
				<td><span class=\"texto\">Nova senha: </span></td>
				<td><input type=\"password\" name=\"nova_senha\"></td>
			</tr>
			<tr>
				<td><span class=\"texto\">Repita a senha: </span></td>
				<td><input type=\"password\" name=\"nova_senha1\"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type=\"submit\" name=\"alterar_senha\" value=\"Alterar\" style=\"float: right;\"></td>
			</tr>
		</table>
	</form>
</div>

<br>

<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\">
	<span class=\"titulo\">Excluir conta:</span>
	<hr size=\"1\" color=\"#cccccc\">
	<form method=\"post\" action=\"\">
		<table border=\"0\">
			<tr>
				<td><span class=\"texto\">Senha: </span></td>
				<td><input type=\"password\" name=\"senha_atual\"></td>
			</tr>
			<tr>
				<td></td>
				<td><input type=\"submit\" name=\"excluir_conta\" value=\"Excluir\" style=\"float: right;\"></td>
			</tr>
		</table>
	</form>
</div>






";
?>