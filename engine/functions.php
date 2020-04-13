<?php
function user_logado (){
	if(!empty($_SESSION["login"]) && !empty($_SESSION["senha"]) && !empty($_SESSION["id"])){ 
		return "1";
	}else{
		return "0";
	}
}






//////////////////////////////////////funcao para retornar a data e hora atual com adicao de uma entrada de segundos
function returnData($timeseg){
	/*if($timeseg < 60){
		$timesegdia = 0;
		$timeseghor = 0;
		$timesegmin = 0;
		$timesegseg = $timeseg;
	}else{
		if($timeseg >= 60 && $timeseg < 3600){
			$timesegdia = 0;
			$timeseghor = 0;
			$timesegmin = $timeseg / 60;
			$timesegseg = $timeseg % 60;
		}else{
			if($timeseg >= 3600 && $timeseg < 86400){
				$timesegdia = 0;
				$timeseghor = $timeseg / 3600;
				$timesegmin = $timeseg / 60;
				$timesegseg = $timeseg % 60;
			}else{
				if($timeseg >= 86400){
					$timesegdia = $timeseg / 86400;
					$timeseghor = $timeseg / 3600;
					$timesegmin = $timeseg / 60;
					$timesegseg = $timeseg % 60;
				}
			}
		}
	}
	$timesegdia = floor($timesegdia);
	$timeseghor = floor($timeseghor);
	$timesegmin = floor($timesegmin);
	$timesegseg = floor($timesegseg);
	echo "<br>entrada de dias: " . $timesegdia . "<br>entrada de hrs: " . $timeseghor . "<br>entrada de min: " . $timesegmin . "<br>entrada de seg: " . $timesegseg . "<br>";*/
	/////////////////depois dessa num falo nada putaqpariuuuu
	$timestamp = mktime(date("H")-3, date("i"), date("s")+$timeseg, date("m"), date("d"), date("Y"));
	//return gmdate("d-m-Y-H-i-s", $timestamp);
	return $timestamp;
}
?>