<?php
$json = array(['Control' =>['Title' => '台風解析・予報情報（３日予報）','DateTime' => '2020-09-16T00:41:33Z','Status' => '通常',
'EditorialOffice'=>'気象庁本庁','PublishingOffice'=>'気象庁予報部','Title'=> '台風解析・予報情報（３日予報）']]);
header("Content-Type: application/json; charset=utf-8");
echo json_encode($json, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT )
?>