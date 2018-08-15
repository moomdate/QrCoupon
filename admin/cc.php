<?php
include "../config/config.inc.php";
$ex = $_POST['exc'];
$useridf = $_POST['userid'];
$result = $mysqli->query("SELECT * FROM userfake where f_fake = '$useridf'");
$data = $result->fetch_row();
$userid = $data[1];

$result2 = $mysqli->query("SELECT SUM(p_value) FROM `point` WHERE p_user_id = $userid");
$coupon = $result2->fetch_row()[0];

if ($ex <= ($coupon / 10)) {
	$result3 = $mysqli->query("DELETE FROM point WHERE p_user_id = $userid ");
	$cpRe = $coupon - ($ex * 10);
	if ($result3 && $cpRe > 0) {
		$mysqli->query("INSERT INTO `point` (`p_id`, `p_qr`, `p_value`, `p_user_id`) VALUES (NULL, 'ex', '$cpRe', '$userid');");
		$rest = array("status" => "OK", "cc" => $cpRe);
		echo json_encode($rest);
	}
} else {
	header('HTTP/1.1 500 Internal Server Booboo');
	header('Content-Type: application/json; charset=UTF-8');
	die(json_encode(array('message' => 'ERROR', 'coupon' => 1337)));
}
?>