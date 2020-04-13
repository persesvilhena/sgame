<?php
//$server = $_SERVER['SERVER_NAME'];

$endereco = $_SERVER ['REQUEST_URI'];

//echo "<br>server:<br>"  . $server . "<br>end:<br>" . $endereco . "<br><div style=\"clear: both;\"></div>";

if(isset($_GET["index"]) || $endereco == "/" || $endereco == "/index.php") {
$pagina = "index.php?index&p4=" . $p4;
include "include/index/index.php";
$titulopag = "Sgame - Home";	
}


if(isset($_GET["mural"])) {
$pagina = "index.php?mural";
include "include/index/mural.php";
$titulopag = "Sgame - Mural";	
}


if(isset($_GET["perfil"])) {
$pagina = "index.php?perfil";
include "include/perfil/index.php";
$titulopag = "Sgame - Perfil";	
}


if(isset($_GET["perfilalterar"])) {
include "include/perfil/alterar.php";
$titulopag = "Sgame - Perfil";	
}


if(isset($_GET["perfilalterar2"])) {
include "include/perfil/alterar2.php";
$titulopag = "Sgame - Perfil";	
}


if(isset($_GET["msg"])) {
include "include/correio/index.php";
$titulopag = "Sgame - Mensagens";	
}


if(isset($_GET["contatos"])) {
$pagina = "contatos";
include "include/contatos/index.php";
$titulopag = "Sgame - Contatos";	
}


if(isset($_GET["user"])) {
$pagina = "index.php?user&i1=1&i2=" . $i2;
include "include/user/index.php";
$titulopag = "Sgame - User";	
}


if(isset($_GET["allusers"])) {
include "include/user/all.php";
$titulopag = "Sgame - Users";	
}


if(isset($_GET["links"])) {
include "include/links/index.php";
$titulopag = "Sgame - Links";	
}


if(isset($_GET["config"])) {
include "include/index/config.php";
$titulopag = "Sgame - Configuração";	
}


if(isset($_GET["rank"])) {
$pagina = "index.php?rank";
include "include/rank/index.php";
$titulopag = "Sgame - Rank";	
}


if(isset($_GET["book"])) {
$pagina = "index.php?book";
include "include/index/book.php";
$titulopag = "Sgame - Livro Das Cartas";	
}


if(isset($_GET["buscar"])) {
$pagina = "index.php?buscar";
include "include/buscar/index.php";
$titulopag = "Sgame - Buscar";	
}


if(isset($_GET["battle"])) {
$pagina = "index.php?battle";
include "include/index/battle.php";
$titulopag = "Sgame - Batalhas";	
}


if(isset($_GET["relatorio"])) {
$pagina = "index.php?relatorio";
include "include/index/relatorio.php";
$titulopag = "Sgame - Relatórios";	
}



if(isset($_GET["admin"])) {
$pagina = "index.php?admin";
include "include/index/admin.php";
$titulopag = "Administração";	
}



if(isset($_GET["sobre"])) {
$pagina = "index.php?sobre";
include "include/index/sobre.php";
$titulopag = "Sgame - Sobre o Jogo";	
}


if(isset($_GET["perses"])) {
echo "

<a href=\"#pfdialog\" name=\"pfmodal\" class=\"botao\" onclick=\"setDetails('\"var1=teste&var2=var2&var3=var3\"');centraliza('pfdialog');\">botao</a></div>

<div id=\"testedeajax\"></div>


<br>" . $user->login . "
 ";
}

if(isset($_GET["perses1"])) {
/*	$socket = fsockopen('udp://a.st1.ntp.br', 123, $err_no, $err_str, 1);
	if ($socket)
	{
	    if (fwrite($socket, chr(bindec('00'.sprintf('%03d', decbin(3)).'011')).str_repeat(chr(0x0), 39).pack('N', time()).pack("N", 0)))
	    {
	        stream_set_timeout($socket, 1);
	        $unpack0 = unpack("N12", fread($socket, 48));
	        echo date('Y-m-d H:i:s', $unpack0[7]);
	    }

	    fclose($socket);
	}
*/

$timestamp = mktime(date("H")-3, date("i"), date("s"), date("m"), date("d"), date("Y"));
echo $timestamp;
$dataAtual = gmdate("d-m-Y-H-i-s", $timestamp);
echo"teste<br>";
echo returnData(555);
$dataFuturo = returnData(86399);
$datteste = $dataFuturo - $timestamp;
echo "<br>" . $datteste . "<br>";
echo gmdate("H:i:s", $datteste);


//$dat = explode("-", $dataFuturo);
//$dat1 = explode("-", $dataAtual);

//echo"<br>" . (($dat[0]) - ($dat1[0])) . "/" . (($dat[1]) - ($dat1[1])) . "/" . (($dat[2]) - ($dat1[2])) . " " . (($dat[3]) - ($dat1[3])) . ":" . (($dat[4]) - ($dat1[4])) . ":" . (($dat[5]) - ($dat1[5])) . "<br>";


}




?>
<div style="clear: both;"></div>
<br>
<div style="height: 100px;"></div>