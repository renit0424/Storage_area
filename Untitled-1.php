<?php
$url = "http://json.jmx.prioris.jp/3e4e9f9e-fd8d-3f1f-91db-29caa0f13c72.json";
$json = file_get_contents($url);
$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$arr = json_decode($json,true);

if ($arr === NULL) {
        return;
}else{
    $json_count = count($arr["Body"]["MeteorologicalInfos"][0]["MeteorologicalInfo"][0]["Item"][0]["Kind"][2]["Property"][0]["CenterPart"]["Coordinate"]);
    for($i=$json_count-1;$i>=0;$i--){
    echo $bc_id = $arr["Body"]["MeteorologicalInfos"][0]["MeteorologicalInfo"][0]["Item"][0]["Kind"][2]["Property"][0]["CenterPart"]["Coordinate"][$i]["valueOf_"];
    }
}