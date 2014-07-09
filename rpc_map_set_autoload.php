<?php

require("rpc.php");

if($_GET["autoload"] == "true")
	$autoload = true;
else if($_GET["autoload"] == "false")
	$autoload = false;
else
	terminate("Autoload not specified.");

print("mapSetAutoload: " . xmlrpc_decode(mapSetAutoload($_GET["name"], $autoload)));

?>

<br/><a href="map_list.php">返回地图列表</a>
