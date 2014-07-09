<?php

require("rpc.php");

print("mapDispose: " . xmlrpc_decode(mapDispose($_GET["name"])));

?>

<br/><a href="map_list.php">返回地图列表</a>
