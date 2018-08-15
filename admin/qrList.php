<div class="table table-responsive">
<table class="table ">
	<thead>
		<tr>
			<th scope="col">#ID</th>

			<th scope="col">Image Link</th>
			<th scope="col">Value</th>
			<th scope="col">Status</th>
			<th scope="col">Date</th>
		</tr>
	</thead>
	<tbody>

		<?php
@session_start();
include_once "../config/config.inc.php";
$results = $mysqli->query("SELECT * FROM prom");
while ($row = $results->fetch_assoc()) {
	?>
			<tr>
				<th scope="row"><?=$row['prom_id']?></th>

				<td><a href="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=<?=$row['prom_qr']?>"><img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?=$row['prom_qr']?>"></a></td>
				<td><?=$row['prom_value']?></td>
				<td>
					<?php
if ($row['prom_status']) {
		echo "ใช้ได้";
	} else {
		echo "ใช้ไม่ได้";
	}

	?>
				</td>
				<td><?=$row['prom_date']?></td>
			</tr>
			<?php
}
?>
	</tbody>
</table>
</div>