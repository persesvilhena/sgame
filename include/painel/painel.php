
<div id="conteudo3" style="left: 0px; margin-top: 4px; width: 200px; text-align: justify;" align="center">
	<div style="position: relative; left: 2px; top: 2px; text-align: justify;" align="left">
		<img width="194" src="fotos/<?php echo "$row[foto]"; ?>" class="pr1"><br>
		<a href="index.php?perfil" class="classe1" target="_top"><?php echo $row["nome"]; ?> <?php echo $row["sobrenome"]; ?></a> - <a href="sair.php" class="classe1" target="_top">Sair</a><br>
		<hr size="1" width="182" color="#cccccc">
		<span class="titulo"><center>Menu Principal</center></span> <?php //echo $date; ?>
		<hr size="1" width="182" color="#cccccc">
		<a href="index.php?index" class="menu" target="_top"><img src="engine/imgs/globo.png" align="left">Home</a><br>
		<a href="index.php?battle" class="menu" target="_top"><img src="engine/imgs/battle.png" align="left">Batalhas</a><br>
		<a href="index.php?relatorio" class="menu" target="_top"><img src="engine/imgs/balao.png" align="left">Relatórios</a><br>
		<a href="index.php?book" class="menu" target="_top"><img src="engine/imgs/grade.png" align="left">Livro Das Cartas</a><br>
		<a href="index.php?mural" class="menu" target="_top"><img src="engine/imgs/lista.png" align="left">Mural</a><br>
		<a href="index.php?perfil" class="menu" target="_top"><img src="engine/imgs/user.png" align="left">Perfil</a><br>
		<a href="index.php?msg&i1=1" class="menu" target="_top"><img src="engine/imgs/mail.png" align="left">Mensagens
		<?php
		$cmensagem = mysql_query("select * from msg where (deid = '$id' or paraid='$id') and nw = '1' and nwus <> '$id'");
		$cont = 0;
		while($rmensagem = mysql_fetch_array($cmensagem)){
			$cont = $cont + 1;
		}
		if ($cont != 0){
			echo "<font color=\"#ff0000\">(" . $cont . ")</font>";
		}
		?></a><br>
		<a href="index.php?contatos" class="menu" target="_top"><img src="engine/imgs/team.png" align="left">Contatos</a>
		<!--<a href="index.php?team" class="menu" target="_top"><img src="engine/imgs/team.png" align="left">Time</a>-->
		<a href="index.php?rank" class="menu" target="_top"><img src="engine/imgs/estatisticas.png" align="left">Ranking</a><br>
		<a href="index.php?config" class="menu" target="_top"><img src="engine/imgs/config.png" align="left">Configurações</a><br>
		<a href="index.php?sobre" class="menu" target="_top"><img src="engine/imgs/about.png" width="20" height="20" align="left">Sobre</a><br>
		<?php
		if($row['adm'] == 1){
			echo "<a href=\"index.php?admin\" class=\"menu\" target=\"_top\"><img src=\"engine/imgs/config.png\" align=\"left\">Administração</a><br>";
		}
		?>
		<hr size="1" width="182" color="#cccccc"><div align="center"><span class="subtitulo"><?php echo $creditos; ?></span></div>
	</div>
</div>


<div id="conteudo3" style="left: 0px; margin-top: 4px; width: 200px; text-align: justify; padding-bottom: 5px;" align="center">
	<div style="position: relative; left: 2px; top: 2px; text-align: justify;" align="left">
		<span class="titulo"><center>Menu Links</center></span>
		<hr size="1" width="182" color="#cccccc">
		<a href="index.php?links" class="menu" target="_top"><img src="engine/imgs/globo.png" align="left">Home</a><br>
		<?php
		$res2 = mysql_query("SELECT * FROM links where id_us = '$id'");
 		while($escrever2=mysql_fetch_array($res2)){
 			echo "<a href=\"http://" . $escrever2['link'] . "\" class=\"menu\" target=\"_blank\"><img src=\"engine/imgs/direita.png\" align=\"left\">" . $escrever2['nome'] . "</a>";
		}
		?>
	</div>
</div>

