<?php

$date = date("Y-m-d H:m:s");
include "../engine/conexao.php"; 
include "../engine/protege.php";
$tip = $_GET['tip'];
$idu = $_GET['id'];
$like = $_GET['like'];






if($tip == "pus"){
	$csql = mysql_query("select * from gostar where id_us = '$id' and id_post = '$idu';");
	if(mysql_num_rows($csql) > 0){
		$insert = mysql_query("update gostar set gostei = '$like', data = '$date' where id_post = '$idu' and id_us = '$id'");
		if($insert){ echo "ok"; }else{ echo "error"; }
	} else {
		$insert = mysql_query("insert into gostar (id_post, id_us, gostei, data) values('$idu', '$id', '$like', '$date')");
		if($insert){ echo "ok"; }else{ echo "error"; }
	}
}

if($tip == "par"){
	$csql = mysql_query("select * from gostar_ar where id_us = '$id' and id_post = '$idu';");
	if(mysql_num_rows($csql) > 0){
		$insert = mysql_query("update gostar_ar set gostei = '$like', data = '$date' where id_post = '$idu' and id_us = '$id'");
		if($insert){ echo "ok"; }else{ echo "error"; }
	} else {
		$insert = mysql_query("insert into gostar_ar (id_post, id_us, gostei, data) values('$idu', '$id', '$like', '$date')");
		if($insert){ echo "ok"; }else{ echo "error"; }
	}
}



if($tip == "rpus"){
	$csql = mysql_query("select * from gostar where id_us = '$id' and id_repost = '$idu';");
	if(mysql_num_rows($csql) > 0){
		$insert = mysql_query("update gostar set gostei = '$like', data = '$date' where id_repost = '$idu' and id_us = '$id'");
		if($insert){ echo "ok"; }else{ echo "error"; }
	} else {
		$insert = mysql_query("insert into gostar (id_repost, id_us, gostei, data) values('$idu', '$id', '$like', '$date')");
		if($insert){ echo "ok"; }else{ echo "error"; }
	}
}

if($tip == "rpar"){
	$csql = mysql_query("select * from gostar_ar where id_us = '$id' and id_repost = '$idu';");
	if(mysql_num_rows($csql) > 0){
		$insert = mysql_query("update gostar_ar set gostei = '$like', data = '$date' where id_repost = '$idu' and id_us = '$id'");
		if($insert){ echo "ok"; }else{ echo "error"; }
	} else {
		$insert = mysql_query("insert into gostar_ar (id_repost, id_us, gostei, data) values('$idu', '$id', '$like', '$date')");
		if($insert){ echo "ok"; }else{ echo "error"; }
	}
}


