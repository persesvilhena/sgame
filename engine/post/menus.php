<?php
echo"
	<div id=\"boxes\">
	<div id=\"gostou" . $e . "\" class=\"window\" style=\"margin-left: 55px;\">
	<div align=\"right\">
	<a href=\"#gostou" . $e . "\" name=\"fechamenu\" class=\"classe4\"><img src=\"engine/imgs/cancela.png\"></a>
	</div>";
	while($rrlike = mysqli_fetch_array($like)){
		$csqlrlk = mysqli_query($conecta, "select * from user where id = '$rrlike[id_us]'");
		$rsqlrlk = mysqli_fetch_array($csqlrlk);
		$datatempo5 = explode(" ", $rrlike['data']);
		$dat5 = explode("-", $datatempo5[0]);
		echo "
		<div style=\"min-height: 50px; margin-top: 5px;\">
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $rsqlrlk['id'] . "','us');\"><img src=\"fotos/min/" . $rsqlrlk['foto'] . "\" width=\"50\" height=\"50\" align=\"left\" class=\"pr1\"></a>
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $rsqlrlk['id'] . "','us');\">" . $rsqlrlk['nome'] . " " . $rsqlrlk['sobrenome'] . "</a><br>
		<span class=textoinfo>" . $dat5[2] . "/" . $dat5[1] . "/" . $dat5[0] . " " . $datatempo5[1] . " 
		</div>
		";
	}
	echo "
	</div>
  	</div>


  	<div id=\"boxes\">
	<div id=\"ngostou" . $e . "\" class=\"window\" style=\"margin-left: 55px;\">
	<div align=\"right\">
	<a href=\"#ngostou" . $e . "\" name=\"fechamenu\" class=\"classe4\"><img src=\"engine/imgs/cancela.png\"></a>
	</div>";
	while($rrnlike = mysqli_fetch_array($nlike)){
		$csqlrnlk = mysqli_query($conecta, "select * from user where id = '$rrnlike[id_us]'");
		$rsqlrnlk = mysqli_fetch_array($csqlrnlk);
		$datatempo6 = explode(" ", $rrnlike['data']);
		$dat6 = explode("-", $datatempo6[0]);
		echo "
		<div style=\"min-height: 50px; margin-top: 5px;\">
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"classe1\" onclick=\"CarregaDadosJanela('" . $rsqlrnlk['id'] . "','us');\"><img src=\"fotos/min/" . $rsqlrnlk['foto'] . "\" width=\"50\" height=\"50\" align=\"left\" class=\"pr1\"></a>
		<a href=\"#pfdialog\" name=\"pfmodal\" class=\"linkus\" onclick=\"CarregaDadosJanela('" . $rsqlrnlk['id'] . "','us');\">" . $rsqlrnlk['nome'] . " " . $rsqlrnlk['sobrenome'] . "</a><br>
		<span class=textoinfo>" . $dat6[2] . "/" . $dat6[1] . "/" . $dat6[0] . " " . $datatempo6[1] . "
		</div>

		";
	}
	echo "
	</div>
  	</div>
  		

  	<div id=\"boxes\">
	<div id=\"menu" . $e . "\" class=\"window\" style=\"margin-left: 55px;\">
	<div align=\"right\">
	<a href=\"#menu" . $e . "\" name=\"fechamenu\" class=\"classe4\"><img src=\"engine/imgs/cancela.png\"></a>
	</div>
	<center>
	<span class=textoinfo>" . $dat[2] . "/" . $dat[1] . "/" . $dat[0] . " " . $datatempo[1] . " ";
	if($escrever1['id_us'] == $id){
		echo "<br>
		<input id=\"cordoinput\" type=\"button\" value=\"Alterar\" onClick=\"pmenualt('" . $e . "')\">
		<input id=\"cordoinput\" type=\"button\" value=\"Apagar\" onClick=\"pmenuapa('" . $e . "')\">";
	}
	echo "
	</center>
	</span>
	<div id=\"palterar" . $e . "\" style=\"display: none;\">";
	echo "<form action=\"" . $pagina . "&p1=6&p2=" . $escrever1['id'] . "\" method=\"post\">
		<textarea id=\"cordoinput\" name=\"msg\" type=\"text\">" . $escrever1['msg'] . "</textarea>
		<input id=\"cordoinput\" name=\"alterapost\" type=\"submit\" value=\"Alterar\">
		</form>";
	echo "
	</div>
	<div id=\"papagar" . $e . "\" style=\"display: none;\">
	<center><span class=\"texto\">Você realmente deseja apagar o comentário?</span><br><br>
	<a href=\"" . $pagina . "&p1=4&p2=" . $escrever1['id'] . "\" class=\"classe4\"><img src=\"engine/imgs/ok.png\"></a> 
	<a href=\"#\" class=\"close\"><img src=\"engine/imgs/cancela.png\"></a></span></center>
	</div>
	</div>
	</div>
 	";
?>