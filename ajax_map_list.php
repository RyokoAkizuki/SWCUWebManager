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

require("rpc.php");

header("Cache-Control: no-cache, must-revalidate");

$list = simplexml_load_string(xmlrpc_decode(mapList()));

foreach($list->children() as $child)
{
    echo('<tr><th class="griditemname">' . $child["name"] . '</th>');
    echo('<th>' . (
        ($child["autoload"] == "1") ?
            ('<a href="rpc_map_set_autoload.php?rand=' . rand() . '&autoload=false&name=' . $child["name"] . '"">禁用</a>') :
            ('<a href="rpc_map_set_autoload.php?rand=' . rand() . '&autoload=true&name=' . $child["name"] . '"">启用</a>'))
        . '</th>');
    echo('<th>' . (
        ($child["loaded"] == "1") ?
            ('<a href="rpc_map_unload.php?rand=' . rand() . '&name=' . $child["name"] . '"">卸载</a>') :
            ('<a href="rpc_map_load.php?rand=' . rand() . '&name=' . $child["name"] . '"">加载</a>'))
        . '</th>');
    echo('<th><a href="rpc_map_dispose.php?rand=' . rand() . '&name='  .$child["name"] . '"">删除</a></th></tr>');
}

?>
