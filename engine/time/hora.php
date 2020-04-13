<?php
$horadoservidor = mktime(date("H")-3, date("i"), date("s"), date("m"), date("d"), date("Y"));
echo gmdate("d/m/Y H:i:s", $horadoservidor);
?>