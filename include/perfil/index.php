<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<?php
$verperfil = mysqli_query($conecta, "SELECT * FROM perfil WHERE id='$row[id]'");
if (mysqli_num_rows($verperfil) == 0){
mysqli_query($conecta, "insert into perfil values($row[id],null,null,null,null,null,null,null,null,null)");
}
// Se o usuário clicou no botão cadastrar efetua as ações
if (isset($_POST['cadastrar'])) {

//$sql = mysqli_query($conecta, "SELECT foto FROM user WHERE id = '$id';");
//$usuario = mysqli_fetch_object($sql);
//unlink("fotos/".$usuario->foto."");
 
	// Recupera os dados dos campos
	$us = $_POST['us'];
	$foto = $_FILES["foto"];
 
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
			$sql = mysqli_query($conecta, "SELECT foto FROM user WHERE id = '$id';");
			$usuario = mysqli_fetch_object($sql);
			unlink("fotos/".$usuario->foto."");
			unlink("fotos/min/".$usuario->foto."");
 
			// Pega extensão da imagem
			preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);
 
        	// Gera um nome único para a imagem
        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];
 
        	// Caminho de onde ficará a imagem
        	$caminho_imagem = "fotos/" . $nome_imagem;
 
			// Faz o upload da imagem para seu respectivo caminho
			move_uploaded_file($foto["tmp_name"], $caminho_imagem);
 
			// Insere os dados no banco
			$sql = mysqli_query($conecta, "update user set foto = '$nome_imagem' where id = '$id';");

			require('engine/wide/WideImage.php');

			$image = WideImage::load($caminho_imagem);

			$image = $image->resize(60, 60);

			$image->saveToFile('fotos/min/' . $nome_imagem);
 
			// Se os dados forem inseridos com sucesso
			if ($sql){
				echo "<script>alert('Imagem alterada com sucesso!'); window.location = 'index.php?perfil'</script>";
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
?>

<?php
if($i1 == 2){
$sql2 = mysqli_query($conecta, "SELECT * FROM post WHERE id = '$i2';");
$res2 = mysqli_fetch_array($sql2);
$vnum = $res2['us'];
if($vnum == $row['id']){
$csql4 = mysqli_query($conecta, "DELETE FROM post WHERE id='$i2'");
if($csql4) {
$msg_erro = "Postagem apagada com sucesso!";
}
else {
$msg_erro = "Houve um erro! relate o erro!";
}
echo "<div id=cont>" . $msg_erro . "</div>";
}}
?>
<div id="cj"><span class="titulo">Perfil:</span></div>
<div id="fj">
<span class="subtitulo">Sobre Você:</span><?php echo $row["nome"]; ?>
<hr size="1" color="#cccccc">
<span class="titulo">Foto de exibição:</span>
<form action="<?php $PHP_SELF; ?>" method="post" enctype="multipart/form-data" name="cadastro" >
<input type="hidden" name="us" value="<?php echo "$id_gen"; ?>">
<input id="cordoinput" type="file" name="foto" />
<input id="cordoinput" type="submit" name="cadastrar" value="Enviar" />
</form>
</div>

<span class="texto">
<div id="cj" style="margin-top: 4px;"><span class="titulo">Informações de usuário:</span></div>
<div id="fj">
<b>Login</b>:&nbsp;<?php echo $row["login"]; ?><br>
<b>Nome</b>:&nbsp;<?php echo $row["nome"]; ?><br>
<b>Sobrenome</b>:&nbsp;<?php echo $row["sobrenome"]; ?><br>
<b>Email</b>:&nbsp;<?php echo $row["email"]; ?><br><br>
<div align="right"><a href="#pfdialog" name="pfmodal" class="botao" onclick="CarregaDadosJanela('0','perfil_alt');">Alterar Dados</a></div>
</div>

<div id="cj" style="margin-top: 4px;"><span class="titulo">Informações do perfil:</span></div>
<div id="fj">
<b>Data de nascimento</b>:&nbsp;<?php echo $row2["data_nasc"]; ?><br>
<b>Telefone</b>:&nbsp;<?php echo $row2["telefone"]; ?><br>
<b>Telefone 2</b>:&nbsp;<?php echo $row2["telefone2"]; ?><br>
<b>Descrição1</b>:&nbsp;<?php echo $row2["descricao1"]; ?><br>
<b>Descrição2</b>:&nbsp;<?php echo $row2["descricao2"]; ?><br>
<b>Cidade</b>:&nbsp;<?php echo $row2["cidade"]; ?><br>
<b>Estado</b>:&nbsp;<?php echo $row2["estado"]; ?><br>
<b>Região</b>:&nbsp;<?php echo $row2["regiao"]; ?><br>
<b>País</b>:&nbsp;<?php echo $row2["pais"]; ?><br><br>
<div align="right"><a href="#pfdialog" name="pfmodal" class="botao" onclick="CarregaDadosJanela('0','perfil_alt1');">Alterar Dados</a></div>
</div>
</span>

<!--<div id="cj" style="margin-top: 4px;"><span class="titulo">Postar:</span></div>
<div id="fj"><div id="ctj"><span class="texto">
<form method="post" action="<?php $PHP_SELF; ?>">
<table width="600" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><?php echo $mensagem_erro; ?></td>
  </tr>
  <tr>
    <td><table width="550" border="0" cellspacing="0" cellpadding="5"></td></tr>
       <tr>
        <td>Assunto:</td>
        <td><label>
          <input id="cordoinput" type="text" name="assunto">
        </label></td>
      </tr>
      <tr>
        <td>Mensagem:</td>
        <td><label>
          <textarea id="cordoinput" type="text" name="msg" rows="10" cols="50"></textarea>
		</label></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input id="cordoinput" type="submit" name="post" value="POSTAR" />
        </label></td>
      </tr>
    </table>
  
</table>
</form><br>
</span></div></div>-->

<?php
//$res1 = mysqli_query($conecta, "SELECT * FROM `post` where us = '$row[id]' ORDER BY id DESC LIMIT 0 , 100");
// while($escrever1=mysqli_fetch_array($res1)){
//echo "<div id=\"cj\" style=\"margin-top: 4px;\"><a href=index.php?user&i1=1&i2=" . $escrever1['us'] . " class=link><span class=\"subtitulo\">" . $escrever1['usn'] . "</span></a>
//<a href=\"index.php?perfil&i1=2&i2=" . $escrever1['id'] . "\" class=\"botao\" align=\"right\">Apagar</a></div>
//<div id=\"fj\"><div id=\"ctj\"><span class=\"texto\">" . $escrever1['msg'] . "</span></div></div>";
//}
$contatos = $id;
echo "<div id=\"item\" style=\"margin-top: 6px; background: #ffffff; padding: 10px;\"><span class=\"texto\">
<form method=\"post\" action=\"\">
<textarea id=\"cordoinput\" type=\"text\" name=\"msg\" rows=\"5\" cols=\"50\"></textarea>
<input id=\"cordoinput\" type=\"submit\" name=\"post\" value=\"Postar\">
</form>
</span></div>";
include ("engine/postagem.php");
?>