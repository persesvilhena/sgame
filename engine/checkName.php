<?php
include("conexao.php");
		   
$repeat_user = mysql_query("SELECT * FROM user WHERE login='$_REQUEST[username]'") or die($mensagem_erro = "Houve um erro:<br />".mysql_error()); // Fa�o a consulta ao SQL para verificar se n�o h� usu�rios com o mesmo login name
		
if(mysql_num_rows($repeat_user) == 0) {

	echo 'okay';
} else {
	echo 'denied';
}

?>
