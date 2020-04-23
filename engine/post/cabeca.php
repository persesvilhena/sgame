<?php


////////////////////////////////////////CADASTRA UM POST
if(isset($_POST["post"])) { 
	if(!empty($_POST["msg"])) {
		$msg = $class->antisql($_POST["msg"]);
		if(isset($_GET['foto'])){$foto = $class->antisql($_GET['foto']);} else {$foto = null;}
		if(isset($_GET['arquivo'])){$arquivo = $class->antisql($_GET['arquivo']);} else {$arquivo = null;}
		$insert = mysqli_query($conecta, "insert into post (id_us, msg, foto, arquivo, data) values ('$row[id]', '$msg', '$foto', '$arquivo', '$date');") or die(mysqli_error());
		if($insert) {
			echo "<script>window.location='" . $pagina . "';</script>";
		}	
	}
	else {
		echo "<script>alert('Erro, campo em branco');window.location='" . $pagina . "';</script>";
	}		
}


////////////////////////////////////CADASTRA UM REPOST
if(isset($_POST["repost"])) {
	if(!empty($_POST["idpost"]) && !empty($_POST["msg"])) {
		$id_post = $class->antisql($_POST["idpost"]);
		$msg = $class->antisql($_POST["msg"]);
		$insert = mysqli_query($conecta, "insert into repost (id_post, id_us, msg, data) values('$id_post', '$id', '$msg', '$date')");
		if($insert){ 
			echo "<script>window.location='" . $pagina . "'</script>"; 
		} else {
			echo "<script>alert('Houve um problema!');window.location='" . $pagina . "'</script>";
		}
	}else { echo "<script>alert('Houve um problema!');window.location='" . $pagina . "'</script>"; }
}



////////////////////////////////////////ADICIONA OU EXCLUI O GOSTAR
if($p1 == 2){
	$csql = mysqli_query($conecta, "select * from gostar where id_us = '$id' and id_post = '$p2';");
	if(mysqli_num_rows($csql) > 0){
		$insert = mysqli_query($conecta, "update gostar set gostei = '$p3', data = '$date' where id_post = '$p2' and id_us = '$id'");
		if($insert){ echo "<script>window.location='" . $pagina . "';</script>"; }else{ echo "<script>alert('error');window.location='" . $pagina . "';</script>"; }
	} else {
		$insert = mysqli_query($conecta, "insert into gostar (id_post, id_us, gostei, data) values('$p2', '$id', '$p3', '$date')");
		if($insert){ echo "<script>window.location='" . $pagina . "';</script>"; }else{ echo "<script>alert('error');window.location='" . $pagina . "';</script>"; }
	}
}


////////////////////////////////////////ADICIONA OU EXCLUI O NAO GOSTAR
if($p1 == 3){
	$csql = mysqli_query($conecta, "select * from gostar where id_us = '$id' and id_repost = '$p2';");
	if(mysqli_num_rows($csql) > 0){
		$insert = mysqli_query($conecta, "update gostar set gostei = '$p3', data = '$date' where id_repost = '$p2' and id_us = '$id'");
		if($insert){ echo "<script>window.location='" . $pagina . "';</script>"; }else{ echo "<script>alert('error');window.location='" . $pagina . "';</script>"; }
	} else {
		$insert = mysqli_query($conecta, "insert into gostar (id_repost, id_us, gostei, data) values('$p2', '$id', '$p3', '$date')");
		if($insert){ echo "<script>window.location='" . $pagina . "';</script>"; }else{ echo "<script>alert('error');window.location='" . $pagina . "';</script>"; }
	}
}



///////////////////////////////////////APAGA UM POST
if($p1 == 4){
	$sql2 = mysqli_query($conecta, "SELECT * FROM post WHERE id = '$p2' and id_us = '$id';");
	$res2 = mysqli_fetch_array($sql2);
	$vnum = $res2['id_us'];
	if($vnum == $row['id']){
		$csql4 = mysqli_query($conecta, "DELETE FROM post WHERE id='$p2' and id_us = '$id'");
		$csql4 = mysqli_query($conecta, "DELETE FROM repost WHERE id_post = '$res2[id]'");
		if($csql4) {
			echo "<script>alert('Postagem apagada com sucesso!');window.location='" . $pagina . "';</script>";
		}
		else {
			echo "<script>alert('Houve um problema!');window.location='" . $pagina . "';</script>";
		}
	}
}



///////////////////////////////APAGA UM REPOST
if($p1 == 5){
$ver_ar_us = mysqli_query($conecta, "SELECT * FROM repost WHERE id = '$p2'");
$r_ver_ar_us = mysqli_fetch_array($ver_ar_us);
if($r_ver_ar_us['id_us'] != null){
	$sql2 = mysqli_query($conecta, "SELECT * FROM repost WHERE id = '$p2' and id_us = '$id';");
	$res2 = mysqli_fetch_array($sql2);
	$vnum = $res2['id_us'];
	if($vnum == $row['id']){
		$csql4 = mysqli_query($conecta, "DELETE FROM repost WHERE id='$p2' and id_us = '$id'");
		if($csql4) {
			echo "<script>alert('Postagem apagada com sucesso!');window.location='" . $pagina . "';</script>";
		}
		else {
			echo "<script>alert('Houve um problema!');window.location='" . $pagina . "';</script>";
		}
	}
}
}


/////////////////////////////ALTERA UM POST
if($p1 == 6){
	$sql2 = mysqli_query($conecta, "SELECT * FROM post WHERE id = '$p2' and id_us = '$id';");
	$res2 = mysqli_fetch_array($sql2);
	$vnum = $res2['id_us'];
	if($vnum == $row['id']){
		if(isset($_POST["alterapost"])) {
			if(!empty($_POST["msg"])) {
				$msg = $class->antisql($_POST["msg"]);
				$csql4 = mysqli_query($conecta, "update post set msg = '$msg' WHERE id='$p2' and id_us = '$id'");
				if($csql4) {
					echo "<script>alert('Postagem alterada com sucesso!');window.location='" . $pagina . "';</script>";
				}
				else {
					echo "<script>alert('Houve um problema!');window.location='" . $pagina . "';</script>";
				}
			}
		}
	}
}



///////////////////////////ALTERA UM REPOST
if($p1 == 7){
$ver_ar_us = mysqli_query($conecta, "SELECT * FROM repost WHERE id = '$p2'");
$r_ver_ar_us = mysqli_fetch_array($ver_ar_us);
if($r_ver_ar_us['id_us'] != null){
	$sql2 = mysqli_query($conecta, "SELECT * FROM repost WHERE id = '$p2' and id_us = '$id';");
	$res2 = mysqli_fetch_array($sql2);
	$vnum = $res2['id_us'];
	if($vnum == $row['id']){
		if(isset($_POST["alterarepost"])) {
			if(!empty($_POST["msg"])) {
				$msg = $class->antisql($_POST["msg"]);
				$csql4 = mysqli_query($conecta, "update repost set msg = '$msg' WHERE id='$p2' and id_us = '$id'");
				if($csql4) {
					echo "<script>alert('Postagem alterada com sucesso!');window.location='" . $pagina . "';</script>";
				}
				else {
					echo "<script>alert('Houve um problema!');window.location='" . $pagina . "';</script>";
				}
			}
		}
	}
}
}






$i = 0;
$e = 0;

?>