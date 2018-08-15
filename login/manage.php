<?php
if (isset($_SESSION['login'])) {
	include "module/menu.php";

	if (isset($_GET['me'])) {
		switch ($_GET['me']) {
		case 'profile':
			include "profile/index.php";
			//qrProfile
			break;
		case 'scan':
			include "module/camera.php";
			break;
		case 'qrp':
			include "member/qrProfile.php";
			break;
		default:
			include "profile/index.php";
			break;
		}

	} else {
		include "member/qrProfile.php";
	}
} else {
	include "login/unsignin.php";
}
//include "login/menage.php";
