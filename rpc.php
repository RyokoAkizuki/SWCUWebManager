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

require("config.php");

function samp_rpc_invoke($host, $port, $request)
{
    $url = "http://$host:$port/";
    $header[] = "Content-type: text/xml";
    $header[] = "Content-length: ".strlen($request);
    
    $ch = curl_init();  
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $request);
    
    $data = curl_exec($ch);       
    if(curl_errno($ch))
    {
        print curl_error($ch);
    }
    else
    {
        curl_close($ch);
        return $data;
    }
}

function samp_rpc($request)
{
    global $SAMP_RPC_SERVER_ADDR, $SAMP_RPC_SERVER_PORT;
    return samp_rpc_invoke($SAMP_RPC_SERVER_ADDR, $SAMP_RPC_SERVER_PORT, $request);
}

function hello()
{
    $request = xmlrpc_encode_request("hello", NULL);
    $response = samp_rpc($request);
    return $response;
}

function mapSave($name, $code, $autoload)
{
    $request = xmlrpc_encode_request("mapSave", array($name, $code, $autoload));
    $response = samp_rpc($request);
    return $response;
}

function mapDispose($name)
{
    $request = xmlrpc_encode_request("mapDispose", $name);
    $response = samp_rpc($request);
    return $response;
}

function mapLoad($name)
{
    $request = xmlrpc_encode_request("mapLoad", $name);
    $response = samp_rpc($request);
    return $response;
}

function mapUnload($name)
{
    $request = xmlrpc_encode_request("mapUnload", $name);
    $response = samp_rpc($request);
    return $response;
}

function mapGetDetail($name)
{
    $request = xmlrpc_encode_request("mapGetDetail", $name);
    $response = samp_rpc($request);
    return $response;
}

function mapList()
{
    $request = xmlrpc_encode_request("mapList", NULL);
    $response = samp_rpc($request);
    return $response;
}

function mapSetAutoLoad($name, $autoload)
{
    $request = xmlrpc_encode_request("mapSetAutoLoad", array($name, $autoload));
    $response = samp_rpc($request);
    return $response;
}

?>
