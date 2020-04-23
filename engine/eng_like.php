<?php

$date = date("Y-m-d H:m:s");
include "../engine/conexao.php"; 
include "../engine/protege.php";
$tip = $_GET['tip'];
$idu = $_GET['id'];
$like = $_GET['like'];






if($tip == "pus"){
	$csql = mysqli_query($conecta, "select * from gostar where id_us = '$id' and id_post = '$idu';");
	if(mysqli_num_rows($csql) > 0){
		$insert = mysqli_query($conecta, "update gostar set gostei = '$like', data = '$date' where id_post = '$idu' and id_us = '$id'");
		if($insert){ echo "ok"; }else{ echo "error"; }
	} else {
		$insert = mysqli_query($conecta, "insert into gostar (id_post, id_us, gostei, data) values('$idu', '$id', '$like', '$date')");
		if($insert){ echo "ok"; }else{ echo "error"; }
	}
}

if($tip == "par"){
	$csql = mysqli_query($conecta, "select * from gostar_ar where id_us = '$id' and id_post = '$idu';");
	if(mysqli_num_rows($csql) > 0){
		$insert = mysqli_query($conecta, "update gostar_ar set gostei = '$like', data = '$date' where id_post = '$idu' and id_us = '$id'");
		if($insert){ echo "ok"; }else{ echo "error"; }
	} else {
		$insert = mysqli_query($conecta, "insert into gostar_ar (id_post, id_us, gostei, data) values('$idu', '$id', '$like', '$date')");
		if($insert){ echo "ok"; }else{ echo "error"; }
	}
}



if($tip == "rpus"){
	$csql = mysqli_query($conecta, "select * from gostar where id_us = '$id' and id_repost = '$idu';");
	if(mysqli_num_rows($csql) > 0){
		$insert = mysqli_query($conecta, "update gostar set gostei = '$like', data = '$date' where id_repost = '$idu' and id_us = '$id'");
		if($insert){ echo "ok"; }else{ echo "error"; }
	} else {
		$insert = mysqli_query($conecta, "insert into gostar (id_repost, id_us, gostei, data) values('$idu', '$id', '$like', '$date')");
		if($insert){ echo "ok"; }else{ echo "error"; }
	}
}

if($tip == "rpar"){
	$csql = mysqli_query($conecta, "select * from gostar_ar where id_us = '$id' and id_repost = '$idu';");
	if(mysqli_num_rows($csql) > 0){
		$insert = mysqli_query($conecta, "update gostar_ar set gostei = '$like', data = '$date' where id_repost = '$idu' and id_us = '$id'");
		if($insert){ echo "ok"; }else{ echo "error"; }
	} else {
		$insert = mysqli_query($conecta, "insert into gostar_ar (id_repost, id_us, gostei, data) values('$idu', '$id', '$like', '$date')");
		if($insert){ echo "ok"; }else{ echo "error"; }
	}
}


