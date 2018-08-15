<br>
<form  method="post" action="index.php">
  <div class="form-group">
    <label for="dccc">จำนวน</label>
   <input type="text" value="1" id="dccc" class="form-control" name="input_Coupon">
    <small id="emailHelp" class="form-text text-muted">จำนวนแก้ว</small>
  </div>

  <button  class="btn btn-outline-success btn-block">Save</button>
</form>
<center>
<?php
if (isset($_POST['input_Coupon'])) {
	include "../config/config.inc.php";
	$rand = createRandomPassword();
	$result = $mysqli->query("SELECT * FROM prom WHERE prom_qr = '$rand'");
	$date_t = date('Y-m-d H:i:s');
	$value = $_POST['input_Coupon'];
	if ($result->num_rows == 0) {
		?>
	<p><small id="emailHelp" class="form-text text-muted">QR:<?=$rand?> </small></p>
	<?php

		echo "<img src=\"https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=$rand\"/>";
		$commInsert = "INSERT INTO `prom` (`prom_id`, `prom_qr`, `prom_qr_url`, `prom_value`, `prom_status`, `prom_date`) VALUES (NULL, '$rand', 'https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=$rand', '$value', '1', '$date_t'); ";
		$mysqli->query($commInsert);

	}

	//print_r($_POST);

}
function createRandomPassword() {

	$chars = "abcdefghijkmnopqrstuvwxyz023456789";
	srand((double) microtime() * 1000000);
	$i = 0;
	$pass = '';

	while ($i <= 10) {
		$num = rand() % 33;
		$tmp = substr($chars, $num, 1);
		$pass = $pass . $tmp;
		$i++;
	}

	return $pass;

}
?>
</center>
