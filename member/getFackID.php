<?php
@session_start();
$userid = $_SESSION['login'][0];
$result = $mysqli->query("SELECT f_fake FROM userfake WHERE f_usid = $userid ");
$faceID = $result->fetch_row()[0];
?>
<style type="text/css">
body, html {
	height: 100%;
	background-repeat: no-repeat;
	background-color: #f7dcd9;
}
/**
 * Profile image component
 */
 .profile-header-container{
 	margin: 0 auto;
 	text-align: center;
 }

 .profile-header-img {
 	padding: 54px;
 }

 .profile-header-img > img.img-circle {
 	width: 120px;
 	height: 120px;
 	border: 2px solid #51D2B7;
 }

 .profile-header {
 	margin-top: 43px;
 }
 .img_{
 	width: 100%;
 	height: 100%;
 	border: 5px solid #ef5b10;
 }
/**
 * Ranking component
 */
 .rank-label-container {
 	margin-top: -19px;
 	/* z-index: 1000; */
 	text-align: center;
 }

 .label.label-default.rank-label {
 	background-color: rgb(81, 210, 183);
 	padding: 5px 10px 5px 10px;
 	border-radius: 27px;
 }
 <?php
$a = (include 'getCoupon.inc.php');

if ($a == NULL) {
	$a = 0;
}

?>
</style>
<script type="text/javascript">
	$(document).ready(function(){
		$('#load').show();
		$('#qrimg').hide();
		$('#qrimg').on('load', function() {
			$('#load').hide();
			$('#qrimg').show();
		});
	});
</script>
<div class="container">
	<div class="row">
		<div class="profile-header-container">

			<div class="profile-header-img">
				<h3>Profile</h3>

				<img id="qrimg" class="img_" src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=<?=$faceID?>" />

				<img id="load" class="img_" src="image/load/main.svg" />
				<!-- badge -->
				<div class="rank-label-container">
					<span class="label label-default rank-label"><?php echo $a . "แต้ม" ?></span>
				</div>
			</div>
		</div>
	</div>
</div>
