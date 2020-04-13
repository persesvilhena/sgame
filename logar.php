<?php 
include("engine/conexao.php"); 

session_start();
if(!empty($_SESSION["login"]) && !empty($_SESSION["senha"]) && !empty($_SESSION["id"])) {
	header("Location: index.php?index");
	exit();
}


if(isset($_POST["logar"])) {
	if(!empty($_POST["login"]) && !empty($_POST["senha"])) {
		$login = $class->antisql($_POST["login"]);
		$senha = $class->antisql($_POST["senha"]);
		$senha_md5 = md5($senha);
		$valida_user = mysql_query("SELECT * FROM $tabela WHERE login='$login' AND senha='$senha_md5'") or die(mysql_error());
		if(mysql_num_rows($valida_user) > 0) {
			$info = mysql_fetch_array($valida_user);
			$login = $info["login"];
			$pass = $info["senha"];
			$id_generico = $info["id"];
			$id = base64_encode($id_generico);
			$_SESSION["login"] = $login;
			$_SESSION["senha"] = $senha_md5;
			$_SESSION["id"] = $id;
			header("Location: index.php?index");
			exit();
		}
		else {
			echo "<script>alert('Dados Incorretos!');window.location='logar.php?index'</script>";
		}
	}
	else {
		echo "<script>alert('Por favor, preencha os campos corretamente!');window.location='logar.php?index'</script>";
	}
}















if(isset($_POST["cadastrar"])) {
	if(!empty($_POST["login"]) && !empty($_POST["senha"]) && !empty($_POST["email"])) {
		$login = $class->antisql($_POST["login"]);
		$nome = $class->antisql($_POST["nome"]);
		$sobrenome = $class->antisql($_POST["sobrenome"]);
		$senha = $class->antisql($_POST["senha"]);
		$senha = md5($senha);
		$email = $class->antisql($_POST["email"]);
		$senha_sha1 = sha1($senha);
		$repeat_user = mysql_query("SELECT * FROM $tabela WHERE login='$login'") or die($mensagem_erro = "Houve um erro:<br />".mysql_error());
		if(mysql_num_rows($repeat_user) > 0) {
			echo "<script>alert('Já existe um usuário com este login!');window.location='logar.php?index'</script>";
		}
		else {
			$insert = mysql_query("INSERT INTO $tabela(login, senha, email, nome, sobrenome, foto, epp, cash) VALUES('$login', '$senha', '$email', '$nome', '$sobrenome', 'new/new.png', '30', '5000')") or die(mysql_error());
			if($insert) {
				echo "<script>alert('Usuário cadastrado com sucesso!');window.location='logar.php?index'</script>";
			}
		}
	}
	else {
		echo "<script>alert('Por favor, preencha os campos corretamente!');window.location='logar.php?index'</script>";
	}
}







if(isset($_POST["recuperar1"])) {
	if(!empty($_POST["login"])) {
		$login = $class->antisql($_POST["login"]);
		$csql = mysql_query("select * from user where login = '$login';");
		$rsql = mysql_fetch_array($csql);
		$hash = rand(1, 1000);
		$hash = md5($hash);
		$csql = mysql_query("update user set rec = '$hash' where id = '$rsql[id]';");
		$arquivo = "<b>Foi solicitado a recuperação da sua senha no Sgame</b><br>
		Link para recuperação da sua senha: <a href=\"http://sgame.willypete.com.br/logar.php?recuperar_senha&id=" . $rsql['id'] . "&rec=" . $hash . "\">Recuperar senha</a><br>
		Caso você não tenha solicitado a recuperação da sua senha apenas ignore este e-mail!<br>" . $creditos . "<br>";
		$destino = $rsql['email'];
		$assunto = "Recuperar senha";
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: Sgame <admin@willypete.com.br>';
		$enviaremail = mail($destino, $assunto, $arquivo, $headers);
		if($enviaremail){
			echo "<script>alert('Sua senha foi enviada para seu email!');window.location='logar.php?index'</script>";
		} else {
			echo "<script>alert('Houve um problema ao enviar email de recuperação!');window.location='logar.php?index'</script>";
		}
	}
	else { 
		echo "<script>alert('Por favor, preencha os campos corretamente!');window.location='logar.php?index'</script>";
	}

}







if(isset($_POST["recuperar2"])) {
	if(!empty($_POST["email"])) {
		$email = $class->antisql($_POST["email"]);
		$csql = mysql_query("select * from user where email = '$email';");
		$rsql = mysql_fetch_array($csql);
		$hash = rand(1, 1000);
		$hash = md5($hash);
		$csql = mysql_query("update user set rec = '$hash' where id = '$rsql[id]';");
		$arquivo = "<b>Foi solicitado a recuperação da sua senha no Sgame</b><br>
		Link para recuperação da sua senha: <a href=\"http://sgame.willypete.com.br/logar.php?recuperar_senha&id=" . $rsql['id'] . "&rec=" . $hash . "\">Recuperar senha</a><br>
		Caso você não tenha solicitado a recuperação da sua senha apenas ignore este e-mail!<br>" . $creditos . "<br>";
		$destino = $rsql['email'];
		$assunto = "Recuperar senha";
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$headers .= 'From: Sgame <admin@willypete.com.br>';
		$enviaremail = mail($destino, $assunto, $arquivo, $headers);
		if($enviaremail){
			echo "<script>alert('Sua senha foi enviada para seu email!');window.location='logar.php?index'</script>";
		} else {
			echo "<script>alert('Houve um problema ao enviar email de recuperação!');window.location='logar.php?index'</script>";
		}
	}
	else { 
		echo "<script>alert('Por favor, preencha os campos corretamente!');window.location='logar.php?index'</script>";
	}

}










if(isset($_POST["recuperar_senha1"])) {
	if(!empty($_POST["id_user"]) && !empty($_POST["rec_user"]) && !empty($_POST["nova_senha"]) && !empty($_POST["nova_senha1"])) {
		$id_user = $class->antisql($_POST["id_user"]);
		$rec_user = $class->antisql($_POST["rec_user"]);
		$nova_senha = $class->antisql($_POST["nova_senha"]);
		$nova_senha1 = $class->antisql($_POST["nova_senha1"]);
		$csql = mysql_query("select * from user where id = '$id_user' and rec = '$rec_user';");
		if(mysql_num_rows($csql) > 0){
			if($nova_senha == $nova_senha1){
				$nova_senha_md5 = md5($nova_senha);
				$alterar = mysql_query("update user set senha = '$nova_senha_md5', rec = NULL where id = '$id_user' and rec = '$rec_user';");
				if($alterar){
					echo "<script>alert('Senha alterada com sucesso!');window.location='logar.php?index'</script>";
				}else{
					echo "<script>alert('Houve um problema!');window.location='logar.php?index'</script>";
				}
			}else{
				echo "<script>alert('As senhas não são iguais!');window.location='logar.php?index'</script>";
			}
		}else{
			echo "<script>alert('Houve um problema ao validar a hash!');window.location='logar.php?index'</script>";
		}
	}
	else { 
		echo "<script>alert('Por favor, preencha os campos corretamente!');window.location='logar.php?index'</script>";
	}

}
















if(isset($_POST["md5"])) {
	if(!empty($_POST["campo"])) {
		$campo = $class->antisql($_POST["campo"]);
		$campo_md5 = md5($campo);
		echo $campo_md5;
	}
	else { 
		echo "<script>alert('Por favor, preencha os campos corretamente!');window.location='logar.php?index'</script>";
	}

}









$endereco = $_SERVER ['REQUEST_URI'];

if(isset($_GET["index"]) || $endereco == "/logar.php" || $endereco == "/") {
	echo "
	<html>
	<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
	<link rel=\"stylesheet\" type=\"text/css\" href=\"engine/css/style.css\">
	<link rel=\"shortcut icon\" href=\"engine/imgs/icon1.png\">
	<script src=\"engine/js/utils.js\" type=\"text/javascript\"></script>
	<script src=\"engine/js/validation.js\" type=\"text/javascript\"></script>
	<title>Sgame - Logar</title>
	</head>

	<body>
	<div id=\"center\" style=\"margin-top: 80px;\">
		<div id=\"conteudo3\" style=\"margin-top: 10px;\">
			<div align=\"center\">
				<form method=\"post\" action=\"\">
					<table>
						<tr>
							<td><span class=\"texto\">Login: </span></td>
							<td><input type=\"text\" name=\"login\" id=\"lglogin\"></td>
						</tr>
						<tr>
							<td><span class=\"texto\">Senha: </span></td>
							<td><input type=\"password\" name=\"senha\" id=\"lgsenha\"></td>
						</tr>
						<tr>
							<td></td>
							<td><button type=\"submit\" name=\"logar\" value=\"Logar\" id=\"logar\">Logar</button></td>
						</tr>
					</table>
				</form>
				<span class=\"texto\"><a href=\"logar.php?esqueceu\" class=\"linkus\">Esqueceu a senha?</a></span><br>
			</div>
		</div>



		<div id=\"conteudo3\" style=\"margin-top: 6px;\">
			<br>
			<div align=\"center\"><span class=\"titulo\">Cadastre-se Gratuitamente</span></div>

			<div align=\"center\">
				<form method=\"post\" action=\"\">
					<table border=\"0\" cellspacing=\"0\" cellpadding=\"5\">
					<tr>
						<td><span class=\"texto\">Login:</span></td>
						<td><input id=\"login\" type=\"text\" name=\"login\"></td>
						<td><img id=\"imgloginstatus\" src=\"engine/imgs/blank.png\"></td>
					</tr>
					<tr>
						<td><span class=\"texto\">Senha:</span></td>
						<td><input id=\"senha\" type=\"password\" name=\"senha\"></td>
						<td><img id=\"imgsenhastatus\" src=\"engine/imgs/blank.png\"></td>
					</tr>
					<tr>
						<td><span class=\"texto\">Repita a senha:</span></td>
						<td><input id=\"senha1\" type=\"password\" name=\"senha1\"></td>
						<td><img id=\"imgsenha1status\" src=\"engine/imgs/blank.png\"></td>
					</tr>
					<tr>
						<td><span class=\"texto\">E-mail:</span></td>
						<td><input id=\"email\" type=\"text\" name=\"email\"></td>
						<td><img id=\"imgemailstatus\" src=\"engine/imgs/blank.png\"></td>
					</tr>
					<tr>
						<td><span class=\"texto\">Nome:</span></td>
						<td><input id=\"nome\" type=\"text\" name=\"nome\"></td>
						<td><img id=\"imgnomestatus\" src=\"engine/imgs/blank.png\"></td>
					</tr>
					<tr>
						<td><span class=\"texto\">Sobrenome:</span></td>
						<td><input id=\"sobrenome\" type=\"text\" name=\"sobrenome\"></td>
						<td><img id=\"imgsobrenomestatus\" src=\"engine/imgs/blank.png\"></td>
					</tr>
					<tr>
						<td></td>
						<td><button id=\"cadastrar\" type=\"submit\" name=\"cadastrar\" value=\"Cadastrar\">Cadastrar</button></td>
					</tr>
					</table>
				</form>
			</div>
		</div>

		<div id=\"barrasuperior\" align=\"center\">
			<div id=\"center\">
				<img src=\"engine/imgs/logo.png\" align=\"center\" height=\"60\" style=\"margin-top: 3px;\">


			</div>
		</div>

		<div align=\"center\">
			<span class=\"subtitulo\">" . $creditos . "</span>
		</div>
	</div>
	</body>
	</html>
	";

}










if(isset($_GET["esqueceu"])) {
	echo "
	<html>
	<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
	<link rel=\"stylesheet\" type=\"text/css\" href=\"engine/css/style.css\">
	<link rel=\"shortcut icon\" href=\"engine/imgs/icon1.png\">
	<script src=\"engine/js/utils.js\" type=\"text/javascript\"></script>
	<script src=\"engine/js/validation.js\" type=\"text/javascript\"></script>
	<title>Sgame - Esqueceu</title>
	</head>

	<body>
	<div id=\"center\" style=\"margin-top: 80px;\">
		<div id=\"conteudo3\" style=\"margin-top: 10px;\">
			<div align=\"center\">
				<span class=\"texto\"><a href=\"logar.php?esqueceu1\" class=\"linkus\">Sei meu login</a></span><br>
				<span class=\"texto\"><a href=\"logar.php?esqueceu2\" class=\"linkus\">Sei meu e-mail</a></span>
			</div>
		</div>

		<div id=\"barrasuperior\" align=\"center\">
			<div id=\"center\">
				<a href=\"logar.php\"><img src=\"engine/imgs/logo.png\" align=\"center\" height=\"60\" style=\"margin-top: 3px;\"></a>
			</div>
		</div>

		<div align=\"center\">
			<span class=\"subtitulo\">" . $creditos . "</span>
		</div>
	</div>
	</body>
	</html>
	";
}
















if(isset($_GET["esqueceu1"])) {
	echo "
	<html>
	<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
	<link rel=\"stylesheet\" type=\"text/css\" href=\"engine/css/style.css\">
	<link rel=\"shortcut icon\" href=\"engine/imgs/icon1.png\">
	<script src=\"engine/js/utils.js\" type=\"text/javascript\"></script>
	<script src=\"engine/js/validation.js\" type=\"text/javascript\"></script>
	<title>Sgame - Esqueceu</title>
	</head>

	<body>
	<div id=\"center\" style=\"margin-top: 80px;\">
		<div id=\"conteudo3\" style=\"margin-top: 10px;\">
			<div align=\"center\">
				<br>
				<form method=\"post\" action=\"\">
					<span class=\"texto\">Login: </span><input type=\"text\" name=\"login\"> <input type=\"submit\" name=\"recuperar1\" value=\"Recuperar\">
				</form>
			</div>
		</div>

		<div id=\"barrasuperior\" align=\"center\">
			<div id=\"center\">
				<a href=\"logar.php\"><img src=\"engine/imgs/logo.png\" align=\"center\" height=\"60\" style=\"margin-top: 3px;\"></a>
			</div>
		</div>

		<div align=\"center\">
			<span class=\"subtitulo\">" . $creditos . "</span>
		</div>
	</div>
	</body>
	</html>
	";
}

















if(isset($_GET["esqueceu2"])) {
	echo "
	<html>
	<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
	<link rel=\"stylesheet\" type=\"text/css\" href=\"engine/css/style.css\">
	<link rel=\"shortcut icon\" href=\"engine/imgs/icon1.png\">
	<script src=\"engine/js/utils.js\" type=\"text/javascript\"></script>
	<script src=\"engine/js/validation.js\" type=\"text/javascript\"></script>
	<title>Sgame - Esqueceu</title>
	</head>

	<body>
	<div id=\"center\" style=\"margin-top: 80px;\">
		<div id=\"conteudo3\" style=\"margin-top: 10px;\">
			<div align=\"center\">
				<br>
				<form method=\"post\" action=\"\">
					<span class=\"texto\">Email: </span><input type=\"text\" name=\"email\"> <input type=\"submit\" name=\"recuperar2\" value=\"Recuperar\">
				</form>
			</div>
		</div>

		<div id=\"barrasuperior\" align=\"center\">
			<div id=\"center\">
				<a href=\"logar.php\"><img src=\"engine/imgs/logo.png\" align=\"center\" height=\"60\" style=\"margin-top: 3px;\"></a>
			</div>
		</div>

		<div align=\"center\">
			<span class=\"subtitulo\">" . $creditos . "</span>
		</div>
	</div>
	</body>
	</html>
	";
}










if(isset($_GET["recuperar_senha"])) {	
	echo "
	<html>
	<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
	<link rel=\"stylesheet\" type=\"text/css\" href=\"engine/css/style.css\">
	<link rel=\"shortcut icon\" href=\"engine/imgs/icon1.png\">
	<script src=\"engine/js/utils.js\" type=\"text/javascript\"></script>
	<script src=\"engine/js/validation.js\" type=\"text/javascript\"></script>
	<title>Sgame - Esqueceu</title>
	</head>

	<body>
	<div id=\"center\" style=\"margin-top: 80px;\">
		<div id=\"conteudo3\" style=\"margin-top: 10px;\">
			<div align=\"center\">
				<br>
	";
	$id_user = $class->antisql($_GET["id"]);
	$rec_user = $class->antisql($_GET["rec"]);
	if($rec_user != NULL){
		$verifica = mysql_query("select * from user where id = '$id_user' and rec = '$rec_user';");
		if(mysql_num_rows($verifica) > 0){
			echo "
			<form method=\"post\" action=\"\">
				<table>
				<tr>
					<td><span class=\"texto\">Nova senha: </span></td>
					<td><input type=\"password\" name=\"nova_senha\"></td>
				</tr>
				<tr>
					<td><span class=\"texto\">Repita a senha: </span></td>
					<td><input type=\"password\" name=\"nova_senha1\"></td>
				</tr>
				<tr>
					<td><input type=\"hidden\" name=\"id_user\" value=\"" . $id_user . "\"><input type=\"hidden\" name=\"rec_user\" value=\"" . $rec_user . "\"></td>
					<td><input type=\"submit\" name=\"recuperar_senha1\" value=\"Recuperar\"></td>
				</tr>
				</table>
			</form>";
		}else{
			echo "Houve um problema!";
		}
	}else{
		echo "Houve um problema";
	}
	echo "

				
			</div>
		</div>

		<div id=\"barrasuperior\" align=\"center\">
			<div id=\"center\">
				<a href=\"logar.php\"><img src=\"engine/imgs/logo.png\" align=\"center\" height=\"60\" style=\"margin-top: 3px;\"></a>
			</div>
		</div>

		<div align=\"center\">
			<span class=\"subtitulo\">" . $creditos . "</span>
		</div>
	</div>
	</body>
	</html>
	";
}








if(isset($_GET["md5"])) {
	echo "
	<html>
	<head>
	<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\">
	<link rel=\"stylesheet\" type=\"text/css\" href=\"engine/css/style.css\">
	<link rel=\"shortcut icon\" href=\"engine/imgs/icon1.png\">
	<script src=\"engine/js/utils.js\" type=\"text/javascript\"></script>
	<script src=\"engine/js/validation.js\" type=\"text/javascript\"></script>
	<title>Sgame - MD5</title>
	</head>

	<body>
	<div id=\"center\" style=\"margin-top: 80px;\">
		<div id=\"conteudo3\" style=\"margin-top: 10px;\">
			<div align=\"center\">
				<br>
				<form method=\"post\" action=\"\">
					<span class=\"texto\">campo: </span><input type=\"text\" name=\"campo\"> <input type=\"submit\" name=\"md5\" value=\"enviar\">
				</form>
			</div>
		</div>

		<div id=\"barrasuperior\" align=\"center\">
			<div id=\"center\">
				<a href=\"logar.php\"><img src=\"engine/imgs/logo.png\" align=\"center\" height=\"60\" style=\"margin-top: 3px;\"></a>
			</div>
		</div>

		<div align=\"center\">
			<span class=\"subtitulo\">" . $creditos . "</span>
		</div>
	</div>
	</body>
	</html>
	";
}




?>