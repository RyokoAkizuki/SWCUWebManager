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

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>更新地图</title>
        <link rel="stylesheet" type="text/css" href="stylesheets/common.css">
        <script src="scripts/jquery.min.js"></script>
        <script src="scripts/alajax-1.2.js"></script>
        <script>
            $(document).ready(function(){
                $("#mapsaveform").alajax({
                    beforeSend: function (){
                        $("#mapsavesubmit").prop("disabled", true);
                        $("#console").append("正在提交</br>");
                    },
                    success: function(result){
                        $("#mapsavesubmit").prop("disabled", false);
                        $("#console").append(result);
                    },
                    error: function(result){
                        $("#mapsavesubmit").prop("disabled", false);
                        $("#console").append(result);
                    }
                });
            });
        </script>
    </head>
    <body>
        <header>
            <a href="index.html"><span class="icon">&#59237;</span></a>
            <span id="title">更新地图</span>
        </header>
        <form id="mapsaveform" class="area" action="rpc_map_update.php" method="post">
            <table>
                <tr>
                    <td><label class="formtitle formlabel" for="mapname">地图名称</label></td>
                    <td><input class="forminput" type="text" name="mapname" id="mapname" value="<? echo($_GET['name']); ?>" readonly="readonly"/></td>
                </tr>
                <tr>
                    <td><label class="formtitle formlabel" for="mapcode">地图代码</label></td>
                    <td><textarea class="forminput" rows="20" name="mapcode" id="mapcode"></textarea></td>
                </tr>
                <tr>
                    <td><input class="formtitle formcheck" type="checkbox" name='loadnow' value='1' id="loadnow" checked="checked"/></td>
                    <td><label class="formlabel" for="loadnow">立即在服务器上加载</label></td>
                </tr>
                <tr>
                    <td><input class="formtitle formcheck" type="checkbox" name='autoload' value='1' id="autoload" checked="checked"/></td>
                    <td><label class="formlabel" for="autoload">下次启动服务器时自动加载</label></td>
                </tr>
                <tr>
                    <td><label class="formtitle formlabel">准备好了?</label></td>
                    <td><input class="formbutton" id="mapsavesubmit" type="submit" value="提交" /></td>
                </tr>
            </table>
        </form>
        <div id="console" class="area"></div>
    </body>
</html> 
