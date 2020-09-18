<?php
$url = "http://json.jmx.prioris.jp/3e4e9f9e-fd8d-3f1f-91db-29caa0f13c72.json";
$json = file_get_contents($url);
$json = mb_convert_encoding($json, 'UTF8', 'ASCII,JIS,UTF-8,EUC-JP,SJIS-WIN');
$arr = json_decode($json,true);
$title = "";
$name = "";
$namekana = "";
$number = "";
if ($arr === NULL) {
    return;
}else{
    $title = $arr["Control"]["Title"];
    $name = $arr["Body"]["MeteorologicalInfos"][0]["MeteorologicalInfo"][0]["Item"][0]["Kind"][0]["Property"][0]["TyphoonNamePart"]["Name"];
    $namekana = $arr["Body"]["MeteorologicalInfos"][0]["MeteorologicalInfo"][0]["Item"][0]["Kind"][0]["Property"][0]["TyphoonNamePart"]["NameKana"];
    $number = $arr["Body"]["MeteorologicalInfos"][0]["MeteorologicalInfo"][0]["Item"][0]["Kind"][0]["Property"][0]["TyphoonNamePart"]["Number"];
    $display_name = substr_replace($number, "", 0,2);
    $json_count = count($arr["Body"]["MeteorologicalInfos"][0]["MeteorologicalInfo"][0]["Item"][0]["Kind"][2]["Property"][0]["CenterPart"]["Coordinate"]);
    for($i=$json_count-1;$i>=0;$i--){
    $bc_id = $arr["Body"]["MeteorologicalInfos"][0]["MeteorologicalInfo"][0]["Item"][0]["Kind"][2]["Property"][0]["CenterPart"]["Coordinate"][$i]["valueOf_"];
    }
}
$json2 = array(
    "Title" => $title,
    "display_name" => "台風第${display_name}号",
    "name" => $name,
    "kana" => $namekana,
    "number" => $number,
    "long_range"=>[108.1,120.4],
    "lat_range" =>[12.3,16.4],
    "t_range" => [1600149600,1600387200],
    "basin" => "wnp",
    "track" => array(
        0 => array(
            "date" => "2020年09月15日15時00分JST",
            "lat" => 12.3,
            "long" => 120.4,
            "w" => 30,
            "w_ms" => 15,
            "p"=> 1002,
            "t" => 1600149600,
            "j" => 59018598
        ),
        1 => array(
            "date" => "2020年09月15日15時00分JST",
            "lat" => 12.3,
            "long" => 120.4,
            "w" => 30,
            "w_ms" => 15,
            "p"=> 1002,
            "t" => 1600149600,
            "j" => 59018598
        )
    )
        );
header("Content-Type: application/json; charset=utf-8");
echo json_encode($json2, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT );
?>