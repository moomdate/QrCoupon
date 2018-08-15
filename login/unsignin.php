<?php
if (isset($_GET['do'])) {
	switch ($_GET['do']) {
	case 'register':
		include 'login/register.php';
		break;
	}
} else {
	include "login/index.php";
}
?>