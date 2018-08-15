<?php
include "config/config.inc.php";
$userID = $_SESSION['login'][0];
//echo $userID;
$result = $mysqli->query("SELECT SUM(p_value) FROM `point` WHERE p_user_id = $userID");
$coupon = $result->fetch_row();
//echo $coupon[0];
/*if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
echo $row['mem_coupon'];
}
}*/
if ($coupon[0] == NULL) {
	$coupon[0] = 0;
}

?>
<div id='tam'><?=$coupon[0] . " แต้ม";?></div>