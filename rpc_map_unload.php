<?php

require("rpc.php");

print("mapUnload: " . xmlrpc_decode(mapUnload($_GET["name"])));

?>

<br/><a href="map_list.php">返回地图列表</a>
