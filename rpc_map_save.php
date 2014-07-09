<?php

require("rpc.php");

print("mapSave: " . xmlrpc_decode(mapSave($_POST["mapname"], $_POST["mapcode"], isset($_POST["autoload"]))) . "<br/>");

if(isset($_POST["loadnow"]))
{
	print("mapLoad: " . xmlrpc_decode(mapLoad($_POST["mapname"])));
}

?>

<br/><a href="map_list.php">返回地图列表</a>
