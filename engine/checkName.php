<?php
include("conexao.php");
		   
$repeat_user = mysqli_query($conecta, "SELECT * FROM user WHERE login='$_REQUEST[username]'") or die($mensagem_erro = "Houve um erro:<br />".mysqli_error()); // Faço a consulta ao SQL para verificar se não há usuários com o mesmo login name
		
if(mysqli_num_rows($repeat_user) == 0) {

	echo 'okay';
} else {
	echo 'denied';
}

?>
