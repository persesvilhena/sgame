<?php
include "../engine/conexao.php"; 
include "../engine/functions.php";
include "../engine/protege.php";

if(isset($_POST['i1'])){$i1 = $class->antisql($_POST['i1']);} else {$i1 = null;}
if(isset($_POST['i2'])){$i2 = $class->antisql($_POST['i2']);} else {$i2 = null;}
if(isset($_POST['i3'])){$i3 = $class->antisql($_POST['i3']);} else {$i3 = null;}
if(isset($_POST['i4'])){$i4 = $class->antisql($_POST['i4']);} else {$i4 = null;}

$horadoservidor = mktime(date("H")-3, date("i"), date("s"), date("m"), date("d"), date("Y"));

if($i1 == 1){
	echo gmdate("d/m/Y H:i:s", $horadoservidor);
}


if($i1 == 2){
	$dataresultante = $i2 - $horadoservidor;
	if($dataresultante > 0){
		echo gmdate("H:i:s", $dataresultante);
	}else{
		echo "<a href=\"index.php?battle?i1=2\" class=\"linkus\">Vá para a batalha</a>";
	}
}



if($i1 == 3){
	$dataresultante = $i2 - $horadoservidor;
	if($dataresultante > 0){
		echo gmdate("H:i:s", $dataresultante);
	}else{
		echo "<a href=\"index.php?battle?i1=3\" class=\"linkus\">Vá para a batalha</a>";
	}
}


?>