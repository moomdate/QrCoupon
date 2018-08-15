<?php
@session_start();
include "../config/config.inc.php";
$userID = $_SESSION['login'][0];
echo $user;
$cp = $_POST['cp'];
$result = $mysqli->query("SELECT * FROM prom WHERE prom_qr = '$cp' and prom_status = 1");
$dataQ = $result->fetch_row();
$couponId = $dataQ[0];
$couponV = $dataQ[3];

if ($result->num_rows > 0) {
	//เจอ
	//print_r($couponId);
	$mysqli->query("INSERT INTO `point` (`p_id`, `p_qr`, `p_value`, `p_user_id`) VALUES (NULL, '$cp', '$couponV', '$userID');");
	$mysqli->query("UPDATE prom SET prom_status = 0 WHERE prom_id = $couponId");
} else {
	echo "coupon error";
}
