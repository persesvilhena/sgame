<?php
$verperfil = mysqli_query($conecta, "SELECT * FROM perfil WHERE id='$row[id]'");
if (mysqli_num_rows($verperfil) == 0){
mysqli_query($conecta, "insert into perfil values($row[id],null,null,null,null,null,null,null,null,null)");
}
$mensagem_erro = "";
if(isset($_POST["cadastrar"])) { 	
    if($_POST['data_nasc'] <> null){$data_nasc = $class->antisql($_POST['data_nasc']);} else {$data_nasc = "0000-00-00";}
//$data_nasc = $class->antisql($_POST["data_nasc"]);
$telefone = $class->antisql($_POST["telefone"]); 
$telefone2 = $class->antisql($_POST["telefone2"]); 
$descricao1 = $class->antisql($_POST["descricao1"]);
$descricao2 = $class->antisql($_POST["descricao2"]);
$cidade = $class->antisql($_POST["cidade"]);
$estado = $class->antisql($_POST["estado"]);
$regiao = $class->antisql($_POST["regiao"]);
$pais = $class->antisql($_POST["pais"]);

$insert = mysqli_query($conecta, "update perfil set data_nasc = '$data_nasc', telefone = '$telefone', telefone2 = '$telefone2', descricao1 = '$descricao1', descricao2 = '$descricao2', descricao1 = '$descricao1', cidade = '$cidade', estado = '$estado', regiao = '$regiao', pais = '$pais' where id = '$id';") or die(mysqli_error());
if($insert) {
	$mensagem_erro = "<script>alert('Dados alterados com sucesso!');window.location='index.php?perfil';</script>";
}		
}
?>
<div id="cj"><span class="titulo">Alterar Dados:</span></div>
<div id="fj">
<form method="post" action="<?php $PHP_SELF; ?>">
<table width="600" border="0" cellspacing="0" cellpadding="5">
  <tr>
    <td><?php echo $mensagem_erro; ?></td>
  </tr>
  <tr>
    <td><table width="550" border="0" cellspacing="0" cellpadding="5"></td></tr>
      <tr>
        <td>Data de Nascimento:</td>
        <td><label>
          <input id="cordoinput" type="text" name="data_nasc" value="<?php echo $row2["data_nasc"]; ?>" />
		</label></td>
      </tr>
      <tr>
        <td>Telefone:</td>
        <td><label>
          <input id="cordoinput" type="text" name="telefone" value="<?php echo $row2["telefone"]; ?>" />
		</label></td>
      </tr>
      <tr>
        <td>Telefone2:</td>
        <td><label>
          <input id="cordoinput" type="text" name="telefone2" value="<?php echo $row2["telefone2"]; ?>" />
		</label></td>
      </tr>
      <tr>
        <td>Descricao1:</td>
        <td><label>
          <textarea id="cordoinput" type="text" name="descricao1" rows="10" cols="80"><?php echo $row2["descricao1"]; ?></textarea>
		</label></td>
      </tr>
	        <tr>
        <td>Descricao2:</td>
        <td><label>
          <textarea id="cordoinput" type="text" name="descricao2" rows="10" cols="80"><?php echo $row2["descricao2"]; ?></textarea>
		</label></td>
      </tr>
	        <tr>
        <td>Cidade:</td>
        <td><label>
          <input id="cordoinput" type="text" name="cidade" value="<?php echo $row2["cidade"]; ?>" />
		</label></td>
      </tr>
	        <tr>
        <td>Estado:</td>
        <td><label>
          <input id="cordoinput" type="text" name="estado" value="<?php echo $row2["estado"]; ?>" />
		</label></td>
      </tr>
	        <tr>
        <td>Regiao:</td>
        <td><label>
          <input id="cordoinput" type="text" name="regiao" value="<?php echo $row2["regiao"]; ?>" />
		</label></td>
      </tr>
	        <tr>
        <td>País:</td>
        <td><label>
          <input id="cordoinput" type="text" name="pais" value="<?php echo $row2["pais"]; ?>" />
		</label></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input id="cordoinput" type="submit" name="cadastrar" value="OK" />
        </label></td>
      </tr>
    </table>
</table>
</form>
<a href="index.php?perfil" target="_top" class="classe1">Voltar</a>
</div>
