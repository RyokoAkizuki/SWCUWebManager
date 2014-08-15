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

if($_GET["autoload"] == "true")
	$autoload = true;
else if($_GET["autoload"] == "false")
	$autoload = false;
else
	terminate("Autoload not specified.");

print("mapSetAutoload: " . xmlrpc_decode(mapSetAutoload($_GET["name"], $autoload)));

?>

<br/><a href="index.html">返回地图列表</a>
