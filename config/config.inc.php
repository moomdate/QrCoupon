<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "coupon";
$mysqli  = new mysqli($host, $user, $password);
if ($mysqli ) {
    $mysqli ->select_db($database);
  //  echo "ok";
} else {
    echo "please check db config.";
}
