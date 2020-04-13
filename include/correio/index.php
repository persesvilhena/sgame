<?php













if ($i1 == 1){
echo "<div id=\"cj\"><span class=\"titulo\">Conversas Recebidas:</span></div>";
echo "<div id =\"fj\"><div id =\"ctj\">";
$res = mysql_query("SELECT * FROM `msg` WHERE `paraid` LIKE '$id' ORDER BY id DESC;"); 
echo "<div class=\"tabela1\"><table><tr><td>Assunto:</td><td width=250>Remetente:</td><td width=70>Apagar?</td></tr>";
 while($escrever=mysql_fetch_array($res)){
	$csql = mysql_query("SELECT * FROM user WHERE id='$escrever[deid]'");
	$rsql = mysql_fetch_array($csql);
 echo "<tr><td><a href=index.php?msg&i1=2&i2=" . $escrever['id'] . " class=classe1>" . $escrever['titulo'] . "</a>"; 
if ($escrever['nw'] == 1 && $escrever['nwus'] != $id){ echo "<font color=\"#ff0000\"> (novo)</font>"; }
if ($escrever['nw'] == 1 && $escrever['nwus'] == $id){ echo "<font color=\"#ff0000\"> (não lido)</font>"; }
 echo"</td><td><a href=\"index.php?user&i1=1&i2=" . $escrever['deid'] . "\" class=classe1>" . $rsql['nome'] . " " . $rsql['sobrenome'] . "</a></td><td><a href=index.php?msg&i1=3&i2=" . $escrever['id'] . " class=classe1>Apagar?</a></td></tr>";
}
echo "</table></div>"; 
echo "</div></div><br>";

echo "<div id=\"cj\"><span class=\"titulo\">Conversas Enviadas:</span></div>";
echo "<div id =\"fj\"><div id =\"ctj\">";
$res2 = mysql_query("SELECT * FROM `msg` WHERE `deid` LIKE '$id' ORDER BY id DESC;"); 
echo "<div class=\"tabela1\"><table><tr><td>Assunto:</td><td width=250>Destinatário:</td><td width=70>Apagar?</td></tr>";
 while($escrever2=mysql_fetch_array($res2)){
	$csql2 = mysql_query("SELECT * FROM user WHERE id='$escrever2[deid]'");
	$rsql2 = mysql_fetch_array($csql2);
 echo "<tr><td><a href=index.php?msg&i1=2&i2=" . $escrever2['id'] . " class=classe1>" . $escrever2['titulo'] . "</a>";
if ($escrever2['nw'] == 1 && $escrever2['nwus'] != $id){ echo "<font color=\"#ff0000\"> (novo)</font>"; }
if ($escrever2['nw'] == 1 && $escrever2['nwus'] == $id){ echo "<font color=\"#ff0000\"> (não lido)</font>"; }
	$csql_des = mysql_query("select nome, sobrenome from user where id = '$escrever2[paraid]'");
	$rsql_des = mysql_fetch_array($csql_des);
  echo"</td><td><a href=\"index.php?user&i1=1&i2=" . $escrever2['paraid'] . "\" class=classe1>" . $rsql_des['nome'] . " " . $rsql_des['sobrenome'] . "</a></td><td><a href=index.php?msg&i1=3&i2=" . $escrever2['id'] . " class=classe1>Apagar?</a></td></tr>";
}
echo "</table></div>"; 
echo "</div></div>";
}


















if ($i1 == 2){
	$csql2 = mysql_query("SELECT * FROM msg WHERE id='$i2'");
	$rsql2 = mysql_fetch_array($csql2);
	$csql = mysql_query("select * from user where id = '$rsql2[deid]'");
	$rsql = mysql_fetch_array($csql);

	if($rsql2['deid'] == $id || $rsql2['paraid'] == $id){
		if ($rsql2['nwus'] != $id){
			$nwup = mysql_query("update msg set nw = '0' WHERE id='$i2'");
		}
		$datatempo2 = explode(" ", $rsql2['data']);
		$dat2 = explode("-", $datatempo2[0]);
		echo "<span class=\"titulo\">" . $rsql2['titulo'] . "</span> <span class=\"texto10\">
		" . $dat2[2] . "/" . $dat2[1] . "/" . $dat2[0] . " " . $datatempo2[1] . "</span><hr size=\"1\" color=\"#cccccc\">";

		$mensagem_erro = "";
		if(isset($_POST["msg"])) {
			if(!empty($_POST["msg"])) { 
				$msg = $class->antisql($_POST["msg"]);
				$insert = mysql_query("insert into rmsg (deid, idpert, msg, data) values('$row[id]', '$i2', '$msg', '$date');") or die(mysql_error());
				$insert = mysql_query("update msg set nw  = '1', nwus = '$row[id]' where id = '$i2';") or die(mysql_error());
			if($insert) { $mensagem_erro = "<b>Mensagem enviada!</b>";}
			}else { $mensagem_erro = "<b>Por favor, preencha os campos corretamente!</b>";}		
		}
		echo "<span class=\"texto\"><center>

		<form method=\"post\" action=\"\">
		<textarea id=\"msg\" type=\"text\" name=\"msg\" rows=\"5\" cols=\"70\" class=\"item\" onkeydown=\"areaEnvia(this, event);\"></textarea>
		<input id=\"cordoinput\" type=\"submit\" name=\"ok\" value=\"POSTAR\" />
		</form>

		</center></span><hr size=\"1\" color=\"#cccccc\">";

		$res5 = mysql_query("SELECT * FROM `rmsg` WHERE idpert = '$i2' ORDER BY id DESC;");
		while($escrever5=mysql_fetch_array($res5)){
			$csql5 = mysql_query("SELECT * FROM user WHERE id='$escrever5[deid]'");
			$rsql5 = mysql_fetch_array($csql5);
			if($row['id'] == $escrever5['deid']){$align = "right"; }else{$align = "left";}
			$datatempo = explode(" ", $escrever5['data']);
			$dat = explode("-", $datatempo[0]);
			echo "<div id=\"item\" style=\"min-height: 50px; margin-top: 6px; padding: 5px; background: #ffffff;\" align=\"" . $align . "\">
			<a href=\"index.php?user&i1=1&i2=" . $escrever5['deid'] . "\"><img src=\"fotos/" . $rsql5['foto'] . "\" width=\"50\" height=\"50\" align=\"" . $align . "\"></a>
			<span class=texto10>" . $dat[2] . "/" . $dat[1] . "/" . $dat[0] . " " . $datatempo[1] . " </span>
			<br><span class=\"texto\">" . $escrever5['msg'] . "</span></div>";
		}
		if($row['id'] == $rsql2['deid']){$align = "right"; }else{$align = "left";}
		echo "<div id=\"item\" style=\"min-height: 50px; margin-top: 6px; padding: 5px; background: #ffffff;\" align=\"" . $align . "\">
		 <a href=\"index.php?user&i1=1&i2=" . $rsql2['deid'] . "\"><img src=\"fotos/" . $rsql['foto'] . "\" width=\"50\" height=\"50\" align=\"" . $align . "\"></a>
		 <span class=texto10>" . $dat2[2] . "/" . $dat2[1] . "/" . $dat2[0] . " " . $datatempo2[1] . " </span>
		 <br><span class=\"texto\">" . $rsql2['msg'] . "</span></div>";

	}

}





















if ($i1 == 3){
$csql3 = mysql_query("SELECT * FROM msg WHERE id='$i2'");
$rsql3 = mysql_fetch_array($csql3);
if($rsql3['deid'] == $id || $rsql3['paraid'] == $id){
echo "<div id=\"cj\"><span class=\"titulo\">Apagar?</span></div>";
echo "<div id =\"fj\"><span class=\"texto\">Tem certeza que deseja apagar a mensagem " . $rsql3['titulo'] . " ? <a href=index.php?msg&i1=4&i2=" . $rsql3['id'] . " class=\"botao\">SIM</a> - <a href=index.php?msg&i1=1 class=\"botao\">NAO</a></div>";
}
}














if ($i1 == 4){
$csql2 = mysql_query("SELECT * FROM msg WHERE id='$i2'");
$rsql2 = mysql_fetch_array($csql2);
if($rsql2['deid'] == $id || $rsql2['paraid'] == $id){
$csql4 = mysql_query("DELETE FROM msg WHERE id='$i2'");
if($csql4) {
$msg_erro = "<script>alert('Mensagem apagada com sucesso!');window.location='index.php?msg&i1=1';</script>";
}
else {
$msg_erro = "<script>alert('Houve um erro!');window.location='index.php?msg&i1=1';</script>";
}
echo "<div id=cont>" . $msg_erro . "</div>";
}
}



















if ($i1 == 5){
$mensagem_erro = "";
if(isset($_POST["ok"])) { 
	if(!empty($_POST["msg"])) { 
		$titulo = $class->antisql($_POST["titulo"]);
		$msg = $class->antisql($_POST["msg"]);
    if($id == $i2){ echo "<script>alert('voce nao pode mandar mensagem para voce mesmo!');window.location='index.php?msg&i1=1';</script>"; }else{

		
			
			$insert = mysql_query("insert into msg (deid, paraid, titulo, msg, data, nw, nwus) values('$row[id]', '$i2', '$titulo', '$msg', '$date', '1', '$row[id]');") or die(mysql_error()); // Insiro os dados no BD
			
			if($insert) { // Verifico se a query foi executada com sucesso. Se sim, define mensagem de sucesso.
				
				$mensagem_erro = "<script>alert('Mensagem Enviada!');window.location='index.php?msg&i1=1';</script>";
			}
		}
		
	}
	else { // Se houver algum campo em branco, define mensagem de erro
	
		$mensagem_erro = "<script>alert('Por favor, preencha os campos corretamente!');window.location='index.php?msg&i1=1';</script>";
		
	}		
}

echo "<div id=\"cj\" style=\"margin-top: 4px;\"><span class=\"titulo\">Postar:</span></div>
<div id=\"fj\"><div id=\"ctj\"><span class=\"ttexto\">
<form method=\"post\" action=\"\">
<table width=\"600\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\">
  <tr>
    <td>" . $mensagem_erro . "</td>
  </tr>
  <tr>
    <td><table width=\"550\" border=\"0\" cellspacing=\"0\" cellpadding=\"5\"></td></tr>
	      <tr>
        <td>Titulo:</td>
        <td><label>
          <input id=\"cordoinput\" type=\"text\" name=\"titulo\">
		</label></td>
      </tr>
      <tr>
        <td>Mensagem:</td>
        <td><label>
          <textarea id=\"cordoinput\" type=\"text\" name=\"msg\" rows=\"10\" cols=\"50\"></textarea>
		</label></td>
      </tr>
      <tr>
        <td>&nbsp;</td>
        <td><label>
          <input id=\"cordoinput\" type=\"submit\" name=\"ok\" value=\"POSTAR\" />
        </label></td>
      </tr>
    </table>
  
</table>
</form>
<br>
</span></div></div>";


}
?>