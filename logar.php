<?php 
include("engine/conexao.php"); 


session_start();
if(!empty($_SESSION["login"]) && !empty($_SESSION["senha"]) && !empty($_SESSION["id"])) { // Verifico se já existem os cookies de login. Caso existam, redirecionam o user para a página restrita
	header("Location: index.php?index");
	exit();
}
if(isset($_POST["logar"])) { // Verifico se o botão de login foi acionado
	if(!empty($_POST["login"]) && !empty($_POST["senha"])) { // Verifico se os campos foram preenchidos
		$login = $class->antisql($_POST["login"]); // Filtro os dados de login name originados do formulário
		$senha = $class->antisql($_POST["senha"]); // Filtro a senha originada do formulário
		$senha_md5 = md5($senha); // Codifico a senha inserida para consulta ao SQL
		$valida_user = mysqli_query($conecta, "SELECT * FROM $tabela WHERE login='$login' AND senha='$senha_md5'") or die(mysqli_error()); // Faço a consulta ao SQL para buscar o usuário com os dados informados pelo form
		if(mysqli_num_rows($valida_user) > 0) { // Verifico se a consulta retorna alguma linha
			$lembrar = $_POST["lembrar"]; // Pego o valor do checkbox 'Lembrar' do formulário
			$info = mysqli_fetch_array($valida_user); // Defino a var responsável por trazer as informações do BD
			$login = $info["login"]; // Recupero o campo nome do BD
			$pass = $info["senha"]; // Recupero o campo senha do BD
			$id_generico = $info["id"]; // Recupero o campo id do BD
			$id = base64_encode($id_generico); // Codifico o id para obter mais segurança
			if($lembrar == "1") { // Se o checkbox foi marcado, gravo cookies de 1 ano
				// Gravo os cookies responsáveis pelo login
				/*setcookie("login", $login, time()+31536000); // setcookie(nome_cookie, valor_cookie, tempo_expiracao)
				setcookie("senha", $pass, time()+31536000); // Nesses casos, usei o tempo como anual
				setcookie("id", $id, time()+31536000);*/ // Assim: time()[agora]+[mais]3153600[60*60*24*365]{segs.*min.= 1 hora em segs => 1 hr em segs * 24 hrs = 1 dia => 1 dia * 365 dias = 1 ano}
				$_SESSION["login"] = $login;
				$_SESSION["senha"] = $senha_md5;
				$_SESSION["id"] = $id;
			}
			else { // Caso contrário, gravo cookies que expirarão assim q o browser fechar
				// Gravo os cookies responsáveis pelo login
				/*setcookie("login", $login, 0); // Aqui os cookies expiram assim q o browser fechar
				setcookie("senha", $pass, 0);
				setcookie("id", $id, 0);*/
				$_SESSION["login"] = $login;
				$_SESSION["senha"] = $senha_md5;
				$_SESSION["id"] = $id;
			}
			// Redireciono para a página restrita
			header("Location: index.php?index");
			exit();
		}
		else { // Se não retornar, define mensagem de erro
			echo "<script>alert('Dados Incorretos!');window.location='logar.php?index'</script>";
		}
	}
	else { // Caso tenha algum campo em branco, define mensagem de erro
		echo "<script>alert('Por favor, preencha os campos corretamente!');window.location='logar.php?index'</script>";
	}
}















if(isset($_POST["cadastrar"])) { // Verifico se o botão cadastrar foi acionado
	if(!empty($_POST["login"]) && !empty($_POST["senha"]) && !empty($_POST["email"])) { // Verifico se os campos foram preenchidos
		$login = $class->antisql($_POST["login"]); // Filtro os dados de login name originados do formulário
		$nome = $class->antisql($_POST["nome"]); // Filtro a senha originada do formulário
		$sobrenome = $class->antisql($_POST["sobrenome"]); // Filtro o e-mail originado do formulário
		$senha = $class->antisql($_POST["senha"]); // Filtro o e-mail originado do formulário
		$senha = md5($senha);
		$email = $class->antisql($_POST["email"]); // Filtro o e-mail originado do formulário
		$senha_sha1 = sha1($senha); // Codifico a senha inserida para consulta SQL
		$repeat_user = mysqli_query($conecta, "SELECT * FROM $tabela WHERE login='$login'") or die($mensagem_erro = "Houve um erro:<br />".mysqli_error()); // Faço a consulta ao SQL para verificar se não há usuários com o mesmo login name
		if(mysqli_num_rows($repeat_user) > 0) { // Verifico se a consulta retorna algum resultado. Nesse caso, se retornar, define uma mensagem de erro.
			echo "<script>alert('Já existe um usuário com este login!');window.location='logar.php?index'</script>";
		}
		else {
			$insert = mysqli_query($conecta, "INSERT INTO $tabela(login, senha, email, nome, sobrenome, foto, epp, cash) VALUES('$login', '$senha', '$email', '$nome', '$sobrenome', 'new/new.png', '30', '5000')") or die(mysqli_error()); // Insiro os dados no BD
			if($insert) { // Verifico se a query foi executada com sucesso. Se sim, define mensagem de sucesso.
				echo "<script>alert('Usuário cadastrado com sucesso!');window.location='logar.php?index'</script>";
			}
		}
	}
	else { // Se houver algum campo em branco, define mensagem de erro
		echo "<script>alert('Por favor, preencha os campos corretamente!');window.location='logar.php?index'</script>";
	}
}







if(isset($_POST["recuperar1"])) {
	if(!empty($_POST["login"])) {
		$login = $class->antisql($_POST["login"]);
		$csql = mysqli_query($conecta, "select * from user where login = '$login';");
		$rsql = mysqli_fetch_array($csql);
		$hash = rand(1, 1000);
		$hash = md5($hash);
		$csql = mysqli_query($conecta, "update user set rec = '$hash' where id = '$rsql[id]';");
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
		$csql = mysqli_query($conecta, "select * from user where email = '$email';");
		$rsql = mysqli_fetch_array($csql);
		$hash = rand(1, 1000);
		$hash = md5($hash);
		$csql = mysqli_query($conecta, "update user set rec = '$hash' where id = '$rsql[id]';");
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
		$csql = mysqli_query($conecta, "select * from user where id = '$id_user' and rec = '$rec_user';");
		if(mysqli_num_rows($csql) > 0){
			if($nova_senha == $nova_senha1){
				$nova_senha_md5 = md5($nova_senha);
				$alterar = mysqli_query($conecta, "update user set senha = '$nova_senha_md5', rec = NULL where id = '$id_user' and rec = '$rec_user';");
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

if(isset($_GET["index"]) || $endereco == "/logar.php" || $endereco == "/" || (count($_GET) == 0)) {
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
							<td><input type=\"checkbox\" name=\"lembrar\" id=\"lembrar\"><span class=\"texto\">Manter-me conectado</span></td>
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
		$verifica = mysqli_query($conecta, "select * from user where id = '$id_user' and rec = '$rec_user';");
		if(mysqli_num_rows($verifica) > 0){
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