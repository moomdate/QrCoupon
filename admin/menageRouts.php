<div class="container">
	<?php
if (isset($_SESSION['login'])) {
	if (isset($_GET['ad'])) {
		switch ($_GET['ad']) {
		case 'main':
			include "bill_e.php";
			//qrProfile
			break;
		case 'list':
			include "qrList.php";
			break;
		case 'ex':
			include "cam.php";
			break;
		case 'ma':
			include "ttuser.php";
			break;//
		case 'mamcp':
			include "lod.php";
			break;
		default:
			include "qrGen.php";
			break;
		}

	} else {
		include "bill_e.php";
	}
} else {
	include "../index.php";
}
?>

</div>
