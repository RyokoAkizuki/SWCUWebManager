<?php

require("rpc.php");

$saved = (bool)xmlrpc_decode(mapSave($_POST["mapname"], $_POST["mapcode"], isset($_POST["autoload"])));

if(!$saved)
{
	print("地图未能成功保存. 详情请查看服务器记录.<br/>");
	exit();
}

print("地图保存成功<br/>");

$loaded = false;

if(isset($_POST["loadnow"]))
{
	$loaded = (xmlrpc_decode(mapLoad($_POST["mapname"])) == "1");
}

print("地图载入" . ($loaded ? "成功" : "失败") . "<br/>");

?>

<br/><a href="index.html">返回地图列表</a>
