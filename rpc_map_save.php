<!--
  Copyright 2014 Yukino Hayakawa<tennencoll@gmail.com>
  
  Licensed under the Apache License, Version 2.0 (the "License");
  you may not use this file except in compliance with the License.
  You may obtain a copy of the License at
  
      http://www.apache.org/licenses/LICENSE-2.0
  
  Unless required by applicable law or agreed to in writing, software
  distributed under the License is distributed on an "AS IS" BASIS,
  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
  See the License for the specific language governing permissions and
  limitations under the License.
-->

<?php

require_once("rpc.php");

$xml = simplexml_load_string($_POST["mapcode"]);
$code = '';

if($xml != FALSE) // parsed as XML
{
  foreach($xml->children() as $key => $child)
  {
    if($key == 'object')
    {
      $code .= 'CreateObject(' . $child['model'] . ',' . $child['posX'] . ',' . $child['posY'] . ',' . 
        $child['posZ'] . ',' . $child['rotX'] . ',' . $child['rotY'] . ',' . $child['rotZ'] . ');' . "\n";
    }
    else if($key == 'vehicle')
    {
      $code .= 'CreateVehicle(' . $child['model'] . ',' . $child['posX'] . ',' . $child['posY'] . ',' . 
        $child['posZ'] . ',' . $child['rotZ'] . ',0,0,-1);' . "\n";
    }
  }
}
else
{
  $code = $_POST["mapcode"];
}

$saved = (bool)xmlrpc_decode(mapSave($_POST["mapname"], $code, isset($_POST["autoload"])));

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
