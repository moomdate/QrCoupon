<?php
@session_start();
if ($_SESSION['login'][4] == "admin") {
	include "confighead_html.php";
	include "menu_ad.php";
	include "menageRouts.php";
} else {
	header("localtion:../index.php");
}
//echo "admin index.hphp";
?>