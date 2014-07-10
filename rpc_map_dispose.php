<?php

require("rpc.php");

print("mapDispose: " . xmlrpc_decode(mapDispose($_GET["name"])));

?>

<br/><a href="index.html">返回地图列表</a>
