<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>查看地图信息</title>
  </head>
  <body>
    <?php

    require("rpc.php");

    print(xmlrpc_decode(mapGetDetail($_GET["name"])));

    ?>
  </body>
</html>
