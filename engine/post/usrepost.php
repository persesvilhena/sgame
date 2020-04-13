<?php
if ($ar == 1){
	$linkdo1 = 15;
	$linkdo2 = 17;
	$linkdo3 = 13;
} else{
	$linkdo1 = 5;
	$linkdo2 = 7;
	$linkdo3 = 3;
}

$csqlus = mysql_query("select * from user where id = '$escrever3[id_us]';");
 		$rsqlus = mysql_fetch_array($csqlus);
 		$datatempo2 = explode(" ", $escrever3['data']);
		$dat2 = explode("-", $datatempo2[0]);
		$like2 = mysql_query("select * from $tabelagostar where id_repost = '$escrever3[id]' and gostei = '1'");
		$rlike2 = mysql_num_rows($like2);
		$nlike2 = mysql_query("select * from $tabelagostar where id_repost = '$escrever3[id]' and gostei = '0'");
		$rnlike2 = mysql_num_rows($nlike2);
		echo "<div style=\"min-height: 40px; position: static;\">
		<div style=\"right: 0px; position: absolute;\">
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe4\" onclick=\"CarregaDadosJanela('" . $escrever3['id'] . "','remenu_us');\"><img src=\"engine/imgs/showmenu.png\"></a>
		<!--<a href=\"#rmenu" . $i . "\" name=\"abremenu\" class=\"classe4\"><img src=\"engine/imgs/showmenu.png\"></a>-->
		</div>
		<div style=\"margin-right: 30px;\">
		<span class=\"textoinfo\">
		
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $escrever3['id_us'] . "','us');\"><img src=\"fotos/min/" . $rsqlus['foto'] . "\" width=\"35\" height=\"35\" align=\"left\" class=\"pr1\"></a>
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $escrever3['id_us'] . "','us');\">" . $rsqlus['nome'] . " " . $rsqlus['sobrenome'] . "</a>

		<a href=\"#\" class=\"classe4\" onclick=\"BtnLike('" . $rp . "','" . $escrever3['id'] . "','1');\" id=\"" . $rp . $escrever3['id'] . "1\"><img src=\"engine/imgs/like.png\"></a> 
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $escrever3['id'] . "','" . $btn . "like2');\">(" . $rlike2 . ")</a>

		<a href=\"#\" class=\"classe4\" onclick=\"BtnLike('" . $rp . "','" . $escrever3['id'] . "','0');\" id=\"" . $rp . $escrever3['id'] . "0\"><img src=\"engine/imgs/nlike.png\"></a> 
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $escrever3['id'] . "','" . $btn . "nlike2');\">(" . $rnlike2 . ")</a>

		</span>";
		echo "<br><span class=\"texto\">" . $escrever3['msg'] . "</span></div>";
		echo "
		<div id=\"boxes\">
		<div id=\"rgostou" . $i . "\" class=\"window\">
		<div align=\"right\">
		<a href=\"#rgostou" . $i . "\" name=\"fechamenu\" class=\"classe4\"><img src=\"engine/imgs/cancela.png\"></a>
		</div>";
		while($rrlike2 = mysql_fetch_array($like2)){
			$csqlrlk2 = mysql_query("select * from user where id = '$rrlike2[id_us]'");
			$rsqlrlk2 = mysql_fetch_array($csqlrlk2);
			$datatempo3 = explode(" ", $rrlike2['data']);
			$dat3 = explode("-", $datatempo3[0]);
			echo "
			<div style=\"min-height: 50px; margin-top: 5px;\">
			<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $rsqlrlk2['id'] . "','us');\"><img src=\"fotos/min/" . $rsqlrlk2['foto'] . "\" width=\"50\" height=\"50\" align=\"left\" class=\"pr1\"></a>
			<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $rsqlrlk2['id'] . "','us');\">" . $rsqlrlk2['nome'] . " " . $rsqlrlk2['sobrenome'] . "</a><br>
			<span class=textoinfo>" . $dat3[2] . "/" . $dat3[1] . "/" . $dat3[0] . " " . $datatempo3[1] . " 
			</div>

			";
		}
		echo "
		</div>
  		</div>


  		<div id=\"boxes\">
		<div id=\"rngostou" . $i . "\" class=\"window\">
		<div align=\"right\">
		<a href=\"#rngostou" . $i . "\" name=\"fechamenu\" class=\"classe4\"><img src=\"engine/imgs/cancela.png\"></a>
		</div>";
		while($rrnlike2 = mysql_fetch_array($nlike2)){
			$csqlrnlk2 = mysql_query("select * from user where id = '$rrnlike2[id_us]'");
			$rsqlrnlk2 = mysql_fetch_array($csqlrnlk2);
			$datatempo4 = explode(" ", $rrnlike2['data']);
			$dat4 = explode("-", $datatempo4[0]);
			echo "
			<div style=\"min-height: 50px; margin-top: 5px;\">
			<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $rsqlrnlk2['id'] . "','us');\"><img src=\"fotos/min/" . $rsqlrnlk2['foto'] . "\" width=\"50\" height=\"50\" align=\"left\" class=\"pr1\"></a>
			<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $rsqlrnlk2['id'] . "','us');\">" . $rsqlrnlk2['nome'] . " " . $rsqlrnlk2['sobrenome'] . "</a><br>
			<span class=textoinfo>" . $dat4[2] . "/" . $dat4[1] . "/" . $dat4[0] . " " . $datatempo4[1] . " 
			</div>

			";
		}
		echo "
		</div>
  		</div>
  		

  		<div id=\"boxes\">
		<div id=\"rmenu" . $i . "\" class=\"window\">
		<div align=\"right\">
		<a href=\"#rmenu" . $i . "\" name=\"fechamenu\" class=\"classe4\"><img src=\"engine/imgs/cancela.png\"></a>
		</div><center>
				<span class=textoinfo>" . $dat2[2] . "/" . $dat2[1] . "/" . $dat2[0] . " " . $datatempo2[1] . " ";
		if($escrever3['id_us'] == $id){
			echo "<br>
			<input id=\"cordoinput\" type=\"button\" value=\"Alterar\" onClick=\"ocmenualt('" . $i . "')\">
			<input id=\"cordoinput\" type=\"button\" value=\"Apagar\" onClick=\"ocmenuapa('" . $i . "')\">";
		}

		echo "
		</center>
		</span>
		<div id=\"roalterar" . $i . "\" style=\"display: none;\">";
		echo "<form action=\"" . $pagina . "&p1=" . $linkdo2 . "&p2=" . $escrever3['id'] . "\" method=\"post\">
			<textarea id=\"cordoinput\" name=\"msg\" type=\"text\">" . $escrever3['msg'] . "</textarea>
			<input id=\"cordoinput\" name=\"alterarepost\" type=\"submit\" value=\"Alterar\">
			</form>";
		echo "
		</div>
		<div id=\"roapagar" . $i . "\" style=\"display: none;\">
		<center><span class=\"texto\">Você realmente deseja apagar o comentário?</span><br><br>
		<a href=\"" . $pagina . "&p1=" . $linkdo1 . "&p2=" . $escrever3['id'] . "\" class=\"classe4\"><img src=\"engine/imgs/ok.png\"></a> 
		<a href=\"#\" class=\"close\"><img src=\"engine/imgs/cancela.png\"></a>
		</center>
		</div>

		</div>
  		</div>



  		</div>

  		";
?>