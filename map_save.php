<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>添加地图</title>
  </head>
  <body>
    <p>保存新地图</p>
    <form action="rpc_map_save.php" method="post">
    	<label for="mapname">地图名称</label>
    	<br/>
    	<input type="text" name="mapname" id="mapname"/>
    	<br/>
    	<label for="mapcode">地图代码</label>
    	<br/>
    	<textarea rows="20" cols="100" name="mapcode" id="mapcode"></textarea>
    	<br/>
        <input type="checkbox" name='loadnow' value='1' id="loadnow" checked="checked"/>
        <label for="loadnow">立即在服务器上加载</label>
        <br/>
        <input type="checkbox" name='autoload' value='1' id="autoload" checked="checked"/>
        <label for="autoload">下次启动服务器时自动加载</label>
        <br/>
    	<input type="submit" value="提交" />
    </form>
  </body>
</html>
