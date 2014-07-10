<?php

require("rpc.php");

print("mapLoad: " . xmlrpc_decode(mapLoad($_GET["name"])));

?>

<br/><a href="index.html">返回地图列表</a>
