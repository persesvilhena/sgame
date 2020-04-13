<?php
$mensagem_erro = "";

if(isset($_POST["cadastrar"])) { 
	
	if(!empty($_POST["nome"]) && !empty($_POST["sobrenome"]) && !empty($_POST["email"])) { 
		
		$nome = $class->antisql($_POST["nome"]);
		$sobrenome = $class->antisql($_POST["sobrenome"]); 
		$email = $class->antisql($_POST["email"]); 

		
			
			$insert = mysql_query("update user set nome = '$nome', sobrenome = '$sobrenome', email = '$email' where id = '$id';") or die(mysql_error()); // Insiro os dados no BD
			
			if($insert) { // Verifico se a query foi executada com sucesso. Se sim, define mensagem de sucesso.
				
				$mensagem_erro = "<script>alert('Dados alterados com sucesso!');window.location='index.php?perfil';</script>";
			}
		
		
	}
	else { // Se houver algum campo em branco, define mensagem de erro
	
		$mensagem_erro = "<b>Por favor, preencha os campos corretamente!</b>";
		
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
        <td>Nome:</td>
        <td><label>
          <input id="cordoinput" type="text" name="nome" value="<?php echo $row["nome"]; ?>" />
		</label></td>
      </tr>
      <tr>
        <td>Sobrenome:</td>
        <td><label>
          <input id="cordoinput" type="text" name="sobrenome" value="<?php echo $row["sobrenome"]; ?>" />
		</label></td>
      </tr>
      <tr>
        <td>E-mail:</td>
        <td><label>
          <input id="cordoinput" type="text" name="email" value="<?php echo $row["email"]; ?>" />
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
