<?php

require("rpc.php");

print("mapUnload: " . xmlrpc_decode(mapUnload($_GET["name"])));

?>

<br/><a href="index.html">返回地图列表</a>
