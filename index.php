<?php
include "engine/conexao.php"; 
include "engine/protege.php";
//date_default_timezone_set("Brazil/East");
include "engine/functions.php";
$server = $_SERVER['SERVER_NAME'];
$urldapag = $_SERVER['REQUEST_URI'];

if(isset($_GET['i1'])){$i1 = $class->antisql($_GET['i1']);} else {$i1 = null;}
if(isset($_GET['i2'])){$i2 = $class->antisql($_GET['i2']);} else {$i2 = null;}
if(isset($_GET['i3'])){$i3 = $class->antisql($_GET['i3']);} else {$i3 = null;}
if(isset($_GET['i4'])){$i4 = $class->antisql($_GET['i4']);} else {$i4 = null;}
if(isset($_GET['p1'])){$p1 = $class->antisql($_GET['p1']);} else {$p1 = null;}
if(isset($_GET['p2'])){$p2 = $class->antisql($_GET['p2']);} else {$p2 = null;}
if(isset($_GET['p3'])){$p3 = $class->antisql($_GET['p3']);} else {$p3 = null;}
if(isset($_GET['p4'])){$p4 = $class->antisql($_GET['p4']);} else {$p4 = null;}
if(isset($_GET['z1'])){$z1 = $class->antisql($_GET['z1']);} else {$z1 = null;}
if(isset($_GET['z2'])){$z2 = $class->antisql($_GET['z2']);} else {$z2 = null;}
if(isset($_GET['u'])){$u = $class->antisql($_GET['u']);} else {$u = null;}
if(isset($_POST['eurl'])){$eurl = $class->antisql($_POST['eurl']);} else {$eurl = null;}
?>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<script src="engine/js/jquery.js" type="text/javascript"></script>
<script src="engine/js/utils.js" type="text/javascript"></script>
<script src="engine/js/validation.js" type="text/javascript"></script>
<script src="engine/js/thumbnails.js" type="text/javascript"></script>
<script src="engine/js/script.js" type="text/javascript"></script>
<link rel="shortcut icon" href="engine/imgs/icon1.png">
<link rel="stylesheet" type="text/css" href="engine/css/style.css">

</head>
<body>

	<div id="pfmask"></div>

	<div id="barrasuperior" align="center" style="z-index: 999;">
		<div id="center">
			<img src="engine/imgs/logo.png" align="left" height="60" style="margin-top: 3px;">
			<div style="margin-left: 420px; height: 70px; width: 200px;" align="center">
				<form method="get" action="index.php?buscar">
					<input type="text" name="buscar" id="input1"><br>
					<button type="submit" id="input2"><img src="engine/imgs/procurar.png"></button>
				</form>
			</div>
			<div style="margin-left: 830px; height: 70px; width: 200px; margin-top: -85px;" align="center">
				<span class="info"><div id="relogiodosite"></div></span>
			</div>
		</div>
	</div>

	<div id="center" style="margin-top: 75px;">
		<div style="position: relative; left: 0px; top: 4px; width: 998px; text-align: justify;" align="left">
			<?php $nome = $row['nome']; ?>
			<?php $date = date("Y-m-d H:m:s"); ?>
			<?php include "include/painel/painel.php"; ?>
			<div style="position: absolute; left: 205px; top: 0px; width: 795px; text-align: justify;" align="left">
				<?php include "engine/redirect.php"; ?>
			</div>
		</div>
	</div>
	<title><?php echo "$titulopag"; ?></title>

	<div id="boxes">
		<div id="pfdialog" class="pfwindow">
			<div align="right">
				<a href="#" class="pfclose"><img src="engine/imgs/cancela.png"></a>
			</div>
			<div id="conteudobox" align="left">

			</div>
		</div>
	</div>

</body>
</html>