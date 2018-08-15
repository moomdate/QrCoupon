<?php
ob_start();
@session_start();
//print_r($_POST);
if ($_POST) {
	print_r($_POST);
	include "../config/config.inc.php";
	$user = $_POST['username'];
	$pass = $_POST['password'];
	$pcon = $_POST['confirm'];
	$result = $mysqli->query("SELECT * FROM member where mem_username = '$user'");
	if ($result->num_rows == 0) {
		$result = $mysqli->query("INSERT INTO `member` (`mem_id`, `mem_username`, `mem_coupon`, `mem_password`, `mem_type`) VALUES (NULL, '$user', '0', '$pass', 'member');");
		$Lastid = mysqli_insert_id($mysqli);
		if ($result) {
			$key__ = createRandomPassword();
			$result2 = $mysqli->query("SELECT * FROM member where mem_id = '$Lastid'");
			$mysqli->query("INSERT INTO `userfake` (`f_id`, `f_usid`, `f_fake`) VALUES (NULL, '$Lastid', '$key__');");
			$_SESSION['login'] = $result2->fetch_array(MYSQLI_NUM);
			header("location:../index.php");

			print("insert success $Lastid");
		}
	} else {
		echo "มีชื่อผู้ใช้แล้ว";
	}
}
function createRandomPassword() {

	$chars = "abcdefghijkmnopqrstuvwxyz023456789";
	srand((double) microtime() * 1000000);
	$i = 0;
	$pass = '';

	while ($i <= 20) {
		$num = rand() % 33;
		$tmp = substr($chars, $num, 1);
		$pass = $pass . $tmp;
		$i++;
	}

	return $pass;

}