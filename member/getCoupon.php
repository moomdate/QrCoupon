<?php
@session_start();
include "../config/config.inc.php";
$userID = $_SESSION['login'][0];
$result = $mysqli->query("SELECT SUM(p_value) FROM `point` WHERE p_user_id = $userID");
$coupon = $result->fetch_row()[0];
echo $coupon;
?>