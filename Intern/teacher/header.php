<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$json = file_get_contents("php://input");
$ds = json_decode(file_get_contents("php://input"));
$d = $ds[0];

include_once("connec.php");
?>
