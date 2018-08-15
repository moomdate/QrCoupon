<?php
/*
header('HTTP/1.1 500 Internal Server Booboo');
header('Content-Type: application/json; charset=UTF-8');
die(json_encode(array('message' => 'ERROR', 'code' => 1337)));
 */
@session_start();
include "../config/config.inc.php";
$userF = $_POST['uf'];

$result = $mysqli->query("SELECT * FROM userfake INNER JOIN member ON userfake.f_usid = member.mem_id WHERE userfake.f_fake = '$userF'");
$userID = $result->fetch_row()[1];

$result = $mysqli->query("SELECT SUM(p_value) FROM `point` WHERE p_user_id = $userID");
$coupon = $result->fetch_row()[0];

$das = array('userid' => "$userF", 'coupon' => "$coupon");
echo json_encode($das);
?>